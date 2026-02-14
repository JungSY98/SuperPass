<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CouponStatics_model extends CI_Model
{
    /* ---- 업체 관리자 범위 제한(있다면) ---- */
    private function _limit_scope()
    {
        if ($this->session->userdata('is_super_admin')) return;
        $store_ids = $this->session->userdata('admin_store_ids'); // ex) [1,2,3]
        if (is_array($store_ids) && count($store_ids)){
            $this->db->where_in('u.store_no', $store_ids);
        }
    }
    private function _apply_filters($p)
    {
        if (!empty($p['start'])) $this->db->where('u.used_at >=', $p['start'].' 00:00:00');
        if (!empty($p['end']))   $this->db->where('u.used_at <=', $p['end'].' 23:59:59');

        if (!empty($p['store_no']))  $this->db->where('u.store_no', (int)$p['store_no']);
        if (!empty($p['coupon_no'])) $this->db->where('u.coupon_no', (int)$p['coupon_no']);

        if ($p['is_stamp'] !== '')   $this->db->where('c.is_stamp', $p['is_stamp'] ? 'Y' : 'N');

        $this->_limit_scope();
    }
	/* === 파일 상단 class CouponStatics_model 내부 어딘가에 추가 === */

	/** 테이블 존재? */
	private function _table_exists($table){
		$q = $this->db->query("SHOW TABLES LIKE ".$this->db->escape($table));
		return $q && $q->num_rows() > 0;
	}
	/** 컬럼 존재? */
	private function _col_exists($table, $col){
		$q = $this->db->query("SHOW COLUMNS FROM `{$table}` LIKE ".$this->db->escape($col));
		return $q && $q->num_rows() > 0;
	}

    /* ===== 1) 요약 KPI ===== */
    public function summary($p)
    {
        $this->db->from('dsp_coupon_usage u');
        $this->db->join('dsp_coupon c', 'c.coupon_no=u.coupon_no', 'left', false);
        $this->_apply_filters($p);
        $this->db->select('COUNT(*) usage_cnt,
                           COUNT(DISTINCT u.mem_id) member_cnt,
                           COALESCE(SUM(u.discount),0) discount_sum,
                           COALESCE(SUM(u.price_pay),0) pay_sum', false);
        $row = $this->db->get()->row_array();
        if (!$row) $row=['usage_cnt'=>0,'member_cnt'=>0,'discount_sum'=>0,'pay_sum'=>0];
        return $row;
    }

    /* ===== 2) 상점 TOP ===== */
    public function top_stores($p, $limit=10)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false)
                 ->join('dsp_store  s','s.no=u.store_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('u.store_no, s.sNameKR, s.sNameEN,
                           COUNT(*) usage_cnt,
                           COALESCE(SUM(u.discount),0) discount_sum,
                           COALESCE(SUM(u.price_pay),0) pay_sum', false)
                 ->group_by('u.store_no')
                 ->order_by('usage_cnt', 'DESC')
                 ->limit((int)$limit);
        return $this->db->get()->result_array();
    }

    /* ===== 3) 쿠폰 TOP ===== */
    public function top_coupons($p, $limit=10)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false)
                 ->join('dsp_store  s','s.no=u.store_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('u.coupon_no, c.title_kr, c.title_en, u.store_no, s.sNameKR, s.sNameEN,
                           COUNT(*) usage_cnt,
                           COALESCE(SUM(u.discount),0) discount_sum,
                           COALESCE(SUM(u.price_pay),0) pay_sum', false)
                 ->group_by('u.coupon_no')
                 ->order_by('usage_cnt', 'DESC')
                 ->limit((int)$limit);
        return $this->db->get()->result_array();
    }

    /* ===== 4) 디바이스/브라우저 ===== */
    public function device($p)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('COALESCE(u.device,"unknown") device,
                           COALESCE(u.browser,"unknown") browser,
                           COUNT(*) usage_cnt', false)
                 ->group_by('device, browser')
                 ->order_by('usage_cnt','DESC');
        return $this->db->get()->result_array();
    }

    /* ===== 5) 히트맵(일×시간대) ===== */
    public function heatmap($p)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false);
        $this->_apply_filters($p);
		$this->db->select('DATE(u.used_at) d,
				   HOUR(u.used_at) h,
				   COUNT(*)           AS usage_cnt,
				   COALESCE(SUM(u.discount),0) AS discount_sum,
				   COALESCE(SUM(u.price_pay),0) AS pay_sum', false)
		 ->group_by('d, h')
		 ->order_by('d ASC, h ASC');
        return $this->db->get()->result_array();
    }

    /* ===== 6) 쿠폰별 할인총액/사용량 리스트 ===== */
    public function coupon_table($p)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false)
                 ->join('dsp_store  s','s.no=u.store_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('s.sNameKR store_kr, s.sNameEN store_en,
                           u.coupon_no, c.title_kr, c.title_en,
                           COALESCE(SUM(u.discount),0) discount_sum,
                           COUNT(*) usage_cnt', false)
                 ->group_by('s.no, u.coupon_no')
                 ->order_by('store_kr ASC, discount_sum DESC');
        return $this->db->get()->result_array();
    }

    /* ===== 7) 브랜드/몰 그룹핑 ===== */


    /* ===== 8) Export rows ===== */
    public function export_rows($p, $limit=100000)
    {
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false)
                 ->join('dsp_store  s','s.no=u.store_no','left',false);
        $this->_apply_filters($p);
        $this->db->select('u.used_at, u.mem_id, u.store_no, s.sNameKR, s.sNameEN,
                           u.coupon_no, c.title_kr, c.title_en,
                           u.price_orig, u.discount, u.price_pay, u.dc_type, u.dc_amount,
                           u.device, u.browser, u.ip', false)
                 ->order_by('u.used_at','DESC')
                 ->limit((int)$limit);
        return $this->db->get()->result_array();
    }
	/* === 기존 group_by_field($p, $field) 전체를 아래로 교체 === */

	/**
	 * $field: 'brand' | 'mall'
	 * dsp_branch 가 있으면 s.branchNo = b.branchNo 로 조인해 이름으로 그룹핑
	 * 없거나 컬럼이 없으면 branchNo 로 그룹핑하고 라벨을 "지점 {번호}"로 반환
	 */
	public function group_by_field($p, $field)
	{
		$branchTable     = 'dsp_branch';
		$hasBranchTable  = $this->_table_exists($branchTable);

		// 후보 컬럼들(운영 스키마에 맞춰 한두 개만 추가/삭제하셔도 됩니다)
		$storeBranchCols = ['branchNo','branch_no','branch_id','branchId','branch'];
		$branchKeyCols   = ['branchNo','branch_no','id','no','branch_id','branchId'];
		$brandCols       = ['brand','brand_name','brandKR','brand_kr','brandNm','brand_kor'];
		$mallCols        = ['mall','mall_name','mallKR','mall_kr','mallNm','mall_kor'];

		// s.* 에서 지점키 검색
		$storeBranchCol = null;
		foreach ($storeBranchCols as $c) {
			if ($this->_col_exists('dsp_store', $c)) { $storeBranchCol = $c; break; }
		}
		if (!$storeBranchCol) {
			// fallback: 지점키가 전혀 없으면 s.no 로라도 묶어줌
			$storeBranchCol = 'no';
		}

		// b.* 에서 지점키 검색
		$branchKeyCol = null;
		if ($hasBranchTable) {
			foreach ($branchKeyCols as $c) {
				if ($this->_col_exists($branchTable, $c)) { $branchKeyCol = $c; break; }
			}
		}

		$this->db->from('dsp_coupon_usage u')
				 ->join('dsp_coupon c','c.coupon_no=u.coupon_no','left',false)
				 ->join('dsp_store  s','s.no=u.store_no','left',false);
		$this->_apply_filters($p);

		// 브랜치 조인(가능할 때만)
		$joined = false;
		if ($hasBranchTable && $branchKeyCol && $storeBranchCol) {
			$this->db->join("{$branchTable} b", "b.`{$branchKeyCol}` = s.`{$storeBranchCol}`", 'left', false);
			$joined = true;
		}

		// 라벨 컬럼 결정
		$labelExpr = '';
		$labelName = ($field==='mall') ? 'mall' : 'brand';

		// 1) dsp_branch 에서 이름 찾기
		if ($joined) {
			$candidates = ($field==='mall') ? $mallCols : $brandCols;
			$nameCol = null;
			foreach ($candidates as $c) {
				if ($this->_col_exists($branchTable, $c)) { $nameCol = $c; break; }
			}
			if ($nameCol) {
				$labelExpr = "COALESCE(b.`{$nameCol}`,'미지정') AS {$labelName}";
			}
		}

		// 2) 없다면 dsp_store 에서 이름 찾기
		if (!$labelExpr) {
			$candidates = ($field==='mall') ? $mallCols : $brandCols;
			$nameCol = null;
			foreach ($candidates as $c) {
				if ($this->_col_exists('dsp_store', $c)) { $nameCol = $c; break; }
			}
			if ($nameCol) {
				$labelExpr = "COALESCE(s.`{$nameCol}`,'미지정') AS {$labelName}";
			}
		}

		// 3) 그래도 없으면 branch 키 값으로 그룹 (프론트 호환 위해 AS grp로 보냄)
		if (!$labelExpr) {
			$labelExpr = "s.`{$storeBranchCol}` AS grp";
		}

		$this->db->select("$labelExpr,
						   COUNT(*) usage_cnt,
						   COALESCE(SUM(u.discount),0) discount_sum,
						   COALESCE(SUM(u.price_pay),0) pay_sum", false);

		// 그룹 키
		if (strpos($labelExpr, ' AS grp') !== false) {
			$this->db->group_by('grp');
		} else {
			$this->db->group_by($labelName);
		}

		$this->db->order_by('usage_cnt','DESC');
		$rows = $this->db->get()->result_array();

		// grp로 나갔으면 라벨로 변환(컨트롤러/뷰 변경 불필요)
		if ($rows && array_key_exists('grp', $rows[0])) {
			$out = [];
			foreach ($rows as $r) {
				$out[] = [
					$labelName     => '지점 '.$r['grp'],
					'usage_cnt'    => (int)$r['usage_cnt'],
					'discount_sum' => (int)$r['discount_sum'],
					'pay_sum'      => (int)$r['pay_sum'],
				];
			}
			return $out;
		}

		return $rows ?: [];
	}

}

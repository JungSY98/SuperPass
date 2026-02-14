<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Coupon_model
 * - dsp_coupon 에 대한 CRUD + 조회 필터
 * - PHP 8.x / CI3
 */
class Coupon_model extends CI_Model
{
    protected $table = 'dsp_coupon';
    protected $pk = 'coupon_no';

    public function __construct()
    {
        parent::__construct();
    }

    public function list_by_store($store_no, $lang='ko', $include_wait=false) {
		$target = [];
		if ($lang=='ko') {
			$target = array("KR", "ALL");
		} else if ($lang=='en') {
			$target = array("INTL", "ALL");
		} else {
			$target = array("INTL", "ALL", "KR");
		}
        $this->db->from($this->table)
            ->where('store_no',(int)$store_no);
            
		if ($include_wait) {
			$this->db->where_in('is_use', ['Y','W']);
		} else {
			$this->db->where('is_use', 'Y');
		}

		$rows = $this->db->where_in('target_audience', $target)
            ->order_by('(sort_order IS NULL)', 'ASC', FALSE)
            ->order_by('sort_order','ASC')
            ->order_by('coupon_no','ASC')
            ->get()->result_array();

        foreach($rows as &$r){
            $r['title'] = ($lang==='ko') ? ($r['title_kr']?:$r['title_en']) : ($r['title_en']?:$r['title_kr']);
            $r['desc']  = ($lang==='ko') ? ($r['desc_kr'] ?: $r['desc_en'])  : ($r['desc_en'] ?: $r['desc_kr']);
        }
        return $rows;
    }

	// 관리자용 _ 전체 리스트 항상 표시
    public function list_by_store2($store_no, $lang='ko') {
		$target = [];
		if ($lang=='ko') {
			$target = array("KR", "ALL");
		} else if ($lang=='en') {
			$target = array("INTL", "ALL");
		} else {
			$target = array("INTL", "ALL", "KR");
		}
        $rows = $this->db->from($this->table)
            ->where('store_no',(int)$store_no)
            ->order_by('(sort_order IS NULL)', 'ASC', FALSE)
            ->order_by('sort_order','ASC')
            ->order_by('coupon_no','ASC')
            ->get()->result_array();

        foreach($rows as &$r){
            $r['title'] = ($lang==='ko') ? ($r['title_kr']?:$r['title_en']) : ($r['title_en']?:$r['title_kr']);
            $r['desc']  = ($lang==='ko') ? ($r['desc_kr'] ?: $r['desc_en'])  : ($r['desc_en'] ?: $r['desc_kr']);
        }
        return $rows;
    }
    public function get($coupon_no){
        return $this->db->from($this->table)
            ->where('coupon_no',(int)$coupon_no)
            ->where('is_use','Y')->get()->row_array();
    }

    /** 기본 SELECT */
    private function base_select()
    {
        $this->db->from($this->table);
        $this->db->order_by($this->pk, 'DESC');
    }

    /** 단건 조회 */
    public function find($id)
    {
        $this->base_select();
        $this->db->where($this->pk, (int)$id);
        return $this->db->get()->row_array();
    }

    /** 목록 조회 + 필터 */
    public function list(array $filter = [], int $limit = 50, int $offset = 0)
    {
        $this->base_select();
        if (!empty($filter['store_no'])) {
            $this->db->where('store_no', (int)$filter['store_no']);
        }
        if (!empty($filter['discount_type'])) {
            $this->db->where('discount_type', $filter['discount_type']);
        }
        if (!empty($filter['target_audience']) && in_array($filter['target_audience'], ['ALL','KR','INTL'])) {
            // 앱단 필터: ALL 은 항상 포함
            $this->db->group_start()
                ->where('target_audience', $filter['target_audience'])
                ->or_where('target_audience', 'ALL')
            ->group_end();
        }
        if (isset($filter['keyword']) && $filter['keyword'] !== '') {
            $kw = trim($filter['keyword']);
            $this->db->group_start()
                ->like('title', $kw)
                ->or_like('gift_name', $kw)
                ->or_like('gift_desc', $kw)
            ->group_end();
        }
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();
    }

    /** 생성 */
    public function create(array $data)
    {
        $data = $this->sanitize($data);
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /** 수정 */
    public function update($id, array $data)
    {
        $data = $this->sanitize($data);
        $this->db->where($this->pk, (int)$id)->update($this->table, $data);
        return $this->db->affected_rows() > 0;
    }

    /** 삭제 */
    public function delete($id)
    {
        $this->db->where($this->pk, (int)$id)->delete($this->table);
        return $this->db->affected_rows() > 0;
    }

    /** 재고 차감(사은품) */
    public function consume_gift_stock(int $coupon_no, int $qty = 1): bool
    {
        $this->db->set('gift_stock', 'gift_stock - ' . (int)$qty, false);
        $this->db->where($this->pk, $coupon_no);
        $this->db->where('discount_type', 'GIFT');
        $this->db->where('gift_stock >=', $qty);
        $this->db->update($this->table);
        return $this->db->affected_rows() > 0;
    }

    /** 필드 sanitize & 기본값 */
    private function sanitize(array $data): array
    {
        // audience
        $aud = $data['target_audience'] ?? 'ALL';
        if (!in_array($aud, ['ALL','KR','INTL'])) $aud = 'ALL';
        $data['target_audience'] = $aud;

        // discount_type
        $dtype = $data['discount_type'] ?? 'AMOUNT';
        if (!in_array($dtype, ['RATE','AMOUNT','STAMP','GIFT'])) $dtype = 'AMOUNT';
        $data['discount_type'] = $dtype;

        // gift fields normalization (nullable)
        if ($dtype === 'GIFT') {
            $data['gift_name'] = $data['gift_name'] ?? null;
            $data['gift_desc'] = $data['gift_desc'] ?? null;
            $data['gift_image'] = $data['gift_image'] ?? null;
            $data['gift_stock'] = isset($data['gift_stock']) ? (int)$data['gift_stock'] : 0;
            $data['gift_per_user_limit'] = isset($data['gift_per_user_limit']) ? (int)$data['gift_per_user_limit'] : 1;
            $data['min_purchase'] = isset($data['min_purchase']) ? (int)$data['min_purchase'] : null;
            // 금액/정율 값은 무시
            if (isset($data['discount_value'])) unset($data['discount_value']);
            if (isset($data['discount_rate'])) unset($data['discount_rate']);
        }

        // 금액/정율 공통 처리
        if (in_array($dtype, ['AMOUNT','RATE'])) {
            if ($dtype === 'AMOUNT') {
                $data['discount_value'] = isset($data['discount_value']) ? (int)$data['discount_value'] : 0;
                $data['discount_rate']  = null;
            } else {
                $rate = isset($data['discount_rate']) ? (float)$data['discount_rate'] : 0.0;
                $data['discount_rate']  = max(0, min($rate, 100));
                $data['discount_value'] = null;
            }
            $data['min_purchase'] = isset($data['min_purchase']) ? (int)$data['min_purchase'] : null;
            // 선물 필드 정리
            $data['gift_name'] = null;
            $data['gift_desc'] = null;
            $data['gift_image'] = null;
            $data['gift_stock'] = 0;
            $data['gift_per_user_limit'] = 0;
        }

        return $data;
    }
}
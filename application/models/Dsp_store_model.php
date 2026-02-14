<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dsp_store_model extends CI_Model
{
    protected $table = 'dsp_store';

    /** 검색 (자동완성) */
    public function search($q, $lang='ko', $limit=10) {
        $this->db->from($this->table)->where('isUse','Y');
        if ($q !== '') {
            if ($lang === 'ko') {
                $this->db->group_start()
                    ->like('sNameKR', $q)->or_like('sDescKR', $q)
                    ->or_like('sAddr1KR', $q)->or_like('sAddr2KR', $q)->or_like('sAddr3KR', $q)
                ->group_end();
            } else {
                $this->db->group_start()
                    ->like('sNameEN', $q)->or_like('sDescEN', $q)
                    ->or_like('sAddr1EN', $q)->or_like('sAddr2EN', $q)->or_like('sAddr3EN', $q)
                ->group_end();
            }
        }
        $this->db->order_by('(sOrder IS NULL)', 'ASC', FALSE)
                 ->order_by('sOrder', 'ASC')
                 ->order_by('no', 'ASC');
        return $this->db->limit($limit)->get()->result_array();
    }

    /** 지도 마커용 */
    public function list_for_map($limit=200) {
		$targetSQL = '';
		$mem_id = (int)element('mem_id', $_SESSION);
        $lang=strtolower(substr((string)$this->input->server('HTTP_ACCEPT_LANGUAGE'),0,2));
        $lang==='ko'?'ko':'en';
		if ($lang=='ko') {
			$target = array("KR", "ALL");
		} else if ($lang=='en') {
			$target = array("INTL", "ALL");
		} else {
			$target = array("INTL", "ALL", "KR");
		}
		$target_array = array_map(function($value) {
			return "'" . $value . "'";
		}, $target);
		$targetSQL = implode(', ', $target_array);
			


		$sql = "select no,sNameKR,sNameEN,mapLat,mapLng,dcType,dcAmount,storeCode,sMainIMG_Name,sMainIMG_Source,category,
		CASE
			WHEN EXISTS (
				SELECT 1
				FROM dsp_coupon C
				WHERE C.store_no = S.no
				AND C.is_stamp = 'Y'
				AND C.target_audience in (".$targetSQL.")
				LIMIT 1
			) THEN 'Y' ELSE 'N'
		END AS has_stamp,
		CASE
			WHEN EXISTS (
				SELECT 1
				FROM dsp_coupon_usage CS
				WHERE CS.store_no = S.no
				AND CS.mem_id = '".$mem_id."'
				LIMIT 1
			) THEN 'Y' ELSE 'N'
		END AS usage_stamp
		FROM ".$this->table." as S
		WHERE isUse = 'Y'
		ORDER BY ( sOrder IS NULL ) ASC,
		sOrder ASC,
		no ASC
		LIMIT ".$limit;
		return $this->db->query($sql)->result_array();

/*        return $this->db->select("select no,sNameKR,sNameEN,mapLat,mapLng,dcType,dcAmount,storeCode,sMainIMG_Name,sMainIMG_Source,category")
            ->from($this->table.' as S')->where('isUse','Y')
            ->order_by('(sOrder IS NULL)', 'ASC', FALSE)
            ->order_by('sOrder','ASC')->order_by('no','ASC')
            ->limit($limit)->get()->result_array();
*/
    }

    /** 단건 조회 */
    public function get($no) {
		$storeD = $this->db->from($this->table)->where('no',(int)$no)->where('isUse','Y')->get()->row_array();
		$mem_id = $this->db->from("store_member")->where('storeNo',(int)$no)->get()->row_array();
		$storeD['mem_id'] = $mem_id;
        return $storeD;
    }

    public function list_by_category($code, $lang='ko', $limit=200)
    {
		$targetSQL = '';
		$mem_id = (int)element('mem_id', $_SESSION);
        $lang=strtolower(substr((string)$this->input->server('HTTP_ACCEPT_LANGUAGE'),0,2));
        $lang==='ko'?'ko':'en';
		if ($lang=='ko') {
			$target = array("KR", "ALL");
		} else if ($lang=='en') {
			$target = array("INTL", "ALL");
		} else {
			$target = array("INTL", "ALL", "KR");
		}
		$target_array = array_map(function($value) {
			return "'" . $value . "'";
		}, $target);
		$targetSQL = implode(', ', $target_array);


        $code = trim(strtolower($code));
        if ($code === '') {
            // ALL 처리
            return $this->list_for_map($limit);
        }
		$mem_id = $this->member->item("mem_id");
        // cat_id(정규화) 환경 가드: dsp_store.cat_id 존재 + 카테고리 테이블이 있을 경우
        $has_cat_id = $this->db->field_exists('cat_id', $this->table);
        if ($has_cat_id) {
            // 조인 시도 (테이블 존재/조인 실패 시를 대비해 try-catch는 CI3엔 없음 → 조심스럽게 작성)
            $this->db->select("S.no,S.sNameKR,S.sNameEN,S.mapLat,S.mapLng,S.dcType,S.dcAmount,S.storeCode,S.sMainIMG_Name,S.sMainIMG_Source,S.category,
		CASE
			WHEN EXISTS (
				SELECT 1
				FROM dsp_coupon C
				WHERE C.store_no = S.no
				AND C.is_stamp = 'Y'
				AND C.target_audience in (".$targetSQL.")
				LIMIT 1
			) THEN 'Y' ELSE 'N'
		END AS has_stamp,
		CASE
			WHEN EXISTS (
				SELECT 1
				FROM dsp_coupon_usage CS
				WHERE CS.store_no = S.no
				AND CS.mem_id = '".$mem_id."'
				LIMIT 1
			) THEN 'Y' ELSE 'N'
		END AS usage_stamp		
		")
                     ->from($this->table.' AS S')
                     ->join('dsp_store_category AS C', 'C.cat_id = S.cat_id', 'left')
                     ->where('S.isUse','Y')
                     ->group_start()
                        //->where('LOWER(C.code)', $code)
                        ->where('LOWER(S.category)', $code) // 안전장치
                     ->group_end()
                     ->order_by('(S.sOrder IS NULL)','ASC',FALSE)
                     ->order_by('S.sOrder','ASC')
                     ->order_by('S.no','ASC')
                     ->limit($limit);
            return $this->db->get()->result_array();
        }

        // 문자열 category 기반 (기존 스키마)
        return $this->db->select('no,sNameKR,sNameEN,mapLat,mapLng,dcType,dcAmount,storeCode,sMainIMG_Name,sMainIMG_Source,category')
            ->from($this->table)
            ->where('isUse','Y')
            ->group_start()
                ->like('LOWER(category)', $code)    // ex) 'fnb','cafe' 등 포함 매칭
            ->group_end()
            ->order_by('(sOrder IS NULL)','ASC',FALSE)
            ->order_by('sOrder','ASC')
            ->order_by('no','ASC')
            ->limit($limit)
            ->get()->result_array();
    }
	private function norm_cat_code($raw, $codes) {
		$s = strtolower(trim((string)$raw));
		foreach ($codes as $code) {
			if ($code !== '' && strpos($s, $code) !== false) return $code; // 부분일치
		}
		// 흔한 대응
		if (strpos($s,'f&b') !== false || strpos($s,'식음')!==false) return 'fnb';
		return ''; // 매치 실패 → 빈 문자열
	}

	public function attach_cat_code(array $rows) {
		// 카테고리 코드 목록을 한번 로드 (성능 고려시 캐시)
		$codes = array_map(function($r){ return strtolower($r['code']); },
				  $this->db->select('code')->from('dsp_store_category')->where('is_use','Y')->get()->result_array());
		foreach ($rows as &$r) {
			$r['cat_code'] = $this->norm_cat_code($r['category'] ?? '', $codes);
		}
		return $rows;
	}
}

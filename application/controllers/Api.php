<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CB_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Dsp_store_model','store');
		$this->load->model('Store_file_upload_model', 'files');
        $this->load->model('Coupon_model','coupon');
        $this->load->model('Coupon_usage_model','usage');
		$this->load->model('Store_category_model','cat');
		$this->load->model('Store_click_log_model','clicklog');
        $this->load->helper(['url']);
        $this->load->library('session');
    }
    private function lang2(){
        $al=strtolower(substr((string)$_SESSION['langSet'],0,2));
        return $al==='ko'?'ko':'en';
    }
    private function require_login(){
        if(!(int)$this->session->userdata('mem_id')){
            return $this->output->set_status_header(401)
              ->set_content_type('application/json')
              ->set_output(json_encode(['error'=>'login_required']));
        } return null;
    }

    public function store_search(){
        $q=trim((string)$this->input->get('q',true));
        $lang=$this->lang2();
        $rows=$this->store->search($q,$lang,10);
        return $this->output->set_content_type('application/json')->set_output(json_encode($rows));
    }
    public function store_list(){
        $rows=$this->store->list_for_map(200);
        return $this->output->set_content_type('application/json')->set_output(json_encode($rows));
    }
    public function store_detail($no){
        $row=$this->store->get((int)$no);
        if(!$row) return $this->output->set_status_header(404)->set_output('Not found');
        return $this->output->set_content_type('application/json')->set_output(json_encode($row));
    }

	public function store_click(){
		if($x=$this->require_login()) return;
		$store_no = (int)$this->input->post('store_no', true);
		if(!$store_no){
			return $this->output->set_status_header(400)
				->set_content_type('application/json')
				->set_output(json_encode(['ok'=>false, 'error'=>'store_no_required']));
		}

		$mem_id = (int)$this->member->item('mem_id');
		$ua     = substr((string)$this->input->server('HTTP_USER_AGENT'),0,255);
		$ip     = (string)$this->input->ip_address();
		$ref    = substr((string)$this->input->server('HTTP_REFERER'),0,255);

		$this->clicklog->insert([
			'mem_id'   => $mem_id,
			'store_no' => $store_no,
			'ua'       => $ua,
			'ip'       => $ip,
			'referer'  => $ref,
		]);

		return $this->output->set_content_type('application/json')
			->set_output(json_encode(['ok'=>true]));
	}

    public function coupon_list($store_no){
		$mem_id = (int)$this->member->item('mem_id');
		$store  = $this->store->get((int)$store_no);
		$is_owner = ($store && in_array($mem_id, $store['mem_id']) && $mem_id > 0);

        $rows=$this->coupon->list_by_store((int)$store_no,$this->lang2(), $is_owner);
        return $this->output->set_content_type('application/json')->set_output(json_encode($rows));
    }
    public function coupon_detail($coupon_no){
        $row=$this->coupon->get((int)$coupon_no);
		$row['desc_kr']=nl2br($row['desc_kr']);
		$row['desc_en']=nl2br($row['desc_en']);
		$row['storeD'] = $this->store->get((int)$row['store_no']);
        if(!$row) return $this->output->set_status_header(404)->set_output('Not found');
        return $this->output->set_content_type('application/json')->set_output(json_encode($row));
    }

    public function coupon_use(){
        if($x=$this->require_login()) return;
        $price=(int)$this->input->post('price',true);
        $store_no=(int)$this->input->post('store_no',true);
        $coupon_no=(int)$this->input->post('coupon_no',true)?:null;
        $code=trim((string)$this->input->post('code',true));
		$mem_id=(int)$this->member->item('mem_id');

        $store=$this->store->get($store_no);
        if(!$store) return $this->output->set_status_header(404)
            ->set_content_type('application/json')->set_output(json_encode(['error'=>'store_not_found']));

        $coupon=null;
        if($coupon_no){
            $coupon=$this->coupon->get($coupon_no);
            if(!$coupon || (int)$coupon['store_no']!==$store_no)
                return $this->output->set_status_header(400)
                  ->set_content_type('application/json')->set_output(json_encode(['error'=>'invalid_coupon']));
        }

        $expected=$coupon && !empty($coupon['coupon_code'])?$coupon['coupon_code']:(string)$store['storeCode'];
        if($expected!=='' && strcasecmp($code,$expected)!==0){
            return $this->output->set_status_header(400)
              ->set_content_type('application/json')->set_output(json_encode(['error'=>'invalid_code']));
        }

		// ===== [추가] 사용횟수 제한 체크 =====
		if ($coupon_no) { // 쿠폰일 때만 제한, 상점 기본할인은 무제한(원하시면 별도 규칙 추가 가능)
			$limit_total      = (int)($coupon['limit_total'] ?? 0);
			$limit_per_member = (int)($coupon['limit_per_member'] ?? 0);
			$period           = $coupon['limit_member_period'] ?? 'lifetime';

			// 총 사용량 체크
			if ($limit_total > 0) {
				$total_used = (int)$this->db->select('COUNT(*) AS c')
					->from('dsp_coupon_usage')
					->where('coupon_no', $coupon_no)
					->get()->row()->c;
				if ($total_used >= $limit_total) {
					return $this->output->set_status_header(429) // Too Many Requests
						->set_content_type('application/json')
						->set_output(json_encode(['ok'=>false, 'error'=>'limit_total_exceeded']));
				}
			}

			// 회원별 사용량 체크
			if ($limit_per_member > 0) {
				// 기간 창 계산
				$start = null; $end = null;
				$now = new DateTime('now');
				$end = $now->format('Y-m-d H:i:s');

				switch ($period) {
					case 'day':
						$start = (new DateTime('today 00:00:00'))->format('Y-m-d H:i:s');
						break;
					case 'week':
						// ISO 주 시작(월요일 00:00)
						$weekStart = new DateTime();
						$weekStart->setTime(0,0,0);
						$dow = (int)$weekStart->format('N'); // 1..7
						if ($dow > 1) $weekStart->modify('-'.($dow-1).' day');
						$start = $weekStart->format('Y-m-d H:i:s');
						break;
					case 'month':
						$start = (new DateTime(date('Y-m-01 00:00:00')))->format('Y-m-d H:i:s');
						break;
					case 'lifetime':
					default:
						$start = null; // 전체 기간
				}
				$mem_id=(int)$this->member->item('mem_id');
				$this->db->from('dsp_coupon_usage')
						 ->where('mem_id', $mem_id)
						 ->where('coupon_no', $coupon_no);
				if ($start) $this->db->where('used_at >=', $start);
				$this->db->where('used_at <=', $end);
				$used_by_me = (int)$this->db->count_all_results();

				if ($used_by_me >= $limit_per_member) {
					return $this->output->set_status_header(429)
						->set_content_type('application/json')
						->set_output(json_encode([
							'ok'=>false, 'error'=>'limit_member_exceeded',
							'period'=>$period, 'limit'=>$limit_per_member
						]));
				}
			}
		}


        $dcType=$coupon && $coupon['dc_type']?$coupon['dc_type']:$store['dcType'];
        $dcAmount=$coupon && $coupon['dc_amount']?(int)$coupon['dc_amount']:(int)$store['dcAmount'];
        $discount=($dcType==='%')?floor($price*$dcAmount/100):min($price,$dcAmount);
        $pay=max(0,$price-$discount);

        $ua=(string)$this->input->server('HTTP_USER_AGENT');
        $ip=(string)$this->input->ip_address();
        $device=preg_match('/Mobile|Android|iPhone|iPad/i',$ua)?'MOBILE':'PC';
        $browser=(stripos($ua,'Chrome')!==false?'Chrome':(stripos($ua,'Safari')!==false?'Safari':'Other'));

		// 사용기록 저장 전에
		$this->db->trans_start();

        $this->usage->insert([
          'used_at'=>date('Y-m-d H:i:s'),'mem_id'=>$mem_id,'store_no'=>$store_no,
          'coupon_no'=>$coupon_no,'price_orig'=>$price,'discount'=>$discount,
          'price_pay'=>$pay,'dc_source'=>$coupon?'COUPON':'STORE',
          'dc_type'=>$dcType,'dc_amount'=>$dcAmount,'ua'=>substr($ua,0,250),
          'device'=>$device,'browser'=>$browser,'ip'=>$ip
        ]);
		$this->db->trans_complete();
		if (!$this->db->trans_status()){
			return $this->output->set_status_header(500)->set_output(json_encode(['ok'=>false]));
		}
        $resp=['ok'=>true,'price'=>$price,'discount'=>$discount,'pay'=>$pay, 'kakao_link'=>$coupon['kakao_link'],
          'dcType'=>$dcType,'dcAmount'=>$dcAmount,'dcSource'=>$coupon?'COUPON':'STORE',
          $this->security->get_csrf_token_name()=>$this->security->get_csrf_hash()];
        return $this->output->set_content_type('application/json')->set_output(json_encode($resp));
    }

    public function category_list() {
        $rows = $this->cat->list_all(true);
        // 프론트에서 code→icon 매핑에 바로 쓰도록 최소 필드만
        $out = array_map(function($r){
            return [
                'cat_id' => (int)$r['cat_id'],
                'code'   => $r['code'],
                'name_kr'=> $r['name_kr'],
                'name_en'=> $r['name_en'],
                'icon'   => $r['icon_img'] ? '/uploads/category/'.$r['icon_img'] : null,
                'color'  => $r['color_hex'],
            ];
        }, $rows);
        $this->output->set_content_type('application/json')->set_output(json_encode($out));
    }
    // 카테고리 코드로 상점 리스트 (PC/모바일 공통 사용)
    public function store_bycat($code = '')
    {
        $lang = strtolower(substr((string)$this->input->server('HTTP_ACCEPT_LANGUAGE'),0,2))==='ko' ? 'ko' : 'en';
        $code = strtolower(urldecode((string)$code));
        $rows = $this->store->list_by_category($code, $lang, 200);
        return $this->output->set_content_type('application/json')
                            ->set_output(json_encode($rows));
    }

	public function api_list() {
		$rows = $this->cat->list_all(true);
		$base = rtrim(base_url(), '/'); // https://.../ 도메인
		$out = array_map(function($r) use ($base) {
			$icon = $r['icon_img'] ? $base.'/uploads/category/'.$r['icon_img'] : null;
			return [
				'cat_id'  => (int)$r['cat_id'],
				'code'    => strtolower($r['code']),     // 소문자 강제
				'name_kr' => $r['name_kr'],
				'name_en' => $r['name_en'],
				'icon'    => $icon,                       // 절대경로 보장
				'color'   => $r['color_hex'] ?: null,
			];
		}, $rows);
		$this->output->set_content_type('application/json')->set_output(json_encode($out));
	}
	// 사진 목록: /api/store/photos/{store_no}
	public function store_photos($store_no)
	{
		$rows = $this->files->list_by_store((int)$store_no, 'storeExplain', 100);
		// 파일 경로 절대 URL로 변환
		$base = rtrim(base_url(), '/');
		$out = array_map(function($r) use ($base){
			// 업로드 구조가 /uploads/{file_name} 라면 아래 그대로 사용
			// 만약 별도 하위 폴더라면 '/uploads/store_explain/' 등으로 조정
			$url = $base . '/uploads/store/' . ltrim($r['file_name'], '/');
			return [
				'no'         => (int)$r['no'],
				'storeNo'    => (int)$r['storeNo'],
				'file_name'  => $r['file_name'],
				'client_name'=> $r['client_name'],
				'url'        => $url,
			];
		}, $rows);
		return $this->output->set_content_type('application/json')->set_output(json_encode($out));
	}


	public function store_stamp()
	{
		$cat = strtolower(trim($this->input->get('cat', true) ?: ''));
		$mem_id = $this->member->item("mem_id");
		$lang = strtolower(substr((string)$this->input->server('HTTP_ACCEPT_LANGUAGE'),0,2))==='ko' ? 'ko' : 'en';
		$targetSQL = $lang == 'ko' ? " AND C.target_audience in ('ALL', 'KR') " : " AND C.target_audience in ('ALL', 'INTL') ";

		// 스탬프 쿠폰 보유 매장 번호
		$store_nos = $this->db->select('DISTINCT store_no', false)
			->from('dsp_coupon')
			->where('is_stamp', 'Y')
			->where('is_use', 'Y')
			->get()->result_array();
		if (empty($store_nos)) {
			return $this->output->set_content_type('application/json')
				->set_output(json_encode([]));
		}
		$ids = array_map(function($r){ return (int)$r['store_no']; }, $store_nos);

		$this->db->select("no,sNameKR,sNameEN,mapLat,mapLng,dcType,dcAmount,storeCode,sMainIMG_Name,sMainIMG_Source,category,
		CASE
			WHEN EXISTS (
				SELECT 1
				FROM dsp_coupon C
				WHERE C.store_no = S.no
				AND C.is_stamp = 'Y'
				$targetSQL
				LIMIT 1
			) THEN 'Y' ELSE 'N'
		END AS has_stamp,
		CASE
			WHEN EXISTS (
				SELECT 1
				FROM dsp_coupon_usage CS
				WHERE CS.store_no = S.no
				$targetSQL
				AND CS.mem_id = '".$mem_id."'
				LIMIT 1
			) THEN 'Y' ELSE 'N'
		END AS usage_stamp		
		")
			->from('dsp_store as S')
			->where_in('no', $ids)
			->where('isUse','Y');

		// 카테고리 필터: cat_id가 없다면 문자열 LIKE로 대응
		if ($cat !== '') {
			$this->db->group_start()
					 ->like('LOWER(category)', $cat)      // 예: 'fnb','cafe','shop' 등
					 ->group_end();
		}

		$rows = $this->db->order_by('(sOrder IS NULL)','ASC',FALSE)
			->order_by('sOrder','ASC')->order_by('no','ASC')
			->get()->result_array();

		// 필요 시 정규화: $rows = $this->store->attach_cat_code($rows);
		return $this->output->set_content_type('application/json')
			->set_output(json_encode($rows));
	}


	public function superpass() {


	}



}

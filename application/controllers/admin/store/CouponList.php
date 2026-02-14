<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CouponList extends CB_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url','form','text']);
        $this->load->library(['session','form_validation','upload']);
        $this->load->model('Dsp_store_model','store');
        $this->load->model('Coupon_model','coupon');
    }

    /** 쿠폰 리스트 (store_no 없으면 전체) */
    public function index($store_no = 0)
    {
        $store_no = (int)$store_no ?: 0;
        $rows = [];
        $cur_store = null;

        if ($store_no > 0) {
            $cur_store = $this->store->get($store_no);
            $rows = $this->coupon->list_by_store2($store_no, 'admin'); // 관리자에선 ko 기본
        }

        $view = [
			'view' => [],
            'store_no'  => $store_no,
            'cur_store' => $cur_store,
            'rows'      => $rows,
            'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash(),
        ];

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'coupon_list');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
    }

    /** 등록/수정 폼 */
    public function edit($store_no, $coupon_no = 0)
    {
        $store_no  = (int)$store_no;
        $coupon_no = (int)$coupon_no;
        $cur_store = $this->store->get($store_no);
        if (!$cur_store) show_error('Store not found.', 404);

        $row = [];
        if ($coupon_no) {
			$row = $this->site->selectCI("*", "coupon", array("coupon_no"=>$coupon_no), "coupon_no desc");
			$row = isset($row[0]) ? $row[0] : [];
			if (empty($row)) alert("요청한 정보가 없습니다.");
		}

        $view = [
			'view' => [],
            'store_no'  => $store_no,
            'row'       => $row,
            'cur_store' => $cur_store,
            'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash(),
        ];

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'coupon_form');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
    }

    /** 저장 */
    public function save()
    {
        if (!$this->input->post()) show_404();

        $store_no  = (int)$this->input->post('store_no', true);
        $coupon_no = (int)$this->input->post('coupon_no', true);

		$target_audience = $this->input->post('target_audience', true);

        // 검증
        $this->form_validation->set_rules('title_kr','쿠폰명(KR)','trim|required|max_length[200]');
        $this->form_validation->set_rules('title_en','쿠폰명(EN)','trim|max_length[200]');
        $this->form_validation->set_rules('dc_type','할인타입','trim|max_length[10]');
        $this->form_validation->set_rules('dc_amount','할인값','trim|integer');

        if (!$this->form_validation->run()) {
            return $this->edit($store_no, $coupon_no);
        }

        // 업로드(선택)
        $main_img = $this->input->post('main_img_old', true);
        if (!empty($_FILES['main_img']['name'])) {
            $conf = [
                'upload_path'   => FCPATH.'uploads/coupon/',
                'allowed_types' => 'jpg|jpeg|png|webp',
                'encrypt_name'  => TRUE,
                'max_size'      => 4096,
            ];
            if (!is_dir($conf['upload_path'])) @mkdir($conf['upload_path'],0777,true);
            $this->upload->initialize($conf);
            if ($this->upload->do_upload('main_img')) {
                $up = $this->upload->data();
                $main_img = $up['file_name'];
            } else {
                $data['upload_error'] = $this->upload->display_errors('','');
            }
        }

        $payload = [
            'store_no'    => $store_no,
            'coupon_code' => trim($this->input->post('coupon_code', true)),
            'title_kr'    => trim($this->input->post('title_kr', true)),
            'title_en'    => trim($this->input->post('title_en', true)),
            'desc_kr'     => trim($this->input->post('desc_kr', true)),
            'desc_en'     => trim($this->input->post('desc_en', true)),
            'dc_type'     => $this->input->post('dc_type', true) ?: null,
            'dc_amount'   => strlen($this->input->post('dc_amount', true)) ? (int)$this->input->post('dc_amount', true) : null,
            'valid_from'  => $this->input->post('valid_from', true) ?: null,
            'valid_to'    => $this->input->post('valid_to', true) ?: null,
            'is_stamp'    => $this->input->post('is_stamp', true)==='Y' ? 'Y':'N',
            'is_use'      => in_array($this->input->post('is_use', true), ['Y','N','W']) ? $this->input->post('is_use', true) : 'N',
			'target_audience' => $target_audience,
            'sort_order'  => strlen($this->input->post('sort_order', true)) ? (int)$this->input->post('sort_order', true) : null,
            'main_img'    => $main_img,
            'upd_date'    => date('Y-m-d H:i:s'),
			'kakao_link'		=> $this->input->post("kakao_link", true)
        ];
		$payload['limit_total']        = strlen($this->input->post('limit_total',true)) ? (int)$this->input->post('limit_total',true) : null;
		$payload['limit_per_member']   = strlen($this->input->post('limit_per_member',true)) ? (int)$this->input->post('limit_per_member',true) : null;
		$payload['limit_member_period']= $this->input->post('limit_member_period', true) ?: 'lifetime';


        if ($coupon_no) {
            $this->db->where('coupon_no', $coupon_no)->update('dsp_coupon', $payload);
        } else {
            $payload['reg_ip']  = $this->input->ip_address();
            $payload['reg_date']= date('Y-m-d H:i:s');
            $this->db->insert('dsp_coupon', $payload);
            $coupon_no = (int)$this->db->insert_id();
        }

        redirect('admin/store/couponList/store/'.$store_no);
    }

    /** 삭제 */
    public function delete($store_no, $coupon_no)
    {
        $store_no  = (int)$store_no;
        $coupon_no = (int)$coupon_no;
        // 소프트 삭제 대신 is_use='N' 권장. 여기서는 하드 삭제 예시:
        $this->db->where('coupon_no', $coupon_no)->where('store_no', $store_no)->delete('dsp_coupon');
        redirect('admin/store/couponList/store/'.$store_no);
    }
}

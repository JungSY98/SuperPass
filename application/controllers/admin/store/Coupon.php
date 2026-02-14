<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_coupon extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url','form']);
        $this->load->library(['session','form_validation','upload']);
        $this->load->model('Dsp_store_model','store');
        $this->load->model('Coupon_model','coupon');
        if (!$this->is_admin()) redirect('auth/login');
    }
    private function is_admin(){ return (int)$this->session->userdata('mem_level') >= 9; }

    /** 쿠폰 리스트 */
    public function index($store_no=0) {
        $cur_store=null; $rows=[];
        if($store_no>0){
            $cur_store=$this->store->get($store_no);
            $rows=$this->coupon->list_by_store($store_no,'ko');
        }
        $data=['store_no'=>$store_no,'cur_store'=>$cur_store,'rows'=>$rows];
        $this->load->view('admin/coupon_list',$data);
    }

    /** 등록/수정 폼 */
    public function edit($store_no,$coupon_no=0){
        $cur_store=$this->store->get($store_no);
        $row=[];
        if($coupon_no) $row=$this->coupon->get($coupon_no);
        $this->load->view('admin/coupon_form',['store_no'=>$store_no,'row'=>$row,'cur_store'=>$cur_store]);
    }

    /** 저장 */
    public function save(){
        $store_no=(int)$this->input->post('store_no',true);
        $coupon_no=(int)$this->input->post('coupon_no',true);
        $this->form_validation->set_rules('title_kr','제목','required');
        if(!$this->form_validation->run()){ return $this->edit($store_no,$coupon_no); }

        $payload=[
          'store_no'=>$store_no,
          'coupon_code'=>$this->input->post('coupon_code',true),
          'title_kr'=>$this->input->post('title_kr',true),
          'title_en'=>$this->input->post('title_en',true),
          'desc_kr'=>$this->input->post('desc_kr',true),
          'desc_en'=>$this->input->post('desc_en',true),
          'dc_type'=>$this->input->post('dc_type',true),
          'dc_amount'=>$this->input->post('dc_amount',true),
          'valid_from'=>$this->input->post('valid_from',true),
          'valid_to'=>$this->input->post('valid_to',true),
          'is_use'=>$this->input->post('is_use',true),
          'upd_date'=>date('Y-m-d H:i:s'),
        ];
        if($coupon_no){
            $this->db->where('coupon_no',$coupon_no)->update('dsp_coupon',$payload);
        } else {
            $payload['reg_ip']=$this->input->ip_address();
            $payload['reg_date']=date('Y-m-d H:i:s');
            $this->db->insert('dsp_coupon',$payload);
        }
        redirect('admin/coupon/store/'.$store_no);
    }

    /** 삭제 */
    public function delete($store_no,$coupon_no){
        $this->db->where('coupon_no',$coupon_no)->where('store_no',$store_no)->delete('dsp_coupon');
        redirect('admin/coupon/store/'.$store_no);
    }
}

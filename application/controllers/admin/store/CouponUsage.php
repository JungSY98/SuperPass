<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CouponUsage extends CB_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url','form']);
        $this->load->library(['session','pagination']);
        $this->load->model('Coupon_usage_model','usage');
        $this->load->model('Dsp_store_model','store');
    }

    public function index($store_no = 0)
    {
        $store_no = (int)$store_no ?: 1;
        $coupon_no= (int)$this->input->get('coupon_no', true) ?: 0;
        $mem_id   = (int)$this->input->get('mem_id', true) ?: 0;
        $from     = $this->input->get('from', true) ?: '';
        $to       = $this->input->get('to', true)   ?: '';

        $where = [];
        if ($store_no) $where['store_no'] = $store_no;
        if ($coupon_no) $where['coupon_no']= $coupon_no;
        if ($mem_id)    $where['mem_id']   = $mem_id;
        if ($from)      $where['from']     = $from.' 00:00:00';
        if ($to)        $where['to']       = $to.' 23:59:59';

        $rows = $this->usage->search($where, 200, 0); // 간단히 200건 제한

        $view = [
			'view'		=> [],
            'rows'     => $rows,
            'store_no' => $store_no,
            'filters'  => ['coupon_no'=>$coupon_no,'mem_id'=>$mem_id,'from'=>$from,'to'=>$to],
        ];
		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'coupon_usage');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
    }
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CouponStatics extends CB_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CouponStatics_model', 'm');
        $this->load->helper(['url','security']);
        $this->load->database();

    }

    public function index()
    {
		$view = [];
        $view['start']     = $this->input->get('start', true) ?: date('Y-m-01');
        $view['end']       = $this->input->get('end', true)   ?: date('Y-m-d');
        $view['store_no']  = $this->input->get('store_no', true)  ?: '';
        $view['coupon_no'] = $this->input->get('coupon_no', true) ?: '';
        $view['is_stamp']  = $this->input->get('is_stamp', true)  ?: '';

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'coupon_statics');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
    }

    /* -------------------- Ajax -------------------- */

	private function _p()
	{
		// 날짜 문자열 그대로 받되, 빈 값 처리
		$start = $this->input->get('start',  true);
		$end   = $this->input->get('end',    true);

		// 숫자 파라미터는 공백/빈문자면 null 로
		$store_no  = $this->input->get('store_no',  true);
		$coupon_no = $this->input->get('coupon_no', true);
		$store_no  = (isset($store_no)  && $store_no  !== '') ? (int)$store_no  : null;
		$coupon_no = (isset($coupon_no) && $coupon_no !== '') ? (int)$coupon_no : null;

		/**
		 * is_stamp 정상화
		 *  - '', null -> '' (필터 없음)
		 *  - true 계열('1','true','y','on') -> 1
		 *  - false 계열('0','false','n','off') -> 0
		 *  - 그 외 -> ''
		 */
		$raw_stamp = $this->input->get('is_stamp', true);
		$is_stamp  = ''; // 기본은 필터 미적용

		if ($raw_stamp !== null && $raw_stamp !== '') {
			$bool = filter_var($raw_stamp, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
			if ($bool === true)  $is_stamp = 1;
			elseif ($bool === false) $is_stamp = 0;
			else $is_stamp = ''; // 이상한 값은 필터 미적용
		}

		// 날짜 포맷 보정(없으면 null)
		$start = (isset($start) && $start !== '') ? trim($start) : null;
		$end   = (isset($end)   && $end   !== '') ? trim($end)   : null;

		return [
			'start'     => $start,
			'end'       => $end,
			'store_no'  => $store_no,
			'coupon_no' => $coupon_no,
			'is_stamp'  => $is_stamp,
		];
	}

    private function _ok($d){ $this->output->set_content_type('application/json')->set_output(json_encode(['ok'=>true]+$d)); }

    public function summary()     { $this->_ok($this->m->summary($this->_p())); }
    public function top_stores()  { $this->_ok(['rows'=>$this->m->top_stores($this->_p(), 10)]); }
    public function top_coupons() { $this->_ok(['rows'=>$this->m->top_coupons($this->_p(), 10)]); }
    public function device()      { $this->_ok(['rows'=>$this->m->device($this->_p())]); }
    public function heatmap()     { $this->_ok(['rows'=>$this->m->heatmap($this->_p())]); }
    public function coupon_table(){ $this->_ok(['rows'=>$this->m->coupon_table($this->_p())]); }

    /* --- 브랜드/몰 그룹핑 --- */
    public function group_brand() { $this->_ok(['rows'=>$this->m->group_by_field($this->_p(),'brand')]); }
    public function group_mall()  { $this->_ok(['rows'=>$this->m->group_by_field($this->_p(),'mall')]); }
	private function _lower($v){
		return is_string($v) ? strtolower($v) : (is_null($v) ? '' : strtolower((string)$v));
	}
    /* --- Export --- */
    public function export_csv()
    {
        $rows = $this->m->export_rows($this->_p(), 100000);
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="coupon_usage_'.date('Ymd_His').'.csv"');
        echo "\xEF\xBB\xBF";
        $out=fopen('php://output','w');
        fputcsv($out,['used_at','mem_id','store_no','store_kr','store_en','coupon_no','coupon_kr','coupon_en','price_orig','discount','price_pay','dc_type','dc_amount','device','browser','ip']);
        foreach($rows as $r){
            fputcsv($out,[$r['used_at'],$r['mem_id'],$r['store_no'],$r['sNameKR'],$r['sNameEN'],$r['coupon_no'],$r['title_kr'],$r['title_en'],$r['price_orig'],$r['discount'],$r['price_pay'],$r['dc_type'],$r['dc_amount'],$r['device'],$r['browser'],$r['ip']]);
        }
        fclose($out); exit;
    }

    public function export_xlsx()
    {
        // PhpSpreadsheet 사용(Composer autoload 필요)
        if (!class_exists(\PhpOffice\PhpSpreadsheet\Spreadsheet::class)) {
            // vendor/autoload.php 가 index.php 또는 config/bootstrap에서 로드되어야 합니다.
            show_error('PhpSpreadsheet not installed. Run: composer require phpoffice/phpspreadsheet', 500);
        }
        $rows = $this->m->export_rows($this->_p(), 100000);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()->setTitle('coupon_usage');
        $headers = ['used_at','mem_id','store_no','store_kr','store_en','coupon_no','coupon_kr','coupon_en','price_orig','discount','price_pay','dc_type','dc_amount','device','browser','ip'];
        $sheet->fromArray($headers, null, 'A1');
        $i=2;
        foreach($rows as $r){
            $sheet->fromArray([
                $r['used_at'],$r['mem_id'],$r['store_no'],$r['sNameKR'],$r['sNameEN'],
                $r['coupon_no'],$r['title_kr'],$r['title_en'],
                $r['price_orig'],$r['discount'],$r['price_pay'],$r['dc_type'],$r['dc_amount'],
                $r['device'],$r['browser'],$r['ip']
            ], null, 'A'.$i++);
        }
        // 숫자 서식(금액)
        $sheet->getStyle('I2:K'.$i)->getNumberFormat()->setFormatCode('#,##0');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="coupon_usage_'.date('Ymd_His').'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}

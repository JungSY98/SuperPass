<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CouponStatics extends CB_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CouponStatics_model', 'm');
        $this->load->helper(['url','security']);
        $this->load->model('Store_click_log_model','clicklog');
        $this->load->model('Dsp_store_model','store');
        $this->load->model('Coupon_model','coupon');
        $this->load->model('Coupon_usage_model','usage');
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
    public function top_stores()  { $this->_ok(['rows'=>$this->m->top_stores($this->_p(), 30)]); }
    public function top_coupons() { $this->_ok(['rows'=>$this->m->top_coupons($this->_p(), 30)]); }
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


    /** JSON: summary numbers for range */
    public function summary_data()
    {
        $from = $this->input->get('from', true);
        $to   = $this->input->get('to', true);

        if (!$from) $from = date('Y-m-01');
        if (!$to)   $to   = date('Y-m-d', strtotime('+1 day'));

        // ---- total members
        $total_members = (int) $this->db->select('COUNT(*) AS c')->get('dsp_member')->row()->c;

        // ---- active members (clicked any store in range)
        $this->db->from('dsp_store_click_log')->select('COUNT(DISTINCT mem_id) AS c');
        $this->db->where('clicked_at >=', $from);
        $this->db->where('clicked_at <', $to);
        $active_click_members = (int) $this->db->get()->row()->c;

        // ---- coupon users (used any coupon in range)
        $this->db->from('dsp_coupon_usage')->select('COUNT(DISTINCT mem_id) AS c');
        $this->db->where('used_at >=', $from);
        $this->db->where('used_at <', $to);
        $coupon_users = (int) $this->db->get()->row()->c;

        // ---- clicks total
        $this->db->from('dsp_store_click_log')->select('COUNT(*) AS c');
        $this->db->where('clicked_at >=', $from);
        $this->db->where('clicked_at <', $to);
        $clicks_total = (int) $this->db->get()->row()->c;

        // ---- coupon uses total
        $this->db->from('dsp_coupon_usage')->select('COUNT(*) AS c');
        $this->db->where('used_at >=', $from);
        $this->db->where('used_at <', $to);
        $uses_total = (int) $this->db->get()->row()->c;

        // ---- conversion (click-member -> coupon-member) in range
        $conversion = $active_click_members > 0 ? round(($coupon_users / $active_click_members) * 100, 1) : 0.0;

		$genderMap = (array) $this->config->item('arrayGender'); // 1~5 → 라벨
        // Clicks: 기간 내 상점 클릭에서 성별 분포 (Top5)
        $rows_gc = $this->db->query("
            SELECT m.mem_sex AS sex, COUNT(*) AS cnt
            FROM dsp_store_click_log l
            JOIN dsp_member m ON m.mem_id = l.mem_id
            WHERE l.clicked_at >= ? AND l.clicked_at < ?
            GROUP BY sex
            ORDER BY cnt DESC
            LIMIT 5
        ", [$from, $to])->result_array();

        // Usage: 기간 내 쿠폰 사용에서 성별 분포 (Top5)
        $rows_gu = $this->db->query("
            SELECT m.mem_sex AS sex, COUNT(*) AS cnt
            FROM dsp_coupon_usage u
            JOIN dsp_member m ON m.mem_id = u.mem_id
            WHERE u.used_at >= ? AND u.used_at < ?
            GROUP BY sex
            ORDER BY cnt DESC
            LIMIT 5
        ", [$from, $to])->result_array();

        $gender = ['clicks' => [], 'usage' => []];
        foreach ($rows_gc as $r) {
            $label = isset($genderMap[(int)$r['sex']]) ? $genderMap[(int)$r['sex']] : 'Unknown';
            $gender['clicks'][] = ['label' => $label, 'cnt' => (int)$r['cnt']];
        }
        foreach ($rows_gu as $r) {
            $label = isset($genderMap[(int)$r['sex']]) ? $genderMap[(int)$r['sex']] : 'Unknown';
            $gender['usage'][] = ['label' => $label, 'cnt' => (int)$r['cnt']];
        }

        // 신규 회원수 (기간 내 가입)  ※ 컬럼명이 다르면 mem_register_datetime 부분을 여러분 컬럼명으로 변경
        $new_members = (int) $this->db->select('COUNT(*) AS c')
            ->from('dsp_member')
            ->where('mem_register_datetime >=', $from)
            ->where('mem_register_datetime <',  $to)
            ->get()->row()->c;

        // 로그인한 회원수 (기간 내 마지막 로그인)  ※ 컬럼명이 다르면 mem_lastlogin_datetime을 변경
        $active_login_members = (int) $this->db->select('COUNT(*) AS c')
            ->from('dsp_member')
            ->where('mem_lastlogin_datetime >=', $from)
            ->where('mem_lastlogin_datetime <',  $to)
            ->get()->row()->c;

        // 내국/외국 회원수 (회원 메타의 mem_nation 사용)
        $domestic_members = (int) $this->db->query("
            SELECT COUNT(DISTINCT m.mem_id) AS c
            FROM dsp_member m
            LEFT JOIN dsp_member_extra_vars v
              ON v.mem_id=m.mem_id AND v.mev_key='mem_nation'
            WHERE COALESCE(v.mev_value,'') = 'Korea, Republic of'
        ")->row()->c;

        $foreign_members  = (int) $this->db->query("
            SELECT COUNT(DISTINCT m.mem_id) AS c
            FROM dsp_member m
            LEFT JOIN dsp_member_extra_vars v
              ON v.mem_id=m.mem_id AND v.mev_key='mem_nation'
            WHERE COALESCE(v.mev_value,'') <> 'Korea, Republic of'
        ")->row()->c;

        /* ========== [추가] 회원 분포 (Top5, 회원 기준) ========== */
        $member_distrib = [];

        // 연령 분포(회원 기준)
        $member_distrib['age'] = $this->db->query("
            SELECT COALESCE(v.mev_value,'Unknown') AS label, COUNT(DISTINCT v.mem_id) AS cnt
            FROM dsp_member_extra_vars v
            WHERE v.mev_key='mem_age'
            GROUP BY label
            ORDER BY cnt DESC
            LIMIT 5
        ")->result_array();

        // 국가 분포(회원 기준)
        $member_distrib['nation'] = $this->db->query("
            SELECT COALESCE(v.mev_value,'Unknown') AS label, COUNT(DISTINCT v.mem_id) AS cnt
            FROM dsp_member_extra_vars v
            WHERE v.mev_key='mem_nation'
            GROUP BY label
            ORDER BY cnt DESC
            LIMIT 5
        ")->result_array();

        // 목적 분포(회원 기준)
        $member_distrib['purpose'] = $this->db->query("
            SELECT COALESCE(v.mev_value,'Unknown') AS label, COUNT(DISTINCT v.mem_id) AS cnt
            FROM dsp_member_extra_vars v
            WHERE v.mev_key='mem_purpose'
            GROUP BY label
            ORDER BY cnt DESC
            LIMIT 5
        ")->result_array();



        // ---- Top store by unique coupon users
        $top_store = $this->db->select('s.no, s.sNameKR AS store, COUNT(DISTINCT u.mem_id) AS users')
            ->from('dsp_coupon_usage u')
            ->join('dsp_store s','s.no=u.store_no','left')
            ->where('u.used_at >=', $from)
            ->where('u.used_at <',  $to)
            ->group_by('s.no, s.sNameKR')
            ->order_by('users','DESC')
            ->limit(1)
            ->get()->row_array();

        // ---- Top coupon by uses
        $top_coupon = $this->db->select('c.coupon_no, IFNULL(c.title_kr, c.title_en) AS title, COUNT(*) AS uses')
            ->from('dsp_coupon_usage u')
            ->join('dsp_coupon c','c.coupon_no = u.coupon_no','left')
            ->where('u.used_at >=', $from)
            ->where('u.used_at <',  $to)
            ->group_by('c.coupon_no, title')
            ->order_by('uses','DESC')
            ->limit(1)
            ->get()->row_array();

        // ---- Age/Nation/Purpose distribution (top 5 by clicks)
        $distrib = [];
        $distrib['age'] = $this->db->query("
            SELECT COALESCE(v.mev_value,'Unknown') AS label, COUNT(*) AS cnt
            FROM dsp_store_click_log l
            LEFT JOIN dsp_member_extra_vars v ON v.mem_id=l.mem_id AND v.mev_key='mem_age'
            WHERE l.clicked_at >= ? AND l.clicked_at < ?
            GROUP BY label ORDER BY cnt DESC LIMIT 5
        ", [$from,$to])->result_array();

        $distrib['nation'] = $this->db->query("
            SELECT COALESCE(v.mev_value,'Unknown') AS label, COUNT(*) AS cnt
            FROM dsp_store_click_log l
            LEFT JOIN dsp_member_extra_vars v ON v.mem_id=l.mem_id AND v.mev_key='mem_nation'
            WHERE l.clicked_at >= ? AND l.clicked_at < ?
            GROUP BY label ORDER BY cnt DESC LIMIT 5
        ", [$from,$to])->result_array();

        $distrib['purpose'] = $this->db->query("
            SELECT COALESCE(v.mev_value,'Unknown') AS label, COUNT(*) AS cnt
            FROM dsp_store_click_log l
            LEFT JOIN dsp_member_extra_vars v ON v.mem_id=l.mem_id AND v.mev_key='mem_purpose'
            WHERE l.clicked_at >= ? AND l.clicked_at < ?
            GROUP BY label ORDER BY cnt DESC LIMIT 5
        ", [$from,$to])->result_array();

        $out = [
            'from' => $from,
            'to'   => $to,
            'kpis' => [
                'total_members'        => $total_members,
                'active_click_members' => $active_click_members,
                'coupon_users'         => $coupon_users,
                'clicks_total'         => $clicks_total,
                'uses_total'           => $uses_total,
                'conversion_percent'   => $conversion,
            ],
			'member_distrib' => $member_distrib,
            'top_store'  => $top_store ?: null,
            'top_coupon' => $top_coupon ?: null,
            'distrib'    => $distrib,
			'gender' => $gender   // [추가]
        ];

        return $this->output->set_content_type('application/json')
            ->set_output(json_encode($out));
    }

    /** Sankey JSON for admin
     * q=age|nation|purpose , mode=click|use , from=YYYY-MM-DD , to=YYYY-MM-DD , top=50
     */
    public function sankey_data(){
        $q    = strtolower(trim($this->input->get('q', true) ?: 'age'));
        $mode = strtolower(trim($this->input->get('mode', true) ?: 'click'));
        $from = $this->input->get('from', true);
        $to   = $this->input->get('to', true);
        $top  = (int)($this->input->get('top', true) ?: 50);

        $dimKey = $q==='nation' ? 'mem_nation' : ($q==='purpose' ? 'mem_purpose' : 'mem_age');
        $dimSql = "COALESCE(v.mev_value,'Unknown')";

        if ($mode === 'click') {
            $rows1 = $this->db->query("
                SELECT {$dimSql} AS src, s.sNameKR AS store, COUNT(*) AS w
                FROM dsp_store_click_log l
                LEFT JOIN dsp_member_extra_vars v ON v.mem_id=l.mem_id AND v.mev_key=?
                LEFT JOIN dsp_store s ON s.no=l.store_no
                WHERE l.clicked_at >= ? AND l.clicked_at < ?
                GROUP BY src, store
                ORDER BY w DESC
                LIMIT {$top}
            ", [$dimKey,$from,$to])->result_array();

            $links = [];
            foreach ($rows1 as $r) { $links[] = [$r['src'], $r['store'] ?: 'Unknown store', (int)$r['w']]; }
            return $this->output->set_content_type('application/json')->set_output(json_encode($links));
        }

        $rowsA = $this->db->query("
            SELECT {$dimSql} AS src, s.sNameKR AS store, COUNT(*) AS w
            FROM dsp_coupon_usage u
            LEFT JOIN dsp_member_extra_vars v ON v.mem_id=u.mem_id AND v.mev_key=?
            LEFT JOIN dsp_store s ON s.no=u.store_no
            WHERE u.used_at >= ? AND u.used_at < ?
            GROUP BY src, store
            ORDER BY w DESC
            LIMIT {$top}
        ", [$dimKey,$from,$to])->result_array();

        $rowsB = $this->db->query("
            SELECT s.sNameKR AS store, CONCAT('Use: ', IFNULL(c.title_kr, c.title_en)) AS coupon, COUNT(*) AS w
            FROM dsp_coupon_usage u
            LEFT JOIN dsp_store s ON s.no=u.store_no
            LEFT JOIN dsp_coupon c ON c.coupon_no=u.coupon_no
            WHERE u.used_at >= ? AND u.used_at < ?
            GROUP BY store, coupon
            ORDER BY w DESC
            LIMIT {$top}
        ", [$from,$to])->result_array();





        $links = [];
        foreach ($rowsA as $r) { $links[] = [$r['src'], $r['store'] ?: 'Unknown store', (int)$r['w']]; }
        foreach ($rowsB as $r) { $links[] = [$r['store'] ?: 'Unknown store', $r['coupon'] ?: 'Unknown coupon', (int)$r['w']]; }

        return $this->output->set_content_type('application/json')->set_output(json_encode($links));
    }

}

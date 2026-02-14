<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stats extends CB_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Store_click_log_model','clicklog');
        $this->load->model('Coupon_usage_model','usage');
        $this->load->model('Dsp_store_model','store');
        $this->load->model('Coupon_model','coupon');
        $this->load->helper(['url']);
    }

    public function index(){
        $view = [];
        $layoutconfig = [
            'path'              => 'stats',
            'layout'            => 'layout',
            'skin'              => 'sankey',
            'layout_dir'        => 'views',
            'mobile_layout_dir' => 'views',
            'use_sidebar'       => false,
            'use_banners'       => false,
            'use_sidebar_banners'=> false,
            'use_footer_banner' => false
        ];

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'stats');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
    }

    /** JSON for Sankey
     * q=age|nation|purpose , mode=click|use , from=YYYY-MM-DD , to=YYYY-MM-DD , top=50
     * returns: [[src, mid, w], [mid, dst, w], ...]
     */
	public function data(){
		$q    = strtolower(trim($this->input->get('q', true) ?: 'age'));     // age|nation|purpose|gender
		$mode = strtolower(trim($this->input->get('mode', true) ?: 'click')); // click|use
		$from = $this->input->get('from', true);
		$to   = $this->input->get('to', true);
		$top  = (int)($this->input->get('top', true) ?: 50);

		// ---- 공통: 성별 라벨 CASE 식 준비 (q=gender일 때만 사용)
		$isGender = ($q === 'gender');
		$genderCase = null;
		if ($isGender) {
			$genderMap = (array) $this->config->item('arrayGender'); // 1~5 => 라벨
			// CASE m.mem_sex WHEN 1 THEN 'Male' ... ELSE 'Unknown' END
			$case = "CASE m.mem_sex ";
			for ($i=1; $i<=5; $i++) {
				$label = isset($genderMap[$i]) ? $genderMap[$i] : ('Type'.$i);
				$case .= "WHEN {$i} THEN " . $this->db->escape($label) . " ";
			}
			$case .= "ELSE 'Unknown' END";
			$genderCase = $case;
		}

		// ========= CLICK MODE (dimension -> store) =========
		if ($mode === 'click') {

			if ($isGender) {
				// 성별 -> 상점
				$this->db->select("{$genderCase} AS src, s.sNameKR AS store, COUNT(*) AS w", false)
					->from('dsp_store_click_log AS l')
					->join('dsp_member AS m', 'm.mem_id = l.mem_id', 'left')
					->join('dsp_store  AS s', 's.no = l.store_no', 'left');
				if ($from) $this->db->where('l.clicked_at >=', $from);
				if ($from) $this->db->where('l.clicked_at >=', $from);
				if ($to)   $this->db->where('l.clicked_at <=',  $to . ' 23:59:59');
				$rows = $this->db->group_by('src, store')->order_by('w','DESC')->limit($top)->get()->result_array();

				$links = [];
				foreach ($rows as $r) {
					$links[] = [$r['src'] ?: 'Unknown', $r['store'] ?: 'Unknown store', (int)$r['w']];
				}
				return $this->output->set_content_type('application/json')->set_output(json_encode($links));
			}

			// age|nation|purpose 기존 로직 (뷰 조인)
			$dimCol = $q==='nation' ? 'nation' : ($q==='purpose' ? 'purpose' : 'age_group');
			$view   = $q==='nation' ? 'v_member_nation' : ($q==='purpose' ? 'v_member_purpose' : 'v_member_age');

			$this->db->select("v.${dimCol} AS src, s.sNameKR AS store, COUNT(*) AS w", false)
				->from('dsp_store_click_log AS l')
				->join($view.' AS v', 'v.mem_id = l.mem_id','left')
				->join('dsp_store AS s', 's.no = l.store_no','left');
			if ($from) $this->db->where('l.clicked_at >=', $from);
			if ($to)   $this->db->where('l.clicked_at <=',  $to . ' 23:59:59');
			$rows = $this->db->group_by('src, store')->order_by('w','DESC')->limit($top)->get()->result_array();

			$links = [];
			foreach ($rows as $r) {
				$links[] = [ ($r['src'] ?: 'Unknown'), ($r['store'] ?: 'Unknown store'), (int)$r['w'] ];
			}
			return $this->output->set_content_type('application/json')->set_output(json_encode($links));
		}


		// ========= USAGE MODE (dimension -> store -> coupon) =========
		// Explicitly handle 'use' mode (default fallback)
		
		if ($isGender) {
			// 1단계: 성별 -> 상점
			$this->db->select("{$genderCase} AS src, s.sNameKR AS store, COUNT(*) AS w", false)
				->from('dsp_coupon_usage AS u')
				->join('dsp_member AS m', 'm.mem_id = u.mem_id', 'left')
				->join('dsp_store  AS s', 's.no = u.store_no', 'left');
			if ($from) $this->db->where('u.used_at >=', $from);
			if ($to)   $this->db->where('u.used_at <=',  $to . ' 23:59:59');
			$rowsA = $this->db->group_by('src, store')->order_by('w','DESC')->limit($top)->get()->result_array();

			// 2단계: 상점 -> 쿠폰
			$this->db->select("s.sNameKR AS store, CONCAT('Use: ', IFNULL(c.title_kr, c.title_en)) AS coupon, COUNT(*) AS w", false)
				->from('dsp_coupon_usage AS u')
				->join('dsp_store  AS s', 's.no = u.store_no', 'left')
				->join('dsp_coupon AS c', 'c.coupon_no = u.coupon_no', 'left');
			if ($from) $this->db->where('u.used_at >=', $from);
			if ($to)   $this->db->where('u.used_at <=',  $to . ' 23:59:59');
			$rowsB = $this->db->group_by('store, coupon')->order_by('w','DESC')->limit($top)->get()->result_array();

			$links = [];
			foreach ($rowsA as $r) { $links[] = [ ($r['src'] ?: 'Unknown'), ($r['store'] ?: 'Unknown store'), (int)$r['w'] ]; }
			foreach ($rowsB as $r) { $links[] = [ ($r['store'] ?: 'Unknown store'), ($r['coupon'] ?: 'Unknown coupon'), (int)$r['w'] ]; }

			return $this->output->set_content_type('application/json')->set_output(json_encode($links));
		}

		// age|nation|purpose 기존 로직
		$dimCol = $q==='nation' ? 'nation' : ($q==='purpose' ? 'purpose' : 'age_group');
		$view   = $q==='nation' ? 'v_member_nation' : ($q==='purpose' ? 'v_member_purpose' : 'v_member_age');

		// 1단계: dim -> store
		$this->db->select("v.${dimCol} AS src, s.sNameKR AS store, COUNT(*) AS w", false)
			->from('dsp_coupon_usage AS u')
			->join($view.' AS v', 'v.mem_id = u.mem_id','left')
			->join('dsp_store AS s', 's.no = u.store_no','left');
		if ($from) $this->db->where('u.used_at >=', $from);
		if ($to)   $this->db->where('u.used_at <=',  $to . ' 23:59:59');
		$rowsA = $this->db->group_by('src, store')->order_by('w','DESC')->limit($top)->get()->result_array();

		// 2단계: store -> coupon
		$this->db->select("s.sNameKR AS store, CONCAT('Use: ', IFNULL(c.title_kr, c.title_en)) AS coupon, COUNT(*) AS w", false)
			->from('dsp_coupon_usage AS u')
			->join('dsp_store AS s','s.no=u.store_no','left')
			->join('dsp_coupon AS c','c.coupon_no=u.coupon_no','left');
		if ($from) $this->db->where('u.used_at >=', $from);
		if ($to)   $this->db->where('u.used_at <=',  $to . ' 23:59:59');
		$rowsB = $this->db->group_by('store, coupon')->order_by('w','DESC')->limit($top)->get()->result_array();

		$links = [];
		foreach ($rowsA as $r) { $links[] = [ ($r['src'] ?: 'Unknown'), ($r['store'] ?: 'Unknown store'), (int)$r['w'] ]; }
		foreach ($rowsB as $r) { $links[] = [ ($r['store'] ?: 'Unknown store'), ($r['coupon'] ?: 'Unknown coupon'), (int)$r['w'] ]; }

		return $this->output->set_content_type('application/json')->set_output(json_encode($links));
		return $this->output->set_content_type('application/json')->set_output(json_encode($links));
	}

	public function excel_download()
	{
		$q    = strtolower(trim($this->input->get('q', true) ?: 'age'));     // age|nation|purpose|gender
		$from = $this->input->get('from', true);
		$to   = $this->input->get('to', true);

		// Load PhpSpreadsheet
		if (file_exists(FCPATH . 'vendor/autoload.php')) {
			require_once FCPATH . 'vendor/autoload.php';
		}

		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

		// ---------------------------------------------------------
		// Sheet 1: Category > Store > Coupon Usage
		// ---------------------------------------------------------
		$sheet1 = $spreadsheet->getActiveSheet();
		$sheet1->setTitle('Coupon Usage');
		$sheet1->setCellValue('A1', 'Category (' . $q . ')');
		$sheet1->setCellValue('B1', 'Store');
		$sheet1->setCellValue('C1', 'Coupon');
		$sheet1->setCellValue('D1', 'Usage Count');

		// Query for Sheet 1
		$this->_apply_filter_query($q, 'dsp_coupon_usage', 'used_at', $from, $to);
		$this->db->select("s.sNameKR AS store, IFNULL(c.title_kr, c.title_en) AS coupon, COUNT(*) AS w", false)
			->join('dsp_store  AS s', 's.no = u.store_no', 'left')
			->join('dsp_coupon AS c', 'c.coupon_no = u.coupon_no', 'left')
			->group_by('src, store, coupon')
			->order_by('w', 'DESC');
		$rows1 = $this->db->get()->result_array();

		$rowIdx = 2;
		foreach ($rows1 as $r) {
			$sheet1->setCellValue('A' . $rowIdx, $r['src'] ?: 'Unknown');
			$sheet1->setCellValue('B' . $rowIdx, $r['store'] ?: 'Unknown store');
			$sheet1->setCellValue('C' . $rowIdx, $r['coupon'] ?: 'Unknown coupon');
			$sheet1->setCellValue('D' . $rowIdx, $r['w']);
			$rowIdx++;
		}


		// ---------------------------------------------------------
		// Sheet 2: Category > Click Count
		// ---------------------------------------------------------
		$sheet2 = $spreadsheet->createSheet();
		$sheet2->setTitle('Click Count');
		$sheet2->setCellValue('A1', 'Category (' . $q . ')');
		$sheet2->setCellValue('B1', 'Store');
		$sheet2->setCellValue('C1', 'Click Count');


		// Query for Sheet 2
		// Manual query build for Click Count
		$this->db->from('dsp_store_click_log AS u'); // Use alias 'u' to align with common join logic if needed, or 'l'
		
		if ($q === 'gender') {
			$genderMap = (array) $this->config->item('arrayGender');
			$case = "CASE m.mem_sex ";
			for ($i=1; $i<=5; $i++) {
				$label = isset($genderMap[$i]) ? $genderMap[$i] : ('Type'.$i);
				$case .= "WHEN {$i} THEN " . $this->db->escape($label) . " ";
			}
			$case .= "ELSE 'Unknown' END";
			$this->db->select("{$case} AS src", false);
		} else {
			$dimCol = $q === 'nation' ? 'nation' : ($q === 'purpose' ? 'purpose' : 'age_group');
			$view   = $q === 'nation' ? 'v_member_nation' : ($q === 'purpose' ? 'v_member_purpose' : 'v_member_age');
			$this->db->select("v.{$dimCol} AS src", false);
			$this->db->join("{$view} AS v", 'v.mem_id = u.mem_id', 'left');
		}

		$this->db->select("s.sNameKR AS store, COUNT(*) AS w", false)
			->join('dsp_member AS m', 'm.mem_id = u.mem_id', 'left')
			->join('dsp_store AS s', 's.no = u.store_no', 'left')
			->group_by('src, store')
			->order_by('w', 'DESC');

		if ($from) $this->db->where('u.clicked_at >=', $from);
		if ($to)   $this->db->where('u.clicked_at <=',  $to . ' 23:59:59');

		$rows2 = $this->db->get()->result_array();


		$rowIdx = 2;
		foreach ($rows2 as $r) {
			$sheet2->setCellValue('A' . $rowIdx, $r['src'] ?: 'Unknown');
			$sheet2->setCellValue('B' . $rowIdx, $r['store'] ?: 'Unknown store');
			$sheet2->setCellValue('C' . $rowIdx, $r['w']);
			$rowIdx++;
		}


		// ---------------------------------------------------------
		// Sheet 3: Raw Data (Coupon Usage Log)
		// ---------------------------------------------------------
		$sheet3 = $spreadsheet->createSheet();
		$sheet3->setTitle('Raw Data (Usage)');
		$sheet3->setCellValue('A1', 'Date');
		$sheet3->setCellValue('B1', 'Category (' . $q . ')');
		$sheet3->setCellValue('C1', 'Member ID');
		$sheet3->setCellValue('D1', 'Member Name');
		$sheet3->setCellValue('E1', 'Store');
		$sheet3->setCellValue('F1', 'Coupon');

		// Query for Sheet 3
		// Manual query build to separate filtering logic from raw data retrieval
		// We still try to get 'src' (category) but as a LEFT JOIN, so it shouldn't filter rows
		
		$this->db->from('dsp_coupon_usage AS u');
		
		if ($q === 'gender') {
			$genderMap = (array) $this->config->item('arrayGender');
			$case = "CASE m.mem_sex ";
			for ($i=1; $i<=5; $i++) {
				$label = isset($genderMap[$i]) ? $genderMap[$i] : ('Type'.$i);
				$case .= "WHEN {$i} THEN " . $this->db->escape($label) . " ";
			}
			$case .= "ELSE 'Unknown' END";
			$this->db->select("{$case} AS src", false);
		} else {
			$dimCol = $q === 'nation' ? 'nation' : ($q === 'purpose' ? 'purpose' : 'age_group');
			$view   = $q === 'nation' ? 'v_member_nation' : ($q === 'purpose' ? 'v_member_purpose' : 'v_member_age');
			$this->db->select("v.{$dimCol} AS src", false);
			$this->db->join("{$view} AS v", 'v.mem_id = u.mem_id', 'left');
		}

		$this->db->select("u.used_at, m.mem_userid, m.mem_username, s.sNameKR AS store, IFNULL(c.title_kr, c.title_en) AS coupon", false)
			->join('dsp_member AS m', 'm.mem_id = u.mem_id', 'left')
			->join('dsp_store  AS s', 's.no = u.store_no', 'left')
			->join('dsp_coupon AS c', 'c.coupon_no = u.coupon_no', 'left')
			->order_by('u.used_at', 'DESC');

		if ($from) $this->db->where('u.used_at >=', $from);
		if ($to)   $this->db->where('u.used_at <=',  $to . ' 23:59:59');

		$rows3 = $this->db->get()->result_array();

		$rowIdx = 2;
		foreach ($rows3 as $r) {
			$sheet3->setCellValue('A' . $rowIdx, $r['used_at']);
			$sheet3->setCellValue('B' . $rowIdx, $r['src'] ?: 'Unknown');
			$sheet3->setCellValue('C' . $rowIdx, $r['mem_userid']);
			$sheet3->setCellValue('D' . $rowIdx, $r['mem_username']);
			$sheet3->setCellValue('E' . $rowIdx, $r['store']);
			$sheet3->setCellValue('F' . $rowIdx, $r['coupon']);
			$rowIdx++;
		}

		// ---------------------------------------------------------
		// Sheet 4: Raw Data (Click Log)
		// ---------------------------------------------------------
		$sheet4 = $spreadsheet->createSheet();
		$sheet4->setTitle('Raw Data (Click)');
		$sheet4->setCellValue('A1', 'Date');
		$sheet4->setCellValue('B1', 'Category (' . $q . ')');
		$sheet4->setCellValue('C1', 'Member ID');
		$sheet4->setCellValue('D1', 'Member Name');
		$sheet4->setCellValue('E1', 'Store');

		$this->db->from('dsp_store_click_log AS u');
		
		if ($q === 'gender') {
			$genderMap = (array) $this->config->item('arrayGender');
			$case = "CASE m.mem_sex ";
			for ($i=1; $i<=5; $i++) {
				$label = isset($genderMap[$i]) ? $genderMap[$i] : ('Type'.$i);
				$case .= "WHEN {$i} THEN " . $this->db->escape($label) . " ";
			}
			$case .= "ELSE 'Unknown' END";
			$this->db->select("{$case} AS src", false);
		} else {
			$dimCol = $q === 'nation' ? 'nation' : ($q === 'purpose' ? 'purpose' : 'age_group');
			$view   = $q === 'nation' ? 'v_member_nation' : ($q === 'purpose' ? 'v_member_purpose' : 'v_member_age');
			$this->db->select("v.{$dimCol} AS src", false);
			$this->db->join("{$view} AS v", 'v.mem_id = u.mem_id', 'left');
		}

		$this->db->select("u.clicked_at, m.mem_userid, m.mem_username, s.sNameKR AS store", false)
			->join('dsp_member AS m', 'm.mem_id = u.mem_id', 'left')
			->join('dsp_store  AS s', 's.no = u.store_no', 'left')
			->order_by('u.clicked_at', 'DESC');

		if ($from) $this->db->where('u.clicked_at >=', $from);
		if ($to)   $this->db->where('u.clicked_at <=',  $to . ' 23:59:59');

		$rows4 = $this->db->get()->result_array();

		$rowIdx = 2;
		foreach ($rows4 as $r) {
			$sheet4->setCellValue('A' . $rowIdx, $r['clicked_at']);
			$sheet4->setCellValue('B' . $rowIdx, $r['src'] ?: 'Unknown');
			$sheet4->setCellValue('C' . $rowIdx, $r['mem_userid']);
			$sheet4->setCellValue('D' . $rowIdx, $r['mem_username']);
			$sheet4->setCellValue('E' . $rowIdx, $r['store']);
			$rowIdx++;
		}

		// Output
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
		$filename = 'coupon_stats_' . date('YmdHis') . '.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
		exit;
	}

	// Helper to apply common filters and joins for finding 'src' (Category)
	private function _apply_filter_query($q, $table, $dateCol, $from, $to)
	{
		$isGender = ($q === 'gender');
		
		if ($isGender) {
			$genderMap = (array) $this->config->item('arrayGender');
			$case = "CASE m.mem_sex ";
			for ($i = 1; $i <= 5; $i++) {
				$label = isset($genderMap[$i]) ? $genderMap[$i] : ('Type' . $i);
				$case .= "WHEN {$i} THEN " . $this->db->escape($label) . " ";
			}
			$case .= "ELSE 'Unknown' END";
			
			$this->db->select("{$case} AS src", false);
			$this->db->from("{$table} AS u");
			$this->db->join('dsp_member AS m', 'm.mem_id = u.mem_id', 'left');
		} else {
			$dimCol = $q === 'nation' ? 'nation' : ($q === 'purpose' ? 'purpose' : 'age_group');
			$view   = $q === 'nation' ? 'v_member_nation' : ($q === 'purpose' ? 'v_member_purpose' : 'v_member_age');
			
			$this->db->select("v.{$dimCol} AS src", false);
			$this->db->from("{$table} AS u");
			$this->db->join("{$view} AS v", 'v.mem_id = u.mem_id', 'left');
			$this->db->join('dsp_member AS m', 'm.mem_id = u.mem_id', 'left'); // Join member for Raw Data details if needed
		}

		if ($from) $this->db->where("u.{$dateCol} >=", $from);
		if ($to)   $this->db->where("u.{$dateCol} <=",  $to . ' 23:59:59');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Research class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * Research 페이지를 담당하는 controller 입니다.
 */
class Research extends CB_Controller
{
	public $year;
	public $times;
	public $step2;
	/**
	 * 모델을 로딩합니다
	 */
	protected $models = array('Board');

	/**
	 * 헬퍼를 로딩합니다
	 */
	protected $helpers = array('form', 'array');

	function __construct()
	{
		parent::__construct();

		/**
		 * 라이브러리를 로딩합니다
		 */
		$this->load->library(array('querystring'));
		/**
		 * 로그인이 필요한 페이지입니다
		 */
		required_user_login();
		if ($this->member->item("mem_level")<4) {
			alert("권한이 없습니다.");
		}

		$viewTimes = $this->input->get("viewTimes", true);

		$this->year = 2023;
		$this->times = $viewTimes ? $viewTimes : 2;
		$this->step2 = array("Worker", "Sales", "Career", "CEO1", "CEO2", "Floor", "PM25", "LUX", "Noise", "VOCs", "Pollution", "Sink", "Old", "Crack", "FireExtinguisher", "FireDetector", "Wiring", "Wiringbox");

	}

	private function chkSign() {
		if ($_SERVER['REQUEST_URI']!="/research/") {
			$sign = $this->site->selectCI("*", "research_sign", array("type"=>"researcher", "mem_userid"=>$this->member->item("mem_userid")), "");
			$view['sign1'] = isset($sign[0]) ? $sign[0] : redirect("/research/");
		}
	}

	/**
	 * 전체 메인 페이지입니다
	 */
	public function index() {

		$view = array();
		$view['view'] = array();

		$view['chkStep1'] = array("inflow", "comName", "ceoName", "comZip", "comAddr1", "comAddr2", "comCode", "tax", "hasbeen");
		$view['chkStep2'] = array("Worker", "Sales", "Career", "CEO1", "CEO2", "Floor", "PM25", "LUX", "Noise", "VOCs", "Pollution", "Sink", "Old", "Crack", "FireExtinguisher", "FireDetector", "Wiring", "Wiringbox");
		$view['chkStep4'] = array("amountExpect", "amountSales", "researchDate", "capitalCapability");

		// 서명 여부
		$sign = $this->site->selectCI("*", "research_sign", array("type"=>"researcher", "mem_userid"=>$this->member->item("mem_userid")), "");
		$view['sign1'] = isset($sign[0]) ? $sign[0] : "";

		// 업체 리스트 
		$view['listD'] = $this->site->selectCI("*, ( SELECT sum(IFNULL(score, 0)) as total FROM `mf_research_step2` as S2 WHERE S2.applyNo = A.no ) as total,", "apply as A", array("year"=>$this->year, "times"=>$this->times, "researcherID "=>$this->member->item("mem_userid")), "category asc, total desc, comName asc ");

		/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'research',
			'layout' => 'layout_popup',
			'skin' => 'main',
			'layout_dir' => $this->cbconfig->item('layout_poll'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_poll'),
			'use_sidebar' => $this->cbconfig->item('sidebar_poll'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_poll'),
			'skin_dir' => $this->cbconfig->item('skin_poll'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_poll'),
			'page_title' => $page_title,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => $page_name,
		);
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}


	/**
	 * 전체 메인 페이지입니다
	 */
	public function times1() {

		$view = array();
		$view['view'] = array();

		$view['chkStep1'] = array("inflow", "comName", "ceoName", "comZip", "comAddr1", "comAddr2", "comCode", "tax", "hasbeen");
		$view['chkStep2'] = array("Worker", "Sales", "Career", "CEO1", "CEO2", "Floor", "PM25", "LUX", "Noise", "VOCs", "Pollution", "Sink", "Old", "Crack", "FireExtinguisher", "FireDetector", "Wiring", "Wiringbox");
		$view['chkStep4'] = array("amountExpect", "amountSales", "researchDate", "capitalCapability");

		// 서명 여부
		$sign = $this->site->selectCI("*", "research_sign", array("type"=>"researcher", "mem_userid"=>$this->member->item("mem_userid")), "");
		$view['sign1'] = isset($sign[0]) ? $sign[0] : "";

		// 업체 리스트 
		$view['listD'] = $this->site->selectCI("*, ( SELECT sum(IFNULL(score, 0)) as total FROM `mf_research_step2` as S2 WHERE S2.applyNo = A.no ) as total,", "apply as A", array("year"=>$this->year, "times"=>1, "researcherID "=>$this->member->item("mem_userid")), "category asc, total desc, comName asc ");

		/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'research',
			'layout' => 'layout_popup',
			'skin' => 'main',
			'layout_dir' => $this->cbconfig->item('layout_poll'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_poll'),
			'use_sidebar' => $this->cbconfig->item('sidebar_poll'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_poll'),
			'skin_dir' => $this->cbconfig->item('skin_poll'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_poll'),
			'page_title' => $page_title,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => $page_name,
		);
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}

	public function step1() {

		$view = array();
		$view['view'] = array();

		$view['applyNo'] = $no = (int)$this->uri->segment(3);

		$view['comD'] = $this->site->selectCI("*", "apply", array("researcherID"=>$this->member->item("mem_userid"), "no"=>$no), " no asc");
		$view['comD'] = isset($view['comD'][0]) ? $view['comD'][0] : alert("잘못된 접근입니다. 1");
		$researchD = $this->site->selectCI("*", "research_step1", array("researcherID"=>$this->member->item("mem_userid"), "applyNo"=>$no), "");
		$view['researchD'] = isset($researchD[0]) ? $researchD[0] : array();

		//$view['comCode2'] = $view['researchD']['comCode2'] ? $view['researchD']['comCode2'] : "C24, C25, C29";
		if ($view['comD']['category'] == '기계금속') $view['comCode'] = "C24, C25, C29";
		else if ($view['comD']['category'] == '인쇄') $view['comCode'] = "C18";
		else if ($view['comD']['category'] == '주얼리') $view['comCode'] = "C33";
		else if ($view['comD']['category'] == '수제화') $view['comCode'] = "C15";

		// 대표자 서명 여부
		$signD = $this->site->selectCI("*", "research_sign", array("type"=>"ceo", "applyNo"=>$no), "");
		$view['signD'] = isset($signD[0]) ? $signD[0] : array();

		$view['autoSave'] = $this->load->view("/research/bootstrap/autosave.php", $view, true);


		/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_poll');
		$meta_description = $this->cbconfig->item('site_meta_description_poll');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_poll');
		$meta_author = $this->cbconfig->item('site_meta_author_poll');
		$page_name = $this->cbconfig->item('site_page_name_poll');

		$layoutconfig = array(
			'path' => 'research',
			'layout' => 'layout_popup',
			'skin' => 'step1',
			'layout_dir' => $this->cbconfig->item('layout_poll'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_poll'),
			'use_sidebar' => $this->cbconfig->item('sidebar_poll'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_poll'),
			'skin_dir' => $this->cbconfig->item('skin_poll'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_poll'),
			'page_title' => $page_title,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => $page_name,
		);
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}

	public function step2() {

		$view = array();
		$view['view'] = array();

		$view['applyNo'] = $no = (int)$this->uri->segment(3);

		$view['comD'] = $this->site->selectCI("*", "apply", array("researcherID"=>$this->member->item("mem_userid"), "no"=>$no), " no asc");
		$view['comD'] = isset($view['comD'][0]) ? $view['comD'][0] : alert("잘못된 접근입니다. 1");

		
		foreach($this->step2 as $kk => $vv) {
			$view['score'.$vv] = "";
			$view['figure'.$vv] = "";
		}
		$researchD = $this->site->selectCI("*", "research_step2", array("researcherID"=>$this->member->item("mem_userid"), "applyNo"=>$no), "");
		foreach($researchD as $k => $rD) {
			if (element("score", $rD)) $view['score'.$rD['type']] = $rD['score'];
			if (element("figure", $rD)) $view['figure'.$rD['type']] = $rD['figure'];
		}



		// 포토 
		$photoD = $this->site->selectCI("*", "research_photo", array("applyNo"=>$no, "researcherID"=>$this->member->item("mem_userid")), "");
		$view['photoD'] = array();
		foreach($photoD as $kk => $pD) {
			$view['photoD'][$pD['photoType']][] = $pD;
		}

		//$view['comCode2'] = $view['researchD']['comCode2'] ? $view['researchD']['comCode2'] : "C24, C25, C29";
		$view['autoSave'] = $this->load->view("/research/bootstrap/autosave.php", $view, true);

		/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_poll');
		$meta_description = $this->cbconfig->item('site_meta_description_poll');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_poll');
		$meta_author = $this->cbconfig->item('site_meta_author_poll');
		$page_name = $this->cbconfig->item('site_page_name_poll');

		$layoutconfig = array(
			'path' => 'research',
			'layout' => 'layout_popup',
			'skin' => 'step2',
			'layout_dir' => $this->cbconfig->item('layout_poll'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_poll'),
			'use_sidebar' => $this->cbconfig->item('sidebar_poll'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_poll'),
			'skin_dir' => $this->cbconfig->item('skin_poll'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_poll'),
			'page_title' => $page_title,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => $page_name,
		);
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}


	public function step3() {

		$view = array();
		$view['view'] = array();

		$view['applyNo'] = $no = (int)$this->uri->segment(3);

		$view['comD'] = $this->site->selectCI("*", "apply", array("researcherID"=>$this->member->item("mem_userid"), "no"=>$no), " no asc");
		$view['comD'] = isset($view['comD'][0]) ? $view['comD'][0] : alert("잘못된 접근입니다. 1");

		//$view['comCode2'] = $view['researchD']['comCode2'] ? $view['researchD']['comCode2'] : "C24, C25, C29";
		$view['cate'] = $this->config->item("cate");
		$view['cateName'] = $this->config->item("cateName");

		$applyTypeD = $this->site->selectCI("*", "apply_type", array("keyNo"=>$no), "cate asc, no asc");
		foreach($applyTypeD as $k => $atD) {
			$view['applyTypeD'][$atD['aType']] = $atD['aType']=='기타' ? element('aEtc', $atD) : $atD['aType'];
		}

		$view['etcD'] = "";
		$researchD = $this->site->selectCI("*", "research_step3", array("researcherID"=>$this->member->item("mem_userid"), "applyNo"=>$no), "");
		$view['researchD'] = array();
		foreach($researchD as $kk => $rD) {
			$view['researchD']['applyCom']['item_'.$rD['code']] = $rD['applyCom'];
			$view['researchD']['applyResearch']['item_'.$rD['code']] = $rD['applyResearch'];
			if ($rD['code']=='4_6') $view['etcD'] = $rD['etc'];
		}



		// 포토 
		$view['photoD'] = array();
		$photoD = $this->site->selectCI("*", "research_photo", array("applyNo"=>$no, "researcherID"=>$this->member->item("mem_userid")), "");
		foreach($photoD as $kk => $pD) {
			$view['photoD'][$pD['photoType']][] = $pD;
		}

		$view['autoSave'] = $this->load->view("/research/bootstrap/autosave.php", $view, true);

		/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_poll');
		$meta_description = $this->cbconfig->item('site_meta_description_poll');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_poll');
		$meta_author = $this->cbconfig->item('site_meta_author_poll');
		$page_name = $this->cbconfig->item('site_page_name_poll');

		$layoutconfig = array(
			'path' => 'research',
			'layout' => 'layout_popup',
			'skin' => 'step3',
			'layout_dir' => $this->cbconfig->item('layout_poll'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_poll'),
			'use_sidebar' => $this->cbconfig->item('sidebar_poll'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_poll'),
			'skin_dir' => $this->cbconfig->item('skin_poll'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_poll'),
			'page_title' => $page_title,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => $page_name,
		);
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}



	public function step4() {

		$view = array();
		$view['view'] = array();

		$view['applyNo'] = $no = (int)$this->uri->segment(3);

		$view['comD'] = $this->site->selectCI("*", "apply", array("researcherID"=>$this->member->item("mem_userid"), "no"=>$no), " no asc");
		$view['comD'] = isset($view['comD'][0]) ? $view['comD'][0] : alert("잘못된 접근입니다. 1");

		$researchD = $this->site->selectCI("*", "research_step4", array("researcherID"=>$this->member->item("mem_userid"), "applyNo"=>$no), "");
		$view['researchD'] = isset($researchD[0]) ? $researchD[0] : array();

		// 서명 여부
		$sign = $this->site->selectCI("*", "research_sign", array("type"=>"researcher", "mem_userid"=>$this->member->item("mem_userid")), "");
		$view['sign1'] = isset($sign[0]) ? $sign[0] : "";


		$view['autoSave'] = $this->load->view("/research/bootstrap/autosave.php", $view, true);

		/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_poll');
		$meta_description = $this->cbconfig->item('site_meta_description_poll');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_poll');
		$meta_author = $this->cbconfig->item('site_meta_author_poll');
		$page_name = $this->cbconfig->item('site_page_name_poll');

		$layoutconfig = array(
			'path' => 'research',
			'layout' => 'layout_popup',
			'skin' => 'step4',
			'layout_dir' => $this->cbconfig->item('layout_poll'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_poll'),
			'use_sidebar' => $this->cbconfig->item('sidebar_poll'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_poll'),
			'skin_dir' => $this->cbconfig->item('skin_poll'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_poll'),
			'page_title' => $page_title,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => $page_name,
		);
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}

	public function save() {

		$goto = $this->input->post("goto", true);
		$applyNo = $this->input->post("applyNo", true);
		$saveStep = $this->input->post("saveStep", true);
		$researcherID = $this->member->item("mem_userid");
		

		$comD = $this->site->selectCI("*", "apply", array("no"=>$applyNo, "researcherID"=>$researcherID), "no desc");
		$comD = isset($comD[0]) ? $comD[0] : alert("로그인 유효시간이 지났거나, 잘못된 요청입니다. 다시 시도하여 주세요");

		if ($goto=='main') alert("최종 제출되었습니다.", "/research/");

/*
		$isD = $this->site->selectCI("no", "research_step1", array("applyNo"=>$applyNo), "");
		$isD = isset($isD[0]) ? true : false;
		if ($saveStep == 'step1') {
			$inflow = $this->input->post("inflow");
			$hasbeen = $this->input->post("hasbeen");
			$step1DB = array();
			$step1DB['inflow'] = implode(",", $inflow);
			$step1DB['researcherID'] = $this->member->item("mem_userid");
			$step1DB['comName'] = $this->input->post("comName", true);
			$step1DB['ceoName'] = $this->input->post("ceoName", true);
			$step1DB['comZip'] = $this->input->post("comZip", true);
			$step1DB['comAddr1'] = $this->input->post("comAddr1", true);
			$step1DB['comAddr2'] = $this->input->post("comAddr2", true);
			$step1DB['comCode'] = $this->input->post("comCode", true);
			$step1DB['tax'] = $this->input->post("tax", true);
			$step1DB['hasbeen'] = implode(",", $hasbeen);
			if ($isD) {
				$this->site->dbUpdate("research_step1", $step1DB, array("applyNo"=>$applyNo));
			} else {
				$step1DB['applyNo'] = $applyNo;
				$this->site->dbInsert("research_step1", $step1DB);
			}

			
		}
*/
		redirect("/research/".$goto."/".$applyNo);
	}



	public function ajaxSaveSign() {
		if ($this->input->is_ajax_request()) {
			$mem_id = $this->input->post("mid", true);
			$login_id = $this->member->item("mem_userid");
			if ($mem_id!=$login_id || empty($login_id)) {
				echo "로그인 유효시간이 지났거나, 잘못된 요청입니다. 다시 시도하여 주세요";
				exit;
			}
			$sign1 = $this->input->post("sign1");
			$sign2 = $this->input->post("sign2");

			$inDB = array();
			$inDB['type'] = "researcher";
			$inDB['mem_userid'] = $login_id;
			$inDB['sign1'] = $sign1;
			$inDB['sign2'] = $sign2;
			$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
			$inDB['regDate'] = date("Y-m-d H:i:s");
			$signNo = $this->site->dbInsert("research_sign", $inDB);
			if ($signNo) echo "저장되었습니다.";
			else echo "저장되지 않았습니다. 다시 시도하여 주세요";
		}
	}


	public function ajaxSaveCeoSign() {
		if ($this->input->is_ajax_request()) {
			$mem_id = $this->input->post("mid", true);
			$login_id = $this->member->item("mem_userid");
			$applyNo = $this->input->post("applyNo", true);
			if ($mem_id!=$login_id || empty($login_id)) {
				echo "로그인 유효시간이 지났거나, 잘못된 요청입니다. 다시 시도하여 주세요";
				exit;
			}
			$sign1 = $this->input->post("sign1");
			$sign2 = $this->input->post("sign2");
			
			$isD = $this->site->selectCI("no", "research_sign", array("type"=>"ceo", "applyNo"=>$applyNo), "");
			if (isset($isD[0])) {
				$inDB = array();
				$inDB['type'] = "ceo";
				$inDB['mem_userid'] = $login_id;
				$inDB['applyNo'] = $applyNo;
				$inDB['sign1'] = $sign1;
				$inDB['sign2'] = $sign2;
				$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
				$inDB['regDate'] = date("Y-m-d H:i:s");
				$signNo = $this->site->dbUpdate("research_sign", $inDB, array("type"=>"ceo", "applyNo"=>$applyNo));
				if ($signNo) echo "저장되었습니다.";
				else echo "저장되지 않았습니다. 다시 시도하여 주세요";
			} else {
				$inDB = array();
				$inDB['type'] = "ceo";
				$inDB['mem_userid'] = $login_id;
				$inDB['applyNo'] = $applyNo;
				$inDB['sign1'] = $sign1;
				$inDB['sign2'] = $sign2;
				$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
				$inDB['regDate'] = date("Y-m-d H:i:s");
				$signNo = $this->site->dbInsert("research_sign", $inDB);
				if ($signNo) echo "저장되었습니다.";
				else echo "저장되지 않았습니다. 다시 시도하여 주세요";
			}
		}
	}
	public function ajaxAutoSave() {
		if ($this->input->is_ajax_request()) {

			$saveD = $this->input->post("saveD");



			$saveStep = $this->input->post("saveStep", true);
			foreach($saveD as $k => $d) {

				if ($d['type']=='hidden' || $d['type']=='text' || $d['type']=='textarea') {
					$upDB[$d['name']] = $d['val'];
					if ($d['name']=='applyNo') {
						$applyNo = $d['val'];
						unset($upDB['applyNo']);
					}
					if ($d['name']=='saveStep') {
						$saveStep = $d['val'];
						unset($upDB['saveStep']);
					}
				}
				if ($saveStep=='step3') {
					if ($d['type']=='checkbox' || $d['type']=='radio') {
						$name = str_replace("[]", "", $d['name']);
						if ($d['isChecked']=='true') {
							${$name} = $d['val'];
						}
						$upDB[$name] = isset(${$name}) ? ${$name} : "";
					}
				} else {
					if ($d['type']=='checkbox' || $d['type']=='radio') {
						$name = str_replace("[]", "", $d['name']);
						if ($d['isChecked']=='true') {
							${$name}[] = $d['val'];
						}
						$upDB[$name] = ${$name};
					}
				}
				if ($d['type']=='select') {
					$name = str_replace("[]", "", $d['name']);
					if ($d['isChecked']=='true') {
						${$name}[] = $d['val'];
					}
					$upDB[$name] = ${$name};
				}
			}
			foreach($upDB as $kk => $v) {
				if (is_array($upDB[$kk])) $upDB[$kk] = implode(", ", $v);
			}
			unset($upDB['csrf_test_name']);
			unset($upDB['goto']);
			$upDB['researcherID'] = $this->member->item("mem_userid");
			$upDB['regIP'] = $_SERVER['REMOTE_ADDR'];
			$upDB['regDate'] = date("Y-m-d H:i:s");


			if ($saveStep == 'step2') {
				foreach($this->step2 as $k => $v) {
					$step2D = array();
					$step2D['researcherID'] = $this->member->item("mem_userid");
					$step2D['type'] = $v;
					$step2D['score'] = $upDB['score'.$v];
					$step2D['figure'] = element('figure'.$v, $upDB);
					if ($v=='Floor') {
						$step2D['figure'] = element('figure'.$v, $upDB)==0 ? '0' : element('figure'.$v, $upDB);
					}
					$step2D['regIP'] = $_SERVER['REMOTE_ADDR'];
					$step2D['regDate'] = date("Y-m-d H:i:s");
					$is2D = $this->site->selectCI("no", "research_".$saveStep, array("applyNo"=>$applyNo, "type"=>$v), "");
					if (isset($is2D[0])) {
						$this->site->dbUpdate("research_".$saveStep, $step2D, array("applyNo"=>$applyNo, "type"=>$v));
					} else {
						$step2D['applyNo'] = $applyNo;
						$this->site->dbInsert("research_".$saveStep, $step2D);
					}
				}

			} else if ($saveStep == 'step3') {


				$cate = $this->config->item("cate");
				$cateName = $this->config->item("cateName");
				foreach($cateName as $k1 => $name) { 
					foreach($cate[$k1] as $k2 => $itemD) { 

						$step3D = array();
						$step3D['researcherID'] = $this->member->item("mem_userid");
						$step3D['code'] = $k1."_".$k2;
						$step3D['type'] = $itemD[0];
						$step3D['etc'] = $itemD[0]=='기타' ? $upDB['aEtc'] : null;
						$step3D['applyCom'] = element("com_item_".$step3D['code'], $upDB) ? "Y" : "N";
						$step3D['applyResearch'] = element("research_item_".$step3D['code'], $upDB) ? "Y" : "N";
						$step3D['regIP'] = $_SERVER['REMOTE_ADDR'];
						$step3D['regDate'] = date("Y-m-d H:i:s");

						$is3D = $this->site->selectCI("no", "research_".$saveStep, array("applyNo"=>$applyNo, "code"=>$step3D['code']), "");
						if (isset($is3D[0])) {
							$this->site->dbUpdate("research_".$saveStep, $step3D, array("applyNo"=>$applyNo, "code"=>$step3D['code']));
						} else {
							$step3D['applyNo'] = $applyNo;
							$this->site->dbInsert("research_".$saveStep, $step3D);
						}
					}
				}
			} else {
				$isD = $this->site->selectCI("no", "research_".$saveStep, array("applyNo"=>$applyNo), "");
				if (isset($isD[0])) {
					$this->site->dbUpdate("research_".$saveStep, $upDB, array("applyNo"=>$applyNo));
				} else {
					$upDB['applyNo'] = $applyNo;
					$this->site->dbInsert("research_".$saveStep, $upDB);
				}
			}
		}

		// 최종 완료 체크
		$isD1 = $this->site->selectCI("no", "research_step1", array("applyNo"=>$applyNo), "");
		$isD2 = $this->site->selectCI("no", "research_step2", array("applyNo"=>$applyNo), "");
		$isD3 = $this->site->selectCI("no", "research_step3", array("applyNo"=>$applyNo), "");
		$isD4 = $this->site->selectCI("no", "research_step4", array("applyNo"=>$applyNo), "");

		if (isset($isD1[0]) && isset($isD2[0]) && isset($isD3[0]) && isset($isD4[0])) {
			$upDB = array();
			$upDB['researchDone'] = 'Y';
			$this->site->dbUpdate("apply", $upDB, array("no"=>$applyNo));
		}


	}


	public function upload(){
		// Make sure file is not cached (as it happens for example on iOS devices)
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		/*
		// Support CORS
		header("Access-Control-Allow-Origin: *");
		// other CORS headers if any...
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			exit; // finish preflight CORS requests here
		}
		*/

		// 5 minutes execution time
		@set_time_limit(5 * 60);

		// Uncomment this one to fake upload time
		// usleep(5000);

		$applyNo = $_POST['applyNo'];
		$type = $_POST['type'];

		// Settings
		$targetDir = $_SERVER['DOCUMENT_ROOT'].'/uploads/research/'.$this->year.'/'.$applyNo.'/';
		if (!file_exists($targetDir)) {
			@mkdir($targetDir);
		}

		$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
		$targetDir = $_SERVER['DOCUMENT_ROOT'].'/uploads/research/'.$this->year.'/'.$applyNo.'/'.$type.'/';

		$cleanupTargetDir = false; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds




		// Create target dir
		if (!file_exists($targetDir)) {
			@mkdir($targetDir);
		}

		// Get a file name
		if (isset($_REQUEST["name"])) {
			$fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid("file_");
		}

		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

		// Chunking might be enabled
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


		// Remove old temp files
		if ($cleanupTargetDir) {
			if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}

			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}.part") {
					continue;
				}

				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}


		// Open temp file
		if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}

		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			}

			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		} else {
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		}

		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}

		@fclose($out);
		@fclose($in);

		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off
			rename("{$filePath}.part", $filePath);
		}

		// Return Success JSON-RPC response
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

	}

	public function ajaxSavePhoto() {
		if ($this->input->is_ajax_request()) {
			$applyNo = $this->input->post("applyNo", true);
			$type = $this->input->post("type", true);
			$photoData = $this->input->post("photoData");

			if (is_array($photoData)) {
				$resultHtml = "";
				foreach($photoData as $k => $pD) {
					$inDB = array();
					$inDB['applyNo'] = $applyNo;
					$inDB['researcherID'] = $this->member->item("mem_userid");
					$inDB['photoType'] = $type;
					$inDB['photoYear'] = $this->year;
					$inDB['photoFileName'] = $pD['name'];
					$fileName = explode(".", $pD['name']);
					$fileExt = end($fileName);
					$inDB['photoFileSource'] =$pD['id'].".".$fileExt;
					$inDB['photoDetail'] = $pD['fileDetail'];
					$inDB['photoExplains'] = $pD['explains'];
					$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
					$inDB['regDate'] = date("Y-m-d H:i:s");
					$inNo = $this->site->dbInsert("research_photo", $inDB);
				}
			}
		}
	}
	
	public function ajaxViewPhoto() {
		if ($this->input->is_ajax_request()) {
			$applyNo = $this->input->post("applyNo", true);
			$type = $this->input->post("type", true);
			$photoD = $this->site->selectCI("*", "research_photo", array("applyNo"=>$applyNo, "photoType"=>$type), "");
			$html = "";
			foreach($photoD as $k => $pD) {
				$html .= '<div id="divPhoto'.$pD['no'].'" class="divViewPhoto"><img src="/uploads/research/'.$pD['photoYear'].'/'.$pD['applyNo'].'/'.$pD['photoType'].'/'.$pD['photoFileSource'].'" class="w-100" onerror="this.onerror=null; this.src = \'https://jsy.donic.info/uploads/research/'.$pD['photoYear'].'/'.$pD['applyNo'].'/'.$pD['photoType'].'/'.$pD['photoFileSource'].'\';"/>';
				$html .= '<p class="btn btn-danger float-end" onclick="return fnDelPhoto('.$pD['no'].')">삭제</p><p class="">'.$pD['photoExplains'].'</p>';
/*
				$exif = @exif_read_data($_SERVER['DOCUMENT_ROOT'].'/uploads/research/'.$pD['photoYear'].'/'.$pD['applyNo'].'/'.$pD['photoType'].'/'.$pD['photoFileSource'], 0, true);
				if (element('DateTimeOriginal', element('EXIF', $exif))) $html .= '<p style="margin-bottom:0px;">사진 생성일 : '.element('DateTimeOriginal', element('EXIF', $exif)).'</p>';
				if (element('Model', element('IFD0', $exif))) $html .= '<p style="margin-bottom:0px;">휴대폰 기종 : '.element('Model', element('IFD0', $exif)).'</p>';
				if (element('GPSLatitude', element('GPS', $exif)) && element('GPSLongitude', element('GPS', $exif))) { //위경도 좌표가 있다면
					$gps_lat_d = $gps_lat_m = $gps_lat_s = '';
					if ($exif["GPS"]["GPSLatitude"][0]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLatitude"][0], "%d/%d"); //문자->숫자로 계산
						$gps_lat_d = $temp_d1/$temp_d2;
					}
					if ($exif["GPS"]["GPSLatitude"][1]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLatitude"][1], "%d/%d");
						$gps_lat_m = $temp_d1/$temp_d2;
					}
					if ($exif["GPS"]["GPSLatitude"][2]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLatitude"][2], "%d/%d");
						$gps_lat_s = $temp_d1/$temp_d2;
					}
					$gps_lon_d = $gps_lon_m = $gps_lon_s = '';
					if ($exif["GPS"]["GPSLongitude"][0]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLongitude"][0], "%d/%d"); //문자->숫자로 계산
						$gps_lon_d = $temp_d1/$temp_d2;
					}
					if ($exif["GPS"]["GPSLongitude"][1]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLongitude"][1], "%d/%d");
						$gps_lon_m = $temp_d1/$temp_d2;
					}
					if ($exif["GPS"]["GPSLongitude"][2]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLongitude"][2], "%d/%d");
						$gps_lon_s = $temp_d1/$temp_d2;
					}
					if ($gps_lat_d && $gps_lat_m && $gps_lat_s) {
						$gps_lat = $gps_lat_d+$gps_lat_m/60+$gps_lat_s/3600; //도분초를 도로 변환
						$html .= "GPS 위도 : $gps_lat<br />";
					}
					if ($gps_lat_d && $gps_lat_m && $gps_lat_s) {
						$gps_lon = $gps_lon_d+$gps_lon_m/60+$gps_lon_s/3600;
						$html .= "GPS 경도 : $gps_lon<br />";
					}
					if ($gps_lat && $gps_lon) {
						$html .= '<a class="btn btn-xs btn-info per100" href="https://google.com/maps/search/'.$gps_lat.',++'.$gps_lon.'?entry=ttu" target="_blank">위치 확인하기</a>';
					}
				}
*/
				$html .= '</div>';
			}
			echo $html;

		}
	}
	
	public function ajaxDelPhoto() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$photoD = $this->site->selectCI("*", "research_photo", array("no"=>$no), "");
			$photoD = isset($photoD[0]) ? $photoD[0] : array();
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/research/".$photoD['photoYear']."/".$photoD['applyNo']."/".$photoD['photoType']."/".$photoD['photoFileSource']);
			$this->site->dbDelete("research_photo", array("no"=>$no));
		}
	}

}
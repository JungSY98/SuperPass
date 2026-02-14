<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * DnPDF class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>DnPDF controller 입니다.
 */
class DnPDF extends CB_Controller
{
	public $step2;
	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'completion/dnPDF';

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
		$this->load->library(array('pagination', 'querystring'));

		$this->step2 = array(
			"Pollution"=>"곰팡이(오염도)",
			"Sink"=>"바닥벽면 파임",
			"Old"=>"노후(균형·도색)",
			"Crack"=>"균열",
			"FireExtinguisher"=>"소화기 관리(노후)",
			"FireDetector"=>"화재감지기 설치",
			"Wiring"=>"배선 관리(노후)",
			"Wiringbox"=>"배선함(누전차단기)"
		);

		if ($_SERVER['REMOTE_ADDR']!='211.250.74.88') {
			//alert("작업중입니다.");
		}
	}

	/**
	 * 목록을 가져오는 메소드입니다
	 */
	public function index() {

		//if ($_SERVER['REMOTE_ADDR']!='211.250.74.88') alert("작업중입니다.");

		$view = array();
		$view['view'] = array();

		$no = $view['applyNo'] = $this->uri->segment(4);

		// 회사정보
		$view['comD'] = $this->site->selectCI("*", "apply", array("no"=>$no), " no asc");
		$view['comD'] = isset($view['comD'][0]) ? $view['comD'][0] : alert("잘못된 접근입니다. 1");

		$view['comCode'] = '';

		// Step1
		$researchD = $this->site->selectCI("*, (select mem_username from mf_member AS M where M.mem_userid = C1.researcherID) as rName", "research_step1 as C1 ", array("applyNo"=>$no), "");
		$view['researchD1'] = isset($researchD[0]) ? $researchD[0] : array();

		// Step1
		$completionD = $this->site->selectCI("*, (select mem_username from mf_member AS M where M.mem_userid = C1.researcherID) as rName", "completion_step1 as C1 ", array("applyNo"=>$no), "");
		$view['completionD'] = isset($completionD[0]) ? $completionD[0] : array();

		// Step2
		$completionD = $this->site->selectCI("*", "completion_step2 as C1 ", array("applyNo"=>$no), "");
		$view['completion2D'] = isset($completionD[0]) ? $completionD[0] : array();

		// Step2
		$completion3D = $this->site->selectCI("*", "completion_step3 as C1 ", array("applyNo"=>$no), "");
		$view['completion3D'] = isset($completion3D[0]) ? $completion3D[0] : array();


		// Step3
		$view['cate'] = $this->config->item("cate");
		$view['cateName'] = $this->config->item("cateName");

		$applyTypeD = $this->site->selectCI("*", "apply_type", array("keyNo"=>$no), "cate asc, no asc");
		foreach($applyTypeD as $k => $atD) {
			$view['applyTypeD'][$atD['aType']] = $atD['aType']=='기타' ? element('aEtc', $atD) : $atD['aType'];
		}

		$view['etcD'] = "";
		$researchD = $this->site->selectCI("*", "research_step3", array("researcherID"=>$view['comD']["researcherID"], "applyNo"=>$no), "");
		$view['researchD'] = array();
		foreach($researchD as $kk => $rD) {
			$view['researchD']['applyCom']['item_'.$rD['code']] = $rD['applyCom'];
			$view['researchD']['applyResearch']['item_'.$rD['code']] = $rD['applyResearch'];
			if ($rD['code']=='4_6') $view['etcD'] = $rD['etc'];
		}

		// 포토 
		$view['photoD'] = array();
		$photoD = $this->site->selectCI("*", "research_photo", array("applyNo"=>$no, "researcherID"=>$view['comD']["researcherID"]), "");
		foreach($photoD as $kk => $pD) {
			$view['photoD'][$pD['photoType']][] = $pD;
		}
		// 포토  2
		$view['photo2D'] = array();
		$photoD = $this->site->selectCI("*", "completion_photo", array("applyNo"=>$no, "researcherID"=>$view['comD']["researcherID"]), "");
		foreach($photoD as $kk => $pD) {
			$view['photo2D'][$pD['photoType']][] = $pD;
		}

		// 작업내역
		$view['workD'] = array();
		$workD = $this->site->selectCI("*", "completion_work", array("applyNo"=>$no, "researcherID"=>$view['comD']["researcherID"]), "");
		foreach($workD as $kkk => $wD) {
			$view['workD'][$wD['workType']][] = $wD;
		}


		// 서명
		$sign = $this->site->selectCI("*", "research_sign", array("type"=>"researcher", "mem_userid"=>$view['comD']['researcherID']), "");
		$view['sign1'] = isset($sign[0]) ? $sign[0] : "";
		$sign2 = $this->site->selectCI("*", "completion_sign", array("type"=>"ceo", "applyNo"=>$no), "");
		$view['sign2'] = isset($sign2[0]) ? $sign2[0] : "";

		$view['autoSave'] = "";


		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout_popup', 'skin' => 'view_paper_pdf');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}
}
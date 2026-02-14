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
	public $pagedir = 'evaluation/dnPDF';

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

		$view['step2Photo'] = $this->step2;

		// 회사정보
		$view['comD'] = $this->site->selectCI("*", "apply", array("no"=>$no), " no asc");
		$view['comD'] = isset($view['comD'][0]) ? $view['comD'][0] : alert("잘못된 접근입니다. 1");

		$view['comCode'] = '';

		// Step1
		$researchD = $this->site->selectCI("*, (select mem_username from mf_member AS M where M.mem_userid = S1.researcherID) as rName", "research_step1 as S1 ", array("applyNo"=>$no), "");
		$view['researchD'] = isset($researchD[0]) ? $researchD[0] : array();

		// Step2
		foreach($this->step2 as $kk => $vv) {
			$view['score'.$vv] = "";
			$view['figure'.$vv] = "";
		}
		$researchD2 = $this->site->selectCI("*", "research_step2", array("applyNo"=>$no), "");
		foreach($researchD2 as $k => $rD) {
			if (element("score", $rD)) $view['score'.$rD['type']] = $rD['score'];
			$view['figure'.$rD['type']] = $rD['figure'];
		}

		// Step3
		$view['cate'] = $this->config->item("cate");
		$view['cateName'] = $this->config->item("cateName");

		$applyTypeD = $this->site->selectCI("*", "apply_type", array("keyNo"=>$no), "cate asc, no asc");
		foreach($applyTypeD as $k => $atD) {
			$view['applyTypeD'][$atD['aType']] = $atD['aType'];
		}


		$researchD3 = $this->site->selectCI("*", "research_step3", array("applyNo"=>$no), "");
		$view['researchD3'] = array();
		foreach($researchD3 as $kk => $rD) {
			$view['researchD3']['applyCom']['item_'.$rD['code']] = $rD['applyCom'];
			$view['researchD3']['applyResearch']['item_'.$rD['code']] = $rD['applyResearch'];
		}

		// Step4
		$researchD4 = $this->site->selectCI("*", "research_step4", array("applyNo"=>$no), "");
		$view['researchD4'] = isset($researchD4[0]) ? $researchD4[0] : array();

		// 포토  
		$view['photoD'] = array();
		$photoD = $this->site->selectCI("*", "research_photo", array("applyNo"=>$no), "");
		foreach($photoD as $kk => $pD) {
			$view['photoD'][$pD['photoType']][] = $pD;
		}

		// 서명
		$sign = $this->site->selectCI("*", "research_sign", array("type"=>"researcher", "mem_userid"=>$view['comD']['researcherID']), "");
		$view['sign1'] = isset($sign[0]) ? $sign[0] : "";
		$sign2 = $this->site->selectCI("*", "research_sign", array("type"=>"ceo", "applyNo"=>$no), "");
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
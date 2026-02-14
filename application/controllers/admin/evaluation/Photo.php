<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Photo class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>Photo controller 입니다.
 */
class Photo extends CB_Controller
{
	public $step2;
	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'evaluation/photo';

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

		$this->step2 = array("Worker", "Sales", "Career", "CEO1", "CEO2", "Floor", "PM25", "LUX", "Noise", "VOCs", "Pollution", "Sink", "Old", "Crack", "FireExtinguisher", "FireDetector", "Wiring", "Wiringbox");

		if ($_SERVER['REMOTE_ADDR']!='211.250.74.88') {
			//alert("작업중입니다.");
		}
	}

	/**
	 * 목록을 가져오는 메소드입니다
	 */
	public function index() {

		$view = array();
		$view['view'] = array();
		$view['status'] = "";

		$where = array();



		$cate = $this->config->item("cate");
		$cateName = $this->config->item("cateName");

		$photoTitle = array("Pollution"=>"곰팡이(오염도)", "Sink"=>"바닥·벽면 파임", "Old"=>"노후(균형·도색)", "Crack"=>"균열", "FireExtinguisher"=>"소화기 관리(노후)", "FireDetector"=>"화재감지기 설치", "Wiring"=>"배선 관리(노후)", "Wiringbox"=>"배선함(누전차단기)");

		foreach($cateName as $k1 => $name) { 
			foreach($cate[$k1] as $k2 => $itemD) {
				$photoTitle["item_".$k1."_".$k2] = element(0, $itemD);
			}
		}
		$view['photoTitle'] = $photoTitle;

		$view['chkStep1'] = array("inflow", "comName", "ceoName", "comZip", "comAddr1", "comAddr2", "comCode", "tax", "hasbeen");
		$view['chkStep2'] = array("Worker", "Sales", "Career", "CEO1", "CEO2", "Floor", "PM25", "LUX", "Noise", "VOCs", "Pollution", "Sink", "Old", "Crack", "FireExtinguisher", "FireDetector", "Wiring", "Wiringbox");
		$view['chkStep4'] = array("amountExpect", "amountSales", "researchDate", "capitalCapability");

		$view['viewID'] = $viewID = $this->input->get("viewID", true);
		$status = $this->input->get("status", true);
		if (!empty($status)) {
			$view['status'] = $where['status'] = $status;
		}

		$view['cate'] = $this->config->item("cate");
		$view['cateName'] = $this->config->item("cateName");

		$view['year'] = 2023;
		$view['viewCate'] = $this->input->get("viewCate");
		$view['viewCate'] = empty($view['viewCate']) ? "기계금속" : $view['viewCate'];

		$view['btnColor'] = array("접수" => "btn-default", "적격" => "btn-success", "부적격" => "btn-danger");

		$yearC = "";
		$addSQL = "";
		if ($view['year']) {
			$where['year'] = $view['year'];
			$yearC = " WHERE year = '".$view['year']."' ";
		}
		if ($view['viewCate']) $where['category'] = $view['viewCate'];

		$photoSQL = "SELECT 
		*,
		( SELECT `comName` FROM `mf_apply` as A WHERE A.no = P.applyNo) as comName,
		( SELECT `mem_username` FROM `mf_member` as M WHERE M.mem_userid = P.researcherID) as rName,
		( SELECT sum(IFNULL(score, 0)) as total FROM `mf_research_step2` as S2 WHERE S2.applyNo = P.applyNo ) as total,
		( SELECT no FROM `mf_research_sign` as SIGN WHERE SIGN.mem_userid = P.researcherID AND SIGN.type = 'researcher' ) as isSign
		FROM  mf_research_photo as P
		WHERE `applyNo` in ( select no from mf_apply where `year` = '2023' and `category` = '".$where['category']."' AND `status` != '부적격' )
		ORDER BY no desc";
		$view['photoD']= $this->site->selectQuery($photoSQL);

		//echo $applySQL;

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'index');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}



}
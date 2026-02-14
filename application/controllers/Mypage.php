<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mypage class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * Mypage 페이지를 담당하는 controller 입니다.
 */
class Mypage extends CB_Controller
{
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
		$this->lang->load("website", element("langSet", $_SESSION));
		if (empty($this->member->item("mem_id"))) alert("로그인 정보가 필요합니다.", "/login/?url=/mypage/");
		if (empty($this->member->item("mem_brand"))) alert("브랜드 정보가 매칭되지 않았습니다. 관리자에게 문의바랍니다.", "/");

	}


	/**
	 * 전체 메인 페이지입니다
	 */
	public function index() {
		redirect("/mypage/brandModify");
	}


	/**
	 * 수정 페이지입니다
	 */
	public function brandModify() {


		$view = array();
		$view['view'] = array();

		$brandNo = $this->member->item("mem_brand");
		if (empty($brandNo)) alert("로그인 정보가 필요합니다.", "/login/?url=/mypage/brandModify/");

		$view['menuD'] = $this->load->view("/mypage/bootstrap/mypageMenu.php", $view, true);

		$brandD = $this->site->selectCI("*", "brand", array("no"=>$brandNo), "no asc");
		$view['brandD'] = isset($brandD[0]) ? $brandD[0] : alert("브랜드 정보가 없습니다.", "/");
		$view['brandD']['addValue'] = json_decode($view['brandD']['bAddFieldKR'], true);
		$view['brandD']['addValueEn'] = json_decode($view['brandD']['bAddFieldEN'], true);




	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'mypage',
			'layout' => 'layout',
			'skin' => "brandModify" ,
			'layout_dir' => $this->cbconfig->item('layout_main'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_main'),
			'use_sidebar' => $this->cbconfig->item('sidebar_main'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_main'),
			'skin_dir' => $this->cbconfig->item('skin_main'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_main'),
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
	 * 수정 페이지입니다
	 */
	public function productModify() {


		$view = array();
		$view['view'] = array();

		$brandNo = $this->member->item("mem_brand");
		if (empty($brandNo)) alert("로그인 정보가 필요합니다.", "/login/?url=/mypage/productModify/");

		$view['menuD'] = $this->load->view("/mypage/bootstrap/mypageMenu.php", $view, true);

		$view['productD'] = $this->site->selectCI("*", "product", array("brandNo"=>$brandNo), "no asc");

	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'mypage',
			'layout' => 'layout',
			'skin' => "productModify" ,
			'layout_dir' => $this->cbconfig->item('layout_main'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_main'),
			'use_sidebar' => $this->cbconfig->item('sidebar_main'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_main'),
			'skin_dir' => $this->cbconfig->item('skin_main'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_main'),
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



	public function loginHistory() {


		$view = array();
		$view['view'] = array();

		$brandNo = $this->member->item("mem_brand");
		if (empty($brandNo)) alert("로그인 정보가 필요합니다.", "/login/?url=/mypage/loginHistory/");

		$view['menuD'] = $this->load->view("/mypage/bootstrap/mypageMenu.php", $view, true);

		$mem_id = $this->member->item("mem_id");

		$view['loginD'] = $this->site->selectCI("*", "member_login_log", array("mem_id"=>$mem_id), "mll_id desc");


	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'mypage',
			'layout' => 'layout',
			'skin' => "loginHistory" ,
			'layout_dir' => $this->cbconfig->item('layout_main'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_main'),
			'use_sidebar' => $this->cbconfig->item('sidebar_main'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_main'),
			'skin_dir' => $this->cbconfig->item('skin_main'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_main'),
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

	public function changeHistory() {


		$view = array();
		$view['view'] = array();

		$brandNo = $this->member->item("mem_brand");
		if (empty($brandNo)) alert("로그인 정보가 필요합니다.", "/login/?url=/mypage/changeHistory/");

		$view['menuD'] = $this->load->view("/mypage/bootstrap/mypageMenu.php", $view, true);

		$view['chgD'] = $this->site->selectCI("*", "brand_change_history", array("brandNo"=>$brandNo), "no asc");


	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'mypage',
			'layout' => 'layout',
			'skin' => "changeHistory" ,
			'layout_dir' => $this->cbconfig->item('layout_main'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_main'),
			'use_sidebar' => $this->cbconfig->item('sidebar_main'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_main'),
			'skin_dir' => $this->cbconfig->item('skin_main'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_main'),
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


	public function ajaxChangeProductData() {
		if ($this->input->is_ajax_request()) {
			$brandNo = $this->input->post("brandD", true);
			$mbID = $this->input->post("mbID", true);

			$chgD = $this->input->post("chgD");

			if ($mbID==$this->member->item("mem_userid") && $brandNo==$this->member->item("mem_brand")) {

				// 변경사항 체크.
				$_productD = $this->site->selectCI("no, brandNo, pDescKR, pDescEN", "product", array("brandNo"=>$brandNo), "no asc");
				$productD = array();
				foreach($_productD as $k => $pD) { 
					$productD[$pD['no']]['pDescKR'] = $pD['pDescKR'];
					$productD[$pD['no']]['pDescEN'] = $pD['pDescEN'];
				}

				$changeData = array();
				foreach($chgD as $k => $cD) {
					if ($this->chkDiff($productD[$cD['pKey']]['pDescKR'], $cD['chgDataKR'])) {
						$changeData[] = array("title"=>"브랜드 소개(국문)", "dbFieldNo"=>$cD['pKey'],  "dbField"=>"pDescKR", "before"=>$productD[$cD['pKey']]['pDescKR'], "after"=>$cD['chgDataKR']);
						$upDB = array();
						$upDB['pDescKR'] = $cD['chgDataKR'];
						$this->site->dbUpdate("product", $upDB, array("no"=>$cD['pKey']));
					}
					if ($this->chkDiff($productD[$cD['pKey']]['pDescEN'], $cD['chgDataEN'])) {
						$changeData[] = array("title"=>"브랜드 소개(국문)", "dbFieldNo"=>$cD['pKey'], "dbField"=>"pDescKR",  "before"=>$productD[$cD['pKey']]['pDescEN'], "after"=>$cD['chgDataEN']);
						$upDB = array();
						$upDB['chgDataEN'] = $cD['chgDataEN'];
						$this->site->dbUpdate("product", $upDB, array("no"=>$cD['pKey']));
					}
				}

				// 변경사항 기록
				if (!empty($changeData)) {
					$chgDB = array();
					$chgDB['brandNo'] = $brandNo;
					$chgDB['userID'] = $this->member->item("mem_userid");
					$chgDB['changeType'] = "제품정보";
					$chgDB['changeData'] = json_encode($changeData);
					$chgDB['regIP'] = $_SERVER['REMOTE_ADDR'];
					$chgDB['regDate'] = date("Y-m-d H:i:s");
					$this->site->dbInsert("brand_change_history", $chgDB);
				}

			}

		}
	}

	public function ajaxChangeBrandData() {
		if ($this->input->is_ajax_request()) {
			$brandNo = $this->input->post("brandD", true);
			$mbID = $this->input->post("mbID", true);

			if ($mbID==$this->member->item("mem_userid") && $brandNo==$this->member->item("mem_brand")) {

				$brandD = $this->site->selectCI("*", "brand", array("no"=>$brandNo), "no asc");
				$brandD = isset($brandD[0]) ? $brandD[0] : array();
				$brandD['addValue'] = json_decode($brandD['bAddFieldKR'], true);
				$brandD['addValueEn'] = json_decode($brandD['bAddFieldEN'], true);

				$chgD['bizTel'] = $this->input->post("tel", true);
				$chgD['bizEmail'] = $this->input->post("email", true);
				$chgD['bWebsite'] = $this->input->post("website", true);
				$chgD['bSNS1'] = $this->input->post("sns1", true);
				$chgD['bSNS2'] = $this->input->post("sns2", true);
				$chgD['bSNS3'] = $this->input->post("sns3", true);
				$chgD['bSNS4'] = $this->input->post("sns4", true);
				$brandKR = $this->input->post("brandKR", true);
				$brandEN = $this->input->post("brandEN", true);

				$chgTitle = array();
				$chgTitle['bizTel'] = "연락처";
				$chgTitle['bizEmail'] = "이메일";
				$chgTitle['bWebsite'] = "홈페이지";
				$chgTitle['bSNS1'] = "인스타";
				$chgTitle['bSNS2'] = "페이스북";
				$chgTitle['bSNS3'] = "블로그";
				$chgTitle['bSNS4'] = "기타";

				// 변경사항 체크
				$changeData = array();
				foreach($chgD as $dbField => $newValue) {
					if ($brandD[$dbField] != $newValue) {
						$changeData[] = array("title"=>$chgTitle[$dbField], "dbField"=>$dbField, "before"=>$brandD[$dbField], "after"=>$newValue);
					}
				}
				if (element("1", element("0", element("addValue", $brandD))) != $brandKR) {
					$changeData[] = array("title"=>"브랜드 소개(국문)", "dbField"=>"", "before"=>element("1", element("0", element("addValue", $brandD))), "after"=>$brandKR);
				}
				if (element("1", element("0", element("addValueEn", $brandD))) != $brandEN) {
					$changeData[] = array("title"=>"브랜드 소개(영문)", "dbField"=>"", "before"=>element("1", element("0", element("addValueEn", $brandD))), "after"=>$brandEN);
				}


				// 변경사항 기록
				if (!empty($changeData)) {
					$chgDB = array();
					$chgDB['brandNo'] = $brandNo;
					$chgDB['userID'] = $this->member->item("mem_userid");
					$chgDB['changeType'] = "브랜드정보";
					$chgDB['changeData'] = json_encode($changeData);
					$chgDB['regIP'] = $_SERVER['REMOTE_ADDR'];
					$chgDB['regDate'] = date("Y-m-d H:i:s");
					$this->site->dbInsert("brand_change_history", $chgDB);
				}

				// 변경처리 반영
				$brandD['addValue'][0][1] = $brandKR;
				$brandD['addValueEn'][0][1] = $brandEN;

				$chgD['bAddFieldKR'] = json_encode($brandD['addValue']);
				$chgD['bAddFieldEN'] = json_encode($brandD['addValueEn']);
				$this->site->dbUpdate("brand", $chgD, array("no"=>$brandNo));

				echo "변경 되었습니다.";
			} else {
				echo "잘못된 접근입니다.";
			}

		}
	}


	private function chkDiff($a, $b) {

		// 두 문자열을 줄 단위로 비교
		$a_lines = explode("\n", $a);
		$b_lines = explode("\n", $b);
		$isDiff = false;
		foreach ($a_lines as $line_num => $line) {
			if (isset($b_lines[$line_num])) {
				if (trim($line) !== trim($b_lines[$line_num])) {
					$isDiff = true;
				}
			}
		}
		return $isDiff;
	}

}
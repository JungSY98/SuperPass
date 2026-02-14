<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Product class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * Product 페이지를 담당하는 controller 입니다.
 */
class Product extends CB_Controller
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

		if ($_SERVER['REMOTE_ADDR'] != '192.168.0.1') {

		}

		$this->load->library(array('querystring'));
		$this->lang->load("website", element("langSet", $_SESSION));

	}


	/**
	 * 전체 메인 페이지입니다
	 */
	public function index() {
		redirect("/product/lists/");
	}


	public function lists() {

		$view = array();
		$view['view'] = array();

		$view['siteTitle'] = $this->lang->language['site'];
		$view['lang'] = element("langSet", $_SESSION)=='english' ? 'EN' : 'KR';

		$mode = $this->uri->segment(2);
		if ($mode!="lists") alert($view['siteTitle']['accessDeny']);

		$year = $this->uri->segment(3);
		$year = $year ? $year : '2024';
		$view['year'] = $year = in_array($year, array(2023, 2024)) ? $year : 2024;
		if (!is_numeric($year)) alert($view['siteTitle']['accessDeny']);

		$_viewType = $this->input->get('viewType');
		$_viewTypeSession = element('viewType', $_SESSION);
		if ($_viewType) {
			$_SESSION['viewType'] = $_viewType;
		} else if ($_viewTypeSession) {
			// 기존 설정 유지
		} else {
			// 초기 설정
			$_SESSION['viewType'] = 'box';
		}


		// 2024 년도 제품을 보유한 브랜드 리스트 
		$productD = $this->site->selectCI("*, 
		(select bizNameKR from gcs_brand as B where B.no = P.brandNo) as brandNameKR, 
		(select bizNameEN from gcs_brand as B where B.no = P.brandNo) as brandNameEN", "product as P", array("isUse"=>"Y", "year"=>$year), " rand() ");

		foreach($productD as $pk => $pD) {
			$productD[$pk]['picD'] = $this->site->selectCI("*", "product_file_upload", array("productNo"=>$pD['no']), "no asc");
			$origFileName = $productD[$pk]['picD'][0]['file_name'];
			$file = explode(".", $origFileName);
			$fileName = element(0, $file)."_resize.".element(1, $file);
			$chkLocation = $_SERVER['DOCUMENT_ROOT']."/uploads/product/".$pD['year']."/".$pD['no']."/".$fileName;
			$productD[$pk]['picD'][0]['echoFileName'] = (file_exists($chkLocation)) ? $fileName : $origFileName;
		}
		$view['productD'] = $productD;

		$skin = element("viewType", $_SESSION);

	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'product',
			'layout' => 'layout',
			'skin' => "product_".$skin ,
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


	public function view() {

		$view = array();
		$view['view'] = array();

		$view['siteTitle'] = $this->lang->language['site'];
		$view['lang'] = element("langSet", $_SESSION)=='english' ? 'EN' : 'KR';

		$mode = $this->uri->segment(2);
		$year = $this->uri->segment(3);
		if ($mode!="view") alert($view['siteTitle']['accessDeny']);
		$productNo = $this->uri->segment(4);
		if (!is_numeric($productNo)) alert($view['siteTitle']['accessDeny']);
		$productD = $this->site->selectQuery(" select P.*, B.bizNameKR, B.bizNameEN, B.bizTel, B.bizEmail, B.bWebsite, B.bSNS1, B.bSNS2, B.bSNS3, B.bSNS4, B.bAddFieldKR, B.bAddFieldEN from gcs_product as P LEFT JOIN gcs_brand as B ON B.no = P.brandNo WHERE P.no = '".$productNo."' ORDER BY P.no asc");
		if (empty($productD)) alert($view['siteTitle']['accessDeny']);

		foreach($productD as $pk => $pD) {
			$productD[$pk]['picD'] = $this->site->selectCI("*", "product_file_upload", array("productNo"=>$productNo), "no asc");
			$origFileName = $productD[$pk]['picD'][0]['file_name'];
			$file = explode(".", $origFileName);
			$fileName = element(0, $file)."_resize.".element(1, $file);
			$chkLocation = $_SERVER['DOCUMENT_ROOT']."/uploads/product/".$productD[$pk]['picD'][0]['year']."/".$productNo."/".$fileName;
			$productD[$pk]['picD'][0]['echoFileName'] = (file_exists($chkLocation)) ? $fileName : $origFileName;
		}
		$view['productD'] = $productD[0];
		$view['productD']['bizExplainKR'] = json_decode($view['productD']['bAddFieldKR'], true);
		$view['productD']['bizExplainEN'] = json_decode($view['productD']['bAddFieldEN'], true);

		$filePath = "/uploads/product/".element('year', element(0, element('picD', element(0, $productD))))."/".$productNo."/".element('echoFileName', element(0, element('picD', element(0, $productD))));
		$view['topIMG_tag'] = element('echoFileName', element(0, element('picD', element(0, $productD)))) ? $filePath : "/assets/images/noIMG.png";

		$view['langType1'] = element("langSet", $_SESSION)=='english' ? "EN" : "KR";

		$view['productList'] = $this->site->selectQuery(" select P.*, B.bizNameKR, B.bizNameEN, B.bizTel, B.bizEmail, B.bWebsite, B.bSNS1, B.bSNS2, B.bSNS3, B.bSNS4, B.bAddFieldKR, B.bAddFieldEN from gcs_product as P LEFT JOIN gcs_brand as B ON B.no = P.brandNo WHERE P.year = '".$productD[0]['year']."' ORDER BY P.no asc");


	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'product',
			'layout' => 'layout',
			'skin' => "view_detail" ,
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

}
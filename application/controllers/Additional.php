<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Additional class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * SNS 연동 후 페이지를 담당하는 controller 입니다.
 */
class Additional extends CB_Controller
{
	/**
	 * 헬퍼를 로딩합니다
	 */
	protected $helpers = array('form', 'array', 'language');

	function __construct()
	{
		parent::__construct();
		/**
		 * 라이브러리를 로딩합니다
		 */
	}

	/**
	 * 전체 메인 페이지입니다
	 */
	public function index() {
		$mem_sex = $this->member->item("mem_sex");
		$mem_id = element("mem_id", $_SESSION);
		if ($mem_id && !empty($mem_sex)) {
			//redirect("/");
		}

		$view = [];
		$view['view'] = [];



		/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'main',
			'layout' => 'layout',
			'skin' => 'addtional' ,
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

	public function process() {
		$arrayGender = array(
			"Male"=>1,
			"Female"=>2,
			"Transgender"=>3,
			"Nonbinary"=>4,
			"Agender"=>5
		);
		$gender = $this->input->post("gender", true);
		$mem_id = $this->member->item("mem_id");
		if (empty($mem_id)) redirect("/");

		$arrayKey = array("nationality"=>"mem_nation", "visit_purpose"=>"mem_purpose", "age"=>"mem_age");
		$inDB = [];
		$inDB['mem_sex'] = element($gender, $arrayGender);
		$this->site->dbUpdate("member", $inDB, array("mem_id"=>$mem_id));

		foreach($arrayKey as $k => $v) {
			$postVal = $this->input->post($k, true);
			$isD = $this->site->selectCI("mev_value", "member_extra_vars", array("mem_id"=>$mem_id, "mev_key"=>$v), "mem_id asc");
			if (isset($isD[0])) {
				$this->site->dbUpdate("member_extra_vars", array("mev_value"=>$postVal), array("mem_id"=>$mem_id, "mev_key"=>$v));
			} else {
				$this->site->dbInsert("member_extra_vars", array("mem_id"=>$mem_id, "mev_key"=>$v, "mev_value"=>$postVal));
			}
		}
		redirect("/");
	}


	public function ajaxChkMB() {
		if ($this->input->is_ajax_request()) {
			$arrReturn = array();
			$sess = $this->member->item("mem_userid", true);
			$mem_id = $this->input->post("mem_id", true);
			if ($sess && $sess == $mem_id) {
				$arrReturn['stat'] = 'true';
				$arrReturn['msg'] = "로그인 정보가 일치합니다.";
			} else {
				$arrReturn['stat'] = 'false';
				$arrReturn['msg'] = "로그인 정보가 필요합니다.";
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($arrReturn));
		}
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * About 페이지를 담당하는 controller 입니다.
 */
class About extends CB_Controller
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

	}


	/**
	 * 전체 메인 페이지입니다
	 */
	public function index()
	{


		$view = array();
		$view['view'] = array();
		$year = $this->uri->segment(2);
		$year = $year ? $year : 2024;

		$view['siteTitle'] = $this->lang->language['site'];
		$view['lang'] = element("langSet", $_SESSION)=='english' ? 'EN' : 'KR';
		$skin = element("langSet", $_SESSION)=='english' ? '_en' : '';

		if (!in_array($year, array(2023, 2024))) alert($view['siteTitle']['accessDeny']);

		$view['brandD'] = $this->site->selectCI("bizNameKR, bizNameEN", "brand", array("no <="=>22), "no asc");


	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'about',
			'layout' => 'layout',
			'skin' => "about_".$year.$skin,
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
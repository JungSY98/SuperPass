<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Evaluator class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>Evaluator controller 입니다.
 */
class Evaluator extends CB_Controller
{

	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'evaluation/evaluator';

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
	}

	/**
	 * 목록을 가져오는 메소드입니다
	 */
	public function index() {

		$view = array();
		$view['view'] = array();

		$view['rList'] = $this->site->selectQuery("select * from ds_member as M where mem_userid like 'panel%' ");

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'index');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}

	public function ajaxDeleteResearcher() {
		if ($this->input->is_ajax_request()) {
			$mem_id = $this->input->post("mem_id", true);
			$this->member->delete_member($mem_id);
		}
	}

	public function ajaxChangeResearcher() {
		if ($this->input->is_ajax_request()) {
			$name = $this->input->post("name", true);
			$pw = $this->input->post("pw", true);
			$mem_id = $this->input->post("mem_id", true);
			

			$upDB = array();
			$upDB['mem_password'] = password_hash($pw, PASSWORD_BCRYPT);
			$upDB['mem_username'] = $name;
			$upDB['mem_adminmemo'] = $pw;
			$mem_id = $this->site->dbUpdate("member", $upDB, array("mem_id"=>$mem_id));

		}
	}

	public function ajaxMakeResearcher() {
		if ($this->input->is_ajax_request()) {
			$makeCnt = $this->input->post("cnt", true);

			$groupCnt = $this->site->selectQuery("select count(mgm_id) as cnt from ds_member_group_member where mgr_id = 2 ");
			$groupCnt = isset($groupCnt[0]['cnt']) ? $groupCnt[0]['cnt'] : 0;

			for($a=0;$a<$makeCnt;$a++) {
				$groupCnt++;
				$this->makeMember($groupCnt);
			}
		}
	}

	private function makeMember($groupCnt) {
		$pw = rand(1111,9999);
		$inDB = array();
		$inDB['mem_userid'] = "panel".$groupCnt;
		$inDB['mem_email'] = "panel".$groupCnt."@sdf_ds.com";

		$inDB['mem_password'] = $hash = password_hash($pw, PASSWORD_BCRYPT);
		$inDB['mem_username'] = "심사위원".$groupCnt;
		$inDB['mem_nickname'] = "심사위원".$groupCnt;
		$inDB['mem_level'] = 4;
		$inDB['mem_register_datetime'] = date("Y-m-d H:i:s");
		$inDB['mem_register_ip'] = $_SERVER['REMOTE_ADDR'];
		$inDB['mem_adminmemo'] = $pw;
 		$mem_id = $this->site->dbInsert("member", $inDB);
		$inDB = array();
		$inDB['mgr_id'] = 2;
		$inDB['mem_id'] = $mem_id;
		$inDB['mgm_datetime'] = date("Y-m-d H:i:s");
		$this->site->dbInsert("member_group_member", $inDB);
	}

}
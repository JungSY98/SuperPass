<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Adminauth class
 *
 * Copyright (c) Entropy <www.donic.info>
 *
 * @author SungYoon, JUNG (jsy@donic.info)
 */

/**
 * 관리자>회원설정>관리자 권한 관리 controller 입니다.
 */
class Adminauth extends CB_Controller
{

	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'member/adminauth';

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
	public function index()
	{

		$view = array();
		$view['view'] = array();
	


		$sql = "
			select * from `dsp_member` where mem_id in ( select mem_id from `dsp_member_group_member`  where mgr_id in ( 2, 3 ) ) order by mem_id desc
		";
		$view['memberD'] = $this->site->selectQuery($sql);

		if (empty($view['memberD'])) alert("관리자 그룹에 소속된 회원이 없습니다.", "/admin/member/members/");

		$viewID = $this->input->get("viewID", true);
		$view['viewID'] = $viewID ? $viewID : $view['memberD'][0]['mem_userid'];

		// 권한 설정 테이블 호출
		$view['adminAuthD'] = array();
		$adminAuthD = $this->site->selectCI("*", "admin_auth", array("mem_userid"=>$view['viewID']), "");
		//echo "<pre>";
		//print_r($adminAuthD);
		//echo "</pre>";
		foreach($adminAuthD as $k => $aD) {
			$view['adminAuthD'][$aD['admin_role']] = true;
		}

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'index');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}


	public function ajaxSetAdminAuth() {
		if ($this->input->is_ajax_request()) {
			$viewID = $this->input->post("viewID", true);
			$adminRole = $this->input->post("adminRole", true);
			$isOn = $this->input->post("isOn", true);

			if ($isOn=='on') {
				$inDB = array();
				$inDB['mem_userid'] = $viewID;
				$inDB['admin_role'] = $adminRole;
				$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
				$inDB['regDate'] = date("Y-m-d H:i:s");
				$this->site->dbInsert("admin_auth", $inDB);
			} else if ($isOn=='off') {
				$isD = $this->site->selectCI("*", "admin_auth", array("mem_userid"=>$viewID, "admin_role"=>$adminRole), "");
				if (isset($isD[0])) {
					$isD = $isD[0];
					unset($isD['no']);
					$isD['origIP'] = $isD['regIP'];
					$isD['origDate'] = $isD['regDate'];
					$isD['regIP'] = $_SERVER['REMOTE_ADDR'];
					$isD['regDate'] = date("Y-m-d H:i:s");
					$this->site->dbInsert("admin_auth_history", $isD);
				}
				$this->site->dbDelete("admin_auth", array("mem_userid"=>$viewID, "admin_role"=>$adminRole));
			}
		}
	}

}
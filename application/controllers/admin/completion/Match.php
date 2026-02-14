<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Match class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>Match controller 입니다.
 */
class Match extends CB_Controller
{

	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'evaluation/match';

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
		$view['status'] = "";

		$where = array();


		$view['viewID'] = $viewID = $this->input->get("viewID", true);
		$status = $this->input->get("status", true);
		if (!empty($status)) {
			$view['status'] = $where['status'] = $status;
		}

		$view['cate'] = $this->config->item("cate");
		$view['cateName'] = $this->config->item("cateName");

		$view['year'] = 2023;
		$times = $this->input->get("viewTimes", true);
		if (!empty($times)) {
			$view['times'] = $where['times'] = $times;
		} else {
			$view['times'] = $where['times'] = 2;
		}
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
		if ($view['viewID']) $addSQL .= " and `researcherID` like '".$view['viewID']."' ";
		else $addSQL .= " group by comNo ";

		$applySQL = "select * from mf_apply where year = '".$where['year']."' and `times` = '".$where['times']."' and `category` = '".$where['category']."' and status != '부적격' ".$addSQL."  order by regDate desc";
		$view['applyD']= $this->site->selectQuery($applySQL);

		//echo $applySQL;

		$view['rList'] = $this->site->selectQuery("select mem_id, mem_userid, mem_username, (select count(no) as matchCnt from mf_apply as A where A.completionID = M.mem_userid and `times` = '".$where['times']."' and A.category = '".$view['viewCate']."') as matchCateCnt, (select count(no) as matchCnt from mf_apply as A where A.completionID = M.mem_userid ) as matchTotalCnt from mf_member as M where mem_userid like 'researcher%' order by mem_userid asc");

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'index');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}
	public function ajaxAssignCompletion() {
		if ($this->input->is_ajax_request()) {
			$aNo = $this->input->post("aNo", true);
			$mid = $this->input->post("mid", true);

			$upDB = array();
			$upDB['completionID '] = $mid;
			$this->site->dbUpdate("apply", $upDB, array("no"=>$aNo));

		}
	}
	public function ajaxAssignResearcher() {
		if ($this->input->is_ajax_request()) {
			$aNo = $this->input->post("aNo", true);
			$mid = $this->input->post("mid", true);

			$upDB = array();
			$upDB['completionID '] = $mid;
			$this->site->dbUpdate("apply", $upDB, array("no"=>$aNo));

		}
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

			$groupCnt = $this->site->selectQuery("select count(mgm_id) as cnt from mf_member_group_member where mgr_id = 2 ");
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
		$inDB['mem_userid'] = "researcher".$groupCnt;
		$inDB['mem_email'] = "researcher".$groupCnt."@smg_mf.com";

		$inDB['mem_password'] = $hash = password_hash($pw, PASSWORD_BCRYPT);
		$inDB['mem_username'] = "조사원".$groupCnt;
		$inDB['mem_nickname'] = "조사원".$groupCnt;
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
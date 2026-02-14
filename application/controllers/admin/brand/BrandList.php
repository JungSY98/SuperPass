<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * BrandList class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>페이지설정>BrandList 관리 controller 입니다.
 */
class BrandList extends CB_Controller
{

	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'brand/brandList';

	/**
	 * 모델을 로딩합니다
	 */
	protected $models = array();

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


		$view['bizD'] = $this->site->selectCI("*, (select count(mem_id) from gcs_member as M where M.mem_brand = B.no) as cnt", "brand as B", array(), "no desc");


		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'index');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}


	/**
	 * FORM 을 가져오는 메소드입니다
	 */
	public function form()
	{

		$view = array();
		$view['view'] = array();

		$view['bNo'] = $this->uri->segment(5);

		$bizD = $this->site->selectCI("*", "brand", array("no"=>$view['bNo']), "regDate desc");
		$view['bizD'] = isset($bizD[0]) ? $bizD[0] : array();
		// 추가항목
		$view['bizD']['bAddFieldKR'] = json_decode(element('bAddFieldKR', element('bizD', $view)) , true);
		$view['bizD']['bAddFieldEN'] = json_decode(element('bAddFieldEN', element('bizD', $view)) , true);



		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'form');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}

	public function save() {

		$bNo = $this->input->post("bNo", true);
		$bizIMGName = $this->input->post("bizIMGName", true);
		$bizIMGSource = $this->input->post("bizIMGSource", true);

		$data = array();
		$data['isUse'] = $this->input->post("isUse", true);
		$data['bizNameKR'] = $this->input->post("bizNameKR", true);
		$data['bizNameEN'] = $this->input->post("bizNameEN", true);


		$data['bizTel'] = $this->input->post("bizTel", true);
		$data['bizEmail'] = $this->input->post("bizEmail", true);
		$data['bWebsite'] = $this->input->post("bWebsite", true);
		$data['bSNS1'] = $this->input->post("bSNS1", true);
		$data['bSNS2'] = $this->input->post("bSNS2", true);
		$data['bSNS3'] = $this->input->post("bSNS3", true);
		$data['bSNS4'] = $this->input->post("bSNS4", true);

		$del_bizIMG = $this->input->post("del_bizIMG", true);
		if ($del_bizIMG) {
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/biz/".$del_bizIMG);
			$data['bizIMGName'] = $bizIMGName =  "";
			$data['bizIMGSource'] = $bizIMGSource = "";
		}

		if ($_FILES['bizIMG']['error']!=4) {
			$config = array();
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT']."/uploads/biz/";
			$config['allowed_types'] = 'png|gif|jpg|jpeg|webp';
			$config['max_size'] = '0';
			$config['max_width'] = '3000';
			$config['max_height'] = '3000';
			$config['overwrite'] = true;
			$config['encrypt_name'] = true;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("bizIMG")) {
				$imgData = $this->upload->data();
				$data['bizIMGName'] = $imgData['client_name'];
				$data['bizIMGSource'] = $imgData['file_name'];
			} else{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error',$error['error']);
				alert("첨부 이미지 업로드에 문제가 발생하였습니다. 다시 시도하여 주세요");
			}
		} else {
			$data['bizIMGName'] = $bizIMGName;
			$data['bizIMGSource'] = $bizIMGSource;
		}

		// 추가항목 처리 (국문)
		$fieldNameKR = $this->input->post("fieldNameKR");
		$fieldValueKR = $this->input->post("fieldValueKR");
		$addFieldKR = array();
		if (is_array($fieldNameKR))
		foreach($fieldNameKR as $k3 => $aName) {
			$addFieldKR[] = array($fieldNameKR[$k3],$fieldValueKR[$k3]);
		}
		$data['bAddFieldKR'] = json_encode($addFieldKR);

		// 추가항목 처리 (국문)
		$fieldNameEN = $this->input->post("fieldNameEN");
		$fieldValueEN = $this->input->post("fieldValueEN");
		$addFieldEN = array();
		if (is_array($addFieldEN))
		foreach($fieldNameEN as $k3 => $aName) {
			$addFieldEN[] = array($fieldNameEN[$k3],$fieldValueEN[$k3]);
		}
		$data['bAddFieldEN'] = json_encode($addFieldEN);

		if ($bNo) {
			$this->site->dbUpdate("brand", $data, array("no"=>$bNo));
		} else {
			$bNo = $this->site->dbInsert("brand", $data);
		}

		redirect("/admin/brand/brandList/");


	}

	public function ajaxDelBrand() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$fileD = $this->site->selectCI("*", "brand", array("no"=>$no), "");
			$fileD = isset($fileD[0]) ? $fileD[0] : array();
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/biz/".element("bizIMGSource", $fileD));
			$this->site->dbDelete("brand", array("no"=>$no));
			echo "삭제되었습니다.";
		}
	}


	public function ajaxGetBrandMember() {
		if ($this->input->is_ajax_request()) {
			$brandNo = $this->input->post("no", true);
			$listD = $this->site->selectCI("mem_id, mem_userid, mem_email, mem_username, mem_phone, mem_email, mem_register_datetime", "member", array("mem_brand"=>$brandNo), "");
			$this->output->set_content_type('application/json')->set_output(json_encode($listD));
		}
	}

	public function ajaxCheckDup() {
		if ($this->input->is_ajax_request()) {
			$userID = $this->input->post("userID", true);
			$isD1 = $this->site->selectCI("mem_userid", "member", array("mem_userid like"=>$userID), "");
			if (isset($isD1[0])) { 
				echo "※ 사용중인 아이디 입니다.";
			} else {
				echo "※ 사용가능한 아이디 입니다.";
			}
		}
	}


	public function ajaxSaveManager() {
		if ($this->input->is_ajax_request()) {
			$brandNo = $this->input->post("brandNo", true);
			$managerName = $this->input->post("managerName", true);
			$managerEmail = $this->input->post("managerEmail", true);
			$managerPhone = $this->input->post("managerPhone", true);
			$managerID = $this->input->post("managerID", true);
			$managerPW = $this->input->post("managerPW", true);

			$returnD = $inDB = array();
			$inDB['mem_userid'] = $managerID;
			$inDB['mem_email'] = $managerEmail;

			$inDB['mem_password'] = $hash = password_hash($managerPW, PASSWORD_BCRYPT);
			$inDB['mem_username'] = $managerName;
			$inDB['mem_nickname'] = $managerName;
			$inDB['mem_phone'] = $managerPhone;
			$inDB['mem_level'] = 4;
			$inDB['mem_register_datetime'] = date("Y-m-d H:i:s");
			$inDB['mem_register_ip'] = $_SERVER['REMOTE_ADDR'];
			$inDB['mem_adminmemo'] = $managerPW;
			$inDB['mem_brand'] = $brandNo;
			$mem_id = $this->site->dbInsert("member", $inDB);
			$inDB = array();
			$inDB['mgr_id'] = 5;
			$inDB['mem_id'] = $mem_id;
			$inDB['mgm_datetime'] = date("Y-m-d H:i:s");
			$done = $this->site->dbInsert("member_group_member", $inDB);
			echo $done ? "저장되었습니다." : "문제가 발생하였습니다. 다시 시도하여 주세요";
			//$this->output->set_content_type('application/json')->set_output(json_encode($returnD));
		}
	}


	public function ajaxGetManagerDetail() {
		if ($this->input->is_ajax_request()) {
			$mNo = $this->input->post("mNo", true);
			$isMain = $this->input->post("isMain", true);
			$managerD = $this->site->selectCI("mem_id, mem_userid, mem_email, mem_username, mem_phone, mem_email, mem_register_datetime", "member", array("mem_id"=>$mNo), "");
			$managerD = isset($managerD[0]) ? $managerD[0] : array();
			$this->output->set_content_type('application/json')->set_output(json_encode($managerD));
		}
	}

	public function ajaxModifyManager() {
		if ($this->input->is_ajax_request()) {

			$modifyNo = $this->input->post("modifyNo", true);
			$managerName = $this->input->post("managerName", true);
			$managerEmail = $this->input->post("managerEmail", true);
			$managerPhone = $this->input->post("managerPhone", true);
			$managerPW = $this->input->post("managerPW", true);

			$managerD = $this->site->selectCI("mem_userid", "member", array("mem_id"=>$modifyNo), "");
			$managerD = isset($managerD[0]) ? $managerD[0] : array();

			// member update
			$upDB2 = array();
			$upDB2['mem_username'] = $managerName;
			$upDB2['mem_nickname'] = $managerName;
			$upDB2['mem_email'] = $managerEmail;
			$upDB2['mem_phone'] = $managerPhone;
			if ($managerPW) {
				$upDB2['mem_password'] = password_hash($managerPW, PASSWORD_BCRYPT);
			}
			$this->site->dbUpdate("member", $upDB2, array("mem_userid"=>$managerD['mem_userid']));

			echo "수정되었습니다.";
		}
	}

	public function ajaxDeleteManager() {
		if ($this->input->is_ajax_request()) {
			$mNo = $this->input->post("mNo", true);
			$this->member->delete_member($mNo);
			echo "삭제 되었습니다.";
		}
	}


}
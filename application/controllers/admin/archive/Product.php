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
 * Product 메인 controller 입니다.
 */
class Product extends CB_Controller
{

	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = '';

	public $year = '2023';

	/**
	 * 모델을 로딩합니다
	 */
	protected $models = array('Post', 'Comment', 'Point');

	/**
	 * 이 컨트롤러의 메인 모델 이름입니다
	 */
	protected $modelname = '';

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
	}

	/**
	 * 관리자 메인 페이지입니다
	 */
	public function index() {

		$view = array();
		$view['view'] = array();

		$view['viewCate'] = '';
		$view['status'] = '';

			// 제품 리스트
			$sql = "SELECT 
					*,
					( select file_name from ds_archive_file_upload as F where F.applyNo = M.no and F.type= 'top' ) as fileName,
					( select infoValue from ds_archive_detail as D where D.applyNo = M.no and D.infoKey= 'resultTitle' ) as title
				FROM 
					ds_archive as M
				WHERE
					M.year = '2023'
				AND
					M.applyCategory = 'product'
				ORDER BY no desc
				";


			$view['bizD'] = $this->site->selectQuery($sql);


		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'product_list');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}





	/**
	 * 관리자 메인 페이지입니다
	 */
	public function form() {

		$view = array();
		$view['view'] = array();

		$view['year'] = "";
		$view['viewNo'] = $viewNo = $this->uri->segment(5);

		if ($viewNo) { 

			$sql = "select * from ds_archive where no = '".$viewNo."' ";
			$viewD = $this->site->selectQuery($sql);
			$view['bizD'] = isset($viewD[0]) ? $viewD[0] : alert("잘못된 요청입니다.");
			$view['year'] = $view['bizD']['year'];
			// 사진
			$picD = $this->site->selectCI("*", "archive_file_upload", array("applyNo"=>$viewNo), "");
			foreach($picD as $pKey => $pD) {
				$view['picD'][$pD['type']][] = $pD;
			}
			if (empty($view['picD']['middle'])) $view['picD']['middle'] = array();
			// 상세정보
			$detailD = $this->site->selectCI("*", "archive_detail", array("applyNo"=>$viewNo), "");
			foreach($detailD as $dKey => $dD) {
				$view['detailD'][$dD['infoKey']]= $dD['infoValue'];
			}
		} else {
			$view['bizD'] = array();
			$view['detailD'] = array();
			$view['picD']['top'] = array();
			$view['picD']['member'] = array();
			$view['picD']['middle'] = array();
		}

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'product_form');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}

	public function saveProduct() {

		$applyNo = $this->input->post("viewNo", true);
		$year = $this->input->post("year", true);
		$category = $this->input->post("applyCategory", true);

		$inDB = array();
		$inDB['year'] = $this->input->post("year", true);
		$inDB['times'] = 1;
		$inDB['userID'] = 'admin';
		$inDB['applyCategory'] = $this->input->post("applyCategory", true);
		$inDB['projectName'] = $_POST['com1Name'].' X '.$_POST['com2Name'];
		$inDB['agree'] = 'Y';
		$inDB['isBest'] = $this->input->post("isBest", true);
		$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
		$inDB['regDate'] = date("Y-m-d H:i:s");
		if ($applyNo) {
			unset($inDB['year']);
			$this->site->dbUpdate("archive", $inDB, array("no"=>$applyNo));
		} else {
			$applyNo = $this->site->dbInsert("archive", $inDB);
		}

		foreach($_POST as $k => $v) {
			if (preg_match("/mbname/", $k)) continue;
			if (preg_match("/File/", $k)) {
			} else {
				$isD = $this->site->selectCI("no", "archive_detail", array("applyNo"=>$applyNo, "infoKey"=>$k, "userID"=>'admin'), "no desc");
				if (isset($isD[0])) {
					$upDB2 = array();
					$value = empty($v) ? '' : $v;
					$upDB2['infoValue'] = (is_array($value)) ? json_encode($value) : $value;
					$upDB2['regIP'] = $_SERVER['REMOTE_ADDR'];
					$upDB2['regDate'] = date("Y-m-d H:i:s");
					$this->site->dbUpdate("archive_detail", $upDB2, array('no'=>$isD[0]['no']));
				} else {
					$inDB2 = array();
					$inDB2['applyNo'] = $applyNo;
					$inDB2['userID'] = 'admin';
					$inDB2['infoKey'] = $k;
					$value =  $this->input->post($k);
					$value = empty($value) ? '' : $value;
					$inDB2['infoValue'] = (is_array($value)) ? json_encode($value) : $value;
					$inDB2['regIP'] = $_SERVER['REMOTE_ADDR'];
					$inDB2['regDate'] = date("Y-m-d H:i:s");
					$this->site->dbInsert("archive_detail", $inDB2);
				}
			}
		}

		foreach($_POST['mbname'] as $kkk => $mbD) {
			$inDB3 = array();
			$inDB3['applyNo'] = $applyNo;
			$inDB3['type'] = 'member';
			if ($_FILES['mbimage']['error'][$kkk]!=4) { // 신규 업로드
				// 기존 파일 삭제
				@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/apply/".$year."/archive/".$_POST['uploadMember'][$kkk]);
				$_FILES['temp'] = array(
					'name' => $_FILES['mbimage']['name'][$kkk],
					'type' => $_FILES['mbimage']['type'][$kkk],
					'tmp_name' => $_FILES['mbimage']['tmp_name'][$kkk],
					'error' => $_FILES['mbimage']['error'][$kkk],
					'size' => $_FILES['mbimage']['size'][$kkk]
				);
				$fileD = $this->site->fileUp($_SERVER['DOCUMENT_ROOT']."/uploads/apply/".$year."/archive/", "temp");
				$inDB3['file_name'] = $fileD['file_name'];
				$inDB3['client_name'] = $fileD['client_name'];
				$inDB3['file_data'] = json_encode($fileD);
			} else { // 기존 자료 업데이트
				$inDB3['file_name'] = $_POST['uploadMember'][$kkk];
				$inDB3['client_name'] = $_POST['uploadMemberC'][$kkk];
				$inDB3['file_data'] = $_POST['uploadMemberD'][$kkk];
			}

			$inDB3['file_explain'] = $_POST['mbname'][$kkk];
			$inDB3['regIP'] = $_SERVER['REMOTE_ADDR'];
			$inDB3['regDate'] = date("Y-m-d H:i:s");

			$updateNo = element($kkk, element('uploadMemberNo', $_POST));
			if ($updateNo) {
				$this->site->dbUpdate("archive_file_upload", $inDB3, array("no"=>$updateNo));
			} else {
				$this->site->dbInsert("archive_file_upload", $inDB3);
			}

		}


		foreach($_POST['uploadFileId'] as $kk => $fileD) {
			$inDB3 = array();
			$inDB3['applyNo'] = $applyNo;
			$inDB3['type'] = $_POST['uploadFileType'][$kk];
			$inDB3['file_name'] = $_POST['uploadFileId'][$kk];
			$inDB3['client_name'] = $_POST['uploadFileNames'][$kk];
			$inDB3['file_data'] = json_encode($_POST['uploadFilesInfo'][$kk]);
			$inDB3['file_explain'] = $_POST['uploadFileExplain'][$kk];
			$inDB3['regIP'] = $_SERVER['REMOTE_ADDR'];
			$inDB3['regDate'] = date("Y-m-d H:i:s");
			$updateNo = element($kk, element('uploadFileNo', $_POST));
			if ($updateNo) {
				$this->site->dbUpdate("archive_file_upload", $inDB3, array("no"=>$updateNo));
			} else {
				$this->site->dbInsert("archive_file_upload", $inDB3);
			}
		}

		redirect("/admin/archive/".$category."/");

	}

	public function imgUpload() {

		$view = array();
		$view['view'] = array();


		// 제품 리스트
		$sql = "SELECT 
				* FROM (
				SELECT
				*,
				( select file_name from ds_archive_file_upload as F where F.applyNo = M.no and F.type= 'top' limit 0,1 ) as fileName,
				( select infoValue from ds_archive_detail as D where D.applyNo = M.no and D.infoKey= 'resultTitle' ) as title,
				( select infoValue from ds_archive_detail as D where D.applyNo = M.no and D.infoKey= 'com1Name' ) as com1Name
			FROM 
				ds_archive as M
			WHERE
				M.year = '2023'
			ORDER BY applyCategory ASC, no desc
			) as Main
			ORDER BY applyCategory ASC, com1Name ASC
			";


		$view['bizD'] = $this->site->selectQuery($sql);

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'img_up');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}

	public function fileupload() {
		$inDB3 = array();
		$inDB3['applyNo'] = $this->input->post("keyNo", true);
		$inDB3['type'] = "list";
		$fileD = $this->site->fileUp($_SERVER['DOCUMENT_ROOT']."/uploads/apply/2023/archive/", "listIMG");
		$inDB3['file_name'] = $fileD['file_name'];
		$inDB3['client_name'] = $fileD['client_name'];
		$inDB3['file_data'] = json_encode($fileD);
		$inDB3['regIP'] = $_SERVER['REMOTE_ADDR'];
		$inDB3['regDate'] = date("Y-m-d H:i:s");

		$this->site->dbInsert("archive_file_upload", $inDB3);
		redirect("/admin/archive/product/imgUpload/");
	}


	public function ajaxDelUploadPhoto() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$fileD = $this->site->selectCI("no, applyNo, file_name, (select year from ds_apply as A where A.no = F.applyNo ) as year", "archive_file_upload as F", array("no"=>$no), "no asc");
			$fileD = isset($fileD[0]) ? $fileD[0] : array();
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/apply/".$fileD['year']."/archive/".$fileD['file_name']);
			$this->site->dbDelete("archive_file_upload", array("no"=>$no));
		}
	}




}

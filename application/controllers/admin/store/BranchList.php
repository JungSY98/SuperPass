<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * BranchList class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자 > Store > BranchList 관리 controller 입니다.
 */
class BranchList extends CB_Controller
{
	public $year = 2025;
	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'store/BranchList';

	/**
	 * 모델을 로딩합니다
	 */
	protected $models = array();

	/**
	 * 헬퍼를 로딩합니다
	 */
	protected $helpers = array('form', 'array', 'dhtml_editor');

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

		$year = $this->input->get("viewYear");
		$view['viewYear'] = $year ? $year : $this->year;

		$view['branchD'] = $this->site->selectCI("*", "branch as S", array(), "no desc");


		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'branch_list');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}


	public function form() {

		$view = array();
		$view['sNo'] = $sNo = $this->uri->segment(5);
		$view['applyYear'] = $this->year;

		$branchD = $this->site->selectCI("*", "branch as S", array("no"=>$sNo), "no desc");
		$view['branchD'] = isset($branchD[0]) ? $branchD[0] : array();
		// 추가항목
		$view['branchD']['sAddFieldKR'] = @json_decode(element('sAddFieldKR', element('branchD', $view)) , true);
		$view['branchD']['sAddFieldEN'] = @json_decode(element('sAddFieldEN', element('branchD', $view)) , true);

		if (empty($view['sNo'])) {
			$view['sNo'] = $_SESSION['sNo'] = time();
		}

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

		//print_r2($_POST);
		//print_r2($_FILES);

		$sNo = $this->input->post("sNo", true);
		$sMainIMG_Name = $this->input->post("sMainIMG_Name", true);
		$sMainIMG_Source = $this->input->post("sMainIMG_Source", true);

		$data = array();
		$data['isUse'] = $this->input->post("isUse", true);
		$data['isStamp'] = $this->input->post("isStamp", true);
		$data['year'] = $this->input->post("year", true);
		//$data['brandNo'] = $this->input->post("brandNo", true);
		$data['sNameKR'] = $this->input->post("sNameKR", true);
		$data['sNameEN'] = $this->input->post("sNameEN", true);
		$data['sDescKR'] = $this->input->post("sDescKR", true);
		$data['sDescEN'] = $this->input->post("sDescEN", true);

		$data['sAddr1KR'] = $addr1 =$this->input->post("sAddr1KR", true);
		$data['sAddr2KR'] = $addr2 =$this->input->post("sAddr2KR", true);
		$data['sAddr3KR'] = $this->input->post("sAddr3KR", true);
		$data['sAddr1EN'] = $this->input->post("sAddr1EN", true);
		$data['sAddr2EN'] = $this->input->post("sAddr2EN", true);
		$data['sAddr3EN'] = $this->input->post("sAddr3EN", true);
		$data['sOpenTime'] = $this->input->post("sOpenTime", true);
		$data['sContact'] = $this->input->post("sContact", true);
		$data['mapLng'] = $this->input->post("mapLng", true);
		$data['mapLat'] = $this->input->post("mapLat", true);
		$data['sLink1'] = $this->input->post("sLink1", true);
		$data['sLink2'] = $this->input->post("sLink2", true);
		$data['sLink3'] = $this->input->post("sLink3", true);


		if (!$data['mapLng'] && !$data['mapLat']) {

			$map_query=str_replace(" "," ","$addr1 $addr2");
			$url = "https://dapi.kakao.com/v2/local/search/address";
			$fields = array("analyze_type"=>"similar", "page"=>1, "size"=>10, "query"=>$map_query);

			$post_field_string = http_build_query($fields, '', '&');
			$header = array("Authorization: KakaoAK ".rawurlencode("aa9d5d2c85ee68a2073f6f35f14e75dc"), "'Content-Type: application/json", "Accept: application/json");

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLINFO_HEADER_OUT, true);
			curl_setopt($ch, CURLOPT_NOBODY, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 결과를 반환하도록 설정
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // 리다이렉트 허용
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);

			curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 타임아웃 설정
			$response  = curl_exec($ch);
			$result = json_decode(substr($response, strpos($response, '{')), true);
			curl_close($ch);
			$data['mapLng'] = element("x", element(0, element("documents", $result)));
			$data['mapLat'] = element("y", element(0, element("documents", $result)));
		}
	

		$del_spotIMG = $this->input->post("del_spotIMG", true);
		if ($del_spotIMG) {
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/branch/".$del_spotIMG);
			$data['sMainIMG_Name'] = $sMainIMG_Name =  "";
			$data['sMainIMG_Source'] = $sMainIMG_Source = "";
		}

		if ($_FILES['sIMG']['error']!=4) {
			$config = array();
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT']."/uploads/branch/";
			$config['allowed_types'] = 'png|gif|jpg|jpeg|webp';
			$config['max_size'] = '0';
			$config['max_width'] = '3000';
			$config['max_height'] = '3000';
			$config['overwrite'] = true;
			$config['encrypt_name'] = true;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("sIMG")) {
				$imgData = $this->upload->data();
				$data['sMainIMG_Name'] = $imgData['client_name'];
				$data['sMainIMG_Source'] = $imgData['file_name'];
			} else{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error',$error['error']);
				alert("첨부 이미지 업로드에 문제가 발생하였습니다. 다시 시도하여 주세요");
			}
		} else {
			$data['sMainIMG_Name'] = $sMainIMG_Name;
			$data['sMainIMG_Source'] = $sMainIMG_Source;
		}

		// 추가항목 처리 (국문)
		$fieldNameKR = $this->input->post("fieldNameKR");
		$fieldValueKR = $this->input->post("fieldValueKR");
		$addFieldKR = array();
		if (!empty($fieldNameKR))
		foreach($fieldNameKR as $k3 => $aName) {
			$addFieldKR[] = array($fieldNameKR[$k3],$fieldValueKR[$k3]);
		}
		$data['sAddFieldKR'] = json_encode($addFieldKR);

		// 추가항목 처리 (영문)
		$fieldNameEN = $this->input->post("fieldNameEN");
		$fieldValueEN = $this->input->post("fieldValueEN");

		$addFieldEN = array();
		if (!empty($addFieldEN))
		foreach($fieldNameEN as $k3 => $aName) {
			$addFieldEN[] = array($fieldNameEN[$k3],$fieldValueEN[$k3]);
		}
		$data['sAddFieldEN'] = json_encode($addFieldEN);

		$data['regIP'] = $_SERVER['REMOTE_ADDR'];
		$data['regDate'] = date("Y-m-d H:i:s");

		if (strlen($sNo)!=10 && $sNo) {
			$this->site->dbUpdate("branch", $data, array("no"=>$sNo));
		} else {
			$branchNo = $this->site->dbInsert("branch", $data);
			@rename($_SERVER['DOCUMENT_ROOT']."/uploads/branch/".$sNo, $_SERVER['DOCUMENT_ROOT']."/uploads/branch/".$branchNo);
			$this->site->dbUpdate("branch_file_upload", array("branchNo"=>$branchNo), array("branchNo"=>$sNo));

		}

		redirect("/admin/store/branchList/");

	}



	public function upload() {

		// Make sure file is not cached (as it happens for example on iOS devices)
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		/* 
		// Support CORS
		header("Access-Control-Allow-Origin: *");
		// other CORS headers if any...
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			exit; // finish preflight CORS requests here
		}
		*/

		// 5 minutes execution time
		@set_time_limit(5 * 60);

		// Uncomment this one to fake upload time
		// usleep(5000);

		// Settings
		//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
		$targetDir = $_SERVER['DOCUMENT_ROOT'].'/uploads/branch/';
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds


		// Create target dir
		if (!file_exists($targetDir)) {
			@mkdir($targetDir);
		}

		// Get a file name
		if (isset($_REQUEST["name"])) {
			$fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid("file_");
		}

		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

		// Chunking might be enabled
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


		// Remove old temp files	
		if ($cleanupTargetDir) {
			if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}

			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}.part") {
					continue;
				}

				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}	


		// Open temp file
		if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}

		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			}

			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		} else {	
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		}

		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}

		@fclose($out);
		@fclose($in);

		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off 
			rename("{$filePath}.part", $filePath);
		}

		// Return Success JSON-RPC response
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

	}


	public function ajaxUploadFile() {
		if ($this->input->is_ajax_request()) {
			$arrUploadFiles = $this->input->post("arrUploadFiles");
			$type = $this->input->post("type", true);
			$branchNo = $this->input->post("branchNo", true);
			$arrType = explode("_", $type);
			foreach($arrUploadFiles as $k => $fileD) {
				$inDB = array();
				$inDB['branchNo'] = $branchNo;
				$inDB['type'] = $type;
				$inDB['file_name'] = $fileD['fileName'];
				$inDB['client_name'] = $fileD['clientName'];
				$inDB['file_data'] = $fileD['fileData'];
				$inDB['file_explain'] = $type;
				$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
				$inDB['regDate'] = date("Y-m-d H:i:s");
				$this->site->dbInsert("branch_file_upload", $inDB);
			}
		}
	}

	// 이미지 정보 제공
	public function ajaxGetUploadPhoto() {
		if ($this->input->is_ajax_request()) {
			$type = $this->input->post("type", true);
			$branchNo = $this->input->post("branchNo", true);
			$btn = $this->input->post("btn", true);
			$fileD = $this->site->selectCI("*", "branch_file_upload as F", array("branchNo"=>$branchNo, "type"=>$type), "sort_order asc, no asc");
			$html = "";
			foreach($fileD as $k => $fD) {
				$html .= "<li class='col-sm-6 col-xs-12 mb-4 grid-item' id='imgFileView".$fD['no']."' data-no='".$fD['no']."'>";
				$html .= "<input type='hidden' name='image_no[]' value='".$fD['no']."'>";
				if (preg_match("/(.png|.gif|.jpeg|.jpg)/i", $fD['file_name'])) {
					$html .= "<img src='/uploads/branch/".$fD['file_name']."'>";
				} else {
					$html .= "<a href='/viewFiles/".$fD['file_name']."/' class='btn btn-dark w-100'>".$fD['client_name']."</a>";
				}
				if ($btn!='hidden') $html .= "<div class='float-end btn btn-sm btn-danger' onclick='return fnDelFile(".$fD['no'].")'>삭제</div>";
				$html .= "<div class='input-group input-group-sm mt-1'>";
				$html .= "<span class='input-group-text'><i class='fa fa-arrows-alt'></i> 순서</span>";
				$html .= "<input type='number' name='image_sort[]' class='form-control sort-input' value='".$fD['sort_order']."'>";
				$html .= "</div>";
				$html .= "<p class='mb-0 mt-1'><input type='text' name='image_explain[]' class='form-control form-control-sm' value='".$fD['file_explain']."' placeholder='설명'></p>";
				$html .= "</li>";
			}
			echo $html;
		}
	}



	// 업로드 파일 설명과 함께 저장
	public function ajaxUploadPhoto() {
		if ($this->input->is_ajax_request()) {
			$arrUploadFiles = $this->input->post("arrUploadFiles");
			$type = $this->input->post("type", true);
			$branchNo = $this->input->post("branchNo", true);
			foreach($arrUploadFiles as $k => $fileD) {
				$inDB = array();
				$inDB['branchNo'] = $branchNo;
				$inDB['year'] = $this->year;
				$inDB['type'] = $type;
				$inDB['file_name'] = $fileD['fileName'];
				$inDB['client_name'] = $fileD['clientName'];
				$inDB['file_data'] = $fileD['fileData'];
				$inDB['file_explain'] = $fileD['fileExplain'];
				$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
				$inDB['regDate'] = date("Y-m-d H:i:s");
				$this->site->dbInsert("branch_file_upload", $inDB);
			}
		}
	}

	// 이미지 정보(순서, 설명) 업데이트
	public function ajaxUpdatePhotoInfo() {
		if ($this->input->is_ajax_request()) {
			$image_no = $this->input->post("image_no");
			$image_sort = $this->input->post("image_sort");
			$image_explain = $this->input->post("image_explain");

			if (is_array($image_no)) {
				foreach($image_no as $k => $no) {
					$updateData = array(
						'sort_order' => $image_sort[$k],
						'file_explain' => $image_explain[$k]
					);
					$this->site->dbUpdate("branch_file_upload", $updateData, array("no" => $no));
				}
				echo "저장되었습니다.";
			}
		}
	}


	// 파일삭제
	public function ajaxDelUploadPhoto() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$fileD = $this->site->selectCI("no, branchNo, file_name, year", "branch_file_upload as F", array("no"=>$no), "no asc");
			$fileD = isset($fileD[0]) ? $fileD[0] : array();
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/branch/".$fileD['file_name']);
			$this->site->dbDelete("branch_file_upload", array("no"=>$no));
		}
	}


	public function ajaxDelBranch() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$fileD = $this->site->selectCI("*", "branch_file_upload", array("branchNo"=>$no), "");
			foreach($fileD as $k => $fD) {
				@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/branch/".$fD['file_name']);
			}
			$this->site->dbDelete("branch_file_upload", array("branchNo"=>$no));
			$this->site->dbDelete("branch", array("no"=>$no));
			echo "삭제되었습니다.";
		}
	}



}
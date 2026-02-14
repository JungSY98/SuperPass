<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ProductList class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>페이지설정>ProductList 관리 controller 입니다.
 */
class ProductList extends CB_Controller
{
	public $year;
	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'product/productList';

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
		$this->year = 2024;
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


		$view['productD'] = $this->site->selectCI("*, 
			(select concat(bizNameKR, ' _ ', bizNameEN)  from gcs_brand as B where B.no = P.brandNo ) as brandName,
			(select concat(year, '/', productNo,'/',file_name)  from gcs_product_file_upload as F where F.productNo = P.no order by no desc limit 0,1) as fileName
		", "product as P", array(), "no desc");


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

		$view['pNo'] = $this->uri->segment(5);
		$view['applyYear'] = $this->year;

		$brandD = $this->site->selectCI("no, bizNameKR, bizNameEN", "brand", array(), "no asc");
		foreach($brandD as $k => $bD) {
			$view['brandD'][$bD['no']] = array("no"=>$bD['no'], "name"=>$bD['bizNameKR']. " _ ".$bD['bizNameEN']);
		}

		$productD = $this->site->selectCI("*", "product", array("no"=>$view['pNo']), "regDate desc");
		$view['productD'] = isset($productD[0]) ? $productD[0] : array();
		// 추가항목
		$view['productD']['pAddFieldKR'] = json_decode(element('pAddFieldKR', element('productD', $view)) , true);
		$view['productD']['pAddFieldEN'] = json_decode(element('pAddFieldEN', element('productD', $view)) , true);



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

		$pNo = $this->input->post("pNo", true);

		$data = array();
		$data['isUse'] = $this->input->post("isUse", true);
		$data['year'] = $this->input->post("year", true);
		$data['brandNo'] = $this->input->post("brandNo", true);
		$data['pNameKR'] = $this->input->post("pNameKR", true);
		$data['pNameEN'] = $this->input->post("pNameEN", true);
		$data['pDescKR'] = $this->input->post("pDescKR", true);
		$data['pDescEN'] = $this->input->post("pDescEN", true);



		// 추가항목 처리 (국문)
		$fieldNameKR = $this->input->post("fieldNameKR");
		$fieldValueKR = $this->input->post("fieldValueKR");
		$addFieldKR = array();
		if (is_array($fieldNameKR))
		foreach($fieldNameKR as $k3 => $aName) {
			$addFieldKR[] = array($fieldNameKR[$k3],$fieldValueKR[$k3]);
		}
		$data['pAddFieldKR'] = json_encode($addFieldKR);

		// 추가항목 처리 (국문)
		$fieldNameEN = $this->input->post("fieldNameEN");
		$fieldValueEN = $this->input->post("fieldValueEN");
		$addFieldEN = array();
		if (is_array($addFieldEN))
		foreach($fieldNameEN as $k3 => $aName) {
			$addFieldEN[] = array($fieldNameEN[$k3],$fieldValueEN[$k3]);
		}
		$data['pAddFieldEN'] = json_encode($addFieldEN);

		if ($pNo) {
			$this->site->dbUpdate("product", $data, array("no"=>$pNo));
		} else {
			$pNo = $this->site->dbInsert("product", $data);
		}

		redirect("/admin/product/productList/");


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
		$targetDir = $_SERVER['DOCUMENT_ROOT'].'/uploads/product/'.$this->year.'/'.$_POST['productNo'];
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
			$fileTypeD = $this->config->item("document2");
			$arrUploadFiles = $this->input->post("arrUploadFiles");
			$type = $this->input->post("type", true);
			$productNo = $this->input->post("productNo", true);
			$arrType = explode("_", $type);
			foreach($arrUploadFiles as $k => $fileD) {
				$inDB = array();
				$inDB['productNo'] = $productNo;
				$inDB['type'] = $type;
				$inDB['file_name'] = $fileD['fileName'];
				$inDB['client_name'] = $fileD['clientName'];
				$inDB['file_data'] = $fileD['fileData'];
				$inDB['file_explain'] = element(element(0, $arrType), $fileTypeD);
				$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
				$inDB['regDate'] = date("Y-m-d H:i:s");
				$this->site->dbInsert("apply_file_upload", $inDB);
			}
		}
	}

	// 이미지 정보 제공
	public function ajaxGetUploadPhoto() {
		if ($this->input->is_ajax_request()) {
			$type = $this->input->post("type", true);
			$productNo = $this->input->post("productNo", true);
			$btn = $this->input->post("btn", true);
			$fileD = $this->site->selectCI("*", "product_file_upload as F", array("productNo"=>$productNo, "type"=>$type), "no asc");
			$html = "";
			foreach($fileD as $k => $fD) {
				$html .= "<li class='col-sm-6 col-xs-12 mb-4 grid-item' id='imgFileView".$fD['no']."'>";
				if (preg_match("/(.png|.gif|.jpeg|.jpg)/i", $fD['file_name'])) {
					$html .= "<img src='/uploads/product/".$fD['year']."/".$fD['productNo']."/".$fD['file_name']."'>";
				} else {
					$html .= "<a href='/viewFiles/".$fD['file_name']."/' class='btn btn-dark w-100'>".$fD['client_name']."</a>";
				}
				if ($btn!='hidden') $html .= "<div class='float-end btn btn-sm btn-danger' onclick='return fnDelFile(".$fD['no'].")'>삭제</div>";
				$html .= "<p class='mb-0'>".$fD['file_explain']."</p>";
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
			$productNo = $this->input->post("productNo", true);
			foreach($arrUploadFiles as $k => $fileD) {
				$inDB = array();
				$inDB['productNo'] = $productNo;
				$inDB['year'] = $this->year;
				$inDB['type'] = $type;
				$inDB['file_name'] = $fileD['fileName'];
				$inDB['client_name'] = $fileD['clientName'];
				$inDB['file_data'] = $fileD['fileData'];
				$inDB['file_explain'] = $fileD['fileExplain'];
				$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
				$inDB['regDate'] = date("Y-m-d H:i:s");
				$this->site->dbInsert("product_file_upload", $inDB);
			}
		}
	}

	// 파일삭제
	public function ajaxDelUploadPhoto() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$fileD = $this->site->selectCI("no, productNo, file_name, year", "product_file_upload as F", array("no"=>$no), "no asc");
			$fileD = isset($fileD[0]) ? $fileD[0] : array();
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/product/".$fileD['year']."/".$fileD['productNo']."/".$fileD['file_name']);
			$this->site->dbDelete("product_file_upload", array("no"=>$no));
		}
	}


	public function ajaxDelProduct() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$fileD = $this->site->selectCI("*", "product_file_upload", array("productNo"=>$no), "");
			foreach($fileD as $k => $fD) {
				@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/product/".$fD['year']."/".$fD['productNo']."/".$fD['file_name']);
			}
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/product/".$fD['year']."/".$fD['productNo']);
			$this->site->dbDelete("product_file_upload", array("productNo"=>$no));
			$this->site->dbDelete("product", array("no"=>$no));
			echo "삭제되었습니다.";
		}
	}


}
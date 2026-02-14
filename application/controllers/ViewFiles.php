<?php
class ViewFiles extends CB_Controller {

	public $aSeason = "2024";

	function __construct() {
		parent::__construct();
		define("DATA_PATH", $_SERVER["DOCUMENT_ROOT"]."/uploads");
	}

	// 페이지 보기
    public function index() {

		$fileName = $this->uri->segment(2);
		$season = $season ? $season : $this->aSeason;
		$fileD = $this->site->selectCI("*", "product_file_upload as F", array("file_name"=>$fileName), "");
		$fileD = isset($fileD[0]) ? $fileD[0] : array();
		if (empty($fileD)) {
			alert("해당 파일 정보가 없습니다");
		}


		$filepath = addslashes(DATA_PATH.'/product/'.$fileD['year'].'/'.$fileD['applyNo'].'/'.$fileD['file_name']);

		if (file_exists($filepath)) {
			if (preg_match("/^utf/i", $this->config->item('charset')))
				$original = urldecode($fileD['client_name']);
			else
				$original = $fileD['client_name'];

			$this->load->helper('download');
			if (!force_download($original, file_get_contents($filepath)))
				alert('파일을 찾을 수 없습니다. 1');
		} else alert('파일을 찾을 수 없습니다. 2');
			

	}
}
<?php
class Files extends CB_Controller {

	public $aSeason = "2024";

	function __construct() {
		parent::__construct();
		define("DATA_PATH", $_SERVER["DOCUMENT_ROOT"]."/uploads");
	}

	// 페이지 보기
    public function index() {

		$fileName = $this->uri->segment(2);
		$folder = $this->uri->segment(3);
		$fileType = $this->uri->segment(4);
		$originName = $this->uri->segment(5);
		$originName = str_replace("+","_",$originName);
		$domain = $this->config->item('base_url');
		$season = $this->uri->segment(6); 
		$season = $season ? $season : $this->aSeason;

		if ($folder=='apply') {
			$fileD = $this->site->selectCI("*", "apply_file_upload", array("file_name"=>$fileName), "");
			$fileD = isset($fileD[0]) ? $fileD[0] : alert("파일을 찾을 수 없습니다. 3");
			$filepath = addslashes(DATA_PATH.'/'.$folder.'/'.$season.'/'.$fileD['applyNo'].'/'.$fileName);
		} else {
			$filepath = addslashes(DATA_PATH.'/'.$folder.'/'.$season.'/'.$fileName);
		}



		if (file_exists($filepath)) {
			if (preg_match("/^utf/i", $this->config->item('charset')))
				$original = urldecode($originName);
			else
				$original = $originName;

			$this->load->helper('download');
			if (!force_download($original, file_get_contents($filepath)))
				alert('파일을 찾을 수 없습니다. 1');
		} else alert('파일을 찾을 수 없습니다. 2');
			

	}
}
<?php
class DownFiles extends CB_Controller {

	public $aSeason = "2024";

	function __construct() {
		parent::__construct();
		define("DATA_PATH", $_SERVER["DOCUMENT_ROOT"]."/uploads");
		$this->lang->load("website", element("langSet", $_SESSION));
	}

	// 페이지 보기
    public function index() {

		$fileName = $this->uri->segment(2);
		$lang = $this->lang->language['site'];

		$applyD = $this->site->selectQuery("select * from gcs_applylist where addValue like '%".$fileName."%' ");
		$applyD = isset($applyD[0]) ? $applyD[0] : array();
		if (empty($applyD)) {
			alert("해당 파일 정보가 없습니다");
		}
		$addD = json_decode($applyD['addValue'], true);
		$has = false;
		foreach($addD as $k => $v) {
			if (preg_match("/".$fileName."/i", $v['fieldValue'])) {
				$has = true;
				$fileD = json_decode($v['fieldValue'], true);

				$filepath = addslashes(DATA_PATH.'/apply/'.$fileD['file_name']);

				if (file_exists($filepath)) {
					if (preg_match("/^utf/i", $this->config->item('charset')))
						$original = urldecode($fileD['client_name']);
					else
						$original = $fileD['client_name'];

					$this->load->helper('download');
					if (!force_download($original, file_get_contents($filepath)))
						alert($lang['notfound'].' 1');
				} else alert($lang['notfound'].' 2');
			}
		}

		if ($has == false) alert($lang['notfound'].'3');
	}
}
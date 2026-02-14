<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ApplyBuyer class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>등록>ApplyBuyer controller 입니다.
 */
class ApplyBuyer extends CB_Controller
{

	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'register/applyBuyer';

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

		$status = $this->input->get("status", true);
		if (!empty($status)) {
			$view['status'] = $where['status'] = $status;
		}

		$where['pType'] = 'buyer';



		$view['btnColor'] = array("접수" => "btn-secondary", "허용" => "btn-success", "반려" => "btn-danger");


		// , (select memo from gcs_applylist_memo as M where M.applyNo = A.no ) as memo
		$applyD = $this->site->selectCI("*", "applylist as A", $where, "regDate desc");
		$cntArea = array();
		foreach($applyD as $k => $aD) {

			$detailD = json_decode($aD['addValue'], true);
			foreach($detailD as $kk => $dD) {
				$applyD[$k][$dD['fieldID']] = $dD['fieldValue'];
			}

		}
		$view['applyD'] = $applyD;

		//$this->output->enable_profiler(TRUE);

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'index');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}


	public function ajaxSetStatus() {
		if ($this->input->is_ajax_request()) {
			$value = $this->input->post("value", true);
			$applyNo = $this->input->post("no", true);
			$this->site->dbUpdate("applylist", array("status"=>$value), array("no"=>$applyNo));
			echo "변경 되었습니다.";
		}
	}




	public function form() {

		$view = array();
		$view['view'] = array();

		$view['keyNo'] = $this->uri->segment(5);
		$view['applyNo'] =$view['keyNo'];

		$view['cate'] = $this->config->item("cate");
		$view['cateName'] = $this->config->item("cateName");
		//$view['category'] = $this->getCategory();

		$view['formData'] = '';

		$applyD = $this->site->selectCI("*", "applylist", array("no"=>$view['keyNo']), "");
		$view['applyD'] = isset($applyD[0]) ? $applyD[0] : alert("일치하는 정보가 없습니다.");
		$detailD = json_decode($applyD[0]['addValue'], true);
		foreach($detailD as $kk => $dD) {
			$view['applyD'][$dD['fieldID']] = $dD['fieldValue'];
		}
		//print_r2($view['applyD']);

		$formD = $this->site->selectQuery("select * from gcs_applyform where pNo = '1' order by fieldOrder asc, no asc");
		$view['formData'] .= '<div class="row">';
		foreach($formD as $k => $fD) {
			if ($fD['isTitle']=='Y') {
				$view['formData'] .= '<div class="col-12"><hr><h5>'.$fD['fieldName'].'</h5><hr></div>';
				continue;
			} else if ($fD['isSeper']=='Y') {
				continue;
			} else if ($fD['fieldType']=='file') {
				$fileD = json_decode($view['applyD'][$fD['fieldID']], true);
				if (element('file_name', $fileD)) { 
					$view['applyD'][$fD['fieldID']] = '<a href='.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/downFiles/'.$fileD['file_name'].' class="btn btn-secondary">'.$fileD['client_name'].'</a>';
				} else {
					$view['applyD'][$fD['fieldID']] = '-';
				}
			} else if ($fD['fieldType']=='checkbox') {
				$view['applyD'][$fD['fieldID']] = str_replace("|||", ", ", $view['applyD'][$fD['fieldID']]);
			}
			$view['formData'] .= '<div class="col-sm-3 mb-2"><h5>'.$fD['fieldName'].'</h5></div>';
			$view['formData'] .= '<div class="col-sm-9 mb-2">'.$view['applyD'][$fD['fieldID']].'</div>';

		}
		$view['formData'] .= '</div>';

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'form');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}



	public function ajaxViewFinal() {
		if ($this->input->is_ajax_request()) {
			$arrReturn = array();
			$sess = $this->member->item("mem_userid", true);
			$mem_id = $this->input->post("mem_id", true);
			$applyNo = $this->input->post("no", true);
			if ($sess && $sess == $mem_id) {

				$applyD = $this->site->selectCI("no, status, status2, (select memo from ds_apply_memo as M WHERE M.applyNo = A.no) as memo", "apply as A", array("no"=>$applyNo), "");
				$applyD = isset($applyD[0]) ? $applyD[0] : array();
				$arrReturn['status2'] = $applyD['status2'];
				$arrReturn['memo'] = $applyD['memo'];
				$arrReturn['stat'] = 'true';
				$arrReturn['msg'] = "로그인 정보가 일치합니다.";
				
			} else {
				$arrReturn['stat'] = 'false';
				$arrReturn['msg'] = "로그인 정보가 필요합니다.";
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($arrReturn));
		}
	}


	public function viewFinal() {

		$view = array();
		$view['view'] = array();
		$viewNo = $this->uri->segment(5);


		$applyD = $this->site->selectCI("*", "applylist", array("no"=>$viewNo), "");
		$view['applyD'] = isset($applyD[0]) ? $applyD[0] : array();
		$view['applyNo'] = element("no", $view['applyD']);
		$view['arrStep'] = array('step5' => true);

		$view['document'] = $this->config->item("document");
		$detailD = $this->site->selectCI("*", "apply_detail", array("applyNo"=>$viewNo), "");
		$view['detailD'] = array();
		foreach($detailD as $k => $d) {
			$view['detailD'][$d['infoKey']] = $d['infoValue'];
		}
		$estimateD = $this->site->selectCI("*", "apply_estimate", array("applyNo"=>$viewNo), "rank asc");
		$view['estimateD'] = array();
		$view['estimateD']['Worker'] = array();
		$view['estimateD']['Direct'] = array();
		$view['estimateD']['Etc'] = array();
		foreach($estimateD as $k => $d) {
			$view['estimateD'][$d['type']][] = array("rank"=>$d['rank'], "item"=>$d['item'], "price"=>$d['price'], "exp"=>$d['exp'], "content"=>$d['content']);
		}
		$fileD = $this->site->selectQuery("select * from ds_apply_file_upload where applyNo = '".$view['applyNo']."' and type like 'docu%' order by no asc");
		$view['fileD'] = array();
		foreach($fileD as $k => $d) {
			$fileType = explode("_", $d['type']);
			$view['fileD'][$fileType[0]][$fileType[1]]= $d;
		}

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout_popup', 'skin' => 'viewFinal');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}


	public function dnList() {

		//alert("작업 중입니다.");
		$viewYear = $this->input->get("year", true);
		$viewYear = $viewYear ? $viewYear : 2024;
		$viewCate = $this->input->get("cate", true);
		//$viewStatus = $this->input->get("status", true);

		$fileName = $viewYear ? $viewYear."년_" : "";
		$fileName = $viewCate ? $fileName.$viewCate.'_' : $fileName;
		//$fileName = $viewStatus ? $fileName.$viewStatus.'상태_' : $fileName;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$fileName.'_바이어_등록현황_'.date("Y-m-d_H:i").'.xls"');
		header('Cache-Control: max-age=0');
		header('Content-Type: text/html; charset=EUC-KR');

		$formD = $this->site->selectQuery("select * from gcs_applyform where pNo = '1' order by fieldOrder asc, no asc");

		echo '<table>';
		echo '<tr>';
		echo '<th>구분</th>';

		foreach($formD as $k => $d) {
			if ($d['isTitle']=='Y' || $d['isSeper']=='Y') continue;
			echo '<th>'.$d['fieldName'].'</th>';
		}
		echo '<th>등록IP</th>';
		echo '<th>등록일</th>';
		echo '<th>상태</th>';
		echo '</tr>';

		$sql = "
			SELECT
				*
			FROM
				`gcs_applylist` AS A
			WHERE
				A.pType = 'buyer'
		";
		$sql .= "ORDER BY no DESC";

		$data = $this->site->selectQuery($sql);
		foreach($data as $k => $d) { 
			$detailD = json_decode($d['addValue'], true);
			$addD = array();
			foreach($detailD as $kk => $dD) {
				$d[$dD['fieldID']] = $dD['fieldValue'];
			}
			echo '<tr>';
			echo '<td>'.$d['pType'].'</td>';
			foreach($formD as $k => $fD) {
				if ($fD['isTitle']=='Y' || $fD['isSeper']=='Y') continue;
				if ($fD['fieldType']=='file') {
					$fileD = json_decode($d[$fD['fieldID']], true);
					$d[$fD['fieldID']] = '<a href='.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/downFiles/'.$fileD['file_name'].'>'.$fileD['client_name'].'</a>';
				}
				if ($fD['fieldType']=='checkbox') {
					$d[$fD['fieldID']] = str_replace("|||", ", ", $d[$fD['fieldID']]);
				}
				echo '<td>'.$d[$fD['fieldID']].'</td>';
			}


			echo '<td>'.$d['regIP'].'</td>';
			echo '<td>'.$d['regDate'].'</td>';
			echo '<td>'.$d['status'].'</td>';
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';


	}


	public function dnAttachFile() {
		ini_set("display_errors", true);
		$viewCate = $this->input->get("viewCate", true);
		require_once($_SERVER['DOCUMENT_ROOT']."/application/controllers/directZip.php");
		$zip = new DirectZip();
		$zip->open($viewCate.'_첨부파일_일괄_압축다운.zip');

		$applyD = $this->site->selectCI("comName, comFile1Source, comFile2Source", "apply", array("year"=>2023, "category"=>$viewCate), "");
		foreach($applyD as $k => $aD) {
			if ($aD['comFile1Source'] || $aD['comFile2Source']) {
				$zip->addEmptyDir($aD['comName']);
				$file1Ext = explode(".", $aD['comFile1Source']);
				$file1Ext = end($file1Ext);
				$file2Ext = explode(".", $aD['comFile2Source']);
				$file2Ext = end($file2Ext);
				if ($aD['comFile1Source']) {
					$zip->addFile($_SERVER["DOCUMENT_ROOT"]."/uploads/apply/2023/".$aD['comFile1Source'], $aD['comName'].'/'.$aD['comName']."_사업자등록증.".$file1Ext);
				}
				if ($aD['comFile2Source']) {
					$zip->addFile($_SERVER["DOCUMENT_ROOT"]."/uploads/apply/2023/".$aD['comFile2Source'], $aD['comName'].'/'.$aD['comName']."_중소기업확인서.".$file2Ext);
				}
				sleep(1);
			}
		}
		$zip->close();
		exit;
	}


	public function manageFile() {

		$viewNo = $this->uri->segment(5);
		$view = array();
		$applyD = $this->site->selectCI("*", "apply", array("no"=>$viewNo), "");
		$view['applyD'] = isset($applyD[0]) ? $applyD[0] : array();
		$view['applyNo'] = element("no", $view['applyD']);
		$view['arrStep'] = array('step6' => true);

		$view['document'] = $this->config->item("document");

		$fileD = $this->site->selectQuery("select * from ds_apply_file_upload where applyNo = '".$view['applyNo']."' and type like 'docu%' order by no asc");
		$view['fileD'] = array();
		foreach($fileD as $k => $d) {
			$fileType = explode("_", $d['type']);
			$view['fileD'][$fileType[0]][$fileType[1]]= $d;
		}

		echo '
	<link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-square-neo.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap-5.3.0/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="/assets/jqueryui/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/siteStyle.css" />
	
	<script type="text/javascript" src="/assets/js/jquery-3.6.4.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery-migrate-1.4.1.min.js"></script>
	<script type="text/javascript" src="/assets/jqueryui/jquery-ui.js"></script>
	<script type="text/javascript" src="/assets/js/popper.min.js"></script>
	<script type="text/javascript" src="/assets/bootstrap-5.3.0/js/bootstrap.js"></script>

	<script type="text/javascript">
		// 자바스크립트에서 사용하는 전역변수 선언
		var cb_url = "https://www.seoulindustrydesign.com";
		var cb_cookie_domain = "";
		var cb_charset = "UTF-8";
		var cb_time_ymd = "2024-04-26";
		var cb_time_ymdhis = "2024-04-26 02:31:11";
		var layout_skin_path = "_layout/bootstrap";
		var view_skin_path = "evaluation/bootstrap";
		var is_member = "1";
		var is_admin = "";
		var cb_admin_url = "";
		var cb_board = "";
		var cb_board_url = "";
		var cb_device_type = "desktop";
		var cb_csrf_hash = "ba210855a05801ccec5f264ed3633d7e";
		var cookie_prefix = "";
	</script>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="https://www.seoulindustrydesign.com/assets/js/html5shiv.min.js"></script>
	<script type="text/javascript" src="https://www.seoulindustrydesign.com/assets/js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="https://www.seoulindustrydesign.com/assets/js/common.js"></script>
	<script type="text/javascript" src="https://www.seoulindustrydesign.com/assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://www.seoulindustrydesign.com/assets/js/jquery.validate.extension.js"></script>
	<script type="text/javascript" src="https://www.seoulindustrydesign.com/assets/js/sideview.js"></script>
	<script type="text/javascript" src="https://www.seoulindustrydesign.com/assets/js/js.cookie.js"></script>
	';
		$view['step6_form'] = $this->load->view("/admin/basic/site/apply2024/step6_form.php", $view, true);
		echo $this->load->view("/admin/basic/site/apply2024/fileForm.php", $view, true);
	}


	public function ajaxGetDocuList() {
		if ($this->input->is_ajax_request()) {
			$applyNo = $this->input->post("applyNo", true);
			$docuType = $this->input->post("docuType", true);
			$comType = $this->input->post("comType", true);
			$btn = $this->input->post("btn", true);

			$fileD = $this->site->selectCI("*", "apply_file_upload", array("type"=>$docuType."_".$comType, "applyNo"=>$applyNo), "no asc");
			$html = "";
			foreach($fileD as $k => $fD) {
				$col = ($btn!='hidden') ? 8 : 12;
				$html .= '<div class="row g-1 mb-2" id="btnName'.$fD['no'].'">';
				$html .= '<div class="col-'.$col.'">';
				$html .= '<button class="btn btn-success w-100" onclick="fnViewFile('."'".$fD['file_name']."'".')">'.$fD['client_name'].'</button>';
				$html .= '</div>';
				if ($btn!='hidden') $html .= '<div class="col-4">';
				if ($btn!='hidden') $html .= '<div class="btn-group w-100">';
				if ($btn!='hidden') $html .= '<button class="btn btn-sm btn-dark" onclick="fnViewFile('."'".$fD['file_name']."'".')">파일보기</button>';
				if ( strtotime($fD['regDate']) > strtotime("2024-04-21") ) $html .= '<button class="btn btn-sm btn-danger" onclick="return fnDelFile2('.$fD['no'].')">삭제</button>';
				if ($btn!='hidden') $html .= '</div>';
				if ($btn!='hidden') $html .= '</div>';
				$html .= '</div>';
			}
			if (empty($fileD) && $btn=='hidden') {
				$html = '<button class="btn btn-light w-100">첨부파일 없음</button>';
			}
			echo $html;
		}
	}


	public function process() {


		$cate = $this->config->item("cate");
		$keyNo = $this->input->post("keyNo", true);
		$page_ip = $this->input->post("page_ip", true);

		if ($page_ip==$_SERVER['REMOTE_ADDR'] && element('page_ip', $_SESSION)==$_SERVER['REMOTE_ADDR']) {

			$inDB = array();
			$inDB['category'] = $this->input->post("category", true);
			$inDB['comName'] = $this->input->post("comName", true);
			$inDB['ceoName'] = $this->input->post("ceoName", true);
			$comNo1 = $this->input->post("comNo1", true);
			$comNo2 = $this->input->post("comNo2", true);
			$comNo3 = $this->input->post("comNo3", true);
			$inDB['comNo'] = $comNo1."-".$comNo2."-".$comNo3;
			$inDB['comType1'] = $this->input->post("comType1", true);
			$inDB['comType2'] = $this->input->post("comType2", true);
			$inDB['comZip'] = $this->input->post("comZip", true);
			$inDB['comAddr1'] = $this->input->post("comAddr1", true);
			$inDB['comAddr2'] = $this->input->post("comAddr2", true);
			$inDB['comAddr3'] = $this->input->post("comAddr3", true);
			$inDB['comEmployee'] = $this->input->post("comEmployee", true);
			$comTel1 = $this->input->post("comTel1", true);
			$comTel2 = $this->input->post("comTel2", true);
			$comTel3 = $this->input->post("comTel3", true);
			$inDB['comTel'] = $comTel1."-".$comTel2."-".$comTel3;
			$comPhone1 = $this->input->post("comPhone1", true);
			$comPhone2 = $this->input->post("comPhone2", true);
			$comPhone3 = $this->input->post("comPhone3", true);
			$inDB['comPhone'] = $comPhone1."-".$comPhone2."-".$comPhone3;
			$comEmail1 = $this->input->post("comEmail1", true);
			$comEmail2 = $this->input->post("comEmail2", true);
			$inDB['comEmail'] = $comEmail1."@".$comEmail2;
			$inDB['totalFund'] = $this->input->post("totalFund", true);
			$inDB['supportFund'] = $this->input->post("supportFund", true);
			$inDB['selfFund'] = $this->input->post("selfFund", true);
			$inDB['vatFund'] = $this->input->post("vatFund", true);
			$inDB['totalSelfFund'] = $this->input->post("totalSelfFund", true);

			if ($keyNo) {
				$this->site->dbUpdate("apply", $inDB, array("no"=>$keyNo));
			} else {
				$keyNo = $this->site->dbInsert("apply", $inDB);
			}

			foreach($cate as $k => $itemD) { 
				foreach($itemD as $k2 => $iD) {
					$isD = $this->site->selectCI("no", "apply_type", array("keyNo"=>$keyNo, "cate"=>$k, "aType"=>$iD[0]), "");
					if (isset($isD[0])==true && $this->getPostValue($_POST['apply'], $k, $iD[0])==true) {
						// pass
					} else if (isset($isD[0])==true && $this->getPostValue($_POST['apply'], $k, $iD[0])==false) {
						// 삭제
						$this->site->dbDelete("apply_type", array("keyNo"=>$keyNo, "cate"=>$k, "aType"=>$iD[0]));
					} else if (isset($isD[0])==false && $this->getPostValue($_POST['apply'], $k, $iD[0])==true) {
						// 추가
						$inDB = array();
						$inDB = array("keyNo"=>$keyNo, "cate"=>$k, "aType"=>$iD[0], "regIP"=>$_SERVER['REMOTE_ADDR'], "regDate"=>date("Y-m-d H:i:s"));
						if ($k==4 && $iD[0]=='기타') $inDB['aEtc'] = $this->input->post("etcType", true);
						$this->site->dbInsert("apply_type", $inDB);
					} else if (isset($isD[0])==false && $this->getPostValue($_POST['apply'], $k, $iD[0])==false) {
						// pass
					}
				}
			}
		}
		alert("수정되었습니다.", "/admin/site/apply/");
	}


	public function ajaxChgCategory() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$cate = $this->input->post("cate", true);

			$prevD = $this->site->selectCI("no,category", "apply", array("no"=>$no), "");
			if (isset($prevD[0])) {
				$prevD = $prevD[0];
				$inDB = array();
				$inDB['applyNo'] = $prevD['no'];
				$inDB['prevCate'] = $prevD['category'];
				$inDB['chgCate'] = $cate;
				$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
				$inDB['regDate'] = date("Y-m-d H:i:s");
				$this->site->dbInsert("apply_change_category_history", $inDB);
				$upDB = array();
				$upDB['category'] = $cate;
				$this->site->dbUpdate("apply", $upDB, array("no"=>$no));
				echo "수정되었습니다.";
			} else {
				echo "매칭되는 정보가 없습니다.";
			}
		}
	}

	public function deleteData() {

		$no = $this->uri->segment(5);

		// 파일 삭제
		$fileD = $this->site->selectCI("*", "apply_file_upload", array("applyNo"=>$no), "");
		if (!empty($fileD)) foreach($fileD as $k => $fD) {
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/apply/2024/".$no."/".$fD['file_name']);
		}
		@rmdir($_SERVER['DOCUMENT_ROOT']."/uploads/apply/2024/".$no);

		// DB 전체 삭제
		$this->site->dbDelete("apply_file_upload", array("applyNo"=>$no));
		$this->site->dbDelete("apply_detail", array("applyNo"=>$no));
		$this->site->dbDelete("apply", array("no"=>$no));
		unset($_SESSION['applyNo']);
		alert("삭제되었습니다.");
	}


	private function getPostValue($pValue, $cate, $value) {
		// isset($_POST['apply'][$k][$iD[0]])
		$is = false;
		if (is_array(element($cate, $pValue)))
		foreach(element($cate, $pValue) as $k => $v) {
			if ($v==$value) $is = true;
		}
		return $is;
	}
	private function getCategory() {

		if (strtotime("2023-02-14 00:00:00") <= time() && time() <= strtotime("2023-03-13 23:59:59")) return "의류봉제";
		else if (strtotime("2023-04-14 00:00:00") <= time() && time() <= strtotime("2023-04-30 23:59:59")) return "기계금속";
		else if (strtotime("2023-05-01 00:00:00") <= time() && time() <= strtotime("2023-05-14 23:59:59")) return "인쇄";
		else if (strtotime("2023-05-15 00:00:00") <= time() && time() <= strtotime("2023-05-31 23:59:59")) return "주얼리/수제화";

	}


	public function uploadFile() {

		if (($handle = fopen($_SERVER['DOCUMENT_ROOT']."/uploads/2022_list.csv", "r")) !== FALSE) {
			//echo "<table class='table'>\n";
			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				echo "<pre>";
				print_r($row);
				$inDB = array();
				$inDB['year'] = 2022;
				$inDB['category'] = '기계금속';
				$inDB['comName'] = $row[1];
				$inDB['ceoName'] = $row[2];
				$inDB['comNo'] = $row[3];
				$inDB['comAddr1'] = $row[4];
				$inDB['comEmployee'] = $row[5];

				$inDB['comTel'] = $row[6];
				$inDB['comPhone'] = $row[7];

				$inDB['totalFund'] = trim(str_replace(",", "", $row[8]));
				$inDB['supportFund'] = trim(str_replace(",", "", $row[9]));
				$inDB['selfFund'] = trim(str_replace(",", "", $row[10]));
				$inDB['vatFund'] = trim(str_replace(",", "", $row[11]));

				//$this->site->dbInsert("apply", $inDB);
			}
		}
	}

	public function uploadFile2() {
		/*
		$cnt = 0;
		echo "<pre>";
		if (($handle = fopen($_SERVER['DOCUMENT_ROOT']."/uploads/2022_print_list.csv", "r")) !== FALSE) {
			//echo "<table class='table'>\n";
			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if (20 <= $cnt) { // 2023-05-05 14:57 // 2023-05-07
					print_r($row);
					$inDB = array();
					$inDB['year'] = 2022;
					$inDB['category'] = '인쇄';
					$inDB['comName'] = $row[1];
					$inDB['ceoName'] = $row[2];
					$inDB['comNo'] = $row[3];
					$inDB['comAddr1'] = $row[4];
					$inDB['comEmployee'] = $row[5];

					$inDB['comTel'] = $row[6];
					$inDB['comPhone'] = $row[7];

					$inDB['totalFund'] = trim(str_replace(",", "", $row[8]));
					$inDB['supportFund'] = trim(str_replace(",", "", $row[9]));
					$inDB['selfFund'] = trim(str_replace(",", "", $row[10]));
					$inDB['vatFund'] = trim(str_replace(",", "", $row[11]));
					print_r($inDB);
					$kNo = $this->site->dbInsert("apply", $inDB);
					for($a=13;$a<=23;$a++) {
						if (!empty($row[$a])) {
							$inDB2 = array();
							$inDB2['keyNo'] = $kNo;
							$inDB2['aType'] = $row[$a];
							$inDB2['regIP'] = $_SERVER['REMOTE_ADDR'];
							$inDB2['regDate'] = date("Y-m-d H:i:s");
							$this->site->dbInsert("apply_type", $inDB2);
						}
					}
				}
				$cnt++;
			}
		}
		*/
	}
	public function uploadFile3() {

		$cnt = 0;
		echo "<pre>";
		if (($handle = fopen($_SERVER['DOCUMENT_ROOT']."/uploads/2022_jewelry.csv", "r")) !== FALSE) {
			//echo "<table class='table'>\n";
			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if (0 <= $cnt) { // 2023-05-05 14:57 // 2023-05-07
					print_r($row);
					$inDB = array();
					$inDB['year'] = 2022;
					$inDB['category'] = '주얼리';
					$inDB['comName'] = $row[1];
					$inDB['ceoName'] = $row[2];
					$inDB['comNo'] = $row[3];
					$inDB['comAddr1'] = $row[4];
					$inDB['comEmployee'] = $row[5];

					$inDB['comTel'] = $row[6];
					$inDB['comPhone'] = $row[7];

					$inDB['totalFund'] = trim(str_replace(",", "", $row[8]));
					$inDB['supportFund'] = trim(str_replace(",", "", $row[9]));
					$inDB['selfFund'] = trim(str_replace(",", "", $row[10]));
					$inDB['vatFund'] = trim(str_replace(",", "", $row[11]));
					print_r($inDB);
					$kNo = 0;
					//$kNo = $this->site->dbInsert("apply", $inDB);

					for($a=12;$a<=23;$a++) {
						if (!empty($row[$a])) {
							$inDB2 = array();
							$inDB2['keyNo'] = $kNo;
							$inDB2['aType'] = $row[$a];
							$inDB2['regIP'] = $_SERVER['REMOTE_ADDR'];
							$inDB2['regDate'] = date("Y-m-d H:i:s");
							print_r($inDB2);
							//$this->site->dbInsert("apply_type", $inDB2);
						}
					}
				}
				$cnt++;
			}
		}

	}

	public function uploadFile4() {

		$cnt = 0;
		echo "<pre>";
		if (($handle = fopen($_SERVER['DOCUMENT_ROOT']."/uploads/2022_shoes.csv", "r")) !== FALSE) {
			//echo "<table class='table'>\n";
			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if (0 <= $cnt) { // 2023-05-05 14:57 // 2023-05-07
					print_r($row);
					$inDB = array();
					$inDB['year'] = 2022;
					$inDB['category'] = '수제화';
					$inDB['comName'] = $row[1];
					$inDB['ceoName'] = $row[2];
					$inDB['comNo'] = $row[3];
					$inDB['comAddr1'] = preg_match('/서울/i', $row[4]) ? $row[4] : '서울 '.$row[4];
					print_r($inDB);
					$kNo = 0;
					//$kNo = $this->site->dbInsert("apply", $inDB);
/*
					for($a=12;$a<=23;$a++) {
						if (!empty($row[$a])) {
							$inDB2 = array();
							$inDB2['keyNo'] = $kNo;
							$inDB2['aType'] = $row[$a];
							$inDB2['regIP'] = $_SERVER['REMOTE_ADDR'];
							$inDB2['regDate'] = date("Y-m-d H:i:s");
							print_r($inDB2);
							//$this->site->dbInsert("apply_type", $inDB2);
						}
					}
*/
				}
				$cnt++;
			}
		}

	}

	public function updateAddr() {
		$applyD = $this->site->selectQuery("select * from mf_apply where comAddr1 not like '%서울%' ");
		print_r2($applyD);
	}


	public function ajaxGetDocument() {

		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);

			$return = array();

			$applyD = $this->site->selectCI("*", "apply as A", array("no"=>$no), "");
			if (!isset($applyD[0])) {
				$return['msg'] = "요청하신 자료가 없습니다.";
				$this->output->set_content_type('application/json')->set_output(json_encode($return));
				exit;
			}
			$applyD = $applyD[0];

			if (preg_match("/.pdf/i",$applyD['comFile1Name']))  {
				$return['docu1'] = '<iframe src="/pdf/web/viewer.html?file=/uploads/apply/'.$applyD['year'].'/'.$applyD['comFile1Source'].'" style="width:100%;height:81vh;margin-top:20px;" frameborder="0"></iframe>';
			} else if (preg_match("/.(jpeg|jpg|JPG|JPEG|gif|GIF|png|PNG)/i",$applyD['comFile1Name']))  {
				$return['docu1'] = '<img src="/uploads/apply/'.$applyD['year'].'/'.$applyD['comFile1Source'].'" style="width:100%;">';
			}
			if (preg_match("/.pdf/i",$applyD['comFile2Name']))  {
				$return['docu2'] = '<iframe src="/pdf/web/viewer.html?file=/uploads/apply/'.$applyD['year'].'/'.$applyD['comFile2Source'].'" style="width:100%;height:81vh;margin-top:20px;" frameborder="0"></iframe>';
			} else if (preg_match("/.(jpeg|jpg|JPG|JPEG|gif|GIF|png|PNG)/i",$applyD['comFile2Name']))  {
				$return['docu2'] = '<img src="/uploads/apply/'.$applyD['year'].'/'.$applyD['comFile2Source'].'" style="width:100%;">';
			}

			$file1 = "<a class='btn btn-default' href='/files/".$applyD['comFile1Source']."/apply/down/".removeSpecialC3($applyD['comFile1Name'])."/'>".$applyD['comFile1Name']." 다운로드</a>";
			$file2 = "<a class='btn btn-default' href='/files/".$applyD['comFile2Source']."/apply/down/".removeSpecialC3($applyD['comFile2Name'])."/'>".$applyD['comFile2Name']." 다운로드</a>";

			if (empty($applyD['comFile1Name'])) {
				$file1 = "<a class='btn btn-default' href='javascript:;'>사업자등록증 첨부파일이 없습니다.</a>";
				$return['docu1'] = "";
			}
			if (empty($applyD['comFile2Name'])) {
				$file2 = "<a class='btn btn-default' href='javascript:;'>소상공인확인서 첨부파일이 없습니다.</a>";
				$return['docu2'] = "";
			}

			$return['file1'] = $file1;
			$return['file2'] = $file2;
			echo (json_encode($return));
		}

	}
/*
	public function ajaxSetStatus() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$act = $this->input->post("act", true);
			$upDB = array();
			$upDB['status'] = $act;
			$this->site->dbUpdate("apply", $upDB, array("no"=>$no));
			echo "처리되었습니다.";
		}
	}
	public function ajaxSetStatus2() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$act = $this->input->post("act", true);
			$upDB = array();
			$upDB['status2'] = $act;
			$this->site->dbUpdate("apply", $upDB, array("no"=>$no));
			echo "처리되었습니다.";
		}
	}
*/
}
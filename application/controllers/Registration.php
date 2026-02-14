<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Registration class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * Registration 페이지를 담당하는 controller 입니다.
 */
class Registration extends CB_Controller
{
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
		$this->load->library(array('querystring', 'email'));
		$this->lang->load("website", element("langSet", $_SESSION));

	}


	/**
	 * 전체 메인 페이지입니다
	 */
	public function index() {
		redirect("/registration/buyer");
	}


	public function buyer() {

		$view = array();
		$view['view'] = array();
		$view['applyD'] = array();
		$view['siteTitle'] = $this->lang->language['site'];

		$view['pNo'] = 1;
		$view['pType'] = 'buyer';
		$view['code'] = element("code", $_SESSION);
		$view['applyNo'] = element("applyNo", $_SESSION);

		$view['mbD']['mem_id'] = $this->member->item("mem_id");
		$view['mbD']['mem_userid'] = $this->member->item("mem_userid");
		

		$view['mode'] = $mode = $view['mbD']['mem_id'] ? 'modify' : '';
		if ($mode == 'modify') {
			if ( empty($view['mbD']['mem_id']) || empty($view['mbD']['mem_userid'])) {
				alert($view['siteTitle']['modifyGuide7']);
			}
		}
		if ($view['mbD']['mem_id']) {
			$applyD = $this->site->selectCI("*","applylist", array("mem_id"=>$view['mbD']['mem_id'], "pType"=>$view['pType']), "no asc");
			$view['applyD'] = isset($applyD[0]) ? $applyD[0] : array();
		}

		$policyPage = element("langSet", $_SESSION)=='english' ? 'policyEn' : 'policy';
		$view['policy'] = $this->load->view("/registration/bootstrap/".$policyPage.".php", $view, true);

		//$guidePage = element("langSet", $_SESSION)=='english' ? 'guideBuyer' : 'guideBuyer';
		$view['formGuide'] = $this->load->view("/registration/bootstrap/guideBuyer.php", $view, true);

		$view['applyForm'] = $this->site->selectQuery("select * from gcs_applyform where pNo = '".$view['pNo']."' order by fieldOrder asc");

	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'registration',
			'layout' => 'layout',
			'skin' => "form" ,
			'layout_dir' => $this->cbconfig->item('layout_main'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_main'),
			'use_sidebar' => $this->cbconfig->item('sidebar_main'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_main'),
			'skin_dir' => $this->cbconfig->item('skin_main'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_main'),
			'page_title' => $page_title,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => $page_name,
		);
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}


	public function press() {

		$view = array();
		$view['view'] = array();
		$view['applyD'] = array();
		$view['siteTitle'] = $this->lang->language['site'];

		$view['pNo'] = 2;
		$view['pType'] = 'press';
		$view['code'] = element("code", $_SESSION);
		$view['applyNo'] = element("applyNo", $_SESSION);

		$view['mbD']['mem_id'] = $this->member->item("mem_id");
		$view['mbD']['mem_userid'] = $this->member->item("mem_userid");
		

		$view['mode'] = $mode = $view['mbD']['mem_id'] ? 'modify' : '';
		if ($mode == 'modify') {
			if ( empty($view['mbD']['mem_id']) || empty($view['mbD']['mem_userid'])) {
				alert($view['siteTitle']['modifyGuide7']);
			}
		}
		if ($view['mbD']['mem_id']) {
			$applyD = $this->site->selectCI("*","applylist", array("mem_id"=>$view['mbD']['mem_id'], "pType"=>$view['pType']), "no asc");
			$view['applyD'] = isset($applyD[0]) ? $applyD[0] : array();
		}

		$policyPage = element("langSet", $_SESSION)=='english' ? 'policyEn' : 'policy';
		$view['policy'] = $this->load->view("/registration/bootstrap/".$policyPage.".php", $view, true);

		$guidePage = element("langSet", $_SESSION)=='english' ? 'guidePress' : 'guidePress';
		$view['formGuide'] = $this->load->view("/registration/bootstrap/".$guidePage.".php", $view, true);

		$view['applyForm'] = $this->site->selectQuery("select * from gcs_applyform where pNo = '".$view['pNo']."' order by fieldOrder asc");


	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'registration',
			'layout' => 'layout',
			'skin' => "form" ,
			'layout_dir' => $this->cbconfig->item('layout_main'),
			'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_main'),
			'use_sidebar' => $this->cbconfig->item('sidebar_main'),
			'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_main'),
			'skin_dir' => $this->cbconfig->item('skin_main'),
			'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_main'),
			'page_title' => $page_title,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords,
			'meta_author' => $meta_author,
			'page_name' => $page_name,
		);
		$view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}


	public function ajaxDeleteFile() {
		if ($this->input->is_ajax_request()) {
			$lang = $this->lang->language['site'];
			$pNo = $this->input->post("pNo", true);
			$fileName = $this->input->post("fileName", true);

			$applyD = $this->site->selectQuery("select * from gcs_applylist where addValue like '%".$fileName."%' ");
			$applyD = isset($applyD[0]) ? $applyD[0] : array();
			if (empty($applyD)) {
				alert("해당 파일 정보가 없습니다");
			}
			$addD = json_decode($applyD['addValue'], true);
			foreach($addD as $k => $v) {
				if (preg_match("/".$fileName."/i", $v['fieldValue'])) {
					$addD[$k]['fieldValue'] = '';
				}
			}
			$applyD['addValue'] = json_encode($addD);
			@unlink($_SERVER["DOCUMENT_ROOT"]."/uploads/apply/".$fileName);
			$this->site->dbUpdate("applylist", array("addValue"=>json_encode($addD)), array("no"=>$applyD['no']));

			$returnD = array();
			$returnD['msg'] = "OK";
			$this->output->set_content_type('application/json')->set_output(json_encode($returnD));
		}
	}

	public function ajaxMatchCode() {
		if ($this->input->is_ajax_request()) {
			$lang = $this->lang->language['site'];
			$pNo = $this->input->post("pNo", true);
			$email = $this->input->post("email", true);
			$code = $this->input->post("code", true);

			// 결과 리턴
			$returnD = array();

			if (element("wrong_access", $_SESSION)>10) {
				$returnD['msg'] = $lang['modifyGuide6'];
			} else {
				// 코드 체크
				$isD = $this->site->selectCI("no, pType, name, email, certifyCode, certifyTime", "applylist", array("pNo"=>$pNo, "email"=>$email, "certifyCode"=>$code), "");
				if (isset($isD[0])) {
					// 인증가능시간 체크
					if ($isD[0]['certifyTime'] >= time()) {
						$_SESSION['applyNo'] = $isD[0]['no'];
						$_SESSION['code'] = $code;
						$returnD['msg'] = 'OK';
						$returnD['url'] = "/registration/".$isD[0]['pType']."/modify/";
						$_SESSION['langSet'] = $isD[0]['language'];
					} else {
						$returnD['msg'] = $lang['modifyGuide5'];
						$this->wrongAccess();
					}
				} else {
					$returnD['msg'] = $lang['certifyMailGuide1'];
					$this->wrongAccess();
				}
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($returnD));
		}
	}

	private function wrongAccess() {
		if (isset($_SESSION['wrong_access'])) $_SESSION['wrong_access']++;
		else $_SESSION['wrong_access']=1;

		return $_SESSION['wrong_access'];
	}


	public function ajaxGetRequestCode() {
		if ($this->input->is_ajax_request()) {
			$lang = $this->lang->language['site'];

			$pNo = $this->input->post("pNo", true);
			$email = $this->input->post("email", true);

			$isD = $this->site->selectCI("no, name, email", "applylist", array("pNo"=>$pNo, "email"=>$email), "");
			if (isset($isD[0])) {
				// 인증 가능 시간 & 코드 생성
				$upDB = array();
				$upDB['certifyCode'] = $this->generateRandomString(7);
				$upDB['certifyTime'] = time() + 60*3;
				$this->site->dbUpdate("applylist", $upDB, array("no"=>$isD[0]['no']));
				// 내용 코드 치환
				$lang['certifyMailContent'] = str_replace("{{CODE}}", $upDB['certifyCode'], $lang['certifyMailContent']);

				// 이메일 발송
				$this->email->clear(true);
				$this->email->from('sustainable@seouldesign.or.kr', $lang['sendMailName']);
				$this->email->to($isD[0]['email']);
				$this->email->subject($lang['certifyMailTitle']);
				$this->email->message($lang['certifyMailContent']);
				$mailResult = $this->email->send();

				// 결과 리턴
				$returnD = array();
				$returnD['msg'] = "OK";
				$returnD['mailResult'] = $mailResult;
			} else {
				$returnD = array();
				$returnD['msg'] = $lang['certifyMailGuide1'];
				$this->wrongAccess();
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($returnD));
		}
	}

	private function generateRandomString($length = 10) {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
		return $randomString;
	}

	public function ajaxGetApplyForm() {
		if ($this->input->is_ajax_request()) {

			$lang = $this->lang->language['site'];

			$html = '';
			$arrReturn = $applyD = $addField = array();
			$arrReturn['html'] = $arrReturn['msg'] = '';

			$mode = $this->input->post("mode", true);
			$pNo = $this->input->post("pNo", true);
			$pType = $this->input->post("pType", true);
			
			//$aNo = element("applyNo", $_SESSION);
			$mem_id = $this->member->item("mem_id");

			if ($mode == 'modify' && $mem_id) {
				$applyD = $this->site->selectCI("*","applylist", array("mem_id"=>$mem_id, "pType"=>$pType), "no asc");
				$applyD = isset($applyD[0]) ? $applyD[0] : array();
				if (!empty($applyD)) {
					$addField = json_decode($applyD['addValue'], true);
					foreach($addField as $k => $addD) {
						$applyD[$addD['fieldID']] = $addD['fieldValue'];
					}
				}
			}

			$isEn = element("langSet", $_SESSION);

			$formD = $this->site->selectCI("*","applyform", array("pNo"=>$pNo), "fieldOrder asc, no asc");

			if (empty($formD)) {
				$arrReturn['msg'] = "신청 정보가 없습니다. 관리자에게 문의하여 주세요";
			} else {
				$arrReturn['msg'] = "OK";
				$html .= "";
				foreach($formD as $k => $fD) {
					if ($fD['isSeper']=='Y') { 
						$html .= '<div class="row divSeperation"></div>';
					} else if ($fD['isTitle']=='Y') { 
						$langField = $isEn == 'english' ? 'En' : '';
						$html .= '<div class="row"><div class="col"><h5>'.$fD['fieldName'.$langField].'</h5></div></div>';
					} else {
						$html .= '<div class="form-group row">'."\n";
						$notEssential = $isEn == 'english' ? 'Optional' : '선택';
						$isRequired = $fD['isRequired'] == 'Y' ? '<span class="text-danger ps-2"> * </span>' : '<span class="ps-2"> ('.$notEssential.') </span>';
						$html .= '<label class="col-lg-3 col-form-label text-right align-middle">'.$fD['fieldName'.$langField].' '.$isRequired.'</label>'."\n";
						$html .= '<div class="col-lg-9">'."\n";
						$required = $fD['isRequired'] == 'Y' ? 'required' : '';
						$placeHolderTxt = $isEn == 'english' ? 'Please, Input '.$fD['fieldName'.$langField]." in here" : $fD['fieldName'.$langField].' 을(를) 입력하세요';

						if ($fD['fieldType']=='text' || $fD['fieldType']=='date') {
							$html .= '<input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" class="form-control" placeholder="'.$placeHolderTxt.'" '.$required.' value="'.element($fD['fieldID'], $applyD).'">'."\n";
						} else if ($fD['fieldType']=='url') {
							$html .= '<div class="input-group"><span class="input-group-text">http(s)://</span><input type="text" name="'.$fD['fieldID'].'" class="form-control" placeholder="'.$placeHolderTxt.'" '.$required.' value="'.element($fD['fieldID'], $applyD).'"></div>'."\n".'<p class="text-danger mb-0">※ http(s)://www.naver.com</p>'."\n";
						} else if ($fD['fieldType']=='email') {
							$emailD = element($fD['fieldID'], $applyD) ? element($fD['fieldID'], $applyD) : $this->member->item("mem_email");
							$html .= '<input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" class="form-control" placeholder="'.$placeHolderTxt.'" value="'.$emailD.'" '.$required.'>'."\n";
						} else if ($fD['fieldType']=='tel') {
							$html .= '<input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" pattern="[0-9]{3}-[0-9]{3,4}-[0-9]{4}" class="form-control" placeholder="'.$placeHolderTxt.'" '.$required.' value="'.element($fD['fieldID'], $applyD).'">'."\n".'<p class="text-danger mb-0">※ 010-0000-0000</p>'."\n";
						} else if ($fD['fieldType']=='file') {
							$required = element($fD['fieldID'], $applyD) ? '' : $required;
							$html .= '<div class="input-group">';
							$html .= '<input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" class="form-control" '.$required.'>'."\n";
							// 첨부 파일이 있으면
							$addFile = json_decode(element($fD['fieldID'], $applyD), true);
							if (element("file_name", $addFile)) {
								$html .= '<button type="button" class="btn btn-secondary btn_'.$fD['fieldID'].'" onclick="location = '."'/downFiles/".$addFile['file_name']."/';".'">'.$addFile['client_name'].'</button>';
								$html .= '<button type="button" class="btn btn-danger btn_'.$fD['fieldID'].'" data-filename="'.$addFile['file_name'].'" data-fieldid="'.$fD['fieldID'].'" onclick="return fnDelFile(this)">'.$lang['boardT9'].'</button>';
							}
							$html .= '<textarea class="d-none" name="origin_'.$fD['fieldID'].'">'.element($fD['fieldID'], $applyD).'</textarea>';
							$html .= '</div>';
						} else if ($fD['fieldType']=='textarea') {
							$html .= '<textarea name="'.$fD['fieldID'].'" class="form-control" '.$required.' rows="5">'.element($fD['fieldID'], $applyD).'</textarea>'."\n";
						} else if ($fD['fieldType']=='radio') {
							$attrData = explode("\n", $fD['fieldAttr'.$langField]);
							$html .= '<div class="row">'."\n";
							foreach($attrData as $k => $aD) {
								$radioCheck = preg_match("/".$aD."/i", element($fD['fieldID'], $applyD)) ? 'checked' : '';
								$html .= '<label class="col-sm-4 mb-2"><input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" value="'.$aD.'" '.$radioCheck.'> '.$aD.'</label>'."\n";
							}
							$html .= '</div>'."\n";
						} else if ($fD['fieldType']=='checkbox') {
							$attrData = explode("\n", $fD['fieldAttr'.$langField]);
							$html .= '<div class="row">'."\n";
							foreach($attrData as $k => $aD) {
								//echo $aD;
								$boxCheck = preg_match("~".$aD."~", element($fD['fieldID'], $applyD)) ? 'checked' : '';
								$html .= '<label class="col-sm-4 mb-2"><input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'[]" value="'.$aD.'" '.$boxCheck.'> '.$aD.'</label>'."\n";
							}
							$html .= '</div>'."\n";
						} else if ($fD['fieldType']=='select') {
							$attrData = explode("\n", $fD['fieldAttr'.$langField]);
							$html .= '<select name="'.$fD['fieldID'].'" class="form-control" '.$required.'>'."\n";
							$html .= '<option value="">선택하세요</option>'."\n";
							foreach($attrData as $k => $aD) {
								$selected = preg_match("/".$aD."/i", element($fD['fieldID'], $applyD)) ? 'selected' : '';
								$html .= '<option value="'.$aD.'" '.$selected.'> '.$aD.'</option>'."\n";
							}
							$html .= '</select>'."\n";
						}
						$html .= '</div>'."\n";
						$html .= '</div>'."\n";
					}
				}

				$arrReturn['msg'] = 'OK';
				$arrReturn['html'] = $html;


			}
			$this->output->set_content_type('application/json')->set_output(json_encode($arrReturn));
		}
		
	}



	public function save() {

		$lang = $this->lang->language['site'];
		$type = $this->input->post("type", true);
		$formNo = $type == 'buyer' ? 1 : 2;

		$formD = $this->site->selectQuery("select * from gcs_applyform where pNo = '".$formNo."' and fieldID in ( 'name', 'email', 'phone') order by no asc");
		$inDB = array();
		$inDB['pNo'] = $formNo;
		$inDB['pType'] = $type;
		$inDB['language'] = element('langSet', $_SESSION);
		$inDB['mem_id'] = $this->member->item('mem_id');
		$inDB['mem_userid'] = $this->member->item('mem_userid');
		
		// 회원정보 체크
		$title1 = element("langSet", $_SESSION)=='korean' ? '세션이 만료되었거나, 회원정보가 없습니다. 다시 시도하여 주세요' : 'Your session has expired, or you have no membership information. Please try again';
		if (empty($inDB['mem_id'])) alert($title1);


		foreach($formD as $k => $d) {
			$inDB[$d['fieldID']] = $this->input->post($d['fieldID'], true);
		}
		$formD2 = $this->site->selectQuery("select * from gcs_applyform where pNo = '".$formNo."' order by fieldOrder asc");
		$addField = array();
		foreach($formD2 as $k => $fD) {
			// 기본정보 패쓰~!!
			if ($fD['fieldID']=='name'||$fD['fieldID']=='phone'||$fD['fieldID']=='email') continue;
			// 타이틀 / 구분자 패쓰~!!
			if ($fD['isTitle']=='Y' || $fD['isSeper']=='Y') continue;

			// 배열 처리
			if ($fD['fieldType']=='checkbox') {
				$fieldValue = $this->input->post($fD['fieldID']);
				$fieldValue = implode("|||", $fieldValue);
			// 파일 업로드
			} else if ($fD['fieldType']=='file') {
				if ($_FILES[$fD['fieldID']]['error']==0) {
					$fileD = $this->site->fileUp($_SERVER['DOCUMENT_ROOT']."/uploads/apply/", $fD['fieldID']);
					if (!empty($fileD['error_msg']) && $fD['isRequired']=='Y') alert($fileD['error_msg']);
					$fieldValue = json_encode($fileD);
				} else {
					if ($this->input->post("origin_".$fD['fieldID'])) {
						$fieldValue = $this->input->post("origin_".$fD['fieldID']);
					} else {
						$fieldValue = "";
					}
				}
			// 그 외
			} else {
				$fieldValue = $this->input->post($fD['fieldID'], true);
			}
			$addField[] = array("fieldID"=>$fD['fieldID'], "fieldName"=>$fD['fieldName'], "fieldValue"=>$fieldValue);
			$inDB['addValue'] = json_encode($addField);
		}
		$inDB['agree'] = $this->input->post("agreePolicy", true);
		$inDB['agree'] = $inDB['agree'] ? $inDB['agree'] : 'N';
		$inDB['agreeEmail'] = $this->input->post("agreeEmail", true);
		$inDB['agreeEmail'] = $inDB['agreeEmail'] ? $inDB['agreeEmail'] : 'N';
		$inDB['agreeSMS'] = $this->input->post("agreeSMS", true);
		$inDB['agreeSMS'] = $inDB['agreeSMS'] ? $inDB['agreeSMS'] : 'N';
		$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
		$inDB['regDate'] = date("Y-m-d H:i:s");


		if ($inDB['mem_id'] && $inDB['mem_userid']) { // 회원만 접근
			if ($_SERVER['REMOTE_ADDR'] == element('ip', $_POST)) {

				$isD = $this->site->selectCI("no", "applylist", array("mem_id"=>element('mem_id', $inDB), "pType"=>$type), "no asc");
				if (isset($isD[0])) { 
					unset($inDB['language']);
					unset($inDB['pNo']);
					unset($inDB['pType']);
					$this->site->dbUpdate("applylist", $inDB, array("mem_id"=>element('mem_id', $inDB), "pType"=>$type));
					//$this->site->dbUpdate("applylist", array("certifyTime"=>"", "certifyCode"=>""), array("no"=>element('applyNo', $_SESSION)));
					//unset($_SESSION['applyNo']);
					//unset($_SESSION['code']);
					$title = element("langSet", $_SESSION)=='korean' ? '수정 되었습니다.' : 'It has been saved.';
					alert($title, "/");
				} else {
					$inDB['status'] = '접수';
					$keyNo = $this->site->dbInsert("applylist", $inDB);
					$title = element("langSet", $_SESSION)=='korean' ? '제출 되었습니다.' : 'It has been submitted.';
					alert($title, "/");
				}
			}
		} else {
			alert($lang['modifyGuide7'], "/");
			/*
			if ($this->input->post("code", true) && empty(element('code', $_SESSION))) {
				alert($lang['modifyGuide7'], "/");
			}

			$inDB['status'] = '접수';
			$keyNo = $this->site->dbInsert("applylist", $inDB);
			$title = element("langSet", $_SESSION)=='korean' ? '제출 되었습니다.' : 'It has been submitted.';
			alert($title, "/");
			*/
		}

	}


	public function ajaxChkMB_ID() {
		if ($this->input->is_ajax_request()) {
			$arrReturn = array();
			$act = $this->input->post("act", true);
			$mbID = $this->input->post("mbID", true);
			$arrReturn['mbID'] = $mbID;
			if ($act == 'duplicate') {
				$mbD = $this->site->selectCI("mem_userid", "member", array("mem_userid"=>$mbID), "");
				if (isset($mbD[0])) {
					$arrReturn['stat'] = 'false';
					$arrReturn['msg'] = element("langSet", $_SESSION)=='korean' ? "이미 사용중인 아이디입니다. 다른 아이디를 입력하여 주세요" : 'ID is already in use. Please enter a different ID';
				} else {
					$arrReturn['stat'] = 'true';
					$arrReturn['msg'] = element("langSet", $_SESSION)=='korean' ? '사용가능합니다.' : 'Available ID';
					$_SESSION['mem_userid'] = $mbID;
				}
			} else {
				$arrReturn['stat'] = 'false';
				$arrReturn['msg'] = "잘못된 접근입니다.";
			}
		} else {
			$arrReturn['stat'] = 'false';
			$arrReturn['msg'] = "잘못된 접근입니다.";
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($arrReturn));
	}



	public function ajaxMB_Join() {
		if ($this->input->is_ajax_request()) {
			$mbID = $this->input->post("mbID", true);
			$mbPW = $this->input->post("mbPW", true);
			$mbEmail = $this->input->post("mbEmail", true);
			$mbsession = $this->input->post("mbSession", true);
			$pNo = $this->input->post("pNo", true);
			$arrReturn = array();

			$arrReturn['mbID'] = $mbID;
			$arrReturn['mbPW'] = $mbPW;

			$inDB = array();
			$inDB['mem_userid'] = $mbID;
			$inDB['mem_email'] = $mbEmail;
			$inDB['mem_password'] = password_hash($mbPW, PASSWORD_BCRYPT);
			$inDB['mem_username'] = $mbID; //$selfcertD['name'];
			$inDB['mem_nickname'] = "닉네임".$mbID; //.$selfcertD['name'];
			$inDB['mem_level'] = 3;

			$inDB['mem_receive_email'] = 1;
			$inDB['mem_email_cert'] = 1;
			$inDB['mem_register_datetime'] = date("Y-m-d H:i:s");
			$inDB['mem_register_ip'] = $_SERVER['REMOTE_ADDR'];
			$inDB['mem_lastlogin_datetime'] = date("Y-m-d H:i:s");
			$inDB['mem_lastlogin_ip'] = $_SERVER['REMOTE_ADDR'];

			$mem_id = $this->site->dbInsert("member", $inDB);

			$inDB= array();
			$inDB['mgr_id'] = $pNo == 1 ? 2 : 3;
			$inDB['mem_id'] = $mem_id;
			$inDB['mgm_datetime'] = date("Y-m-d H:i:s");
			$this->site->dbInsert("member_group_member", $inDB);

			$arrReturn['mem_id'] = $mem_id;
			$_SESSION['mem_id'] = $mem_id;
			$_SESSION['loginuserid'] = $mbID;

			$this->member->update_login_log($mem_id, $mbID, 1, '로그인 성공');

			$arrReturn['mb'] = $inDB;
			$arrReturn['stat'] = "true";
			$arrReturn['msg'] = element("langSet", $_SESSION)=='korean' ? '가입되었습니다.' : 'You are member registered.';

			$this->output->set_content_type('application/json')->set_output(json_encode($arrReturn));
		}
	}



}
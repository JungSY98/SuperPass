<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * FieldSetPress class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>페이지설정>FieldSetPress 관리 controller 입니다.
 */
class FieldSetPress extends CB_Controller
{

	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'register/fieldSetPress';

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


		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'index');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));
	}


	public function ajaxGetPrevProgramForm() {
		if ($this->input->is_ajax_request()) {
			$pNo = $this->input->post("pNo", true);
			$formD = $this->site->selectCI("*", "program_applyform", array("pNo"=>$pNo), "fieldOrder asc");

			$html = '<div class="row m-0" id="pForm">'."\n";
			foreach($formD as $k => $fD) {
				$html .= '<label class="col-lg-2 col-form-label text-center"><input type="text" name="fieldID" class="form-control" placeholder="고유 ID 값을 입력하여 주세요" value="'.$fD['fieldID'].'" onkeydown="return /[a-z0-9]/i.test(event.key)" style="ime-mode:disabled;-webkit-ime-mode:disabled;-moz-ime-mode:disabled;-ms-ime-mode:disabled"></label>'."\n";
				$html .= '<label class="col-lg-3 col-form-label text-center"><input type="text" name="fieldName" class="form-control" placeholder="항목 명을 입력하여 주세요" value="'.$fD['fieldName'].'"></label>'."\n";
				$html .= '<div class="col-lg-4 col-form-label">'."\n";
				$html .= '<select name="fieldType" class="form-control chgFieldType" data-set="'.$fD['no'].'">'."\n";
				$html .= '<option value="">선택하세요</option>'."\n";
				$html .= '<option value="text" '.($fD['fieldType']=='text'?'selected':'').'>한줄 입력 형식(text)</option>'."\n";
				$html .= '<option value="url" '.($fD['fieldType']=='url'?'selected':'').'>URL 형식</option>'."\n";
				$html .= '<option value="email" '.($fD['fieldType']=='email'?'selected':'').'>이메일 형식(email)</option>'."\n";
				$html .= '<option value="tel" '.($fD['fieldType']=='tel'?'selected':'').'>전화번호 형식(phone)</option>'."\n";
				$html .= '<option value="textarea" '.($fD['fieldType']=='textarea'?'selected':'').'>여러줄 입력칸(textarea)</option>'."\n";
				$html .= '<option value="radio" '.($fD['fieldType']=='radio'?'selected':'').'>단일 선택(radio)</option>'."\n";
				$html .= '<option value="select" '.($fD['fieldType']=='select'?'selected':'').'>단일 선택(select)</option>'."\n";
				$html .= '<option value="checkbox" '.($fD['fieldType']=='checkbox'?'selected':'').'>다중 선택(checkbox)</option>'."\n";
				$html .= '<option value="date" '.($fD['fieldType']=='date'?'selected':'').'>일자(연-월-일)</option>'."\n";
				$html .= '<option value="file" '.($fD['fieldType']=='file'?'selected':'').'>첨부파일</option>'."\n";
				$html .= '</select>'."\n";

				$attrDisplay = in_array($fD['fieldType'], array("radio", "select", "checkbox")) ? true : false;
				$html .= '<div class="divViewAttr2" id="divSetViewAttr'.$fD['no'].'" style="display:'.($attrDisplay==true?'block':'none').'"><textarea name="attr" rows="6" class="form-control">'.$fD['fieldAttr'].'</textarea>※ 표시될 항목을 줄바꿈으로 구분하여 입력하여 주세요</div>'."\n";
				$html .= '</div>'."\n";
				$html .= '<div class="col-lg-1 col-form-label text-center"><label>사용<br><input type="checkbox" name="isUse" value="Y"  '.($fD['isUse']=='Y'?'checked':'').'></label></div>'."\n";
				$html .= '<div class="col-lg-1 col-form-label text-center"><label>필수<br><input type="checkbox" name="isRequired" value="Y" '.($fD['isRequired']=='Y'?'checked':'').'></label></div>'."\n";
				$html .= '<div class="col-lg-1 col-form-label text-center">&nbsp;</div>'."\n";

			}
			$html .= '</div>';
		}
		echo $html;
	}

	public function ajaxDeleteApplyFormElement() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("no", true);
			$this->site->dbDelete("applyform", array("no"=>$no));
		}
	}


	public function ajaxGetApplyFormHTML() {
		if ($this->input->is_ajax_request()) {
			$type = $this->input->post("type", true);
			$pNo = $this->input->post("pNo", true);
			$id = $this->input->post("id", true);
			$name = $this->input->post("name", true);
			$nameEn = $this->input->post("nameEn", true);
			$type = $this->input->post("type", true);
			$attr = $this->input->post("attr", true);
			$attrEn = $this->input->post("attrEn", true);
			$use = $this->input->post("use", true);
			$required = $this->input->post("required", true);
			$title = $this->input->post("title", true);
			$seper = $this->input->post("seper", true);


			$maxSQL = "select max(fieldOrder) as max from gcs_applyform where pNo = '".$pNo."' limit 0,1";
			$maxD = $this->site->selectQuery($maxSQL);
			$maxD = isset($maxD[0]) ? $maxD[0]['max'] : 0;

			$inDB = array();
			$inDB['pNo'] = $pNo;
			$inDB['pType'] = $type;
			$inDB['fieldID'] = $id;
			$inDB['fieldName'] = $name;
			$inDB['fieldNameEn'] = $nameEn;
			$inDB['fieldType'] = $type;
			$inDB['fieldAttr'] = $attr;
			$inDB['fieldAttrEn'] = $attrEn;
			$inDB['fieldOrder'] = $maxD+1;
			$inDB['isUse'] = $use == 'true' ? 'Y' : 'N';
			$inDB['isRequired'] = $required == 'true' ? 'Y' : 'N';
			$inDB['isTitle'] = $title == 'true' ? 'Y' : 'N';
			$inDB['isSeper'] = $seper == 'true' ? 'Y' : 'N';
			$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
			$inDB['regDate'] = date("Y-m-d H:i:s");

			$no = $this->site->dbInsert("gcs_applyform", $inDB);

			$html = $button = $div = '';
			$disable = $inDB['isTitle'] == 'Y' || $inDB['isSeper'] == 'Y' ? 'disable' : '';
			$html .= '<li class="row m-0 itemSort" id="divFieldSet'.$no.'">';
			if ($inDB['isTitle'] == 'Y' || $inDB['isSeper'] == 'Y') { 
				$html .= '<label class="col-lg-2 col-form-label text-center"><i class="fa fa-arrows-v float-start sortIcon"></i></label>';
			} else {
				$html .= '<label class="col-lg-2 col-form-label text-center"><i class="fa fa-arrows-v float-start sortIcon"></i>'.$id.'</label>';
			}
			$html .= '<label class="col-lg-3 col-form-label text-center">'.$name.'</label>';
			if ($type=='radio' || $type=='checkbox' || $type=='select') {
				$button = ' <button type="button" class="btn btn-success btn-sm" onclick="return fnViewAttr(\''.$id.'\')">속성</button>';
				$div .= '<div class="divViewAttr" id="divViewAttr'.$id.'">';
				$div .= '<textarea name="attr[\''.$id.'\']" rows="6" class="form-control">'.$attr.'</textarea>※ 표시될 항목을 줄바꿈으로 구분하여 입력하여 주세요';
				$div .= '</div>';
			}
			if ($disable=='') {
				$html .= '<div class="col-lg-4 col-form-label text-left">'.$type.$button.$div.'</div>';
				$isChecked = $use == 'true' ? 'checked' : '';
				$html .= '<div class="col-lg-1 col-form-label text-center"><input type="checkbox" name="use[\''.$id.'\']" value="Y"  '.$isChecked.'></div>';
				$isChecked2 = $required == 'true' ? 'checked' : '';
				$html .= '<div class="col-lg-1 col-form-label text-center"><input type="checkbox" name="required[\''.$id.'\']" value="Y" '.$isChecked2.'></div>';
			} else {
				$html .= '<div class="col-lg-6"></div>';
			}
			$html .= '<div class="col-lg-1 col-form-label text-center"><a href="javascript:fnDelAttr('.$no.')" class="text-danger"><i class="fa fa-trash"></i></a></div>';
			$html .= '</li>';

			$arrReturn['msg'] = 'OK';
			$arrReturn['html'] = $html;



			$this->output->set_content_type('application/json')->set_output(json_encode($arrReturn));

		}
	}

	public function ajaxApplyForm() {
		if ($this->input->is_ajax_request()) {
			$html = '';
			$arrReturn = array();
			$arrReturn['html'] = '';

			$pNo = $this->input->post("pNo", true);
			$pType = $this->input->post("pType", true);
			$formD = $this->site->selectCI("*","applyform as AF", array("pNo"=>$pNo), "fieldOrder asc, no asc");
			if (empty($formD)) {
				$formD = $this->addDefaultSet($pNo, $pType);
			}

			$html .= '<div class=" form-group bg-light">';
			$html .= '<label class="col-lg-2 col-form-label text-center">ID</label>';
			$html .= '<label class="col-lg-3 col-form-label text-center">항목이름</label>';
			$html .= '<label class="col-lg-4 col-form-label text-center">항목형식</label>';
			$html .= '<label class="col-lg-1 col-form-label text-center">사용</label>';
			$html .= '<label class="col-lg-1 col-form-label text-center">필수</label>';
			$html .= '<label class="col-lg-1 col-form-label text-center">삭제</label>';
			$html .= '</div>';

			foreach($formD as $k => $fD) {
				$button = $div = $delBtn = $disabled = "";
				if ($fD['fieldType']=='radio' || $fD['fieldType']=='checkbox' || $fD['fieldType']=='select') {
					$button = '<button type="button" class="btn btn-success btn-sm btnAttr  float-end" onclick="return fnViewAttr(\''.$fD['no'].'\')">속성보기</button>';
					$div .= '<div class="divViewAttr" id="divViewAttr'.$fD['no'].'"><div class="row"><div class="col-6">'.nl2br($fD['fieldAttr']).'</div><div class="col-6" style="overflow-x:auto;">'.nl2br($fD['fieldAttrEn']).'</div></div></div>';
				}
				if (!($fD['fieldID']=="name" || $fD['fieldID']=="email" || $fD['fieldID']=="phone")) {
					/* <a href="javascript:fnEditAttr('.$fD['no'].')" class="text-success"><i class="fa fa-edit"></i></a>&nbsp;  */
					$delBtn = '<a href="javascript:fnDelAttr('.$fD['no'].')" class="text-danger"><i class="fa fa-trash"></i></a>';
					$sortIcon = '<i class="fa fa-arrows-v float-start sortIcon"></i>';
				} else {
					$disabled = "disabled";
					$sortIcon = '<i class="fa fa-arrows-v float-start sortIcon"></i>';
				}
				$class = ($fD['fieldID']=="name" || $fD['fieldID']=="email" || $fD['fieldID']=="phone") ? "" : "";
				$html .= '<li class="row m-0 itemSort '.$class.'" id="divFieldSet'.$fD['no'].'">';
				if ($fD['isTitle'] == 'Y' || $fD['isSeper'] == 'Y') { 
					$html .= '<label class="col-lg-2 col-form-label text-center">'.$sortIcon.'</label>';
				} else {
					$html .= '<label class="col-lg-2 col-form-label text-center">'.$sortIcon.$fD['fieldID'].'</label>';
				}
				if ($fD['isSeper'] == 'Y') {
					$html .= '<label class="col-lg-3 col-form-label text-center"><hr></label>';
				} else {
					$html .= '<label class="col-lg-3 col-form-label text-center">'.$fD['fieldName'].'</label>';
				}
				if ($fD['isTitle'] == 'Y') {
					$html .= '<div class="col-lg-6 col-form-label text-left"></div>';
				} else if ($fD['isSeper'] == 'Y') {
					$html .= '<div class="col-lg-6 col-form-label text-left"><hr></div>';
				} else {
					$html .= '<div class="col-lg-4 col-form-label text-left">'.$fD['fieldType']. $div.$button.'</div>';
					$isChecked = $fD['isUse'] == 'Y' ? 'checked' : '';
					$html .= '<div class="col-lg-1 col-form-label text-center"><input type="checkbox" class="btnUse" data-fno="'.$fD['no'].'" name="use[\''.$fD['fieldID'].'\']" value="Y" '.$isChecked.' '.$disabled.'></div>';
					$isChecked2 = $fD['isRequired'] == 'Y' ? 'checked' : '';
					$html .= '<div class="col-lg-1 col-form-label text-center"><input type="checkbox" class="btnRequired" data-fno="'.$fD['no'].'" name="required[\''.$fD['fieldID'].'\']" value="Y" '.$isChecked2.' '.$disabled.'></div>';
				}
				$html .= '<div class="col-lg-1 col-form-label text-center">'.$delBtn.'</div>';
				$html .= '</li>';
					// type="tel" pattern="[0-9]{3}-[0-9]{3,4}-[0-9]{4}"
			}


			// 표시 내용 가져오기


			$arrReturn['msg'] = 'OK';
			$arrReturn['html'] = $html;

			$this->output->set_content_type('application/json')->set_output(json_encode($arrReturn));
		}
	}


	public function ajaxSetRequiredStatus() {
		if ($this->input->is_ajax_request()) {
			$no = $this->input->post("fNo", true);
			$isRequired = $this->input->post("isRequired", true);
			$this->site->dbUpdate("applyform", array("isRequired"=>$isRequired), array("no"=>$no));
		}
	}

	public function ajaxSetApplyFormOrder() {
		if ($this->input->is_ajax_request()) {
			$programNo = $this->input->post("programNo", true);
			$order = $this->input->post("order");

			if (is_array($order)) foreach($order as $k => $oD) {
				$applyFormKey = str_replace("divFieldSet", "", $oD);
				$order = $k+1;
				$upDB = array();
				$upDB['fieldOrder'] = $order;
				$this->site->dbUpdate("applyform", $upDB, array("pNo"=>$programNo, "no"=>$applyFormKey));
			}
		}
	}

	private function addDefaultSet($pNo, $pType) {
		$inDB = array();
		$inDB['pNo'] = $pNo;
		$inDB['pType'] = $pType;
		$inDB['fieldID'] = 'name';
		$inDB['fieldName'] = '이름';
		$inDB['fieldNameEn'] = 'Name';
		$inDB['fieldType'] = 'text';
		$inDB['fieldAttr'] = '';
		$inDB['isUse'] = 'Y';
		$inDB['isRequired'] = 'Y';
		$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
		$inDB['regDate'] = date("Y-m-d H:i:s");
		$this->site->dbInsert("applyform", $inDB);

		$inDB = array();
		$inDB['pNo'] = $pNo;
		$inDB['pType'] = $pType;
		$inDB['fieldID'] = 'email';
		$inDB['fieldName'] = '이메일';
		$inDB['fieldNameEn'] = 'E-Mail';
		$inDB['fieldType'] = 'email';
		$inDB['fieldAttr'] = '';
		$inDB['isUse'] = 'Y';
		$inDB['isRequired'] = 'Y';
		$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
		$inDB['regDate'] = date("Y-m-d H:i:s");
		$this->site->dbInsert("applyform", $inDB);

		$inDB = array();
		$inDB['pNo'] = $pNo;
		$inDB['pType'] = $pType;
		$inDB['fieldID'] = 'phone';
		$inDB['fieldName'] = '휴대전화';
		$inDB['fieldNameEn'] = 'Phone No.';
		$inDB['fieldType'] = 'tel';
		$inDB['fieldAttr'] = '';
		$inDB['isUse'] = 'Y';
		$inDB['isRequired'] = 'Y';
		$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
		$inDB['regDate'] = date("Y-m-d H:i:s");
		$this->site->dbInsert("applyform", $inDB);

		return $this->site->selectCI("*","applyform", array("pNo"=>$pNo), "no asc");
	}



}

/*
1. 기본 정보
- 담당자 이름(국영문), 부서, 직함, 이메일, 휴대전화, 명함(파일 첨부)

2. 회사 정보
국가, 회사명(국영문), 회사 주소, 회사 연락처, 홈페이지, 회사 소개서(파일 첨부 – 선택사항)
 업종(온라인 종합몰, 크라우드펀딩, 오프라인 매장, 백화점, 대형마트, 오픈마켓, 홈쇼핑, 무역업, 온라인 자사몰, 기타 – 항목 선택하게 셋팅)


3. 상담 정보 (아래는 번호별 항목 선택하게 셋팅)
관심 품목(리빙, 패션, 오브제, 오피스/사무용품, F&B, 생활용품, 반려동물)
희망 거래 유형(온라인 플랫폼 입점, 위탁판매, 해외 유통, 매입 후 판매, OEM/ODM 제조, 오프라인 매장 입점, 브랜드 콜라보 및 판촉, 기타)

*/
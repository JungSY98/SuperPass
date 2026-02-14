<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Score class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>Score controller 입니다.
 */
class Score2 extends CB_Controller
{
	public $step2;
	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'evaluation/score';

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

		$this->step2 = array("Worker", "Sales", "Career", "CEO1", "CEO2", "Floor", "PM25", "LUX", "Noise", "VOCs", "Pollution", "Sink", "Old", "Crack", "FireExtinguisher", "FireDetector", "Wiring", "Wiringbox");

		if ($_SERVER['REMOTE_ADDR']!='211.250.74.88') {
			//alert("작업중입니다.");
		}
	}

	/**
	 * 목록을 가져오는 메소드입니다
	 */
	public function index() {

		$view = array();
		$view['view'] = array();
		$view['status'] = "";

		$where = array();


		$view['chkStep1'] = array("inflow", "comName", "ceoName", "comZip", "comAddr1", "comAddr2", "comCode", "tax", "hasbeen");
		$view['chkStep2'] = array("Worker", "Sales", "Career", "CEO1", "CEO2", "Floor", "PM25", "LUX", "Noise", "VOCs", "Pollution", "Sink", "Old", "Crack", "FireExtinguisher", "FireDetector", "Wiring", "Wiringbox");
		$view['chkStep4'] = array("amountExpect", "amountSales", "researchDate", "capitalCapability");

		$view['viewID'] = $viewID = $this->input->get("viewID", true);
		$status = $this->input->get("status", true);
		if (!empty($status)) {
			$view['status'] = $where['status'] = $status;
		}

		$view['cate'] = $this->config->item("cate");
		$view['cateName'] = $this->config->item("cateName");

		$view['year'] = 2023;
		$view['times'] = 2;
		$view['viewCate'] = $this->input->get("viewCate");
		$view['viewCate'] = empty($view['viewCate']) ? "기계금속" : $view['viewCate'];

		$view['btnColor'] = array("접수" => "btn-default", "적격" => "btn-success", "부적격" => "btn-danger");

		$yearC = "";
		$addSQL = "";
		if ($view['year']) {
			$where['year'] = $view['year'];
			$yearC = " WHERE year = '".$view['year']."' ";
		}
		if ($view['viewCate']) $where['category'] = $view['viewCate'];
		if ($view['viewID']) $addSQL .= " and `researcherID` like '".$view['viewID']."' ";
		else $addSQL .= " group by comNo ";

		$applySQL = "SELECT 
		*,
		( SELECT `mem_username` FROM `mf_member` as M WHERE M.mem_userid = A.researcherID) as rName,
		( SELECT sum(IFNULL(score, 0)) as total FROM `mf_research_step2` as S2 WHERE S2.applyNo = A.no ) as total,
		( SELECT GROUP_CONCAT(IF(aType='기타', concat(aType,'(',aEtc,')'), aType)) FROM `mf_apply_type` as AT where AT.keyNo = A.no ) as applyType,
		( SELECT no FROM `mf_research_sign` as SIGN WHERE SIGN.mem_userid = A.researcherID AND SIGN.type = 'researcher' ) as isSign
		FROM mf_apply as A 
		WHERE `year` = '".$where['year']."' 
		AND `times` = '".$view['times']."' 
		AND `category` = '".$where['category']."' 
		AND `status` != '부적격'
		AND `researcherID` != '' 
		".$addSQL."
		ORDER BY `total` DESC, `regDate` desc";
		$view['applyD']= $this->site->selectQuery($applySQL);

		//echo $applySQL;

		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'index');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}

	public function view() {

		//if ($_SERVER['REMOTE_ADDR']!='211.250.74.88') alert("작업중입니다.");

		$view = array();
		$view['view'] = array();

		$no = $view['applyNo'] = $this->uri->segment(5);

		// 회사정보
		$view['comD'] = $this->site->selectCI("*", "apply", array("no"=>$no), " no asc");
		$view['comD'] = isset($view['comD'][0]) ? $view['comD'][0] : alert("잘못된 접근입니다. 1");

		$view['comCode'] = '';

		// Step1
		$researchD = $this->site->selectCI("*, (select mem_username from mf_member AS M where M.mem_userid = S1.researcherID) as rName", "research_step1 as S1 ", array("applyNo"=>$no), "");
		$view['researchD'] = isset($researchD[0]) ? $researchD[0] : array();

		// Step2
		foreach($this->step2 as $kk => $vv) {
			$view['score'.$vv] = "";
			$view['figure'.$vv] = "";
		}
		$researchD2 = $this->site->selectCI("*", "research_step2", array("applyNo"=>$no), "");
		foreach($researchD2 as $k => $rD) {
			if (element("score", $rD)) $view['score'.$rD['type']] = $rD['score'];
			if (element("figure", $rD)) $view['figure'.$rD['type']] = $rD['figure'];
		}

		// Step3
		$view['cate'] = $this->config->item("cate");
		$view['cateName'] = $this->config->item("cateName");

		$applyTypeD = $this->site->selectCI("*", "apply_type", array("keyNo"=>$no), "cate asc, no asc");
		foreach($applyTypeD as $k => $atD) {
			$view['applyTypeD'][$atD['aType']] = $atD['aType'];
		}


		$researchD3 = $this->site->selectCI("*", "research_step3", array("applyNo"=>$no), "");
		$view['researchD3'] = array();
		foreach($researchD3 as $kk => $rD) {
			$view['researchD3']['applyCom']['item_'.$rD['code']] = $rD['applyCom'];
			$view['researchD3']['applyResearch']['item_'.$rD['code']] = $rD['applyResearch'];
		}

		// Step4
		$researchD4 = $this->site->selectCI("*", "research_step4", array("applyNo"=>$no), "");
		$view['researchD4'] = isset($researchD4[0]) ? $researchD4[0] : array();

		// 포토  
		$view['photoD'] = array();
		$photoD = $this->site->selectCI("*", "research_photo", array("applyNo"=>$no), "");
		foreach($photoD as $kk => $pD) {
			$view['photoD'][$pD['photoType']][] = $pD;
		}

		// 서명
		$sign = $this->site->selectCI("*", "research_sign", array("type"=>"researcher", "mem_userid"=>$view['comD']['researcherID']), "");
		$view['sign1'] = isset($sign[0]) ? $sign[0] : "";
		$sign2 = $this->site->selectCI("*", "research_sign", array("type"=>"ceo", "applyNo"=>$no), "");
		$view['sign2'] = isset($sign2[0]) ? $sign2[0] : "";

		$view['autoSave'] = "";


		/**
		 * 어드민 레이아웃을 정의합니다
		 */
		$layoutconfig = array('layout' => 'layout', 'skin' => 'view_paper');
		$view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
		$this->data = $view;
		$this->layout = element('layout_skin_file', element('layout', $view));
		$this->view = element('view_skin_file', element('layout', $view));

	}


	public function ajaxViewAllPhoto() {
		if ($this->input->is_ajax_request()) {
			$applyNo = $this->input->post("applyNo", true);

			$cate = $this->config->item("cate");
			$cateName = $this->config->item("cateName");

			$photoTitle = array("Pollution"=>"곰팡이(오염도)", "Sink"=>"바닥·벽면 파임", "Old"=>"노후(균형·도색)", "Crack"=>"균열", "FireExtinguisher"=>"소화기 관리(노후)", "FireDetector"=>"화재감지기 설치", "Wiring"=>"배선 관리(노후)", "Wiringbox"=>"배선함(누전차단기)");

			$_applyTypeD = $this->site->selectCI("*", "apply_type", array("keyNo"=>$applyNo), "cate asc, no asc");
			foreach($_applyTypeD as $k => $atD) {
				$applyTypeD[$atD['aType']] = $atD['aType'];
			}

			$photoD = $this->site->selectCI("*", "research_photo", array("applyNo"=>$applyNo), "no asc");
			foreach($cateName as $k1 => $name) { 
				foreach($cate[$k1] as $k2 => $itemD) {
					$photoTitle["item_".$k1."_".$k2] = element(0, $itemD) == '기타' ? '기타 '.element($itemD[0], $applyTypeD) : element(0, $itemD);
				}
			}


			$html = $prevTitle = "";
			foreach($photoD as $k => $pD) {
				if ($prevTitle != $pD['photoType']) {
					$html .= '<h4 style="background-color:#333;color:white;padding:10px;margin:20px 0px 10px 0px;">'.$photoTitle[$pD['photoType']].'</h4>';
				}

				$html .= '<div id="divPhoto'.$pD['no'].'" class="divViewPhoto">';
				$html .= '<img src="/uploads/research/'.$pD['photoYear'].'/'.$pD['applyNo'].'/'.$pD['photoType'].'/'.$pD['photoFileSource'].'" class="w-100" onerror="this.onerror=null; this.src = \'https://jsy.donic.info/uploads/research/'.$pD['photoYear'].'/'.$pD['applyNo'].'/'.$pD['photoType'].'/'.$pD['photoFileSource'].'\';">';
				$html .= '<p class="btn btn-danger pull-right" onclick="return fnDelPhoto('.$pD['no'].')">삭제</p><p class="">'.$pD['photoExplains'].'</p>';
/*
				$exif = @exif_read_data($_SERVER['DOCUMENT_ROOT'].'/uploads/research/'.$pD['photoYear'].'/'.$pD['applyNo'].'/'.$pD['photoType'].'/'.$pD['photoFileSource'], 0, true);
				if (element('DateTimeOriginal', element('EXIF', $exif))) $html .= '<p style="margin-bottom:0px;">사진 생성일 : '.element('DateTimeOriginal', element('EXIF', $exif)).'</p>';
				if (element('Model', element('IFD0', $exif))) $html .= '<p style="margin-bottom:0px;">휴대폰 기종 : '.element('Model', element('IFD0', $exif)).'</p>';
				if (element('GPSLatitude', element('GPS', $exif)) && element('GPSLongitude', element('GPS', $exif))) { //위경도 좌표가 있다면
					$gps_lat_d = $gps_lat_m = $gps_lat_s = '';
					if ($exif["GPS"]["GPSLatitude"][0]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLatitude"][0], "%d/%d"); //문자->숫자로 계산
						$gps_lat_d = $temp_d1/$temp_d2;
					}
					if ($exif["GPS"]["GPSLatitude"][1]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLatitude"][1], "%d/%d");
						$gps_lat_m = $temp_d1/$temp_d2;
					}
					if ($exif["GPS"]["GPSLatitude"][2]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLatitude"][2], "%d/%d");
						$gps_lat_s = $temp_d1/$temp_d2;
					}
					$gps_lon_d = $gps_lon_m = $gps_lon_s = '';
					if ($exif["GPS"]["GPSLongitude"][0]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLongitude"][0], "%d/%d"); //문자->숫자로 계산
						$gps_lon_d = $temp_d1/$temp_d2;
					}
					if ($exif["GPS"]["GPSLongitude"][1]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLongitude"][1], "%d/%d");
						$gps_lon_m = $temp_d1/$temp_d2;
					}
					if ($exif["GPS"]["GPSLongitude"][2]!='0/0') {
						list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLongitude"][2], "%d/%d");
						$gps_lon_s = $temp_d1/$temp_d2;
					}
					if ($gps_lat_d && $gps_lat_m && $gps_lat_s) {
						$gps_lat = $gps_lat_d+$gps_lat_m/60+$gps_lat_s/3600; //도분초를 도로 변환
						$html .= "GPS 위도 : $gps_lat<br />";
					}
					if ($gps_lat_d && $gps_lat_m && $gps_lat_s) {
						$gps_lon = $gps_lon_d+$gps_lon_m/60+$gps_lon_s/3600;
						$html .= "GPS 경도 : $gps_lon<br />";
					}
					if ($gps_lat && $gps_lon) {
						$html .= '<a class="btn btn-xs btn-info per100" href="https://google.com/maps/search/'.$gps_lat.',++'.$gps_lon.'?entry=ttu" target="_blank">위치 확인하기</a>';
					}
				}
*/
				$html .= '</div>';
				$prevTitle = $pD['photoType'];
			}
			echo $html;

		}
	}
	


}
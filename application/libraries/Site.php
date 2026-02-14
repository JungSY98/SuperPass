<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Site {

	private $CI;

    function __construct() {
		$this->CI = & get_instance();
    }


	public function getSub($subObj) {
		global $_SESSION;
		$html = "";

		if (is_array(element('subWorkD', $subObj)))
		foreach(element('subWorkD', $subObj) as $k2 => $subD) { 
			$marginLeft = $subD['depth']*25;
			$positionLeft = ($subD['depth']-1)*25;
			$adminCard = ($subD['userID']=='admin' || $subD['userID']=='manage') ? " adminCard":"";
			$html .=  '<div class="bgReply" style="background-position:'.$positionLeft.'px 5px;">';
			$html .= '<div class="card mb-3 replyCard'.$adminCard.'" style="margin-left:'.$marginLeft.'px">';
			$html .= '<div class="card-header">';
			$html .= '<h5 class="card-title">'.$subD['subject'].'</h5>';
			$html .= '<hr>';
			$html .= '<p class="mb-0">';
			$html .= getManagerName($subD['userID']).' >>> '.getManagerName($subD['target_id']);
			$html .= '<span class="float-end">'.date("Y-m-d H:i", strtotime($subD['regDate'])).'</span>';
			$html .= '</p>';
			$html .= '</div>';
			$html .= '<div class="card-body">';
			$html .= '<p class="card-text">'.nl2br($subD['contents']).'</p>';
			$html .= getAttachFile($subD, true);
			$html .= '</div>';
			$html .= '<div class="card-footer">';
			if ($subD['userID'] != element("userID", $_SESSION)) {
				$html .= '<button type="button" class="btn btn-primary" onclick="return fnReplyWork('.$subD['no'].')">답변하기</button>';
			} else if (empty(element('subWorkD', $subD))) {
				//$html .= '<button type="button" class="btn btn-success me-2" onclick="return fnModifyWork('.$subD['no'].')">수정하기</button>';
				$html .= '<button type="button" class="btn btn-danger" onclick="return fnDeleteWork('.$subD['no'].')">삭제하기</button>';
			} else {
				$html .= '<button type="button" class="btn btn-light">삭제 불가</button>';
				//$html .= '<button type="button" class="btn btn-success me-2" onclick="return fnModifyWork('.$subD['no'].')">수정하기</button>';
				//$html .= '<button type="button" class="btn btn-danger" onclick="return fnDeleteWork('.$subD['no'].')">삭제하기</button>';
			}
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';

			$html .= $this->getSub($subD);

		}

		return $html;

	}


	public function chkManageM($applyD) {

		$applyNo = $applyD['no'];
		$userID = $applyD['userID'];

		$isMain = $this->selectCI("no", "cowork_manager", array("applyNo"=>$applyNo, "isMain"=>"Y"), "");
		if (count($isMain)==0) {
			$inDB = array();
			$inDB['applyNo'] = $applyNo;
			$inDB['userID'] = $userID;
			$inDB['name'] = $applyD['com1RepresentName'];
			$inDB['phone'] = echoPhoneNumber($applyD['com1RepresentPhone']);
			$inDB['email'] = $applyD['com1RepresentEmail'];
			$inDB['isMain'] = 'Y';
			$inDB['regIP'] = $_SERVER['REMOTE_ADDR'];
			$inDB['regDate'] = date("Y-m-d H:i:s");
			$this->dbInsert("cowork_manager", $inDB);
		}
	}

	public function chkFileExistAll($applyNo) {
		$photoD = $this->selectCI("*", "research_photo", array("applyNo"=>$applyNo), "");
		$isAll = true;
		foreach($photoD as $k => $pD) {

			if (strtotime("2023-06-30") < strtotime(element('regDate', $photoD))) {
				if ( is_file( $_SERVER['DOCUMENT_ROOT']. "/uploads/research/".$pD['photoYear']."/". $pD['applyNo']."/". $pD['photoType']."/". $pD['photoFileSource'])==false ) {
					$isAll = false;
				}
			} else {
				$url="https://jsy.donic.info/uploads/research/".element('photoYear', $photoD)."/".element('applyNo', $photoD)."/".element('photoType', $photoD)."/".element('photoFileSource', $photoD);

				if ($this->url_exists($url)==false) {
					$isAll = false;
				}
			}

		}
		return $isAll;
	}

	public function chkFileExist($applyNo, $item) {
		$photoD = $this->selectCI("*", "research_photo", array("applyNo"=>$applyNo, "photoType"=>$item), "");
		$photoD = isset($photoD[0]) ? $photoD[0] : array();
		if (strtotime("2023-06-30") < strtotime(element('regDate', $photoD))) {
			return !is_file($_SERVER['DOCUMENT_ROOT']."/uploads/research/".element('photoYear', $photoD)."/".element('applyNo', $photoD)."/".element('photoType', $photoD)."/".element('photoFileSource', $photoD));
		} else {
			$url="https://jsy.donic.info/uploads/research/".element('photoYear', $photoD)."/".element('applyNo', $photoD)."/".element('photoType', $photoD)."/".element('photoFileSource', $photoD);

			return !$this->url_exists($url);
		}
	}

	function url_exists($url) {
		// Version 4.x supported
		$handle   = curl_init($url);
		if (false === $handle)
		{
		   return false;
		}
		curl_setopt($handle, CURLOPT_HEADER, false);
		curl_setopt($handle, CURLOPT_FAILONERROR, true);  // this works
		curl_setopt($handle, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); 
		// request as if Firefox    
		curl_setopt($handle, CURLOPT_NOBODY, true);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, false);
		$connectable = curl_exec($handle);
		curl_close($handle);
		return $connectable;
	}

	public function completionStep1($applyNo, $chkStep1) {
		$step1D = $this->selectCI("*", "completion_step1", array("applyNo"=>$applyNo), "");
		$step1D = $this->singleData($step1D);
		
		$isDone = 0;
		foreach($chkStep1 as $k => $field) {
			if (!empty(element($field, $step1D))) $isDone++;
		}
		$rate = round((( $isDone / count($chkStep1) ) * 100), 1);
		$html = '<div class="per100" style="background-color:#eee;border:1px solid black;width:100%;">';
		$html .= '<div class="" style="background-color:#a6efa6;width:'.$rate.'%">'.$rate.'%</div>';
		$html .= '</div>';
		return $html;
	}

	public function completionStep2($applyNo, $chkStep2) {
		$step2D = $this->selectCI("*", "completion_step2", array("applyNo"=>$applyNo), "");
		$step2D = $this->singleData($step2D);
		
		$isDone = 0;
		foreach($chkStep2 as $k => $field) {
			if (!empty(element($field, $step2D))) $isDone++;
		}
		$rate = round((( $isDone / count($chkStep2) ) * 100), 1);
		$html = '<div class="per100" style="background-color:#eee;border:1px solid black;width:100%;">';
		$html .= '<div class="" style="background-color:#a6efa6;width:'.$rate.'%">'.$rate.'%</div>';
		$html .= '</div>';
		return $html;
	}

	public function completionStep3($applyNo, $chkStep3) {

		$completionCheckD = $this->selectQuery("select * from mf_research_step3 where `applyNo` = '".$applyNo."' and ( applyCom = 'Y' or applyResearch = 'Y' ) ");

		$workD = array();
		$_workD = $this->selectCI("*", "completion_work", array("applyNo"=>$applyNo), "");
		foreach($_workD as $kk => $wD) {
			$workD[$wD['workType']][$wD['workName']] = $wD['workCnt'] * $wD['workPrice'];
		}
		// 포토 
		$photoD = array();
		$_photoD = $this->selectCI("no,applyNo,photoType,photoFileSource", "completion_photo", array("applyNo"=>$applyNo), "");
		foreach($_photoD as $kk => $pD) {
			$photoD[$pD['photoType']][] = $pD;
		}
		$totalCnt = 0;
		$isDone = 0;
		foreach($completionCheckD as $k1 => $chkD) { 
			if (!empty(element("item_".$chkD['code'], $workD))) $isDone++;
			if (!empty(element("item_".$chkD['code'], $photoD))) $isDone++;
			$totalCnt += 2;
		}

		$step3D = $this->selectCI("*", "completion_step3", array("applyNo"=>$applyNo), "");
		$step3D = $this->singleData($step3D);
		
		foreach($chkStep3 as $k => $field) {
			if (!empty(element($field, $step3D))) $isDone++;
			$totalCnt++;
		}


		//if ($totalCnt==0) exit;
		if ($totalCnt==0) $rate = 0;
		else $rate = round((( $isDone / $totalCnt ) * 100), 1);
		$html = '<div class="per100" style="background-color:#eee;border:1px solid black;width:100%;">';
		$html .= '<div class="" style="background-color:#a6efa6;width:'.$rate.'%">'.$rate.'%</div>';
		$html .= '</div>';
		return $html;

	}


	public function processStep1($applyNo, $chkStep1) {
		$step1D = $this->selectCI("*", "research_step1", array("applyNo"=>$applyNo), "");
		$step1D = $this->singleData($step1D);
		
		$isDone = 0;
		foreach($chkStep1 as $k => $field) {
			if (!empty(element($field, $step1D))) $isDone++;
		}
		$rate = round((( $isDone / count($chkStep1) ) * 100), 1);
		$html = '<div class="per100" style="background-color:#eee;border:1px solid black;width:100%;">';
		$html .= '<div class="" style="background-color:#a6efa6;width:'.$rate.'%">'.$rate.'%</div>';
		$html .= '</div>';
		return $html;
	}

	public function processStep2($applyNo, $chkStep2) {
		$_step2D = $this->selectCI("*", "research_step2", array("applyNo"=>$applyNo), "");
		$step2D = array();
		foreach($_step2D as $k => $v) {
			$step2D['score'.$v['type']] = $v['score'];
			if (!in_array($v['type'], array("CEO1", "CEO2", "Pollution", "Sink", "Old", "Crack", "FireExtinguisher", "FireDetector", "Wiring", "Wiringbox"))) {
				$step2D['figure'.$v['type']] = $v['figure'];
			}
		}
		$isDone = 0;
		foreach($chkStep2 as $k => $v) {
			if (isset($step2D["score".$v])) $isDone++;
			if (isset($step2D["figure".$v])) $isDone++;
		}
		$totalCnt = count($chkStep2)*2 - 10;
		$rate = round((( $isDone / $totalCnt ) * 100), 1);
		$html = '<div class="per100" style="background-color:#eee;border:1px solid black;width:100%;">';
		$html .= '<div class="" style="background-color:#a6efa6;width:'.$rate.'%">'.$rate.'%</div>';
		$html .= '</div>';
		return $html;
	}

	public function processStep3($applyNo) {
		$cate = $this->CI->config->item("cate");
		$cateName = $this->CI->config->item("cateName");

		$_applyTypeD = $this->selectCI("*", "apply_type", array("keyNo"=>$applyNo), "cate asc, no asc");
		$applyTypeD = array();
		foreach($_applyTypeD as $k => $atD) {
			$applyTypeD[$atD['aType']] = $atD['aType']=='기타' ? '기타 ('.element('aEtc', $atD).')' : $atD['aType'];
		}


		$_researchD = $this->selectCI("*", "research_step3", array("applyNo"=>$applyNo), "");
		$researchD = array();
		foreach($_researchD as $kk => $rD) {
			$researchD['applyCom']['item_'.$rD['code']] = $rD['applyCom'];
			$researchD['applyResearch']['item_'.$rD['code']] = $rD['applyResearch'];
		}
		// 포토 
		$photoD = array();
		$_photoD = $this->selectCI("no,applyNo,photoType,photoFileSource", "research_photo", array("applyNo"=>$applyNo), "");
		foreach($_photoD as $kk => $pD) {
			$photoD[$pD['photoType']][] = $pD;
		}
		$totalCnt = 0;
		$isDone = 0;
		foreach($cateName as $k1 => $name) { 
			foreach($cate[$k1] as $k2 => $itemD) {
				$checked = $comSelect = '';


				if (element("applyResearch", $researchD)) {
					$checked = element("item_".$k1."_".$k2, element("applyResearch", $researchD)) == 'Y' ? "checked" : "";
				} else if (empty($researchD)) {
					if ($itemD[2]==true) {
						$checked = "checked"; 
					} else {
						$checked = ""; 
					}
				}
				if (empty($researchD)) {
					$comSelect = element($itemD[0], $applyTypeD)?"checked":"";
				} else {
					$comSelect = element("item_".$k1."_".$k2, element("applyCom", $researchD))=='Y'?"checked":"";
				}
				if ($comSelect=='checked' || $checked=='checked') {
					$totalCnt++;
					if (element("item_".$k1."_".$k2, $photoD)) $isDone++;
				}
			}
		}
		//if ($totalCnt==0) exit;
		if ($totalCnt==0) $rate = 0;
		else $rate = round((( $isDone / $totalCnt ) * 100), 1);
		$html = '<div class="per100" style="background-color:#eee;border:1px solid black;width:100%;">';
		$html .= '<div class="" style="background-color:#a6efa6;width:'.$rate.'%">'.$rate.'%</div>';
		$html .= '</div>';
		return $html;

	}

	public function processStep4($applyNo, $chkStep4) {
		$step4D = $this->selectCI("*", "research_step4", array("applyNo"=>$applyNo), "");
		$step4D = $this->singleData($step4D);
		
		$isDone = 0;
		foreach($chkStep4 as $k => $field) {
			if (element($field, $step4D)!='') $isDone++;
		}
		$rate = round((( $isDone / count($chkStep4) ) * 100), 1);
		$html = '<div class="per100" style="background-color:#eee;border:1px solid black;width:100%;">';
		$html .= '<div class="" style="background-color:#a6efa6;width:'.$rate.'%">'.$rate.'%</div>';
		$html .= '</div>';
		return $html;
	}


	public function getRemindsTime($type, $userNo, $date, $itemNo, $keyNo='') {

		if (empty($itemNo)) return 0;
		$where = array();

		$itemD = $this->selectCI("*", "facility_item", array("no"=>$itemNo), "no asc");
		$itemD = isset($itemD[0]) ? $itemD[0] : array();
		$ableTime = $itemD['maxUseTime'];

		$addSql = !empty($keyNo) ? " and no != '".$keyNo."' " : "";
		if ($type=='membership') {
			$isD = $this->selectQuery("select * from sdf_facility_reservation where `memNo` = '".$userNo."'  ".$addSql." and `reserveStart` like '".$date."%' order by no asc"); // and `itemNo` = '".$itemNo."'
			//return $isD;
			$reserveTime = 0;
			foreach($isD as $k => $d) {
				$time = strtotime($d['reserveEnd']) - strtotime($d['reserveStart']);
				$reserveTime += $time;
			}
			return $ableTime - round(($reserveTime / 3600), 1);
		} else if ($type=='tenant') {
			$isD = $this->selectQuery("select * from sdf_facility_reservation where `memNo` = '".$userNo."' and `itemNo` = '".$itemNo."' ".$addSql." and `reserveStart` like '".$date."%' order by no asc");
			//return $isD;
			$reserveTime = 0;
			foreach($isD as $k => $d) {
				$time = strtotime($d['reserveEnd']) - strtotime($d['reserveStart']);
				$reserveTime += $time;
			}
			return $ableTime - round(($reserveTime / 3600), 1);
		}
	}


	public function sendResultMail($applyNo, $memberNo, $allowType) {
		$this->CI->load->library(array('email'));
		$sql = "select 
		no,membershipNo,aName, aEmail, aPhone,
		(select cardinal from sdf_membership as M where A.membershipNo = M.no ) as cardinal
		from sdf_membership_apply_list as A where no = '".$applyNo."' ";
		$applyD = $this->selectQuery($sql);
		$applyD = isset($applyD[0]) ? $applyD[0] : array();

		if ($allowType=='Y') {

			$emailCont = $this->selectCI("*", "document", array("doc_id"=>8), "doc_id desc");
			$emailCont = isset($emailCont[0]) ? $emailCont[0] : array();

		} else if ($allowType=='D') { 

			$emailCont = $this->selectCI("*", "document", array("doc_id"=>10), "doc_id desc");
			$emailCont = isset($emailCont[0]) ? $emailCont[0] : array();

		} else if ($allowType=='L') {

			$emailCont = $this->selectCI("*", "document", array("doc_id"=>9), "doc_id desc");
			$emailCont = isset($emailCont[0]) ? $emailCont[0] : array();

		}
		$applyMonth = date("Y년 m", strtotime(substr($applyD['cardinal'],0,4)."-".substr($applyD['cardinal'],4,2)));
		$applyPeriod = date("m월 15일 ~ 25일", strtotime(substr($applyD['cardinal'],0,4)."-".substr($applyD['cardinal'],4,2)));
		$beforeMonth = date("m", strtotime(substr($applyD['cardinal'],0,4)."-".substr($applyD['cardinal'],4,2). " -1 month"));
		$nextMonth = date("m", strtotime(substr($applyD['cardinal'],0,4)."-".substr($applyD['cardinal'],4,2). " +1 month"));

		$applyName = $applyD['aName'];
		$applyEmail = $applyD['aEmail'];

		$mailSubject = str_replace("{{신청월}}", $applyMonth, $emailCont['doc_title']);
		$mailCont = str_replace("{{신청월}}", $applyMonth, $emailCont['doc_content']);
		$mailCont = str_replace("{{이전달}}", $beforeMonth, $mailCont);
		$mailCont = str_replace("{{다음달}}", $nextMonth, $mailCont);
		$mailCont = str_replace("{{다음달신청기간}}", $applyPeriod, $mailCont);
		$mailCont = str_replace("{{신청자이름}}", $applyName, $mailCont);

		$this->CI->email->clear(true);
		$this->CI->email->from($this->CI->cbconfig->item('webmaster_email'), $this->CI->cbconfig->item('webmaster_name'));
		$this->CI->email->to($applyEmail);
		$this->CI->email->subject($mailSubject);
		$this->CI->email->message($mailCont);
		$this->CI->email->send();
		$this->dbUpdate("membership_apply_list", array("isSendMail"=>"Y"), array("no"=>$applyNo));
	}

	public function sendResultSMS($applyNo, $memberNo, $allowType) {

		$sql = "select 
		no,membershipNo,aName, aEmail, aPhone,
		(select cardinal from sdf_membership as M where A.membershipNo = M.no ) as cardinal
		from sdf_membership_apply_list as A where no = '".$applyNo."' ";
		$applyD = $this->selectQuery($sql);
		$applyD = isset($applyD[0]) ? $applyD[0] : array();
		$applyMonth = date("Y년 m", strtotime(substr($applyD['cardinal'],0,4)."-".substr($applyD['cardinal'],4,2)));

		if ($allowType=='Y') {

			$sms['msg'] = "안녕하세요? 서울디자인창업센터 멤버십라운지입니다.\n{{신청월}}월 멤버십라운지 이용이 승인되어 문자드립니다. 자세한 사항은 신청하신 메일 확인 부탁드립니다.\n\n>> 멤버십카드 발급방법 : 멤버십라운지 본인 방문\n\n안내데스크 업무시간 : 월~금 10:00~22:00\n문의사항 : 02-3143-7365";
			$sms['msg'] = $mailSubject = str_replace("{{신청월}}", $applyMonth, $sms['msg']);

			$sms['subject'] = "서울디자인창업센터 멤버십라운지 승인 안내";
			$sms['sendTel'] = array("02","3143", "7365");
			$sms['receiveTel'] = $applyD['aPhone'];

		} else if ($allowType=='D' || $allowType=='L') {

			$sms['msg'] = "안녕하세요? 서울디자인창업센터 멤버십라운지입니다. \n안타깝지만, 귀하께서 신청해주신 {{신청월}}월 이용은 미승인되어, 죄송한 말씀을 드립니다.\n\n감사합니다. 자세한 사항은 신청하신 메일 확인 부탁드립니다.\n\n안내데스크 업무시간 : 월~금 10:00~22:00\n문의사항 : 02-3143-7365";
			$sms['msg'] = $mailSubject = str_replace("{{신청월}}", $applyMonth, $sms['msg']);

			$sms['subject'] = "서울디자인창업센터 멤버십라운지 미승인 안내";
			$sms['sendTel'] = array("02","3143", "7365");
			$sms['receiveTel'] = $applyD['aPhone'];

		}

		$this->sendSMS($sms);
		$this->dbUpdate("membership_apply_list", array("isSendSMS"=>"Y"), array("no"=>$applyNo));

	}


	function sendSMS($cfg) {
		if (empty($cfg['receiveTel'])) return false;

		/******************** 인증정보 ********************/
		$sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // HTTPS 전송요청 URL
		// $sms_url = "http://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL
		$sms['user_id'] = base64_encode("smsjsy"); //SMS 아이디.
		$sms['secure'] = base64_encode("11b1f85e1496a1de359d52783bfe38a6") ;//인증키
		$sms['msg'] = base64_encode(stripslashes($cfg['msg']));
		$sms['subject'] =  base64_encode($cfg['subject']);

		$sms['rphone'] = base64_encode(trim(strip_tags(nl2br($cfg['receiveTel']))));
		$sms['sphone1'] = base64_encode($cfg['sendTel'][0]);
		$sms['sphone2'] = base64_encode($cfg['sendTel'][1]);
		$sms['sphone3'] = base64_encode($cfg['sendTel'][2]);
		//$sms['rdate'] = base64_encode(date("Ymd"));
		//$sms['rtime'] = base64_encode($_POST['rtime']);
		$sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다.
		//$sms['returnurl'] = base64_encode($_POST['returnurl']);
		//$sms['testflag'] = base64_encode('Y');
		//$sms['destination'] = strtr(base64_encode($_POST['destination']), '+/=', '-,');
		//$returnurl = "http://entropydesign.kr/contact/callCurl/";
		//$sms['repeatFlag'] = base64_encode($_POST['repeatFlag']);
		//$sms['repeatNum'] = base64_encode($_POST['repeatNum']);
		//$sms['repeatTime'] = base64_encode($_POST['repeatTime']);
		$sms['smsType'] = base64_encode("L"); // LMS일경우 L
		//$nointeractive = $_POST['nointeractive']; //사용할 경우 : 1, 성공시 대화상자(alert)를 생략

		$host_info = explode("/", $sms_url);
		$host = $host_info[2];
		$path = $host_info[3]."/".$host_info[4];

		srand((double)microtime()*1000000);
		$boundary = "---------------------".substr(md5(rand(0,32000)),0,10);
		//print_r($sms);

		// 헤더 생성
		$header = "POST /".$path ." HTTP/1.0\r\n";
		$header .= "Host: ".$host."\r\n";
		$header .= "Content-type: multipart/form-data, boundary=".$boundary."\r\n";

		// 본문 생성
		foreach($sms AS $index => $value){
			$data .="--$boundary\r\n";
			$data .= "Content-Disposition: form-data; name=\"".$index."\"\r\n";
			$data .= "\r\n".$value."\r\n";
			$data .="--$boundary\r\n";
		}
		$header .= "Content-length: " . strlen($data) . "\r\n\r\n";

		$fp = fsockopen($host, 80);

		if ($fp) {
			fputs($fp, $header.$data);
			$rsp = '';
			while(!feof($fp)) {
				$rsp .= fgets($fp,8192);
			}
			fclose($fp);
			$msg = explode("\r\n\r\n",trim($rsp));
			$rMsg = explode(",", $msg[1]);
			$Result= $rMsg[0]; //발송결과
			$Count= $rMsg[1]; //잔여건수

			//발송결과 알림
			//echo $Result;
			if($Result=="success") {
				$alert = "성공";
				$alert .= " 잔여건수는 ".$Count."건 입니다.";
				return true;
			}
		}
	}


	public function hasAppliedSort(&$obj, $subkey="membershipNo", $sort_ascending=false) {
		if (!is_array($obj)) return $obj;
		$array = $obj;
		if (count($array))
			$temp_array[key($array)] = array_shift($array);

		foreach($array as $key => $val){
			$offset = 0;
			$found = false;
			foreach($temp_array as $tmp_key => $tmp_val)
			{
				if(!$found and strtolower($val[$subkey]) > strtolower($tmp_val[$subkey]))
				{
					$temp_array = array_merge(    (array)array_slice($temp_array,0,$offset),
												array($key => $val),
												array_slice($temp_array,$offset)
											  );
					$found = true;
				}
				$offset++;
			}
			if(!$found) $temp_array = array_merge($temp_array, array($key => $val));
		}

		if ($sort_ascending) $array = array_reverse($temp_array);
		else $array = $temp_array;

		return $array;
	}

	public function getAdminAuth($adminRole='') {
		if ($this->CI->member->is_admin()=='super') {
			return true;
		} else {
			$memID = $this->CI->member->item("mem_userid");
			if (empty($memID)) return false;
			
			if ($adminRole) {
				$isD = $this->CI->site->selectCI("no, admin_role", "admin_auth", array("admin_role"=>$adminRole,"mem_userid"=>$memID), "");
			} else {
				$isD = $this->CI->site->selectCI("no, admin_role", "admin_auth", array("mem_userid"=>$memID), "");
			}
			if (empty($isD)) return false;
			else return true;
		}
	}


	public function chkGroup($groupID) {
		if (empty($groupID)) return false;
		$groupD = $this->CI->member->group();
		if (is_array($groupD)) {
			$isGroup = false;
			foreach($groupD as $k => $gD) {
				if ($gD['mgr_id']==$groupID) $isGroup = true;
			}
			return $isGroup;
		} else {
			return false;
		}
	}
	public function chkCompanyMember($comNo, $memNo) {
		if (empty($comNo) || empty($memNo)) return false;
		$isD = $this->selectCI("*", "tenant_member", array("comNo"=>$comNo, "memNo"=>$memNo), "");
		return (isset($isD[0])) ? true : false;
	}

	public function fnActionFileUpload($uploadPath, $name) {
		$inDB = array();
		$inDB[$name.'Name'] = $this->CI->input->post($name."Name", true);
		$inDB[$name.'Source'] = $this->CI->input->post($name."Source", true);

		$delIMG = $this->CI->input->post("del_".$name, true);
		if ($delIMG!='') {
			@unlink($uploadPath.$delIMG);
			$inDB[$name.'Name'] = "";
			$inDB[$name.'Source'] = "";
		}
		if ($_FILES[$name]['error']==0) {
			if (element($name.'Source', $inDB)!='') {
				@unlink($uploadPath.$inDB[$name.'Source']);
			}
			$imgD = $this->fileUP($uploadPath, $name);
			$inDB[$name.'Name'] = $imgD['client_name'];
			$inDB[$name.'Source'] = $imgD['file_name'];
		}
		return $inDB;
	}


	public function ajaxGetProgramApplyForm($pNo, $aNo='') {
		$html = '';
		$applyD = $arrReturn = $addField = array();
		$arrReturn['html'] = $arrReturn['msg'] = '';

		//$pNo = $this->input->post("pNo", true);
		$formD = $this->selectCI("*","program_applyform", array("pNo"=>$pNo), "no asc");
		if ($aNo) {
			$applyD = $this->selectCI("*","program_applylist", array("no"=>$aNo), "no asc");
			$applyD = isset($applyD[0]) ? $applyD[0] : array();
			$_addField = json_decode($applyD['addValue'], true);
			foreach($_addField as $kk => $addD) {
				//$addField[$addD['fieldID']] = $addD['fieldValue'];
				$applyD[$addD['fieldID']] = $addD['fieldValue'];
			}
			//print_r($applyD);
		}

		if (empty($formD)) {
			$arrReturn['msg'] = "신청 정보가 없습니다. 관리자에게 문의하여 주세요";
		} else {
			$arrReturn['msg'] = "OK";
			$html .= "";
				foreach($formD as $k => $fD) {
					$html .= '<div class="form-group row">'."\n";
					$html .= '<label class="col-lg-3 col-form-label text-right">'.$fD['fieldName'].'</label>'."\n";
					$html .= '<div class="col-lg-9">'."\n";
					$required = $fD['isRequired'] == 'Y' ? 'required' : '';
					if ($fD['fieldType']=='text' || $fD['fieldType']=='date') {
						$html .= '<input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" class="form-control" placeholder="'.$fD['fieldName'].'을(를) 입력하세요" '.$required.' value="'.element($fD['fieldID'], $applyD).'">'."\n";
					} else if ($fD['fieldType']=='url') {
						$html .= '<input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" class="form-control" placeholder="'.$fD['fieldName'].'을(를) 입력하세요" '.$required.' value="'.element($fD['fieldID'], $applyD).'">'."\n".'<p class="text-danger mb-0">※ http(s)://www.naver.com</p>'."\n";
					} else if ($fD['fieldType']=='email') {
						$html .= '<input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" class="form-control" placeholder="'.$fD['fieldName'].'을(를) 입력하세요" value="'.$this->CI->member->item("mem_email").'" '.$required.' value="'.element($fD['fieldID'], $applyD).'">'."\n";
					} else if ($fD['fieldType']=='tel') {
						$html .= '<input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" pattern="[0-9]{3}-[0-9]{3,4}-[0-9]{4}" class="form-control" placeholder="'.$fD['fieldName'].'을(를) 입력하세요" '.$required.' value="'.element($fD['fieldID'], $applyD).'">'."\n".'<p class="text-danger mb-0">※ 010-0000-0000</p>'."\n";
					} else if ($fD['fieldType']=='file') {
						$html .= '<input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" class="form-control" '.$required.'>'."\n";
						$fileD = json_decode(element($fD['fieldID'], $applyD), true);
						$fileLink = !empty($fileD) ? '<a class="btn btn-dark w-100 mt-1" href="/files/'.$fileD['file_name'].'/apply/down/'.$fileD['client_name'].'/">'.$fileD['client_name'].'</a>' : '';
						$html .= $fileLink;
						$html .= '<textarea name="'.$fD['fieldID'].'" class="d-none">'.element($fD['fieldID'], $applyD).'</textarea>';
					} else if ($fD['fieldType']=='textarea') {
						$html .= '<textarea name="'.$fD['fieldID'].'" class="form-control" '.$required.' rows="5">'.element($fD['fieldID'], $applyD).'</textarea>'."\n";
					} else if ($fD['fieldType']=='radio') {
						$attrData = explode("\n", $fD['fieldAttr']);
						$html .= '<div class="row">'."\n";
						foreach($attrData as $k => $aD) {
							$checked = preg_match("/".$aD."/i", element(element('fieldID', $fD), $applyD)) ? "checked" : "";
							$html .= '<label class="col-sm-12 mb-2"><input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'" value="'.$aD.'" '.$checked.'> '.$aD.'</label>'."\n";
						}
						$html .= '</div>'."\n";
					} else if ($fD['fieldType']=='checkbox') {
						$attrData = explode("\n", $fD['fieldAttr']);
						$html .= '<div class="row">'."\n";
						foreach($attrData as $k => $aD) {
							$checked2 = preg_match("/".$aD."/i", element(element('fieldID', $fD), $applyD)) ? "checked" : "";
							$html .= '<label class="col-sm-12 mb-2"><input type="'.$fD['fieldType'].'" name="'.$fD['fieldID'].'[]" value="'.$aD.'" '.$checked2.'> '.$aD.'</label>'."\n";
						}
						$html .= '</div>'."\n";
					} else if ($fD['fieldType']=='select') {
						$attrData = explode("\n", $fD['fieldAttr']);
						$html .= '<select name="'.$fD['fieldID'].'" class="form-control" '.$required.'>'."\n";
						$html .= '<option value="">선택하세요</option>'."\n";
						foreach($attrData as $k => $aD) {
							if (trim($aD)=='') continue;
							$selected = preg_match("/".$aD."/i", element(element('fieldID', $fD), $applyD)) ? "selected" : "";
							$html .= '<option value="'.$aD.'" '.$selected.'> '.$aD.'</option>'."\n";
						}
						$html .= '</select>'."\n";
					}
					$html .= '</div>'."\n";
					$html .= '</div>'."\n";
				}
				$arrReturn['msg'] = 'OK';
				$arrReturn['html'] = $html;
		}

		return $arrReturn['html'];
	}

	function getScore($standardD, $type, $value, $unit, $scD, $aNo) {

		if (empty($standardD)) return 0;

		if (!empty($scD[$aNo]['score1']) && $type=='sales') return $scD[$aNo]['score1'];
		if (!empty($scD[$aNo]['score2']) && $type=='export') return $scD[$aNo]['score2'];

		if ($type=='sales' && $unit=='USD') {
			$value = $value * 1100;
		}
		if ($type=='export' && $unit=='백만원') {
			$value = $value / 1100;
		}
		$value = (float)sprintf("%0.2d", $value);
		//$unit = $type=='sales' ? '백만원' : 'USD';

		$score = 0;
		foreach($standardD[$type] as $k => $sD) {
			if ($sD['endPrice'] =='') $sD['endPrice']  = 9999999999999999999999999999999999999;
			if ($sD['startPrice'] <= $value && $value <= $sD['endPrice'] ) {
				//echo $sD['startPrice']." <= ".$value." && ".$value." <= ".$sD['endPrice'];
				$score=  $sD['score'];
			}
		}
		return $score;
	}


	function getRealFileName($arrFile) {
		$arrFile = isset($arrFile[0]) ? $arrFile[0] : array();
		if (empty($arrFile)) return "";
		$fD=pathinfo($arrFile['name']);
		if (isset($fD['extension'])) { 
			$fileName=$arrFile['id'].".".$fD['extension'];
			return $fileName;
		} else {
			return "";
		}
	}

	function portfoiloFileCheck($aNo, $status, $season='2021FW') {
		$file2D = $this->selectCI("*", "register_sfw_attach_file_info", array("aNo"=>$aNo), "no desc");
		$file2D = isset($file2D[0]) ? $file2D[0] : array();
		if (empty($file2D)) return "danger";

		$_file1 = json_decode($file2D['upCFile1'], true);
		$file1 = file_exists(getFileLocation(array("id"=>$this->getRealFileName($_file1))));

		$_file2 = json_decode($file2D['upFile4'], true);
		$file2 = file_exists(getFileLocation(array("id"=>$this->getRealFileName($_file2))));

		$_file3 = json_decode($file2D['upFile51'], true);
		$file3 = file_exists(getFileLocation(array("id"=>$this->getRealFileName($_file3))));


		$file3D=$this->selectCI("*", "register_sfw_profile_info", array("aNo"=>$aNo), "no desc");
		$file3D = isset($file3D[0]) ? $file3D[0] : array();
		if (empty($file3D)) return "danger";

		$file4 = file_exists(getFileLocation(array("id"=>$file3D['designerIMG_KR_sourceFile'])));
		$file5 = file_exists(getFileLocation(array("id"=>$file3D['designerIMG_KR_sourceFile'])));
		$file6 = file_exists(getFileLocation(array("id"=>$file3D['brandLogoIMG_KR_sourceFile'])));
		$file7 = file_exists(getFileLocation(array("id"=>$file3D['brandLogoIMG_EN_sourceFile'])));

		$fileD=$this->selectCI("*", "register_sfw_portfolio", array("aNo"=>$aNo), "no desc");
		if (empty($fileD)) {
			$chkFile = 'default';
		} else {
			$chkFile = 'default';
			$cntFile = 0;
			$isFile = 0;
			foreach($fileD as $k => $fD) {
				if (!empty($fD['portfolioSourceFile'])) {
					$cntFile++;
					if (file_exists($_SERVER['DOCUMENT_ROOT']."/assets/sitedata/register/sfw/".$season."/".$fD['portfolioSourceFile'])) {
						$isFile++;
					}
				}
			}
			if ($cntFile>$isFile) $chkFile='danger';
			else if ($cntFile==0) $chkFile='default';
			else if ($cntFile==$isFile) $chkFile='success';
			else if ($cntFile>0) $chkFile='info';
		}

		return $chkFile=='success' && $file1 && $file2 && $file3 && $file4 && $file5 && $file6 && $file7? 'success' : 'default';
	}

	function getblind($no, $data) {

		$profileD = $this->selectCI("*", "register_sfw_profile_info", array("aNo"=>$no), "");
		$profileD = isset($profileD[0]) ? $profileD[0] : array();

		$comD = $this->selectCI("*", "register_sfw_company_info", array("aNo"=>$no), "");
		$comD = isset($comD[0]) ? $comD[0] : array();

		$data = nl2br($data);

		$chgWord = "_________ ";

		$profileD['profile_designerNameEN'] = str_replace("/", "", $profileD['profile_designerNameEN']);
		$profileD['profile_designerNameKR'] = str_replace("/", "", $profileD['profile_designerNameKR']);

		$data = preg_replace("/".trim(stripslashes($profileD['profile_brandNameKR']))."/i", $chgWord, $data);
		$data = preg_replace("/".trim(stripslashes($profileD['profile_brandNameEN']))."/i", $chgWord, $data);
		$data = preg_replace("/".trim(stripslashes($profileD['profile_designerNameKR']))."/i", $chgWord, $data);
		$data = preg_replace("/".trim(stripslashes($profileD['profile_designerNameEN']))."/i", $chgWord, $data);

		$data = preg_replace("/".trim(stripslashes($comD['companyNameKR']))."/i", $chgWord, $data);
		$data = preg_replace("/".trim(stripslashes($comD['companyNameEN']))."/i", $chgWord, $data);
		$data = preg_replace("/".trim(stripslashes($comD['brandNameKR']))."/i", $chgWord, $data);
		$data = preg_replace("/".trim(stripslashes($comD['brandNameEN']))."/i", $chgWord, $data);

		$blindWord=explode(",",$profileD['blindWord']);
		if (is_array($blindWord)) {
			foreach($blindWord as $k => $word) {
				if (!empty($word)) {
					if (@preg_replace("/".trim(stripslashes($word))."/i", $chgWord, $data)) {
						$word = str_replace("+", "\+",$word);
						$data = str_replace(trim(stripslashes($word)), $chgWord, $data);
						$data = preg_replace("/".trim(stripslashes($word))."/i", $chgWord, $data);
						$word = str_replace(" ", "", $word);
						$data = preg_replace("/".trim(stripslashes($word))."/i", $chgWord, $data);
					} else {
						$data = str_replace(trim(stripslashes($word)), $chgWord, $data);
					}
				}
			}
		} else {
			if (!empty($word)) {
				$data = preg_replace("/".trim(stripslashes($blindWord))."/i", $chgWord, $data);
				$word = str_replace(" ", "", $word);
				$data = preg_replace("/".trim(stripslashes($word))."/i", $chgWord, $data);
			}
		}

		return $data;

	}


	function portfoiloFileCheck2($aNo, $status, $season='2021FW') {


		$fileD=$this->selectCI("*", "register_sfw_portfolio", array("aNo"=>$aNo), "no desc");
		if (empty($fileD)) {
			$chkFile = 'default';
		} else {
			$chkFile = 'default';
			$cntFile = 0;
			$isFile = 0;
			foreach($fileD as $k => $fD) {
				if (!empty($fD['portfolioSourceFile'])) {
					$cntFile++;
					if (file_exists($_SERVER['DOCUMENT_ROOT']."/assets/sitedata/register/sfwBlind/".$season."/".$fD['portfolioSourceFile'])) {
						$isFile++;
					} else if (file_exists($_SERVER['DOCUMENT_ROOT']."/assets/sitedata/register/sfwBlind/".$season."/".str_replace(".JPG", ".jpg",$fD['portfolioSourceFile']))) {
						$isFile++;
					}
				}
			}
			if ($cntFile>$isFile) $chkFile='danger';
			else if ($cntFile==0) $chkFile='default';
			else if ($cntFile==$isFile) $chkFile='success';
			else if ($cntFile>0) $chkFile='info';
		}

		return $chkFile;
	}

	
	function getLastSeason($dNo) {
		$season = $this->selectCI("no, sName, applyDesigner", "fashion_season", array(), "no desc");
		foreach($season as $kk => $sD) {
			$applyD = explode(",", $sD['applyDesigner']);
			if (in_array($dNo, $applyD)) {
				return $this->getSeasonKey($sD['sName'], "type1");
			}
		}
		return null;
	}

	function removeSpecialC($str, $alterStr="_") {
		$str = preg_replace("/[ #\&\+%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", $alterStr, $str);
		return $str;
	}
	function removeSpecialC2($str, $alterStr="_") {
		$str = preg_replace("/[#\&\+%@=\/\\\:;\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", $alterStr, $str);
		return $str;
	}
	function removeSpecialC3($str, $alterStr="") {
		$str = preg_replace("/[ #\&\+%@=\/\\\:;,'\"\^`~|\!\?\*$#<>()\[\]\{\}]/i", $alterStr, $str);
		return $str;
	}

	function getSeasonKey($key , $returnType) {
		$key = preg_replace("/[ #\&\+%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $key);
		if ($returnType=='type1') return $key;
		else if ($returnType=='type2') return substr($key,0,4)." ".substr($key,4,2);
		else if ($returnType=='type3') return substr($key,0,4)." ".substr($key,4,1)."/".substr($key,5,1);
	}
	function getSeasonNo($key) {
		$key = preg_replace("/[ #\&\+%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $key);
		$sKey = substr($key,0,4)." ".substr($key,4,2);
		$seasonD = $this->selectCI("no", "fashion_season", array("sName"=>$sKey), "");
		$sNo = isset($seasonD[0]) ? $seasonD[0]['no'] : 21;
		return $sNo;
	}

	function currentSeason() {
		if (date("W")<=12 ) {
			return array("key"=>date("Y")."FW","key2"=>date("Y")." FW", "key3"=>date("Y")." F/W");
		} else if (date("W")>12 && date("W")<=50 ) {
			return array("key"=>date("Y", strtotime("+1 year"))."SS","key2"=>date("Y", strtotime("+1 year"))." SS", "key3"=>date("Y", strtotime("+1 year"))." S/S");
		} else if (date("W")>50 ) {
			return array("key"=>date("Y", strtotime("+1 year"))."FW","key2"=>date("Y", strtotime("+1 year"))." FW", "key3"=>date("Y", strtotime("+1 year"))." F/W");
		}
	}

	function chgImgSrc($contents) {
		$contents = preg_replace("/src=[\"']?([^>\"']+)[\"']/i", "src='http://www.seoulfashionweek.org$1'", $contents);

		return $contents;
	}

	function getMainSlide($mainType, $season) {

		if (empty($mainType)) return "";

		$html = '';


		switch($mainType) {

			case "notice" :
				$html .= "<h4>표시될 공지사항 선택</h4>";
				$html .= "<div class='divShowNotice'>";
				$listNotice = $this->CI->cbconfig->item($season."_main_notice");
				$listNotice = explode(",", $listNotice);
				$bbsD = $this->selectQuery(" select * from sfw_post order by post_id desc limit 0,50 "); // where `brd_id` in ('10','12' ,'13' )
				foreach($bbsD as $k => $bD) {
					$checked = in_array($bD['post_id'],$listNotice) ? "checked" : "";
					$html .= "<div class='row'>";
					$html .= "<p class='col-sm-8'><label> <input type='checkbox' class='chkBoxBBS' value='".$bD['post_id']."' ".$checked."> >> ".$bD['post_title']."</label></p>";
					$html .= "<p class='col-sm-4 text-right'>".substr($bD['post_datetime'],0,10)."</p>";
					$html .= "</div>";

				}
				$html .= "</div>";
				$html .= "<p class='btn btn-success per100' onclick='fnSaveBBS();'> 저장 </p>";
			break;

			case "schedule" :

				$stPeriod = $this->CI->cbconfig->item($season."_schedule_title_period");
				$seasonD = $this->selectCI("*", "fashion_season", array("sName"=>$this->getSeasonKey($season, "type2")), "no desc");
				$seasonD = isset($seasonD[0]) ? $seasonD[0] : array();

				$html .= "<h4>스케줄 기간 표시</h4><br>";
				$html .= "<div class='divShowSchedule'>";
				$html .= "<div class='input-group'>";
				$html .= "<p class='input-group-addon'>SFW 기간 표시</p>";
				$html .= "<input type='text' class='form-control' name='sPeriod' id='sPeriod' value='".str_replace("-",".", $seasonD['sStartDay'])."'>";
				$html .= "<p class='input-group-addon'> - </p>";
				$html .= "<input type='text' class='form-control' name='ePeriod' id='ePeriod' value='".str_replace("-",".", $seasonD['sEndDay'])."'>";
				$html .= "<span class='input-group-btn'>";
				$html .= "<button class='btn btn-success btn-sm' onclick='fnSavePeriod()'>저장</button>";
				$html .= "</span>";
				$html .= "</div>";
				$html .= "<p>※ ".date("Y.m.d")." - ".date("Y.m.d", strtotime("+5day"))." 형식으로 입력하여 주세요</p>";
				$html .= "<hr>";

				$hallName = $this->CI->cbconfig->item($season."_hall_name");
				$hallName = $seasonD['infoHall'];
				$hallName = json_decode($hallName, true);
				$html .= "<h4>Hall Name 설정</h4><br>";
				$html .= "<div class='input-group'>";
				$html .= "<p class='input-group-addon'>Hall 1</p>";
				$html .= "<textarea row='2' class='form-control' name='hallName1' id='hallName1' style='resize:none'>".element('hall1', $hallName)."</textarea>";
				$html .= "</div>";
				$html .= "<div class='input-group'>";
				$html .= "<p class='input-group-addon'>Hall 2</p>";
				$html .= "<textarea row='2' class='form-control' name='hallName2' id='hallName2' style='resize:none'>".element('hall2', $hallName)."</textarea>";
				$html .= "</div>";
				$html .= "<div class='input-group'>";
				$html .= "<p class='input-group-addon'>Hall 3</p>";
				$html .= "<textarea row='2' class='form-control' name='hallName3' id='hallName3' style='resize:none'>".element('hall3', $hallName)."</textarea>";
				$html .= "</div>";
				$html .= "<div class='input-group'>";
				$html .= "<p class='input-group-addon'>Hall 4</p>";
				$html .= "<textarea row='2' class='form-control' name='hallName4' id='hallName4' style='resize:none'>".element('hall4', $hallName)."</textarea>";
				$html .= "</div>";
				$html .= "<div class='input-group'>";
				$html .= "<p class='input-group-addon'>Hall 5</p>";
				$html .= "<textarea row='2' class='form-control' name='hallName5' id='hallName5' style='resize:none'>".element('hall5', $hallName)."</textarea>";
				$html .= "</div>";
				$html .= "<button class='btn btn-success btn-sm' onclick='fnSaveHall()' style='width:100%;'>저장</button><hr>";

				$html .= "<h4>스케줄 상세 설정</h4><br>";
				$html .= "<button class='btn btn-info per100' onclick=\" location = '/admin/site/schedule/'; \">스케줄 관리 이동</button>";
				$html .= "</div>";
			break;

			case "slide" :
				$html .= "<h4>슬라이드 설정</h4><br>";
				$html .= "<div class='divShowSchedule'>";
				$html .= "<div class='input-group'>";
				$html .= "<p class='input-group-addon'>영상 파일 업로드</p>";
				$html .= "<input type='file' class='form-control' name='mainMovie' id='hallName4' style='resize:none'>";
				$html .= "</div>";


				$html .= "</div>";
			break;


			case "socialhub" :
				$cnt = $this->CI->cbconfig->item($season."_socialhub_cnt");
				$cnt = $cnt > 0 ? $cnt : 20;
				$socialhubD =  $this->selectQuery("select * from sfw_socialhub order by `no` desc limit 0,".$cnt);
				$html .= "<h4>소셜허브 설정</h4><br>";
				$html .= "<div class='divShowSocialhub'>";
				$html .= "<div class='input-group'>";
				$html .= "<p class='input-group-addon'>표시 갯수 설정</p>";
				$html .= "<input type='text' class='form-control' name='cntSocialHub' id='cntSocialHub' value='".$cnt."'>";
				$html .= "<p class='input-group-addon'> / </p>";
				$html .= "<input type='text' class='form-control' readonly value='".count($socialhubD)."'>";
				$html .= "<span class='input-group-btn'>";
				$html .= "<button class='btn btn-success btn-sm' onclick='fnSocialHubCnt()'>저장</button>";
				$html .= "</span>";
				$html .= "</div>";
				$html .= "</div>";


				$html .= "<h4>표시될 소셜 허브 설정</h4><br>";
				$html .= "<div class='divShowSchedule'>";
				$html .= "<div class='owl-carousel owl-theme' id='highLights'>";
				if (count($socialhubD)>0) {
					foreach($socialhubD as $k => $sD) { 
						$html .= '<div class="itemWrap card">';
						$html .= "표시 여부 설정 _";
						$isUse = $sD['isUse'] == 'Y' ? 'checked' : '';
						$html .= "<input type='checkbox' value='".$sD['no']."' onclick='fnSocialUse(this, this.value)' $isUse>";
						$html .= '<div class="item" style="background:url(\'/uploads/socialhub/'.$sD['sPhoto'].'\') no-repeat center center;background-size:cover;width:313px;height:313px;">';
						//$html .= '<div class="itemOver">';
						//$html .= '<p class="overBrandEn">'.$sD['brandEn'].'</p>';
						//$html .= '<p class="overDesignerEn">'.$sD['designerEn'].'</p>';
						//$html .= '</div>';
						$html .= '</div>';
						$html .= '<p class="brandEn" style="width:313px;height:200px;overflow-y:auto;padding:20px;">'.$sD['sExplain'].'</p>';
						//$html .= '<p class="designerEn">'.$sD['designerEn'].'</p>';
						$html .= '</div>';
					}
				}
				$html .= "</div>";
				$html .= "</div>";

			break;


			case "highlights" :

			$designerList = $this->getDesignerData($season);
				$html .= "<h4>하이라이트 설정</h4><br>";
				$html .= "<div class='divShowSchedule'>";
				$html .= "<div class='owl-carousel owl-theme' id='highLights'>";
				if (count($designerList)>0) {
					foreach($designerList as $k => $dD) { 
						$html .= "<div class='divDesigner'><img class='owl-lazy' data-src='/data/file/showcollection/".$dD['collectionIMG']."'><div class='titHighlight'>".($k+1).". ".$dD['brandEn']." <hr style='margin:0px;'><label class='btn btn-xs btn-info pull-right'><input type='checkbox' name='designerHighlight' value='".$dD['no']."' onclick='fnHighLightUse(this, ".$dD['no'].")'> 사용여부</label></div></div>";
					}
				}
				$html .= "</div>";
				$html .= "</div>";
				//$html .= $sql;
			break;

			case "designers" :

			$designerList = $this->getDesignerData($season);
				$html .= "<h4>디자이너 설정</h4><br>";
				$html .= "<div class='divShowSchedule'>";
				$html .= "<div class='owl-carousel owl-theme' id='highLights'>";
				if (count($designerList)>0) {
					foreach($designerList as $k => $dD) { 
						$isCheck = $dD['isOpen'] == 'Y' ? 'checked' : '';
						$html .= '<div class="itemWrap">';
						$html .= '<div class="item" style="background:url(\'/data/file/showcollection/'.$dD['collectionIMG'].'\') no-repeat center center;background-size:cover;width:313px;height:513px;">';
						//$html .= '<div class="itemOver">';
						//$html .= '<p class="overBrandEn">'.$dD['brandEn'].'</p>';
						//$html .= '<p class="overDesignerEn">'.$dD['designerEn'].'</p>';
						//$html .= '</div>';
						$html .= '</div>';
						$html .= '<p class="brandEn">'.$dD['brandEn'].'</p>';
						$html .= '<p class="designerEn">'.$dD['designerEn'].'</p>';
						$html .= "<label class='btn btn-xs btn-info pull-right'><input type='checkbox' name='designers' value='".$dD['no']."'  onclick='fnDesignerUse(this, ".$dD['no'].")' ".$isCheck."> 사용여부</label>";
						$html .= '</div>';
					}
				}
				$html .= "</div>";
				$html .= "</div>";
				//$html .= $sql;
			break;


			default :

			break;

		}

		return $html;
	}

	function getHighLightData($season) {
		$sKey = substr($season, 0, 4)." ".substr($season, 4, 2);
		$sKey = $this->getSeasonKey($season , 'type2');
		$seasonD = $this->selectQuery("select no, applyDesigner from sfw_fashion_season where sName = '".$sKey."' ");
		$dKey = isset($seasonD[0]) ? $seasonD[0]['applyDesigner'] : null;
		$sNo = isset($seasonD[0]) ? $seasonD[0]['no'] : null;
		//$dKey = explode(",",$dKey);
		//$dKey = implode("','",$dKey);
		$sql = "select no, brandEn, ( select sourceFile from sfw_fashion_showcollection as c where c.dNo = d.no and c.sNo = '".$sNo."'  order by collectionNo asc limit 0,1 ) as img from sfw_fashion_designer as d where no in (".$dKey.") order by no desc";
		
		if ($dKey) {
			return $this->selectQuery($sql);
		} else {
			return array();
		}
	}
	function getDesignerData($season) {
		$sKey = substr($season, 0, 4)." ".substr($season, 4, 2);
		$sKey = $this->getSeasonKey($season , 'type2');
		$sNo = $this->getSeasonNo($season);
		$seasonD = $this->selectQuery("select no, applyDesigner from sfw_fashion_season where sName = '".$sKey."' ");
		$dKey = !empty($seasonD[0]['applyDesigner']) ? $seasonD[0]['applyDesigner'] : null;

		if ($dKey==null) {
			$seasonD = $this->selectQuery("select no, applyDesigner from sfw_fashion_season where applyDesigner != '' order by no desc limit 0,1 ");
			$dKey =  $seasonD[0]['applyDesigner'];
		}
		$sNo = isset($seasonD[0]) ? $seasonD[0]['no'] : null;
		//$dKey = explode(",",$dKey);
		//$dKey = implode("','",$dKey);
		$orderby = isset($_SESSION['orderby']) ? $_SESSION['orderby'] : "rand()";
		$isAll = isset($_SESSION['isAll']) ? '' : "AND `isOpen` = 'Y'";

		$sql = "
			SELECT 
				no, brandEn, designerEn, dPic, isOpen, /* collectionIMG */
				( SELECT `sourceFile` FROM `sfw_fashion_showcollection` AS C where C.dNo = D.no and C.sNo = '".$sNo."'  order by collectionNo asc limit 0,1 ) as collectionIMG
			FROM
				`sfw_fashion_designer` as D
			WHERE
				`no` IN (".$dKey.")
			$isAll
			ORDER BY ".$orderby." ASC";// `brandEn`


		if ($dKey) {
			$data = $this->selectQuery($sql);
			foreach($data as $k => $d) { 
				$data[$k]['lastSeason'] = $this->getLastSeason($d['no']);
			}
			return $data;
		} else {
			return array();
		}
	}

	function getCateName($ca_id) {
		$cateD = $this->selectCI("*", "sy_menu",array("ca_id"=>$ca_id),'ca_id desc');
		return (isset($cateD[0]['ca_name_ko'])) ? $cateD[0]['ca_name_ko'] : "";
	}

	function makeEncodeURL($url,$no='') {
		$url = strtolower($url);
		$url = str_replace(" ","",$url);
		$url = html_entity_decode($url);
		$url = preg_replace("/[ #\&\+%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "_", $url);
		if ($no!='') {
			$url .="_".$no;
		}
		return $url;
	}

	// 디자이너 리스트에 표시되지 않는 모든 콜렉션 리스트 가져오기 위함 2019-04-01
	public function dList2($where='', $config=array(),$type='noIMG') {
		$sSQL = "select * from sfw_fashion_designer ";
		if ($where) {
			$sSQL .= $where;
			//$sSQL .= " and isOpen = 'Y' ";
		} else {
			//$sSQL .= " where isOpen = 'Y' ";
		}
		$sSQL .= "order by  if(ASCII(SUBSTRING(LOWER(brandEn), 1)) < 64, 2, 1) , binary(LOWER(brandEn)) asc ";
		/*
		if (isset($config['off_set']) && $config['per_page']) {
			$sSQL .= " limit ".$config['off_set']." , ".$config['per_page'];
		}
		*/
		$designerList = $this->CI->db->query($sSQL)->result_array();
		foreach($designerList as $dK => $dV ) {
			// 디자이너명 변경
			$designerList[$dK]['subjectLink'] = $this->makeEchoName($designerList[$dK]['brandEn']);
			$designerList[$dK]['nameToNo'] = $dV['no'];
			// 파일 Data 로딩
			if ($type=='showIMG') {
				$designerList[$dK]['fileD'] = $this->getProfileIMG($dV['no'],$config['seasonNo']);
			}
		}
		return $designerList;
	}
	// Collection LIST
	public function cList($where='') {

		$sSQL = "select * from sfw_fashion_showcollection ";
		if ($where) $sSQL .= $where;
		$sSQL .= "order by no desc ";
		$collectionList = $this->CI->db->query($sSQL)->result_array();

		return $collectionList;
	}
	// 페이징 처리된 리스트
	public function dList($where='', $config=array(),$type='noIMG') {
		$sSQL = "select * from sfw_fashion_designer ";
		if ($where) {
			$sSQL .= $where;
			$sSQL .= " and isOpen = 'Y' ";
		} else {
			$sSQL .= " where isOpen = 'Y' ";
		}
		$sSQL .= "order by  if(ASCII(SUBSTRING(LOWER(brandEn), 1)) < 64, 2, 1) , binary(LOWER(brandEn)) asc ";
		/*
		if (isset($config['off_set']) && $config['per_page']) {
			$sSQL .= " limit ".$config['off_set']." , ".$config['per_page'];
		}
		*/
		$designerList = $this->CI->db->query($sSQL)->result_array();
		foreach($designerList as $dK => $dV ) {
			// 디자이너명 변경
			$designerList[$dK]['subjectLink'] = $this->makeEchoName($designerList[$dK]['brandEn']);
			$designerList[$dK]['nameToNo'] = $dV['no'];
			// 파일 Data 로딩
			if ($type=='showIMG') {
				$designerList[$dK]['fileD'] = $this->getProfileIMG($dV['no'],$config['seasonNo']);
			}
		}
		return $designerList;
	}
	// 시즌 값
	public function getAllList() {
		$season = $this->getDB("fashion_season","*",array("isUse"=>"Y"),"no desc");
		foreach($season as $k => $sV) {
			$sV['applyDesigner'] = strlen($sV['applyDesigner']) > 0 ? $sV['applyDesigner'] : 0;
			$season[$k]['designerD'] = $this->dList2(" WHERE no IN (".$sV['applyDesigner'].")", array('seasonNo'=>$sV['no']),'showIMG');
		}
		return $season;
	}

	public function getDB($db,$field='*',$where=array(),$orderby='') {
		$this->CI->db->select($field);
		if (count($where)>0) $this->CI->db->where($where);
		if ($orderby) $this->CI->db->order_by($orderby);
		$data = $this->CI->db->get($db)->result_array();
		return $data;
	}
	private function getProfileIMG($dNo,$sNo='0') {
		if ($sNo=='0') $sNo=$this->getLastSno($dNo);

		$tempD = $this->getIndexFile($sNo,$dNo,'0');
		return $tempD;
	}

	private function getIndexFile($sNo,$dNo,$idx='0') {
		$returnData = array();
		$where = array();
		$where['dNo']=$dNo;
		//if ($sNo)
		$where['sNo']=$sNo;
		$tempD = $this->getDB( "fashion_showcollection" , "*" ,$where, 'no asc' );
		foreach($tempD as $k => $v) {
			if ($v['sourceFile']!='') {
				$returnData[] = $v;
			}
		}
		return isset($returnData[$idx]) ? $returnData[$idx] : "";
	}
	public function makeEchoName($name) {
		$name = str_replace("&","§",$name);
		$name = str_replace("*","⊙",$name);
		$name = str_replace(",","∧",$name);
		$name = str_replace(" ","_",$name);
		$name = str_replace("'","‘",$name);
		$name = str_replace("/","│",$name);
		$name = str_replace("(","◀",$name);
		$name = str_replace(")","▶",$name);
		return $name;
	}
	public function getRealName($name) {
		$name = str_replace("§","&",$name);
		$name = str_replace("⊙","*",$name);
		$name = str_replace("∧",",",$name);
		$name = str_replace("_"," ",$name);
		$name = str_replace("‘","'",$name);
		$name = str_replace("│","/",$name);
		$name = str_replace("◀","(",$name);
		$name = str_replace("▶",")",$name);
		$name = ($name=='gu de') ? 'gu_de' : $name;
		return $name;
	}
	function fileUp($path,$key, $ext='png|gif|jpg|jpeg|png|ppt|pptx|doc|docx|xls|xlsx|hwp|pdf|zip|webp') {
		global $_FILES;
		if (!isset($_FILES[$key])) return  array('file_name'=>'', 'client_name'=>'', 'error_msg'=>"No Upload");
		if ($_FILES[$key]['size']<0) return  array('file_name'=>'', 'client_name'=>'', 'error_msg'=>"No Size");
		// 사진 삭제시
		if (!empty($_POST['del_'.$key])) {
			@unlink($path.$_POST['del_'.$key]);
		}
		// 사진 업로드
		$config['upload_path'] = $path;
		$config['allowed_types'] = $ext;
		$config['max_size'] = '0';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		$config['overwrite'] = true;
		$config['encrypt_name'] = true;
		$this->CI->load->library('upload', $config);
		if ($this->CI->upload->do_upload($key)) {
			$imgData = $this->CI->upload->data();
		} else{
			$error_msg = $this->CI->upload->display_errors();
			$imgData = array('file_name'=>'', 'client_name'=>'', 'error_msg'=>$error_msg);
		}
		return $imgData;
	}


	function makeForm($formName,$arrayForm,$data) {
		$preTitle = "";
		$html = "<h2 class='clearB'>".$formName."</h2>\n";
		foreach($arrayForm as $k => $form) {
			$addClass = "";
			$fieldData = isset($data[$form['dbField']]) ? $data[$form['dbField']] : "";
			$addClass .= isset($form['fWidth']) ? " ".$form['fWidth']." " : "";
			$addScript = isset($form['fScript']) ? " ".$form['fScript']." " : "";
			$form['fCategory'] = isset($form['fCategory']) ? $form['fCategory'] : "";

			if ($form['fType'] == 'division') : // 구분자일 경우
				$html .= "<div class='form-group'><br class='clearfix'>";
				$html .= "	<h4>".$form['title']."</h4>";
				$html .= "</div>";
			endif;

			if ($form['fType'] == 'text') : // 텍스트일 경우
				$addClass .= !empty($form['classname']) ? " ".$form['classname']." " : "";
				$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
				$html .= $preTitle != $form['fCategory'] ? "<h2>".$form['fCategory']."</h2>\n" : "";
				$html .= "	<label for='".$form['dbField']."'>".$form['title']."</label>\n";
				$html .= "	<input type='text' class='form-control ".$addClass."' id='".$form['dbField']."' name='".$form['dbField']."' placeholder='".$form['title']."을(를) 입력하세요' value='".$fieldData."' ".$addScript." />\n";
				if (isset($form['fGuide'])) $html.= $form['fGuide'];
				$html .= "</div>\n";
			endif;
			if ($form['fType'] == 'password') : // 텍스트일 경우
				$addClass .= !empty($form['classname']) ? " ".$form['classname']." " : "";
				$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
				$html .= $preTitle != $form['fCategory'] ? "<h2>".$form['fCategory']."</h2>\n" : "";
				$html .= "	<label for='".$form['dbField']."'>".$form['title']."</label>\n";
				$html .= "	<input type='password' class='form-control ".$addClass."' id='".$form['dbField']."' name='".$form['dbField']."' placeholder='".$form['title']."을(를) 입력하세요' value='".$fieldData."' ".$addScript." />\n";
				if (isset($form['fGuide'])) $html.= $form['fGuide'];
				$html .= "</div>\n";
			endif;

			if ($form['fType'] == 'file') : // 첨부파일일 경우
				$addClass .= !empty($form['classname']) ? " ".$form['classname']." " : "";
				$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
				$html .= $preTitle != $form['fCategory'] ? "<h2>".$form['fCategory']."</h2>\n" : "";
				$html .= "	<label for='".$form['dbField']."'>".$form['title']."</label>\n";
				$html .= "	<input type='file' class='form-control ".$addClass."' id='".$form['dbField']."' name='".$form['dbField']."' placeholder='".$form['title']."' value='".$fieldData."'>\n";
				if (isset($data[$form['dbField']])) {
				$html .= "	<input type='checkbox' id='del_".$form['dbField']."' name='del_".$form['dbField']."' value='".$fieldData."'> 삭제 ".$fieldData;
				}
				if (isset($form['fGuide'])) $html.= $form['fGuide'];
				$html .= "</div>";
			endif;

			if ($form['fType'] == 'radio') : // 라디오박스
				$isCheck = $fieldData == 'Y' ? "checked" : "";
				$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
				$html .= $preTitle != $form['fCategory'] ? "<h2>".$form['fCategory']."</h2>\n" : "";
				$html .= "	<label for='".$form['dbField']."'>".$form['title']."</label>\n";
				if (isset($form['fSelect']) && is_array($form['fSelect'])) {
					$html .= "<div class='roundBorder height40'>\n";
					foreach($form['fSelect'] as $sK => $sV) {
						$isCheck2 = strpos($fieldData,$sV) !== false ? "checked" : "";
						$html .= "	<div class='floatL padd10' style='width:".(100/count($form['fSelect']))."%'><label><input type='radio' class='formChkBox' id='".$form['dbField'].$sK."' name='".$form['dbField']."' value='$sV' $isCheck2 /> ".$sV."</label></div>\n";
					}
					$html .= "</div>\n";
				} else {
					$html .= "	<input type='radio' class='formChkBox' id='".$form['dbField']."' name='".$form['dbField']."' placeholder='".$form['title']."' value='Y' $isCheck />\n";
				}
				$html .= "</div>\n";
			endif;

			if ($form['fType'] == 'checkbox') : // 체크박스
				$isCheck = $fieldData == 'Y' ? "checked" : "";
				$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
				$html .= $preTitle != $form['fCategory'] ? "<h2>".$form['fCategory']."</h2>\n" : "";
				$html .= "	<label for='".$form['dbField']."'>".$form['title']."</label>\n";
				if (isset($form['fSelect']) && is_array($form['fSelect'])) {
					$html .= "<div class='roundBorder height40'>\n";
					foreach($form['fSelect'] as $sK => $sV) {
						$isCheck2 = strpos($fieldData,$sV) !== false ? "checked" : "";
						$html .= "	<div class='floatL padd10' style='width:".(100/count($form['fSelect']))."%'><label><input type='checkbox' class='formChkBox' id='".$form['dbField'].$sK."' name='".$form['dbField']."[]' value='$sV' $isCheck2  /> ".$sV."</label></div>\n";
					}
					$html .= "</div>";
				} else {
					$html .= "	<input type='checkbox' class='formChkBox' id='".$form['dbField']."' name='".$form['dbField']."' placeholder='".$form['title']."' value='Y' $isCheck />\n";
				}
				$html .= "</div>\n";
			endif;

			if ($form['fType'] == 'select') : // 셀렉트박스
				$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
				$html .= $preTitle != $form['fCategory'] ? "<h2>".$form['fCategory']."</h2>\n" : "";
				$html .= "	<label for='".$form['dbField']."'>".$form['title']."</label>\n";
				if (isset($form['fSelect']) && is_array($form['fSelect'])) {
					$html .= "	<select class='form-control ".$addClass."' id='".$form['dbField']."' name='".$form['dbField']."'>\n";
					$html .= "		<option value=''>선택하세요</option>\n";
					foreach($form['fSelect'] as $sK => $sV) {
						$html .= "		<option value='".$sK."'>".$sV."</option>\n";
					}
					$html .= "		</select>\n";
				}
				$html .= "<script> $('#".$form['dbField']."').val('".$fieldData."'); </script>\n";
				$html .= "</div>\n";
			endif;

			if ($form['fType'] == 'textarea') : // 텍스트박스
				$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
				$html .= $preTitle != $form['fCategory'] ? "<h2>".$form['fCategory']."</h2>\n" : "";
				$html .= "	<label for='".$form['dbField']."'>".$form['title']."</label>\n";
				$html .= "	<textarea id='".$form['dbField']."' name='".$form['dbField']."' class='form-control fTextArea' placeholder='".$form['title']."을(를) 입력하세요'>".$fieldData."</textarea>\n";
				$html .= "</div>\n";
			endif;

			if ($form['fType'] == 'address') : // 주소
				$preFix = isset($form['prefix']) ? $form['prefix'] : 's';
				$sZip = isset($data[$preFix.'Zip']) ? $data[$preFix.'Zip'] : "";
				$sAddr1 = isset($data[$preFix.'Addr1']) ? $data[$preFix.'Addr1'] : "";
				$sAddr1En = isset($data[$preFix.'Addr1En']) ? $data[$preFix.'Addr1En'] : "";
				$sAddr2 = isset($data[$preFix.'Addr2']) ? $data[$preFix.'Addr2'] : "";
				$sAddr2En = isset($data[$preFix.'Addr2En']) ? $data[$preFix.'Addr2En'] : "";
				$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
				$html .= "<label for='".$form['dbField']."'>".$form['title']."</label>";
				$html .= "<div class='input-group width30'>";
				$html .= "	<input type='text' class='form-control' name='".$preFix."Zip' id='".$preFix."Zip' readonly value='".$sZip."'>";
				$html .= "	<div class='input-group-addon btn btn-default' onclick=\"daumZipcode('".$preFix."')\">우편번호검색</div>";
				$html .= "</div>";
				$html .= "	<input type='text' class='form-control' id='".$preFix."Addr1' name='".$preFix."Addr1' value='".$sAddr1."' readonly>";
				$html .= "	<input type='text' class='form-control' id='".$preFix."Addr1En' name='".$preFix."Addr1En' value='".$sAddr1En."' readonly>";
				$html .= "	<input type='text' class='form-control' name='".$preFix."Addr2' value='".$sAddr2."' placeholder='상세주소'>";
				$html .= "	<input type='text' class='form-control' name='".$preFix."Addr2En' value='".$sAddr2En."' placeholder='영문상세주소'><span id='".$preFix."Guide'></span>";
				$html .= "</div>";
			endif;

			if ($form['fType']=='multifile') :
				$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
				$html .= $preTitle != $form['fCategory'] ? "<h2>".$form['fCategory']."</h2>\n" : "";
				$html .= "	<label for='".$form['dbField']."'>".$form['title']."</label>\n";

				$html .= "
<div id='uploader_".$form['dbField']."'>
    <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
</div>

<script type='text/javascript'>
var isAllUploaded_".$form['dbField']." = true;
$(function() {
    $('#uploader_".$form['dbField']."').plupload({
        runtimes : 'html5,flash,silverlight,html4',
        url : '/adm/site/product/plupload/',
        max_file_size : '2000mb',
        chunk_size: '1mb',
        filters : [
            {title : 'Image files', extensions : 'jpg,gif,png'}
        ],
        rename: true,
        unique_names:true,
        sortable: true,
        dragdrop: true,
        prevent_duplicates: true,
        multi_selection: true,
        file_data_name:'file',
        views: {
            list: true,
            thumbs: true,
            active: 'thumbs'
        },
        flash_swf_url : '/js/plupload/Moxie.swf',
        silverlight_xap_url : '/js/plupload/Moxie.xap',
        init : {
            FilesAdded: function(up, files) {
                isAllUploaded_".$form['dbField']." = false;
            },
            UploadComplete: function(up, files) {
                // Called when all files are either uploaded or failed
                isAllUploaded_".$form['dbField']." = true;
            }
		}
    });
});
</script>
";
				$html .= "</div>\n";

				// 기존 등록 내용 출력
				if (isset($data['no'])) {
					$picD = $this->selectCI("*","sy_product_gallery",array("pNo"=>$data['no'],"gType"=>$form['dbField']),"rank desc");
					if(count($picD)>0) {
						$html .= "<div class='col-xs-12 col-sm-".$form['fSize']."'>\n";
						$html .= "<label for='".$form['dbField']."'>".$form['title']." 등록 사진 관리</label>\n";
						$html .= "<ul class='pGallery'>\n";
						foreach($picD as $k => $pD) {
							$html .= "<li class='col-sm-3 col-xs-12'><img src='/data/file/product/".$pD['realName']."'>
							<p class='pull-left'>".$pD['echoName']."</p>
							<p class='pull-right btn btn-xs btn-primary' data-toggle='modal' data-target='#myModal' onclick=\"setModifyForm('".$pD['no']."', '".$pD['realName']."','".$pD['echoName']."','".$pD['rank']."')\">관리</p>\n
							</li>\n";
						}
						$html .= "</ul>\n";
						$html .= "</div>\n";
					}
				}


			endif;
			$preTitle = $form['fCategory'];
		} // end foreach //

		return $html;
	}

	function selectCI($column,$dbTable,$where,$orderBy='no desc') {
		$this->CI->db->select($column);
		$this->CI->db->order_by($orderBy);
		foreach($where as $k => $v) {
			if (is_array($v)) {
				$this->CI->db->where_in($k,$v);
			} else {
				$this->CI->db->where(array($k=>$v));
			}
		}
		$qry = $this->CI->db->get($dbTable);

		return $qry->result_array();
	}
	function singleData($data){
		return isset($data[0]) ? $data[0] : array();
	}

	function selectQuery($sql){
		$qry = $this->CI->db->query($sql);
		return $qry->result_array();
	}
	function nSelect($config){
		if (empty($config)) return null;
		// Select Field Set
		if (isset($config['column'])) {
			$this->CI->db->select($config['column']);
		} else {
			$this->CI->db->select("*");
		}
		// Order By Set
		if (isset($config['orderby'])) {
			$this->CI->db->order_by($config['orderby']);
		}
		// Where Set
		if (isset($config['where']) && is_array($config['where'])) {
			$this->CI->db->where($config['where']);
		}
		// Where IN Set
		if (isset($config['wherein']) && is_array($config['wherein'])) {
			$this->CI->db->where_in($config['wherein'][0],$config['wherein'][1]);
		}
		// Limit Set
		if (isset($config['limit']) && is_array($config['limit'])) {
			$this->CI->db->limit($config['limit']['count'],$config['limit']['offset']);
		}
		// Get From DB Table
		if (isset($config['dbTable'])) {
			$qry = $this->CI->db->get($config['dbTable']);
			return $qry->result_array();
		} else {
			return null;
		}
	}
	function dbUpdate($dbTable,$upArray,$where){
		$this->CI->db->where($where);
		return $this->CI->db->update($dbTable, $upArray);
	}
	function dbDelete($dbTable,$where){
		if (is_array($where)) {
			return $this->CI->db->delete($dbTable, $where);
		}
	}
	function dbInsert($dbTable,$inArray){
		$this->CI->db->insert($dbTable, $inArray);
		return $this->CI->db->insert_id();
	}

	// 현재페이지,총페이지수,한페이지에 보여줄 목록수,URL
	function pagelisting($cur_page, $total_page, $n, $url) {
	  $retValue = "<ul class='pageUL'>";
	  if ($cur_page > 1) {
		$retValue .= "<li><a href='" . $url . "1'><font color=918F8F><i class='fa fa-angle-double-left'></i></font></a></li>";
		$retValue .= "<li><a href='" . $url . ($cur_page-1) . "'><font color=918F8F><i class='fa fa-angle-left'></i></font></a></li>";
	  }
	  $start_page = ( ( (int)( ($cur_page - 1 ) / 6 ) ) * 6 ) + 1;
	  //echo (int)(($cur_page - 1) / 10);
	  $end_page = $start_page + 5;
	  if ($end_page >= $total_page) $end_page = $total_page;
	  if ($start_page > 1) $retValue .= "<li><a href='" . $url . ($start_page-1) . "'>...</a></li>";
	  if ($total_page > 1)
		for ($k=$start_page;$k<=$end_page;$k++)
		  if ($cur_page != $k) $retValue .= "<li><a href='$url$k'><font color=918F8F>$k</font></a></li>";
		  else $retValue .= "<li class='on'><b><font color=918F8F>$k</font></b></li>";
	  if ($total_page > $end_page) $retValue .= "<li><a href='" . $url . ($end_page+1) . "'>...</a></li>";

	  if ($cur_page < $total_page) {
		$retValue .= "<li><a href='$url" . ($cur_page+1) . "'><font color=918F8F><i class='fa fa-angle-right'></i></font></a></li>";
		$retValue .= "<li><a href='$url$total_page'><font color=918F8F><i class='fa fa-angle-double-right'></i></font></a></li>";
	  }
	  $retValue .= "</ul>";
	  return $retValue;
	}

	// 게시판 첫번째 이미지 로딩
	public function getFirstIMG($bo_table,$wr_id){
		$where['bo_table'] = $bo_table;
		$where['wr_id'] = $wr_id;
		$where['bf_no'] = 0;
		$return = $this->selectCI("*","ki_board_file",$where,$orderBy='wr_id desc');
		return (is_array($return)) ? $return : array();
	}
	// 콜렉션 첫번째 이미지 로딩
	public function getFirstCollectionIMG($no){
		$return = $this->selectQuery("SELECT `sourceFile`, `openDate` FROM `sfw_fashion_showcollection` where dNo = '".$no."' order by sNo desc, collectionNo asc  limit 0,1");
		return (isset($return[0])) ? $return[0] : array();
	}



	// 이미지 저장
	public function save_remote_image($url, $dir, $dir2='') {
		$filename = '';

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_NOBODY, true);

		curl_exec ($ch);

		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		if($http_code == 200) {
			$filename = basename($url);
			if(preg_match("/\.(gif|jpg|jpeg|png)$/i", $filename)) {
				$tmpname = date('YmdHis').(microtime(true) * 10000);
				$tmpname = $filename;
				$filepath = $dir;
				if ($dir2!='') @mkdir($dir2, '0755');
				@mkdir($filepath, '0755');

				@chmod($filepath, '0755');

				// 파일 다운로드
				$path = $filepath.'/'.$tmpname;
				$fp = @fopen ($path, 'w+');
				if (!empty($fp)) {
					$ch = curl_init();
					curl_setopt( $ch, CURLOPT_URL, $url );
					curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
					curl_setopt( $ch, CURLOPT_BINARYTRANSFER, true );
					curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
					curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 20 );
					curl_setopt( $ch, CURLOPT_FILE, $fp );
					curl_exec( $ch );
					curl_close( $ch );
					fclose( $fp );

					// 다운로드 파일이 이미지인지 체크
					if(is_file($path)) {
						$size = @getimagesize($path);
						if($size[2] < 1 || $size[2] > 3) {
							@unlink($path);
							$filename = '';
						} else {
							$ext = array(1=>'gif', 2=>'jpg', 3=>'png');
							//$filename = $tmpname.'.'.$ext[$size[2]];
							rename($path, $filepath.$filename);
							chmod($filepath.'/'.$filename, '0707');
						}
					}
				}
			}
		}

		return $filename;
	}

}

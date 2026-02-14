<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * EvalResult class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>EvalResult controller 입니다.
 */
class EvalResult extends CB_Controller
{
	public $step2;
	public $year;
	public $times;
	/**
	 * 관리자 페이지 상의 현재 디렉토리입니다
	 * 페이지 이동시 필요한 정보입니다
	 */
	public $pagedir = 'evaluation/evalResult';

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

		if (!($_SERVER['REMOTE_ADDR']=='192.168.0.1')) {
			//alert("추가 작업중입니다.");
		}
		$this->year = 2024;
		$this->times = 1;
	}

	/**
	 * 목록을 가져오는 메소드입니다
	 */
	public function index() {

		$view = array();
		$view['view'] = array();


		$where = array();


		$this->year = $view['year'] = 2024;
		$this->times = $view['times'] = 1;
		$view['viewCate'] = $this->input->get("viewCate");
		$view['viewCate'] = empty($view['viewCate']) ? "제품" : $view['viewCate'];
		

		$panelWhere = array("year"=>$view['year'], "times"=>$view['times']);

		$mbID = $view['view']['mb_id'] = $this->input->get("eID");

		if ($view['year']==2024 && $view['times'] == 1) {
			$view['view']['mList'] = $this->site->selectCI("mem_userid", "member", array("mem_userid like"=>"panel%"), "");
		} else {
			$view['view']['mList'] = $this->site->selectCI("distinct(evaluate_id) as mem_userid", "apply_evaluation", $panelWhere, "evaluate_id asc");
		}
		if (empty($mbID)) $mbID = $view['view']['mb_id'] = $view['view']['mList'][0]['mem_userid'];

		// 세션 가져오기
		$_eID = $this->session->userdata("eID");
		$where['eID'] = $_eID;

		// 세션 없으면 기본값
		if (empty($_eID)) {
			$this->session->set_userdata(array("eID"=>$mbID));
			$where['eID'] = $mbID;
		}

		// Get 호출 있으면 대체 세션 처리 후 대체
		$eID = $this->input->get("eID", true);
		if (!empty($eID)) {
			$this->session->set_userdata(array("eID"=>$eID));
			$where['eID'] = $eID;
		}
		$view['view']['viewID'] = $where['eID'];

		$yearC = "";
		$addSQL = "";
		if ($view['year']) {
			$where['year'] = $view['year'];
			$yearC = " WHERE year = '".$view['year']."' ";
		}
		if ($view['viewCate']) $where['category'] = $view['viewCate'];
		//if ($view['viewID']) $addSQL .= " and `researcherID` like '".$view['viewID']."' ";
		//else $addSQL .= " group by comNo ";


		$applySQL = "
			SELECT
				m.*,
				m.no as applyNo,
				E.evaluate_id,
				E.evaluate_date,
				E.evaluate_name,
				E.ee_field1,
				E.ee_field2,
				E.ee_field3,
				E.ee_field4,
				E.ee_field5,
				E.comments
			FROM
				ds_apply as m
			LEFT JOIN `ds_apply_evaluation` as E ON ( E.applyNo = m.no AND E.evaluate_id = '".$where['eID']."'  )

			WHERE
				m.year = '".$view['year']."'
			".$addSQL."
			AND
				`status` = '제출완료'
			AND
				`status2` = '적격'
			ORDER BY
				applyNo ASC
		";

		//echo $applySQL;
		$result = $this->site->selectQuery($applySQL);
		$view['data']= $result;



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

	public function xlsDown() {

		$view = array();
		$view['view'] = array();


		$where = array();


		$view['year'] = 2024;
		$view['times'] = 1;
		$view['viewCate'] = $this->input->get("viewCate");
		$view['viewCate'] = empty($view['viewCate']) ? "제품" : $view['viewCate'];
		

		$panelWhere = array("year"=>$view['year'], "times"=>$view['times']);

		$mbID = $view['view']['mb_id'] = $this->input->get("eID");

		if ($view['year']==2024 && $view['times'] == 1) {
			$view['view']['mList'] = $this->site->selectCI("mem_userid", "member", array("mem_userid like"=>"panel%"), "");
		} else {
			$view['view']['mList'] = $this->site->selectCI("distinct(evaluate_id) as mem_userid", "apply_evaluation", $panelWhere, "evaluate_id asc");
		}
		if (empty($mbID)) $mbID = $view['view']['mb_id'] = $view['view']['mList'][0]['mem_userid'];

		// 세션 가져오기
		$_eID = $this->session->userdata("eID");
		$where['eID'] = $_eID;

		// 세션 없으면 기본값
		if (empty($_eID)) {
			$this->session->set_userdata(array("eID"=>$mbID));
			$where['eID'] = $mbID;
		}

		// Get 호출 있으면 대체 세션 처리 후 대체
		$eID = $this->input->get("eID", true);
		if (!empty($eID)) {
			$this->session->set_userdata(array("eID"=>$eID));
			$where['eID'] = $eID;
		}
		$view['view']['viewID'] = $where['eID'];

		$yearC = "";
		$addSQL = "";
		if ($view['year']) {
			$where['year'] = $view['year'];
			$yearC = " WHERE year = '".$view['year']."' ";
		}
		if ($view['viewCate']) $where['category'] = $view['viewCate'];
		//if ($view['viewID']) $addSQL .= " and `researcherID` like '".$view['viewID']."' ";
		//else $addSQL .= " group by comNo ";


		$applySQL = "
			SELECT
				m.*,
				m.no as applyNo,
				E.evaluate_id,
				E.evaluate_date,
				E.evaluate_name,
				E.ee_field1,
				E.ee_field2,
				E.ee_field3,
				E.ee_field4,
				E.ee_field5,
				E.comments
			FROM
				ds_apply as m
			LEFT JOIN `ds_apply_evaluation` as E ON ( E.applyNo = m.no AND E.evaluate_id = '".$where['eID']."'  )

			WHERE
				m.year = '".$view['year']."'
			".$addSQL."
			AND
				`status` = '제출완료'
			AND
				`status2` = '적격'
			ORDER BY
				applyNo ASC
		";

		//echo $applySQL;
		$result = $this->site->selectQuery($applySQL);
		$view['data']= $result;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="중소기업_산업디자인_개발_지원사업_'.$where['eID'].'_평가총합_'.date("Y-m-d_H:i").'.xls"');
		header('Cache-Control: max-age=0');
		echo $this->load->view("/admin/basic/evaluation/evalResult/print.php", $view, true);
	}




	/**
	 * 심사결과 출력
	 */
	public function printEvaluation() {

		$view = array();
		$view['view'] = array();


		$where = array();


		$view['year'] = 2024;
		$view['times'] = 1;
		$view['viewCate'] = $this->input->get("viewCate");
		$view['viewCate'] = empty($view['viewCate']) ? "제품" : $view['viewCate'];
		

		$panelWhere = array("year"=>$view['year'], "times"=>$view['times']);

		$mbID = $view['view']['mb_id'] = $this->input->get("eID");

		if ($view['year']==2024 && $view['times'] == 1) {
			$view['view']['mList'] = $this->site->selectCI("mem_userid", "member", array("mem_userid like"=>"panel%"), "");
		} else {
			$view['view']['mList'] = $this->site->selectCI("distinct(evaluate_id) as mem_userid", "apply_evaluation", $panelWhere, "evaluate_id asc");
		}
		if (empty($mbID)) $mbID = $view['view']['mb_id'] = $view['view']['mList'][0]['mem_userid'];

		// 세션 가져오기
		$_eID = $this->session->userdata("eID");
		$where['eID'] = $_eID;

		// 세션 없으면 기본값
		if (empty($_eID)) {
			$this->session->set_userdata(array("eID"=>$mbID));
			$where['eID'] = $mbID;
		}

		// Get 호출 있으면 대체 세션 처리 후 대체
		$eID = $this->input->get("eID", true);
		if (!empty($eID)) {
			$this->session->set_userdata(array("eID"=>$eID));
			$where['eID'] = $eID;
		}
		$view['view']['viewID'] = $where['eID'];

		$yearC = "";
		$addSQL = "";
		if ($view['year']) {
			$where['year'] = $view['year'];
			$yearC = " WHERE year = '".$view['year']."' ";
		}
		if ($view['viewCate']) $where['category'] = $view['viewCate'];
		//if ($view['viewID']) $addSQL .= " and `researcherID` like '".$view['viewID']."' ";
		//else $addSQL .= " group by comNo ";


		$applySQL = "
			SELECT
				m.*,
				m.no as applyNo,
				E.evaluate_id,
				E.evaluate_date,
				E.evaluate_name,
				E.ee_field1,
				E.ee_field2,
				E.ee_field3,
				E.ee_field4,
				E.ee_field5,
				E.comments
			FROM
				ds_apply as m
			LEFT JOIN `ds_apply_evaluation` as E ON ( E.applyNo = m.no AND E.evaluate_id = '".$where['eID']."'  )
			WHERE
				m.year = '".$view['year']."'
			".$addSQL."
			AND
				`status` = '제출완료'
			AND
				`status2` = '적격'
			ORDER BY
				applyNo ASC
		";

		//echo $applySQL;
		$result = $this->site->selectQuery($applySQL);
		$view['data']= $result;

		$signD = $this->site->selectQuery("SELECT *, (select mem_username from ds_member as M WHERE M.mem_userid = S.evaluate_id) as name FROM `ds_evaluation_sign` as S WHERE S.year = ".$this->year." AND S.times = ".$this->times." AND S.type='final'  AND S.evaluate_id = '".$where['eID']."'  ");
		$view['signD'] = isset($signD[0]) ? $signD[0] : array();
		$view['signD']['signData'] = json_decode($view['signD']['sign_data'], true);

		//print_r($view['signD']);
		//echo $applySQL;

		//header('Content-Type: application/vnd.ms-excel');
		//header('Content-Disposition: attachment;filename="중소기업_산업디자인_개발_지원사업_'.$where['eID'].'_평가총합_'.date("Y-m-d_H:i").'.xls"');
		//header('Cache-Control: max-age=0');
		echo $this->load->view("/admin/basic/evaluation/evalResult/print.php", $view, true);

	}



	/**
	 * 심사결과 출력
	 */
	public function printPaper() {

		$view = array();
		$view['view'] = array();


		$where = array();


		$view['year'] = 2024;
		$view['times'] = 1;
		$view['viewCate'] = $this->input->get("viewCate");
		$view['viewCate'] = empty($view['viewCate']) ? "제품" : $view['viewCate'];
		

		$panelWhere = array("year"=>$view['year'], "times"=>$view['times']);

		$mbID = $view['view']['mb_id'] = $this->input->get("eID");

		if ($view['year']==2024 && $view['times'] == 1) {
			$view['view']['mList'] = $this->site->selectCI("mem_userid", "member", array("mem_userid like"=>"panel%"), "");
		} else {
			$view['view']['mList'] = $this->site->selectCI("distinct(evaluate_id) as mem_userid", "apply_evaluation", $panelWhere, "evaluate_id asc");
		}
		if (empty($mbID)) $mbID = $view['view']['mb_id'] = $view['view']['mList'][0]['mem_userid'];

		// 세션 가져오기
		$_eID = $this->session->userdata("eID");
		$where['eID'] = $_eID;

		// 세션 없으면 기본값
		if (empty($_eID)) {
			$this->session->set_userdata(array("eID"=>$mbID));
			$where['eID'] = $mbID;
		}

		// Get 호출 있으면 대체 세션 처리 후 대체
		$eID = $this->input->get("eID", true);
		if (!empty($eID)) {
			$this->session->set_userdata(array("eID"=>$eID));
			$where['eID'] = $eID;
		}
		$view['view']['viewID'] = $where['eID'];
		$signD = $this->site->selectQuery("SELECT *, (select mem_username from ds_member as M WHERE M.mem_userid = S.evaluate_id) as name FROM `ds_evaluation_sign` as S WHERE S.year = ".$this->year." AND S.times = ".$this->times." AND S.type='sign'  AND S.evaluate_id = '".$where['eID']."'  ");
		$view['signD'] = isset($signD[0]) ? $signD[0] : array();
		$view['signD']['signData'] = json_decode($view['signD']['sign_data'], true);

		//print_r($view['signD']);
		//echo $applySQL;

		//header('Content-Type: application/vnd.ms-excel');
		//header('Content-Disposition: attachment;filename="중소기업_산업디자인_개발_지원사업_'.$where['eID'].'_평가총합_'.date("Y-m-d_H:i").'.xls"');
		//header('Cache-Control: max-age=0');
		echo $this->load->view("/admin/basic/evaluation/evalResult/paper.php", $view, true);

	}




}

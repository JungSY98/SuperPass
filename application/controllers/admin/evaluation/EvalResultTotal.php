<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * EvalResultTotal class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>EvalResultTotal controller 입니다.
 */
class EvalResultTotal extends CB_Controller
{
	public $step2;
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

	}

	/**
	 * 목록을 가져오는 메소드입니다
	 */
	public function index() {

		$view = array();
		$view['view'] = array();


		$where = array();


		$view['year'] = 2024;
		$view['times'] = 1;
		$view['viewCate'] = $this->input->get("viewCate");
		$view['viewCate'] = empty($view['viewCate']) ? "" : $view['viewCate'];

		$panelWhere = array("year"=>$view['year'], "times"=>$view['times']);
		if ($view['year']==2024 && $view['times'] == 1) {
			$view['view']['mList'] = $this->site->selectCI("mem_userid", "member", array("mem_userid like"=>"panel%"), "");
		} else {
			$view['view']['mList'] = $this->site->selectCI("distinct(evaluate_id) as mem_userid", "apply_evaluation", $panelWhere, "evaluate_id asc");
		}

		$yearC = "";
		$addSQL = "";
		if ($view['year']) {
			$where['year'] = $view['year'];
			$yearC = " WHERE year = '".$view['year']."' ";
		}
		if ($view['viewCate']) $addSQL .= " and `applyCategory` = '".$view['viewCate']."' "; 
		//if ($view['viewID']) $addSQL .= " and `researcherID` like '".$view['viewID']."' ";
		//else $addSQL .= " group by comNo ";

		$applySQL = "
			SELECT
				A.*,
				A.no as applyNo,
			";
			foreach($view['view']['mList'] as $kk => $mD) { 
				$mD['mem_userid'] = isset($mD['mem_userid']) ? $mD['mem_userid'] : $mD['evaluate_id'];
				$applySQL .= "
				(select sum(IFNULL(ee_field1, 0)+IFNULL(ee_field2, 0)+IFNULL(ee_field3, 0)+IFNULL(ee_field4, 0)+IFNULL(ee_field5, 0)) from ds_apply_evaluation as sub where sub.applyNo = A.no AND sub.evaluate_id = '".$mD['mem_userid']."' ) as `".$mD['mem_userid']."`";
				$applySQL .= (count($view['view']['mList'])-1==$kk) ? "" : ",";
			}
			$applySQL .= "
			FROM
				ds_apply as A
			WHERE
				`year` = '".$view['year']."'
			AND
				`status` = '제출완료'
			AND
				`status2` = '적격'
			".$addSQL."
			ORDER BY
				A.no ASC
		";

		//echo $sfwQuery;
		$result = $this->site->selectQuery($applySQL);
		foreach($result as $k => $v) {
			$panelMAX = 0;
			$panelMIN = 100;
			$maxPanel = $minPanel = '';
			foreach($view['view']['mList'] as $k2 => $mD) {

				if ($panelMAX <= element($mD['mem_userid'], $v)) {
					$panelMAX = element($mD['mem_userid'], $v);
					$maxPanel = $mD['mem_userid'];
				}
				if ($panelMIN >= element($mD['mem_userid'], $v)) {
					$panelMIN = element($mD['mem_userid'], $v);
					$minPanel = $mD['mem_userid'];
				}
			}
			$result[$k]['panelMAX'] = $panelMAX;
			$result[$k]['panelMIN'] = $panelMIN;
			$result[$k]['maxPanel'] = $maxPanel;
			$result[$k]['minPanel'] = $minPanel;
		}
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

	public function prints() {
		//if ($_SERVER['REMOTE_ADDR']!='192.168.0.1') alert("작업중입니다.");
		$view = array();
		$view['view'] = array();


		$where = array();


		$view['year'] = 2024;
		$view['times'] = 1;
		$view['viewCate'] = $this->input->get("viewCate");
		$view['viewCate'] = empty($view['viewCate']) ? "" : $view['viewCate'];

		$panelWhere = array("year"=>$view['year'], "times"=>$view['times']);
		if ($view['year']==2024 && $view['times'] == 1) {
			$view['view']['mList'] = $this->site->selectCI("mem_userid", "member", array("mem_userid like"=>"panel%"), "");
		} else {
			$view['view']['mList'] = $this->site->selectCI("distinct(evaluate_id) as mem_userid", "apply_evaluation", $panelWhere, "evaluate_id asc");
		}

		$yearC = "";
		$addSQL = "";
		if ($view['year']) {
			$where['year'] = $view['year'];
			$yearC = " WHERE year = '".$view['year']."' ";
		}
		if ($view['viewCate']) $addSQL .= " and `applyCategory` = '".$view['viewCate']."' "; 
		//if ($view['viewID']) $addSQL .= " and `researcherID` like '".$view['viewID']."' ";
		//else $addSQL .= " group by comNo ";

		$applySQL = "
			SELECT
				A.*,
			";
			foreach($view['view']['mList'] as $kk => $mD) { 
				$mD['mem_userid'] = isset($mD['mem_userid']) ? $mD['mem_userid'] : $mD['evaluate_id'];
				$applySQL .= "
				(select sum(IFNULL(ee_field1, 0)+IFNULL(ee_field2, 0)+IFNULL(ee_field3, 0)+IFNULL(ee_field4, 0)+IFNULL(ee_field5, 0)) from ds_apply_evaluation as sub where sub.applyNo = A.no AND sub.evaluate_id = '".$mD['mem_userid']."' ) as `".$mD['mem_userid']."`";
				$applySQL .= (count($view['view']['mList'])-1==$kk) ? "" : ",";
			}
			$applySQL .= "
			FROM
				ds_apply as A
			WHERE
				`year` = '".$view['year']."'
			AND
				`status` = '제출완료'
			AND
				`status2` = '적격'
			".$addSQL."
			ORDER BY
				A.no ASC
		";

		//echo $sfwQuery;
		$result = $this->site->selectQuery($applySQL);
		foreach($result as $k => $v) {
			$panelMAX = 0;
			$panelMIN = 100;
			$maxPanel = $minPanel = '';
			foreach($view['view']['mList'] as $k2 => $mD) {

				if ($panelMAX <= element($mD['mem_userid'], $v)) {
					$panelMAX = element($mD['mem_userid'], $v);
					$maxPanel = $mD['mem_userid'];
				}
				if ($panelMIN >= element($mD['mem_userid'], $v)) {
					$panelMIN = element($mD['mem_userid'], $v);
					$minPanel = $mD['mem_userid'];
				}
			}
			$result[$k]['panelMAX'] = $panelMAX;
			$result[$k]['panelMIN'] = $panelMIN;
			$result[$k]['maxPanel'] = $maxPanel;
			$result[$k]['minPanel'] = $minPanel;
		}
		$view['data']= $result;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="중소기업_산업디자인_개발_지원사업_평가총합_'.date("Y-m-d_H:i").'.xls"');
		header('Cache-Control: max-age=0');

		echo $this->load->view("/admin/basic/evaluation/evalResultTotal/print.php", $view, true);

	}


}

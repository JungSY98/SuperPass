<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 메인 페이지를 담당하는 controller 입니다.
 */
class Main extends CB_Controller
{
	public $year;
	public $times;
	public $onDev;
	private $SPLASH_TTL = 1200;
	/**
	 * 헬퍼를 로딩합니다
	 */
	protected $helpers = array('form', 'array', 'language');

	function __construct()
	{
		parent::__construct();
		$this->year = 2025;
		$this->times = 1;
		/**
		 * 라이브러리를 로딩합니다
		 */
		$this->load->library(array('querystring', 'user_agent', 'session'));
		$this->lang->load("website", element("langSet", $_SESSION));
        $this->load->helper(['cookie','url','language']);
		$this->load->model('Banner_model');

		if (!($this->member->item("mem_id")==1 || $_SERVER['REMOTE_ADDR']=='121.165.106.238' || $_SERVER['REMOTE_ADDR']=='192.168.0.1') ) {

		}
	}

	/**
	 * 전체 메인 페이지입니다
	 */
	public function index()
	{
		if (element("mem_id", $_SESSION) && empty($this->member->item("mem_sex"))) {
			redirect("/additional/");
		}

		define("isMain", true);
		//$this->output->enable_profiler(TRUE);
		if ($_SERVER['REMOTE_ADDR']=='192.168.0.1' || $_SERVER['REMOTE_ADDR']=='14.138.145.169'|| $_SERVER['REMOTE_ADDR']=='14.36.217.193') {
			//echo "SY Server";
		} else {
			//echo "<div style='padding:20vh 0px;width:100%;text-align:center'><h2>작업중입니다.</h2></div>";
			//exit;
		}
		$view = array();
		$view['view'] = array();
		$view['siteTitle'] = $this->lang->language['site'];

        // 최초 방문(세션 없음) 시에도 should_show = true
        $view['splash_ttl'] = $this->SPLASH_TTL;
		// CSRF
        $view['csrf_name'] = $this->security->get_csrf_token_name();
        $view['csrf_hash'] = $this->security->get_csrf_hash();

        // 로그인 여부 (예: 세션 키 mem_id 사용)
        $is_logged_in = (int) $this->session->userdata('mem_id') > 0;

        // 서버세션/쿠키로 스플래시 재노출 판단
        $last_seen_session = (int) $this->session->userdata('sp_last_seen_ts');
        $last_seen_cookie  = (int) $this->input->cookie('sp_last_seen_ts', TRUE);
        $last_seen         = max($last_seen_session, $last_seen_cookie);
        $should_show       = (time() - $last_seen) >= $this->SPLASH_TTL || $last_seen === 0;
        if ($last_seen === 0) $should_show = true;

        // 언어/지역 추정 → 내국인/외국인 판정
        $accept = (string)$this->input->server('HTTP_ACCEPT_LANGUAGE');
        $lang   = strtolower(substr($accept, 0, 2));      // ko, en, ja ...

        $is_domestic = ($lang === 'ko');                  // ko면 내국인 취급 (간단판정)
		$view['last_seen'] = $last_seen;
        $view['should_show_splash'] = $should_show;
        $view['splash_ttl'] = $this->SPLASH_TTL;
        $view['is_logged_in'] = $is_logged_in;
        $view['is_domestic' ] = $is_domestic;
            // 지도 API 키 (환경설정에서 가져오도록 권장)
		$view['kakao_key'] = 'bdee59ddd0e5b9c0038924c5f1d94422';
		$view['google_key'] = 'AIzaSyDkiRahKJHIIycGZFxmk-Vak8F6aIfeQO0';
		$view['login_url'] = site_url('/login/'); // 실제 로그인 URL로 교체
		$view['csrf_name'] = $this->security->get_csrf_token_name();
		$view['csrf_hash'] = $this->security->get_csrf_hash();

		$view['langField'] = $lang == 'ko' ? 'KR' : 'EN';

		//$view['branchD'] = $this->site->selectCI("*", "branch", array("isUse"=>"Y"), "no asc");

		$idD = $this->site->selectCI("*", "user_uuids", array("uuid"=>element('uuid', $_SESSION)), "");
		$view['idD'] = isset($idD[0]) ? $idD[0] : array();


		$view['mem_id'] = $mem_id = $this->member->item("mem_id");
		
		// 상점 관리자 여부 확인 (overlay 표시용)
		$view['is_store_member'] = false;
		if ($this->member->is_admin() === 'super') {
			$view['is_store_member'] = true;
		} else if ($mem_id) {
			$is_sm = $this->site->selectCI("no", "store_member", array("memNo" => $mem_id), "");
			if (!empty($is_sm)) {
				$view['is_store_member'] = true;
			}
		}

		// 스탬프 사용 개수 가져오기
		// 이번 달 범위 예시
		$start_dt = '2025-10-01'; //date('Y-m-d H:i:s', strtotime('- 1 month'));
		$end_dt   = '2025-12-31'; //date('Y-m-d H:i:s');
		if ($mem_id) { 
			$stat = $this->stamp_usage_count_core($mem_id, [
				'distinct_store' => false,      // 매장당 1회 집계
				'start_dt'       => $start_dt,
				'end_dt'         => $end_dt,
			]);

			// 뷰로 전달
			$view['stamp_total']  = $stat['count'];       // 총 카운트
		} else {
			$view['stamp_total'] = 0;
		}
		// 슈퍼패스에 표시될 Store 가져오기
		$branchD = $this->site->selectCI("*", "branch", array("isMajor"=>"Y"), "no asc");
		foreach($branchD as $k => $d) {
			$branchD[$k]['imgD'] = $this->site->selectCI("*", "branch_file_upload", array("branchNo"=>$d['no']), "");
		}
		$view['branchD'] = $branchD;
		$storeD = $this->site->selectCI("*", "store", array("isMajor"=>"Y"), "no asc");
		foreach($storeD as $k => $d) {
			$storeD[$k]['imgD'] = $this->site->selectCI("*", "store_file_upload", array("storeNo"=>$d['no']), "");
		}
		$view['storeD'] = $storeD;

		$view['eventD'] =$this->Banner_model->get_banner("event", "order", 200);

		$view['stampExplain']        = $this->load->view('main/bootstrap/stampExplain.php',        $view, true);
		$view['superpassExplain'] = $this->load->view('main/bootstrap/superpassExplain.php',        $view, true);
		$view['eventExplain'] = $this->load->view('main/bootstrap/eventExplain.php',        $view, true);

		$skin = $_SERVER['REMOTE_ADDR']=='192.168.0.1' ? 'New' : '';

		$view['scriptGlobalVal']        = $this->load->view('main/bootstrap/scriptGlobalVal.php',        $view, true);
		$view['scriptUtils']            = $this->load->view('main/bootstrap/scriptUtils.php',            $view, true);
		$view['scriptApiGuard']         = $this->load->view('main/bootstrap/scriptApiGuard.php',         $view, true);
		$view['scriptSmartLoader']      = $this->load->view('main/bootstrap/scriptSmartLoader.php',      $view, true);
		$view['scriptLists']            = $this->load->view('main/bootstrap/scriptLists.php',            $view, true);
		//$view['scriptListRender']            = $this->load->view('main/bootstrap/scriptListRender.php',            $view, true);
		$view['scriptSearchUnified']            = $this->load->view('main/bootstrap/scriptSearchUnified.php',            $view, true);
		$view['scriptMarkers']          = $this->load->view('main/bootstrap/scriptMarkersCluster.php',          $view, true);
		$view['scriptMapInit']          = $this->load->view('main/bootstrap/scriptMapInitNew.php',          $view, true);
		$view['scriptCategories']       = $this->load->view('main/bootstrap/scriptCategories.php',       $view, true);
		$view['scriptDetailPC']         = $this->load->view('main/bootstrap/scriptDetailPC.php',         $view, true);
		$view['scriptStampPC']         = $this->load->view('main/bootstrap/scriptStampPC.php',         $view, true);
		$view['scriptDetailMobile']     = $this->load->view('main/bootstrap/scriptDetailMobile.php',     $view, true);
		$view['scriptStampSheet']       = $this->load->view('main/bootstrap/scriptStampSheet.php', $view, true);
		$view['scriptCoupons']          = $this->load->view('main/bootstrap/scriptCoupons.php',          $view, true);
		$view['scriptMobileBottomNav']  = $this->load->view('main/bootstrap/scriptMobileBottomNav.php',  $view, true);
		$view['scriptRelayoutHardUnlock']  = $this->load->view('main/bootstrap/scriptRelayoutHardUnlock.php',  $view, true);


	/**
		 * 레이아웃을 정의합니다
		 */
		$page_title = $this->cbconfig->item('site_meta_title_main');
		$meta_description = $this->cbconfig->item('site_meta_description_main');
		$meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
		$meta_author = $this->cbconfig->item('site_meta_author_main');
		$page_name = $this->cbconfig->item('site_page_name_main');

		$layoutconfig = array(
			'path' => 'main',
			'layout' => 'layout',
			'skin' => 'main_250918' ,
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


    /** 코어: 스탬프 사용 집계 (배열 반환) */
    protected function stamp_usage_count_core(int $mem_id, array $opts = []): array
    {
        // ── 옵션 파싱 ─────────────────────────────────────────────────────────
        $distinct_store = !empty($opts['distinct_store']);
        $start_dt = !empty($opts['start_dt']) ? $opts['start_dt'] : null; // 'Y-m-d 00:00:00'
        $end_dt   = !empty($opts['end_dt'])   ? $opts['end_dt']   : null; // 'Y-m-d 23:59:59'

        if (!$mem_id) {
            return ['ok' => false, 'error' => 'unauthorized', 'count' => 0, 'per_store' => []];
        }

        // ── 총 개수 ───────────────────────────────────────────────────────────
        $this->db->reset_query();
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c', 'c.coupon_no = u.coupon_no', 'inner')
                 ->where('u.mem_id', $mem_id)
                 ->where('c.is_stamp', 'Y');

        if ($start_dt) $this->db->where('u.used_at >=', $start_dt);
        if ($end_dt)   $this->db->where('u.used_at <=', $end_dt);

        if ($distinct_store) {
            $this->db->select('COUNT(DISTINCT u.store_no) AS cnt', false);
        } else {
            $this->db->select('COUNT(*) AS cnt');
        }

        $total_cnt = (int) ($this->db->get()->row()->cnt ?? 0);

        // ── 매장별 상세 ───────────────────────────────────────────────────────
        $this->db->reset_query();
        $this->db->from('dsp_coupon_usage u')
                 ->join('dsp_coupon c', 'c.coupon_no = u.coupon_no', 'inner')
                 ->join('dsp_store  s', 's.no = u.store_no', 'left')
                 ->where('u.mem_id', $mem_id)
                 ->where('c.is_stamp', 'Y');

        if ($start_dt) $this->db->where('u.used_at >=', $start_dt);
        if ($end_dt)   $this->db->where('u.used_at <=', $end_dt);

        $this->db->select("
            u.store_no,
            COUNT(*)        AS used_cnt,
            MAX(u.used_at)  AS last_used_at,
            s.sNameKR, s.sNameEN
        ", false)
        ->group_by('u.store_no')
        ->order_by('last_used_at', 'DESC');

        $rows = $this->db->get()->result_array();

        return [
            'ok'        => true,
            'member_id' => $mem_id,
            'mode'      => ($distinct_store ? 'distinct_store' : 'raw_count'),
            'period'    => ['start' => $start_dt, 'end' => $end_dt],
            'count'     => $total_cnt,
            'per_store' => array_map(function($r){
                return [
                    'store_no'     => (int)$r['store_no'],
                    'store_name'   => ['kr' => $r['sNameKR'] ?? null, 'en' => $r['sNameEN'] ?? null],
                    'used_cnt'     => (int)$r['used_cnt'],
                    'last_used_at' => $r['last_used_at'],
                ];
            }, $rows),
        ];
    }


    // 스플래시를 실제로 보여준 순간(클라 3초 후)에 서버 세션 타임스탬프를 저장
     public function ajaxMarkSplashSeen()
    {
        if (!$this->input->is_ajax_request()) show_404();
        //$this->security->csrf_verify();

        $now = time();
        $this->session->set_userdata('sp_last_seen_ts', $now);
        $this->input->set_cookie([
            'name'     => 'sp_last_seen_ts',
            'value'    => $now,
            'expire'   => 60*60*24*30,
            'secure'   => isset($_SERVER['HTTPS']),
            'httponly' => false,
            'path'     => '/',
            'samesite' => 'Lax'
        ]);

        $resp = ['ok'=>true, 'ts'=>$now, $this->security->get_csrf_token_name()=>$this->security->get_csrf_hash()];
        return $this->output->set_content_type('application/json')->set_output(json_encode($resp));
    }

    /** (선택) 간단 i18n 텍스트 제공 */
    public function ajaxI18n()
    {
        if (!$this->input->is_ajax_request()) show_404();
        $lang = strtolower(substr((string)$this->input->server('HTTP_ACCEPT_LANGUAGE'),0,2));
        $ko = [
            'search_placeholder' => '장소, 쿠폰 검색',
            'login_required'     => '로그인이 필요합니다.'
        ];
        $en = [
            'search_placeholder' => 'Place, Coupon Search',
            'login_required'     => 'Please log in first.'
        ];
        $dict = ($lang==='ko') ? $ko : $en;
        return $this->output->set_content_type('application/json')->set_output(json_encode($dict));
    }


	public function ajaxScanID() {

	}

	public function ajaxGetStore() {
		if ($this->input->is_ajax_request()) {
			$storeNo = $this->input->post("storeNo", true);

			$return = array();

			$storeD = $this->site->selectCI("*", "store", array("no"=>$storeNo), "sOrder asc");
			$return['storeD'] = isset($storeD[0]) ? $storeD[0] : array();
			$return['storeD']['fileD'] = $this->site->selectCI("*", "store_file_upload", array("storeNo"=>$storeNo), "sort_order asc, no desc");

			$branchD = $this->site->selectCI("*", "branch", array("no"=>$return['storeD']['branchNo']), "");
			$return['branchD'] = isset($branchD[0]) ? $branchD[0] : array();


			$this->output->set_content_type('application/json')->set_output(json_encode($return));
		}
	}

	public function ajaxGetBranch() {
		if ($this->input->is_ajax_request()) {
			$branchNo = $this->input->post("branchNo", true);

			$return = array();
			$branchD = $this->site->selectCI("*", "branch", array("no"=>$branchNo), "");
			$return['branchD'] = isset($branchD[0]) ? $branchD[0] : array();

			$storeD = $this->site->selectCI("*", "store", array("branchNo"=>$branchNo), "sOrder asc");
			foreach($storeD as $k => $sD) {
				$storeD[$k]['fileD'] = $this->site->selectCI("*", "store_file_upload", array("storeNo"=>$sD['no']), "sort_order asc, no desc");
			}
			$return['storeD'] = $storeD;
			$this->output->set_content_type('application/json')->set_output(json_encode($return));
		}
	}

	public function ajaxSaveUUID() {
		if ($this->input->is_ajax_request()) {
			$clientUUID = $this->input->post("clientUUID", true);
			echo $clientUUID;

		}
	}

	public function generate_uuid() {

		// 사용자 정보 수집
		$userAgent = isset($_POST['userAgent']) ? $_POST['userAgent'] : '';
		$clientUUID = isset($_POST['clientUUID']) ? $_POST['clientUUID'] : '';
		$ip = $_SERVER['REMOTE_ADDR'];

		// 1. clientUUID로 확인
		if ($clientUUID) {
			$stmt = $this->site->selectQuery("SELECT uuid FROM `dsp_user_uuids` WHERE client_uuid = '".$clientUUID."' LIMIT 1");
			$existingUUID = isset($stmt[0]['uuid']) ? $stmt[0]['uuid'] : "";
			if ($existingUUID) {
				$_SESSION['uuid'] = $existingUUID;
				echo json_encode(['status' => 'success', 'uuid' => $existingUUID]);
				exit;
			}
		}

		// 2. IP와 User-Agent로 확인 (clientUUID가 없거나 매칭 실패 시)
		$stmt = $this->site->selectQuery("SELECT uuid FROM dsp_user_uuids WHERE ip = '".$ip."' AND user_agent = '".$userAgent."' LIMIT 1");
		$existingUUID = isset($stmt[0]['uuid']) ? $stmt[0]['uuid'] : "";

		if ($existingUUID) {
			// 기존 UUID가 있으면 clientUUID 업데이트
			if ($clientUUID) {
				$this->db->query("UPDATE `dsp_user_uuids` SET `client_uuid` = '".$clientUUID."' WHERE uuid = '".$existingUUID."' ");
			}
			echo json_encode(['status' => 'success', 'uuid' => $existingUUID]);
			$_SESSION['uuid'] = $existingUUID;
		} else {
			// 새 UUID 생성
			$uniqueString = $ip . $userAgent . $clientUUID . time();
			$uuid = hash('sha256', $uniqueString);

			// 새 UUID 저장
			$this->db->query("INSERT INTO dsp_user_uuids (ip, user_agent, client_uuid, uuid) VALUES ('".$ip."', '".$userAgent."', '".$clientUUID."', '".$uuid."' )");
			echo json_encode(['status' => 'success', 'uuid' => $uuid]);
			$_SESSION['uuid'] = $uuid;
		}

	}


	public function ajaxChkMB() {
		if ($this->input->is_ajax_request()) {
			$arrReturn = array();
			$sess = $this->member->item("mem_userid", true);
			$mem_id = $this->input->post("mem_id", true);
			if ($sess && $sess == $mem_id) {
				$arrReturn['stat'] = 'true';
				$arrReturn['msg'] = "로그인 정보가 일치합니다.";
			} else {
				$arrReturn['stat'] = 'false';
				$arrReturn['msg'] = "로그인 정보가 필요합니다.";
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($arrReturn));
		}
	}


}

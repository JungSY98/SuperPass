<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Common hook class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

class _Common
{

	function init()
	{
		$CI =& get_instance();

		if ($CI->uri->segment(1) === 'install') {
			return;
		}

		$_SESSION['nonce_key'] = $nonce_key = hash('sha256', microtime());
		if ($_SERVER['REMOTE_ADDR']=='210.120.40.117' || $_SERVER['REMOTE_ADDR']=='192.168.0.1') {
			//$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'english';
		} else {
			//$_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'english';
		}

		// 언어 설정
		$getLangType = array("kr", "en");
		$getLang = $CI->input->get("langSet", true);
		$sessionLang = $CI->session->userdata("langSet");
		if ($getLang && in_array($getLang, $getLangType)) {
			// 변경 설정
			if ($getLang=='kr') { $_SESSION['langSet'] = 'korean'; $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'korean'; }
			if ($getLang=='en') { $_SESSION['langSet'] = 'english'; $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'english'; }
		} else if ($sessionLang) {
			// 기존 설정 유지
		} else {
			// 초기 설정
			$_SESSION['langSet'] = 'korean';
		}


		if ($_SERVER['REMOTE_ADDR']=='192.168.0.1' || $_SERVER['REMOTE_ADDR']=='210.120.40.117' || $_SERVER['REMOTE_ADDR']=='14.36.217.193') {
			//echo "SY Server";
		} else {
			//echo "작업중입니다.";
			//exit;
		}
		if ($_SERVER['REQUEST_SCHEME']!='https') {

		}
		$url = $CI->uri->segment(1);
		


		if (config_item('use_lock_ip') && $CI->cbconfig->item('site_ip_whitelist')) {
			$whitelist = $CI->cbconfig->item('site_ip_whitelist');
			$whitelist = preg_replace("/[\r|\n|\r\n]+/", ',', $whitelist);
			$whitelist = preg_replace("/\s+/", '', $whitelist);
			if (preg_match('/(<\?|<\?php|\?>)/xsm', $whitelist)) {
				$whitelist = '';
			}
			if ($whitelist) {
				$whitelist = explode(',', trim($whitelist, ','));
				$whitelist = array_unique($whitelist);
				if (is_array($whitelist)) {
					$CI->load->library('Ipfilter');
					$ipfilter = new Ipfilter();
					if ( ! $ipfilter->filter($whitelist)) {
						$title = ($CI->cbconfig->item('site_blacklist_title'))
							? $CI->cbconfig->item('site_blacklist_title')
							: 'Maintenance in progress...';
						$message = $CI->cbconfig->item('site_blacklist_content');

						show_error($message, '500', $title);

						exit;
					}
				}
			}
		}
		if (config_item('use_lock_ip') && $CI->cbconfig->item('site_ip_blacklist')) {
			$blacklist = $CI->cbconfig->item('site_ip_blacklist');
			$blacklist = preg_replace("/[\r|\n|\r\n]+/", ',', $blacklist);
			$blacklist = preg_replace("/\s+/", '', $blacklist);
			if (preg_match('/(<\?|<\?php|\?>)/xsm', $blacklist)) {
				$blacklist = '';
			}
			if ($blacklist) {
				$blacklist = explode(',', trim($blacklist, ','));
				$blacklist = array_unique($blacklist);
				if (is_array($blacklist)) {
					$CI->load->library('Ipfilter');
					$ipfilter = new Ipfilter();
					if ($ipfilter->filter($blacklist)) {
						$title = ($CI->cbconfig->item('site_blacklist_title'))
							? $CI->cbconfig->item('site_blacklist_title')
							: 'Maintenance in progress...';
						$message = $CI->cbconfig->item('site_blacklist_content');
						show_error($message, '500', $title);
						exit;
					}
				}
			}
		}

		$CI->load->library('Mobile_detect');
		$detect = new Mobile_detect();

		$device_view_type = (get_cookie('device_view_type') === 'desktop' OR get_cookie('device_view_type') === 'mobile')
				? get_cookie('device_view_type') : '';
		if (empty($device_view_type)) {
			$device_view_type = $detect->isMobile() ? 'mobile' : 'desktop';
		}
		$CI->cbconfig->set_device_view_type($device_view_type);

		$device_type = $detect->isMobile() ? 'mobile' : 'desktop';
		$CI->cbconfig->set_device_type($device_type);

		if (get_cookie('autologin') && ! $CI->session->userdata('mem_id')) {
			$CI->load->model('Autologin_model');
			$where = array(
				'aul_key' => get_cookie('autologin'),
			);
			$autodata = $CI->Autologin_model->get_one('', '', $where);
			if ( ! element('mem_id', $autodata)) {
				delete_cookie('autologin');
			} elseif ( ! element('aul_datetime', $autodata) OR (strtotime(element('aul_datetime', $autodata)) < ctimestamp() - (86400 * 30))) {
				$CI->Autologin_model->delete(element('aul_id', $autodata));
				delete_cookie('autologin');
			} elseif ($CI->input->ip_address() !== element('aul_ip', $autodata)) {
				$CI->Autologin_model->delete(element('aul_id', $autodata));
				delete_cookie('autologin');
			} else {
				$tmpmember
					= $CI->Member_model->get_by_memid(element('mem_id', $autodata), 'mem_id, mem_denied, mem_is_admin');
				if ( ! element('mem_id', $tmpmember)) {
					$CI->Autologin_model->delete(element('aul_id', $autodata));
					delete_cookie('autologin');
				} elseif (element('mem_denied', $tmpmember)) {
					$CI->Autologin_model->delete(element('aul_id', $autodata));
					delete_cookie('autologin');
				} elseif (element('mem_is_admin', $tmpmember)) {
					$CI->Autologin_model->delete(element('aul_id', $autodata));
					delete_cookie('autologin');
				} else {
					$CI->session->set_userdata('mem_id', element('mem_id', $autodata));
				}
			}
		}

		if ($CI->member->is_member()) {
			if ($CI->member->item('mem_id') === false) {
				unset($CI->member);
				$CI->session->sess_destroy();
				redirect(current_full_url(), 'refresh');
			}
			$mem_id = (int) $CI->member->item('mem_id');
			if ($CI->member->item('mem_denied')) {
				unset($CI->member);
				$CI->session->sess_destroy();
				redirect(current_full_url(), 'refresh');
			} else {
				if (substr($CI->member->item('mem_lastlogin_datetime'), 0, 10) !== cdate('Y-m-d')) {
					if ($CI->cbconfig->item('point_login')) {
						$CI->load->library('point');
						$CI->point->insert_point(
							$mem_id,
							$CI->cbconfig->item('point_login'),
							cdate('Y-m-d') . ' 첫로그인',
							'login',
							$mem_id,
							cdate('Y-m-d') . ' 로그인'
						);
					}
					$updatedata = array(
						'mem_lastlogin_datetime' => cdate('Y-m-d H:i:s'),
						'mem_lastlogin_ip' => $CI->input->ip_address(),
					);
					$CI->Member_model->update($mem_id, $updatedata);
				}
			}
		}

		// 관리자 페이지
		if ($CI->member->is_admin() !== 'super' && $CI->uri->segment(1) === config_item('uri_segment_admin')) {
			if ($CI->site->getAdminAuth()==false) { 
				redirect('login?url=' . urlencode(current_full_url()));
			} else if ($CI->site->getAdminAuth()==true) {
				$last = $CI->uri->total_segments();
				if ($last>=3) {
					$addr = $CI->uri->segment(3);
					if (preg_match("/ajax/i", $addr) || preg_match("/ajax/i", $_SERVER['REQUEST_URI'])) {
						// ajax 통신은 패스
					} else {
						if ($CI->site->getAdminAuth($addr)==false) {
							alert('권한이 없습니다.');
						}
					}
				} 
			} // end else if
		}

		if (config_item('use_lock_ip')
			&& $CI->uri->segment(1) === config_item('uri_segment_admin')
			&& $CI->cbconfig->item('admin_ip_whitelist')) {

			$whitelist = $CI->cbconfig->item('admin_ip_whitelist');
			$whitelist = preg_replace("/[\r|\n|\r\n]+/", ',', $whitelist);
			$whitelist = preg_replace("/\s+/", '', $whitelist);
			if (preg_match('/(<\?|<\?php|\?>)/xsm', $whitelist)) {
				$whitelist = '';
			}
			if ($whitelist) {
				$whitelist = explode(',', trim($whitelist, ','));
				$whitelist = array_unique($whitelist);
				if (is_array($whitelist)) {
					$CI->load->library('Ipfilter');
					if ( ! Ipfilter::filter($whitelist)) {
						$title = '관리자 페이지';
						$message = '현재 접속하신 아이피는 관리자 페이지 접근이 차단되었습니다';
						show_error($message, '500', $title);
						exit;
					}
				}
			}
		}
	}
}

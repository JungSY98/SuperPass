<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *--------------------------------------------------------------------------
 *Admin Page 에 보일 메뉴를 정의합니다.
 *--------------------------------------------------------------------------
 *
 * Admin Page 에 새로운 메뉴 추가시 이곳에서 수정해주시면 됩니다.
 *
 */


$config['admin_page_menu']['page'] =
	array(
		'__config'					=> array('페이지설정', 'fa-laptop'),
		'menu'						=> array(
			'pagemenu'				=> array('메뉴관리', ''),
			'document'				=> array('일반페이지', ''),
			'popup'					=> array('팝업관리', ''),
			'faqgroup'				=> array('FAQ관리', ''),
			'faq'					=> array('FAQ 내용', '', 'hide'),
			'banner'				=> array('배너관리', ''),
			'bannerclick'			=> array('배너클릭로그', ''),
		),
	);


$config['admin_page_menu']['store'] =
	array(
		'__config'					=> array('Store 관리', 'fa-edit'),
		'menu'						=> array(
			'category'				=> array('Store 분류 관리', ''),
			'branchList'				=> array('대분류 Store 관리', ''),
			'storeList'				=> array('Store 관리', ''),
			'couponList'				=> array('Coupon 관리', '', 'hide'),
			//'couponStatics'				=> array('Coupon 통계', ''),
		),
	);


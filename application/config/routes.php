<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'main';
$route['404_override'] = '';

$route[config_item('uri_segment_admin') . '/preview/adminshow/(.+)'] = "$1";

if (config_item('uri_segment_admin') !== 'admin') {
	$route['admin'] = '_show404notfounderrorpage';
	$route[config_item('uri_segment_admin')] = 'admin';

	$route['admin/(.+)'] = '_show404notfounderrorpage';
	$route[config_item('uri_segment_admin') . '/(.+)'] = "admin/$1";
}

$route[config_item('uri_segment_board') . '/([a-zA-Z0-9_-]+)'] = "board_post/lists/$1";
if (strtoupper(config_item('uri_segment_post_type')) === 'B') {
	$route['([a-zA-Z0-9_-]+)/' . config_item('uri_segment_post') . '/([0-9]+)'] = "board_post/post/$2";
} else if (strtoupper(config_item('uri_segment_post_type')) === 'C') {
	$route[config_item('uri_segment_post') . '/([a-zA-Z0-9_-]+)/([0-9]+)'] = "board_post/post/$2";
} else {
	$route[config_item('uri_segment_post') . '/([0-9]+)'] = "board_post/post/$1";
}
$route[config_item('uri_segment_write') . '/([a-zA-Z0-9_-]+)'] = "board_write/write/$1";
$route[config_item('uri_segment_reply') . '/([0-9]+)'] = "board_write/reply/$1";
$route[config_item('uri_segment_modify') . '/([0-9]+)'] = "board_write/modify/$1";
$route[config_item('uri_segment_rss') . '/([a-zA-Z0-9_-]+)'] = "rss/index/$1";
$route[config_item('uri_segment_group') . '/([a-zA-Z0-9_-]+)'] = "group/index/$1";
$route[config_item('uri_segment_document') . '/([a-zA-Z0-9_-]+)'] = "document/index/$1";
$route[config_item('uri_segment_faq') . '/([a-zA-Z0-9_-]+)'] = "faq/index/$1";
$route['profile/([a-zA-Z0-9_-]+)'] = "profile/index/$1";
$route['print/([0-9]+)'] = "board_post/post/$1/print";
$route['sitemap\.xml'] = "sitemap";
$route['sitemap_([0-9_-]+)\.xml'] = "sitemap/board/$1";

$route[config_item('uri_segment_cmall_item') . '/([a-zA-Z0-9_-]+)'] = "cmall/item/$1";


$route['files/(:any)/(:any)/(:any)/(:any)/(:any)'] = "files";
$route['files/(:any)/(:any)/(:any)/(:any)'] = "files";
$route['files/(:any)/(:any)/(:any)'] = "files";
$route['viewFiles/(:any)'] = "viewFiles";

$route['downFiles/(:any)'] = "downFiles";
$route['downFiles/(:any)/(:any)'] = "downFiles";

$route['ajax/splash-seen']   = 'main/ajaxMarkSplashSeen';
$route['ajax/i18n']          = 'main/ajaxI18n';        // 선택: 라벨 텍스트용


$route['ajax/splash-seen']                = 'main/ajaxMarkSplashSeen';
$route['ajax/i18n']                       = 'main/ajaxI18n';

$route['api/store/search']          = 'api/store_search';
$route['api/store/list']            = 'api/store_list';
$route['api/store/detail/(:num)']   = 'api/store_detail/$1';
$route['api/coupon/list/(:num)']    = 'api/coupon_list/$1';
$route['api/coupon/detail/(:num)']  = 'api/coupon_detail/$1';
$route['api/coupon/use']            = 'api/coupon_use';


// Admin – Coupon
$route['admin/store/couponList']                              = '/admin/store/couponList/index';
$route['admin/store/couponList/store/(:num)']                 = '/admin/store/couponList/index/$1';            // 특정 상점 쿠폰 리스트
$route['admin/store/couponList/create/(:num)']                = '/admin/store/couponList/edit/$1';             // store_no
$route['admin/store/couponList/edit/(:num)/(:num)']           = '/admin/store/couponList/edit/$1/$2';          // store_no, coupon_no
$route['admin/store/couponList/save']                         = '/admin/store/couponList/save';
$route['admin/store/couponList/delete/(:num)/(:num)']         = '/admin/store/couponList/delete/$1/$2';        // store_no, coupon_no

$route['admin/store/CouponUsage/(:num)']        = 'admin/store/CouponUsage/index/$1';


// Admin - Category
$route['admin/store/category']                = 'admin/store/category/index';
$route['admin/store/category/create']         = 'admin/store/category/edit';
$route['admin/store/category/edit/(:num)']    = 'admin/store/category/edit/$1';
$route['admin/store/category/save']           = 'admin/store/category/save';
$route['admin/store/category/delete/(:num)']  = 'admin/store/category/delete/$1';

// Ajax (inline/interactive)
$route['admin/store/category/reorder']        = 'admin/store/category/reorder';
$route['admin/store/category/toggle']         = 'admin/store/category/toggle';
$route['admin/store/category/inline']         = 'admin/store/category/inline';
$route['admin/store/category/upload_icon']    = 'admin/store/category/upload_icon';
$route['api/category/list']             = 'api/api_list'; // 읽기 전용

$route['api/store/bycat/(:any)'] = 'api/store_bycat/$1';

$route['api/store/photos/(:num)'] = 'api/store_photos/$1';
$route['api/store/stamp'] = 'api/store_stamp';


// 관리자 사용통계(페이지)
$route['admin/store/couponStatics']                   = 'admin/stat/CouponStatics/index';

// Ajax
$route['admin/stat/couponStatics/summary']           = 'admin/stat/couponStatics/summary';
$route['admin/stat/couponStatics/top-stores']        = 'admin/stat/couponStatics/top_stores';
$route['admin/stat/couponStatics/top-coupons']       = 'admin/stat/couponStatics/top_coupons';
$route['admin/stat/couponStatics/device']            = 'admin/stat/couponStatics/device';

$route['admin/stat/couponStatics/heatmap']           = 'admin/stat/couponStatics/heatmap';
$route['admin/stat/couponStatics/coupon-table']      = 'admin/stat/couponStatics/coupon_table';

$route['admin/stat/couponStatics/export/csv']        = 'admin/stat/couponStatics/export_csv';
$route['admin/stat/couponStatics/export/xlsx']       = 'admin/stat/couponStatics/export_xlsx';  // ★ XLSX
$route['admin/stat/couponStatics/group/brand']       = 'admin/stat/couponStatics/group_brand';  // ★ 브랜드
$route['admin/stat/couponStatics/group/mall']        = 'admin/stat/couponStatics/group_mall';   // ★ 몰
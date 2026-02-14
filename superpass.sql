-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 26-02-02 14:39
-- 서버 버전: 10.11.15-MariaDB
-- PHP 버전: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `superpass`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_admin_auth`
--

CREATE TABLE `dsp_admin_auth` (
  `no` int(20) NOT NULL,
  `mem_userid` varchar(100) NOT NULL,
  `admin_role` varchar(30) NOT NULL,
  `regIP` varchar(30) NOT NULL,
  `regDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_admin_auth`
--

INSERT INTO `dsp_admin_auth` (`no`, `mem_userid`, `admin_role`, `regIP`, `regDate`) VALUES
(1, 'dpfla990113@gmail.com', 'cbconfigs', '192.168.0.1', '2025-11-02 17:03:49'),
(2, 'dpfla990113@gmail.com', 'cleanlog', '192.168.0.1', '2025-11-02 17:03:51'),
(3, 'dpfla990113@gmail.com', 'optimize', '192.168.0.1', '2025-11-02 17:03:52'),
(4, 'dpfla990113@gmail.com', 'pagemenu', '192.168.0.1', '2025-11-02 17:03:54'),
(5, 'dpfla990113@gmail.com', 'popup', '192.168.0.1', '2025-11-02 17:03:56'),
(6, 'dpfla990113@gmail.com', 'category', '192.168.0.1', '2025-11-02 17:04:04'),
(7, 'dpfla990113@gmail.com', 'branchList', '192.168.0.1', '2025-11-02 17:04:04'),
(8, 'dpfla990113@gmail.com', 'storeList', '192.168.0.1', '2025-11-02 17:04:05'),
(9, 'dpfla990113@gmail.com', 'couponStatics', '192.168.0.1', '2025-11-02 17:04:05'),
(10, 'dpfla990113@gmail.com', 'members', '192.168.0.1', '2025-11-02 17:04:06'),
(11, 'dpfla990113@gmail.com', 'loginlog', '192.168.0.1', '2025-11-02 17:04:07'),
(12, 'dpfla990113@gmail.com', 'adminauth', '192.168.0.1', '2025-11-02 17:04:09'),
(13, 'dpfla990113@gmail.com', 'boards', '192.168.0.1', '2025-11-02 17:04:13'),
(14, 'dpfla990113@gmail.com', 'statcounter', '192.168.0.1', '2025-11-02 17:04:19'),
(15, 'dpfla990113@gmail.com', 'registercounter', '192.168.0.1', '2025-11-02 17:04:23'),
(16, 'dpfla990113@gmail.com', 'currentvisitor', '192.168.0.1', '2025-11-02 17:04:25'),
(17, 'dpfla990113@gmail.com', 'registerlog', '192.168.0.1', '2025-11-02 17:04:26'),
(18, 'jsy@sfw.kr', 'storeList', '192.168.0.1', '2025-11-02 19:14:02'),
(19, 'jsy@sfw.kr', 'couponStatics', '192.168.0.1', '2025-11-02 19:14:05'),
(20, 'jsy@sfw.kr', 'statcounter', '192.168.0.1', '2025-11-02 19:14:07'),
(21, 'jsy@sfw.kr', 'banner', '192.168.0.1', '2025-11-02 19:14:11'),
(22, 'jsy@sfw.kr', 'couponList', '192.168.0.1', '2025-11-02 21:38:52'),
(23, 'dpfla990113@gmail.com', 'couponList', '192.168.0.1', '2025-11-02 21:41:27'),
(24, 'jsy@sfw.kr', 'stats', '192.168.0.1', '2025-11-07 17:49:10'),
(25, 'dpfla990113@gmail.com', 'stats', '192.168.0.1', '2025-11-07 17:49:13'),
(28, 'yelimc79@gmail.com', 'couponList', '210.120.40.117', '2025-11-27 13:42:32'),
(29, 'yelimc79@gmail.com', 'storeList', '210.120.40.117', '2025-11-27 13:42:34'),
(30, 'yelimc79@gmail.com', 'stats', '210.120.40.117', '2025-11-27 13:42:42'),
(32, 'yelimc79@gmail.com', 'stats', '192.168.0.1', '2025-11-27 13:43:55'),
(40, 'sunwha1003@gmail.com', 'storeList', '210.120.40.117', '2025-12-17 15:54:22'),
(41, 'sunwha1003@gmail.com', 'couponList', '210.120.40.117', '2025-12-17 15:54:25'),
(44, 'sunwha1003@gmail.com', 'stats', '210.120.40.117', '2025-12-17 15:54:32'),
(45, 'hyundaioutletddm@gmail.com', 'storeList', '210.120.40.117', '2025-12-17 16:09:52'),
(46, 'hyundaioutletddm@gmail.com', 'couponList', '210.120.40.117', '2025-12-17 16:09:52'),
(47, 'hyundaioutletddm@gmail.com', 'stats', '210.120.40.117', '2025-12-17 16:09:54');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_admin_auth_history`
--

CREATE TABLE `dsp_admin_auth_history` (
  `no` int(20) NOT NULL,
  `mem_userid` varchar(100) NOT NULL,
  `admin_role` varchar(30) NOT NULL,
  `origIP` varchar(30) DEFAULT NULL,
  `origDate` datetime DEFAULT NULL,
  `regIP` varchar(30) NOT NULL,
  `regDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_admin_auth_history`
--

INSERT INTO `dsp_admin_auth_history` (`no`, `mem_userid`, `admin_role`, `origIP`, `origDate`, `regIP`, `regDate`) VALUES
(1, 'yelimc79@gmail.com', 'cbconfigs', '210.120.40.117', '2025-11-27 13:42:20', '192.168.0.1', '2025-11-27 14:50:07'),
(2, 'yelimc79@gmail.com', 'category', '210.120.40.117', '2025-11-27 13:42:31', '192.168.0.1', '2025-11-27 14:50:13'),
(3, 'sunwha1003@gmail.com', 'couponList', '210.120.40.117', '2025-12-17 15:53:34', '192.168.0.1', '2025-12-17 15:53:36'),
(4, 'sunwha1003@gmail.com', 'storeList', '210.120.40.117', '2025-12-17 15:53:33', '192.168.0.1', '2025-12-17 15:53:36'),
(5, 'sunwha1003@gmail.com', 'stats', '210.120.40.117', '2025-12-17 15:53:45', '192.168.0.1', '2025-12-17 15:53:52'),
(6, 'sunwha1003@gmail.com', 'couponStatics', '210.120.40.117', '2025-12-17 15:53:42', '192.168.0.1', '2025-12-17 15:54:20'),
(7, 'sunwha1003@gmail.com', 'stats', '210.120.40.117', '2025-12-17 15:54:27', '210.120.40.117', '2025-12-17 15:54:28'),
(8, 'sunwha1003@gmail.com', 'couponStatics', '210.120.40.117', '2025-12-17 15:54:28', '210.120.40.117', '2025-12-17 15:54:33');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_attendance`
--

CREATE TABLE `dsp_attendance` (
  `att_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `att_point` int(11) NOT NULL DEFAULT 0,
  `att_memo` varchar(255) DEFAULT NULL,
  `att_continuity` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `att_ranking` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `att_date` date DEFAULT NULL,
  `att_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_autologin`
--

CREATE TABLE `dsp_autologin` (
  `aul_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `aul_key` varchar(255) NOT NULL DEFAULT '',
  `aul_ip` varchar(50) NOT NULL DEFAULT '',
  `aul_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_banner`
--

CREATE TABLE `dsp_banner` (
  `ban_id` int(11) UNSIGNED NOT NULL,
  `ban_store_id` int(20) DEFAULT NULL,
  `ban_start_date` date DEFAULT NULL,
  `ban_end_date` date DEFAULT NULL,
  `bng_name` varchar(100) NOT NULL DEFAULT '',
  `ban_title` varchar(255) NOT NULL DEFAULT '',
  `ban_desc` text DEFAULT NULL,
  `ban_url` varchar(255) NOT NULL DEFAULT '',
  `ban_target` varchar(255) NOT NULL DEFAULT '',
  `ban_device` varchar(255) NOT NULL DEFAULT '',
  `ban_width` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `ban_height` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `ban_hit` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ban_order` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ban_image` varchar(255) NOT NULL DEFAULT '',
  `ban_activated` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `ban_datetime` datetime DEFAULT NULL,
  `ban_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `bgColor` varchar(20) DEFAULT NULL,
  `menuColor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_banner`
--

INSERT INTO `dsp_banner` (`ban_id`, `ban_store_id`, `ban_start_date`, `ban_end_date`, `bng_name`, `ban_title`, `ban_desc`, `ban_url`, `ban_target`, `ban_device`, `ban_width`, `ban_height`, `ban_hit`, `ban_order`, `ban_image`, `ban_activated`, `ban_datetime`, `ban_ip`, `mem_id`, `bgColor`, `menuColor`) VALUES
(1, 5, '2025-11-02', '2025-11-14', 'event', 'Like. Dongdaemun homepage event', 'Like. Dongdaemun homepage event / Like. Dongdaemun homepage event / Like. Dongdaemun homepage event', 'https://www.ddm.go.kr/www/selectUserOnlineReceptionView.do?key=96&programKey=734', '_blank', 'all', 0, 0, 7, 1, '2025/11/e0b2bc9c42c22c6e8b87725fd0bfe490.jpg', 1, '2025-11-02 17:28:16', '192.168.0.1', 1, '#ffffff', '#000000'),
(2, 5, '2025-11-02', '2025-11-08', 'event', 'Dongdaemun Festival Expectations EVENT', 'Dongdaemun Festival Expectations EVENT', 'https://vo.la/3EGb5ZP', '_blank', 'all', 0, 0, 3, 2, '2025/11/f3822329630cd108c8f7916908a8e8b0.jpg', 1, '2025-11-02 17:30:41', '192.168.0.1', 1, '#000000', '#ffffff'),
(4, NULL, '2025-11-03', '2025-11-30', 'event', 'Dongdaemun Superpass Event', 'Starting Dongdaemun Superpass Event', 'https://superpass.sfw.kr', '_blank', 'all', 0, 0, 11, 1, '2025/11/931541b82849661f6ea83e24baaab8b3.jpg', 1, '2025-11-05 17:59:30', '192.168.0.1', 1, '#000000', '#ffffff');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_banner_click_log`
--

CREATE TABLE `dsp_banner_click_log` (
  `bcl_id` int(11) UNSIGNED NOT NULL,
  `ban_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED DEFAULT NULL,
  `bcl_datetime` datetime DEFAULT NULL,
  `bcl_ip` varchar(50) NOT NULL DEFAULT '',
  `bcl_referer` varchar(255) NOT NULL DEFAULT '',
  `bcl_url` varchar(255) NOT NULL DEFAULT '',
  `bcl_useragent` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_banner_click_log`
--

INSERT INTO `dsp_banner_click_log` (`bcl_id`, `ban_id`, `mem_id`, `bcl_datetime`, `bcl_ip`, `bcl_referer`, `bcl_url`, `bcl_useragent`) VALUES
(1, 1, 1, '2025-11-02 19:24:53', '192.168.0.1', 'https://superpass.sfw.kr/', 'https://www.ddm.go.kr/www/selectUserOnlineReceptionView.do?key=96&programKey=734', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(2, 2, 1, '2025-11-02 19:24:55', '192.168.0.1', 'https://superpass.sfw.kr/', 'https://vo.la/3EGb5ZP', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(3, 1, 1, '2025-11-02 23:30:21', '192.168.0.1', 'https://superpass.sfw.kr/', 'https://www.ddm.go.kr/www/selectUserOnlineReceptionView.do?key=96&programKey=734', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(4, 2, 1, '2025-11-02 23:30:23', '192.168.0.1', 'https://superpass.sfw.kr/', 'https://vo.la/3EGb5ZP', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(5, 2, 5, '2025-11-03 16:05:08', '192.168.0.1', 'https://superpass.sfw.kr/', 'https://vo.la/3EGb5ZP', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(6, 1, 1, '2025-11-04 15:08:05', '210.120.40.117', 'https://superpass.sfw.kr/', 'https://www.ddm.go.kr/www/selectUserOnlineReceptionView.do?key=96&programKey=734', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(7, 1, 0, '2025-11-05 17:22:33', '39.7.231.8', 'https://superpass.sfw.kr/', 'https://www.ddm.go.kr/www/selectUserOnlineReceptionView.do?key=96&programKey=734', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/393.0.825685754 Mobile/15E148 Safari/604.1'),
(8, 1, 11, '2025-11-05 17:22:34', '210.120.40.117', 'https://superpass.sfw.kr/', 'https://www.ddm.go.kr/www/selectUserOnlineReceptionView.do?key=96&programKey=734', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(9, 4, 0, '2025-11-05 18:06:10', '192.168.0.1', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(10, 1, 11, '2025-11-07 09:43:54', '210.120.40.53', 'https://superpass.sfw.kr/', 'https://www.ddm.go.kr/www/selectUserOnlineReceptionView.do?key=96&programKey=734', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36'),
(11, 1, 11, '2025-11-07 10:04:16', '210.120.40.53', 'https://superpass.sfw.kr/', 'https://www.ddm.go.kr/www/selectUserOnlineReceptionView.do?key=96&programKey=734', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
(12, 4, 8, '2025-11-18 09:56:01', '211.234.226.174', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)'),
(13, 4, 0, '2025-11-18 10:01:55', '192.168.0.1', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(14, 4, 0, '2025-11-23 00:27:34', '110.14.131.124', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)'),
(15, 4, 13, '2025-11-25 10:00:29', '218.152.37.122', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1'),
(16, 4, 15, '2025-11-25 11:07:08', '218.153.127.49', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36'),
(17, 4, 0, '2025-11-25 12:37:23', '118.235.2.220', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (Linux; Android 15; SM-S928N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.102 Mobile Safari/537.36 KAKAOTALK/25.10.1 (INAPP)'),
(18, 4, 17, '2025-11-25 13:57:09', '211.59.179.170', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
(19, 4, 0, '2025-11-25 18:03:08', '121.129.23.77', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36'),
(20, 4, 21, '2025-11-27 16:57:51', '118.235.4.63', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
(21, 4, 0, '2025-11-30 15:45:54', '110.14.131.124', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.10.2 (INAPP) KAKAOTALK/25.10.2 (INAPP)');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_banner_group`
--

CREATE TABLE `dsp_banner_group` (
  `bng_id` int(11) UNSIGNED NOT NULL,
  `bng_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_banner_group`
--

INSERT INTO `dsp_banner_group` (`bng_id`, `bng_name`) VALUES
(1, 'event');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_blame`
--

CREATE TABLE `dsp_blame` (
  `bla_id` int(11) UNSIGNED NOT NULL,
  `target_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `target_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `target_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `bla_datetime` datetime DEFAULT NULL,
  `bla_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_board`
--

CREATE TABLE `dsp_board` (
  `brd_id` int(11) UNSIGNED NOT NULL,
  `bgr_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_key` varchar(100) NOT NULL DEFAULT '',
  `brd_name` varchar(255) NOT NULL DEFAULT '',
  `brd_mobile_name` varchar(255) NOT NULL DEFAULT '',
  `brd_order` int(11) NOT NULL DEFAULT 0,
  `brd_search` tinyint(4) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_board_admin`
--

CREATE TABLE `dsp_board_admin` (
  `bam_id` int(11) UNSIGNED NOT NULL,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_board_category`
--

CREATE TABLE `dsp_board_category` (
  `bca_id` int(11) UNSIGNED NOT NULL,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `bca_key` varchar(255) NOT NULL DEFAULT '',
  `bca_value` varchar(255) NOT NULL DEFAULT '',
  `bca_parent` varchar(255) NOT NULL DEFAULT '',
  `bca_order` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_board_group`
--

CREATE TABLE `dsp_board_group` (
  `bgr_id` int(11) UNSIGNED NOT NULL,
  `bgr_key` varchar(100) NOT NULL DEFAULT '',
  `bgr_name` varchar(255) NOT NULL DEFAULT '',
  `bgr_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_board_group_admin`
--

CREATE TABLE `dsp_board_group_admin` (
  `bga_id` int(11) UNSIGNED NOT NULL,
  `bgr_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_board_group_meta`
--

CREATE TABLE `dsp_board_group_meta` (
  `bgr_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `bgm_key` varchar(100) NOT NULL DEFAULT '',
  `bgm_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_board_meta`
--

CREATE TABLE `dsp_board_meta` (
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `bmt_key` varchar(100) NOT NULL DEFAULT '',
  `bmt_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_branch`
--

CREATE TABLE `dsp_branch` (
  `no` int(20) UNSIGNED NOT NULL,
  `year` int(10) DEFAULT 2024,
  `sNameKR` varchar(100) NOT NULL,
  `sNameEN` varchar(100) DEFAULT NULL,
  `sDescKR` text DEFAULT NULL,
  `sDescEN` text DEFAULT NULL,
  `sAddr1KR` varchar(200) DEFAULT NULL,
  `sAddr2KR` varchar(200) DEFAULT NULL,
  `sAddr3KR` varchar(200) DEFAULT NULL,
  `sAddr1EN` varchar(200) DEFAULT NULL,
  `sAddr2EN` varchar(200) DEFAULT NULL,
  `sAddr3EN` varchar(200) DEFAULT NULL,
  `sContact` varchar(200) DEFAULT NULL,
  `mapLat` varchar(30) DEFAULT NULL,
  `mapLng` varchar(30) DEFAULT NULL,
  `sOpenTime` varchar(200) DEFAULT NULL,
  `sLink1` varchar(200) DEFAULT NULL,
  `sLink2` varchar(200) DEFAULT NULL,
  `sLink3` varchar(200) DEFAULT NULL,
  `sMainIMG_Name` varchar(100) DEFAULT NULL,
  `sMainIMG_Source` varchar(100) DEFAULT NULL,
  `sAddFieldKR` text DEFAULT NULL,
  `sAddFieldEN` text DEFAULT NULL,
  `isUse` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isStamp` enum('Y','N') NOT NULL DEFAULT 'N',
  `isMajor` enum('Y','N') DEFAULT 'N',
  `regIP` varchar(50) NOT NULL,
  `regDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_branch`
--

INSERT INTO `dsp_branch` (`no`, `year`, `sNameKR`, `sNameEN`, `sDescKR`, `sDescEN`, `sAddr1KR`, `sAddr2KR`, `sAddr3KR`, `sAddr1EN`, `sAddr2EN`, `sAddr3EN`, `sContact`, `mapLat`, `mapLng`, `sOpenTime`, `sLink1`, `sLink2`, `sLink3`, `sMainIMG_Name`, `sMainIMG_Source`, `sAddFieldKR`, `sAddFieldEN`, `isUse`, `isStamp`, `isMajor`, `regIP`, `regDate`) VALUES
(1, NULL, 'DDP 동대문 디자인 플라자', 'DDP (Dongdaemun Design Plaza)', '', '', '서울 중구 을지로 281', '', ' (을지로7가)', '281 Eulji-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 7(chil)-ga)', '+82-2-2153-0000', '37.56716814095315', '127.00934958397285', 'AM 10:00 - PM 08:00', 'https://ddp.or.kr/', 'ddp_seoul', '', 'ddp_img.jpg', '8ef52f7d1101328bf6959e0f9221edde.jpg', '[]', '[]', 'Y', 'N', 'Y', '192.168.0.1', '2025-11-05 23:29:14'),
(2, NULL, '두타몰', 'Doota Mall', '', '', '서울 중구 장충단로 275', '', ' (을지로6가)', '275 Jangchungdan-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 6(yuk)-ga)', '+82-2-3398-3333', '37.5688849422849', '127.008775114213', 'AM 10:30 - PM 00:00', 'https://www.doota-mall.com/', '', '', 'KakaoTalk_20251217_161627648.jpg', 'fabf3e36f81cf2888e67c954484bbe9a.jpg', '[]', '[]', 'Y', 'N', 'Y', '210.120.40.117', '2025-12-17 16:19:54'),
(3, NULL, '현대아울렛 동대문점', 'HYUNDAI OUTLETS DONGDAEMUN', '', '', '서울 중구 장충단로13길 20', '', ' (을지로6가)', '20 Jangchungdan-ro 13-gil, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 6(yuk)-ga)', '+82-2283-2233', '37.568734553218', '127.007666479829', 'AM 10:30 - PM 09:00', 'https://www.ehyundai.com/newPortal/outlet/DP/DP000000_V.do?branchCd=B00173000', '', '', '제목-없음-3.jpg', '3088ff4416997ca854f688facc0069be.jpg', '[]', '[]', 'Y', 'N', 'Y', '210.120.40.53', '2025-10-16 16:45:07'),
(5, NULL, '동대문 지역상권', 'DDM Local commercial district', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL, '[]', '[]', 'Y', 'N', 'N', '192.168.0.1', '2025-10-08 08:37:17');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_branch_file_upload`
--

CREATE TABLE `dsp_branch_file_upload` (
  `no` int(20) NOT NULL,
  `branchNo` int(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `client_name` varchar(200) DEFAULT NULL,
  `file_data` text DEFAULT NULL,
  `file_explain` varchar(200) DEFAULT NULL,
  `regIP` varchar(50) NOT NULL,
  `regDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_branch_file_upload`
--

INSERT INTO `dsp_branch_file_upload` (`no`, `branchNo`, `year`, `type`, `file_name`, `client_name`, `file_data`, `file_explain`, `regIP`, `regDate`) VALUES
(1, 1, '2024', 'branchExplain', 'o_1isb1psjd1u4f1ndt1u1tj0pdnrc.jpg', 'bgLogin.jpg', '{\"id\":\"o_1isb1psjd1u4f1ndt1u1tj0pdnrc\",\"name\":\"bgLogin.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":509614,\"origSize\":509614,\"loaded\":509614,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-05-25T13:26:02.020Z\",\"completeTimestamp\":1748422686732,\"target_name\":\"o_1isb1psjd1u4f1ndt1u1tj0pdnrc.jpg\"}', '', '192.168.0.1', '2025-05-28 17:58:09'),
(2, 1, '2024', 'branchExplain', 'o_1isb1psjdq2899s1ndegmj15tpd.jpg', 'ddp_img.jpg', '{\"id\":\"o_1isb1psjdq2899s1ndegmj15tpd\",\"name\":\"ddp_img.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":368410,\"origSize\":368410,\"loaded\":368410,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-05-28T08:26:44.988Z\",\"completeTimestamp\":1748422686746,\"target_name\":\"o_1isb1psjdq2899s1ndegmj15tpd.jpg\"}', '', '192.168.0.1', '2025-05-28 17:58:10'),
(4, 2, '2024', 'branchExplain', 'o_1isbkk7khde31sid16o99iv946e.jpg', '8826-1422226428.jpg', '{\"id\":\"o_1isbkk7khde31sid16o99iv946e\",\"name\":\"8826-1422226428.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":158324,\"origSize\":158324,\"loaded\":158324,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-05-25T10:50:40.651Z\",\"completeTimestamp\":1748442424343,\"target_name\":\"o_1isbkk7khde31sid16o99iv946e.jpg\"}', '', '192.168.0.1', '2025-05-28 23:27:08'),
(5, 2, '2024', 'branchExplain', 'o_1isbkk7kh8410ad1h0nvqmjimf.jpg', '두타이미지.jpg', '{\"id\":\"o_1isbkk7kh8410ad1h0nvqmjimf\",\"name\":\"두타이미지.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":218750,\"origSize\":218750,\"loaded\":218750,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-05-28T08:21:59.514Z\",\"completeTimestamp\":1748442424357,\"target_name\":\"o_1isbkk7kh8410ad1h0nvqmjimf.jpg\"}', '', '192.168.0.1', '2025-05-28 23:27:08'),
(6, 2, '2025', 'branchExplain', 'o_1jclioviq494rkt1c1tc77sgii.jpg', 'KakaoTalk_20251217_161627648.jpg', '{\"id\":\"o_1jclioviq494rkt1c1tc77sgii\",\"name\":\"KakaoTalk_20251217_161627648.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":1455458,\"origSize\":1455458,\"loaded\":1455458,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-12-17T07:16:47.943Z\",\"completeTimestamp\":1765955967777,\"target_name\":\"o_1jclioviq494rkt1c1tc77sgii.jpg\"}', '', '210.120.40.117', '2025-12-17 16:19:30');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_cart`
--

CREATE TABLE `dsp_cmall_cart` (
  `cct_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cde_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cct_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cct_cart` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cct_order` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cct_datetime` datetime DEFAULT NULL,
  `cct_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_category`
--

CREATE TABLE `dsp_cmall_category` (
  `cca_id` int(11) UNSIGNED NOT NULL,
  `cca_value` varchar(255) NOT NULL DEFAULT '',
  `cca_parent` varchar(255) NOT NULL DEFAULT '',
  `cca_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_category_rel`
--

CREATE TABLE `dsp_cmall_category_rel` (
  `ccr_id` int(11) UNSIGNED NOT NULL,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cca_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_demo_click_log`
--

CREATE TABLE `dsp_cmall_demo_click_log` (
  `cdc_id` int(11) UNSIGNED NOT NULL,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cdc_type` varchar(50) NOT NULL DEFAULT '',
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cdc_datetime` datetime DEFAULT NULL,
  `cdc_ip` varchar(50) NOT NULL DEFAULT '',
  `cdc_useragent` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_download_log`
--

CREATE TABLE `dsp_cmall_download_log` (
  `cdo_id` int(11) UNSIGNED NOT NULL,
  `cde_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cdo_datetime` datetime DEFAULT NULL,
  `cdo_ip` varchar(50) NOT NULL DEFAULT '',
  `cdo_useragent` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_item`
--

CREATE TABLE `dsp_cmall_item` (
  `cit_id` int(11) UNSIGNED NOT NULL,
  `cit_key` varchar(100) NOT NULL DEFAULT '',
  `cit_name` varchar(255) NOT NULL DEFAULT '',
  `cit_order` int(11) NOT NULL DEFAULT 0,
  `cit_type1` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cit_type2` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cit_type3` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cit_type4` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cit_status` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cit_summary` text DEFAULT NULL,
  `cit_content` mediumtext DEFAULT NULL,
  `cit_mobile_content` mediumtext DEFAULT NULL,
  `cit_content_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cit_price` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_file_1` varchar(255) NOT NULL DEFAULT '',
  `cit_file_2` varchar(255) NOT NULL DEFAULT '',
  `cit_file_3` varchar(255) NOT NULL DEFAULT '',
  `cit_file_4` varchar(255) NOT NULL DEFAULT '',
  `cit_file_5` varchar(255) NOT NULL DEFAULT '',
  `cit_file_6` varchar(255) NOT NULL DEFAULT '',
  `cit_file_7` varchar(255) NOT NULL DEFAULT '',
  `cit_file_8` varchar(255) NOT NULL DEFAULT '',
  `cit_file_9` varchar(255) NOT NULL DEFAULT '',
  `cit_file_10` varchar(255) NOT NULL DEFAULT '',
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_hit` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_datetime` datetime DEFAULT NULL,
  `cit_updated_datetime` datetime DEFAULT NULL,
  `cit_sell_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_wish_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_download_days` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_review_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_review_average` decimal(2,1) NOT NULL DEFAULT 0.0,
  `cit_qna_count` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_item_detail`
--

CREATE TABLE `dsp_cmall_item_detail` (
  `cde_id` int(11) UNSIGNED NOT NULL,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cde_title` varchar(255) NOT NULL DEFAULT '',
  `cde_price` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cde_originname` varchar(255) NOT NULL DEFAULT '',
  `cde_filename` varchar(255) NOT NULL DEFAULT '',
  `cde_download` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cde_filesize` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cde_type` varchar(10) NOT NULL DEFAULT '',
  `cde_is_image` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cde_datetime` datetime DEFAULT NULL,
  `cde_ip` varchar(50) NOT NULL DEFAULT '',
  `cde_status` tinyint(4) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_item_history`
--

CREATE TABLE `dsp_cmall_item_history` (
  `chi_id` int(11) UNSIGNED NOT NULL,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `chi_title` varchar(255) NOT NULL DEFAULT '',
  `chi_content` mediumtext DEFAULT NULL,
  `chi_content_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `chi_ip` varchar(50) NOT NULL DEFAULT '',
  `chi_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_item_meta`
--

CREATE TABLE `dsp_cmall_item_meta` (
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cim_key` varchar(100) NOT NULL DEFAULT '',
  `cim_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_order`
--

CREATE TABLE `dsp_cmall_order` (
  `cor_id` bigint(20) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_nickname` varchar(100) NOT NULL DEFAULT '',
  `mem_realname` varchar(100) NOT NULL DEFAULT '',
  `mem_email` varchar(100) NOT NULL DEFAULT '',
  `mem_phone` varchar(255) NOT NULL DEFAULT '',
  `cor_memo` text DEFAULT NULL,
  `cor_total_money` int(11) NOT NULL DEFAULT 0,
  `cor_deposit` int(11) NOT NULL DEFAULT 0,
  `cor_cash_request` int(11) NOT NULL DEFAULT 0,
  `cor_cash` int(11) NOT NULL DEFAULT 0,
  `cor_content` text DEFAULT NULL,
  `cor_pay_type` varchar(100) NOT NULL DEFAULT '',
  `cor_pg` varchar(255) NOT NULL DEFAULT '',
  `cor_tno` varchar(255) NOT NULL DEFAULT '',
  `cor_app_no` varchar(255) NOT NULL DEFAULT '',
  `cor_bank_info` varchar(255) NOT NULL DEFAULT '',
  `cor_admin_memo` text DEFAULT NULL,
  `cor_datetime` datetime DEFAULT NULL,
  `cor_approve_datetime` datetime DEFAULT NULL,
  `cor_ip` varchar(50) NOT NULL DEFAULT '',
  `cor_useragent` varchar(255) NOT NULL DEFAULT '',
  `cor_status` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cor_vbank_expire` datetime DEFAULT NULL,
  `is_test` char(1) NOT NULL DEFAULT '',
  `status` varchar(255) NOT NULL DEFAULT '',
  `cor_refund_price` int(11) NOT NULL DEFAULT 0,
  `cor_order_history` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_order_detail`
--

CREATE TABLE `dsp_cmall_order_detail` (
  `cod_id` int(11) UNSIGNED NOT NULL,
  `cor_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cde_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cod_download_days` int(11) NOT NULL DEFAULT 0,
  `cod_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cod_status` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_qna`
--

CREATE TABLE `dsp_cmall_qna` (
  `cqa_id` int(11) UNSIGNED NOT NULL,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cqa_title` varchar(255) NOT NULL DEFAULT '',
  `cqa_content` mediumtext DEFAULT NULL,
  `cqa_content_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cqa_reply_content` mediumtext DEFAULT NULL,
  `cqa_reply_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cqa_secret` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cqa_receive_email` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cqa_receive_sms` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cqa_datetime` datetime DEFAULT NULL,
  `cqa_ip` varchar(50) NOT NULL DEFAULT '',
  `cqa_reply_datetime` datetime DEFAULT NULL,
  `cqa_reply_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cqa_reply_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_review`
--

CREATE TABLE `dsp_cmall_review` (
  `cre_id` int(11) UNSIGNED NOT NULL,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cre_title` varchar(255) NOT NULL DEFAULT '',
  `cre_content` mediumtext DEFAULT NULL,
  `cre_content_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cre_score` tinyint(4) NOT NULL DEFAULT 0,
  `cre_datetime` datetime DEFAULT NULL,
  `cre_ip` varchar(50) NOT NULL DEFAULT '',
  `cre_status` tinyint(4) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_cmall_wishlist`
--

CREATE TABLE `dsp_cmall_wishlist` (
  `cwi_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cit_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cwi_datetime` datetime DEFAULT NULL,
  `cwi_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_comment`
--

CREATE TABLE `dsp_comment` (
  `cmt_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cmt_num` int(11) NOT NULL DEFAULT 0,
  `cmt_reply` varchar(20) NOT NULL DEFAULT '',
  `cmt_html` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cmt_secret` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `cmt_content` text DEFAULT NULL,
  `mem_id` int(11) NOT NULL DEFAULT 0,
  `cmt_password` varchar(255) NOT NULL DEFAULT '',
  `cmt_userid` varchar(100) NOT NULL DEFAULT '',
  `cmt_username` varchar(100) NOT NULL DEFAULT '',
  `cmt_nickname` varchar(100) NOT NULL DEFAULT '',
  `cmt_email` varchar(255) NOT NULL DEFAULT '',
  `cmt_homepage` text DEFAULT NULL,
  `cmt_datetime` datetime DEFAULT NULL,
  `cmt_updated_datetime` datetime DEFAULT NULL,
  `cmt_ip` varchar(50) NOT NULL DEFAULT '',
  `cmt_like` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cmt_dislike` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cmt_blame` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `cmt_device` varchar(10) NOT NULL DEFAULT '',
  `cmt_del` tinyint(4) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_comment_meta`
--

CREATE TABLE `dsp_comment_meta` (
  `cmt_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cme_key` varchar(100) NOT NULL DEFAULT '',
  `cme_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_config`
--

CREATE TABLE `dsp_config` (
  `cfg_key` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_config`
--

INSERT INTO `dsp_config` (`cfg_key`, `cfg_value`) VALUES
('admin_logo', 'Admin'),
('bitly_access_token', ''),
('block_download_zeropoint', '1'),
('block_read_zeropoint', '1'),
('block_write_zeropoint', ''),
('cb_version', '3.0.4'),
('change_nickname_date', '60'),
('change_open_profile_date', '60'),
('change_password_date', '0'),
('change_use_note_date', '60'),
('cmall_email_admin_approve_bank_to_contents_title', '[입금처리완료] {회원닉네임}님의 입금처리요청이 완료되었습니다'),
('cmall_email_admin_bank_to_contents_title', '[주문안내] {회원닉네임}님이 무통장입금 요청하셨습니다'),
('cmall_email_admin_cash_to_contents_title', '[주문안내] {회원닉네임}님이 결제하셨습니다'),
('cmall_email_admin_write_product_qna_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[문의제목]</strong></div><div>{문의제목}</div><div>&nbsp;</div><div><strong>[문의내용]</strong></div><div>{문의내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_email_admin_write_product_qna_reply_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[문의제목]</strong></div><div>{문의제목}</div><div>&nbsp;</div><div><strong>[답변내용]</strong></div><div>{답변내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_email_admin_write_product_qna_reply_title', '[상품문의] {상품명} 상품 문의에 대한 답변이 등록되었습니다'),
('cmall_email_admin_write_product_qna_title', '[상품문의] {상품명} 상품 문의가 작성되었습니다'),
('cmall_email_admin_write_product_review_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[후기제목]</strong></div><div>{후기제목}</div><div>&nbsp;</div><div><strong>[후기내용]</strong></div><div>{후기내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_email_admin_write_product_review_title', '[상품후기] {상품명} 상품 후기가 작성되었습니다'),
('cmall_email_user_approve_bank_to_contents_title', '[{홈페이지명}] 입금이 확인되어 주문처리가 완료되었습니다'),
('cmall_email_user_bank_to_contents_title', '[{홈페이지명}] 구매신청이접수되었습니다.입금확인후상품이용가능합니다'),
('cmall_email_user_cash_to_contents_title', '[{홈페이지명}] 상품을 구매해주셔서 감사합니다'),
('cmall_email_user_write_product_qna_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[문의제목]</strong></div><div>{문의제목}</div><div>&nbsp;</div><div><strong>[문의내용]</strong></div><div>{문의내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_email_user_write_product_qna_reply_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[문의제목]</strong></div><div>{문의제목}</div><div>&nbsp;</div><div><strong>[답변내용]</strong></div><div>{답변내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_email_user_write_product_qna_reply_title', '[홈페이지명] {상품명} 상품 문의에 대한 답변입니다'),
('cmall_email_user_write_product_qna_title', '[홈페이지명] {상품명} 상품 문의가 접수되었습니다'),
('cmall_email_user_write_product_review_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[후기제목]</strong></div><div>{후기제목}</div><div>&nbsp;</div><div><strong>[후기내용]</strong></div><div>{후기내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_email_user_write_product_review_title', '[홈페이지명] {상품명} 상품 후기를 작성해주셔서 감사합니다'),
('cmall_note_admin_approve_bank_to_contents_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님의 입금확인 처리가 완료되었습니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('cmall_note_admin_approve_bank_to_contents_title', '[입금처리완료] {회원닉네임}님의 입금처리요청이 완료되었습니다'),
('cmall_note_admin_bank_to_contents_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님이 무통장입금요청하셨습니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('cmall_note_admin_bank_to_contents_title', '[주문안내] {회원닉네임}님이 무통장입금 요청하셨습니다'),
('cmall_note_admin_cash_to_contents_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님이 상품을 구매하셨습니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('cmall_note_admin_cash_to_contents_title', '[주문안내] {회원닉네임}님이 결제하셨습니다'),
('cmall_note_admin_write_product_qna_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[문의제목]</strong></div><div>{문의제목}</div><div>&nbsp;</div><div><strong>[문의내용]</strong></div><div>{문의내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_note_admin_write_product_qna_reply_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[문의제목]</strong></div><div>{문의제목}</div><div>&nbsp;</div><div><strong>[답변내용]</strong></div><div>{답변내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_note_admin_write_product_qna_reply_title', '[상품문의] {상품명} 상품 문의에 대한 답변이 등록되었습니다'),
('cmall_note_admin_write_product_qna_title', '[상품문의] {상품명} 상품 문의가 작성되었습니다'),
('cmall_note_admin_write_product_review_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[후기제목]</strong></div><div>{후기제목}</div><div>&nbsp;</div><div><strong>[후기내용]</strong></div><div>{후기내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_note_admin_write_product_review_title', '[상품후기] {상품명} 상품 후기가 작성되었습니다'),
('cmall_note_user_approve_bank_to_contents_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>구매해주셔서 감사합니다</p><p>입금이 확인되어 이제 정상적으로 상품 이용이 가능합니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('cmall_note_user_approve_bank_to_contents_title', '입금이 확인되어 주문처리가 완료되었습니다'),
('cmall_note_user_bank_to_contents_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>구매해주셔서 감사합니다</p><p>입금이 확인되는대로 승인처리해드리겠습니다</p><p>결제금액 : {결제금액}원</p><p>은행계좌안내 : {은행계좌안내}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('cmall_note_user_bank_to_contents_title', '구매신청이접수되었습니다.입금확인후상품이용가능합니다'),
('cmall_note_user_cash_to_contents_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>구매해주셔서 감사합니다</p><p>구매하신 상품 이용이 가능합니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('cmall_note_user_cash_to_contents_title', '상품을 구매해주셔서 감사합니다'),
('cmall_note_user_write_product_qna_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[문의제목]</strong></div><div>{문의제목}</div><div>&nbsp;</div><div><strong>[문의내용]</strong></div><div>{문의내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_note_user_write_product_qna_reply_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[문의제목]</strong></div><div>{문의제목}</div><div>&nbsp;</div><div><strong>[답변내용]</strong></div><div>{답변내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_note_user_write_product_qna_reply_title', '{상품명} 상품 문의에 대한 답변입니다'),
('cmall_note_user_write_product_qna_title', '{상품명} 상품 문의가 접수되었습니다'),
('cmall_note_user_write_product_review_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><strong>[후기제목]</strong></div><div>{후기제목}</div><div>&nbsp;</div><div><strong>[후기내용]</strong></div><div>{후기내용}</div><div>&nbsp;</div><div><a href=\"{상품주소}\" target=\"_blank\"><strong>[상품페이지 보기]</strong></a></div><p>&nbsp;</p></td></tr></table>'),
('cmall_note_user_write_product_review_title', '{상품명} 상품 후기를 작성해주셔서 감사합니다'),
('cmall_sms_admin_approve_bank_to_contents_content', '[무통장입금확인] {회원닉네임}님의 무통장입금요청이확인되었습니다'),
('cmall_sms_admin_bank_to_contents_content', '[무통장입금요청] {회원닉네임}님이 무통장입금요청하였습니다'),
('cmall_sms_admin_cash_to_contents_content', '[구매알림] {회원닉네임}님이 구매하셨습니다'),
('cmall_sms_admin_write_product_qna_content', '[상품문의] {상품명} 상품문의가 접수되었습니다'),
('cmall_sms_admin_write_product_qna_reply_content', '[상품문의] {상품명} 상품문의답변이 등록되었습니다'),
('cmall_sms_admin_write_product_review_content', '[상품후기] {상품명} 상품후기가 작성되었습니다'),
('cmall_sms_user_approve_bank_to_contents_content', '[{홈페이지명}] 입금이확인되었습니다. 구매하신상품다운로드가가능합니다'),
('cmall_sms_user_bank_to_contents_content', '[{홈페이지명}] 구매신청이접수되었습니다.입금확인후상품이용가능합니다'),
('cmall_sms_user_cash_to_contents_content', '[{홈페이지명}] 구매가완료되었습니다 감사합니다'),
('cmall_sms_user_write_product_qna_content', '[홈페이지명] {상품명} 상품문의가 접수되었습니다 감사합니다'),
('cmall_sms_user_write_product_qna_reply_content', '[홈페이지명] {상품명} 상품문의에 대한 답변이 등록되었습니다 감사합니다'),
('cmall_sms_user_write_product_review_content', '[홈페이지명] {상품명} 상품후기를 작성해주셔서 감사합니다'),
('currentvisitor_minute', '10'),
('denied_email_list', ''),
('denied_nickname_list', 'admin,administrator,관리자,운영자,어드민,주인장,webmaster,웹마스터,sysop,시삽,시샵,manager,매니저,메니저,root,루트,su,guest,방문객'),
('denied_userid_list', 'admin,administrator,webmaster,sysop,manager,root,su,guest,super'),
('deposit_email_admin_approve_bank_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님의 입금처리요청이 완료되었습니다</p><p>회원님께서 구매하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_admin_approve_bank_to_deposit_title', '[입금처리완료] {회원닉네임}님의 입금처리요청이 완료되었습니다'),
('deposit_email_admin_bank_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님이 무통장입금 요청하셨습니다</p><p>회원님께서 구매하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>통장에 입금된 내역이 확인되면 관리자페이지에서 입금완료 승인을 해주시기 바랍니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_admin_bank_to_deposit_title', '[무통장입금요청] {회원닉네임}님이 무통장입금 요청하셨습니다'),
('deposit_email_admin_cash_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님이 결제하셨습니다</p><p>회원님께서 결제하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_admin_cash_to_deposit_title', '[결제 알림] {회원닉네임}님이 결제하셨습니다'),
('deposit_email_admin_deposit_to_point_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임} 님이 포인트를 구매하셨습니다</p><p>회원님께서 구매하신 내용입니다</p><p> 포인트 : {전환포인트}점</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_admin_deposit_to_point_title', '[포인트 전환 알림] {회원닉네임}님이 포인트를 구매하셨습니다'),
('deposit_email_admin_point_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님이 포인트로 {예치금명} 구매하셨습니다</p><p>회원님께서 구매하신 내용입니다</p><p>사용포인트 : {전환포인트} 점</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_admin_point_to_deposit_title', '[구매 알림] {회원닉네임}님이 포인트로 {예치금명} 구매 하셨습니다'),
('deposit_email_user_approve_bank_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>{회원닉네임}님께서 구매요청하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>정상 구매가 완료되었습니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_user_approve_bank_to_deposit_title', '[{홈페이지명}] 구매해주셔서 감사합니다'),
('deposit_email_user_bank_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>{회원닉네임}님께서 구매요청하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>아래의 계좌번호로 입금부탁드립니다</p><p>은행안내 : {은행계좌안내}</p><p>입금이 확인되면 24시간 내에 처리가 완료됩니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_user_bank_to_deposit_title', '[{홈페이지명}] 무통장입금요청을 하셨습니다'),
('deposit_email_user_cash_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>구매해주셔서 감사합니다</p><p>{회원닉네임}님께서 구매하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_user_cash_to_deposit_title', '[{홈페이지명}] 결제가 완료되었습니다'),
('deposit_email_user_deposit_to_point_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>포인트를 구매해주셔서 감사합니다</p><p>{회원닉네임}님께서 구매하신 내용입니다</p><p> 포인트 : {전환포인트}점</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_user_deposit_to_point_title', '[{홈페이지명}] 포인트구매가 완료되었습니다'),
('deposit_email_user_point_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>구매해주셔서 감사합니다</p><p>회원님께서 구매하신 내용입니다</p><p>사용포인트 : {전환포인트} 점</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_email_user_point_to_deposit_title', '[{홈페이지명}] 포인트 결제가 완료되었습니다'),
('deposit_note_admin_approve_bank_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님의 입금처리요청이 완료되었습니다</p><p>회원님께서 구매하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_admin_approve_bank_to_deposit_title', '[입금처리완료] {회원닉네임}님의 입금처리요청이 완료되었습니다'),
('deposit_note_admin_bank_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님이 무통장입금 요청하셨습니다</p><p>회원님께서 구매하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>통장에 입금된 내역이 확인되면 관리자페이지에서 입금완료 승인을 해주시기 바랍니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_admin_bank_to_deposit_title', '[무통장입금요청] {회원닉네임}님이 무통장입금 요청하셨습니다'),
('deposit_note_admin_cash_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님이 결제하셨습니다</p><p>회원님께서 결제하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_admin_cash_to_deposit_title', '[결제 알림] {회원닉네임}님이 결제하셨습니다'),
('deposit_note_admin_deposit_to_point_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임} 님이 포인트를 구매하셨습니다</p><p>회원님께서 구매하신 내용입니다</p><p> 포인트 : {전환포인트}점</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_admin_deposit_to_point_title', '[포인트 전환 알림] {회원닉네임}님이 포인트를 구매하셨습니다'),
('deposit_note_admin_point_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>{회원닉네임}님이 포인트로 {예치금명} 구매하셨습니다</p><p>회원님께서 구매하신 내용입니다</p><p>사용포인트 : {전환포인트} 점</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_admin_point_to_deposit_title', '[구매 알림] {회원닉네임}님이 포인트로 {예치금명} 구매 하셨습니다'),
('deposit_note_user_approve_bank_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>{회원닉네임}님께서 구매요청하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>정상 구매가 완료되었습니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_user_approve_bank_to_deposit_title', '구매해주셔서 감사합니다'),
('deposit_note_user_bank_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>{회원닉네임}님께서 구매요청하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>아래의 계좌번호로 입금부탁드립니다</p><p>은행안내 : {은행계좌안내}</p><p>입금이 확인되면 24시간 내에 처리가 완료됩니다</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_user_bank_to_deposit_title', '무통장입금요청을 하셨습니다'),
('deposit_note_user_cash_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>구매해주셔서 감사합니다</p><p>{회원닉네임}님께서 구매하신 내용입니다</p><p>결제금액 : {결제금액} 원</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_user_cash_to_deposit_title', '결제가 완료되었습니다'),
('deposit_note_user_deposit_to_point_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요 {회원닉네임}님</p><p>포인트를 구매해주셔서 감사합니다</p><p>{회원닉네임}님께서 구매하신 내용입니다</p><p> 포인트 : {전환포인트}점</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_user_deposit_to_point_title', '포인트구매가 완료되었습니다'),
('deposit_note_user_point_to_deposit_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div><p>안녕하세요</p><p>구매해주셔서 감사합니다</p><p>회원님께서 구매하신 내용입니다</p><p>사용포인트 : {전환포인트} 점</p><p>전환되는 {예치금명} : {전환예치금액}{예치금단위}</p><p>감사합니다</p></div><p><a href=\"{홈페이지주소}\" target=\"_blank\" style=\"font-weight:bold;\">홈페이지 가기</a></p><p>&nbsp;</p></td></tr></table>'),
('deposit_note_user_point_to_deposit_title', '포인트 결제가 완료되었습니다'),
('deposit_sms_admin_approve_bank_to_deposit_content', '[입금처리완료] {회원닉네임}님의 {결제금액} 원 입금처리요청 완료'),
('deposit_sms_admin_bank_to_deposit_content', '[무통장입금요청] {회원닉네임}님, 결제요청금액 : {결제금액} 원'),
('deposit_sms_admin_cash_to_deposit_content', '[결제알림] {회원닉네임}님, 결제금액 : {결제금액} 원'),
('deposit_sms_admin_deposit_to_point_content', '[예치금->포인트 결제] {회원닉네임} 님 결제 완료'),
('deposit_sms_admin_point_to_deposit_content', '[포인트->예치금 결제] {회원닉네임} 님 결제 완료'),
('deposit_sms_user_approve_bank_to_deposit_content', '[{홈페이지명}] {결제금액}원 입금처리완료되었습니다. 감사합니다'),
('deposit_sms_user_bank_to_deposit_content', '[{홈페이지명}] 입금요청 : {결제금액} 원 - 감사합니다'),
('deposit_sms_user_cash_to_deposit_content', '[{홈페이지명}] 결제완료 : {결제금액} 원 - 감사합니다'),
('deposit_sms_user_deposit_to_point_content', '[{홈페이지명}] 결제완료 - 적립포인트 {전환포인트}점. 감사합니다'),
('deposit_sms_user_point_to_deposit_content', '[{홈페이지명}] 결제완료 - 전환{예치금명}:{전환예치금액}{예치금단위} 감사합니다'),
('document_content_target_blank', '1'),
('document_editor_type', 'smarteditor'),
('document_mobile_content_target_blank', ''),
('document_mobile_thumb_width', '400'),
('document_thumb_width', '700'),
('facebook_app_id', ''),
('facebook_secret', ''),
('faq_content_target_blank', '1'),
('faq_editor_type', 'smarteditor'),
('faq_mobile_content_target_blank', ''),
('faq_mobile_thumb_width', '400'),
('faq_thumb_width', '700'),
('footer_script', ''),
('formmail_editor_type', 'smarteditor'),
('google_client_id', '469168040220-cq46u3opaeh0bmb8v1h05v190dqpckra.apps.googleusercontent.com'),
('google_client_secret', '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'),
('ip_display_style', '1001'),
('jwplayer6_key', ''),
('kakao_apikey', ''),
('kakao_client_id', '616d1fc205602780c47dca3c84c3a232'),
('layout_board', ''),
('layout_currentvisitor', ''),
('layout_default', 'bootstrap'),
('layout_document', ''),
('layout_faq', ''),
('layout_findaccount', ''),
('layout_formmail', ''),
('layout_group', ''),
('layout_helptool', ''),
('layout_login', ''),
('layout_main', ''),
('layout_mypage', ''),
('layout_note', ''),
('layout_notification', ''),
('layout_profile', ''),
('layout_register', ''),
('layout_search', ''),
('layout_tag', ''),
('list_count', '20'),
('max_level', '100'),
('max_login_try_count', '5'),
('max_login_try_limit_second', '30'),
('member_dormant_auto_clean', ''),
('member_dormant_auto_email', ''),
('member_dormant_auto_email_days', '30'),
('member_dormant_days', '1825'),
('member_dormant_method', 'archive'),
('member_dormant_reset_point', '1'),
('member_icon_height', '20'),
('member_icon_width', '20'),
('member_photo_height', '80'),
('member_photo_width', '80'),
('member_register_policy1', '회원약관을 입력해주세요'),
('member_register_policy2', '개인정보취급방침을 입력해주세요'),
('mobile_layout_board', ''),
('mobile_layout_currentvisitor', ''),
('mobile_layout_default', 'bootstrap'),
('mobile_layout_document', ''),
('mobile_layout_faq', ''),
('mobile_layout_findaccount', ''),
('mobile_layout_formmail', ''),
('mobile_layout_group', ''),
('mobile_layout_helptool', ''),
('mobile_layout_login', ''),
('mobile_layout_main', ''),
('mobile_layout_mypage', ''),
('mobile_layout_note', ''),
('mobile_layout_notification', ''),
('mobile_layout_profile', ''),
('mobile_layout_register', ''),
('mobile_layout_search', ''),
('mobile_layout_tag', ''),
('mobile_sidebar_board', ''),
('mobile_sidebar_currentvisitor', ''),
('mobile_sidebar_default', ''),
('mobile_sidebar_document', ''),
('mobile_sidebar_faq', ''),
('mobile_sidebar_findaccount', ''),
('mobile_sidebar_group', ''),
('mobile_sidebar_login', ''),
('mobile_sidebar_main', ''),
('mobile_sidebar_mypage', ''),
('mobile_sidebar_notification', ''),
('mobile_sidebar_register', ''),
('mobile_sidebar_search', ''),
('mobile_sidebar_tag', ''),
('mobile_skin_board', ''),
('mobile_skin_currentvisitor', ''),
('mobile_skin_default', 'bootstrap'),
('mobile_skin_document', ''),
('mobile_skin_faq', ''),
('mobile_skin_findaccount', ''),
('mobile_skin_formmail', ''),
('mobile_skin_group', ''),
('mobile_skin_helptool', ''),
('mobile_skin_login', ''),
('mobile_skin_main', ''),
('mobile_skin_mypage', ''),
('mobile_skin_note', ''),
('mobile_skin_notification', ''),
('mobile_skin_popup', 'basic'),
('mobile_skin_profile', ''),
('mobile_skin_register', ''),
('mobile_skin_search', ''),
('mobile_skin_tag', ''),
('naver_blog_api_key', ''),
('naver_client_id', ''),
('naver_client_secret', ''),
('naver_syndi_key', ''),
('new_post_second', '30'),
('note_editor_type', 'smarteditor'),
('note_list_page', '10'),
('note_mobile_list_page', '10'),
('notification_comment', ''),
('notification_comment_comment', ''),
('notification_note', ''),
('notification_reply', ''),
('open_currentvisitor', ''),
('password_length', '8'),
('password_numbers_length', '1'),
('password_specialchars_length', '1'),
('password_uppercase_length', '1'),
('point_login', '5'),
('point_note', '10'),
('point_note_file', '0'),
('point_recommended', '5'),
('point_recommender', '5'),
('point_register', '50'),
('popup_content_target_blank', '1'),
('popup_editor_type', 'smarteditor'),
('popup_mobile_content_target_blank', ''),
('popup_mobile_thumb_width', '400'),
('popup_thumb_width', '700'),
('post_editor_type', 'smarteditor'),
('recaptcha_secret', ''),
('recaptcha_sitekey', ''),
('registerform', '{\"mem_userid\":{\"field_name\":\"mem_userid\",\"func\":\"basic\",\"display_name\":\"\\uc544\\uc774\\ub514\",\"field_type\":\"text\",\"use\":\"1\",\"open\":\"1\",\"required\":\"1\"},\"mem_email\":{\"field_name\":\"mem_email\",\"func\":\"basic\",\"display_name\":\"\\uc774\\uba54\\uc77c\\uc8fc\\uc18c\",\"field_type\":\"email\",\"use\":\"1\",\"open\":\"\",\"required\":\"1\"},\"mem_password\":{\"field_name\":\"mem_password\",\"func\":\"basic\",\"display_name\":\"\\ube44\\ubc00\\ubc88\\ud638\",\"field_type\":\"password\",\"use\":\"1\",\"open\":\"\",\"required\":\"1\"},\"mem_username\":{\"field_name\":\"mem_username\",\"func\":\"basic\",\"display_name\":\"\\uc774\\ub984\",\"field_type\":\"text\",\"use\":null,\"open\":null,\"required\":null},\"mem_nickname\":{\"field_name\":\"mem_nickname\",\"func\":\"basic\",\"display_name\":\"\\ub2c9\\ub124\\uc784\",\"field_type\":\"text\",\"use\":\"1\",\"open\":\"1\",\"required\":\"1\"},\"mem_homepage\":{\"field_name\":\"mem_homepage\",\"func\":\"basic\",\"display_name\":\"\\ud648\\ud398\\uc774\\uc9c0\",\"field_type\":\"url\",\"use\":null,\"open\":\"1\",\"required\":null},\"mem_phone\":{\"field_name\":\"mem_phone\",\"func\":\"basic\",\"display_name\":\"\\uc804\\ud654\\ubc88\\ud638\",\"field_type\":\"phone\",\"use\":null,\"open\":null,\"required\":null},\"mem_birthday\":{\"field_name\":\"mem_birthday\",\"func\":\"basic\",\"display_name\":\"\\uc0dd\\ub144\\uc6d4\\uc77c\",\"field_type\":\"date\",\"use\":null,\"open\":null,\"required\":null},\"mem_sex\":{\"field_name\":\"mem_sex\",\"func\":\"basic\",\"display_name\":\"\\uc131\\ubcc4\",\"field_type\":\"radio\",\"use\":null,\"open\":null,\"required\":null},\"mem_address\":{\"field_name\":\"mem_address\",\"func\":\"basic\",\"display_name\":\"\\uc8fc\\uc18c\",\"field_type\":\"address\",\"use\":null,\"open\":null,\"required\":null},\"mem_profile_content\":{\"field_name\":\"mem_profile_content\",\"func\":\"basic\",\"display_name\":\"\\uc790\\uae30\\uc18c\\uac1c\",\"field_type\":\"textarea\",\"use\":null,\"open\":\"1\",\"required\":null},\"mem_recommend\":{\"field_name\":\"mem_recommend\",\"func\":\"basic\",\"display_name\":\"\\ucd94\\ucc9c\\uc778\",\"field_type\":\"text\",\"use\":null,\"open\":\"\",\"required\":null},\"mem_nation\":{\"field_name\":\"mem_nation\",\"func\":\"added\",\"display_name\":\"\\uad6d\\uac00\",\"use\":\"1\",\"field_type\":\"text\",\"open\":null,\"required\":null,\"options\":\"\"},\"mem_purpose\":{\"field_name\":\"mem_purpose\",\"func\":\"added\",\"display_name\":\"\\uc5ec\\ud589\\ubaa9\\uc801\",\"use\":\"1\",\"field_type\":\"textarea\",\"open\":null,\"required\":null,\"options\":\"\"},\"mem_age\":{\"field_name\":\"mem_age\",\"func\":\"added\",\"display_name\":\"\\uc5f0\\ub839\\ub300\",\"use\":\"1\",\"field_type\":\"text\",\"open\":null,\"required\":null,\"options\":\"\"}}'),
('register_level', '2'),
('scheduler', '{\"Sample_scheduler\":{\"library_name\":\"Sample_scheduler\",\"interval_field_name\":\"hourly\"}}'),
('scheduler_interval', '{\"hourly\":{\"field_name\":\"hourly\",\"interval\":\"3600\",\"display_name\":\"\\ub9e4\\uc2dc\\uac04\\ub9c8\\ub2e4\"},\"twicedaily\":{\"field_name\":\"twicedaily\",\"interval\":\"43200\",\"display_name\":\"\\ud558\\ub8e8\\uc5d02\\ubc88\"},\"daily\":{\"field_name\":\"daily\",\"interval\":\"86400\",\"display_name\":\"\\ud558\\ub8e8\\uc5d01\\ubc88\"}}'),
('send_email_blame_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />게시글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{게시글내용}</div><p><a href=\"{게시글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 게시글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_blame_admin_title', '[{게시판명}] {게시글제목} - 신고가접수되었습니다');
INSERT INTO `dsp_config` (`cfg_key`, `cfg_value`) VALUES
('send_email_blame_post_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />게시글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{게시글내용}</div><p><a href=\"{게시글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 게시글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_blame_post_writer_title', '[{게시판명}] {게시글제목} - 신고가접수되었습니다'),
('send_email_changeemail_user_content', '<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br />회원님의 이메일 주소가 변경되어 알려드립니다.</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요,</p><p>회원님의 이메일 주소가 변경되었으므로 다시 인증을 받아주시기 바랍니다.</p><p>&nbsp;</p><p>아래 링크를 클릭하시면 주소변경 인증이 완료됩니다.</p><p><a href=\"{메일인증주소}\" target=\"_blank\" style=\"font-weight:bold;\">메일인증 받기</a></p><p>&nbsp;</p><p>감사합니다.</p></td></tr></table>'),
('send_email_changeemail_user_title', '[{홈페이지명}] 회원님의 이메일정보가 변경되었습니다'),
('send_email_changepw_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 관리자님,</span><br /></td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요,</p><p>{회원닉네임} 님이 패스워드를 변경하셨습니다.</p><p>회원아이디 : {회원아이디}</p><p>닉네임 : {회원닉네임}</p><p>이메일 : {회원이메일}</p><p>변경한 곳 IP : {회원아이피}</p><p>감사합니다.</p></td></tr></table>'),
('send_email_changepw_admin_title', '{회원닉네임}님이 패스워드를 변경하셨습니다'),
('send_email_changepw_user_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br />회원님의 패스워드가 변경되었습니다.</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요 {회원닉네임} 회원님,</p><p>회원님의 패스워드가 변경되었습니다.</p><p>변경한 곳 IP : {회원아이피}</p><p>더욱 편리한 서비스를 제공하기 위해 항상 최선을 다하겠습니다.</p><p>&nbsp;</p><p>감사합니다.</p></td></tr></table>'),
('send_email_changepw_user_title', '[{홈페이지명}] 패스워드가 변경되었습니다'),
('send_email_comment_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_comment_admin_title', '[{게시판명}] {게시글제목} - 댓글이 등록되었습니다'),
('send_email_comment_blame_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />댓글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_comment_blame_admin_title', '[{게시판명}] {게시글제목} - 댓글에신고가접수되었습니다'),
('send_email_comment_blame_comment_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />댓글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_comment_blame_comment_writer_title', '[{게시판명}] {게시글제목} - 댓글에신고가접수되었습니다'),
('send_email_comment_blame_post_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />댓글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_comment_blame_post_writer_title', '[{게시판명}] {게시글제목} - 댓글에신고가접수되었습니다'),
('send_email_comment_comment_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_comment_comment_writer_title', '[{게시판명}] {게시글제목} - 댓글이 등록되었습니다'),
('send_email_comment_post_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_comment_post_writer_title', '[{게시판명}] {게시글제목} - 댓글이 등록되었습니다'),
('send_email_dormant_notify_user_content', '<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tbody><tr><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br>항상 믿고 이용해주시는 회원님께 깊은 감사를 드립니다.</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>{정리기준} 이상 서비스를 이용하지 않은 계정 ‘정보통신망 이용 촉진 및 정보보호 등에 관한 법률 및 시행령 제16조에 따라 휴면 계정으로 전환되며, 해당 계정 정보는 별도 분리 보관될 예정입니다. </p><p>(법령 시행일 : 2015년 8월 18일)</P><p>&nbsp;</p><p><strong>1. 적용 대상 :</strong> {정리기준}간 로그인 기록이 없는 고객의 개인정보</p><p><strong>2. 적용 시점 :</strong> {정리예정날짜}</p><p><strong>3. 처리 방법 :</strong> {정리방법}</p><p>&nbsp;</p><p>{홈페이지명}에서는 앞으로도 회원님의 개인정보를 소중하게 관리하여 보다 더 안전하게 서비스를 이용하실 수 있도록 최선의 노력을 다하겠습니다. 많은 관심과 참여 부탁 드립니다. 감사합니다.</p></td></tr><tr><td style=\"padding:10px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;text-align:center;\">{홈페이지명}</td></tr></tbody></table>'),
('send_email_dormant_notify_user_title', '[{홈페이지명}] 휴면 계정 전환 예정 안내'),
('send_email_findaccount_user_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br />회원님의 아이디와 패스워드를 보내드립니다.</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요,</p><p>&nbsp;</p><p>회원님의 아이디는 <strong>{회원아이디}</strong> 입니다.</p><p>아래 링크를 클릭하시면 회원님의 패스워드 변경이 가능합니다.</p><p><a href=\"{패스워드변경주소}\" target=\"_blank\" style=\"font-weight:bold;\">패스워드 변경하기</a></p><p>&nbsp;</p><p>감사합니다.</p></td></tr></table>'),
('send_email_findaccount_user_title', '{회원닉네임}님의 아이디와 패스워드를 보내드립니다'),
('send_email_memberleave_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 관리자님,</span><br /></td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요,</p><p>{회원닉네임} 님이 회원탈퇴하셨습니다.</p><p>회원아이디 : {회원아이디}</p><p>닉네임 : {회원닉네임}</p><p>이메일 : {회원이메일}</p><p>탈퇴한 곳 IP : {회원아이피}</p><p>감사합니다.</p></td></tr></table>'),
('send_email_memberleave_admin_title', '{회원닉네임}님이 회원탈퇴하셨습니다'),
('send_email_memberleave_user_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br />회원님의 탈퇴가 처리되었습니다.</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요 {회원닉네임} 회원님,</p><p>그 동안 {홈페이지명} 이용을 해주셔서 감사드립니다</p><p>요청하신대로 회원님의 탈퇴가 정상적으로 처리되었습니다.</p><p>더욱 편리한 서비스를 제공하기 위해 항상 최선을 다하겠습니다.</p><p>&nbsp;</p><p>감사합니다.</p></td></tr></table>'),
('send_email_memberleave_user_title', '[{홈페이지명}] 회원탈퇴가 완료되었습니다'),
('send_email_post_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{게시글내용}</div><p><a href=\"{게시글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 게시글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_post_admin_title', '[{게시판명}] {게시글제목}'),
('send_email_post_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{게시글내용}</div><p><a href=\"{게시글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 게시글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_email_post_writer_title', '[{게시판명}] {게시글제목}'),
('send_email_register_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 관리자님,</span><br /></td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요,</p><p>{회원닉네임} 님이 회원가입 하셨습니다.</p><p>회원아이디 : {회원아이디}</p><p>닉네임 : {회원닉네임}</p><p>이메일 : {회원이메일}</p><p>가입한 곳 IP : {회원아이피}</p><p>감사합니다.</p></td></tr></table>'),
('send_email_register_admin_title', '[회원가입알림] {회원닉네임}님이 회원가입하셨습니다'),
('send_email_register_user_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br />회원가입을 축하드립니다.</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요 {회원닉네임} 회원님,</p><p>회원가입을 축하드립니다.</p><p>{홈페이지명} 회원으로 가입해주셔서 감사합니다.</p><p>더욱 편리한 서비스를 제공하기 위해 항상 최선을 다하겠습니다.</p><p>&nbsp;</p><p>감사합니다.</p></td></tr></table>'),
('send_email_register_user_title', '[{홈페이지명}] {회원닉네임}님의 회원가입을 축하드립니다'),
('send_email_register_user_verifycontent', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br />회원가입을 축하드립니다.</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요 {회원닉네임} 회원님,</p><p>회원가입을 축하드립니다.</p><p>{홈페이지명} 회원으로 가입해주셔서 감사합니다.</p><p>더욱 편리한 서비스를 제공하기 위해 항상 최선을 다하겠습니다.</p><p>&nbsp;</p><p>아래 링크를 클릭하시면 회원가입이 완료됩니다.</p><p><a href=\"{메일인증주소}\" target=\"_blank\" style=\"font-weight:bold;\">메일인증 받기</a></p><p>&nbsp;</p><p>감사합니다.</p></td></tr></table>'),
('send_email_register_user_verifytitle', '[{홈페이지명}] {회원닉네임}님의 회원가입을 축하드립니다'),
('send_email_resendverify_user_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br />회원님의 인증메일을 다시 보내드립니다..</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요,</p><p>&nbsp;</p><p>아래 링크를 클릭하시면 이메일 인증이 완료됩니다.</p><p><a href=\"{메일인증주소}\" target=\"_blank\" style=\"font-weight:bold;\">메일인증 받기</a></p><p>&nbsp;</p><p>감사합니다.</p></td></tr></table>'),
('send_email_resendverify_user_title', '{회원닉네임}님의 인증메일이 재발송되었습니다'),
('send_note_blame_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />게시글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{게시글내용}</div><p><a href=\"{게시글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 게시글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_blame_admin_title', '[{게시판명}] {게시글제목} - 신고가접수되었습니다'),
('send_note_blame_post_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />게시글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{게시글내용}</div><p><a href=\"{게시글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 게시글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_blame_post_writer_title', '[{게시판명}] {게시글제목} - 신고가접수되었습니다'),
('send_note_changepw_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 관리자님,</span><br /></td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요,</p><p>{회원닉네임} 님이 패스워드를 변경하셨습니다.</p><p>회원아이디 : {회원아이디}</p><p>닉네임 : {회원닉네임}</p><p>이메일 : {회원이메일}</p><p>변경한 곳 IP : {회원아이피}</p><p>감사합니다.</p></td></tr></table>'),
('send_note_changepw_admin_title', '{회원닉네임}님이 패스워드를 변경하셨습니다'),
('send_note_changepw_user_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br />회원님의 패스워드가 변경되었습니다.</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요 {회원닉네임} 회원님,</p><p>회원님의 패스워드가 변경되었습니다.</p><p>변경한 곳 IP : {회원아이피}</p><p>더욱 편리한 서비스를 제공하기 위해 항상 최선을 다하겠습니다.</p><p>&nbsp;</p><p>감사합니다.</p></td></tr></table>'),
('send_note_changepw_user_title', '패스워드가 변경되었습니다'),
('send_note_comment_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_comment_admin_title', '[{게시판명}] {게시글제목} - 댓글이 등록되었습니다'),
('send_note_comment_blame_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />댓글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_comment_blame_admin_title', '[{게시판명}] {게시글제목} - 댓글에신고가접수되었습니다'),
('send_note_comment_blame_comment_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />댓글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_comment_blame_comment_writer_title', '[{게시판명}] {게시글제목} - 댓글에신고가접수되었습니다'),
('send_note_comment_blame_post_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />댓글에 신고가 접수되었습니다</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_comment_blame_post_writer_title', '[{게시판명}] {게시글제목} - 댓글에신고가접수되었습니다'),
('send_note_comment_comment_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_comment_comment_writer_title', '[{게시판명}] {게시글제목} - 댓글이 등록되었습니다'),
('send_note_comment_post_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{댓글내용}</div><p><a href=\"{댓글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 댓글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_comment_post_writer_title', '[{게시판명}] {게시글제목} - 댓글이 등록되었습니다'),
('send_note_memberleave_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 관리자님,</span><br /></td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요,</p><p>{회원닉네임} 님이 회원탈퇴하셨습니다.</p><p>회원아이디 : {회원아이디}</p><p>닉네임 : {회원닉네임}</p><p>이메일 : {회원이메일}</p><p>탈퇴한 곳 IP : {회원아이피}</p><p>감사합니다.</p></td></tr></table>'),
('send_note_memberleave_admin_title', '{회원닉네임}님이 회원탈퇴하셨습니다'),
('send_note_post_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{게시글내용}</div><p><a href=\"{게시글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 게시글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_post_admin_title', '[{게시판명}] {게시글제목}'),
('send_note_post_writer_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">{게시글제목}</span><br />작성자 : {게시글작성자닉네임}</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><div>{게시글내용}</div><p><a href=\"{게시글주소}\" target=\"_blank\" style=\"font-weight:bold;\">사이트에서 게시글 확인하기</a></p><p>&nbsp;</p></td></tr></table>'),
('send_note_post_writer_title', '[{게시판명}] {게시글제목}'),
('send_note_register_admin_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 관리자님,</span><br /></td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요,</p><p>{회원닉네임} 님이 회원가입 하셨습니다.</p><p>회원아이디 : {회원아이디}</p><p>닉네임 : {회원닉네임}</p><p>이메일 : {회원이메일}</p><p>가입한 곳 IP : {회원아이피}</p><p>감사합니다.</p></td></tr></table>'),
('send_note_register_admin_title', '[회원가입알림] {회원닉네임}님이 회원가입하셨습니다'),
('send_note_register_user_content', '<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-left: 1px solid rgb(226,226,225);border-right: 1px solid rgb(226,226,225);background-color: rgb(255,255,255);border-top:10px solid #348fe2; border-bottom:5px solid #348fe2;border-collapse: collapse;\"><tr><td width=\"200\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\">{홈페이지명}</td><td style=\"font-size:12px;padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><span style=\"font-size:14px;font-weight:bold;color:rgb(0,0,0)\">안녕하세요 {회원닉네임}님,</span><br />회원가입을 축하드립니다.</td></tr><tr style=\"border-top:1px solid #e2e2e2; border-bottom:1px solid #e2e2e2;\"><td colspan=\"2\" style=\"padding:20px 30px;font-family: Arial,sans-serif;color: rgb(0,0,0);font-size: 14px;line-height: 20px;\"><p>안녕하세요 {회원닉네임} 회원님,</p><p>회원가입을 축하드립니다.</p><p>{홈페이지명} 회원으로 가입해주셔서 감사합니다.</p><p>더욱 편리한 서비스를 제공하기 위해 항상 최선을 다하겠습니다.</p><p>&nbsp;</p><p>감사합니다.</p></td></tr></table>'),
('send_note_register_user_title', '회원가입을 축하드립니다'),
('send_sms_blame_admin_content', '[게시글신고알림] {게시판명} - {게시글제목}'),
('send_sms_blame_post_writer_content', '[게시글신고알림] {게시판명} - {게시글제목}'),
('send_sms_changepw_admin_content', '[패스워드변경알림] {회원닉네임}님이 패스워드를변경하셨습니다'),
('send_sms_changepw_user_content', '[{홈페이지명}] 회원님의 패스워드가 변경되었습니다. 감사합니다'),
('send_sms_comment_admin_content', '[댓글작성알림] {게시판명} - {게시글제목}'),
('send_sms_comment_blame_admin_content', '[댓글신고알림] {게시판명} - {게시글제목}'),
('send_sms_comment_blame_comment_writer_content', '[댓글신고알림] {게시판명} - {게시글제목}'),
('send_sms_comment_blame_post_writer_content', '[댓글신고알림] {게시판명} - {게시글제목}'),
('send_sms_comment_comment_writer_content', '[댓글작성알림] {게시판명} - {게시글제목}'),
('send_sms_comment_post_writer_content', '[댓글작성알림] {게시판명} - {게시글제목}'),
('send_sms_memberleave_admin_content', '[회원탈퇴알림] {회원닉네임}님이 회원탈퇴하셨습니다'),
('send_sms_memberleave_user_content', '[{홈페이지명}] 회원탈퇴완료 - 그동안이용해주셔서감사합니다'),
('send_sms_post_admin_content', '[게시글작성알림] {게시판명} - {게시글제목}'),
('send_sms_post_writer_content', '[게시글작성알림] {게시판명} - {게시글제목}'),
('send_sms_register_admin_content', '[회원가입알림] {회원닉네임}님이 회원가입하셨습니다'),
('send_sms_register_user_content', '[{홈페이지명}] 회원가입을 축하드립니다. 감사합니다'),
('sidebar_board', ''),
('sidebar_currentvisitor', ''),
('sidebar_default', ''),
('sidebar_document', ''),
('sidebar_faq', ''),
('sidebar_findaccount', ''),
('sidebar_group', ''),
('sidebar_login', ''),
('sidebar_main', ''),
('sidebar_mypage', ''),
('sidebar_notification', ''),
('sidebar_register', ''),
('sidebar_search', ''),
('sidebar_tag', ''),
('site_blacklist_content', '<p>안녕하세요</p><p>블편을 드려 죄송합니다. 지금 이 사이트는 접근이 금지되어있습니다</p><p>감사합니다</p>'),
('site_blacklist_title', '사이트가 공사중에 있습니다'),
('site_logo', 'DongDaeMun _ SUPERPASS'),
('site_meta_title_attendance', '출석체크 - {홈페이지제목}'),
('site_meta_title_board_list', '{게시판명} - {홈페이지제목}'),
('site_meta_title_board_modify', '{글제목} 글수정 - {홈페이지제목}'),
('site_meta_title_board_post', '{글제목} > {게시판명} - {홈페이지제목}'),
('site_meta_title_board_write', '{게시판명} 글쓰기 - {홈페이지제목}'),
('site_meta_title_cmall', '{컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_cmall_cart', '장바구니 > {컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_cmall_item', '{상품명} > {컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_cmall_list', '{컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_cmall_order', '상품주문 > {컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_cmall_orderlist', '주문내역 > {컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_cmall_orderresult', '주문결과 > {컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_cmall_qna_write', '상품문의작성 > {컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_cmall_review_write', '상품후기작성 > {컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_cmall_wishlist', '찜한 목록 > {컨텐츠몰명} - {홈페이지제목}'),
('site_meta_title_currentvisitor', '현재접속자 - {홈페이지제목}'),
('site_meta_title_default', '{홈페이지제목}'),
('site_meta_title_deposit', '예치금 관리 - {홈페이지제목}'),
('site_meta_title_deposit_mylist', '나의 예치금 내역 - {홈페이지제목}'),
('site_meta_title_deposit_result', '예치금 충전 결과 - {홈페이지제목}'),
('site_meta_title_document', '{문서제목} - {홈페이지제목}'),
('site_meta_title_faq', '{FAQ제목} - {홈페이지제목}'),
('site_meta_title_findaccount', '회원정보찾기 - {홈페이지제목}'),
('site_meta_title_formmail', '메일발송 - {홈페이지제목}'),
('site_meta_title_group', '{그룹명} - {홈페이지제목}'),
('site_meta_title_levelup', '레벨업 - {홈페이지제목}'),
('site_meta_title_login', '로그인 - {홈페이지제목}'),
('site_meta_title_main', '{홈페이지제목}'),
('site_meta_title_membermodify', '회원정보수정 - {홈페이지제목}'),
('site_meta_title_membermodify_memberleave', '회원탈퇴 - {홈페이지제목}'),
('site_meta_title_mypage', '{회원닉네임}님의 마이페이지 - {홈페이지제목}'),
('site_meta_title_mypage_comment', '{회원닉네임}님의 작성댓글 - {홈페이지제목}'),
('site_meta_title_mypage_followedlist', '{회원닉네임}님의 팔로우 - {홈페이지제목}'),
('site_meta_title_mypage_followinglist', '{회원닉네임}님의 팔로우 - {홈페이지제목}'),
('site_meta_title_mypage_like_comment', '{회원닉네임}님의 추천댓글 - {홈페이지제목}'),
('site_meta_title_mypage_like_post', '{회원닉네임}님의 추천글 - {홈페이지제목}'),
('site_meta_title_mypage_loginlog', '{회원닉네임}님의 로그인기록 - {홈페이지제목}'),
('site_meta_title_mypage_point', '{회원닉네임}님의 포인트 - {홈페이지제목}'),
('site_meta_title_mypage_post', '{회원닉네임}님의 작성글 - {홈페이지제목}'),
('site_meta_title_mypage_scrap', '{회원닉네임}님의 스크랩 - {홈페이지제목}'),
('site_meta_title_note_list', '{회원닉네임}님의 쪽지함 - {홈페이지제목}'),
('site_meta_title_note_view', '{회원닉네임}님의 쪽지함 - {홈페이지제목}'),
('site_meta_title_note_write', '{회원닉네임}님의 쪽지함 - {홈페이지제목}'),
('site_meta_title_notification', '{회원닉네임}님의 알림 - {홈페이지제목}'),
('site_meta_title_pointranking', '전체 포인트 랭킹 - {홈페이지제목}'),
('site_meta_title_pointranking_month', '월별 포인트 랭킹 - {홈페이지제목}'),
('site_meta_title_poll', '설문조사모음 - {홈페이지제목}'),
('site_meta_title_profile', '{회원닉네임}님의 프로필 - {홈페이지제목}'),
('site_meta_title_register', '회원가입 - {홈페이지제목}'),
('site_meta_title_register_form', '회원가입 - {홈페이지제목}'),
('site_meta_title_register_result', '회원가입결과 - {홈페이지제목}'),
('site_meta_title_search', '{검색어} - {홈페이지제목}'),
('site_meta_title_tag', '{태그명} - {홈페이지제목}'),
('site_title', 'DongDaeMun _ SUPERPASS'),
('skin_board', ''),
('skin_currentvisitor', ''),
('skin_default', 'bootstrap'),
('skin_document', ''),
('skin_emailform', 'basic'),
('skin_faq', ''),
('skin_findaccount', ''),
('skin_formmail', ''),
('skin_group', ''),
('skin_helptool', ''),
('skin_login', ''),
('skin_main', ''),
('skin_mypage', ''),
('skin_note', ''),
('skin_notification', ''),
('skin_popup', 'basic'),
('skin_profile', ''),
('skin_register', ''),
('skin_search', ''),
('skin_tag', ''),
('spam_word', '18아,18놈,18새끼,18년,18뇬,18노,18것,18넘,개년,개놈,개뇬,개새,개색끼,개세끼,개세이,개쉐이,개쉑,개쉽,개시키,개자식,개좆,게색기,게색끼,광뇬,뇬,눈깔,뉘미럴,니귀미,니기미,니미,도촬,되질래,뒈져라,뒈진다,디져라,디진다,디질래,병쉰,병신,뻐큐,뻑큐,뽁큐,삐리넷,새꺄,쉬발,쉬밸,쉬팔,쉽알,스패킹,스팽,시벌,시부랄,시부럴,시부리,시불,시브랄,시팍,시팔,시펄,실밸,십8,십쌔,십창,싶알,쌉년,썅놈,쌔끼,쌩쑈,썅,써벌,썩을년,쎄꺄,쎄엑,쓰바,쓰발,쓰벌,쓰팔,씨8,씨댕,씨바,씨발,씨뱅,씨봉알,씨부랄,씨부럴,씨부렁,씨부리,씨불,씨브랄,씨빠,씨빨,씨뽀랄,씨팍,씨팔,씨펄,씹,아가리,아갈이,엄창,접년,잡놈,재랄,저주글,조까,조빠,조쟁이,조지냐,조진다,조질래,존나,존니,좀물,좁년,좃,좆,좇,쥐랄,쥐롤,쥬디,지랄,지럴,지롤,지미랄,쫍빱,凸,퍽큐,뻑큐,빠큐,ㅅㅂㄹㅁ'),
('total_rss_feed_count', '100'),
('twitter_consumer_key', ''),
('twitter_consumer_secret', ''),
('url_after_login', ''),
('url_after_logout', ''),
('use_copy_log', ''),
('use_document_auto_url', '1'),
('use_document_dhtml', '1'),
('use_document_mobile_auto_url', ''),
('use_faq_auto_url', '1'),
('use_faq_dhtml', '1'),
('use_faq_mobile_auto_url', ''),
('use_formmail_dhtml', '1'),
('use_login_account', 'both'),
('use_member_icon', ''),
('use_member_photo', ''),
('use_mobile_sideview', ''),
('use_mobile_sideview_email', ''),
('use_naver_syndi_log', ''),
('use_note', ''),
('use_note_dhtml', '1'),
('use_note_file', ''),
('use_note_mobile_dhtml', '1'),
('use_notification', ''),
('use_point', ''),
('use_pointranking', '1'),
('use_poll_list', '1'),
('use_popup_auto_url', '1'),
('use_popup_dhtml', '1'),
('use_popup_mobile_auto_url', ''),
('use_recaptcha', '0'),
('use_register_block', ''),
('use_register_email_auth', ''),
('use_sideview', ''),
('use_sideview_email', ''),
('use_sociallogin', '1'),
('use_sociallogin_facebook', ''),
('use_sociallogin_google', '1'),
('use_sociallogin_kakao', ''),
('use_sociallogin_naver', ''),
('use_sociallogin_twitter', ''),
('webmaster_email', 'noreply@domain.com'),
('webmaster_name', '관리자'),
('white_iframe', 'www.youtube.com\r\nwww.youtube-nocookie.com\r\nmaps.google.co.kr\r\nmaps.google.com\r\nflvs.daum.net\r\nplayer.vimeo.com\r\nsbsplayer.sbs.co.kr\r\nserviceapi.rmcnmv.naver.com\r\nserviceapi.nmv.naver.com\r\nwww.mgoon.com\r\nvideofarm.daum.net\r\nplayer.sbs.co.kr\r\nsbsplayer.sbs.co.kr\r\nwww.tagstory.com\r\nplay.tagstory.com\r\nflvr.pandora.tv');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_coupon`
--

CREATE TABLE `dsp_coupon` (
  `coupon_no` int(10) UNSIGNED NOT NULL,
  `store_no` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(100) DEFAULT NULL,
  `title_kr` varchar(200) NOT NULL,
  `title_en` varchar(200) DEFAULT NULL,
  `desc_kr` text DEFAULT NULL,
  `desc_en` text DEFAULT NULL,
  `dc_amount` int(11) DEFAULT NULL,
  `dc_type` varchar(10) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `is_stamp` enum('Y','N') NOT NULL DEFAULT 'N',
  `target_audience` enum('ALL','KR','INTL') NOT NULL DEFAULT 'ALL' COMMENT '대상: 전체/내국인/외국인',
  `is_use` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sort_order` int(10) UNSIGNED DEFAULT NULL,
  `main_img` varchar(120) DEFAULT NULL,
  `reg_ip` varchar(50) NOT NULL,
  `reg_date` datetime NOT NULL,
  `upd_date` datetime DEFAULT NULL,
  `limit_total` int(10) UNSIGNED DEFAULT NULL COMMENT '쿠폰 전체 총 사용가능 횟수(빈값=제한없음)',
  `limit_per_member` int(10) UNSIGNED DEFAULT NULL COMMENT '회원 1인당 사용가능 횟수(빈값=제한없음)',
  `limit_member_period` enum('lifetime','day','week','month') DEFAULT 'lifetime' COMMENT '회원별 횟수 제한의 기준 기간',
  `limit_reset_at` datetime DEFAULT NULL COMMENT '선택: 고정 주기 리셋 기준(월/주 산정 anchor가 필요하면 사용)',
  `kakao_link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_coupon`
--

INSERT INTO `dsp_coupon` (`coupon_no`, `store_no`, `coupon_code`, `title_kr`, `title_en`, `desc_kr`, `desc_en`, `dc_amount`, `dc_type`, `valid_from`, `valid_to`, `is_stamp`, `target_audience`, `is_use`, `sort_order`, `main_img`, `reg_ip`, `reg_date`, `upd_date`, `limit_total`, `limit_per_member`, `limit_member_period`, `limit_reset_at`, `kakao_link`) VALUES
(1, 4, '3', '1시간 이용권 할인', '1 Hour Discount Coupon', '어린이가 오감체험과 디자인 예술을\r\n감각적인 놀이로 경험할 수 있는 DDP 디자인놀이터 1시간 이용 할인권 입니다.', 'Children experience five senses and design art\r\nIt is a one-hour discount coupon for the DDP design playground that can be experienced as a sensuous play.', 20, '%', '2025-10-01', '2025-10-31', 'Y', 'INTL', 'Y', NULL, '86df20ca619010403f188cfce308c3f6.png', '192.168.0.1', '2025-10-04 14:45:31', '2025-11-25 14:22:35', NULL, 200, 'lifetime', NULL, ''),
(2, 5, 'ho', '4종 쿠폰 무료 증정 (12월)', '4종 쿠폰 무료 증정', '4종 쿠폰 무료 증정\r\n현대아울렛 동대문점\r\nEvent Period : 2025.12.01 ~ 2025.12.31\r\n\r\n● 혜택\r\n① 무료주차 3시간 이용권\r\n② 콜롬비아 퍼펙토 무료음료 이용권(1매)\r\n③ 조앤더주스 커피음료 주문 시 디저트 이용권(1매)\r\n④ 현대백화점 통합멤버십 H.Point 신규 가입 시, 즉시 사용 가능한 H.Point 3천P 쿠폰 증정!\r\n     *신규 회원 가입자 최초 1회에 한함\r\n\r\n기간 · 문의\r\n기간 : 2025.12.01(월) ~ 12.31(수)\r\n문의 : 02-2283-2005\r\n\r\n● 수령방법\r\n1. 카카오톡 채널 친구 @DDP동대문 슈퍼패스 > 현대아울렛 동대문점 3종 쿠폰을 다운로드합니다.\r\n2. 현대아울렛 동대문점 1F INFORMATION 데스크 방문 후 직원을 통해 카카오톡 쿠폰을 제시합니다.\r\n3. 카카오톡 쿠폰과 현대백화점 통합멤버십 H.Point 회원 여부 확인 후 \r\n     H.Point APP 을 통해 사용 가능한 모바일 쿠폰으로 발급해 드립니다.\r\n※ 현대백화점 통합멤버십 앱 H.Point 회원 가입 필수\r\n※ 기간 중 1인 1회 수령 가능\r\n\r\n● 유의사항\r\n1. 카톡플친으로 발급받은 직원확인 버튼은 INFORMATION 현장 직원이 직접 확인 처리하는 버튼이므로 미리 누르지 않도록 주의하세요.\r\n2. 본 쿠폰은 카카오톡 계정당 1장만 발급됩니다.\r\n3. 쿠폰 소진 시 자동으로 종료될 수 있습니다.\r\n4. 본 프로모션은 매장 사정에 의해 사전 공지 없이 조기 종료될 수 있습니다.\r\n5. 기타 문의사항은 매장으로 연락 부탁드립니다.', '', NULL, NULL, '2025-12-01', '2025-12-31', 'Y', 'KR', 'N', NULL, 'b48fff397365d765d1bc3dd7b5b4dbc0.jpg', '192.168.0.1', '2025-10-08 08:27:26', '2026-01-09 17:44:44', 20000, 1, 'month', NULL, 'https://pf.kakao.com/_tDrmG/coupons'),
(3, 6, 'tkd', '태극당 아메리카노', 'Coffee Americano', '아메리카노 500원 할인', '아메리카노 500원 할인', 500, '￦', '2025-10-01', '2025-10-31', 'Y', 'ALL', 'Y', NULL, 'c22916d8a695b847b5852efb06758e73.jpg', '192.168.0.1', '2025-10-08 08:49:43', '2025-11-05 09:28:26', NULL, 1, 'lifetime', NULL, ''),
(5, 41, '32', '이지드롭 5,000원 할인 또는 짐보관 서비스 1시간 무료', '5,000KWR off EasyDrop or 1 Extra Hour of Storage Service', '이지드롭 5,000원 할인 또는 짐보관 서비스 1시간 무료', '5,000KWR off EasyDrop or 1 Extra Hour of Storage Service', 5000, '￦', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'N', NULL, '5cc2d58748802ea868c13b003af07959.png', '210.120.40.117', '2025-11-03 14:21:17', '2025-12-17 16:49:07', NULL, 1, 'lifetime', NULL, ''),
(6, 40, '31', '10% 할인 쿠폰', '10% Off Coupon', '메뉴 주문 시 10% 할인', '10% discount on all menu orders', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', 0, '3a2c9605ae303d9140521bffa6f8228e.png', '210.120.40.117', '2025-11-03 14:26:21', '2025-12-23 15:09:12', NULL, 1, 'day', NULL, ''),
(7, 39, '30', '1+1 쿠폰', 'Buy 1, Get 1 Free', '1개 구매 시 1개 무료\r\n6구 타르트 박스를 구매하면 다른 박스를 무료로 드립니다.', 'Buy 1, Get 1 Free\r\nGet a second box free when you buy one 6-piece tart box', 0, 'Gift', '2025-11-03', '2025-12-31', 'Y', 'ALL', 'N', NULL, '3679012b7dbc5e39e946b92df1b421e4.png', '210.120.40.117', '2025-11-03 14:31:59', '2025-12-17 16:48:19', NULL, 1, 'lifetime', NULL, ''),
(8, 38, '29', '쁘띠젤리 증정', 'Free Petit Jelly', '무료 쁘띠 젤리 제공\r\n*2만 원 이상 구매 시 테이블당 1개 제공', 'Free Petit Jelly\r\n*One per table, for purchases over 20,000KWR', 0, 'Gift', '2025-11-03', '2025-12-31', 'Y', 'ALL', 'Y', NULL, 'dccf73a25ed7d68d753b54f69f126bcb.png', '210.120.40.117', '2025-11-03 14:40:16', '2025-11-25 15:16:15', NULL, 1, 'lifetime', NULL, ''),
(9, 36, '27', '음료 50% 할인 쿠폰', '50% DISCOUNT on drinks', '음료 50% 할인 쿠폰', '50% DISCOUNT on drinks', 50, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, 'f30153f982233c9a1b32a31c0ce0e21a.png', '210.120.40.117', '2025-11-03 14:51:08', '2025-11-25 15:15:38', NULL, 1, 'lifetime', NULL, ''),
(10, 35, '26', '10% 할인 쿠폰', '10% DISCOUNT on drinks', '10% 할인 쿠폰\r\n(주중에만 적용)', '10% DISCOUNT on drinks\r\n*weekdays only', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '5ba369f1dcf20bb7bee76714b4aee093.png', '210.120.40.117', '2025-11-03 14:57:21', '2025-11-25 15:15:21', NULL, 1, 'lifetime', NULL, ''),
(11, 34, '25', '10% 할인 쿠폰', '10% Off Coupon', '10% 할인 쿠폰', '10%  Off Coupon', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '494c91579917f2c1877368a9c5577500.png', '210.120.40.117', '2025-11-03 15:12:03', '2025-11-25 15:15:09', NULL, 1, 'lifetime', NULL, ''),
(12, 33, '24', '10% 할인 쿠폰', '10% Off Coupon', '10% 할인 쿠폰', '10% Off Coupon', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, 'b0e2792ba1e6e2e57e7fbe03580f63e9.png', '210.120.40.117', '2025-11-03 15:17:53', '2025-11-25 15:14:47', NULL, 1, 'lifetime', NULL, ''),
(13, 32, '23', '10% 할인 쿠폰', '10% Off Coupon', '10% 할인 쿠폰', '10% Off Coupon', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '0bdc57bf5428928a70a9920389ac36fe.png', '210.120.40.117', '2025-11-03 15:26:50', '2025-11-25 15:14:31', NULL, 1, 'lifetime', NULL, ''),
(14, 31, '22', '무료 스티커 혹은 10% 할인 쿠폰', 'Free sticker or 10% DISCOUNT', '무료 스티커 혹은 10% 할인 쿠폰', 'Free sticker or 10% DISCOUNT', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, 'f2ff346d415fb1bca3ef33e50c102e40.png', '210.120.40.117', '2025-11-03 15:32:48', '2025-11-25 15:14:07', NULL, 1, 'lifetime', NULL, ''),
(16, 30, '21', '라운지 커피 무료 쿠폰', 'One Free Coffee at Migliore Hotel Lounge', '밀리오레 호텔 라운지에서 커피 한잔 무료 증정', 'One Free Coffee at Migliore Hotel Lounge', 0, 'Gift', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '56c60384de10593c4347cb751424cd84.png', '210.120.40.117', '2025-11-03 15:37:43', '2025-11-25 15:13:51', NULL, 1, 'lifetime', NULL, ''),
(18, 28, '20', '1주일 패스권', '1-week pass', '1주 이용권\r\n구글 리뷰 작성 시 110,000원에 이용 가능\r\n(정가: 150,000원)', '1-week pass\r\nleave a Google Review and pay only 110,000KRW\r\n(Original price: 150,000KRW)', 0, 'Gift', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '9fecb47d3674e66923102106cf91b909.png', '210.120.40.117', '2025-11-03 16:31:34', '2025-11-25 15:12:53', NULL, 1, 'lifetime', NULL, ''),
(19, 26, '18', '10% 할인 쿠폰', '10% DISCOUNT on all purchases', '모든 상품 구매 시 10% 할인', '10% DISCOUNT on all purchases', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '0713fff7f595dffdcffcd41ff57f4940.png', '210.120.40.117', '2025-11-03 16:43:09', '2025-11-25 15:12:09', NULL, 1, 'lifetime', NULL, ''),
(20, 26, '18', '로코코 파우치백 무료 증정', 'Free Rococo Pouch Bag', '무료 로코코 파우치 증정\r\n*30만 원 이상 구매 시', 'Free Rococo Pouch Bag\r\n*with purchasing over 300,000KRW', 0, 'Gift', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '5441b449915374fb8ba787f045d0700c.png', '210.120.40.117', '2025-11-03 16:45:02', '2025-11-25 15:12:12', NULL, 1, 'lifetime', NULL, ''),
(21, 26, '18', '로코코 우산 무료 증정', 'Free Rococo Umbrella', '무료 로코코 우산 증정\r\n*50만 원 이상 구매 시', 'Free Rococo Umbrella\r\n*with purchasing over 500,000KRW', 0, 'Gift', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '9ea0910779e1427e96cce91e87b53a40.png', '210.120.40.117', '2025-11-03 16:47:22', '2025-11-25 15:10:54', NULL, 1, 'lifetime', NULL, ''),
(22, 24, '16', '10% 할인 쿠폰', '10% DISCOUNT', '10% 할인 쿠폰', '10% DISCOUNT', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, 'c6a7ddf2d491e37d9cb5718199337728.png', '210.120.40.117', '2025-11-03 16:50:45', '2025-11-25 14:27:09', NULL, 1, 'lifetime', NULL, ''),
(23, 23, '15', '5% 할인 쿠폰', '5% Off Coupon', '5% 할인', '5% Off', 5, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, 'eaabbdffa7b02a1deda9479dba885559.png', '210.120.40.117', '2025-11-03 16:53:40', '2025-11-27 13:57:23', NULL, 1, 'lifetime', NULL, ''),
(24, 7, '4', '마스크 시트 무료 쿠폰', 'Free Sheet Mask', '마스크 시트 무료 쿠폰\r\n*50,000원 이상 구매 시', 'Free Sheet Mask\r\n*with a purchase over 50,000KRW', 0, 'Gift', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '50b6d9fa56dd56c9977cd510e84532ca.png', '210.120.40.117', '2025-11-03 16:57:59', '2025-11-25 14:22:51', NULL, 1, 'lifetime', NULL, ''),
(25, 8, '5', '10% 할인 쿠폰', '10% DISCOUNT', 'DDP 마켓 지점 10% 할인', 'DDP MARKET Branch 10% Off', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '2f489d701e8e3e6e5f1b8320ff2a00fa.png', '210.120.40.117', '2025-11-03 17:03:18', '2025-11-25 14:23:02', NULL, 1, 'lifetime', NULL, ''),
(26, 9, '6', '10% 할인 쿠폰', '10% Off Coupon', 'DDP 마켓 지점 10% 할인', 'DDP MARKET Branch 10% Off', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '99f9344908ad815e0c37ec8c1ebbe0de.png', '210.120.40.117', '2025-11-03 17:08:08', '2025-11-25 14:23:14', NULL, 1, 'lifetime', NULL, ''),
(27, 10, '7', '10% 할인 쿠폰', '10% Off Coupon', 'DDP 마켓 지점 10% 할인', 'DDP MARKET Branch 10% Off', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '663a154edf22ce91c5ee66fb8b04f180.png', '210.120.40.117', '2025-11-03 17:11:17', '2025-11-25 14:23:25', NULL, 1, 'lifetime', NULL, ''),
(28, 11, '8', '10% 할인 쿠폰', '10% Off Coupon', 'DDP 마켓 지점 10% 할인', 'DDP cafe Branch 10% Off', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '716ac9cad320c36ae257e6d0d8b9f85c.png', '210.120.40.117', '2025-11-03 17:14:57', '2025-11-25 14:23:38', NULL, 1, 'lifetime', NULL, ''),
(29, 22, '14', '10% 할인 쿠폰', '10% Off Coupon', '10% 할인', '10% Off', 10, '%', '2025-11-03', '2025-12-31', 'Y', 'ALL', 'Y', NULL, 'b6fce591c57101cc5304a3af9b0cc90c.png', '210.120.40.117', '2025-11-03 17:17:46', '2025-11-25 14:26:35', NULL, 1, 'lifetime', NULL, ''),
(30, 1, '1', '10% 할인 쿠폰', '10% Off Coupon', '10% 할인 쿠폰', '10% Off Coupon', 10, '%', '2025-11-04', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '9fbad61c1d085134569d77653ad91536.png', '210.120.40.117', '2025-11-04 13:24:14', '2025-11-25 14:22:09', NULL, 1, 'lifetime', NULL, ''),
(33, 14, '9', '음료 1개 무료 쿠폰', 'Free 1 soda per table', '음료 1개 무료 쿠폰', 'Free 1 soda per table', 0, 'Gift', '2025-11-04', '2025-12-31', 'Y', 'INTL', 'Y', NULL, 'd66b198c998a9e6639fe2c3841661eed.png', '210.120.40.117', '2025-11-04 13:37:21', '2025-11-25 14:23:50', NULL, 1, 'lifetime', NULL, ''),
(34, 15, '10', '음료 1개 무료 쿠폰', 'Free 1 soda per table', '메인 요리 주문 시 테이블당 탄산음료 1개 무료', 'Free 1 soda per table with Any main dish order', 0, 'Gift', '2025-11-04', '2025-12-31', 'Y', 'INTL', 'Y', NULL, 'f95328ff7541be0245e71a64a27ac603.png', '210.120.40.117', '2025-11-04 13:39:30', '2025-11-25 14:24:03', NULL, 1, 'lifetime', NULL, ''),
(37, 18, '11', '아메리카노 무료 쿠폰', 'Free Americano Coupon', '무료 아메리카노 쿠폰\r\n음료 1잔 + 디저트 1개 주문 시 (테이블당 1회 적용)\r\n인스타그램 @j.hiddenhouse 팔로우 필수', 'Free Americano Coupon\r\nWith 1 drink + 1 dessert order (per table)\r\nand Follow Instagram @j.hiddenhouse', 0, 'Gift', '2025-11-04', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '59647efab0feb67121d519dc69e44c5d.png', '210.120.40.117', '2025-11-04 14:03:46', '2025-11-25 14:24:31', NULL, 1, 'lifetime', NULL, ''),
(38, 19, '12', '10% 할인 쿠폰', '10% Off Coupon', '10% 할인 쿠폰(음료만)', '10% Off Coupon(Drinks only)', 10, '%', '2025-11-04', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '8c6e807220f7fc7df8e40fc544ea4c76.png', '210.120.40.117', '2025-11-04 14:09:49', '2025-11-25 14:24:47', NULL, 1, 'lifetime', NULL, ''),
(39, 20, '13', '구운 쌀바닐라 아이스크림 무료 증정', 'Free roasted rice vanilla ice cream', '구운 쌀바닐라 아이스크림 무료 증정\r\n*모든 메뉴 주문 시', 'Free roasted rice vanilla ice cream\r\n*With any menu order', 0, 'Gift', NULL, NULL, 'Y', 'INTL', 'Y', NULL, 'c1bd9494ffd9fbc6c140dc2b701a92b5.png', '210.120.40.117', '2025-11-04 14:13:12', '2025-11-25 14:25:08', NULL, 1, 'lifetime', NULL, ''),
(41, 27, '19', '사은품 쿠폰', 'Free gift coupon', '물품 구매 시 사은품 한 개 더 추가 증정', 'Receive one additional free gift with any purchase.', 0, 'Gift', '2025-11-04', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '820dc92922d115c7441ababd6c13ee68.png', '210.120.40.117', '2025-11-04 14:54:39', '2025-11-25 15:12:36', NULL, 1, 'lifetime', NULL, ''),
(42, 37, '28', '아메리카노', 'Free Americano', '무료 아메리카노 제공\r\n*1만 원 이상 구매 시\r\n자세한 내용은 인스타그램에서 확인하세요!', 'Free Americano\r\n*With purchase over 10,000KRW\r\nFor more details, follow us on instagram!', 0, 'Gift', '2025-11-04', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '0ff0d4b3a130291ceeedb3a3c162eaa1.png', '210.120.40.117', '2025-11-04 14:58:04', '2025-11-25 15:15:56', NULL, 1, 'lifetime', NULL, ''),
(43, 25, '17', '20% 할인 쿠폰', '20% DISCOUNT', '20% 할인', '20% DISCOUNT', 20, '%', '2025-11-06', '2025-12-31', 'Y', 'INTL', 'Y', NULL, '6580e63d451f0786a8af42dd5bb23b05.png', '210.120.40.117', '2025-11-06 15:19:54', '2025-11-25 14:27:24', NULL, 1, 'lifetime', NULL, ''),
(44, 42, '', '두타몰 웰컴팩', 'WELCOME PACK(GIFT, F&B VOUCHER, DISCOUNT COUPONS)', '', 'Doota Mall, a shopping destination that symbolizes Dongdaemun, the center of K-fashion and culture!\r\nPlease enjoy exclusive benefits from shopping to F&B services offered by Doota Mall.\r\n\r\n\r\n■ FOR: Foreigner (Tourist visa only / Passport required)\r\n■ PERIOD: ~ 2026.06.30\r\n■ LOCATION: Doota Mall Information Desk(5F)\r\n■ BUSINESS HOURS: 10:30 am ~ 12:00 am (Midnight)\r\n\r\n■ DOOTA MALL WELCOME PACK\r\n① [FREE GIFT] Travel PVC Pouch \r\n② [FREE GIFT] Americano (Hot or Ice)\r\n③ [PURCHASE GIFT] T-Money card ￦5,000 (By purchasing over ￦50,000)\r\n④ [DISCOUNT] Shopping ￦10,000 (When purchasing over ￦50,000)\r\n⑤ [DISCOUNT] Food Court ￦3,0000\r\n⑥ COUPON BOOK including 18 Brands discount & special offers\r\n\r\n■ TERMS AND CONDITIONS\r\n* This mobile coupon must be redeemed at the Information Desk(5F) before use\r\n* Gifts can be replaced and terminated by out of stock withour prior notice\r\n* This mobile coupon is not for sale, not cash-transferable nor refundable\r\n* Can not be duplicated with other promotions offering same benefits\r\n* Discount coupons may not be accepted at some stores', NULL, 'Gift', '2025-12-18', '2026-06-30', 'Y', 'INTL', 'Y', NULL, 'cbbac1bce608f58d8928bc1406e4b25e.png', '203.226.142.17', '2025-12-18 09:59:45', '2026-01-15 14:49:28', NULL, 1, 'month', NULL, ''),
(45, 42, '', '4종 무료 쿠폰(1월)', '', '■ 1월 두타몰 슈퍼패스 4종 무료 쿠폰\r\n  ① 푸드코트 3천원 할인권\r\n  ② 쇼핑 1만원 할인권\r\n  ③ 앤티앤스 아메리카노 1잔 이용권\r\n  ④ 3시간 무료 주차권\r\n\r\n■ 기간: 2026.01.14(수) ~ 01.31(토)\r\n\r\n■ 대상 (1인 1회)\r\n   * 기간 중 두타몰 멤버십 신규 가입 회원\r\n   * 01.14 이전 회원 가입한 회원의 경우, 방문 당일 구매 영수증 소지 회원\r\n   \r\n■ 발급 방법\r\n     1. 카카오톡 채널 친구  @DDP동대문슈퍼패스  >  두타몰 쿠폰 다운로드\r\n     2. 두타몰 고객데스크(5F) 방문 > 카톡 쿠폰 및 두타몰 회원 확인 후 발급\r\n          * 두타몰 모바일 쿠폰으로 발급 / 각 쿠폰 별 사용 조건 상이 (일부 매장 사용 제외)\r\n\r\n■ 문의: 두타몰 고객데스크(5F) 02-3398-3333', '', NULL, NULL, '2026-01-14', '2026-01-31', 'N', 'KR', 'Y', NULL, '05a8c5d554a2755870a63ac36100e9ec.jpg', '203.226.142.17', '2025-12-18 10:28:17', '2026-01-15 12:57:40', NULL, 1, 'month', NULL, 'https://pf.kakao.com/_tDrmG'),
(46, 5, 'ho', '4종 쿠폰 무료 증정 (1월)', '4종 쿠폰 무료 증정', '4종 쿠폰 무료 증정\r\n현대아울렛 동대문점\r\nEvent Period : 2026.01.14 ~ 2026.01.31\r\n\r\n● 혜택\r\n① 무료주차 3시간 이용권\r\n② 콜롬비아 퍼펙토 무료음료 이용권(1매)\r\n③ 조앤더주스 커피음료 주문 시 디저트 이용권(1매)\r\n④ 현대백화점 통합멤버십 H.Point 신규 가입 시, 즉시 사용 가능한 H.Point 3천P 쿠폰 증정!\r\n     *신규 회원 가입자 최초 1회에 한함\r\n\r\n기간 · 문의\r\n기간 : 2026.01.14(수) ~ 01.31(일)\r\n문의 : 02-2283-2005\r\n\r\n● 수령방법\r\n1. 카카오톡 채널 친구 @DDP동대문 슈퍼패스 > 현대아울렛 동대문점 3종 쿠폰을 다운로드합니다.\r\n2. 현대아울렛 동대문점 1F INFORMATION 데스크 방문 후 직원을 통해 카카오톡 쿠폰을 제시합니다.\r\n3. 카카오톡 쿠폰과 현대백화점 통합멤버십 H.Point 회원 여부 확인 후 \r\n     H.Point APP 을 통해 사용 가능한 모바일 쿠폰으로 발급해 드립니다.\r\n※ 현대백화점 통합멤버십 앱 H.Point 회원 가입 필수\r\n※ 기간 중 1인 1회 수령 가능\r\n\r\n● 유의사항\r\n1. 카톡플친으로 발급받은 직원확인 버튼은 INFORMATION 현장 직원이 직접 확인 처리하는 버튼이므로 미리 누르지 않도록 주의하세요.\r\n2. 본 쿠폰은 카카오톡 계정당 1장만 발급됩니다.\r\n3. 쿠폰 소진 시 자동으로 종료될 수 있습니다.\r\n4. 본 프로모션은 매장 사정에 의해 사전 공지 없이 조기 종료될 수 있습니다.\r\n5. 기타 문의사항은 매장으로 연락 부탁드립니다.', '', NULL, NULL, '2026-01-14', '2026-01-31', 'Y', 'KR', 'Y', NULL, '65dd23617073585f694dd24aec8b02fe.jpg', '203.228.139.37', '2025-12-26 10:32:40', '2025-12-27 11:53:42', 20000, 1, 'month', NULL, 'https://pf.kakao.com/_tDrmG/coupons'),
(47, 5, '', '웰컴 기프트 - 무료 음료 이용권 1매', 'Welcome Gift - Free Drink', '', '1 Free Take-out Americano (Hot or Ice) \r\n\r\n[Coupon Terms & Conditions ]\r\nㆍLocation : Information Desk(1F)\r\nㆍOperating Hours :  Mon.-Thu.  10:30am ~ 9pm\r\n                                      :Fri.-Sun.  10:30am ~ 9:30pm\r\n*Last order time 8:30pm\r\n· Present this coupon and your passport to the staff,\r\nthen you can get a welcome gift.\r\n· Only take-out americano(Hot or Ice) is available.', NULL, 'Gift', NULL, '2026-06-30', 'Y', 'INTL', 'Y', NULL, '91bd19b28bb9c9dece279e85080978a9.png', '203.228.139.69', '2025-12-27 11:19:58', '2025-12-27 11:57:14', NULL, 1, 'lifetime', NULL, ''),
(48, 5, '', '너구리의라면가게 무료 체험 이용권 1매', 'Ramyun Tasting Coupon', '', 'Free Ramyun Tasting Coupon (Nongshim Neoguri Ramyun Shop 2F)\r\n*By purchasing over 100,000KRW\r\n\r\n[Coupon Terms & Conditions] \r\nㆍLocation : Information Desk(1F)\r\nㆍOperating Hours : Mon.-Thu. 10:30am ~ 9pm\r\n                                        Fri.-Sun. 10:30am ~ 9:30pm\r\n· Present this coupon, your passport and your receipt for a purchase of\r\n 100,000 KRW or more to the staff, then you can get the coupon.', NULL, NULL, NULL, '2026-06-30', 'Y', 'INTL', 'Y', NULL, '774c49208e9f2d8d40b65ae406b9c690.jpg', '203.228.139.69', '2025-12-27 11:24:28', '2025-12-27 11:57:17', NULL, 1, 'lifetime', NULL, ''),
(49, 5, '', 'Sports Essential 할인 쿠폰', 'Sports Essential Discount Coupon', '', '11 Brands 5,000KRW Discount Coupon\r\n*By Purchasing over 10,000KRW\r\n(NIKE / Adidas / The North Face / Converse / FILA / Snowpeak / EIDER \r\n NATIONAL GEOGRAPHIC / KODAK / NEW BALANCE / XEXYMIX)\r\n\r\n[Coupon Terms & Conditions ]\r\nㆍLocation : Information Desk(1F)\r\nㆍOperating Hours :  Mon.-Thu.  10:30am ~ 9pm\r\n                                      :Fri.-Sun.  10:30am ~ 9:30pm\r\n· Present this coupon and your passport to the staff,\r\nthen you can get a Discount Coupon.', 5000, '￦', NULL, '2026-06-30', 'Y', 'INTL', 'Y', NULL, 'a586b512732a727f6e489203e53df3d3.jpg', '203.228.139.69', '2025-12-27 11:29:04', '2025-12-27 14:41:32', NULL, 1, 'lifetime', NULL, ''),
(50, 5, '', 'Fashion Flex 할인 쿠폰', 'Fashion Flex Discount Coupon', '', '12 Brands 5,000KRW Discount Coupon\r\n*By Purchasing over 10,000KRW\r\n(MARITHE FRANGCOIS GIRBAUD / COVERNAT / KIRSH / LEE\r\nMARKGONZALES / WACKY WILLY / MLB / MLB KIDS / ACMÉ DE LA VIE\r\nBURU&JUDY / ABC-MART / DOUBLEJD)\r\n\r\n[Coupon Terms & Conditions ]\r\nㆍLocation : Information Desk(1F)\r\nㆍOperating Hours :  Mon.-Thu.  10:30am ~ 9pm\r\n                                      :Fri.-Sun.  10:30am ~ 9:30pm\r\n· Present this coupon and your passport to the staff,\r\nthen you can get a Discount Coupon.', 5000, '￦', NULL, '2026-06-30', 'Y', 'INTL', 'Y', NULL, 'a54df0c03aeca071b0d2242088e6b492.jpg', '203.228.139.69', '2025-12-27 11:35:26', '2025-12-27 14:41:41', NULL, 1, 'lifetime', NULL, ''),
(51, 5, '', '2F 서울에디션 할인 쿠폰', '2F SEOUL EDITION Discount Coupon', '', '3 Brands 2,000KRW Discount Coupon\r\n*By Purchasing over 50,000KRW\r\n(K-MECCA / WIGGLE WIGGLE / ARTBOX)\r\n\r\n[Coupon Terms & Conditions ]\r\nㆍLocation : Information Desk(1F)\r\nㆍOperating Hours :  Mon.-Thu.  10:30am ~ 9pm\r\n                                      :Fri.-Sun.  10:30am ~ 9:30pm\r\n· Present this coupon and your passport to the staff,\r\nthen you can get a Discount Coupon.', 2000, '￦', NULL, '2026-06-30', 'Y', 'INTL', 'Y', NULL, '7d31b1749ee1fc7ac085aed750437c91.jpg', '203.228.139.69', '2025-12-27 11:37:20', '2025-12-27 14:41:47', NULL, 1, 'lifetime', NULL, ''),
(52, 5, 'ho', '4종 쿠폰 무료 증정 (2월)', '4종 쿠폰 무료 증정', '4종 쿠폰 무료 증정\r\n현대아울렛 동대문점\r\nEvent Period : 2026.01.14 ~ 2026.01.31\r\n\r\n● 혜택\r\n① 무료주차 3시간 이용권\r\n② 콜롬비아 퍼펙토 무료음료 이용권(1매)\r\n③ 조앤더주스 커피음료 주문 시 디저트 이용권(1매)\r\n④ 현대백화점 통합멤버십 H.Point 신규 가입 시, 즉시 사용 가능한 H.Point 3천P 쿠폰 증정!\r\n     *신규 회원 가입자 최초 1회에 한함\r\n\r\n기간 · 문의\r\n기간 : 2026.01.14(수) ~ 01.31(일)\r\n문의 : 02-2283-2005\r\n\r\n● 수령방법\r\n1. 카카오톡 채널 친구 @DDP동대문 슈퍼패스 > 현대아울렛 동대문점 3종 쿠폰을 다운로드합니다.\r\n2. 현대아울렛 동대문점 1F INFORMATION 데스크 방문 후 직원을 통해 카카오톡 쿠폰을 제시합니다.\r\n3. 카카오톡 쿠폰과 현대백화점 통합멤버십 H.Point 회원 여부 확인 후 \r\n     H.Point APP 을 통해 사용 가능한 모바일 쿠폰으로 발급해 드립니다.\r\n※ 현대백화점 통합멤버십 앱 H.Point 회원 가입 필수\r\n※ 기간 중 1인 1회 수령 가능\r\n\r\n● 유의사항\r\n1. 카톡플친으로 발급받은 직원확인 버튼은 INFORMATION 현장 직원이 직접 확인 처리하는 버튼이므로 미리 누르지 않도록 주의하세요.\r\n2. 본 쿠폰은 카카오톡 계정당 1장만 발급됩니다.\r\n3. 쿠폰 소진 시 자동으로 종료될 수 있습니다.\r\n4. 본 프로모션은 매장 사정에 의해 사전 공지 없이 조기 종료될 수 있습니다.\r\n5. 기타 문의사항은 매장으로 연락 부탁드립니다.', '', NULL, NULL, '2026-02-04', '2026-02-28', 'Y', 'KR', 'Y', NULL, '52a1050ad6ac566429ca46930eb80083.jpg', '203.228.139.37', '2026-01-26 14:58:45', '2026-01-26 14:58:45', 20000, 1, 'month', NULL, '');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_coupon_usage`
--

CREATE TABLE `dsp_coupon_usage` (
  `usage_no` bigint(20) UNSIGNED NOT NULL,
  `used_at` datetime NOT NULL,
  `mem_id` int(10) UNSIGNED NOT NULL,
  `store_no` int(10) UNSIGNED NOT NULL,
  `coupon_no` int(10) UNSIGNED DEFAULT NULL,
  `price_orig` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `price_pay` int(11) NOT NULL,
  `dc_source` enum('COUPON','STORE') NOT NULL,
  `dc_type` varchar(10) NOT NULL,
  `dc_amount` int(11) NOT NULL,
  `gift_qty` int(11) NOT NULL DEFAULT 0 COMMENT '사은품 수령 수량',
  `ua` varchar(255) DEFAULT NULL,
  `device` varchar(50) DEFAULT NULL,
  `browser` varchar(50) DEFAULT NULL,
  `ip` varchar(50) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_coupon_usage`
--

INSERT INTO `dsp_coupon_usage` (`usage_no`, `used_at`, `mem_id`, `store_no`, `coupon_no`, `price_orig`, `discount`, `price_pay`, `dc_source`, `dc_type`, `dc_amount`, `gift_qty`, `ua`, `device`, `browser`, `ip`, `reg_date`) VALUES
(3, '2025-10-04 15:56:21', 1, 4, 1, 50000, 25000, 25000, 'COUPON', '%', 50, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 15:56:21'),
(4, '2025-10-04 18:07:11', 1, 4, 1, 50000, 25000, 25000, 'COUPON', '%', 50, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 18:07:11'),
(5, '2025-10-04 18:12:32', 1, 4, 1, 100000, 30000, 70000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 18:12:32'),
(6, '2025-10-04 18:21:11', 1, 4, 1, 100000, 30000, 70000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 18:21:11'),
(7, '2025-10-04 18:21:59', 1, 4, 1, 100000, 30000, 70000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 18:21:59'),
(8, '2025-10-04 18:23:13', 1, 4, 1, 100000, 30000, 70000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 18:23:13'),
(9, '2025-10-04 18:26:10', 1, 4, 1, 10000, 3000, 7000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 18:26:10'),
(10, '2025-10-04 18:26:30', 1, 4, 1, 100000, 30000, 70000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 18:26:30'),
(11, '2025-10-04 19:38:59', 1, 4, 1, 30000, 9000, 21000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 19:38:59'),
(12, '2025-10-04 20:13:43', 1, 4, 1, 100000, 30000, 70000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-04 20:13:43'),
(13, '2025-10-04 20:25:08', 1, 4, 1, 100000, 30000, 70000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 20:25:08'),
(14, '2025-10-04 20:25:45', 1, 4, 1, 100000, 30000, 70000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 20:25:45'),
(15, '2025-10-04 21:39:31', 1, 4, 1, 5000, 1500, 3500, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-04 21:39:31'),
(16, '2025-10-04 21:39:55', 1, 4, 1, 88000, 26400, 61600, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-04 21:39:55'),
(17, '2025-10-04 21:48:36', 1, 4, 1, 60000, 18000, 42000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-04 21:48:36'),
(18, '2025-10-04 21:49:59', 1, 4, 1, 50000, 15000, 35000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-04 21:49:59'),
(19, '2025-10-04 21:51:29', 1, 4, 1, 50000, 15000, 35000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-04 21:51:29'),
(20, '2025-10-04 21:52:34', 1, 4, 1, 5000, 1500, 3500, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-04 21:52:34'),
(21, '2025-10-04 21:53:42', 1, 4, 1, 50000, 15000, 35000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-04 21:53:42'),
(22, '2025-10-04 22:48:39', 1, 4, 1, 50000, 15000, 35000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 22:48:39'),
(23, '2025-10-04 22:50:10', 1, 4, 1, 5000, 1500, 3500, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-04 22:50:10'),
(24, '2025-10-04 22:50:39', 1, 4, 1, 5000, 1500, 3500, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-04 22:50:39'),
(25, '2025-10-05 16:08:51', 1, 4, 1, 20000, 6000, 14000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-10-05 16:08:51'),
(26, '2025-10-05 20:43:57', 1, 4, 1, 50000, 15000, 35000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-05 20:43:57'),
(27, '2025-10-05 20:46:43', 1, 4, 1, 5000, 1500, 3500, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-05 20:46:43'),
(28, '2025-10-05 20:47:59', 1, 4, 1, 50000, 15000, 35000, 'COUPON', '%', 30, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-10-05 20:47:59'),
(29, '2025-11-03 15:50:36', 5, 5, 2, 50000, 3000, 47000, 'COUPON', '￦', 3000, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-11-03 15:50:36'),
(30, '2025-11-03 15:58:23', 5, 5, 2, 0, 0, 0, 'COUPON', '￦', 3000, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-11-03 15:58:23'),
(31, '2025-11-03 16:00:17', 5, 5, 2, 0, 0, 0, 'COUPON', '￦', 3000, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-11-03 16:00:17'),
(32, '2025-11-04 15:03:13', 1, 6, 3, 500, 500, 0, 'COUPON', '￦', 500, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '192.168.0.1', '2025-11-04 15:03:13'),
(33, '2025-11-04 15:06:51', 1, 40, 6, 10000, 1000, 9000, 'COUPON', '%', 10, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'PC', 'Chrome', '210.120.40.117', '2025-11-04 15:06:51'),
(34, '2025-11-05 17:32:02', 12, 26, 20, 0, 0, 0, 'COUPON', 'Gift', 10, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-11-05 17:32:02'),
(35, '2025-11-05 17:36:17', 12, 26, 21, 0, 0, 0, 'COUPON', 'Gift', 10, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-11-05 17:36:17'),
(36, '2025-11-05 17:36:37', 11, 15, 34, 10000, 0, 10000, 'COUPON', 'Gift', 0, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'PC', 'Chrome', '210.120.40.117', '2025-11-05 17:36:37'),
(37, '2025-11-07 09:45:51', 11, 17, NULL, 10000, 1000, 9000, 'COUPON', '￦', 1000, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '210.120.40.53', '2025-11-07 09:45:51'),
(38, '2025-11-07 10:13:54', 11, 19, 38, 2000, 200, 1800, 'COUPON', '%', 10, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '210.120.40.53', '2025-11-07 10:13:54'),
(39, '2025-11-10 11:23:13', 1, 3, NULL, 10000, 1000, 9000, 'COUPON', '￦', 1000, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'PC', 'Chrome', '210.120.40.117', '2025-11-10 11:23:13'),
(40, '2025-11-10 13:35:44', 11, 40, 6, 10000, 1000, 9000, 'COUPON', '%', 10, 0, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'MOBILE', 'Chrome', '210.120.40.117', '2025-11-10 13:35:44'),
(41, '2025-11-18 10:45:51', 7, 40, 6, 10000, 1000, 9000, 'COUPON', '%', 10, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'PC', 'Chrome', '115.92.5.197', '2025-11-18 10:45:51'),
(42, '2025-11-25 14:06:56', 11, 1, 30, 20000, 2000, 18000, 'COUPON', '%', 10, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'PC', 'Chrome', '210.120.40.117', '2025-11-25 14:06:56'),
(43, '2025-11-25 15:11:55', 11, 26, 20, 300000, 10, 299990, 'COUPON', 'Gift', 10, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'PC', 'Chrome', '210.120.40.117', '2025-11-25 15:11:55'),
(44, '2025-12-19 12:02:34', 30, 42, 45, 0, 0, 0, 'COUPON', 'Gift', 13000, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'PC', 'Chrome', '175.214.73.130', '2025-12-19 12:02:34'),
(45, '2025-12-19 16:13:43', 28, 5, 2, 0, 0, 0, 'COUPON', '￦', 3000, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'MOBILE', 'Safari', '61.39.186.152', '2025-12-19 16:13:43'),
(46, '2025-12-19 16:14:28', 28, 5, 2, 0, 0, 0, 'COUPON', '￦', 3000, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'MOBILE', 'Safari', '61.39.186.152', '2025-12-19 16:14:28'),
(47, '2025-12-19 16:15:08', 28, 5, 2, 0, 0, 0, 'COUPON', '￦', 3000, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'MOBILE', 'Safari', '61.39.186.152', '2025-12-19 16:15:08'),
(48, '2025-12-23 15:07:27', 1, 42, 45, 0, 0, 0, 'COUPON', 'Gift', 13000, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'PC', 'Chrome', '192.168.0.1', '2025-12-23 15:07:27'),
(49, '2025-12-23 15:08:14', 11, 40, 6, 10000, 1000, 9000, 'COUPON', '%', 10, 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'MOBILE', 'Safari', '210.120.40.53', '2025-12-23 15:08:14');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_currentvisitor`
--

CREATE TABLE `dsp_currentvisitor` (
  `cur_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `cur_mem_name` varchar(255) NOT NULL DEFAULT '',
  `cur_datetime` datetime DEFAULT NULL,
  `cur_page` text DEFAULT NULL,
  `cur_url` text DEFAULT NULL,
  `cur_referer` text DEFAULT NULL,
  `cur_useragent` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_currentvisitor`
--

INSERT INTO `dsp_currentvisitor` (`cur_ip`, `mem_id`, `cur_mem_name`, `cur_datetime`, `cur_page`, `cur_url`, `cur_referer`, `cur_useragent`) VALUES
('1.214.243.130', 0, '', '2025-12-26 18:01:39', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.2; WOW64; Trident/7.0; .NET4.0C; .NET4.0E)'),
('1.220.90.182', 0, '', '2026-01-13 20:08:43', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0'),
('1.241.163.45', 0, '', '2026-01-31 05:52:46', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('104.164.126.72', 0, '', '2026-01-08 11:04:03', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36'),
('106.101.10.51', 0, '', '2025-12-30 21:18:31', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4.1 Mobile/15E148 Safari/604.1'),
('106.101.134.32', 0, '', '2026-01-14 19:24:00', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22F76 Instagram 359.0.0.37.88 (iPhone14,3; iOS 18_5; zh-Hans_KR; zh-Hans; scale=3.00; 1284x2778; 666576740; IABMV/1)'),
('106.101.194.186', 41, '블루스카이', '2026-02-01 14:57:37', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36'),
('106.101.3.78', 0, '', '2026-01-28 19:08:19', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) EdgiOS/143.0.3650.139 Version/26.0 Mobile/15E148 Safari/604.1'),
('106.101.73.117', 0, '', '2025-12-18 01:21:59', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36'),
('107.172.195.86', 0, '', '2026-01-08 11:03:50', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36'),
('110.10.78.3', 0, '', '2025-12-31 20:32:11', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4; 13)'),
('112.168.87.136', 0, '', '2026-01-02 12:10:03', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36'),
('112.172.222.231', 0, '', '2025-12-18 10:54:03', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0'),
('113.198.219.127', 0, '', '2026-01-26 11:42:28', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-F731N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.87 Mobile Safari/537.36 Instagram 413.0.0.41.84 Android (36/16; 480dpi; 1080x2640; samsung; SM-F731N; b5q; qcom; ko'),
('114.205.159.105', 0, '', '2026-01-03 11:03:27', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (iPad; CPU OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4)'),
('115.21.70.142', 0, '', '2025-12-22 15:38:14', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22F76 Instagram 382.0.0.22.84 (iPhone15,4; iOS 18_5; ko_KR; ko; scale=3.00; 1179x2556; IABMV/1; 738721990)'),
('115.92.5.197', 0, '', '2026-01-27 09:49:35', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36'),
('116.32.93.96', 0, '', '2025-12-30 13:30:30', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.3; 12PRO)'),
('117.111.17.192', 0, '', '2025-12-31 19:34:48', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/?fbclid=IwZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQKNjYyODU2ODM3OQABHgQz6F092MX7BHEuafmhTv2MPS5mvbr7_ElexS_JzNt4gheq-US46_3wTUNu_aem_iHmmWe9NzfRUDLo82jyf3A', 'http://m.facebook.com', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_0_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23A355 [FBAN/FBIOS;FBAV/543.0.0.47.72;FBBV/845843444;FBDV/iPhone16,2;FBMD/iPhone;FBSN/iOS;FBSV/26.0.1;FBSS/3;FBID/phone;FBLC/en_US;FBOP/5;FBRV/8528166'),
('117.111.17.216', 0, '', '2025-12-23 16:27:22', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.114 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (29/10; 440dpi; 1080x2134; Xiaomi/Redmi; Redmi Note 8'),
('117.111.6.83', 0, '', '2026-01-28 19:04:48', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36'),
('117.111.8.49', 0, '', '2025-12-18 09:46:36', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/21D50 Instagram 409.0.0.26.161 (iPhone16,2; iOS 17_3; ko_KR; ko; scale=3.00; 1290x2796; IABMV/1; 838724010) Safari/604.1'),
('118.222.172.177', 0, '', '2026-01-10 09:17:50', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Linux; Android 13; SM-A716S Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.23 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.4)'),
('118.235.11.13', 0, '', '2025-12-29 22:47:22', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/21F90 Instagram 396.1.0.47.81 (iPhone14,5; iOS 17_5_1; ko_KR; ko; scale=3.00; 1170x2532; IABMV/1; 787013352) NW/1'),
('118.235.12.115', 0, '', '2025-12-28 21:00:23', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1'),
('118.235.12.94', 0, '', '2026-01-03 20:22:55', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-S938N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S938N; pa3q; qcom; k'),
('118.235.65.32', 5, '정성윤', '2026-01-13 15:00:52', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login/?redirect=https%3A%2F%2Fsuperpass.sfw.kr%2F', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1'),
('118.235.7.254', 5, '정성윤', '2026-01-20 16:21:23', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1'),
('118.235.73.132', 0, '', '2026-01-04 12:48:54', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 16; SM-S908N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.115 Mobile Safari/537.36 DaumApps/8.4.4 DaumDevice/mobile'),
('118.235.73.189', 0, '', '2026-01-14 13:43:30', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
('118.235.73.28', 0, '', '2026-01-08 17:02:50', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)'),
('118.235.74.107', 7, '최예림', '2026-01-20 16:15:06', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login/?redirect=https%3A%2F%2Fsuperpass.sfw.kr%2F', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
('118.235.74.204', 0, '', '2026-01-15 16:15:40', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.3 (INAPP)'),
('118.33.38.6', 0, '', '2026-01-12 21:41:17', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('119.192.206.95', 0, '', '2026-01-03 15:15:56', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('119.192.222.248', 0, '', '2026-01-14 20:09:55', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('119.193.17.96', 0, '', '2026-01-02 12:43:26', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('119.195.228.54', 0, '', '2026-01-23 23:33:51', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0'),
('119.196.116.220', 0, '', '2026-01-21 22:19:01', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'http://www.ddp.or.kr//index.html?menuno=248&siteno=2&bbsno=117&boardno=27&bbstopno=117&act=view', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4; 11)'),
('119.66.128.29', 0, '', '2025-12-18 10:36:05', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('121.129.22.54', 0, '', '2026-01-29 15:51:11', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 414.0.0.23.79 (iPhone13,2; iOS 18_6_2; ko_KR; ko; scale=3.00; 1170x2532; IABMV/1; 868652560) Safari/604.1'),
('121.133.198.161', 0, '', '2026-01-08 14:36:52', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPad; CPU OS 17_7_10 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/21H450 Instagram 410.1.0.36.70 (iPad7,4; iPadOS 17_7_10; ko_KR; ko; scale=2.00; 2224x1668; IABMV/1; 849447290) Safari/604.1'),
('121.139.140.248', 0, '', '2025-12-19 21:14:41', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 409.1.0.27.161 (iPhone12,1; iOS 18_6_2; ko_KR; ko; scale=2.00; 828x1792; IABMV/1; 841016381) Safari/604.1'),
('121.154.25.229', 0, '', '2026-01-22 20:08:19', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23B85 Instagram 412.0.0.17.89 (iPhone16,1; iOS 26_1; ko_KR; ko; scale=3.00; 960x2079; IABMV/1; 859471633) Safari/604.1'),
('121.160.164.179', 0, '', '2026-01-28 00:58:17', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
('121.166.150.160', 0, '', '2026-01-02 16:29:09', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('121.88.168.53', 0, '', '2025-12-29 09:53:58', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'),
('122.34.73.153', 0, '', '2026-01-14 06:10:42', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148'),
('122.46.248.167', 0, '', '2025-12-27 11:40:10', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Whale/4.35.351.13 Safari/537.36'),
('125.128.28.185', 0, '', '2026-01-21 19:47:56', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/27.0 Chrome/125.0.0.0 Mobile Safari/537.36'),
('125.191.51.42', 0, '', '2026-01-24 08:36:46', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-F966N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.87 Mobile Safari/537.36 Instagram 413.0.0.41.84 Android (36/16; 360dpi; 1080x2520; samsung; SM-F966N; q7q; qcom; ko'),
('128.134.1.115', 0, '', '2026-01-28 21:34:12', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('14.36.15.103', 0, '', '2025-12-29 14:09:35', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://www.doota-mall.com/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('14.36.217.193', 0, '', '2025-12-18 11:29:23', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('14.39.22.40', 0, '', '2026-01-15 17:25:24', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.151 Mobile/15E148 Safari/604.1'),
('14.63.100.119', 0, '', '2026-01-08 13:56:31', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/&utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQPNTY3MDY3MzQzMzUyNDI3AAGnBYgJP8qn7YkmoTJUlCTz--0HPNnwR2HkFMHOwqcWJ5UCnTWM2NCXAEavwOg_aem_Y2IeelblpASuRSbhUvNE6w', '', 'Mozilla/5.0 (Linux; Android 16; SM-S926N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.23 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.4)'),
('142.93.143.8', 0, '', '2026-01-08 11:03:56', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/?rest_route=/wp/v2/users/', '', 'Mozilla/5.0 (l9scan/2.0.833323e2630313e2536313e2132313; +https://leakix.net)'),
('175.214.73.130', 30, '박두타', '2025-12-19 12:00:30', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0'),
('180.224.238.229', 0, '', '2025-12-30 20:25:06', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22H124 Instagram 410.1.0.36.70 (iPhone16,1; iOS 18_7_2; ko_KR; ko; scale=3.00; 1179x2556; IABMV/1; 849447290) Safari/604.1'),
('180.224.86.94', 0, '', '2026-01-05 05:49:34', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-S918N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.146 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 420dpi; 1080x2316; samsung; SM-S918N; dm3q; qcom; '),
('182.172.56.197', 0, '', '2026-01-27 13:05:32', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://www.google.com/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('182.172.56.199', 0, '', '2026-01-25 12:16:24', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=ABzkJ://oRBdcFxGa.RUO.Rh/', 'https://www.google.com/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('183.102.205.229', 0, '', '2026-01-07 21:40:34', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-S901N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 Instagram 412.0.0.0.50 Android (36/16; 480dpi; 1080x2340; samsung; SM-S901N; r0q; qcom; ko_'),
('192.168.0.1', 1, '관리자', '2026-02-02 14:27:58', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login/?redirect=https%3A%2F%2Fsuperpass.sfw.kr%2F', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36'),
('195.123.244.84', 0, '', '2026-01-08 11:03:22', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'http://superpass.sfw.kr', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'),
('203.128.172.212', 0, '', '2026-01-19 13:45:49', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.2 Mobile/15E148 Safari/604.1'),
('203.142.217.240', 0, '', '2026-01-27 14:50:54', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Whale/4.35.351.16 Safari/537.36'),
('203.226.142.17', 0, '', '2026-01-23 14:47:29', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0'),
('203.226.142.21', 30, '박두타', '2026-01-15 12:55:19', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36'),
('203.228.139.37', 0, '', '2026-01-29 09:52:28', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponList/edit/5/46', 'https://superpass.sfw.kr/admin/store/couponList/store/5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0'),
('203.228.139.67', 0, '', '2026-01-12 14:55:02', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0'),
('203.228.139.69', 28, '현대아울렛동대문점', '2026-01-26 14:55:48', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login?url=https%3A%2F%2Fsuperpass.sfw.kr%2Fadmin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('203.228.139.71', 35, '김민균', '2025-12-30 16:04:10', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/additional/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0'),
('203.236.91.147', 0, '', '2026-01-25 14:30:55', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36'),
('203.251.240.77', 0, '', '2025-12-24 11:21:11', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1'),
('203.253.93.249', 0, '', '2026-01-29 12:01:28', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('205.169.39.107', 0, '', '2026-01-08 11:04:23', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36'),
('210.101.77.39', 0, '', '2026-01-18 17:31:48', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36'),
('210.108.123.184', 0, '', '2026-02-01 14:25:00', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-S906N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.59 Mobile Safari/537.36 Instagram 414.0.0.40.83 Android (36/16; 450dpi; 1080x2340; samsung; SM-S906N; g0q; qcom; ko'),
('210.120.40.117', 0, '', '2026-02-02 09:56:54', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36'),
('210.120.40.12', 0, '', '2025-12-30 13:03:18', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0'),
('210.120.40.16', 0, '', '2026-01-03 11:31:46', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('210.120.40.53', 0, '', '2026-01-28 12:47:38', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/144.0.7559.95 Mobile/15E148 Safari/604.1'),
('210.179.212.104', 0, '', '2026-01-01 07:38:52', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('211.104.24.13', 0, '', '2026-01-21 11:20:51', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 15; A401OP Build/AP3A.240617.008; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.192 Mobile Safari/537.36 YJApp-ANDROID jp.co.yahoo.android.ybrowser/3.65.1.0'),
('211.106.33.117', 0, '', '2026-01-26 14:34:39', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('211.106.38.12', 0, '', '2026-01-25 11:08:38', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://www.doota-mall.com/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
('211.106.44.1', 0, '', '2026-01-22 23:33:52', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://www.doota-mall.com/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36'),
('211.109.133.92', 0, '', '2026-01-02 00:12:18', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-S926N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 300dpi; 720x1560; samsung; SM-S926N; e2s; s5e9945; '),
('211.112.132.87', 0, '', '2026-01-27 14:50:31', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1'),
('211.206.248.169', 0, '', '2025-12-29 22:46:50', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 406.1.0.48.76 (iPhone17,2; iOS 18_6_2; zh_CN; zh-Hans; scale=3.00; 1320x2868; IABMV/1; 823565292) Safari/604.1'),
('211.213.139.231', 0, '', '2025-12-30 19:41:55', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('211.217.92.115', 0, '', '2026-01-23 10:03:32', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('211.221.96.99', 0, '', '2025-12-17 23:10:18', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.0 (INAPP)'),
('211.231.103.104', 0, '', '2026-01-20 15:43:16', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login/logout/', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('211.231.103.105', 0, '', '2026-01-23 08:17:58', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login/logout/', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('211.231.103.106', 0, '', '2026-01-26 14:40:18', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin/', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('211.231.103.107', 0, '', '2026-01-20 15:43:16', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin/', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('211.231.103.91', 0, '', '2026-01-20 15:43:16', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('211.231.103.92', 0, '', '2026-01-20 15:43:16', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login/logout', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('211.231.103.93', 0, '', '2026-01-20 14:13:25', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin/', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('211.231.103.94', 0, '', '2026-01-27 14:41:47', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'http://superpass.sfw.kr', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('211.234.180.19', 0, '', '2026-01-30 17:09:12', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'http://www.ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 16; SM-S921N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.24 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.7)'),
('211.234.196.247', 0, '', '2026-01-23 00:29:18', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36'),
('211.234.197.178', 0, '', '2025-12-31 09:19:21', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 16; SM-S938N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.23 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.4)'),
('211.234.203.183', 34, '정하임', '2025-12-30 10:16:14', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; '),
('211.234.203.57', 0, '', '2025-12-19 08:04:43', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 15; SM-F711N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.20 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.17.21)'),
('211.234.204.148', 0, '', '2026-01-31 14:43:19', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/?fbclid=IwY2xjawPqdcVleHRuA2FlbQIxMQBzcnRjBmFwcF9pZAwzNTA2ODU1MzE3MjgAAR6O5ePqsUOvZ7gol_R2kBsP3T6rXmaoPDtYVugPVrpXa07CQFlcDZpUM7tpCg_aem_4X12RjCi_hmtXfWJ7w-2EQ', 'https://lm.facebook.com/', 'Mozilla/5.0 (Linux; Android 16; SM-F966N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/134.0.6998.135 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/544.0.0.42.272;IABMV/1;]'),
('211.234.226.158', 0, '', '2025-12-31 18:18:27', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-F766N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.115 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 420dpi; 1080x2520; samsung; SM-F766N; b7s; s5e9955'),
('211.234.226.167', 0, '', '2026-01-03 00:06:12', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4; 13)'),
('211.234.227.189', 0, '', '2025-12-17 16:08:11', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', '', 'Mozilla/5.0 (Linux; Android 15; SM-F711N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 KAKAOTALK/25.10.1 (INAPP)'),
('211.235.75.80', 0, '', '2026-01-08 16:00:48', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-S911N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 Instagram 411.0.0.23.257 Android (36/16; 510dpi; 1080x2340; samsung; SM-S911N; dm1q; qcom; '),
('211.235.99.184', 0, '', '2025-12-27 15:18:38', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponList/store/5', '', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36'),
('211.241.115.238', 0, '', '2026-01-25 10:44:08', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4; 13PRO)'),
('211.246.68.239', 0, '', '2026-01-13 20:07:44', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.151 Mobile/15E148 Safari/604.1'),
('211.246.68.61', 0, '', '2026-01-26 19:29:31', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/144.0.7559.95 Mobile/15E148 Safari/604.1'),
('211.248.240.1', 0, '', '2026-01-21 15:16:54', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('211.249.40.2', 0, '', '2026-01-24 09:03:41', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'facebookexternalhit naverbookmarkcrawler (@link.naver.com)'),
('211.249.40.24', 0, '', '2026-01-23 23:30:42', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'facebookexternalhit naverbookmarkcrawler (@link.naver.com)'),
('211.249.40.5', 0, '', '2026-01-23 23:30:44', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'facebookexternalhit naverbookmarkcrawler (@link.naver.com)'),
('211.35.77.6', 0, '', '2025-12-29 15:24:38', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://www.doota-mall.com/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('211.36.139.86', 0, '', '2026-01-15 15:27:57', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-S938N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.63 Mobile Safari/537.36 Instagram 412.0.0.35.87 Android (36/16; 600dpi; 1440x3120; samsung; SM-S938N; pa3q; qcom; k'),
('211.36.143.136', 0, '', '2026-01-04 10:36:08', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 410.1.0.36.70 (iPhone14,4; iOS 18_6_2; ko_KR; ko; scale=3.00; 1125x2436; IABMV/1; 849447290) Safari/604.1'),
('211.41.105.16', 0, '', '2026-01-05 09:46:29', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25'),
('211.46.167.110', 0, '', '2026-01-06 10:01:02', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('211.53.55.246', 0, '', '2025-12-18 13:04:41', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('218.152.175.243', 0, '', '2025-12-20 01:17:39', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23C55 Instagram 410.0.0.29.70 (iPhone18,3; iOS 26_2; ko_KR; ko; scale=3.00; 1206x2622; IABMV/1; 843189213) Safari/604.1'),
('218.152.37.122', 0, '', '2025-12-18 10:53:20', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1'),
('218.235.241.87', 0, '', '2025-12-30 14:55:16', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://m.naver.com', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.3; 15PRO)'),
('218.237.106.132', 37, '허효정선생님', '2026-01-04 14:54:28', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/additional/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('218.39.96.148', 0, '', '2025-12-30 05:19:04', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://m.naver.com', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.3; 15PRO)'),
('218.52.36.125', 0, '', '2026-01-25 22:15:53', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36'),
('220.79.161.109', 0, '', '2026-02-02 09:09:06', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('221.146.134.58', 0, '', '2025-12-29 23:53:34', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0'),
('221.146.203.130', 0, '', '2026-01-14 18:10:47', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36'),
('221.153.232.154', 0, '', '2026-01-27 13:04:50', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'http://www.ddp.or.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4; 16)'),
('222.111.195.55', 0, '', '2026-01-01 13:04:51', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('222.112.46.156', 0, '', '2026-01-27 12:41:57', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23D5103d Instagram 413.0.0.20.79 (iPhone17,1; iOS 26_3; en_US; en; scale=3.00; 1206x2622; IABMV/1; 863488198) Safari/604.1'),
('223.38.72.74', 0, '', '2026-01-07 09:07:29', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36'),
('223.38.78.197', 0, '', '2025-12-31 10:10:24', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('223.38.78.222', 0, '', '2025-12-31 10:12:54', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
('223.38.78.233', 0, '', '2025-12-30 16:47:06', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
('223.38.78.248', 32, '선혜연', '2025-12-27 11:41:53', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/additional/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)'),
('223.38.78.28', 32, '선혜연', '2025-12-27 11:49:09', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)'),
('223.38.78.65', 0, '', '2025-12-28 11:19:19', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
('223.38.79.13', 0, '', '2025-12-24 11:01:06', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
('223.38.79.189', 0, '', '2025-12-30 16:44:17', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1'),
('223.38.81.32', 0, '', '2025-12-29 17:00:07', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-F966N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.115 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 360dpi; 1080x2520; samsung; SM-F966N; q7q; qcom; k'),
('223.38.85.147', 0, '', '2026-01-11 13:40:29', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1'),
('223.38.86.192', 40, 'EnoFan', '2026-01-31 13:38:47', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/additional/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1'),
('223.38.86.29', 0, '', '2026-02-01 20:44:48', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/additional/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1'),
('223.38.91.137', 0, '', '2025-12-17 16:13:21', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('223.38.94.34', 0, '', '2026-01-05 15:20:12', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('223.38.95.95', 0, '', '2026-01-05 13:47:48', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('223.39.248.170', 0, '', '2026-01-12 15:19:04', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('223.39.84.116', 0, '', '2026-01-01 00:36:48', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36'),
('27.0.238.114', 0, '', '2026-01-08 16:19:09', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login/logout', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.116', 0, '', '2026-01-12 23:33:56', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login/logout', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.117', 0, '', '2026-01-24 20:53:05', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.118', 0, '', '2026-01-16 16:55:34', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin/', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.181', 0, '', '2026-01-23 19:22:08', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.182', 0, '', '2026-01-16 16:55:34', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.186', 0, '', '2026-01-14 13:40:30', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.187', 0, '', '2026-01-15 16:15:18', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.68', 0, '', '2026-01-20 14:13:25', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.69', 0, '', '2026-01-21 17:34:08', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.70', 0, '', '2026-01-20 14:13:25', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/login/logout/', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('27.0.238.71', 0, '', '2026-01-08 09:51:09', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList', 'facebookexternalhit/1.1; kakaotalk-scrap/1.0; +https://devtalk.kakao.com/t/scrap/33984'),
('34.122.147.229', 0, '', '2026-01-08 11:04:08', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36'),
('36.39.116.36', 0, '', '2026-01-24 22:46:27', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 13; SM-G986N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.59 Mobile Safari/537.36 Instagram 413.0.0.41.84 Android (33/13; 450dpi; 1080x2400; samsung; SM-G986N; y2q; qcom; ko_KR'),
('39.115.3.244', 0, '', '2026-01-01 00:04:19', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 15; SM-F926N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.22 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.3)'),
('39.117.215.179', 0, '', '2026-01-12 18:08:50', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 13; SM-N986N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.146 Mobile Safari/537.36 Instagram 411.0.0.23.257 Android (33/13; 600dpi; 1440x3088; samsung; SM-N986N; c2q; qcom; ko_'),
('39.121.81.34', 0, '', '2025-12-30 13:25:48', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('39.124.3.249', 0, '', '2026-01-06 01:52:48', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://www.ddp.or.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1');
INSERT INTO `dsp_currentvisitor` (`cur_ip`, `mem_id`, `cur_mem_name`, `cur_datetime`, `cur_page`, `cur_url`, `cur_referer`, `cur_useragent`) VALUES
('39.7.230.10', 36, '김령아', '2025-12-31 17:07:26', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/additional/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/399.2.845414227 Mobile/15E148 Safari/604.1'),
('39.7.231.110', 0, '', '2025-12-18 05:29:46', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0'),
('39.7.24.150', 0, '', '2026-01-02 15:00:35', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36'),
('39.7.24.33', 0, '', '2026-01-01 09:31:04', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22C161 Instagram 390.0.0.28.85 (iPhone14,8; iOS 18_2_1; ru_RU; ru; scale=3.00; 1284x2778; IABMV/1; 765313520)'),
('58.140.8.112', 0, '', '2026-01-13 19:53:01', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://www.doota-mall.com/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36'),
('58.227.123.106', 0, '', '2026-01-04 20:12:47', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('58.234.233.109', 0, '', '2026-01-17 07:40:41', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0'),
('58.77.189.218', 0, '', '2026-01-07 21:12:22', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 410.1.0.36.70 (iPhone16,1; iOS 18_6_2; ko_KR; ko; scale=3.00; 1179x2556; IABMV/1; 849447290) Safari/604.1'),
('59.15.154.121', 0, '', '2026-02-02 12:40:10', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36'),
('59.15.178.14', 39, 'dittocam', '2026-01-27 13:06:35', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://superpass.sfw.kr/additional/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36'),
('59.22.29.67', 0, '', '2026-01-27 16:09:31', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://ddp.or.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0'),
('59.23.154.210', 0, '', '2026-01-10 01:05:10', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Linux; Android 16; SM-S928N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.146 Mobile Safari/537.36 Instagram 411.0.0.23.257 Android (36/16; 420dpi; 1080x2340; samsung; SM-S928N; e3q; qcom; '),
('59.6.30.249', 0, '', '2025-12-19 10:16:37', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1'),
('61.102.133.66', 0, '', '2026-01-25 09:23:11', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'https://www.doota-mall.com/', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36'),
('61.102.134.101', 0, '', '2026-01-27 05:34:06', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23C55 Instagram 413.0.0.20.79 (iPhone14,7; iOS 26_2; es_LA; es; scale=3.00; 1170x2532; IABMV/1; 863488198) Safari/604.1'),
('61.252.191.29', 0, '', '2026-01-05 16:10:52', '로그인 - DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', 'https://superpass.sfw.kr/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'),
('61.39.186.152', 0, '', '2026-01-14 13:25:53', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', '', 'Mozilla/5.0 (Phone; OpenHarmony 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 ArkWeb/6.0.0.46SP3 Mobile MicroMessenger/8.0.14.42(0xf3800e2a) Weixin NetType/WIFI Language/zh_CN MMWEBID/2416 MMWEBSDK/202512115004 XWEB/1320113'),
('61.73.163.206', 0, '', '2026-01-28 00:00:15', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'http://www.ddp.or.kr/', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4; 13)'),
('61.79.98.3', 0, '', '2026-01-28 20:46:39', 'DongDaeMun _ SUPERPASS', 'https://superpass.sfw.kr/', 'http://www.ddp.or.kr/', 'Mozilla/5.0 (Linux; Android 16; SM-F946N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.24 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.7)');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_deposit`
--

CREATE TABLE `dsp_deposit` (
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_nickname` varchar(100) NOT NULL DEFAULT '',
  `mem_realname` varchar(100) NOT NULL DEFAULT '',
  `mem_email` varchar(100) NOT NULL DEFAULT '',
  `mem_phone` varchar(255) NOT NULL DEFAULT '',
  `dep_from_type` varchar(100) NOT NULL DEFAULT '',
  `dep_to_type` varchar(100) NOT NULL DEFAULT '',
  `dep_deposit_request` int(11) NOT NULL DEFAULT 0,
  `dep_deposit` int(11) NOT NULL DEFAULT 0,
  `dep_deposit_sum` int(11) NOT NULL DEFAULT 0,
  `dep_cash_request` int(11) NOT NULL DEFAULT 0,
  `dep_cash` int(11) NOT NULL DEFAULT 0,
  `dep_point` int(11) NOT NULL DEFAULT 0,
  `dep_content` varchar(255) NOT NULL DEFAULT '',
  `dep_pay_type` varchar(100) NOT NULL DEFAULT '',
  `dep_pg` varchar(255) NOT NULL DEFAULT '',
  `dep_tno` varchar(255) NOT NULL DEFAULT '',
  `dep_app_no` varchar(255) NOT NULL DEFAULT '',
  `dep_bank_info` varchar(255) NOT NULL DEFAULT '',
  `dep_admin_memo` text DEFAULT NULL,
  `dep_datetime` datetime DEFAULT NULL,
  `dep_deposit_datetime` datetime DEFAULT NULL,
  `dep_ip` varchar(50) NOT NULL DEFAULT '',
  `dep_useragent` varchar(255) NOT NULL DEFAULT '',
  `dep_status` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `dep_vbank_expire` datetime DEFAULT NULL,
  `is_test` char(1) NOT NULL DEFAULT '',
  `status` varchar(255) NOT NULL DEFAULT '',
  `dep_refund_price` int(11) NOT NULL DEFAULT 0,
  `dep_order_history` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_document`
--

CREATE TABLE `dsp_document` (
  `doc_id` int(11) UNSIGNED NOT NULL,
  `doc_key` varchar(100) NOT NULL DEFAULT '',
  `doc_title` varchar(255) NOT NULL DEFAULT '',
  `doc_content` mediumtext DEFAULT NULL,
  `doc_mobile_content` mediumtext DEFAULT NULL,
  `doc_content_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `doc_layout` varchar(255) NOT NULL DEFAULT '',
  `doc_mobile_layout` varchar(255) NOT NULL DEFAULT '',
  `doc_sidebar` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `doc_mobile_sidebar` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `doc_skin` varchar(255) NOT NULL DEFAULT '',
  `doc_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `doc_hit` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `doc_datetime` datetime DEFAULT NULL,
  `doc_updated_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `doc_updated_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_document`
--

INSERT INTO `dsp_document` (`doc_id`, `doc_key`, `doc_title`, `doc_content`, `doc_mobile_content`, `doc_content_html_type`, `doc_layout`, `doc_mobile_layout`, `doc_sidebar`, `doc_mobile_sidebar`, `doc_skin`, `doc_mobile_skin`, `doc_hit`, `mem_id`, `doc_datetime`, `doc_updated_mem_id`, `doc_updated_datetime`) VALUES
(1, 'aboutus', '회사소개', '회사소개 내용을 입력해주세요', NULL, 1, '', '', 0, 0, '', '', 0, 1, '2025-05-25 16:21:29', 1, '2025-05-25 16:21:29'),
(2, 'provision', '이용약관', '이용약관 내용을 입력해주세요', NULL, 1, '', '', 0, 0, '', '', 0, 1, '2025-05-25 16:21:29', 1, '2025-05-25 16:21:29'),
(3, 'privacy', '개인정보 취급방침', '개인정보 취급방침 내용을 입력해주세요', NULL, 1, '', '', 0, 0, '', '', 0, 1, '2025-05-25 16:21:29', 1, '2025-05-25 16:21:29'),
(4, 'cmall', '이용안내', '이용안내 내용을 입력해주세요', NULL, 1, 'cmall_bootstrap', '', 0, 0, '', '', 0, 1, '2025-05-25 16:21:29', 1, '2025-05-25 16:21:29');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_editor_image`
--

CREATE TABLE `dsp_editor_image` (
  `eim_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `eim_originname` varchar(255) NOT NULL DEFAULT '',
  `eim_filename` varchar(255) NOT NULL DEFAULT '',
  `eim_filesize` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `eim_width` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `eim_height` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `eim_type` varchar(10) NOT NULL DEFAULT '',
  `eim_datetime` datetime DEFAULT NULL,
  `eim_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_faq`
--

CREATE TABLE `dsp_faq` (
  `faq_id` int(11) UNSIGNED NOT NULL,
  `fgr_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `faq_title` text DEFAULT NULL,
  `faq_content` mediumtext DEFAULT NULL,
  `faq_mobile_content` mediumtext DEFAULT NULL,
  `faq_content_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `faq_order` int(11) NOT NULL DEFAULT 0,
  `faq_datetime` datetime DEFAULT NULL,
  `faq_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_faq_group`
--

CREATE TABLE `dsp_faq_group` (
  `fgr_id` int(11) UNSIGNED NOT NULL,
  `fgr_title` varchar(255) NOT NULL DEFAULT '',
  `fgr_key` varchar(100) NOT NULL DEFAULT '',
  `fgr_layout` varchar(255) NOT NULL DEFAULT '',
  `fgr_mobile_layout` varchar(255) NOT NULL DEFAULT '',
  `fgr_sidebar` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `fgr_mobile_sidebar` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `fgr_skin` varchar(255) NOT NULL DEFAULT '',
  `fgr_mobile_skin` varchar(255) NOT NULL DEFAULT '',
  `fgr_datetime` datetime DEFAULT NULL,
  `fgr_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_follow`
--

CREATE TABLE `dsp_follow` (
  `fol_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `target_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `fol_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_like`
--

CREATE TABLE `dsp_like` (
  `lik_id` int(11) UNSIGNED NOT NULL,
  `target_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `target_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `target_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `lik_type` tinyint(4) UNSIGNED NOT NULL,
  `lik_datetime` datetime DEFAULT NULL,
  `lik_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member`
--

CREATE TABLE `dsp_member` (
  `mem_id` int(11) UNSIGNED NOT NULL,
  `mem_userid` varchar(100) NOT NULL DEFAULT '',
  `mem_email` varchar(100) NOT NULL DEFAULT '',
  `mem_password` varchar(255) NOT NULL DEFAULT '',
  `mem_username` varchar(100) NOT NULL DEFAULT '',
  `mem_nickname` varchar(100) NOT NULL DEFAULT '',
  `mem_level` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `mem_point` int(11) NOT NULL DEFAULT 0,
  `mem_homepage` text DEFAULT NULL,
  `mem_phone` varchar(255) NOT NULL DEFAULT '',
  `mem_birthday` char(10) NOT NULL DEFAULT '',
  `mem_sex` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_zipcode` varchar(7) NOT NULL DEFAULT '',
  `mem_address1` varchar(255) NOT NULL DEFAULT '',
  `mem_address2` varchar(255) NOT NULL DEFAULT '',
  `mem_address3` varchar(255) NOT NULL DEFAULT '',
  `mem_address4` varchar(255) NOT NULL DEFAULT '',
  `mem_receive_email` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_use_note` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_receive_sms` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_open_profile` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_denied` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_email_cert` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_register_datetime` datetime DEFAULT NULL,
  `mem_register_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_lastlogin_datetime` datetime DEFAULT NULL,
  `mem_lastlogin_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_is_admin` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_profile_content` text DEFAULT NULL,
  `mem_adminmemo` text DEFAULT NULL,
  `mem_following` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_followed` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_icon` varchar(255) NOT NULL DEFAULT '',
  `mem_photo` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member`
--

INSERT INTO `dsp_member` (`mem_id`, `mem_userid`, `mem_email`, `mem_password`, `mem_username`, `mem_nickname`, `mem_level`, `mem_point`, `mem_homepage`, `mem_phone`, `mem_birthday`, `mem_sex`, `mem_zipcode`, `mem_address1`, `mem_address2`, `mem_address3`, `mem_address4`, `mem_receive_email`, `mem_use_note`, `mem_receive_sms`, `mem_open_profile`, `mem_denied`, `mem_email_cert`, `mem_register_datetime`, `mem_register_ip`, `mem_lastlogin_datetime`, `mem_lastlogin_ip`, `mem_is_admin`, `mem_profile_content`, `mem_adminmemo`, `mem_following`, `mem_followed`, `mem_icon`, `mem_photo`) VALUES
(1, 'admin', 'www@sfw.kr', '$2y$10$6Bha2yqO4Z3TlKhbJ9KWvuLioJ62Urv5yFo3r2zSFH5TxU/6jTLfS', '관리자', '관리자', 100, 0, '', '', '', 1, '', '', '', '', '', 1, 1, 1, 1, 0, 1, '2025-05-25 16:21:29', '192.168.0.1', '2026-02-02 11:03:09', '192.168.0.1', 1, '', '', 0, 0, '', ''),
(5, 'jsy@sfw.kr', 'jsy@sfw.kr', '', '정성윤', '정성윤', 2, 0, '', '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-09-18 16:11:44', '192.168.0.1', '2026-01-20 15:44:53', '118.235.7.254', 0, '', '', 0, 0, '', ''),
(7, 'dpfla990113@gmail.com', 'dpfla990113@gmail.com', '', '최예림', '최예림', 2, 0, '', '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-10-01 08:03:44', '106.101.131.213', '2026-01-20 16:15:06', '118.235.74.107', 0, '', '', 0, 0, '', ''),
(8, 'lesonia2@gmail.com', 'lesonia2@gmail.com', '', 'soyeonLee', 'soyeonLee', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-10-13 17:01:33', '210.120.40.53', '2025-11-18 08:49:30', '211.234.227.194', 0, NULL, NULL, 0, 0, '', ''),
(10, 'zaqxsw784@gmail.com', 'zaqxsw784@gmail.com', '', 'minyoung“gidam”kwak', 'minyoung“gidam”kwak', 2, 0, NULL, '', '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-05 16:55:52', '210.120.40.53', '2025-11-05 16:55:52', '210.120.40.53', 0, NULL, NULL, 0, 0, '', ''),
(11, 'yelimc79@gmail.com', 'yelimc79@gmail.com', '', '최예림1', '최예림1', 2, 0, '', '', '', 3, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-05 16:58:00', '39.7.231.159', '2026-01-20 14:09:03', '210.120.40.117', 0, '', '', 0, 0, '', ''),
(12, 'sungyoon.jung.1998@gmail.com', 'sungyoon.jung.1998@gmail.com', '', 'SYJ2', 'SYJ2', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-05 17:07:07', '14.36.217.193', '2026-02-02 14:26:43', '192.168.0.1', 0, NULL, NULL, 0, 0, '', ''),
(13, 'songjy0702@gmail.com', 'songjy0702@gmail.com', '', 'JuyoungSong', 'JuyoungSong', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-25 09:57:34', '218.152.37.122', '2025-11-25 09:57:34', '218.152.37.122', 0, NULL, NULL, 0, 0, '', ''),
(14, 'jumiyeo123@gmail.com', 'jumiyeo123@gmail.com', '', 'jumiyeo', 'jumiyeo', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-25 10:13:16', '211.104.38.177', '2025-11-25 10:13:16', '211.104.38.177', 0, NULL, NULL, 0, 0, '', ''),
(15, 'ji.lee@urbanhost.co.kr', 'ji.lee@urbanhost.co.kr', '', '이지인', '이지인', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-25 11:06:10', '218.153.127.49', '2025-11-25 11:06:10', '218.153.127.49', 0, NULL, NULL, 0, 0, '', ''),
(16, 'mimilinecoltd@gmail.com', 'mimilinecoltd@gmail.com', '', 'MIMILINECO.LTD.', 'MIMILINECO.LTD.', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-25 11:39:06', '211.62.174.10', '2025-11-25 11:39:06', '211.62.174.10', 0, NULL, NULL, 0, 0, '', ''),
(17, 'djkoreatour@gmail.com', 'djkoreatour@gmail.com', '', 'DAVIDJOO', 'DAVIDJOO', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-25 13:55:11', '211.59.179.170', '2025-11-25 13:55:11', '211.59.179.170', 0, NULL, NULL, 0, 0, '', ''),
(18, 'dlfppsl@gmail.com', 'dlfppsl@gmail.com', '', 'YireShin(신이레)', 'YireShin(신이레)', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-25 18:03:33', '121.129.23.77', '2025-11-25 18:03:33', '121.129.23.77', 0, NULL, NULL, 0, 0, '', ''),
(19, 'yckim1985@gmail.com', 'yckim1985@gmail.com', '', '삼겹살', '삼겹살', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-26 11:41:02', '218.152.37.233', '2025-11-26 11:41:02', '218.152.37.233', 0, NULL, NULL, 0, 0, '', ''),
(20, 'affairjangchung@gmail.com', 'affairjangchung@gmail.com', '', '어페어커피장충점', '어페어커피장충점', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-26 21:43:46', '14.52.80.131', '2025-11-26 21:43:46', '14.52.80.131', 0, NULL, NULL, 0, 0, '', ''),
(21, 'sorbine94@gmail.com', 'sorbine94@gmail.com', '', '장솔빈', '장솔빈', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-11-27 16:56:01', '118.235.4.63', '2025-12-15 11:00:55', '115.92.5.197', 0, NULL, NULL, 0, 0, '', ''),
(22, 'mohicanbear@gmail.com', 'mohicanbear@gmail.com', '', 'JongwonLee', 'JongwonLee', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-03 22:20:53', '203.254.98.115', '2025-12-03 22:20:53', '203.254.98.115', 0, NULL, NULL, 0, 0, '', ''),
(23, 'jungah090909@gmail.com', 'jungah090909@gmail.com', '', '신정아', '신정아', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-11 09:59:47', '210.120.40.16', '2025-12-11 09:59:47', '210.120.40.16', 0, NULL, NULL, 0, 0, '', ''),
(24, 'snoopire@gmail.com', 'snoopire@gmail.com', '', 'eun-haekim', 'eun-haekim', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-12 14:52:22', '211.234.196.182', '2025-12-12 14:52:22', '211.234.196.182', 0, NULL, NULL, 0, 0, '', ''),
(25, 'whalstn328@gmail.com', 'whalstn328@gmail.com', '', '조민수', '조민수', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-13 00:19:30', '121.143.87.35', '2025-12-13 00:19:30', '121.143.87.35', 0, NULL, NULL, 0, 0, '', ''),
(26, 'akhenkitera@gmail.com', 'akhenkitera@gmail.com', '', 'HyemiLee', 'HyemiLee', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-13 20:19:42', '117.111.6.234', '2025-12-13 20:19:42', '117.111.6.234', 0, NULL, NULL, 0, 0, '', ''),
(27, 'sunwha1003@gmail.com', 'sunwha1003@gmail.com', '', '김선화', '김선화', 2, 0, '', '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-17 10:34:58', '203.226.142.17', '2026-01-15 12:49:45', '203.226.142.21', 0, '', '', 0, 0, '', ''),
(28, 'hyundaioutletddm@gmail.com', 'hyundaioutletddm@gmail.com', '', '현대아울렛동대문점', '현대아울렛동대문점', 2, 0, '', '', '', 4, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-17 16:08:44', '203.228.139.69', '2026-01-26 14:45:23', '203.228.139.37', 0, '', '', 0, 0, '', ''),
(29, 'poss3311@gmail.com', 'poss3311@gmail.com', '', '박연서', '박연서', 2, 0, '', '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-18 08:25:13', '203.226.142.21', '2025-12-18 08:25:13', '203.226.142.21', 0, '', '', 0, 0, '', ''),
(30, 'dootamallmkt@gmail.com', 'dootamallmkt@gmail.com', '', '박두타', '박두타', 2, 0, '', '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-18 08:42:58', '203.226.142.17', '2026-01-15 12:49:04', '203.226.142.21', 0, '', '', 0, 0, '', ''),
(31, 'ljs9175@gmail.com', 'ljs9175@gmail.com', '', 'jungseoklee', 'jungseoklee', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-18 13:09:20', '203.226.142.17', '2025-12-18 13:09:20', '203.226.142.17', 0, NULL, NULL, 0, 0, '', ''),
(32, 'hyseon0519@gmail.com', 'hyseon0519@gmail.com', '', '선혜연', '선혜연', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-27 11:41:34', '223.38.78.248', '2025-12-27 11:41:34', '223.38.78.248', 0, NULL, NULL, 0, 0, '', ''),
(33, 'sujin3575kim@gmail.com', 'sujin3575kim@gmail.com', '', 'skim', 'skim', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-29 14:13:24', '223.39.84.116', '2025-12-29 14:13:24', '223.39.84.116', 0, NULL, NULL, 0, 0, '', ''),
(34, 'haim3004@gmail.com', 'haim3004@gmail.com', '', '정하임', '정하임', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-30 10:11:29', '211.234.203.183', '2025-12-30 10:11:29', '211.234.203.183', 0, NULL, NULL, 0, 0, '', ''),
(35, 'hyundaiddm11@gmail.com', 'hyundaiddm11@gmail.com', '', '김민균', '김민균', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-30 16:03:47', '203.228.139.71', '2025-12-30 16:03:47', '203.228.139.71', 0, NULL, NULL, 0, 0, '', ''),
(36, 'fuddk0911@gmail.com', 'fuddk0911@gmail.com', '', '김령아', '김령아', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2025-12-31 17:06:37', '39.7.230.10', '2025-12-31 17:06:37', '39.7.230.10', 0, NULL, NULL, 0, 0, '', ''),
(37, 'dongbuk02@dongbuk.es.kr', 'dongbuk02@dongbuk.es.kr', '', '허효정선생님', '허효정선생님', 2, 0, NULL, '', '', 2, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2026-01-04 14:53:38', '218.237.106.132', '2026-01-04 14:53:38', '218.237.106.132', 0, NULL, NULL, 0, 0, '', ''),
(38, 'pollen1224@gmail.com', 'pollen1224@gmail.com', '', 'LucyChoi', 'LucyChoi', 2, 0, NULL, '', '', 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2026-01-23 23:32:18', '119.195.228.54', '2026-01-23 23:32:18', '119.195.228.54', 0, NULL, NULL, 0, 0, '', ''),
(39, 'dittocam@gmail.com', 'dittocam@gmail.com', '', 'dittocam', 'dittocam', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2026-01-27 13:05:49', '59.15.178.14', '2026-01-27 13:05:49', '59.15.178.14', 0, NULL, NULL, 0, 0, '', ''),
(40, 'eno926@gmail.com', 'eno926@gmail.com', '', 'EnoFan', 'EnoFan', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2026-01-31 13:38:15', '223.38.86.192', '2026-01-31 13:38:15', '223.38.86.192', 0, NULL, NULL, 0, 0, '', ''),
(41, 'korean2012@gmail.com', 'korean2012@gmail.com', '', '블루스카이', '블루스카이', 2, 0, NULL, '', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0, 0, '2026-02-01 14:56:54', '106.101.194.186', '2026-02-01 14:56:54', '106.101.194.186', 0, NULL, NULL, 0, 0, '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_auth_email`
--

CREATE TABLE `dsp_member_auth_email` (
  `mae_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mae_key` varchar(100) NOT NULL DEFAULT '',
  `mae_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mae_generate_datetime` datetime DEFAULT NULL,
  `mae_use_datetime` datetime DEFAULT NULL,
  `mae_expired` tinyint(4) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_certify`
--

CREATE TABLE `dsp_member_certify` (
  `mce_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mce_type` varchar(50) NOT NULL DEFAULT '',
  `mce_datetime` datetime DEFAULT NULL,
  `mce_ip` varchar(50) NOT NULL DEFAULT '',
  `mce_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_dormant`
--

CREATE TABLE `dsp_member_dormant` (
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_userid` varchar(100) NOT NULL DEFAULT '',
  `mem_email` varchar(100) NOT NULL DEFAULT '',
  `mem_password` varchar(255) NOT NULL DEFAULT '',
  `mem_username` varchar(100) NOT NULL DEFAULT '',
  `mem_nickname` varchar(100) NOT NULL DEFAULT '',
  `mem_level` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `mem_point` int(11) NOT NULL DEFAULT 0,
  `mem_homepage` text DEFAULT NULL,
  `mem_phone` varchar(255) NOT NULL DEFAULT '',
  `mem_birthday` char(10) NOT NULL DEFAULT '',
  `mem_sex` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_zipcode` varchar(7) NOT NULL DEFAULT '',
  `mem_address1` varchar(255) NOT NULL DEFAULT '',
  `mem_address2` varchar(255) NOT NULL DEFAULT '',
  `mem_address3` varchar(255) NOT NULL DEFAULT '',
  `mem_address4` varchar(255) NOT NULL DEFAULT '',
  `mem_receive_email` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_use_note` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_receive_sms` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_open_profile` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_denied` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_email_cert` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_register_datetime` datetime DEFAULT NULL,
  `mem_register_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_lastlogin_datetime` datetime DEFAULT NULL,
  `mem_lastlogin_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_is_admin` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_profile_content` text DEFAULT NULL,
  `mem_adminmemo` text DEFAULT NULL,
  `mem_following` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_followed` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_icon` varchar(255) NOT NULL DEFAULT '',
  `mem_photo` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_dormant_notify`
--

CREATE TABLE `dsp_member_dormant_notify` (
  `mdn_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_userid` varchar(100) NOT NULL DEFAULT '',
  `mem_email` varchar(100) NOT NULL DEFAULT '',
  `mem_username` varchar(100) NOT NULL DEFAULT '',
  `mem_nickname` varchar(100) NOT NULL DEFAULT '',
  `mem_register_datetime` datetime DEFAULT NULL,
  `mem_lastlogin_datetime` datetime DEFAULT NULL,
  `mdn_dormant_datetime` datetime DEFAULT NULL,
  `mdn_dormant_notify_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_extra_vars`
--

CREATE TABLE `dsp_member_extra_vars` (
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mev_key` varchar(100) NOT NULL DEFAULT '',
  `mev_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member_extra_vars`
--

INSERT INTO `dsp_member_extra_vars` (`mem_id`, `mev_key`, `mev_value`) VALUES
(1, 'mem_age', '30-40'),
(1, 'mem_nation', 'Korea, Republic of'),
(1, 'mem_purpose', 'Business'),
(5, 'mem_age', '30-40'),
(5, 'mem_nation', 'Korea, Republic of'),
(5, 'mem_purpose', 'Visit DDP'),
(6, 'mem_age', '40-50'),
(6, 'mem_nation', 'Korea, Republic of'),
(6, 'mem_purpose', 'Shopping'),
(7, 'mem_age', '20-30'),
(7, 'mem_nation', 'Korea, Republic of'),
(7, 'mem_purpose', 'Visit DDP'),
(8, 'mem_age', '40-50'),
(8, 'mem_nation', 'Korea, Republic of'),
(8, 'mem_purpose', 'Food'),
(11, 'mem_age', '20-30'),
(11, 'mem_nation', 'Central African Republic'),
(11, 'mem_purpose', 'Food'),
(12, 'mem_age', '30-40'),
(12, 'mem_nation', 'Korea, Republic of'),
(12, 'mem_purpose', 'etc'),
(13, 'mem_age', '30-40'),
(13, 'mem_nation', 'Korea, Republic of'),
(13, 'mem_purpose', 'Shopping'),
(14, 'mem_age', '30-40'),
(14, 'mem_nation', 'Korea (Democratic People\'s Republic of)'),
(14, 'mem_purpose', 'Shopping'),
(15, 'mem_age', '30-40'),
(15, 'mem_nation', 'Korea, Republic of'),
(15, 'mem_purpose', 'Food'),
(16, 'mem_age', '30-40'),
(16, 'mem_nation', 'Korea, Republic of'),
(16, 'mem_purpose', 'Shopping'),
(17, 'mem_age', '40-50'),
(17, 'mem_nation', 'Korea, Republic of'),
(17, 'mem_purpose', 'Visit DDP'),
(18, 'mem_age', '30-40'),
(18, 'mem_nation', 'Korea, Republic of'),
(18, 'mem_purpose', 'Visit DDP'),
(19, 'mem_age', '30-40'),
(19, 'mem_nation', 'Korea (Democratic People\'s Republic of)'),
(19, 'mem_purpose', 'Shopping'),
(20, 'mem_age', '30-40'),
(20, 'mem_nation', 'Korea, Republic of'),
(20, 'mem_purpose', 'etc'),
(21, 'mem_age', '20-30'),
(21, 'mem_nation', 'Bulgaria'),
(21, 'mem_purpose', 'Shopping'),
(22, 'mem_age', '30-40'),
(22, 'mem_nation', 'Korea, Republic of'),
(22, 'mem_purpose', 'Shopping'),
(23, 'mem_age', '30-40'),
(23, 'mem_nation', 'Korea, Republic of'),
(23, 'mem_purpose', 'Shopping'),
(24, 'mem_age', '40-50'),
(24, 'mem_nation', 'Korea, Republic of'),
(24, 'mem_purpose', 'etc'),
(25, 'mem_age', '20-30'),
(25, 'mem_nation', 'Korea, Republic of'),
(25, 'mem_purpose', 'Visit DDP'),
(26, 'mem_age', '30-40'),
(26, 'mem_nation', 'Korea, Republic of'),
(26, 'mem_purpose', 'Shopping'),
(27, 'mem_age', '40-50'),
(27, 'mem_nation', 'Korea, Republic of'),
(27, 'mem_purpose', 'etc'),
(28, 'mem_age', '20below'),
(28, 'mem_nation', 'Korea, Republic of'),
(28, 'mem_purpose', 'Shopping'),
(29, 'mem_age', '30-40'),
(29, 'mem_nation', 'Korea, Republic of'),
(29, 'mem_purpose', 'Shopping'),
(30, 'mem_age', '30-40'),
(30, 'mem_nation', 'Korea, Republic of'),
(30, 'mem_purpose', 'etc'),
(31, 'mem_age', '50over'),
(31, 'mem_nation', 'Korea, Republic of'),
(31, 'mem_purpose', 'Shopping'),
(32, 'mem_age', '20-30'),
(32, 'mem_nation', 'United States of America'),
(32, 'mem_purpose', 'Shopping'),
(33, 'mem_age', '20-30'),
(33, 'mem_nation', 'Korea, Republic of'),
(33, 'mem_purpose', 'Visit DDP'),
(34, 'mem_age', '40-50'),
(34, 'mem_nation', 'Korea, Republic of'),
(34, 'mem_purpose', 'Food'),
(35, 'mem_age', '20-30'),
(35, 'mem_nation', 'Korea, Republic of'),
(35, 'mem_purpose', 'Visit DDP'),
(36, 'mem_age', '20-30'),
(36, 'mem_nation', 'Japan'),
(36, 'mem_purpose', 'Shopping'),
(37, 'mem_age', '40-50'),
(37, 'mem_nation', 'Korea, Republic of'),
(37, 'mem_purpose', 'Visit DDP'),
(39, 'mem_age', '40-50'),
(39, 'mem_nation', 'Korea, Republic of'),
(39, 'mem_purpose', 'Heritage'),
(40, 'mem_age', '40-50'),
(40, 'mem_nation', 'China'),
(40, 'mem_purpose', 'Shopping'),
(41, 'mem_age', '30-40'),
(41, 'mem_nation', 'Korea (Democratic People\'s Republic of)'),
(41, 'mem_purpose', 'Shopping');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_group`
--

CREATE TABLE `dsp_member_group` (
  `mgr_id` int(11) UNSIGNED NOT NULL,
  `mgr_title` varchar(255) NOT NULL DEFAULT '',
  `mgr_is_default` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mgr_datetime` datetime DEFAULT NULL,
  `mgr_order` int(11) NOT NULL DEFAULT 0,
  `mgr_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member_group`
--

INSERT INTO `dsp_member_group` (`mgr_id`, `mgr_title`, `mgr_is_default`, `mgr_datetime`, `mgr_order`, `mgr_description`) VALUES
(1, '일반사용자', 1, '2025-11-02 17:00:34', 1, ''),
(2, '협력업체', 0, '2025-11-02 17:00:34', 2, ''),
(3, '관리자', 0, '2025-11-02 17:00:34', 3, '');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_group_member`
--

CREATE TABLE `dsp_member_group_member` (
  `mgm_id` int(11) UNSIGNED NOT NULL,
  `mgr_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mgm_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member_group_member`
--

INSERT INTO `dsp_member_group_member` (`mgm_id`, `mgr_id`, `mem_id`, `mgm_datetime`) VALUES
(5, 1, 6, '2025-09-30 13:21:43'),
(7, 1, 8, '2025-10-13 17:01:33'),
(8, 1, 5, '2025-11-02 17:01:59'),
(10, 3, 5, '2025-11-02 17:01:59'),
(11, 1, 7, '2025-11-02 17:02:39'),
(12, 3, 7, '2025-11-02 17:02:39'),
(13, 2, 5, '2025-11-02 19:07:48'),
(15, 2, 5, '2025-11-02 21:21:56'),
(18, 1, 10, '2025-11-05 16:55:52'),
(20, 1, 12, '2025-11-05 17:07:07'),
(21, 1, 13, '2025-11-25 09:57:34'),
(22, 1, 14, '2025-11-25 10:13:16'),
(23, 1, 15, '2025-11-25 11:06:10'),
(24, 1, 16, '2025-11-25 11:39:06'),
(25, 1, 17, '2025-11-25 13:55:11'),
(26, 1, 18, '2025-11-25 18:03:33'),
(27, 1, 19, '2025-11-26 11:41:02'),
(28, 1, 20, '2025-11-26 21:43:46'),
(29, 3, 11, '2025-11-27 13:42:05'),
(32, 1, 21, '2025-11-27 16:56:01'),
(33, 1, 22, '2025-12-03 22:20:53'),
(34, 1, 23, '2025-12-11 09:59:47'),
(35, 1, 24, '2025-12-12 14:52:22'),
(36, 1, 25, '2025-12-13 00:19:30'),
(37, 1, 26, '2025-12-13 20:19:42'),
(43, 1, 27, '2025-12-17 15:45:20'),
(44, 2, 27, '2025-12-17 15:45:20'),
(46, 2, 28, '2025-12-17 16:09:42'),
(47, 2, 28, '2025-12-17 16:14:45'),
(50, 2, 29, '2025-12-18 09:18:41'),
(51, 2, 30, '2025-12-18 09:18:47'),
(52, 2, 29, '2025-12-18 09:18:53'),
(53, 2, 30, '2025-12-18 09:18:55'),
(55, 1, 31, '2025-12-18 13:09:20'),
(56, 2, 11, '2025-12-19 09:56:29'),
(57, 2, 11, '2025-12-19 09:56:35'),
(58, 2, 11, '2025-12-19 09:56:41'),
(59, 2, 11, '2025-12-19 09:56:47'),
(60, 2, 11, '2025-12-19 09:56:52'),
(61, 2, 11, '2025-12-19 09:56:58'),
(62, 2, 11, '2025-12-19 09:57:03'),
(63, 2, 11, '2025-12-19 09:57:07'),
(65, 2, 11, '2025-12-19 09:57:17'),
(66, 2, 11, '2025-12-19 09:57:22'),
(67, 2, 11, '2025-12-19 09:57:26'),
(68, 2, 11, '2025-12-19 09:57:31'),
(69, 2, 11, '2025-12-19 09:57:36'),
(70, 2, 11, '2025-12-19 09:57:42'),
(71, 2, 11, '2025-12-19 09:57:46'),
(72, 2, 11, '2025-12-19 09:57:52'),
(73, 2, 11, '2025-12-19 09:57:57'),
(74, 2, 11, '2025-12-19 09:58:02'),
(75, 2, 11, '2025-12-19 09:58:07'),
(76, 2, 11, '2025-12-19 09:58:15'),
(77, 2, 11, '2025-12-19 09:58:20'),
(78, 2, 11, '2025-12-19 09:58:24'),
(79, 2, 11, '2025-12-19 09:58:28'),
(80, 2, 11, '2025-12-19 09:58:33'),
(81, 2, 11, '2025-12-19 09:58:39'),
(82, 2, 11, '2025-12-19 09:58:44'),
(83, 2, 11, '2025-12-19 09:58:48'),
(84, 2, 11, '2025-12-19 09:58:52'),
(85, 2, 11, '2025-12-19 09:58:56'),
(86, 2, 11, '2025-12-19 09:59:01'),
(87, 2, 11, '2025-12-19 09:59:07'),
(88, 2, 11, '2025-12-19 09:59:13'),
(89, 2, 11, '2025-12-19 09:59:18'),
(90, 2, 11, '2025-12-19 09:59:21'),
(91, 1, 32, '2025-12-27 11:41:34'),
(92, 1, 33, '2025-12-29 14:13:24'),
(93, 1, 34, '2025-12-30 10:11:29'),
(94, 1, 35, '2025-12-30 16:03:47'),
(95, 1, 36, '2025-12-31 17:06:37'),
(96, 1, 37, '2026-01-04 14:53:38'),
(97, 1, 38, '2026-01-23 23:32:18'),
(98, 1, 39, '2026-01-27 13:05:49'),
(99, 1, 40, '2026-01-31 13:38:15'),
(100, 1, 41, '2026-02-01 14:56:54');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_level_history`
--

CREATE TABLE `dsp_member_level_history` (
  `mlh_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mlh_from` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mlh_to` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mlh_datetime` datetime DEFAULT NULL,
  `mlh_reason` varchar(255) NOT NULL DEFAULT '',
  `mlh_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member_level_history`
--

INSERT INTO `dsp_member_level_history` (`mlh_id`, `mem_id`, `mlh_from`, `mlh_to`, `mlh_datetime`, `mlh_reason`, `mlh_ip`) VALUES
(4, 5, 0, 2, '2025-09-18 16:11:44', '회원가입', '192.168.0.1'),
(5, 6, 0, 2, '2025-09-30 13:21:43', '회원가입', '192.168.0.1'),
(6, 7, 0, 2, '2025-10-01 08:03:44', '회원가입', '106.101.131.213'),
(7, 8, 0, 2, '2025-10-13 17:01:33', '회원가입', '210.120.40.53'),
(9, 10, 0, 2, '2025-11-05 16:55:52', '회원가입', '210.120.40.53'),
(10, 11, 0, 2, '2025-11-05 16:58:00', '회원가입', '39.7.231.159'),
(11, 12, 0, 2, '2025-11-05 17:07:07', '회원가입', '14.36.217.193'),
(12, 13, 0, 2, '2025-11-25 09:57:34', '회원가입', '218.152.37.122'),
(13, 14, 0, 2, '2025-11-25 10:13:16', '회원가입', '211.104.38.177'),
(14, 15, 0, 2, '2025-11-25 11:06:10', '회원가입', '218.153.127.49'),
(15, 16, 0, 2, '2025-11-25 11:39:06', '회원가입', '211.62.174.10'),
(16, 17, 0, 2, '2025-11-25 13:55:11', '회원가입', '211.59.179.170'),
(17, 18, 0, 2, '2025-11-25 18:03:33', '회원가입', '121.129.23.77'),
(18, 19, 0, 2, '2025-11-26 11:41:02', '회원가입', '218.152.37.233'),
(19, 20, 0, 2, '2025-11-26 21:43:46', '회원가입', '14.52.80.131'),
(20, 21, 0, 2, '2025-11-27 16:56:01', '회원가입', '118.235.4.63'),
(21, 22, 0, 2, '2025-12-03 22:20:53', '회원가입', '203.254.98.115'),
(22, 23, 0, 2, '2025-12-11 09:59:47', '회원가입', '210.120.40.16'),
(23, 24, 0, 2, '2025-12-12 14:52:22', '회원가입', '211.234.196.182'),
(24, 25, 0, 2, '2025-12-13 00:19:30', '회원가입', '121.143.87.35'),
(25, 26, 0, 2, '2025-12-13 20:19:42', '회원가입', '117.111.6.234'),
(26, 27, 0, 2, '2025-12-17 10:34:58', '회원가입', '203.226.142.17'),
(27, 28, 0, 2, '2025-12-17 16:08:44', '회원가입', '203.228.139.69'),
(28, 29, 0, 2, '2025-12-18 08:25:13', '회원가입', '203.226.142.21'),
(29, 30, 0, 2, '2025-12-18 08:42:58', '회원가입', '203.226.142.17'),
(30, 31, 0, 2, '2025-12-18 13:09:20', '회원가입', '203.226.142.17'),
(31, 32, 0, 2, '2025-12-27 11:41:34', '회원가입', '223.38.78.248'),
(32, 33, 0, 2, '2025-12-29 14:13:24', '회원가입', '223.39.84.116'),
(33, 34, 0, 2, '2025-12-30 10:11:29', '회원가입', '211.234.203.183'),
(34, 35, 0, 2, '2025-12-30 16:03:47', '회원가입', '203.228.139.71'),
(35, 36, 0, 2, '2025-12-31 17:06:37', '회원가입', '39.7.230.10'),
(36, 37, 0, 2, '2026-01-04 14:53:38', '회원가입', '218.237.106.132'),
(37, 38, 0, 2, '2026-01-23 23:32:18', '회원가입', '119.195.228.54'),
(38, 39, 0, 2, '2026-01-27 13:05:49', '회원가입', '59.15.178.14'),
(39, 40, 0, 2, '2026-01-31 13:38:15', '회원가입', '223.38.86.192'),
(40, 41, 0, 2, '2026-02-01 14:56:54', '회원가입', '106.101.194.186');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_login_log`
--

CREATE TABLE `dsp_member_login_log` (
  `mll_id` int(11) UNSIGNED NOT NULL,
  `mll_success` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mll_userid` varchar(255) NOT NULL DEFAULT '',
  `mll_datetime` datetime DEFAULT NULL,
  `mll_ip` varchar(50) NOT NULL DEFAULT '',
  `mll_reason` varchar(255) NOT NULL DEFAULT '',
  `mll_useragent` varchar(255) NOT NULL DEFAULT '',
  `mll_url` text DEFAULT NULL,
  `mll_referer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member_login_log`
--

INSERT INTO `dsp_member_login_log` (`mll_id`, `mll_success`, `mem_id`, `mll_userid`, `mll_datetime`, `mll_ip`, `mll_reason`, `mll_useragent`, `mll_url`, `mll_referer`) VALUES
(1, 1, 1, 'admin', '2025-05-25 22:26:53', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(2, 1, 1, 'admin', '2025-05-26 07:48:27', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/page/pagemenu', 'https://superpass.sfw.kr/admin/page/pagemenu'),
(3, 1, 1, 'admin', '2025-05-27 15:25:13', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/page/pagemenu', 'https://superpass.sfw.kr/admin/page/pagemenu'),
(4, 1, 1, 'admin', '2025-05-28 16:18:32', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/page/pagemenu', 'https://superpass.sfw.kr/admin/page/pagemenu'),
(5, 1, 1, 'admin', '2025-05-28 20:56:14', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(6, 1, 1, 'admin', '2025-05-29 01:40:14', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList/form/3', 'https://superpass.sfw.kr/admin/store/branchList/form/3'),
(7, 1, 1, 'admin', '2025-05-29 14:07:15', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList/form/4', 'https://superpass.sfw.kr/admin/store/branchList/form/4'),
(8, 1, 1, 'admin', '2025-05-29 16:31:51', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(9, 1, 1, 'admin', '2025-06-03 22:58:43', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(10, 1, 1, 'admin', '2025-06-06 12:48:18', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList/form/4', 'https://superpass.sfw.kr/admin/store/branchList/form/4'),
(11, 1, 1, 'admin', '2025-06-06 16:28:50', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList/form/4', 'https://superpass.sfw.kr/admin/store/branchList/form/4'),
(12, 1, 1, 'admin', '2025-06-06 20:18:34', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(13, 1, 1, 'admin', '2025-06-08 08:22:03', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList/form', 'https://superpass.sfw.kr/admin/store/storeList/form'),
(14, 1, 1, 'admin', '2025-06-08 22:37:21', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList/form', 'https://superpass.sfw.kr/admin/store/storeList/form'),
(15, 1, 1, 'admin', '2025-06-10 18:57:17', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(16, 1, 1, 'admin', '2025-06-13 00:25:37', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(17, 1, 1, 'admin', '2025-06-16 01:44:10', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(18, 1, 1, 'admin', '2025-08-27 15:44:14', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(19, 1, 1, 'admin', '2025-09-18 14:19:25', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(23, 1, 5, '', '2025-09-18 16:11:44', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(24, 1, 1, 'admin', '2025-09-18 23:26:04', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(25, 1, 1, 'admin', '2025-09-22 09:43:49', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(26, 1, 1, 'admin', '2025-09-23 16:07:18', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(27, 1, 1, 'admin', '2025-09-23 17:27:19', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(28, 1, 5, '', '2025-09-24 10:21:52', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(29, 1, 5, '', '2025-09-30 13:17:28', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(30, 1, 6, '', '2025-09-30 13:21:43', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(31, 1, 1, 'admin', '2025-09-30 14:17:58', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(32, 1, 7, '', '2025-10-01 08:03:44', '106.101.131.213', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.8.3 (INAPP) KAKAOTALK/25.8.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(33, 1, 1, 'admin', '2025-10-01 08:47:48', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(34, 1, 7, '', '2025-10-01 09:24:35', '210.120.40.53', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(35, 1, 1, 'admin', '2025-10-01 09:38:41', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(36, 1, 1, 'admin', '2025-10-03 18:00:25', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(37, 1, 1, 'admin', '2025-10-03 23:39:07', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(38, 1, 6, '', '2025-10-04 12:32:19', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(39, 1, 1, 'admin', '2025-10-04 13:14:21', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(40, 1, 1, 'admin', '2025-10-04 13:18:22', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(41, 1, 1, 'admin', '2025-10-04 14:26:57', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(42, 1, 1, 'admin', '2025-10-04 16:20:01', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(43, 1, 1, 'admin', '2025-10-04 19:45:55', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(44, 1, 1, 'admin', '2025-10-04 19:55:25', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(45, 1, 1, 'admin', '2025-10-04 20:45:33', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(46, 1, 1, 'admin', '2025-10-04 22:33:31', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(47, 1, 1, 'admin', '2025-10-04 22:50:01', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(48, 1, 1, 'admin', '2025-10-05 14:08:40', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(49, 1, 1, 'admin', '2025-10-05 17:38:59', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(50, 1, 1, 'admin', '2025-10-05 18:10:11', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/config/cleanlog', 'https://superpass.sfw.kr/admin/config/cleanlog'),
(51, 1, 1, 'admin', '2025-10-05 18:15:26', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/config/cleanlog', 'https://superpass.sfw.kr/admin/config/cleanlog'),
(52, 1, 1, 'admin', '2025-10-05 18:16:06', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/config/cleanlog', 'https://superpass.sfw.kr/admin/config/cleanlog'),
(53, 1, 1, 'admin', '2025-10-05 18:26:06', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(54, 1, 1, 'admin', '2025-10-05 18:56:38', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(55, 1, 1, 'admin', '2025-10-05 19:07:56', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(56, 1, 1, 'admin', '2025-10-05 20:09:43', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(57, 1, 1, 'admin', '2025-10-05 20:27:34', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(58, 1, 1, 'admin', '2025-10-05 20:36:26', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(59, 1, 1, 'admin', '2025-10-06 03:45:05', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(60, 1, 1, 'admin', '2025-10-06 06:47:06', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponStatics', 'https://superpass.sfw.kr/admin/store/couponStatics'),
(61, 1, 1, 'admin', '2025-10-06 06:48:56', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(62, 1, 1, 'admin', '2025-10-06 15:05:28', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponStatics', 'https://superpass.sfw.kr/admin/store/couponStatics'),
(63, 1, 1, 'admin', '2025-10-07 17:17:54', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(64, 1, 1, 'admin', '2025-10-07 19:34:10', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(65, 1, 1, 'admin', '2025-10-07 23:31:52', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponStatics', 'https://superpass.sfw.kr/admin/store/couponStatics'),
(66, 1, 1, 'admin', '2025-10-08 07:23:02', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(67, 1, 1, 'admin', '2025-10-08 08:43:00', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList/form', 'https://superpass.sfw.kr/admin/store/storeList/form'),
(68, 1, 1, 'admin', '2025-10-08 12:17:27', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(69, 1, 1, 'admin', '2025-10-08 12:29:53', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(70, 1, 1, 'admin', '2025-10-09 11:22:34', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(71, 1, 1, 'admin', '2025-10-09 17:29:56', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(72, 1, 1, 'admin', '2025-10-09 20:54:48', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(73, 1, 1, 'admin', '2025-10-10 03:16:26', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(74, 1, 1, 'admin', '2025-10-10 17:21:57', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(75, 1, 1, 'admin', '2025-10-10 17:22:43', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(76, 1, 1, 'admin', '2025-10-12 04:05:26', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(77, 1, 1, 'admin', '2025-10-12 04:07:49', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(78, 1, 1, 'admin', '2025-10-12 04:15:07', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(79, 1, 1, 'admin', '2025-10-12 04:16:00', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(80, 1, 1, 'admin', '2025-10-12 04:17:20', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(81, 1, 1, 'admin', '2025-10-12 04:30:54', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(82, 1, 6, '', '2025-10-12 09:10:18', '118.235.7.49', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(83, 1, 1, 'admin', '2025-10-13 09:49:40', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(84, 1, 7, '', '2025-10-13 15:43:42', '210.120.40.53', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(85, 1, 1, 'admin', '2025-10-13 15:53:47', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(86, 1, 7, '', '2025-10-13 15:56:35', '210.120.40.53', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.8.4 (INAPP) KAKAOTALK/25.8.4 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(87, 1, 1, 'admin', '2025-10-13 16:05:13', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(88, 1, 8, '', '2025-10-13 17:01:33', '210.120.40.53', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.8.4 (INAPP) KAKAOTALK/25.8.4 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(89, 1, 1, 'admin', '2025-10-13 17:16:36', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(90, 1, 1, 'admin', '2025-10-13 18:44:59', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(91, 1, 1, 'admin', '2025-10-14 09:53:17', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (iPad; CPU OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.8.4 (INAPP)', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(92, 1, 1, 'admin', '2025-10-14 14:16:54', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(93, 1, 6, '', '2025-10-14 14:30:26', '118.235.6.160', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(94, 1, 1, 'admin', '2025-10-14 15:42:06', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(95, 1, 1, 'admin', '2025-10-15 22:52:38', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(96, 1, 6, '', '2025-10-16 02:59:45', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(97, 1, 6, '', '2025-10-16 03:51:30', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(98, 1, 6, '', '2025-10-16 05:13:13', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(99, 1, 6, '', '2025-10-16 05:23:18', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(100, 1, 1, 'admin', '2025-10-16 05:47:45', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(101, 1, 1, 'admin', '2025-10-16 10:36:42', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(102, 1, 1, 'admin', '2025-10-16 15:06:07', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPad; CPU OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(103, 1, 1, 'admin', '2025-10-16 15:22:11', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPad; CPU OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(104, 1, 1, 'admin', '2025-10-16 16:30:12', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(105, 1, 6, '', '2025-10-16 16:45:53', '118.235.3.50', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(106, 1, 1, 'admin', '2025-10-16 17:44:58', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(107, 1, 1, 'admin', '2025-10-16 18:02:47', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(108, 1, 6, '', '2025-10-16 20:54:31', '222.106.64.210', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(109, 1, 1, 'admin', '2025-10-20 17:21:16', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(110, 1, 6, '', '2025-10-20 17:33:32', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(111, 1, 1, 'admin', '2025-10-21 13:11:01', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(112, 1, 1, 'admin', '2025-10-21 17:24:27', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(113, 1, 1, 'admin', '2025-10-22 15:13:35', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(114, 1, 1, 'admin', '2025-10-22 16:03:02', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList/form/6', 'https://superpass.sfw.kr/admin/store/storeList/form/6'),
(115, 1, 1, 'admin', '2025-10-23 09:06:14', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(116, 1, 1, 'admin', '2025-10-23 13:21:57', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(117, 1, 1, 'admin', '2025-10-23 13:42:58', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(118, 1, 1, 'admin', '2025-10-27 19:40:21', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(119, 1, 1, 'admin', '2025-10-28 11:57:27', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList/form/41', 'https://superpass.sfw.kr/admin/store/storeList/form/41'),
(120, 1, 1, 'admin', '2025-10-28 12:05:27', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/member/members', 'https://superpass.sfw.kr/admin/member/members'),
(121, 1, 1, 'admin', '2025-10-28 12:06:46', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/member/members', 'https://superpass.sfw.kr/admin/member/members'),
(122, 1, 1, 'admin', '2025-10-28 12:14:56', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/member/members', 'https://superpass.sfw.kr/admin/member/members'),
(123, 1, 6, '', '2025-10-28 15:51:54', '14.36.217.193', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(124, 1, 6, '', '2025-10-28 15:52:31', '14.36.217.193', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(125, 1, 1, 'admin', '2025-10-28 16:42:49', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(126, 1, 1, 'admin', '2025-10-28 16:58:26', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponList/store/5', 'https://superpass.sfw.kr/admin/store/couponList/store/5'),
(127, 1, 6, '', '2025-10-28 17:24:30', '14.36.217.193', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(128, 1, 1, 'admin', '2025-10-28 17:27:34', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(129, 1, 6, '', '2025-10-28 17:56:32', '14.36.217.193', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(130, 1, 1, 'admin', '2025-10-28 22:52:31', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(131, 1, 1, 'admin', '2025-10-29 15:09:10', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList/form/41', 'https://superpass.sfw.kr/admin/store/storeList/form/41'),
(132, 1, 1, 'admin', '2025-10-30 11:17:09', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(133, 1, 0, 'jsy98', '2025-10-31 11:38:54', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponList/create/7', 'https://superpass.sfw.kr/admin/store/couponList/create/7'),
(134, 1, 1, 'admin', '2025-10-31 11:38:59', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/membermodify/password_modify', 'https://superpass.sfw.kr/membermodify/password_modify'),
(135, 1, 6, '', '2025-10-31 13:37:56', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(136, 1, 1, 'admin', '2025-10-31 14:21:01', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(137, 1, 1, 'admin', '2025-10-31 17:22:40', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/config/cleanlog', 'https://superpass.sfw.kr/admin/config/cleanlog'),
(138, 1, 5, '', '2025-10-31 17:33:08', '14.36.217.193', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(139, 1, 5, '', '2025-10-31 17:55:57', '14.36.217.193', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(140, 1, 1, 'admin', '2025-10-31 18:10:49', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(141, 1, 1, 'admin', '2025-11-02 14:32:05', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/member/members', 'https://superpass.sfw.kr/admin/member/members'),
(142, 1, 1, 'admin', '2025-11-02 14:56:47', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(143, 1, 7, 'dpfla990113@gmail.com', '2025-11-02 17:05:19', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(144, 1, 7, 'dpfla990113@gmail.com', '2025-11-02 17:06:11', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/config/cleanlog/visitlog', 'https://superpass.sfw.kr/admin/config/cleanlog/visitlog'),
(145, 1, 1, 'admin', '2025-11-02 17:10:27', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/page/banner', 'https://superpass.sfw.kr/admin/page/banner'),
(146, 1, 5, 'jsy@sfw.kr', '2025-11-02 21:26:36', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(147, 1, 5, 'jsy@sfw.kr', '2025-11-02 22:52:04', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/page/banner', 'https://superpass.sfw.kr/admin/page/banner'),
(148, 1, 1, 'admin', '2025-11-02 22:52:14', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/page/banner', 'https://superpass.sfw.kr/admin/page/banner'),
(149, 1, 1, 'admin', '2025-11-03 12:40:26', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(150, 1, 1, 'admin', '2025-11-03 14:10:50', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(151, 1, 5, 'jsy@sfw.kr', '2025-11-03 15:36:28', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(152, 1, 1, 'admin', '2025-11-03 16:09:25', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(153, 1, 1, 'admin', '2025-11-03 18:37:12', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(154, 1, 1, 'admin', '2025-11-03 21:57:27', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(155, 1, 1, 'admin', '2025-11-04 13:15:59', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(156, 1, 1, 'admin', '2025-11-04 13:58:37', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponList/edit/23/23', 'https://superpass.sfw.kr/admin/store/couponList/edit/23/23'),
(157, 1, 1, 'admin', '2025-11-04 21:44:10', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(158, 1, 1, 'admin', '2025-11-05 01:19:49', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(159, 1, 1, 'admin', '2025-11-05 08:51:18', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(160, 1, 1, 'admin', '2025-11-05 09:09:36', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(161, 1, 0, 'yelimc79@gmail.com', '2025-11-05 09:10:19', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(162, 1, 0, 'yelimc79@gmail.com', '2025-11-05 09:10:41', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(163, 1, 1, 'admin', '2025-11-05 09:13:27', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(164, 1, 7, '', '2025-11-05 15:22:26', '39.7.231.24', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(165, 1, 0, 'yelimc79@gmail.com', '2025-11-05 16:33:45', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(166, 1, 0, 'yelimc79@gmail.com', '2025-11-05 16:33:59', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(167, 1, 6, '', '2025-11-05 16:36:36', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(168, 1, 0, 'yelimc79@gmail.com', '2025-11-05 16:37:43', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(169, 1, 0, 'yelimc79@gmail.com', '2025-11-05 16:38:43', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(170, 1, 0, 'yelimc79@gmail.com', '2025-11-05 16:39:11', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(171, 1, 0, 'yelimc79@gmail.com', '2025-11-05 16:40:46', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(172, 1, 7, '', '2025-11-05 16:41:11', '39.7.231.13', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(173, 1, 1, 'admin', '2025-11-05 16:42:12', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(174, 1, 0, 'yelimc79@gmail.com', '2025-11-05 16:42:17', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(175, 1, 7, '', '2025-11-05 16:43:51', '39.7.231.13', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(176, 1, 7, '', '2025-11-05 16:44:11', '39.7.231.13', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', '');
INSERT INTO `dsp_member_login_log` (`mll_id`, `mll_success`, `mem_id`, `mll_userid`, `mll_datetime`, `mll_ip`, `mll_reason`, `mll_useragent`, `mll_url`, `mll_referer`) VALUES
(178, 1, 7, '', '2025-11-05 16:45:51', '39.7.231.13', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(179, 1, 0, 'zaqxsw784@gmail.com', '2025-11-05 16:47:47', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Linux; Android 15; SM-S921N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/141.0.7390.122 Mobile Safari/537.36 KAKAOTALK/25.9.2 (INAPP)', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(180, 1, 0, 'zaqxsw784@gmail.com', '2025-11-05 16:48:17', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Linux; Android 15; SM-S921N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/141.0.7390.122 Mobile Safari/537.36 KAKAOTALK/25.9.2 (INAPP)', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(181, 1, 1, 'admin', '2025-11-05 16:49:44', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(182, 1, 7, 'dpfla990113@gmail.com', '2025-11-05 16:49:45', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(183, 1, 0, 'zaqxsw784@gmail.com', '2025-11-05 16:50:03', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Linux; Android 15; SM-S921N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/141.0.7390.122 Mobile Safari/537.36 KAKAOTALK/25.9.2 (INAPP)', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(184, 1, 0, 'zaqxsw784@gmail.com', '2025-11-05 16:50:30', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Linux; Android 15; SM-S921N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/141.0.7390.122 Mobile Safari/537.36 KAKAOTALK/25.9.2 (INAPP)', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(185, 1, 0, 'zaqxsw784@gmail.com', '2025-11-05 16:51:05', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Linux; Android 15; SM-S921N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/141.0.7390.122 Mobile Safari/537.36 KAKAOTALK/25.9.2 (INAPP)', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(186, 1, 0, 'zaqxsw784@gmail.com', '2025-11-05 16:53:05', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Linux; Android 15; SM-S921N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/141.0.7390.122 Mobile Safari/537.36 KAKAOTALK/25.9.2 (INAPP)', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(187, 1, 7, '', '2025-11-05 16:54:45', '39.7.231.159', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(188, 1, 7, '', '2025-11-05 16:55:52', '39.7.231.159', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(189, 1, 10, '', '2025-11-05 16:55:52', '210.120.40.53', '구글 로그인 성공', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(190, 1, 11, '', '2025-11-05 16:58:00', '39.7.231.159', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(191, 1, 11, '', '2025-11-05 17:00:52', '210.120.40.117', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(192, 1, 12, '', '2025-11-05 17:07:07', '14.36.217.193', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(193, 1, 1, 'admin', '2025-11-05 17:09:19', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(194, 1, 11, '', '2025-11-05 17:10:06', '210.120.40.117', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(195, 1, 12, '', '2025-11-05 17:15:56', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(196, 1, 11, 'yelimc79@gmail.com', '2025-11-05 17:32:37', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(197, 1, 11, '', '2025-11-05 17:40:57', '39.7.231.202', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/393.0.825685754 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(198, 1, 12, '', '2025-11-05 17:47:20', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(199, 1, 12, '', '2025-11-05 17:49:22', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(200, 1, 12, '', '2025-11-05 17:50:07', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(201, 1, 12, '', '2025-11-05 17:50:29', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(202, 1, 1, 'admin', '2025-11-05 17:57:19', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(203, 1, 1, 'admin', '2025-11-05 18:06:38', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(204, 1, 1, 'admin', '2025-11-05 19:54:26', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(205, 1, 1, 'admin', '2025-11-05 23:46:58', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(206, 1, 11, 'yelimc79@gmail.com', '2025-11-06 09:07:31', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(207, 1, 1, 'admin', '2025-11-06 09:23:30', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(208, 1, 1, 'admin', '2025-11-06 11:14:00', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(209, 1, 1, 'admin', '2025-11-06 11:22:01', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(210, 1, 7, 'dpfla990113@gmail.com', '2025-11-06 11:32:41', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(211, 1, 7, 'dpfla990113@gmail.com', '2025-11-06 11:33:29', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(212, 1, 1, 'admin', '2025-11-06 13:55:32', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(213, 1, 1, 'admin', '2025-11-06 13:56:03', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(214, 1, 1, 'admin', '2025-11-06 14:03:32', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(215, 1, 1, 'admin', '2025-11-06 14:58:57', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(216, 1, 1, 'admin', '2025-11-06 15:03:47', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(217, 1, 12, '', '2025-11-06 19:33:58', '118.235.15.185', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(218, 1, 1, 'admin', '2025-11-07 02:14:37', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(219, 1, 11, 'yelimc79@gmail.com', '2025-11-07 09:40:46', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(220, 1, 11, 'yelimc79@gmail.com', '2025-11-07 09:42:59', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(221, 1, 11, 'yelimc79@gmail.com', '2025-11-07 09:45:18', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(222, 1, 1, 'admin', '2025-11-07 09:46:26', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(223, 1, 1, 'admin', '2025-11-07 13:21:03', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/config/emailform/changepw', 'https://superpass.sfw.kr/admin/config/emailform/changepw'),
(224, 1, 1, 'admin', '2025-11-07 14:03:41', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(225, 1, 12, '', '2025-11-07 14:18:12', '14.36.217.193', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(226, 1, 1, 'admin', '2025-11-07 17:03:12', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponList/store/22', 'https://superpass.sfw.kr/admin/store/couponList/store/22'),
(227, 1, 11, '', '2025-11-07 17:24:33', '39.7.231.172', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(228, 1, 5, 'jsy@sfw.kr', '2025-11-07 17:49:49', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(229, 1, 1, 'admin', '2025-11-10 00:17:07', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(230, 1, 1, 'admin', '2025-11-10 09:06:37', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(231, 1, 1, 'admin', '2025-11-10 09:08:38', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(232, 1, 1, 'admin', '2025-11-10 11:20:48', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(233, 1, 11, 'yelimc79@gmail.com', '2025-11-10 13:28:42', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(234, 1, 11, 'yelimc79@gmail.com', '2025-11-10 13:33:34', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(235, 1, 1, 'admin', '2025-11-10 14:11:38', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(236, 1, 1, 'admin', '2025-11-11 01:20:21', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(237, 1, 1, 'admin', '2025-11-11 10:13:52', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/stat/couponStatics', 'https://superpass.sfw.kr/admin/stat/couponStatics'),
(238, 1, 1, 'admin', '2025-11-11 10:26:51', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/stat/couponStatics', 'https://superpass.sfw.kr/admin/stat/couponStatics'),
(239, 1, 1, 'admin', '2025-11-11 10:27:25', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/stat/couponStatics', 'https://superpass.sfw.kr/admin/stat/couponStatics'),
(240, 1, 1, 'admin', '2025-11-11 10:28:28', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/stat/couponStatics', 'https://superpass.sfw.kr/admin/stat/couponStatics'),
(241, 1, 1, 'admin', '2025-11-11 10:32:42', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/stat/couponStatics', 'https://superpass.sfw.kr/admin/stat/couponStatics'),
(242, 1, 1, 'admin', '2025-11-11 23:58:54', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/stat/stats', 'https://superpass.sfw.kr/admin/stat/stats'),
(243, 1, 1, 'admin', '2025-11-12 14:32:16', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/config/cbconfigs', 'https://superpass.sfw.kr/admin/config/cbconfigs'),
(244, 1, 1, 'admin', '2025-11-17 09:34:16', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(245, 1, 1, 'admin', '2025-11-17 10:40:45', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(246, 1, 7, '', '2025-11-17 10:41:52', '39.7.231.74', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(247, 1, 7, '', '2025-11-17 10:51:32', '39.7.231.40', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(248, 1, 8, '', '2025-11-18 08:49:30', '211.234.227.194', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(249, 1, 7, '', '2025-11-18 09:56:07', '115.92.5.197', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(250, 1, 7, '', '2025-11-18 09:56:59', '39.7.231.209', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(251, 1, 7, '', '2025-11-18 09:57:39', '39.7.231.76', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(252, 1, 1, 'admin', '2025-11-18 10:09:49', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(253, 1, 1, 'admin', '2025-11-18 13:33:55', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(254, 1, 1, 'admin', '2025-11-18 13:35:04', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(255, 1, 1, 'admin', '2025-11-18 13:38:34', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(256, 1, 11, 'yelimc79@gmail.com', '2025-11-18 17:37:08', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(257, 1, 1, 'admin', '2025-11-20 16:18:21', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(258, 1, 11, 'yelimc79@gmail.com', '2025-11-24 10:44:36', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(259, 1, 1, 'admin', '2025-11-24 10:45:15', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList/form/3', 'https://superpass.sfw.kr/admin/store/storeList/form/3'),
(260, 1, 11, 'yelimc79@gmail.com', '2025-11-25 09:32:45', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(261, 1, 1, 'admin', '2025-11-25 09:37:35', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(262, 1, 13, '', '2025-11-25 09:57:34', '218.152.37.122', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(263, 1, 14, '', '2025-11-25 10:13:16', '211.104.38.177', '구글 로그인 성공', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(264, 1, 15, '', '2025-11-25 11:06:10', '218.153.127.49', '구글 로그인 성공', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(265, 1, 16, '', '2025-11-25 11:39:06', '211.62.174.10', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(266, 1, 17, '', '2025-11-25 13:55:11', '211.59.179.170', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(267, 1, 11, 'yelimc79@gmail.com', '2025-11-25 13:55:12', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(268, 1, 16, '', '2025-11-25 13:55:27', '211.62.174.10', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(269, 1, 1, 'admin', '2025-11-25 13:58:14', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponList/store/22', 'https://superpass.sfw.kr/admin/store/couponList/store/22'),
(270, 1, 18, '', '2025-11-25 18:03:33', '121.129.23.77', '구글 로그인 성공', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(271, 1, 19, '', '2025-11-26 11:41:02', '218.152.37.233', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(272, 1, 20, '', '2025-11-26 21:43:46', '14.52.80.131', '구글 로그인 성공', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(273, 1, 1, 'admin', '2025-11-27 13:34:50', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(274, 1, 1, 'admin', '2025-11-27 13:34:58', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(275, 1, 0, 'sorbine94@gmail.com', '2025-11-27 16:54:41', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(276, 1, 0, 'sorbine94@gmail.com', '2025-11-27 16:54:53', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(277, 1, 21, '', '2025-11-27 16:56:01', '118.235.4.63', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(278, 1, 11, 'yelimc79@gmail.com', '2025-12-01 10:34:31', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(279, 1, 7, '', '2025-12-02 17:14:13', '118.235.7.79', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(280, 1, 22, '', '2025-12-03 22:20:53', '203.254.98.115', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(281, 1, 1, 'admin', '2025-12-08 16:53:02', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(282, 1, 21, 'sorbine94@gmail.com', '2025-12-10 15:58:35', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(283, 1, 23, '', '2025-12-11 09:59:47', '210.120.40.16', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(284, 1, 11, 'yelimc79@gmail.com', '2025-12-12 14:07:38', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(285, 1, 24, '', '2025-12-12 14:52:22', '211.234.196.182', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(286, 1, 25, '', '2025-12-13 00:19:30', '121.143.87.35', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(287, 1, 26, '', '2025-12-13 20:19:42', '117.111.6.234', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(288, 1, 21, '', '2025-12-15 11:00:54', '115.92.5.197', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(289, 1, 1, 'admin', '2025-12-17 09:58:52', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(290, 1, 1, 'admin', '2025-12-17 10:10:53', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(291, 1, 1, 'admin', '2025-12-17 10:17:11', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/page/pagemenu', 'https://superpass.sfw.kr/admin/page/pagemenu'),
(292, 1, 27, '', '2025-12-17 10:34:58', '203.226.142.17', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(293, 1, 1, 'admin', '2025-12-17 15:27:38', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(294, 1, 11, 'yelimc79@gmail.com', '2025-12-17 15:36:30', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(295, 1, 1, 'admin', '2025-12-17 15:40:54', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/branchList', 'https://superpass.sfw.kr/admin/store/branchList'),
(296, 1, 28, '', '2025-12-17 16:08:44', '203.228.139.69', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(297, 1, 27, '', '2025-12-17 16:08:46', '203.226.142.17', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(298, 1, 28, '', '2025-12-17 16:12:49', '223.38.91.137', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.10.3 (INAPP) KAKAOTALK/25.10.3 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(299, 1, 11, 'yelimc79@gmail.com', '2025-12-17 16:22:43', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(300, 1, 1, 'admin', '2025-12-17 16:43:40', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(301, 1, 1, 'admin', '2025-12-17 22:29:12', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponList/store/41', 'https://superpass.sfw.kr/admin/store/couponList/store/41'),
(302, 1, 29, '', '2025-12-18 08:25:13', '203.226.142.21', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(303, 1, 27, '', '2025-12-18 08:28:20', '203.226.142.17', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(304, 1, 30, '', '2025-12-18 08:42:58', '203.226.142.17', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(305, 1, 1, 'admin', '2025-12-18 09:18:25', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(306, 1, 1, 'admin', '2025-12-18 10:09:03', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(307, 1, 1, 'admin', '2025-12-18 11:32:08', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/couponList/store/41', 'https://superpass.sfw.kr/admin/store/couponList/store/41'),
(308, 1, 31, '', '2025-12-18 13:09:20', '203.226.142.17', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(309, 1, 30, '', '2025-12-18 14:50:25', '203.226.142.17', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(310, 1, 27, '', '2025-12-18 14:52:52', '203.226.142.21', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(311, 1, 1, 'admin', '2025-12-18 15:05:12', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/category', 'https://superpass.sfw.kr/admin/store/category'),
(312, 1, 11, 'yelimc79@gmail.com', '2025-12-18 15:05:50', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(313, 1, 1, 'admin', '2025-12-18 15:15:27', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(314, 1, 29, '', '2025-12-18 15:17:58', '203.226.142.17', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(315, 1, 1, 'admin', '2025-12-18 15:26:44', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/member/members', 'https://superpass.sfw.kr/admin/member/members'),
(316, 1, 27, 'sunwha1003@gmail.com', '2025-12-18 15:28:07', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(317, 1, 30, '', '2025-12-19 07:22:32', '203.226.142.21', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(318, 1, 27, '', '2025-12-19 07:27:03', '203.226.142.21', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(319, 1, 27, '', '2025-12-19 08:06:51', '203.226.142.21', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(320, 1, 30, '', '2025-12-19 08:10:35', '203.226.142.21', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(321, 1, 1, 'admin', '2025-12-19 09:46:51', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(322, 1, 11, 'yelimc79@gmail.com', '2025-12-19 09:54:10', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(323, 1, 1, 'admin', '2025-12-19 09:55:37', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(324, 1, 30, '', '2025-12-19 10:10:14', '175.214.73.130', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(325, 1, 11, 'yelimc79@gmail.com', '2025-12-19 10:21:35', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(326, 1, 0, 'mntfna6@voxtrek.cc', '2025-12-19 10:30:29', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(327, 1, 11, 'yelimc79@gmail.com', '2025-12-19 10:33:45', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(328, 1, 11, 'yelimc79@gmail.com', '2025-12-19 10:34:06', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(329, 1, 1, 'admin', '2025-12-19 10:42:34', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(330, 1, 11, 'yelimc79@gmail.com', '2025-12-19 13:24:01', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin/store/storeList', 'https://superpass.sfw.kr/admin/store/storeList'),
(331, 1, 28, '', '2025-12-19 15:05:05', '203.228.139.67', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(332, 1, 28, '', '2025-12-19 15:52:59', '61.39.186.152', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(333, 1, 11, 'yelimc79@gmail.com', '2025-12-19 16:16:23', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(334, 1, 30, '', '2025-12-19 16:20:33', '203.226.142.17', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(335, 1, 30, '', '2025-12-19 16:23:45', '203.226.142.17', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(336, 1, 28, '', '2025-12-19 16:24:51', '203.228.139.37', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(337, 1, 1, 'admin', '2025-12-19 16:28:54', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(338, 1, 11, 'yelimc79@gmail.com', '2025-12-19 16:40:37', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(339, 1, 11, 'yelimc79@gmail.com', '2025-12-19 16:44:32', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(340, 1, 1, 'admin', '2025-12-19 16:44:49', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(341, 1, 11, 'yelimc79@gmail.com', '2025-12-19 16:45:11', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(342, 1, 1, 'admin', '2025-12-19 16:54:33', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(343, 1, 11, 'yelimc79@gmail.com', '2025-12-19 17:00:16', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(344, 1, 11, 'yelimc79@gmail.com', '2025-12-22 15:35:29', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(345, 1, 11, 'yelimc79@gmail.com', '2025-12-23 15:01:58', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(346, 1, 1, 'admin', '2025-12-23 15:06:16', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(347, 1, 11, 'yelimc79@gmail.com', '2025-12-23 15:07:49', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(348, 1, 28, '', '2025-12-26 10:25:41', '203.228.139.37', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(349, 1, 11, 'yelimc79@gmail.com', '2025-12-26 16:55:27', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(350, 1, 28, '', '2025-12-27 11:11:14', '203.228.139.69', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(351, 1, 32, '', '2025-12-27 11:41:34', '223.38.78.248', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.2 (INAPP) KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/social/google_login', ''),
(352, 1, 28, '', '2025-12-27 11:49:47', '203.228.139.69', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', '');
INSERT INTO `dsp_member_login_log` (`mll_id`, `mll_success`, `mem_id`, `mll_userid`, `mll_datetime`, `mll_ip`, `mll_reason`, `mll_useragent`, `mll_url`, `mll_referer`) VALUES
(353, 1, 28, '', '2025-12-27 11:51:35', '203.228.139.69', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(354, 1, 28, '', '2025-12-27 14:37:19', '203.228.139.69', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(355, 1, 28, '', '2025-12-27 14:38:29', '203.228.139.67', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(356, 1, 33, '', '2025-12-29 14:13:24', '223.39.84.116', '구글 로그인 성공', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(357, 1, 11, 'yelimc79@gmail.com', '2025-12-29 15:15:20', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(358, 1, 7, 'dpfla990113@gmail.com', '2025-12-29 15:17:08', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 410.1.0.36.70 (iPhone14,4; iOS 18_6_2; ko_KR; ko; scale=3.00; 1125x2436; IABMV/1; 849447290) Safari/604.1', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(359, 1, 34, '', '2025-12-30 10:11:29', '211.234.203.183', '구글 로그인 성공', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; ) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ko', 'https://superpass.sfw.kr/social/google_login', ''),
(360, 1, 35, '', '2025-12-30 16:03:47', '203.228.139.71', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(361, 1, 36, '', '2025-12-31 17:06:37', '39.7.230.10', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/399.2.845414227 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(362, 1, 37, '', '2026-01-04 14:53:38', '218.237.106.132', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(363, 1, 27, '', '2026-01-09 15:36:00', '203.226.142.21', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(364, 1, 28, '', '2026-01-09 17:43:31', '203.228.139.69', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(365, 1, 28, '', '2026-01-11 14:04:50', '203.228.139.67', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(366, 1, 1, 'admin', '2026-01-12 09:22:35', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(367, 1, 5, '', '2026-01-13 15:00:46', '118.235.65.32', '구글 로그인 성공', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(368, 1, 30, '', '2026-01-15 12:49:03', '203.226.142.21', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(369, 1, 27, '', '2026-01-15 12:49:44', '203.226.142.21', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(370, 1, 11, 'yelimc79@gmail.com', '2026-01-20 14:09:03', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(371, 1, 11, 'yelimc79@gmail.com', '2026-01-20 14:14:10', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.3 (INAPP)', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(372, 1, 1, 'admin', '2026-01-20 14:24:51', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(373, 1, 5, '', '2026-01-20 15:44:52', '118.235.7.254', '구글 로그인 성공', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(374, 1, 11, 'yelimc79@gmail.com', '2026-01-20 15:45:31', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.3 (INAPP)', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(375, 1, 1, 'admin', '2026-01-20 15:46:54', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(376, 1, 11, 'yelimc79@gmail.com', '2026-01-20 15:48:30', '210.120.40.53', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(377, 1, 7, '', '2026-01-20 16:15:05', '118.235.74.107', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(378, 1, 1, 'admin', '2026-01-20 16:24:21', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(379, 1, 38, '', '2026-01-23 23:32:18', '119.195.228.54', '구글 로그인 성공', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(380, 1, 1, 'admin', '2026-01-26 13:28:18', '210.120.40.117', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?url=https://superpass.sfw.kr/admin', 'https://superpass.sfw.kr/admin'),
(381, 1, 28, '', '2026-01-26 14:45:22', '203.228.139.37', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(382, 1, 28, '', '2026-01-26 14:50:19', '203.228.139.37', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(383, 1, 28, '', '2026-01-26 14:53:43', '203.228.139.37', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(384, 1, 28, '', '2026-01-26 14:54:16', '203.228.139.69', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(385, 1, 28, '', '2026-01-26 14:55:09', '203.228.139.69', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/social/google_login', ''),
(386, 1, 28, '', '2026-01-26 14:55:48', '203.228.139.69', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(387, 1, 39, '', '2026-01-27 13:05:49', '59.15.178.14', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(388, 1, 40, '', '2026-01-31 13:38:15', '223.38.86.192', '구글 로그인 성공', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/social/google_login', ''),
(389, 1, 41, '', '2026-02-01 14:56:54', '106.101.194.186', '구글 로그인 성공', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(390, 1, 1, 'admin', '2026-02-02 11:03:08', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', ''),
(391, 1, 12, '', '2026-02-02 14:26:43', '192.168.0.1', '구글 로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/social/google_login', ''),
(392, 1, 1, 'admin', '2026-02-02 14:27:58', '192.168.0.1', '로그인 성공', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login?redirect=https://superpass.sfw.kr/', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_meta`
--

CREATE TABLE `dsp_member_meta` (
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mmt_key` varchar(100) NOT NULL DEFAULT '',
  `mmt_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member_meta`
--

INSERT INTO `dsp_member_meta` (`mem_id`, `mmt_key`, `mmt_value`) VALUES
(1, 'meta_change_pw_datetime', '2025-05-25 16:21:29'),
(1, 'meta_email_cert_datetime', '2025-05-25 16:21:29'),
(1, 'meta_nickname_datetime', '2025-05-25 16:21:29'),
(1, 'meta_open_profile_datetime', '2025-05-25 16:21:29'),
(1, 'meta_use_note_datetime', '2025-05-25 16:21:29');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_nickname`
--

CREATE TABLE `dsp_member_nickname` (
  `mni_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mni_nickname` varchar(100) NOT NULL DEFAULT '',
  `mni_start_datetime` datetime DEFAULT NULL,
  `mni_end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member_nickname`
--

INSERT INTO `dsp_member_nickname` (`mni_id`, `mem_id`, `mni_nickname`, `mni_start_datetime`, `mni_end_datetime`) VALUES
(1, 1, '관리자', '2025-05-25 16:21:29', NULL),
(5, 5, '정성윤', '2025-09-18 16:11:44', NULL),
(6, 6, 'SYJ', '2025-09-30 13:21:43', NULL),
(7, 7, '최예림', '2025-10-01 08:03:44', NULL),
(8, 8, 'soyeonLee', '2025-10-13 17:01:33', NULL),
(9, 9, 'SYJ1', '2025-11-05 16:45:09', NULL),
(10, 10, 'minyoung“gidam”kwak', '2025-11-05 16:55:52', NULL),
(11, 11, '최예림1', '2025-11-05 16:58:00', NULL),
(12, 12, 'SYJ2', '2025-11-05 17:07:07', NULL),
(13, 13, 'JuyoungSong', '2025-11-25 09:57:34', NULL),
(14, 14, 'jumiyeo', '2025-11-25 10:13:16', NULL),
(15, 15, '이지인', '2025-11-25 11:06:10', NULL),
(16, 16, 'MIMILINECO.LTD.', '2025-11-25 11:39:06', NULL),
(17, 17, 'DAVIDJOO', '2025-11-25 13:55:11', NULL),
(18, 18, 'YireShin(신이레)', '2025-11-25 18:03:33', NULL),
(19, 19, '삼겹살', '2025-11-26 11:41:02', NULL),
(20, 20, '어페어커피장충점', '2025-11-26 21:43:46', NULL),
(21, 21, '장솔빈', '2025-11-27 16:56:01', NULL),
(22, 22, 'JongwonLee', '2025-12-03 22:20:53', NULL),
(23, 23, '신정아', '2025-12-11 09:59:47', NULL),
(24, 24, 'eun-haekim', '2025-12-12 14:52:22', NULL),
(25, 25, '조민수', '2025-12-13 00:19:30', NULL),
(26, 26, 'HyemiLee', '2025-12-13 20:19:42', NULL),
(27, 27, '김선화', '2025-12-17 10:34:58', NULL),
(28, 28, '현대아울렛동대문점', '2025-12-17 16:08:44', NULL),
(29, 29, '박연서', '2025-12-18 08:25:13', NULL),
(30, 30, '박두타', '2025-12-18 08:42:58', NULL),
(31, 31, 'jungseoklee', '2025-12-18 13:09:20', NULL),
(32, 32, '선혜연', '2025-12-27 11:41:34', NULL),
(33, 33, 'skim', '2025-12-29 14:13:24', NULL),
(34, 34, '정하임', '2025-12-30 10:11:29', NULL),
(35, 35, '김민균', '2025-12-30 16:03:47', NULL),
(36, 36, '김령아', '2025-12-31 17:06:37', NULL),
(37, 37, '허효정선생님', '2026-01-04 14:53:38', NULL),
(38, 38, 'LucyChoi', '2026-01-23 23:32:18', NULL),
(39, 39, 'dittocam', '2026-01-27 13:05:49', NULL),
(40, 40, 'EnoFan', '2026-01-31 13:38:15', NULL),
(41, 41, '블루스카이', '2026-02-01 14:56:54', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_register`
--

CREATE TABLE `dsp_member_register` (
  `mrg_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mrg_ip` varchar(50) NOT NULL DEFAULT '',
  `mrg_datetime` datetime DEFAULT NULL,
  `mrg_recommend_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mrg_useragent` varchar(255) NOT NULL DEFAULT '',
  `mrg_referer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member_register`
--

INSERT INTO `dsp_member_register` (`mrg_id`, `mem_id`, `mrg_ip`, `mrg_datetime`, `mrg_recommend_mem_id`, `mrg_useragent`, `mrg_referer`) VALUES
(1, 1, '192.168.0.1', '2025-05-25 16:21:29', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', NULL),
(5, 5, '192.168.0.1', '2025-09-18 16:11:44', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/login/?redirect=https%3A%2F%2Fsuperpass.sfw.kr%2F'),
(6, 6, '192.168.0.1', '2025-09-30 13:21:43', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(7, 7, '106.101.131.213', '2025-10-01 08:03:44', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.8.3 (INAPP) KAKAOTALK/25.8.3 (INAPP)', ''),
(8, 8, '210.120.40.53', '2025-10-13 17:01:33', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.8.4 (INAPP) KAKAOTALK/25.8.4 (INAPP)', ''),
(10, 10, '210.120.40.53', '2025-11-05 16:55:52', 0, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', ''),
(11, 11, '39.7.231.159', '2025-11-05 16:58:00', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(12, 12, '14.36.217.193', '2025-11-05 17:07:07', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.9.3 (INAPP) KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(13, 13, '218.152.37.122', '2025-11-25 09:57:34', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(14, 14, '211.104.38.177', '2025-11-25 10:13:16', 0, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(15, 15, '218.153.127.49', '2025-11-25 11:06:10', 0, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(16, 16, '211.62.174.10', '2025-11-25 11:39:06', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(17, 17, '211.59.179.170', '2025-11-25 13:55:11', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(18, 18, '121.129.23.77', '2025-11-25 18:03:33', 0, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'android-app://com.google.android.gm/'),
(19, 19, '218.152.37.233', '2025-11-26 11:41:02', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(20, 20, '14.52.80.131', '2025-11-26 21:43:46', 0, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(21, 21, '118.235.4.63', '2025-11-27 16:56:01', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(22, 22, '203.254.98.115', '2025-12-03 22:20:53', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(23, 23, '210.120.40.16', '2025-12-11 09:59:47', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(24, 24, '211.234.196.182', '2025-12-12 14:52:22', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/?fbclid=PAdGRleAOojMZleHRuA2FlbQIxMQBzcnRjBmFwcF9pZA8xMjQwMjQ1NzQyODc0MTQAAacdSFHDkv7BhseRFIB7dS7bEwPwPM4kPuxCCISXffb9IjWGW9UqvkWdXUATWg_aem_CIXPsMD6WV-KFy3-iHwkhQ'),
(25, 25, '121.143.87.35', '2025-12-13 00:19:30', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', ''),
(26, 26, '117.111.6.234', '2025-12-13 20:19:42', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://ddp.or.kr/'),
(27, 27, '203.226.142.17', '2025-12-17 10:34:58', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', ''),
(28, 28, '203.228.139.69', '2025-12-17 16:08:44', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(29, 29, '203.226.142.21', '2025-12-18 08:25:13', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://statics.teams.cdn.office.net/'),
(30, 30, '203.226.142.17', '2025-12-18 08:42:58', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', ''),
(31, 31, '203.226.142.17', '2025-12-18 13:09:20', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://krc-excel.officeapps.live.com/'),
(32, 32, '223.38.78.248', '2025-12-27 11:41:34', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.2 (INAPP) KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(33, 33, '223.39.84.116', '2025-12-29 14:13:24', 0, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQPNTY3MDY3MzQzMzUyNDI3AAGnguknqO8fAGcKK0zzamqjmXbwPsDSrcP8bbg0MptHc_HQTGrfbsCvk1gnBP0_aem_y7uUh6-QbXkf6M4zbUo4OQ'),
(34, 34, '211.234.203.183', '2025-12-30 10:11:29', 0, 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; ) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ko', 'https://superpass.sfw.kr/'),
(35, 35, '203.228.139.71', '2025-12-30 16:03:47', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', ''),
(36, 36, '39.7.230.10', '2025-12-31 17:06:37', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/399.2.845414227 Mobile/15E148 Safari/604.1', 'https://ddp.or.kr/'),
(37, 37, '218.237.106.132', '2026-01-04 14:53:38', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://ddp.or.kr/'),
(38, 38, '119.195.228.54', '2026-01-23 23:32:18', 0, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(39, 39, '59.15.178.14', '2026-01-27 13:05:49', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://ddp.or.kr/'),
(40, 40, '223.38.86.192', '2026-01-31 13:38:15', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(41, 41, '106.101.194.186', '2026-02-01 14:56:54', 0, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_selfcert_history`
--

CREATE TABLE `dsp_member_selfcert_history` (
  `msh_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `msh_company` varchar(255) NOT NULL DEFAULT '',
  `msh_certtype` varchar(255) NOT NULL DEFAULT '',
  `msh_cert_key` varchar(255) NOT NULL DEFAULT '',
  `msh_datetime` datetime DEFAULT NULL,
  `msh_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_member_userid`
--

CREATE TABLE `dsp_member_userid` (
  `mem_id` int(11) UNSIGNED NOT NULL,
  `mem_userid` varchar(100) NOT NULL DEFAULT '',
  `mem_status` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_member_userid`
--

INSERT INTO `dsp_member_userid` (`mem_id`, `mem_userid`, `mem_status`) VALUES
(1, 'admin', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_menu`
--

CREATE TABLE `dsp_menu` (
  `men_id` int(11) UNSIGNED NOT NULL,
  `men_parent` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `men_name` varchar(255) NOT NULL DEFAULT '',
  `men_name_en` varchar(255) DEFAULT NULL,
  `men_link` text DEFAULT NULL,
  `men_target` varchar(255) NOT NULL DEFAULT '',
  `men_desktop` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `men_mobile` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `men_custom` varchar(255) NOT NULL DEFAULT '',
  `men_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_menu`
--

INSERT INTO `dsp_menu` (`men_id`, `men_parent`, `men_name`, `men_name_en`, `men_link`, `men_target`, `men_desktop`, `men_mobile`, `men_custom`, `men_order`) VALUES
(1, 0, '카테고리', 'Category', '/category/', '', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_migrations`
--

CREATE TABLE `dsp_migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_migrations`
--

INSERT INTO `dsp_migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_note`
--

CREATE TABLE `dsp_note` (
  `nte_id` int(11) UNSIGNED NOT NULL,
  `send_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `recv_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `nte_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `related_note_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `nte_title` varchar(255) NOT NULL DEFAULT '',
  `nte_content` text DEFAULT NULL,
  `nte_content_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `nte_datetime` datetime DEFAULT NULL,
  `nte_read_datetime` datetime DEFAULT NULL,
  `nte_originname` varchar(255) NOT NULL DEFAULT '',
  `nte_filename` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_notification`
--

CREATE TABLE `dsp_notification` (
  `not_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `target_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `not_type` varchar(255) NOT NULL DEFAULT '',
  `not_content_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `not_message` varchar(255) NOT NULL DEFAULT '',
  `not_url` varchar(255) NOT NULL DEFAULT '',
  `not_datetime` datetime DEFAULT NULL,
  `not_read_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_payment_inicis_log`
--

CREATE TABLE `dsp_payment_inicis_log` (
  `pil_id` bigint(11) UNSIGNED NOT NULL,
  `pil_type` varchar(255) NOT NULL DEFAULT '',
  `P_TID` varchar(255) NOT NULL DEFAULT '',
  `P_MID` varchar(255) NOT NULL DEFAULT '',
  `P_AUTH_DT` varchar(255) NOT NULL DEFAULT '',
  `P_STATUS` varchar(255) NOT NULL DEFAULT '',
  `P_TYPE` varchar(255) NOT NULL DEFAULT '',
  `P_OID` varchar(255) NOT NULL DEFAULT '',
  `P_FN_NM` varchar(255) NOT NULL DEFAULT '',
  `P_AMT` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `P_AUTH_NO` varchar(255) NOT NULL DEFAULT '',
  `P_RMESG1` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_payment_order_data`
--

CREATE TABLE `dsp_payment_order_data` (
  `pod_id` bigint(11) UNSIGNED NOT NULL,
  `pod_pg` varchar(255) NOT NULL DEFAULT '',
  `pod_type` varchar(255) NOT NULL DEFAULT '',
  `pod_data` text DEFAULT NULL,
  `pod_datetime` datetime DEFAULT NULL,
  `pod_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_id` int(11) NOT NULL DEFAULT 0,
  `cart_id` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_point`
--

CREATE TABLE `dsp_point` (
  `poi_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `poi_datetime` datetime DEFAULT NULL,
  `poi_content` varchar(255) NOT NULL DEFAULT '',
  `poi_point` int(11) NOT NULL DEFAULT 0,
  `poi_type` varchar(20) NOT NULL DEFAULT '',
  `poi_related_id` varchar(20) NOT NULL DEFAULT '',
  `poi_action` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_popup`
--

CREATE TABLE `dsp_popup` (
  `pop_id` int(11) UNSIGNED NOT NULL,
  `pop_start_date` date DEFAULT NULL,
  `pop_end_date` date DEFAULT NULL,
  `pop_is_center` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `pop_left` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `pop_top` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `pop_width` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `pop_height` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `pop_device` varchar(10) NOT NULL DEFAULT '',
  `pop_title` varchar(255) NOT NULL DEFAULT '',
  `pop_content` text DEFAULT NULL,
  `pop_content_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `pop_disable_hours` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pop_activated` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `pop_page` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `pop_datetime` datetime DEFAULT NULL,
  `pop_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post`
--

CREATE TABLE `dsp_post` (
  `post_id` int(11) UNSIGNED NOT NULL,
  `post_num` int(11) NOT NULL DEFAULT 0,
  `post_reply` varchar(10) NOT NULL DEFAULT '',
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_title` varchar(255) NOT NULL DEFAULT '',
  `post_content` mediumtext DEFAULT NULL,
  `post_category` varchar(255) NOT NULL DEFAULT '',
  `mem_id` int(11) NOT NULL DEFAULT 0,
  `post_userid` varchar(100) NOT NULL DEFAULT '',
  `post_username` varchar(100) NOT NULL DEFAULT '',
  `post_nickname` varchar(100) NOT NULL DEFAULT '',
  `post_email` varchar(255) NOT NULL DEFAULT '',
  `post_homepage` text DEFAULT NULL,
  `post_datetime` datetime DEFAULT NULL,
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_updated_datetime` datetime DEFAULT NULL,
  `post_update_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_comment_count` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `post_comment_updated_datetime` datetime DEFAULT NULL,
  `post_link_count` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `post_secret` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `post_html` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `post_hide_comment` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `post_notice` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `post_receive_email` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `post_hit` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_like` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_dislike` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_ip` varchar(50) NOT NULL DEFAULT '',
  `post_blame` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `post_device` varchar(10) NOT NULL DEFAULT '',
  `post_file` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `post_image` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `post_del` tinyint(4) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_extra_vars`
--

CREATE TABLE `dsp_post_extra_vars` (
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pev_key` varchar(100) NOT NULL DEFAULT '',
  `pev_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_file`
--

CREATE TABLE `dsp_post_file` (
  `pfi_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pfi_originname` varchar(255) NOT NULL DEFAULT '',
  `pfi_filename` varchar(255) NOT NULL DEFAULT '',
  `pfi_download` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pfi_filesize` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pfi_width` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `pfi_height` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `pfi_type` varchar(10) NOT NULL DEFAULT '',
  `pfi_is_image` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `pfi_datetime` datetime DEFAULT NULL,
  `pfi_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_file_download_log`
--

CREATE TABLE `dsp_post_file_download_log` (
  `pfd_id` int(11) UNSIGNED NOT NULL,
  `pfi_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pfd_datetime` datetime DEFAULT NULL,
  `pfd_ip` varchar(50) NOT NULL DEFAULT '',
  `pfd_useragent` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_history`
--

CREATE TABLE `dsp_post_history` (
  `phi_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `phi_title` varchar(255) NOT NULL DEFAULT '',
  `phi_content` mediumtext DEFAULT NULL,
  `phi_content_html_type` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `phi_ip` varchar(50) NOT NULL DEFAULT '',
  `phi_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_link`
--

CREATE TABLE `dsp_post_link` (
  `pln_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pln_url` text DEFAULT NULL,
  `pln_hit` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_link_click_log`
--

CREATE TABLE `dsp_post_link_click_log` (
  `plc_id` int(11) UNSIGNED NOT NULL,
  `pln_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `plc_datetime` datetime DEFAULT NULL,
  `plc_ip` varchar(50) NOT NULL DEFAULT '',
  `plc_useragent` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_meta`
--

CREATE TABLE `dsp_post_meta` (
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pmt_key` varchar(100) NOT NULL DEFAULT '',
  `pmt_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_naver_syndi_log`
--

CREATE TABLE `dsp_post_naver_syndi_log` (
  `pns_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pns_status` varchar(255) NOT NULL DEFAULT '',
  `pns_return_code` varchar(255) NOT NULL DEFAULT '',
  `pns_return_message` varchar(255) NOT NULL DEFAULT '',
  `pns_receipt_number` varchar(255) NOT NULL DEFAULT '',
  `pns_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_poll`
--

CREATE TABLE `dsp_post_poll` (
  `ppo_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ppo_start_datetime` datetime DEFAULT NULL,
  `ppo_end_datetime` datetime DEFAULT NULL,
  `ppo_title` varchar(255) NOT NULL DEFAULT '',
  `ppo_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ppo_choose_count` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `ppo_after_comment` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `ppo_point` int(11) NOT NULL DEFAULT 0,
  `ppo_datetime` datetime DEFAULT NULL,
  `ppo_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_poll_item`
--

CREATE TABLE `dsp_post_poll_item` (
  `ppi_id` int(11) UNSIGNED NOT NULL,
  `ppo_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ppi_item` varchar(255) NOT NULL DEFAULT '',
  `ppi_count` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_poll_item_poll`
--

CREATE TABLE `dsp_post_poll_item_poll` (
  `ppp_id` int(11) UNSIGNED NOT NULL,
  `ppo_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ppi_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ppp_datetime` datetime DEFAULT NULL,
  `ppp_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_post_tag`
--

CREATE TABLE `dsp_post_tag` (
  `pta_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pta_tag` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_scrap`
--

CREATE TABLE `dsp_scrap` (
  `scr_id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `post_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `target_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `scr_datetime` datetime DEFAULT NULL,
  `scr_title` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_search_keyword`
--

CREATE TABLE `dsp_search_keyword` (
  `sek_id` int(11) UNSIGNED NOT NULL,
  `sek_keyword` varchar(100) NOT NULL DEFAULT '',
  `sek_datetime` datetime DEFAULT NULL,
  `sek_ip` varchar(50) NOT NULL DEFAULT '',
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_session`
--

CREATE TABLE `dsp_session` (
  `id` varchar(120) NOT NULL DEFAULT '',
  `ip_address` varchar(45) NOT NULL DEFAULT '',
  `timestamp` int(10) NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_sms_favorite`
--

CREATE TABLE `dsp_sms_favorite` (
  `sfa_id` int(11) UNSIGNED NOT NULL,
  `sfa_title` varchar(255) NOT NULL DEFAULT '',
  `sfa_content` text DEFAULT NULL,
  `sfa_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_sms_member`
--

CREATE TABLE `dsp_sms_member` (
  `sme_id` int(11) UNSIGNED NOT NULL,
  `smg_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `sme_name` varchar(255) NOT NULL DEFAULT '',
  `sme_phone` varchar(255) NOT NULL DEFAULT '',
  `sme_receive` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `sme_datetime` datetime DEFAULT NULL,
  `sme_memo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_sms_member_group`
--

CREATE TABLE `dsp_sms_member_group` (
  `smg_id` int(11) UNSIGNED NOT NULL,
  `smg_name` varchar(255) NOT NULL DEFAULT '',
  `smg_order` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `smg_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_sms_send_content`
--

CREATE TABLE `dsp_sms_send_content` (
  `ssc_id` int(11) UNSIGNED NOT NULL,
  `ssc_content` text DEFAULT NULL,
  `send_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ssc_send_phone` varchar(255) NOT NULL DEFAULT '',
  `ssc_booking` datetime DEFAULT NULL,
  `ssc_total` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `ssc_success` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `ssc_fail` mediumint(6) UNSIGNED NOT NULL DEFAULT 0,
  `ssc_datetime` datetime DEFAULT NULL,
  `ssc_memo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_sms_send_history`
--

CREATE TABLE `dsp_sms_send_history` (
  `ssh_id` int(11) UNSIGNED NOT NULL,
  `ssc_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `send_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `recv_mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `ssh_name` varchar(255) NOT NULL DEFAULT '',
  `ssh_phone` varchar(255) NOT NULL DEFAULT '',
  `ssh_success` tinyint(4) UNSIGNED NOT NULL DEFAULT 0,
  `ssh_datetime` datetime DEFAULT NULL,
  `ssh_memo` text DEFAULT NULL,
  `ssh_log` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_social`
--

CREATE TABLE `dsp_social` (
  `soc_id` int(11) UNSIGNED NOT NULL,
  `soc_type` varchar(255) NOT NULL DEFAULT '',
  `soc_account_id` varchar(100) NOT NULL DEFAULT '',
  `soc_key` varchar(100) NOT NULL DEFAULT '',
  `soc_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_social`
--

INSERT INTO `dsp_social` (`soc_id`, `soc_type`, `soc_account_id`, `soc_key`, `soc_value`) VALUES
(1, 'google', '105464085086941095924', 'email', 'jsy@sfw.kr'),
(2, 'google', '105464085086941095924', 'familyName', '정'),
(3, 'google', '105464085086941095924', 'givenName', '성윤'),
(4, 'google', '105464085086941095924', 'name', '정성윤'),
(5, 'google', '105464085086941095924', 'gender', ''),
(6, 'google', '105464085086941095924', 'link', ''),
(7, 'google', '105464085086941095924', 'locale', ''),
(8, 'google', '105464085086941095924', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIwgL3RutPCXzxLUAeaIKn3jK8TkyvWmhjFjkMQ72ydZ3Newzi1=s96-c'),
(9, 'google', '105464085086941095924', 'update_datetime', '2026-01-20 15:44:52'),
(10, 'google', '105464085086941095924', 'ip_address', '118.235.7.254'),
(11, 'google', '116077886721544022133', 'email', 'sungyoon.jung.1998@gmail.com'),
(12, 'google', '116077886721544022133', 'familyName', 'J'),
(13, 'google', '116077886721544022133', 'givenName', 'SY'),
(14, 'google', '116077886721544022133', 'name', 'SY J'),
(15, 'google', '116077886721544022133', 'gender', ''),
(16, 'google', '116077886721544022133', 'link', ''),
(17, 'google', '116077886721544022133', 'locale', ''),
(18, 'google', '116077886721544022133', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIlqd_KylfDkjRQWc5Kl8n04ieW16lQrGjkAHcNvsOG-lg1JAST9g=s96-c'),
(19, 'google', '116077886721544022133', 'update_datetime', '2026-02-02 14:26:43'),
(20, 'google', '116077886721544022133', 'ip_address', '192.168.0.1'),
(21, 'google', '109440677763750454571', 'email', 'dpfla990113@gmail.com'),
(22, 'google', '109440677763750454571', 'familyName', '최'),
(23, 'google', '109440677763750454571', 'givenName', '예림'),
(24, 'google', '109440677763750454571', 'name', '최예림'),
(25, 'google', '109440677763750454571', 'gender', ''),
(26, 'google', '109440677763750454571', 'link', ''),
(27, 'google', '109440677763750454571', 'locale', ''),
(28, 'google', '109440677763750454571', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocI58LLZrPkH5kUB5hfuMhbXVevWyC44FRfZDe_nLVApHRv3yg=s96-c'),
(29, 'google', '109440677763750454571', 'update_datetime', '2026-01-20 16:15:05'),
(30, 'google', '109440677763750454571', 'ip_address', '118.235.74.107'),
(31, 'google', '110848246692065214169', 'email', 'lesonia2@gmail.com'),
(32, 'google', '110848246692065214169', 'familyName', 'Lee'),
(33, 'google', '110848246692065214169', 'givenName', 'soyeon'),
(34, 'google', '110848246692065214169', 'name', 'soyeon Lee'),
(35, 'google', '110848246692065214169', 'gender', ''),
(36, 'google', '110848246692065214169', 'link', ''),
(37, 'google', '110848246692065214169', 'locale', ''),
(38, 'google', '110848246692065214169', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocLxUoAou-6022fT5LxklEqE0KViNsQBINe1u36qW83Hj70A1fg=s96-c'),
(39, 'google', '110848246692065214169', 'update_datetime', '2025-11-18 08:49:30'),
(40, 'google', '110848246692065214169', 'ip_address', '211.234.227.194'),
(41, 'google', '106217783269783525615', 'email', 'zaqxsw784@gmail.com'),
(42, 'google', '106217783269783525615', 'familyName', 'kwak'),
(43, 'google', '106217783269783525615', 'givenName', 'minyoung'),
(44, 'google', '106217783269783525615', 'name', 'minyoung “gidam” kwak'),
(45, 'google', '106217783269783525615', 'gender', ''),
(46, 'google', '106217783269783525615', 'link', ''),
(47, 'google', '106217783269783525615', 'locale', ''),
(48, 'google', '106217783269783525615', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIjDgP7Iy4DTGDYHyVT1155z9qn7ffDM8OSRTCLtpq7w8mpFikU=s96-c'),
(49, 'google', '106217783269783525615', 'update_datetime', '2025-11-05 16:55:52'),
(50, 'google', '106217783269783525615', 'ip_address', '210.120.40.53'),
(51, 'google', '102053076197865398694', 'email', 'yelimc79@gmail.com'),
(52, 'google', '102053076197865398694', 'familyName', '최'),
(53, 'google', '102053076197865398694', 'givenName', '예림'),
(54, 'google', '102053076197865398694', 'name', '최예림'),
(55, 'google', '102053076197865398694', 'gender', ''),
(56, 'google', '102053076197865398694', 'link', ''),
(57, 'google', '102053076197865398694', 'locale', ''),
(58, 'google', '102053076197865398694', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIV-r3I02hTuSc2CaIXjrlosCTF6EtHbF3aOqt8miEzXjc4=s96-c'),
(59, 'google', '102053076197865398694', 'update_datetime', '2025-11-07 17:24:33'),
(60, 'google', '102053076197865398694', 'ip_address', '39.7.231.172'),
(61, 'google', '105046100984388913049', 'email', 'songjy0702@gmail.com'),
(62, 'google', '105046100984388913049', 'familyName', 'Song'),
(63, 'google', '105046100984388913049', 'givenName', 'Juyoung'),
(64, 'google', '105046100984388913049', 'name', 'Juyoung Song'),
(65, 'google', '105046100984388913049', 'gender', ''),
(66, 'google', '105046100984388913049', 'link', ''),
(67, 'google', '105046100984388913049', 'locale', ''),
(68, 'google', '105046100984388913049', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIQT2tZ4HNx45cCfbkgOHaymNb4Q7Wzxh_Wl_aS0bnmPaaP90E=s96-c'),
(69, 'google', '105046100984388913049', 'update_datetime', '2025-11-25 09:57:34'),
(70, 'google', '105046100984388913049', 'ip_address', '218.152.37.122'),
(71, 'google', '105641510501328181137', 'email', 'jumiyeo123@gmail.com'),
(72, 'google', '105641510501328181137', 'familyName', 'yeo'),
(73, 'google', '105641510501328181137', 'givenName', 'jumi'),
(74, 'google', '105641510501328181137', 'name', 'jumi yeo'),
(75, 'google', '105641510501328181137', 'gender', ''),
(76, 'google', '105641510501328181137', 'link', ''),
(77, 'google', '105641510501328181137', 'locale', ''),
(78, 'google', '105641510501328181137', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIUlGicz2aTGZ7hkKNuQ3yMMBNRcrCKy5bk8i2RItvzQHAzFQ=s96-c'),
(79, 'google', '105641510501328181137', 'update_datetime', '2025-11-25 10:13:16'),
(80, 'google', '105641510501328181137', 'ip_address', '211.104.38.177'),
(81, 'google', '101039179174374739258', 'email', 'ji.lee@urbanhost.co.kr'),
(82, 'google', '101039179174374739258', 'familyName', '이'),
(83, 'google', '101039179174374739258', 'givenName', '지인'),
(84, 'google', '101039179174374739258', 'name', '이지인'),
(85, 'google', '101039179174374739258', 'gender', ''),
(86, 'google', '101039179174374739258', 'link', ''),
(87, 'google', '101039179174374739258', 'locale', ''),
(88, 'google', '101039179174374739258', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIj33H9fxkhehr8nFVEgd5a3f3IJNJhWrS8Mp8GKc9RZNHiGQ=s96-c'),
(89, 'google', '101039179174374739258', 'update_datetime', '2025-11-25 11:06:10'),
(90, 'google', '101039179174374739258', 'ip_address', '218.153.127.49'),
(91, 'google', '117450602503403379071', 'email', 'mimilinecoltd@gmail.com'),
(92, 'google', '117450602503403379071', 'familyName', ''),
(93, 'google', '117450602503403379071', 'givenName', 'MIMI LINE CO.LTD.'),
(94, 'google', '117450602503403379071', 'name', 'MIMI LINE CO.LTD.'),
(95, 'google', '117450602503403379071', 'gender', ''),
(96, 'google', '117450602503403379071', 'link', ''),
(97, 'google', '117450602503403379071', 'locale', ''),
(98, 'google', '117450602503403379071', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocLL9Uo9RTWPFdt4DsnpLHSgXD_tVYZhA89XVipsSkRJOHK-Vw=s96-c'),
(99, 'google', '117450602503403379071', 'update_datetime', '2025-11-25 13:55:27'),
(100, 'google', '117450602503403379071', 'ip_address', '211.62.174.10'),
(101, 'google', '111192490101687963714', 'email', 'djkoreatour@gmail.com'),
(102, 'google', '111192490101687963714', 'familyName', 'JOO'),
(103, 'google', '111192490101687963714', 'givenName', 'DAVID'),
(104, 'google', '111192490101687963714', 'name', 'DAVID JOO'),
(105, 'google', '111192490101687963714', 'gender', ''),
(106, 'google', '111192490101687963714', 'link', ''),
(107, 'google', '111192490101687963714', 'locale', ''),
(108, 'google', '111192490101687963714', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIuYY9OxmH3Vjv9jO7R2yE1rxN_N1jAy_F4JPyw4QOBJ3cuoFY=s96-c'),
(109, 'google', '111192490101687963714', 'update_datetime', '2025-11-25 13:55:11'),
(110, 'google', '111192490101687963714', 'ip_address', '211.59.179.170'),
(111, 'google', '114019512894388368878', 'email', 'dlfppsl@gmail.com'),
(112, 'google', '114019512894388368878', 'familyName', 'Shin'),
(113, 'google', '114019512894388368878', 'givenName', 'Yire'),
(114, 'google', '114019512894388368878', 'name', 'Yire Shin (신이레)'),
(115, 'google', '114019512894388368878', 'gender', ''),
(116, 'google', '114019512894388368878', 'link', ''),
(117, 'google', '114019512894388368878', 'locale', ''),
(118, 'google', '114019512894388368878', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocKtRreUFA_1SIHSiIRqwM0CjPHfuzLXDyM-GJ8zpmFNjMe0qd0=s96-c'),
(119, 'google', '114019512894388368878', 'update_datetime', '2025-11-25 18:03:33'),
(120, 'google', '114019512894388368878', 'ip_address', '121.129.23.77'),
(121, 'google', '101590274058638995494', 'email', 'yckim1985@gmail.com'),
(122, 'google', '101590274058638995494', 'familyName', '삼'),
(123, 'google', '101590274058638995494', 'givenName', '겹살'),
(124, 'google', '101590274058638995494', 'name', '삼겹살'),
(125, 'google', '101590274058638995494', 'gender', ''),
(126, 'google', '101590274058638995494', 'link', ''),
(127, 'google', '101590274058638995494', 'locale', ''),
(128, 'google', '101590274058638995494', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocKKrRSXlrftQ25cMrv4MyCeROM_g36Jz-rHTp4s6fwl3vjL0iI=s96-c'),
(129, 'google', '101590274058638995494', 'update_datetime', '2025-11-26 11:41:02'),
(130, 'google', '101590274058638995494', 'ip_address', '218.152.37.233'),
(131, 'google', '100257641290684623897', 'email', 'affairjangchung@gmail.com'),
(132, 'google', '100257641290684623897', 'familyName', ''),
(133, 'google', '100257641290684623897', 'givenName', '어페어커피 장충점'),
(134, 'google', '100257641290684623897', 'name', '어페어커피 장충점'),
(135, 'google', '100257641290684623897', 'gender', ''),
(136, 'google', '100257641290684623897', 'link', ''),
(137, 'google', '100257641290684623897', 'locale', ''),
(138, 'google', '100257641290684623897', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocJk_PT1ro0DTyFT4Aa_SMo0-uBEb2_dUQxSc6LBf1Xsuc1LAA=s96-c'),
(139, 'google', '100257641290684623897', 'update_datetime', '2025-11-26 21:43:46'),
(140, 'google', '100257641290684623897', 'ip_address', '14.52.80.131'),
(141, 'google', '100283445719914313963', 'email', 'sorbine94@gmail.com'),
(142, 'google', '100283445719914313963', 'familyName', '장'),
(143, 'google', '100283445719914313963', 'givenName', '솔빈'),
(144, 'google', '100283445719914313963', 'name', '장솔빈'),
(145, 'google', '100283445719914313963', 'gender', ''),
(146, 'google', '100283445719914313963', 'link', ''),
(147, 'google', '100283445719914313963', 'locale', ''),
(148, 'google', '100283445719914313963', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocLkJoZZQZ4tWSdGVmj48prxLvr1m3FYLUx1yJNR7DBHa2cdR4HO=s96-c'),
(149, 'google', '100283445719914313963', 'update_datetime', '2025-12-15 11:00:54'),
(150, 'google', '100283445719914313963', 'ip_address', '115.92.5.197'),
(151, 'google', '109365657648671803155', 'email', 'mohicanbear@gmail.com'),
(152, 'google', '109365657648671803155', 'familyName', 'Lee'),
(153, 'google', '109365657648671803155', 'givenName', 'Jongwon'),
(154, 'google', '109365657648671803155', 'name', 'Jongwon Lee'),
(155, 'google', '109365657648671803155', 'gender', ''),
(156, 'google', '109365657648671803155', 'link', ''),
(157, 'google', '109365657648671803155', 'locale', ''),
(158, 'google', '109365657648671803155', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocJNBmoAWoQVwzrGF3Exj7vT6Scn_b23xcZNal2s0gPBWVD_HZas6Q=s96-c'),
(159, 'google', '109365657648671803155', 'update_datetime', '2025-12-03 22:20:53'),
(160, 'google', '109365657648671803155', 'ip_address', '203.254.98.115'),
(161, 'google', '106513097939318570665', 'email', 'jungah090909@gmail.com'),
(162, 'google', '106513097939318570665', 'familyName', '신'),
(163, 'google', '106513097939318570665', 'givenName', '정아'),
(164, 'google', '106513097939318570665', 'name', '신정아'),
(165, 'google', '106513097939318570665', 'gender', ''),
(166, 'google', '106513097939318570665', 'link', ''),
(167, 'google', '106513097939318570665', 'locale', ''),
(168, 'google', '106513097939318570665', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIr89CFeDRubU6oTedtVzZJ1xqfJr4-d1Lvc2eJYtyPuEizHm4=s96-c'),
(169, 'google', '106513097939318570665', 'update_datetime', '2025-12-11 09:59:47'),
(170, 'google', '106513097939318570665', 'ip_address', '210.120.40.16'),
(171, 'google', '112829576108645421485', 'email', 'snoopire@gmail.com'),
(172, 'google', '112829576108645421485', 'familyName', 'kim'),
(173, 'google', '112829576108645421485', 'givenName', 'eun-hae'),
(174, 'google', '112829576108645421485', 'name', 'eun-hae kim'),
(175, 'google', '112829576108645421485', 'gender', ''),
(176, 'google', '112829576108645421485', 'link', ''),
(177, 'google', '112829576108645421485', 'locale', ''),
(178, 'google', '112829576108645421485', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocLxhR6lyTaKdHzWjn9UiX-dZ5nR8hF4rYv0gGCzYWhWeUH95w=s96-c'),
(179, 'google', '112829576108645421485', 'update_datetime', '2025-12-12 14:52:22'),
(180, 'google', '112829576108645421485', 'ip_address', '211.234.196.182'),
(181, 'google', '114591319052642436754', 'email', 'whalstn328@gmail.com'),
(182, 'google', '114591319052642436754', 'familyName', '조'),
(183, 'google', '114591319052642436754', 'givenName', '민수'),
(184, 'google', '114591319052642436754', 'name', '조민수'),
(185, 'google', '114591319052642436754', 'gender', ''),
(186, 'google', '114591319052642436754', 'link', ''),
(187, 'google', '114591319052642436754', 'locale', ''),
(188, 'google', '114591319052642436754', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocJGb9UmCxkdOr9-aglmfC-z53ySnsGuRAyKTHmxucaTRQw9og=s96-c'),
(189, 'google', '114591319052642436754', 'update_datetime', '2025-12-13 00:19:30'),
(190, 'google', '114591319052642436754', 'ip_address', '121.143.87.35'),
(191, 'google', '110222884565804902418', 'email', 'akhenkitera@gmail.com'),
(192, 'google', '110222884565804902418', 'familyName', 'Lee'),
(193, 'google', '110222884565804902418', 'givenName', 'Hyemi'),
(194, 'google', '110222884565804902418', 'name', 'Hyemi Lee'),
(195, 'google', '110222884565804902418', 'gender', ''),
(196, 'google', '110222884565804902418', 'link', ''),
(197, 'google', '110222884565804902418', 'locale', ''),
(198, 'google', '110222884565804902418', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocKT8Y8ydSkbzRGJ3d6nEdpyj13wIiwXrrxfDHVRgZTJdRJGSw=s96-c'),
(199, 'google', '110222884565804902418', 'update_datetime', '2025-12-13 20:19:42'),
(200, 'google', '110222884565804902418', 'ip_address', '117.111.6.234'),
(201, 'google', '111457728539640742734', 'email', 'sunwha1003@gmail.com'),
(202, 'google', '111457728539640742734', 'familyName', '김'),
(203, 'google', '111457728539640742734', 'givenName', '선화'),
(204, 'google', '111457728539640742734', 'name', '김선화'),
(205, 'google', '111457728539640742734', 'gender', ''),
(206, 'google', '111457728539640742734', 'link', ''),
(207, 'google', '111457728539640742734', 'locale', ''),
(208, 'google', '111457728539640742734', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIT676LwPAPQNmoUrQtmx4AQxwR5J5WauMxwm4Tx245q18VHQ=s96-c'),
(209, 'google', '111457728539640742734', 'update_datetime', '2026-01-15 12:49:44'),
(210, 'google', '111457728539640742734', 'ip_address', '203.226.142.21'),
(211, 'google', '117523341861157597959', 'email', 'hyundaioutletddm@gmail.com'),
(212, 'google', '117523341861157597959', 'familyName', ''),
(213, 'google', '117523341861157597959', 'givenName', '현대아울렛 동대문점'),
(214, 'google', '117523341861157597959', 'name', '현대아울렛 동대문점'),
(215, 'google', '117523341861157597959', 'gender', ''),
(216, 'google', '117523341861157597959', 'link', ''),
(217, 'google', '117523341861157597959', 'locale', ''),
(218, 'google', '117523341861157597959', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocJglRaaCwV3KI89VdQVzSLox0v2SIrPhjpvVELwf81eGsKQrg=s96-c'),
(219, 'google', '117523341861157597959', 'update_datetime', '2026-01-26 14:55:48'),
(220, 'google', '117523341861157597959', 'ip_address', '203.228.139.69'),
(221, 'google', '107808704284396690126', 'email', 'poss3311@gmail.com'),
(222, 'google', '107808704284396690126', 'familyName', '박'),
(223, 'google', '107808704284396690126', 'givenName', '연서'),
(224, 'google', '107808704284396690126', 'name', '박연서'),
(225, 'google', '107808704284396690126', 'gender', ''),
(226, 'google', '107808704284396690126', 'link', ''),
(227, 'google', '107808704284396690126', 'locale', ''),
(228, 'google', '107808704284396690126', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocLxsdGnU4fVIf7h29ieuYOZt6EZYU1NiN8kB1O0YkNdyn9fUQ=s96-c'),
(229, 'google', '107808704284396690126', 'update_datetime', '2025-12-18 15:17:58'),
(230, 'google', '107808704284396690126', 'ip_address', '203.226.142.17'),
(231, 'google', '103774563305665183490', 'email', 'dootamallmkt@gmail.com'),
(232, 'google', '103774563305665183490', 'familyName', '박'),
(233, 'google', '103774563305665183490', 'givenName', '두타'),
(234, 'google', '103774563305665183490', 'name', '박두타'),
(235, 'google', '103774563305665183490', 'gender', ''),
(236, 'google', '103774563305665183490', 'link', ''),
(237, 'google', '103774563305665183490', 'locale', ''),
(238, 'google', '103774563305665183490', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocLuaECeLzmU07_EoIQ_T7p_vx4X4vuEYBrgorXcDRwWlkShEA=s96-c'),
(239, 'google', '103774563305665183490', 'update_datetime', '2026-01-15 12:49:03'),
(240, 'google', '103774563305665183490', 'ip_address', '203.226.142.21'),
(241, 'google', '108546078466191679141', 'email', 'ljs9175@gmail.com'),
(242, 'google', '108546078466191679141', 'familyName', 'lee'),
(243, 'google', '108546078466191679141', 'givenName', 'jungseok'),
(244, 'google', '108546078466191679141', 'name', 'jungseok lee'),
(245, 'google', '108546078466191679141', 'gender', ''),
(246, 'google', '108546078466191679141', 'link', ''),
(247, 'google', '108546078466191679141', 'locale', ''),
(248, 'google', '108546078466191679141', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIOYL-wZMHC0qLFlFZUT40CDlK77oIp6ZpX9JDEHEjAHuotvQ=s96-c'),
(249, 'google', '108546078466191679141', 'update_datetime', '2025-12-18 13:09:20'),
(250, 'google', '108546078466191679141', 'ip_address', '203.226.142.17'),
(251, 'google', '113964632008908616748', 'email', 'hyseon0519@gmail.com'),
(252, 'google', '113964632008908616748', 'familyName', '선'),
(253, 'google', '113964632008908616748', 'givenName', '혜연'),
(254, 'google', '113964632008908616748', 'name', '선혜연'),
(255, 'google', '113964632008908616748', 'gender', ''),
(256, 'google', '113964632008908616748', 'link', ''),
(257, 'google', '113964632008908616748', 'locale', ''),
(258, 'google', '113964632008908616748', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocKMN4xTW7rTsZlZXOJMDYHi1HqTJHcnqmV2Rn14-JKc3thXE2Xo=s96-c'),
(259, 'google', '113964632008908616748', 'update_datetime', '2025-12-27 11:41:34'),
(260, 'google', '113964632008908616748', 'ip_address', '223.38.78.248'),
(261, 'google', '115433847890655217542', 'email', 'sujin3575kim@gmail.com'),
(262, 'google', '115433847890655217542', 'familyName', 'kim'),
(263, 'google', '115433847890655217542', 'givenName', 's'),
(264, 'google', '115433847890655217542', 'name', 's kim'),
(265, 'google', '115433847890655217542', 'gender', ''),
(266, 'google', '115433847890655217542', 'link', ''),
(267, 'google', '115433847890655217542', 'locale', ''),
(268, 'google', '115433847890655217542', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocK2ZHME8bBpa6Yjmh2jrkZUvoXN9a5UAPC9MAulMsz51JN-gA=s96-c'),
(269, 'google', '115433847890655217542', 'update_datetime', '2025-12-29 14:13:24'),
(270, 'google', '115433847890655217542', 'ip_address', '223.39.84.116'),
(271, 'google', '111742197555414386172', 'email', 'haim3004@gmail.com'),
(272, 'google', '111742197555414386172', 'familyName', '정'),
(273, 'google', '111742197555414386172', 'givenName', '하임'),
(274, 'google', '111742197555414386172', 'name', '정하임'),
(275, 'google', '111742197555414386172', 'gender', ''),
(276, 'google', '111742197555414386172', 'link', ''),
(277, 'google', '111742197555414386172', 'locale', ''),
(278, 'google', '111742197555414386172', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIUJOOH4VB7rh9ErwnSveVm399axPiBOLeUciNID1VGRFAKfQ=s96-c'),
(279, 'google', '111742197555414386172', 'update_datetime', '2025-12-30 10:11:29'),
(280, 'google', '111742197555414386172', 'ip_address', '211.234.203.183'),
(281, 'google', '117148749875689525419', 'email', 'hyundaiddm11@gmail.com'),
(282, 'google', '117148749875689525419', 'familyName', '김'),
(283, 'google', '117148749875689525419', 'givenName', '민균'),
(284, 'google', '117148749875689525419', 'name', '김민균'),
(285, 'google', '117148749875689525419', 'gender', ''),
(286, 'google', '117148749875689525419', 'link', ''),
(287, 'google', '117148749875689525419', 'locale', ''),
(288, 'google', '117148749875689525419', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocLExqfxOvkiEwvbre6CUiL2S4qFhWh5njl2FI0FE_dvYQZWUA=s96-c'),
(289, 'google', '117148749875689525419', 'update_datetime', '2025-12-30 16:03:47'),
(290, 'google', '117148749875689525419', 'ip_address', '203.228.139.71'),
(291, 'google', '102800024434196918774', 'email', 'fuddk0911@gmail.com'),
(292, 'google', '102800024434196918774', 'familyName', '김'),
(293, 'google', '102800024434196918774', 'givenName', '령아'),
(294, 'google', '102800024434196918774', 'name', '김령아'),
(295, 'google', '102800024434196918774', 'gender', ''),
(296, 'google', '102800024434196918774', 'link', ''),
(297, 'google', '102800024434196918774', 'locale', ''),
(298, 'google', '102800024434196918774', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocLD4Ce-Q_22XCAAI9E-v84u_djT_W5wXicgxJCLsFJqSpEdIPc=s96-c'),
(299, 'google', '102800024434196918774', 'update_datetime', '2025-12-31 17:06:37'),
(300, 'google', '102800024434196918774', 'ip_address', '39.7.230.10'),
(301, 'google', '114126761271462980937', 'email', 'dongbuk02@dongbuk.es.kr'),
(302, 'google', '114126761271462980937', 'familyName', '허효정'),
(303, 'google', '114126761271462980937', 'givenName', '선생님'),
(304, 'google', '114126761271462980937', 'name', '허효정선생님'),
(305, 'google', '114126761271462980937', 'gender', ''),
(306, 'google', '114126761271462980937', 'link', ''),
(307, 'google', '114126761271462980937', 'locale', ''),
(308, 'google', '114126761271462980937', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocINXwH_sMXmRD-0-6zSQcLQmgxpGG8xXnRHwPFoHMVOLNUQigz3NA=s96-c'),
(309, 'google', '114126761271462980937', 'update_datetime', '2026-01-04 14:53:38'),
(310, 'google', '114126761271462980937', 'ip_address', '218.237.106.132'),
(311, 'google', '105863241015512702365', 'email', 'pollen1224@gmail.com'),
(312, 'google', '105863241015512702365', 'familyName', 'Choi'),
(313, 'google', '105863241015512702365', 'givenName', 'Lucy'),
(314, 'google', '105863241015512702365', 'name', 'Lucy Choi'),
(315, 'google', '105863241015512702365', 'gender', ''),
(316, 'google', '105863241015512702365', 'link', ''),
(317, 'google', '105863241015512702365', 'locale', ''),
(318, 'google', '105863241015512702365', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocIGAVnHi7qJ-isaQ1qqbu3r-UvbGYnoghvVANv2FyhuGS14Vobr6Q=s96-c'),
(319, 'google', '105863241015512702365', 'update_datetime', '2026-01-23 23:32:18'),
(320, 'google', '105863241015512702365', 'ip_address', '119.195.228.54'),
(321, 'google', '110974864627071534608', 'email', 'dittocam@gmail.com'),
(322, 'google', '110974864627071534608', 'familyName', 'cam'),
(323, 'google', '110974864627071534608', 'givenName', 'ditto'),
(324, 'google', '110974864627071534608', 'name', 'ditto cam'),
(325, 'google', '110974864627071534608', 'gender', ''),
(326, 'google', '110974864627071534608', 'link', ''),
(327, 'google', '110974864627071534608', 'locale', ''),
(328, 'google', '110974864627071534608', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocKgZfuxmgGjMQy5TDfr_gvRPYpSm3UAPGk7nPMs9JJvz4CGVhJD=s96-c'),
(329, 'google', '110974864627071534608', 'update_datetime', '2026-01-27 13:05:49'),
(330, 'google', '110974864627071534608', 'ip_address', '59.15.178.14'),
(331, 'google', '103104440689651566723', 'email', 'eno926@gmail.com'),
(332, 'google', '103104440689651566723', 'familyName', 'Fan'),
(333, 'google', '103104440689651566723', 'givenName', 'Eno'),
(334, 'google', '103104440689651566723', 'name', 'Eno Fan'),
(335, 'google', '103104440689651566723', 'gender', ''),
(336, 'google', '103104440689651566723', 'link', ''),
(337, 'google', '103104440689651566723', 'locale', ''),
(338, 'google', '103104440689651566723', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocLmg8uLRn4OqgCg4zGTLh9kdEZCdQjVj0C4TOmmo50xyNQZRILW=s96-c'),
(339, 'google', '103104440689651566723', 'update_datetime', '2026-01-31 13:38:15'),
(340, 'google', '103104440689651566723', 'ip_address', '223.38.86.192'),
(341, 'google', '118111591192398347903', 'email', 'korean2012@gmail.com'),
(342, 'google', '118111591192398347903', 'familyName', '블루'),
(343, 'google', '118111591192398347903', 'givenName', '스카이'),
(344, 'google', '118111591192398347903', 'name', '블루스카이'),
(345, 'google', '118111591192398347903', 'gender', ''),
(346, 'google', '118111591192398347903', 'link', ''),
(347, 'google', '118111591192398347903', 'locale', ''),
(348, 'google', '118111591192398347903', 'picture', 'https://lh3.googleusercontent.com/a/ACg8ocKApOl4pLg9sb5rIU0oG3-iozTmKchb1ndic2vGjnm7m2K9mQ=s96-c'),
(349, 'google', '118111591192398347903', 'update_datetime', '2026-02-01 14:56:54'),
(350, 'google', '118111591192398347903', 'ip_address', '106.101.194.186');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_social_meta`
--

CREATE TABLE `dsp_social_meta` (
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `smt_key` varchar(100) NOT NULL DEFAULT '',
  `smt_value` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_social_meta`
--

INSERT INTO `dsp_social_meta` (`mem_id`, `smt_key`, `smt_value`) VALUES
(20, 'google_id', '100257641290684623897'),
(21, 'google_id', '100283445719914313963'),
(15, 'google_id', '101039179174374739258'),
(19, 'google_id', '101590274058638995494'),
(11, 'google_id', '102053076197865398694'),
(36, 'google_id', '102800024434196918774'),
(40, 'google_id', '103104440689651566723'),
(30, 'google_id', '103774563305665183490'),
(13, 'google_id', '105046100984388913049'),
(5, 'google_id', '105464085086941095924'),
(14, 'google_id', '105641510501328181137'),
(38, 'google_id', '105863241015512702365'),
(10, 'google_id', '106217783269783525615'),
(23, 'google_id', '106513097939318570665'),
(29, 'google_id', '107808704284396690126'),
(31, 'google_id', '108546078466191679141'),
(22, 'google_id', '109365657648671803155'),
(7, 'google_id', '109440677763750454571'),
(26, 'google_id', '110222884565804902418'),
(8, 'google_id', '110848246692065214169'),
(39, 'google_id', '110974864627071534608'),
(17, 'google_id', '111192490101687963714'),
(27, 'google_id', '111457728539640742734'),
(34, 'google_id', '111742197555414386172'),
(24, 'google_id', '112829576108645421485'),
(32, 'google_id', '113964632008908616748'),
(18, 'google_id', '114019512894388368878'),
(37, 'google_id', '114126761271462980937'),
(25, 'google_id', '114591319052642436754'),
(33, 'google_id', '115433847890655217542'),
(12, 'google_id', '116077886721544022133'),
(35, 'google_id', '117148749875689525419'),
(16, 'google_id', '117450602503403379071'),
(28, 'google_id', '117523341861157597959'),
(41, 'google_id', '118111591192398347903');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_stat_count`
--

CREATE TABLE `dsp_stat_count` (
  `sco_id` int(11) UNSIGNED NOT NULL,
  `sco_ip` varchar(50) NOT NULL DEFAULT '',
  `sco_date` date NOT NULL,
  `sco_time` time NOT NULL,
  `sco_referer` text DEFAULT NULL,
  `sco_current` text DEFAULT NULL,
  `sco_agent` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_stat_count_board`
--

CREATE TABLE `dsp_stat_count_board` (
  `scb_id` int(11) UNSIGNED NOT NULL,
  `scb_date` date NOT NULL,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `scb_count` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_stat_count_date`
--

CREATE TABLE `dsp_stat_count_date` (
  `scd_date` date NOT NULL,
  `scd_count` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_store`
--

CREATE TABLE `dsp_store` (
  `no` int(20) UNSIGNED NOT NULL,
  `year` int(10) DEFAULT 2024,
  `category` varchar(100) DEFAULT NULL,
  `branchNo` int(20) UNSIGNED NOT NULL,
  `storeCode` varchar(100) DEFAULT NULL,
  `dcAmount` int(10) DEFAULT NULL,
  `dcType` varchar(10) DEFAULT NULL,
  `sNameKR` varchar(100) NOT NULL,
  `sNameEN` varchar(100) DEFAULT NULL,
  `sDescKR` text DEFAULT NULL,
  `sDescEN` text DEFAULT NULL,
  `sAddr1KR` varchar(200) DEFAULT NULL,
  `sAddr2KR` varchar(200) DEFAULT NULL,
  `sAddr3KR` varchar(200) DEFAULT NULL,
  `sAddr1EN` varchar(200) DEFAULT NULL,
  `sAddr2EN` varchar(200) DEFAULT NULL,
  `sAddr3EN` varchar(200) DEFAULT NULL,
  `sContact` varchar(200) DEFAULT NULL,
  `mapLat` varchar(30) DEFAULT NULL,
  `mapLng` varchar(30) DEFAULT NULL,
  `sOpenTime` varchar(200) DEFAULT NULL,
  `sLink1` varchar(200) DEFAULT NULL,
  `sLink2` varchar(200) DEFAULT NULL,
  `sLink3` varchar(200) DEFAULT NULL,
  `sMainIMG_Name` varchar(100) DEFAULT NULL,
  `sMainIMG_Source` varchar(100) DEFAULT NULL,
  `sAddFieldKR` text DEFAULT NULL,
  `sAddFieldEN` text DEFAULT NULL,
  `sOrder` int(10) UNSIGNED DEFAULT NULL,
  `isUse` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isStamp` enum('Y','N') NOT NULL DEFAULT 'N',
  `isMajor` enum('Y','N') DEFAULT 'N',
  `regIP` varchar(50) NOT NULL,
  `regDate` datetime NOT NULL,
  `cat_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_store`
--

INSERT INTO `dsp_store` (`no`, `year`, `category`, `branchNo`, `storeCode`, `dcAmount`, `dcType`, `sNameKR`, `sNameEN`, `sDescKR`, `sDescEN`, `sAddr1KR`, `sAddr2KR`, `sAddr3KR`, `sAddr1EN`, `sAddr2EN`, `sAddr3EN`, `sContact`, `mapLat`, `mapLng`, `sOpenTime`, `sLink1`, `sLink2`, `sLink3`, `sMainIMG_Name`, `sMainIMG_Source`, `sAddFieldKR`, `sAddFieldEN`, `sOrder`, `isUse`, `isStamp`, `isMajor`, `regIP`, `regDate`, `cat_id`) VALUES
(1, NULL, 'mall', 1, 'DS10OFF', 10, '%', 'DDP 디자인 스토어', 'DDP Design Store', '서울의 디자인라이프스타일 플랫폼 \r\nDDP디자인스토어\r\n\r\n영업정보 : 오전 10시 ~ 오후 8시\r\n서울시 중구 을지로 281 어울림광장 (디자인랩 지하2층) \r\n02-2153-0632', 'Seoul’s Design Lifestyle Platform\r\nDDP Design Store\r\n\r\nBusiness Hours: 10:00 AM – 8:00 PM\r\nAddress: B2, Design Lab, Eulji-ro 281, Jung-gu, Seoul (Eoullim Plaza)\r\nPhone: 02-2153-0632', '서울 중구 을지로 281', '어울림 광장(디자인랩 지하2층) DDP디자인스토어', ' (을지로7가)', '281 Eulji-ro, Jung-gu, Seoul, Republic of Korea', 'Aewolim Plaza (Design Lab B2): DDP Design Store', ' (Euljiro 7(chil)-ga)', '82+2-2153-0225', '37.566357255319595', '127.00921365478935', 'Business Hours: 10:00 AM – 8:00 PM', 'https://www.ddpdesignstore.org/', '', '', 'designstore.jpg', '475a7227a56903a0f8f0b763001a6578.jpg', '[]', '[]', 1, 'Y', 'N', 'N', '210.120.40.117', '2025-11-25 14:06:20', NULL),
(3, NULL, 'fnb', 1, 'sooks10', 3000, '￦', '쑥스초코파이', 'Sooks Choco Pie', '합리적인 가격으로 누리는 고급 디저트\r\n쑥스초코파이 서울\r\n\r\n영업정보 : 월-목 오전 11시 ~ 오후 7시\r\n                   금~일 오전 10시 ~ 오후 8시\r\n서울 종로구 종로32길 25 1층\r\n종로5가역 7번 출구에서 115m\r\n0507-1386-0467', 'Premium Desserts at Reasonable Prices\r\nSooks Choco Pie Seoul\r\n\r\nBusiness Hours:\r\nMon–Thu: 11:00 AM – 7:00 PM\r\nFri–Sun: 10:00 AM – 8:00 PM\r\n\r\nAddress: 1F, 25 Jongno 32-gil, Jongno-gu, Seoul\r\n(115m from Jongno 5-ga Station, Exit 7)\r\nPhone: 0507-1386-0467', '서울 종로구 종로32길 25', '1층', ' (종로5가)', '25 Jong-ro 32-gil, Jongno-gu, Seoul, Republic of Korea', '1F', ' (Jongno 5(o)-ga)', '050-71386-0467', '37.569934558752365', '127.00146021905712', 'Business Hours:\r\nMon–Thu: 11:00 AM – 7:00 PM\r\nFri–Sun: 10:00 AM – 8:00 PM', 'https://smartstore.naver.com/ssuksch', 'sooks_bakery', '', '20240727091048147_photo_bf86c37766d1.jpg', 'ddaee374069f06a4728467db164f1c53.jpg', '[]', '[]', 2, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:04:32', NULL),
(4, NULL, 'mall', 1, 'DIKI10', 10, '%', '디키디키 디자인 놀이터', 'DiKi DiKi(Design Playground), Teteru Museum', '디키디키는 어린이가 오감체험과 디자인 예술을\r\n감각적인 놀이로 경험할 수 있는 DDP 디자인놀이터입니다.\r\n\r\n“디키디키 상상의 숲”으로 떠나는 디자인 모험 스토리로 누리교육과정과 다중지능이론을 바탕한 놀이아이템이 1,952m2(약 600평)에 펼쳐져 있습니다.\r\n어린이(만 24개월부터 8세까지)는 신나게 놀면서 다양한 감각과 창의력을 키울 수 있고, 보호자는 어린이 개개인의 놀이 흥미도와 디자인 감각 등을 스마트 디바이스로 트래킹 한 놀이리포팅 서비스를 제공받을 수 있습니다.\r\n시기에 따라 다양한 분야의 작가와 연계한 예술창작 프로그램과 디자인 워크숍, 놀이메이커스 플레이마켓 등에 참여하실 수 있으며 상세한 운영 프로그램은 홈페이지(https://www.dikidiki.co.kr/)에서 확인하실 수 있습니다.', 'Diki Diki is a DDP design playground for children to experience five senses and design art through sensuous plays.\r\n\r\nA play item based on the Nuri education course and multi-intelligence theory and the story of design adventure departing from “Diki Diki Imaginary Forest” are being presented on an area of 1,952m2 (Approx. 600 pyeong).\r\nChildren (24 months-8 years old) can develop various senses and creativity while playing, and guardians can get play reporting services tracked with a smart device regarding children’s individual play interest and design sense.\r\nChildren can participate in art creation programs in relation to artists from various fields, design workshops, and play makers\' play market by time. The details of operation programs can be checked via the homepage (https://www.dikidiki.co.kr/).', '서울 중구 을지로 281', '', ' (을지로7가)', '281 Eulji-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 7(chil)-ga)', '02-2153-0760', '37.56687980779608', '127.00953065297918', 'Tue ~ Sun  10:30AM ~ 6:30PM', 'https://www.dikidiki.co.kr/', '', '', 'design_play01.jpg', 'c46887ec48c05a338d5d1ab6e1af04c5.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:04:43', NULL),
(5, NULL, 'mall', 3, 'ho', 0, '%', '현대 아울렛 동대문', 'HYUNDAI OUTLETS DONGDAEMUN', '현대아울렛 동대문점은 \r\n‘익스플로어 더 서울 트렌드 엣 동대문’ 이라는 테마 아래\r\n내외국인 모두가 열광하는 서울의 트렌드를 큐레이션 합니다. \r\n\r\n현대적인 감각의 서울을 한 곳에서 체험할 수 있는 콘텐츠 큐레이션 공간, \'서울 에디션\'과 \r\n주변의 미래형 건축물, 전통 문화와 조화를 이루며 다국적 문화 어울림 콘텐츠가 펼쳐지는 도심 속 휴게공간에서 \r\n서울의 과거, 현재, 미래가 어우러지는 서울의 동시대적인 여정을 함께 떠나 보시기 바랍니다.\r\n\r\n현대아울렛 동대문점에서 나만의 서울을 찾아보세요!', 'Hyundai Outlets Dongdaemun is an iconic shopping destination \r\nin Dongdaemun, the mecca of shopping in Korea.\r\n\r\nSpanning 11 floors, this store features over 200 brands, ranging from\r\nfashion labels specializing in sports and outdoor wear to a variety of\r\ndining options that delight both the eyes and taste buds.\r\n\r\nYou’ll also find lifestyle brands that showcase Korean culture!\r\nEnjoy an urban shopping experience in Dongdaemun.', '서울 중구 장충단로13길 20', '', ' (을지로6가)', '20 Jangchungdan-ro 13-gil, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 6(yuk)-ga)', '02-2283-2233', '37.568734553218', '127.007666479829', 'Mon.-Thu. : 10:30am ~ 9pm\r\n\r\n/ Fri.-Sun. : 10:30am ~ 9:30pm', 'https://www.ehyundai.com/newPortal/outlet/DP/DP000000_V.do?branchCd=B00173000', '', '', 'KakaoTalk_20251219_160134339.png', 'e8013076a1c5bb355b9f912231f9845e.png', '[]', '[]', NULL, 'Y', 'N', 'N', '203.228.139.69', '2025-12-27 11:59:56', NULL),
(6, NULL, 'fnb', 5, 'tgd', 500, '￦', '태극당', 'taegeukdang', '중구 빵 인기 맛집\r\n시간을 품은 고풍스러운 빵의 향연\r\n\r\n단체석 / 유아의자 있음 / 채식 메뉴\r\n영업정보 : 21:00 까지, 연중무휴\r\n서울 중구 동호로24길 7 (우)04617\r\n3동대입구역 2번 출구에서 26m도보 1분\r\n02-2279-3152\r\n주차장없음 / 반려견동반 / 예약가능 / 포장가능 / 배달가능 \r\n주차 : 주차 공간 없음, 근처 장충공영주차장 및 장충체육관 부설 주차장 유료 이용 가능\r\n기타\r\n화장실 남녀분리, 매장 내 화장실', '중구 빵 인기 맛집\r\n시간을 품은 고풍스러운 빵의 향연\r\n\r\n단체석 / 유아의자 있음 / 채식 메뉴\r\n영업정보 : 21:00 까지, 연중무휴\r\n서울 중구 동호로24길 7 (우)04617\r\n3동대입구역 2번 출구에서 26m도보 1분\r\n02-2279-3152\r\n주차장없음 / 반려견동반 / 예약가능 / 포장가능 / 배달가능 \r\n주차 : 주차 공간 없음, 근처 장충공영주차장 및 장충체육관 부설 주차장 유료 이용 가능\r\n기타\r\n화장실 남녀분리, 매장 내 화장실', '서울 중구 동호로24길 7', '', ' (장충동2가)', '7 Dongho-ro 24-gil, Jung-gu, Seoul, Republic of Korea', '', ' (Jangchung-dong 2(i)-ga)', '02-2279-3152', '37.5595217348788', '127.005087759017', 'AM 08:00 - PM 09:00', 'http://www.taegeukdang.com/', '', '', '제목-없음-1.jpg', '00688e0c4978b8ad14a24eff5d562e7e.jpg', '[]', '[]', NULL, 'Y', 'N', 'Y', '210.120.40.117', '2025-11-06 14:05:10', NULL),
(7, NULL, 'lifestyle', 1, 'imtype', 0, NULL, '아임타입', 'I\'m Type', 'DDP 아임타입 브랜드 스토어 — ‘Self-discovery’를 콘셉트로 한 글로벌 뷰티 쇼룸.\r\nAI 피부 진단, 체험형 콘텐츠, 오렌지 컬러 포인트로 완성된 감각적 공간.\r\n\r\n영업정보 : 오전 10시 ~ 오후 7시\r\n서울 중구 을지로 281\r\nDDP Design Lab (1F), 동대문 DDP 쇼룸\r\n02-3445-2030', 'DDP I’M TYPE Brand Store\r\nA global beauty showroom with the concept of “Self-Discovery.”\r\nExperience AI skin analysis, interactive beauty content, and a sensorial space accented with vibrant orange tones. 🍊✨\r\n\r\nBusiness Hours: 10:00 AM – 7:00 PM\r\nAddress: DDP Design Lab (1F), 281 Eulji-ro, Jung-gu, Seoul\r\nDirections: Dongdaemun Design Plaza (DDP) Showroom\r\nPhone: 02-3445-2030', '서울 중구 을지로 281', 'DDP Design Lab(1F), 동대문 DDP 쇼룸', ' (을지로7가)', '281 Eulji-ro, Jung-gu, Seoul, Republic of Korea', 'DDP Design Lab(1F), Dongdaemun DDP 쇼룸', ' (Euljiro 7(chil)-ga)', '02-3445-2030', '37.566055411657466', '127.00934095569328', 'Business Hours: 10:00 AM – 7:00 PM', 'https://www.imtypeseoul.com/brand/offline', 'imtype_official', '', '아임타입 1.jpg', '80a038cb2c6e8abb7be9db0d9569863e.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:06:37', NULL),
(8, NULL, 'fnb', 1, 'shabu', 10, '%', '삼청동샤브', 'Samcheong-dong Shabu', '고기에 담긴 진심의 철학에 더해 \r\n보는 즐거움과 먹는 행복함이 있는 삼청동샤브\r\n\r\n 영업정보 : 오전 10시 30분 ~ 오후 9시 30분\r\n(8:30pm 라스트오더)\r\n서울 중구 을지로 281 B2층 C3호\r\n동대문역사문화공원역 1번 출구에서 365m\r\n0507-1434-1343\r\n', 'Samcheong-dong Shabu\r\nWhere the philosophy of sincerity in meat meets the joy of dining and the pleasure of watching. 🍲✨\r\n\r\nBusiness Hours: 10:30 AM – 9:30 PM\r\n(Last order at 8:30 PM)\r\nAddress: Unit C3, B2F, 281 Eulji-ro, Jung-gu, Seoul\r\nDirections: 365m from Exit 1 of Dongdaemun History & Culture Park Station\r\nPhone: 0507-1434-1343\r\n', '서울 중구 을지로 281', 'B2층 C3호', ' (을지로7가)', '281 Eulji-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 7(chil)-ga)', '0507-1434-1343', '37.567044231967124', '127.00962405642184', 'Business Hours: 10:30 AM – 9:30 PM\r\n(Last order at 8:30 PM)', '', '', '', '삼청동샤브 1.jpg', 'af0728e90e500001c9c8534b21961220.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:07:13', NULL),
(9, NULL, 'fnb', 1, 'kal', 10, '%', '청담이수육애칼국수', 'Chungdame Noodle Soup', '청담이만의 진한 멸치육수로\r\n자가제면한 국수면을 정성스럽게 조리하는 청이칼국수\r\n\r\n 영업정보 : 오전 10시 30분 ~ 오후 9시 30분\r\n(오후 8시 30분 라스트오더)\r\n서울 중구 을지로 281 B2층 D7호\r\n동대문역사문화공원역 1번 출구에서 365m\r\n0507-1420-0860\r\n', 'Cheongtami Kalguksu\r\nCheongtami Kalguksu is crafted with rich anchovy broth and freshly made noodles prepared with care. 🍜✨\r\n\r\nBusiness Hours: 10:30 AM – 9:30 PM\r\n(Last order at 8:30 PM)\r\nAddress: Unit D7, B2F, 281 Eulji-ro, Jung-gu, Seoul\r\nDirections: 365m from Exit 1 of Dongdaemun History & Culture Park Station\r\nPhone: 0507-1420-0860', '서울 중구 을지로 281', 'B2층 D7호', ' (을지로7가)', '281 Eulji-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 7(chil)-ga)', '0507-1420-0860', '37.56737305646054', '127.0100910132487', 'Business Hours: 10:30 AM – 9:30 PM\r\n(Last order at 8:30 PM)', '', '', '', '청담이수육애칼국수 1.jpg', '8d0d94ef6874774ecdc98b42447afb6f.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:07:42', NULL),
(10, NULL, 'fnb', 1, 'BB', 10, '%', '커피붕붕 커피볶는집', 'BB. COFFEE ROASTERS', '다양한 원두로 즐기는 맞춤형 커피\r\n커피붕붕 커피볶는집\r\n\r\n영업정보 : 오전 10시 ~ 오후 5시\r\n(월요일 유동적 휴무)\r\n서울 중구 을지로 281 B2층 C8호\r\n동대문역사문화공원역 1번 출구에서 26m\r\n010-8188-9096\r\n', 'Coffee BoongBoong – Coffee Roastery\r\nEnjoy personalized coffee made from a variety of freshly roasted beans. ☕✨\r\n\r\nBusiness Hours: 10:00 AM – 5:00 PM\r\n(Closed occasionally on Mondays)\r\nAddress: Unit C8, B2F, 281 Eulji-ro, Jung-gu, Seoul\r\nDirections: 26m from Exit 1 of Dongdaemun History & Culture Park Station\r\nPhone: 010-8188-9096', '서울 중구 을지로 281', 'B2층 C8호', ' (을지로7가)', '281 Eulji-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 7(chil)-ga)', '010-8188-9096', '37.56742038984358', '127.00972031756764', 'Business Hours: 10:00 AM – 5:00 PM\r\n(Closed occasionally on Mondays)', '', '', '', '커피붕붕 1.png', '5e0acc8a57fe69ac22d9463283c2dc58.png', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:08:13', NULL),
(11, NULL, 'fnb', 1, 'yeonnam', 10, '%', '연남방앗간', 'Yeonnambangagan', '지역 내 커뮤니티 공간인 방앗간을 \r\n현대적으로 재해석한 한국식 카페\r\n연남방앗간!\r\n\r\n영업정보 : 오전 10시 ~ 오후 6시 30분\r\n(오후 6시 라스트오더)\r\n서울 중구 을지로 281 디자인랩 2F 연남방앗간 다이닝 DDP\r\n동대문역사문화공원역 1번 출구에서 26m\r\n02-2153-0690\r\n\r\n', 'Yeonnam Bangatgan\r\nA modern reinterpretation of the traditional Korean “bangatgan” —\r\na community milling space reborn as a warm, contemporary café. 🫖✨\r\n\r\nBusiness Hours: 10:00 AM – 6:30 PM\r\n(Last order at 6:00 PM)\r\nAddress: Yeonnam Bangatgan Dining DDP, 2F Design Lab, 281 Eulji-ro, Jung-gu, Seoul\r\nDirections: 26m from Exit 1 of Dongdaemun History & Culture Park Station\r\nPhone: 02-2153-0690', '서울 중구 을지로 281', '디자인랩 2F 연남방앗간 다이닝 DDP', ' (을지로7가)', '281 Eulji-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 7(chil)-ga)', '02-2153-0690', '37.566113941583325', '127.00977108307838', 'Business Hours: 10:00 AM – 6:30 PM\r\n(Last order at 6:00 PM)', '', '', '', '연남방앗간 1.png', 'e358bdc49e152a9ee777b7749fb9d129.png', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:10:44', NULL),
(14, NULL, 'fnb', 5, 'special', 0, NULL, '동대문 별난오리', 'DDM Special Duck', '훈제오리의 풍미와 탕의 조화\r\n동대문 별난오리\r\n\r\n영업정보 : 오전 11시 ~ 오후 10시\r\n(오후 3~5시 브레이크타임)\r\n※ 토요일: 오전 11시 ~ 오후 9시 / 일요일 정기휴무\r\n서울 종로구 종로46길 12 2층 별난오리\r\n동대문역 7번 출구에서 77m\r\n02-765-5292', 'Dongdaemun Byulnan Duck\r\nA Perfect Harmony of Smoked Duck Flavor and Hearty Soup\r\n\r\nBusiness Hours: 11:00 AM – 10:00 PM\r\n(Break Time: 3:00 PM – 5:00 PM)\r\n※ Saturday: 11:00 AM – 9:00 PM / Closed on Sundays\r\n\r\n2F, 12 Jongno 46-gil, Jongno-gu, Seoul (Byulnan Duck)\r\n77m from Dongdaemun Station Exit 7\r\n📞 02-765-5292', '서울 종로구 종로46길 12', '2층 별난오리', ' (창신동)', '12 Jong-ro 46-gil, Jongno-gu, Seoul, Republic of Korea', '', ' (Changsin-dong)', '02-765-5292', '37.571065291522', '127.010600331834', 'Business Hours: 11:00 AM – 10:00 PM\r\n(Break Time: 3:00 PM – 5:00 PM)\r\n※ Saturday: 11:00 AM – 9:00 PM / Closed on Sundays', '', '', '', '별난오리 2.jpg', '5f5856453699cff051ea6023fcf5b162.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:12:17', NULL),
(15, NULL, 'fnb', 5, 'manjok', 0, NULL, '만족오향족발', 'Manjok Ohyang Jokbal Dongdaemun Branch', '신선한 재료와 맛, 이제는 국내뿐 아니라 중국과 일본에도 명소로 알려진\r\n동대문 맛집 만족오향족발\r\n \r\n영업정보 : 오후 3시 30분 ~ 오후 11시\r\n(오후 10시 20분 라스트오더)\r\n서울 중구 을지로43길 9-4 1~3층\r\n동대문역사문화공원역  13번 출구에서 도보로 2분 거리\r\n0507-1423-0880', 'Manjok Ohhyang Jokbal\r\nRenowned for Its Fresh Ingredients and Exceptional Flavor —\r\nNow a Famous Destination Not Only in Korea, but Also in China and Japan\r\n\r\nBusiness Hours: 3:30 PM – 11:00 PM\r\n(Last Order: 10:20 PM)\r\n\r\n1F–3F, 9-4 Eulji-ro 43-gil, Jung-gu, Seoul\r\nA 2-minute walk from Dongdaemun History & Culture Park Station Exit 13\r\n📞 0507-1423-0880', '서울 중구 을지로43길 9-4', '1~3층', ' (을지로6가)', '9-4 Eulji-ro 43-gil, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 6(yuk)-ga)', '', '37.5669108169207', '127.006691268228', 'Business Hours: 3:30 PM – 11:00 PM\r\n(Last Order: 10:20 PM)', '', '', '', '오향 2.jpg', 'd97820fa4cc10bc045ed0ef333a0c3f4.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:12:49', NULL),
(17, NULL, 'fnb', 5, 'doldol', 1000, '￦', '돌돌', 'Doldol Bakery', '우리 동네 작은 밀 공방 \r\n[돌돌: doldol]\r\n\r\n영업정보 : 오전 8시 ~ 오후 5시\r\n※토요일은 정기휴무\r\n서울 중구 퇴계로64길 7 1층\r\n동대문역사문화공원역 4번 출구에서 218m\r\n0507-1353-4422', 'Our Neighborhood’s Small Flour Workshop\r\n[Doldol]\r\n\r\nBusiness Hours: 8:00 AM – 5:00 PM\r\nClosed on Saturdays\r\n\r\nAddress: 1F, 7 Toegye-ro 64-gil, Jung-gu, Seoul\r\n(218m from Dongdaemun History & Culture Park Station, Exit 4)\r\nPhone: 0507-1353-4422', '서울 중구 퇴계로64길 7', '1층', ' (광희동2가)', '7 Toegye-ro 64-gil, Jung-gu, Seoul, Republic of Korea', '', ' (Gwanghui-dong 2(i)-ga)', '0507-1353-4422', '37.5638431692277', '127.008498914756', 'Business Hours: 8:00 AM – 5:00 PM\r\nClosed on Saturdays\r\n', '', '', '', '돌돌 1.jpg', 'ca8f29919d813a8dd112275f9a1f9813.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:14:25', NULL),
(18, NULL, 'fnb', 5, 'j', 0, NULL, '제이히든하우스', 'J.Hidden House', '조용한 공간에서의 차분한 대화 시간\r\n제이히든하우스\r\n\r\n영업정보 : 오후 12시 ~ 오후 6시\r\n※휴무는 인스타그램 공지 확인\r\n서울 종로구 종로 269-4\r\n동대문종합시장 & JW Marriot 건너길. \r\n흥인지문 사거리 동대문역 10번 출구 도보 1분\r\n02-744-1915', 'A Calm Conversation in a Quiet Space\r\nJ Hidden House\r\n\r\nBusiness Hours: 12:00 PM – 6:00 PM\r\nFor closing days, please check Instagram for updates.\r\n\r\nAddress: 269-4 Jongno, Jongno-gu, Seoul\r\n(Across from Dongdaemun General Market & JW Marriott; 1-minute walk from Exit 10 of Dongdaemun Station)\r\nPhone: 02-744-1915', '서울 종로구 종로 269-4', '', ' (종로6가)', '269-4 Jong-ro, Jongno-gu, Seoul, Republic of Korea', '', ' (Jongno 6(yuk)-ga)', '02-744-1915', '37.5714322035091', '127.007969220172', 'Business Hours: 12:00 PM – 6:00 PM\r\nFor closing days, please check Instagram for updates.', '', 'j.hiddenhouse', '', '제이히든하우스 1.jpg', '7b46e5121de66e4a253adbccf418a64a.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:14:54', NULL),
(19, NULL, 'fnb', 5, 'affair', 10, '%', '어페어커피', 'Affair Coffee', '시나몬 향 가득한 부드러운 라떼\r\n어페어커피\r\n\r\n영업정보 : 오전 8시 ~ 오후 8시\r\n(오후 7시 40분 라스트오더)\r\n서울 중구 장충단로 139-1 1층\r\n동대입구역 2번 출구에서 330m\r\n0507-1386-6707', 'A Smooth Latte with a Hint of Cinnamon\r\nAffair Coffee\r\n\r\nBusiness Hours: 8:00 AM – 8:00 PM\r\n(Last Order: 7:40 PM)\r\n\r\nAddress: 1F, 139-1 Jangchungdan-ro, Jung-gu, Seoul\r\n(330m from Dongguk University Station, Exit 2)\r\nPhone: 0507-1386-6707', '서울 중구 장충단로 193-1', '1층', ' (쌍림동)', '193-1 Jangchungdan-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Ssangnim-dong)', '0507-1386-6707', '37.5621395270466', '127.006217621351', 'Business Hours: 8:00 AM – 8:00 PM\r\n(Last Order: 7:40 PM)\r\n', 'http://www.affaircoffee.com', 'affaircoffee_', '스마트스토어: https://smartstore.naver.com/affaircoffee', '어페어커피 3.jpg', '8c92dea454983cb64cde0b8af7b2e690.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:15:35', NULL),
(20, NULL, 'fnb', 5, 'jean', 0, NULL, '장프리고', 'Jean Frigo', '과일로 완성되는 특별한 칵테일의 맛\r\n장프리고\r\n\r\n영업정보 : 오후 6시 ~ 오전 1시 30분\r\n(오전 1시 라스트오더)\r\n서울 중구 퇴계로62길 9-8 장프리고 냉장고 안\r\n동대문역사문화공원역 4번 출구에서 193m\r\n02-2275-1933', 'The Unique Taste of Fruit-Infused Cocktails\r\nJean Frigo\r\n\r\nBusiness Hours: 6:00 PM – 1:30 AM\r\n(Last Order: 1:00 AM)\r\n\r\nAddress: Inside the “Jean Frigo” refrigerator, 9-8 Toegye-ro 62-gil, Jung-gu, Seoul\r\n(193m from Dongdaemun History & Culture Park Station, Exit 4)\r\nPhone: 02-2275-1933', '서울 중구 퇴계로62길 9-8', '장프리고 냉장고 안', ' (광희동2가)', '9-8 Toegye-ro 62-gil, Jung-gu, Seoul, Republic of Korea', '', ' (Gwanghui-dong 2(i)-ga)', '02-2275-1933', '37.5636383084054', '127.008133301516', 'Business Hours: 6:00 PM – 1:30 AM\r\n(Last Order: 1:00 AM)\r\n', 'https://app.catchtable.co.kr/ct/shop/jeanfrigo', 'jeanfrigo_official', '', '장프리고 2.jpg', '5118c20eb9e001a9710f9f59516f1290.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:16:05', NULL),
(22, NULL, 'lifestyle', 5, 'mimi', 10, '%', '미미라인', 'MIMI LINE', '한국 최대 500평 규모의 악세사리, 화장품, 의류 전문점\r\n미미라인\r\n\r\n영업정보 : 오전 11시 ~ 오전 5시\r\n서울 중구 마장로 30 TEAM204 1, 2, 3, 4층\r\n신당역 10번 출구에서 348m\r\n0507-1379-4951', 'MIMILINE\r\nKorea’s largest 500-pyeong (approx. 1,650㎡) specialty store for accessories, cosmetics, and clothing. 💄👗✨\r\n\r\nBusiness Hours: 11:00 AM – 5:00 AM\r\nAddress: 1F–4F, TEAM204, 30 Majang-ro, Jung-gu, Seoul\r\nDirections: 348m from Exit 10 of Sindang Station\r\nPhone: 0507-1379-4951', '서울 중구 마장로 30', 'TEAM204 1, 2, 3, 4층', ' (신당동)', '30 Majang-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Sindang-dong)', '0507-1379-4951', '37.5677127859728', '127.013196592402', 'Business Hours: 11:00 AM – 5:00 AM', '', 'mimiline_official', '', 'o_1j94ck33hspjf5v1vc11vrf1accd.jpg', 'd5fe1c4645e033e609450f3b0b808b5d.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:17:17', NULL),
(23, NULL, 'lifestyle', 5, 'nyunyu', 5, '%', '뉴뉴', 'NYUNYU', '국내 최초 악세사리 SPA,\r\n뉴뉴\r\n\r\n영업정보 : 오전 11시 ~ 오전 5시\r\n서울 중구 마장로 34 1-3F\r\n신당역 10번 출구에서 313m\r\n0507-1309-9596', 'NYU NYU\r\nKorea’s first accessory SPA brand. ✨🛍️\r\n\r\nBusiness Hours: 11:00 AM – 5:00 AM\r\nAddress: 1F–3F, 34 Majang-ro, Jung-gu, Seoul\r\nDirections: 313m from Exit 10 of Sindang Station\r\nPhone: 0507-1309-9596', '서울 중구 마장로 34', '1-3F', ' (신당동)', '34 Majang-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Sindang-dong)', '0507-1309-9596', '37.5678050126796', '127.013508339585', 'Business Hours: 11:00 AM – 5:00 AM', '', 'nyunyu.official', '', 'o_1j94b7jd22dn174jchq1pp48ekc.png', '7c8aeb9767a5c3ac849d20fd85dacac0.png', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:17:43', NULL),
(24, NULL, 'lifestyle', 5, 'episode', 10, '%', '에피소드 언타이틀드', 'EPiSODE UNTITLED', '에피소드 언타이틀드\r\n\r\n영업정보 : 월-금 오후 7시 ~ 오전 3시\r\n일 오후 8시 ~ 오전 3시\r\n※ 토요일은 정기휴무\r\n서울 중구 마장로 3\r\n동대문역 7번 출구에서 216m', 'Episode Untitled\r\n\r\nBusiness Hours:\r\nMon–Fri: 7:00 PM – 3:00 AM\r\nSun: 8:00 PM – 3:00 AM\r\nClosed on Saturdays\r\n\r\nAddress: 3 Majang-ro, Jung-gu, Seoul\r\nDirections: 216m from Exit 7 of Dongdaemun Station', '서울 중구 마장로 3', '1층', ' (신당동)', '3 Majang-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Sindang-dong)', '', '37.5687984821779', '127.010543979771', 'Business Hours:\r\nMon–Fri: 7:00 PM – 3:00 AM\r\nSun: 8:00 PM – 3:00 AM\r\nClosed on Saturdays\r\n', '', '', '', NULL, NULL, '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:17:58', NULL),
(25, NULL, 'lifestyle', 5, 'ii', 20, '%', '아이아이 쥬얼리', 'II JEWELRY', 'II JEWELRY\r\n\r\n영업정보 : 월-금 오후 7시 ~ 오전 3시\r\n일 오후 8시 ~ 오전 3시\r\n※ 토요일은 정기휴무\r\n서울 중구 마장로 3\r\n동대문역 7번 출구에서 216m', 'II Jewelry\r\n\r\nBusiness Hours:\r\nMon–Fri: 7:00 PM – 3:00 AM\r\nSun: 8:00 PM – 3:00 AM\r\nClosed on Saturdays\r\n\r\nAddress: 3 Majang-ro, Jung-gu, Seoul\r\nDirections: 216m from Exit 7 of Dongdaemun Station', '서울 중구 마장로 3', '1층', ' (신당동)', '3 Majang-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Sindang-dong)', '', '37.5687984821779', '127.010543979771', 'Business Hours:\r\nMon–Fri: 7:00 PM – 3:00 AM\r\nSun: 8:00 PM – 3:00 AM\r\nClosed on Saturdays', '', '', '', NULL, NULL, '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:18:08', NULL),
(26, NULL, 'lifestyle', 5, 'baro', 10, '%', '바로코', 'BAROCO', '바로코\r\n\r\n영업정보 : 오전 10시 ~ 오후 6시\r\n서울 창경궁로 88, 235 1층\r\n동대문역 7번 출구에서 216m', 'Baroco\r\n\r\nBusiness Hours: 10:00 AM – 6:00 PM\r\nAddress: 1F, 235, 88 Changgyeonggung-ro, Seoul\r\nDirections: 216m from Exit 7 of Dongdaemun Station', '서울 종로구 창경궁로 88', '235 1층', ' (예지동)', '88 Changgyeonggung-ro, Jongno-gu, Seoul, Republic of Korea', '', ' (Yeji -dong)', '', '37.5701196320637', '126.999798964693', 'Business Hours: 10:00 AM – 6:00 PM', '', '', '', NULL, NULL, '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:18:20', NULL),
(27, NULL, 'lifestyle', 5, 'nail', 0, NULL, '네일몰', 'Nail Mall Dongdaemun', '젤, 파츠, 글리터 등 \r\n셀프네일을 위한 모든 재료가 다 있는\r\n네일몰\r\n\r\n영업정보 : 화-토 오전 10시 ~ 오전 2시\r\n일-월 오전 10시 ~ 오후 9시\r\n서울 중구 장충단로 263 밀리오레(업무동) 16층 1~4호\r\n동대문역사문화공원역 14번 출구에서 201m', 'Nail Mall\r\nEverything you need for self-nail art — gels, parts, glitters, and more! 💅✨\r\n\r\nBusiness Hours:\r\nTue–Sat: 10:00 AM – 2:00 AM\r\nSun–Mon: 10:00 AM – 9:00 PM\r\n\r\nAddress: Units 1–4, 16F, Migliore (Business Building), 263 Jangchungdan-ro, Jung-gu, Seoul\r\nDirections: 201m from Exit 14 of Dongdaemun History & Culture Park Station', '서울 중구 장충단로 263', '밀리오레(업무동) 16층 1~4', ' (을지로6가)', '263 Jangchungdan-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 6(yuk)-ga)', '', '37.5681156942942', '127.008472686741', 'Business Hours:\r\nTue–Sat: 10:00 AM – 2:00 AM\r\nSun–Mon: 10:00 AM – 9:00 PM\r\n', 'https://www.nailmall.net/', 'nailmall_official', '', '네일몰 2.jpg', '182da2e6ebb05480e8ae881552b66d88.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:18:58', NULL),
(28, NULL, 'lifestyle', 5, 'signature', 0, NULL, '시그니처짐', 'Signature Gym', '동대문 유일 800평대 연중무휴 프리미엄 피트니스\r\n시그니처\r\n\r\n영업정보 : 화-금 24시간 영업\r\n(토 오후 10시 마감 / 일  오전 10시 ~ 오후 10시 / 월 오전 10시 오픈) \r\n서울 중구 장충단로 253 헬로우APM 8층\r\n동대문역사문화공원역 14번 출구에서 116m\r\n0507-1498-9688', 'Signature Fitness\r\nDongdaemun’s only premium 800-pyeong (approx. 2,640㎡) gym, open year-round. 💪🏋️\r\n\r\nBusiness Hours:\r\nTue–Fri: Open 24 hours\r\nSat: Closes at 10:00 PM\r\nSun: 10:00 AM – 10:00 PM\r\nMon: Opens at 10:00 AM\r\n\r\nAddress: 8F, Hello APM, 253 Jangchungdan-ro, Jung-gu, Seoul\r\nDirections: 116m from Exit 14 of Dongdaemun History & Culture Park Station\r\nPhone: 0507-1498-9688', '서울 중구 장충단로 253', '헬로우APM 8층', ' (을지로6가)', '253 Jangchungdan-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 6(yuk)-ga)', '0507-1498-9688', '37.567487097159', '127.008078935255', 'Business Hours:\r\nTue–Fri: Open 24 hours\r\nSat: Closes at 10:00 PM\r\nSun: 10:00 AM – 10:00 PM\r\nMon: Opens at 10:00 AM', 'https://blog.naver.com/signituregym', 'signaturegym_1', '', 'o_1j949i3uc1jq81mem1m0v17lti97c.jpg', 'da726fa74bb1cda9c457c1b12f7acc65.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:19:41', NULL),
(30, NULL, 'accomodation', 5, 'migliore', 0, NULL, '호텔밀리오레', 'Migliore Hotel', '대한민국 서울의 중심, 관광 쇼핑의 메카 동대문에 위치한\r\n호텔밀리오레\r\n\r\n영업정보 : 24시간 영업\r\n서울 중구 장충단로 263 밀리오레 동대문 14층\r\n동대문역사문화공원역 14번 출구에서 201m\r\n02-3393-6500', 'Hotel Migliore\r\nLocated in Dongdaemun — the heart of Seoul, Korea, and a mecca for tourism and shopping. 🏨🛍️\r\n\r\nBusiness Hours: Open 24 hours\r\nAddress: 14F, Migliore Dongdaemun, 263 Jangchungdan-ro, Jung-gu, Seoul\r\nDirections: 201m from Exit 14 of Dongdaemun History & Culture Park Station\r\nPhone: 02-3393-6500', '서울 중구 장충단로 263', '밀리오레 동대문 14층', ' (을지로6가)', '263 Jangchungdan-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 6(yuk)-ga)', '02-3393-6500', '37.5681156942942', '127.008472686741', 'Business Hours: Open 24 hours', 'http://www.hotelmigliore.com/homepage/ENG/index/index', '', '', '호텔밀리오레 1.png', '8a86592e8b4a50540a0574d4ac564da9.png', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:20:46', NULL),
(31, NULL, 'accomodation', 5, 'original', 10, '%', '오리지날백패커스', 'Original Backpackers', '지하철 1호선과 4호선이 만나는 동대문역에서 도보 1분 거리에 위치하여\r\n서울의 다양한 관광지로 이동하기 매우 편리한 \r\n오리지날백패커스\r\n\r\n영업정보 : 24시간 영업\r\n서울 종로구 종로 313-3 3-5F\r\n동대문역 3번 출구에서 80m\r\n02-742-4599', 'Original Backpackers\r\nConveniently located just a 1-minute walk from Dongdaemun Station,\r\nwhere Subway Lines 1 and 4 intersect —\r\nperfect for exploring various attractions across Seoul. 🎒🏙️\r\n\r\nBusiness Hours: Open 24 hours\r\nAddress: 3F–5F, 313-3 Jongno, Jongno-gu, Seoul\r\nDirections: 80m from Exit 3 of Dongdaemun Station\r\nPhone: 02-742-4599', '서울 종로구 종로 313-3', '3-5F', ' (창신동)', '313-3 Jong-ro, Jongno-gu, Seoul, Republic of Korea', '', ' (Changsin-dong)', '02-742-4599', '37.572439660281', '127.012533740287', 'Business Hours: Open 24 hours\r\n', 'https://www.booking.com/Share-PVoC0H7', 'original_backpackers', '', '오리지날백패커스 2.jpg', 'f7f9c8e68fe0ea91990ce8e83f0c14b3.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:21:17', NULL),
(32, NULL, 'fnb', 5, 'gaeppul', 10, '%', '개뿔', 'Gaeppul', '이화마을의 정취를 마시는 특별한 시간\r\n갤러리카페, \r\n개뿔\r\n\r\n영업정보 : 오전 10시 ~ 오후 11시\r\n서울 종로구 낙산성곽서 1길 26 카페 개뿔 1,2층\r\n동대문역 1번 출구에서 903m\r\n02-765-2019', 'Gaebbul Gallery Café\r\nA special moment to savor the charm of Ihwa Village. 🎨☕\r\n\r\nBusiness Hours: 10:00 AM – 11:00 PM\r\nAddress: 1F–2F, Café Gaebbul, 26 Naksanseonggwakseo 1-gil, Jongno-gu, Seoul\r\nDirections: 903m from Exit 1 of Dongdaemun Station\r\nPhone: 02-765-2019', '서울 종로구 낙산성곽서1길 26', '까페 개뿔 1,2층', ' (이화동)', '26 Naksanseonggwakseo 1-gil, Jongno-gu, Seoul, Republic of Korea', '', ' (Ihwa-dong)', '02-765-2019', '37.5781776751424', '127.008046580681', 'Business Hours: 10:00 AM – 11:00 PM', '', 'https://www.instagram.com/cafe.gaeppul/', '', '개뿔 2.jpg', '0accaead6c42c6a290d11f538ae4f7d8.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:21:49', NULL),
(33, NULL, 'fnb', 5, 'baeogae', 10, '%', '배오개 베이커리', 'Baeogae Bakery', '낙산성곽에 위치한 남산, 종로 도심뷰\r\n배오개 베이커리\r\n\r\n영업정보 : 오전 10시 ~ 오후 9시\r\n서울 종로구 낙산성곽서 1길 18-26 1층, 2층 배오개 베이커리\r\n동대문역 1번 출구에서 879m\r\n0507-1489-2020', 'Baeogae Bakery\r\nLocated along the Naksan Fortress Wall, offering stunning city views of Namsan and Jongno. 🏙️🥐\r\n\r\nBusiness Hours: 10:00 AM – 9:00 PM\r\nAddress: 1F–2F, Baeogae Bakery, 18-26 Naksanseonggwakseo 1-gil, Jongno-gu, Seoul\r\nDirections: 879m from Exit 1 of Dongdaemun Station\r\nPhone: 0507-1489-2020', '서울 종로구 낙산성곽서1길 18-26', '1층, 2층 배오개 베이커리', ' (이화동)', '18-26 Naksanseonggwakseo 1-gil, Jongno-gu, Seoul, Republic of Korea', '', ' (Ihwa-dong)', '0507-1489-2020', '37.5779851269085', '127.008130899519', 'Business Hours: 10:00 AM – 9:00 PM', '', '', '', '배오개 베이커리 2.jpg', 'ebcff66f7aff52e5bc21b9b63599e01c.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:22:16', NULL),
(34, NULL, 'fnb', 5, 'mibut', 10, '%', '미벗', 'MIBUT', '쫀득한 떡케이크의 달콤한 유혹\r\n미벗\r\n\r\n영업정보 : 화-토 오전 7시 ~ 오후 10시\r\n(오후 9시 55분 라스트오더)\r\n일 오전 7시 ~ 오후 6시\r\n(오후 5시 55분 라스트오더)\r\n※ 월요일 정기휴무\r\n\r\n서울 종로구 창신6길 7 1층\r\n동대문역 1번 출구에서 442m\r\n0507-1464-5591', 'MIBUT\r\nThe sweet temptation of chewy rice cakes. 🍡✨\r\n\r\nBusiness Hours:\r\nTue–Sat: 7:00 AM – 10:00 PM\r\n(Last order at 9:55 PM)\r\nSun: 7:00 AM – 6:00 PM\r\n(Last order at 5:55 PM)\r\nClosed on Mondays\r\n\r\nAddress: 1F, 7 Changsin 6-gil, Jongno-gu, Seoul\r\nDirections: 442m from Exit 1 of Dongdaemun Station\r\nPhone: 0507-1464-5591', '서울 종로구 창신6길 7', '1층', ' (창신동)', '7 Changsin 6-gil, Jongno-gu, Seoul, Republic of Korea', '', ' (Changsin-dong)', '0507-1464-5591', '37.575052691395', '127.011072727214', 'Business Hours:\r\nTue–Sat: 7:00 AM – 10:00 PM\r\n(Last order at 9:55 PM)\r\nSun: 7:00 AM – 6:00 PM\r\n(Last order at 5:55 PM)\r\nClosed on Mondays\r\n', '', 'https://www.instagram.com/mebut_cafe', '', '미벗 1.jpg', 'f907860695779021894c0e6b2f3414f5.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:22:49', NULL),
(35, NULL, 'fnb', 5, '2moon', 10, '%', '2Moon 이문 카페펍', '2Moon Cafe Pub', '이색적인 체험으로  채우는 특별한 시간\r\n2Moon 이문 카페펍\r\n\r\n영업정보 : 화-목, 토-일 오전 12시 ~ 오후 11시\r\n(오후 10시 15분 라스트오더)\r\n금 오전 12시 ~ 오후 12시\r\n(오후 11시 15분 라스트오더)\r\n월 오후 3시 ~ 오후 11시\r\n(오후 10시 15분 라스트오더)\r\n\r\n서울 종로구 창신1길 12 창신아지트 3층\r\n동대문역 2번 출구에서 58m\r\n0507-1359-7885', '2Moon Café & Pub (Imun Branch)\r\nSpend a special time filled with unique and memorable experiences. 🌙🍸\r\n\r\nBusiness Hours:\r\nTue–Thu, Sat–Sun: 12:00 PM – 11:00 PM\r\n(Last order at 10:15 PM)\r\nFri: 12:00 PM – 12:00 AM\r\n(Last order at 11:15 PM)\r\nMon: 3:00 PM – 11:00 PM\r\n(Last order at 10:15 PM)\r\n\r\nAddress: 3F, Changsin Agit, 12 Changsin 1-gil, Jongno-gu, Seoul\r\nDirections: 58m from Exit 2 of Dongdaemun Station\r\nPhone: 0507-1359-7885', '서울 종로구 창신1길 12', '창신아지트 3층', ' (창신동)', '12 Changsin 1-gil, Jongno-gu, Seoul, Republic of Korea', '', ' (Changsin-dong)', '0507-1359-7885', '37.5722476774796', '127.011457640549', 'Business Hours:\r\nTue–Thu, Sat–Sun: 12:00 PM – 11:00 PM\r\n(Last order at 10:15 PM)\r\nFri: 12:00 PM – 12:00 AM\r\n(Last order at 11:15 PM)\r\nMon: 3:00 PM – 11:00 PM\r\n(Last order at 10:15 PM)\r\n', 'https://blog.naver.com/2mooncoffee', 'https://www.instagram.com/2moon_cafepub', '', '이문카페 1.png', '1092826580fe7746f52228c9876bbd87.png', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:23:38', NULL),
(36, NULL, 'fnb', 5, 'tete', 50, '%', '티이티이', 'TETE Cafe', '책이 잘 읽히는 \r\n낙산공원 위, 숨어 있는 작은 아지트 \r\n티이티이(TETE)\r\n\r\n영업정보 : 금-월 오후 2시 ~ 오후 10시\r\n수-목 오후 2시 ~ 오후 8시\r\n※ 화요일은 정기휴무\r\n서울 종로구 충신4나길 1 202호\r\n동대문역 1번 출구에서 667m\r\n0507-0178-8646', 'TETE\r\nA cozy hidden spot above Naksan Park — perfect for reading and relaxing. 📚☕\r\n\r\nBusiness Hours:\r\nFri–Mon: 2:00 PM – 10:00 PM\r\nWed–Thu: 2:00 PM – 8:00 PM\r\nClosed on Tuesdays\r\nAddress: Unit 202, 1 Chungsin 4na-gil, Jongno-gu, Seoul\r\nDirections: 667m from Exit 1 of Dongdaemun Station\r\nPhone: 0507-0178-8646', '서울 종로구 충신4나길 1', '202호', ' (충신동)', '1 Chungsin 4na-gil, Jongno-gu, Seoul, Republic of Korea', '', ' (Chungsin-dong)', '0507-0178-8646', '37.5758539364862', '127.007810526211', 'Business Hours:\r\nFri–Mon: 2:00 PM – 10:00 PM\r\nWed–Thu: 2:00 PM – 8:00 PM\r\nClosed on Tuesdays', '', 'https://www.instagram.com/tete_drop', '', '티이티이 1.jpg', '8423ab6609caf630a7ef317b5eef4d5d.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:24:42', NULL),
(37, NULL, 'fnb', 5, 'apple', 0, NULL, '사운즈오브애플', 'Sounds of Apple', '신선한 재료로 만든 브런치의 즐거움\r\n사운즈오브애플\r\n\r\n영업정보 : 오전 7시 30분 ~ 오후 4시\r\n서울 중구 명동8가길 47 1층\r\n명동역 10번 출구에서 95m\r\n070-8833-5790', 'Sounds of Apple\r\nThe joy of brunch made with fresh ingredients. 🍎🥞\r\n\r\nBusiness Hours: 7:30 AM – 4:00 PM\r\nAddress: 1F, 47 Myeongdong 8ga-gil, Jung-gu, Seoul\r\nDirections: 95m from Exit 10 of Myeongdong Station\r\nPhone: 070-8833-5790', '서울 중구 명동8가길 47', '1층', ' (충무로2가)', '47 Myeongdong 8ga-gil, Jung-gu, Seoul, Republic of Korea', '', ' (Chungmuro 2(i)-ga)', '070-8833-5790', '37.5619544329506', '126.987672198937', 'Business Hours: 7:30 AM – 4:00 PM', '', 'soundsofapple)official', '', '사운즈오브애플 1.jpg', '6fd8f627d007afe3efa463b1336de823.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:25:16', NULL),
(38, NULL, 'fnb', 5, 'mirei', 0, NULL, '미레이', 'Mirei Cafe', '특별한 디저트와 함께하는 행복한 순간\r\n미레이 카페\r\n\r\n영업정보 : 오후 12시 ~ 오후 7시\r\n(오후 6시 30분 라스트오더)\r\n서울 중구 소공로6길 13 비탈길 1층\r\n명동역 4번 출구에서 362m', 'Mireille Café\r\nHappy moments shared with special desserts. ☕🍰\r\n\r\nBusiness Hours: 12:00 PM – 7:00 PM\r\n(Last order at 6:30 PM)\r\nAddress: 1F, 13 Sogong-ro 6-gil, Jung-gu, Seoul\r\nDirections: 362m from Exit 4 of Myeongdong Station', '서울 중구 소공로6길 13', '비탈길 1층', ' (회현동2가)', '13 Sogong-ro 6-gil, Jung-gu, Seoul, Republic of Korea', '', ' (Hoehyeon-dong 2(i)-ga)', '', '37.5586222487339', '126.98372667822', 'Business Hours: 12:00 PM – 7:00 PM\r\n(Last order at 6:30 PM)', '', 'https://www.instagram.com/mirei_seoul', '', '미레이 1.jpg', 'bbb78c15f30e9e79fc55e2795b5879af.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:25:53', NULL),
(39, NULL, 'fnb', 5, 'let', 0, NULL, '렛잇비 광화문', 'LET EAT BE Bakery', '비틀즈의 Let It Be에서 영감을 받은 \r\n타르트 전문 브랜드, LET EAT BE\r\n\r\n영업정보 : 오전 7시 ~ 오후 7시\r\n서울 종로구 새문안로3길 30 지하1층 113호\r\n광화문역 1번 출구에서 152m\r\n070-4101-0009', 'LET EAT BE\r\nA tart specialty brand inspired by The Beatles’ “Let It Be.”\r\n\r\nBusiness Hours: 7:00 AM – 7:00 PM\r\nAddress: Unit 113, B1, 30 Saemunan-ro 3-gil, Jongno-gu, Seoul\r\nDirections: 152m from Exit 1 of Gwanghwamun Station\r\nPhone: 070-4101-0009', '서울 종로구 새문안로3길 30', '지하1층 113호', ' (내수동)', '30 Saemunan-ro 3-gil, Jongno-gu, Seoul, Republic of Korea', '', ' (Naesu-dong)', '070-4101-0009', '37.5727371532245', '126.973281404951', 'Business Hours: 7:00 AM – 7:00 PM', 'http://www.leteatbe.co.kr/', '', '', '렛잇비 1.jpg', '6a35e5b3a5eaa42c1a41e7d4e94d96db.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:26:28', NULL),
(40, NULL, 'fnb', 5, 'bekind', 10, '%', '비카인드반미', 'Bekind banh mi', '매콤한 스파이시 치킨의 중독성\r\n비카인드반미\r\n\r\n영업정보 : 월-토 오전 11시 ~ 오후 8시\r\n일 오전 11시 ~ 오후 5시\r\n서울 중구 충무로 29 1층 113호\r\n을지로3가역 9번 출구에서 152m\r\n0507-1304-7928', 'Bekind banh mi\r\nThe addictive taste of spicy chicken! 🌶️\r\n\r\nBusiness Hours:\r\nMon–Sat: 11:00 AM – 8:00 PM\r\nSun: 11:00 AM – 5:00 PM\r\nAddress: Unit 113, 1F, 29 Chungmuro, Jung-gu, Seoul\r\nDirections: 152m from Exit 9 of Euljiro 3-ga Station\r\nPhone: 0507-1304-7928', '서울 중구 충무로 29', '1층 113호', ' (초동)', '29 Chungmu-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Cho-dong)', '0507-1304-7928', '37.563836750265', '126.992508328619', 'Business Hours:\r\nMon–Sat: 11:00 AM – 8:00 PM\r\nSun: 11:00 AM – 5:00 PM', 'https://blog.naver.com/bekindguys', '', '', '비카인드반미 1.jpg', '9b7cb11ad5131f7a1ba1daa6f2e54e63.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-12-23 15:06:36', NULL),
(41, NULL, 'accomodation', 5, 'luggage', 5000, '￦', '러기지레스', 'LuggageLess(러기지레스)', '항공사 체크인 및 수하물 위탁을 간편하게 처리할 수 있는\r\n러기지레스 명동점\r\n\r\n영업정보 : 오전 9시 ~ 오후 9시\r\n서울 중구 명동8가길 41 1층\r\n명동역 10번 출구에서 107m\r\n0507-1399-1096', 'Luggageless Myeongdong Branch\r\nEasily handle airline check-in and baggage drop-off services.\r\n\r\nBusiness Hours: 9:00 AM – 9:00 PM\r\nAddress: 1F, 41 Myeongdong 8ga-gil, Jung-gu, Seoul\r\nDirections: 107m from Exit 10 of Myeongdong Station\r\nPhone: 0507-1399-1096', '서울 중구 명동8가길 41', '1층', ' (명동2가)', '41 Myeongdong 8ga-gil, Jung-gu, Seoul, Republic of Korea', '', ' (Myeong-dong 2(i)-ga)', '0507-1399-1096', '37.5619446631446', '126.987303789278', 'Business Hours: 9:00 AM – 9:00 PM', 'https://www.lotteglogisplus.com/pr/easydrop', 'lotteglogis.official', '', '러기지레스 1.jpg', '4bf8101ab006d56be472fd5bcacc5ee4.jpg', '[]', '[]', NULL, 'Y', 'N', 'N', '210.120.40.117', '2025-11-06 14:27:23', NULL),
(42, NULL, 'mall', 2, 'doota', 0, '%', '두타몰', 'Doota Mall', '두타몰은 동대문 랜드마크 쇼핑몰로 다양한 브랜드의 패션, 뷰티, 라이프스타일, F&B까지 원스톱으로 즐길 수 있는 복합 쇼핑 공간입니다.\r\n특히, 유명 스포츠 브랜드, 트렌디한 로컬 패션  매장, 팝업 행사들이 많아 국내외 젊은 세대 고객들에게 인기가 높습니다.\r\n더불어 각 층 별로 다양한 카페 및 푸드코트를 운영하고 있어 쇼핑 중간 편하게 휴식을 즐길 수 있습니다.\r\n시내 복합 쇼핑몰 중 유일하게 밤 12시까지 영업하며, 멤버십 회원 및 외래관광객을 위한 심야 할인 및 다양한 쇼핑 혜택을 제공하고 있습니다.', 'Doota Mall is a must-visit shopping destination that represents Dongdaemun - the center of K-fashion and culture in Seoul!\r\nDoota offers a true one-stop shopping experience across fashion, beauty, lifestyle, and dining - from K-designers, sportswear, women and men\'s apparel to a wide variety of cafes and restaurents.\r\nOpen until midnight, Doota welcomes intenational travelers with special gifts and exclusive benefits.', '서울 중구 장충단로 275', '', ' (을지로6가)', '275 Jangchungdan-ro, Jung-gu, Seoul, Republic of Korea', '', ' (Euljiro 6(yuk)-ga)', '02-3398-3333', '37.5688849422849', '127.008775114213', 'AM 10:30 - AM 00:00 (Midnight)', 'https://www/doota-mall.com/', 'doota_official', '', '일반비_두타몰전경_1200x1200px.jpg', '148f3222fbcf4ded5e3db499db4459a3.jpg', '[[\"\\ub450\\ud0c0\\ubab0\",\"\\ub450\\ud0c0\\ubab0\"]]', '[]', NULL, 'Y', 'N', 'N', '203.226.142.21', '2026-01-15 13:00:00', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_store_category`
--

CREATE TABLE `dsp_store_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `name_kr` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `icon_img` varchar(120) DEFAULT NULL,
  `color_hex` varchar(7) DEFAULT NULL,
  `is_use` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sort_order` int(10) UNSIGNED DEFAULT NULL,
  `reg_ip` varchar(50) NOT NULL,
  `reg_date` datetime NOT NULL,
  `upd_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_store_category`
--

INSERT INTO `dsp_store_category` (`cat_id`, `code`, `name_kr`, `name_en`, `icon_img`, `color_hex`, `is_use`, `sort_order`, `reg_ip`, `reg_date`, `upd_date`) VALUES
(3, 'fnb', 'F&B', 'F&B', '4506c671e69507d62005796f14309860.png', '#4b927c', 'Y', 1, '192.168.0.1', '2025-10-04 03:36:51', '2025-11-06 11:18:14'),
(5, 'mall', 'Complex Mall', 'Complex Mall', '86b76d41f2335cff8c7c48f0b4cd811d.png', '#f2f096', 'Y', 2, '192.168.0.1', '2025-10-04 03:42:36', '2025-11-06 14:04:01'),
(6, 'lifestyle', 'Fashion &            Beauty', 'Fashion &            Beauty', '8507be0005174f4ec99696e364355944.png', '#d37961', 'Y', 3, '192.168.0.1', '2025-10-04 03:43:04', '2025-11-06 11:17:59'),
(9, 'accomodation', 'Hotels &              Traveler svc.', 'Hotels &              Traveler svc.', 'cd9a99699e840931e691f9d06a450320.png', '#b9344c', 'Y', 4, '192.168.0.1', '2025-10-04 03:44:02', '2025-11-06 11:18:07');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_store_click_log`
--

CREATE TABLE `dsp_store_click_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `mem_id` int(10) UNSIGNED NOT NULL,
  `store_no` int(10) UNSIGNED NOT NULL,
  `clicked_at` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(45) DEFAULT NULL,
  `ua` varchar(255) DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_store_click_log`
--

INSERT INTO `dsp_store_click_log` (`id`, `mem_id`, `store_no`, `clicked_at`, `ip`, `ua`, `referer`) VALUES
(1, 1, 39, '2025-11-07 15:40:16', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(2, 1, 16, '2025-11-07 15:46:44', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(3, 1, 40, '2025-11-07 15:52:07', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(4, 1, 39, '2025-11-07 15:52:10', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(5, 1, 28, '2025-11-07 15:52:21', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(6, 1, 25, '2025-11-07 16:12:10', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(7, 1, 29, '2025-11-07 16:12:15', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(8, 1, 29, '2025-11-07 16:12:15', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(9, 1, 40, '2025-11-07 17:22:49', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(10, 1, 40, '2025-11-07 17:24:18', '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(11, 1, 40, '2025-11-07 17:24:18', '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(12, 11, 1, '2025-11-07 17:24:41', '39.7.231.172', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(13, 11, 1, '2025-11-07 17:24:42', '39.7.231.172', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(14, 1, 40, '2025-11-07 17:31:27', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(15, 1, 40, '2025-11-07 17:31:27', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(16, 1, 40, '2025-11-07 17:31:52', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(17, 1, 40, '2025-11-07 17:31:52', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(18, 1, 40, '2025-11-07 17:32:33', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(19, 1, 40, '2025-11-07 17:32:33', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(20, 1, 21, '2025-11-07 17:32:48', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(21, 1, 21, '2025-11-07 17:32:48', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(22, 1, 3, '2025-11-07 17:32:50', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(23, 1, 3, '2025-11-07 17:32:50', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(24, 1, 40, '2025-11-10 10:00:24', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(25, 1, 40, '2025-11-10 10:00:25', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(26, 1, 26, '2025-11-10 10:28:24', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(27, 1, 26, '2025-11-10 10:28:25', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(28, 1, 26, '2025-11-10 11:01:11', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(29, 1, 26, '2025-11-10 11:01:11', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(30, 1, 3, '2025-11-10 11:02:24', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(31, 1, 3, '2025-11-10 11:02:24', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(32, 1, 3, '2025-11-10 11:11:39', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(33, 1, 3, '2025-11-10 11:11:40', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(34, 1, 26, '2025-11-10 11:18:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(35, 1, 26, '2025-11-10 11:18:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(36, 1, 40, '2025-11-10 11:18:47', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(37, 1, 40, '2025-11-10 11:18:47', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(38, 1, 3, '2025-11-10 11:18:57', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(39, 1, 3, '2025-11-10 11:18:57', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(40, 11, 40, '2025-11-10 13:29:06', '210.120.40.117', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(41, 11, 40, '2025-11-10 13:29:06', '210.120.40.117', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(42, 11, 40, '2025-11-10 13:33:46', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(43, 11, 40, '2025-11-10 13:33:46', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(44, 11, 40, '2025-11-10 13:41:38', '210.120.40.117', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(45, 11, 40, '2025-11-10 13:41:38', '210.120.40.117', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(46, 11, 40, '2025-11-10 15:32:29', '210.120.40.117', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(47, 11, 40, '2025-11-10 15:32:29', '210.120.40.117', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(48, 11, 40, '2025-11-10 15:43:43', '210.120.40.117', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(49, 11, 40, '2025-11-10 15:43:43', '210.120.40.117', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(50, 7, 1, '2025-11-17 10:42:59', '39.7.231.74', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(51, 7, 1, '2025-11-17 10:42:59', '39.7.231.74', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(52, 7, 8, '2025-11-17 10:48:30', '39.7.231.40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(53, 7, 8, '2025-11-17 10:48:30', '39.7.231.40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(54, 7, 5, '2025-11-17 10:48:34', '39.7.231.40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(55, 7, 5, '2025-11-17 10:48:34', '39.7.231.40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(56, 1, 40, '2025-11-17 10:48:48', '210.120.40.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(57, 1, 40, '2025-11-17 10:48:49', '210.120.40.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(58, 1, 40, '2025-11-17 10:48:53', '210.120.40.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(59, 1, 40, '2025-11-17 10:48:53', '210.120.40.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(60, 7, 15, '2025-11-17 10:49:08', '39.7.231.40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(61, 7, 15, '2025-11-17 10:49:09', '39.7.231.40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(62, 7, 40, '2025-11-17 10:51:38', '39.7.231.40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(63, 7, 40, '2025-11-17 10:51:38', '39.7.231.40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(64, 8, 40, '2025-11-18 08:50:26', '211.234.227.194', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(65, 8, 40, '2025-11-18 08:50:26', '211.234.227.194', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(66, 8, 28, '2025-11-18 09:55:31', '211.234.226.174', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(67, 8, 28, '2025-11-18 09:55:31', '211.234.226.174', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(68, 1, 6, '2025-11-18 10:09:59', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(69, 1, 6, '2025-11-18 10:09:59', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(70, 7, 40, '2025-11-18 10:12:26', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(71, 7, 40, '2025-11-18 10:12:26', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(72, 7, 40, '2025-11-18 10:12:36', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(73, 7, 40, '2025-11-18 10:12:36', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(74, 7, 40, '2025-11-18 10:12:37', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(75, 7, 40, '2025-11-18 10:12:37', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(76, 7, 29, '2025-11-18 10:14:28', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(77, 7, 29, '2025-11-18 10:14:29', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(78, 7, 40, '2025-11-18 10:14:53', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(79, 7, 40, '2025-11-18 10:14:53', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(80, 7, 40, '2025-11-18 10:23:13', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(81, 7, 40, '2025-11-18 10:23:13', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(82, 7, 40, '2025-11-18 10:26:43', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(83, 7, 40, '2025-11-18 10:26:44', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(84, 7, 40, '2025-11-18 10:31:12', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(85, 7, 40, '2025-11-18 10:31:13', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(86, 7, 40, '2025-11-18 10:33:04', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(87, 7, 40, '2025-11-18 10:33:04', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(88, 7, 30, '2025-11-18 10:36:29', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(89, 7, 30, '2025-11-18 10:36:54', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(90, 8, 40, '2025-11-18 10:41:57', '211.234.226.96', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(91, 8, 40, '2025-11-18 10:41:57', '211.234.226.96', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.3 (INAPP)', 'https://superpass.sfw.kr/'),
(92, 7, 40, '2025-11-18 10:44:21', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(93, 7, 40, '2025-11-18 10:44:21', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(94, 7, 40, '2025-11-18 10:46:24', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(95, 7, 40, '2025-11-18 10:46:25', '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(96, 1, 30, '2025-11-18 13:40:10', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(97, 1, 30, '2025-11-18 13:40:17', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(98, 1, 30, '2025-11-18 13:40:43', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(99, 1, 40, '2025-11-18 13:42:54', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(100, 1, 40, '2025-11-18 13:42:55', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(101, 1, 40, '2025-11-18 13:42:59', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(102, 1, 40, '2025-11-18 13:42:59', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(103, 1, 40, '2025-11-18 13:43:17', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(104, 1, 40, '2025-11-18 13:43:18', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(105, 1, 6, '2025-11-20 16:18:26', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(106, 1, 6, '2025-11-20 16:18:26', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(107, 11, 40, '2025-11-24 10:44:50', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(108, 11, 40, '2025-11-24 10:44:50', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(109, 13, 31, '2025-11-25 09:58:15', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(110, 13, 31, '2025-11-25 09:58:15', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(111, 13, 35, '2025-11-25 09:59:11', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(112, 13, 35, '2025-11-25 09:59:11', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(113, 13, 14, '2025-11-25 09:59:38', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(114, 13, 14, '2025-11-25 09:59:38', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(115, 13, 25, '2025-11-25 09:59:51', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(116, 13, 25, '2025-11-25 09:59:51', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(117, 13, 15, '2025-11-25 10:00:02', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(118, 13, 15, '2025-11-25 10:00:02', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(119, 13, 31, '2025-11-25 10:00:44', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(120, 13, 41, '2025-11-25 10:01:04', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(121, 13, 31, '2025-11-25 10:01:12', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(122, 13, 30, '2025-11-25 10:01:18', '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(123, 14, 3, '2025-11-25 10:14:02', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(124, 14, 3, '2025-11-25 10:14:02', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(125, 14, 26, '2025-11-25 10:14:05', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(126, 14, 26, '2025-11-25 10:14:05', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(127, 14, 26, '2025-11-25 10:14:16', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(128, 14, 26, '2025-11-25 10:14:16', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(129, 14, 3, '2025-11-25 10:14:48', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(130, 14, 3, '2025-11-25 10:14:48', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(131, 14, 26, '2025-11-25 10:15:03', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(132, 14, 26, '2025-11-25 10:15:04', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(133, 14, 3, '2025-11-25 10:17:38', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(134, 14, 3, '2025-11-25 10:17:38', '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(135, 15, 37, '2025-11-25 11:06:53', '218.153.127.49', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(136, 15, 37, '2025-11-25 11:06:53', '218.153.127.49', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(137, 16, 22, '2025-11-25 11:40:49', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(138, 16, 22, '2025-11-25 11:40:49', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(139, 16, 22, '2025-11-25 11:41:31', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(140, 16, 22, '2025-11-25 11:41:32', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(141, 16, 7, '2025-11-25 11:45:05', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(142, 16, 7, '2025-11-25 11:45:05', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(143, 16, 40, '2025-11-25 11:45:08', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(144, 16, 40, '2025-11-25 11:45:08', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(145, 16, 37, '2025-11-25 11:45:14', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(146, 16, 37, '2025-11-25 11:45:14', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(147, 16, 37, '2025-11-25 11:45:28', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(148, 16, 37, '2025-11-25 11:45:28', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(149, 16, 41, '2025-11-25 11:45:29', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(150, 16, 41, '2025-11-25 11:45:29', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(151, 16, 38, '2025-11-25 11:45:34', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(152, 16, 38, '2025-11-25 11:45:34', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(153, 16, 38, '2025-11-25 11:47:02', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(154, 16, 38, '2025-11-25 11:47:03', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(155, 16, 9, '2025-11-25 11:47:05', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(156, 16, 9, '2025-11-25 11:47:05', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(157, 16, 35, '2025-11-25 11:47:06', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(158, 16, 35, '2025-11-25 11:47:06', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(159, 16, 17, '2025-11-25 11:54:07', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(160, 16, 17, '2025-11-25 11:54:08', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(161, 16, 22, '2025-11-25 11:54:12', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(162, 16, 22, '2025-11-25 11:54:12', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(163, 16, 22, '2025-11-25 13:53:03', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(164, 16, 22, '2025-11-25 13:53:03', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(165, 11, 22, '2025-11-25 13:55:21', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(166, 11, 22, '2025-11-25 13:55:21', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(167, 11, 22, '2025-11-25 13:55:26', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(168, 11, 22, '2025-11-25 13:55:26', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(169, 11, 22, '2025-11-25 13:55:26', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(170, 11, 22, '2025-11-25 13:55:26', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(171, 16, 22, '2025-11-25 13:55:33', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'https://superpass.sfw.kr/'),
(172, 16, 22, '2025-11-25 13:55:33', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'https://superpass.sfw.kr/'),
(173, 17, 35, '2025-11-25 13:55:47', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(174, 17, 35, '2025-11-25 13:55:49', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(175, 17, 14, '2025-11-25 13:55:54', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(176, 17, 41, '2025-11-25 13:57:20', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(177, 17, 41, '2025-11-25 13:57:20', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(178, 17, 14, '2025-11-25 13:57:33', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(179, 17, 38, '2025-11-25 13:57:42', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(180, 17, 38, '2025-11-25 13:57:43', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(181, 17, 40, '2025-11-25 13:57:49', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(182, 17, 40, '2025-11-25 13:57:49', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(183, 17, 16, '2025-11-25 13:57:50', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(184, 17, 16, '2025-11-25 13:57:50', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(185, 17, 6, '2025-11-25 13:57:52', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(186, 17, 6, '2025-11-25 13:57:52', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(187, 17, 14, '2025-11-25 13:57:58', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(188, 17, 14, '2025-11-25 13:57:58', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(189, 17, 40, '2025-11-25 13:58:05', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(190, 17, 40, '2025-11-25 13:58:05', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(191, 16, 40, '2025-11-25 13:58:34', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'https://superpass.sfw.kr/'),
(192, 16, 40, '2025-11-25 13:58:34', '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'https://superpass.sfw.kr/'),
(193, 11, 22, '2025-11-25 13:58:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(194, 11, 22, '2025-11-25 13:58:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(195, 17, 14, '2025-11-25 13:58:46', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(196, 17, 14, '2025-11-25 13:58:46', '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(197, 11, 1, '2025-11-25 14:06:49', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(198, 11, 1, '2025-11-25 14:06:50', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(199, 11, 26, '2025-11-25 15:11:12', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(200, 11, 26, '2025-11-25 15:11:12', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(201, 11, 26, '2025-11-25 15:11:42', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(202, 11, 26, '2025-11-25 15:11:42', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(203, 18, 35, '2025-11-25 18:04:12', '121.129.23.77', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(204, 18, 35, '2025-11-25 18:04:12', '121.129.23.77', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(205, 18, 35, '2025-11-25 18:04:56', '121.129.23.77', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(206, 18, 35, '2025-11-25 18:04:56', '121.129.23.77', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(207, 19, 34, '2025-11-26 11:41:43', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(208, 19, 25, '2025-11-26 11:41:55', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(209, 19, 14, '2025-11-26 11:42:11', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(210, 19, 31, '2025-11-26 11:42:18', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(211, 19, 35, '2025-11-26 11:42:26', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(212, 19, 25, '2025-11-26 11:42:30', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(213, 19, 22, '2025-11-26 11:42:32', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(214, 19, 23, '2025-11-26 11:42:42', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(215, 19, 25, '2025-11-26 11:42:47', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(216, 19, 9, '2025-11-26 11:42:50', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(217, 19, 14, '2025-11-26 11:42:53', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(218, 19, 35, '2025-11-26 11:42:56', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(219, 19, 25, '2025-11-26 11:42:58', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(220, 19, 30, '2025-11-26 11:43:01', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(221, 19, 28, '2025-11-26 11:43:04', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(222, 19, 15, '2025-11-26 11:43:07', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(223, 19, 7, '2025-11-26 11:43:10', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(224, 19, 11, '2025-11-26 11:43:15', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(225, 19, 1, '2025-11-26 11:43:17', '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(226, 20, 19, '2025-11-26 21:44:54', '14.52.80.131', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(227, 20, 19, '2025-11-26 21:44:54', '14.52.80.131', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(228, 1, 19, '2025-11-27 13:53:22', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(229, 1, 19, '2025-11-27 13:53:22', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(230, 1, 8, '2025-11-27 13:57:07', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(231, 1, 8, '2025-11-27 13:57:07', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(232, 1, 28, '2025-11-27 13:57:09', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(233, 1, 28, '2025-11-27 13:57:09', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(234, 1, 26, '2025-11-27 13:57:11', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(235, 1, 26, '2025-11-27 13:57:11', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(236, 21, 8, '2025-11-27 16:56:30', '118.235.4.63', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(237, 7, 23, '2025-12-02 17:14:40', '118.235.7.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(238, 7, 8, '2025-12-02 17:14:51', '118.235.7.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(239, 7, 8, '2025-12-02 17:14:59', '118.235.7.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(240, 7, 1, '2025-12-02 17:29:18', '118.235.6.223', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(241, 7, 1, '2025-12-02 17:29:19', '118.235.6.223', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(242, 22, 26, '2025-12-03 22:21:14', '203.254.98.115', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(243, 22, 26, '2025-12-03 22:21:14', '203.254.98.115', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(244, 22, 26, '2025-12-03 22:38:27', '203.254.98.115', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(245, 22, 26, '2025-12-03 22:38:27', '203.254.98.115', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/');
INSERT INTO `dsp_store_click_log` (`id`, `mem_id`, `store_no`, `clicked_at`, `ip`, `ua`, `referer`) VALUES
(246, 21, 9, '2025-12-10 15:58:41', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(247, 21, 1, '2025-12-10 15:58:51', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(248, 21, 1, '2025-12-10 15:58:51', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(249, 21, 30, '2025-12-10 15:58:53', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(250, 21, 30, '2025-12-10 15:58:53', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(251, 21, 15, '2025-12-10 15:58:54', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(252, 21, 15, '2025-12-10 15:58:54', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(253, 23, 34, '2025-12-11 10:00:25', '210.120.40.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(254, 23, 17, '2025-12-11 10:00:28', '210.120.40.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(255, 23, 17, '2025-12-11 10:00:29', '210.120.40.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(256, 24, 23, '2025-12-12 14:53:13', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(257, 24, 23, '2025-12-12 14:53:14', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(258, 24, 10, '2025-12-12 14:53:38', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(259, 24, 10, '2025-12-12 14:53:38', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(260, 24, 25, '2025-12-12 14:54:06', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(261, 24, 25, '2025-12-12 14:54:06', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(262, 24, 40, '2025-12-12 14:56:47', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(263, 24, 40, '2025-12-12 14:56:47', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(264, 24, 40, '2025-12-12 14:56:56', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(265, 24, 40, '2025-12-12 14:56:56', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(266, 24, 32, '2025-12-12 15:13:41', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(267, 24, 32, '2025-12-12 15:13:42', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(268, 24, 25, '2025-12-12 15:13:57', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(269, 24, 25, '2025-12-12 15:13:58', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(270, 24, 25, '2025-12-12 15:14:08', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(271, 24, 25, '2025-12-12 15:14:08', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(272, 24, 4, '2025-12-12 15:14:12', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(273, 24, 4, '2025-12-12 15:14:12', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(274, 24, 5, '2025-12-12 15:14:16', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(275, 24, 5, '2025-12-12 15:14:17', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(276, 24, 31, '2025-12-12 15:14:56', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(277, 24, 31, '2025-12-12 15:14:56', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(278, 24, 10, '2025-12-12 15:15:09', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(279, 24, 9, '2025-12-12 15:15:12', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(280, 24, 8, '2025-12-12 15:15:14', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(281, 24, 25, '2025-12-12 15:15:22', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(282, 24, 41, '2025-12-12 15:15:27', '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(283, 25, 26, '2025-12-13 00:20:42', '121.143.87.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(284, 25, 39, '2025-12-13 00:20:58', '121.143.87.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(285, 25, 40, '2025-12-13 00:21:09', '121.143.87.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(286, 25, 1, '2025-12-13 00:21:22', '121.143.87.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(287, 26, 37, '2025-12-13 20:20:13', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(288, 26, 37, '2025-12-13 20:20:13', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(289, 26, 7, '2025-12-13 20:20:32', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(290, 26, 7, '2025-12-13 20:20:33', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(291, 26, 36, '2025-12-13 20:20:43', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(292, 26, 36, '2025-12-13 20:20:43', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(293, 26, 22, '2025-12-13 20:20:48', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(294, 26, 22, '2025-12-13 20:20:48', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(295, 26, 39, '2025-12-13 20:20:59', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(296, 26, 39, '2025-12-13 20:20:59', '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(297, 21, 18, '2025-12-15 11:01:03', '115.92.5.197', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(298, 21, 40, '2025-12-15 11:01:15', '115.92.5.197', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(299, 21, 40, '2025-12-15 11:01:15', '115.92.5.197', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(300, 27, 42, '2025-12-17 10:37:57', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(301, 27, 42, '2025-12-17 10:37:57', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(302, 27, 5, '2025-12-17 10:39:00', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(303, 27, 5, '2025-12-17 10:39:00', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(304, 27, 42, '2025-12-17 10:39:04', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(305, 27, 42, '2025-12-17 10:39:04', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(306, 27, 5, '2025-12-17 10:42:04', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(307, 27, 5, '2025-12-17 10:42:04', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(308, 27, 4, '2025-12-17 10:44:02', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(309, 27, 4, '2025-12-17 10:44:03', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(310, 27, 42, '2025-12-17 10:44:08', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(311, 27, 42, '2025-12-17 10:44:08', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(312, 27, 1, '2025-12-17 10:44:21', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(313, 27, 1, '2025-12-17 10:44:21', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(314, 27, 42, '2025-12-17 10:44:31', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(315, 27, 42, '2025-12-17 10:44:31', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(316, 1, 5, '2025-12-17 11:18:42', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(317, 1, 5, '2025-12-17 11:18:42', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(318, 1, 42, '2025-12-17 11:18:51', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(319, 1, 42, '2025-12-17 11:18:51', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(320, 1, 42, '2025-12-17 11:30:25', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(321, 1, 42, '2025-12-17 11:30:25', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(322, 1, 42, '2025-12-17 15:47:17', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(323, 1, 42, '2025-12-17 15:47:17', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(324, 1, 31, '2025-12-17 15:47:35', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(325, 1, 31, '2025-12-17 15:47:35', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(326, 1, 31, '2025-12-17 15:47:56', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(327, 1, 31, '2025-12-17 15:47:57', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(328, 1, 3, '2025-12-17 15:50:22', '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(329, 1, 3, '2025-12-17 15:50:22', '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(330, 1, 5, '2025-12-17 15:52:12', '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(331, 1, 5, '2025-12-17 15:52:12', '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(332, 27, 42, '2025-12-17 16:09:10', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(333, 27, 42, '2025-12-17 16:09:10', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(334, 28, 19, '2025-12-17 16:09:22', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(335, 28, 19, '2025-12-17 16:09:22', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(336, 27, 4, '2025-12-17 16:11:24', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(337, 27, 4, '2025-12-17 16:11:24', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(338, 11, 40, '2025-12-17 16:22:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(339, 11, 40, '2025-12-17 16:22:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(340, 11, 40, '2025-12-17 16:24:54', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(341, 11, 40, '2025-12-17 16:24:54', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(342, 11, 5, '2025-12-17 16:24:59', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(343, 11, 5, '2025-12-17 16:24:59', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(344, 27, 31, '2025-12-17 16:25:01', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(345, 27, 31, '2025-12-17 16:25:01', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(346, 27, 5, '2025-12-17 16:29:23', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(347, 27, 5, '2025-12-17 16:29:23', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(348, 1, 40, '2025-12-17 16:44:01', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(349, 1, 40, '2025-12-17 16:44:02', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(350, 1, 39, '2025-12-17 16:48:29', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(351, 1, 39, '2025-12-17 16:48:29', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(352, 1, 40, '2025-12-17 16:55:10', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(353, 1, 40, '2025-12-17 16:55:10', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(354, 29, 42, '2025-12-18 08:26:01', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(355, 29, 42, '2025-12-18 08:26:01', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(356, 29, 5, '2025-12-18 08:26:04', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(357, 29, 5, '2025-12-18 08:26:04', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(358, 30, 5, '2025-12-18 09:27:47', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(359, 30, 5, '2025-12-18 09:27:47', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(360, 29, 39, '2025-12-18 09:39:36', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(361, 29, 39, '2025-12-18 09:39:36', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(362, 30, 42, '2025-12-18 10:33:59', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(363, 30, 42, '2025-12-18 10:33:59', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(364, 31, 42, '2025-12-18 13:10:09', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(365, 31, 42, '2025-12-18 13:10:09', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(366, 31, 39, '2025-12-18 13:18:25', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(367, 27, 42, '2025-12-18 14:55:56', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(368, 27, 42, '2025-12-18 14:55:56', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(369, 27, 42, '2025-12-18 15:10:28', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(370, 27, 42, '2025-12-18 15:10:28', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(371, 27, 42, '2025-12-18 15:47:14', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(372, 27, 42, '2025-12-18 15:47:15', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(373, 27, 42, '2025-12-18 15:52:34', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(374, 27, 42, '2025-12-18 15:52:35', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(375, 30, 42, '2025-12-19 07:23:37', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(376, 30, 42, '2025-12-19 07:23:37', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(377, 30, 42, '2025-12-19 08:18:09', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(378, 30, 42, '2025-12-19 08:18:09', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(379, 1, 40, '2025-12-19 09:55:38', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(380, 1, 40, '2025-12-19 09:55:38', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(381, 30, 42, '2025-12-19 10:10:24', '175.214.73.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(382, 30, 42, '2025-12-19 10:10:24', '175.214.73.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(383, 11, 40, '2025-12-19 10:25:03', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(384, 11, 40, '2025-12-19 10:25:04', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(385, 11, 40, '2025-12-19 10:25:04', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(386, 11, 40, '2025-12-19 10:25:04', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(387, 11, 40, '2025-12-19 10:29:47', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(388, 11, 40, '2025-12-19 10:29:47', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(389, 11, 40, '2025-12-19 10:29:53', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(390, 11, 40, '2025-12-19 10:29:53', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(391, 11, 40, '2025-12-19 10:29:57', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(392, 11, 40, '2025-12-19 10:29:57', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(393, 11, 40, '2025-12-19 10:33:46', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(394, 11, 40, '2025-12-19 10:33:46', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(395, 11, 40, '2025-12-19 10:33:47', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(396, 11, 40, '2025-12-19 10:33:47', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(397, 11, 40, '2025-12-19 10:34:08', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(398, 11, 40, '2025-12-19 10:34:08', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(399, 11, 40, '2025-12-19 10:41:59', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(400, 11, 40, '2025-12-19 10:41:59', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(401, 1, 40, '2025-12-19 10:42:37', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(402, 1, 37, '2025-12-19 10:42:46', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(403, 1, 37, '2025-12-19 10:42:46', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(404, 1, 38, '2025-12-19 10:42:57', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(405, 1, 38, '2025-12-19 10:42:57', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(406, 11, 40, '2025-12-19 10:51:05', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(407, 11, 40, '2025-12-19 10:51:05', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(408, 11, 40, '2025-12-19 10:51:15', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(409, 11, 40, '2025-12-19 10:51:15', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(410, 11, 42, '2025-12-19 10:51:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(411, 11, 42, '2025-12-19 10:51:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(412, 11, 5, '2025-12-19 10:52:20', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(413, 11, 5, '2025-12-19 10:52:20', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(414, 11, 42, '2025-12-19 10:52:27', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(415, 11, 42, '2025-12-19 10:52:27', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(416, 30, 42, '2025-12-19 12:02:12', '175.214.73.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(417, 30, 42, '2025-12-19 12:02:12', '175.214.73.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(418, 28, 5, '2025-12-19 15:06:30', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(419, 28, 5, '2025-12-19 15:06:31', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(420, 28, 15, '2025-12-19 15:06:31', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(421, 28, 15, '2025-12-19 15:06:31', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(422, 28, 5, '2025-12-19 15:06:33', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(423, 28, 5, '2025-12-19 15:06:33', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(424, 28, 15, '2025-12-19 15:06:33', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(425, 28, 15, '2025-12-19 15:06:33', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(426, 28, 26, '2025-12-19 15:10:17', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(427, 28, 26, '2025-12-19 15:10:17', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(428, 28, 5, '2025-12-19 15:25:06', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(429, 28, 5, '2025-12-19 15:25:07', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(430, 28, 5, '2025-12-19 15:26:22', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(431, 28, 5, '2025-12-19 15:26:22', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(432, 28, 42, '2025-12-19 15:27:00', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(433, 28, 42, '2025-12-19 15:27:00', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(434, 28, 5, '2025-12-19 15:50:17', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(435, 28, 5, '2025-12-19 15:50:17', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(436, 28, 5, '2025-12-19 15:53:08', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(437, 28, 5, '2025-12-19 15:53:08', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(438, 28, 5, '2025-12-19 15:54:24', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(439, 28, 5, '2025-12-19 15:54:25', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(440, 28, 42, '2025-12-19 15:56:49', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(441, 28, 42, '2025-12-19 15:56:49', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(442, 28, 5, '2025-12-19 15:59:06', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(443, 28, 5, '2025-12-19 15:59:06', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(444, 28, 42, '2025-12-19 15:59:12', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(445, 28, 42, '2025-12-19 15:59:12', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(446, 28, 5, '2025-12-19 15:59:24', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(447, 28, 5, '2025-12-19 15:59:24', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(448, 28, 42, '2025-12-19 15:59:35', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(449, 28, 42, '2025-12-19 15:59:35', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(450, 28, 5, '2025-12-19 16:02:48', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(451, 28, 5, '2025-12-19 16:02:48', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(452, 28, 5, '2025-12-19 16:02:52', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(453, 28, 5, '2025-12-19 16:02:52', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(454, 28, 5, '2025-12-19 16:06:08', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(455, 28, 5, '2025-12-19 16:06:08', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(456, 28, 5, '2025-12-19 16:08:58', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(457, 28, 5, '2025-12-19 16:08:58', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(458, 28, 5, '2025-12-19 16:09:32', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(459, 28, 5, '2025-12-19 16:09:33', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(460, 28, 5, '2025-12-19 16:09:33', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(461, 28, 5, '2025-12-19 16:09:33', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(462, 28, 5, '2025-12-19 16:09:34', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(463, 28, 5, '2025-12-19 16:09:34', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(464, 28, 5, '2025-12-19 16:09:35', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(465, 28, 5, '2025-12-19 16:09:35', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(466, 28, 5, '2025-12-19 16:09:35', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(467, 28, 5, '2025-12-19 16:09:35', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(468, 28, 5, '2025-12-19 16:09:36', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(469, 28, 5, '2025-12-19 16:09:36', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(470, 28, 5, '2025-12-19 16:09:37', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(471, 28, 5, '2025-12-19 16:09:37', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(472, 28, 5, '2025-12-19 16:09:38', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(473, 28, 5, '2025-12-19 16:09:38', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(474, 28, 5, '2025-12-19 16:09:38', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(475, 28, 5, '2025-12-19 16:09:38', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(476, 28, 5, '2025-12-19 16:12:32', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(477, 28, 5, '2025-12-19 16:12:32', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(478, 28, 42, '2025-12-19 16:13:03', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(479, 28, 42, '2025-12-19 16:13:03', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(480, 28, 5, '2025-12-19 16:13:32', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(481, 28, 5, '2025-12-19 16:13:32', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/');
INSERT INTO `dsp_store_click_log` (`id`, `mem_id`, `store_no`, `clicked_at`, `ip`, `ua`, `referer`) VALUES
(482, 28, 5, '2025-12-19 16:14:12', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(483, 28, 5, '2025-12-19 16:14:12', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(484, 28, 5, '2025-12-19 16:14:37', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(485, 28, 5, '2025-12-19 16:14:37', '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 Safari/604.1 KAKAOTALK/25.11.1 (INAPP) KAKAOTALK/25.11.1 (INAPP)', 'https://superpass.sfw.kr/'),
(486, 30, 42, '2025-12-19 16:21:30', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(487, 30, 42, '2025-12-19 16:21:30', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(488, 11, 40, '2025-12-19 16:23:17', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(489, 11, 40, '2025-12-19 16:23:17', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(490, 28, 5, '2025-12-19 16:25:05', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(491, 28, 5, '2025-12-19 16:25:06', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(492, 11, 40, '2025-12-19 16:26:13', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(493, 11, 40, '2025-12-19 16:26:13', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(494, 11, 40, '2025-12-19 17:03:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(495, 11, 40, '2025-12-19 17:03:44', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(496, 11, 40, '2025-12-19 17:03:45', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(497, 11, 40, '2025-12-19 17:03:45', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(498, 11, 41, '2025-12-19 17:09:35', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(499, 11, 41, '2025-12-19 17:09:35', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(500, 1, 37, '2025-12-19 17:12:29', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(501, 1, 41, '2025-12-19 17:12:31', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(502, 1, 40, '2025-12-19 17:15:59', '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(503, 11, 42, '2025-12-23 15:02:12', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(504, 11, 42, '2025-12-23 15:02:12', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(505, 11, 5, '2025-12-23 15:02:31', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(506, 11, 5, '2025-12-23 15:02:31', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(507, 11, 40, '2025-12-23 15:03:01', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(508, 11, 40, '2025-12-23 15:03:01', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(509, 11, 40, '2025-12-23 15:03:56', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(510, 11, 40, '2025-12-23 15:03:56', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(511, 11, 40, '2025-12-23 15:04:17', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(512, 11, 40, '2025-12-23 15:04:17', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(513, 11, 40, '2025-12-23 15:05:43', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(514, 11, 40, '2025-12-23 15:05:43', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(515, 11, 40, '2025-12-23 15:06:57', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(516, 11, 40, '2025-12-23 15:06:57', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(517, 1, 42, '2025-12-23 15:06:59', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(518, 11, 40, '2025-12-23 15:07:52', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(519, 11, 40, '2025-12-23 15:07:52', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(520, 11, 42, '2025-12-26 16:55:36', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(521, 11, 42, '2025-12-26 16:55:36', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(522, 11, 5, '2025-12-26 16:55:48', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(523, 11, 5, '2025-12-26 16:55:48', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(524, 32, 5, '2025-12-27 11:41:58', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(525, 32, 5, '2025-12-27 11:41:58', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(526, 32, 42, '2025-12-27 11:42:04', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(527, 32, 42, '2025-12-27 11:42:04', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(528, 32, 1, '2025-12-27 11:42:09', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(529, 32, 1, '2025-12-27 11:42:09', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(530, 32, 8, '2025-12-27 11:42:13', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(531, 32, 4, '2025-12-27 11:42:15', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(532, 32, 7, '2025-12-27 11:42:20', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(533, 32, 15, '2025-12-27 11:42:23', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(534, 32, 5, '2025-12-27 11:42:29', '223.38.78.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(535, 32, 5, '2025-12-27 11:46:17', '223.38.78.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(536, 32, 5, '2025-12-27 11:46:40', '223.38.78.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(537, 32, 5, '2025-12-27 11:46:58', '223.38.78.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(538, 32, 5, '2025-12-27 11:46:58', '223.38.78.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(539, 32, 42, '2025-12-27 11:47:41', '223.38.78.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(540, 32, 5, '2025-12-27 11:48:17', '223.38.78.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(541, 32, 5, '2025-12-27 11:48:17', '223.38.78.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(542, 32, 39, '2025-12-27 11:48:48', '223.38.78.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(543, 32, 15, '2025-12-27 11:49:01', '223.38.78.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.2 (INAPP)', 'https://superpass.sfw.kr/'),
(544, 28, 5, '2025-12-27 11:49:52', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(545, 28, 40, '2025-12-27 11:50:58', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(546, 28, 40, '2025-12-27 11:50:58', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(547, 28, 5, '2025-12-27 11:51:39', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(548, 28, 5, '2025-12-27 11:52:49', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(549, 28, 40, '2025-12-27 11:56:52', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(550, 28, 40, '2025-12-27 11:56:52', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(551, 28, 5, '2025-12-27 11:56:57', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(552, 28, 5, '2025-12-27 11:58:05', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(553, 28, 42, '2025-12-27 11:58:09', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(554, 28, 5, '2025-12-27 11:58:11', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(555, 28, 8, '2025-12-27 11:58:13', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(556, 28, 1, '2025-12-27 11:58:15', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(557, 28, 5, '2025-12-27 11:58:20', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(558, 28, 5, '2025-12-27 12:00:02', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(559, 28, 5, '2025-12-27 12:00:02', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(560, 28, 5, '2025-12-27 14:38:51', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(561, 28, 5, '2025-12-27 14:38:51', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(562, 28, 40, '2025-12-27 14:41:06', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(563, 28, 40, '2025-12-27 14:41:06', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(564, 33, 42, '2025-12-29 14:15:30', '223.39.84.116', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(565, 33, 1, '2025-12-29 14:16:20', '223.39.84.116', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(566, 33, 1, '2025-12-29 14:16:21', '223.39.84.116', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(567, 33, 5, '2025-12-29 14:31:49', '223.39.84.116', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(568, 7, 1, '2025-12-29 15:17:11', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 410.1.0.36.70 (iPhone14,4; iOS 18_6_2; ko_KR; ko; scale=3.00; 1125x2436; IABMV/1; 849447290) Safari/604.1', 'https://superpass.sfw.kr/'),
(569, 7, 1, '2025-12-29 15:17:11', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 410.1.0.36.70 (iPhone14,4; iOS 18_6_2; ko_KR; ko; scale=3.00; 1125x2436; IABMV/1; 849447290) Safari/604.1', 'https://superpass.sfw.kr/'),
(570, 34, 32, '2025-12-30 10:12:18', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(571, 34, 32, '2025-12-30 10:12:18', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(572, 34, 33, '2025-12-30 10:14:12', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(573, 34, 33, '2025-12-30 10:14:12', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(574, 34, 32, '2025-12-30 10:15:47', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(575, 34, 32, '2025-12-30 10:15:47', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(576, 34, 36, '2025-12-30 10:16:20', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(577, 34, 36, '2025-12-30 10:16:20', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(578, 34, 31, '2025-12-30 10:16:39', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(579, 34, 31, '2025-12-30 10:16:40', '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ', 'https://superpass.sfw.kr/'),
(580, 35, 5, '2025-12-30 16:05:24', '203.228.139.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(581, 35, 5, '2025-12-30 16:05:25', '203.228.139.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(582, 35, 3, '2025-12-30 16:06:57', '203.228.139.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(583, 36, 27, '2025-12-31 17:08:01', '39.7.230.10', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/399.2.845414227 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(584, 36, 27, '2025-12-31 17:08:01', '39.7.230.10', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/399.2.845414227 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(585, 37, 14, '2026-01-04 14:54:50', '218.237.106.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(586, 37, 37, '2026-01-04 15:04:19', '218.237.106.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(587, 37, 37, '2026-01-04 15:04:25', '218.237.106.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(588, 27, 5, '2026-01-09 15:36:47', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(589, 27, 5, '2026-01-09 15:36:47', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(590, 27, 42, '2026-01-09 15:39:28', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(591, 27, 42, '2026-01-09 15:39:28', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(592, 27, 5, '2026-01-09 15:40:03', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(593, 27, 5, '2026-01-09 15:40:03', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(594, 27, 42, '2026-01-09 15:40:06', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(595, 27, 42, '2026-01-09 15:40:06', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(596, 27, 5, '2026-01-09 15:40:08', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(597, 27, 5, '2026-01-09 15:40:08', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(598, 27, 42, '2026-01-09 15:40:11', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(599, 27, 42, '2026-01-09 15:40:11', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(600, 27, 42, '2026-01-09 15:44:31', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(601, 27, 42, '2026-01-09 15:44:31', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(602, 27, 5, '2026-01-09 15:44:39', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(603, 27, 5, '2026-01-09 15:44:39', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(604, 27, 42, '2026-01-09 15:44:45', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(605, 27, 42, '2026-01-09 15:44:45', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(606, 27, 42, '2026-01-09 15:44:48', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(607, 27, 42, '2026-01-09 15:44:48', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(608, 27, 5, '2026-01-09 15:44:51', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(609, 27, 5, '2026-01-09 15:44:51', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(610, 27, 42, '2026-01-09 15:46:22', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(611, 27, 42, '2026-01-09 15:46:22', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(612, 27, 42, '2026-01-09 15:46:57', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(613, 27, 42, '2026-01-09 15:46:57', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(614, 28, 26, '2026-01-09 17:44:07', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(615, 28, 26, '2026-01-09 17:44:07', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(616, 28, 5, '2026-01-09 17:44:10', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(617, 28, 5, '2026-01-09 17:44:10', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(618, 28, 15, '2026-01-09 17:44:11', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(619, 28, 15, '2026-01-09 17:44:11', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(620, 28, 5, '2026-01-11 14:05:53', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(621, 28, 5, '2026-01-11 14:05:54', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(622, 28, 40, '2026-01-11 15:21:38', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(623, 28, 40, '2026-01-11 15:21:38', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(624, 28, 26, '2026-01-11 15:21:42', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(625, 28, 26, '2026-01-11 15:21:42', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(626, 28, 5, '2026-01-11 15:21:44', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(627, 28, 5, '2026-01-11 15:21:44', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(628, 28, 28, '2026-01-11 15:21:45', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(629, 28, 28, '2026-01-11 15:21:45', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(630, 28, 8, '2026-01-11 15:21:46', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(631, 28, 8, '2026-01-11 15:21:46', '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'https://superpass.sfw.kr/'),
(632, 5, 38, '2026-01-13 15:00:57', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(633, 5, 38, '2026-01-13 15:00:57', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(634, 5, 3, '2026-01-13 15:01:01', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(635, 5, 3, '2026-01-13 15:01:01', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(636, 5, 3, '2026-01-13 15:01:12', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(637, 5, 3, '2026-01-13 15:01:12', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(638, 5, 18, '2026-01-13 15:01:18', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(639, 5, 18, '2026-01-13 15:01:18', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(640, 5, 37, '2026-01-13 15:01:20', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(641, 5, 37, '2026-01-13 15:01:20', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(642, 5, 20, '2026-01-13 15:01:23', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(643, 5, 20, '2026-01-13 15:01:23', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(644, 5, 38, '2026-01-13 15:01:27', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(645, 5, 1, '2026-01-13 15:01:55', '118.235.65.32', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(646, 30, 42, '2026-01-15 12:55:23', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(647, 30, 42, '2026-01-15 12:55:23', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(648, 30, 5, '2026-01-15 12:57:15', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(649, 30, 5, '2026-01-15 12:57:15', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(650, 30, 42, '2026-01-15 13:00:05', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(651, 30, 42, '2026-01-15 13:00:05', '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(652, 27, 42, '2026-01-15 14:49:49', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(653, 27, 42, '2026-01-15 14:49:49', '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'https://superpass.sfw.kr/'),
(654, 11, 42, '2026-01-20 14:09:34', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(655, 11, 42, '2026-01-20 14:09:34', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(656, 11, 42, '2026-01-20 14:09:34', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(657, 11, 42, '2026-01-20 14:09:34', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(658, 11, 40, '2026-01-20 14:09:36', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(659, 11, 40, '2026-01-20 14:09:36', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(660, 11, 1, '2026-01-20 14:14:13', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.3 (INAPP)', 'https://superpass.sfw.kr/'),
(661, 11, 1, '2026-01-20 14:14:13', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.3 (INAPP)', 'https://superpass.sfw.kr/'),
(662, 11, 42, '2026-01-20 14:16:45', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.3 (INAPP)', 'https://superpass.sfw.kr/'),
(663, 11, 42, '2026-01-20 14:16:45', '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.11.3 (INAPP)', 'https://superpass.sfw.kr/'),
(664, 5, 5, '2026-01-20 15:45:02', '118.235.7.254', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(665, 5, 5, '2026-01-20 15:45:02', '118.235.7.254', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(666, 11, 1, '2026-01-20 16:13:48', '210.120.40.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(667, 11, 1, '2026-01-20 16:13:49', '210.120.40.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(668, 11, 40, '2026-01-20 16:14:06', '210.120.40.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(669, 11, 40, '2026-01-20 16:14:06', '210.120.40.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(670, 1, 26, '2026-01-20 16:45:39', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(671, 1, 15, '2026-01-20 16:45:45', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(672, 1, 15, '2026-01-20 16:45:46', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(673, 5, 40, '2026-01-20 16:47:47', '118.235.7.254', 'Mozilla/5.0 (iPad; CPU OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(674, 1, 3, '2026-01-20 16:47:55', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(675, 1, 30, '2026-01-20 16:48:53', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(676, 1, 35, '2026-01-20 16:55:53', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(677, 1, 35, '2026-01-20 16:55:54', '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(678, 28, 5, '2026-01-26 14:45:30', '203.228.139.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/'),
(679, 28, 5, '2026-01-26 14:45:30', '203.228.139.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/'),
(680, 28, 5, '2026-01-26 14:46:10', '203.228.139.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/'),
(681, 28, 5, '2026-01-26 14:46:11', '203.228.139.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/'),
(682, 28, 40, '2026-01-26 14:54:22', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/'),
(683, 28, 40, '2026-01-26 14:54:22', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/'),
(684, 28, 5, '2026-01-26 14:54:29', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'https://superpass.sfw.kr/'),
(685, 28, 22, '2026-01-26 14:55:54', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(686, 28, 22, '2026-01-26 14:55:54', '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(687, 39, 40, '2026-01-27 13:06:42', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(688, 39, 40, '2026-01-27 13:06:42', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(689, 39, 3, '2026-01-27 13:06:49', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(690, 39, 40, '2026-01-27 13:06:59', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(691, 39, 40, '2026-01-27 13:06:59', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(692, 39, 11, '2026-01-27 13:07:10', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(693, 39, 15, '2026-01-27 13:07:14', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(694, 39, 14, '2026-01-27 13:07:25', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(695, 39, 5, '2026-01-27 13:07:36', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(696, 39, 5, '2026-01-27 13:07:36', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(697, 39, 1, '2026-01-27 13:07:40', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(698, 39, 1, '2026-01-27 13:07:40', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(699, 39, 5, '2026-01-27 13:07:50', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(700, 39, 5, '2026-01-27 13:07:50', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(701, 39, 6, '2026-01-27 13:08:39', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(702, 39, 6, '2026-01-27 13:08:39', '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/'),
(703, 40, 5, '2026-01-31 13:38:50', '223.38.86.192', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(704, 40, 5, '2026-01-31 13:38:50', '223.38.86.192', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(705, 40, 5, '2026-01-31 13:39:27', '223.38.86.192', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(706, 40, 5, '2026-01-31 13:39:27', '223.38.86.192', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'https://superpass.sfw.kr/'),
(707, 41, 26, '2026-02-01 14:57:27', '106.101.194.186', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(708, 41, 26, '2026-02-01 14:57:27', '106.101.194.186', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'https://superpass.sfw.kr/'),
(709, 12, 42, '2026-02-02 14:26:46', '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'https://superpass.sfw.kr/');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_store_file_upload`
--

CREATE TABLE `dsp_store_file_upload` (
  `no` int(20) NOT NULL,
  `storeNo` int(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `client_name` varchar(200) DEFAULT NULL,
  `file_data` text DEFAULT NULL,
  `file_explain` varchar(200) DEFAULT NULL,
  `regIP` varchar(50) NOT NULL,
  `regDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_store_file_upload`
--

INSERT INTO `dsp_store_file_upload` (`no`, `storeNo`, `year`, `type`, `file_name`, `client_name`, `file_data`, `file_explain`, `regIP`, `regDate`) VALUES
(1, 4, '2025', 'storeExplain', 'o_1j5r7emh01mgp1d5bem91mpfe0lp.jpg', 'design_play01.jpg', '{\"id\":\"o_1j5r7emh01mgp1d5bem91mpfe0lp\",\"name\":\"design_play01.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/design_play01.jpg\",\"size\":444365,\"origSize\":444365,\"loaded\":444365,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-09-23T12:05:09.181Z\",\"completeTimestamp\":1758629159724,\"target_name\":\"o_1j5r7emh01mgp1d5bem91mpfe0lp.jpg\"}', '', '192.168.0.1', '2025-09-23 21:06:01'),
(2, 4, '2025', 'storeExplain', 'o_1j5r7emh01oh312rqv0r1i2c17cbq.jpg', 'design_play02.jpg', '{\"id\":\"o_1j5r7emh01oh312rqv0r1i2c17cbq\",\"name\":\"design_play02.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/design_play02.jpg\",\"size\":665395,\"origSize\":665395,\"loaded\":665395,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-09-23T12:05:31.340Z\",\"completeTimestamp\":1758629159748,\"target_name\":\"o_1j5r7emh01oh312rqv0r1i2c17cbq.jpg\"}', '', '192.168.0.1', '2025-09-23 21:06:01'),
(3, 4, '2025', 'storeExplain', 'o_1j5r7emh01bb4ab9mt31via1mr9r.jpg', 'design_play03.jpg', '{\"id\":\"o_1j5r7emh01bb4ab9mt31via1mr9r\",\"name\":\"design_play03.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/design_play03.jpg\",\"size\":331838,\"origSize\":331838,\"loaded\":331838,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-09-23T12:05:34.278Z\",\"completeTimestamp\":1758629159766,\"target_name\":\"o_1j5r7emh01bb4ab9mt31via1mr9r.jpg\"}', '', '192.168.0.1', '2025-09-23 21:06:01'),
(4, 4, '2025', 'storeExplain', 'o_1j5r7emh0174116h61840bmj1fcps.jpg', 'design_play04.jpg', '{\"id\":\"o_1j5r7emh0174116h61840bmj1fcps\",\"name\":\"design_play04.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/design_play04.jpg\",\"size\":476931,\"origSize\":476931,\"loaded\":476931,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-09-23T12:05:37.472Z\",\"completeTimestamp\":1758629159786,\"target_name\":\"o_1j5r7emh0174116h61840bmj1fcps.jpg\"}', '', '192.168.0.1', '2025-09-23 21:06:01'),
(5, 4, '2025', 'storeExplain', 'o_1j5r7emh01g1bakn2trft51kibt.jpg', 'design_play05.jpg', '{\"id\":\"o_1j5r7emh01g1bakn2trft51kibt\",\"name\":\"design_play05.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/design_play05.jpg\",\"size\":341572,\"origSize\":341572,\"loaded\":341572,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-09-23T12:05:41.431Z\",\"completeTimestamp\":1758629159805,\"target_name\":\"o_1j5r7emh01g1bakn2trft51kibt.jpg\"}', '', '192.168.0.1', '2025-09-23 21:06:01'),
(6, 4, '2025', 'storeExplain', 'o_1j5r7emh0j7f1hs0nghql4129eu.jpg', 'design_play07.jpg', '{\"id\":\"o_1j5r7emh0j7f1hs0nghql4129eu\",\"name\":\"design_play07.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/design_play07.jpg\",\"size\":416361,\"origSize\":416361,\"loaded\":416361,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-09-23T12:05:45.957Z\",\"completeTimestamp\":1758629159826,\"target_name\":\"o_1j5r7emh0j7f1hs0nghql4129eu.jpg\"}', '', '192.168.0.1', '2025-09-23 21:06:01'),
(7, 4, '2025', 'storeExplain', 'o_1j5r7emh0hu21uph6br1sn1l37v.jpg', 'design_play08.jpg', '{\"id\":\"o_1j5r7emh0hu21uph6br1sn1l37v\",\"name\":\"design_play08.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/design_play08.jpg\",\"size\":456127,\"origSize\":456127,\"loaded\":456127,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-09-23T12:05:49.641Z\",\"completeTimestamp\":1758629159846,\"target_name\":\"o_1j5r7emh0hu21uph6br1sn1l37v.jpg\"}', '', '192.168.0.1', '2025-09-23 21:06:01'),
(8, 4, '2025', 'storeExplain', 'o_1j5r7emh015dol031o30jo819a210.jpg', 'design_play09.jpg', '{\"id\":\"o_1j5r7emh015dol031o30jo819a210\",\"name\":\"design_play09.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/design_play09.jpg\",\"size\":345617,\"origSize\":345617,\"loaded\":345617,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-09-23T12:05:51.808Z\",\"completeTimestamp\":1758629159866,\"target_name\":\"o_1j5r7emh015dol031o30jo819a210.jpg\"}', '', '192.168.0.1', '2025-09-23 21:06:01'),
(12, 6, '2025', 'storeExplain', 'o_1j70h2g9r13i9u4ba9218qf1j1ac.jpg', '제목-없음-1.jpg', '{\"id\":\"o_1j70h2g9r13i9u4ba9218qf1j1ac\",\"name\":\"제목-없음-1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/제목-없음-1.jpg\",\"size\":250726,\"origSize\":250726,\"loaded\":250726,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-10-07T23:42:02.990Z\",\"completeTimestamp\":1759880758728,\"target_name\":\"o_1j70h2g9r13i9u4ba9218qf1j1ac.jpg\"}', '', '192.168.0.1', '2025-10-08 08:45:58'),
(13, 6, '2025', 'storeExplain', 'o_1j70h2g9res2acq3sm41o3id.jpg', '제목-없음-2.jpg', '{\"id\":\"o_1j70h2g9res2acq3sm41o3id\",\"name\":\"제목-없음-2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/제목-없음-2.jpg\",\"size\":145553,\"origSize\":145553,\"loaded\":145553,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-10-07T23:42:38.012Z\",\"completeTimestamp\":1759880759405,\"target_name\":\"o_1j70h2g9res2acq3sm41o3id.jpg\"}', '', '192.168.0.1', '2025-10-08 08:45:58'),
(14, 41, '2025', 'storeExplain', 'o_1j942bubklmdlml1ru4hmd1r0jc.jpg', '러기지레스 3.jpg', '{\"id\":\"o_1j942bubklmdlml1ru4hmd1r0jc\",\"name\":\"러기지레스 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":243706,\"origSize\":243706,\"loaded\":243706,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:16:56.258Z\",\"completeTimestamp\":1762147043111,\"target_name\":\"o_1j942bubklmdlml1ru4hmd1r0jc.jpg\"}', '', '210.120.40.117', '2025-11-03 14:17:26'),
(15, 41, '2025', 'storeExplain', 'o_1j942bubk87svi9cv1ah56csd.jpg', '러기지레스 1.jpg', '{\"id\":\"o_1j942bubk87svi9cv1ah56csd\",\"name\":\"러기지레스 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":225572,\"origSize\":225572,\"loaded\":225572,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:16:24.533Z\",\"completeTimestamp\":1762147043614,\"target_name\":\"o_1j942bubk87svi9cv1ah56csd.jpg\"}', '', '210.120.40.117', '2025-11-03 14:17:26'),
(16, 40, '2025', 'storeExplain', 'o_1j942nvi5b3b1lro1i8ihf1eddd.jpg', '비카인드반미 3.jpg', '{\"id\":\"o_1j942nvi5b3b1lro1i8ihf1eddd\",\"name\":\"비카인드반미 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":383260,\"origSize\":383260,\"loaded\":383260,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:23:36.522Z\",\"completeTimestamp\":1762147435319,\"target_name\":\"o_1j942nvi5b3b1lro1i8ihf1eddd.jpg\"}', '', '210.120.40.117', '2025-11-03 14:23:58'),
(17, 40, '2025', 'storeExplain', 'o_1j942nvi51j88nnr4vm14f01ie0e.jpg', '비카인드반미 2.jpg', '{\"id\":\"o_1j942nvi51j88nnr4vm14f01ie0e\",\"name\":\"비카인드반미 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":326791,\"origSize\":326791,\"loaded\":326791,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:23:20.155Z\",\"completeTimestamp\":1762147435353,\"target_name\":\"o_1j942nvi51j88nnr4vm14f01ie0e.jpg\"}', '', '210.120.40.117', '2025-11-03 14:23:58'),
(18, 40, '2025', 'storeExplain', 'o_1j942nvi557r9t157s1gtvjlf.jpg', '비카인드반미 1.jpg', '{\"id\":\"o_1j942nvi557r9t157s1gtvjlf\",\"name\":\"비카인드반미 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":342385,\"origSize\":342385,\"loaded\":342385,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:23:00.708Z\",\"completeTimestamp\":1762147435386,\"target_name\":\"o_1j942nvi557r9t157s1gtvjlf.jpg\"}', '', '210.120.40.117', '2025-11-03 14:23:58'),
(19, 39, '2025', 'storeExplain', 'o_1j942vrfl1601tfc19471qn8i5bd.jpg', '렛잇비 3.jpg', '{\"id\":\"o_1j942vrfl1601tfc19471qn8i5bd\",\"name\":\"렛잇비 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":124678,\"origSize\":124678,\"loaded\":124678,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:27:56.015Z\",\"completeTimestamp\":1762147693092,\"target_name\":\"o_1j942vrfl1601tfc19471qn8i5bd.jpg\"}', '', '210.120.40.117', '2025-11-03 14:28:19'),
(20, 39, '2025', 'storeExplain', 'o_1j942vrfmobkh761m3d5m4hp7e.jpg', '렛잇비 2.jpg', '{\"id\":\"o_1j942vrfmobkh761m3d5m4hp7e\",\"name\":\"렛잇비 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":171345,\"origSize\":171345,\"loaded\":171345,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:27:37.819Z\",\"completeTimestamp\":1762147693778,\"target_name\":\"o_1j942vrfmobkh761m3d5m4hp7e.jpg\"}', '', '210.120.40.117', '2025-11-03 14:28:19'),
(21, 39, '2025', 'storeExplain', 'o_1j942vrfm1vud9vrt9knue2uaf.jpg', '렛잇비 1.jpg', '{\"id\":\"o_1j942vrfm1vud9vrt9knue2uaf\",\"name\":\"렛잇비 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":87924,\"origSize\":87924,\"loaded\":87924,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:27:25.509Z\",\"completeTimestamp\":1762147693813,\"target_name\":\"o_1j942vrfm1vud9vrt9knue2uaf.jpg\"}', '', '210.120.40.117', '2025-11-03 14:28:19'),
(22, 38, '2025', 'storeExplain', 'o_1j943bmos1tvp16ko14vn1sggea4d.jpg', '미레이 3.jpg', '{\"id\":\"o_1j943bmos1tvp16ko14vn1sggea4d\",\"name\":\"미레이 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":241582,\"origSize\":241582,\"loaded\":241582,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:34:21.920Z\",\"completeTimestamp\":1762148081714,\"target_name\":\"o_1j943bmos1tvp16ko14vn1sggea4d.jpg\"}', '', '210.120.40.117', '2025-11-03 14:34:52'),
(23, 38, '2025', 'storeExplain', 'o_1j943bmospsi8913s11i3fhg6e.jpg', '미레 이2.jpg', '{\"id\":\"o_1j943bmospsi8913s11i3fhg6e\",\"name\":\"미레 이2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":167895,\"origSize\":167895,\"loaded\":167895,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:34:08.051Z\",\"completeTimestamp\":1762148082402,\"target_name\":\"o_1j943bmospsi8913s11i3fhg6e.jpg\"}', '', '210.120.40.117', '2025-11-03 14:34:52'),
(24, 38, '2025', 'storeExplain', 'o_1j943bmos1em71p20rjvhfl2uaf.jpg', '미레이 1.jpg', '{\"id\":\"o_1j943bmos1em71p20rjvhfl2uaf\",\"name\":\"미레이 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":221057,\"origSize\":221057,\"loaded\":221057,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:33:57.193Z\",\"completeTimestamp\":1762148082439,\"target_name\":\"o_1j943bmos1em71p20rjvhfl2uaf.jpg\"}', '', '210.120.40.117', '2025-11-03 14:34:52'),
(25, 37, '2025', 'storeExplain', 'o_1j943ta8b191s13294h11rr13bsd.jpg', '사운즈오브애플 3.jpg', '{\"id\":\"o_1j943ta8b191s13294h11rr13bsd\",\"name\":\"사운즈오브애플 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":341721,\"origSize\":341721,\"loaded\":341721,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:44:04.126Z\",\"completeTimestamp\":1762148659648,\"target_name\":\"o_1j943ta8b191s13294h11rr13bsd.jpg\"}', '', '210.120.40.117', '2025-11-03 14:44:28'),
(26, 37, '2025', 'storeExplain', 'o_1j943ta8brsi7kfo6cspg8ade.jpg', '사운즈오브애플 2.jpg', '{\"id\":\"o_1j943ta8brsi7kfo6cspg8ade\",\"name\":\"사운즈오브애플 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":380191,\"origSize\":380191,\"loaded\":380191,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:43:49.484Z\",\"completeTimestamp\":1762148660167,\"target_name\":\"o_1j943ta8brsi7kfo6cspg8ade.jpg\"}', '', '210.120.40.117', '2025-11-03 14:44:28'),
(27, 37, '2025', 'storeExplain', 'o_1j943ta8bg5u1cbv1aevssgos7f.jpg', '사운즈오브애플 1.jpg', '{\"id\":\"o_1j943ta8bg5u1cbv1aevssgos7f\",\"name\":\"사운즈오브애플 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":375197,\"origSize\":375197,\"loaded\":375197,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:41:23.535Z\",\"completeTimestamp\":1762148660199,\"target_name\":\"o_1j943ta8bg5u1cbv1aevssgos7f.jpg\"}', '', '210.120.40.117', '2025-11-03 14:44:28'),
(28, 35, '2025', 'storeExplain', 'o_1j944f67faiusvglsn17c4tt5d.jpg', '이문카페 3.jpg', '{\"id\":\"o_1j944f67faiusvglsn17c4tt5d\",\"name\":\"이문카페 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":170156,\"origSize\":170156,\"loaded\":170156,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:53:44.159Z\",\"completeTimestamp\":1762149244961,\"target_name\":\"o_1j944f67faiusvglsn17c4tt5d.jpg\"}', '', '210.120.40.117', '2025-11-03 14:54:08'),
(29, 35, '2025', 'storeExplain', 'o_1j944f67f1483174418e19bk1sgme.jpg', '이문카페 2.jpg', '{\"id\":\"o_1j944f67f1483174418e19bk1sgme\",\"name\":\"이문카페 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":369665,\"origSize\":369665,\"loaded\":369665,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:53:32.896Z\",\"completeTimestamp\":1762149245635,\"target_name\":\"o_1j944f67f1483174418e19bk1sgme.jpg\"}', '', '210.120.40.117', '2025-11-03 14:54:08'),
(30, 35, '2025', 'storeExplain', 'o_1j944f67f17o719691ld1802s7uf.png', '이문카페 1.png', '{\"id\":\"o_1j944f67f17o719691ld1802s7uf\",\"name\":\"이문카페 1.png\",\"type\":\"image/png\",\"relativePath\":\"\",\"size\":2621720,\"origSize\":2621720,\"loaded\":2621720,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:53:18.191Z\",\"completeTimestamp\":1762149245775,\"target_name\":\"o_1j944f67f17o719691ld1802s7uf.png\"}', '', '210.120.40.117', '2025-11-03 14:54:08'),
(31, 34, '2025', 'storeExplain', 'o_1j944r5ql1tkdf333q2g5esfmd.jpg', '미벗 3.jpg', '{\"id\":\"o_1j944r5ql1tkdf333q2g5esfmd\",\"name\":\"미벗 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":321332,\"origSize\":321332,\"loaded\":321332,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:59:29.311Z\",\"completeTimestamp\":1762149637480,\"target_name\":\"o_1j944r5ql1tkdf333q2g5esfmd.jpg\"}', '', '210.120.40.117', '2025-11-03 15:00:56'),
(32, 34, '2025', 'storeExplain', 'o_1j944r5ql1qvf1e481hoo1fta1j92e.jpg', '미벗 2.jpg', '{\"id\":\"o_1j944r5ql1qvf1e481hoo1fta1j92e\",\"name\":\"미벗 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":431983,\"origSize\":431983,\"loaded\":431983,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:59:10.179Z\",\"completeTimestamp\":1762149638157,\"target_name\":\"o_1j944r5ql1qvf1e481hoo1fta1j92e.jpg\"}', '', '210.120.40.117', '2025-11-03 15:00:57'),
(33, 34, '2025', 'storeExplain', 'o_1j944r5ql8etkd31lv71qqkl9cf.jpg', '미벗 1.jpg', '{\"id\":\"o_1j944r5ql8etkd31lv71qqkl9cf\",\"name\":\"미벗 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":330720,\"origSize\":330720,\"loaded\":330720,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T05:58:56.182Z\",\"completeTimestamp\":1762149638192,\"target_name\":\"o_1j944r5ql8etkd31lv71qqkl9cf.jpg\"}', '', '210.120.40.117', '2025-11-03 15:00:57'),
(34, 33, '2025', 'storeExplain', 'o_1j945mq1qnnk18d91q5pnlu1dvrd.jpg', '배오개 베이커리 3.jpg', '{\"id\":\"o_1j945mq1qnnk18d91q5pnlu1dvrd\",\"name\":\"배오개 베이커리 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":370755,\"origSize\":370755,\"loaded\":370755,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:15:24.572Z\",\"completeTimestamp\":1762150544159,\"target_name\":\"o_1j945mq1qnnk18d91q5pnlu1dvrd.jpg\"}', '', '210.120.40.117', '2025-11-03 15:15:48'),
(35, 33, '2025', 'storeExplain', 'o_1j945mq1q16tm1rc91q1v5di14o9e.jpg', '배오개 베이커리 2.jpg', '{\"id\":\"o_1j945mq1q16tm1rc91q1v5di14o9e\",\"name\":\"배오개 베이커리 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":323537,\"origSize\":323537,\"loaded\":323537,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:15:10.865Z\",\"completeTimestamp\":1762150544677,\"target_name\":\"o_1j945mq1q16tm1rc91q1v5di14o9e.jpg\"}', '', '210.120.40.117', '2025-11-03 15:15:48'),
(36, 33, '2025', 'storeExplain', 'o_1j945mq1q1asp1cue1oc6ea6ujff.jpg', '배오개 베이커리 1.jpg', '{\"id\":\"o_1j945mq1q1asp1cue1oc6ea6ujff\",\"name\":\"배오개 베이커리 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":350327,\"origSize\":350327,\"loaded\":350327,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:14:58.346Z\",\"completeTimestamp\":1762150544711,\"target_name\":\"o_1j945mq1q1asp1cue1oc6ea6ujff.jpg\"}', '', '210.120.40.117', '2025-11-03 15:15:48'),
(37, 32, '2025', 'storeExplain', 'o_1j94670dfcj4p5n1g8711gk1d9ld.jpg', '개뿔 3.jpg', '{\"id\":\"o_1j94670dfcj4p5n1g8711gk1d9ld\",\"name\":\"개뿔 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":198921,\"origSize\":198921,\"loaded\":198921,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:24:16.896Z\",\"completeTimestamp\":1762151073399,\"target_name\":\"o_1j94670dfcj4p5n1g8711gk1d9ld.jpg\"}', '', '210.120.40.117', '2025-11-03 15:24:37'),
(38, 32, '2025', 'storeExplain', 'o_1j94670df1t22s6qm9b1a44epee.jpg', '개뿔 2.jpg', '{\"id\":\"o_1j94670df1t22s6qm9b1a44epee\",\"name\":\"개뿔 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":189461,\"origSize\":189461,\"loaded\":189461,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:24:07.169Z\",\"completeTimestamp\":1762151074060,\"target_name\":\"o_1j94670df1t22s6qm9b1a44epee.jpg\"}', '', '210.120.40.117', '2025-11-03 15:24:37'),
(39, 32, '2025', 'storeExplain', 'o_1j94670df1ph4gliq716uaurhf.jpg', '개뿔 1.jpg', '{\"id\":\"o_1j94670df1ph4gliq716uaurhf\",\"name\":\"개뿔 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":178824,\"origSize\":178824,\"loaded\":178824,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:23:53.998Z\",\"completeTimestamp\":1762151074101,\"target_name\":\"o_1j94670df1ph4gliq716uaurhf.jpg\"}', '', '210.120.40.117', '2025-11-03 15:24:37'),
(40, 31, '2025', 'storeExplain', 'o_1j946gnkjflnh1l1mclpnv1f6cd.jpg', '오리지날백패커스 3.jpg', '{\"id\":\"o_1j946gnkjflnh1l1mclpnv1f6cd\",\"name\":\"오리지날백패커스 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":360177,\"origSize\":360177,\"loaded\":360177,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:28:35.529Z\",\"completeTimestamp\":1762151391796,\"target_name\":\"o_1j946gnkjflnh1l1mclpnv1f6cd.jpg\"}', '', '210.120.40.117', '2025-11-03 15:29:54'),
(41, 31, '2025', 'storeExplain', 'o_1j946gnkj1jk716l9rb01u9rdane.jpg', '오리지날백패커스 2.jpg', '{\"id\":\"o_1j946gnkj1jk716l9rb01u9rdane\",\"name\":\"오리지날백패커스 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":290140,\"origSize\":290140,\"loaded\":290140,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:28:24.368Z\",\"completeTimestamp\":1762151392300,\"target_name\":\"o_1j946gnkj1jk716l9rb01u9rdane.jpg\"}', '', '210.120.40.117', '2025-11-03 15:29:54'),
(42, 31, '2025', 'storeExplain', 'o_1j946gnkj1dt3esffu46j9n7f.jpg', '오리지날백패커스 1.jpg', '{\"id\":\"o_1j946gnkj1dt3esffu46j9n7f\",\"name\":\"오리지날백패커스 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":389723,\"origSize\":389723,\"loaded\":389723,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:28:11.423Z\",\"completeTimestamp\":1762151392332,\"target_name\":\"o_1j946gnkj1dt3esffu46j9n7f.jpg\"}', '', '210.120.40.117', '2025-11-03 15:29:54'),
(43, 30, '2025', 'storeExplain', 'o_1j946r6ijrfs4m08pi112j1ll5d.jpg', '호텔밀리오레 3.jpg', '{\"id\":\"o_1j946r6ijrfs4m08pi112j1ll5d\",\"name\":\"호텔밀리오레 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":123512,\"origSize\":123512,\"loaded\":123512,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:35:17.303Z\",\"completeTimestamp\":1762151734832,\"target_name\":\"o_1j946r6ijrfs4m08pi112j1ll5d.jpg\"}', '', '210.120.40.117', '2025-11-03 15:35:38'),
(44, 30, '2025', 'storeExplain', 'o_1j946r6ij1ufv1vtj19h414f01agke.jpg', '호텔밀리오레 2.jpg', '{\"id\":\"o_1j946r6ij1ufv1vtj19h414f01agke\",\"name\":\"호텔밀리오레 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":156888,\"origSize\":156888,\"loaded\":156888,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:35:04.903Z\",\"completeTimestamp\":1762151734871,\"target_name\":\"o_1j946r6ij1ufv1vtj19h414f01agke.jpg\"}', '', '210.120.40.117', '2025-11-03 15:35:38'),
(45, 30, '2025', 'storeExplain', 'o_1j946r6ij34c1q9e1a591q8mjvaf.png', '호텔밀리오레 1.png', '{\"id\":\"o_1j946r6ij34c1q9e1a591q8mjvaf\",\"name\":\"호텔밀리오레 1.png\",\"type\":\"image/png\",\"relativePath\":\"\",\"size\":860518,\"origSize\":860518,\"loaded\":860518,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T06:34:41.995Z\",\"completeTimestamp\":1762151734912,\"target_name\":\"o_1j946r6ij34c1q9e1a591q8mjvaf.png\"}', '', '210.120.40.117', '2025-11-03 15:35:38'),
(49, 28, '2025', 'storeExplain', 'o_1j949i3uc1jq81mem1m0v17lti97c.jpg', '시그니처짐 2.jpg', '{\"id\":\"o_1j949i3uc1jq81mem1m0v17lti97c\",\"name\":\"시그니처짐 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":393103,\"origSize\":393103,\"loaded\":393103,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T07:22:44.348Z\",\"completeTimestamp\":1762154582673,\"target_name\":\"o_1j949i3uc1jq81mem1m0v17lti97c.jpg\"}', '', '210.120.40.117', '2025-11-03 16:23:04'),
(50, 28, '2025', 'storeExplain', 'o_1j949i3uc1qfevlmk6n1mlf1h3pd.jpg', '시그니처짐 1.jpg', '{\"id\":\"o_1j949i3uc1qfevlmk6n1mlf1h3pd\",\"name\":\"시그니처짐 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":306167,\"origSize\":306167,\"loaded\":306167,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T07:22:13.371Z\",\"completeTimestamp\":1762154582712,\"target_name\":\"o_1j949i3uc1qfevlmk6n1mlf1h3pd.jpg\"}', '', '210.120.40.117', '2025-11-03 16:23:04'),
(51, 27, '2025', 'storeExplain', 'o_1j94a930p19plf44hvo1d3b7akc.jpg', '네일몰 2.jpg', '{\"id\":\"o_1j94a930p19plf44hvo1d3b7akc\",\"name\":\"네일몰 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":340904,\"origSize\":340904,\"loaded\":340904,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T07:33:27.218Z\",\"completeTimestamp\":1762155335447,\"target_name\":\"o_1j94a930p19plf44hvo1d3b7akc.jpg\"}', '', '210.120.40.117', '2025-11-03 16:35:37'),
(52, 27, '2025', 'storeExplain', 'o_1j94a930pqrlvs9ml1k7u1d6ed.jpg', '네일몰 1.jpg', '{\"id\":\"o_1j94a930pqrlvs9ml1k7u1d6ed\",\"name\":\"네일몰 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":355913,\"origSize\":355913,\"loaded\":355913,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T07:33:15.590Z\",\"completeTimestamp\":1762155335965,\"target_name\":\"o_1j94a930pqrlvs9ml1k7u1d6ed.jpg\"}', '', '210.120.40.117', '2025-11-03 16:35:37'),
(53, 23, '2025', 'storeExplain', 'o_1j94b7jd22dn174jchq1pp48ekc.png', '뉴뉴 2.png', '{\"id\":\"o_1j94b7jd22dn174jchq1pp48ekc\",\"name\":\"뉴뉴 2.png\",\"type\":\"image/png\",\"relativePath\":\"\",\"size\":1377523,\"origSize\":1377523,\"loaded\":1377523,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T07:51:50.380Z\",\"completeTimestamp\":1762156336012,\"target_name\":\"o_1j94b7jd22dn174jchq1pp48ekc.png\"}', '', '210.120.40.117', '2025-11-03 16:52:18'),
(54, 23, '2025', 'storeExplain', 'o_1j94b7jd27np7op12t71hjn1k6dd.png', '뉴뉴 1.png', '{\"id\":\"o_1j94b7jd27np7op12t71hjn1k6dd\",\"name\":\"뉴뉴 1.png\",\"type\":\"image/png\",\"relativePath\":\"\",\"size\":1953290,\"origSize\":1953290,\"loaded\":1953290,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T07:51:40.157Z\",\"completeTimestamp\":1762156336103,\"target_name\":\"o_1j94b7jd27np7op12t71hjn1k6dd.png\"}', '', '210.120.40.117', '2025-11-03 16:52:19'),
(55, 8, '2025', 'storeExplain', 'o_1j94bmcph1tnhls6neg1jhm1ig2c.jpg', '삼청동샤브 2.jpg', '{\"id\":\"o_1j94bmcph1tnhls6neg1jhm1ig2c\",\"name\":\"삼청동샤브 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":268408,\"origSize\":268408,\"loaded\":268408,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:00:06.193Z\",\"completeTimestamp\":1762156820669,\"target_name\":\"o_1j94bmcph1tnhls6neg1jhm1ig2c.jpg\"}', '', '210.120.40.117', '2025-11-03 17:00:23'),
(56, 8, '2025', 'storeExplain', 'o_1j94bmcphs6fc3u1ro096v450d.jpg', '삼청동샤브 1.jpg', '{\"id\":\"o_1j94bmcphs6fc3u1ro096v450d\",\"name\":\"삼청동샤브 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":482334,\"origSize\":482334,\"loaded\":482334,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T07:59:44.341Z\",\"completeTimestamp\":1762156821196,\"target_name\":\"o_1j94bmcphs6fc3u1ro096v450d.jpg\"}', '', '210.120.40.117', '2025-11-03 17:00:23'),
(57, 9, '2025', 'storeExplain', 'o_1j94c18gb1vcv7j117b311c165md.jpg', '청담이수육애칼국수 3.jpg', '{\"id\":\"o_1j94c18gb1vcv7j117b311c165md\",\"name\":\"청담이수육애칼국수 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":365773,\"origSize\":365773,\"loaded\":365773,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:05:57.668Z\",\"completeTimestamp\":1762157176546,\"target_name\":\"o_1j94c18gb1vcv7j117b311c165md.jpg\"}', '', '210.120.40.117', '2025-11-03 17:06:19'),
(58, 9, '2025', 'storeExplain', 'o_1j94c18gb2iemp11qfh1b6b12f0e.jpg', '청담이수육애칼국수 2.jpg', '{\"id\":\"o_1j94c18gb2iemp11qfh1b6b12f0e\",\"name\":\"청담이수육애칼국수 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":312315,\"origSize\":312315,\"loaded\":312315,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:05:34.773Z\",\"completeTimestamp\":1762157177214,\"target_name\":\"o_1j94c18gb2iemp11qfh1b6b12f0e.jpg\"}', '', '210.120.40.117', '2025-11-03 17:06:19'),
(59, 9, '2025', 'storeExplain', 'o_1j94c18gb3um1llu18781hul1ktqf.jpg', '청담이수육애칼국수 1.jpg', '{\"id\":\"o_1j94c18gb3um1llu18781hul1ktqf\",\"name\":\"청담이수육애칼국수 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":336820,\"origSize\":336820,\"loaded\":336820,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:05:20.334Z\",\"completeTimestamp\":1762157177253,\"target_name\":\"o_1j94c18gb3um1llu18781hul1ktqf.jpg\"}', '', '210.120.40.117', '2025-11-03 17:06:19'),
(60, 10, '2025', 'storeExplain', 'o_1j94c89ba60utueu01s5jclob.png', '커피붕붕 1.png', '{\"id\":\"o_1j94c89ba60utueu01s5jclob\",\"name\":\"커피붕붕 1.png\",\"type\":\"image/png\",\"relativePath\":\"\",\"size\":24735,\"origSize\":24735,\"loaded\":24735,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:09:37.773Z\",\"completeTimestamp\":1762157406305,\"target_name\":\"o_1j94c89ba60utueu01s5jclob.png\"}', '', '210.120.40.117', '2025-11-03 17:10:08'),
(61, 11, '2025', 'storeExplain', 'o_1j94ce9brf6j1cf11e2p1emd1p71d.jpg', '연남방앗간 3.jpg', '{\"id\":\"o_1j94ce9brf6j1cf11e2p1emd1p71d\",\"name\":\"연남방앗간 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":184756,\"origSize\":184756,\"loaded\":184756,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:13:06.525Z\",\"completeTimestamp\":1762157603496,\"target_name\":\"o_1j94ce9brf6j1cf11e2p1emd1p71d.jpg\"}', '', '210.120.40.117', '2025-11-03 17:13:26'),
(62, 11, '2025', 'storeExplain', 'o_1j94ce9brdt1ai55dbp76p5me.jpg', '연남방앗간 2.jpg', '{\"id\":\"o_1j94ce9brdt1ai55dbp76p5me\",\"name\":\"연남방앗간 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":202973,\"origSize\":202973,\"loaded\":202973,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:12:51.863Z\",\"completeTimestamp\":1762157604157,\"target_name\":\"o_1j94ce9brdt1ai55dbp76p5me.jpg\"}', '', '210.120.40.117', '2025-11-03 17:13:26'),
(63, 11, '2025', 'storeExplain', 'o_1j94ce9brpc22gt19ff1g0911pvf.png', '연남방앗간 1.png', '{\"id\":\"o_1j94ce9brpc22gt19ff1g0911pvf\",\"name\":\"연남방앗간 1.png\",\"type\":\"image/png\",\"relativePath\":\"\",\"size\":71710,\"origSize\":71710,\"loaded\":71710,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:12:25.210Z\",\"completeTimestamp\":1762157604187,\"target_name\":\"o_1j94ce9brpc22gt19ff1g0911pvf.png\"}', '', '210.120.40.117', '2025-11-03 17:13:26'),
(64, 22, '2025', 'storeExplain', 'o_1j94ck33hspjf5v1vc11vrf1accd.jpg', '미미라인 3.jpg', '{\"id\":\"o_1j94ck33hspjf5v1vc11vrf1accd\",\"name\":\"미미라인 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":587946,\"origSize\":587946,\"loaded\":587946,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:16:17.768Z\",\"completeTimestamp\":1762157793237,\"target_name\":\"o_1j94ck33hspjf5v1vc11vrf1accd.jpg\"}', '', '210.120.40.117', '2025-11-03 17:16:36'),
(65, 22, '2025', 'storeExplain', 'o_1j94ck33h13b911rm64167c4nke.jpg', '미미라인 2.jpg', '{\"id\":\"o_1j94ck33h13b911rm64167c4nke\",\"name\":\"미미라인 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":437625,\"origSize\":437625,\"loaded\":437625,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:16:07.893Z\",\"completeTimestamp\":1762157793743,\"target_name\":\"o_1j94ck33h13b911rm64167c4nke.jpg\"}', '', '210.120.40.117', '2025-11-03 17:16:36'),
(66, 22, '2025', 'storeExplain', 'o_1j94ck33h1kijse3um1p73e54f.jpg', '미미라인 1.jpg', '{\"id\":\"o_1j94ck33h1kijse3um1p73e54f\",\"name\":\"미미라인 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":399694,\"origSize\":399694,\"loaded\":399694,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:15:58.065Z\",\"completeTimestamp\":1762157793777,\"target_name\":\"o_1j94ck33h1kijse3um1p73e54f.jpg\"}', '', '210.120.40.117', '2025-11-03 17:16:36'),
(73, 14, '2025', 'storeExplain', 'o_1j94erjn2ncan9a1fa11561tgid.jpg', '별난오리 3.jpg', '{\"id\":\"o_1j94erjn2ncan9a1fa11561tgid\",\"name\":\"별난오리 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":240718,\"origSize\":240718,\"loaded\":240718,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:55:21.708Z\",\"completeTimestamp\":1762160137189,\"target_name\":\"o_1j94erjn2ncan9a1fa11561tgid.jpg\"}', '', '210.120.40.117', '2025-11-03 17:55:41'),
(74, 14, '2025', 'storeExplain', 'o_1j94erjn21gcg10a9aos109j12jue.jpg', '별난오리 2.jpg', '{\"id\":\"o_1j94erjn21gcg10a9aos109j12jue\",\"name\":\"별난오리 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":359682,\"origSize\":359682,\"loaded\":359682,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:55:09.022Z\",\"completeTimestamp\":1762160137878,\"target_name\":\"o_1j94erjn21gcg10a9aos109j12jue.jpg\"}', '', '210.120.40.117', '2025-11-03 17:55:41'),
(75, 14, '2025', 'storeExplain', 'o_1j94erjn2kce7ko1agm7aq19cif.jpg', '별난오리 1.jpg', '{\"id\":\"o_1j94erjn2kce7ko1agm7aq19cif\",\"name\":\"별난오리 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":86631,\"origSize\":86631,\"loaded\":86631,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:54:53.505Z\",\"completeTimestamp\":1762160137911,\"target_name\":\"o_1j94erjn2kce7ko1agm7aq19cif.jpg\"}', '', '210.120.40.117', '2025-11-03 17:55:41'),
(76, 15, '2025', 'storeExplain', 'o_1j94evi5v1j6b10h51ucm10gf16aud.jpg', '오향 3.jpg', '{\"id\":\"o_1j94evi5v1j6b10h51ucm10gf16aud\",\"name\":\"오향 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":353358,\"origSize\":353358,\"loaded\":353358,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:57:18.682Z\",\"completeTimestamp\":1762160266286,\"target_name\":\"o_1j94evi5v1j6b10h51ucm10gf16aud.jpg\"}', '', '210.120.40.117', '2025-11-03 17:57:49'),
(77, 15, '2025', 'storeExplain', 'o_1j94evi5vnqh1uhtmolb0k12rte.jpg', '오향 2.jpg', '{\"id\":\"o_1j94evi5vnqh1uhtmolb0k12rte\",\"name\":\"오향 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":262511,\"origSize\":262511,\"loaded\":262511,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:57:09.367Z\",\"completeTimestamp\":1762160266955,\"target_name\":\"o_1j94evi5vnqh1uhtmolb0k12rte.jpg\"}', '', '210.120.40.117', '2025-11-03 17:57:49'),
(78, 15, '2025', 'storeExplain', 'o_1j94evi5varm1ald10431es61mnkf.jpg', '오향 1.jpg', '{\"id\":\"o_1j94evi5varm1ald10431es61mnkf\",\"name\":\"오향 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":397377,\"origSize\":397377,\"loaded\":397377,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-03T08:56:57.397Z\",\"completeTimestamp\":1762160266992,\"target_name\":\"o_1j94evi5varm1ald10431es61mnkf.jpg\"}', '', '210.120.40.117', '2025-11-03 17:57:49'),
(79, 1, '2025', 'storeExplain', 'o_1j96hlqcsf6gibk1fvjgq51pqmd.jpg', 'DDP디자인스토어 3.jpg', '{\"id\":\"o_1j96hlqcsf6gibk1fvjgq51pqmd\",\"name\":\"DDP디자인스토어 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":90549,\"origSize\":90549,\"loaded\":90549,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T04:23:05.390Z\",\"completeTimestamp\":1762230201442,\"target_name\":\"o_1j96hlqcsf6gibk1fvjgq51pqmd.jpg\"}', '', '210.120.40.117', '2025-11-04 13:23:25'),
(80, 1, '2025', 'storeExplain', 'o_1j96hlqcs1ptb19eo5f1ls2gdie.jpg', 'DDP디자인스토어 2.jpg', '{\"id\":\"o_1j96hlqcs1ptb19eo5f1ls2gdie\",\"name\":\"DDP디자인스토어 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":97390,\"origSize\":97390,\"loaded\":97390,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T04:22:45.092Z\",\"completeTimestamp\":1762230202002,\"target_name\":\"o_1j96hlqcs1ptb19eo5f1ls2gdie.jpg\"}', '', '210.120.40.117', '2025-11-04 13:23:25'),
(81, 1, '2025', 'storeExplain', 'o_1j96hlqcs7jlgipdqb1hmc145f.jpg', 'DDP디자인스토어 1.jpg', '{\"id\":\"o_1j96hlqcs7jlgipdqb1hmc145f\",\"name\":\"DDP디자인스토어 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":133759,\"origSize\":133759,\"loaded\":133759,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T04:22:28.176Z\",\"completeTimestamp\":1762230202038,\"target_name\":\"o_1j96hlqcs7jlgipdqb1hmc145f.jpg\"}', '', '210.120.40.117', '2025-11-04 13:23:25'),
(87, 18, '2025', 'storeExplain', 'o_1j96jqm121utgbph10st7kp1bfod.jpg', '제이히든하우스 3.jpg', '{\"id\":\"o_1j96jqm121utgbph10st7kp1bfod\",\"name\":\"제이히든하우스 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":275873,\"origSize\":275873,\"loaded\":275873,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T05:00:40.651Z\",\"completeTimestamp\":1762232457966,\"target_name\":\"o_1j96jqm121utgbph10st7kp1bfod.jpg\"}', '', '210.120.40.117', '2025-11-04 14:01:01'),
(88, 18, '2025', 'storeExplain', 'o_1j96jqm121ngn15or1512n8p1vsce.jpg', '제이히든하우스 2.jpg', '{\"id\":\"o_1j96jqm121ngn15or1512n8p1vsce\",\"name\":\"제이히든하우스 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":253810,\"origSize\":253810,\"loaded\":253810,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T05:00:25.525Z\",\"completeTimestamp\":1762232457999,\"target_name\":\"o_1j96jqm121ngn15or1512n8p1vsce.jpg\"}', '', '210.120.40.117', '2025-11-04 14:01:01'),
(89, 18, '2025', 'storeExplain', 'o_1j96jqm121js7d7ral18bllemf.jpg', '제이히든하우스 1.jpg', '{\"id\":\"o_1j96jqm121js7d7ral18bllemf\",\"name\":\"제이히든하우스 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":159427,\"origSize\":159427,\"loaded\":159427,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T05:00:14.491Z\",\"completeTimestamp\":1762232458030,\"target_name\":\"o_1j96jqm121js7d7ral18bllemf.jpg\"}', '', '210.120.40.117', '2025-11-04 14:01:01'),
(90, 19, '2025', 'storeExplain', 'o_1j96k8eo98oo1ajmn4e1j3r1flfd.jpg', '어페어커피 3.jpg', '{\"id\":\"o_1j96k8eo98oo1ajmn4e1j3r1flfd\",\"name\":\"어페어커피 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":689537,\"origSize\":689537,\"loaded\":689537,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T05:05:39.349Z\",\"completeTimestamp\":1762232909294,\"target_name\":\"o_1j96k8eo98oo1ajmn4e1j3r1flfd.jpg\"}', '', '210.120.40.117', '2025-11-04 14:08:33'),
(91, 19, '2025', 'storeExplain', 'o_1j96k8eo9do51aljdgf6q116dte.jpg', '어페어커피 2.jpg', '{\"id\":\"o_1j96k8eo9do51aljdgf6q116dte\",\"name\":\"어페어커피 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":306510,\"origSize\":306510,\"loaded\":306510,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T05:05:19.096Z\",\"completeTimestamp\":1762232909963,\"target_name\":\"o_1j96k8eo9do51aljdgf6q116dte.jpg\"}', '', '210.120.40.117', '2025-11-04 14:08:34'),
(92, 19, '2025', 'storeExplain', 'o_1j96k8eo9tnk42116mhi4s324f.jpg', '어페어커피 1.jpg', '{\"id\":\"o_1j96k8eo9tnk42116mhi4s324f\",\"name\":\"어페어커피 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":178954,\"origSize\":178954,\"loaded\":178954,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T05:05:06.678Z\",\"completeTimestamp\":1762232909995,\"target_name\":\"o_1j96k8eo9tnk42116mhi4s324f.jpg\"}', '', '210.120.40.117', '2025-11-04 14:08:34'),
(93, 20, '2025', 'storeExplain', 'o_1j96kdnuol2luqpq3rr6d9spd.jpg', '장프리고 3.jpg', '{\"id\":\"o_1j96kdnuol2luqpq3rr6d9spd\",\"name\":\"장프리고 3.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":380580,\"origSize\":380580,\"loaded\":380580,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T05:11:07.298Z\",\"completeTimestamp\":1762233082839,\"target_name\":\"o_1j96kdnuol2luqpq3rr6d9spd.jpg\"}', '', '210.120.40.117', '2025-11-04 14:11:25'),
(94, 20, '2025', 'storeExplain', 'o_1j96kdnuo188d139s1fql1qh4eo9e.jpg', '장프리고 2.jpg', '{\"id\":\"o_1j96kdnuo188d139s1fql1qh4eo9e\",\"name\":\"장프리고 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":409469,\"origSize\":409469,\"loaded\":409469,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T05:10:54.603Z\",\"completeTimestamp\":1762233083380,\"target_name\":\"o_1j96kdnuo188d139s1fql1qh4eo9e.jpg\"}', '', '210.120.40.117', '2025-11-04 14:11:25'),
(95, 20, '2025', 'storeExplain', 'o_1j96kdnup1hlufo3s4i19oq1s46f.jpg', '장프리고 1.jpg', '{\"id\":\"o_1j96kdnup1hlufo3s4i19oq1s46f\",\"name\":\"장프리고 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":314257,\"origSize\":314257,\"loaded\":314257,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-04T05:10:44.143Z\",\"completeTimestamp\":1762233083414,\"target_name\":\"o_1j96kdnup1hlufo3s4i19oq1s46f.jpg\"}', '', '210.120.40.117', '2025-11-04 14:11:25'),
(99, 7, '2025', 'storeExplain', 'o_1j9bou5jbf6c97t1sa611f2galc.jpg', '아임타입 2.jpg', '{\"id\":\"o_1j9bou5jbf6c97t1sa611f2galc\",\"name\":\"아임타입 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":51481,\"origSize\":51481,\"loaded\":51481,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-06T05:06:06.687Z\",\"completeTimestamp\":1762405587625,\"target_name\":\"o_1j9bou5jbf6c97t1sa611f2galc.jpg\"}', '', '210.120.40.117', '2025-11-06 14:06:29'),
(100, 7, '2025', 'storeExplain', 'o_1j9bou5jbnti1vbc15ck1f4tub1d.jpg', '아임타입 1.jpg', '{\"id\":\"o_1j9bou5jbnti1vbc15ck1f4tub1d\",\"name\":\"아임타입 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":55838,\"origSize\":55838,\"loaded\":55838,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-06T05:05:54.467Z\",\"completeTimestamp\":1762405588145,\"target_name\":\"o_1j9bou5jbnti1vbc15ck1f4tub1d.jpg\"}', '', '210.120.40.117', '2025-11-06 14:06:29'),
(101, 36, '2025', 'storeExplain', 'o_1j9bpvavsbt6189s7ue16rr174ic.jpg', '티이티이 2.jpg', '{\"id\":\"o_1j9bpvavsbt6189s7ue16rr174ic\",\"name\":\"티이티이 2.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":149510,\"origSize\":149510,\"loaded\":149510,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-06T05:24:18.116Z\",\"completeTimestamp\":1762406673879,\"target_name\":\"o_1j9bpvavsbt6189s7ue16rr174ic.jpg\"}', '', '210.120.40.117', '2025-11-06 14:24:35'),
(102, 36, '2025', 'storeExplain', 'o_1j9bpvavs1l4to29jsv1h1moq0d.jpg', '티이티이 1.jpg', '{\"id\":\"o_1j9bpvavs1l4to29jsv1h1moq0d\",\"name\":\"티이티이 1.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"\",\"size\":110359,\"origSize\":110359,\"loaded\":110359,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-11-06T05:23:57.903Z\",\"completeTimestamp\":1762406674396,\"target_name\":\"o_1j9bpvavs1l4to29jsv1h1moq0d.jpg\"}', '', '210.120.40.117', '2025-11-06 14:24:35'),
(103, 42, '2025', 'storeExplain', 'o_1jcnhijgs1nvofmt1sel1p8q48fi.jpg', '일반비_두타몰전경_1200x1200px.jpg', '{\"id\":\"o_1jcnhijgs1nvofmt1sel1p8q48fi\",\"name\":\"일반비_두타몰전경_1200x1200px.jpg\",\"type\":\"image/jpeg\",\"relativePath\":\"/일반비_두타몰전경_1200x1200px.jpg\",\"size\":1455458,\"origSize\":1455458,\"loaded\":1455458,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2025-12-17T07:15:02.048Z\",\"completeTimestamp\":1766021762920,\"target_name\":\"o_1jcnhijgs1nvofmt1sel1p8q48fi.jpg\"}', '', '203.226.142.17', '2025-12-18 10:36:05'),
(108, 5, '2025', 'storeExplain', 'o_1jderutrm125ctuh911bsenk3b.png', '동대문점 전경(뉴).png', '{\"id\":\"o_1jderutrm125ctuh911bsenk3b\",\"name\":\"동대문점 전경(뉴).png\",\"type\":\"image/png\",\"relativePath\":\"\",\"size\":12520742,\"origSize\":12520742,\"loaded\":12520742,\"percent\":100,\"status\":5,\"lastModifiedDate\":\"2024-09-28T12:45:30.000Z\",\"completeTimestamp\":1766804391405,\"target_name\":\"o_1jderutrm125ctuh911bsenk3b.png\"}', '', '203.228.139.69', '2025-12-27 11:59:54');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_store_member`
--

CREATE TABLE `dsp_store_member` (
  `no` int(20) NOT NULL,
  `storeNo` int(20) NOT NULL,
  `memNo` int(20) NOT NULL,
  `regID` varchar(50) NOT NULL,
  `regIP` varchar(30) NOT NULL,
  `regDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_store_member`
--

INSERT INTO `dsp_store_member` (`no`, `storeNo`, `memNo`, `regID`, `regIP`, `regDate`) VALUES
(3, 5, 5, 'admin', '192.168.0.1', '2025-11-02 21:21:56'),
(9, 42, 27, 'admin', '210.120.40.117', '2025-12-17 15:45:07'),
(10, 5, 28, 'admin', '210.120.40.117', '2025-12-17 16:14:45'),
(11, 42, 29, 'admin', '210.120.40.117', '2025-12-18 09:18:53'),
(12, 42, 30, 'admin', '210.120.40.117', '2025-12-18 09:18:55'),
(13, 42, 11, 'admin', '210.120.40.117', '2025-12-18 09:19:07'),
(14, 41, 11, 'admin', '210.120.40.117', '2025-12-19 09:56:29'),
(15, 40, 11, 'admin', '210.120.40.117', '2025-12-19 09:56:35'),
(16, 39, 11, 'admin', '210.120.40.117', '2025-12-19 09:56:40'),
(17, 38, 11, 'admin', '210.120.40.117', '2025-12-19 09:56:47'),
(18, 37, 11, 'admin', '210.120.40.117', '2025-12-19 09:56:52'),
(19, 36, 11, 'admin', '210.120.40.117', '2025-12-19 09:56:58'),
(20, 35, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:03'),
(21, 34, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:07'),
(23, 33, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:17'),
(24, 32, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:22'),
(25, 31, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:26'),
(26, 30, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:31'),
(27, 28, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:36'),
(28, 27, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:42'),
(29, 26, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:46'),
(30, 25, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:52'),
(31, 24, 11, 'admin', '210.120.40.117', '2025-12-19 09:57:57'),
(32, 23, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:02'),
(33, 22, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:07'),
(34, 20, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:15'),
(35, 19, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:20'),
(36, 18, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:24'),
(37, 17, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:28'),
(38, 15, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:33'),
(39, 14, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:39'),
(40, 11, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:44'),
(41, 10, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:47'),
(42, 9, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:52'),
(43, 8, 11, 'admin', '210.120.40.117', '2025-12-19 09:58:56'),
(44, 7, 11, 'admin', '210.120.40.117', '2025-12-19 09:59:01'),
(45, 6, 11, 'admin', '210.120.40.117', '2025-12-19 09:59:07'),
(46, 4, 11, 'admin', '210.120.40.117', '2025-12-19 09:59:13'),
(47, 3, 11, 'admin', '210.120.40.117', '2025-12-19 09:59:18'),
(48, 1, 11, 'admin', '210.120.40.117', '2025-12-19 09:59:21');

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_tempsave`
--

CREATE TABLE `dsp_tempsave` (
  `tmp_id` int(11) UNSIGNED NOT NULL,
  `brd_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `tmp_title` varchar(255) NOT NULL DEFAULT '',
  `tmp_content` mediumtext DEFAULT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `tmp_ip` varchar(50) NOT NULL DEFAULT '',
  `tmp_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_unique_id`
--

CREATE TABLE `dsp_unique_id` (
  `unq_id` bigint(20) UNSIGNED NOT NULL,
  `unq_ip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `dsp_user_uuids`
--

CREATE TABLE `dsp_user_uuids` (
  `id` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `user_agent` text NOT NULL,
  `client_uuid` varchar(36) DEFAULT NULL,
  `uuid` varchar(64) NOT NULL,
  `capture` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `dsp_user_uuids`
--

INSERT INTO `dsp_user_uuids` (`id`, `ip`, `user_agent`, `client_uuid`, `uuid`, `capture`, `created_at`) VALUES
(1, '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '063cbecc-4c32-4f86-9d35-199d76ccc055', '6bbd9c2156cae910c1ba0bcb7e41fcdc0b43114ef91f3f96d84e0befa6b6ccb8', NULL, '2025-06-17 14:25:45'),
(2, '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 19_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'b6b0f6dfb633e33d7c84eb80024a8556', '9738154e2070e94945e8e6e348e3f6c467441557278054acebfdd27fa8b3344e', NULL, '2025-06-17 17:18:02'),
(3, '14.36.217.193', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '990af8e35201b586f12ba61064d4600f', 'fde2653b5a04fbb88e4ccf0f27a66f5e2b37186c94f7f0503ed28d46df9d9a8b', NULL, '2025-06-24 04:54:21'),
(4, '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'd947e37fecbc33c26ae1fc0f2f62c1bb', 'a2e793f822e78781a20fbc3cdbdfec1e05c4a59ba7d4485451a128d7a2cd9c69', NULL, '2025-08-08 04:42:01'),
(5, '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '3b86d58a414d668c69b37c45044d94f4', '2907857f1ba78fd6783a2aba1f0c2f5fff891285d7bd2c3dd6e6525294cefd33', NULL, '2025-08-08 04:45:02'),
(6, '210.120.40.53', 'Mozilla/5.0 (Linux; Android 15; SM-S936N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/138.0.7204.179 Mobile Safari/537.36 KAKAOTALK/25.6.6 (INAPP) ', '3c9609ba80e9fa621983186bb11a0fd6', 'b87ef1bc9bccc7e8e24b5a3cc0914013354559e10685dc7ab363da66a58d9834', NULL, '2025-08-08 04:45:16'),
(7, '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'd79a96b2712c45214157b3bc9249eee4', '5e3c413f6518fd8f71e3756c0fa8534fd54666e99f42e0b5a002b6aefa9b4fc0', NULL, '2025-09-09 02:26:03'),
(8, '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '4961bcee9965dbccb897ab03579dd847', '15da7edc64da4457be91daebecfc7229f080fdb8b06790082e9655deedc2a0b3', NULL, '2025-09-09 02:26:56'),
(9, '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.7.5 (INAPP)', 'cc3e9c4913d06f7e7a2b0c3be73552ae', '300e05925796548c7a5b1ce62816b62f670246f476042b0137b626cd19143fda', NULL, '2025-09-09 02:27:17'),
(10, '118.235.10.176', 'Mozilla/5.0 (iPad; CPU OS 26_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'a7dbbb2bda5c681c82726fa36ce18a26', 'e3ffdc3d8dbe424b73fa75768743b1be8b2870de87f14b35d76f60f0ad388cf2', NULL, '2025-09-09 05:17:42'),
(11, '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '0f2010f872b1ee96d1f03a4b19f0602c', '8a236ce4abe10b79599d271fc0e3cd7c32abbbf1e3db5ad5db3bd3f83d9c9ce8', NULL, '2025-09-18 05:25:31'),
(12, '121.65.239.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '4ed38224c1c350e36365475f51c1f585', '98b1a8759c273287720ff027eccd6fa4911aed4a80b9193f34cd2a2d1338899c', NULL, '2025-09-18 07:49:10'),
(13, '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'aff220e9a435f651051ae4008f90c9f9', '85464176b7454c99ee6f5dac1fda19bd740fc4b0554248597cdb922e417a0335', NULL, '2025-09-30 08:37:49'),
(14, '106.101.131.213', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.8.3 (INAPP)', '53870f12bf7154b4fa9af362e4d4d0ae', 'af982f9d4cdd55d235918288cd0f3d2046b5123f4fd8441b6d88cb7451b5962d', NULL, '2025-09-30 23:03:46'),
(15, '210.120.40.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2884f1f01b952d7a1cf259aa4114a291', 'bd85e71510d00f30071b44c3ef6af48fbc3b02e002a84733686b93159e213f14', NULL, '2025-10-01 00:19:29'),
(16, '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.8.4 (INAPP)', '942e0886bc519c722cb381f6efee5a50', '469ca1d9ff97d35e8dcb7ac79384f1f0f2ea2f3af4ca758078dff7fe942218ae', NULL, '2025-10-05 01:12:13'),
(17, '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'dcf73ad60215f8061ed51ad2b65ef324', '05a270ace916d11999303a7a9f5b3ffda49d4673a45081b5cc5113c5a2f07ed2', NULL, '2025-10-10 08:43:01'),
(18, '106.101.139.99', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'b94a71a4b7fcd850dbf031bac141cbdf', '6a68b7149d622963a65e453385a68db384a0f469042c362740932a17fb95c40e', NULL, '2025-10-16 09:00:29'),
(19, '122.34.73.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.8.4 (INAPP)', 'dc542dc340abb004f0490a37f22b4402', '049095f98d00dcd60de343234b0e758df71cfdf4acda4fbbc021f2585e81a8ca', NULL, '2025-10-16 09:01:16'),
(20, '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', '514494fa0d3047b126a323e64ebf7176', '033610659880fc803b72f1a25274ee9b58d1401304630a911200265524b4f157', NULL, '2025-10-17 01:47:46'),
(21, '110.14.131.124', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0.1 Safari/605.1.15', 'cc9866f26a431c54f850b0b77941b82a', '920ac1b3e37ab3378257cd5116489498bbeb51a56bc5107e2b79d0176deffdff', NULL, '2025-10-28 07:47:50'),
(22, '110.14.131.124', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0 Safari/605.1.15', '683d2e56b2819280125b23563711327f', '7f9f87c51e14995eca928d7f96a4796865fecbe1a620e20e67034846c7480b67', NULL, '2025-10-28 08:11:00'),
(23, '110.14.131.124', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '993538b270fb5ed012dcdbfc60889d73', '10c0a883147e649de17974bd85d7fe8e2576e8a55d714d1f3548a34c4ac1afb9', NULL, '2025-10-28 14:11:41'),
(24, '110.14.131.124', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.9.0 (INAPP)', '5ef1253b24b02041b8d88e61e255941a', '9daa574d0400ed1f022ab21dbc05a337474690e7371a2cffd8ab62d232a8c2fd', NULL, '2025-10-28 14:19:46'),
(25, '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'c794ded624ac6c7a34481bdd5655d10e', 'b2b36a3a5010631c73fa08fd32842effa07cbe2ab748a388e6b80b15e93f19c2', NULL, '2025-11-02 08:05:06'),
(26, '210.120.40.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'eeaec0cc1b9f2b252e63ee677998eeec', '61e6058ea6fa8cb2c4831268f5d4980a9712f3c4ddba804321a9db2d976ef80f', NULL, '2025-11-05 00:08:49'),
(27, '210.120.40.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Safari/537.36', '8cd4c4b2539d7da6cb1e8ce46e205651', 'c0af77588c7c56667dea908d8b32bc3ee7c5809542409b15299f8179df37cc67', NULL, '2025-11-05 07:31:41'),
(28, '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '7f123f7ee065f62ae12210f4aac369d6', '3c0fcbdd48d629dfa672122688704b073905f72e3ddb0b2452139d47388e76c7', NULL, '2025-11-05 07:47:01'),
(29, '210.120.40.53', 'Mozilla/5.0 (Linux; Android 15; SM-S921N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/141.0.7390.122 Mobile Safari/537.36 KAKAOTALK/25.9.2 (INAPP) ', 'dfc9e6cdbd6da376f92ee061449f8bef', 'c8f60d799fb3e7bfcfbfa1f59b844ad4a03cb2c308db9d8e548eb5b6e1e3a699', NULL, '2025-11-05 07:47:17'),
(30, '210.120.40.53', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', '0403f591ceef7913350fd13f7a37d7f0', 'aed78c2297e31457ac4433ba90c54a26a0e91cafa837c589b382f81dba3116b6', NULL, '2025-11-05 07:55:54'),
(31, '39.7.231.159', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'c373002af08cb58e0a426d0cc76f3da3', '02b89526ed43c8bb28401c70eb1bc7b6f3f5996c2fc584f08b5de462dbc78faa', NULL, '2025-11-05 07:57:01'),
(32, '39.7.231.35', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/393.0.825685754 Mobile/15E148 Safari/604.1', 'f1834391527855b4b8ab1aca3d853e84', '642a51c17f94239884abd6be798114c79726e8fdb43f2d6e5fc251ffcc16f334', NULL, '2025-11-05 08:16:59'),
(33, '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '0db5df520b8ebfff3555b2873edf814f', 'aaf7dad11d188f69e21d79b60dacb86a26ab19a23a7c35d32b6097ef06232aa8', NULL, '2025-11-05 12:07:26'),
(34, '210.120.40.53', 'Mozilla/5.0 (iPad; CPU OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/142.0.7444.77 Mobile/15E148 Safari/604.1', '931c5c87bd181ce2dc3e62b3d6f5010e', '4d1ee3df237924562d2dfc59ce134006b4a5549c8c74ad0abe600ff31ca4d1aa', NULL, '2025-11-07 00:49:57'),
(35, '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '65719736c4a39b793a9068da2b25f05b', '8d575b073c572b4da4b4b376190283ec2519848ed835d7677337e60bb3af4458', NULL, '2025-11-07 02:17:28'),
(36, '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'cd0ab1535b654fc70d58c9a2c60a4345', '7a093fa63a38cf56b20ffb2ebda0dd09e463825314c843812bf34634e1af1899', NULL, '2025-11-07 02:17:37'),
(37, '39.7.231.40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', '1d1dcfb231d692d82cd805a55e4cf6ce', '9a26afff43d74f0f3bdbcd43dbe95a3159beb212ce0c5ee84106f8ca2f19e4b1', NULL, '2025-11-17 01:51:33'),
(38, '218.152.37.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', '1bb83f89c81d6e451c7eb902b652379d', 'ba465fdc576a298839b04a80e52d9a6f2aa5627e185c676768b2a3fcb542a1c1', NULL, '2025-11-25 00:56:30'),
(39, '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '71de739ead35bbf1fa0531a2c84ae627', '9f677589598d3892df6235591fddd8a44d9a1d179dd1fbfd2094142dde51d0ab', NULL, '2025-11-25 01:01:22'),
(40, '211.62.174.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'bbf2f32d9cd4faa14f98aa109d31a927', '81ec1308c44b2fe2a90779c42dca62629787a2aeb0fc238be28c481517698c34', NULL, '2025-11-25 01:05:47'),
(41, '211.104.38.177', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', '307ee57856f4cd5f37758cdee1e12719', '9612374d475db5d05146b2ac3f8e5235c2d7ae7926c7a1b4b5aba972c708bdab', NULL, '2025-11-25 01:11:41'),
(42, '182.162.154.15', 'Mozilla/5.0 (Linux; Android 14; SM-S921U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.7339.41 Mobile Safari/537.36', 'ba7303ec5e0ceeff83ac046b60f48b5b', '36b920f44b18e61173ed1c78dfffdbe7022f89f573ff589a72915563694a3513', NULL, '2025-11-25 01:12:44'),
(43, '182.162.154.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.7339.41 Safari/537.36 Edg/140.0.7339.41', '3cbc2abd3a1e5a3761c4199e46a09303', '998bf27cf37e625fdb9451f7a53f2eeaa8cf08ae50de84cd1509ba95b6f1e253', NULL, '2025-11-25 01:12:44'),
(44, '211.62.174.11', 'Mozilla/5.0 (Linux; Android 15; SM-S921N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.102 Mobile Safari/537.36 KAKAOTALK/25.10.1 (INAPP) ', '40ddad7f05ac6c242ef51b0855caa2de', '2730de0023b63c3c492414bc05b976dc937309607af75a224d093a39f562a154', NULL, '2025-11-25 01:13:32'),
(45, '210.223.1.195', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '9013fd51617dba67d09b71dcdbfc74e4', '3941fe992cfaa641511e390f739b2147e91d2f0231a217c9fa0daa1390134dec', NULL, '2025-11-25 01:22:08'),
(46, '210.222.25.55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '8186a3d8d027d1f6c87ddf143eb33c45', '9d7e1820160cf000111338f3e351f6e82d688b57b4487b4b92fe30aaf888a37a', NULL, '2025-11-25 01:23:23'),
(47, '58.122.235.122', 'Mozilla/5.0 (Linux; Android 15; SM-S911N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.102 Mobile Safari/537.36 KAKAOTALK/25.10.1 (INAPP) ', '3f6cd5510eaf60326be4748c9dae63e8', 'a96a60c7b36e6bc098fe374041315c3f9b68f150e20595e4ba3663634406f3a2', NULL, '2025-11-25 01:41:18'),
(48, '218.153.127.49', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', '97648d36c49a6b46edabb00cb777ce42', '5ee6a512a7e53802baee76ebee4abd4a745333e62edf07d42ac4ce4fe63587b0', NULL, '2025-11-25 01:44:25'),
(49, '211.205.217.162', 'Mozilla/5.0 (Linux; Android 15; 2312DRA50G Build/AQ3A.240912.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.106 Mobile Safari/537.36 KAKAOTALK/25.10.0 (INAPP) ', '98e5b2cb536a9e6077cdf9eba631e220', 'a341d2db59744abc9117c55a990a87e9454a37f542b65c6a09d0f7ab2fe6acc6', NULL, '2025-11-25 01:58:27'),
(50, '118.235.2.220', 'Mozilla/5.0 (Linux; Android 15; SM-S928N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.102 Mobile Safari/537.36 KAKAOTALK/25.10.1 (INAPP) ', '8ca8548f3447ae16ad1d20069a38477c', 'b464f274e8e686913e97b19d5776ed4b0f8f91e5879561f75430f22622a0f797', NULL, '2025-11-25 03:36:21'),
(51, '211.59.179.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '7e126736d9cc12e82ce92be71acb5594', '97e45acccc0f1dc2ef6a8f42af63f25c95c9090e8699b595b830a41f725a2ceb', NULL, '2025-11-25 04:54:47'),
(52, '211.62.174.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'cbcfaaa64cb9ea0b0815e5d3c4e2ba80', 'e73066b93aa2ae65bfee50b6f978d6aeb1f1ef7f6ab53fc71ee2d7ae62ed91ea', NULL, '2025-11-25 04:55:12'),
(53, '223.38.86.69', 'Mozilla/5.0 (Linux; Android 15; SM-S918N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.102 Mobile Safari/537.36 KAKAOTALK/25.10.1 (INAPP) ', 'fbf3e4e644bd4497c0597ef2c0a6abd6', 'fb27f540bfe0358cf9ef07fde563e14bfc19e5906c911448a9f143f9bbd171b4', NULL, '2025-11-25 06:12:51'),
(54, '124.243.85.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '702411a70009dd27d2f206351fde1278', '60841829b9ff5c5b5c24275cc962ae3de5c59c3b2c2f7d1660438737470298f7', NULL, '2025-11-25 06:46:56'),
(55, '121.129.23.77', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '4902f61150240f4501c95fb1539532d1', '056030a66b909fefd3b262ae817a366a208074ee4ddb62891bb639d09305e599', NULL, '2025-11-25 09:03:01'),
(56, '211.234.201.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/138.0.7204.156 Mobile/15E148 Safari/604.1', '1ad6d0b71cbf7eecda0aae4ce6860bdc', 'f32a7b1f3130d1ea5149c7b256052fed486e89c070a868a8bf0d3fe070b1371f', NULL, '2025-11-25 09:26:13'),
(57, '218.152.37.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '1073f2412a1f3d04c7797f406142b4e7', 'c07fbd2bec685e70701f733c889fae07253250698b367b0b80087d37532e776b', NULL, '2025-11-26 02:40:44'),
(58, '14.52.80.131', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', '220ae9a6be8f62cb45f0ecd56c282051', '979077f977479555af41c5f1238cff18a095531020db8ccebb90bf330d32b283', NULL, '2025-11-26 12:43:06'),
(59, '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'f45142a492bde4123d86b8b495051cc8', 'b6f09fb4a6b944facef47ab9c4f4b867a61d21dab929176adeca73a9154e898d', NULL, '2025-11-27 07:51:31'),
(60, '118.235.4.63', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', '617ed4e25afd0aac8cbc35729f7caa31', 'f720226f2b85b830c0f03e7f0c3a29c128299b02c2c00f884ccbcb71bd098891', NULL, '2025-11-27 07:55:35'),
(61, '211.212.69.94', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '82b911a3fdcd4f48f6a524857d422c06', 'ff318fba0d2de50f2a6987c823f83dff8b0e87361325295db33c5d98d4700f8f', NULL, '2025-11-27 13:37:31'),
(62, '106.101.2.69', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4.1 Mobile/15E148 Safari/604.1', 'cc8837c2e7b78a1e70f588d8cebe8359', 'e51a54cc24e6280509a85a2f841dd24a35a1941a0b5cd0a2d7bfdbcd03d3a7b0', NULL, '2025-11-28 00:26:26'),
(63, '211.249.40.25', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/123.0.6312.4 Safari/537.36', '3f4abf1c3d111d765a70f4969e6d6fc2', 'abf14931c8da21255cf65eac7cb88e132a9defe423e221a35454d3ec58199c99', NULL, '2025-11-28 17:53:54'),
(64, '203.254.98.115', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'cbfd9f6a267a0d02368ac09e3cd68b1d', 'fca7a2ece7d47ab74f97334825037a0c1a3830d3969d6f43f003e16efe491a66', NULL, '2025-12-01 02:34:29'),
(65, '115.92.5.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'd8d18ad5c5bf17caca730a09aa6e346a', 'e1a19e9508e41b0a87cc22f6134664d9ce734d35dd5136a1c390002693366af5', NULL, '2025-12-10 06:22:51'),
(66, '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '08c3410a7070bde48bed10c87a2668e5', '584924ebb59742d2015de5878d79fd581139ba7de0712f66230a4f50d8cf4839', NULL, '2025-12-10 06:32:51'),
(67, '61.97.54.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'f57c457448a30a9b0604eaaa9b5c4c10', '8f9fd74609a43498677576620591995b5846278402c0a1bd6a4c57cee098e36f', NULL, '2025-12-10 06:49:51'),
(68, '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '97ed5de8dca4caa15f4babbc84795db4', '2be2e840ae0e5c13c2852f70d66e24f278442ebe749b61c15c7e11d2202e98ff', NULL, '2025-12-10 06:56:29'),
(69, '211.235.89.50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'acca06383236ca67ac255b1d961bdb22', '400ea7cba9d34f65db3a61055f11814925fbc2c4c8d777bb20dc7e81194d9fc6', NULL, '2025-12-10 07:15:16'),
(70, '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '3f7dbe2a50c1e6ad795d3f0ed91a51e0', 'cf7364fec53c30180a99efcd3b80012dfa5f154c5d6d3720bfe48a7305748fe1', NULL, '2025-12-10 07:41:19'),
(71, '210.120.40.117', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', '49082c875470b04150d612129ba3349d', '6d7620124753588d1af224bdf9552bae4695be3959bf484c02fa090bf783c6ed', NULL, '2025-12-10 07:51:25'),
(72, '1.212.187.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'bfefb9d1b6823dafc8425508e91e19ff', 'ef0d96895a5b2d1373fa1078071d1b2fb2111e0540935d3e1a698153105cae2e', NULL, '2025-12-10 07:56:58'),
(73, '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '967b364d1224c87f5976f3126b0b0548', 'c7506055bc20bf87bd11eee5110829de4c7a3cfe0156e1748660b31a4ca1f3e6', NULL, '2025-12-10 08:35:32'),
(74, '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', '9919521a0bcd8203dbff4de0e46cd0cc', '77eff75602af482c4b46d3da53390051c4f8d14c68feee9ea8aa30dc814a90a8', NULL, '2025-12-10 08:57:40'),
(75, '222.106.49.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '5657cf7e2a0e3f0ecc4cec83d0e24aa5', '2a599a2e14a3d9e16ae9b0851480bf60ab2b8e9b85bba529f17d4e2d3e68851e', NULL, '2025-12-10 15:24:55'),
(76, '221.146.203.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '656dca281b0fd40e5a58e3c49eab2747', 'ca75e628161bd6a11cf8455762500f123764716b65da0f10b6da150519780fe5', NULL, '2025-12-10 22:42:05'),
(77, '210.120.40.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Whale/4.34.340.19 Safari/537.36', '078b46c092b557accf5ff3fedd2abe8c', 'f4269d8f5ad2a4305f383bfe8355cd2c2c59e6f7f9298cbc81ddfaf725bf66bc', NULL, '2025-12-11 00:08:33'),
(78, '210.120.40.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '3909f03196a47245d4acc8ba18465b78', 'a878f7fde729711f66af41fcba5eb358cccff2d3bdf73f99e7f4276a524a4f8b', NULL, '2025-12-11 00:57:38'),
(79, '210.120.40.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'e4f9721a4e0688d4bba833d16d5b5373', '609b1f325e78b857a166590882c5b5f8a753239d11406e5d8ea180d025d77381', NULL, '2025-12-11 02:10:06'),
(80, '121.166.150.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'd9068a9b390a517eff156d8df64cf643', '353241446ed6fa62eba0abfe95f5c6869321822f32c7fd70fa81c7ec410c74e6', NULL, '2025-12-11 09:01:13'),
(81, '1.236.186.63', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'ef539c1fc7ce05bbcc5ef3461f2a8cf6', 'a7099722b8d61a626c06375ba6e8bacd07ac5579cbabeca0d47b21e1f8447adb', NULL, '2025-12-11 09:36:23'),
(82, '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '893a0c3286b56c463c87701e8b0f6a63', 'f38d1d2499b2418bd28032c32eb61eb70184d38fef0c01642089a497101e704e', NULL, '2025-12-12 00:19:23'),
(83, '1.226.95.148', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22H124 Instagram 409.1.0.27.161 (iPhone15,2; iOS 18_7_2; ko_KR; ko; scale=3.00; 1179x2556; IABMV/1; 841016381) Safari/604.1', 'cc404f3ed269ed3831dbe0431fa0a8e9', '51b8c2d99a80d577b5d9453c60e2bd442d6fc28db4a63c2b73882396cf4c6a36', NULL, '2025-12-12 03:32:07'),
(84, '106.101.134.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G86 Instagram 409.1.0.27.161 (iPhone17,1; iOS 18_6; ko_KR; ko; scale=3.00; 1206x2622; IABMV/1; 841016381) Safari/604.1', 'fa7b994693a6367c875da09697434774', '9c82743b77352bbbfa4f9333cfe115d088b899c120caa800d8034c64807b3f39', NULL, '2025-12-12 04:28:35'),
(85, '61.72.76.57', 'Mozilla/5.0 (Linux; Android 9; LM-Q725S Build/PKQ1.190522.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/138.0.7204.179 Mobile Safari/537.36 Instagram 409.0.0.48.170 Android (28/9; 420dpi; 1080x2034; LGE/lge; LM-Q725S; cv5an; cv5a; ko_KR; 839812171; IABMV/1)', '4c4ee85a87cf43a4b5cd7e2861a907db', '1ed8ce66d6a0c19978cdc10d434b6799a70b288b9ae9e81b145233812a2b1e8d', NULL, '2025-12-12 04:37:14'),
(86, '106.101.197.16', 'Mozilla/5.0 (Linux; Android 15; SM-S911N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.171 Mobile Safari/537.36 Instagram 402.0.0.49.70 Android (35/15; 420dpi; 1080x2340; samsung; SM-S911N; dm1q; qcom; ko_KR; 806345237; IABMV/1)', 'bf583698a2113b90354d69ddb660b309', 'c00290b6b917f60da4c167b7bc748b7aecf88688eb0fcbd9b97d3fec39ce7400', NULL, '2025-12-12 04:42:35'),
(87, '121.172.208.25', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23B85 Instagram 409.1.0.27.161 (iPhone14,5; iOS 26_1; ko_KR; ko; scale=3.00; 1170x2532; IABMV/1; 841016381)', 'a666aa6eb67f15e1011f39084f2ce280', '64efd5d6e686006ead85aa554b73f78e0f46ff5512db21c1b1b6a4586c21ffd9', NULL, '2025-12-12 05:16:54'),
(88, '211.192.251.27', 'Mozilla/5.0 (Linux; Android 12; SM-N976N Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.171 Mobile Safari/537.36 Instagram 409.0.0.48.170 Android (31/12; 560dpi; 1440x2759; samsung; SM-N976N; d2x; exynos9825; ko_KR; 839812174; IABMV/1)', 'e4fd1521531ed5aae5e9b639b9bc87d8', '5dffdfb84aef6dc2fe2f464e43b7bef0269db43b469b21a5b4be88c7f051b366', NULL, '2025-12-12 05:27:24'),
(89, '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23B85 Instagram 408.1.0.45.70 (iPhone16,1; iOS 26_1; ko_KR; ko; scale=3.00; 1179x2556; IABMV/1; 833451024) Safari/604.1', '49abdc00247c5d151f76a73f9a0f9c6c', 'a5fd2dc7eeb8e95a79e25fed524bbf76a207e0597f891f5541fea2c6446afcf7', NULL, '2025-12-12 05:51:32'),
(90, '211.234.196.182', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'd449f30743cb75e68fc903420860722a', '414e01b4222852c56aa9ac7bcce1e6d436f5540e5062d78bb620d8476694064e', NULL, '2025-12-12 05:51:53'),
(91, '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'a21f6531a66503b811d76d51490f3fdf', 'a002eaedadda67792ca9379e44971dbcc3d5d8f3d95f6b41f7ebe77c45e3ecb6', NULL, '2025-12-12 05:59:41'),
(92, '211.234.207.105', 'Mozilla/5.0 (Linux; Android 16; SM-S931N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.103 Mobile Safari/537.36 Instagram 409.0.0.48.170 Android (36/16; 480dpi; 1080x2340; samsung; SM-S931N; pa1q; qcom; ko_KR; 839812174; IABMV/1)', '1b2a07c8e4f19c0725f61ea27de83829', '3c14002fbf37977edce5d82e54c0f23110410474394e84ae803b153104b64c65', NULL, '2025-12-12 06:23:35'),
(93, '118.235.5.187', 'Mozilla/5.0 (Linux; Android 16; SM-S931N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.20 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.17.21)', 'd0c8488ce2778e737550704130b454ce', '941f8b3e0a67564105512409ba35d85c8996bfd517e0839752ec10f68d75ae69', NULL, '2025-12-12 06:29:50'),
(94, '223.39.179.144', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23B85 Instagram 402.0.0.34.82 (iPhone18,3; iOS 26_1; ko_KR; ko; scale=3.00; 1206x2622; IABMV/1; 806801743)', '0a8c11c68901c8a98298dfb21d841e51', '55ec2815b46105d49b056d738cdf07e016faf33cd7919c9077dca2279f67717b', NULL, '2025-12-12 06:38:52'),
(95, '218.153.67.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'e8a863b46c9d6fb3a0dd1d15fe36fec1', '89f4f316c553bddce69afe9f2d00b66b965fd4097e56a2b43fbc3c731ba6e2c7', NULL, '2025-12-12 06:48:08'),
(96, '211.36.154.249', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22F76 Instagram 409.1.0.27.161 (iPhone14,5; iOS 18_5; ko_KR; ko; scale=3.00; 1170x2532; IABMV/1; 841016381) Safari/604.1', '57bb62619e13a54ddb84e30f3c09ec41', 'f203dd6f259269ce2fadb3f5d48907c0609a312315bbb59128595fb697894f96', NULL, '2025-12-12 06:57:27'),
(97, '1.231.139.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '8e1a00ffa8972431a3e3925a6c5a1070', 'b627fe0da0b75de8e3848f4cfd6ec8f7b25f30258d5e293c282c4be1aa22d9b9', NULL, '2025-12-12 07:23:31'),
(98, '121.164.72.175', 'Mozilla/5.0 (Linux; Android 14; motorola edge 30 Build/U1RDS34.80-40-5-6; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.103 Mobile Safari/537.36 Instagram 409.0.0.48.170 Android (34/14; 400dpi; 1080x2235; motorola; motorola edge 30; dubai; qcom; ko_KR; 839812174; IABMV/1)', '44d7881c731e322647e69072a03e9930', '7c57aa32af29c1cf575d7c10df1dd0a1280bb501582aa2891363b65ffa89b049', NULL, '2025-12-12 08:08:50'),
(99, '116.121.171.69', 'Mozilla/5.0 (Linux; Android 16; SM-S928N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.174 Mobile Safari/537.36 Instagram 409.0.0.48.170 Android (36/16; 450dpi; 1080x2340; samsung; SM-S928N; e3q; qcom; ko_KR; 839812174; IABMV/1)', 'a919a1ed3d941a6add0500bc46758412', 'ce64d5777b2fa393f153480ae31f65ec1f97d8fc637b1765d961a5a9273cc60c', NULL, '2025-12-12 11:06:23'),
(100, '223.39.84.243', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 409.1.0.27.161 (iPhone17,1; iOS 18_6_2; ko_KR; ko; scale=3.00; 1206x2622; IABMV/1; 841016381) Safari/604.1', 'a1bc59135562317554d004246e6ae620', 'c0a78e5d878fbf0eeb932fd7b15dc30faf25225293c106b2d60ad3da954918cb', NULL, '2025-12-12 11:07:19'),
(101, '119.192.101.94', 'Mozilla/5.0 (Linux; Android 16; SM-F731N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.171 Mobile Safari/537.36 Instagram 409.0.0.48.170 Android (36/16; 480dpi; 1080x2640; samsung; SM-F731N; b5q; qcom; ko_KR; 839812236; IABMV/1)', '72722d6f19c85c80a6ae8566dccd62a7', '7b6167661a8d8af557c35e1e74083dee9acbf0fadb91cb97f236d7e86d3543f7', NULL, '2025-12-12 13:10:32'),
(102, '211.235.65.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23B85 Instagram 409.1.0.27.161 (iPhone16,2; iOS 26_1; ko_KR; ko; scale=3.00; 1290x2796; IABMV/1; 841016381) NW/3 Safari/604.1', '70710c1b113b71121088c2931c600fe5', '25fcc8f95aa931fc0f17ac8bb668ba51d331fcdb0c5aa97415371412952eae69', NULL, '2025-12-12 13:19:17'),
(103, '121.143.87.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '039cea392fd25e02cbc9d9ae12b8a522', '2c4ca13b14a7f03d1483a8f37375bee8af5de62352bddeef7b70f34a0640b146', NULL, '2025-12-12 15:19:08'),
(104, '49.1.230.245', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G86 Instagram 409.0.0.26.161 (iPhone14,4; iOS 18_6; ko_KR; ko; scale=3.00; 1125x2436; IABMV/1; 838724010)', '17febaf2ca110e79a9f9ea99afbd67c6', '1aa5282909191da82fcd31dc04bebd78317dbd98a73bfcbcbacdd2ce3b977ccd', NULL, '2025-12-12 15:22:23'),
(105, '1.241.93.141', 'Mozilla/5.0 (Linux; Android 16; SM-S926N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 Instagram 409.0.0.48.170 Android (36/16; 450dpi; 1080x2340; samsung; SM-S926N; e2s; s5e9945; ko_KR; 839812174; IABMV/1)', 'b231407c318479b7ab578a1d39ffd46f', '9d9c6a493b9bca05a67c45dccf8e1e262032f25ca08b0f066ede8a04903af053', NULL, '2025-12-13 00:00:44'),
(106, '27.35.42.7', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23B85 Instagram 409.1.0.27.161 (iPhone17,1; iOS 26_1; ko_KR; ko; scale=3.00; 1206x2622; IABMV/1; 841016381)', 'c368ee2fe77dd9a89622ac781674206e', 'c09dd68b0ffbd201daea1f0ca2382a85d85086dabb6b89c8ac0d0215ec567cd9', NULL, '2025-12-13 01:28:15'),
(107, '58.140.30.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', '0ce43b5b8631c77308953073a0aa8145', '0ea453c2d9db408c54ce243341a9f9fadb65bf85305c51c09c219750b0f9d856', NULL, '2025-12-13 08:18:05'),
(108, '117.111.6.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', '97477826ed1a1b9de430b853797c0f3d', '9b57ca0179f9769c93cee5b1d1bb7f650018d54db5d5fd8f45e989cbd500cdab', NULL, '2025-12-13 11:18:39'),
(109, '175.223.26.28', 'Mozilla/5.0 (Linux; Android 16; SM-S908E Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.20 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.17.21)', '0bd7e756ba6e3501b4117737ffc1f94e', '5920d52cfb4923d644dd995607ebf14fe487ab88fffb33bdd14effdbff6a4c29', NULL, '2025-12-14 00:15:36'),
(110, '14.39.19.129', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', '467baef38a939a6e825f87156319ca3a', 'a322b7beaac866a02b2fd5af849efc07728ae4ed99ef80ced76147a45e2161d0', NULL, '2025-12-14 22:12:43'),
(111, '210.120.40.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.10.3 (INAPP)', '4a2a2de674831b69c0f07db7c473c820', 'e0493ab8dca34b64ea7e8813bcf5e6e38b20f7e73c16f7dbff21f1c46288b883', NULL, '2025-12-15 01:08:28'),
(112, '210.120.40.118', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'b0351fcedb648f4b90638590fda63d7d', 'd8c9105164ac3073b944756d539e0108c6515cbe36ec564faba4150c1d7e86e6', NULL, '2025-12-15 04:51:31'),
(113, '115.95.138.58', 'Mozilla/5.0 (Linux; Android 15; SM-S918N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.171 Mobile Safari/537.36 Instagram 408.0.0.51.78 Android (35/15; 420dpi; 1080x2316; samsung; SM-S918N; dm3q; qcom; ko_KR; 832162521; IABMV/1)', 'f10c89dad79ff7cc24700c37cf2b6ad6', '9460ac0af32dc7023b5148061fc3dabdaf55f38c9cafde7e266a991b5589682b', NULL, '2025-12-15 05:58:59'),
(114, '175.214.73.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '1c629cf3bb6895566af481b8275b3d60', '1c43124ea1eb9cda56d2b4a86cf2c2f06426b62b61b947ed1f703e9a9db9b78f', NULL, '2025-12-15 11:10:33'),
(115, '211.235.91.129', 'Mozilla/5.0 (Linux; Android 16; SM-F766N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.171 Mobile Safari/537.36 Instagram 393.1.0.50.76 Android (36/16; 480dpi; 1080x2520; samsung; SM-F766N; b7s; s5e9955; ko_KR; 776586932; IABMV/1)', '5432ccaa798b2d3b742486282a6a9c9d', '041be70072216bdd8fe40468b666452da02f5ec18b1d066a0ad1add0b6d34a58', NULL, '2025-12-16 18:23:38'),
(116, '211.234.227.189', 'Mozilla/5.0 (Linux; Android 15; SM-F711N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 KAKAOTALK/25.10.1 (INAPP) ', '53de801ee82350ce7150a984dbe9c8cf', '77df4c3c21bc746ad95fd63c82665e1fab5582bf712b0e06cb1c7c5423a2a29b', NULL, '2025-12-17 01:09:26'),
(117, '121.160.134.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'e285658b574a0cb678c5f839b37a1b57', '45323d36ac2d21a9ad43af700b1627610b4626dffc7d0f471cf78e1f02174aa6', NULL, '2025-12-17 01:31:22'),
(118, '203.228.139.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', '5462bcc57ca6e288569db24b55fd2754', 'e9c6bd2c4f1006ad39ce9c25bf804de4c768169aed40f084300c987ee0e2b2cd', NULL, '2025-12-17 02:07:01'),
(119, '223.38.91.137', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari/604.1 KAKAOTALK/25.10.3 (INAPP)', '334c5d2b8a1942e1cffb76a92c4928c6', '20115664f89011dd570c25381a03d965ff2ad3d0dea1c3ff32ab60a42dc20369', NULL, '2025-12-17 07:12:50'),
(120, '106.101.73.117', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', '8b09c068770e780a14edb0a71697b42b', '6f524654cae373cbb724b2e9b32949393ded43a2c99c77b1c8d89ede6c9410ac', NULL, '2025-12-17 16:21:26'),
(121, '39.7.231.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '4b0240bb6023eccf8bcfac9bd80ac22b', '0c2397257e6159abee1418f33656b9f2e0564b83d0224e88cf138c24b566dc12', NULL, '2025-12-17 20:29:51'),
(122, '203.226.142.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'e6a31c4af43608fc304f1a190bffda1b', '29e2d655c5b9a49a510c751b4ccd4dac607377eb351e33db354080a65207d1c6', NULL, '2025-12-17 23:25:14'),
(123, '203.226.142.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'ca191b11e2c0ee51dff61e1ea067756e', '59499a29981a26495be2ae9f1f899b9a5b63c8e28d70fd29321b6338d69c3b29', NULL, '2025-12-17 23:42:59'),
(124, '117.111.8.49', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/21D50 Instagram 409.0.0.26.161 (iPhone16,2; iOS 17_3; ko_KR; ko; scale=3.00; 1290x2796; IABMV/1; 838724010) Safari/604.1', 'ab5914d92ea726e93ab43b41f946a87f', 'aebb35ad2485afdffaeda3f50abd6c7f6daea7bae2ba6de522f353aff15c2852', NULL, '2025-12-18 00:46:37'),
(125, '112.172.222.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'df9c01eba5b993628f23b119582e6e0b', '3af737319a09a4b7e6ad942dc6244b27868b977f9ec5881b93b334ff42575c7e', NULL, '2025-12-18 01:11:44'),
(126, '119.66.128.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'b866604af420929d9839e3e4a75db739', '3d86496a4b0f97425bb4c471b2b783cab330acb8e70e038c067eaf4135158ef9', NULL, '2025-12-18 01:35:35'),
(127, '211.53.55.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2da5a0ad290644e4ca14af9dd28c8076', 'fe95ccdb6d1f0854e2b332877a6678f60cf45cca231418a58d55810d2a8b1e9a', NULL, '2025-12-18 04:04:43'),
(128, '211.234.203.57', 'Mozilla/5.0 (Linux; Android 15; SM-F711N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.20 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.17.21)', '7ee95980ca0105224b5645b000fefa5b', '08d5e31ee2fe276747cf3d1fe57cb76f57af468d6abcb5062df6ec0192570097', NULL, '2025-12-18 23:00:58'),
(129, '175.214.73.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', '4fbe46653ccaff8d9cf782f497795c9d', 'b0ebb8157ce80049c7a51426d5c3145b065ee783820524e2c75a25c090593cc0', NULL, '2025-12-19 01:02:46'),
(130, '59.6.30.249', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.108 Mobile/15E148 Safari/604.1', '2a2f9e3ac64d24bd7e872ed7934992b8', 'f2f33e7d11b9cea30538b2d9f75a95e6852f880ae921a4972aa018bbfc61be4b', NULL, '2025-12-19 01:16:13'),
(131, '203.228.139.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', '0b33d7dcebfcdf861a9186df95110f0f', 'a0ebf0a85f11888feb5a0e0a52bba4550c2ec485dde2b6d0e8b650a4fd103694', NULL, '2025-12-19 07:24:52'),
(132, '121.139.140.248', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 409.1.0.27.161 (iPhone12,1; iOS 18_6_2; ko_KR; ko; scale=2.00; 828x1792; IABMV/1; 841016381) Safari/604.1', '743635abd859ee2ece8bb4d0141b97dc', 'b20fa38f79c82eec0aa17c7775cc099bc6e3711bbb666a574fc0fdce5fdf623c', NULL, '2025-12-19 12:14:43'),
(133, '218.152.175.243', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23C55 Instagram 410.0.0.29.70 (iPhone18,3; iOS 26_2; ko_KR; ko; scale=3.00; 1206x2622; IABMV/1; 843189213) Safari/604.1', 'a1c22c835debbf2a88ae4c33b209c41f', '62330925b4eebb1333f691050a91e319603fe2f10fb2eadcbdf4b8da9ffad0ae', NULL, '2025-12-19 16:17:41'),
(134, '117.111.17.216', 'Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.114 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (29/10; 440dpi; 1080x2134; Xiaomi/Redmi; Redmi Note 8 Pro; begonia; mt6785; ko_KR; 846519237; IABMV/1)', 'a05e8ad742264187ad105e7b44a2e5c0', '978eee36762f5e99ab85a265e743ea8bf31a447c3082a7b456b0d50870de6087', NULL, '2025-12-23 07:26:27'),
(135, '1.214.243.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', '61f168c943ecb7ac8dd281f57e221081', '2e54b93fd9c4acffbe0a23b4883434c7739a060de549a7d342c9371bc92f025a', NULL, '2025-12-26 08:18:15'),
(136, '1.214.243.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '483c965ef2b9424c4d5ed191dece4b68', 'fd873c82357203601eb4185b24a67d07e1b5164b4686a4f7de7edec79610c0df', NULL, '2025-12-26 09:01:34'),
(137, '122.46.248.167', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Whale/4.35.351.13 Safari/537.36', '60fa8db0699e66d2e4da73efbb70a239', '5b7c672d739428fddcda7d257862c656ee89afd3816bf6d205fcef8e6f83dca7', NULL, '2025-12-27 02:40:11'),
(138, '118.235.12.115', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', 'b9a25ccc9a0417db3162e940c2c25589', '739a15c2acf7ba1451c4594ae8dc8942858efb4de5bf30e494fc81d4a8cd9300', NULL, '2025-12-28 12:00:24'),
(139, '14.36.15.103', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '6880bdc8b8efb0b206b0810a3edfefd1', '168b866ccbd810f9d4766fe9e855e18777a01191a39bc6b7682cdbfd14a943f2', NULL, '2025-12-29 05:09:36'),
(140, '14.63.100.119', 'Mozilla/5.0 (Linux; Android 16; SM-S926N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 300dpi; 720x1560; samsung; SM-S926N; e2s; s5e9945; ko_KR; 846519237; IABMV/1)', '4f83025445d012c8a037e7c7759cb5f6', '116b64396a382eb15a40291a6d2956b0651eb206d1e2649addc8fb8b367dd878', NULL, '2025-12-29 05:11:45'),
(141, '14.63.100.119', 'Mozilla/5.0 (Linux; Android 16; SM-S926N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.22 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.3)', '4e0b40d238a3bdffc98515dd60c35427', '68ae2b74f45e38756a7ee7b846f8185c552e1ee60d5cb3f66a6357799fc20680', NULL, '2025-12-29 05:12:05'),
(142, '223.39.84.116', 'Mozilla/5.0 (Linux; Android 16; SM-S721N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 408.0.0.51.78 Android (36/16; 450dpi; 1080x2340; samsung; SM-S721N; r12s; s5e9945; ko_KR; 832162399; IABMV/1)', 'df1b41614b19e99bea2c30d66767741a', 'afc59c31783fead84b50ef501f4d0062d9dea8e26080de9a44c3020965b821e5', NULL, '2025-12-29 05:12:22'),
(143, '223.39.84.116', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36', '2b2f66e3b4d5c23a95aa96c543b6ee55', '285079bbb0d9c9c985414dca96edab51dcf20b5c3ada6700df1030c9a78240af', NULL, '2025-12-29 05:12:31'),
(144, '211.35.77.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'b60a6c813a7b3471bc399b60ccdb1d1d', '4b420a6f3b29671c8073f3d09aaa650605f51b752aa41665efa60b314dc324f2', NULL, '2025-12-29 06:24:40'),
(145, '223.38.81.32', 'Mozilla/5.0 (Linux; Android 16; SM-F966N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.115 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 360dpi; 1080x2520; samsung; SM-F966N; q7q; qcom; ko_KR; 846519237; IABMV/1)', 'e3499187203072f003c9d38d2f4abc87', '4af4b16b2f82902cef6f7f327a1e3d1f473b0130630aebd59ea291433262c92d', NULL, '2025-12-29 07:59:06'),
(146, '211.206.248.169', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 406.1.0.48.76 (iPhone17,2; iOS 18_6_2; zh_CN; zh-Hans; scale=3.00; 1320x2868; IABMV/1; 823565292) Safari/604.1', 'c29b8a10ab4b4292f3bbc7dc0270735a', 'd23bdf9817dc7012871ef2e74f8368a713f8f3ac44e1a8f4ee23f3679ad35ac4', NULL, '2025-12-29 13:46:52'),
(147, '118.235.11.13', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/21F90 Instagram 396.1.0.47.81 (iPhone14,5; iOS 17_5_1; ko_KR; ko; scale=3.00; 1170x2532; IABMV/1; 787013352)', 'b972f7d46ea82c94ef4264a863cc0931', 'dc28e4ab53b805d288af8a67046a84b7c50f9b7f33eda58c093721b5f19792c6', NULL, '2025-12-29 13:47:16'),
(148, '221.146.134.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', '83b5d73d184acb9c7853ad00d86378fd', '87b1b7fcc87016796ebd935796797f84687ee167ebe09e0d16d77d8647aa5bfe', NULL, '2025-12-29 14:53:35'),
(149, '218.39.96.148', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.3; 15PRO)', 'd74e23a42d33384b819b07f2ee3008bd', '27216f8451ade094ae51ad10c63ad46f189cc6d73bf9b97446aba7951f9661fd', NULL, '2025-12-29 20:18:21'),
(150, '211.234.203.183', 'Mozilla/5.0 (Linux; Android 16; SM-S936N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.116 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 450dpi; 1080x2340; samsung; SM-S936N; pa2q; qcom; ko_KR; 846519237; IABMV/1)', '5f2e38a12418506a4052f1eae1dee82c', 'd9bfdf2f2efd1f15a04d04d78c3af7e2fc8696a4788f0b0f8c8dfa716580c4f6', NULL, '2025-12-30 01:09:15'),
(151, '210.120.40.12', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'be6f947acbcd429852fdd654ba7a5282', '0621d09700c1f2c5501487a4b7a5edd64d4d6147b1d2c3534c7fb522b230745e', NULL, '2025-12-30 04:02:55'),
(152, '39.121.81.34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2bc133fd3989acd4911745a2e108e775', '76de504bcb69cbd4340ec0b70248c81228e66bf61a2dbedb9a2ea936b8a3a273', NULL, '2025-12-30 04:25:50'),
(153, '116.32.93.96', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.3; 12PRO)', 'cc2f692d8ba4543a0c26c9b591774162', '6081510667a0738968806813bab3b9c57a2af525fca85851df182bc197dd213c', NULL, '2025-12-30 04:30:19'),
(154, '203.228.139.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', '30005da5b74615e7ac7ca93de463dcb4', 'a75eeed0b2ae26a05d468206cad7bcf18f8be87229b59d3b1511c660e92e7a31', NULL, '2025-12-30 07:03:48'),
(155, '211.213.139.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '7ab5486a2c79764dd7891237b3e47a67', '47eaf6711e71c3c93b17a6e38606603392dde93a739df2b339261322a60e1fa1', NULL, '2025-12-30 10:41:56'),
(156, '211.234.197.178', 'Mozilla/5.0 (Linux; Android 16; SM-S938N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.23 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.4)', 'b69d0e57c3526b53d56ccf0153798d62', '710839e54fd8f7b5bc52cd3acd985b395653e230db59d8b58bb60a6f1272f943', NULL, '2025-12-31 00:19:22'),
(157, '39.7.230.10', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/399.2.845414227 Mobile/15E148 Safari/604.1', '54f3fcf4a67b07912952818744cd6531', 'db819a70cd1eb41252da4f7747631cfc01f9ca86a3825a8272b14bd78e7fe301', NULL, '2025-12-31 08:05:47'),
(158, '211.234.226.158', 'Mozilla/5.0 (Linux; Android 16; SM-F766N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.115 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 420dpi; 1080x2520; samsung; SM-F766N; b7s; s5e9955; ko_KR; 846519237; IABMV/1)', '6fb99daddc0a5223cf86fe350df4d054', '04d8d65d5f29491e6b5c5cf9c182e2ba9df3cfd2c544b452076be0e08fccdf05', NULL, '2025-12-31 09:18:29');
INSERT INTO `dsp_user_uuids` (`id`, `ip`, `user_agent`, `client_uuid`, `uuid`, `capture`, `created_at`) VALUES
(159, '117.111.17.192', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_0_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23A355 [FBAN/FBIOS;FBAV/543.0.0.47.72;FBBV/845843444;FBDV/iPhone16,2;FBMD/iPhone;FBSN/iOS;FBSV/26.0.1;FBSS/3;FBID/phone;FBLC/en_US;FBOP/5;FBRV/852816660;IABMV/1]', '7c3ecc5235a83a3e1a5ca638a6f82da3', 'dd2c23881e579d1b31a69acc207d6f7a20b1c74cb6a6df315f0e7376b3925a7e', NULL, '2025-12-31 10:34:50'),
(160, '39.115.3.244', 'Mozilla/5.0 (Linux; Android 15; SM-F926N Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.22 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.3)', 'd7da06868b0970b8af9cdb79e0d431c8', 'b624cb4a72c7318d70cf416a380d3204ec0ff12aa3f18d6ead2cfa102615a2a6', NULL, '2025-12-31 15:04:21'),
(161, '210.179.212.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '5e66d59032e83bdc1fcd91c305c99d21', '15fe13091694559e2b132737f964043dc4ec8edb88ad1d3883322cac1b6eb354', NULL, '2025-12-31 22:38:43'),
(162, '39.7.24.33', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22C161 Instagram 390.0.0.28.85 (iPhone14,8; iOS 18_2_1; ru_RU; ru; scale=3.00; 1284x2778; IABMV/1; 765313520)', '3e3759d6e7b05530daca899b1126d148', '61a34c92247d6df5850bd3b8290de4e31dc3f6fe97c7ec5d3e5ccb94a9cd2373', NULL, '2026-01-01 00:31:13'),
(163, '222.111.195.55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'fbde5218ea057c59b4e0a32c4944df6f', 'ef95e12d233176142c3a7f50fab146260eb713d45715a05046af24d8f5591c88', NULL, '2026-01-01 04:02:56'),
(164, '112.168.87.136', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', '69a186427cc622131d348a08cfeaf3ea', '7ccd903c1192d9c0c153553d87d92e74fc6b2857ce7ba209273caf83ab2c8738', NULL, '2026-01-02 03:09:51'),
(165, '119.193.17.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'a8edc3ce3d3bd806e7bd34f37da3e188', '3b0a8717eac13da2b3e4dab6a3284265be7053a4d21916d22283a4170d601963', NULL, '2026-01-02 03:43:27'),
(166, '39.7.24.150', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'f2e4565aefb5ebb2b251684311887cdc', 'd9269deb083672c66f5702a3806348c9f7fea28065b0bd9af4ecf01307981abc', NULL, '2026-01-02 06:00:37'),
(167, '211.234.226.167', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4; 13)', '681fdbcaa51fb8a3ece1b42e23c588af', '0b91bcccf3cce5168c4c7f9aae4b3acb8a3ecc2657d7b2dbabcdff7c6a0f24f7', NULL, '2026-01-02 15:05:56'),
(168, '114.205.159.105', 'Mozilla/5.0 (iPad; CPU OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4)', '7bd6978dad7cc026fc5812385664774d', '52a7fcd4bed0afd5ec03c42451798ce1e9f92fa251dd2e8f43533c868aa9f42b', NULL, '2026-01-03 02:03:28'),
(169, '119.192.206.95', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '157875b6a05cc653ac792a0c3b2d7a44', 'e024bb0c3501a78625bf2bf1a34f599cb3ea2f98273e64194a8d8e118131c8be', NULL, '2026-01-03 06:15:57'),
(170, '1.241.163.45', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 NAVER(inapp; map; 101; 6.2.2) WebViewSDK(map; dark; portrait)', 'dc98c757431a78a6dc955c260b6ce725', 'c3ffd9c8dabb1a56a0de745ee86a87e981c55d98be19774617623d21ebf75426', NULL, '2026-01-03 12:04:00'),
(171, '1.241.163.45', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'ad35612b5254426cf78f099d1186bd10', '946bfb036f452fddcae70ba75b40b8f0e041ca889e0a3ae008c60f6b593975a7', NULL, '2026-01-03 12:04:47'),
(172, '211.36.143.136', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 410.1.0.36.70 (iPhone14,4; iOS 18_6_2; ko_KR; ko; scale=3.00; 1125x2436; IABMV/1; 849447290) Safari/604.1', '05d86f2c28ef4eb920ea201febd9298d', 'd194bfa0ad374a6563d4d3a509014f611d52a48d67ae49d78e9c444201adb58d', NULL, '2026-01-04 01:36:09'),
(173, '118.235.73.132', 'Mozilla/5.0 (Linux; Android 16; SM-S908N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.115 Mobile Safari/537.36 DaumApps/8.4.4 DaumDevice/mobile', 'fdf777d217100a5e835a62a0b3290196', '81c4942898fd1b4f3cac3d189a76f8e3e4aa270816f7cde232eb598f0c378c9c', NULL, '2026-01-04 03:48:55'),
(174, '218.237.106.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '1e91517f4cb7d98a7bb4f36f59b29a4a', 'bf2e1753213e834644e3dea93c675118900bc30d250f5b9e09d6113dcb208a52', NULL, '2026-01-04 05:53:01'),
(175, '58.227.123.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'dc612ee6b8d5a9f26d1a3614bef25648', '5a6795cd3fed1da691413c686f478c3e288336690acfe5ec526b090c153902e5', NULL, '2026-01-04 11:10:33'),
(176, '180.224.86.94', 'Mozilla/5.0 (Linux; Android 16; SM-S918N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.146 Mobile Safari/537.36 Instagram 410.1.0.63.71 Android (36/16; 420dpi; 1080x2316; samsung; SM-S918N; dm3q; qcom; ko_KR; 846519237; IABMV/1)', '6318d4e17a2d8b5b3eb1929c2ffb139c', '1aff6c6c60c0831d6099c3ee187e428130b4c3ba538bae17422e4f1e24374b8a', NULL, '2026-01-04 20:49:36'),
(177, '211.46.167.110', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2c638a7918ec69853b6b24f825bbb46e', '38821bca113b779591d7b49d766c922b151201779a38b3941a75bae0befaf2f4', NULL, '2026-01-05 00:06:29'),
(178, '61.252.191.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '1792dd87234ea3960778fd59878b0fab', '9866d4b72fa95deb2e5d55cc0f48394906055ce15da5eb07a1447c7158ed99d5', NULL, '2026-01-05 07:10:23'),
(179, '203.142.217.240', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '3d685f52873ca5d45af77d13fbfc3d16', 'b45650a333c83b0cbf72a3f1c995eef171414e936c7df165ccdeaab48e2b8689', NULL, '2026-01-06 08:25:58'),
(180, '223.38.72.74', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'fc1bbf6217615375858b0fa36337c37d', 'c790c462ab401cde55aaf30ed1e259880ab89493d37a88dfb494534055c956f1', NULL, '2026-01-07 00:07:04'),
(181, '58.77.189.218', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 410.1.0.36.70 (iPhone16,1; iOS 18_6_2; ko_KR; ko; scale=3.00; 1179x2556; IABMV/1; 849447290) Safari/604.1', '0df54a93d7104b92a9bb8cc1c941d66d', '9ae68a8c1794fd681484a9210cc96b43b988dbf7b0d7b4c710c4f37aff1d1687', NULL, '2026-01-07 12:11:01'),
(182, '183.102.205.229', 'Mozilla/5.0 (Linux; Android 16; SM-S901N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 Instagram 412.0.0.0.50 Android (36/16; 480dpi; 1080x2340; samsung; SM-S901N; r0q; qcom; ko_KR; 855777889; IABMV/1)', 'd49769d7eba9436a290b1fc873f029c8', '0564e41e5932eed2a9d0f94da2e44728332dcfe91466a594b0d8e15f0ecb2e06', NULL, '2026-01-07 12:40:36'),
(183, '192.168.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', '549b1d9277c6c302233428c4aebcdf54', 'eb44f4539fd4e941867535b2c63da866cded249a3207bd3f59692f91c7005d92', NULL, '2026-01-08 01:52:52'),
(184, '34.123.170.104', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'ce1f51bb719da934f94e7fa85a86c779', 'db54b47e399c3f09eff6200cfe5847841a94462a9988efef3e2f88cd4e8d5622', NULL, '2026-01-08 02:04:12'),
(185, '205.169.39.107', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'f7b3ca3e3793f6a9c39719e8e09b3763', '25287d6c4250b6af35a880d8124a469bdf8b0b64c95957c7ebb0d24c74720cea', NULL, '2026-01-08 02:04:20'),
(186, '205.169.39.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '76c876dadf7b3cf4b06b05340ace8d7d', '089df2b3e77444a1232328fcd5d3c5b92f8dc311c634e76562a4ad54f32b1b0a', NULL, '2026-01-08 02:04:25'),
(187, '211.235.75.80', 'Mozilla/5.0 (Linux; Android 16; SM-S911N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.34 Mobile Safari/537.36 Instagram 411.0.0.23.257 Android (36/16; 510dpi; 1080x2340; samsung; SM-S911N; dm1q; qcom; ko_KR; 856095491; IABMV/1)', 'e518ed3b4df56f6547e0681f5495826a', '77750e11eb94e1d5354a72ca41019c81292418ce66e95b029190ae9a7a407515', NULL, '2026-01-08 04:20:53'),
(188, '121.133.198.161', 'Mozilla/5.0 (iPad; CPU OS 17_7_10 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/21H450 Instagram 410.1.0.36.70 (iPad7,4; iPadOS 17_7_10; ko_KR; ko; scale=2.00; 2224x1668; IABMV/1; 849447290) Safari/604.1', '6f7c8a062193132ed8bcd2cbe79cfd16', '68e828dcccc7ea6e103f5f0bf012dbb0ba5b934959985cfb1e30fa2bb955f70e', NULL, '2026-01-08 05:36:54'),
(189, '203.228.139.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '1f040eec739e622b05a994afb4a3befe', '941a39cd53c0f64a9b6527ade50fe704a7b89ba89f96324588ec33acdc49af1d', NULL, '2026-01-09 08:43:33'),
(190, '59.23.154.210', 'Mozilla/5.0 (Linux; Android 16; SM-S928N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.146 Mobile Safari/537.36 Instagram 411.0.0.23.257 Android (36/16; 420dpi; 1080x2340; samsung; SM-S928N; e3q; qcom; ko_KR; 856095591; IABMV/1)', '26dc64b860521188ed1576a32875ef8e', '5429180893ce0cd1693a27a81eca83caa8ecc54fc71713de91b52bc38ca166e0', NULL, '2026-01-09 16:04:48'),
(191, '118.222.172.177', 'Mozilla/5.0 (Linux; Android 13; SM-A716S Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.23 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.4)', '939170481b17de9f3bb65b7bbce61b3d', 'b2cdec7d9db829028053bb299841bc7d65e75f3b269e0e1b67212fc7977d22b2', NULL, '2026-01-10 00:15:24'),
(192, '223.38.85.147', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '37f350280d8682d01afdbc273725f0a7', '1a9673b43cb0f07d950a9a0a0b87836e53fbc4e81900a31d3b29b2451d089e2e', NULL, '2026-01-11 04:40:05'),
(193, '61.39.186.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.2 Mobile/15E148 Safari/604.1', '55c07383acc41aae0defaf8d88ab6627', '541bf2dfd831277f350574eba25b3e702a91893c4cc1b3eadecd9dfa4f507849', NULL, '2026-01-11 05:17:57'),
(194, '39.117.215.179', 'Mozilla/5.0 (Linux; Android 13; SM-N986N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.146 Mobile Safari/537.36 Instagram 411.0.0.23.257 Android (33/13; 600dpi; 1440x3088; samsung; SM-N986N; c2q; qcom; ko_KR; 856095491; IABMV/1)', 'ad059997923f0079e4e7aa6b59c0d61e', '38a138f929aafe340587bb48edff15f09edd2fbd6b110dbd06a6e039afc63939', NULL, '2026-01-12 09:08:51'),
(195, '58.140.8.112', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'd84d314fa4b04c5d13ae338233273cda', '03b05f9741ae334cf96dd1126a1d2ce3af88841028db748d79f2d54909cc2974', NULL, '2026-01-13 10:52:55'),
(196, '211.246.68.239', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/143.0.7499.151 Mobile/15E148 Safari/604.1', '43e83450aa89a9c1642ec69e8e917189', '4efc831708b61251ed22b7c154bbef92be3a4a716889a90fd3f8121d0322cee5', NULL, '2026-01-13 11:07:50'),
(197, '61.39.186.152', 'Mozilla/5.0 (Phone; OpenHarmony 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 ArkWeb/6.0.0.46SP3 Mobile MicroMessenger/8.0.14.42(0xf3800e2a) Weixin NetType/WIFI Language/zh_CN MMWEBID/2416 MMWEBSDK/202512115004 XWEB/1320113', 'ab56131e3ee1502a88deaedcb4b97805', '2a4c850f571311f6ed66f903c8e2e1ca1b3f7c24afec59664c15ceee4a5f7ec3', NULL, '2026-01-14 04:25:56'),
(198, '221.146.203.130', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', '9604ff6f8579a4e269fc952d1c69617b', '63036aa15382d90891631b4130cb81e61f5a8091d653071101c43d3726c995d8', NULL, '2026-01-14 09:10:19'),
(199, '106.101.134.32', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22F76 Instagram 359.0.0.37.88 (iPhone14,3; iOS 18_5; zh-Hans_KR; zh-Hans; scale=3.00; 1284x2778; 666576740; IABMV/1)', 'ba7827551fd48989b4ce19e39c581e3e', 'b329a910bdc5820b7f2a4580a5303344f844c67c742fcdefe312316a020a8dc3', NULL, '2026-01-14 10:24:01'),
(200, '119.192.222.248', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'cd362f760e4f1860272a5d0ba1c8ea75', '024922fa2f17ab92e3579bbb36bf33e77f9ec70e75e8a6491e0b4387a474d5b1', NULL, '2026-01-14 11:09:43'),
(201, '211.36.139.86', 'Mozilla/5.0 (Linux; Android 16; SM-S938N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.63 Mobile Safari/537.36 Instagram 412.0.0.35.87 Android (36/16; 600dpi; 1440x3120; samsung; SM-S938N; pa3q; qcom; ko_KR; 860442667; IABMV/1)', 'f592e6ce75d6fdcfac4899e7678f97d8', '830328afe6b1f534dc2f4f475ac8d71f37ae2b09fa46b2f90adb01f472eba538', NULL, '2026-01-15 06:27:05'),
(202, '203.128.172.212', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.2 Mobile/15E148 Safari/604.1', '5522b4101fc3cec4dfdc447bc5729083', 'fdcd3bfc737558159d416f5350b633e3573f247f098f5d58792c0c7d29efea3a', NULL, '2026-01-17 08:35:29'),
(203, '210.101.77.39', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', '661b144c1f1faf56c509b0e736003db2', '5039b3e7f1bff2e0a99e501f0ac4a06eb862921dd7d7786bad904502962fcda4', NULL, '2026-01-18 08:31:12'),
(204, '211.248.240.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '95a1a5ad63452556fc2f14a2ffe1eefa', '98ab55ab8ff2e8adee1053fae338135e4ffa1eb3e603ae275bc3732c02d500c8', NULL, '2026-01-20 09:34:18'),
(205, '211.104.24.13', 'Mozilla/5.0 (Linux; Android 15; A401OP Build/AP3A.240617.008; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/143.0.7499.192 Mobile Safari/537.36 YJApp-ANDROID jp.co.yahoo.android.ybrowser/3.65.1.0', '156c4f0090045aa4a1b472688875154f', 'e376efd05f77ed2b89d9f8f0f9af010a3e7bf09fcae92938fc20e463ded1ec72', NULL, '2026-01-21 02:20:18'),
(206, '125.128.28.185', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/27.0 Chrome/125.0.0.0 Mobile Safari/537.36', '103b94272ce9b7f9c8a8d513f9f5196f', '999993c4826bc2051af9bcc7ea8899e759cf4888c9d89520b478dd8c5d0af8e2', NULL, '2026-01-21 07:57:41'),
(207, '119.196.116.220', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4; 11)', '44ab0abdf4f380aff8cb93a5e054d201', '6dd6b9ea8f7fa046b7c0547c62717a86ca95ed60fe57dc409dff29390c6c9ac5', NULL, '2026-01-21 13:19:02'),
(208, '121.154.25.229', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23B85 Instagram 412.0.0.17.89 (iPhone16,1; iOS 26_1; ko_KR; ko; scale=3.00; 960x2079; IABMV/1; 859471633) Safari/604.1', '4d83b9955511b34715bd5d5630381d5e', '5e88468effe1145a4c41aefe7fab13e985e46a2f1425080f1d6bca55e548caad', NULL, '2026-01-22 11:08:21'),
(209, '211.106.44.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', '6449f271c3333cd95280d5d42401ca66', '6ab68e0371ca70067cfcce3d38bb7262628dff53d0a6fd7645b35e61db934d87', NULL, '2026-01-22 14:33:54'),
(210, '211.234.196.247', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', '59250a4dbe226afc04a2d0348328d7fe', '04ee88328609ce6f7c5466536fd103a432bf61bc6393e16a90276a1ffdd8696a', NULL, '2026-01-22 15:28:35'),
(211, '119.195.228.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'b06d18a1318c9d7f508f85aefe51ba3c', '9e2a83dece10c84c4e11bcc2b064916e32c32f267743da0f4dcc09662ade6b86', NULL, '2026-01-23 14:24:07'),
(212, '119.195.228.54', 'Mozilla/5.0 (Linux; Android 16; SM-F766N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.24 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.7)', '030dfd3bc7ddd79c1868f01027c44da8', '6a4539ec5168cefdf6919e5e6496884a5c8b18f8a7529caa735a4f9c4966ae02', NULL, '2026-01-23 14:30:35'),
(213, '119.195.228.54', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'c68124d391cf96b3c05efcd74bb39fa5', '754d61f12c2b486c615a03b85393c2eb1e7deb6201d54e1feda2f469b7a8c79e', NULL, '2026-01-23 14:31:59'),
(214, '125.191.51.42', 'Mozilla/5.0 (Linux; Android 16; SM-F966N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.87 Mobile Safari/537.36 Instagram 413.0.0.41.84 Android (36/16; 360dpi; 1080x2520; samsung; SM-F966N; q7q; qcom; ko_KR; 865356627)', 'c78e5f6cd1965ea158b7cd7a1e072ab5', '4f481321c4083552c7f72605f2dfc03991eebc8eb1a2fdd9a8b3813b1f12b97a', NULL, '2026-01-23 23:36:47'),
(215, '36.39.116.36', 'Mozilla/5.0 (Linux; Android 13; SM-G986N Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.59 Mobile Safari/537.36 Instagram 413.0.0.41.84 Android (33/13; 450dpi; 1080x2400; samsung; SM-G986N; y2q; qcom; ko_KR; 865356562; IABMV/1)', '20a710fdd1b54a7ffc019644d620ade1', '73608e07a5ea41617a092ca47612cabb085e2520805c59ee073aa95f1298526b', NULL, '2026-01-24 13:46:28'),
(216, '61.102.133.66', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', 'fc01f5f78f56ec113bfa7d1882827132', 'aadaf974f38d1ff5ecf0860f32ecb4f17abbe41aef5849229a8f6df193b78ef9', NULL, '2026-01-25 00:22:58'),
(217, '211.106.38.12', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', '3b4107e454da1863e2636c1f32cd3f32', '91a7cb576ebc073b1a7098547ff1bf6a8c1927778289834c811588ebfb515cc9', NULL, '2026-01-25 02:08:40'),
(218, '203.236.91.147', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'fa02a489c47abd7054899ee004f50484', '0172091f75fb45c245e0e707d3f7a46edbc7daec1f35b35e43224fe0b1f6bd3a', NULL, '2026-01-25 05:30:57'),
(219, '218.52.36.125', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'ba9409c5d8ca18130723663e3bc7276a', 'b584f6d01b8d1279bb81d371d80afbd420378bad8b3ba7d97b39fc87759e7c09', NULL, '2026-01-25 13:15:55'),
(220, '203.228.139.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', '1f839166e0fee305bd091d7655836aba', 'bb0314c5c17665eac6b5c31111c331869f2f973f3f0cfb280df9ae714c4ba40d', NULL, '2026-01-26 05:53:44'),
(221, '61.102.134.101', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23C55 Instagram 413.0.0.20.79 (iPhone14,7; iOS 26_2; es_LA; es; scale=3.00; 1170x2532; IABMV/1; 863488198) Safari/604.1', '5573de5dba88c19376569add906d69cb', '25d809d511d2d15d9fe15cee0b5d41426c603c2240c7bab13b8f6ccbc31763b9', NULL, '2026-01-26 20:32:14'),
(222, '203.142.217.240', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', '32531126b01792241222b69680600026', '78520fc9220903ba6fe1ab6f124e4e40a537aa6f0aa2ae16e6bb5976cda68d7f', NULL, '2026-01-27 00:44:58'),
(223, '115.92.5.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'b2895fa08f6982387251bce0b490ff4b', 'fb7500b2d26a88bba5db2f68b53271ca574610db6cf76d36d3db579e1de714ec', NULL, '2026-01-27 00:48:52'),
(224, '222.112.46.156', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/23D5103d Instagram 413.0.0.20.79 (iPhone17,1; iOS 26_3; en_US; en; scale=3.00; 1206x2622; IABMV/1; 863488198) Safari/604.1', 'e872659003759350119586743d17c048', '869690b50ff3ca57ed5bb471a6ee33d635f3e6e5e855f050d781d4d8909482f5', NULL, '2026-01-27 03:41:59'),
(225, '59.15.178.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', '2bb92cde9c30c0a6954a32024c9e89f2', '2dfe665638eac9059af816597cfa7e674ee0b4b81cf9084f6550b7cc1cf08532', NULL, '2026-01-27 04:04:21'),
(226, '221.153.232.154', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/605.1 NAVER(inapp; search; 2100; 12.18.4; 16)', 'efaaf46ffd2ad31e30e68dbd39d7de60', '3d2dda6b0d9cd663eacfc3aa8a71276a560c3135b425de85c93d67eb4e635115', NULL, '2026-01-27 04:04:52'),
(227, '203.142.217.240', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Whale/4.35.351.16 Safari/537.36', 'dddfacf2b8614e6e3fa6936d7fc1ff2b', 'ffeae72355c892ae90ca7bdaba6590eb37a0b984f030438d16fa6bc764ffd486', NULL, '2026-01-27 05:41:06'),
(228, '211.112.132.87', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', 'baf10e436523383dd64ce8b96cc8ddef', 'dd580fa683811c2d608a0d1d160e7f5245f8a4151404054cef93ec372f671f4f', NULL, '2026-01-27 05:50:22'),
(229, '59.22.29.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', '7a128201642a24141a1a93e22523f390', 'd21f6701b16a595dd713d47b8095b4f99b79cfa310cd40f3936eaca5d239dfdf', NULL, '2026-01-27 07:09:33'),
(230, '121.160.164.179', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', '78bfbf86802d25a786b0e0c6a4d4da20', 'fe42913819688c1cb60bc2d38aef91b21f8cd6201a117dca56bdafc1378f8195', NULL, '2026-01-27 15:58:18'),
(231, '106.101.3.78', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) EdgiOS/143.0.3650.139 Version/26.0 Mobile/15E148 Safari/604.1', '6fa8886acfc91cdecaa25f2e767c1e03', 'a8208976d5f91fc407b111bca0882c12f5032b138d87356d687bc768bbb9ded4', NULL, '2026-01-28 08:18:32'),
(232, '117.111.6.83', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36', '68435a6387ed31a69c4c9d19549ebc3c', 'ded3fd00ebcb7bc14df539a8ee85f8f3a427bd8a108f47b756a9ecd30a244370', NULL, '2026-01-28 10:04:25'),
(233, '61.79.98.3', 'Mozilla/5.0 (Linux; Android 16; SM-F946N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.24 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.7)', '807a1c75325fa4ec7b8aee86882b9b12', 'ed351f65d87259606d37fb843167d25d22f2a9bc07a79cb7427913d60d7e6ec1', NULL, '2026-01-28 11:46:40'),
(234, '121.129.22.54', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22G100 Instagram 414.0.0.23.79 (iPhone13,2; iOS 18_6_2; ko_KR; ko; scale=3.00; 1170x2532; IABMV/1; 868652560) Safari/604.1', 'b2816cc39ba2f7e5ecb972997c15b188', 'a8e59b2563a0bcc36592d01f063683f0978d3d94a40c5b0822223c91eb6950f6', NULL, '2026-01-29 06:51:13'),
(235, '211.234.180.19', 'Mozilla/5.0 (Linux; Android 16; SM-S921N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/128.0.0.0 Whale/1.0.0.0 Crosswalk/29.128.0.24 Mobile Safari/537.36 NAVER(inapp; search; 2100; 12.18.7)', '2238dbd1b7ca3a58f42dd5f98749ae0e', '4dc67d87ea64e269fd8f547d0819364e7a7d017dd0e864f9074d30b8dc43d368', NULL, '2026-01-30 08:08:57'),
(236, '223.38.86.192', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 MicroMessenger/8.0.68(0x1800442d) NetType/4G Language/zh_CN', 'f6de992b3f6067afa98f1a753a1d646a', 'd33dad0039206ff7e64c97e2a6a28af1dd698add48fbacf3ce3c62bf618631d5', NULL, '2026-01-31 04:36:36'),
(237, '223.38.86.192', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.1 Mobile/15E148 Safari/604.1', 'b6fd867b0b1ad963f8f2386d913c9f34', '854a00d582830c9ab229c5bb667df38ffdd57153bf78d7ceb9ebd77cc95fa88f', NULL, '2026-01-31 04:36:44'),
(238, '211.234.204.148', 'Mozilla/5.0 (Linux; Android 16; SM-F966N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/134.0.6998.135 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/544.0.0.42.272;IABMV/1;]', '8487a57ff236ebfdae788c181191c1ee', '2dd4b88785e33e0ce75db98fe859078ccb88dda8f074e90a737ff98a35f4c8a6', NULL, '2026-01-31 05:43:18'),
(239, '210.108.123.184', 'Mozilla/5.0 (Linux; Android 16; SM-S906N Build/BP2A.250605.031.A3; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/144.0.7559.59 Mobile Safari/537.36 Instagram 414.0.0.40.83 Android (36/16; 450dpi; 1080x2340; samsung; SM-S906N; g0q; qcom; ko_KR; 871095918; IABMV/1)', 'b58b023bf77398d11e11953190dc786a', 'a1138844a079bccb11818d5c702404ad4df0c167b38b284f831bf93520d82467', NULL, '2026-02-01 05:23:53'),
(240, '106.101.194.186', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', '261b493f89d0127c697e421a4eb434e3', 'b05070f7660420dd7109c26c97249e5595c447ec4ffbb812f88b94850e31b70d', NULL, '2026-02-01 05:55:55'),
(241, '192.168.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', '15c3024db1d3917da29cf55ee59248c7', '0cd8ff40d005e10c9d62b032bcbb4fdfe27e3cd5339eee7d5e383114c57c7d8a', NULL, '2026-02-02 01:48:40');

-- --------------------------------------------------------

--
-- Stand-in structure for view `dsp_v_member_age`
-- (See below for the actual view)
--
CREATE TABLE `dsp_v_member_age` (
`mem_id` int(11) unsigned
,`age_group` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dsp_v_member_nation`
-- (See below for the actual view)
--
CREATE TABLE `dsp_v_member_nation` (
`mem_id` int(11) unsigned
,`nation` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dsp_v_member_purpose`
-- (See below for the actual view)
--
CREATE TABLE `dsp_v_member_purpose` (
`mem_id` int(11) unsigned
,`purpose` text
);

-- --------------------------------------------------------

--
-- 뷰 구조 `dsp_v_member_age`
--
DROP TABLE IF EXISTS `dsp_v_member_age`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dsp_v_member_age`  AS SELECT `dsp_member_extra_vars`.`mem_id` AS `mem_id`, `dsp_member_extra_vars`.`mev_value` AS `age_group` FROM `dsp_member_extra_vars` WHERE `dsp_member_extra_vars`.`mev_key` = 'mem_age''mem_age'  ;

-- --------------------------------------------------------

--
-- 뷰 구조 `dsp_v_member_nation`
--
DROP TABLE IF EXISTS `dsp_v_member_nation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dsp_v_member_nation`  AS SELECT `dsp_member_extra_vars`.`mem_id` AS `mem_id`, `dsp_member_extra_vars`.`mev_value` AS `nation` FROM `dsp_member_extra_vars` WHERE `dsp_member_extra_vars`.`mev_key` = 'mem_nation''mem_nation'  ;

-- --------------------------------------------------------

--
-- 뷰 구조 `dsp_v_member_purpose`
--
DROP TABLE IF EXISTS `dsp_v_member_purpose`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dsp_v_member_purpose`  AS SELECT `dsp_member_extra_vars`.`mem_id` AS `mem_id`, `dsp_member_extra_vars`.`mev_value` AS `purpose` FROM `dsp_member_extra_vars` WHERE `dsp_member_extra_vars`.`mev_key` = 'mem_purpose''mem_purpose'  ;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `dsp_admin_auth`
--
ALTER TABLE `dsp_admin_auth`
  ADD PRIMARY KEY (`no`),
  ADD KEY `mem_userid` (`mem_userid`),
  ADD KEY `admin_role` (`admin_role`);

--
-- 테이블의 인덱스 `dsp_admin_auth_history`
--
ALTER TABLE `dsp_admin_auth_history`
  ADD PRIMARY KEY (`no`),
  ADD KEY `mem_userid` (`mem_userid`),
  ADD KEY `admin_role` (`admin_role`);

--
-- 테이블의 인덱스 `dsp_attendance`
--
ALTER TABLE `dsp_attendance`
  ADD PRIMARY KEY (`att_id`),
  ADD UNIQUE KEY `att_date_mem_id` (`att_date`,`mem_id`),
  ADD KEY `att_datetime_mem_id` (`att_datetime`,`mem_id`);

--
-- 테이블의 인덱스 `dsp_autologin`
--
ALTER TABLE `dsp_autologin`
  ADD PRIMARY KEY (`aul_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_banner`
--
ALTER TABLE `dsp_banner`
  ADD PRIMARY KEY (`ban_id`),
  ADD KEY `bng_name` (`bng_name`),
  ADD KEY `ban_start_date` (`ban_start_date`),
  ADD KEY `ban_end_date` (`ban_end_date`);

--
-- 테이블의 인덱스 `dsp_banner_click_log`
--
ALTER TABLE `dsp_banner_click_log`
  ADD PRIMARY KEY (`bcl_id`),
  ADD KEY `ban_id` (`ban_id`);

--
-- 테이블의 인덱스 `dsp_banner_group`
--
ALTER TABLE `dsp_banner_group`
  ADD PRIMARY KEY (`bng_id`),
  ADD KEY `bng_name` (`bng_name`);

--
-- 테이블의 인덱스 `dsp_blame`
--
ALTER TABLE `dsp_blame`
  ADD PRIMARY KEY (`bla_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `target_mem_id` (`target_mem_id`),
  ADD KEY `target_id` (`target_id`),
  ADD KEY `brd_id` (`brd_id`);

--
-- 테이블의 인덱스 `dsp_board`
--
ALTER TABLE `dsp_board`
  ADD PRIMARY KEY (`brd_id`),
  ADD UNIQUE KEY `brd_key` (`brd_key`),
  ADD KEY `bgr_id` (`bgr_id`);

--
-- 테이블의 인덱스 `dsp_board_admin`
--
ALTER TABLE `dsp_board_admin`
  ADD PRIMARY KEY (`bam_id`),
  ADD KEY `brd_id` (`brd_id`);

--
-- 테이블의 인덱스 `dsp_board_category`
--
ALTER TABLE `dsp_board_category`
  ADD PRIMARY KEY (`bca_id`),
  ADD KEY `brd_id` (`brd_id`);

--
-- 테이블의 인덱스 `dsp_board_group`
--
ALTER TABLE `dsp_board_group`
  ADD PRIMARY KEY (`bgr_id`),
  ADD UNIQUE KEY `bgr_key` (`bgr_key`),
  ADD KEY `bgr_order` (`bgr_order`);

--
-- 테이블의 인덱스 `dsp_board_group_admin`
--
ALTER TABLE `dsp_board_group_admin`
  ADD PRIMARY KEY (`bga_id`),
  ADD KEY `bgr_id` (`bgr_id`);

--
-- 테이블의 인덱스 `dsp_board_group_meta`
--
ALTER TABLE `dsp_board_group_meta`
  ADD UNIQUE KEY `bgr_id_bgm_key` (`bgr_id`,`bgm_key`);

--
-- 테이블의 인덱스 `dsp_board_meta`
--
ALTER TABLE `dsp_board_meta`
  ADD UNIQUE KEY `brd_id_bmt_key` (`brd_id`,`bmt_key`);

--
-- 테이블의 인덱스 `dsp_branch`
--
ALTER TABLE `dsp_branch`
  ADD PRIMARY KEY (`no`),
  ADD KEY `isUse` (`isUse`),
  ADD KEY `isMajor` (`isMajor`);

--
-- 테이블의 인덱스 `dsp_branch_file_upload`
--
ALTER TABLE `dsp_branch_file_upload`
  ADD PRIMARY KEY (`no`),
  ADD KEY `applyNo` (`branchNo`),
  ADD KEY `type` (`type`),
  ADD KEY `year` (`year`);

--
-- 테이블의 인덱스 `dsp_cmall_cart`
--
ALTER TABLE `dsp_cmall_cart`
  ADD PRIMARY KEY (`cct_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `cit_id` (`cit_id`);

--
-- 테이블의 인덱스 `dsp_cmall_category`
--
ALTER TABLE `dsp_cmall_category`
  ADD PRIMARY KEY (`cca_id`);

--
-- 테이블의 인덱스 `dsp_cmall_category_rel`
--
ALTER TABLE `dsp_cmall_category_rel`
  ADD PRIMARY KEY (`ccr_id`),
  ADD KEY `cit_id` (`cit_id`),
  ADD KEY `cca_id` (`cca_id`);

--
-- 테이블의 인덱스 `dsp_cmall_demo_click_log`
--
ALTER TABLE `dsp_cmall_demo_click_log`
  ADD PRIMARY KEY (`cdc_id`),
  ADD KEY `cit_id` (`cit_id`);

--
-- 테이블의 인덱스 `dsp_cmall_download_log`
--
ALTER TABLE `dsp_cmall_download_log`
  ADD PRIMARY KEY (`cdo_id`),
  ADD KEY `cde_id` (`cde_id`),
  ADD KEY `cit_id` (`cit_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_cmall_item`
--
ALTER TABLE `dsp_cmall_item`
  ADD PRIMARY KEY (`cit_id`),
  ADD UNIQUE KEY `cit_key` (`cit_key`),
  ADD KEY `cit_order` (`cit_order`),
  ADD KEY `cit_price` (`cit_price`),
  ADD KEY `cit_sell_count` (`cit_sell_count`);

--
-- 테이블의 인덱스 `dsp_cmall_item_detail`
--
ALTER TABLE `dsp_cmall_item_detail`
  ADD PRIMARY KEY (`cde_id`),
  ADD KEY `cit_id` (`cit_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_cmall_item_history`
--
ALTER TABLE `dsp_cmall_item_history`
  ADD PRIMARY KEY (`chi_id`),
  ADD KEY `cit_id` (`cit_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_cmall_item_meta`
--
ALTER TABLE `dsp_cmall_item_meta`
  ADD UNIQUE KEY `cit_id_cim_key` (`cit_id`,`cim_key`);

--
-- 테이블의 인덱스 `dsp_cmall_order`
--
ALTER TABLE `dsp_cmall_order`
  ADD PRIMARY KEY (`cor_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `cor_pay_type` (`cor_pay_type`),
  ADD KEY `cor_datetime` (`cor_datetime`),
  ADD KEY `cor_approve_datetime` (`cor_approve_datetime`),
  ADD KEY `cor_status` (`cor_status`);

--
-- 테이블의 인덱스 `dsp_cmall_order_detail`
--
ALTER TABLE `dsp_cmall_order_detail`
  ADD PRIMARY KEY (`cod_id`),
  ADD KEY `cor_id` (`cor_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_cmall_qna`
--
ALTER TABLE `dsp_cmall_qna`
  ADD PRIMARY KEY (`cqa_id`),
  ADD KEY `cit_id` (`cit_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_cmall_review`
--
ALTER TABLE `dsp_cmall_review`
  ADD PRIMARY KEY (`cre_id`),
  ADD KEY `cit_id` (`cit_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_cmall_wishlist`
--
ALTER TABLE `dsp_cmall_wishlist`
  ADD PRIMARY KEY (`cwi_id`),
  ADD UNIQUE KEY `mem_id_cit_id` (`mem_id`,`cit_id`);

--
-- 테이블의 인덱스 `dsp_comment`
--
ALTER TABLE `dsp_comment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `post_id_cmt_num_cmt_reply` (`post_id`,`cmt_num`,`cmt_reply`);

--
-- 테이블의 인덱스 `dsp_comment_meta`
--
ALTER TABLE `dsp_comment_meta`
  ADD UNIQUE KEY `cmt_id_cme_key` (`cmt_id`,`cme_key`);

--
-- 테이블의 인덱스 `dsp_config`
--
ALTER TABLE `dsp_config`
  ADD UNIQUE KEY `cfg_key` (`cfg_key`);

--
-- 테이블의 인덱스 `dsp_coupon`
--
ALTER TABLE `dsp_coupon`
  ADD PRIMARY KEY (`coupon_no`),
  ADD KEY `idx_store` (`store_no`),
  ADD KEY `idx_code` (`coupon_code`),
  ADD KEY `idx_valid` (`valid_from`,`valid_to`),
  ADD KEY `idx_stamp_use` (`is_stamp`,`is_use`),
  ADD KEY `idx_dsp_coupon_audience` (`target_audience`);

--
-- 테이블의 인덱스 `dsp_coupon_usage`
--
ALTER TABLE `dsp_coupon_usage`
  ADD PRIMARY KEY (`usage_no`),
  ADD KEY `idx_mem_time` (`mem_id`,`used_at`),
  ADD KEY `idx_store_time` (`store_no`,`used_at`),
  ADD KEY `idx_coupon_time` (`coupon_no`,`used_at`),
  ADD KEY `idx_coupon_member_time` (`coupon_no`,`mem_id`,`used_at`),
  ADD KEY `idx_used_at` (`used_at`),
  ADD KEY `idx_store_no` (`store_no`),
  ADD KEY `idx_coupon_no` (`coupon_no`),
  ADD KEY `idx_mem` (`mem_id`),
  ADD KEY `idx_device` (`device`,`browser`);

--
-- 테이블의 인덱스 `dsp_currentvisitor`
--
ALTER TABLE `dsp_currentvisitor`
  ADD PRIMARY KEY (`cur_ip`);

--
-- 테이블의 인덱스 `dsp_deposit`
--
ALTER TABLE `dsp_deposit`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `dep_pay_type` (`dep_pay_type`),
  ADD KEY `dep_datetime` (`dep_datetime`),
  ADD KEY `dep_deposit_datetime` (`dep_deposit_datetime`),
  ADD KEY `dep_status` (`dep_status`);

--
-- 테이블의 인덱스 `dsp_document`
--
ALTER TABLE `dsp_document`
  ADD PRIMARY KEY (`doc_id`),
  ADD UNIQUE KEY `doc_key` (`doc_key`);

--
-- 테이블의 인덱스 `dsp_editor_image`
--
ALTER TABLE `dsp_editor_image`
  ADD PRIMARY KEY (`eim_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_faq`
--
ALTER TABLE `dsp_faq`
  ADD PRIMARY KEY (`faq_id`),
  ADD KEY `fgr_id` (`fgr_id`);

--
-- 테이블의 인덱스 `dsp_faq_group`
--
ALTER TABLE `dsp_faq_group`
  ADD PRIMARY KEY (`fgr_id`),
  ADD UNIQUE KEY `fgr_key` (`fgr_key`);

--
-- 테이블의 인덱스 `dsp_follow`
--
ALTER TABLE `dsp_follow`
  ADD PRIMARY KEY (`fol_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `target_mem_id` (`target_mem_id`);

--
-- 테이블의 인덱스 `dsp_like`
--
ALTER TABLE `dsp_like`
  ADD PRIMARY KEY (`lik_id`),
  ADD KEY `target_id` (`target_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `target_mem_id` (`target_mem_id`);

--
-- 테이블의 인덱스 `dsp_member`
--
ALTER TABLE `dsp_member`
  ADD PRIMARY KEY (`mem_id`),
  ADD UNIQUE KEY `mem_userid` (`mem_userid`),
  ADD KEY `mem_email` (`mem_email`),
  ADD KEY `mem_lastlogin_datetime` (`mem_lastlogin_datetime`),
  ADD KEY `mem_register_datetime` (`mem_register_datetime`);

--
-- 테이블의 인덱스 `dsp_member_auth_email`
--
ALTER TABLE `dsp_member_auth_email`
  ADD PRIMARY KEY (`mae_id`),
  ADD KEY `mae_key_mem_id` (`mae_key`,`mem_id`);

--
-- 테이블의 인덱스 `dsp_member_certify`
--
ALTER TABLE `dsp_member_certify`
  ADD PRIMARY KEY (`mce_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `mce_type` (`mce_type`);

--
-- 테이블의 인덱스 `dsp_member_dormant`
--
ALTER TABLE `dsp_member_dormant`
  ADD UNIQUE KEY `mem_userid` (`mem_userid`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `mem_email` (`mem_email`),
  ADD KEY `mem_lastlogin_datetime` (`mem_lastlogin_datetime`),
  ADD KEY `mem_register_datetime` (`mem_register_datetime`);

--
-- 테이블의 인덱스 `dsp_member_dormant_notify`
--
ALTER TABLE `dsp_member_dormant_notify`
  ADD PRIMARY KEY (`mdn_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `mem_email` (`mem_email`),
  ADD KEY `mem_register_datetime` (`mem_register_datetime`),
  ADD KEY `mem_lastlogin_datetime` (`mem_lastlogin_datetime`),
  ADD KEY `mdn_dormant_datetime` (`mdn_dormant_datetime`),
  ADD KEY `mdn_dormant_notify_datetime` (`mdn_dormant_notify_datetime`);

--
-- 테이블의 인덱스 `dsp_member_extra_vars`
--
ALTER TABLE `dsp_member_extra_vars`
  ADD UNIQUE KEY `mem_id_mev_key` (`mem_id`,`mev_key`);

--
-- 테이블의 인덱스 `dsp_member_group`
--
ALTER TABLE `dsp_member_group`
  ADD PRIMARY KEY (`mgr_id`),
  ADD KEY `mgr_order` (`mgr_order`);

--
-- 테이블의 인덱스 `dsp_member_group_member`
--
ALTER TABLE `dsp_member_group_member`
  ADD PRIMARY KEY (`mgm_id`),
  ADD KEY `mgr_id` (`mgr_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_member_level_history`
--
ALTER TABLE `dsp_member_level_history`
  ADD PRIMARY KEY (`mlh_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_member_login_log`
--
ALTER TABLE `dsp_member_login_log`
  ADD PRIMARY KEY (`mll_id`),
  ADD KEY `mll_success` (`mll_success`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_member_meta`
--
ALTER TABLE `dsp_member_meta`
  ADD UNIQUE KEY `mem_id_mmt_key` (`mem_id`,`mmt_key`);

--
-- 테이블의 인덱스 `dsp_member_nickname`
--
ALTER TABLE `dsp_member_nickname`
  ADD PRIMARY KEY (`mni_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `mni_nickname` (`mni_nickname`);

--
-- 테이블의 인덱스 `dsp_member_register`
--
ALTER TABLE `dsp_member_register`
  ADD PRIMARY KEY (`mrg_id`),
  ADD UNIQUE KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_member_selfcert_history`
--
ALTER TABLE `dsp_member_selfcert_history`
  ADD PRIMARY KEY (`msh_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_member_userid`
--
ALTER TABLE `dsp_member_userid`
  ADD UNIQUE KEY `mem_userid` (`mem_userid`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_menu`
--
ALTER TABLE `dsp_menu`
  ADD PRIMARY KEY (`men_id`);

--
-- 테이블의 인덱스 `dsp_note`
--
ALTER TABLE `dsp_note`
  ADD PRIMARY KEY (`nte_id`),
  ADD KEY `send_mem_id` (`send_mem_id`),
  ADD KEY `recv_mem_id` (`recv_mem_id`);

--
-- 테이블의 인덱스 `dsp_notification`
--
ALTER TABLE `dsp_notification`
  ADD PRIMARY KEY (`not_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_payment_inicis_log`
--
ALTER TABLE `dsp_payment_inicis_log`
  ADD KEY `pil_id` (`pil_id`);

--
-- 테이블의 인덱스 `dsp_payment_order_data`
--
ALTER TABLE `dsp_payment_order_data`
  ADD KEY `pod_id` (`pod_id`);

--
-- 테이블의 인덱스 `dsp_point`
--
ALTER TABLE `dsp_point`
  ADD PRIMARY KEY (`poi_id`),
  ADD KEY `mem_id_poi_type_poi_related_id_poi_action` (`mem_id`,`poi_type`,`poi_related_id`,`poi_action`);

--
-- 테이블의 인덱스 `dsp_popup`
--
ALTER TABLE `dsp_popup`
  ADD PRIMARY KEY (`pop_id`),
  ADD KEY `pop_start_date` (`pop_start_date`),
  ADD KEY `pop_end_date` (`pop_end_date`);

--
-- 테이블의 인덱스 `dsp_post`
--
ALTER TABLE `dsp_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_num_post_reply` (`post_num`,`post_reply`),
  ADD KEY `brd_id` (`brd_id`),
  ADD KEY `post_datetime` (`post_datetime`),
  ADD KEY `post_updated_datetime` (`post_updated_datetime`),
  ADD KEY `post_comment_updated_datetime` (`post_comment_updated_datetime`);

--
-- 테이블의 인덱스 `dsp_post_extra_vars`
--
ALTER TABLE `dsp_post_extra_vars`
  ADD UNIQUE KEY `post_id_pev_key` (`post_id`,`pev_key`);

--
-- 테이블의 인덱스 `dsp_post_file`
--
ALTER TABLE `dsp_post_file`
  ADD PRIMARY KEY (`pfi_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_post_file_download_log`
--
ALTER TABLE `dsp_post_file_download_log`
  ADD PRIMARY KEY (`pfd_id`),
  ADD KEY `pfi_id` (`pfi_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_post_history`
--
ALTER TABLE `dsp_post_history`
  ADD PRIMARY KEY (`phi_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_post_link`
--
ALTER TABLE `dsp_post_link`
  ADD PRIMARY KEY (`pln_id`),
  ADD KEY `post_id` (`post_id`);

--
-- 테이블의 인덱스 `dsp_post_link_click_log`
--
ALTER TABLE `dsp_post_link_click_log`
  ADD PRIMARY KEY (`plc_id`),
  ADD KEY `pln_id` (`pln_id`),
  ADD KEY `post_id` (`post_id`);

--
-- 테이블의 인덱스 `dsp_post_meta`
--
ALTER TABLE `dsp_post_meta`
  ADD UNIQUE KEY `post_id_pmt_key` (`post_id`,`pmt_key`);

--
-- 테이블의 인덱스 `dsp_post_naver_syndi_log`
--
ALTER TABLE `dsp_post_naver_syndi_log`
  ADD PRIMARY KEY (`pns_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_post_poll`
--
ALTER TABLE `dsp_post_poll`
  ADD PRIMARY KEY (`ppo_id`),
  ADD KEY `post_id` (`post_id`);

--
-- 테이블의 인덱스 `dsp_post_poll_item`
--
ALTER TABLE `dsp_post_poll_item`
  ADD PRIMARY KEY (`ppi_id`),
  ADD KEY `ppo_id` (`ppo_id`);

--
-- 테이블의 인덱스 `dsp_post_poll_item_poll`
--
ALTER TABLE `dsp_post_poll_item_poll`
  ADD PRIMARY KEY (`ppp_id`),
  ADD KEY `ppo_id` (`ppo_id`),
  ADD KEY `ppi_id` (`ppi_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_post_tag`
--
ALTER TABLE `dsp_post_tag`
  ADD PRIMARY KEY (`pta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `pta_tag` (`pta_tag`);

--
-- 테이블의 인덱스 `dsp_scrap`
--
ALTER TABLE `dsp_scrap`
  ADD PRIMARY KEY (`scr_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `post_id` (`post_id`);

--
-- 테이블의 인덱스 `dsp_search_keyword`
--
ALTER TABLE `dsp_search_keyword`
  ADD PRIMARY KEY (`sek_id`),
  ADD KEY `sek_keyword_sek_datetime_sek_ip` (`sek_keyword`,`sek_datetime`,`sek_ip`);

--
-- 테이블의 인덱스 `dsp_session`
--
ALTER TABLE `dsp_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timestamp` (`timestamp`);

--
-- 테이블의 인덱스 `dsp_sms_favorite`
--
ALTER TABLE `dsp_sms_favorite`
  ADD PRIMARY KEY (`sfa_id`);

--
-- 테이블의 인덱스 `dsp_sms_member`
--
ALTER TABLE `dsp_sms_member`
  ADD PRIMARY KEY (`sme_id`),
  ADD KEY `smg_id` (`smg_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_sms_member_group`
--
ALTER TABLE `dsp_sms_member_group`
  ADD PRIMARY KEY (`smg_id`);

--
-- 테이블의 인덱스 `dsp_sms_send_content`
--
ALTER TABLE `dsp_sms_send_content`
  ADD PRIMARY KEY (`ssc_id`);

--
-- 테이블의 인덱스 `dsp_sms_send_history`
--
ALTER TABLE `dsp_sms_send_history`
  ADD PRIMARY KEY (`ssh_id`),
  ADD KEY `ssc_id` (`ssc_id`);

--
-- 테이블의 인덱스 `dsp_social`
--
ALTER TABLE `dsp_social`
  ADD PRIMARY KEY (`soc_id`),
  ADD KEY `soc_account_id` (`soc_account_id`);

--
-- 테이블의 인덱스 `dsp_social_meta`
--
ALTER TABLE `dsp_social_meta`
  ADD UNIQUE KEY `mem_id_smt_key` (`mem_id`,`smt_key`),
  ADD KEY `smt_value` (`smt_value`);

--
-- 테이블의 인덱스 `dsp_stat_count`
--
ALTER TABLE `dsp_stat_count`
  ADD PRIMARY KEY (`sco_id`),
  ADD KEY `sco_date` (`sco_date`);

--
-- 테이블의 인덱스 `dsp_stat_count_board`
--
ALTER TABLE `dsp_stat_count_board`
  ADD PRIMARY KEY (`scb_id`),
  ADD KEY `scb_date_brd_id` (`scb_date`,`brd_id`);

--
-- 테이블의 인덱스 `dsp_stat_count_date`
--
ALTER TABLE `dsp_stat_count_date`
  ADD PRIMARY KEY (`scd_date`);

--
-- 테이블의 인덱스 `dsp_store`
--
ALTER TABLE `dsp_store`
  ADD PRIMARY KEY (`no`),
  ADD KEY `isUse` (`isUse`),
  ADD KEY `branchNo` (`branchNo`),
  ADD KEY `storeCode` (`storeCode`),
  ADD KEY `sOrder` (`sOrder`),
  ADD KEY `idx_category` (`category`),
  ADD KEY `fk_store_cat` (`cat_id`),
  ADD KEY `idx_branch` (`branchNo`),
  ADD KEY `isMajor` (`isMajor`);

--
-- 테이블의 인덱스 `dsp_store_category`
--
ALTER TABLE `dsp_store_category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `uk_code` (`code`),
  ADD KEY `idx_use` (`is_use`),
  ADD KEY `idx_sort` (`sort_order`);

--
-- 테이블의 인덱스 `dsp_store_click_log`
--
ALTER TABLE `dsp_store_click_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_mem` (`mem_id`),
  ADD KEY `idx_store` (`store_no`),
  ADD KEY `idx_clicked_at` (`clicked_at`);

--
-- 테이블의 인덱스 `dsp_store_file_upload`
--
ALTER TABLE `dsp_store_file_upload`
  ADD PRIMARY KEY (`no`),
  ADD KEY `applyNo` (`storeNo`),
  ADD KEY `type` (`type`),
  ADD KEY `year` (`year`);

--
-- 테이블의 인덱스 `dsp_store_member`
--
ALTER TABLE `dsp_store_member`
  ADD PRIMARY KEY (`no`),
  ADD KEY `storeNo` (`storeNo`),
  ADD KEY `memNo` (`memNo`);

--
-- 테이블의 인덱스 `dsp_tempsave`
--
ALTER TABLE `dsp_tempsave`
  ADD PRIMARY KEY (`tmp_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- 테이블의 인덱스 `dsp_unique_id`
--
ALTER TABLE `dsp_unique_id`
  ADD PRIMARY KEY (`unq_id`);

--
-- 테이블의 인덱스 `dsp_user_uuids`
--
ALTER TABLE `dsp_user_uuids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_ip` (`ip`),
  ADD KEY `idx_user_agent` (`user_agent`(768)),
  ADD KEY `idx_client_uuid` (`client_uuid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `dsp_admin_auth`
--
ALTER TABLE `dsp_admin_auth`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 테이블의 AUTO_INCREMENT `dsp_admin_auth_history`
--
ALTER TABLE `dsp_admin_auth_history`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `dsp_attendance`
--
ALTER TABLE `dsp_attendance`
  MODIFY `att_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_autologin`
--
ALTER TABLE `dsp_autologin`
  MODIFY `aul_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_banner`
--
ALTER TABLE `dsp_banner`
  MODIFY `ban_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `dsp_banner_click_log`
--
ALTER TABLE `dsp_banner_click_log`
  MODIFY `bcl_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 테이블의 AUTO_INCREMENT `dsp_banner_group`
--
ALTER TABLE `dsp_banner_group`
  MODIFY `bng_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `dsp_blame`
--
ALTER TABLE `dsp_blame`
  MODIFY `bla_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_board`
--
ALTER TABLE `dsp_board`
  MODIFY `brd_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_board_admin`
--
ALTER TABLE `dsp_board_admin`
  MODIFY `bam_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_board_category`
--
ALTER TABLE `dsp_board_category`
  MODIFY `bca_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_board_group`
--
ALTER TABLE `dsp_board_group`
  MODIFY `bgr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_board_group_admin`
--
ALTER TABLE `dsp_board_group_admin`
  MODIFY `bga_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_branch`
--
ALTER TABLE `dsp_branch`
  MODIFY `no` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `dsp_branch_file_upload`
--
ALTER TABLE `dsp_branch_file_upload`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_cart`
--
ALTER TABLE `dsp_cmall_cart`
  MODIFY `cct_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_category`
--
ALTER TABLE `dsp_cmall_category`
  MODIFY `cca_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_category_rel`
--
ALTER TABLE `dsp_cmall_category_rel`
  MODIFY `ccr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_demo_click_log`
--
ALTER TABLE `dsp_cmall_demo_click_log`
  MODIFY `cdc_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_download_log`
--
ALTER TABLE `dsp_cmall_download_log`
  MODIFY `cdo_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_item`
--
ALTER TABLE `dsp_cmall_item`
  MODIFY `cit_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_item_detail`
--
ALTER TABLE `dsp_cmall_item_detail`
  MODIFY `cde_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_item_history`
--
ALTER TABLE `dsp_cmall_item_history`
  MODIFY `chi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_order_detail`
--
ALTER TABLE `dsp_cmall_order_detail`
  MODIFY `cod_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_qna`
--
ALTER TABLE `dsp_cmall_qna`
  MODIFY `cqa_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_review`
--
ALTER TABLE `dsp_cmall_review`
  MODIFY `cre_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_cmall_wishlist`
--
ALTER TABLE `dsp_cmall_wishlist`
  MODIFY `cwi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_comment`
--
ALTER TABLE `dsp_comment`
  MODIFY `cmt_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_coupon`
--
ALTER TABLE `dsp_coupon`
  MODIFY `coupon_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- 테이블의 AUTO_INCREMENT `dsp_coupon_usage`
--
ALTER TABLE `dsp_coupon_usage`
  MODIFY `usage_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 테이블의 AUTO_INCREMENT `dsp_document`
--
ALTER TABLE `dsp_document`
  MODIFY `doc_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `dsp_editor_image`
--
ALTER TABLE `dsp_editor_image`
  MODIFY `eim_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_faq`
--
ALTER TABLE `dsp_faq`
  MODIFY `faq_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_faq_group`
--
ALTER TABLE `dsp_faq_group`
  MODIFY `fgr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_follow`
--
ALTER TABLE `dsp_follow`
  MODIFY `fol_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_like`
--
ALTER TABLE `dsp_like`
  MODIFY `lik_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_member`
--
ALTER TABLE `dsp_member`
  MODIFY `mem_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_auth_email`
--
ALTER TABLE `dsp_member_auth_email`
  MODIFY `mae_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_certify`
--
ALTER TABLE `dsp_member_certify`
  MODIFY `mce_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_dormant_notify`
--
ALTER TABLE `dsp_member_dormant_notify`
  MODIFY `mdn_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_group`
--
ALTER TABLE `dsp_member_group`
  MODIFY `mgr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_group_member`
--
ALTER TABLE `dsp_member_group_member`
  MODIFY `mgm_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_level_history`
--
ALTER TABLE `dsp_member_level_history`
  MODIFY `mlh_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_login_log`
--
ALTER TABLE `dsp_member_login_log`
  MODIFY `mll_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_nickname`
--
ALTER TABLE `dsp_member_nickname`
  MODIFY `mni_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_register`
--
ALTER TABLE `dsp_member_register`
  MODIFY `mrg_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 테이블의 AUTO_INCREMENT `dsp_member_selfcert_history`
--
ALTER TABLE `dsp_member_selfcert_history`
  MODIFY `msh_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_menu`
--
ALTER TABLE `dsp_menu`
  MODIFY `men_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `dsp_note`
--
ALTER TABLE `dsp_note`
  MODIFY `nte_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_notification`
--
ALTER TABLE `dsp_notification`
  MODIFY `not_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_point`
--
ALTER TABLE `dsp_point`
  MODIFY `poi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_popup`
--
ALTER TABLE `dsp_popup`
  MODIFY `pop_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post`
--
ALTER TABLE `dsp_post`
  MODIFY `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_file`
--
ALTER TABLE `dsp_post_file`
  MODIFY `pfi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_file_download_log`
--
ALTER TABLE `dsp_post_file_download_log`
  MODIFY `pfd_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_history`
--
ALTER TABLE `dsp_post_history`
  MODIFY `phi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_link`
--
ALTER TABLE `dsp_post_link`
  MODIFY `pln_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_link_click_log`
--
ALTER TABLE `dsp_post_link_click_log`
  MODIFY `plc_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_naver_syndi_log`
--
ALTER TABLE `dsp_post_naver_syndi_log`
  MODIFY `pns_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_poll`
--
ALTER TABLE `dsp_post_poll`
  MODIFY `ppo_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_poll_item`
--
ALTER TABLE `dsp_post_poll_item`
  MODIFY `ppi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_poll_item_poll`
--
ALTER TABLE `dsp_post_poll_item_poll`
  MODIFY `ppp_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_post_tag`
--
ALTER TABLE `dsp_post_tag`
  MODIFY `pta_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_scrap`
--
ALTER TABLE `dsp_scrap`
  MODIFY `scr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_search_keyword`
--
ALTER TABLE `dsp_search_keyword`
  MODIFY `sek_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_sms_favorite`
--
ALTER TABLE `dsp_sms_favorite`
  MODIFY `sfa_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_sms_member`
--
ALTER TABLE `dsp_sms_member`
  MODIFY `sme_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_sms_member_group`
--
ALTER TABLE `dsp_sms_member_group`
  MODIFY `smg_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_sms_send_content`
--
ALTER TABLE `dsp_sms_send_content`
  MODIFY `ssc_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_sms_send_history`
--
ALTER TABLE `dsp_sms_send_history`
  MODIFY `ssh_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_social`
--
ALTER TABLE `dsp_social`
  MODIFY `soc_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- 테이블의 AUTO_INCREMENT `dsp_stat_count`
--
ALTER TABLE `dsp_stat_count`
  MODIFY `sco_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_stat_count_board`
--
ALTER TABLE `dsp_stat_count_board`
  MODIFY `scb_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_store`
--
ALTER TABLE `dsp_store`
  MODIFY `no` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 테이블의 AUTO_INCREMENT `dsp_store_category`
--
ALTER TABLE `dsp_store_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 테이블의 AUTO_INCREMENT `dsp_store_click_log`
--
ALTER TABLE `dsp_store_click_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=710;

--
-- 테이블의 AUTO_INCREMENT `dsp_store_file_upload`
--
ALTER TABLE `dsp_store_file_upload`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- 테이블의 AUTO_INCREMENT `dsp_store_member`
--
ALTER TABLE `dsp_store_member`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- 테이블의 AUTO_INCREMENT `dsp_tempsave`
--
ALTER TABLE `dsp_tempsave`
  MODIFY `tmp_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `dsp_user_uuids`
--
ALTER TABLE `dsp_user_uuids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `dsp_coupon`
--
ALTER TABLE `dsp_coupon`
  ADD CONSTRAINT `fk_coupon_store` FOREIGN KEY (`store_no`) REFERENCES `dsp_store` (`no`) ON DELETE CASCADE;

--
-- 테이블의 제약사항 `dsp_coupon_usage`
--
ALTER TABLE `dsp_coupon_usage`
  ADD CONSTRAINT `fk_usage_coupon` FOREIGN KEY (`coupon_no`) REFERENCES `dsp_coupon` (`coupon_no`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_usage_store` FOREIGN KEY (`store_no`) REFERENCES `dsp_store` (`no`);

--
-- 테이블의 제약사항 `dsp_store`
--
ALTER TABLE `dsp_store`
  ADD CONSTRAINT `fk_store_cat` FOREIGN KEY (`cat_id`) REFERENCES `dsp_store_category` (`cat_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

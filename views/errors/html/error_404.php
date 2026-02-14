<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link rel="stylesheet" type="text/css" href="/assets/bootstrap-5.3.0/css/bootstrap.css" />
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 0px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
@font-face {
	font-family: 'NanumSquareNeo';    font-style: normal; 
	src: local('NanumSquareNeo'), local('나눔스퀘어네오'),
	url('/assets/fonts/NanumSquareNeo-Variable.eot') format("embedded-opentype"),
	url('/assets/fonts/NanumSquareNeo-Variable.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
	url('/assets/fonts/NanumSquareNeo-Variable.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}
* {
	font-family:'NanumSquareNeo';
}
</style>
</head>
<body>
	<div class="text-center pt-5">
		<h1 style="font-size:16vw;margin-top:15vh;">404</h1>
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div>

</body>
</html>
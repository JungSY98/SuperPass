<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/assets/bootstrap-5.3.0/css/bootstrap.css" />
<style>
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

<div class="text-center pt-5">
	<h1 style="font-size:6vw;">PHP Error</h1>
	<h1 style="font-size:5vw;">An uncaught Exception</h1>
	<div class="w-100" style="background:url('/assets/images/unlink_error.png') no-repeat center center;background-size:cover;aspect-ratio: 16 / 2;"></div>

	<div class="container text-start pt-5">
		<p>Severity: <?php echo $severity; ?></p>
		<p>Message:  <?php echo $message; ?></p>
		<p>Filename: <?php echo $filepath; ?></p>
		<p>Line Number: <?php echo $line; ?></p>

		<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

			<p>Backtrace:</p>
			<?php foreach (debug_backtrace() as $error): ?>

				<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

					<p style="margin-left:10px">
					File: <?php echo $error['file'] ?><br />
					Line: <?php echo $error['line'] ?><br />
					Function: <?php echo $error['function'] ?>
					</p>

				<?php endif ?>

			<?php endforeach ?>

		<?php endif ?>
	</div>
</div>
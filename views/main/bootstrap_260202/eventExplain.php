<div class="text-left divEventDesc">
	<div class="container">
		<!-- <h5 class="text-center mt-3">Event</h5> -->
		<!-- Event List -->
<?
	$html = '';
	foreach($eventD as $k => $eD) {
		$html .= '<div class="divEventListItem">';
		if (element('ban_url', $eD)) {
			$html .= '<a href="' . site_url('gotourl/banner/' . element('ban_id', $eD)) . '" ';
			if (element('ban_target', $eD)) {
				$html .= ' target="_blank" ';
			}
			$html .= ' title="' . html_escape(element('ban_title', $eD)) . '" ';
			$html .= ' class="eventLink">';
		}
		$html .= '<img src="'. thumb_url('banner', element('ban_image', $eD), element('ban_width', $eD), element('ban_height', $eD)) . '" class="cb_banner" id="cb_banner_' . element('ban_id', $eD) . '" '. ' alt="' . html_escape(element('ban_title', $eD)) . '" title="' . html_escape(element('ban_title', $eD)) . '" />';
		$bgColor = element('bgColor', $eD) ? element('bgColor', $eD) : '#000000';
		$menuColor = element('menuColor', $eD) ? element('menuColor', $eD) : '#ffffff';
		$html .= '<div class="divEventItemDesc eDesc'.$eD['ban_id'].'" style="background-color:'.$bgColor.';color:'.$menuColor.'" id="eDesc'.$eD['ban_id'].'"><h5>' . html_escape(element('ban_title', $eD)) . '</h5>';
		$html .= '<p class="m-0 fs-7">' . html_escape(element('ban_desc', $eD)) . '</p></div>';
		$html .= '<script> $(document).ready(function() { setBackgroundOpacity(".eDesc'.$eD['ban_id'].'", 0.8); }); </script>'; // 
		if (element('ban_url', $eD)) {
			$html .= '</a>';
		}
		$html .= '</div>';

 }
echo $html;
?>
	</div>
</div>
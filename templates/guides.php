<?php

// Global variables
if(!isset($page->title)) {
	$page->title = "Randonnées";
}


function html_head_guides()
{
	echo "    <script type='text/javascript' src='share/js/jquery-1.11.0.min.js'></script>\r\n";
	echo "    <script type='text/javascript' src='share/js/jQueryRotateCompressed.js'></script>\r\n";
	echo "    <script type='text/javascript' src='share/js/page_anims.js'></script>\r\n";
}

function site_content($page1, $page2)
{
	switch ($page1) {
		case NULL:
			break;
		default:
			break;
	}
}

?>
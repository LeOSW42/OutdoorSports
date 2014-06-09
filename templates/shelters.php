<?php

// Global variables
if(!isset($page->title)) {
	$page->title = "Refuges";
}


function html_head_shelters()
{
	echo "    <script type='text/javascript' src='share/jscript/jquery-1.11.0.min.js'></script>\r\n";
	echo "    <script type='text/javascript' src='share/jscript/jQueryRotateCompressed.js'></script>\r\n";
	echo "    <script type='text/javascript' src='share/jscript/page_anims.js'></script>\r\n";
	echo "    <script type='text/javascript'>function headerHeightToogle(duration) {headerToogle(duration);}</script>\r\n";
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
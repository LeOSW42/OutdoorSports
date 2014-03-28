<?php

// Global variables
if(!isset($page->title)) {
	$page->title = "Accueil";
}


function html_head_home()
{
	echo "    <script type='text/javascript' src='share/js/jquery-1.11.0.min.js'></script>\r\n";
	echo "    <script type='text/javascript' src='share/js/page_anims.js'></script>\r\n";
}

?>
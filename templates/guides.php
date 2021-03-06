<?php

if(!isset($page->url_array[1])) $page->url_array[1] = "";

switch ($page->url_array[1]) {
	case NULL: case "":
		$page->title = "Randonnées";
		break;
	case "guide":
		$page->title = "Randonnées";
		break;
	default:
		$page->url_array[1] = "404";
		$page->title = "Erreur 404";
		break;
}

function html_head_guides($page1, $page2)
{
	echo "    <script type='text/javascript' src='share/jscript/jquery-1.11.0.min.js'></script>\r\n";
	echo "    <script type='text/javascript' src='share/jscript/jQueryRotateCompressed.js'></script>\r\n";
	echo "    <script type='text/javascript' src='share/jscript/page_anims.js'></script>\r\n";
	switch ($page1) {
		case NULL: case "":
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='include/pages/guides_list.css' />\r\n";
			echo "    <script type='text/javascript' src='share/jscript/leaflet.js'></script>\r\n";
			echo "    <script type='text/javascript' src='share/jscript/Control.FullScreen.js'></script>\r\n";
			echo "    <script type='text/javascript' src='share/jscript/L.Control.MouseScroll.js'></script>\r\n";
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/leaflet.css' />\r\n";
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/leaflet.dark.css' />\r\n";
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/Control.FullScreen.css' />\r\n";
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/L.Control.MouseScroll.css' />\r\n";
			echo "    <script type='text/javascript'>function headerHeightToogle(duration) { mapToogle(duration); headerToogle(duration);}</script>\r\n";
			break;
		case "guide":
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='include/pages/guide.css' />\r\n";
			echo "    <script type='text/javascript' src='share/jscript/leaflet.js'></script>\r\n";
			echo "    <script type='text/javascript' src='share/jscript/Control.FullScreen.js'></script>\r\n";
			echo "    <script type='text/javascript' src='share/jscript/L.Control.MouseScroll.js'></script>\r\n";
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/leaflet.css' />\r\n";
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/leaflet.dark.css' />\r\n";
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/Control.FullScreen.css' />\r\n";
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/L.Control.MouseScroll.css' />\r\n";
			echo "    <script type='text/javascript'>function headerHeightToogle(duration) {headerToogle(duration);}</script>\r\n";
			break;
		default:
			echo "    <link rel='type' stylesheet='text/css' media='screen, handheld' href='include/pages/404.css' />\r\n";
			echo "    <script type='text/javascript'>function headerHeightToogle(duration) {headerToogle(duration);}</script>\r\n";
			break;
	}
}

function site_content($page1, $page2, $config)
{
	switch ($page1) {
		case NULL: case "":
			include("include/pages/guides_list.php");
			break;
		case "guide":
			include("include/pages/guide.php");
			break;
		default:
			include("include/pages/404.php");
			break;
	}
}

?>
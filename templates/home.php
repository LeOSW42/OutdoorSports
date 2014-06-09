<?php

if(!isset($page->url_array[1])) $page->url_array[1] = "";

switch ($page->url_array[1]) {
	case NULL: case "":
		$page->title = "Accueil";
		break;
	case "contact":
		$page->title = "Contact";
		break;
	case "term-of-use":
		$page->title = "Mention Légales";
		break;
	case "map":
		$page->title = "Plan du Site";
		break;
	default:
		$page->url_array[1] = "404";
		$page->title = "Erreur 404";
		break;
}

function html_head_home($page1, $page2)
{
	echo "    <script type='text/javascript' src='share/jscript/jquery-1.11.0.min.js'></script>\r\n";
	echo "    <script type='text/javascript' src='share/jscript/jQueryRotateCompressed.js'></script>\r\n";
	echo "    <script type='text/javascript' src='share/jscript/page_anims.js'></script>\r\n";
	echo "    <script type='text/javascript'>function headerHeightToogle(duration) {headerToogle(duration);}</script>\r\n";
	switch ($page1) {
		case NULL: case "":
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='include/pages/home.css' />\r\n";
			break;
		case "contact":
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='include/pages/contact.css' />\r\n";
			break;
		case "term-of-use":
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='include/pages/term-of-use.css' />\r\n";
			break;
		case "map":
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='include/pages/map.css' />\r\n";
			break;
		default:
			echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='include/pages/404.css' />\r\n";
			break;
	}
}

function site_content($page1, $page2)
{
	switch ($page1) {
		case NULL: case "":
			include("include/pages/home.php");
			break;
		case "contact":
			include("include/pages/contact.php");
			break;
		case "term-of-use":
			include("include/pages/term-of-use.php");
			break;
		case "map":
			include("include/pages/map.php");
			break;
		default:
			include("include/pages/404.php");
			break;
	}
}

?>
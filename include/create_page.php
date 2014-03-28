<?php

/* Contain PHP code to generate header, head, nav, footer */

function html_head($theme, $template, $title)
{
	echo "<!DOCTYPE html>\r\n";
	echo "<html>\r\n";
	echo "<head>\r\n";
	echo "    <meta charset='utf-8' />\r\n";
	$head_specific_to_page = "html_head_".$template;
	if (function_exists($head_specific_to_page)) {
		$head_specific_to_page($title);
	}
	echo "    <title>Outdoor Sports — ".$title."</title>\r\n";
	echo "    <link rel='stylesheet' type='text/css' media='screen' href='share/css/common.css' />\r\n";
	echo "    <link rel='stylesheet' type='text/css' media='screen' href='share/css/".$theme.".css' />\r\n";
	echo "    <!--[if IE]>\r\n";
	echo "    <script src='share/js/html5.js'></script>\r\n";
	echo "    <![endif]-->\r\n";
	echo "</head>\r\n";
	echo "<body>\r\n";
	echo "    <div id='wrapper'>\r\n";
}

function site_header($theme, $title)
{
	echo "         <header>\r\n";
	echo "         </header>\r\n";
}

function site_nav($theme, $title)
{
	echo "         <nav>\r\n";
	echo "             <ul>\r\n";
	echo "                 <li>Accueil</li>\r\n";
	echo "                 <li>Randonnées</li>\r\n";
	echo "                 <li>Refuges</li>\r\n";
	echo "                 <li>Covoiturage</li>\r\n";
	echo "                 <li id='arrow'><svg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'><g><rect fill='none' height='32' width='32'/></g><g><polygon points='2.002,10 16.001,24 30.002,10'/></g></svg></li>\r\n";
	echo "             </ul>\r\n";
	echo "         </nav>\r\n";
}

function site_footer($theme, $title)
{
	echo "         <footer>\r\n";
	echo "         </footer>\r\n";
}

function html_end()
{
	echo "    </div>\r\n";
	echo "</body>\r\n";
	echo "</html>\r\n";
}

?>
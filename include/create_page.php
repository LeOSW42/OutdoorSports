<?php

/* Contain PHP code to generate header, head, nav, footer */

include('session.php');

function html_head($theme, $template, $title, $page1, $page2)
{
	echo "<!DOCTYPE html>\r\n";
	echo "<html>\r\n";
	echo "<head>\r\n";
	echo "    <meta charset='utf-8' />\r\n";
	echo "    <meta name='viewport' content='width=device-width, height=device-height'>\r\n";
	$head_specific_to_page = "html_head_".$template;
	if (function_exists($head_specific_to_page)) {
		$head_specific_to_page($page1, $page2);
	}
	echo "    <title>".$title." — Outdoor Sports</title>\r\n";
	echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/common.css' />\r\n";
	echo "    <link rel='stylesheet' type='text/css' media='screen, handheld' href='share/css/".$theme.".css' />\r\n";
	echo "    <!--[if IE]>\r\n";
	echo "    <script src='share/jscript/html5.js'></script>\r\n";
	echo "    <![endif]-->\r\n";
	echo "</head>\r\n";
	echo "<body>\r\n";
	echo "    <div id='wrapper'>\r\n";
}

function site_header($theme, $title)
{
	echo "        <header>\r\n";
	echo "            <p>Outdoor Sports</p>\r\n";
	echo "            <img id='mount1' src='share/img/mount1.svg' alt='Mountain header'/>\r\n";
	echo "            <img id='mount2' src='share/img/mount2.svg' alt='Mountain header'/>\r\n";
	echo "            <img id='mount3' src='share/img/mount3.svg' alt='Mountain header'/>\r\n";
	echo "        </header>\r\n";
}

function site_nav($theme, $title)
{
	echo "        <nav>\r\n";
	echo "            <ul>\r\n";
	echo "                <li><a href='?/home'>Accueil</a></li>\r\n";
	echo "                <li><a href='?/guides'>Randonnées</a></li>\r\n";
	echo "                <li><a href='?/shelters'>Refuges</a></li>\r\n";
	echo "                <li><a href='?/carpooling'>Covoiturage</a></li>\r\n";
	echo "                <li id='arrow' onClick='headerToogle(300);'><svg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'><g><rect fill='none' height='32' width='32'/></g><g><polygon points='2.002,10 16.001,24 30.002,10'/></g></svg></li>\r\n";
	echo "            </ul>\r\n";
	echo "        </nav>\r\n";
	if($_SESSION['header']==0) {
		echo "    <script type='text/javascript'>headerToogle(10);</script>";
	}
	echo "        <section id='content'>\r\n";
}

function site_footer($theme, $title)
{
	echo "        </section>\r\n";
	echo "        <footer>\r\n"; ?>
            <div id="overlay">
                <div id="overlaycontent">
                	<?php include 'include/pages/term-of-use.php'; ?>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 980 980" id="copyleft"><circle cx="490" cy="490" r="440" fill="white" stroke="#000" stroke-width="100"/><path fill="black" d="M486,215C356,215 247,306 219,428L350,428C374,376 426,340 486,340C569,340 636,407 636,490C636,573 569,640 486,640C426,640 374,604 350,553L219,553C247,674 356,765 486,765C638,765 761,642 761,490C761,338 638,215 486,215z"/></svg>
            <p><a href="?/home/term-of-use">Mentions légales</a> — <a href="?/home/contact">Contact</a> — <a href="?/home/map">Plan du site</a></p>
<?php 	echo "        </footer>\r\n";
}

function html_end()
{
	echo "    </div>\r\n";
	echo "</body>\r\n";
	echo "</html>\r\n";
}

?>
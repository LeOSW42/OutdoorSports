<?php

function html_header($theme, $title)
{
	echo '<!DOCTYPE html>';
	echo '<html>';
	echo '    <head>';
	echo '    <meta charset=utf-8 />';
	echo '    <title>Outdoor Sports — '.$title.'</title>';
	echo '    <link rel="stylesheet" type="text/css" media="screen" href="master.css" />';
	echo '    <!--[if IE]>';
	echo '    <script src="../common/html5.js"></script>';
	echo '    <![endif]-->';
	echo '</head>';
}

?>
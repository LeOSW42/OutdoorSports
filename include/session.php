<?php

session_start();

if(!isset($_SESSION['header'])) {
	$_SESSION['header'] = 1;
}

if(isset($_GET['header_update'])) {
	$_SESSION['header'] = $_GET['header_update'];
}

// session_destroy();

?>
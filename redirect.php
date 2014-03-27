<?php

/* This is the main page of the project
Redirects all the index.php?/home/url to the correct template, with the appropriate content.
*/

$page = new stdClass;

// Saving the URL and each part of the URL
$page->full_url=$_SERVER['REQUEST_URI'];
$page->url_array = explode ('/',$page->full_url);

// Remove the useless part of the URL in the tab
$i = 0;
$flag = 0;
array_shift($page->url_array); // Shift the array once to remove the first empty cell
foreach ($page->url_array as $cell) {
	$i++;
	if (strpos($cell, "?") != FALSE) { // Detect the filename to begin store the URL
		while ($i>0) {
			array_shift($page->url_array); // Remove unused part of the URL
			$i--;
		}
		$flag = 1;
		break;
	}
}
// Test to redirect "", "?toto" URLs to the homepage
if ($flag == 0 || $page->url_array == NULL) {
	unset($page->url_array);
	$page->url_array[0] = "home";
}


// Switching between each 
switch ($page->url_array[0]) {
	case "home":
		$page->theme = "orange";
		$page->template = "home";
		break;
	case "guides":
		$page->theme = "dark";
		$page->template = "guides";
		break;
	case "shelters":
		$page->theme = "purple";
		$page->template = "shelters";
		break;
	case "carpooling":
		$page->theme = "blue";
		$page->template = "carpooling";
		break;
	default:
		$page->theme = "orange";
		$page->template = "home";
	break;
}

include("templates/".$page->template.".php");
include("include/create_page.php");

?>
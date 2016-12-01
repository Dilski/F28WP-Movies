<?php 
$debug = true;

//include_once "views/status.php";

$whitelist = array("movies","login");

if(!isset($_GET['p'])) { $_GET['p'] = '';}
if (in_array($_GET['p'], $whitelist)) {
	$name = $_GET['p'];
	include "{$name}.php";
} else {
	$sitemap = "<h1> Site Map </h1>";
	foreach($whitelist as $page) {
		
		$sitemap .= "<p><a href='./?p=".$page."'> $page</a></p>";
	}
	include 'views/project.php';
}

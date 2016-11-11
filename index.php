<?php 
$whitelist = array("movies","login","test");


if (in_array($_GET['p'], $whitelist)) {
	include $_GET['p'].'.php';
} else {
	echo "<h1> Site Map </h1>";
	foreach($whitelist as $page) {
		
		echo "<p><a href='./?p=".$page."'> $page</a></p>";
	}
}

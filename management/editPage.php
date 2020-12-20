<?php
	include 'dbConfig.php';
    $id = $_GET['id'];
	$name = $_GET['name'];
	$referrer = $_GET['referrer'];
	$target = $_GET['target'];

	if ($referrer == "admin") {
		if ($target == "students") {
			include_once 'edit_page1.php'
		}
	}
?>

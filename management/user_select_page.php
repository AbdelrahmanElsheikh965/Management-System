<?php
  // header( "refresh:3;url=detail.php" );
  // echo 'You\'ll be redirected in about 3 secs. If not, click <a href="redirect_page.php">here</a>.';
	session_start();
	include "dbConfig.php";
	$title = $_GET['title'];
	$id = $_GET['id'];

	if ($title == "admins") {

		echo "Wait, You will be redirecting to your Profile Page";
		header("refresh:2; url=admin.php?title=$title&id=$id");

	}else if ($title == "trainers") {

		echo "Wait, You will be redirecting to your Profile Page";
		header("refresh:2; url=trainer.php?title=$title&id=$id");

	}else{

		echo "Wait, You will be redirecting to your Profile Page . . .";
		header("refresh:2;url=student.php?title=$title&id=$id");

	}
?>
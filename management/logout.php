<?php
	// header("refresh=0; url=home.php");

  if (!isset($_SESSION)){
  	echo("arg1");
    session_start();
	session_destroy();
	header("refresh=0; url=home.php");
  }else{
  	echo("arg2");
	session_destroy();
	header("refresh=0; url=home.php");
  }

?>
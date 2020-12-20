<?php

include "dbConfig.php";
session_start();
$title = $_GET['title'];
$email = $_POST['email'];
$pass = $_POST['password'];
$sql = "SELECT id FROM $title WHERE email = '$email' AND password = '$pass'";
$result = mysqli_query($conn, $sql);
$raw = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);
if ($count == 1) {
	$_SESSION['id'] = $raw['id'];
	$id = $_SESSION['id'];
	header("location: user_select_page.php?title=$title&id=$id");
}else{
	include "login_check_pass.php";
}

?>
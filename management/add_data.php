<?php

include 'dbConfig.php';

$title = $_GET['title'];

if (isset($_POST['signup'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];
	if ($password_1 == $password_2) {
		$password = $password_1; // We Can Hash This Password By md5() Function.
		if ($title == "trainers") {
			$query = "INSERT INTO $title (tname, email, address, phone, password) 
				VALUES ('$name', '$email', '$address', '$phone', '$password')";
				mysqli_query($conn, $query);
				echo "Your Data has been saved successsfully";
			    header( "refresh:3;url=home.php?title=$title" );
		  		echo 'You\'ll be redirected in about 3 secs. If not, click <a href="home.php?title=<?php $title; ?>">here</a>.';
		}elseif ($title == "students" || $title == "admins") {
			$query = "INSERT INTO $title (name, email, address, phone, password) 
				VALUES ('$name', '$email', '$address', '$phone', '$password')";
				mysqli_query($conn, $query);
				echo "Your Data has been saved successsfully";
			    header( "refresh:3;url=home.php?title=$title" );
		  		echo 'You\'ll be redirected in about 3 secs. If not, click <a href="home.php?title=<?php $title; ?>">here</a>.';
		}
	}else{
		include "signup_check_pass.php";
	}
}


?>
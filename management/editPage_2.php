<?php
	session_start();
	include 'dbConfig.php';
    $id = $_GET['id'];
    $referrer = $_GET['referrer'];
    $target = $_GET['target'];
	$urlName = $_GET['name'];
	
	if (isset($_POST['saveChanges'])) {

		$query = "SELECT id FROM $target WHERE name = '$urlName'";
		$res = mysqli_query($conn, $query);
		$raw = mysqli_fetch_array($res);
		$s_id = $raw['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];

		$sql = "UPDATE $target SET name = '$name', email = '$email', address = '$address', phone = $phone 
					WHERE id = $s_id";

		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "Done, Redirecting . . .";
			header("refresh:1.5; url=admin.php?title=$referrer&id=$id");
		}else{
			echo "Error Updating Data!";
		}
	}



?>
<?php
	session_start();
	include 'dbConfig.php';        
    $id = $_GET['id'];
    $referrer = $_GET['referrer'];
    $target = $_GET['target'];
	$urlName = $_GET['urlName'];
	
	if (isset($_POST['saveChanges'])) {

		// $query = "SELECT id FROM $title WHERE name = '$urlName'";
		// $res = mysqli_query($conn, $query);
		// $raw = mysqli_fetch_array($res);
		// $id = $raw['id'];

		$name = $_POST['name'];

		$sql = "UPDATE $target SET bname = '$name' WHERE bname = '$urlName'";

		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "Done, Redirecting . .";
			header("refresh:1.5; url=admin.php?title=$referrer&id=$id");
		}else{
			echo "Error Updating Data!";
		}
	}



?>
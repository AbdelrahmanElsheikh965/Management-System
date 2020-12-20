<?php
session_start();
$id = $_SESSION['id'];
include 'dbConfig.php';
$title = $_GET['title'];
if (isset($_POST['add'])) {
		$name = $_POST['name'];
		if (isset($_POST['add'])) {
			$sql = "INSERT INTO $title (name) VALUES ('$name')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				# code...
				header("location: admin.php?id=$id");
			}else{
				echo "error";
			}
		}else{
			die("Nothing Happened!");

		}
	}
?>
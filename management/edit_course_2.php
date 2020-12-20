<?php
	session_start();
	include 'dbConfig.php';
    $id = $_GET['id'];
    $referrer = $_GET['referrer'];
    $target = $_GET['target'];
	$urlName = $_GET['name'];
	$TrName = $_GET['TrName'];
	$bname = $_GET['bname'];
	
	if (isset($_POST['saveChanges'])) {
		$query = "SELECT id FROM $target WHERE cname = '$urlName'";
		$res = mysqli_query($conn, $query);
		$raw = mysqli_fetch_array($res);
		$c_id = $raw['id'];
		$cname = $_POST['cname'];
		$tname = $_POST['tname'];
		$branch = $_POST['branch'];
		$price = $_POST['price'];
		$duration = $_POST['duration'];
		// echo $title . "<br>" .$id . "<br>" . $name . "<br>". $branch ."<br>". $price ."<br>". $duration;
		$sql_1 = "UPDATE courses  SET cname = '$cname', price = $price WHERE id = $c_id";
		$sql_2 = "UPDATE trainers SET tname = '$tname' WHERE tname = '$TrName'";
		$sql_3 = "UPDATE branches SET bname = '$branch' WHERE bname = '$bname'";

		$result_1 = mysqli_multi_query($conn, $sql_1);
		$result_2 = mysqli_multi_query($conn, $sql_2);
		$result_3 = mysqli_multi_query($conn, $sql_3);
		if ($result_1 && $result_2 && $result_3) {
			echo "Done, Redirecting . . .";
			header("refresh:1.5; url=admin.php?title=$referrer&id=$id");
		}else{
			echo "Error Updating Data!";
		}
	}



?>
<?php
session_start();
$id = $_GET['id'];
$title = $_GET['title'];
include 'dbConfig.php';
if (isset($_POST['add'])) {
		$name     = $_POST['name'];
		$branch   = $_POST['branch'];
		$price    = $_POST['price'];
		$duration = $_POST['duration'];

		if (isset($_POST['add'])) {
		 	$sql_1   = "INSERT INTO courses (cname, price, duration) VALUES ('$name', $price, $duration)";
			$sql_2   = "INSERT INTO branches (bname) VALUES ('$branch')";
 			$sql_3   = "SELECT id INTO @cid FROM courses WHERE cname = '$name'";
 			$sql_4   = "SELECT branchId INTO @bid FROM branches WHERE bname = '$branch'"; 
		 	$sql_5   = "INSERT INTO courses_trainers (course_id, branch_id) VALUES (@cid, @bid)";
		 	$sql_6   = "UPDATE courses_trainers SET trainer_id = $id WHERE course_id = @cid";

			// INSERT INTO courses (cname, price, duration) VALUES ('js', 44, 44);
			// INSERT INTO branches (bname) VALUES ('dd');
			// SELECT id INTO @cid FROM courses WHERE cname = "js";
			// SELECT branchId INTO @bid FROM branches WHERE bname = "dd";
			// INSERT INTO courses_trainers (course_id, branch_id) VALUES (@cid, @bid);
			// UPDATE courses_trainers SET trainer_id = 103 WHERE course_id = @cid


			$result1 = mysqli_multi_query($conn, $sql_1);
			$result2 = mysqli_multi_query($conn, $sql_2);
			$result3 = mysqli_multi_query($conn, $sql_3);
			$result4 = mysqli_multi_query($conn, $sql_4);
			$result5 = mysqli_multi_query($conn, $sql_5);
			$result6 = mysqli_multi_query($conn, $sql_6);


			if ($result1 && $result2 && $result3 && $result4 && $result5 && $result6) {
				# code...
				header("location: trainer.php?title=trainers&id=$id");
			}else{
				die("error" . mysqli_error($conn));
			}
		}else{
			die("Nothing Happened!");
		}
	}
?>
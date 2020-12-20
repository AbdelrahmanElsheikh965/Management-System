<?php
session_start();
include 'dbConfig.php';
$id = $_GET['id'];
$title = "students";
$name = $_GET['name'];
$sql_1   = "SELECT id INTO @cid FROM courses WHERE courses.cname = '$name'";
$sql_2   = "SELECT trainer_id INTO @tid FROM courses_trainers WHERE course_id = @cid";
$sql_3   = "INSERT INTO student_courses_trainers (course_id, student_id, trainer_id) VALUES (@cid, $id, @tid)";

		$result1 = mysqli_multi_query($conn, $sql_1);
		$result2 = mysqli_multi_query($conn, $sql_2);
		$result3 = mysqli_multi_query($conn, $sql_3);

		if ($result1 && $result2 && $result3) {
			# code...
			header("location: student.php?title=students&id=$id");
		}else{
			die("error" . mysqli_error($conn));
	}
?>
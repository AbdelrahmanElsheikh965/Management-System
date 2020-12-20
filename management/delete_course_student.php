<?php

include 'dbConfig.php';
$id = $_GET['id'];
$title = "students";
$name = $_GET['name'];
$sql_1 = "SELECT id INTO @cid FROM courses WHERE cname = '$name'";
$sql_2 = "DELETE FROM student_courses_trainers WHERE student_id = $id AND course_id = @cid";

		$result1 = mysqli_multi_query($conn, $sql_1);
		$result2 = mysqli_multi_query($conn, $sql_2);
		
		if ($result1 && $result2) {
			# code...
			header("location: student.php?title=$title&id=$id");
		}else{
			die("error" . mysqli_error($conn));
	}

?>
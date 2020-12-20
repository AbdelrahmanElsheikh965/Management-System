<?php
session_start();
if (isset($_POST['submit'])) {
	include 'dbConfig.php';
	$t_id = $_GET['t_id'];
	$c_id = $_GET['c_id'];
	$question = $_POST['question'];
	$real_answer = $_POST['real_answer'];
	$a_answer = $_POST['a_answer'];
	$b_answer = $_POST['b_answer'];
	$c_answer = $_POST['c_answer'];
	$d_answer = $_POST['d_answer'];
	$sql_1 = "INSERT INTO questions (question, a_answer, b_answer, c_answer, d_answer, trainerId, courseId) 
			VALUES ('$question', '$a_answer', '$b_answer', '$c_answer', '$d_answer',  $t_id, $c_id)";
	$sql_2 = "INSERT INTO answers (answer) VALUES ('$real_answer')";
	

	$res_1 = mysqli_query($conn, $sql_1);
	$res_2 = mysqli_query($conn, $sql_2);
	if ($res_1 && $res_2) {
		header("Location: trainer.php?title=trainers&id=$t_id");
	}else{
		echo("there's some error");
	}
	
}

?>
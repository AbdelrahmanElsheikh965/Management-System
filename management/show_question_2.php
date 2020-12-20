<?php

session_start();
$id = $_GET['id'];
if (isset($_POST['send_data'])) {
	$yourAnswers = $_POST['status'];
	include 'dbConfig.php';
	$sql = "SELECT answers.id, answers.answer FROM answers 
			JOIN questions ON questions.id = answers.id WHERE questions.trainerId = $id";
	$res = mysqli_query($conn, $sql);
	$c = 0;
	while ($raw = mysqli_fetch_assoc($res)) {
		if ($yourAnswers[$raw['id']] ==  $raw['answer']) {
			$c++;
		}
	}
	$count = mysqli_num_rows($res);
	$score = " $c / $count ";
	$_SESSION['score'] = $score;
	echo "<div style='text-align: center;'>  <a href=\"javascript:history.go(-2)\">GO BACK</a>  </div>";
}
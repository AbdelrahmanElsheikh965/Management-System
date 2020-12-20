<html>
<head>
<title>Multiple-Choice Quiz Form</title>
<style>
	form{
		width: 400px;
		height: 500px;
		padding: 20px;
		margin: 0 auto;
	}
	h2, h3{
		text-align: center;
	}
	a{
		text-align: center;
	}
</style>
</head>
<body bgcolor=white>
<br>


<form method="post" action="show_question_2.php?id=<?php echo $_GET['id']; ?>">

<?php
	include 'dbConfig.php';
	$id = $_GET['id'];
	$query = "SELECT id, question, a_answer, b_answer, c_answer, d_answer FROM questions WHERE trainerId = $id";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
	if ($count ==	 0) {
		echo'<h2> You Do Not Have Any Quizzes Yet! </h2>';
		echo "<div style='text-align: center;'>  <a href=\"javascript:history.go(-1)\">GO BACK</a>  </div>";
	}else{
		include 'dbConfig.php';
		$sql = "SELECT * FROM questions";
		$res = mysqli_query($conn, $sql);
		if ($res) {
			echo'<h3> Quiz I</h3> <h2>Choose The Correct Answer</h2>';
			while ($raw = mysqli_fetch_assoc($res)) {
				echo'<P>';echo $raw['question']; echo '</p>';
				echo'<input type="radio" name="status[' . $raw['id'] . ']" value="'; echo $raw['a_answer']; echo'">';echo $raw['a_answer']; echo'<br>
					 <input type="radio" name="status[' . $raw['id'] . ']" value="'; echo $raw['b_answer']; echo'">';echo $raw['b_answer']; echo'<br>
					 <input type="radio" name="status[' . $raw['id'] . ']" value="'; echo $raw['c_answer']; echo'">';echo $raw['c_answer']; echo'<br>
					 <input type="radio" name="status[' . $raw['id'] . ']" value="'; echo $raw['d_answer']; echo'">';echo $raw['d_answer']; echo'<br>
					 </p> <hr>';
			}
			echo'<input style="margin-bottom: 25px; margin-left: 60px;" type="submit" name="send_data" value="Send Form">
				<input style="margin-bottom: 25px; margin-left: 60px;" type="reset" value="Clear Form">';
		}else{
			die("error" . mysqli_error($conn));
		}
	}
	
?>


</form>
</body>
</html>
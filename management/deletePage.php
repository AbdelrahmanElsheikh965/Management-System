<!-- <a href="deletePage_2.php?name=<?php //echo$_GET['name']; ?>.php" onClick="return confirm('Are you sure you want to delete?')">Are you sure you want to delete?</a>
echo "Wait, You will be redirecting to your Profile Page . . .";
header("refresh:2;url=student.php?title=$title&id=$id");
 -->

 <?php
 	session_start();
    $id = $_GET['id'];
	include 'dbConfig.php';
	$name = $_GET['name'];
	$referrer = $_GET['referrer'];
	$target = $_GET['target'];

	if ($referrer == "admins") {

		if ($target == "trainers") {
			# code...
			$sql = "DELETE FROM $target WHERE tname = '$name'";
			$res = mysqli_query($conn, $sql);
			if ($res) {
				echo "Done, Redirecting . . .";
				header("refresh:1; url=admin.php?title=$referrer&id=$id");
			}else{
				echo "Error";
			}
		}else if ($target == "students") {
			# code...
			$sql = "DELETE FROM $target WHERE name = '$name'";
			$res = mysqli_query($conn, $sql);
			if ($res) {
				echo "Done, Redirecting . . .";
				header("refresh:1; url=admin.php?title=$referrer&id=$id");
			}else{
				echo "Error";
			}
		}else if ($target == "courses") {
			# code...
			$sql = "DELETE FROM $target WHERE cname = '$name'";
			$res = mysqli_query($conn, $sql);
			if ($res) {
				echo "Done, Redirecting . . .";
				header("refresh:1; url=admin.php?title=$referrer&id=$id");
			}else{
				echo "Error";
			}
		}else if($target == "branches"){
			$sql = "DELETE FROM $target WHERE bname = '$name'";
			$res = mysqli_query($conn, $sql);
			if ($res) {
				echo "Done, Redirecting . . .";
				header("refresh:1; url=admin.php?title=$referrer&id=$id");
			}else{
				echo "Error";
			}
		}
	}
	 


	if ($referrer == "trainers") {

			if ($target == "courses") {
				$sql = "DELETE FROM courses WHERE cname = '$name'";
				$res = mysqli_query($conn, $sql);
				if ($res) {
					echo "Done, Redirecting . . .";
					header("refresh:1; url=trainer.php?title=$referrer&id=$id");
				}else{
					echo "Error";
				}
			}else{
				$sql = "DELETE FROM students WHERE name = '$name'";
				$res = mysqli_query($conn, $sql);
				if ($res) {
					echo "Done, Redirecting . . .";
					header("refresh:1; url=trainer.php?title=$referrer&id=$id");
				}else{
					echo "Error";
				}
			}

	} 


?>
<!DOCTYPE html>
<html>
<head>
  <title> 
    Add Your Questions.
  </title>
</head>
<style>
input[type=text]{
  width: 400px;
  padding: 20px;
  height: 50px;
  margin: 15px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #45a049;
  color: white;
  padding: 14px 20px;
  margin: 0 auto;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #3b67eb;
}

div {
  border-radius: 3.58px;
  width: 570px;
  height: 600px;
  border-radius: 5px;
  background-color: #d0d6d4;
  padding: 20px;
  padding: 20px;
  margin: 0 auto;
}
h1{
  text-align: center;
}
#submit{
  margin-left: 145px;
}
</style>
<body>

<h1>Add New Questions</h1>

<div>
  <?php
 include 'dbConfig.php';
 $trainerId = $_GET['trainerId'];
 $courseName = $_GET['courseName'];
 $sql = "SELECT id FROM courses WHERE cname = '$courseName'";
 $result = mysqli_query($conn, $sql);
 $raw = mysqli_fetch_array($result);
 $courseId = $raw['id'];
 $title = "trainers";

  ?>
  <form action="add_question_2.php?t_id=<?php echo $trainerId; ?>&c_id=<?php echo $courseId; ?>" method="post">
    <a href="trainer.php?title=trainers&id=<?php echo $trainerId; ?>">Back To Profile</a><br>
    <label>Question</label>&nbsp;  &nbsp;  &nbsp;  
    <input type="text" name="question" placeholder="" required="">
    <br>
    <label>A:</label> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
    <input type="text" name="a_answer" placeholder="" required="">
    <br>
    <label>B:</label> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
    <input type="text" name="b_answer" placeholder="" required="">
    <br>
    <label>C:</label> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
    <input type="text" name="c_answer" placeholder="" required="">
    <br>
    <label>D:</label> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
    <input type="text" name="d_answer" placeholder="" required="">
    <br>
    <label>Answer </label> &nbsp; &nbsp;  &nbsp;  &nbsp;
    <input type="text" name="real_answer" placeholder="" required=""> 

    
  <br><br>
    <input name="submit" type="submit" value="Submit">
  </form>
</div>

</body>
</html>

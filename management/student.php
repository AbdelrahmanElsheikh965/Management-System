<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student Page</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<script>
$(document).ready(function()
{
 // Activate tooltip
 $('[data-toggle="tooltip"]').tooltip();
 
 // Select/Deselect checkboxes
 var checkbox = $('table tbody input[type="checkbox"]');
 $("#selectAll").click(function()
 {
  if(this.checked){
   checkbox.each(function()
   {
    this.checked = true;                        
   });
  }
  else
  {
   checkbox.each(function()
   {
    this.checked = false;                        
   });
  } 
 });
 checkbox.click(function()
 {
  if(!this.checked)
  {
   $("#selectAll").prop("checked", false);
  }
 });
});
</script>
</head>
<body>

      <nav class="navbar navbar-default title1">
        <div class="container-fluid">
            <div class="navbar-header">
              <?php
              include 'dbConfig.php';
                $title = $_GET['title'];
                $id  = $_GET['id'];
                $sql = "SELECT name FROM students WHERE id = $id";
                $res = mysqli_query($conn, $sql);
                $raw = mysqli_fetch_array($res);
                if ($res) {
                  echo '<a class="navbar-brand" href=""><b>';echo $raw['name']; echo'</b></a>';
                }
              ?>
        
        </div>
       
        <ul class="nav navbar-nav navbar-right" style="margin-left: 80em;">
        <li> 
          <a href="home.php">
          <span class="glyphicon glyphicon-log-out" aria-hidden="true">
          </span>&nbsp;Log out
          </a>
      </li>
    </ul>
    </div>
    </div>
    </nav>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                    <h2> <b>Courses</b> List</h2>
                   </div>
                </div>
            </div>


            <!-- courses list table -->

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
      <th>
       <span class="custom-checkbox">
        <input type="checkbox" id="selectAll">
        <label for="selectAll"></label>
       </span>
      </th>
                        <th>Course Name</th>
                        <th>Trainer Name </th>
                        <th>Branch</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
               <?php

                      include 'dbConfig.php';
                      $id = $_GET['id'];
                      $sql = "SELECT courses.cname, trainers.tname, branches.bname, courses.price, courses.duration 
                              FROM courses_trainers  JOIN courses ON courses.id = courses_trainers.course_id 
                              JOIN branches ON branches.branchId = courses_trainers.branch_id
                              JOIN trainers ON trainers.id = courses_trainers.trainer_id";
                      $result = mysqli_query($conn, $sql);
                      echo '<tbody>';
                      while ($raw = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                          <td>
                            <span class="custom-checkbox">
                              <input type="checkbox" id="checkbox1" name="options[]" value="1">
                              <label for="checkbox1"></label>
                            </span>
                          </td>
                          <td>'; echo $raw["cname"]; echo '</td>';
                        echo '<td>'; echo $raw["tname"]; echo '</td>';
                        echo '<td>'; echo $raw["bname"]; echo '</td>';
                        echo '<td>'; echo $raw["price"]; echo '</td>';
                          echo '<td>'; echo $raw["duration"]; echo '</td>';
                          echo '<td>
                            <a href="add_course_student.php?id='; echo$id; echo'&name=';echo $raw['cname']; echo'" style="background-color: white;" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-plus"></span> 
                            </a> <a href="delete_course_student.php?id='; echo$id; echo'&name=';echo $raw['name']; 
                            echo'" class="delete" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
                          </td>
                        </tr>';
                        }
                      echo '</tbody>';
                      

                      ?>
            </table>

            <hr>


              <!-- My courses table -->


              
              <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                <h2> <b>My</b> Courses</h2>
                <br>
                 
               </div>
              </div>
            </div>
                   
      <table class="table table-striped table-hover">
                <thead>
                    <tr>
      <th>
       <span class="custom-checkbox">
        <input type="checkbox" id="selectAll">
        <label for="selectAll"></label>
       </span>
      </th>
                        <th>Course Name</th>
                        <th>Score</th>
                        <th>Trainer Name </th>
                        <th>Branch</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
               <?php
                    
                    include 'dbConfig.php';
                    $sql =   "SELECT courses.cname, trainers.tname, courses.id AS c_id, trainers.id AS t_id, branches.bname,
                              courses.price , courses.duration FROM student_courses_trainers
                              JOIN courses ON courses.id = student_courses_trainers.course_id
                              JOIN courses_trainers ON student_courses_trainers.course_id=courses_trainers.course_id
                              JOIN branches ON branches.branchId  = courses_trainers.branch_id
                              JOIN trainers ON trainers.id = courses_trainers.trainer_id
                              JOIN students ON student_courses_trainers.student_id = students.id  AND student_id = $id";

                      $result = mysqli_query($conn, $sql);
                      echo '<tbody>';
                      while ($raw = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                          <td>
                            <span class="custom-checkbox">
                              <input type="checkbox" id="checkbox1" name="options[]" value="1">
                              <label for="checkbox1"></label>
                            </span>
                          </td>
                          <td>'; echo $raw["cname"]; echo '</td>';
                          // if (isset($_SESSION['score'])) {
                          //   echo'<td>'; echo $_SESSION['score']; echo'</td>';                            
                          // }
                          echo'<td>
                          <a style="font-size: 15px;" href="show_question_1.php?id=';echo $raw["id"];
                          echo'"> Take a Quiz</a>';
                          echo '<td>'; echo $raw["tname"]; echo '</td>';
                          echo '<td>'; echo $raw["bname"]; echo '</td>';
                          echo '<td>'; echo $raw["price"]; echo '</td>';
                          echo '<td>'; echo $raw["duration"]; echo '</td>';
                          echo '<td>
                            <a href="delete_course_student.php?id='; echo$id; echo'&name=';echo $raw['cname']; 
                            echo'" class="delete" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                          </td>
                        </tr>';
                        }
                      echo '</tbody>';
                      
                      ?>
            </table>

</body>
</html> 
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Trainer Page</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
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
                $id    = $_GET['id'];
                $sql = "SELECT tname FROM $title WHERE id = $id";
                $res = mysqli_query($conn, $sql);
                $raw = mysqli_fetch_array($res);
                if ($res) {
                  echo '<a class="navbar-brand" href="trainer.php?title=trainers&id='; echo $id; echo'"><b>';echo $raw['tname']; echo'</b></a>';
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



											<!-- Students table -->


<div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>My Students</b></h2>
							<br>
							<a style="color: yellow; font-size: 20px;" href="add_question.php?id=<?php echo $_GET['id']; ?>">Add Quiz</a>
						</div>

							<!-- Example single danger button -->
					<div class="col-xs-6">
					<div class="btn-group">
					  <button type="button" class="btn btn-danger btn-success dropdown-toggle" 
					  		  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Courses
					  </button>
						<div class="dropdown-menu">
							<?php
								include'dbConfig.php';
								$id = $_SESSION['id'];
								$title = $_SESSION['title'];
								$sql = "SELECT cname 
										FROM courses 
										JOIN courses_trainers
											ON courses.id = courses_trainers.course_id
										JOIN trainers
											ON trainers.id = courses_trainers.trainer_id
										 WHERE trainer_id=$id";
								$result = mysqli_query($conn, $sql);
								while ($raw = mysqli_fetch_array($result)) {
									# code...
						    		echo '<a class="dropdown-item" href="trainer_view_data.php?id=';
						    		echo $id.'&title=';echo$title;echo'&couresName='.$raw['cname'] .'">'.$raw['cname'].'</a>';
								}
							?>
					    </div>	
				    </div>

				    <div class="col-xs-6" style="margin-left: 16rem;">
							<a href="#addNewCourse" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Course</span></a>						
						</div>					
				</div>
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
							<th>Student Name</th>
							<th>Course</th>
							<th>Address / Branch</th>
							<th>Price</th>
							<th>Duration</th>
							<th>Actions</th>
						</tr>
					</thead>


					<?php
					include 'dbConfig.php';
					$courseName = $_GET['couresName'];
					$id = $_GET['id'];
					$sql_1 = "SELECT id INTO @cid FROM courses WHERE cname ='$courseName'"; 
					$sql_2 = "SELECT students.name, courses.cname, branches.bname, courses.price, courses.duration 
								FROM student_courses_trainers 
								JOIN students ON students.id = student_courses_trainers.student_id 
								JOIN courses ON courses.id = student_courses_trainers.course_id AND course_id = @cid
                            	JOIN courses_trainers on courses.id = courses_trainers.course_id
                                JOIN branches ON branches.branchId = courses_trainers.branch_id
								JOIN trainers ON trainers.id = student_courses_trainers.trainer_id WHERE trainers.id = $id";
					$result_1 = mysqli_query($conn, $sql_1);
					$result_2 = mysqli_query($conn, $sql_2);
					echo '<tbody>';
					while ($raw = mysqli_fetch_assoc($result_2)) {
						echo '<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td>'; echo $raw["name"]; echo '</td>';
					  echo '<td>'; echo $raw["cname"]; echo '</td>';
					  echo '<td>'; echo $raw["bname"]; echo '</td>';
					  echo '<td>'; echo $raw["duration"]; echo '</td>';
  					  echo '<td>'; echo $raw["price"]; echo '</td>';
							echo '<td>
								<a href="deletePage.php?title=students&name=';echo $raw['name']; echo'" class="delete" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>';
						}
					echo '</tbody>';
					
					?>


				</table>


				<div class="clearfix">
					<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
					<ul class="pagination">
						<li class="page-item disabled"><a href="#">Previous</a></li>
						<li class="page-item"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item active"><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">4</a></li>
						<li class="page-item"><a href="#" class="page-link">5</a></li>
						<li class="page-item"><a href="#" class="page-link">Next</a></li>
					</ul>
				</div>
			</div>
		</div>




	<div id="addNewCourse" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="add_course.php?title=courses&id=<?php echo $id ?>">
					<div class="modal-header">						
						<h4 class="modal-title">Add New Course</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name of the Course</label>
							<input name="name" type="text" class="form-control" >
						</div>
						<div class="form-group">
							<label>Address / Branch</label>
							<input name="branch" type="text" class="form-control" >
						</div>
						<div class="form-group">
							<label>Price</label>
							<input name="price" type="number" class="form-control" >
						</div>
						<div class="form-group">
							<label>Duration(h)</label>
							<input name="duration" type="number" class="form-control" >
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="add" value="Add">
					</div>

				</form>
			</div>
		</div>
	</div>

	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
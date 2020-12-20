<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Panel</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                $sql = "SELECT name FROM admins WHERE id = $id";
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



													<!-- Trainers -->

    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>Trainers</b></h2>
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

							<th>Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Actions</th>
						</tr>
					</thead>


					<?php

					include 'dbConfig.php';
					$sql = "SELECT * FROM trainers";
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
							<td>'; echo $raw["tname"]; echo '</td>';
					  echo '<td>'; echo $raw["email"]; echo '</td>';
					  echo '<td>'; echo $raw["address"]; echo '</td>';
  					  echo '<td>'; echo $raw["phone"]; echo '</td>';
							echo '<td>
								<a href="deletePage.php?referrer=admins&target=trainers&name=';echo $raw['tname']; 
								echo'&id=';echo$id;echo'" class="delete" data-toggle="modal">
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
    </div>



											<!-- Students -->





    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>Students</b></h2>
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
							<th>Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Actions</th>
						</tr>
					</thead>


					<?php

					$sql = "SELECT * FROM students";
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
							<td>'; echo $raw["name"]; echo '</td>';
					  echo '<td>'; echo $raw["email"]; echo '</td>';
					  echo '<td>'; echo $raw["address"]; echo '</td>';
  					  echo '<td>'; echo $raw["phone"]; echo '</td>';
							echo '<td>
								<a href="editPage_1.php?referrer=admins&target=students&name=';
								echo $raw['name']; echo'&id=';echo$id;echo'" class="edit" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="deletePage.php?referrer=admins&target=students&name=';echo $raw['name']; echo'&id=';echo$id;echo'" class="delete" data-toggle="modal">
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
    </div>


											<!-- Available Courses -->





    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Available <b>Courses</b></h2>
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
							<th>cName</th>
							<th>TrName</th>
							<th>Branch</th>
							<th>Price</th>
							<th>Duration(h)</th>
							<th>Actions</th>
						</tr>
					</thead>


					<?php

                      include 'dbConfig.php';
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
                            <a href="edit_course_1.php?referrer=admins&target=courses&name=';
                            echo $raw['cname']; echo'&TrName='; echo $raw['tname']; echo'&bname=';echo $raw['bname']; 
                             echo'&id=';echo$id;echo'" class="edit" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="deletePage.php?referrer=admins&target=courses&name=';echo $raw['cname']; 
                            echo'&id=';echo$id;echo'" class="delete" data-toggle="modal">
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
    </div>

    									<!-- Branches -->


    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>Branches</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addNewBranch" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Branch</span></a>						
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
							<th>Name</th>
							<th>Actions</th>
						</tr>
					</thead>
					
					<?php

					$sql = "SELECT * FROM branches";
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
							<td>'; echo $raw["bname"]; echo '</td>';
							echo '<td>
								<a href="branch_edit_1.php?referrer=admins&target=branches&name=';echo $raw['bname']; 
								echo'&id=';echo$id;echo'" class="edit" data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="deletePage.php?referrer=admins&target=branches&name=';echo $raw['bname']; echo'&id=';echo$id;echo'" class="delete" data-toggle="modal">
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
    </div>


	<!-- Edit Modal HTML -->
	<div id="addNewBranch" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="add_branch.php?title=branches">
					<div class="modal-header">						
						<h4 class="modal-title">Add New Trainer</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input name="name" type="text" class="form-control" >
						</div>
						<!-- <div class="form-group">
							<label>Email</label>
							<input name="email" type="email" class="form-control" >
						</div>
						<div class="form-group">
							<label>Address</label>
							<input name="address" type="text" class="form-control" >
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input name="phone" type="number" class="form-control" >
						</div> -->					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="add" value="Add">
					</div>

				</form>
			</div>
		</div>
	</div>
	

	
</body>
</html>
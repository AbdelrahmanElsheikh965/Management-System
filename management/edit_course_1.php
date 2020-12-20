<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Update Your Data</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .bs-example{
        margin: 20px;        
    }
</style>
</head>
<body>
    	<?php
        session_start();
		include 'dbConfig.php';
        $id = $_GET['id'];
        $referrer = $_GET['referrer'];
        $target = $_GET['target'];
		$name = $_GET['name'];
        $tname = $_GET['TrName'];
        $bname = $_GET['bname'];
		$sql = "SELECT courses.cname, trainers.tname, branches.bname, courses.price, courses.duration 
                              FROM courses_trainers  JOIN courses ON courses.id = courses_trainers.course_id 
                              JOIN branches ON branches.branchId = courses_trainers.branch_id
                              JOIN trainers ON trainers.id = courses_trainers.trainer_id WHERE cname = '$name'";
		$result = mysqli_query($conn, $sql);
		$raw = mysqli_fetch_array($result);


    	?>
<div class="bs-example">
    <form action="edit_course_2.php?id=<?php echo$id;?>&referrer=<?php echo $referrer;?>&target=<?php echo $target;?>&name=<?php echo $name; ?>&TrName=<?php echo $tname; ?>&bname=<?php echo $bname; ?>" method="post">
       


        <div class="form-group">
            <label for="inputEmail">Course Name</label>
            <input type="text" name="cname" class="form-control"  id="inputEmail" value="<?php echo $raw['cname']; ?>">
        </div>

        <div class="form-group">
            <label for="inputEmail">Trainer Name</label>
            <input type="text" name="tname" class="form-control"  id="inputEmail" value="<?php echo $raw['tname']; ?>">
        </div>

        <div class="form-group">
            <label for="inputEmail">Branch</label>
            <input type="text" name="branch" class="form-control" id="inputEmail" value="<?php echo $raw['bname']; ?>">
        </div>

        <div class="form-group">
            <label for="inputEmail">Price</label>
            <input type="number" name="price" class="form-control" id="inputEmail" value="<?php echo $raw['price']; ?>">
        </div>

        <div class="form-group">
            <label for="inputPassword">Duration(h)</label>
            <input type="number" name="duration" class="form-control" id="inputPassword" value="<?php echo $raw['duration']; ?>">
        </div>
        
        <button name="saveChanges" type="submit" class="btn btn-primary">Save Changes</button>

    </form>
</div>
</body>
</html>
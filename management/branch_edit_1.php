<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>UPdate Your DAta</title>
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
		$sql = "SELECT * FROM $target WHERE bname = '$name'";
		$result = mysqli_query($conn, $sql);
		$raw = mysqli_fetch_array($result);


    	?>
<div class="bs-example">
    <form action="branch_edit_2.php?id=<?php echo$id;?>&referrer=<?php echo $referrer;?>&target=<?php echo $target;?>&urlName=<?php echo $name; ?>" method="post">
       


        <div class="form-group">
            <label for="inputEmail">Name</label>
            <input type="text" name="name" class="form-control"  id="inputEmail" value="<?php echo $raw['bname']; ?>">
        </div>
        
        <button name="saveChanges" type="submit" class="btn btn-primary">Save Changes</button>

    </form>
</div>
</body>
</html>
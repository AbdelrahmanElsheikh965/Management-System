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
        $name = $_GET['name'];
        $referrer = $_GET['referrer'];
        $target = $_GET['target'];
		$sql = "SELECT * FROM $target WHERE name = '$name'";
		$result = mysqli_query($conn, $sql);
		$raw = mysqli_fetch_array($result);


    	?>
<div class="bs-example">
    <form action="editPage_2.php?id=<?php echo$id;?>&referrer=<?php echo $referrer;?>&target=<?php echo $target;?>&name=<?php echo $name;?>" method="post">
       


        <div class="form-group">
            <label for="inputEmail">Name</label>
            <input type="text" name="name" class="form-control"  id="inputEmail" value="<?php echo $raw['name']; ?>">
        </div>

        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" value="<?php echo $raw['email']; ?>">
        </div>

        <div class="form-group">
            <label for="inputEmail">Address</label>
            <input type="text" name="address" class="form-control" id="inputEmail" value="<?php echo $raw['address']; ?>">
        </div>

        <div class="form-group">
            <label for="inputPassword">Phone</label>
            <input type="number" name="phone" class="form-control" id="inputPassword" value="<?php echo $raw['phone']; ?>">
        </div>
        
        <button name="saveChanges" type="submit" class="btn btn-primary">Save Changes</button>

    </form>
</div>
</body>
</html>
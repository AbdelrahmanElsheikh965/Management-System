<!DOCTYPE html>
<html lang="en"> 
<head>
		<meta charset="utf-8 ">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Courses Management</title>
	    <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/courses.css">
		<link rel="stylesheet" href="css/all.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Tenali+Ramakrishna&display=swap" rel="stylesheet"> 
</head> 
	
<body>
<!-- Start Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#"><i class="fa fa-cube"></i>Management System</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
  
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <ul class="navbar-nav mr-auto">
		<li class="nav-item active">
		  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="#">Topics</a>
		</li>
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Menu
		  </a>
		  
		  <form method="get" action="redirect_page.php">
			  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="login.php?title=<?php $title="admins";   echo $title; ?>" >Admins</a>
				<a class="dropdown-item" href="login.php?title=<?php $title="trainers"; echo $title; ?>" >Trainers</a>
				<a class="dropdown-item" href="login.php?title=<?php $title="students"; echo $title; ?>" >Students</a>
				
			  </div>
		  </form>

		</li>
		
	  </ul>
	  <form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
	  </form>
	</div>
  </nav>
<!-- End Navbar-->

<!-- start slider -->
<div >
	<img src="pics/111.jpg" class="img-fluid" alt="Responsive image">
</div>
<div class="hero-container text-center">
	<div class="container" >
		<div class="hero-text ">
		<h1>Online Learning</h1>
		<p class="mt-3 mb-5">We amplify important ideas in mathematics education to help teachers grow their practice and our profession. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim beatae, facilis voluptatibus repellendus totam autem?</p>
		<button type="button" class="btn btn-outline-dark btn-lg" href='#signup.html'>GET STARTED</button>
		</div>
	</div>
</div>
<!-- end slider -->

<!-- Start Footer -->
<footer class="w31-footer-29-main foot">
	<div class="footer-29 py-5 foot-class">
		<div class="container pb-lg-3">
			<div class="row footer-top-29">
				<div class="col-lg-4 col-md-6 logo-section">
					<a class="navbar-brand" href="#"><i class="fa fa-cube"></i>Courses</a>
					<p>
						We amplify important ideas in mathematics education to help teachers grow their practice and our profession. Lorem ipsum dolor sit amet consectetur adipisicing elit.
					</p>
				</div>
				<div class="col-lg-2 col-md-6 explore-more">
					<h4>Explore More</h4>
					<ul>
						<li><a href="#gallery.html">Gallery</a></li>
						<li><a href="#gallery.html">Courses</a></li>
						<li><a href="#gallery.html">Buy Course</a></li>
						<li><a href="#gallery.html">Apply Now</a></li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="properties">
						<h4>Recent Courses</h4>
						<a class="d-grid twitter-feed " href="#single.html">
							<img class="img-fluid rounded" src="pics/f1.jpg" >
							<p>How to get Programming language Cartification.</p>
						</a>
						<a class="d-grid twitter-feed" href="#single.html">
							<img class="img-fluid rounded" src="pics/f2.jpg" >
							<p>how to get a job with good salary.</p>
						</a>
						<a class="d-grid twitter-feed " href="#single.html">
							<img class="img-fluid rounded" src="pics/f3.jpg" >
							<p>How to get Programming language Cartification.</p>
						</a>
						
					</div>
				</div>
				<div class="col-lg-2 col-md-6 shortcuts">
					<h4>Shortcuts</h4>
					<ul>
						<li><a href="#home.html">Home</a></li>
						<li><a href="#topics.html">Topics</a></li>
						<li><a href="#trainer.html">Trainer</a></li>
						<li><a href="#student.html">Student</a></li>
						<li><a href="login.html">Sign Up</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="py-3 bot-foot">
		<div class="container">
			<div class="text-center">
				<div class="social">
					<a class="facebook" href="#facebook">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
					<a class="google-plus" href="#googleplus">
						<i class="fa fa-google-plus" aria-hidden="true"></i>
					</a>
					<a class="twitter" href="#twitter">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
					<a class="instagram" href="#instagram">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>
					<a class="youtube" href="#youtube">
						<i class="fa fa-youtube" aria-hidden="true"></i>
					</a>
				</div>
				<div class="copyright"> 
					<p>
						© 2020 Courses. All Rights Reserved | Design by 
						<a href="#hany">Hany Magdy</a>
					</p>
				</div>
			</div>
		</div>

	</div>
</footer>	
<!-- End Footer -->

	    <!-- بنفس الترتيب-->
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script src="js/courses.js"></script>
</body>
</html> 
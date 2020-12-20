<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Form</title>
	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- //Meta tags -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"><!-- font-awesome-icons -->
</head>

<body>
	<section class="w3l-form-36">
		<div class="form-36-mian section-gap">
			<div class="wrapper">
				<div class="form-inner-cont">
					<h3>Login as <?php $title = $_GET['title']; echo $title; ?> </h3>
					
					<form action="loginConfig.php?title=<?php echo $title; ?> " method="post" class="signin-form">
						<div class="form-input">
							<span class="fa fa-envelope-o" aria-hidden="true"></span> 
							<input type="email" name="email"
								placeholder="E-Mail" required />
						</div>
						<div class="form-input">
							<span class="fa fa-key" aria-hidden="true"></span>
							<input type="password" name="password" placeholder="Password"
								required />
						</div>
						<div class="login-remember d-grid">
							<label class="check-remaind">
								<input type="checkbox" name="rememberMe">
								<span class="checkmark"></span>
								<p class="remember">Remember me</p>
							</label>
							<button class="btn theme-button">Login</button>
						</div>
						<div class="new-signup">
							<a href="#reload" class="signuplink">Forgot password?</a>
						</div>
					</form>
					<div class="social-icons">
						<p class="continue"><span>Or</span></p>
						<div class="social-login">
							<a href="#facebook">
								<div class="facebook">
									<span class="fa fa-facebook" aria-hidden="true"></span>

								</div>
							</a>
							<a href="#google">
								<div class="google">
									<span class="fa fa-google-plus" aria-hidden="true"></span>
								</div>
							</a>
						</div>
					</div>
					<p class="signup">Don’t have an account? 
						<a href="signup.php?title=<?php echo $title; ?>" class="signuplink">Sign up</a></p>
				</div>

				<!-- copyright -->
				<div class="copy-right">
					<p>© 2020 Courses. All rights reserved | Design by <a href="#hany"
							target="_blank">Hany Magdy</a></p>
				</div>
				<!-- //copyright -->
			</div>
		</div>
	</section>
</body>

</html>
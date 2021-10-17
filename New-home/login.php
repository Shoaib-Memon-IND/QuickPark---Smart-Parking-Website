<?php
    require_once "php/config.php";
	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}
	$loginURL = $gClient->createAuthUrl();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>LogIn or SignUp | Quickpark</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" type="image/png" sizes="32x32" href="../New-home/assets/images/favicon-32x32.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container" id="container">
<div class="form-container sign-up-container">

<form action="php/signup.php" method="POST">
	<h1>Create Account</h1>
	<div class="social-container">
		<a href="#" class="social"><i class="fa fa-facebook"></i></a>
		<a href="<?php echo $loginURL ?>" class="social"><i class="fa fa-google"></i></a>
		<a href="#" class="social"><i class="fa fa-linkedin"></i></a>
	</div>
	<span>or use your email for registration</span>
	<input type="text" name="name" placeholder="Name">
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<button type="submit">SignUp</button>
</form>
</div>
<div class="form-container sign-in-container">
	<form action="php/signin.php" method="POST">
		<h1>Sign In</h1>
		<div class="social-container">
		<a href="#" class="social"><i class="fa fa-facebook"></i></a>
		<a href="<?php echo $loginURL ?>" class="social"><i class="fa fa-google"></i></a>
		<a href="#" class="social"><i class="fa fa-linkedin"></i></a>
	</div>
	<span>or use your account</span>
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<a href="#">Forgot Your Password</a>

	<button type="submit">Sign In</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!!!</h1>
			<p>To keep connected with us please login with your personal info</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Dear, User</h1>
			<p>Enter your details and start journey with us</p>
			<button class="ghost" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>

<script src="js/login.js"></script>


</body>
</html>
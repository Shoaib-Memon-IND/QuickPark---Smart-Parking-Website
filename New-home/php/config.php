<?php
	session_start();
	require_once "vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("284646774951-velgvc2ua4eorc6na9cblegpkmqoccvk.apps.googleusercontent.com");
	$gClient->setClientSecret("xF0h8kewRXUNSrgitm8lzPxs");
	$gClient->setApplicationName("QuickPark");
	$gClient->setRedirectUri("http://localhost/Loginpage/home.html");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	$con = new mysqli('localhost', 'root','' ,'user_db');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	
?>
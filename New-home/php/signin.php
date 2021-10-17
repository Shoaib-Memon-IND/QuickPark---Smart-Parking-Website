<?php

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "user_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$email = $_POST["email"];
$password = $_POST["password"];
#$salt = "Quickpark";
#$password_encrypted = sha1($password.$salt);


$sql = mysqli_query($conn, "SELECT count(*) as total from users WHERE email = '".$email."' and 
	password = '".$password."' ");

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
	header('location:index.php');
}
else{
	header('location:login.html');
}

?>

<?php  

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("connection failed");
}

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
#$salt = "Quickpark";
#$password_encrypted = sha1($password.$salt);


$sql = "INSERT INTO users (name, email, password) 
VALUES ('$name', '$email', '$password')";

if($conn->query($sql) === TRUE){
	?>
	<script>
		alert('Values have been inserted');
	</script>
	<?php
}
else{
	?>
	<script>
		alert('Values did not insert');
	</script>
	<?php
}


?>
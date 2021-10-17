<?php  

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("connection failed");
}

if(isset($_POST['submit'])){

    if(!empty($_POST['park_no']) && !empty($_POST['soc']) && !empty($_POST['street']) && !empty($_POST['area']) && !empty($_POST['landmark'])){

        $park_no = $_POST['park_no'];
        $soc = $_POST['soc'];
        $street = $_POST['street'];
    	$area = $_POST['area'];
        $landmark = $_POST['landmark'];
                                    
        $sql = mysqli_query($conn,"INSERT INTO reg_park(park_no, soc, street, area ,landmark) VALUES('$park_no','$soc', '$street', '$area','$landmark');");

        if($sql){
			header('location:my-account.php#section3');
            mysqli_close($conn);
        }
                                
    }
    else{
        echo ' All fields mandatory !!';
    }
}
?>
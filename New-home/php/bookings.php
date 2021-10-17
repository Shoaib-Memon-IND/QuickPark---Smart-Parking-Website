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

    if(!empty($_POST['radio']) && !empty($_POST['date']) && !empty($_POST['start-time']) && !empty($_POST['end-time'])){

        $address = $_POST['radio'];
        $date = date("Y-m-d", strtotime($_POST['date']));
        $starttime = $_POST['start-time'];
        $endtime = $_POST['end-time'];
        
    	
                                    
        $sql = mysqli_query($conn,"INSERT INTO bookings VALUES('$address','$date', '$starttime','$endtime');");

        if($sql){
			header('location:payment.php');
            mysqli_close($conn);
        }
                                
    }
    else{
        echo ' All fields mandatory !!';
    }
}
?>
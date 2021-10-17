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

    if(!empty($_POST['name']) && !empty($_POST['car']) && !empty($_POST['reg_num']) && !empty($_POST['car_type'])){

        $name = $_POST['name'];
        $car = $_POST['car'];
        $reg_num = $_POST['reg_num'];
    	$car_type = $_POST['car_type'];
                                    
        $sql = mysqli_query($conn,"INSERT INTO reg_cars(name,car, reg_num, car_type) VALUES('$name','$car', '$reg_num', '$car_type');");

        if($sql){
			header('location:my-account.php#section2');
            mysqli_close($conn);
        }
                                
    }
    else{
        echo ' All fields mandatory !!';
    }
}
?>



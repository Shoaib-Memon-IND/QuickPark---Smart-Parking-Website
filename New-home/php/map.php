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

    if(!empty($_POST['address'])){


        $address = $_POST['address'];
            

        $sql = mysqli_query($conn,"SELECT address,latitude,longitude FROM parkings WHERE address LIKE '%" .$address. "%';");
        $result = mysqli_num_rows($sql);
        if ($result > 0){

            if(file_exists('avail_parking.json')){

                $current_data_1 = file_get_contents('avail_parking.json');
                $array_data_1 = json_decode($current_data_1, true);
                $x = array();
                $array_data_1 = $x;
                file_put_contents('avail_parking.json' ,$array_data_1);

                $current_data = file_get_contents('avail_parking.json');
                $array_data = json_decode($current_data, true);
                while($row = mysqli_fetch_assoc($sql)){
                    $extra = array(
                        'address' => $row['address'],
                        'latitude' => $row['latitude'],
                        'longitude' => $row['longitude']
                    );
                    $array_data[] = $extra;
                }
                $final_data = json_encode($array_data);
                file_put_contents('avail_parking.json' , $final_data);
            }
        }
    }
 }
                

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
    
    <link rel="stylesheet" href="../assets/css/map-style.css">
    <title>Book Your Parking Right From Mobile Device | QuickPark</title>
    <link rel = "icon" href="logo.png" type="image/x-icon">
</head>

<body>
    <main>
        <div class="store-list">
            <div class="heading">
                <h2>Find a Parking</h2>
            </div>
            <div class="form-box">
                <form action="" method="POST" class="details">
                    <label for="address">Location:</label><br>
                    <input type="text" placeholder="Society/Street/Area" id="address" class='input-field'name="address"><br>

                    <button type="submit" name='submit' id="find_parking_btn">FIND PARKING</button>
                </form>
            </div>


            <div class="form-box1">
                <form class="list" method = 'POST' action="bookings.php">
                    
                </form>
            </div>
        </div>
        <div id="map"></div>
    </main>

    

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script src = '../php/app.js'></script>
    

</body>

</html>
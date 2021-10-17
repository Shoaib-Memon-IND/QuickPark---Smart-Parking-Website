
<!DOCTYPE html>
<html lang = 'en' dir = "ltr">
    <head>
        <meta charset = "UTF-8">
        <title>My Account | QuickPark</title>
        <link rel = "stylesheet" href="../assets/css/my-account.css">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <meta name = "viewport" content = "width=device-width , initial-scale = 1.0">
        
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-details">
                <!-- Logo + Name-->
                <div class="logo">
                    <i class='bx bxs-dashboard'></i>
                    <div class="logo_name">QuickPark</div>
                </div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav-list">

            <!--Search Box -->
                <li>
                    <div class="text">
                        <div class="search-box">
                            <input type="text" placeholder="Search...">
                            <i class='bx bx-search' ></i>
                            <span class="tooltip">Search</span>
                        </div>
                    </div>
                </li>

                
                <!-- First Option-->
                <li>
                    <a href="map.php">
                        <i class='bx bxs-car' ></i>
                        <span class="links_name">Find a Parking</span>
                    </a>
                    <span class = "tooltip">Find a Parking</span>
                </li>

                <!-- Second Option-->
                <li>
                    <a href="#section1">
                        <i class='bx bx-history' ></i>
                        <span class="links_name">My Bookings</span>
                    </a>
                    <span class = "tooltip">My Bookings</span>
                </li>

                <!-- Third Option-->
                <li>
                    <a href="#section2">
                        <i class='bx bxs-car-garage'></i>
                        <span class="links_name">Add New Car</span>
                    </a>
                    <span class = "tooltip">Add New Car</span>
                </li>

                <!-- fourth Option-->
                <li>
                    <a href="#section3">
                        <i class='bx bxs-parking' ></i>
                        <span class="links_name">Add New Parking</span>
                    </a>
                    <span class = "tooltip">Add New Parking</span>
                </li>


                <!-- Fifth  Option-->
                <li>
                    <a href="#section4">
                        <i class='bx bx-cog' ></i>
                        <span class="links_name">Profile Settings</span>
                    </a>
                    <span class = "tooltip">Profile Settings</span>
                </li>

                <!-- Sixth Option-->
                <li>
                    <a href="#section5">
                        <i class='bx bx-support' ></i>
                        <span class="links_name">Support</span>
                    </a>
                    <span class = "tooltip">Support</span>
                </li>
                
                <!-- Profile Details -->
                <li class="profile">
                    <div class="profile-details">
                      <img src="../assets/images/logo.png" alt="profileImg">
                      <div class="name_job">
                        <div class="name">User</div>
                        
                      </div>
                    </div>
                    <i class='bx bx-log-out' id="log_out" ></i>
                </li>
            </ul>
            
        </div>
        <div class="pages">
            

            
            <section class = 'my-bookings' id="section1">
                <h2>MY BOOKINGS</h2>
                <div class="table_book">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>
                                    <i class='bx bxs-car'></i>
                                    CAR</th>
                                <th>
                                    <i class='bx bxs-map'></i>
                                    DESTINATION
                                </th>
                                <th>
                                    <i class='bx bx-rupee'></i>
                                    COST
                                </th>
                            </tr>
                        </thead>   

                        <?php

                        $servername ="localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "user_db";


                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if($conn->connect_error){
                            die("connection failed");
                        }

                        $sql = mysqli_query($conn,"SELECT * FROM my_bookings");
                        $result = mysqli_num_rows($sql);
                        if ($result > 0){
                            while($row = mysqli_fetch_assoc($sql)){
                                echo "<tr><td>".$row['car']."</td><td>".$row['destination']."</td><td>".$row['cost']."</td></tr>";                            }
                        }

                        ?>
                        
                    </table>
                    
                </div>
            </section>

            <section class = "add-new-car" id="section2">
                <h2>ADD NEW CAR</h2>
                <div class="add-car">
                    <div class="form-box">
                        <form action="add-new-car.php" method = 'POST' class="details">
                            <label for="name">Name:</label><br>
                            <input type="text" id="name" class = 'input-field'name="name"><br>
                            
                            <label for="car">Car:</label><br>
                            <input type="text" id="car" class = 'input-field' name="car"><br>

                            <label for="reg_num">Registration Number: </label><br>
                            <input type="text" id="reg_num" class = 'input-field' name="reg_num"><br>

                            <label for="car_type">Car Type:</label><br>
                            <select name="car_type" class = 'input-field' id="car_type">
                                <option value="Sedan">Sedan</option>
                                <option value="Semi-Sedan">Semi-Sedan</option>
                                <option value="Hatchback">Hatchback</option>
                                <option value="SUV">SUV</option>
                                <option value="SUV 7-Seater">SUV 7-Seater</option>
                            </select>
                            <button type="submit" name = 'submit' id="add_car_btn">ADD CAR</button>
                            </form>
                        
                    </div>
                    
                </div>
                <div class="reg-cars">
                    <div class="reg-cars-table">
                        
                        <table class="reg">
                            <thead>
                                <tr>
                                    <th>
                                        <i class='bx bxs-car'></i>
                                        CAR</th>
                                    <th>
                                        REGISTRATION NUMBER
                                    </th>
                                    <th>
                                        CAR-TYPE
                                    </th>
                                </tr>
                            </thead>
                            <?php

                                $servername ="localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "user_db";


                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if($conn->connect_error){
                                    die("connection failed");
                                }

                                $sql = mysqli_query($conn,"SELECT * FROM reg_cars");
                                $result = mysqli_num_rows($sql);
                                if ($result > 0){
                                    while($row = mysqli_fetch_assoc($sql)){
                                        echo "<tr><td>".$row['car']."</td><td>".$row['reg_num']."</td><td>".$row['car_type']."</td></tr>";                            }
                                }

                            ?>
                        </table>

                    </div>                  
                </div>

                
            </section>

            <section class = 'add-new-park' id="section3">
                <h2>ADD NEW PARKING</h2>
                <div class="add-parking">
                    <div class="form-box-park">
                        <form action="add-new-park.php" method = 'POST' class="details-park">
                            <label for="park_no">Parking Number:</label><br>
                            <input type="text" id="park_no" class = 'input-field'name="park_no"><br>
                            
                            <label for="soc">Society/locality:</label><br>
                            <input type="text" id="soc" class = 'input-field' name="soc"><br>

                            <label for="street">Street: </label><br>
                            <input type="text" id="street" class = 'input-field' name="street"><br>

                            <label for="area">Area:</label><br>
                            <input type="text" id="area" class = 'input-field' name="area"><br>

                            <label for="landmark">Landmark:</label><br>
                            <input type="text" id="landmark" class = 'input-field' name="landmark"><br>

                            <button type="submit" name= 'submit' id="add_park_btn">ADD PARKING</button>

                        </form>
                    </div>
                    
                </div>
                <div class="reg-park">
                    <div class="reg-park-table">
                        
                        <table class="reg1">
                            <thead>
                                <tr>
                                    <th>PARKING NO.</th>
                                    <th>SOCIETY</th>
                                    <th>STREET</th>
                                    <th>AREA</th>
                                    <th>
                                        <i class='bx bxs-landmark'></i>
                                        LANDMARK
                                    </th>
                                </tr>
                            </thead>
                            <?php

                                $servername ="localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "user_db";


                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if($conn->connect_error){
                                    die("connection failed");
                                }

                                $sql = mysqli_query($conn,"SELECT * FROM reg_park");
                                $result = mysqli_num_rows($sql);
                                if ($result > 0){
                                    while($row = mysqli_fetch_assoc($sql)){
                                        echo "<tr><td>".$row['park_no']."</td><td>".$row['soc']."</td><td>".$row['street']."</td><td>".$row['area']."</td><td>".$row['landmark']."</td></tr>";                            }
                                }

                            ?>
                        </table>

                    </div>                  
                </div>
            </section>

            <section class = 'profile' id="section4">
                <h2>PROFILE SETTINGS</h2>
                <div class="profile-set">
                    <div class="form-box-pro">
                        <form action="" class="details-pro">
                            <label for="name-pro">Name:</label><br>
                            <input type="text" id="name-pro" class = 'input-field'name="name-pro"><br>
                            
                            <i class='bx bx-mail-send'></i>
                            <label for="email-pro">E-mail</label><br>
                            <input type="text" id="email-pro" class = 'input-field' name="email-pro"><br>

                            <i class='bx bx-key' ></i>
                            <label for="pass-pro">Password: </label><br>
                            <input type="text" id="pass-pro" class = 'input-field' name="pass-pro"><br>

                            <i class='bx bxs-phone'></i>
                            <label for="ph-pro">Phone Number:</label><br>
                            <input type="text" id="ph-pro" class = 'input-field' name="ph-pro"><br>
                        </form>
                    </div>
                    <button type="button" id="profile_btn">UPDATE PROFILE</button>
                    <button type="button" id="photo_btn">UPLOAD PHOTO</button>
                </div>
            </section>

            <section class = 'support' id="section5">
                <h2>SUPPORT</h2>
                <div class="container">
                    <div class="accordion">
                        <!--Question-1-->
                        <div class="accordion-item" id="question1">
                            <a class = 'accordion-link'href='#question1'>
                                How to find a parking?
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <div class="answer">
                                <p>
                                Click on the "Find a Parking Button which is available in the dashboard 
                                as well as on the home page."
                                </p>
                            </div>
                        </div>

                        <!--Question-2-->
                        <div class="accordion-item" id="question2">
                            <a class = 'accordion-link'href='#question2'>
                                How to Register a parking?
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <div class="answer">
                                <p>
                                Click on the "Add new Parking" Button which is available in the dashboard.
                                </p>
                            </div>
                        </div>

                        <!--Question-3-->
                        <div class="accordion-item" id="question3">
                            <a class = 'accordion-link'href='#question3'>
                                How to Register my car?
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <div class="answer">
                                <p>
                                Click on the "Add new Car" Button which is available in the dashboard.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
        </div>
        <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            let searchBtn = document.querySelector(".bx-search");
          
            closeBtn.addEventListener("click", ()=>{
              sidebar.classList.toggle("open");
              menuBtnChange();//calling the function(optional)
            });
          
            searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
              sidebar.classList.toggle("open");
              menuBtnChange(); //calling the function(optional)
            });
          
            // following are the code to change sidebar button(optional)
            function menuBtnChange() {
             if(sidebar.classList.contains("open")){
               closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
             }else {
               closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
             }
            }
        </script>
    </body>
</html>


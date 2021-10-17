<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200,300,400,500,600,700,800&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<style>
body {
  font-family: 'Poppins', sans-serif;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

img{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 110px;
  height: 110px;
  margin-top: 20px;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #FFF4e0;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #ed3629;
  color: white;
  padding: 12px ;
  margin-top: 25px;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #29A3F5 ;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  } 
}
</style>
</head>
<body>
<div class="img">
  <img src="../assets/images/logoquickpark.png">
</div>


<div class="row"  style="padding:40px 300px;">
  <div class="col-50">
    <div class="container" >
      <form method="post" style="padding: 30px;">
      
        <div class="row" >
          <div class="col-25">
            <h3 style="text-align: center;margin:20px 10px;font-family: 'Poppins', sans-serif;">Confirm Details</h3>
          

            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="" readonly>
            <label for="date"><i class="fa fa-envelope"></i> Date & Time</label>
            <input type="text" id="date" name="date" placeholder="" readonly>
            <label for="date" class="type"><i class="fa fa-envelope"></i> Car Type</label>
            <select name="cars" id="cars" class="cars">
              <option value="volvo">Volvo</option>
              <option value="saab">Saab</option>
              <option value="mercedes">Mercedes</option>
              <option value="audi">Audi</option>
            </select>
            <input type="hidden" value="<?php echo 'OID'.rand(100,1000);?>" name="orderid">
            <label for="amount"><i class='bx bx-credit-card'></i> Total Amount</label>
            <input type="text" id="amount" name="amount" >


          
        </div>
       
        <input type="button"  value="Proceed to pay" class="btn" id="btn" name="btn" onclick="pay_now()">
      </form>
    </div>
  </div>
 
</div>
<script>
    function pay_now() {
        var cars = jQuery('#cars').val();
        var amount = jQuery('#amount').val();

        jQuery.ajax({
                    type: 'post',
                    url: 'payment_process.php',
                    data: "&amt=" + amount + "&cars=" + cars,
                    success: function (result){
                      var options = {
                        "key": "rzp_test_nV7gbR9UgwG6SR", // Enter the Key ID generated from the Dashboard
                        "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "QuickPark",
                        "description": "Get parking at your ease! #ParkHastleFree ",
                        "image": "https://i.ibb.co/L9pHYk1/Logo.png",
                        "handler": function (response){
                            jQuery.ajax({
                                type: 'post',
                                url: 'payment_process.php',
                                data: "payment_id=" + response.razorpay_payment_id + "&amt=" + amount + "&cars=" + cars,
                                success: function (result){
                                  window.location.href="payment_success.php"
                                }
                              });
                      }
                    };
                    var rzp1 = new Razorpay(options);
                    document.getElementById('btn').onclick = function(e){
                        rzp1.open();
                        e.preventDefault();
                    }
                }
        });
    }

</script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
    <title>Payment Successful | QuickPark</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/payment-success.css">
</head>

<body onload = 'myfunction()'>
    <div class="popup center">
        <div class="icon">
          <i class="fa fa-check"></i>
        </div>
        <div class="title">
          Success!!
        </div>
        <div class="description">
          Payment Successfull !
        </div>
        <div class="dismiss-btn">
          <button id="dismiss-popup-btn" onclick="location.href = 'index.php'">
            Dismiss
          </button>
        </div>
      </div>
      <div class="center">
        <button id="open-popup-btn" style = 'display:hidden;'>
          Open Popup
        </button>
      </div>

    <script>

         function myfunction() {
            document.getElementsByClassName("popup")[0].classList.add("active");
        };

        
    </script>

</body>

</html>
<?php

session_start();
$con = mysqli_connect('localhost','root','','user_db');

if (isset($_POST['amount']) && isset($_POST['cars'])){
    $amount = $_POST['amount'];
    $cars = $_POST['cars'];
    $payment_status = "Pending";
    $added_on = DATE();
    mysqli_query($con, "insert into payment(cars,amount,payment_status,added_on) values('$cars', '$amount', '$payment_status', '$added_on' );");

    $_SESSION['OID'] = mysqli_insert_id($con);
}


if (isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id = $_POST['payment_id'];
    mysqli_query($con, "update payment set payment_status = 'completed', payment_id = '$payment_id' where id = '".$_SESSION['OID']."'");
}

?>

//pay_I97RxW0IHVvw2V
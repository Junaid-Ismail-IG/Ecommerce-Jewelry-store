<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];

    $customer_querry = "SELECT `customer_id`,`customer_name` FROM `customers` WHERE (`customer_name` = '$user_email' OR `customer_email` = '$user_email') AND `customer_password` = '$user_password'";
    $customer_querry_run = mysqli_query($connect, $customer_querry);
    $customer_querry_fetch = mysqli_fetch_assoc($customer_querry_run);

    if (mysqli_num_rows($customer_querry_run) > 0) {
        $_SESSION["customer"] = $customer_querry_fetch["customer_name"];
        $_SESSION["customer_id"] = $customer_querry_fetch["customer_id"];
        $_SESSION["customer_type"] = "customer";
        location('index5.php');
    } elseif (($user_email == "employee" && $user_password == "employee") || ($user_email == "admin@gmail.com" && $user_password == "admin")) {
        location('../Ruby-Jewelry-Store-eCommerce/adminfolder/dashboard.php');
    } else {
        alert('login information invalid');
        location('login-register.php');
    }
}


?>
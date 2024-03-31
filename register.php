<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
include "include/header.php";


if (isset($_POST["submit"])) {
    $customer_name = $_POST["name"];
    $customer_email = $_POST["email"];
    $customer_password = $_POST["password"];

    $querry = "INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_password`) VALUES ('$customer_name','$customer_email','$customer_password')";
    $dup_name_check = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `customers` WHERE `customer_name` = '$customer_name'"));
    $dup_email_check = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `customers` WHERE `customer_email` = '$customer_email'"));

    if ($dup_name_check == 0) {
        if ($dup_email_check == 0) {
            if (mysqli_query($connect, $querry)) {
                alert('signup successful');
                location('login-register.php');
            } else {
                alert('ERROR: signup unsuccessful');
                location('login-register.php');
            }
        } else {
            alert('name is already taken');
            location('login-register.php');
        }
    } else {
        alert('email is already taken');
        location('login-register.php');
    }
}

?>

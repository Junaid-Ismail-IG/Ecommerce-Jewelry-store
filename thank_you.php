<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

?>
<style>
    .heading1{
        color:red;
        text-align: center;
        margin-top:100px;
        font-size:50px
    }
    .heading2{
        text-align: center;
    }
    .button {
  background-color: #04AA6D; /* Green */
  border: 2px solid black;
  color: white;
  padding: 10px 25px;
  text-decoration: none;
  font-size: 16px;
  justify-content: center;
  border-radius: 25px;
  margin-left:530px
}
.button:hover{
    background-color:red;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="heading1">Thank You for Your Order!</h1>
            <p class="heading2"><b>Your order has been successfully placed. We appreciate your business.</b></p>
            <!-- <a href="index5.php" class="thank-you-back">Back to homepage</a> -->
           <form action="index5.php">
            <button class="button">Back to homepage</button>
           </form>
        </div>
    </div>
</div>


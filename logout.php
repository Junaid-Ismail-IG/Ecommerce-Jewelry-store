<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
session_unset();
alert('logged out');
location('login-register.php');
?>
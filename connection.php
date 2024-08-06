<?php
session_start();
$con = mysqli_connect('localhost','phpmyadmin','Suparn@#$1234','food_order');

if (!$con) {
    die("Error in connection: " . mysqli_connect_error());
}

?>

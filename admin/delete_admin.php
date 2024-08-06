<?php
include('/var/www/html/project/food_order/connection.php');



// 1st step is to get the id that to be deleted
$id = $_GET['id'];
// 2nd step is to write the sql query foir deletion
$sql = "DELETE FROM `food_order`.`admin` WHERE `id` = '$id'";

//3rd is to execute the query
$result = mysqli_query($con,$sql);

//4th checking the weather query is executed or not
if($result){
    echo "admin deleted";
}

else{
    echo "Something went wrong";
}
header('location:manage_admin.php');

// 3rd step redirect manade admin page with msg








?>

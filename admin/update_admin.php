<?php
include('/var/www/html/project/food_order/connection.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `food_order`.`admin` WHERE `id` = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($result);
            $full_name  = $row['full_name'];
            $user_name  = $row['user_name'];
        }
    } else {
        header('location:manage_admin.php');
        exit();
    }
}
if (isset($_POST['update_admin'])) {
    if (isset($_POST['id'])) {
        $id = $_GET['id'];
    }

    $fName = $_POST['fName'];
    $uName = $_POST['uName'];
    $query = "UPDATE `food_order`.`admin` SET `full_name` = '$fName',`user_name`='$uName' WHERE `id` = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header('location:manage_admin.php?update_message=Updated Successfully!');
        exit();
    } else {
        die("Query failed: " . mysqli_error($con));
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <h1 id="main_title" class="text-center my-4">Update Admin</h1>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label for="fName">Enter your Full Name</label>
                <input type="text" name="fName" class="form-control" id="fName" placeholder="Enter your Full Name" value="<?php echo $full_name ?>">
            </div>
            <div class="form-group">
                <label for="uName">Enter User Name</label>
                <input type="text" name="uName" class="form-control" id="uName" placeholder="Enter user name" value="<?php echo $user_name ?>">
            </div>

            <input type="submit" class="btn btn-success" name="update_admin" value="Update">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<!-- manage_admin.php?id=<?php echo $id; ?> -->
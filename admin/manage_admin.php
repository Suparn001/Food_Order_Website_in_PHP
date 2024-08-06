<?php include('/var/www/html/project/food_order/admin/partial/header.php'); ?>
<div class="main">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br />
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Admin</button>
        <br /><br /> <br />
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Update Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $SrNo = 1;
                $sql = "SELECT * FROM `food_order`.`admin`";
                $id = $row['id'];
                $result = mysqli_query($con, $sql);
                $rows = mysqli_num_rows($result);
                if($rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $SrNo++ ?></td>
                            <td><?php echo $row['full_name'] ?></td>
                            <td><?php echo $row['user_name'] ?></td>
                            <td><a href="update_admin.php?id= <?php echo $row['id'] ?>" class="btn btn-success">Update Admin</a></td>
                            <td><a href="delete_admin.php?id= <?php echo $row['id'] ?>" class="btn btn-danger">Delete Admin</a></td>
                            <td><a href="update_password.php?id= <?php echo $row['id'] ?>" class="btn btn-danger">Update Password</a></td>
                            
                        </tr>
                <?php
                    }
                }
                
                ?>
            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
</div><br>

<?php
if (isset($_GET['update_message'])) {
    echo $_GET['update_message'];
}
if (isset($_GET['insert_message_1'])) {
    echo $_GET['insert_message_1'];
}
if (isset($_GET['insert_message_2'])) {
    echo $_GET['insert_message_2'];
}
// if (isset($_GET['mesg'])) {
//     echo $_GET['mesg'];
// }
// if (isset($_GET['mesg'])) {
//     echo $_GET['mesg'];
// }

?>
<form action="manage_admin.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="full_name">Enter Your Full Name</label>
                        <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter Your Full Name" required>
                    </div>
                    <div class="form-group">
                        <label for="user_name">Enter User Name</label>
                        <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Enter Your Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_admin" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>
<?php
// update the data from add admin form to database
// check whether the submit button is clicked or not


if (isset($_POST['add_admin'])) {
    // button clicked
    $fullName = $_POST['full_name'];
    $username = $_POST['user_name'];
    $password = md5($_POST['password']); // password encryption with md5
    // sql query to save data to databse from this add admin form
    $sql = "INSERT INTO `food_order`.`admin`(`full_name`,`user_name`,`password`) VALUES ('$fullName','$username','$password')";
    $result = mysqli_query($con, $sql);
    if ($result == true) {
        header('location:manage_admin.php?insert_message_1=Admin added successfully');
       // $_SESSION['add'] = "Admin Added Successfully";
    } else {
        
        header('location:manage_admin.php?insert_message_2=Something went Wrong!. Not added');
    }
}
?>
<?php include('/var/www/html/project/food_order/admin/partial/footer.php') ?>
<script>
    setTimeout(function() {
        var message = document.getElementById('session-message');
        if (message) {
            message.style.display = 'none';
        }
    }, 3000);
</script>
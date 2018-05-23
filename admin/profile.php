<?php include 'includes/admin_header.php';   ?>
 <?php
    if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($res)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password']; 
    $user_role = $row['user_role'];  
        
    }
    
    }
 ?>

<?php
if(isset($_POST['update_profile'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    
    $profile_query = "UPDATE users SET "
            . "user_firstname = '$user_firstname', "
            . "user_lastname = '$user_lastname', "
            . "user_role = '$user_role', "
            . "username = '$username', "
            . "user_password = '$user_password', "
            . "user_email = '$user_email' "
            . "WHERE username = '$username'";
    
    
    $res_upd_user = mysqli_query($conn, $profile_query);
    confirmquery( $res_upd_user );
}



?>


    <div id="wrapper">

        <!-- Navigation -->
        
   <?php include 'includes/admin_navigation.php';   ?>     
        
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Profile</small>
                        </h1>
                    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">Firstname:</label>
        <input type="text" name="user_firstname" value="<?php echo $user_firstname;  ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname:</label>
        <input type="text" name="user_lastname" value="<?php echo $user_lastname;  ?>" class="form-control">
    </div>
    
     <div class="form-group">
        <label for="user_role">User Role:</label>
        <select name="user_role" class="form-control">
            <option value="subscriber"><?php echo $user_role;  ?></option>
            <?php
            if($user_role == 'admin'){
                echo "<option value='subscriber'>subscriber</option>";
            }else{
                echo "<option value='admin'>admin</option>";
            }
            ?>
            
        </select>
        
    </div>
    
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $username;  ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_email">Email:</label>
        <input type="email" name="user_email" value="<?php echo $user_email;  ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password:</label>
        <input type="password" name="user_password" value="<?php echo $user_password;  ?>" class="form-control">
    </div>
  <!--  
    <div class="form-group">
        <label for="image">Post Image:</label>
        <input type="file" name="post_image" class="form-control">
    </div>
  -->

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
    </div>
</form>
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        

    <?php include 'includes/admin_footer.php';   ?>


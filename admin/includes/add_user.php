<?php
if(isset($_POST['create_user'])){
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $post_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    
    
    
    
    
    $query = "INSERT INTO users (user_firstname, user_lastname, user_role, username, user_password, user_email)"
            . " VALUES('$user_firstname', '$user_lastname', '$post_role', '$username', '$user_password', ' $user_email')";
    
    $result = mysqli_query($conn, $query);
    confirmquery( $result);
}


?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">Firstname:</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname:</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>
    
     <div class="form-group">
        <label for="user_role">User Role:</label>
        <select name="user_role" class="form-control">
            <option value="subscriber">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
        
    </div>
    
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_email">Email:</label>
        <input type="email" name="user_email" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password:</label>
        <input type="password" name="user_password" class="form-control">
    </div>
  <!--  
    <div class="form-group">
        <label for="image">Post Image:</label>
        <input type="file" name="post_image" class="form-control">
    </div>
  -->

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
</form>


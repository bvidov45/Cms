   



<table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $sql = "SELECT * FROM users";
                                  $res = mysqli_query($conn, $sql);
                                  while ($row = mysqli_fetch_assoc($res)){
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                $user_firstname = $row['user_firstname']; 
                                $user_lastname = $row['user_lastname']; 
                                $user_email = $row['user_email']; 
                                 $user_role = $row['user_role']; 
                                $user_image = $row['user_image']; ?>
                               
                                
                                
                                <tr>
                                    <td><?php echo $user_id;  ?></td>
                                    <td><?php echo $username;  ?></td>
                                    <td> <?php echo $user_firstname; ?></td>
                                    <td><?php echo $user_lastname; ?></td>
                                    <td><?php echo $user_email; ?></td>
                                    <td><?php echo  $user_role; ?></td>
                                    <td><?php echo $user_image; ?></td>
                                    
                                    
                                    <td><a href="users.php?change_to_admin=<?php echo $user_id ?>">Admin</a></td>
                                    <td><a href="users.php?change_to_sub=<?php echo $user_id ?>">Subscriber</a></td>
                                    <td><a href="users.php?source=edit_user&p_id=<?php echo $user_id ?>">Edit</a></td>
                                    <td><a href="users.php?delete=<?php echo $user_id ?>">Delete</a></td>
                                </tr>
                                  <?php } ?>    
                            </tbody>
                        </table>
       <?php  
        if(isset($_GET['change_to_admin'])){
           $change_to_admin = $_GET['change_to_admin'];
           $change_to_admin_query = "UPDATE users SET user_role='admin' WHERE user_id = $change_to_admin";
           $result_channge_to_admin = mysqli_query($conn, $change_to_admin_query);
           header("Location: users.php");
       }
       
       
        if(isset($_GET['change_to_sub'])){
           $change_to_sub = $_GET['change_to_sub'];
           $change_to_sub_query = "UPDATE users SET user_role='subscriber' WHERE user_id = $change_to_sub";
           $result_change_to_sub = mysqli_query($conn, $change_to_sub_query);
           header("Location: users.php");
       }
       
       
       
       
       
       
       
       if(isset($_GET['delete'])){
           $delete_users = $_GET['delete'];
           $query = "DELETE FROM users WHERE user_id = $delete_users";
           $res = mysqli_query($conn, $query);
           header("Location: users.php");
       }
       ?>


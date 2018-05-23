   



<table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Comments</th>
                                    <th>Tags</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $sql = "SELECT * FROM posts";
                                  $res = mysqli_query($conn, $sql);
                                  while ($row = mysqli_fetch_assoc($res)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author']; 
                                $post_category_id = $row['post_category_id']; 
                                $post_status = $row['post_status']; 
                                $post_image = $row['post_image']; 
                                $post_comment_count = $row['post_comment_count']; 
                                $post_tags = $row['post_tags'];
                                $post_date = $row['post_date']; ?>
                                
                                <tr>
                                    <td><?php echo $post_id;  ?></td>
                                    <td><?php echo $post_title; ?></td>
                                    <td><?php echo $post_author;  ?></td>
     <?php
    $query = "SELECT * FROM categories WHERE id = $post_category_id";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)){
    $cat_id = $row['id'];
    $cat_title = $row['cat_title']; 
        } ?>
   
                                    <td> <?php echo $cat_title; ?></td>
   
                                    <td><?php echo $post_status; ?></td>
                                    <td><img class="img-responsive" width="100" src="../images/<?php echo $post_image; ?>"></td>
                                    <td><?php echo $post_comment_count; ?></td>
                                    <td><?php echo $post_tags; ?></td>
                                    <td><?php echo $post_date; ?></td>
                                    <td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id;   ?>">Edit</a></td>
                                    <td><a href="posts.php?delete=<?php echo $post_id;   ?>">Delete</a></td>
                                </tr>
                                  <?php } ?>    
                            </tbody>
                        </table>
       <?php  
       if(isset($_GET['delete'])){
           $delete = $_GET['delete'];
           $query = "DELETE FROM posts WHERE post_id = $delete";
           $res = mysqli_query($conn, $query);
           header("Location: posts.php");
       }
       
       
       
       ?>


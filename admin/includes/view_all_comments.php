   



<table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response To</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $sql = "SELECT * FROM comments";
                                  $res = mysqli_query($conn, $sql);
                                  while ($row = mysqli_fetch_assoc($res)){
                                $comment_id= $row['comment_id'];
                                $comment_post_id= $row['comment_post_id'];
                                $comment_author = $row['comment_author']; 
                                $comment_content = $row['comment_content']; 
                                $comment_email = $row['comment_email']; 
                                $comment_status = $row['comment_status']; 
                                $comment_date = $row['comment_date']; ?>
                                
                                <tr>
                                    <td><?php echo $comment_id;  ?></td>
                                    <td><?php echo $comment_author;  ?></td>
     <?php/*
    $query = "SELECT * FROM categories WHERE id = $post_category_id";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)){
    $cat_id = $row['id'];
    $cat_title = $row['cat_title']; 
        } */?>
   
                                    <td> <?php echo $comment_content; ?></td>
                                    <td><?php echo $comment_email; ?></td>
                                    <td><?php echo $comment_status; ?></td>
            <?php
            
            
            $sql_post = "SELECT * FROM  posts WHERE post_id = $comment_post_id"; 
            
            $post_comment_id_query = mysqli_query($conn, $sql_post);
            while($row = mysqli_fetch_assoc($post_comment_id_query)){
                $postid = $row['post_id'];
                $posttitle = $row['post_title'];  ?>
     
                
            
                                    <td><a href="../post.php?pid=<?php echo  $postid;  ?>"><?php echo $posttitle; ?></a></td>
                                     <?php } ?>
                                 
                                    <td><?php echo $comment_date; ?></td>
                                    <td><a href="comments.php?approve=<?php echo $comment_id;   ?>">Approve</a></td>
                                    <td><a href="comments.php?unapprove=<?php echo $comment_id;   ?>">Unapprove</a></td>
                                    <td><a href="comments.php?delete=<?php echo $comment_id;   ?>">Delete</a></td>
                                </tr>
                                  <?php } ?>    
                            </tbody>
                        </table>
       <?php  
        if(isset($_GET['approve'])){
           $approve = $_GET['approve'];
           $approve_query = "UPDATE comments SET comment_status='approved' WHERE comment_id = $approve";
           $result_approved = mysqli_query($conn, $approve_query);
           header("Location: comments.php");
       }
       
       
        if(isset($_GET['unapprove'])){
           $unapprove = $_GET['unapprove'];
           $unapprove_query = "UPDATE comments SET comment_status='unapproved' WHERE comment_id = $unapprove";
           $result_unapproved = mysqli_query($conn, $unapprove_query);
           header("Location: comments.php");
       }
       
       
       
       
       
       
       
       if(isset($_GET['delete'])){
           $delete_comments = $_GET['delete'];
           $query = "DELETE FROM comments WHERE comment_id = $delete_comments";
           $res = mysqli_query($conn, $query);
           header("Location: comments.php");
       }
       ?>


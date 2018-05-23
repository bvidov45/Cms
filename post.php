<?php include 'includes/db.php';  ?>
<?php include 'includes/header.php';  ?>

    <!-- Navigation -->
<?php include 'includes/navigation.php';  ?> 

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
               
                
                <?php 
                    if(isset($_GET['pid'])){
                        $pid = $_GET['pid'];
                    }
                    $sql = "SELECT * FROM posts WHERE post_id =$pid  ";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)){
                     $post_id = $row['post_id'];
                     $post_title = $row['post_title'];
                     $post_author = $row['post_author'];
                     $post_date = $row['post_date'];
                     $post_content = $row['post_content'];
                     $post_image = $row['post_image']; ?>
                    
               

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title;  ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $post_author;  ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo $post_date;  ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;  ?>" alt="">
                <hr>
                <p><?php echo $post_content;  ?></p>
               

                <?php } ?>    
                <hr>

         
            </div>
            
            

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php';  ?>

        </div>
        <!-- /.row -->
        
          <!-- Comments Form -->
          <?php
          if(isset($_POST['create_comment'])){
                    $pid = $_GET['pid'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];
                    
                    $sql_comment = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                    $sql_comment .= " VALUES ('$pid', '$comment_author', '$comment_email', '$comment_content', 'unapproved', now())";
                            
                    $res_comment = mysqli_query($conn, $sql_comment);
                    if(!$res_comment){
                        echo "Error". mysqli_error($conn);
                    }
                    $query_p = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                    $query_p .=" WHERE post_id = $post_id ";
                    $res_p = mysqli_query($conn, $query_p);
                    
               }
          
          
          
          
          ?>
          
          
          
          
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php   
                $select_query = "SELECT * FROM comments WHERE comment_post_id = $pid";
                $select_query .= " AND comment_status = 'approved' ORDER BY comment_id DESC ";
                $sel_com_sql = mysqli_query($conn, $select_query);
                if (!$sel_com_sql){
                    die("Query Failed". mysqli_error($conn));
                }
                while($row = mysqli_fetch_assoc($sel_com_sql)){
                    $comment_date = $row['comment_date'];
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content']; ?>
            
                
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;  ?>
                            <small><?php echo $comment_date;  ?></small>
                        </h4>
                      <?php echo  $comment_content;   ?>
                    </div>
                </div>
                 <?php   } ?>
                
                
        

        <hr>

        <!-- Footer -->
        <?php include 'includes/footer.php';  ?>

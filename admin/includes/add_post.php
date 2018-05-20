<?php
if(isset($_POST['submit'])){
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    
    $post_date = date('d-m-y');
    $post_comment_count = 4;
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    
    $query = "INSERT INTO posts (post_title, post_category_id, post_author,post_status, post_image, post_tags, post_content,post_date, post_comment_count)"
            . " VALUES('$post_title', '$post_category_id', '$post_author', '$post_status', '$post_image', '$post_tags', '$post_content', now(), '$post_comment_count')";
    
    $result = mysqli_query($conn, $query);
    confirmquery( $result);
}


?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="post_title" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="Post Category">Post Category Id:</label>
        <input type="text" name="post_category_id" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="Author">Post Author:</label>
        <input type="text" name="post_author" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="status">Post Status:</label>
        <input type="text" name="post_status" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="image">Post Image:</label>
        <input type="file" name="post_image" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="tags">Post Tags:</label>
        <input type="text" name="post_tags" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="content">Post Content:</label>
        <textarea class="form-control" name="post_content"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Publish Post">
    </div>
</form>


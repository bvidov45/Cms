






<?php
if(isset($_GET['p_id'])){
    $p_id = $_GET['p_id'];
}
 $sql = "SELECT * FROM posts WHERE post_id = $p_id";
$res_id = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_comment_count = $row['post_comment_count'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_date = $row['post_date'];
    ?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="post_title" value="<?php echo $post_title; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="Post Category">Post Category Id:</label>
        <select name="post_category" class="form-control">
            <?php 
            $sql = "SELECT * FROM categories";
                 $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $cat_id = $row['id'];
                    $cat_title = $row['cat_title'];?>
                    
            
            <option value="<?php echo $cat_id;  ?>"><?php echo $cat_title;  ?></option>
                <?php } ?>
        </select>
        
    </div>
    
    <div class="form-group">
        <label for="Author">Post Author:</label>
        <input type="text" name="post_author" value="<?php echo $post_author; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="status">Post Status:</label>
        <input type="text" name="post_status" value="<?php echo $post_status; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="image">Post Image:</label>
        <input type="file" name="post_image" class="form-control"><img width="120" src='../images/<?php echo $post_image; ?>'/>
    </div>
    
    <div class="form-group">
        <label for="tags">Post Tags:</label>
        <input type="text" name="post_tags" value="<?php echo $post_tags; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="content">Post Content:</label>
        <textarea class="form-control" name="post_content"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update" value="Update Post">
    </div>
<?php } ?>
</form>

<?php
if(isset($_POST['update'])){
    $post_title = $_POST['post_title'];
    $post_category = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $p_id";
        $select_image = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($select_image)){
            $post_image = $row['post_image'];
        }
    }
    
    
    $upd_query = "UPDATE posts SET post_title = '$post_title', post_author = '$post_author', post_category_id = '$post_category', post_status = '$post_status', post_image = '$post_image', post_tags = '$post_tags', post_content = '$post_content' WHERE post_id = $p_id";
    
   if (!mysqli_query($conn, $upd_query)) {
    echo "Error updating record: " . mysqli_error($conn);
} else {
   header("Location: posts.php");
    
}

    
}



?>


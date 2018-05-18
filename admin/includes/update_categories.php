    <?php
                                    
    if(isset($_POST['update'])){
                                     
        $cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title='$cat_title' WHERE id = $edit";
        $upd_query = mysqli_query($conn, $query);
        if(!$upd_query){
           die("Query Failed". mysqli_error($conn));
             }?>
         <?php   }
           ?>

<form method="post" action="" enctype="multipart/form-data"> 
    
    <?php
                                                    
    
    $edit = $_GET['edit'];
    $sql = "SELECT * FROM categories WHERE id = $edit";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)){
    $cat_id = $row['id'];
    $cat_title = $row['cat_title'];                                    
    }?>
                                    
                                    
         <div class="form-group">
            <label for="cat_title">Edit Category</label>
             <input type="text" class="form-control" name="cat_title" value="<?php echo $cat_title;  ?>">
         </div>
         <div class="form-group">
             
             <input class="btn btn-primary" type="submit" name="update" value="Update">
         </div>
  </form>

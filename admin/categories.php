

<?php include 'includes/admin_header.php';   ?>

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
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                            
                      <?php insert_categories();?>
                            
                            
                            
                            <form method="post" action="categories.php">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit"name="submit" value="Add Category">
                                </div>
                            </form>
                            
                            <?php 
                            if(isset($_GET['edit'])){
                                $edit = $_GET['edit'];
                                include 'includes/update_categories.php';
                            }
                            
                            
                            ?>
                            
                            
                              
                            
                        </div><!--Add Category form-->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  $sql = "SELECT * FROM categories";
                                  $res = mysqli_query($conn, $sql);
                                  while ($row = mysqli_fetch_assoc($res)){
                                      $cat_id = $row['id'];
                                      $cat_title = $row['cat_title']; ?>
                               
                                
                                    <tr>
                                        <td><?php echo $cat_id;   ?></td>
                                        <td><?php echo $cat_title;   ?></td>
                                        <td><a href="categories.php?delete=<?php echo $cat_id; ?>">Delete</a></td>
                                        <td><a href="categories.php?edit=<?php echo $cat_id; ?>">Edit</a></td>
                                    </tr>
                                    <?php   } ?>
                                    <?php //Delete categories query
                                    delete_categories();
                                    ?>
                                </tbody>
                            </table> 
                            
                            
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include 'includes/admin_footer.php';   ?>
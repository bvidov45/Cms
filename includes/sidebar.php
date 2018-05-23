<div class="col-md-4">
            

    
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="post" action="search.php">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit"class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form><!-- end form -->
                    <!-- /.input-group -->
                </div>
                
                <!-- Login Form Well -->
                <div class="well">
                    <h4>Login</h4>
                    <form method="post" action="includes/login.php">
                    
                        <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn"><button name="login" class="btn btn-primary" type="submit">Submit</button></span>
                        </div>
                        
                   
                    </form><!-- end form -->
                    <!-- /.input-group -->
                </div>
                
                
                

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                    $sql = "SELECT * FROM categories";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)){
                                $cat_id = $row['id'];
                                $cat_title = $row['cat_title'];?>
                                <li><a href="category.php?category=<?php echo $cat_id;  ?>"><?php echo $cat_title;  ?></a>
                                </li>
                                
                    <?php } ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                <!--        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>-->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include 'widget.php';  ?>

            </div>
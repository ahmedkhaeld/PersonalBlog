 
<div class="col-md-4">

     <!-- Blog Search Well -->
     <div class="well">
                    <h4>Blog Search</h4>
                    <form  action="search.php" method="post">
                    <div class="input-group">
                        <input  name="search"   type="text" class="form-control">
                        <span class="input-group-btn">
                            <button   name="submit"   class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>  
                  </form> 
                    <!-- /.input-group -->
                </div>
     <!-- Login  -->
     <div class="well">
                    <h4>Login </h4>
                    <form  action="includes/login.php" method="post">
                    <div class="form-group">
                        <input  name="user_name" placeholder="Enter your username"  type="text" class="form-control">
                        
                    </div>  
                    <div class="input-group">
                        <input  name="user_password" placeholder="Enter your password"   type="password" class="form-control">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary " name="login">Submit</button>
                        </span>
                    </div>  
                  </form> 
                    <!-- /.input-group -->
                </div>
 
             


    <!-- Blog Categories Well -->
    <div class="well"> 
                <?php 
                    $query = "SELECT * FROM categories ";
                    $select_categories_sidebar = mysqli_query($connection, $query);
                ?>
                        <h4>Blog Categories</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled">
                                <?php 
                                while ($row = mysqli_fetch_assoc($select_categories_sidebar)){
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    // send user to another page that display all posts equal to this category
                                    echo " <li><a href='category.php?category=$cat_id'> {$cat_title}</a></li>";
                                }
                                ?>
                                
                                </ul>
                            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>

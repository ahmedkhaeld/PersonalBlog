<?php include "includes/header.php"?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to admin
                            <small>author</small>
                        </h1>

                        <div class="col-xs-6">
                            <?php
                            // function to add new category to when user click add category 
                            insert_categories();
                            
                            ?>
                        <!-- Add category form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary"  type="submit" name="submit" value="Add Category">
                            </div>
                            </form>


                        <?php  
                        // when a user clicks edit, directed to update form 
                        if (isset($_GET['edit'])) {
                            $cat_id= $_GET['edit'];
                            include "includes/update_categories.php";
                        }

                        ?>
                        </div>    
                        
                        <!-- Table to display categories   -->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id </th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                // find all categories query
                                findAllCategories();
                                ?>

                               <?php
                                // delete categories query
                               deleteCategories();
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
<?php include "includes/footer.php"?>
   
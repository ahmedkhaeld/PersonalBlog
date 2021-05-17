<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Home Films</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
               
                
                
                <?php
                // query to fetech all categories for database 
            $query = "SELECT * FROM categories ";
            $select_all_categories_query = mysqli_query($connection, $query);
            //  loop all the through the values in DB and assign them to an array var $row because it comes from an assoc array
            while ($row = mysqli_fetch_assoc($select_all_categories_query)){
                $cat_title = $row['cat_title'];
                echo " <li>
                <a herf='#'> {$cat_title}</a>
                       </li>";
            }
            
             ?>


                   
                    <!-- <li>
                        <a href="#"></a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
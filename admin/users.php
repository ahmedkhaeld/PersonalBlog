<?php include "includes/header.php"?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
              <div class="row">
                    <h1 class="page-header">
                                welcome to admin
                                <small>author</small>
                    </h1>
                    <?php 
                            if(isset($_GET['source'])){
                                $source=$_GET['source'];

                            }
                            else{
                                $source='';
                            }
                            switch($source) {
                                case 'add_user';
                                include "includes/add_user.php";
                                break;
                                case 'edit_user';
                                include "includes/edit_user.php";
                                break;
                                default:
                                include "includes/view_all_users.php";
                                break;
                                

                            }
                        
                        ?>

                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/footer.php"?>
   
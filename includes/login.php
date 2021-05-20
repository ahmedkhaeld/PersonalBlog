<?php include "db.php"; ?>
<?php  session_start(); ?>

<?php 

    if (isset($_POST['login'])){

            $username = $_POST['user_name'];
            $password = $_POST['user_password'];

            // make our inputs clean from special characters
            $username=mysqli_real_escape_string($connection,$username);
            $password=mysqli_real_escape_string($connection,$password);
            $query ="SELECT * FROM users WHERE user_name='{$username}'";
            $select_users_query=mysqli_query($connection, $query);
            if(!$select_users_query){
                die("QUERY FAILED".mysqli_error($connection));
            }

            while($row=mysqli_fetch_array($select_users_query)){
                $db_user_id=$row['user_id'];
                $db_username=$row['user_name'];
                $db_user_password=$row['user_password'];
                $db_user_firstname=$row['user_firstname'];
                $db_user_lastname=$row['user_lastname'];
                $db_user_role=$row['user_role'];    
            }
        $password=crypt($password, $db_user_password);

        // validate user query if not valid redirect user to index page
        if($username===$db_username && $password===$db_user_password){

            $_SESSION['username']=$db_username;
            $_SESSION['firstname']=$db_user_firstname;
            $_SESSION['lastname']=$db_user_lastname;
            $_SESSION['user_role']=$db_user_role;
            if($_SESSION['user_role']=='admin'){
                header("Location: ../admin");
            }

        }else{
            header("Location: ../index.php");
        }




    }


?>
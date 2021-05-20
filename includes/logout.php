<?php  session_start(); ?>

<?php 


// null value nothing is there, not even empty string, we need to clear any value of the session 
$_SESSION['username']=null;
$_SESSION['firstname']=null;
$_SESSION['lastname']=null;
$_SESSION['user_role']=null;
header("Location:../index.php ");


?>
<?php   
session_start();
include '../connectivity/connection.php';
session_destroy();
header("location:../log_in.php"); 
exit();
?>
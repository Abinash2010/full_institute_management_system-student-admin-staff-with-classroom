<?php
    session_start();
    include '../connectivity/connection.php';
    $temp=$_SESSION['uid'];
    if(!isset($temp))
        {
        header('location:../log_in.php');
        }
    else
        {
          $get=$_GET['nid'];
    $db=getDB();
    $stmt = $db->prepare("DELETE FROM `notification` WHERE  Noti_id=:noti"); 
			$stmt->bindParam(":noti",$get,PDO::PARAM_STR);
			$stmt->execute();
           
            
        $row=$stmt->rowcount();
       
        if($row>0)
        {
            header("location:notification.php");
        }
    }
?>


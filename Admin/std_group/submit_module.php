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
$get= $_GET['gp_id'];
    $aid= $_GET['a_id'];
    $name=$_POST['Ans'];
    $re=rand(0000,99999);
        $File = $_FILES['fil']['name'];
                    $tmp_dir = $_FILES['fil']['tmp_name'];
                    $imgSize = $_FILES['fil']['size'];
    
         $upload_dir = '../upload_assets/answer/'; // upload directory
               
   
                    move_uploaded_file($tmp_dir,$upload_dir.$File);
                  
               
                
    $db=getDB();
    $sql=$db->prepare("INSERT INTO `submition`(`Assignment_id`, `Student_id`, `Answer`, `File`) VALUES (:aid,:sid,:ans,:fl)");
    $sql->bindParam(':aid',$aid,PDO::PARAM_STR);
    $sql->bindParam(':sid',$temp,PDO::PARAM_STR);
    $sql->bindParam(':ans',$name,PDO::PARAM_STR);
    $sql->bindParam(':fl',$File,PDO::PARAM_STR);
    $sql->execute();
    $row=$sql->rowCount();
    if($row>0)
    {
        header("location:mygroup.php?gp_id=$get");
    }
   
}


?>
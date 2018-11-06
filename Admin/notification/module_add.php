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
        $topic=$_POST['title'];
        $des=$_POST['qsn'];
        $date=date('Y-m-d');
        $files=$_FILES['file']['name'];
         $tmp_dir = $_FILES['file']['tmp_name'];
        $nid=$temp.rand(00000,100000);
        $id;
        
        
        
                $upload_dir = '../upload_assets/notify/'; // upload directory
                $imgExt = strtolower(pathinfo($files,PATHINFO_EXTENSION)); // get image extension
               
                $userpic = $nid."."."".$imgExt;// rename uploading image
    
   
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                  
               
              
  
        $db=getDB();
        $sql=$db->prepare("Insert into `notification`(`id`, `Noti_id`, `Description`, `Title`, `Path`, `Staff_id`,`date`) 
        value(:id,:nid,:des,:tit,:pth,:stf,:dte)");
        $sql->bindParam(':id',$id,PDO::PARAM_STR);
        $sql->bindParam(':nid',$nid,PDO::PARAM_STR);
        $sql->bindParam(':des',$des,PDO::PARAM_STR);
        $sql->bindParam(':tit',$topic,PDO::PARAM_STR);
        $sql->bindParam(':pth',$userpic,PDO::PARAM_STR);
        $sql->bindParam(':stf',$temp,PDO::PARAM_STR);
        $sql->bindParam(':dte',$date,PDO::PARAM_STR);
        $sql->execute();
       $row=$sql->rowcount();
       
        if($row>0)
        {
            header("location:notification.php");
        }
    }
?>


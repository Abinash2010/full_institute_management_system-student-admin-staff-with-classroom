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
    try{
$get= $_GET['gp_id'];
$cls=$_GET['cls'];
$db=getDB();
$title=$_POST['title'];
$qsn= $_POST['qsn'];
  $File = $_FILES['file']['name'];
$tmp_dir = $_FILES['file']['tmp_name'];
$ifileSize = $_FILES['file']['size'];
$date1=date('Y-m-d');
$date2=$_POST['date'];
$qid=$cls.rand(0000,1000).date('y-m-d');
$userpic=" ";
$id;
 
                $upload_dir = '../upload_assets/assignment_files/'; // upload directory
                
                    move_uploaded_file($tmp_dir,$upload_dir.$File);
                
               
                
    $stmt=$db->prepare("INSERT into `assignment` values(:id,:gid,:aid,:t,:d,:dte,:fil,:due)");
        $stmt->bindParam(':id',$id, PDO::PARAM_STR);
    $stmt->bindParam(':gid',$get, PDO::PARAM_STR);
     $stmt->bindParam(':aid',$qid, PDO::PARAM_STR);
      $stmt->bindParam(':t',$title, PDO::PARAM_STR);
       $stmt->bindParam(':d',$qsn, PDO::PARAM_STR);
        $stmt->bindParam(':dte',$date1, PDO::PARAM_STR);
         $stmt->bindParam(':fil',$File, PDO::PARAM_STR);
          $stmt->bindParam(':due',$date2, PDO::PARAM_STR);
          $stmt->execute();
          $row=$stmt->rowcount();
 
        
        $sql1=$db->prepare("SELECT * FROM `class` WHERE Class_Name=:clls");
        $sql1->bindParam(':clls',$cls, PDO::PARAM_STR);
        $sql1->execute();
        $data=$sql1->fetch(PDO::FETCH_OBJ);
        $rows1=$sql1->rowcount();
       
        
         $sql2=$db->prepare("SELECT * FROM `student` WHERE Class_code=:cid");
        $sql2->bindParam(':cid',$data->Class_code, PDO::PARAM_STR);
        $sql2->execute();
        $data1=$sql2->fetchAll(PDO::FETCH_ASSOC);
        $rows2=$sql2->rowcount();
        
        foreach($data1 as $r)
            
        {
            $seen=0;
            
            $stmt2=$db->prepare("INSERT into `grp_notification` values(:id,:sid,:aid,:seen)");
        $stmt2->bindParam(':id',$id, PDO::PARAM_STR);
    $stmt2->bindParam(':sid',$r['Student_id'], PDO::PARAM_STR);
     $stmt2->bindParam(':aid',$qid, PDO::PARAM_STR);
      $stmt2->bindParam(':seen',$seen, PDO::PARAM_STR);
      
       
          $stmt2->execute();
          $row2=$stmt2->rowcount();
        
         if($row>0)
         {
             header("location:assignment.php?gp_id=$get");
         }
        }
       
                }
    catch(exception $e)
    {
        echo $e->getmessage();
    }
}
?>
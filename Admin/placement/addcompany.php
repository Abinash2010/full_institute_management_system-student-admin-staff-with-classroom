<?php
    session_start();
    include '../connectivity/connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../log_in.php');
       }
  else
    {
    
$db=getDB();
$name=$_POST['cmp_name'];
 
     $date = date('Y-m-d ');

    $sql=$db->prepare("SELECT * FROM `company`");
    $sql->execute();
    $row=$sql->rowCount();
    $i=$row+1;

    $sql1=$db->prepare('INSERT into `company` values(:id,:name,:dat)');
    $sql1->bindParam(':id',$i,PDO::PARAM_STR);
    $sql1->bindParam(':name',$name,PDO::PARAM_STR);
    $sql1->bindParam(':dat',$date,PDO::PARAM_STR);

    $sql1->execute();
    $rows=$sql->rowCount();
    if($rows>0)
    {
    	header('location:addprofile.php');
    }
    
  }
?>
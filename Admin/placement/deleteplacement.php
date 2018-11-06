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
$get=$_GET['std_id'];
$db=getDB();
$sql=$db->prepare("DELETE FROM `placement` where `Student_id`=:std");
$sql->bindParam(':std',$get,PDO::PARAM_STR);
$sql->execute();
$row=$sql->rowCount();
if($row>0)
{
	header('location:placement.php');
}
      
      
      
  }
?>
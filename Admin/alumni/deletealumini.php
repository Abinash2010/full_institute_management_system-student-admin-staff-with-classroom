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
    
    $get=$_GET['alumini_id'];
    $db=getDB();
    $stmt = $db->prepare("DELETE  FROM `alumini` WHERE  Student_id=:alumini"); 
			$stmt->bindParam(":alumini",$get,PDO::PARAM_STR);
			$stmt->execute();
            $row=$stmt->rowCount();
            if($row>0)
            {
                header("location:alumini.php");
            }
        }
  
?>
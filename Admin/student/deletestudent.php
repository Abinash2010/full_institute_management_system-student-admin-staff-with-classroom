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
      $cls=$_GET['sem'];
    $db=getDB();
   
try{
    $stmt = $db->prepare("DELETE  FROM `student` where Student_id=:std"); 
            $stmt->bindParam(":std",$get,PDO::PARAM_STR);
           
		    $stmt->execute();
			
            $row=$stmt->rowCount();
           
            if($row>0)
            {
                $sql1=$db->prepare("DELETE  FROM `student_login` where Student_id=:std");
                $sql1->bindParam(":std",$get,PDO::PARAM_STR);
			    $sql1->execute();
                $rows=$sql1->rowCount();
                if($rows>0){
                    
                header("location:student.php?sem=$cls");
            }
        }
    }catch(exception $e)
    {
        echo $e->getmessage();
    }
  }
    
?>
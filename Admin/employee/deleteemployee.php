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

 
    
    $get=$_GET['staff_id'];
      $role=$_GET['add'];
    $db=getDB();
    $sql=$db->prepare("SELECT Image  FROM `staff` where Staff_id=:staff");
        $sql->bindParam(":staff",$get,PDO::PARAM_STR);
       $sql->execute();
       $result=$sql->fetch(PDO::FETCH_OBJ);
       $row1=$sql->rowCount();
        if($row1>0){

    $stmt = $db->prepare("DELETE  FROM `staff` where Staff_id=:staff"); 
            $stmt->bindParam(":staff",$get,PDO::PARAM_STR);
            unlink('../upload_assets/img_employee/'.$result->Image);
            $stmt->execute();
            
            $row=$stmt->rowCount();
           
            if($row>0)
            {
                $sql1=$db->prepare("DELETE  FROM `staff_login` where staff_login.Staff_id=:staffs");
                $sql1->bindParam(":staffs",$get,PDO::PARAM_STR);
                $sql1->execute();
                $rows=$sql1->rowCount();
                if($rows>0){
                   
                    header("location:listemployee.php?id=$role");
                   
            }
        }
    }
      }
    
    ?>
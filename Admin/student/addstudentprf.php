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
 
            
                    $fname=$_POST['fname'];
                    $mname=$_POST['mname'];
                    $lname=$_POST['lname'];
                    $email=$_POST['email'];
                    $number=$_POST['no'];
                     $cls=$_POST['sem'];
                    $dob=$_POST['dob'];
                    $roll=$_POST['roll'];
                    $address=$_POST['addres'];
                    $adate=$_POST['adate'];
                    $date=date('y-m-d h:m:s');
                    
                     $password=rand(00000,999999);
                   
   
               
         $query="INSERT into`student` values(:roll,:fname,:mname,
                    :lname,:cls,:dob,
                    :email,:addres,:num,:adate)";      
                    $stmt1 =$db->prepare($query);
                 
                    
                    $stmt1->bindParam(':fname',$fname, PDO::PARAM_STR);
                    $stmt1->bindParam(':mname',$mname, PDO::PARAM_STR);
                    $stmt1->bindParam(':lname',$lname, PDO::PARAM_STR);
                    $stmt1->bindParam(':cls',$cls, PDO::PARAM_STR);
                    $stmt1->bindParam(':dob',$dob, PDO::PARAM_STR);
                     $stmt1->bindParam(':email',$email, PDO::PARAM_STR);
                    $stmt1->bindParam(':num',$number, PDO::PARAM_STR);
                   $stmt1->bindParam(':dob',$dob, PDO::PARAM_STR);
                     $stmt1->bindParam(':addres',$address, PDO::PARAM_STR);
                    $stmt1->bindParam(':adate',$adate, PDO::PARAM_STR);
                     $stmt1->bindParam(':roll',$roll, PDO::PARAM_STR);
                    $stmt1->execute();
                    $row = $stmt1->rowCount();
                if($row>0)
                {
                      $stmt2 =$db->prepare("INSERT INTO `student_login` VALUES(:Std,:Email, :Pass, :Last)  ");
                 
                    
                    $stmt2->bindParam(':Std',$roll, PDO::PARAM_STR);
                    $stmt2->bindParam(':Email',$email, PDO::PARAM_STR);
                    $stmt2->bindParam(':Pass',$password, PDO::PARAM_STR);
                    $stmt2->bindParam(':Last',$date, PDO::PARAM_STR);
                   $stmt2->execute();
                    $rows=$stmt2->rowCount();
                    if($rows>0)
                    {
                        header('location:student.php');
                    }
                }
  }
?>
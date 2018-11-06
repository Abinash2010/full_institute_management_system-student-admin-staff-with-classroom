   <?php
    session_start();
    include 'connectivity/connection.php';
    

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../log_in.php');
       }
  else
    {
    
 $db=getDB();
 
              
                    $fname=$_POST['fname'];
                    $mname=$_POST['mname'];
                    $lname=$_POST['lname'];
                    $email=$_POST['email'];
                   
                  
                     $password=$_POST['pass'];
                    
                       
                    
                    $query="UPDATE `admin` SET `F_name`=:fname,`M_name`=:mname,`L_name`=:lname,
                    `Email`=:email,`Password`=:pass
                   WHERE `Admin_id`=:get";      
                    $stmt1 =$db->prepare($query);
                 
                    
                    $stmt1->bindParam(':fname',$fname, PDO::PARAM_STR);
                    $stmt1->bindParam(':mname',$mname, PDO::PARAM_STR);
                    $stmt1->bindParam(':lname',$lname, PDO::PARAM_STR);
                     $stmt1->bindParam(':email',$email, PDO::PARAM_STR);
                    $stmt1->bindValue(':pass', $password, PDO::PARAM_STR);   
                  
                     $stmt1->bindParam(':get',$temp, PDO::PARAM_STR);
                    $stmt1->execute();
                    $rows = $stmt1->rowCount();
                            
                
                        
                          if($rows>0)
                                {
                                   
                                            header("location:viewadmin.php");
                                         
                            
                            }
      
        
  }
        
?>
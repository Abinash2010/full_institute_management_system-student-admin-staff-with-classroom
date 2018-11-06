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
 
               $get= $_GET['std_id'];
             $name=$_POST['names'];
                    $email=$_POST['email'];
                    $number=$_POST['num'];
                    $address=$_POST['address'];
                    $btch=$_POST['btch'];
                   $plcd=$_POST['plcd'];

         
                    
                   $query="UPDATE `alumini` SET `Student_name`=:names,
                    `Batch`=:btch,`Placement`=:plcd,`Location`=:loc,`Email`=:email,
                    `Contact_no`=:num WHERE `Student_id`=:get";    
                    $stmt1 =$db->prepare($query);
                 
                    
                    $stmt1->bindParam(':names',$name, PDO::PARAM_STR);
                     $stmt1->bindParam(':email',$email, PDO::PARAM_STR);
                    $stmt1->bindParam(':num',$number, PDO::PARAM_STR);
                    $stmt1->bindParam(':btch',$btch, PDO::PARAM_STR);
                     $stmt1->bindParam(':loc',$address, PDO::PARAM_STR);
                    $stmt1->bindParam(':plcd',$plcd, PDO::PARAM_STR);
                     $stmt1->bindParam(':get',$get, PDO::PARAM_STR);
                    $stmt1->execute();
                    $rows = $stmt1->rowCount();
                            
                
                          if($rows>=0)
                                {
                                    
                                    
                                            header("location:alumini.php?alumini_id=".$get);
                                            
                                       
                            }
        
  
        }
    
?>
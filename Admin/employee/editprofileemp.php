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
 
               $get= $_GET['staff_id'];
                    $fname=$_POST['fname'];
                    $mname=$_POST['mname'];
                    $lname=$_POST['lname'];
                    $email=$_POST['email'];
                    $number=$_POST['num'];
                    $post=$_POST['post'];
                    $address=$_POST['address'];
                    $jdate=$_POST['jdate'];
                    $imgFile = $_FILES['img']['name'];
                     $imgFiles = $_FILES['imgs']['name'];
                    $tmp_dir = $_FILES['img']['tmp_name'];
                    $imgSize = $_FILES['img']['size'];
                     $password=$_POST['pass'];

                     
                     $sql1=$db->prepare("SELECT Image  FROM `staff` where Staff_id=:staf");
        $sql1->bindParam(":staf",$get,PDO::PARAM_STR);
       $sql1->execute();
       $result=$sql1->fetch(PDO::FETCH_OBJ);
                    
      
      
      if($imgSize>0){          

           
                     unlink('../upload_assets/img_employee/'.$result->Image);
                    

          $img= $imgFile = $_FILES['img']['name'];
                            $upload_dir = '../upload_assets/img_employee/'; // upload directory
                          
                           
                            move_uploaded_file($tmp_dir,$upload_dir.$imgFile);
             $stmt =$db->prepare("UPDATE `Staff` SET `Image`=:upic WHERE `Staff_id`=:get");
                              $stmt->bindParam(':upic',$imgFile, PDO::PARAM_STR);
                            $stmt->bindParam(':get',$get,PDO::PARAM_STR);
                            $stmt->execute();
                            $row = $stmt->rowCount();
      }
                           
               
                          
                       
                    
                    $query="UPDATE `staff` SET `F_name`=:fname,`M_name`=:mname,`L_name`=:lname,
                    `Dejignation`=:post,`Email`=:email,
                    `Contact_no`=:num,`Address`=:addres,`Join_date`=:jdate WHERE `Staff_id`=:get";      
                    $stmt1 =$db->prepare($query);
                 
                    
                    $stmt1->bindParam(':fname',$fname, PDO::PARAM_STR);
                    $stmt1->bindParam(':mname',$mname, PDO::PARAM_STR);
                    $stmt1->bindParam(':lname',$lname, PDO::PARAM_STR);
                     $stmt1->bindParam(':email',$email, PDO::PARAM_STR);
                    $stmt1->bindParam(':num',$number, PDO::PARAM_STR);
                    $stmt1->bindParam(':post',$post, PDO::PARAM_STR);
                     $stmt1->bindParam(':addres',$address, PDO::PARAM_STR);
                    $stmt1->bindParam(':jdate',$jdate, PDO::PARAM_STR);
                     $stmt1->bindParam(':get',$get, PDO::PARAM_STR);
                    $stmt1->execute();
                    $rows = $stmt1->rowCount();
                            
                
                         $sql =$db->prepare("UPDATE `staff_login` set `Email`=:email,`Password`=:pass where `Staff_id`=:get");
                        $sql->bindValue(':get', $get);
                         $sql->bindValue(':email', $email);
                        $sql->bindValue(':pass', $password);                      
                        $sql->execute();
                        $row1=$sql->rowCount();
                          if($row1>=0)
                                {
                                   
                                            header("location:viewemployee.php?staff_id=".$get);
                                         
                            
                            }
                        }
      
        
  
        
?>
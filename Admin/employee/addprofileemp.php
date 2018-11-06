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
               $get=$_GET['add'];
                    $fname=$_POST['fname'];
                    $mname=$_POST['mname'];
                    $lname=$_POST['lname'];
                    $email=$_POST['email'];
                    $number=$_POST['no'];
                    $post=$_POST['post'];
                    $address=$_POST['address'];
                    $jdate=$_POST['jdate'];
                    $imgFile = $_FILES['img']['name'];
                    $tmp_dir = $_FILES['img']['tmp_name'];
                    $imgSize = $_FILES['img']['size'];
                    $staff_id='Staff-'.rand(0001,10000);
                    $password=rand(1,100000000000);
               
                    
                    $time= date("Y-m-d h:i:sa");
    
      
                $upload_dir = '../upload_assets/img_employee/'; // upload directory
               
    
   
                    move_uploaded_file($tmp_dir,$upload_dir.$imgFile);
                  
               
                
  
            
                    
                                 
                    $stmt =$db->prepare("INSERT INTO `staff` VALUES(:id,:fname,:mname,:lname,:post,:email,:num,:addres,:jdate, :upic,:rol)");
                    $stmt->bindParam(':id',$staff_id, PDO::PARAM_STR);
                    $stmt->bindParam(':rol',$get, PDO::PARAM_STR);
                    $stmt->bindParam(':fname',$fname, PDO::PARAM_STR);
                    $stmt->bindParam(':mname',$mname, PDO::PARAM_STR);
                    $stmt->bindParam(':lname',$lname, PDO::PARAM_STR);
                     $stmt->bindParam(':email',$email, PDO::PARAM_STR);
                    $stmt->bindParam(':num',$number, PDO::PARAM_STR);
                    $stmt->bindParam(':post',$post, PDO::PARAM_STR);
                     $stmt->bindParam(':addres',$address, PDO::PARAM_STR);
                    $stmt->bindParam(':jdate',$jdate, PDO::PARAM_STR);
                    $stmt->bindParam(':upic',$imgFile, PDO::PARAM_STR);
                    $stmt->execute();
                    $rows = $stmt->rowCount();
                 try{  
                   

               

                         

                         $sql =$db->prepare("INSERT INTO `staff_login` VALUE(?,?,?,?)");

                $sql->bindValue(1, $staff_id);
                $sql->bindValue(2, $email);
                $sql->bindValue(3, $password);
                $sql->bindValue(4, $time);                      

                $sql->execute();
                $row=$sql->rowCount();
                if($row>0)
                {
                   
                             header('location:viewemployee.php?staff_id='.$staff_id);
                            
                        

                  }
        }  catch(PDOException $e){
            die($e->getMessage()); 
    }
                        }
        
  
   
        ?>  
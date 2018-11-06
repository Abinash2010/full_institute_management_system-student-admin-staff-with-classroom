<?php
    function Login($input,$dbs)
    {
    try{
                $stmt = $dbs->prepare("SELECT `Admin_id`,`Email`,`Password` from `Admin` where Email=:email and Password=:pass"); 
                
                $stmt->bindParam(":email",$input[0],PDO::PARAM_STR);
                $stmt->bindParam(":pass",$input[1],PDO::PARAM_STR);
                $stmt->execute();
                $count=$stmt->rowCount();
                $data=$stmt->fetch(PDO::FETCH_OBJ);
                
                      
                             
                                    $stmt1 = $dbs->prepare("SELECT `Student_id`,`Email`,`Password`
                                     from `student_login` where Email=:emails and Password=:passs"); 
                                    $stmt1->bindParam(":emails",$input[0],PDO::PARAM_STR);
                                    $stmt1->bindParam(":passs",$input[1],PDO::PARAM_STR);
                                    $stmt1->execute();
                                    $count1=$stmt1->rowCount();
                                    $data1=$stmt1->fetch(PDO::FETCH_OBJ);
                                    
                                  
                                                                $stmt2 = $dbs->prepare("SELECT `Staff_id`,`Email`,`Password` from 
                                                                `staff_login` where Email=:emai and Password=:pas");  
                                                                $stmt2->bindParam(":emai",$input[0],PDO::PARAM_STR);
                                                                $stmt2->bindParam(":pas",$input[1],PDO::PARAM_STR);
                                                                $stmt2->execute();
                                                                $count2=$stmt2->rowCount();
                                                                $data2=$stmt2->fetch(PDO::FETCH_OBJ);
          if($count>0)
                           {
                                if($data->Email==$input[0] && $data->Password==$input[1])
                                    {
                                        $_SESSION['uid']=$data->Admin_id;
                                                $temp=$_SESSION['uid'];
                                        header('location:../index.php');
                                    }
               
 
                           } 
                           elseif($count1>0)
                           {
                                if($data1->Email==$input[0] && $data1->Password==$input[1])
                                     {
                                        $_SESSION['uid']=$data1->Student_id;
                                           $temp=$_SESSION['uid'];
                                         header('location:../student.php');
                                 }
                           }    
                           elseif($count2>0)
                           {
                               if($data2->Email==$input[0] && $data2->Password==$input[1])
                                                {
                                                    $_SESSION['uid']=$data2->Staff_id;
                                                            $temp=$_SESSION['uid'];
                                                    header('location:../emp.php');
                                                }
                           }  
        else
        {
            header("location:../../index.php?msg=failed");
        }
                 
               
                        }catch(exception $e)
                        {
                            echo $e->getmessage();
                        }
               
        }
    
       
            
       
?>
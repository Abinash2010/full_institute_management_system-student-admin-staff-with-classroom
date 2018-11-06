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
                    $std=$_POST['std_id'];
                 $cmp=$_POST['cmp_id'];
                    $dates=$_POST['date'];
                   
            
                    
                   $stmt =$db->prepare("SELECT * FROM `student`  where Student_id=:std ");
                    $stmt->bindParam(':std',$std, PDO::PARAM_STR);
                    
                    $stmt->execute();
                    $result=$stmt->fetch(PDO::FETCH_OBJ);
                    $rows = $stmt->rowCount();
                
                                 $name=$result->F_name.' '.$result->M_name.' '.$result->L_name;
                                            
                                            $date = strtotime($result->Admission_date);
                                           
                                            $year = date("Y", $date);
                    if($rows>0)
                    {
                                       
                    
                                    $stmt1 =$db->prepare("SELECT * FROM `company`  where Company_id=:cmp ");
                                    $stmt1->bindParam(':cmp',$cmp, PDO::PARAM_STR);
                                    
                                    $stmt1->execute();
                                    $result1=$stmt1->fetch(PDO::FETCH_OBJ);
                                    $row = $stmt1->rowCount();
                                
                                    if($row>=1)
                                    {
                               
                                     
                                     
                                     $sql=$db->prepare("INSERT iNTO `Placement`  VALUES(:st,:cm,:btch,:nam,:plc)") ;
                                       $sql->bindParam(':st',$result->Student_id, PDO::PARAM_STR);
                                       $sql->bindParam(':cm',$result1->Company_id, PDO::PARAM_STR);
                                       $sql->bindParam(':btch',$year, PDO::PARAM_STR);
                                       $sql->bindParam(':nam',$name, PDO::PARAM_STR);
                                       $sql->bindParam(':plc',$dates, PDO::PARAM_STR);
                                        $sql->execute();
                                        $row1= $sql->rowCount();
                                        echo $row1;
                                      
                                        if($row1>0)
                                        {
                                            header('location:placement.php');
                                        }
                                       
                                    }
                          
                             }            
                        
     
    
           
  }
    
        ?>  
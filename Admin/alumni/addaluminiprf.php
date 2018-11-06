<?php
    session_start();
    include '../connectivity/connection.php';
    include 'module_add.php';
  
  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../log_in.php');
       }
  else
    {
 
     try{
              $db=getDB();
                    $data[0]=$_POST['roll'];
                    $data[1]=$_POST['name'];
                    $data[2]=$_POST['batch'];
                    $data[3]=$_POST['plcd'];
                    $data[4]=$_POST['address'];
                    $data[5]=$_POST['email'];
                    $data[6]=$_POST['no']; 
                   
            
                    $query="INSERT INTO `alumini` VALUES(:id,:names,:btch,:plcd,:loc,:email,:num)";
                    
                    $add=Add_alumini($db,$data,$query);
                
                            
                        }
                        catch(exception $e)
                        {
                            $e->getmessage();
                        }
  
    
           }

    
        ?>  
   <?php

function Add_alumini($db,$input,$query)
{
        try{
                    $stmt =$db->prepare($query);
                    $stmt->bindParam(':id',$input[0], PDO::PARAM_STR);
                     $stmt->bindParam(':names',$input[1], PDO::PARAM_STR);
                    $stmt->bindParam(':btch',$input[2], PDO::PARAM_STR);
                    $stmt->bindParam(':plcd',$input[3], PDO::PARAM_STR);
                    $stmt->bindParam(':loc',$input[4], PDO::PARAM_STR);
                     $stmt->bindParam(':email',$input[5], PDO::PARAM_STR);
                    $stmt->bindParam(':num',$input[6], PDO::PARAM_STR);
                   
                   
                  
                    $stmt->execute();
                    $rows = $stmt->rowCount();

                  if($rows > 0){

                  header('location:alumini.php');
                             }
                            }
                            catch(exception $e)
                            {
                              echo $e->getmessage();
                            }
}
  

?>
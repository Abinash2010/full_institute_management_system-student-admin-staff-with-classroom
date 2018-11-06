<html>

<head>
    <title> CSE department </title>
    <link rel="stylesheet" type="text/css" href="../styles/global.css" />
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />

    <meta name="viewport" content="width=device-width, initial-scale:1.0, user-scalable=0" />


</head>

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

 $sem=$_GET['sub'];
   $type=$_GET['type'];
       
  $stmt1=$db->prepare("SELECT * FROM `subject` where `Subject_code`=:ids ");
                      $stmt1->bindParam(':ids',$sem,PDO::PARAM_STR);
                         $stmt1->execute();
                          $result2=$stmt1->fetch(PDO::FETCH_OBJ);
    
    
      
      $sql=$db->prepare("SELECT * FROM `result` where `Subject`=:idx and `id`=:i");
      $sql->bindParam(':idx',$sem,PDO::PARAM_STR);
       $sql->bindParam(':i',$type,PDO::PARAM_STR);
          $sql->execute();
          $result=$sql->fetchAll(PDO::FETCH_ASSOC);
      $sql->rowcount();
    
       

?>

    <body>


   <?php include 'header.php'; ?>

        <a class="mobile" href="#"> MENU </a>

 <div id="container">
  <div class="sidebar">
    <nav class="main-nav">
      <ul class="main-nav-ul">
        <li><a href="../student.php">DASHBOARD</a></li>
                        <li><a href="employee.php">EMPLOYEE</a></li>
                        <li><a href="students.php">STUDENT</a></li>
                        <li><a href="../staff_group/group.php">GROUP</a></li>
                        <li><a href="placement.php">PLACEMENT</a></li>
                        <li><a href="alumini.php">ALUMNI</a></li>
                        <li><a href="notification.php">NOTIFICATION</a></li>
                        <li><a href="attendence.php">ATTENDENCE</a></li>
                        <li><a href="exam.php">EXAM & RESULTS</a></li>
  </ul>
      </nav>
  </div>
    


  </div>




        <div class="content">




            <?php
                        $stmt=$db->prepare("SELECT * FROM `examtype` where `id`=:ida ");
                      $stmt->bindParam(':ida',$type,PDO::PARAM_STR);
                         $stmt->execute();
                          $result1=$stmt->fetch(PDO::FETCH_OBJ);

                      
                   
      ?>

                <div class="row" style="margin-top:100px;">
                    <?php echo $result2->Subject_Name.' '.$result1->Name; ?>
                    <table class="table ">
                        <tr>
                            <th>Roll No</th>
                            <th>Marks</th>
                        </tr>
                        <?php      foreach($result as $rows)
                               {
                                    echo '<tr><th>'.$rows['roll'].'</th>
                                    <th>'.$rows['marks'].'</th></tr>';
                               }

                        ?>
                    </table>

                </div>



        </div>







    </body>



</html>
<?php
  }
    ?>

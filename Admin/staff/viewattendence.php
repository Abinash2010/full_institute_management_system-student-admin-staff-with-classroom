<html>

<head>
    <title> CSE department </title>
    <link rel="stylesheet" type="text/css" href="../styles/global.css" />
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <script type="text/javascript" src="../scripts/jquery-3.2.1.js"></script>

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
      $sem=$_GET['attend'];
      
      $sql=$db->query("SELECT DISTINCT(dates) as dates,day FROM  `attendence` where `Subject_id`='$sem' ");
          $sql->execute();
          $result=$sql->fetchAll(PDO::FETCH_BOTH);
          $row=$sql->rowcount();
      
       $sql2=$db->query("SELECT DISTINCT(Roll_No) as Roll_No FROM  `attendence` where `Subject_id`='$sem' ");
          $sql2->execute();
          $result2=$sql2->fetchAll(PDO::FETCH_BOTH);
          $row3=$sql2->rowcount();
    
      
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


            <div class="row" style="margin-top:150px;">
                <div class="col-lg-12 col-sm-12 sol-md-12">
                    <table class="table">
                        <tr>
                            <th>Roll No</th>
                            <?php
                            
                        foreach($result as $rows)
                        {
                                
                                echo '<th>'.$rows['dates'].'<br/>'.$rows['day'].'</th>';
                            
                            
                        }
      echo '</tr><tr>';
                 foreach($result2 as $rows2)
                        {
                     echo '<td>'.$rows2['Roll_No'].'</td>';
                        foreach($result as $rows)
                        {
                            $stmt=$db->prepare('SELECT status FROM `attendence` where `Roll_No`=:id and `dates`=:dt ');
                            $stmt->bindParam(':id',$rows2['Roll_No']);
                             $stmt->bindParam(':dt',$rows['dates']);
                            $stmt->execute();
                            $result1=$stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result1 as $rows1)
                            {
                                echo '<td>'.$rows1['status'].'</td>';
                            }
                           
                            
                            
                        }
                     echo '</tr>';
                 }
      
      
      
      

                            ?>

                </div>
            </div>

        </div>





    </body>

</html>

<?php
  }
    ?>

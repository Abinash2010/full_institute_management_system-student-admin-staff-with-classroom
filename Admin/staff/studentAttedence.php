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
      $sem=$_GET['sem'];
      
      $sql=$db->query("SELECT * FROM `subject` where `Class_code`='$sem'");
          $sql->execute();
          $result=$sql->fetchAll(PDO::FETCH_ASSOC);
            $row=$sql->rowcount();
      
    ?>
    <body>


<?php include 'header.php'; ?>


        <a class="mobile" href="#"> MENU </a>

          <div id="container">
            <div class="sidebar">
                <nav class="main-nav">
                    <ul class="main-nav-ul">
                        <li><a href="../staff.php">DASHBOARD</a></li>
                        <li><a href="employee.php">EMPLOYEE</a></li>
                        <li><a href="students.php">STUDENT</a></li>
                        <li><a href="group.php">GROUP</a></li>
                        <li><a href="placement.php">PLACEMENT</a></li>
                        <li><a href="alumini.php">ALUMNI</a></li>
                        <li><a href="notification.php">NOTIFICATION</a></li>
                        <li><a href="attendence.php">ATTENDENCE</a></li>
                    </ul>
                </nav>

            </div>


        </div>



        <div class="content">

                <div class="row" style="margin-top:150px;">
                    
                <?php
                    foreach($result as $row)
                    {
                       echo '<a href="viewattendence.php?attend='.$row['Subject_code'].'"><div class="col-lg-3 col-lg-offset-1 boxs" style="background-color:#E1BEE7;"><centre><h2>'.$row['Subject_code'].'</h2><h4>'.$row['Subject_Name'].'</h4></centre></div></a>';
                    }
      ?>
            </div>

            </div>





    </body>

</html>

<?php
  }
    ?>

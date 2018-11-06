<html>

<head>
    <title> CSE department </title>
    <link rel="stylesheet" type="text/css" href="styles/global.css" />
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
 <link rel="stylesheet" href="../styles/calendarview.css">
    <meta name="viewport" content="width=device-width, initial-scale:1.0, user-scalable=0" />


</head>

<?php
    session_start();
    include 'connectivity/connection.php';
   

 $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../log_in.php');
       }
  else
    {
     
$db=getDB();
$stmt=$db->prepare("SELECT * FROM `staff` ");

$stmt->execute();
$countf=$stmt->rowCount();

$stmt1=$db->prepare("SELECT * FROM `student` ");

$stmt1->execute();
$countl=$stmt1->rowCount();
      
      $stmt2=$db->prepare("SELECT * FROM `placement` ");

$stmt2->execute();
$countp=$stmt2->rowCount();
      
      $stmt3=$db->prepare("SELECT * FROM `group` ");

$stmt3->execute();
$count1=$stmt3->rowCount();

$stmt4=$db->prepare("SELECT * FROM `alumini` ");

$stmt4->execute();
$count2=$stmt4->rowCount();
      
      $stmt5=$db->prepare("SELECT * FROM `notification` ");

$stmt5->execute();
$count3=$stmt5->rowCount();


?>

    <body>


        <header>

            <nav>
                <div>
                    <div style="float:left;">
                        <img class="img" src="images/logo.png">
                        <h1 class="h1_img">Computer Science & Engineering<br/>DUIET</h1>
                    </div>
                    <div style="float:right;padding-right:40px;margin-top:-70px;">
                        <div class="dropdowns">
                            <img style="height:50px;width:60px;" class="drop" src="images/profile.gif" /><br/><br/>
                            <div class="dropdown-contents">
                                <?php echo  '<a href="viewadmin.php"><h4>'.'Profile'.'</h4></a>'; ?>
                                <?php echo  '<a href="editadmin.php"><h4>'.'Edit'.'</h4></a>'; ?>
                                <a href="logout.php">
                                    <h4>Log out</h4>
                                </a>
                            </div>
                        </div>



                    </div>
                </div>

            </nav>
        </header>


        <a class="mobile" href="#"> MENU </a>

        <div id="container">
            <div class="sidebar">
                <nav class="main-nav">
                    <ul class="main-nav-ul">
                        <li><a href="index.php">DASHBOARD</a></li>
                        <li><a href="employee/employee.php">EMPLOYEE</a></li>
                        <li><a href="student/students.php">STUDENT</a></li>
                        <li><a href="group/group.php">GROUP</a></li>
                        <li><a href="placement/placement.php">PLACEMENT</a></li>
                        <li><a href="alumini/alumini.php">ALUMNI</a></li>
                        <li><a href="notification/notification.php">NOTIFICATION</a></li>
                     <li><a href="attendence/attendence.php">ATTENDENCE</a></li>
                        <li><a href="exam/exam.php">EXAM RESULTS</a></li>
                        
                    </ul>
                </nav>
            </div>



        </div>



        <div class="content">




            <div class="row" style="margin-top: 150px;">
                <div class=" col-lg-4">
                    <a href="student/students.php">
                        <div class="boxs" style="background-color:#F06292;">
                            <div class="leftb">
                                <h3>Total<br/>Students:
                                    <?php echo $countl; ?>
                                </h3>
                            </div>
                           
                        </div>
                    </a><br/>

                </div>
                <div class=" col-lg-4">
                    <a href="employee/employee.php">
                        <div class="boxs" style="background-color:#29B6F6;">
                            <div class="leftb">
                                <h3>Total<br/>Employees:
                                    <?php echo $countf; ?>
                                </h3>
                            </div>
                           
                        </div>
                    </a><br/>
                </div>
                <div class=" col-lg-4">
                    <a href="placement/placement.php">
                        <div class="boxs" style="background-color:#66BB6A;">
                            <div class="leftb">
                                <h3>Total<br/>Placements:
                                    <?php echo $countp; ?>
                                </h3>
                            </div>
                           
                        </div>
                    </a><br/>
                </div>

            </div>
            <br/>
            <div class="row">
             <div class=" col-lg-4">
                    <a href="group/group.php">
                        <div class="boxs" style="background-color:#F06292;">
                            <div class="leftb">
                                <h3>Total<br/>Groups:
                                    <?php echo $count1; ?>
                                </h3>
                            </div>
                            
                        </div>
                    </a><br/>

                </div>
                <div class=" col-lg-4">
                    <a href="alumini/alumini.php">
                        <div class="boxs" style="background-color:#29B6F6;">
                            <div class="leftb">
                                <h3>Total<br/>Aluminis:
                                    <?php echo $count2; ?>
                                </h3>
                            </div>
                           
                        </div>
                    </a><br/>
                </div>
                <div class=" col-lg-4">
                    <a href="notification/notification.php">
                        <div class="boxs" style="background-color:#66BB6A;">
                            <div class="leftb">
                                <h3>Total<br/>Notification:
                                    <?php echo $count3; ?>
                                </h3>
                            </div>
                            
                        </div>
                    </a><br/>
                </div>

            </div>
             <div class="row">
             <div class=" col-lg-4">
                    <a href="attendence/attendence.php">
                        <div class="boxs" style="background-color:#F06292;">
                            <div class="leftb">
                                <h3>Attendence
                                   
                                </h3>
                            </div>
                            
                        </div>
                    </a><br/>

                </div>
                <div class=" col-lg-4">
                    <a href="exam/exam.php">
                        <div class="boxs" style="background-color:#29B6F6;">
                            <div class="leftb">
                                <h3>Exams
                                   
                                </h3>
                            </div>
                           
                        </div>
                    </a><br/>
                </div>
</div>
        </div>
        


    </body>
             
   

</html>
<?php
  }
    ?>

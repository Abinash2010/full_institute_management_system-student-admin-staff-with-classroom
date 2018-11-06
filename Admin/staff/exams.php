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

$sem=$_GET['sem']

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

                        <div class=" col-lg-4">
                        <?php    echo '<a href="examsupload.php?sem='.$sem.'&type=1">'; ?>
                                <div class="boxs" style="background-color:#29B6F6;">
                                    <div class="leftb">
                                        <h3>First<br/>Insemester
                                        </h3>
                                    </div>
                                    <div class="rightb">
                                        <img class="imgb" src="../images/lab.gif">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-4">
                            <?php    echo '<a href="examsupload.php?sem='.$sem.'&type=2">'; ?>
                                <div class="boxs" style="background-color:#66BB6A;">
                                    <div class="leftb">
                                        <h3>Second<br/>Inemester
                                        </h3>
                                    </div>
                                    <div class="rightb">
                                        <img class="imgb" src="../images/lab.gif">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-4">
                        <?php    echo '<a href="examsupload.php?sem='.$sem.'&type=3">'; ?>
                                <div class="boxs" style="background-color:#F06292;">
                                    <div class="leftb">
                                        <h3>End<br/>Semester

                                        </h3>
                                    </div>
                                    <div class="rightb">
                                        <img class="imgb" src="../images/faculty.gif">
                                    </div>
                                </div>
                            </a>

                        </div>

                    </div>
               
          
                        
            </div>
      


     



    </body>
             
   

</html>
<?php
  }
    ?>

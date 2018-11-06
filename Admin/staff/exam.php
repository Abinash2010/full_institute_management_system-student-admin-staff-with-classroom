<html>

<head>
    <title> CSE department </title>
    <link rel="stylesheet" type="text/css" href="../styles/global.css" />
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
 <link rel="stylesheet" href="../styles/calendarview.css">
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
      if(($date>=8) && ($date<=1))
      {
          ?>


                    <div class="row" style="margin-top:150px;">

                        <div class=" col-lg-4">
                            <a href="exams.php?sem='3rd'">
                                <div class="boxs" style="background-color:#29B6F6;">
                                    <div class="leftb">
                                        <h3>Third<br/>Semester
                                        </h3>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-4">
                            <a href="exam.php?sem='5th'">
                                <div class="boxs" style="background-color:#66BB6A;">
                                    <div class="leftb">
                                        <h3>Fifth<br/>Semester
                                        </h3>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-4">
                            <a href="exam.php?sem='7th'">
                                <div class="boxs" style="background-color:#F06292;">
                                    <div class="leftb">
                                        <h3>Seventh<br/>Semester

                                        </h3>
                                    </div>
                                    
                                </div>
                            </a>

                        </div>

                    </div>
                    <?php
      }
      else
      {
          ?>
                        <div class="row"  style="margin-top:150px;">
                            <div class=" col-lg-4">
                                <a href="exams.php?sem=4th">
                                    <div class="boxs" style="background-color:#F06292;">
                                        <div class="leftb">
                                            <h3>Fourth<br/>Semester

                                            </h3>
                                        </div>
                                       
                                    </div>
                                </a>

                            </div>
                            <div class=" col-lg-4">
                                <a href="exams.php?sem=6th">
                                    <div class="boxs" style="background-color:#29B6F6;">
                                        <div class="leftb">
                                            <h3>Sixth<br/>Semester
                                            </h3>
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                            <div class=" col-lg-4">
                                <a href="exams.php?sem=8th">
                                    <div class="boxs" style="background-color:#66BB6A;">
                                        <div class="leftb">
                                            <h3>Eight<br/>Semester
                                            </h3>
                                        </div>
                                       
                                    </div>
                                </a>
                            </div>

                        </div>
            </div>
            <?php
      }
      ?>



        </div>



    </body>
             
   

</html>
<?php
  }
    ?>

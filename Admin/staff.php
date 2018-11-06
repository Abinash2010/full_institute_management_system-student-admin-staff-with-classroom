<html>

<head>
    <title> CSE department </title>
    <link rel="stylesheet" type="text/css" href="styles/global.css" />
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
    <meta name="viewport" content="width=device-width, initial-scale:1.0, user-scalable=0" />
</head>

   <?php
    session_start();
    include 'connectivity/connection.php';
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:log_in.php');
       }
  else
    {
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
                 <img style="height:50px;width:60px;"    class="drop" src="images/profile.gif" /><br/><br/>
                  <div class="dropdown-contents">
                    
                                <a href="logout.php"><h4>Log out</h4></a>
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
                        <li><a href="staff.php">DASHBOARD</a></li>
                        <li><a href="staff/employee.php">EMPLOYEE</a></li>
                        <li><a href="staff/students.php">STUDENT</a></li>
                        <li><a href="staff_group/group.php">GROUP</a></li>
                        <li><a href="staff/placement.php">PLACEMENT</a></li>
                        <li><a href="staff/alumini.php">ALUMNI</a></li>
                        <li><a href="staff/notification.php">NOTIFICATION</a></li>
                         <li><a href="staff/attendence.php">ATTENDENCE</a></li>
                        <li><a href="staff/exam.php">EXAM & RESULTS</a></li>
                    </ul>
                </nav>
            </div>
            

        </div>



               <div class="content">




            <div class="row" style="margin-top: 150px;">
                <div class=" col-lg-4">
                    <a href="staff/students.php">
                        <div class="boxs" style="background-color:#F06292;">
                            <div class="leftb">
                                <h3>Students:

                                </h3>
                            </div>
                           
                        </div>
                    </a>

                </div>
                <div class=" col-lg-4">
                    <a href="staff/employee.php">
                        <div class="boxs" style="background-color:#29B6F6;">
                            <div class="leftb">
                                <h3>Employees:
                                   
                                </h3>
                            </div>
                           
                        </div>
                    </a>
                </div>
                <div class=" col-lg-4">
                    <a href="staff/placement.php">
                        <div class="boxs" style="background-color:#66BB6A;">
                            <div class="leftb">
                                <h3>Placements:
                                   
                                </h3>
                            </div>
                           
                        </div>
                    </a>
                </div>

            </div>
            <br/>
            <div class="row">
             <div class=" col-lg-4">
                    <a href="staff_group/group.php">
                        <div class="boxs" style="background-color:#F06292;">
                            <div class="leftb">
                                <h3>TGroups:
                                    
                                </h3>
                            </div>
                            
                        </div>
                    </a>

                </div>
                <div class=" col-lg-4">
                    <a href="staff/alumini.php">
                        <div class="boxs" style="background-color:#29B6F6;">
                            <div class="leftb">
                                <h3>Aluminis:
                                    
                                </h3>
                            </div>
                           
                        </div>
                    </a>
                </div>
                <div class=" col-lg-4">
                    <a href="staff/notification.php">
                        <div class="boxs" style="background-color:#66BB6A;">
                            <div class="leftb">
                                <h3>Notification:
                                   
                                </h3>
                            </div>
                            
                        </div>
                    </a>
                </div>

            </div>
            <br/>
              <div class="row">
             <div class=" col-lg-4">
                    <a href="staff/attendence.php">
                        <div class="boxs" style="background-color:#F06292;">
                            <div class="leftb">
                                <h3>Attendence
                                   
                                </h3>
                            </div>
                            
                        </div>
                    </a><br/>

                </div>
                <div class=" col-lg-4">
                    <a href="staff/exam.php">
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

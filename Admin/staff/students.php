<html>

<head>
    <title> CSE department </title>
    <link rel="stylesheet" type="text/css" href="../styles/global.css" />
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <link rel="stylesheet" href="../styles/calendarview.css">
    <meta name="viewport" content="width=device-width, initial-scale:1.0, user-scalable=0" />
    <script src="jscripts/prototype.js"></script>
    <script src="scripts/calendarview.js"></script>
    <style>
        body {
            font-family: Trebuchet MS;
        }

        div.calendar {
            max-width: 240px;
            margin-left: auto;
            margin-right: auto;
        }

        div.calendar table {
            width: 100%;
        }

        div.dateField {
            width: 140px;
            padding: 6px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            color: #555;
            background-color: white;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        div#popupDateField:hover {
            background-color: #cde;
            cursor: pointer;
        }

    </style>

</head>

<?php
    session_start();
    include '../connectivity/connection.php';
   

 $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../log_in.php');
       }
  else
    {
     $date=date("m");
           $db=getDB();
$stmt=$db->prepare("SELECT * FROM `class`");
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
$row=$stmt->rowCount();



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
            <div style="margin-top: 150px;">
             

                <?php
      if(($date>=8) && ($date<=1))
      {
          ?>


                    <div class="row">

                        <div class=" col-lg-4">
                            <a href="student.php?sem='3rd'">
                                <div class="boxs" style="background-color:#29B6F6;">
                                    <div class="leftb">
                                        <h3>Third<br/>Semester:
                                        </h3>
                                    </div>
                                    <div class="rightb">
                                        <img class="imgb" src="../images/lab.gif">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-4">
                            <a href="student.php?sem='5th'">
                                <div class="boxs" style="background-color:#66BB6A;">
                                    <div class="leftb">
                                        <h3>Fifth<br/>Semester:
                                        </h3>
                                    </div>
                                    <div class="rightb">
                                        <img class="imgb" src="../images/lab.gif">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-4">
                            <a href="student.php?sem='7th'">
                                <div class="boxs" style="background-color:#F06292;">
                                    <div class="leftb">
                                        <h3>Seventh<br/>Semester:

                                        </h3>
                                    </div>
                                    <div class="rightb">
                                        <img class="imgb" src="../images/faculty.gif">
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
                        <div class="row">
                            <div class=" col-lg-4">
                                <a href="student.php?sem=4th">
                                    <div class="boxs" style="background-color:#F06292;">
                                        <div class="leftb">
                                            <h3>Fourth<br/>Semester:

                                            </h3>
                                        </div>
                                        <div class="rightb">
                                            <img class="imgb" src="../images/faculty.gif">
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class=" col-lg-4">
                                <a href="student.php?sem=6th">
                                    <div class="boxs" style="background-color:#29B6F6;">
                                        <div class="leftb">
                                            <h3>Sixth<br/>Semester:
                                            </h3>
                                        </div>
                                        <div class="rightb">
                                            <img class="imgb" src="../images/lab.gif">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class=" col-lg-4">
                                <a href="student.php?sem=8th">
                                    <div class="boxs" style="background-color:#66BB6A;">
                                        <div class="leftb">
                                            <h3>Eight<br/>Semester:
                                            </h3>
                                        </div>
                                        <div class="rightb">
                                            <img class="imgb" src="../images/lab.gif">
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

        <script>
            < /body>



            <
            /html>
            <?php
  }
    ?>

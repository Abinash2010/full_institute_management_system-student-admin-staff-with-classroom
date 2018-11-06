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
    
$faculty=1;
$lab=0;
$db=getDB();
$stmt=$db->prepare("SELECT * FROM `staff` where `role`=:role");
$stmt->bindParam('role',$faculty,PDO::PARAM_STR);
$stmt->execute();
$countf=$stmt->rowCount();

$stmt1=$db->prepare("SELECT * FROM `staff` where `role`=:rol");
$stmt1->bindParam('rol',$lab,PDO::PARAM_STR);
$stmt1->execute();
$countl=$stmt1->rowCount();


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
            <h2 style="padding-top: 80px;">Employees Of The Department</h2>

            <div class="row" style="margin-top: 100px;">
                <div class="col-lg-offset-1 col-lg-4">
                    <a style="color: black;" href="faculty.php">
                        <div class="boxs" style="background-color:#F06292;">
                            <div class="leftb">
                                <h3>Faculties:
                                    <?php echo $countf; ?>
                                </h3>
                            </div>
                            <div class="rightb">
                                <img class="imgb" src="../images/faculty.gif">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-offset-1 col-lg-4">
                    <a style="color: black;" href="lab.php">
                        <div class="boxs" style="background-color:#F06292;">
                            <div class="leftb">
                                <h3>Lab <br/> Instructor:
                                    <?php echo $countl; ?>
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



 <script>
          function myFunction() {
              var x=document.getElementById('myDropdown');
   if(x.style.display="none")
       {
           x.style.display="block";
       }
               else{
                    x.style.display="none";
               }
}
        </script>
    </body>

</html>
<?php
  }
    ?>

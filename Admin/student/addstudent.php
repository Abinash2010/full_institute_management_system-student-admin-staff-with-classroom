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
$stmt=$db->prepare("SELECT * FROM `class`");
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
$row=$stmt->rowCount();

?>

    <body onload="load()">


       
   <header>

            <nav>
                <div>
                    <div style="float:left;">
                        <img class="img" src="images/logo.png">
                        <h1 class="h1_img">Computer Science & Engineering<br/>DUIET</h1>
                    </div>
                    <div style="float:right;padding-right:40px;margin-top:-70px;">
                           <div class="dropdowns">
                 <img style="height:50px;width:60px;"    class="drop" src="../images/profile.gif" /><br/><br/>
                  <div class="dropdown-contents">
                     <?php echo  '<a href="../viewadmin.php"><h4>'.'Profile'.'</h4></a>'; ?>
                                 <?php echo  '<a href="../editadmin.php"><h4>'.'Edit'.'</h4></a>'; ?>
                                <a href="../logout.php"><h4>Log out</h4></a>
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
                        <li><a href="../index.php">DASHBOARD</a></li>
                        <li><a href="../employee/employee.php">EMPLOYEE</a></li>
                        <li><a href="students.php">STUDENT</a></li>
                        <li><a href="../group/group.php">GROUP</a></li>
                        <li><a href="../placement/placement.php">PLACEMENT</a></li>
                        <li><a href="../alumini/alumini.php">ALUMNI</a></li>
                        <li><a href="../notification/notification.php">NOTIFICATION</a></li>
                        <li><a href="../attendence/attendence.php">ATTENDENCE</a></li>
                        <li><a href="../exam/exam.php">EXAM & RESULTS</a></li>
                    </ul>

            </div>


        </div>



        <div class="content">

            <div style="margin-top: 100px;">
                <h2>Add Students</h2>
                <?php echo '<form action="addstudentprf.php" method="POST"  enctype="multipart/form-data">'; ?>
                <table class="table table-bordered">
                    <div class="form-group">
                        <tr>
                            <td>
                                <label for="exampleFormControlInput1">First Name
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="fname" value="abinash"></label><br/>
                                
                            </td>
                            <td>
                                <label for="exampleFormControlInput1">Middle Name
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="mname" ></label><br/>
                            </td>
                            <td>
                                <label width=f or="exampleFormControlInput1">Last Name
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="lname" value="deka" ></label><br/>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label for="exampleFormControlInput1">Email
                                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="abinash@gmail.com"></label><br/>

                            </td>
                            <td>
                                <label for="exampleFormControlInput1">Contact Number
                                <input type="number" class="form-control" id="exampleFormControlInput1" name="no" value="1234567890"></label><br/>
                            </td>
                            <td>
                                <label for="exampleFormControlInput1">Address
                                <textarea class="form-control"  id="exampleFormControlInput1" name="addres" value="rdhcks"></textarea></label><br/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="exampleFormControlInput1">Admission Date
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="adate" value="20/10/2011"></label><br/>
                            </td>
                            
                            <td>
                            <label for="exampleFormControlInput1">Roll No:
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="roll" value="cse-02/15"></label><br/>
                            </td>
                             <td>
                                <label for="exampleFormControlInput1">Date of Birth
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="dob" value="20/10/2011"></label><br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Semester:
        <select class="form-control"  name="sem" value="">
          <option value=" ">Select One</option>
                   <?php

                foreach($result as $row)
              {
              echo '<option value='.$row['Class_code'].'>'.$row['Class_Name'].'</option> ';
              $result++;
           }
           ?>
            </select></label><br/>
                                </td>
                           
                               
                                <td>
                                    <input type="submit" class="btn btn-primary" name="submit" value="ADD">
                                </td>
                        </tr>


                    </div>
                </table>
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

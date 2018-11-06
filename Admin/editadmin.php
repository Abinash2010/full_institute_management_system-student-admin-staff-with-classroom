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
              header('location:../log_in.php');
       }
  else
    {
  

    


     $db=getDB();
    $stmt = $db->prepare("SELECT * FROM `admin` WHERE  Admin_id=:staff "); 
      $stmt->bindParam(":staff",$temp,PDO::PARAM_STR);
      $stmt->execute();
            $stmt->bindColumn(1, $file, PDO::PARAM_LOB);
            $data=$stmt->fetch(PDO::FETCH_OBJ); 
        


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

            </nav>
        </header>

        <a class="mobile" href="#"> MENU </a>

        <div id="container">
            <div class="sidebar">
                <nav class="main-nav">
                    <ul class="main-nav-ul">
                        <li><a href="index.php">DASHBOARD</a></li>
                        <li><a href="employee/employee.php">EMPLOYEE</a></li>
                        <li><a href=".student/students.php">STUDENT</a></li>
                        <li><a href="group/group.php">GROUP</a></li>
                        <li><a href="placement/placement.php">PLACEMENT</a></li>
                        <li><a href="alumini/alumini.php">ALUMNI</a></li>
                        <li><a href="notification/notification.php">NOTIFICATION</a></li>
                         <li><a href="attendence/attendence.php">ATTENDENCE</a></li
                        <li>< a href="exam/exam.php">EXAM & RESULTS</a></li>
                    </ul>

            </div>


        </div>




        <div class="content" style="padding-top: 80px;">
            <form action="editprofile.php" method="post" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <h2>
                            <?php  echo $data->F_name.' ';
                                            echo $data->M_name.' ';
                                            echo $data->L_name; ?> Profile</h2>
                    </tr>

                    <tr>
                        <td>
                            <label> First Name:</label>
                            <?php echo '<input type="text" class="form-control"  value="'.$data->F_name.'"  name="fname">'; ?>

                        </td>

                        <td>
                            <label> Middle Name:</label>
                            <?php echo '<input type="text" class="form-control" value="'.$data->M_name.'"  name="mname"/>';?>

                        </td>
                        <td>
                            <label> Last Name:</label>
                            <?php echo '<input type="text" class="form-control" value="'.$data->L_name.'" name="lname"/>'; ?>

                        </td>
                    </tr>
                    <tr>


                        <td>
                            <label>Email:</label>
                            <?php echo '<input type="text" class="form-control" value="'. $data->Email.'" name="email"/>'; ?>
                        </td>


                        <td>
                            <label>Password:</label>
                            <?php echo '<input type="text" class="form-control" value="'.$data->Password.'" name="pass"/> ';?>
                        </td>
                        <td>
                            <label>Admin ID:</label>
                            <?php echo '<h1 name="id">'. $data->Admin_id.'</h1>';
                                     ?>

                        </td>
                    </tr>
                    <tr>

                        <td>
                            <button class="btn btn-primary" name="submit">Edit</button>
                        </td>
                    </tr>

                </table>
            </form>


        </div>


        <script>


        </script>


    </body>

</html>
<?php
  }
    ?>

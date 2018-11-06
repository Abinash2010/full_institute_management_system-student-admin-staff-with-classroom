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
    $stmt = $db->prepare("SELECT * FROM `admin` WHERE Admin_id=:staff "); 
      $stmt->bindParam(":staff",$temp,PDO::PARAM_STR);
      $stmt->execute();
          
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
                 <img style="height:50px;width:60px;"    class="drop" src="images/profile.gif" /><br/><br/>
                  <div class="dropdown-contents">
                     <?php echo  '<a href="viewadmin.php"><h4>'.'Profile'.'</h4></a>'; ?>
                                 <?php echo  '<a href="editadmin.php"><h4>'.'Edit'.'</h4></a>'; ?>
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
   <div style="margin-top: 150px;">
<table  class="table table-bordered">
        <tr><h2><?php  echo  $data->F_name.' ';
                                            echo $data->M_name.' ';
                                            echo $data->L_name; ?> Profile</h2></tr>
        <tr>
            
            <td>
                 <label>First Name:</label><?php echo  $data->F_name.' ';
                                          
                                     ?>
            </td>
            <td>
                 <label>Middle Name:</label><?php 
                                            echo $data->M_name.' ';
                                           
                                     ?>
            </td>
            <td>
                 <label>Last Name:</label><?php 
                                            echo $data->L_name;
                                     ?>
            </td>
           
        </tr>
         <tr>
           
            <td>
                  <label>Email:</label>
                  <?php echo $data->Email.' ';
                                    ?>
            </td>
            
       
          
            <td>
           <label>Password:</label><?php echo $data->Password.' ';
                                    ?>
            </td>
            <td>
              <label>Admin ID:</label><?php echo $data->Admin_id.' ';
                                     ?>
           
            </td>
        </tr>

    </table>
  </div>
    </div>
  


       <script>
       

        </script>
</body>
</html>
    <?php
  }
    ?>

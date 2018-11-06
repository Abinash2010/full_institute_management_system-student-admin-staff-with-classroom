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
  $role=$_GET['add'];

$db=getDB();
$stmt=$db->prepare("SELECT * FROM staff ,staff_login where staff.role=1 and staff.Staff_id=staff_login.Staff_id ");

$stmt->execute();
$countf=$stmt->rowCount();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<body>

      <header>

            <nav>
                <div>
                    <div style="float:left;">
                        <img class="img" src="../images/logo.png">
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
        <li><a href="../student.php">DASHBOARD</a></li>
                        <li><a href="employee/employee.php">EMPLOYEE</a></li>
                        <li><a href="../student/students.php">STUDENT</a></li>
                        <li><a href="../group/group.php">GROUP</a></li>
                        <li><a href="../placement/placement.php">PLACEMENT</a></li>
                        <li><a href="../alumini/alumini.php">ALUMNI</a></li>
                        <li><a href="../notification/notification.php">NOTIFICATION</a></li>
                        <li><a href="../attendence/attendence.php">ATTENDENCE</a></li>
                        <li><a href="../exam/exam.php">EXAM & RESULTS</a></li>
  </ul>
      </nav>
  </div>
    


  </div>


	
	<div class="content">
		<div style="float: left;padding-top: 80px;">
		<h2 >Faculties Of The Department
		</h2>
		</div>
		<div style="float:right;width:40%;padding-top: 80px;">
                    <div style="float:left;">

                         <?php 
          echo '<form action="xslx.php?add=$role" method="post" enctype="multipart/form-data">'; ?>
                            <div class="form-inline">
                            <input type="file"class="form-control" name="file" />
                                </div><div class="form-inline">
                            <input type="submit" class="btn btn-primary" name="submit" />
                            </div>
                        </form>
                    </div>
                    <div style="float:right;">  <?php 
          echo '<a href="addemployee.php?add='.$role.'" >'.'<img style="height:40px;width=40px;" src="../images/profile.png "/>'.'</a>';
                        ?></div></div>
		<table class="table table-bordered">
    
      <tr>
        <th>Name</th>
        <th>Designation</th>
        <th>Email</th>
        <th>Password</th>
        <th>Contact </br>Number</th>
        <th>Join Date</th>
        <th>Address</th>
        <th>Others</th>
       
        
      </tr>
    <?php   foreach( $result as $row )
            {
           echo '<tr  ><td>'.$row['F_name'].' '.$row['M_name'].' '.$row['L_name'].'</td>
                    <td>'.$row['Dejignation'].'</td>
                    <td>'.$row['Email'].'</td>
                     <td>'.$row['Password'].'</td>
                    <td>'.$row['Contact_no'].'</td>
                    <td>'.$row['Join_date'].'</td>
                    <td>'.$row['Address'].'</td>
                    <td><a href="viewemployee.php?staff_id='.$row['Staff_id'].'&add='.$role.'" class="btn btn-primary" >'.'View'.'</a>
                    <a href="editemployee.php?staff_id='.$row['Staff_id'].'&add='.$role.'" class="btn btn-primary" >'.'Edit'.'</a>
                    <a href="deleteemployee.php?staff_id='.$row['Staff_id'].'&add='.$role.'" class="btn btn-danger" >'.'Delete'.'</a></td>
                      
                   </tr>';
           
         
            }
            ?>


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

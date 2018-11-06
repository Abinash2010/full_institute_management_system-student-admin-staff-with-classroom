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
$stmt=$db->prepare("SELECT * FROM staff ,staff_login where staff.role=1 and staff.Staff_id=staff_login.Staff_id ");

$stmt->execute();
$countf=$stmt->rowCount();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<body>


          <?php  include 'header.php'; ?>

	<a class="mobile" href="#"> MENU </a>

<div id="container">
  <div class="sidebar">
    <nav class="main-nav">
      <ul class="main-nav-ul">
                  <li><a href="../student.php">DASHBOARD</a></li>
                        <li><a href="employee.php">EMPLOYEE</a></li>
                        <li><a href="students.php">STUDENT</a></li>
                        <li><a href="../std_group/group.php">GROUP</a></li>
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
		<div style="float: left;padding-top: 80px;">
		<h2 >Faculties Of The Department
		</h2>
		</div>
		
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
                    <td><a href="viewemployee.php?staff_id='.$row['Staff_id'].'" class="btn btn-primary" >'.'View'.'</a>
                      
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

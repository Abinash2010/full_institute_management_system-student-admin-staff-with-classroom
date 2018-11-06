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
$cls=$_GET['sem'];


?>
<body onload="load()">


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
		
	<div style="margin-top: 70px;">
	 <div style="float:left"><h2 >Students Of the <?php echo $cls;?> Semester</h2></div>
           
          </div>
                <table class="table table-bordered">
                    
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>D.O.B</th>
                        <th>Email</th>
                        
                        <th>Address</th>
                        <th>Contact<br/>Number</th>
                        <th>Admission Date</th>
                        <th>Semester</th>
                       
                    
                        
                    </tr>
                    <?php
                        
                        $db=getDB();
                      
                            $sql = $db->prepare("SELECT * FROM `student`join `student_login` join `class` on 
                            student.Student_id=student_login.Student_id and student.Class_code=class.Class_code and class.Class_Name=:cls");
                            $sql->bindParam(':cls',$cls,PDO::PARAM_STR);
                            $sql->execute();
                            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                            
                        foreach($result as $row){
                        echo '<tr><td>'.$row['Student_id'].'</td>
                                    <td>'.$row['F_name'].' '.$row['M_name'].' '.$row['L_name'].'</td>
                                    <td>'.$row['d_O_b'].'</td>
                                    <td>'.$row['Email'].'</td>
                                    
                                    <td>'.$row['Address'].'</td>
                                    <td>'.$row['Contact_no'].'</td>
                                    <td>'.$row['Admission_date'].'</td>
                                    <td>'.$row['Class_Name'].'</td>
                                    
                                </tr>';
                            
                        }
                        
                            
                            
                        
                       
                            ?>
                
                <table>	
	</div>
	
		 <script>
            function myFunction() {
              var x=document.getElementById('myDropdown');
   x.style.display="block";
}
        </script>


</body>
</html>
<?php
  }
    ?>
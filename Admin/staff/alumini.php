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
		<div style="margin-top: 70px;">
		<div style="float:left"><h2 >Aluminie List</h2></div>
        
          </div>
          
  <table class="table table-bordered">
    
      <tr>
        <th>Name</th>
        <th>Batch</th>
         <th>Email</th>
        <th>Contact </br>Number</th>
        <th>Placed in</th>
         <th>Location</th>
       
       
        
      </tr>
       <?php
        
          $db=getDB();
          try{
            $sql = $db->prepare("SELECT * FROM `alumini`");
            $sql->execute();
          
            
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            
           foreach( $result as $row )
            {
           echo '<tr  ><td>'.$row['Student_name'].'</td>
                    <td>'.$row['Batch'].'</td>
                    <td>'.$row['Email'].'</td>
                     <td>'.$row['Contact_no'].'</td>
                    <td>'.$row['Placement'].'</td>
                    <td>'.$row['Location'].'</td>
                   
                   </tr>';
           
         
            }
          }
          catch(exception $e)
          {
            echo $e->getmessage();
          }
            ?>
  
    <table>
		
		


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
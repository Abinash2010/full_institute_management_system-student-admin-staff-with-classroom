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
    
    $get=$_GET['staff_id'];
    $db=getDB();
    $stmt = $db->prepare("SELECT * FROM `staff`,`staff_login` WHERE  staff.Staff_id=:staff and staff_login.Staff_id=:staff"); 
      $stmt->bindParam(":staff",$get,PDO::PARAM_STR);
      $stmt->execute();
          
            $data=$stmt->fetch(PDO::FETCH_OBJ); 
        
            
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
   <div style="margin-top: 150px;">
<table  class="table table-bordered">
        <tr><h2><?php  echo  $data->F_name.' ';
                                            echo $data->M_name.' ';
                                            echo $data->L_name; ?> Profile</h2></tr>
        <tr>
            <td> 
             <?php  echo '<img style="width: 150px;height:150px; " src="../upload_assets/img_employee/'.$data->Image.'"/>' ;?> 
            </td>
            <td>
                 <label>Name:</label><?php echo  $data->F_name.' ';
                                            echo $data->M_name.' ';
                                            echo $data->L_name;
                                     ?>
            </td>
            <td>
                     <label>Designation:</label>
                     <?php echo $data->Dejignation.' '; ?>
                                    
           
            </td>
        </tr>
         <tr>
            <td>
                <label>Email:</label>
                    <?php echo $data->Contact_no.' ';
                                        ?>
             </td>

            <td>
                  <label>Email:</label>
                  <?php echo $data->Email.' ';
                                    ?>
            </td>
            <td>
                  <label>Join Date:</label>
                  <?php echo $data->Join_date.' ';
                                     ?>
           
            </td>
        </tr>
        <tr>
          <td>
              <label>Address:</label><?php echo $data->Address.' ';
                                    ?>
            </td>
            <td>
           <label>Password:</label><?php echo $data->Password.' ';
                                    ?>
            </td>
            <td>
              <label>Staff ID:</label><?php echo $data->Staff_id.' ';
                                     ?>
           
            </td>
        </tr>

    </table>
  </div>
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

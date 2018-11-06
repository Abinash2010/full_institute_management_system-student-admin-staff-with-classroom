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
        header('location:../log_in.php');
        }
    else
        {
             $get=$_GET['nid'];
    $db=getDB();
    $stmt = $db->prepare("SELECT * FROM `notification` WHERE  Noti_id=:noti"); 
			$stmt->bindParam(":noti",$get,PDO::PARAM_STR);
			$stmt->execute();
           
            $data=$stmt->fetch(PDO::FETCH_OBJ); 
        $row=$stmt->rowcount();
    
        ?>
<body>
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
          
        <table class="table" style="margin-top:100px;">
             <tr>
     <td><center><h3><?php echo $data->Title; ?></h3></center>
            </td></tr>
     <tr>
         <td>
         <center><h3><?php echo $data->Description; ?></h3></center>
         </td>
     </tr>
     <tr>
     <td>
         <center><h3><?php echo "<a href='../upload_assets/notify/".$data->Path."' download>"."Download the attached file"."</a>"; ?></h3></center>
         </td></tr>
     <tr>
     <td>
         <center><h3><?php echo $data->date; ?></h3></center>
         </td></tr>
        
        </table>



        

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

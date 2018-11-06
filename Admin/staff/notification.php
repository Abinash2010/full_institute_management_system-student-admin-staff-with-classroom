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
             $db=getDB();
                      
                            $sql = $db->prepare("SELECT * FROM `notification`");
                            $sql->execute();
                            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
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
            <div style="margin-top:90px;">
            <div style="float:left"><h2 >Notification's</h2></div>
            
            </div>
          <table class="table" >
                    
                    <tr>
                        <th>Notification</th>
                        <th>File</th>
                        <th>Date</th>
                        <th>View</th>
                       
                    
                        
                    </tr>
                  
              <?php
                     
                        foreach($result as $row){
                        echo '<tr><td>'.$row['Title'].'</td>
                                    <td><a href="../upload_assets/notify/'.$row['Path'].'" download>'.'Download file'.'</a></td>
                                    <td>'.$row['date'].'</td>
                                   
                                    <td><a href="viewnotification.php?nid='.$row['Noti_id'].'" class="btn btn-primary" >'.'View'.'</a>
                                    
                                    </td>
                                    
                                </tr>';
                            
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

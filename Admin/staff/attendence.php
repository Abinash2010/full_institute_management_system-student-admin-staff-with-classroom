<html>

<head>
    <title> CSE department </title>
    <link rel="stylesheet" type="text/css" href="../styles/global.css" />
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <script type="text/javascript" src="../scripts/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
    $("#sem").change( function (e) {

            var sel = document.getElementById("sem").value;
          
   
            $.ajax({
                type: "POST",
                url: "subject.php",
                data:{ class:sel },
                 success: function (data) {
                    var obj = $.parseJSON(data);
                var result = "";
                $.each( obj,function () {
                    result=result+'<option value=' + this["Subject_code"] +' >' + this["Subject_Name"] + '</option>';
                });
                  $("#sub").html(result);
               
                 }
              
            });
    });
           
        });

    </script>
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
      
      $date=Date("m");
      if(($date<8)&& ($date>1))
      {
      $sql=$db->query("SELECT * FROM `class` where `status`=1");
          $sql->execute();
          $result=$sql->fetchAll(PDO::FETCH_ASSOC);
      }  
      else
      {
      $sql=$db->query("SELECT * FROM `class` where `status`=0");
          $sql->execute();
          $result=$sql->fetchAll(PDO::FETCH_ASSOC);
      }
           $sql1=$db->query("SELECT * FROM `day`");
          $sql1->execute();
          $result1=$sql1->fetchAll(PDO::FETCH_ASSOC);
     
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
            <div style="margin-top: 160px;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="jumbotron" style="z-index:-2;">
                            <h3 style="padding-left:15px;">Upload Student Data Sheet</h3>
                            <form action="xslxa.php" method="post" class="form-horizontal" enctype="multipart/form-data">'
                                <div class="form-group" style="padding-left:20px;">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="file" class="form-control" name="file" />
                                        </div>
                                        <div class="col-lg-3">

                                            <select class="form-control"  id="sem" name="sem">
                                <option value="">Choose Semester</option>
                                 <?php
                                
                                    foreach($result as $row)
                                  {
                                  echo '<option  value='.$row['Class_code'].'>'.$row['Class_Name'].'</option> ';
                                  $result++;
                               }
                               ?>
                            </select>
                                        </div>
                                        <div class="col-lg-3">

                                            <select class="form-control" id="sub" name="sub">
                                <option value="">Choose Subject</option>
                                
                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="submit" class="btn btn-primary" name="submit" />
                                        </div>
                                           <div class="col-lg-3"><br/>
                                             <select class="form-control" id="day" name="day">
                                <option value="">Choose Day</option>
                                 <?php
                                
                                    foreach($result1 as $row1)
                                  {
                                  echo '<option  value='.$row1['ID'].'>'.$row1['Day'].'</option> ';
                                  $result++;
                               }
                               ?>
                            </select>
                                        </div>
                                    </div>




                            </form><br/>
                              <h3>View Attendence of the Students</h3> 
                                <?php
                                    if(($date<8) && ($date>1))
                                    {
                                        ?>
                                <div class="row">
                                    
                                    <div class="col-lg-offset-2 col-lg-3">
                                        <a href="studentAttedence.php?sem=CSE-04" class="btn btn-primary" ><h1>4</h1><h3>th</h3></a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="studentAttedence.php?sem=CSE-06" class="btn btn-primary" ><h1>6</h1><h3>th</h3></a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="studentAttedence.php?sem=CSE-08" class="btn btn-primary" ><h1>8</h1><h3>th</h3></a>
                                    </div>
                                </div>
                                <?php
                                    }else
                                    {
                                        ?>
                                  <div class="row">
                                    <div class="col-lg-3">
                                        <a href="studentAttedence.php?sem=CSE-03" class="buttons" style="{border-radius: 50%;}"><h1>3</h1>4d</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="studentAttedence.php?sem=CSE-05" class="buttons" style="{border-radius: 50%;}"><h1>5</h1>th</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="studentAttedence.php?sem=CSE-07" class="buttons" style="{border-radius: 50%;}"><h1>7</h1>th</a>
                                    </div>
                                </div>
                           <?php     }
                                ?>
                            </div>
                        </div>
                    </div>


                </div>


            </div>





    </body>

</html>

<?php
  }
    ?>

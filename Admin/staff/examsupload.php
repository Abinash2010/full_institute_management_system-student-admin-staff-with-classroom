<html>

<head>
    <title> CSE department </title>
    <link rel="stylesheet" type="text/css" href="../styles/global.css" />
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />

    <meta name="viewport" content="width=device-width, initial-scale:1.0, user-scalable=0" />
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

$type=$_GET['type'];
      $sem=$_GET['sem'];
      
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
       $qsl=$db->query("SELECT * FROM `class` where `Class_Name`='$sem'");
      $qsl->execute();
      $data=$qsl->fetch(PDO::FETCH_OBJ);
      
      $qsl1=$db->query("SELECT * FROM `subject` where `Class_code`='$data->Class_code'");
      $qsl1->execute();
      $data1=$qsl1->fetchAll(PDO::FETCH_ASSOC);
      

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






            <div class="row" style="margin-top:100px;">
                <div class="jumbotron" style="z-index:-2;">
                    <h3 style="padding-left:15px;">Upload Exam Marks  Sheet</h3>
                <?php  echo '<form action="xslx.php?type='.$sem.'" method="post" class="form-horizontal" enctype="multipart/form-data">'; ?>
                        <div class="form-group" style="padding-left:20px;">
                            <div class="row">
                                <div class="col-lg-3">
                                    <input type="file" class="form-control" name="file" />
                                </div>
                                <div class="col-lg-3">

                                    <select class="form-control" id="sem" name="sem">
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
                               
                            </div>


                        </div>

                    </form>
                <div class="row">
           <?php   foreach($data1 as $rows1)
                               {
                                   echo '<a href="viewmarks.php?sub='.$rows1['Subject_code'].'&type='.$type.'"><div class="col-sm-offset-1 col-sm-2 btn btn-primary">'.$rows1['Subject_code'].'</div></a>';
                               }
      ?>
                </div>

                </div>



            </div>







    </body>



</html>
<?php
  }
    ?>

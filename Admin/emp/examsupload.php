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

$sql=$db->query("SELECT * FROM `notification` order by  id DESC LIMIT 4");
$sql->execute();
$data=$sql->fetchAll(PDO::FETCH_ASSOC);

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
<!DOCTYPE html>
<head>
<title>CSE(DUIET)-ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="../css/bootstrap.min.css" >

<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/style-responsive.css" rel="stylesheet"/>


<link rel="stylesheet" href="../css/font.css" type="text/css"/>
<link href="../css/font-awesome" rel="stylesheet"> 
<link rel="stylesheet" href="../css/morris.css" type="text/css"/>

<link rel="stylesheet" href="../css/monthly.css">
<script src="../js/jquery2.0.3.min.js"></script>
<script src="../js/raphael-min.js"></script>
<script src="../js/morris.js"></script>
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

<body>
<section id="container">

<header class="header fixed-top clearfix">

<div class="brand">
    <a href="../index.php" class="logo">DUIET(CSE)
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
     
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning"></span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <?php
                foreach($data as $row)
                {

                   echo  '<li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href=".viewnotification.php?id='.$row['id'].'">'.$row['Title'].'</a>
                        </div>
                    </div>
                </li>';
            }
                ?>
               
                <li><a href=".notification.php">View All</a></li>

            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
    
        <li class="dropdown">
            <a data-toggle="dropdown" style="width: auto;" class="dropdown-toggle" href="#">
                
                <span class="username" > ADMIN</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="../viewprofile.php?id=$temp"><i class=" fa fa-suitcase"></i>Profile</a></li>
                
                <li><a href="../logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
       
       
    </ul>
   
</div>
</header>

<aside>

    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="../emp.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="employee.php">
                        <i class="fa "></i>
                        <span>EMPLOYEE's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="student.php">
                        <i class="fa "></i>
                        <span>STUDENT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="placement.php">
                        <i class="fa "></i>
                        <span>PLACEMENT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="alumini.php">
                        <i class="fa "></i>
                        <span>ALUMNI's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="attendence.php">
                        <i class="fa "></i>
                        <span>ATTENDENCE</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="exams.php">
                        <i class="fa "></i>
                        <span>EXAM &  <br/>RESULT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../staff_group/group.php">
                        <i class="fa "></i>
                        <span>GROUP's</span>
                    </a>
                </li>

               
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<section id="main-content">
    <section class="wrapper">
       <div class="row" >
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
                                   echo '<a href="viewmarks.php?sub='.$rows1['Subject_code'].'&type='.$type.'"><div class="col-md-offset-1 col-md-2 col-md-offset-1 col-sm-12 btn btn-primary">'.$rows1['Subject_code'].'</div></a>';
                               }
      ?>
                </div>

                </div>
            </div>
        

    </section>
</section>
</section>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/jquery.slimscroll.js"></script>
<script src="../js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="../js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->  

</body>
</html>
<?php
}
?>
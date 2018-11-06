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
$datas=$sql->fetchAll(PDO::FETCH_ASSOC);


    $get= $_GET['gp_id'];
 $std=$_GET['s_id'];
$aid=$_GET['a_id'];

  
    $stmt=$db->prepare("SELECT * FROM `group` WHERE `Group_id`=:get");
    $stmt->bindParam(':get',$get,PDO::PARAM_STR);
    $stmt->execute();
    $data=$stmt->fetch(PDO::FETCH_OBJ);
    $row=$stmt->rowCount();
   $cls=$data->Class;
    
    $stmt1=$db->prepare("SELECT * FROM `class` WHERE `Class_Name`=:cls");
    $stmt1->bindParam(':cls',$data->Class,PDO::PARAM_STR);
    $stmt1->execute();
    $data1=$stmt1->fetch(PDO::FETCH_OBJ);
      
    $stmt2=$db->prepare("SELECT * FROM `student` WHERE `Class_code`=:clss");
    $stmt2->bindParam(':clss',$data1->Class_code,PDO::PARAM_STR);
    $stmt2->execute();
    $data2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
    
 $submit=$db->prepare("SELECT * FROM `submition` WHERE `Assignment_id`=:aid and `Student_id`=:std");
    $submit->bindParam(':aid',$aid,PDO::PARAM_STR);
     $submit->bindParam(':std',$std,PDO::PARAM_STR);
    $submit->execute();
    $submited=$submit->fetch(PDO::FETCH_OBJ);
    $row1=$submit->rowCount();

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
 <style>
        .ul {
            list-style: none;

        }

        .li {
            display: inline-block;
            padding-left: 50px;


        }

        h3 a {
            color: black;
        }

        #side_bar {
            padding: 1em;

            background: white;
            float: right;
            width: 20%;


        }

        .contents1 {
            padding: 1em;

            background: #fff;
            width: 79%;
            float: left;


        }

        .body {
            margin-left: 21%;
            width: 77%;

        }

        .form_text {
            height: 50px;
            width: 50%;
            margin-left: 100px;
            margin-top: 10px;
        }

    </style>
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
                foreach($datas as $row)
                {

                   echo  '<li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="../emp/viewnotification.php?nid='.$row['Noti_id'].'">'.$row['Title'].'</a>
                        </div>
                    </div>
                </li>';
            }
                ?>
               
                <li><a href="../emp/notification.php">View All</a></li>

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
                    <a class="active" href="../emp/employee.php">
                        <i class="fa "></i>
                        <span>EMPLOYEE's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../emp/student.php">
                        <i class="fa "></i>
                        <span>STUDENT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../emp/placement.php">
                        <i class="fa "></i>
                        <span>PLACEMENT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../emp/alumini.php">
                        <i class="fa "></i>
                        <span>ALUMNI's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../emp/attendence.php">
                        <i class="fa "></i>
                        <span>ATTENDENCE</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../emp/exams.php">
                        <i class="fa "></i>
                        <span>EXAM &  <br/>RESULT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="group.php">
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
       <div>
               <ul class="ul" style="float:left;">
                    <li class="li">
                        <?php echo '<h2>'.$data->Name.'</h2>'; ?>
                    </li>
                    <li class="li">
                        <?php echo '<h2>'.$data->Class.'</h2>'; ?>
                    </li>

                    <li class="li">
                        <h4>
                            <?php echo '<a href="mygroup.php?gp_id='.$get.'&cls='.$cls.'" >'; ?>Home</a>
                        </h4>
                    </li>
                    <li class="li">
                        <h4>
                            <?php echo '<a href="assignment.php?gp_id='.$get.'&cls='.$cls.'" >';?>Assignment</a>
                        </h4>
                    </li>
                    <li class="li">
                        <h4>
                            <?php echo '<a href="notes.php?gp_id='.$get.'&cls='.$cls.'" >';?>Notes</a>
                        </h4>
                    </li>


                </ul>
                <div class="contents1">

                    <table class="table">
    <thead>
      <tr style={z-index:1;}>
        <th>Answer</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
     
echo '<td><p style={height:auto;width:100%;font-size:18px;}>'.$submited->Answer.'</p></td></tr></tbody>';
echo '<thead><tr><th><a href="../upload_assets/answer/'.$submited->File.'" download>'.'Attached Files'.'</a></th></thead></table>';
       
      ?>
      </tbody>
    </thead>
    </table>



                </div>


                <div id="side_bar">
                    <li class="li">
                        <h4>Members</h4>
                    </li>
                    <ul style="padding-left:-70px;">
                        <?php
                        foreach($data2 as $rows)
                        {
                    echo '<li><b>'.$rows['F_name'].' '.$rows['M_name'].' '.$rows['L_name'].'</b></li>';
                        }
                        ?>

                    </ul>
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
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

$get=$_GET['staff_id'];

 $db=getDB();
    $stmt = $db->prepare("SELECT * FROM `staff`,`staff_login` WHERE  staff.Staff_id=:staff and staff_login.Staff_id=:staff"); 
      $stmt->bindParam(":staff",$get,PDO::PARAM_STR);
      $stmt->execute();
            $stmt->bindColumn(1, $file, PDO::PARAM_LOB);
            $data=$stmt->fetch(PDO::FETCH_OBJ); 
        

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
                foreach($data as $rows)
                {

                   echo  '<li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="../notification/viewnotification.php?id='.$rows['id'].'">'.$rows['Title'].'</a>
                        </div>
                    </div>
                </li>';
            }
                ?>
               
                <li><a href="../notification/notification.php">View All</a></li>

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
                    <a class="active" href="../index.php">
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
                    <a class="active" href="../student/student.php">
                        <i class="fa "></i>
                        <span>STUDENT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../placement/placement.php">
                        <i class="fa "></i>
                        <span>PLACEMENT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../alumni/alumini.php">
                        <i class="fa "></i>
                        <span>ALUMNI's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../attendence/attendence.php">
                        <i class="fa "></i>
                        <span>ATTENDENCE</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../exam/exams.php">
                        <i class="fa "></i>
                        <span>EXAM &  <br/>RESULT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="../group/group.php">
                        <i class="fa "></i>
                        <span>GROUP's</span>
                    </a>
                </li>

               
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<section id="main-content">
      
         <div class="content" style="padding-top: 80px;">
            <?php  echo '<form action="editprofileemp.php?staff_id='.$data->Staff_id.'" method="post" enctype="multipart/form-data">';?>
            <table class="table table-bordered">
                <tr>
                    <h2>
                        <?php  echo $data->F_name.' ';
                                            echo $data->M_name.' ';
                                            echo $data->L_name; ?> Profile</h2>
                </tr>
                <tr>
                    <td>
                        <?php  echo '<img style="height: 150px;width: 150px;" src="../upload_assets/img_employee/'.$data->Image.'"/>' ;?>
                        <input type="file" class="form-control" name="img" />
                        <?php echo '<input type="text" style="hidden;display:none;" class="form-control"  value="'.$data->Image.'"  name="imgs">'; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label> First Name:</label>
                        <?php echo '<input type="text" class="form-control"  value="'.$data->F_name.'"  name="fname">'; ?>

                    </td>

                    <td>
                        <label> Middle Name:</label>
                        <?php echo '<input type="text" class="form-control" value="'.$data->M_name.'"  name="mname"/>';?>

                    </td>
                    <td>
                        <label> Last Name:</label>
                        <?php echo '<input type="text" class="form-control" value="'.$data->L_name.'" name="lname"/>'; ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Designation:</label>
                        <?php  echo '<input type="text" class="form-control" value="'.$data->Dejignation.'" name="post"/> ';?>


                    </td>

                    <td>
                        <label>Email:</label>
                        <?php echo '<input type="text" class="form-control" value="'. $data->Email.'" name="email"/>'; ?>
                    </td>
                    <td>
                        <label>Contact Number:</label>
                        <?php echo '<input type="text" class="form-control" value="'.$data->Contact_no.'" name="num"/> ';?>
                    </td>

                </tr>
                <tr>
                    <td>
                        <label>Address:</label>
                        <?php echo '<input type="text" class="form-control" value="'.$data->Address.'" name="address"/>';?>
                    </td>
                    <td>
                        <label>Password:</label>
                        <?php echo '<input type="text" class="form-control" value="'.$data->Password.'" name="pass"/> ';?>
                    </td>
                    <td>
                        <label>Staff ID:</label>
                        <?php echo '<h1 name="id">'. $data->Staff_id.'</h1>';
                                     ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Join Date:</label>
                        <?php echo  '<input type="text" class="form-control" value="'.$data->Join_date.'" name="jdate"/>'; ?>

                    </td>
                    <td>
                        <button class="btn btn-primary" name="submit">Edit</button>
                    </td>
                </tr>

            </table>
            </form>


        </div>
           
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

<?php
include 'connectivity/connection.php';

$db=getDB();

$sql=$db->query("SELECT * FROM `notification` order by  id DESC LIMIT 5");
$sql->execute();
$data=$sql->fetchAll(PDO::FETCH_ASSOC);

$empl=$db->query("SELECT * FROM `staff` ");
$empl->execute();
$emp=$empl->rowcount();

$stdl=$db->query("SELECT * FROM `student` ");
$stdl->execute();
$std=$stdl->rowcount();

$plcl=$db->query("SELECT * FROM `placement` ");
$plcl->execute();
$plc=$plcl->rowcount();

$almn=$db->query("SELECT * FROM `alumini` ");
$almn->execute();
$alm=$almn->rowcount();

?>
<!DOCTYPE html>
<head>
<title>CSE(DUIET)-ADMIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>


<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>

<link rel="stylesheet" href="css/monthly.css">
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
</head>

<body>
<section id="container">

<header class="header fixed-top clearfix">

<div class="brand">
    <a href="index.php" class="logo">DUIET(CSE)
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
                            <a href="notification/viewnotification.php?id='.$row['id'].'">'.$row['Title'].'</a>
                        </div>
                    </div>
                </li>';
            }
                ?>
               
                <li><a href="students/notification.php">View All</a></li>

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
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
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
                    <a class="active" href="student.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="EMPLOYEE/employee.php">
                        <i class="fa "></i>
                        <span>EMPLOYEE's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="emp/student.php">
                        <i class="fa "></i>
                        <span>STUDENT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="EMPLOYEE/placement.php">
                        <i class="fa "></i>
                        <span>PLACEMENT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="emp/alumini.php">
                        <i class="fa "></i>
                        <span>ALUMNI's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="emp/attendence.php">
                        <i class="fa "></i>
                        <span>ATTENDENCE</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="emp/exams.php">
                        <i class="fa "></i>
                        <span>EXAM &  <br/>RESULT's</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="staff_group/group.php">
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
        <!-- //market-->
        <div class="market-updates">
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-2">
                    <div class="col-md-4 market-update-right">
                        <i class="fa "> </i>
                    </div>
                     <div class="col-md-8 market-update-left">
                     <h4>Employee's</h4>
                    <h3><?php echo $emp; ?></h3>
                  </div>
                  <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-1">
                    <div class="col-md-4 market-update-right">
                        <i class="fa " ></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                    <h4>Student's</h4>
                        <h3><?php echo $std; ?></h3>
                        
                    </div>
                  <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-3">
                    <div class="col-md-4 market-update-right">
                        <i class="fa "></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Placement's</h4>
                        <h3><?php echo $plc; ?></h3>
                        
                    </div>
                  <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-4">
                    <div class="col-md-4 market-update-right">
                        <i class="fa " aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Alumni's</h4>
                        <h3><?php echo $alm; ?></h3>
                        
                    </div>
                  <div class="clearfix"> </div>
                </div>
            </div>
           <div class="clearfix"> </div>
        </div>  

        <!-- //market-->
        
        <div class="agil-info-calendar">
        <!-- calendar -->
        <div class="col-md-6 agile-calendar">
            <div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
                    <span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
                <!-- grids -->
                    <div class="agile-calendar-grid">
                        <div class="page">
                            
                            <div class="w3l-calendar-left">
                                <div class="calendar-heading">
                                    
                                </div>
                                <div class="monthly" id="mycalendar"></div>
                            </div>
                            
                            <div class="clearfix"> </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- //calendar -->
        <div class="col-md-6 w3agile-notifications">
            <div class="notifications">
                <!--notification start-->
                
                    <header class="panel-heading">
                        Notification 
                    </header>
                     <?php
                foreach($data as $rows)
                {

                   echo '<div class="notify-w3ls">
                        <div class="alert alert-info clearfix">
                            <span class=""><i class="fa "></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="#">'.$rows['Title'].'</a> </li>
                                    <li class="pull-right notification-time">'.$rows['date'].'</li>
                                </ul>
                               
                            </div>
                        </div>
                       
                        
                        </div>';
                    }
                    ?>
                        
                       
                        
                    </div>
                
                
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
            
        
</section>
 <!-- footer -->
          <div class="footer">
            <div class="wthree-copyright">
              <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
          </div>
  <!-- / footer -->
</section>

 
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>

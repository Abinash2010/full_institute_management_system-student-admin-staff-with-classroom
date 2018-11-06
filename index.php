<!DOCTYPE html>
<html>
<head>
	<title>Admin-CSE(DUIET)</title>
	<meta name='viewport' content='width=device-width,initial-scale=1.0'>
	<link rel='stylesheet' href='css/admin.css'/>
	
</head>
<body>
	<header>
			<nav>
				
				<img class='img' src='images/logo.png'>
				<h1 class='h1_img' >Computer Science & Engineering<br/>DUIET</h1>
			</nav>
	</header>
	<div class='container'>
		<div class='login_box'><br/>
	<?php
		global $failed;
		if(isset($_GET["msg"]) && $_GET["msg"]=='failed')
		{
			echo '<h3 class="error">'.'You entered wrong password or id'.'<br/></h3>';
		}
		
	?>
			<form class='login-form' name='f1' action='Admin/connectivity/login.php' method='post'>
				<label>USER ID :<br/><input type='text' name='uname' required=''></label>
				<label>PASSWORD:<br/><input type='password' name='psw' required=''></label>
				<input type='submit' name='submit' class='button' value='login'>
			</form>
			<a class='recover' href='Admin/connectivity/recover.php' >Forgot password</a>

		</div>
	
	</div>


</body>
</html
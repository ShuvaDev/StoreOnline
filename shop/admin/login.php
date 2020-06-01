<?php
include '../db.php';
//Start session
	session_start();
	
	if(isset($_SESSION['SESS_FIRST_NAME'])){
    header("location: index.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Signin :: Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="login">
              <?php
                            //include('../connect.php');
				$result = $db->prepare("SELECT * FROM settings");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
                                ?>
		<h1><a href="index.php"><?php echo $row['site_name']; ?> </a></h1>
                                <?php } ?>
                <div class="login-bottom">
			<h2>Login</h2>
                        <form action="process_login.php" method="post">
			<div class="col-md-6">
				<div class="login-mail">
                                    <input type="text" name="username" placeholder="username" required="">
					<i class="fa fa-user"></i>
				</div>
				<div class="login-mail">
                                    <input type="password" name="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>
				
			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="login">
					</label>
					
			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->
                <?php
                            //include('../connect.php');
				$result = $db->prepare("SELECT * FROM settings");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
                                ?>
<div class="copy-right">
            <p> &copy; 2017 <?php echo $row['site_name']; ?>. All Rights Reserved | Design by <a href="http://hillsofts.com/" target="_blank">Hillsofts</a> </p>	    </div>  
<!---->
                                <?php } ?>
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>


<!DOCTYPE html>
<html >
<head>
<link rel="icon" href="<?php echo base_url();?>application/assets/images/logo/favicon.png" type="logo/image/gif">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Project Management System</title>
<link rel="stylesheet" href="<?php echo base_url();?>application/assets/css/login/style.css" type="text/css" media="screen" title="default" />
</head>
<body id="login-bg"> 
	<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-image-login">
		<a href="<?php echo base_url(); ?>" ><img src="<?php echo base_url();?>application/assets/images/logo/logo-small.png" alt="" /></a>
		
	</div>
	<div id="logo-name-login">
		<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>application/assets/images/logo/logo-name.png" width="156" height="40" alt="" /></a>

	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
		<h2> Sorry </h2>
		<?php echo "ERROR:";?>
		<?php //echo "Username Doestn't Exist";?>
		<?php echo $error_message;?>
	</div>
 	<!--  end login-inner -->
	</div>
 <!--  end loginbox -->
</div>
<!-- End: login-holder -->

</body>
</html>
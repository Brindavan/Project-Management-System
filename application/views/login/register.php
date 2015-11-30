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
		<?php
			
			//Form Open 
			
			$atrributes = array(
							'name'		=>'login_form'
				);
			echo form_open('Login/newCompany',$atrributes); 
			echo '<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						
						<td>';
							$data = array(
				              	'type'		=> 'text',
				              	'name'        => 'name',
				              	'placeholder' => 'Company Name',
				              	'class'		=> 'login-inp',
				              	'required' => 'required'

				            );
				            echo form_input($data);
			            echo '</td>';
			        echo '</tr>';

			       echo '<tr>
						
						<td>';
							$data = array(
								'type'		=>'text',
				              	'name'        => 'address',
				              	'placeholder' => 'Address',
				              	'class'		=> 'login-inp',
				              	'required' => 'required'
				            );
				            echo form_input($data);
			            echo '</td>';
			        echo '</tr>';

			        echo '<tr>
						
						<td valign="top">';
							$data = array(
								'type'		=>'text',
								'name'		=>'phone',
								'placeholder'=>'Phone Number',
				              	'class'		=> 'login-inp',
				              	'required' => 'required',
				            );
				            echo form_input($data);
			            
			        echo '</tr>';

			        echo '<tr>
						<th></th>
						<td>';
							$data = array(
								'type'		=> 'submit',
								'name'		=> 'Register',
								'value'		=> 'Register',								
				              	'class'		=> 'submit-login'
				            );
				            echo form_submit($data);
			            echo '</td>';
			        echo '</tr>';


			
			echo form_close();
		?>
	</div>
 
 </div>
 <!--  end loginbox -->
</div>
<!-- End: login-holder -->


</body>
</html>
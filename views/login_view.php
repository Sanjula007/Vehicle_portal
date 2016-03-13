<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" type="text/css"/>
	

   <title>Simple Login with CodeIgniter</title>
 </head>
 <body>
 		<div class="page">
			<div class="header">
				<a href="index.html" id="logo"><img src="<?php echo base_url("images/logo.gif");?>" alt=""/></a>
				
				</div> </div>
	<body>
		<div class="login">
		<div class="login-screen">
			<div class="app-title">
					<img style="width:100px; height:100px;" src="<?php echo base_url("images/login.png");?>" alt=""/>
					</div>
   
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
   <div class="login-form">
	<div class="control-group">
     <label for="username">Username:</label>
     <input type="text"  id="username" class ="login-field" name="username" id="login-name"/>
     <br/>	</div>

	 <div class="control-group">
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/></div> 

     <input type="submit" class="btn btn-primary btn-large btn-block" value="Login"/>
     <a class="login-link" href="<?php echo base_url() ?>index.php/login/passview" ?>Forgot your password?</a><a class="login-link" href="<?php echo base_url() ?>index.php/login/signup" ?>Sign Up</a>
     		</div>
			</form>

					
		</div>
	</div>
</body>

</body>

</html>
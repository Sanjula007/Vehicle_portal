<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" type="text/css"/>
	

   <title>Delete my account</title>
 </head>
 <body>
 		<div class="page">
			<div class="header">
				<a href="index.html" id="logo"><img src="images/logo.gif" alt=""/></a>
				
				</div> </div>
	<body>
		<div class="login">
		<div class="login-screen">
			<div class="app-title">
					<h1>Delete</h1>
					</div>
   <?php 
	//require 'verifyLogin.php';
	echo form_open('delete');
    ?>

    <form method ="post"  action="<?php echo base_url();?>delete/delete_row" name="form">
   
   <div class="login-form" action="">
	<div class="control-group">
     <label for="username">Username:</label>
     <input type="text" id="uname" class ="login-field" name="uname" value="<?php echo set_value('uname'); ?>"/>
     <br/>	</div>


      <a class="login-link" href="<?php echo base_url() ?>index.php/delete/delete_row" ?>delete my account</a>
     		</div>
			</form>

					
		</div>
	</div>
</body>

</body>

</html>
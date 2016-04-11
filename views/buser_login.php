<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" type="text/css"/>
	

   
 </head>
 <body>
 	<div class="login">
		<div class="login-screen">
			<div class="app-title">
					<img style="width:100px; height:100px;" src="<?php echo base_url("images/login.png");?>" alt=""/>
					</div>
   
   
   <form action ="<?php echo site_url() . "./businessuser " ;?>" method ="POST">
   <div class="login-form">
	<div class="control-group">
     <label for="username">Companyname:</label>
     <input type="text"  id="compname" class ="login-field" name="compname" id="login-name"/>
     <span style="color:red;"><b><?php echo form_error('compname'); ?></b></span>
     <br/>	</div>

	 <div class="control-group">
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <span style="color:red;"><b><?php echo form_error('password'); ?></b></span>
     <br/></div> 

     <input type="submit" class="btn btn-primary btn-large btn-block" value="Login"/>
    
     		</div>
			</form>

					
		</div>
	</div>
</body>

</body>

</html>
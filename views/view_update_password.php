<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" type="text/css"/>
	
 </head>
 
 <div class="page">
			<div class="header">
				<a href="index.html" id="logo"><img src="<?php echo base_url("images/logo.gif");?>" alt=""/></a>
				</div> </div>
 	
 	
<div class="login">
		<div class="login-screen">
            <div class="panel-heading">
<h2>Update Your password</h2>
  </div>
            <div class="panel-body">
<form action="<?php echo site_url() . "./updatepassword/update_password" ;?>"  method="post">
	<div class="form-group">
	<label> Email-ID</label>
	<input type ="text" value= "" name="email" />
	</div>
</br>
	
	<div class="form-group">
	<label for="password"> New Password</label>
	<input type ="password" value="" name ="password" /></br></div>
	<div class="form-group">
	<label for="password_conf"> New Password Again</label>
	<input type ="password" value="" name ="password_conf" />
	</br>
	
	<input type="submit" class="btn btn-primary btn-large btn-block" value="Update my password" name ="submit" >
		</div>
	</div>
</form>
</html>
<?php echo validation_errors('<p class = "error">');
?>


<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
	
 </head>
 
 <div class="page">
			<div class="header">
				<a href="index.html" id="logo"><img src="<?php echo base_url("images/logo.gif");?>" alt=""/></a>
				</div> </div>
 	
 	
 <div class="reset1">	
<h1>Reset password</h1></div>
<form action ="reset_password" method ="POST">
		
		<div class="lock">	<img src="<?php echo base_url("images/lock.png");?>"  width="350px" height="350px" float=left alt=""/></div>
		<div class="reset">	
	<table>
	<tr><td><label form ="email"> <center> Enter the email address you used when you created the account.</center></label></td></tr>
	<tr>
		<td><input type = "email"  class ="login-field" placeholder="YOUR EMAIL ADDRESS"  style="width:420px; background-color:#FFFFFF" value="<?php echo set_value('email');?>" name ="email" id="login-name"/></td>
	</tr>

	<tr>
		<td><input type ="submit" class="btn btn-primary btn-large btn-block" name="submit" value="Reset my password"/></td>
	</tr>
	</table>
	</div>
</form>
</html>

<?php echo validation_errors('<p class = "error">');

	if(isset($error)){
		
		echo '<p class = "error">'.$error. '</p>';

	}
?>

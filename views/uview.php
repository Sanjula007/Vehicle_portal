<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" type="text/css"/>
	
 </head>
 
 <div class="page">
			<div class="header">
				<a href="index.html" id="logo"><img src="<?php echo base_url("images/logo.gif");?>" alt=""/></a>
				</div> </div>
 	
 	
 

<form action ="check_username" method ="POST">
			<div class="resetO">	<img src="<?php echo base_url("images/Orange.png");?>"  width="400px" height="400px" float=left alt=""/></div>

<div class="tt">
	<table>
		<tr><td><label form ="email"> <b>Type your password to View and Update your Account details:</b></label></td></tr>
	
	<tr><td><input type = "password"  class ="login-field" placeholder="YOUR USERNAME"  style="width:450px; background-color:#FFFFFF" value="<?php echo set_value('password');?>" name ="password" id="login-name"/></td></tr>

	<tr><td><input type ="submit" class="btn btn-primary btn-large btn-block" name="submit" value="Submit"/></td></tr>
	</table></div>
</form>
</html>

<?php echo validation_errors('<p class = "error">');

	if(isset($error)){
		
		echo '<p class = "error">'.$error. '</p>';

	}
?>

<!--<!DOCTYPE html>
<html>
	<head>
		<title>Registration Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	</head>
	<body>
		
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">-->
			
			<div class="row placeholders">
			<div class="col-xs-13 col-sm-9 placeholder">
				<br><br><h1> Admin Registration form </h1>
				<?php
				    echo form_open('user_authentication/new_user_registration');
					
					echo form_label('First Name : ');
					echo form_input('firstname');
					echo form_error('firstname'); 
					echo"<br/>";
					
					echo form_label('Last Name : ');
					echo form_input('lastname');
					echo form_error('lastname');
					echo"<br/>";
					
					echo form_label('Email : ');
					echo form_input('email');
					echo form_error('email');
					echo"<br/>";
					
					echo form_label('User Name : ');
					echo form_input('username');
					echo form_error('username');
					if (isset($message_display)) {
					echo $message_display;
					}
					echo"<br/>";
					
					echo form_label('Password : ');
					//echo form_input('password');
					echo form_password('password');
					echo form_error('password');
					echo"<br/>";
					
					echo form_label('Confirm Password : ');
					//echo form_input('cpwd');
					echo form_password('cpwd');
					echo form_error('cpwd');
					echo"<br/>";
					
					
				?>
				<div class="col-xs-13 col-sm-4 placeholder">
				<br><input type="submit" value=" Sign Up" name="submit">
				</form>
				<?php echo form_open('user_authentication/user_login_process');?>
				<input type="submit" value=" Cancel" name="cancel" > 
				</div>
			</div>
		</div>
		</div>
	</body>
	
</html>
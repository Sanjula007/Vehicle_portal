<!--<!DOCTYPE html>-->
<html>
	<head>
		<title>Login Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/animate.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/clndr.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jqvmap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="col-xs-13 col-sm-6 placeholder"><br><br>
		<?php
		if (isset($message_display)) {
		echo "<div class='message'>";
		echo $message_display;
		echo "</div>";
		}
		echo form_open('user_authentication/user_login_process'); ?>
		<?php
		echo "<div class='error_msg'>";
		if (isset($error_message)) {
		echo $error_message;
		}
		echo validation_errors();
		echo "</div>";
		?>
		<label>User Name :</label>
		<input type="text" name="username" id="name" placeholder="username"/><br /><br />
		<label>Password :</label>
		<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
		<input type="checkbox" name="remember_me"/> Remember Me <br><br>
		<input type="submit" value=" Login " name="submit"><br />
		<!--<a href="<?php echo base_url() ?>index.php/user_authentication/sendMail">Forgot password</a>-->
		<a href="<?php echo base_url() ?>index.php/user_authentication/reset_password">Forgot password</a>

		<?php echo form_close(); ?>
		</div>
	</body>
</html>
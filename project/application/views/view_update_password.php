<link rel="stylesheet" type="text/css" href="<?php echo base_url(). "css/update.css" ?>">
	<div class="row placeholders">
			<div class="col-xs-13 col-sm-50 placeholder">
				<div id="container">
<div id="wrapper">

<h2>Update Your Password</h2><br><br>
<div id="update_password_form">
	<form action="/admin2/ci_intro/index.php/user_authentication/update_password" method="post">
		<div>
			<label for="email">Email:</label>
			<?php if(isset($email_hash,$email_code)) { ?>
				<input type="hidden" value="<?php echo $email_hash ?>" name="email_hash"/>
				<input type="hidden" value="<?php echo $email_code ?>" name="email_code"/>
			<?php } ?>
			<input type="="email" value="<?php echo (isset($email))?$email:''; ?>" name="email"/>
		</div>
		<div>
			<label for="password">New Password:</label>
			<input type="password" value="" name="password" />
		</div>
		<div>
			<label for="password_conf">New Password Again:</label>
			<input type="password" value="" name="password_conf" />
		</div>
		<div>
			<input type="submit" value="Update my Password" name="submit" />
		</div>
	</form>
	<?php
		echo validation_errors('<p class="error">');
	?>
</div>

</div></div></div></div></div>

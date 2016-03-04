<link rel="stylesheet" type="text/css" href="<?php echo base_url(). "css/update.css" ?>">
	<div class="row placeholders">
			<div class="col-xs-13 col-sm-50 placeholder">
				<div id="container">
<div id="wrapper">


<h2>Reset Password</h2><br><br>
<div id="reset_password_form">
	<!--<form action="/index.php/user_authentication/reset_password" method="post">-->
		<form method="post">
		<div>
			<label for="email">Email</label>
			<input type="email" value="" name="email"/>
		</div>
		<div>
			<input type="submit" value="Reset My Password" name="submit" onclick="user_authentication/view_reset_password_sent"/>
		</div>
	</form>
	<?php
		echo validation_errors('<p class="error"/>');
		if(isset($error)){
			echo '<p class="error">'.$error.'</p>';
		}
	?>
</div></div></div></div></div></div>
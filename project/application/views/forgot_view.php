<!DOCTYPE >
<html>
	<head>
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
		<div class="container">
		
		<form class="form-horizontal well" method="post" id="form" action="/index.php/forgot_ctrl/forgrt">
			<fieldset>
	          <legend>Reset password</legend>
			
				<div class="control-group">
					<label for="email"> Email</label>
					<input class="box" type="text" id="email" name="email" />
				</div>
				<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="Reset" />
				</div>
				<?php if( isset($info)): ?>
					<div class="alert alert-success">
						<?php echo($info) ?>
					</div>
				<?php elseif( isset($error)): ?>
					<div class="alert alert-error">
						<?php echo($error) ?>
					</div>
				<?php endif; ?>
				
			</fieldset>
		</form>
	</div> 
	</body>
	
</html>
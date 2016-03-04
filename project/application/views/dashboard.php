<?php
if (isset($message_display)) {
echo $message_display;
}
?>

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
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">A 2 Z Vehicles </a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
		          	<ul class="nav navbar-nav navbar-right">
			            <li><a href="#">Dashboard</a></li>
			            <li><a href="#">Settings</a></li>
			            <li><a href="<?php echo base_url('index.php/profile_ctrl/index')?>">Profile</a></li>
			            <li><a href="#">Help</a></li>
		          	</ul>
		          	<form class="navbar-form navbar-right">
		            	<input type="text" class="form-control" placeholder="Search...">
		          	</form>
	        	</div>
			</div>
		</nav>
		
		<div class="container-fluid">
      		<div class="row">
        		<div class="col-sm-3 col-md-2 sidebar">
          			<ul class="nav nav-sidebar"><br><br><br><br>
			            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
			            <li><a href="#">Reports</a></li>
			            <li><a href="#">Analytics</a></li>
			            <li><a href="#">Export</a></li>
          			</ul>
		            <ul class="nav nav-sidebar">
			            <li><a href="new_user_registration">Admin Registration</a></li>
			            <li><a href="<?php echo base_url('index.php/update_ctrl/index')?>">Update User Data</a></li>
			            <li><a href="<?php echo base_url('index.php/delete_ctrl/index')?>">delete user</a></li>
			            <li><a href="<?php echo base_url('index.php/select_tutorial/index')?>">Search Ads</a></li>
			            <li><a href="<?php echo base_url('index.php/insert_ctrl')?>">Insert ads </a></li>
			            <li><a href="<?php echo base_url('index.php/ci_email_tutorial')?>">Contact Form </a></li>
		            </ul>
		            <ul class="nav nav-sidebar">
			            <li><a href="">Nav item again</a></li>
			            <li><a href="">One more nav</a></li>
			            <li><a href="">Another nav item</a></li>
		           </ul>
       			</div>
       			 <!--<br> <br> <!--<h1 class="page-header">Dashboard</h1>

          	<div class="row placeholders">
            	<div class="col-xs-6 col-sm-3 placeholder">
              		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              		<h4>Label</h4>
              		<span class="text-muted">Something else</span>
            	</div>
            	
            	<div class="col-xs-6 col-sm-3 placeholder">
                	<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              		<h4>Label</h4>
              		<span class="text-muted">Something else</span>
            	</div>
            	
                <div class="col-xs-6 col-sm-3 placeholder">
              		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              		<h4>Label</h4>
              		<span class="text-muted">Something else</span>
            	</div>
            	
            	
            	</div>
       		</div>	
        </div>
        
         
		
	</body>
</html>-->
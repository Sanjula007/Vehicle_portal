<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style4.css" type="text/css"/>
 
  </head>
 <body>
 		<div class="page">
			<div class="header">
				<a href="index.html" id="logo"><img src="<?php echo base_url("images/logo.gif");?>" alt=""/></a>
				
				</div> </div>
		<div class="home"><img src="<?php echo base_url("images/house.png");?>"  width="30px" height="30px" float=left alt=""/><a href="<?php echo base_url() ?>index.php/login/Homeview1">HOME</a></div>
<body>
	<form action ="<?php echo site_url() . "./edit/upload_file" ;?>" method ="POST" enctype="multipart/form-data">
<div class="prof">	<img src="<?php echo base_url("images/profile.jpg");?>"  width="350px" height="350px" float=left alt=""/></div>
<div class="pic">
<table>
	<tr><td><h1><input type="text" style="width:300px ;background-color:#FFA500 " value='Upload Your Profile picture'></h1>	</td></tr>
	<tr><td> Username :	<input type="text"	placeholder="Username" style="width:200px; background-color:#FFFFFF" name="username"</td></tr>
	<tr><td><input type="file"	placeholder="Image" style="width:400px; background-color:#FFFFFF" name="picture"</td></tr>
	<tr><td><input type="submit" class="btn btn-primary btn-large btn-block" name="UploadImage" value="Save"><input type="submit" class="btn btn-primary btn-large btn-block" name="view" value="view"></td></tr>
</table></div>
</div>
</form>

</body>
</html>
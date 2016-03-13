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
				<?php
				 foreach ($posts->result() as $row) {
				 ?>
					 <img style="width:400px; height:400px;" src="<?php echo base_url('file/'.$row->picture)?>">
				<?php
				 }
				 ?>
				 <input type="submit" class="btn btn-primary btn-large btn-block"  name="UPDATE" value="Change profile picture" >

		</form>

</body>
</html>
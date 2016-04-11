<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style4.css" type="text/css"/>
	

	<script type="text/javascript">
      
 </script>
  </head>
 <body>
 	
 
 		<div class="page">
			<div class="header">
				<a href="index.html" id="logo"><img src="<?php echo base_url("images/logo.gif");?>" alt=""/></a>
								</div> </div>
			
		<div class="home"><img src="<?php echo base_url("images/house.png");?>"  width="30px" height="30px" float=left alt=""/><a href="<?php echo base_url() ?>index.php/login/Homeview1">HOME</a></div>
				
				
 	<div class="se">
 	<form action="<?php echo site_url() . "./search_controller" ;?>" method="POST">
 				<?php echo validation_errors(); ?>
				 <table cellpadding="0.2px">
					<tr> <td><img src="<?php echo base_url("images/se.png");?>"  width="60px" height="60px" float=left alt=""/></td>
					<td><input type="text" name="search" id="search" style="width:200px; background-color:#FFFFFF" value=''></td>
					<td><input type="submit" class="btn btn-primary btn-large btn-block"  name="view" value="Search" ></td></tr>
					</table>
 	</form></div>
 	
 	
 		<div class="tableview">
				<form action="<?php echo site_url() . "./add_busdetails/selectview" ;?>" method="POST">
 				
<section>
 				<?php
				 foreach ($posts->result() as $row) {
				 ?>
				 	<table bgcolor="#E4E4A1" cellspacing="20px" style="border-radius:25px; border: 1px solid black;">
		 			<tr> <td><img style="width:200px; height:200px;" src="<?php echo base_url('file/'.$row->picture)?>"></td>
					<td><input type="text" name="cname" id="cname" placeholder="Company Name" style="width:200px; background-color:#E4E4A1;" value='<?php echo $row->name;?>'></td>
					<td><input type="submit" class="btn btn-primary btn-large btn-block"onclick="view()" name="view" value="View Details" ></td></tr>
					</table></br>

				
				<?php
				 }
				 ?>
				 
			</section>	
				 
	 
		 
				
		</form></div>
</body>
</html>  


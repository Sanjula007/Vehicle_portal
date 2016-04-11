<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style4.css" type="text/css"/>
  </head>
 <body>
 		<div class="page">
			<div class="header">
				<a href="index.html" id="logo"><img src="<?php echo base_url("images/logo.gif");?>" alt=""/></a>
				
				</div> </div>
			
			<div class="home"><img src="<?php echo base_url("images/house.png");?>"  width="30px" height="30px" float=left alt=""/><a href="<?php echo base_url() ?>index.php/login/Homeview">HOME</a></div>


<body>
	 
	<form action ="<?php echo site_url() . "./add_busdetails/addcomp_details" ;?>" method ="POST" enctype="multipart/form-data">
		 

			

<div class="det">
<table bgcolor="#B6B3B2" cellspacing="20px" style="border-radius:25px;">
 <tr><td><label ><b>Company Name :</b></label></td>
		<td><input type="text" name="compname" placeholder="Company name"  id="compname" style="width:250px; background-color:#FFFFFF">&nbsp;
			 <span style="color:red;"><b><?php echo form_error('compname'); ?></b></span></td></tr>
</td></tr>
 
 <tr>
 	<td> <label><b>Description :</b></label></td>
<td><input type="text" name="description"  id="description"  placeholder="About company"   style="width:300px ;background-color:#FFFFFF">&nbsp;</br>
 <span style="color:red;"><b><?php echo form_error('compname'); ?></b></span></td>
</td></tr> 
<tr>
 	<td> <label><b>Tel no:</b></label></td>
<td><input type="text" name="Tel"  id="Tel"  placeholder="Office number" style="width:250px ;background-color:#FFFFFF">&nbsp;
 <span style="color:red;"><b><?php echo form_error('Tel'); ?></b></span></td>
</td></tr> 
<tr> <td><label><b>Address:</b></label></td>
 	<td><input type="text" name="address" id="address" placeholder="Address"  style="width:250px;  background-color:#FFFFFF"></br>
  <span style="color:red;"><b><?php echo form_error('address'); ?></b></span></td>
 </tr>
  <tr> <td><label><b>Email:</b></label></td>
 	<td><input type="text" name="email" id="email" placeholder="Email"  style="width:250px;  background-color:#FFFFFF"></br>
 <span style="color:red;"><b><?php echo form_error('email'); ?></b></span></td>
 </tr>
 <tr> <td><label><b>Requirments:</b></label></td>
 	<td><input type="text" name="requirments" id="requirments" placeholder="Requirments"  style="width:250px;  background-color:#FFFFFF"></br>
  <span style="color:red;"><b><?php echo form_error('requirments'); ?></b></span></td>
 </tr>
 
 
 <tr><td><label> <b>Company image:</b></label></td>
 	<td><input type="file"	placeholder="Image" style="width:400px; background-color:#FFFFFF" name="picture"</td></tr>
 <tr><td><input type="submit" class="btn btn-primary btn-large btn-block" name="UploadImage" value="Save"></td></tr>
 </table>
</div>
</form>

</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" type="text/css"/>
	
 
 </head>
<body>
	<form action ="<?php echo site_url() . "./edit_busdetails" ;?>" method ="POST">

<?php
foreach ($posts->result() as $post)
{
?>

<div class="bus">
	<h1>Business Details</h1>
<table bgcolor="#B6B3B2" cellspacing="20px" style="border-radius:25px;">
 <tr><td><label for="name">Company Name :</label></td>
		<td><input type="text" name="compname" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->name;?>'>&nbsp;</td>
		<span style="color:red;"><b><?php echo form_error('compname'); ?></b></span></tr>
 
 <tr>
 	<td> <label for="name">About :</label></td>
<td><input type="text" name="description" placeholder="Desciption" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->description;?>'>&nbsp;</br>
<span style="color:red;"><b><?php echo form_error('description'); ?></b></span></tr></td></tr> 
 <tr>
 	<td><label for="name">Email :</label></td>
<td><input type="text" name="email" placeholder="ENTER EMAIL" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->email;?>'></br>
 <span style="color:red;"><b><?php echo form_error('email'); ?></b></span></td></tr> 
 <tr> <td><label for="name">Tel No:</label></td>
 	<td><input type="text" name="Tel" placeholder="ENTER NUMBER" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->tel;?>'></br>
<span style="color:red;"><b><?php echo form_error('Tel'); ?></b></span></tr></td></tr>  </tr>
 <tr>
 	<td><label for="name">Address:</label></td>
<td><input type="text" name="address" placeholder="ADDRESS" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->address;?>'></br>
 </td><span style="color:red;"><b><?php echo form_error('address'); ?></b></span></tr></td></tr> </tr>
 <tr> <td><label for="name">Requirments :</label></td>
 	<td><input type="text" name="requirments" placeholder="Requirments" style="width:300px; height:50px; background-color:#FFFFFF" value='<?php echo $post->Requirements;?>'></br>
 <span style="color:red;"><b><?php echo form_error('requirments'); ?></b></span></tr></td></tr> </tr>
<tr> <td><input  class="btn btn-primary btn-large btn-block"  type="submit" name="SAVE" value="SAVE" ></td><tr>
 </table>
 
</div>



<?php 
}
?>

</form>

</body>
</html>
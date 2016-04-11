<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style5.css" type="text/css" />
 
	
 
  </head>
 
 	
		
	
<body>
	<form action ="<?php echo site_url() . "./edit/check_button" ;?>" method ="POST">

       <?php echo $this->session->flashdata('verify_msg'); ?>

	
	<?php 
	//require 'verifyLogin.php';
	echo form_open('verifyLogin');
    ?>

<?php
foreach ($posts->result() as $post)
{
?>
<div class="my">
<img src="<?php echo base_url("images/My.png");?>"  width="240px" height="220px" float=&#x2192; alt=""/></div>

<div class="up">
	<h1>My Account Details</h1>
<table bgcolor="#B6B3B2" cellspacing="20px" style="border-radius:25px;">
 
<tr><td><label for="name">First Name :</label></td>
<td><input type="text" class ="textbox1"  name="firstname" placeholder="FIRST NAME" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->fname;?>'>
 <span style="color:red;"><b><?php echo form_error('firstname'); ?></b></span></td></tr>
 
 <tr>
 	<td> <label for="name">Last Name :</label></td>
<td><input type="text" name="lastname" class ="textbox1"  placeholder="LAST NAME" style="width:200px ;background-color:#FFFFFF" value='<?php echo $post->lname;?>'>&nbsp;</br>
 <span style="color:red;"><b><?php echo form_error('lastname'); ?></b></span></td></tr>

</td></tr> 
 <tr>
 	<td><label for="name">Email    :</label></td>
<td><input type="text" name="email" class ="textbox1"  placeholder="ENTER EMAIL" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->email;?>'></br>
 <span style="color:red;"><b><?php echo form_error('email'); ?></b></span></td></tr>

 <tr> <td><label for="name">Mobile no :</label></td>
 	<td><input type="text" name="mobile" class ="textbox1" placeholder="ENTER NUMBER" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->Phone;?>'></br>
 			                    <span style="color:red;"><b><?php echo form_error('mobile'); ?></b></span></td></tr>
 <tr><td><input type="submit"  class="btn btn-primary btn-large btn-block" name="Send_email" value="Send Email " ></td></tr><tr></tr><tr></tr>
 </table>
 
</div>
<div class ="deleteacc">
<table bgcolor="#B6B3B2" cellspacing="20px" style="border-radius:25px;">
				 		<tr> <td><label><b>Delete Account </b></label></td></tr>
					 	<tr> <td><label><b><i>Reason to Delete your account:</i></b></label></td></tr>
  						<tr><td><textarea rows="5" cols="50" name="purpose" ></textarea></td></tr>
  						<tr> <td><input type="submit" class="btn btn-primary btn-large btn-block"  name="DELETE" value="DELETE" ></td></tr>

				 	</table>
</div>




<div class="upb">
<table bgcolor="#B6B3B2" cellspacing="20px" style="border-radius:25px;">	
<tr><td><input type="submit" class="btn btn-primary btn-large btn-block"   name="UPDATE" value="UPDATE" ></tr></td>

<tr><td><input type="submit" class="btn btn-primary btn-large btn-block"  name="Business" value="Add Business Details" ></td></tr>
<tr><td><input type="submit" class="btn btn-primary btn-large btn-block"  name="UPLOAD" value="Upload profile picture" ></div></td></tr>
<tr><td><input type="submit" class="btn btn-primary btn-large btn-block"  name="Business" value="Post An Ad" ></td></tr>




<?php }
?>

</form>

</body>
</html>
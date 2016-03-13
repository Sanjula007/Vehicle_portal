<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style1.css" type="text/css"/>
	
 
  </head>
 <body>
 		<div class="page">
			<div class="header">
				<a href="index.html" id="logo"><img src="<?php echo base_url("images/logo.gif");?>" alt=""/></a>
				
				</div> </div>
	

	
	<h1>	<input type="text" style="width:300px ;background-color:#FFA500 " value='My Account Details'></h1>

<body>
	<form action ="check_update" method ="POST">

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
<table>
 <tr><td><label for="name">First Name :</label></td>
		<td><input type="text" name="firstname" placeholder="FIRST NAME" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->fname;?>'>&nbsp;</td></tr>
 
 <tr>
 	<td> <label for="name">Last Name :</label></td>
<td><input type="text" name="lastname" placeholder="LAST NAME" style="width:200px ;background-color:#FFFFFF" value='<?php echo $post->lname;?>'>&nbsp;</br>
</td></tr> 
 <tr>
 	<td><label for="name">Email    :</label></td>
<td><input type="text" name="email" placeholder="ENTER EMAIL" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->email;?>'></br>
 </td></tr>
 <tr> <td><label for="name">Mobile no :</label></td>
 	<td><input type="text" name="mobile" placeholder="ENTER NUMBER" style="width:200px; background-color:#FFFFFF" value='<?php echo $post->Phone;?>'></br>
 </tr>
 </table>
</div>

<div class="pic1">
<input type="submit" class="btn btn-primary btn-large btn-block"  name="UPLOAD" value="Upload profile picture" >
<input type="submit" class="btn btn-primary btn-large btn-block"  name="Preview" value="Preview" ></div>
<div class="upb">
<input type="submit" class="btn btn-primary btn-large btn-block"  name="UPDATE" value="UPDATE" >
<input type="submit" class="btn btn-primary btn-large btn-block"  name="DELETE" value="DELETE" ></div>
<div class="upb1">

<input type="submit"  style="width:420px; background-color:orange" name="Send_email" value="Send Email to Seller for Verification" >

</div>

<?php }
?>

				
				
				

</form>

</body>
</html>
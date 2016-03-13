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
			
			<div class="home"><img src="<?php echo base_url("images/house.png");?>"  width="30px" height="30px" float=left alt=""/><a href="<?php echo base_url() ?>index.php/login/Homeview1">HOME</a></div>


<body>
	<form action ="send_email" method ="POST">
		 

			<div class="email"><img src="<?php echo base_url("images/email.png");?>"  width="300px" height="300px" float=left alt=""/></div>

<div class="up">
<table>
 <tr><td><label > To :</label></td>
		<td><input type="text" name="to" style="width:200px; background-color:#FFFFFF">&nbsp;</td></tr>
 
 <tr>
 	<td> <label>From :</label></td>
<td><input type="text" name="from"  style="width:200px ;background-color:#FFFFFF">&nbsp;</br>
</td></tr> 
  <tr> <td><label> Message:</label></td>
 	<td><input type="text" name="msg" style="width:400px; height:200px; background-color:#FFFFFF"></br>
 </tr>
 </table>
</div>


<div class="send">

<input type="submit"  style="width:200px; background-color:orange" name="Send" value="Send" >

</div>



				
				
				

</form>

</body>
</html>
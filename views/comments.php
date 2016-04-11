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
				
				
				
				
	<div class ="tab3">		
		
	
	 <?php foreach ($posts->result() as $row): ?>
						 	<table bgcolor="#E4E4A1" cellspacing="20px" style="border-radius:25px;border: 3px solid black; width:900px;">
 	
    <tr><td style="color:blue;"><b><?php echo $row->username;?></b></br></td></tr>
    <tr><td><?php echo $row->comment;?></br></td></tr>
    </table></br>

<?php endforeach; ?>

				 
				</div> 

</body>
</html>
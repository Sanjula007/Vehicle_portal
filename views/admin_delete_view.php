<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	
 	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style5.css" type="text/css" />
 
	
 
  </head>
 
 	
		
	
<body>
	<form action ="<?php echo site_url() . "./Admin_delete_controller/checkbox_delete" ;?>" method ="POST">
		<div class="se">
<table  bgcolor="#B6B3B2" cellspacing="20px" >
	<th style="width:20px;">useID</th>
	<th style="width:30px;">status</th>
	<th style="width:90px;">Name</th>
	<th style="width:150px;">Reason</th>
	
</table>


	 <?php foreach ($posts->result() as $row): ?>
	<table  bgcolor="#B6B3B2" cellspacing="20px" >
 	
    <tr><td><input type="text" name="userid" style="width:10px; background-color:#B6B3B2" value='<?php echo $row->userid;?>'></td>
   <td><?php echo $row->status;?></td>
    <td><input type="text" name="fname" style="width:100px; background-color:#B6B3B2" value='<?php echo $row->fname;?>'></td>
   <td><?php echo $row->comment;?></td>
   <td><input type="checkbox" name="mycheck" value="1"></td></tr>
    
    </table>
<?php endforeach; ?>
	<input type="submit"  value="delete" >
</div>
</form>

</body>
</html>
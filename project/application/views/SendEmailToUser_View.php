
<style>
td{
	 width: 100px;
	 
		
}

.center1 {
	float:center;
	align:center;
	border-radius: 5px;
    margin: auto;
    //width:100px;
    border: 3px solid #f78117;
    //padding: 10px;
	font-family: 'RokkittRegular';
	font-size:15px;
	font-weight:bold;
	color:#f78117;
	//margin:15px 0 0;
	line-height:15px;
}

.center {
	///float:center;
	//align:center;
	border-radius: 5px;
   // margin: auto;
    //width: 30%;
    //border: 3px solid #f78117;
    //padding: 10px;
	font-family: 'RokkittRegular';
	font-size:21px;
	font-weight:bold;
	color:#f78117;
	//margin:15px 0 0;
	//line-height:21px;
}
td {
width:180px;
}

</style>


</div>
<div>
<div class='center' style='background-color:#E0E0E0; box-shadow: 2px 2px 5px grey; width:100%; min-height:60%; padding-top:5%;'>
	<?php echo $message;?>
	<form action ="<?php echo site_url().'/sendemail/send';?>" method="post" name='searchform' id='searchform'>
	<table align='center' class="center" >
		
			
		
		<tr>
			<td><p class='center'>To </p></td>
		<td><input type="radio" name="users" value="All" <?php echo set_radio('users', 'All', TRUE); ?> /> All 
		<input type="radio" name="users" value="user" <?php echo set_radio('users', 'user' ); ?>/> User<br>
		 <input type='email' name='useremail' id='useremail' placeholder='user@email.com' value='<?php echo set_value('useremail', ''); ?>' class='center1' style="width:140px;"><?php echo form_error('useremail');?></td>
		</td>
		</tr>
		
		<tr><td><p class='center'>Subject</p></td>
			<td><input type='text' name='subject'id='user' placeholder='Subject' value='<?php echo set_value('subject', ''); ?>' class='center1' style="width:140px;"><?php echo form_error('subject');?></td>
		</tr>
		
		<tr><td><p class='center'>Content </p></td>
			<td><textarea rows="10" cols="50" class='center1' name='content' ><?php echo set_value('content', '');?></textarea><?php echo form_error('content');?></td>
		</tr>
		
		<tr>
			<td><input type='submit' name='submit' value='Send' align='center'  class='submit'></td>
			<td></td>
			
		</tr>
	
	</form>


</div>
</div>







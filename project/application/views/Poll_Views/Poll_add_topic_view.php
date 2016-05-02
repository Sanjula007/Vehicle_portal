<style>
td{
	 width: 25px;
	 
		
}

.center1 {
	float:center;
	align:center;
	border-radius: 5px;
   // margin: auto;
    width:300px;
	height:50px;
    border: 3px #0067a7;
    padding:0px;
	font-family: 'RokkittRegular';
	font-size:15px;
	font-weight:bold;
	color:#0067a7;
	//margin:15px 0 0;
	//line-height:15px;
}

.center {
	float:center;
	align:center;
	border-radius: 5px;
   // margin: auto;
    //width: 30%;
    //border: 3px solid #0067a7;
    padding: 0px;
	font-family: 'RokkittRegular';
	font-size:21px;
	font-weight:bold;
	color:#0067a7;
	//margin:15px 0 0;
	//line-height:21px;
}
.td .tr{
width:30%;
}

</style>
<div>
<div class="body" style="width:79%; background-color: #efeff5; min-height:60%; float:center; padding:0px">
<h3 id="form_head" style=' color:#FFFFFF; font-size:30px; background: linear-gradient(to right, #0099CC , #336699); '><center>Add Poll</center></h3><br><br><br>
	<form action ="<?php echo site_url().'/Poll/validate_topic';?>" method="post" name='pollform' id='pollfrom'>
	<table class='center' style='float:center'><center>
	<tr>
		<td> Topic Name</td>
		<td> <input type='text' name='topic' id='topic' placeholder='Topic' class="center1"  value='<?php echo set_value('topic', ''); ?>'></td>
		
		<td><?php echo form_error('topic');?></td>
	</tr>
	<tr>
		<td> description</td>
		<td><input type='text' name='description' id='description' class="center1" placeholder='description'  value='<?php echo set_value('description', ''); ?>'> </td>
		<td><?php echo form_error('description');?></td>
	</tr>
	<tr>
		<td> No of Choices</td>
		<td> <select  id ='choices' name='choices' class="center1" style="width:300px;">
				
				<?php for($a=2;$a<11;$a++){?>
				<option value="<?php echo $a;?>"  <?php echo set_select('choices', $a); ?>  ><?php echo $a;?></option>
				<?php } ?>
 				</select></td>
	</tr>
	<tr>
		<td><input type='submit' name='submit' value='Add' align='center'  class='submit'></td>
		<td></td>
	</tr>
	</center></table>			
	</form>			
				
</div>
</div>
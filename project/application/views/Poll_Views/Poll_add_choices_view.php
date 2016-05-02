<div class="body" style="width:79%; background-color: #efeff5; min-height:60%; padding:0px">
	<h3 id="form_head" style='color:#FFFFFF;  font-size:30px; background: linear-gradient(to right, #0099CC , #336699);'><center>Add Poll Choices</center></h3><br><br><br>
	<table class='center'>
	<tr>
		<td class='center'>Topic</td>
		<td style='width:40%'><?php  echo $topic; ?></td>
	</tr>
	<tr>
		<td class='center'>Description</td>
		<td style='width:40%'><?php  echo $des; ?></td>
	</tr>
	
	</table>
	
	<form action ="<?php echo site_url().'/poll/validate_choices/'.$tid.'/'.$choices.'/';?>" method="post"  name='pollform' id='pollfrom'>
	<table class='center'>
	
	<?php for ( $a=1; $a<=$choices; $a++ ){?>
	<tr>
		<td class='center'>option <?php echo$a; ?> </td>
		<td><input type='text' name='choice<?php echo "-".$a;?>' id='choice<?php echo "-".$a;?>' class='center1' placeholder=''  value='<?php echo set_value("choice-".$a, ''); ?>'></td>
		<td><?php echo form_error("choice-".$a);?></td>
	</tr>	
	<?php } ?>
	<tr>
		<td><input type='submit' name='submit' value='Add' align='center'  class='submit'></td>
		<td></td>
	</tr>
	</table>
	</form>


</div>
















,<style>
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
<script>
function check(){
	var checked=false;
	<?php
		for($b=0;$b<count($poll_choice);$b++){
	?>
			if(document.getElementById('<?php echo $poll_choice[$b]->id;?>').checked) {
				checked=true;
			}
	<?php
		}
	?>
	
	return checked;
}

</script>

<div class="body" style="width:79%; background-color: #efeff5; min-height:60%; padding:0px">
<h3 id="form_head" style='color:#FFFFFF; font-size:30px; background: linear-gradient(to right, #0099CC , #336699); float:center'><center>Polls</center></h3><br><br><br>
	
	<br/><br/>
	<?php
		for($a=0;$a<count($poll);$a++){
	?>
	<div style='padding-left: 50px; font-size:20px;'>
				<label style='padding-left: 30px;font-size:30px;' >poll:<?php echo $poll[$a]->name;?></label><br>
				<label style='padding-left: 50px;font-size:30px;'><?php echo $poll[$a]->description; ?></label>
	</div>	
	<form action ="<?php echo base_url().'index.php/Poll/vote_poll/'.$poll[$a]->id;;?>" method="post">
	<?php
		}
	?>
	
	
	<?php
		for($b=0;$b<count($poll_choice);$b++){
	?>
			<div style="width:50%; background-color: lightgreen; margin-top:5px;margin-left:10px; font-size:40px">
			<input type="radio" name="choice" id="<?php echo $poll_choice[$b]->id;?>" value="<?php echo $poll_choice[$b]->id;?>"  /> <label style='padding-left: 30px;font-size:30px;'><?php echo $poll_choice[$b]->name;?></label> <br>
			</div>
	
	<?php
		}
	?>
	<?php echo form_submit('submit', 'Vote', "onclick=\"return check();\" class='submit'"); ?>
	</form>
</div>
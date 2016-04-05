<div>
<div class="body" style="width:70%; background-color: #efeff5; min-height:60%; padding:0px; align:center;">
	<h3 id="form_head" style='color:#004444; font-size:30px; background: linear-gradient(to right, #5cd65c , #adebad); float:center'><center>Poll Results</center></h3><br><br><br>
	<?php
		for($a=0;$a<count($poll);$a++){
	?>
	<div style=' font-size:30px; background: linear-gradient(to right, #5cd65c , #adebad); width:100%; padding: 5px;'>
				poll:<?php echo $poll[$a]->name;?><br>
				&emsp;&emsp;<?php echo $poll[$a]->description; ?>
	</div>	
	
	<?php
		}
	?>
	
	<div class="body" style='background-color: #3CBC8D; width:100%;padding: 5px; float:center'>
	<?php
		for($b=0;$b<count($poll_result);$b++){
	?>
	<div style='width:<?php  if($poll_count[0]->count!=0){
							echo (100*$poll_result[$b]->count/$poll_count[0]->count);
						} 
						else 
						{ 
							echo(100*($poll_result[$b]->count/1)) ;
						} ?>%;  background: linear-gradient(to right, #5cd65c , #adebad);  float:center box-shadow: 0 4px 8px 0 ; color:#004444; min-width: 100px; border-radius: 0px 12px 12px 0px;padding-right:15px;'>
		
		<h1 ><?php echo $poll_result[$b]->count;?> <?php echo $poll_result[$b]->name;?> </h1> 
		
		
	</div>
	
	<?php
		}
	?>
	</div>
	
	
</div>
</div>
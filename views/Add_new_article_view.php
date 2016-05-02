<div class="body">
	
	<div class="content1">

	<h2 id="form_head2">Article Details</h2>
					
					<!--success message after inserting the article-->
					<?php if (isset($message)) { ?>
						<CENTER><h3 style="color:green;">Article Posted Successfully</h3></CENTER><br>
					<?php } ?>
			     
			     <div class="form_input">
			     	
			     	<?php
			     	//$hidden = array('postDate' => date("Y-m-d H:i:s"));
			     	echo form_open_multipart(site_url().'/Add_new_article/save_article/');
					
					?>
							<center>
							<table cellpadding="2" cellspacing="4" style="width: 80%">
								<tr>
									<td>
							<?php echo form_label('Headline');
							echo form_error('head_line');
							$data_head = array(
							'name' => 'head_line',
							'id' => 'head_line',
							'class' => 'input_box',
							'placeholder' => 'Heading of the Article'
							);?>
							</td>
							<td>
							<?php echo form_input($data_head);?></td></tr>
							
							<tr>
							<td>
							<?php echo form_label('Description');
							echo form_error('detail');
							echo "<div class='textarea_input'>";
							$data_det = array(
							'name' => 'detail',
							'rows' => 80,
							'cols' => 50
							);?>
							</td>
							<td>
							<?php echo form_textarea($data_det, set_value('detail'));
							echo "</div>";?></td></tr>
							
							<tr>
							<td>
							<?php echo form_label('Upload Image');
							echo "<div class='upload'>";
							$data_upload = array(
							'type' => 'file',
							'name' => 'file_upload',
							'value' => 'upload resume'
							);?>
							</td>
							<td>
							<?php echo form_upload($data_upload);
							echo "</div>";?></td></tr></table></center>
							</div>
							
							<center>
							<table cellpadding="2" cellspacing="4" style="width: 80%">
							<tr>
							<td>
							<!--create reset button-->
							<?php echo form_reset('reset', 'Reset', "class='submit2'"); ?>
							</td>
							<!--create submit button-->
							<td>
							<?php echo form_submit('submit', 'Submit', "class='submit2'"); ?>
							</td></tr></table>
							</center>
							<?php echo form_close();
							?>
							<!--end of form-->
							
		</div>
		
</div>
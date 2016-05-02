<div class="body">
	
	<!--form for add comment-->
				     <h2 id="form_head2">Add Comment Details</h2>
					
					<!--success message after inserting the feedback-->
					<?php if (isset($message)) { ?>
						<CENTER><h3 style="color:green;">Comment Posted</h3></CENTER><br>
					<?php } ?>
			     
			     <div class="form_input">
			     	
			     	<?php
			     	$hidden = array('cDate' => date("Y-m-d"));
			     	echo form_open('Add_comment/comment/'.$advertisement_id);
					//echo form_fieldset('Fill the details');
					?>
							<center>
							<table cellpadding="2" cellspacing="4" style="width: 80%">
								<tr>
									<td>
							<?php echo form_label('Name');
							echo form_error('cus_name');
							$data_name = array(
							'name' => 'cus_name',
							'id' => 'cus_name',
							'class' => 'input_box',
							'placeholder' => 'Please Enter Name'
							);?>
							</td>
							<td>
							<?php echo form_input($data_name);?></td></tr>
							
							<tr>
							<td>
							<?php echo form_label('Email-ID');
							echo form_error('cus_email');
							$data_email = array(
							'type' => 'email',
							'name' => 'cus_email',
							'id' => 'cus_email',
							'class' => 'input_box',
							'placeholder' => 'Please Enter Email'
							);?>
							</td>
							<td>
							<?php echo form_input($data_email);?></td></tr>
							
							<tr>
							<td>
							<?php echo form_label('Contact Number');
							echo form_error('cus_phone_num');
							$data_phone = array(
							'name' => 'cus_phone_num',
							'id' => 'cus_phone_num',
							'class' => 'input_box',
							'placeholder' => 'Phone Number'
							);?>
							</td>
							<td>
							<?php echo form_input($data_phone);?></td></tr>
							
							<tr>
							<td>
							<?php echo form_label('Comment');
							echo form_error('cus_fb');
							echo "<div class='textarea_input'>";
							$data_textarea = array(
							'name' => 'cus_fb',
							'rows' => 10,
							'cols' => 32
							);?>
							</td>
							<td>
							<?php echo form_textarea($data_textarea, set_value('cus_fb'));
							echo "</div>";?></td></tr></table></center>
							</div>
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
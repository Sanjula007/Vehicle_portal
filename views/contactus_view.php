<div class="body">
				<div id="featured">
					
					<div style="height:448px;float: right;top: -20px">
			<!--Javascript function for image slide-->
			<script type="text/javascript">
							var image1 = new Image()
							image1.src = "<?php echo base_url(); ?>images2/1.JPG"
							var image2 = new Image()
							image2.src = "<?php echo base_url(); ?>images2/2.JPG"
							var image3 = new Image()
							image3.src = "<?php echo base_url(); ?>images2/3.JPG"
							var image4 = new Image()
							image4.src = "<?php echo base_url(); ?>images2/4.JPG"
							var image5 = new Image()
							image5.src = "<?php echo base_url(); ?>images2/5.JPG"
							var image6 = new Image()
							image6.src = "<?php echo base_url(); ?>images2/6.JPG"
							</script>
							<img src="<?php echo base_url(); ?>images2/1.jpg" width="445" height="300" name="slide" 	style="opacity:1;padding-top: 40px" />
							<script type="text/javascript">
							var step=1;
							function slideit()
							{
							document.images.slide.src = eval("image"+step+".src");
							if(step<6)
							step++;
							else
							step=1;
							setTimeout("slideit()",2000);
							}
							slideit();
			</script>
			<!--end of function slideit-->
			
		</div>
		<h3>Contact Us - A2Z</h3>
		<p style="padding-left: 5px;">Welcome to our Online Taxi Rental System,
			a prolific call taxi service<br> in the city 
			of Kandy.
			 A diverse range of vehicles serving 
			 24X7 with<br> safety,
			  promptness and comfort as the primary point of operations<br> 
			  will enthrall you.
			   Usage of state of the art technologies in the<br>
			    operations has established a formidable
			    reputation throughout the<br> industry. 
			    Comfort, Safety, Reliability, Discipline,
			     Guidance and<br> Economy have been the guiding principles of us.</p>
			     <h5>We Warmly Welcome Customer Feedbacks</h5>
			     </div>
			     
			     <!--form for customer feedbacks-->
				     <h2 id="form_head2">FeedBack Details</h2>
					
					<!--success message after inserting the feedback-->
					<?php if (isset($message)) { ?>
						<CENTER><h3 style="color:green;">Feedback Sent Successfully</h3></CENTER><br>
					<?php } ?>
			     
			     <div class="form_input">
			     	
			     	<?php
			     	$hidden = array('cDate' => date("Y-m-d"));
			     	echo form_open('contactus/feedback',$hidden);
					echo form_fieldset('Fill the details');
					?>
							<center>
							<table cellpadding="2" cellspacing="4" style="width: 25%">
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
							<?php echo form_label('Feedback');
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
							echo "</div>";?></td></tr>
										
			     	
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
							<?php echo form_fieldset_close();
							form_close();
							?>
							<!--end of form-->
							
							
			     	
			     </div>
			     
			     
</div>
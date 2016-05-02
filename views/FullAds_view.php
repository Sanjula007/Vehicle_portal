<script type="text/javascript">
function hideshow(which){
	reportdiv.style.display="block"
	sendemaildiv.style.display="block"
	sendcommentdiv.style.display="block"
	
	if (!document.getElementById)
		return
	
	if (which.style.display=="block"){
		
		which.style.display="none"
	}
	else{
		
		which.style.display="block"
	}
}
</script>
<?php
	if(isset($report)){
		
		$report='block';
	}
	else{
		$report='none';
		
	}
	if(isset($sendmail)){
		
		$sendmail='block';
	}
	else{
		$sendmail='none';
		
	}
	if(isset($sendcom)){
		
		$sendcom='block';
	}
	else{
		$sendcom='none';
		
	}
	
?>

<style>

.tables{
	align:center;
	float:center;
	font-family: 'RokkittRegular';
	font-size:20px;
	font-weight:bold;
	color:#636363;
	margin:15px 0 0;
	line-height:21px;
	padding-left:40%
}
.tr .td{
	padding:10px;
}
</style>


<div align="center" class="body" style=" background-color: #efeff5; width:76%; min-height:100%; box-shadow:2px 2px 5px grey;">
    
		<div >
            
                <div >
				
					
					
                    <?php for ($i = 0; $i < count($vehicle); $i++) { ?>
					<div class="cover">
					<img src="<?php echo base_url()."/uploads/".$vehicle[$i]->image;?>" style="max-height: 300px;">
				</div>
				<p>
					
                 <table  align="center" class='tables' > 
				<tr >
                	<td><label class="title" style="color:#3CBC8D;">Vehicle</label></td>
                	<td><label class="title" style="color:#3CBC8D;">Information</label><br></td>
				</tr>
                <tr>
                	<td><label class="title">Category</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->category) ?></span><br></td>
				</tr>
				<tr>	
                	<td><label class="title">Brand</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->brand) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">Model</label></td>
                	<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->modelName) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">Year</label></td>
                	<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->year) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">Mileage</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->mileage) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">Condition</label></td>
                	<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->vCondition) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">fuels</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->fuel) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">price</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->price) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">transmission</label></td>
                	<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->transmission) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">description</label></td>
                	<td><span class="value" width='200px'><?php echo stripcslashes($vehicle[$i]->description) ?>
					</span></td><br>
				</tr>
				</table >
				<table align="center" class='tables'>
				<tr>
                	<td><label class="title" style="color:#3CBC8D;"><center>Owner</center></label></td>
                	<td><label class="title" style="color:#3CBC8D;">Information</label><br></td>
				</tr>
				<tr>	
                	<td><label class="title">Contact name</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uName) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">Contact Email</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uEmail) ?></span><br></td>
                </tr>
				<tr>	
                	<td><label class="title">Contact phone no</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uPhone) ?></span><br></td>
                </tr>	
				</table>
                </p>
                    
                </div>
            
        </div>
		
		<a href="javascript:hideshow(document.getElementById('reportdiv'))"><button class="submit">Contact with Email</button></a>
		<a href="javascript:hideshow(document.getElementById('sendemaildiv'))"><button class="submit">Report Adertisment</button></a>
		<a href="javascript:hideshow(document.getElementById('sendcommentdiv'))"><button class="submit">Comment</button></a>
		
		
		
		<div align="center" id="reportdiv"  style="display:<?php echo $report; ?>; background-color: #efeff5; width:76%; min-height:10%; float:center; box-shadow:2px 2px 5px grey; ">
		<form action ="<?php echo site_url().'/fullAds/report_ad/'.$vehicle[$i]->adID;?>" method="post"  class="form_input" name='reportform' id='reportform'>
			<h3><center>Report the Adertisment</center><h3>

			<table   >
			<tr>
				<td> <p class='center' >Your Email</p></td>
				<td> <input type='email' name='remail' id='remail' placeholder='Your Email' class='input_box' style="width:250px;" value='<?php echo set_value('remail', ''); ?>'></td>
				<td style="width:210px;  " ><h6 style='color:red'><?php echo form_error('remail'); ?></h6></td>
			</tr>
			
			
			<tr>
				<td> <p class='center' >Reason</p></td>
				<td><select class ='input_box' id ='reason' name='reason' style="width:250px;"">
				<option value="select" <?php echo set_radio('reson', 'select', TRUE); ?>>Select a reason</option>
				<option value="Sold/Unavailable" <?php echo set_radio('reson', 'Sold/Unavailable'); ?>>Sold/Unavailable</option>
				<option value="Spam" <?php echo set_radio('reson', 'Spam'); ?>>Spam</option>
				<option value="Duplicate" <?php echo set_radio('reson', 'Duplicate'); ?>>Duplicate</option>
				<option value="Other" <?php echo set_radio('reson', 'Other'); ?>>Other</option>
 				</select></td>
			</tr>
			
			<tr>
				<td> <p class='center' >Message</p></td>
				<td> <textarea name='message' id='message' placeholder='Message' class='input_box' style="width:250px;" rows="4" cols="100" ><?php echo set_value('message', ''); ?></Textarea></td>
				<td style="width:210px;  "> <?php echo form_error('message'); ?></td>
			</tr>
			<tr ><td><input type='submit' name='submit' value='Submit' align='center' style="float:center; height:30px;" class='submit'></td><td></td></tr>
			</table>
		</form>
	</div>
	
	<div align="center" id="sendemaildiv"  style="display:<?php echo $sendmail; ?>; background-color: #efeff5; width:76%; min-height:10%; float:center; box-shadow:2px 2px 5px grey; ">
		<form action ="<?php echo site_url().'/fullAds/contect_adowner_email/'.$vehicle[$i]->adID;?>" class="form_input" method="post" name='reportform' id='reportform' class="form_input">
			
			<h3><center>Contact Vehicle Owner</center><h3>
			<table  >
			<tr>
				<td> <p class='center' >Your Name</p></td>
				<td> <input type='text' name='name' id='name' placeholder='Your Name' class='input_box' style="width:250px;" value='<?php echo set_value('name', ''); ?>'></td>
				<td style="width:210px;  "><?php echo form_error('name'); ?></td>
			</tr>
			
			<tr>
				<td> <p class='center' >Your Email</p></td>
				<td> <input type='email' name='email' id='email' placeholder='Your Email' class='input_box' style="width:250px;" value='<?php echo set_value('email', ''); ?>'></td>
				<td style="width:210px;  "><?php echo form_error('email'); ?></td>
			</tr>
			
			<tr>
				<td> <p class='center' >Your phone No</p></td>
				<td> <input type='tex' name='phone' id='phone' placeholder='Your phone no' class='input_box' style="width:250px;" value='<?php echo set_value('phone', ''); ?>'></td>
				<td style="width:210px;  "><?php echo form_error('phone'); ?></td>
			</tr>
			
			
			
			<tr>
				<td> <p class='center' >Message</p></td>
				<td> <textarea name='emessage' id='emessage' placeholder='Message' class='input_box' style="width:250px;" rows="4" cols="100" ><?php echo set_value('emessage', ''); ?></Textarea></td>
				<td style="width:210px;  "><?php echo form_error('emessage'); ?></td>
			</tr>
			<tr>
				<td> <p class='center' >To</p></td>
				<td> <input type="text" readonly="readonly" name='toemail' id='toemail'  class='input_box' style="width:250px;" value='<?php echo stripcslashes($vehicle[$i]->uEmail) ?>'/></td>
				<td style="width:210px;  "><?php echo form_error('emessage'); ?></td>
			</tr>
			<tr ><td><input type='submit' name='submit' value='Submit' align='center' style="float:center; height:30px;" class='submit'></td><td></td></tr>
			</table>
		</form>
	</div>
	
	
	<div align="center" id="sendcommentdiv"  style="display:<?php echo $sendcom; ?>; background-color: #efeff5; width:76%; min-height:10%; float:center; box-shadow:2px 2px 5px grey; ">
			<h2 id="form_head2">Add Comment Details</h2>
					
					<!--success message after inserting the feedback-->
					<?php if (isset($message)) { ?>
						<CENTER><h3 style="color:green;">Comment Posted</h3></CENTER><br>
					<?php } ?>
			     
			     <div class="form_input">
			     	
			     	<?php
			     	$hidden = array('cDate' => date("Y-m-d"));
			     	echo form_open('Add_comment/comment/'.$vehicle[$i]->adID);
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
		<?php } ?>




			<?php for ($i = 0; $i < count($comments); $i++) { ?>
			     <center>
			     	<div class="address martop" >
            			<div class="panel2">
              				<div class="title2">
                				<h1><?php echo stripcslashes($comments[$i]->adUserName) ?> Says, </h1>
              				</div>
							
							<div class="content2">
								<p style="font-weight: bolder; font-size: large"><?php echo stripcslashes($comments[$i]->adUserComment)  ?><br /></p>
								<p class="padTop"><span>Contact Number :	0123456789</span>
								<!--<p class="padTop"><span>Contact Number :	</span><?php echo stripcslashes($comments[$i]->adUserPhone) ?>--> 
								<span style="padding-left: 20px">Email :	</span><?php echo stripcslashes($comments[$i]->adUserEmail) ?> 
								<span class="" style="text-decoration: underline;font-style: italic; padding-left: 20px">Posted on :	<?php echo stripcslashes($comments[$i]->adUserDate) ?></span> </p>
                
								<!--<form action="<?php echo site_url('Edit_info/delete_feedback/'.($cusFeedbacks[$i]->fID)) ?>" style="text-align: right" method="post" onsubmit="return(confirmDelete());">
								<input type="submit" align="right" class="btn-class" value="Delete"/>
								</form>-->
							</div>
            			</div>
				</div>
		<?php } ?>
			</center>
							
</div

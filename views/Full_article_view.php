<script type="text/javascript">
function hideshow(which){
	commentdiv.style.display="block"
	sendemaildiv.style.display="block"
	
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
	if(isset($commnt)){
		
		$commnt='block';
	}
	else{
		$commnt='none';
		
	}
	if(isset($sendmail)){
		
		$sendmail='block';
	}
	else{
		$sendmail='none';
		
	}
	
?>



<!--<div class="body">-->
				<!--<div id="featured" style="height: auto">-->
					<?php for ($i = 0; $i < count($full_article); $i++) { ?>
					<div style="height:420px;padding-top: 30px">
						<center>
						<img src="<?php echo base_url()."/uploads/".$full_article[$i]->art_image; ?>" style="max-height:400px;border-radius:15px;outline:thick;">
						</center>
					</div>
					
					<div id="art">			
						<h3><center><?php echo stripcslashes($full_article[$i]->heading) ?></center></h3>
						<h6>Date Posted :: on <?php echo str_replace(" ", "  at : ", stripcslashes($full_article[$i]->postDate)) ?></h6>
					<p style="padding-left: 5px;"><?php echo ($full_article[$i]->detail) ?></p>
			     
				<!--<form action="<?php echo site_url('Article_comment/index/'.$full_article[$i]->artID)?>" style="text-align: right" method="post";">
                	<input type="submit" align="right" class="btn-class" value="Comment"/>
                </form>-->
			     </div>
				 
				 <a href="javascript:hideshow(document.getElementById('commentdiv'))"><button align="right" class="btn-class">Comment</button></a>
				 
				 
				 
				 <div align="center" id="commentdiv"  style="display:<?php echo $commnt; ?>; background-color: #efeff5; width:76%; min-height:10%; float:center; box-shadow:2px 2px 5px grey; ">
					<h2 id="form_head2">Add Comment Details</h2>
					
					<!--success message after inserting the feedback-->
					<?php if (isset($message)) { ?>
						<CENTER><h3 style="color:green;">Comment Posted</h3></CENTER><br>
					<?php } ?>
			     
						 <div class="form_input">
							
							<?php
							$hidden = array('cDate' => date("Y-m-d"));
							echo form_open('Article_comment/comment/'.$full_article[$i]->artID);
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
									<?php echo form_submit('submit', 'Submit', "class='submit2'" ); ?>
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
									<h1><?php echo stripcslashes($comments[$i]->usrName) ?> Says, </h1>
								</div>
							<div class="content2">
								<p style="font-weight: bolder; font-size: large"><?php echo stripcslashes($comments[$i]->usrComment)  ?><br /></p>
								<p class="padTop"><span>Contact Number :	0123456789</span> 
								<!--<p class="padTop"><span>Contact Number :	</span><?php echo stripcslashes($comments[$i]->usrPhone) ?>--> 
								<span style="padding-left: 20px">Email :	</span><?php echo stripcslashes($comments[$i]->usrEmail) ?> 
								<span class="" style="text-decoration: underline;font-style: italic; padding-left: 20px">Posted on :	<?php echo stripcslashes($comments[$i]->usrDate) ?></span> </p>
							
								<!--<form action="<?php echo site_url('Edit_info/delete_feedback/'.($cusFeedbacks[$i]->fID)) ?>" style="text-align: right" method="post" onsubmit="return(confirmDelete());">
								<input type="submit" align="right" class="btn-class" value="Delete"/>
								</form>-->
							</div>
							</div>
						</div>
					</center>
	<?php } ?>
	
<!--<div class="address martop">
            <div class="panel2">
              <div class="title2">
                <h1><?php ?>hai Says, </h1>
              </div>
           	  <div class="content2">
                <p style="font-weight: bolder; font-size: large"><?php  ?> this is msg<br /></p>
                <p class="padTop"><span>Contact Number :23566	</span><?php  ?> 
                <span style="padding-left: 20px">Email : jdhhjgds	</span><?php ?> 
                <span class="" style="text-decoration: underline;font-style: italic; padding-left: 20px">Posted on :	<?php  ?></span> </p>
                
                <!--<form action="<?php echo site_url('Edit_info/delete_feedback/'.($cusFeedbacks[$i]->fID)) ?>" style="text-align: right" method="post" onsubmit="return(confirmDelete());">
                	<input type="submit" align="right" class="btn-class" value="Delete"/>
                </form>
              </div>
            </div>
	</div>-->
</div>
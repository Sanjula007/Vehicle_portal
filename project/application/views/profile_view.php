<div class="row placeholders">
			<div class="col-xs-13 col-sm-50 placeholder">
<div id="container">
<div id="wrapper">

		
		<div class="row placeholders">
			<div class="col-xs-13 col-sm-9 placeholder">
				<h1> Admin Profile Manage </h1>
				
				<?php
					
					$user=$this->session->flashdata('flash_username');
					$data['users'] = $this->profile_model->show_user_details($user);
					
					echo '<div class="error_msg">';
					echo validation_errors();
					echo "</div>";
					
					//echo form_open('ci_email_tutorial/send_mail');
					echo form_label('First Name');
					echo "<div class='all_input'>";
					/*foreach ($users as $user):
						$value=$user->Firstname;
					endforeach;*/
					$data_email = array(
					'name' => 'fname',
					'id' => 'fname',
					'class' => 'input_box',
					//'value' => $value
					);
					echo form_input($data_email);
					echo "</div>";
					
					
					echo form_label('Last Name');
					echo "<div class='all_input'>";
					/*foreach ($users as $user):
						$value=$user->Lastname;
					endforeach;*/
					$data_email = array(
					'name' => 'lname',
					'id' => 'lname',
					'class' => 'input_box',
					//'value' => $value
					);
					echo form_input($data_email);
					echo "</div>";
					
					echo form_label('Email');
					echo "<div class='all_input'>";
					/*foreach ($users as $user):
						$value=$user->Email;
					endforeach;*/
					$data_email = array(
					'name' => 'email',
					'class' => 'input_box',
					//'value' => $value
					);
					echo form_input($data_email);
					echo "</div>";
					
					echo form_label('Username');
					echo "<div class='all_input'>";
					/*foreach ($users as $user):
						$value=$user->Username;
					endforeach;*/
					$data_email = array(
					'type' => 'un',
					'name' => 'un',
					'class' => 'input_box',
					//'value' => $value
					);
					echo form_input($data_email);
					echo "</div>";
					
				?>
				
				<div class="col-xs-13 col-sm-4 placeholder">
				<br><input type="submit" value=" Update " name="submit">
				</form>
				</div>
				<div class="col-xs-13 col-sm-10 placeholder">
				<li><a href="<?php echo base_url('index.php/profile_ctrl/change_password')?>">Change Password</a></li>
				<li><a href="<?php echo base_url('index.php/update_ctrl/index')?>">Upload Photo</a></li>
				</div>
			</div>
		</div>
	</body>
</html>
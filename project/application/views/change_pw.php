<div class="row placeholders">
			<div class="col-xs-13 col-sm-9 placeholder">
				<br><br><h1> Admin Registration form </h1>
				<?php
				    echo form_open('user_authentication/new_user_registration');
					
					echo form_label('Previous password : ');
					echo form_input('ppw');
					echo form_error('ppw'); 
					echo"<br/>";
					
					echo form_label('New Password : ');
					echo form_input('npw');
					echo form_error('npw');
					echo"<br/>";
				?>
			</div>
</div>
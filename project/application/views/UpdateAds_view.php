<style>
td{
	style="width:200px
	
}
</style>
<script>
function checkUpdate() {
    return confirm("Do you want to Update the ad..!") 
}
</script>

<div class="body">
	
	<div class="content">
	<h2 id="form_head">Vehicle Information</h2>
	
	<div class="form_input" style="background-color:lightgrey; ">
	<?php for ($i = 0; $i < count($adsdata); $i++) { 
		echo form_open_multipart('UpdateAds/error/'.$adsdata[$i]->adID);
	?>
	<form method="post" onSubmit="checksubmit()">
		<?php
			
				
				$dataid = array(
				'name' => 'ad_ID',
				'value'=> $adsdata[$i]->adID,
				'id' => 'ad_ID',
				'class' => 'input_box',
				
				'type'=>'hidden'
				);
				echo form_input($dataid);
			?>	
				
				<table style='padding-left :10%'>   
									<tr>
										<td style="width:200px"><label class="title">Category</label></td>
										<td><span class="value"><?php echo stripcslashes($adsdata[$i]->category) ?></span><br></td>
									</tr><tr>	
										<td><label class="title">Brand</label></td>
										<td><span class="value"><?php echo stripcslashes($adsdata[$i]->brand) ?></span><br></td>
									</tr><tr>	
										<td><label class="title">Model</label></td>
										<td><span class="value"><?php echo stripcslashes( $adsdata[$i]->modelName) ?></span><br></td>
									</tr><tr>	
										<td><label class="title">Year</label></td>
										<td><span class="value"><?php echo stripcslashes( $adsdata[$i]->year) ?></span><br></td>
									</tr><tr>	
										<td><label class="title">Mileage</label></td>
										<td><span class="value"><?php echo stripcslashes($adsdata[$i]->mileage) ?></span><br></td>
									</tr><tr>	
										<td><label class="title">Condition</label></td>
										<td><span class="value"><?php echo stripcslashes( $adsdata[$i]->vCondition) ?> </span><br></td>
									</tr><tr>	
										<td><label class="title">Fuel</label></td>
										<td><span class="value"><?php echo stripcslashes($adsdata[$i]->fuel) ?></span><br></td>
									</tr></td><br>
									</tr>	
				</table>
			<?php 
			
			
			echo form_fieldset('Good Description Make Buyers Good Impression');?>
			<table cellpadding="2" cellspacing="4" class="form_table" style="width: 75%">
				<tr>
			<td>		
			<?php echo form_label('Description');
			
			echo "<div class='textarea_input'>";
			$data_des = array(
			'name' => 'description',
			'value' => $adsdata[$i]->description,
			'rows' => 12,
			'cols' => 50
			);?>
			</td>
			<td>
			<?php echo form_textarea($data_des, set_value('description'));
			echo form_error('description','<h3 style=\'color: red;\'>','</h3>');
			echo "</div>";?></td></tr></table>
			<?php echo form_fieldset_close();
			
			
			echo form_fieldset('Expecting Selling Price');?>
			<table cellpadding="2" cellspacing="4" class="form_table" style="width: 130%">
				<tr>
					<td>
			<?php echo form_label('Price');
			
			$data_price = array(
			'name' => 'price',
			'id' => 'price',
			'value' => $adsdata[$i]->price,
			'class' => 'input_box',
			'placeholder' => 'Price'
			);?>
			</td>
			<td>
			<?php echo form_input($data_price, set_value('price'));
			echo form_error('price','<h3 style=\'color: red;\'>','</h3>');?></td></tr></table>
			<?php echo form_fieldset_close();
			
			echo form_fieldset('Vehicle Image');?>
			<table cellpadding="2" cellspacing="4" class="form_table" style="width: 70%">
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
			echo "</div>";?></td></tr></table>
			
			<div class="cover">
					<img src="<?php echo base_url()."/uploads/".$adsdata[$i]->image; ?>" height="200" width="300">
				</div>
			<?php echo form_fieldset_close();
			?>
			</div>
			
			
			<h2 id="form_head">Your Information</h2>
			<div class="form_input" style="background-color:lightgrey; >
			<?php
			echo'<h2 id="form_head">Your Information</h2>';
			echo form_fieldset('Seller Name');						
			echo '<table><tr><td style=\'width:200px\'>'.form_label('Name');
			
			$data_name = array(
			'name' => 'usr_name',
			'value'=> $adsdata[$i]->uName,
			'id' => 'usr_name',
			'class' => 'input_box',
			'placeholder' => 'Please Enter Name'
			);
			echo '</td><td>'.form_input($data_name);
			echo form_error('usr_name','<h3 style=\'color: red;\'>','</h3>').'</td></tr></table>';
			echo form_fieldset_close();
			
			
			echo form_fieldset('Seller Email ID');
			echo '<table><tr><td style=\'width:200px\'>'.form_label('Email-ID');
			
			$data_email = array(
			'type' => 'email',
			'value'=> $adsdata[$i]->uEmail,
			'name' => 'usr_email',
			'id' => 'usr_email',
			'class' => 'input_box',
			'placeholder' => 'Please Enter Email'
			);
			echo '</td><td>'.form_input($data_email);
			echo form_error('usr_email','<h3 style=\'color: red;\'>','</h3>').'</td></tr></table>';
			echo form_fieldset_close();
			
			echo form_fieldset('Seller Contact Number');
			echo '<table><tr><td style=\'width:200px\'>'.form_label('Contact Number');
			
			$data_phone = array(
			'name' => 'phone_num',
			'value'=> $adsdata[$i]->uPhone,
			'id' => 'phone_num',
			'class' => 'input_box',
			'placeholder' => 'Phone Number'
			);
			echo '</td><td>'.form_input($data_phone);echo form_error('phone_num','<h3 style=\'color: red;\'>','</h3>').'</td></tr></table>';;
			echo form_fieldset_close();
			
			echo form_fieldset('Vehicle Inspection Location');
			echo form_label('Address');
			
			echo "<div class='textarea_input'>";
			$data_textarea = array(
			'name' => 'address',
			'id' => 'address',
			'value'=> $adsdata[$i]->uAddress,
			'rows' => 5,
			'cols' => 32
			);
			echo form_textarea($data_textarea);
			echo form_error('address','<h3 style=\'color: red;\'>','</h3>');
			echo "</div>";
			echo form_fieldset_close();
			?>
			
			
			<!--<div id="form_button">-->
			
			<!--<div id="form_button">-->

			<!--create reset button-->
			<table cellpadding="2" cellspacing="4" style="width: 100%">
				<tr>
					<td>
			<?php echo form_reset('reset', 'Reset', "class='submit'"); ?>
			</td>
			<!--create submit button-->
			<td>
			<?php echo form_submit('submit', 'Submit', "onclick=\"return checkUpdate();\" class='submit'"); ?>
			
			</td></tr></table>
			
			</div>
			
			
			<?php echo form_close(); 
			} // end of for loop
			?>
			
			</div>
			
</div>
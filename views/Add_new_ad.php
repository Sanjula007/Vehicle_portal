<div class="body">
	
	<div class="content1">
	<h2 id="form_head">Vehicle Information</h2>
			<!--showing success message after inserted the ad details-->
			<?php if (isset($message)) { ?>
			<CENTER><h3 style="color:green;">Data Inserted Successfully. Your Ad will be Post in 48 hours.</h3></CENTER><br>
			<?php } ?>
	
	
	<!--show the insert details form-->
	<div class="form_input">
		<?php
		
			
			echo form_open_multipart('Add_new_ad/error');
			?>
			<center>
			<table cellpadding="15" cellspacing="2" class="form_table" style="width: 50%">
				<tr>
					<td>
			<?php echo form_label('Category');
			echo form_error('select_cat');
			?>
			</td>
			<td>
				<?php echo form_dropdown('select_cat', $categories,'Please Select', 'class="dropdown_box"');?>
			</td></tr>
			
			<tr>
					<td>
			<?php echo form_label('Brand');
			echo form_error('select_mod');
			$data_model = array(
			'Brand*' => 'Brand*',
			'Alfa Romeo' => 'Alfa Romeo',
			'Aston Martin' => 'Aston Martin',
			'Ashok Leyland' => 'Ashok Leyland',
			'Audi' => 'Audi',
			'Austin' => 'Austin',
			'BMW' => 'BMW',
			'Buick' => 'Buick',
			'Cadillac' => 'Cadillac',
			'Changan' => 'Changan',
			'Cherry' => 'Cherry',
			'Chevrolet' => 'Chevrolet',
			'Chrysler' => 'Chrysler',
			'Citroen' => 'Citroen',
			'Daewoo' => 'Daewoo',
			'Daihatsu' => 'Daihatsu',
			'Datsun' => 'Datsun',
			'Dodge' => 'Dodge',
			'Ferrari' => 'Ferrari',
			'Fiat' => 'Fiat',
			'Ford' => 'Ford',
			'Geely' => 'Geely',
			'GMC' => 'GMC',
			'Hino' => 'Hino',
			'Honda' => 'Honda',
			'Hyundai' => 'Hyundai',
			'Hummer' => 'Hummer',
			'Isuzu' => 'Isuzu',
			'Jaguar' => 'Jaguar',
			'Jeep' => 'Jeep',
			'Kia' => 'Kia',
			'Lamborgini' => 'Lamborgini',
			'Land Rover' => 'Land Rover',
			'Lexus' => 'Lexus',
			'Lincoln' => 'Lincoln',
			'Mahindra' => 'Mahindra',
			'Maryti' => 'Maryti',
			'Mazda' => 'Mazda',
			'Mercedez-Benz' => 'Mercedez-Benz',
			'MG' => 'MG',
			'Micro' => 'Micro',
			'Mini' => 'Mini',
			'Mitsubishi' => 'Mitsubishi',
			'Morris' => 'Morris',
			'Moto Guzzi' => 'Moto Guzzi',
			'Nissan' => 'Nissan',
			'Opel' => 'Opel',
			'Perodua' => 'Perodua',
			'Peugeot' => 'Peugeot',
			'Plymouth' => 'Plymouth',
			'Pontiac' => 'Pontiac',
			'Porsche' => 'Porsche',
			'Proton' => 'Proton',
			'Renault' => 'Renault',
			'Rover' => 'Rover',
			'SAAB' => 'SAAB',
			'Scion' => 'Scion',
			'Seat' => 'Seat',
			'Skoda' => 'Skoda',
			'Smart' => 'Smart',
			'Ssang Yong' => 'Ssang Yong',
			'Subaru' => 'Subaru',
			'Suzuki' => 'Suzuki',
			'Tata' => 'Tata',
			'Toyota' => 'Toyota',
			'Vauxhall' => 'Vauxhall',
			'Volkswagon' => 'Volkswagon',
			'Volvo' => 'Volvo',
			'Zoyte' => 'Zoyte',
			'Other Model' => 'Other Model'
			);?>
			</td>
			<td>
			<?php echo form_dropdown('select_mod', $data_model, 'Brand*', 'class="dropdown_box"');?></td></tr>
			
			
			
				<tr>
					<td>
			<?php echo form_label('Model');
			echo form_error('model_name');
			$data_model = array(
			'name' => 'model_name',
			'id' => 'model_name',
			'class' => 'input_box',
			'placeholder' => 'Model Of The Vehicle'
			);?>
			</td>
			<td>
		
			<?php echo form_input($data_model, set_value('model_name'));?></td></tr>
			
			
			
			
				<tr>
					<td>
			<?php echo form_label('Model Year');
			echo form_error('model_year');
			$data_model_year = array(
			'name' => 'model_year',
			'id' => 'model_year',
			'class' => 'input_box',
			'placeholder' => 'Year Of Manufacture'
			);?>
			</td>
			<td>
			<?php echo form_input($data_model_year,set_value('model_year'));?></td></tr>
			
			
			<tr>
				<td>
			<?php echo form_label('Condition');
			echo form_error('select');
			$data_condition = array(
			'Condition' => 'Condition',
			'Brand New' => 'Brand New',
			'Used' => 'Used'
			);?>
			</td>
			<td>
			<?php echo form_dropdown('select', $data_condition, 'Condition', 'class="dropdown_box"');?></td></tr>
			
			
				<tr>
					<td>
			<?php echo form_label('Mileage');
			echo form_error('mileage');
			$data_mileage = array(
			'name' => 'mileage',
			'id' => 'mileage',
			'class' => 'input_box',
			'placeholder' => 'Mileage'
			);?>
			</td>
			<td>
			<?php echo form_input($data_mileage, set_value('mileage'));?></td></tr>
			
				<tr>
					<td>
			<?php echo form_label('Transmission');
			echo "<div id = \"radio_list\">";
			$data_radio1 = array(
			'name' => 'trans',
			'value' => 'Manual',
			'checked' => TRUE,
			);
			
			$data_radio2 = array(
			'name' => 'trans',
			'value' => 'Automatic',
			);?>
			</td>
			<td>
			<?php echo form_radio($data_radio1);echo form_label('Manual');
			echo form_radio($data_radio2);echo form_label('Automatic');
			echo "</div>";?></td></tr>
			
				<tr>
					<td>
			<?php echo form_label('Fuel Type');
			echo "<div id = \"radio_list\">";
			$data_fuel1 = array(
			'name' => 'fuel',
			'value' => 'Diesel',
			'checked' => TRUE,
			);
			
			$data_fuel2 = array(
			'name' => 'fuel',
			'value' => 'Petrol',
			);?>
			</td>
			<td>
			<?php echo form_radio($data_fuel1);echo form_label('Diesel');
			echo form_radio($data_fuel2);echo form_label('Petrol');
			echo "</div>";?></td></tr>
			
				<tr>
				<td>	
			<?php echo form_label('Description');
			echo form_error('description');
			echo "<div class='textarea_input'>";
			$data_des = array(
			'name' => 'description',
			'rows' => 12,
			'cols' => 50
			);?>
			</td>
			<td>
			<?php echo form_textarea($data_des, set_value('description'));
			echo "</div>";?></td></tr>
			
				<tr>
					<td>
			<?php echo form_label('Price');
			echo form_error('price');
			echo "<div class='textarea_input'>";
			$data_price = array(
			'name' => 'price',
			'id' => 'price',
			'class' => 'input_box',
			'placeholder' => 'Price'
			);?>
			</td>
			<td>
			<?php echo form_input($data_price, set_value('price'));echo"</div>"?></td></tr>
			
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
			</center>
			</div>
			
			
			<h2 id="form_head">Your Information</h2>
			<div class="form_input">
			
			<center>
			<table cellpadding="2" cellspacing="2" class="form_table" style="width: 80%">
				<tr>
					<td>
			<?php echo form_label('Name');
			echo form_error('usr_name');
			$data_name = array(
			'name' => 'usr_name',
			'id' => 'usr_name',
			'class' => 'input_box',
			'placeholder' => 'Please Enter Name'
			);?>
			</td>
			<td>
			<?php echo form_input($data_name, set_value('usr_name'));?></td></tr>
			
				<tr>
					<td>
			<?php echo form_label('Email-ID');
			echo form_error('usr_email');
			$data_email = array(
			'type' => 'email',
			'name' => 'usr_email',
			'id' => 'usr_email',
			'class' => 'input_box',
			'placeholder' => 'Please Enter Email'
			);?>
			</td>
			<td>
			<?php echo form_input($data_email, set_value('usr_email'));?></td></tr>
			
				<tr>
					<td>
			<?php echo form_label('Contact Number');
			echo form_error('phone_num');
			$data_phone = array(
			'name' => 'phone_num',
			'id' => 'phone_num',
			'class' => 'input_box',
			'placeholder' => 'Phone Number'
			);?>
			</td>
			<td>
			<?php echo form_input($data_phone, set_value('phone_num'));?></td></tr>
			
				<tr>
					<td>
			<?php echo form_label('Address');
			echo form_error('address');
			echo "<div class='textarea_input'>";
			$data_textarea = array(
			'name' => 'address',
			'rows' => 5,
			'cols' => 32
			);?>
			</td>
			<td>
			<?php echo form_textarea($data_textarea, set_value('address'));
			echo "</div>";?></td></tr></table>
			</center>
			
			</div>
			
			
			<!--create reset button-->
			<table cellpadding="2" cellspacing="4" style="width: 100%">
				<tr>
					<td>
			<?php echo form_reset('reset', 'Reset', "class='submit'"); ?>
			</td>
			<!--create submit button-->
			<td>
			<?php echo form_submit('submit', 'Submit', "class='submit'"); ?>
			</td></tr></table>
			
			</div>
			
			
			<?php echo form_close(); ?>
			
			</div> <!--form close-->
			
</div>
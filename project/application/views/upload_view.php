<html>
<head>
<title>Upload Form</title>
</head>
<body>
<div class="body">
	
	<div class="content">
	<h2 id="form_head">Vehicle Information</h2>
	<div class="form_input">
	<?php for ($i = 0; $i < count($adsdata); $i++) { ?>
	<form method="post" action="<?php echo base_url() . "index.php/updateAds/updateAll/".$adsdata[$i]->adID;?>">
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
				
				<table>   
									<tr>
										<td><label class="title">Category</label></td>
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
										<td><span class="value"><?php echo stripcslashes( $adsdata[$i]->vCondition) ?> hp</span><br></td>
									</tr><tr>	
										<td><label class="title">fuels</label></td>
										<td><span class="value"><?php echo stripcslashes($adsdata[$i]->fuel) ?></span><br></td>
									</tr></td><br>
									</tr>	
				</table>
			<?php
			echo form_fieldset('Good Description Make Buyers Good Impression');
			echo form_label('Description');
			echo form_error('description');
			echo "<div class='textarea_input'>";
			$data_des = array(
			'name' => 'description',
			'id' => 'description',
			'value'=> $adsdata[$i]->description,
			'rows' => 15,
			'cols' => 45
			);
			echo form_textarea($data_des);
			echo "</div>";
			echo form_fieldset_close();
			
			
			echo form_fieldset('Expecting Selling Price');
			echo form_label('Price');
			echo form_error('price');
			$data_price = array(
			'name' => 'price',
			'value'=> $adsdata[$i]->price,
			'id' => 'price',
			'class' => 'input_box',
			'placeholder' => 'Price'
			);
			echo form_input($data_price);
			echo form_fieldset_close();

			//echo $error;?>

<?php echo form_open_multipart('upload/do_upload/53');
echo '<form method="post" action="'; echo base_url() ; echo "index.php/upload/do_upload/53";echo'">';
echo'<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>';
	}
	?>
</body>

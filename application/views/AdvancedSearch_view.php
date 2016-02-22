
<style>
td{
	 width: 25px;
	 
		
}

.center1 {
	float:center;
	align:center;
	border-radius: 5px;
   // margin: auto;
    //width:100px;
    border: 3px solid black;
    padding:0px;
	font-family: 'RokkittRegular';
	font-size:15px;
	font-weight:bold;
	color:#f78117;
	//margin:15px 0 0;
	//line-height:15px;
}

.center {
	float:center;
	align:center;
	border-radius: 5px;
   // margin: auto;
    //width: 30%;
    //border: 3px solid #f78117;
    padding: 0px;
	font-family: 'RokkittRegular';
	font-size:21px;
	font-weight:bold;
	color:#f78117;
	//margin:15px 0 0;
	//line-height:21px;
}
.td .tr{
width:30%;
}

</style>

<?php
$data_model = array(
			
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
			);
?>

<div  >

	<form action ="<?php echo site_url().'/allAds/advancedSearch';?>" method="post" name='searchform' id='searchform'>
	<table  class="center1" style=" background-color:#909090 ;width:80%; max-widht:100%;min-height:350px"><tr  style="width: 100%;"><td  >
	<center><h3 style='font-size:30px'>Advanced Search</h3>
	<table table align='center' class="center" style='max-widht:100%'>
		
		<tr >
			<td><p class='center'  >Category</p></td>
			
			<td><select class ='center1' id ='category' name='category' style="width:140px;">
				<option value="All" <?php echo set_select('category', 'All', TRUE); ?>>All</option>
				<?php for($a=0;$a<count($category);$a++){?>
				<option value="<?php echo $category[$a]->name;?>"  <?php echo set_select('category', $category[$a]->name); ?>><?php echo $category[$a]->name;?></option>
				<?php } ?>
 				</select></td>
			<td></td>
		</tr>	
		
		<tr class="title">
			<td><p class='center' >Brand</p></td>
			<td><select class ='center1' id ='brand' name='brand' style="width:140px;">
				<option value="All" <?php echo set_select('brand', 'All', TRUE); ?>>All</option>
				<?php foreach($data_model as $x=> $y){?>
				<option value="<?php echo $x;?>"  <?php echo set_select('brand', $x); ?>> <?php echo $y;?></option>
				<?php } ?>
 				</select></td>
			<td></td>
		</tr>
		<tr class="title">
			<td><p class='center' >Model</p></td>
			<td><input type='text' name='model' id='model' placeholder='Model' class='center1' style="width:140px;" value='<?php echo set_value('model', ''); ?>'></td>
			<td></td>
		</tr>
		<tr class="title">
			<td><p class='center' >Year</p></td>
			<td><select class ='center1' id ='min_year' name='min_year' style="width:140px;">
				
				<?php for($year=date('Y');$year>=1900;$year--){?>
				<option value="<?php echo $year;?>" <?php echo set_select('min_year',$year); ?>><?php echo $year;?></option>
				<?php } ?>
 				</select></td>
			<td><select class ='center1' id ='max_year' name='max_year' style="width:140px;">
				
				<?php for($year=date('Y');$year>=1900;$year--){?>
				<option value="<?php echo $year;?>" <?php echo set_select('max_year', $year); ?>><?php echo $year;?></option>
				<?php } ?>
 				</select></td>
		</tr>
		<tr class="title">
			<td><p class='center'>Price</p></td>
			<td><input type='text' name='min_price' id='min_price' placeholder='min Price' value='<?php echo set_value('min_price', '0'); ?>' class='center1' style="width:140px;"></td>
			<td><input type='text' name='max_price' id='max_price' placeholder='max Price' value='<?php echo set_value('max_price', '0'); ?>' class='center1' style="width:140px;"></td>
		</tr>
		<tr><td></td><td><?php echo form_error('min_price').'</td><td>'; echo form_error('max_price'); ?></td></tr>
		<tr>
		<td><p class='center' >Condition</p></td>
		<td><input type="radio" name="condition" value="All" <?php echo set_radio('condition', 'All', TRUE); ?> /> All <br>
		<input type="radio" name="condition" value="Used" <?php echo set_radio('condition', 'Used' ); ?>/> Used
		<input type="radio" name="condition" value="Brand New" <?php echo set_radio('condition', 'Brand New'); ?>/> New </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			
		</tr>
		</table>
		</td><td style="width: 100%;"><img src="<?php echo base_url()."/images/cars.png"?>" style="max-width: 100%; flaot:right"></td></tr>
		<tr ><td><input type='submit' name='submit' value='Search' align='center'  class='submit'></td><td></td></tr>
		</table></center>
	</form>


</div>













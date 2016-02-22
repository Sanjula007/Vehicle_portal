<style>
td{
	 width: 100px;
	 
		
}

.center {
	float:center;
	align:center;
	//border-radius: 12px;
    margin: auto;
    width: 80%;
    //border: 3px solid #f78117;
    padding: 10px;
	font-family: 'RokkittRegular';
	font-size:21px;
	font-weight:bold;
	color:#f78117;
	//margin:15px 0 0;
	line-height:21px;
}

</style>
</div>
<div class='center' style=' background-color:#E0E0E0; box-shadow: 2px 2px 5px grey;'>

	<form action ="<?php echo site_url().'/category/addCategory';?>" method="post">
	<table align='center' >
		<h3 align="center"><u> Add a Category</u><h3>
		<tr class="title">
			<td align='right'>Category name</td>
			<td ><input type='text' name='name' placeholder='Category' class='center'></td>
		</tr>	
		<tr>
			<td></td><td style="color:red; font-size: 12px;"><?php echo form_error('name'); ?></td>
		</tr>
		<!--
		<tr>		
			<td>Category image</td>
			<td><input type='file' name='image' placeholder='Image'></td>
		</tr>
		-->
		
		<tr>
			<td><input type='submit' name='submit' value='Add' align='center' class='submit' ></td>
			<td><input type='reset' name='reset' value='Clear' align='center' class='submit'></td>
		</tr>
		</table>
	
	</form>


</div>
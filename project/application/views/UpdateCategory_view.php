<style>
td{
	 width: 100px;
	 
		
}

.center {
	float:center;
	align:center;
	//border-radius: 12px;
    margin: auto;
    width: 40%;
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
<div class='center'  style=' background-color:#E0E0E0; box-shadow: 2px 2px 5px grey;'>
<?php for($i=0;$i<count($category);$i++){ ?>
	<form action ="<?php echo site_url().'/category/updateCategory/'.$category[$i]->id;?>" method="post">
	<table align='center'>
		<h3 align="center"><u>  Update the Category</u><h3>
		<tr>
			<td class='center'>Category name</td>
			<td><input type='text' name='name' placeholder='Category' value='<?php echo $category[$i]->name; ?>' class="center" style="width:100%"></td>
		</tr>	
		<tr>
			<td></td><td style="color:red; font-size: 12px;"><?php echo form_error('name');  echo $categoryexists; ?></td>
		</tr>
		<!--
		<tr>		
			<td>Category image</td>
			<td><input type='file' name='image' placeholder='Image'></td>
		</tr>
		-->
		<tr><td></td>
			<td><input type='submit' name='submit' value='Update' class='submit' style="float:left"></td>
		</tr>
	</table>
	</form>

<?php } ?>
</div>
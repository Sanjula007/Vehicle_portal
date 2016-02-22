<style>
td{
	 width: 100px;
	 
		
}

.center {
	align:center;
	border-radius: 25px;
    margin: auto;
    width: 60%;
    //border: 3px solid #73AD21;
    padding: 10px;
}

</style>
</div>
<div class='center'>
<?php for($i=0;$i<count($category);$i++){ ?>
	<form action ="<?php echo site_url().'/category/updateCategory/'.$category[$i]->id;?>" method="post">
	<table align='center'>
		<h3 align="center"><u>  Update the Category</u><h3>
		<tr>
			<td>Category name</td>
			<td><input type='text' name='name' placeholder='Category' value='<?php echo $category[$i]->name; ?>'></td>
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
			<td><input type='submit' name='submit' value='Update'></td>
		</tr>
	</table>
	</form>

<?php } ?>
</div>

<script>
function checkUpdate() {
    return confirm("Do you want to Update the category..!") 
}
function checkDelete() {
    return confirm("Do you want to Delete the Categoory..!") 
}
</script>

<div class='center' style='background-color:#E0E0E0; min_height:100%; box-shadow: 2px 2px 5px grey;'>


                    
				
                <table align='center'  style=' background-color:#E0E0E0; '>   
				<tr class='center'>
                	<td><label class="title">Category</label></td>
                	
				</tr class='center'>
				 <?php for ($i = 0; $i < count($category); $i++) { ?>
                <tr>
                	<td ><label class="title"><?php echo stripcslashes($category[$i]->name) ?></label></td>
					<td><label class="title"><a href="<?php echo site_url('category/showCategory/'.$category[$i]->id); ?>" onclick="return checkUpdate();">Update</a></label></td>
					<td><label class="title"><a href="<?php echo site_url('category/deleteCategory/'.$category[$i]->id); ?>" onclick="return checkDelete();">delete</a></label></td>
                	
				</tr>
				 <?php } ?>
				</table>
                

</div>

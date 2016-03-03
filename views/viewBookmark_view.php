<center>
	
	<!--javascript confirm box for confirming deleting the bookmark-->
	<script type="text/javascript">
	function confirmDelete()
	{
	     var r=confirm("Do you really want to Delete This Bookmark?")
	    if (r==true)
	      return true;
	    else
	      return false;
	}
	</script>
	<!--end of cinfirm box-->


	<!--show feedbacks or no result-->
	<?php if(count($bookmarks)!=0){
		echo '';
	}
	else{
		echo '<h3 align="center" style="color:green; font-size:40px">No Results Found!!!!</h3>';
	}?>
	
	
		
	
	<?php for ($i = 0; $i < count($bookmarks); $i++) { ?>
	<div class="address martop">
            <div class="panel2">
              <div class="title2">
                <h1><?php echo $bookmarks[$i]->bookmarkName; ?></h1>
                </div>
                <!--<h4><?php echo str_replace("-", "/", $bookmarks[$i]->bookmark); ?></h4>-->
              <div class="content2">
              	<p style="font-weight: bolder"><a href="<?php echo str_replace("-", "/", $bookmarks[$i]->bookmark); ?>"><?php echo str_replace("-", "/", $bookmarks[$i]->bookmark); ?><br /></a></p>
                
                <p class="" style="font-style: italic"><span>Saved On :	</span><?php echo $bookmarks[$i]->dateAdded; ?> </p>
                <form action="<?php echo site_url('editInfo/deleteBookmark/'.($bookmarks[$i]->bookmarkID)) ?>" style="text-align: right" method="post" onsubmit="return(confirmDelete());">
                	<input type="submit" align="right" class="btn-class" value="Delete"/>
                </form>
              </div>
            </div>
			</div>
			<?php } ?>
</center>
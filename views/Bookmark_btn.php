<div class="body">
	
	<!--getting the current url-->
	<?php
	$data = current_url(); //returns current url as string
	$data2 = word_wrap($data,100);
	$data2 = str_replace("/", "-", $data); //replacing slaches with dashes in url
	?>
	
	<!--javascript confirm box for confirming bookmard adding-->
	<script type="text/javascript">
	function confirmBookmark()
	{
	     var r=confirm("Do you really want to Bookmark This Ad?")
	    if (r==true)
	      return true;
	    else
	      return false;
	}
	</script>
	<!--end of cinfirm box-->
	
	<!--form for bookmark keyword and button-->
	<form action ="<?php echo site_url('FullAds/bookmarking/'.($data2)) ?>" method="post" id="search-form_3" onsubmit="return(confirmBookmark());">
		<?php echo form_error('bkmark');?>
		<!--text field-->
		<input type="text" class="search_3" name="bkmark" id="bkmark" required placeholder="Please Give a Name to Identify Your Bookmark"/>
		<!--button-->
		<input type="submit" class="submit_3" value="Bookmark"/>
	</form>
	<!--end of form-->
		
	
</div>
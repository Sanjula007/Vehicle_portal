<div class="body">
	
	<!--javascript confirm box for confirming ad-->
	<script type="text/javascript">
	function confirmAdvertisement()
	{
	     var r=confirm("Do you really want to Confirm This Ad?")
	    if (r==true)
	      return true;
	    else
	      return false;
	}
	</script>
	<!--end of cinfirm box-->
	
	<!--form for confirm button-->
	<form action="<?php echo site_url('Confirm_AD/update/'. $vehicle[0]->adID); ?>" name="myForm"  onsubmit="return(confirmAdvertisement());">  
	<!--button-->
	<input type="submit" value="Confirm" class="inputB"/>
	</form>
	<!--end of form-->
	
</div>
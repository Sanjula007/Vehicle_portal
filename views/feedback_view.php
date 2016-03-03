<center>
	
	<!--javascript confirm box for confirming deleting the feedback-->
	<script type="text/javascript">
	function confirmDelete()
	{
	     var r=confirm("Do you really want to Delete This Feedback?")
	    if (r==true)
	      return true;
	    else
	      return false;
	}
	</script>
	<!--end of cinfirm box-->
	
	<!--show feedbacks or no result-->
	<?php if(count($cusFeedbacks)!=0){
		echo '';
	}
	else{
		echo '<h3 align="center" style="color:green; font-size:40px">No Results Found!!!!</h3>';
	}?>
	
	
	
	
	<?php for ($i = 0; $i < count($cusFeedbacks); $i++) { ?>
	<div class="address martop">
            <div class="panel2">
              <div class="title2">
                <h1><?php echo $cusFeedbacks[$i]->cName; ?> Says, </h1>
              </div>
           	  <div class="content2">
                <p style="font-weight: bolder; font-size: large"><?php echo $cusFeedbacks[$i]->cFeedback; ?><br /></p>
                <p class="padTop"><span>Contact Number :	</span><?php echo $cusFeedbacks[$i]->cPhone; ?> 
                <span style="padding-left: 20px">Email :	</span><?php echo $cusFeedbacks[$i]->cEmail; ?> 
                <span class="" style="text-decoration: underline;font-style: italic; padding-left: 20px">Posted on :	<?php echo $cusFeedbacks[$i]->cDate; ?></span> </p>
                
                <form action="<?php echo site_url('editInfo/deleteFeedback/'.($cusFeedbacks[$i]->fID)) ?>" style="text-align: right" method="post" onsubmit="return(confirmDelete());">
                	<input type="submit" align="right" class="btn-class" value="Delete"/>
                </form>
              </div>
            </div>
	</div>
	<?php } ?>
</center>
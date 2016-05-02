<div class="body">
					<!--javascript confirm box for confirming deleting the bookmark-->
					<script type="text/javascript">
					function confirmDelete()
					{
					     var r=confirm("The whole Article detail and its content will be DELETED. Are you want to continue?")
					    if (r==true)
					      return true;
					    else
					      return false;
					}
					</script>
					<!--end of cinfirm box-->
				<!--show articles or no result-->
				<?php if(count($site_articles)!=0){
					echo '';
				}
				else{
					echo '<h3 align="center" style="color:green; font-size:40px">No Results Found!!!!</h3>';
				}?>
				
				<?php for ($i = 0; $i < count($site_articles); $i++) { ?>
				<ul>
					<li>
						<div class="featured">
							<a href="<?php echo site_url('Full_article/article_detail/'.$site_articles[$i]->artID); ?>">
							<img src="<?php echo base_url()."/uploads/".$site_articles[$i]->art_image; ?>" height="250px" width="95%"></a>
							<a href="<?php echo site_url('Full_article/article_detail/'.$site_articles[$i]->artID); ?>">click to view more details</a>
						</div>
						<div>
							<a href="<?php echo site_url('Full_article/article_detail/'.$site_articles[$i]->artID); ?>">
							<h3 style="font-size:30px; color:#2196F3"><?php echo $site_articles[$i]->heading; ?></h3></a>
							<p style="font-weight: bold; font-size: 18px"><?php echo word_limiter($site_articles[$i]->detail,100) ; ?></p>
							
							<form action="<?php echo site_url('Admin_articles/delete_article/'.($site_articles[$i]->artID)) ?>" style="text-align: right" method="post" onsubmit="return(confirmDelete());">
                				<input type="submit" align="right" class="btn-class" value="Delete"/>
                			</form>
							
						</div>
					</li>
				</ul>
				<?php } ?>
</div>
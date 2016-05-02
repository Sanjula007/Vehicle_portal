<div class="body">
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
							
						</div>
					</li>
				</ul>
				<?php } ?>
</div>
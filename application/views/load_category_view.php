<div class="category" style="max-width:20%">
			<h3 style='padding-left: 20px'>    Categories</h3>
			<?php for ($i = 0; $i < count($category); $i++) { ?>
			<ul style='padding-left: 50px'>
				<li style='padding-left: 30px'><a href="<?php echo site_url()."/AllAds/ads_page_category/".$category[$i]->name.'/1/popularity';?>"><?php echo $category[$i]->name?></a></li>
				
			</ul>
			<?php } ?>
</div>
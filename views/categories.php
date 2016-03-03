<div class="category">
			<!--<h3>    Categories</h3>
			<ul>
				<li><a href="<?php echo site_url('ShowCategory/ads_page1'); ?>">Cars</a></li>
				<li><a href="<?php echo site_url('ShowCategory/ads_page2'); ?>">Motor Bikes & Scooters</a></li>
				<li><a href="<?php echo site_url('ShowCategory/ads_page3'); ?>">Vans</a></li>
				<li><a href="<?php echo site_url('ShowCategory/ads_page4'); ?>">Buses</a></li>
				<li><a href="<?php echo site_url('ShowCategory/ads_page5'); ?>">Three Wheelers</a></li>
				<li><a href="<?php echo site_url('ShowCategory/ads_page6'); ?>">Heavy Duty Vehicles</a></li>
				<li><a href="<?php echo site_url('ShowCategory/ads_page7'); ?>">Push Cycles</a></li>
				<li><a href="<?php echo site_url('ShowCategory/ads_page8'); ?>">Boats & Water Transport</a></li>
			</ul>-->
			<h3 style='padding-left: 20px'>    Categories</h3>
			<?php for ($i = 0; $i < count($category); $i++) { ?>
			<ul style='padding-left: 50px'>
				<li style='padding-left: 30px'><a href="<?php echo site_url()."/AllAds/ads_page_category/".$category[$i]->name.'/1/popularity';?>"><?php echo $category[$i]->name?></a></li>
				
			</ul>
			<?php } ?>
</div>
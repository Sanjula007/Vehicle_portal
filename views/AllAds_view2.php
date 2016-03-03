<div class="body" style=" background-color: #efeff5; width:77%; min-height:100%; box-shadow:2px 2px 5px grey;float:center;">
<?php if(count($vehicle)!=0){
		
		echo '<h3 align="right" > no of results : '. $count;
		
	if($type=='All'){
		
		echo '<br>Sort by : ';
		echo '<a href="'.site_url('AllAds2/ads_page/1/date').'">| Date |</a>';
		echo '<a href="'.site_url('AllAds2/ads_page/1/popularity').'"> Popularity |</a>';
	}
	else if($type=='Category'){
		
		echo '<br>Sort by : ';
	
		echo '<a href="'.site_url('AllAds2/ads_page_category/'.$category.'/1/date').'">| Date |</a>';
		echo '<a href="'.site_url('AllAds2/ads_page_category/'.$category.'/1/popularity').'"> Popularity |</a>';
	}
}
else{
	echo '<h3 align="center" style=\'font-size:40px\'> No results </h3>';
	
}
?>	
<div class="container" >
	<?php for ($i = 0; $i < count($vehicle); $i++) { ?>
    <div class="card-container" style='padding:2%; float:center;'>
        <div class="card">
            <div class="front">
                <div class="cover">
					<img src="<?php echo base_url()."/uploads/".$vehicle[$i]->image; ?>" height="100%" width="100%">
				</div>
				<div class="content">
                    <div class="main">
                        <h3 class="name"><?php echo $vehicle[$i]->modelName; ?></h3>
                       
                        <div class="second float_left">
                        	<span class="icon_fuel"></span><?php echo $vehicle[$i]->fuel; ?>
                        </div>
                        
                        <div class="second">
                        	<span class="icon_gearbox"></span> <?php echo $vehicle[$i]->transmission ;?>
                        </div>
                    </div>
                    <div class="price">
                    	Rs.<?php echo $vehicle[$i]->price; ?>
                    </div> 
                </div>
            </div> <!-- end front panel -->
            <div class="back">
                <p>
                	<label class="title">Category</label>
                	<span class="value"><?php echo stripcslashes($vehicle[$i]->category) ?></span>
                </p>
                <p>
                	<label class="title">brand</label>
                	<span class="value"><?php echo stripcslashes($vehicle[$i]->brand) ?></span>
                </p>
                <p>
                	<label class="title">Model</label>
                	<span class="value"><?php echo stripcslashes( $vehicle[$i]->modelName) ?></span>
                </p>
                 <p>
                	<label class="title">Year</label>
                	<span class="value"><?php echo stripcslashes( $vehicle[$i]->year) ?></span>
                </p>
                <p>
                	<label class="title">Mileage</label>
                	<span class="value"><?php echo stripcslashes($vehicle[$i]->mileage) ?></span>
                </p>
                <br>
				<p>
                	
                	<span class="value">
					<a href="<?php echo site_url('FullAds/adsinfo/'. $vehicle[$i]->adID); ?>">More>></a>
					</span>
                </p>
                
                
            </div> <!-- end back panel -->
        </div> <!-- end card -->
    </div> <!-- end card-container -->
    <?php } ?>
</div>

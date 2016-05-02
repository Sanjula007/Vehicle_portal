<div class="body" style=" background-color: #efeff5; float:right; z-index:40; padding:0px;width:80%">
				<div class="button_box2" style="padding-top:30px;padding-left:100px" >
				<center>
					<form action ="<?php echo site_url().'/Search_ads/ads_page';?>" method="post" class="form-wrapper-2 cf" >
						<!--text-->
						<input type="text" name="searchB" id="searchB"  placeholder="Search By Brand Here..." required>
						<!--button-->
						<button type="submit" >Search</button>
					</form>
					</center>
					<!--end of form--> 
				</div>
</div>
<div class="body" style=" background-color: #efeff5;  min-height:100%; float:center; z-index:40; padding:0px;width:80%">


		<!--show search form-->


<?php if(count($vehicle)!=0&&isset($count)){
		
		echo '<h3 align="right" > no of results : '. $count;
		
	if($type=='All'){
		
		echo '<br>Sort by : ';
		echo '<a class="gopage" href="'.site_url('AllAds/ads_page/1/date').'">| Date |</a>';
		echo '<a class="gopage" href="'.site_url('AllAds/ads_page/1/popularity').'"> Popularity |</a>';
	}
	else if($type=='Category'){
		
		echo '<br>Sort by : ';
	
		echo '<a class="gopage" href="'.site_url('AllAds/ads_page_category/'.$category.'/1/date').'">| Date |</a>';
		echo '<a class="gopage" href="'.site_url('AllAds/ads_page_category/'.$category.'/1/popularity').'"> Popularity |</a>';
	}
}
else if(count($vehicle)==0&&isset($count)){
	echo '<h3 align="center" style=\'font-size:40px\'> No results </h3>';
	
}
else if(count($vehicle)==0){
	echo '<h3 align="center" style=\'font-size:40px\'> No results </h3>';
	
}
?>	
<div class="container" >
	<?php 
	//start the for loop for load advertisments
	for ($i = 0; $i < count($vehicle); $i++) { ?>
    <div class="card-container" style='float:center;'>
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
					<a href="<?php echo site_url('FullAds/ads_info/'. $vehicle[$i]->adID); ?>">More>></a>
					</span>
                </p>
                
                
            </div> <!-- end back panel -->
        </div> <!-- end card -->
    </div> <!-- end card-container -->
    <?php } //end of the for loop?>
</div>

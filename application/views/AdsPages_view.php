

<div class="body" align="center" style='min-width:80%'>
<h3 class="paging" style='font-size:25px'>
<?php

		if(0<$pages){
		echo '<';
		}
		for($i=0;$i<$pages;$i++)
		{
			echo  '<a href=';
			if(strcmp($type,'All')==0){
				if($sort=='popularity'){
					echo site_url('AllAds/ads_page/'.($i+1).'/popularity');

				}
				else if ($sort=='date'){
			
					echo site_url('AllAds/ads_page/'.($i+1).'/date');
					}
				
			}
			else if(strcmp($type,'Category')==0){
				
				if($sort=='popularity'){
					echo site_url('AllAds/ads_page_category/'.$category.'/'.($i+1).'/popularity');

				}
				else if ($sort=='date'){
			
					echo site_url('AllAds/ads_page_category/'.$category.'/'.($i+1).'/date');
				}
			}
			else if(strcmp($type,'adSearch')==0){
				if($sort=='date'){
					echo  site_url('AllAds/advancedSearchPage/'.($i+1).'/');

				}
				
				
			}
			echo' >'.($i+1)."</a>,";
		}
		if(0<$pages){
		echo '>';
		}
?>

</h3>
</div>

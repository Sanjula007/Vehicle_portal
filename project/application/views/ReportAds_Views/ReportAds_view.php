<script type="text/javascript">
function hideshow(which){
	if (!document.getElementById)
		return
	
	if (which.style.display=="block"){
		
		which.style.display="none"
	}
	else{
		
		which.style.display="block"
	}
}
</script>
<?php
	if(isset($report)){
		
		$report='block';
	}
	else{
		$report='none';
		
	}
	if(isset($sendmail)){
		
		$sendmail='block';
	}
	else{
		$sendmail='none';
		
	}
	
?>

<style>

.tables .title{
	overflow:scroll;
	align:center;
	float:center;
	font-family: 'RokkittRegular';
	font-size:15px;
	font-weight:bold;
	color:#636363;
	margin:15px 0 0;
	line-height:21px;
	//padding-left:40%
}
.tr .td{
	padding:10px;
	float:top;
}
</style>


<div align="center" class="body" style=" background-color: #efeff5; width:76%; min-height:100%; box-shadow:2px 2px 5px grey; padding:0px">
    <h3 id="form_head" style='color:#004444; font-size:30px; background: linear-gradient(to right, #5cd65c , #adebad); '><center>All Reported Advertismetns</center></h3><br/>
		<?php
			if(count($vehicle)==0){
				echo "<h3> No Reporrted Advertismetns to Show </h3>";
				
			}
		
		?>
        <form action ="<?php echo site_url().'/ReportedAds/set_selected_Viewed/';?>" method="post"  class="form_input" name='reportAds' id='reportAds'>    
        <?php for ($i = 0; $i < count($vehicle); $i++) { ?>      
			<div align="left" class="body" style=" background-color: #ffffff; width:100%;  box-shadow:2px 2px 5px grey; float :left; padding-top:15px; overflow-x:scroll;">	
					
					
                <h3 ><input type="checkbox" name="checkAds[]" value="<?php echo stripcslashes($vehicle[$i]->adID) ?>" style="float:left"/></h3>
				<table>	<tr>
				<td  >
					<img src="<?php echo base_url()."/uploads/".$vehicle[$i]->image;?>" style="max-height: 100px;">
				</td>
				<td>
					<table> 
					<tr >
						<th></th>
						<th><label class="title" style="color:#3CBC8D;">Vehicle</label></th>
						<th><label class="title" style="color:#3CBC8D;">Information</label><br></th>
						<th></th>
					</tr><tr>
						<td><label class="title">Category</label></td>
						<td><span class="value"><?php echo stripcslashes($vehicle[$i]->category) ?></span><br></td>
						
						<td><label class="title">Brand</label></td>
						<td><span class="value"><?php echo stripcslashes($vehicle[$i]->brand) ?></span><br></td>
					</tr>
					<tr>	
						<td><label class="title">Model</label></td>
						<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->modelName) ?></span><br></td>
						
						<td><label class="title">Year</label></td>
						<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->year) ?></span><br></td>
					</tr>
					<tr>	
						<td><label class="title">Mileage</label></td>
						<td><span class="value"><?php echo stripcslashes($vehicle[$i]->mileage) ?></span><br></td>
						
						<td><label class="title">Condition</label></td>
						<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->vCondition) ?></span><br></td>
					</tr>
					<tr>	
						<td><label class="title">fuels</label></td>
						<td><span class="value"><?php echo stripcslashes($vehicle[$i]->fuel) ?></span><br></td>
						
						<td><label class="title">price</label></td>
						<td><span class="value"><?php echo stripcslashes($vehicle[$i]->price) ?></span><br></td>
					</tr>
					<tr>	
						<td><label class="title">transmission</label></td>
						<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->transmission) ?></span><br></td>
						
						<td><label class="title">description</label></td>
						<td><span class="value" width='200px'><?php echo stripcslashes($vehicle[$i]->description) ?></span></td>
					</tr>
				
					</table >
				</td><td>
					<table  >
					<tr><th></th>
						<th><label class="title" style="color:#3CBC8D;">Owner</label></td>
						<th><label class="title" style="color:#3CBC8D;">Information</label><br></td>
						<th></th>
					</tr>
					<tr>	
						<td><label class="title">Contact name</label></td>
						<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uName) ?></span><br></td>
						
						<td><label class="title">Contact Email</label></td>
						<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uEmail) ?></span><br></td>
					</tr>
					<tr>	
						<td><label class="title">Contact phone no</label></td>
						<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uPhone) ?></span><br></td>
					</tr>	
					</tr>
					<tr>
					
						
					</table>
                
                    
                </td>
				</tr>
				</table>
				
					<label  style="color:red; ">New Reports :</label>
					<label  style="color:red;"><?php echo stripcslashes($vehicle[$i]->no_reports) ?></label><br>
					
					<label  style="color:red;">Letest Report</label><br>
					<label  style="color:red;"><?php echo "Reason :".$vehicle[$i]->reason ?></label>
					<label  style="color:red;"><?php echo "Meaasge :".$vehicle[$i]->message ?></label>
					<label  style="color:red;"><?php echo "by :".$vehicle[$i]->remail ?></label><br>
					<label class="value" style="color:red;">
					<a href="<?php echo site_url('ReportedAds/delete_Ads/'. $vehicle[$i]->adID); ?>"  onclick="return checkDelete();">delete>></a>
					</label>
					<span class="value">
					<a href="<?php echo site_url('FullAds/ads_info/'. $vehicle[$i]->adID); ?>">&nbsp;View the Ad>></a>
					</span>
					<label class="value" style="color:red;">
					<a href="<?php echo site_url('ReportedAds/all_reports_ads/'. $vehicle[$i]->adID); ?>"  >&nbsp;View Other Reports>></a>
					</label>
					
				
				
       
		</div>
	<?php } ?>
	<?php
			if(!count($vehicle)==0){
				echo "<input type='submit' name='Set Selected as Viewed' value='Set Selected as Viewed' align='left' style='float:left; height:30px;' class='submit'>";
				
			}
		
		?>
	
	</form>
	
<div class="body" align="center" style='min-width:80%'>
		<h3 class="paging" style='font-size:25px'>
		<?php

		if(0<$pages){
			echo '<';
		}
		for($i=0;$i<$pages;$i++)
		{
			echo  '<a href='.site_url().'/ReportedAds/ads_info/'.($i+1).' >'.($i+1)."</a>,";
		}
		if(0<$pages){
			echo '>';
		}
		?>

</h3>
</div>
</div>
<style>
table {
    border-collapse: collapse;
    //width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
	vertical-align: top;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: lightblue;
    color: white;
}
</style>

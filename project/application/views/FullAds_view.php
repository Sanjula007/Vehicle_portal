<style>

.tables{
	font-family: 'RokkittRegular';
	font-size:16px;
	font-weight:bold;
	color:#636363;
	margin:15px 0 0;
	line-height:21px;
}
</style>

<body >
<div align="center"class="body" style=" background-color: #efeff5; width:78%; box-shadow:2px 2px 5px grey;">
    <div  
        <div >
            
                <div >
				
					
					<a href="<?php echo site_url('AllAds/'); ?>">AllAds</a>
                    <?php for ($i = 0; $i < count($vehicle); $i++) { ?>
					<div class="cover">
					<img src="<?php echo base_url()."/uploads/".$vehicle[$i]->image;?>" style="max-height: 300px;">
				</div>
				<p>
					
                 <table class='tables'>   
                <tr>
                	<td><label class="title">Category</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->category) ?></span><br></td>
				</tr><tr>	
                	<td><label class="title">Brand</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->brand) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">Model</label></td>
                	<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->modelName) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">Year</label></td>
                	<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->year) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">Mileage</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->mileage) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">Condition</label></td>
                	<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->vCondition) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">fuels</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->fuel) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">price</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->price) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">transmission</label></td>
                	<td><span class="value"><?php echo stripcslashes( $vehicle[$i]->transmission) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">Contact name</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uName) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">Contact Email</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uEmail) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">Contact phone no</label></td>
                	<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uPhone) ?></span><br></td>
                </tr><tr>	
                	<td><label class="title">description</label></td>
                	<td><span class="value" width='200px'><?php echo stripcslashes($vehicle[$i]->description) ?>
					</span></td><br>
				</tr>	</table>
                </p>
                    <?php } ?>
                </div>
            
        </div>
    </div>

</body>

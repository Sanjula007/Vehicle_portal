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
	$type='user';
	if($type=='admin'){
		
		$display='block';
	}
	else{
		$display='none';
		
	}
	
	
?>

<style>

.tables .title{
	
	align:center;
	float:center;
	font-family: 'RokkittRegular';
	font-size:15px;
	font-weight:bold;
	color:#0099CC;
	margin:15px 0 0;
	line-height:21px;
	//padding-left:40%
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
	vertical-align: top;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #0099CC;
    color: white;
}

</style>


<div align="center" class="body" style=" background-color: #efeff5;  box-shadow:2px 2px 5px grey;">
    
		<?php
			if(count($vehicle)==0){
				echo "<h3> No Reporrted Advertismetns to Show </h3>";
				
			}
		$id=0;
		$email="";
		?>
          
        <?php for ($i = 0; $i < count($vehicle); $i++) { 
		$id=$vehicle[$i]->adID;
		?>      
			<div align="left"  style=" background-color: #efeff5; width:100%;  box-shadow:2px 2px 3px grey; float :left; padding-top:10px; padding-left:5px; overflow-x:scroll;">	
					
					
               
				<table>	<tr>
				<td  >
					<img src="<?php echo base_url()."/uploads/".$vehicle[$i]->image;?>" style="max-height: 100px;">
				</td>
				<td>
					<table> 
					<tr >
						<th></th>
						<th><label class="title" style="color:#FFFFFF;">Vehicle</label></th>
						<th><label class="title" style="color:#FFFFFF;">Information</label><br></th>
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
						<th><label class="title" style="color:#FFFFFF;">Owner</label></td>
						<th><label class="title" style="color:#FFFFFF;">Information</label><br></td>
						<th></th>
					</tr>
					<tr>	
						<td><label class="title">Contact name</label></td>
						<td><span class="value"><?php echo stripcslashes($vehicle[$i]->uName) ?></span><br></td>
						
						<td><label class="title">Contact Email</label></td>
						<td><span class="value"><?php echo stripcslashes($email=$vehicle[$i]->uEmail) ?></span><br></td>
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
					<label class="value" style="color:red;">
					<a class='red' href="<?php echo site_url('ReportedAds/delete_Ads/'.$id); ?>"  onclick="return checkDelete();">delete>>&nbsp;</a>
					</label>
					<span class="value">
					<a href="<?php echo site_url('FullAds/ads_info/'. $vehicle[$i]->adID); ?>">View the Ad>>&nbsp;</a>
					</span>
				
				<?php } ?>  
				<br>
				<label class="value" style="color:red;">
				All Reports	
				</label>
				<table style='border:2px'> 
					<tr >
						<th>Reason</th>
						<th>Message</th>
						<th>Date Posted</th>
						<th>Sender Email</th>
					</tr><u>
					<?php for ($a = 0; $a < count($reportads); $a++) { ?>
					<tr>
						<td style='width:50px'><?php echo stripcslashes($reportads[$a]->reason) ?></td>
						<td style='width:400px'><?php echo stripcslashes($reportads[$a]->message) ?></td>
						<td style='width:150px'><?php echo stripcslashes($reportads[$a]->dateposted) ?></td>
						<td style='width:100px'><?php echo stripcslashes($reportads[$a]->email) ?></td>
					</tr>
					<?php } ?>   
				</table>

				
					
					
					
				
				
       
		</div>
			<div align="center" id="sendemails"  style="display:<?php echo $display; ?>; background-color: #efeff5;  min-height:10%; float:center; box-shadow:2px 2px 5px grey; ">
			
			
		<form action ="<?php echo site_url().'/ReportedAds/send_email/'.$id;?>" class="form_input" method="post" name='reportform' id='reportform' class="form_input">
			<table  >
			<h3>Send Email to Owner about Reoprts</h3>
			<tr>
				<td> <p class='center' >To</p></td>
				<td> <input type="text" readonly="readonly" name='toemail' id='toemail'  class='input_box' style="width:400px;" value='<?php echo stripcslashes($email) ?>'/></td>
				<td style="width:210px;  "></td>
			</tr>
			
			<tr>
				<td> <p class='center' >Subject</p></td>
				<td> <input type='tex' name='subject' id='subject' placeholder='Subject' class='input_box' style="width:400px;" value='<?php echo set_value('subject', 'your advertisment has been reported'); ?>'></td>
				<td style="width:210px;  "><?php echo form_error('subject'); ?></td>
			</tr>
			
			<tr>
				<td> <p class='center' >Message</p></td>
				<td> <textarea name='emessage' id='emessage' placeholder='Message' class='input_box' style="width:400px;" rows="10" cols="100" ><?php echo set_value('emessage', 'Dear User, 
your advertismnet has been reported '.count($reportads).' time(s) .Please update your update advertisment or delete. '.
'use following link to update
'.
site_url('UpdateAds/update_Ad/'.$id)
.'
Thank you'); ?></Textarea></td>
				<td style="width:210px;  "><?php echo form_error('emessage'); ?></td>
			</tr>
			
			
			
			<tr ><td><input type='submit' name='submit' value='Submit' align='center' style="float:center; height:30px;" class='submit'></td><td></td></tr>
			</table>
		</form>
	</div>
	
	
	
	
	

</div>




<style>
table {
    border-collapse: collapse;
    width:100%;
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


.aa:link, .aa:visited {
    background-color:  #5cd65c ;
	width:80%;
	height:100%;
    color: white;
    padding: 14px 25px;
    text-align: center;	
    text-decoration: none;
    display: inline-block;
}


.aa:hover, .aa:active {
    background-color: #5cdf5c ;
}


</style>
<div class="body" style="width:79%; background-color: #efeff5; min-height:60%; padding:0px">
<h3 id="form_head" style='color:#FFFFFF; font-size:30px; background: linear-gradient(to right, #0099CC , #336699); float:center'><center>Polls</center></h3><br><br><br>
	<table>
	<?php
		for($a=0;$a<count($poll);$a++){
	?>
	
	<?php   if( $a%2==0 ){ echo '<tr>';} ?>
				<td ><label style='padding-left: 30px; font-size:30px;'><a class="aa" href="<?php echo site_url()."/Poll/show_poll/".$poll[$a]->id;?>"><?php echo $poll[$a]->name?><br/><label style='padding-left: 30px; font-size:30px;max-width:350px'><?php echo $poll[$a]->description; ?></label></a></label></td>
				
	<?php if( $a%2==1 ) { echo '</tr>'; } ?>
	
	<?php
		}
	?>
	</table>

</div>
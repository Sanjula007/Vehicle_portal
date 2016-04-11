<style>
td{
	 width: 25px;
	 
		
}

.center1 {
	float:center;
	align:center;
	border-radius: 5px;
    margin: auto;
    //width:100px;
    border: 3px solid #f78117;
    //padding: 10px;
	font-family: 'RokkittRegular';
	font-size:15px;
	font-weight:bold;
	color:#f78117;
	//margin:15px 0 0;
	line-height:15px;
}

.center {
	float:center;
	align:center;
	border-radius: 5px;
    margin: auto;
    //width: 30%;
    //border: 3px solid #f78117;
    //padding: 10px;
	font-family: 'RokkittRegular';
	font-size:21px;
	font-weight:bold;
	color:#f78117;
	//margin:15px 0 0;
	line-height:21px;
}
.td {
width:250px;
}

</style>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Home - A2Z Vehicles</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style5.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mystyle.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/menustyles.css">
		
	
	
		<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS.'style.css'); ?>">-->
		<?php// echo base_url(CSS.'menustyles.css'); ?>
		
		<script type='text/javascript' src="<?php echo base_url(); ?>javaScripts/menuscript.js"></script>
	</head>
	<body style='min-width:1024px;'>
		
		<div class="page">
		
			<div class="header">
				<a href="<?php echo site_url('Home'); ?>" id="logo"><img src="" alt=""/></a>
				<img src="<?php echo base_url(); ?>images/headerVehicles.png" alt="" style="align: right; height:100%;"/>
				<!--
				<ul>
					<li class="selected"><a href="<?php echo site_url('Home'); ?>">Home</a></li>
					<li><a href="<?php echo site_url('about'); ?>">About</a></li>
					<li><a href="<?php echo site_url('category/category_Form'); ?>">Edit Categories</a></li>
					
					<li><a href="<?php echo site_url('AllAds/view_myads/1'); ?>">My Ads</a></li>
				</ul>
				-->
			</div>
		</div>
		
		<div id='cssmenu'>
<ul style='padding-left: 20%;'>
   <li><a href='<?php echo site_url('home/'); ?>'>Home</a></li>
   <li class='active'><a href='<?php echo site_url('AllAds/'); ?>'>Advertisments</a></li>
   <li><a href='<?php echo site_url('AllAds/advanced_Search/'); ?>'>Advanced Search</a></li>
   <li><a href='<?php echo site_url('AddNewAD/'); ?>'>Post Ads</a></li>
   <li><a href='<?php echo site_url('Poll/All_polls'); ?>'>Polls</a></li>
   <li><a href="<?php echo site_url() . "./add_busdetails/view" ;?>">Business Users</a></li>
   <li><a href='#'>About Us</a></li>
   <li><a href='#'>Contact Us</a></li>
   <li><a href='#'>My Account</a>
	<ul style='z-index:5;'>
               <li style='z-index:5;'><a href='<?php echo site_url('login');?>'>log In</a></li>
               <li style='z-index:5;'><a href='#'>Create an Account</a></li>
			   <li style='z-index:5;'><a href="<?php echo site_url('AllAds/view_myads/1'/*.$this->session->userdata('id')*/); ?>">My Ads</a></li>
    </ul>
   </li>
     <li><a href='#'>Admin</a>
	<ul style='z-index:5;'>
               <li style='z-index:5;'><a href='#'>log In</a></li>
               <li style='z-index:5;'><a href="<?php echo site_url('SendEmail'); ?>">Send email to user</a></li>
			   <li style='z-index:5;'><a href="<?php echo site_url('category/category_Form'); ?>">Manage Category</a></li>
			   <li style='z-index:5;'><a href="<?php echo site_url('Poll/add_topic'); ?>">Add Poll</a></li>
			   <li style='z-index:5;'><a href="<?php echo site_url('ReportedAds/ads_info/1'); ?>">Reported Ads</a></li>
    </ul>
   </li>
   
</ul>
</div>

		<div class="category">
			<h3>    Categories</h3>
			<ul>
				<li><a href="">Cars</a></li>
				<li><a href="">Motor Bikes & Scooters</a></li>
				<li><a href="">Vans</a></li>
				<li><a href="">Buses</a></li>
				<li><a href="">Three Wheelers</a></li>
				<li><a href="">Heavy Duty Vehicles</a></li>
				<li><a href="">Push Cycles</a></li>
				<li><a href="">Boats & Water Transport</a></li>
			</ul>
		</div>
			
		<div class="figcaption">	<a href="index.html" id="logo"><img src="<?php echo base_url("images/email.jpg");?>"  width="300px" height="300px" alt=""/></a></div>	
	 
	<form action ="<?php echo site_url() . "./send_controller" ;?>" method ="POST">		 			

<div class="tab">
<table bgcolor="#B6B3B2"  cellspacing="20px" style="border-radius:25px;">
 <tr><td><label><b>To :</b></label></td>
 	 
	<td><input type="text" name="to" value=' <?php echo $title; ?>' id="to" style="width:200px; background-color:#FFFFFF">&nbsp;</td></tr>
				
 <tr>
 	<td> <label><b>From:</b></label></td>
<td><input type="text" name="from"  name="from" style="width:200px ;background-color:#FFFFFF">&nbsp;</br>
	<span style="color:red;"><b><?php echo form_error('from'); ?></b></span>
</td></tr> 
<tr>
 	<td> <label><b>Subject :</b></label></td>
<td><input type="text" name="subject"  id="subject" style="width:200px ;background-color:#FFFFFF">&nbsp;</br>
	<span style="color:red;"><b><?php echo form_error('subject'); ?></b></span>
</td></tr> 
  <tr> <td><label><b>Message :</b></label></td>
 	<td><input type="text" name="message" id="message" style="width:400px; height:200px; background-color:#FFFFFF"></br>
 			<span style="color:red;"><b><?php echo form_error('message'); ?></b></span>
</td>
 </tr>
 <tr><td><input type="submit"  style="width:200px; background-color:orange" name="Send" value="Send" ></td>
 </tr>
 </table>
</div>

</form>
	 	
<div class="footer" style='width:99%; background-color:#8585ad; box-shadow: 2px 2px 5px;'>
				<ul>
					<li><a href="<?php echo site_url('Home'); ?>">Home</a></li>
					<li><a href="<?php echo site_url('About'); ?>">About</a></li>
					<li><a href="features.php">Features</a></li>
					<li><a href="services.php">Contact Us</a></li>
				</ul>
				<p>&#169; Copyright &#169; 2016. A2Z Vehicles all rights reserved</p>
				<div class="connect">
					<a href="http://facebook.com" id="facebook">facebook</a>
					<a href="http://twitter.com" id="twitter">twitter</a>
					<a href="http://www.youtube.com" id="vimeo">vimeo</a>
				</div>
			</div>
		
	</body>
</html>  
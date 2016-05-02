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

$this->load->helper('url');
$this->load->library('session');
$this->load->helper('form');

?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>A2Z Vehicles</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style4.css">
		<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style3.css">-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/mystyle.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/menustyles.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slink.css">
		<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slink.css">
		<!--<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-1.11.2.min.js"></script>-->
		<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS.'style.css'); ?>">-->
		<!--[if IE 7]>
			<link rel="stylesheet" href="css/ie7.css" type="text/css" />
		<![endif]-->
		<?php ?>
		
		<script type='text/javascript' src="<?php echo base_url(); ?>javaScripts/menuscript.js"></script>
	</head>
	<body style='min-width:1024px;'>
	
		
		<div class="page">
		
			<div class="header">
				
				<a href="<?php echo site_url('AllAds'); ?>" id="logo"><img src="<?php echo base_url(); ?>images/logo.png" style="height:170px; width:300px;" alt=""/></a>
				<a href="<?php echo site_url('AllAds'); ?>" id="logo2"><img src="<?php echo base_url(); ?>images/headerVehicles.png" style="height:150px; width:800px;padding-left: 0px;" alt=""/></a>
				<!--<ul>
					<li class="selected"><a href="<?php echo site_url('AllAds'); ?>">Home</a></li>
					<li><a href="<?php echo site_url('About'); ?>">About</a></li>
					<li><a href="features.php">Features</a></li>
					<li><a href="<?php echo site_url('Contact_us'); ?>">Contact Us</a></li>
				</ul>-->
				
			</div>
		</div>
			

		<div id='cssmenu' style="min-width: 800px">
				<ul style='padding-left: 20%;'>
				   <li><a href='<?php echo site_url('home/'); ?>'>Home</a></li>
				   <li class='active'><a href='<?php echo site_url('AllAds/advanced_Search/'); ?>'>Advanced Search</a></li>
				   <li><a href='<?php echo site_url('Articles'); ?>'>Articles</a></li>
				   <li><a href='<?php echo site_url('Poll/All_polls'); ?>'>Polls</a></li>
				   <li><a href='<?php echo site_url('Add_new_ad/'); ?>' style="color:#FFFF99;">Post Ads</a></li>
				   <li><a href='<?php echo site_url('About'); ?>'>About Us</a></li>
				   <li><a href='<?php echo site_url('Contact_us'); ?>'>Contact Us</a></li>
				   <li><a href='#'>My Account</a>
					<ul style='z-index:5;'>
				               <li style='z-index:5;'><a href='<?php echo site_url('login');?>'>log In</a></li>
				               <li style='z-index:5;'><a href='#'>Create an Account</a></li>
							   <li style='z-index:5;'><a href="<?php echo site_url('AllAds/view_myads/1'/*.$this->session->userdata('id')*/); ?>">My Ads</a></li>
							   <li style='z-index:5;'><a href="<?php echo site_url('ReportedAds/user_report_ads/1/1'/*.$this->session->userdata('id')*/); ?>">My Reported Ads</a></li>
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
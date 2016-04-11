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
				<a href="<?php echo site_url('Home'); ?>" id="logo"><img src="<?php echo base_url(); ?>images/logo.gif" alt=""/></a>
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
			
			
				
	
				<form action ="files" method ="POST">
				<?php
				 foreach ($posts->result() as $row) {
				 
				?>
									 <h3>Hi <?php echo $row->username;?>!!!</h3>
									 <img style="width:100px; height:100px;" src="<?php echo base_url('file/'.$row->picture)?>">
										
				<?php
				 }
				 ?>
				 
				</form>
			
				<h3><a href="<?php echo base_url() ?>index.php/login/userview">MY ACCOUNT</a></h3>
				<h3><a href="<?php echo base_url() ?>index.php/login/userview">DASHBOARD</a></h3>

				<h3><a href="<?php echo base_url() ?>index.php/login/logout">logout</a></h3>
			</div>

					
			
			<div class="body">
			
				<div class="container">
	
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="cover">
									<img src="<?php echo base_url("images/car_1.jpg");?>">
								</div>
								<div class="content">
									<div class="main">
										<h3 class="name">sport car</h3>
									   
										
																				
										<div class="second">
											<span class="icon_gearbox"></span>auto
										</div>
									</div>
									<div class="price">
										Rs.2000000
									</div> 
								</div>
							</div> <!-- end front panel -->
							<div class="back">
								<p>
									<label class="title">Type</label>
									<span class="value">new</span>
								</p>
								<p>
									<label class="title">Make</label>
									<span class="value">ABC company</span>
								</p>
								<p>
									<label class="title">Model</label>
									<span class="value">AAAA</span>
								</p>
								 <p>
									<label class="title">Year</label>
									<span class="value">2015</span>
								</p>

								<p>
									<label class="title">Fuel</label>
									<span class="value">patrol</span>
								</p>
								<p>
									<label class="title">Gearbox</label>
									<span class="value">auto</span>
								</p>
								<p>
									<label class="title">Number of seats</label>
									<span class="value">4</span>
								</p>
								<p>
									<label class="title">Vehicle Type</label>
									<span class="value">Car</span>
								</p>
								
								
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->

	
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="cover">
									<img src="<?php echo base_url("images/car_4.jpg");?>">
								</div>
								<div class="content">
									<div class="main">
										<h3 class="name">sport car</h3>
									   
										
										
										
										<div class="second">
											<span class="icon_gearbox"></span>auto
										</div>
									</div>
									<div class="price">
										Rs.2000000
									</div> 
								</div>
							</div> <!-- end front panel -->
							<div class="back">
								<p>
									<label class="title">Type</label>
									<span class="value">new</span>
								</p>
								<p>
									<label class="title">Make</label>
									<span class="value">ABC company</span>
								</p>
								<p>
									<label class="title">Model</label>
									<span class="value">AAAA</span>
								</p>
								 <p>
									<label class="title">Year</label>
									<span class="value">2015</span>
								</p>

								<p>
									<label class="title">Fuel</label>
									<span class="value">patrol</span>
								</p>
								<p>
									<label class="title">Gearbox</label>
									<span class="value">auto</span>
								</p>
								<p>
									<label class="title">Number of seats</label>
									<span class="value">4</span>
								</p>
								<p>
									<label class="title">Vehicle Type</label>
									<span class="value">Car</span>
								</p>
								
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
	
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="cover">
									<img src="<?php echo base_url("images/car_2.jpg");?>">
								</div>
								<div class="content">
									<div class="main">
										<h3 class="name">sport car</h3>
									   
										
										
										<div class="second">
											<span class="icon_gearbox"></span>auto
										</div>
									</div>
									<div class="price">
										Rs.2000000
									</div> 
								</div>
							</div> <!-- end front panel -->
							<div class="back">
								<p>
									<label class="title">Type</label>
									<span class="value">new</span>
								</p>
								<p>
									<label class="title">Make</label>
									<span class="value">ABC company</span>
								</p>
								<p>
									<label class="title">Model</label>
									<span class="value">AAAA</span>
								</p>
								 <p>
									<label class="title">Year</label>
									<span class="value">2015</span>
								</p>

								<p>
									<label class="title">Fuel</label>
									<span class="value">patrol</span>
								</p>
								<p>
									<label class="title">Gearbox</label>
									<span class="value">auto</span>
								</p>
								<p>
									<label class="title">Number of seats</label>
									<span class="value">4</span>
								</p>
								<p>
									<label class="title">Vehicle Type</label>
									<span class="value">Car</span>
								</p>
								
								
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
	
	
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="cover">
									<img src="<?php echo base_url("images/car_3.jpg");?>">
								</div>
								<div class="content">
									<div class="main">
										<h3 class="name">sport car</h3>
									   
										
																				
										<div class="second">
											<span class="icon_gearbox"></span>auto
										</div>
									</div>
									<div class="price">
										Rs.2000000
									</div> 
								</div>
							</div> <!-- end front panel -->
							<div class="back">
								<p>
									<label class="title">Type</label>
									<span class="value">new</span>
								</p>
								<p>
									<label class="title">Make</label>
									<span class="value">ABC company</span>
								</p>
								<p>
									<label class="title">Model</label>
									<span class="value">AAAA</span>
								</p>
								 <p>
									<label class="title">Year</label>
									<span class="value">2015</span>
								</p>

								<p>
									<label class="title">Fuel</label>
									<span class="value">patrol</span>
								</p>
								<p>
									<label class="title">Gearbox</label>
									<span class="value">auto</span>
								</p>
								<p>
									<label class="title">Number of seats</label>
									<span class="value">4</span>
								</p>
								<p>
									<label class="title">Vehicle Type</label>
									<span class="value">Car</span>
								</p>
								
								
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
	
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="cover">
									<img src="<?php echo base_url("images/car_3.jpg");?>">
								</div>
								<div class="content">
									<div class="main">
										<h3 class="name">sport car</h3>
									   
										
										
										
										<div class="second">
											<span class="icon_gearbox"></span>auto
										</div>
									</div>
									<div class="price">
										Rs.2000000
									</div> 
								</div>
							</div> <!-- end front panel -->
							<div class="back">
								<p>
									<label class="title">Type</label>
									<span class="value">new</span>
								</p>
								<p>
									<label class="title">Make</label>
									<span class="value">ABC company</span>
								</p>
								<p>
									<label class="title">Model</label>
									<span class="value">AAAA</span>
								</p>
								 <p>
									<label class="title">Year</label>
									<span class="value">2015</span>
								</p>

								<p>
									<label class="title">Fuel</label>
									<span class="value">patrol</span>
								</p>
								<p>
									<label class="title">Gearbox</label>
									<span class="value">auto</span>
								</p>
								<p>
									<label class="title">Number of seats</label>
									<span class="value">4</span>
								</p>
								<p>
									<label class="title">Vehicle Type</label>
									<span class="value">Car</span>
								</p>
								
								
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
	
					<div class="card-container">
						<div class="card">
							<div class="front">
								<div class="cover">
									<img src="<?php echo base_url("images/car_1.jpg");?>">
								</div>
								<div class="content">
									<div class="main">
										<h3 class="name">sport car</h3>
									   
										
																				
										<div class="second">
											<span class="icon_gearbox"></span>auto
										</div>
									</div>
									<div class="price">
										Rs.2000000
									</div> 
								</div>
							</div> <!-- end front panel -->
							<div class="back">
								<p>
									<label class="title">Type</label>
									<span class="value">new</span>
								</p>
								<p>
									<label class="title">Make</label>
									<span class="value">ABC company</span>
								</p>
								<p>
									<label class="title">Model</label>
									<span class="value">AAAA</span>
								</p>
								 <p>
									<label class="title">Year</label>
									<span class="value">2015</span>
								</p>

								<p>
									<label class="title">Fuel</label>
									<span class="value">patrol</span>
								</p>
								<p>
									<label class="title">Gearbox</label>
									<span class="value">auto</span>
								</p>
								<p>
									<label class="title">Number of seats</label>
									<span class="value">4</span>
								</p>
								<p>
									<label class="title">Vehicle Type</label>
									<span class="value">Car</span>
								</p>
								
								
							</div> <!-- end back panel -->
						</div> <!-- end card -->
					</div> <!-- end card-container -->
	
				</div>
				
				
				
				<ul class="paging">
					<li><a href="#"><<</a></li>
					<li><a href="#">First</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a></li>
					<li><a href="#">10</a></li>
					<li><a href="#">11</a></li>
					<li><a href="#">12</a></li>
					<li><a href="#">13</a></li>
					<li><a href="#">14</a></li>
					<li><a href="#">15</a></li>
					<li><a href="#">16</a></li>
					<li><a href="#">17</a></li>
					<li><a href="#">18</a></li>
					<li><a href="#">19</a></li>
					<li><a href="#">20</a></li>
					<li><a href="#">21</a></li>
					<li><a href="#">Last</a></li>
					<li><a href="#">>></a></li>
				</ul>
			</div>
			
			
			<div class="footer">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="features.html">Features</a></li>
					<li><a href="services.html">Contact Us</a></li>
				</ul>
				<p>&#169; Copyright &#169; 2016. A2Z Vehicles all rights reserved</p>
				<div class="connect">
					<a href="http://facebook.com" id="facebook">facebook</a>
					<a href="http://twitter.com" id="twitter">twitter</a>
					<a href="http://www.youtube.com" id="vimeo">vimeo</a>
				</div>
			</div>
		</div>
	</body>
</html>  
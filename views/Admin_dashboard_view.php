<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<script type='text/javascript' src="<?php echo base_url(); ?>javaScripts/menuscript.js"></script>-->

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Welcome To A2Z Wheels !!</title>
  <meta name="Description" content="Windows 8 Inspired tiles with Javascript and CSS3"/>
  <meta name="Keywords" content="windows 8, javascript, jQuery, css, tile"/> 

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo-styles.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fluid_grid.css" />
  <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/html5reset-1.6.1.css" />
  <!--[if lt IE 9]>
   <link rel="stylesheet" href="css/ie7.css" />
  <![endif]-->

  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {               


          function TileAnimate() {

              $(".tile-content").hover(function (event) {
                  event.stopPropagation();

                  if (!$(this).hasClass('.tile-content .content.one')) {
                      $(this).dequeue().stop().animate({ top: "-145px" });
                  }
              }, function () {
                  $(this).addClass('animated').animate({ top: "0" }, "normal", "linear", function () {
                      $(this).removeClass('animated').dequeue();
                  });
              });
          }
          TileAnimate(); 
          

      });
  </script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/date_time.js"></script>

<body  onLoad="startclock()" style='background-color: #efeff5; padding:0px'>
<body  onLoad="TileAnimate()" style='background-color: #efeff5; padding:0px'>


<div class="containerTile" style='padding-bottom:30px ;background-color: #efeff5; padding:0px'>




  <h2>
    Welcome To A2Z Wheels !!
  </h2>
  <div class="col1">
  <div class="grid_full">
     <div class="tile blue">
        <div class="tile-content-static">
            <div class="content one">
            	<img class="top" src="<?php echo base_url(); ?>images/flickr.png" alt="flickr" />
                <h1>Welcome!</h1>
            </div>
        </div>
    </div>
  </div>

  <div class="grid_full" style='background-color: #efeff5; padding:0px'>
     <!--<div class="grid_half alpha">
         <div class="tile red">
            <div class="tile-content-static">
                <div class="content one">
                    <img class="left" src="<?php echo base_url(); ?>images/time.png" alt="time" />
                    <div id="time">                    
                    <ul>
                        <li id="para1" class="float_right"></li>
                        <li id="para2"  class="float_left"></li>
                    </ul>
                   </div>    
                </div>
            </div>
        </div>
    </div>-->
    <div class="grid_half alpha">
         <div class="tile red">
            <div class="tile-content-static">
                <div class="content one">
                    <a href="<?php echo site_url('User_Authentication/get_user_id/'); ?>"><h1>View Profile</h1></a>
                   </div>    
                </div>
            </div>
        </div>
  <div class="grid_half omega">
     <div class="tile green">
        <div class="tile-content-static">
            <div class="content one">
                <!--<img class="center" src="<?php echo base_url(); ?>images/like.png" alt="like" />-->
                	<a href="<?php echo site_url('Admin_articles/'); ?>"><h1>Delete Articles</h1></a>
            </div>
        </div>
    </div>
  </div>
  </div>

  <div class="grid_full">
     <div class="tile orange">
        <div class="tile-content">
            <div class="content one">
            	<img class="top" src="<?php echo base_url(); ?>images/emai.png" alt="Contact" />
                <a href="<?php echo site_url('User_Authentication/index/_contact_form/'); ?>"><h1>Contact User</h1></a>
            </div>
            <div class="content two">
                <a href="<?php echo site_url('User_Authentication/index/_contact_form/'); ?>"><h1>Get Connected With The Valuble Users</h1></a>
            </div>
        </div>
    </div>
  </div>  
  
  </div>
  

  <div class="col2">
  <div class="grid_full">
    <div class="tile orange">
        <div class="tile-content">
            <div class="content one">
                <img class="top" src="<?php echo base_url(); ?>images/todo.png" alt="to do list" />
                <a href="<?php echo site_url('Pending_ads/'); ?>"><h1>Pending Ads</h1></a>
            </div>
            <div class="content two ie7">
               <a href="<?php echo site_url('Pending_ads/'); ?>"><a href=""><h3>There are Ads To be Confirmed</h3></a>
            </div>
        </div>
    </div>
  </div>
  
  <div class="grid_full">
    <div class="tile red">
        <div class="tile-content">
            <div class="content one">
            	<img class="top" src="<?php echo base_url(); ?>images/feedback.png" alt="to do list" />
                <a href="<?php echo site_url('Feedback/'); ?>"><h1>View Feedbacks</h1></a>
            </div>
            <div class="content two">
                <a href="<?php echo site_url('Feedback/'); ?>"><h1>See What The Users Saying About the Site</h1></a>
            </div>
        </div>
    </div>
  </div>

  <div class="grid_full">
     <div class="grid_half alpha">
         <div class="tile royal_blue">
            <div class="tile-content-static">
                <div class="content one">
                    <!--<img class="center" src="<?php echo base_url(); ?>images/location.png" alt="location" />-->
                    <a href="<?php echo site_url('ReportedAds/ads_info/1/'); ?>"><h1>Repored Ads</h1></a>
                </div>
            </div>
        </div>
    </div>
  <div class="grid_half omega">
     <div class="tile blue">
        <div class="tile-content-static">
            <div class="content one" style="height:50px;">
                <!--<img class="top" src="<?php echo base_url(); ?>images/music.png" alt="music" />-->
                <a href="<?php echo site_url('category/category_Form/'); ?>"><h1>Manage Category</h1></a>
            </div>
        </div>
    </div></a>
  </div>
  </div>
  </div>

  
  <div class="col3">
    <div class="grid_full">
    <div class="tile green">
        <div class="tile-content">
            <div class="content one">
                <img class="top" src="<?php echo base_url(); ?>images/flickr.png" alt="flickr" />
                <a href="<?php echo site_url('Add_new_article/'); ?>"><h1>Add Articles</h1></a>
            </div>
            <div class="content two ie7">                
                <a href="<?php echo site_url('Add_new_article/'); ?>"><h4>Something Useful to Others</h4></a>
            </div>
        </div>
    </div>
  </div>
  
  <div class="grid_full">
    <div class="tile blue">
        <div class="tile-content">
             <div class="content one">
                <img class="top" src="<?php echo base_url(); ?>images/poll.png" alt="Poll" />
                <a href="<?php echo site_url('Poll/Manage_polls'); ?>"><h1>Manage Poll</h1></a>
            </div>
            <div class="content two ie7">
                <a href="<?php echo site_url(''); ?>">Get Users Opinions</a>                
            </div>
        </div>
    </div>
  </div>

  <div class="grid_full">
    <div class="tile orange">
        <div class="tile-content">
            <div class="content one">
                <img class="top" src="<?php echo base_url(); ?>images/forum.png" alt="Forum" />
                <a href="<?php echo site_url('forum_controler/index/'); ?>"><h1>Forum</h1></a>
            </div>
            <div class="content two ie7">
                <a href="<?php echo site_url('forum_controler/index/'); ?>">Manage Forum</a>
            </div>
        </div>
    </div>
  </div>
  </div>
   

</div>
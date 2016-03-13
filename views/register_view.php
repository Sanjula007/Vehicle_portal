<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter User Registration Form Demo</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style4.css" type="text/css" />
    				<a href="index.html" id="logo"><img src="<?php echo base_url("images/logo.gif");?>" alt=""/></a>

<body>
<div class="container">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </div>
</div>
	<div class="home"><img src="<?php echo base_url("images/house.png");?>"  width="30px" height="30px" float=left alt=""/><a href="<?php echo base_url() ?>index.php/login/Homeview">HOME</a></div>


	<div class="loimg">	<img src="<?php echo base_url("images/logos_18.png");?>"  width="350px" height="350px" float=left alt=""/></div>

    <div class="lo">
        	<div class="login">
		<div class="login-screen">
            <div class="panel-heading">
                <h4>User Registration Form</h4>
            </div>
            <div class="panel-body">
                <?php $attributes = array("name" => "registrationform");
                echo form_open("user1/register", $attributes);?>
                  <table>
                  
                  <tr>
                       <td><label for="name">First Name</label></td>
                   <td> <input class="form-control" name="fname" placeholder="Your UserName" type="text" value="<?php echo set_value('fname'); ?>" />
                    <span class="text-danger"><?php echo form_error('fname'); ?></span></td>
                   </tr>
                
 				 	<tr>
                       <td><label for="name">Last Name</label></td>
                   		<td> <input class="form-control" name="lname" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" />
                   		<span class="text-danger"><?php echo form_error('lname'); ?></span></td>
                  		 </tr>
                    	
                                    
               	<tr>
                   <td> <label for="email">Email ID</label></td>
                  <td>  <input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span></td>
                	</tr>
	
					<tr>
                   <td> <label for="phoneno">Phone no</label></td>
                  <td>  <input class="form-control" name="phone" placeholder="Phone Number" type="text" value="<?php echo set_value('phone'); ?>" />
                    <span class="text-danger"><?php echo form_error('phone'); ?></span></td>
                	</tr>


				<tr>
                    <td><label for="subject">Password</label></td>
                   <td><input class="form-control" name="password" placeholder="Password" type="password" />
                    <span class="text-danger"><?php echo form_error('password'); ?></span></td>
                   </tr>
                   <tr>
                   	<td> <label for="subject">Confirm Password</label></td>
                   
                    <td><input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span></td>
                </tr>
				
				<tr></tr><tr></tr><tr></tr>
					
                <tr>
                  <td> <button name="submit" type="submit" class="btn btn-default">Signup</button></td>
                  <td>  <button name="cancel" type="reset" class="btn btn-default">Cancel</button></td>
              	</tr>
              	
              	</table>
              
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
<!--<html>
<head>
<title>Update Data In Database Using CodeIgniter</title>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(). "css/update.css" ?>">
</head>
<body>
	<!--echo $this->session->userdata('username_usr');-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(). "css/update.css" ?>">
	<div class="row placeholders">
			<div class="col-xs-13 col-sm-50 placeholder">
<div id="container">
<div id="wrapper">
<h1>Update Data In Database Using CodeIgniter </h1><hr/>
<div id="menu">
<p>Click On Menu</p>
<!-- Fetching Names Of All Students From Database -->
<ol>
<?php foreach ($users as $user): ?>
<li><a  href="<?php echo base_url() . "index.php/update_ctrl/show_user_id/" . $user->AdminID; ?>"><?php echo $user->Username; ?> </a></li>
<?php endforeach; ?>
</ol>
</div>
<div id="detail">
<!-- Fetching All Details of Selected Student From Database And Showing In a Form -->
<?php foreach ($single_user as $user): ?>
<br><br><p>Edit Detail & Click Update Button</p><br><br>
<form method="post" action="<?php echo base_url() . "index.php/update_ctrl/update_user_id1"?>">
<label id="hide">Id :</label>
<input type="text" id="hide" name="did" value="<?php echo $user->AdminID; ?>">
<label>First Name :</label>
<input type="text" name="dname" value="<?php echo $user->Firstname; ?>">
<label>Last Name :</label>
<input type="text" name="dname" value="<?php echo $user->Lastname; ?>">
<label>User Name :</label>
<input type="text" name="dname" value="<?php echo $user->Username; ?>">
<label>Email :</label>
<input type="text" name="demail" value="<?php echo $user->Email; ?>">
<!--<label>Mobile :</label>
<input type="text" name="dmobile" value="<?php echo $student->student_mobile; ?>">
<label>Address :</label>
<input type="text" name="daddress" value="<?php echo $student->student_address; ?>">-->

<input type="submit" id="submit" name="dsubmit" value="Update">
</form>
<?php endforeach; ?>
</div>
</div>
</div></div>
</div>
</body>
</html>
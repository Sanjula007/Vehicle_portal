<html>
<head>
<title>Contact Form</title>
<title>Login Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/animate.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/clndr.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jqvmap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="col-xs-13 col-sm-4 placeholder"><br><br>
		
<div class="main">
	
<div id="content">
	
<h2 id="form_head">Contact Form</h2>


<div class="msg">
	<div id="form_input">
	
<?php
if (isset($message_display)) {
echo $message_display;
}
?>
</div>
<?php
echo '<div class="error_msg">';
echo validation_errors();
echo "</div>";
echo form_open('ci_email_tutorial/send_mail');
echo form_label('Email-ID');
echo "<div class='all_input'>";
$data_email = array(
'type' => 'email',
'name' => 'user_email',
'id' => 'e_email_id',
'class' => 'input_box',
'placeholder' => 'Please Enter Email'
);
echo form_input($data_email);
echo "</div>";
echo form_label('Password');
echo "<div class='all_input'>";
$data_password = array(
'name' => 'user_password',
'id' => 'password_id',
'class' => 'input_box',
'placeholder' => 'Please Enter Password'
);
echo form_password($data_password);
echo "</div>";
echo form_label('Name');
echo "<div class='all_input'>";
$data_email = array(
'name' => 'name',
'class' => 'input_box',
'placeholder' => 'Please Enter Name'
);
echo form_input($data_email);
echo "</div>";
echo form_label('To');
echo "<div class='all_input'>";
$value=NULL;
foreach ($single_user as $user):
	$value=$user->user_email;
endforeach;
if($value!==NULL){
$data_email = array(
'type' => 'email',
'name' => 'to_email',
'class' => 'input_box',
'placeholder' => 'Please Enter Email',
'value' => $value
);
}
else{
$data_email = array(
'type' => 'email',
'name' => 'to_email',
'class' => 'input_box',
'placeholder' => 'Please Enter Email');	
}
echo form_input($data_email);
echo "</div>";
echo form_label('Subject');
echo "<div class='all_input'>";
$data_subject = array(
'name' => 'subject',
'class' => 'input_box',
);
echo form_input($data_subject);
echo "</div>";
echo form_label('Message');
echo "<div class='all_input'>";
$data_message = array(
'name' => 'message',
'rows' => 5,
'cols' => 32
);
echo form_textarea($data_message);
echo "</div>";
?>
</div>
<div id="form_button">
<?php echo form_submit('submit', 'Send', "class='submit'"); ?>
</div>
<?php echo form_close(); ?>

</div>

</div>
</div>

 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-50 col-md-74 sidebar">
<div class="col-xs-13 col-sm-5 placeholder"><br><br>
<div id="menu"><br><br><br><br>
<h3>Click On User</h3>
<!-- Fetching Names Of All Students From Database -->
<ol>
<?php foreach ($users as $user): ?>
<li><a  href="<?php echo base_url() . "index.php/ci_email_tutorial/show_user_id/" . $user->id; ?>"><?php echo $user->user_name; ?> </a></li>
<?php endforeach; ?>
</ol>
</div>
</div></div>

</div>	<div class="col-xs-13 col-sm-5 placeholder"><br><br>
</div></div>

</body>
</html>


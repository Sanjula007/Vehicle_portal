<div class="row placeholders">
			<div class="col-xs-13 col-sm-50 placeholder">
<div id="container">
<div id="wrapper">


<?php

echo form_open('profile_ctrl/changepwd');
echo validation_errors();

?>
<br><br><br><br><br><br>
<h3> Change You'r Password </h3>
<table class=”table table-bordered”>

<tbody>


<tr>
<td><small><?php echo "Username:";?></small></td>
<td><?php echo form_input('username');?></td>

</tr>
<tr>
<td><small><?php echo "Old Password:";?></small></td>
<td><?php echo form_password('opassword');?></td>

</tr>
<tr>
<td><small><?php echo "New Password:";?></small></td>
<td><?php echo form_password('npassword');?></td>

</tr>
<tr>
<td><small><?php echo "Confirm Password:";?></small></td>
<td><?php echo form_password('cpassword');?></td>

</tr>
</tbody>
</table>

&nbsp;&nbsp;<div id=”some”style=”position:relative;”><button type=”submit” class=”btn btn-primary”><i class=” icon-ok-sign icon-white”></i>&nbsp;Submit</button>

<?php

echo form_close();

?>
</div></div></div>
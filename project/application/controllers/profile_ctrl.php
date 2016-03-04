<?php

//session_start(); //we need to start session in order to access it through CI

Class Profile_Ctrl extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('login_database');
$this->load->model('profile_model');
$this->load->model('update_model');



$this->load->library('encrypt');


}

// Show login page

	
function index(){
	//require('user_authentication.php');
 	//$user_authentication = new User_Authentication();
 	//$user_authentication->getUserName();
  
	$user=$this->session->flashdata('flash_username');
	$data['users'] = $this->profile_model->show_user_details($user);

//$data['single_user'] = $this->update_model->show_user_id($id);
$this->load->view('test_nav1');
$this->load->view('test_menu');
$this->load->view('profile_view', $data);
//echo $user;
}



public function change_password(){
	$this->load->view('test_nav1');
	$this->load->view('test_menu');
	$this->load->view('change_pw_view');
}


public function changepwd(){
$this->load->library('form_validation');
echo "<br><br><br>";
$this->form_validation->set_rules('opassword','Old Password','required|trim|xss_clean|callback_change');
$this->form_validation->set_rules('npassword','New Password','required|trim');
$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[npassword]');

if($this->form_validation->run()!= true)
{
	$this->load->view('test_nav1');
	$this->load->view('test_menu');
$this->load->view('change_pw_view');

}
}
public function change() // we will load models here to check with database
{
	$getUser=$this->input->post('username');
$sql = $this->db->select("*")->from("admin_reg")->where("Username",$getUser)->get();
//$sql = $this->db->select("*")->from("admin_reg")->where("Email",'aa@gmail.com')->get();

foreach ($sql->result() as $my_info) {

$db_password = $my_info->Password; //echo $db_password; echo "<br>";
$key2=(md5($db_password));//echo $key2; echo "<br>";
$db_id = $my_info->AdminID; //echo $db_id; echo "<br>";
}
$key=$this->input->post("opassword"); //echo $key;echo "<br>";
$hhh=md5($key); //echo $hhh;echo "<br>";
$ttt=substr($hhh, 0,20);

if($ttt == $db_password){
	//if(($this->input->post('opassword')) == $db_password){
		//if(("0c2fbabd71c5f685717b") == $db_password){

//$fixed_pw = mysqli_real_escape_string(md5($this->input->post("npassword")));
$fixed_pw = md5($this->input->post("npassword"));
	//$fixed_pw = mysql_real_escape_string(($this->input->post("npassword")));
$update = $this->db->query(" Update `admin_reg` SET `Password`='$fixed_pw' WHERE `AdminID`='$db_id' ")or die(mysql_error());
//$update = $this->db->Update("admin_reg")->SET("Password",$fixed_pw)->where("AdminID",$db_id);
$this->form_validation->set_message('change','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Password Updated!</strong></div>');
//$this->load->view('test_nav1');
	//$this->load->view('test_menu');
return false;

}else
$this->form_validation->set_message('change','<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Wrong Old Password!</strong> </div>');

return false;

}



public function change2() // we will load models here to check with database
{
	
	
	$getUser=$this->input->post('username');
$sql = $this->db->select("*")->from("admin_reg")->where("Username",$getUser)->get();
//$sql = $this->db->select("*")->from("admin_reg")->where("Email",'aa@gmail.com')->get();

foreach ($sql->result() as $my_info) {

$db_password = $my_info->Password; echo $db_password; echo "<br>";
$key2=(md5($db_password));echo $key2; echo "<br>";
$db_id = $my_info->AdminID; echo $db_id; echo "<br>";
}
$key=$this->input->post("opassword"); echo $key;echo "<br>";
$hhh=md5($key); echo $hhh;echo "<br>";
$ttt=substr($hhh, 0,20);

if($ttt == $db_password){
	//if(($this->input->post('opassword')) == $db_password){
		//if(("0c2fbabd71c5f685717b") == $db_password){

//$fixed_pw = mysqli_real_escape_string(md5($this->input->post("npassword")));
$fixed_pw = md5($this->input->post("npassword"));
	//$fixed_pw = mysql_real_escape_string(($this->input->post("npassword")));
$update = $this->db->query(" Update `admin_reg` SET `Password`='$fixed_pw' WHERE `AdminID`='$db_id' ")or die(mysql_error());
//$update = $this->db->Update("admin_reg")->SET("Password",$fixed_pw)->where("AdminID",$db_id);
$this->form_validation->set_message('change','<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Password Updated!</strong></div>');
return false;

}else
$this->form_validation->set_message('change','<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Wrong Old Password!</strong> </div>');

return false;

}





}
?>
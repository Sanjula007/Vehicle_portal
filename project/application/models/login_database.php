<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "user_name =" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('user_login', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}
/*
// Read data using username and password
public function login($data) {

$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "user_name =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}
*/


/*
public function email_exists($email){
	$sql="select user_name,user_email from user_login where user_email='{$email}' limit 1 ";
	$result=$this->db->query($sql);
	$row=$result->row();
	return ($result->num_rows()===1 && $row->user_email)?$row->user_name:FALSE;
}

public function verify_reset_password_code($email,$code){
	$sql="select user_name,user_email from user_login where user_email='{$email}' limit 1 ";
	$result=$this->db->query($sql);
	$row=$result->row();
	//return ($result->num_rows()==1 && $row->email)?$row->user_name:FALSE;
	if($result->num_rows()==1){
		return ($code==md5($this->config->item('salt').$row->user_name))?TRUE:FALSE;
	}
	else{
		return FALSE;
	}
}

public function update_password(){
	$email=$this->input->post('email');
	$password=sha1($this->config->item('salt').$this->input->post('password'));
	$sql="Update user_login set user_password='{$password}' where user_email='{$email}' LIMIT 1";
	$this->db->query($sql);
	if($this->db->affected_rows()===1){
		return true;
	}
	else{
		return false;
	}
}
*/

// Read data using username and password
public function login2($data) {

$condition = "Username =" . "'" . $data['username'] . "' AND " . "Password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('admin_reg');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "Username =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('admin_reg');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

public function registration($data){
	// Query to check whether username already exist or not
$condition = "Username =" . "'" . $data['username'] . "'";
$this->db->select('*');
$this->db->from('admin_reg');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('admin_reg', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}


public function email_exists($email){
	$sql="select Username,Email from admin_reg where Email='{$email}' limit 1 ";
	$result=$this->db->query($sql);
	$row=$result->row();
	return ($result->num_rows()===1 && $row->Email)?$row->Username:FALSE;
}

public function verify_reset_password_code($email,$code){
	$sql="select Username,Email from admin_reg where Email='{$email}' limit 1 ";
	$result=$this->db->query($sql);
	$row=$result->row();
	//return ($result->num_rows()==1 && $row->email)?$row->user_name:FALSE;
	if($result->num_rows()==1){
		return ($code==md5($this->config->item('salt').$row->Username))?TRUE:FALSE;
	}
	else{
		return FALSE;
	}
}

public function update_password(){
	$email=$this->input->post('email');
	$password=sha1($this->config->item('salt').$this->input->post('password'));
	$sql="Update admin_reg set Password='{$password}' where Email='{$email}' LIMIT 1";
	$this->db->query($sql);
	if($this->db->affected_rows()===1){
		return true;
	}
	else{
		return false;
	}
}


}

?>
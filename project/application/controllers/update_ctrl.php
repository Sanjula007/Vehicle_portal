<?php
class Update_Ctrl extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('update_model');
	}

function index(){
	
$id = $this->uri->segment(3);
$data['users'] = $this->update_model->show_users();
$data['single_user'] = $this->update_model->show_user_id($id);
$this->load->view('test_nav1');
$this->load->view('test_menu');
$this->load->view('update_view', $data);
}

Public function show_user_id() {
$id = $this->uri->segment(3);
$data['users'] = $this->update_model->show_users();
$data['single_user'] = $this->update_model->show_user_id($id);
$this->load->view('test_nav1');
$this->load->view('test_menu');
$this->load->view('update_view', $data);
}
Public function update_user_id1() {
$id= $this->input->post('did');
$data = array(
'User_Name' => $this->input->post('dname'),
'User_Email' => $this->input->post('demail'),
//'Student_Mobile' => $this->input->post('dmobile'),
'User_Password' => $this->input->post('daddress')
);
$this->update_model->update_user_id1($id,$data);
$this->show_user_id();
}
}
?>
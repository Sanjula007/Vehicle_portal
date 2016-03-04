<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class CI_Email_Tutorial extends CI_Controller {

public function __construct() {
parent::__construct();
$this->load->helper('form');
$this->load->library('form_validation');
$this->load->library('encrypt');
// Load database
$this->load->model('update_model');
$this->load->model('contact_model');
}
// Show email page
public function index() {
	
	$id = $this->uri->segment(3);
$data['users'] = $this->contact_model->show_users();
$data['single_user'] = $this->contact_model->show_user_id($id);
	$this->load->view('test_nav1');
	$this->load->view('test_menu');
	$this->load->view('view_form', $data);
}

Public function show_user_id() {
$id = $this->uri->segment(3);
$data['users'] = $this->contact_model->show_users();
$data['single_user'] = $this->contact_model->show_user_email($id);
$this->load->view('test_nav1');
	$this->load->view('test_menu');
	$this->load->view('view_form', $data);
}



// Send Gmail to another user
public function Send_Mail() {

$config = Array(
	  'protocol' => 'smtp',
	  'smtp_host' => 'ssl://smtp.googlemail.com',
	  'smtp_port' => 465,
	  'smtp_user' => 'adrp.athukorala@gmail.com', // change it to yours
	  'smtp_pass' => 'rashini12', // change it to yours
	  'mailtype' => 'html',
	  'charset' => 'iso-8859-1',
	  'wordwrap' => TRUE
	);


// Check for validation
$this->form_validation->set_rules('user_email', 'User Email', 'trim|required|xss_clean');
$this->form_validation->set_rules('user_password', 'User Password', 'trim|required|xss_clean');
$this->form_validation->set_rules('to_email', 'To', 'trim|required|xss_clean');
$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
if ($this->form_validation->run() == FALSE) {
$this->load->view('view_form');
} else {

// Storing submitted values
$sender_email = $this->input->post('user_email');
$user_password = $this->input->post('user_password');
$receiver_email = $this->input->post('to_email');
$username = $this->input->post('name');
$subject = $this->input->post('subject');
$message = $this->input->post('message');

// Configure email library
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = $sender_email;
$config['smtp_pass'] = $user_password;

// Load email library and passing configured values to email library
$this->load->library('email', $config);
$this->email->set_newline("\r\n");

// Sender email address
$this->email->from($sender_email, $username);
// Receiver email address
$this->email->to($receiver_email);
// Subject of email
$this->email->subject($subject);
// Message in email
$this->email->message($message);

if ($this->email->send()) 
{
	$id = $this->uri->segment(3);
$data['users'] = $this->contact_model->show_users();
$data['single_user'] = $this->contact_model->show_user_email($id);
	$data['message_display'] = 'Email Successfully Send !';
	//$message= "mail Successfully send";
} else 
{
	$id = $this->uri->segment(3);
$data['users'] = $this->contact_model->show_users();
$data['single_user'] = $this->contact_model->show_user_email($id);
	$data['message_display'] =  '<p class="error_msg">Invalid Gmail Account or Password !</p>';
}
	//$this->load->view('view_form', $data);
	$this->load->view('test_menu');
	$this->load->view('test_nav1');
	$this->load->view('view_form', $data);
	//echo "<br><br>";
	//echo $message;
}
}
}
?>


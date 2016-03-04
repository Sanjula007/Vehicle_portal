<?php

//session_start(); //we need to start session in order to access it through CI

Class Admin_Page_Control extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
//$this->load->library('session');

// Load database
$this->load->model('login_database');
}

public function index() {
	//$this->load->view('admin_view');
	$this->load->view('dashboard');
}
}

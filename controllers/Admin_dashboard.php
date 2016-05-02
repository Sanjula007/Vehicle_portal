<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_dashboard extends CI_Controller {
     
    public function index() 
    {
    	$this->load->helper('url');
		$this->load->view('header');
		//$this->load->view('right_coloumn');
		$this->load->view('Admin_dashboard_view');
		$this->load->view('footer');
    }
}
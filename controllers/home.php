<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class home extends CI_Controller {
     
    public function index() 
    {
    	$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('panel');
		$this->load->view('categories');
        $this->load->view('home');
		$this->load->view('footer');
    }
}
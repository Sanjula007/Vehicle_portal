<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {
	var $mapp=5;
	public static $adSearchQ='';
	
	
	
	public function _construct(){
		
		parent::_construct();
		$this->load->helper('url');
		$this->load->library('session');
		
			
	}
	
	public function index(){
		$this->load->library('session');
		$this->load->helper('url');
		
		$this->load->helper('url');
		$this->load->view('header1');
		$this->showCategory();
		$this->load->view('homeimage');
	
	
	}
	
	function showCategory(){
		
		$this->load->model('category_model');
		
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		
		$this->load->view('load_category_view',$data);
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class home extends CI_Controller {
     
	public function _construct(){
		
		parent::_construct();
		$this->load->helper('url');
		$this->load->library('session');
		
			
	}
	
	public function index(){
		$this->load->library('session');
		$this->load->helper('url');
		
		$this->load->helper('url');
		$this->load->view('header');
		$this->showCategory();
		$this->load->view('homeimage');
		$this->load->view('footer');
	
	
	}
	
	function showCategory(){
		
		$this->load->model('category_model');
		
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		
		$this->load->view('load_category_view',$data);
	}
}
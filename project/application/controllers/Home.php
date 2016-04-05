<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author it14119804
 */
class Home extends CI_Controller {
     
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
		
		$category=$this->category_model->all_Category();
		$data['category']=$category;
		
		$this->load->view('load_category_view',$data);
	}
}
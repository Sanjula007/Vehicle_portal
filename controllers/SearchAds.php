<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

class SearchAds extends CI_Controller {
	//public $mapp;
	
	
	public function _construct(){
		
		parent::_construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Search_model');
	}
	
	public function index(){
		$this->load->helper('url');
		$this->load->database();
	}
	
	
	/*this is the function to get and show ads according to brand name searched by users */
	public function ads_page(){
		$this->load->database();
		$strBrand = $this->input->post('searchB'); //entered brand name by the user is paased to $strBrand variable
		$this->load->model("Search_model", 'ads');
		$car=$this->ads->get_search($strBrand); //loading the search values from db
		$data['vehicle']=$car; //passing the search results to vehicle array
		
		$this->load->view('header');
		$this->load->controller('AllAds');
		$this->AllAds->showCategory();
		$this->load->view('panel');
		$this->load->view("AllAds_view",$data); //showing the search results
		$this->load->view('footer');
		
	}// enfd of function

}//end of controller
    
    
?>
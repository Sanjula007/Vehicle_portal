<?php
    
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_ads extends CI_Controller 
{
	//public $mapp;
	
	
	public function _construct()
	{
		parent::_construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Search_model');
	}
	
	public function index()
	{
		$this->load->helper('url');
		$this->load->database();
	}
	
	
	/*this is the function to get and show ads according to brand name searched by users */
	public function ads_page()
	{
		$this->load->database();
		//entered brand name by the user is paased to $strBrand variable
		$strBrand = $this->input->post('searchB'); 
		$this->load->model("Search_model", 'ads');
		//loading the search values from db
		$car=$this->ads->get_search($strBrand); 
		//passing the search results to vehicle array
		$data['vehicle']=$car; 
		
		$this->load->view('header');
		//$this->load->controller('AllAds');
		//$this->AllAds->show_category();
		$this->load->view('right_coloumn');
		$this->load->view("AllAds_view",$data); //showing the search results
		$this->load->view('footer');
		
	}// enfd of function

}//end of controller
    
    
?>
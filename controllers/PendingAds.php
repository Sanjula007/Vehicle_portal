<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

class PendingAds extends CI_Controller {
	//public $mapp;
	
	
	public function _construct(){
		
		parent::_construct();
		$this->load->helper('url');
	}
	
	public function index(){
		$this->load->helper('url');
		$this->ads_page(1);
	}
	
	
	/*function to show added ads yet to be confirmed by the admin*/
	public function ads_page(){
		$mapp=3;
		$this->load->helper('url');
		$this->load->view('header');
		//$this->load->controller('AllAds');
		//$this->AllAds->showCategory();
		$this->load->view('panel');
		$this->load->model("Pending_Ads_model","Ads");
		$car=$this->Ads->allAds();
		
		$data['vehicle']=$car;
		$this->load->view("PendingAds_view",$data);
		$this->load->view('footer');
	}// end of function
    
    
    
    
}
    
?>
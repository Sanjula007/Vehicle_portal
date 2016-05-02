<?php
    
defined('BASEPATH') OR exit('No direct script access allowed');

class Pending_ads extends CI_Controller 
{
	//public $mapp;
	
	
	public function _construct()
	{
		parent::_construct();
		$this->load->helper('url');
	}
	
	public function index()
	{
		$this->load->helper('url');
		$this->ads_page(1);
	}
	
	
	/*function to show added ads yet to be confirmed by the admin*/
	public function ads_page()
	{
		$mapp=3;
		$this->load->helper('url');
		$this->load->view('header');
		//$this->load->controller('AllAds');
		//$this->AllAds->showCategory();
		//$this->load->view('panel');
		$this->load->view('right_coloumn');
		//$this->load->view('left_coloumn');
		
		$this->load->model("Pending_ads_model","Ads");
		$car=$this->Ads->all_ads();
		
		$data['vehicle']=$car;
		$this->load->view("PendingAds_view",$data);
		$this->load->view('footer');
	}// end of function
    
    
    
    
}
    
?>
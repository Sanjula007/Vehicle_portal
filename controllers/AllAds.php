<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllAds extends CI_Controller {
	//public $mapp;
	var $mapp=5;					//set of max advertisement per one page 
	public static $adSearchQ='';
	
	
	public function _construct(){
		
		parent::_construct();
		$this->load->helper('url');
			
	}
	
	public function index(){
		$this->load->helper('url');
		
		$this->ads_page(1);
		
	}
	
	
	/*public function ads_page($page,$sort)*/
	public function ads_page(){
		$mapp=3;
		$this->load->helper('url');
		$this->load->view('header');
		$this->showCategory();
		$this->load->view('panel');
		//$this->load->view('categories');
		
		//$this->showCategory();
		$this->load->model("AllAds_model","Ads");
		$car=$this->Ads->allAds();
		
		$data['vehicle']=$car;
		
		
		
		$this->load->view("AllAds_view",$data);
		
		$this->load->view('footer');
	}
	
	public function ads_page_category($category,$page,$sort){
		
		$this->load->helper('url');
		
		//load the model AllAds_model
		$this->load->model("AllAds_model","Ads");
		// get Advertisements by parameters
		$car=$this->Ads->limit_Ads_category($page,$this->mapp,$category,$sort);
		//get no of advertisement for the category
		$count=$this->Ads->ads_count_category($category);
		
		//put data to the data array
		$data['vehicle']=$car;					//put advertisement data
		$data['count']=$count;					//put no of Advertisements 
		$data['pages']=$this->Ads->set_pagecount($count,$this->mapp); //get and set of pages for the category
		$data['type']='Category'; 				//page type
		$data['sort']=$sort; 					//sorting type
		$data['category']=$category; 			//category name
		
		//load the views
		$this->load->view('header');
		$this->showCategory();
		$this->load->view("AllAds_view",$data);
		$this->load->view('AdsPages_view',$data);
		$this->load->view('footer');
		
		
	}
	
	public function ads_page_category2($category){
		
		$this->load->helper('url');
		
		//load the model AllAds_model
		$this->load->model("AllAds_model","Ads");
		// get Advertisements by parameters
		//$car=$this->Ads->limit_Ads_category($page,$this->mapp,$category,$sort);
		//get no of advertisement for the category
		//$count=$this->Ads->ads_count_category($category);
		
		//put data to the data array
		$data['vehicle']=$car;					//put advertisement data
		$data['count']=$count;					//put no of Advertisements 
		$data['pages']=$this->Ads->set_pagecount($count,$this->mapp); //get and set of pages for the category
		$data['type']='Category'; 				//page type
		$data['sort']=$sort; 					//sorting type
		$data['category']=$category; 			//category name
		
		//load the views
		$this->load->view('header');
		$this->showCategory();
		$this->load->view("AllAds_view",$data);
		$this->load->view('AdsPages_view',$data);
		$this->load->view('footer');
		
		
	}
	
	
	
	function showCategory(){
		//load the category model
		$this->load->model('category_model');
		//get All Categories
		$category=$this->category_model->allCategory();
		$catData['category']=$category;
		//send categories to view and load it
		$this->load->view('categories',$catData);
	}
	
	
	
	/*public function ads_page($page){
		$mapp=3;
		$this->load->helper('url');
		$this->load->view('header');
		//$this->load->view('categories');
		
		//$this->showCategory();
		$this->load->model("AllAds_model","Ads");
		//$car=$this->Ads->limit_Ads($page,$mapp);
		//$count=$this->Ads->ads_count();
		//$data['vehicle']=$car;
		//$data['count']=$count;
		$this->load->view("AllAds_view");
		//$data1['pages']=$this->Ads->set_pagecount($count,$mapp);
		//$data1['type']='All';
		//$this->load->view('AdsPages_view',$data1);
		
		
		
	}
	
	
	/*public function ads_page_category($category,$page){
		$mapp=3;
		$this->load->helper('url');
		$this->load->view('header');
		//$this->load->view('categories');
		
		$this->showCategory();
		$this->load->model("AllAds_model","Ads");
		$car=$this->Ads->limit_Ads_category($page,$mapp,$category);
		$count=$this->Ads->ads_count_category($category);
		$data['vehicle']=$car;
		$data['count']=$count;
		$this->load->view("AllAds_view",$data);
		$data1['pages']=$this->Ads->set_pagecount($count,$mapp);
		$data1['type']='Category';
		$data1['category']=$category;
		$this->load->view('AdsPages_view',$data1);
		
		
		
	}
	
	function showCategory(){
		
		$this->load->model('category_model');
		
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		
		$this->load->view('load_category_view',$data);
	}*/
	
	
}

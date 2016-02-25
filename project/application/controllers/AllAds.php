<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllAds extends CI_Controller {
	var $mapp=5;					//set of max advertisement per one page 
	public static $adSearchQ=''; 	//store the current sql query
	
	
	// constructor
	public function _construct(){
		
		parent::_construct();
		$this->load->helper('url');
		$this->load->library('session');
		
			
	}
	//view first page of Advertisements
	public function index(){
		$this->load->library('session');
		$this->load->helper('url');
		$this->ads_page(1,'popularity');
		
		
	}
	/*
		*view the Advertisements that in page 
		*$page - page number
		*$sort- sorting type ( date , popularity )
	*/
	public function ads_page($page,$sort){
		
		$this->load->helper('url');
		//load the AllAds_model model 
		$this->load->model("AllAds_model","Ads");
		
		//get Ad information for the page number
		$car=$this->Ads->limit_Ads($page,$this->mapp,$sort);
		
		// get number of Advertisements
		$count=$this->Ads->ads_count();
		
		//data array for send data to AllAds_view
		$data['vehicle']=$car; 			//vehicle information
		$data['count']=$count;			//Advertisements count
		$data['sort']=$sort;			//sorting type
		$data['pages']=$this->Ads->set_pagecount($count,$this->mapp); //get the no of pages that have
		$data['type']='All';
		
		//load the views
		//view the header
		$this->load->view('header');
		//view the categories
		$this->showCategory();
		
		$this->load->view("AllAds_view",$data);
		$this->load->view('AdsPages_view',$data);
		$this->load->view('footer');
		
		
	}
	/*
		*view the Advertisements that in page by categories
		*$page - page number
		*$sort- sorting type ( date , popularity )
		* $category- category  name (car,van....)
	*/
	
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
	/*
		*showCategory function for show All Categroies that available
		*
	*/
	function showCategory(){
		//load the category model
		$this->load->model('category_model');
		//get All Categories
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		//send categories to view and load it
		$this->load->view('load_category_view',$data);
		
	}
	
	function view_myads($id){
		
		
		$this->load->helper('url');
				
		$sort='date';
		$page=1;
		
		$this->load->model("AllAds_model","Ads");
		$car=$this->Ads->my_Ads($page,$this->mapp,$sort,$id);
		$count=$this->Ads->ads_count();
		$data['vehicle']=$car;
		$data['count']=$count;
		$data['sort']=$sort;
		$data['pages']=$this->Ads->set_pagecount($count,$this->mapp);
		$data['type']='none';
		
		
		$this->load->view('header');
		$this->showCategory();
		$this->load->view("myAds_view",$data);
		$this->load->view('footer');
		
		
	}
	
	function showAdSearch(){
		
		$this->load->helper('url');
		$this->load->view('header');
		$this->showCategory();
		$this->load->model('category_model');
		$this->load->helper('form');
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		$this->load->view("AdvancedSearch_view",$data);
		$this->load->view('footer');
		
		
	}
	
	function advancedSearch(){
		$this->load->library('session');
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('max_price', 'max_price', 'required|numeric');
		$this->form_validation->set_rules('min_price', 'min_price', 'required|numeric');
		$this->form_validation->set_rules("condition", "condition", "required");
		$this->form_validation->set_rules('max_year', 'max_year', 'required|numeric');
		$this->form_validation->set_rules('min_year', 'min_year', 'required|numeric');
		
		
		if ($this->form_validation->run() == FALSE) {
		
		$this->showAdSearch();
		}
		else{
			$data=array(
			'category'=>$this->input->post('category') ,
			'brand'=>$this->input->post('brand') ,
			'model'=>$this->input->post('model') ,
			'condition'=>$this->input->post('condition') ,
			'min_price'=>$this->input->post('min_price') ,
			'max_price'=>$this->input->post('max_price') ,
			'min_year'=>$this->input->post('min_year') ,
			'max_year'=>$this->input->post('max_year') ,
			);
			$this->session->set_userdata($data);
		$this->load->model("AllAds_model",'ads');
		$vehicle=$this->ads->advancedSearch($data,1,$this->mapp);
		self::$adSearchQ=$this->ads->getSearchQuery($data);
		$data['vehicle']=$vehicle;
		$data['count']=$this->ads->getSearchCount($data);;
		$data['sort']='date';
		$data['pages']=$this->ads->getSearchCount($data)/$this->mapp;
		$data['type']='adSearch';
		$data['query']=self::$adSearchQ;
		$this->load->view("header");
		$this->showCategory();
		$this->load->model('category_model');
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		$this->load->view("AdvancedSearch_view");
		$this->load->view("AllAds_view",$data);
		$this->load->view('AdsPages_view',$data);
		
		
		//print_r($this->searcharray);
		
			
		}
	}
	
	function advancedSearchPage($page){
		
		$this->load->helper('url');;
		$this->load->library('session');	
		$this->load->library('form_validation');	
	
		
			$data=array(
			'category'=>$this->session->userdata('category') ,
			'brand'=>$this->session->userdata('brand') ,
			'model'=>$this->session->userdata('model') ,
			'condition'=>$this->session->userdata('condition') ,
			'min_price'=>$this->session->userdata('min_price') ,
			'max_price'=>$this->session->userdata('max_price') ,
			'min_year'=>$this->session->userdata('min_year') ,
			'max_year'=>$this->session->userdata('max_year') ,
			);
	
		$this->load->model("AllAds_model",'ads');
		$vehicle=$this->ads->advancedSearch($data,$page,$this->mapp);
		self::$adSearchQ=$this->ads->getSearchQuery($data);
		$data['vehicle']=$vehicle;
		$data['count']=$this->ads->getSearchCount($data);;
		$data['sort']='date';
		$data['pages']=$this->ads->getSearchCount($data)/$this->mapp;
		$data['type']='adSearch';
		$data['query']=self::$adSearchQ;
		$this->load->view("header");
		$this->showCategory();
		$this->load->model('category_model');
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		$this->load->view("AdvancedSearch_view",$data);
		$this->load->view("AllAds_view",$data);
		$this->load->view('AdsPages_view',$data);
		$this->load->view('footer');
		
		
		
			
		
	}
	
	
	
	
		
	
	
	
}

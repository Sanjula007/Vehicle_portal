<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllAds extends CI_Controller {
	var $mapp=5;
	var $adSearchQ;
	
	
	public function _construct(){
		
		parent::_construct();
		$this->load->helper('url');
			
	}
	
	public function index(){
		$this->load->helper('url');
		
		$this->ads_page(1,'popularity');
		
	}
	
	public function ads_page($page,$sort){
		
		$this->load->helper('url');
		$this->load->view('header');
		
		
		$this->showCategory();
		$this->load->model("AllAds_model","Ads");
		$car=$this->Ads->limit_Ads($page,$this->mapp,$sort);
		$count=$this->Ads->ads_count();
		$data['vehicle']=$car;
		$data['count']=$count;
		$data['sort']=$sort;
		$data['pages']=$this->Ads->set_pagecount($count,$this->mapp);
		$data['type']='All';
		$this->load->view("AllAds_view",$data);
		
		$this->load->view('AdsPages_view',$data);
		
		
		
	}
	
	
	public function ads_page_category($category,$page,$sort){
		
		$this->load->helper('url');
		$this->load->view('header');
		$this->showCategory();
		$this->load->model("AllAds_model","Ads");
		$car=$this->Ads->limit_Ads_category($page,$this->mapp,$category,$sort);
		$count=$this->Ads->ads_count_category($category);
		$data['vehicle']=$car;
		$data['count']=$count;
		$data['pages']=$this->Ads->set_pagecount($count,$this->mapp);
		$data['type']='Category';
		$data['sort']=$sort;
		$data['category']=$category;
		$this->load->view("AllAds_view",$data);
		
		$this->load->view('AdsPages_view',$data);
		
		
		
	}
	
	function showCategory(){
		
		$this->load->model('category_model');
		
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		
		$this->load->view('load_category_view',$data);
	}
	
	function view_myads($id){
		
		
		$this->load->helper('url');
		$this->load->view('header');
		$sort='date';
		$page=1;
		$this->showCategory();
		$this->load->model("AllAds_model","Ads");
		$car=$this->Ads->my_Ads($page,$this->mapp,$sort,$id);
		$count=$this->Ads->ads_count();
		$data['vehicle']=$car;
		$data['count']=$count;
		$data['sort']=$sort;
		$data['pages']=$this->Ads->set_pagecount($count,$this->mapp);
		$data['type']='none';
		$this->load->view("myAds_view",$data);
		
		$this->load->view('AdsPages_view',$data);
		
		
	}
	
	function showAdSearch(){
		
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->model('category_model');
		$this->load->helper('form');
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		$this->load->view("AdvancedSearch_view",$data);
		
		
	}
	
	function advancedSearch(){
		
		$this->load->helper('url');;	
		//echo form_error('price');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('max_price', 'max_price', 'required|numeric');
		$this->form_validation->set_rules('min_price', 'min_price', 'required|numeric');
		$this->form_validation->set_rules("condition", "condition", "required");
		
		if ($this->form_validation->run() == FALSE) {
		echo $this->input->post('min_price');
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
		$this->load->model("AllAds_model",'ads');
		$vehicle=$this->ads->advancedSearch($data,1,$this->mapp);
		$this->adSearchQ=$this->ads->getSearchQuery($data);
		$data['vehicle']=$vehicle;
		echo $data['count']=count($vehicle);
		$data['sort']='date';
		$data['pages']=2;
		$data['type']='adSearch';
		$this->load->view("header");
		$this->load->model('category_model');
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		$this->load->view("AdvancedSearch_view",$data);
		
		
		
			
		}
	}
	
	function advancedSearchPage(){
		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('max_price', 'max_price', 'required|numeric');
		$this->form_validation->set_rules('min_price', 'min_price', 'required|numeric');
		$this->form_validation->set_rules("condition", "condition", "required");
		
		if ($this->form_validation->run() == FALSE) {
		echo $this->input->post('min_price');
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
		$this->load->model("AllAds_model",'ads');
		$vehicle=$this->ads->advancedSearch($data,2,$this->mapp);
		$this->adSearchQ=$this->ads->getSearchQuery($data);
		$data['vehicle']=$vehicle;
		echo $data['count']=count($vehicle);
		$data['sort']='date';
		$data['pages']=count($vehicle)/$this->mapp;
		$data['type']='adSearch';
		$this->load->view("header");
		$this->load->model('category_model');
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		$this->load->view("AdvancedSearch_view",$data);
		$this->load->view("AllAds_view",$data);
		$this->load->view('AdsPages_view',$data);
		
		
			
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

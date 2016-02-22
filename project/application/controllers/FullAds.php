

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FullAds extends CI_Controller {
	public $tmapp=8;
	public function _construct(){
		
		parent::_construct();
			
	}
	
	public function index(){
		
		$this->load->helper('url');
		$this->load->view('header');
		$this->showCategory();
		$this->load->model("Ads");
		$car=$this->Ads->allAds();
		$data['carss']=$car;
		$this->load->view("body",$data);
		$data1['pages']=$this->Ads->set_pagecount($this->mapp);
		$this->load->view('AdsPages_view',$data1);
	}
	/*
		*adsinfo function for show All information of the advetisments
		*
	*/
	public function adsinfo($data){
		
		$this->load->helper('url');
		//load the header view
		$this->load->view('header');
		//load the Category
		$this->showCategory();
		// get data from database
		$this->load->model("FullAds_model");
		$car=$this->FullAds_model->adsinfo1($data);
		//set no of views
		$this->setNoOfViews($data);
		//send data to view and view it
		$data1['vehicle']=$car;
		$this->load->view('FullAds_view',$data1);
		$this->load->view('footer');
	}
	/*
		*adsinfo function for show All information of the advetisments
		*
	*/
	/*public function Category($category){
		
		$this->load->helper('url');
		$this->load->view('header');
		$this->showCategory();
		$this->load->model("Ads");
		$car=$this->Ads->allcars();
		
		$data['carss']=$car;
		$this->load->view("body",$data);
		$data1['pages']=$this->Ads->set_pagecount($this->mapp);
		$this->load->view('AdsPages_view',$data1);
	}*/
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
	/*
		*setNoOfViews function to set no Of Views from one when ad is loaded 
		*
	*/
	function setNoOfViews($adsid){
		//load model
		$this->load->model('FullAds_model');
		//set of of views
		$this->FullAds_model->setViews($adsid);
			
	}

}


<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FullAds extends CI_Controller {
	//public $mapp;
	public function _construct(){
		
		parent::_construct();
			
	}
	
	public function index(){
		$mapp=8;
		$this->load->helper('url');
		$this->load->view('header');
		$this->showCategory();
		$this->load->model("Ads");
		$car=$this->Ads->allAds();
		$data['carss']=$car;
		$this->load->view("body",$data);
		$data1['pages']=$this->Ads->set_pagecount($mapp);
		$this->load->view('AdsPages_view',$data1);
	}
	
	public function adsinfo($data){
		$mapp=8;
		$this->load->helper('url');
		$this->load->view('header');
		$this->showCategory();
		$this->load->model("FullAds_model");
		$car=$this->FullAds_model->adsinfo1($data);
		$this->setNoOfViews($data);
		$data1['vehicle']=$car;
		
		$this->load->view('FullAds_view',$data1);

	}

	public function Category($category){
		$mapp=8;
		$this->load->helper('url');
		$this->load->view('header');
		$this->showCategory();
		$this->load->model("Ads");
		$car=$this->Ads->allcars();
		$data['carss']=$car;
		$this->load->view("body",$data);
		$data1['pages']=$this->Ads->set_pagecount($mapp);
		$this->load->view('AdsPages_view',$data1);
	}
	
	function showCategory(){
		$this->load->model('category_model');
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		$this->load->view('load_category_view',$data);
		
	}
	
	function setNoOfViews($adsid){
		$this->load->model('FullAds_model');
		$this->FullAds_model->setViews($adsid);
		
	}

}

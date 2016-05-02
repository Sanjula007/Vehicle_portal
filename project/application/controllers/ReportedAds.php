<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author it14119804
 */

class ReportedAds extends CI_Controller {
	public $mapp=8;
	public function _construct(){
		
		parent::_construct();
			
	}
	
	public function index(){
		$this->ads_info( 1 ) ;
	}
	
	
	/*
		*show all unviewed Reported Advertisments
		**@param int $page to get the page id
	*/
	public function ads_info( $page ){
		$this->load->library('form_validation');	
		$this->load->helper('url');
		//load the header view
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		// get data from database
		$this->load->model("ReportAds_model");
		$car=$this->ReportAds_model->get_report_ads($page, $this->mapp);
		$count=$this->ReportAds_model->ads_count();
		$data1['pages']=$this->ReportAds_model->set_pagecount($count,$this->mapp);
		//send data to view and view it
		$data1['vehicle']=$car;
		$this->load->view('ReportAds_Views/ReportAds_view',$data1);
		$this->load->view('footer');
	}
	
	
	/*
		*use to view all category ina view 
	*/
	public function show_Category(){
		//load the category model
		$this->load->model('category_model');
		//get All Categories
		$category=$this->category_model->all_Category();
		$data['category']=$category;
		//send categories to view and load it
		$this->load->view('Load_category_view',$data);
		
		
	}
	
	
	/*
		*delete an advertisement by id given
		**@param int$ id -use to get advertisment id to ta function
	*/
	public function delete_Ads($id){
		
		//delete the data from database
		$this->load->model("EditAds_model");
		$check=$this->EditAds_model->delete_Ads($id);
		
		//delete the image of the ads from server
		if($check==true){
		$this->load->model('files_model');
		$this->files_model->delete_File($id.'pic');
		}
		redirect('/ReportAds/ads_info/1', 'refresh');
		
		
	}
	public function set_selected_Viewed(){
		
			$this->load->helper('url');
			$data=$this->input->post('checkAds');
			$this->load->model("ReportAds_model");
			$this->ReportAds_model->Viewed_report_ads($data);
			redirect('/ReportedAds/ads_info/1', 'refresh');
	
	}
	
	public function all_reports_ads( $adid ){
		$this->load->library('form_validation');	
		$this->load->helper('url');
		//load the header view
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		// get data from database
		$this->load->model("ReportAds_model");
		$car=$this->ReportAds_model->report_ads_info($adid);
		$data1['vehicle']=$car;
		$data1['reportads']=$this->ReportAds_model->ads_reports($adid);

		
		//send data to view and view it
		$this->load->view('ReportAds_Views/FullReportAds_view',$data1);
		$this->load->view('footer');
		
	}
	
	public function send_email($id){
		$this->load->library('form_validation');	
		$this->load->helper('url');
		$this->form_validation->set_rules('subject', 'emessage', 'required|min_length[5]|max_length[180]');
		$this->form_validation->set_rules('emessage', 'subject', 'required|min_length[5]|max_length[500]');
		
		if ($this->form_validation->run() == FALSE) {
		$this->all_reports_ads( $id );
		
		
		}
		else{
			$to_email=$this->input->post('toemail');
			$subject=$this->input->post('subject');
			$sendemail=$this->input->post('emessage');
			$this->load->model("Newsletter_model");
			$retrunmsg=$this->Newsletter_model->send_Email( $to_email, $subject, $sendemail );
			echo "<script>alert('".$retrunmsg."');</script>";
			redirect('/ReportedAds/ads_info/1', 'refresh');
		}
		
		
	}
	
	/*
		*show all unviewed Reported Advertisments by user
		**@param int $page to get the page id
	*/
	public function user_report_ads( $page ,$userid ){
		$this->load->library('form_validation');	
		$this->load->helper('url');
		//load the header view
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		// get data from database
		$this->load->model("ReportAds_model");
		$car=$this->ReportAds_model->get_user_report_ads( $page, $this->mapp, $userid );
		$count=$this->ReportAds_model->ads_count();
		$data1['pages']=$this->ReportAds_model->set_pagecount($count,$this->mapp);
		//send data to view and view it
		$data1['vehicle']=$car;
		$this->load->view('ReportAds_Views/ReportAds_view',$data1);
		$this->load->view('footer');
	}
	
	public function set_selected_Viewed_user(){
		
			$this->load->helper('url');
			$data=$this->input->post('checkAds');
			$this->load->model("ReportAds_model");
			$this->ReportAds_model->user_Viewed_report_ads($data);
			redirect('/user_report_ads/1/1', 'refresh');
	
	}
	
}
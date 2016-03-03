<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class feedback extends CI_Controller {
    
	//this function is to load and view all the feedbacks about site given by the users
	//admin is the person going t view all the feedbacks 
    public function index() 
    {
    	$this->load->helper('url');
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('header');
		
		$this->load->model("feedback_model","FBs"); //loading feedbacks from database
		$feedbacks=$this->FBs->allFeedbacks();
		
		$data['cusFeedbacks']=$feedbacks; //passing loaded feedback details to cusfeedback array
		$this->load->view("feedback_view",$data); //showing all the feedbacks
		$this->load->view('footer');
    }// end of index function
	

}
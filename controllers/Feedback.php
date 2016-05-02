<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Feedback extends CI_Controller 
{
    
	//this function is to load and view all the feedbacks about site given by the users
	//admin is the person going t view all the feedbacks 
    public function index() 
    {
    	$this->load->helper('url');
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		
		//loading feedbacks from database
		$this->load->model("Feedback_model","FBs"); 
		$feedbacks=$this->FBs->all_feedbacks();
		
		//passing loaded feedback details to cusfeedback array
		$data['cusFeedbacks']=$feedbacks; 
		//showing all the feedbacks
		$this->load->view("feedback_view",$data); 
		$this->load->view('footer');
    }// end of index function
	
	
	//this fucion deletes the added feedback according to to feedback id.
	//feedback id was given as parameter to this funcion
	public function delete_feedback($fbID)
	{
		$this->load->model('Edit_info_model');
		//calling deletefeedbackss function and passes fbID as parameter in the edit info model
		$this->Edit_info_model->delete_feedbacks($fbID); 
		
		//show succes message after delete
		echo "<script>alert('Feedback has been Successfully Deleted....!!!! ');</script>"; 
		//redirecting to all the feedbacks posted by users
		//$this->load->controller('Feedback');
		$this->index();
		//redirect('Feedback');
		
	}
	

}
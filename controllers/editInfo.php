<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class editInfo extends CI_Controller {
	
	
	//this is the controller to delete bookmark and feedbacks
	function __construct() {
		parent::__construct();
		$this->load->model('insert_model');
	}
	
	//this fucion deletes the added bookmark according to to bookmark id.
	//bookmark id was given as parameter to this funcion
	public function deleteBookmark($bmID) 
	{
		$this->load->model('editInfo_model');
		$this->editInfo_model->deleteBookmarks($bmID); //calling deletebokmarks function and passes bmID as parameter
		
		echo "<script>alert('Bookmark has been Successfully Deleted....!!!! ');</script>"; //show succes message after delete
		//redirecting to all the bookmarks added by user
		$this->load->controller('viewBookmark');
		$this->viewBookmark->index();
		
	}
	
	//this fucion deletes the added feedback according to to feedback id.
	//feedback id was given as parameter to this funcion
	public function deleteFeedback($fbID)
	{
		$this->load->model('editInfo_model');
		$this->editInfo_model->deleteFeedbacks($fbID); //calling deletefeedbackss function and passes fbID as parameter in the edit info model
		
		echo "<script>alert('Feedback has been Successfully Deleted....!!!! ');</script>"; //show succes message after delete
		//redirecting to all the feedbacks posted by users
		$this->load->controller('feedback');
		$this->feedback->index();
		
	}
	
}	
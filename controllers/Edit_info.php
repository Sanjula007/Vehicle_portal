<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Edit_info extends CI_Controller 
{
	
	
	//this is the controller to delete bookmark and feedbacks
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Insert_model');
		//$this->load->controller('Feedback');
	}
	
	//this fucion deletes the added bookmark according to to bookmark id.
	//bookmark id was given as parameter to this funcion
	public function delete_bookmark($bmID) 
	{
		$this->load->model('Edit_info_model');
		//calling deletebokmarks function and passes bmID as parameter
		$this->Edit_info_model->delete_bookmarks($bmID); 
		
		//show succes message after delete
		echo "<script>alert('Bookmark has been Successfully Deleted....!!!! ');</script>"; 
		//redirecting to all the bookmarks added by user
		//$this->load->controller('View_bookmark');
		//$this->View_bookmark->index();
		redirect('View_bookmark');
		
	}
	
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
		//$this->Feedback->index();
		redirect('Feedback');
		
	}


	//this fucion deletes the added article according to to article id.
	//article id was given as parameter to this funcion
	public function delete_article($articleID)
	{
		$this->load->model('Edit_info_model');
		//calling deletearticle function and passes artID as parameter in the edit info model
		$this->Edit_info_model->delete_articles($articleID); 
		
		//show succes message after delete
		echo "<script>alert('Article has been Successfully Deleted....!!!! ');</script>"; 
		//redirecting to all the articles
		//$this->load->driver('session');
		//$this->load->controller('Admin_articles', 'Admin_articles_controller');
		//$this->Admin_articles_controller->index();
		redirect('Admin_articles');
		
	}
	
}	
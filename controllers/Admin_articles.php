<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin_articles extends CI_Controller {
     
    public function index() 
    {
    	$this->load->database();
    	$this->load->helper('url');
		$this->load->helper('text');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		
		//loading articles from database
		$this->load->model("Article_model","ARs"); 
		$articles=$this->ARs->all_articles();
		
		//passing loaded articles details to site_article array
		$data['site_articles']=$articles; 
		//showing all the feedbacks
		$this->load->view("Admin_articles_view",$data);
		$this->load->view('footer');
    }
	
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
		$this->index();
		//redirect('Admin_articles');
		
	}
}
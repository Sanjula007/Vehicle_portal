<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class sendEmail extends CI_Controller {
	
	function index(){
		
		$this->sendEmailUser();
		
	}
	
	public function sendEmailUser(){
		$this->load->model('category_model');
		$this->load->helper('form');
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		//$this->load->view("AdvancedSearch_view",$data);
		$this->load->helper('url');;	
		$this->load->view('header');
		$this->load->view('SendEmailToUser_View',$data);
		$this->load->view('footer');
	}
	
	public function send(){
		
		$this->load->helper('url');;	
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('content', 'content', 'required');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules("users", "users", "required");
		
		if(strcmp($this->input->post('users'),'user' )==0)
		{
			$this->form_validation->set_rules('useremail', 'useremail', 'required|valid_email');
		}
		if ($this->form_validation->run() == FALSE) {
		$this->sendEmailUser();
		}
		else{

			if(strcmp($this->input->post('users'),'user' )==0)
			{	
				$to_email=$this->input->post('useremail');
				$subject=$this->input->post('subject');
				$message=$this->input->post('content');
				$this->load->model('newsletter_model');
				echo $this->newsletter_model->sendEmail($to_email,$subject,$message);
			}
			else
			{	
				//$to_email=$this->input->post('useremail');
				$subject=$this->input->post('subject');
				$message=$this->input->post('content');
				$this->load->model('newsletter_model');
				echo $this->newsletter_model->sendEmailToAll($subject,$message);
			}
		
			
		}
	}
	
	
	
}


?>
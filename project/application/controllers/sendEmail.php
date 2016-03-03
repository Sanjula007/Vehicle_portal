<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class sendEmail extends CI_Controller {
	
	function index(){
		
		$this->sendEmailUser();
		
	}
	/*
		*view the interface of the email send
	*/
	public function sendEmailUser(){
		$this->load->model('category_model');
		$this->load->helper('form');
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		$data['message']='<div style=\"width=100%;\"><h3><center>Send Emails to Users<center></h3><div>';
		$this->load->helper('url');;	
		$this->load->view('header');
		$this->load->view('SendEmailToUser_View',$data);
		
	}
	/*
		*view the interface of the email send
		*validate the user inputs
		*if user inputs are vaild send the email(s)
	*/
	
	public function send(){
		$data['message']='<div style=\"width=100%;\"><h3><center>Send Emails to Users<center></h3><div>';
		$this->load->helper('email');
		$this->load->library('email');
		$this->load->helper('security');
		$this->load->helper('url');;	
		//vaild the user inputs
		$this->load->library('form_validation');
		$this->form_validation->set_rules('content', 'content', 'required');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules("users", "users", "required");
		
		if(strcmp($this->input->post('users'),'user' )==0)
		{
			$this->form_validation->set_rules('useremail', 'useremail', 'required|valid_email|xss_clean');
		}
		
		//if All inputs are vaild send the emails
		
		//if invaild info return to interface
		if ($this->form_validation->run() == FALSE) {
		$this->sendEmailUser();
		}
		//if vaild info send the emails
		else{
			//send to specific user
			if(strcmp($this->input->post('users'),'user' )==0)
			{	
				$to_email=$this->input->post('useremail');
				$subject=$this->input->post('subject');
				$message=$this->input->post('content');
				$this->load->model('newsletter_model');
				try{
				$message=$this->newsletter_model->sendEmail($to_email,$subject,$message);
				}catch(Exception $ex){
					
				}
				
				$this->load->helper('url');;	
				$this->load->view('header');
				$data['message']='<div style=\"width=100%; \"><h3 style=\' color:red;\'><center>'.$message.'<center></h3><div>';
				$this->load->view('SendEmailToUser_View',$data);
		
			}
			//send to All users
			else
			{	
				//$to_email=$this->input->post('useremail');
				$subject=$this->input->post('subject');
				$message=$this->input->post('content');
				$this->load->model('newsletter_model');
				$message= $this->newsletter_model->sendEmailToAll($subject,$message);
				
				
				$this->load->helper('url');;	
				$this->load->view('header');
				$data['message']='<div style=\"width=100%;\"><h3><center>'.$message.'<center></h3><div>';
				$this->load->view('SendEmailToUser_View',$data);
		
			}
		
			
		}
	}
	
	
	
}


?>
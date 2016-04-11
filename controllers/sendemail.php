<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sendemail extends CI_Controller
{
    public function __construct()
    	{
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        //$this->load->model('user_model');
    	}
    
   		public function index()
		{
			 $this->form_validation->set_rules('to', 'to', 'trim|required|valid_email');
			  $this->form_validation->set_rules('from', 'from', 'trim|required|valid_email');
			 
			 if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('send_email');
        }
        else
        {
			
        $this->sendemail();
    	}		
	
		}
		public function sendemail()
	
			{
				
				$this->load->library('email');
  				$config = Array(
  				'protocol' => 'smtp',
  				'smtp_host' => 'ssl://smtp.googlemail.com',
  				'smtp_port' => 465,
  				'smtp_user' => 'yashanthy93@gmail.com', // change it to yours
  				'smtp_pass' => 'coolbuddy123', // change it to yours
  				'mailtype' => 'html',
  				'charset' => 'iso-8859-1',
  				'wordwrap' => TRUE
				);
 				
					$from = $this->input->post('from');
					$to = $this->input->post('to');
					$msg = $this->input->post('msg');
					$subj = $this->input->post('subj');
				
  				$this->email->initialize($config);
  				$this->email->set_newline("\r\n");
  				$this->email->from($from); // change it to yours
  				$this->email->to($to); // change it to yours
  				$this->email->subject($subj);
  				$this->email->message($msg);
 
  				if($this->email->send())
 				{
  				$this->load->view('sendemail_success');
 				}
 				else
				{
 				show_error($this->email->print_debugger());
				}		
				
			}
	}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class send_controller extends CI_Controller
{
    public function __construct()
    	{
        parent::__construct();//Call the Controller constructor
        $this->load->helper(array('form','url'));
        $this->load->database();//loading database
        //$this->load->model('user_model');
    	}
    
   		public function index()
		{
			 $this->form_validation->set_rules('to', 'to', 'trim|required|valid_email');
			  $this->form_validation->set_rules('from', 'from', 'trim|required|valid_email');
			  $this->form_validation->set_rules('message', 'message', 'trim|required');
			  $this->form_validation->set_rules('subject', 'subject', 'trim|required');
			 
			 if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('send_email_bus');
        }
        else
        {
		//try{	
        $this->sendemail();}
		//catch(Exception $e){
			//echo $e->getMessage();
		//}
    	//}		
	
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
					$msg = $this->input->post('message');
					$subj = $this->input->post('subject');
										
				//try{
  				$this->email->initialize($config);
				
				
  				$this->email->set_newline("\r\n");
  				$this->email->from($from); // change it to yours
  				$this->email->to($to); // change it to yours
  				$this->email->subject($subj);
  				$this->email->message($msg);
								 //throw new Exception("Need Internet connection! check your network!!");
				
 
				 //throw new Exception("Need Internet connection! check your network!!");
				
						
 			
  				if(!$this->email->send())
 				{
			// throw new Exception("Need Internet connection! check your network!!");
				//echo"mail cannot be sent";
				
				}
				else{
					 $this->load->view('sendemail_success');
					
				}
				
				 //}
				// catch(Exception $e) {
    //re-throw exception
    			//  echo $e->getMessage();
				  
    			
 // }

							
				
	}		
	}
?>
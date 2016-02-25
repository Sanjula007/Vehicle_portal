<?php
class newsletter_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    
    //send  email to user's email
    function sendEmail($to_email,$subject,$message)
    {	
		$this->load->helper('email');
		$this->load->library('email');
        $from_email = 'sanjula.madumal@gmail.com';
        

        $config['protocol']    = 'smtp';
		//$config['smtp_crypto']  = " ssl";
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = ' 467';
        $config['smtp_timeout'] = '7';
        $config['smtp_pass'] = 'password'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
		
		//'charset' => 'iso-8859-1';	
        $this->email->initialize($config);
       
        //send mail
        $this->email->from($from_email, 'AtoZ Wheels');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
		try{
        if ( ! $this->email->send())
		{
			//echo 'not done';
			$this->email->print_debugger();
		}
		
		}catch(Exception $e){
			
		}
    }
    
    /*
		*get the All registered userEmails
	*/
	
	function getAllUserEmails(){
		$this->load->database();
		$this->db->select('email');
		$this->db->from('users');
		$query=$this->db->get();
		
		return $query->result();
		
	}
	
	/*
		*send Emails to All Users
	*/
	 function sendEmailToAll($subject,$message){
		$emails=$this->getAllUserEmails();
		for($a=0;count($emails)>$a;$a++){
			$this->sendEmail($emails[$a],$subject,$message);
			
		}
		 
	 }
	
}
?>

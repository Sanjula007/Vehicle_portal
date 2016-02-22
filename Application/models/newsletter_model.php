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
        
		
		//ini_set('max_execution_time', 0); 
		//ini_set('memory_limit','2048M');
        //configure email settings
        $config['protocol']    = 'smtp';
		//$config['smtp_crypto']  = " ssl";
        $config['smtp_host']    = 'ssl://smtp.gmail.com';

        $config['smtp_port']    = ' 467';

        $config['smtp_timeout'] = '7';
        $config['smtp_pass'] = 'sanjula93107170'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';//'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
		
		//'charset' => 'iso-8859-1';
		
		
				
        $this->email->initialize($config);
       
        //send mail
        $this->email->from($from_email, 'AtoZ Wheels');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
		
        if ( ! $this->email->send())
		{
			echo 'not done';
			echo $this->email->print_debugger();
		}
    }
    
    //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('users', $data);
    }
	
	function getAllUserEmails(){
		$this->load->database();
		$this->db->select('email');
		$this->db->from('users');
		$query=$this->db->get();
		
		return $query->result();
		
	}
	 function sendEmailToAll($subject,$message){
		$emails=$this->getAllUserEmails();
		for($a=0;count($emails)>$a;$a++){
			$this->sendEmail($emails[$a],$subject,$message);
			
		}
		 
	 }
	
}
?>

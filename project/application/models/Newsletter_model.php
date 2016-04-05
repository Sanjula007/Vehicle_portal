<?php
/**
 * @author it14119804
 */


class newsletter_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    
    /*send  email to user's email
	**parameters
	*@param string $to_email- email address
	*@param string $subject -subject of the email
	*@param string $message -contaiing message of the emails
	*
	*@return the status of sending message
	*/
	
	
    function send_Email( $receiver_email, $subject, $message )
    {	
	



		// Storing submitted values
		$sender_email = 'info@atozwheelslk.esy.es';
		$user_password = 'sep112016';
		
		$username = 'atozWheels';
		

		// Configure email library
		$config['protocol'] = 'http';
		$config['smtp_host'] = 'mx1.hostinger.in';
		$config['smtp_timeout'] = '7';
		$config['smtp_port'] = 110;
		$config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        //$config['validation'] = TRUE; // bool whether to validate email or not 
		$config['smtp_user'] = $sender_email;
		$config['smtp_pass'] = $user_password;

		// Load email library and passing configured values to email library
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		// Sender email address
		$this->email->from($sender_email, $username);
		// Receiver email address
		$this->email->to($receiver_email);
		// Subject of email
		$this->email->subject($subject);
		// Message in email
		$this->email->message($message);

		if ($this->email->send()) {
		return 'Email Successfully Send !';
		} else {
		return 'Email Servers are Currently Unavilable..';
		}
    }
    
    /*
		*get the All registered userEmails
		*@return a array that have All user emails
	*/
	
	function get_All_User_Emails(){
		$this->load->database();
		$this->db->select('email');
		$this->db->from('users');
		$query=$this->db->get();
		
		return $query->result();
		
	}
	
	/*
	*send Emails to All Users
	
	**parameters
	*@param string $subject -subject of the email
	*@param string $message -contaiing message of the emails
	*
	*/
	 function send_Email_To_All( $subject, $message ){
		$emails=$this->get_All_User_Emails();
		
		for($a=0;count($emails)>$a;$a++){
			
			$message=$this->send_Email($emails[$a]->email,$subject,$message);
	 }	
		
		 return $message;
	 }
	
}

















		/*
        $config['protocol']    = "smtp";
		////$config['smtp_crypto']  = " ssl";
        $config['smtp_host']    = "ssl://smtp.gmail.com";
        $config['smtp_port']    = "456";
        $config['smtp_timeout'] = "7";
        $config['smtp_pass'] = "infortecfinal"; //$from_email password
        $config['mailtype'] = "html";
        $config['charset'] = "utf-8";
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
		
		//'charset' => 'iso-8859-1';	
        $this->email->initialize($config);
       */
?>
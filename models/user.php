<?php
Class User extends CI_Model
{
	 public  function __construct()  
     {  
          parent::__construct(); // Call the Model constructor   
     }   
	 //QUery for login
 	 public function login($username, $password)
 	{     	//$this->load->library('encrypt');	//$pass=$this->encrypt->encode($password);
			$this -> db -> select('id, fname, lname, Phone, email, password');//select id,email,password from  table users
   			$this -> db -> from('users');
  			 $this -> db -> where('fname', $username); //where username == fname attribute of table users AND
  			 $this -> db -> where('password', $password);//where password == password attribute of table users 
  			   			 $this -> db -> limit(1);
  				 $query = $this -> db -> get();//run the query
  				 $row = $query->row();
  			 if($query -> num_rows() == 1)//if username and password exits then return result
  				 {
  				 	$session_data = array(
					
					'id' => $row->id,
					'fname' => $row->fname,
					'lname' => $row->lname,
					'Phone' => $row->Phone,
					'email' => $row->email,
					//'type' => 'user',										
					);
					
					$this->set_session($session_data);
					return 'logged_in';			
				 			 //return $query->result();
   					}
   			else
   				{ return false; }	//if it doesnot exits then return false
   	}

		
		 public function set_session($session_data)
		
			{
				$sess_data = array(
				
				'id' => $session_data['id'],
				'fname' => $session_data['fname'],
				'lname' =>$session_data['lname'],
				'Phone' => $session_data['Phone'],
				'email' => $session_data['email'],
				//'type' => $session_data['type'],
				'logged_in' => 1,
				'ip_address'=> $_SERVER['REMOTE_ADDR'],
					
				);
				
				$this->session->set_userdata($sess_data);	
				$this->user_session($sess_data);	
				
			}

 
	public function user_session($sess_data)
	{
		$this->db->insert('user_session',$sess_data);
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		
		
	}

}
?>
<?php
Class User extends CI_Model
{
	
	
	 function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }   
	 //QUery to insert login into website  
 	function login($username, $password)
 	{     	//$this->load->library('encrypt');	//$pass=$this->encrypt->encode($password);
			$this -> db -> select('id, email, password');
   			$this -> db -> from('users');
  			 $this -> db -> where('fname', $username);
  			 $this -> db -> where('password', $password);
  			 $this -> db -> limit(1);
  				 $query = $this -> db -> get();
  			 if($query -> num_rows() == 1)
  				 {
    			 return $query->result();
   					}
   			else
   				{ return false; }	
   	}
 
  //QUery to insert profile picture in db
	public function insert_file($filename,$username){
 		
		$data = array ( 'picture' => $filename,
							'username' =>$username);
	
			//$this->db->where('fname',$filename);
			$result =$this->db->insert('profilepictures',$data);
			return $result;
 		}
 
   //QUery to retrieve profile picture from db
		public function getalldata($username)
		{	//$query = $this->db->get('profilepictures');
			$query = $this->db->get_where('profilepictures',array('username'=> $username));
			return $query;
		}

	 //QUery to retrieve profile details from db
		public function update_retrive($username)
		{
			 $query = $this -> db -> get_where('users',array('password'=> $username));
			 return $query;
		}
	//QUery to update details from db
		public function update_details($firstname,$dd)
		{
			$this->db->where('fname' ,$firstname);
			$this->db->update('users', $dd);
		}
	//QUery to delete an account
		public function delete($uname){
				
			$this->db->where('fname' ,$uname);
			$this->db->delete('users');
		}
	}
?>
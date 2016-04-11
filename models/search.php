<?php
Class search extends CI_Model
{		 
	
	
		public function getuserdata($key)
		{	//$query = $this->db->get('profilepictures');
			$query = $this->db->get_where('companydetails',array('name'=> $key)); //select all from table profilepictures where username == $username
			return $query;
		}
		
			
		public function retrieveuserdata($compname)
		{	//$query = $this->db->get('profilepictures');
			$query = $this->db->get_where('companydetails',array('name'=> $compname)); //select all from table profilepictures where username == $username
			return $query;
		}
		
	}
?>

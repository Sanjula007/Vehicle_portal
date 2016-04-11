<?php
Class Admin_delete_model extends CI_Model
{
	
	//QUery to update details into db
	
		 
		 public function viewdelete_requests()
		{	//$query = $this->db->get('profilepictures');
			$query = $this->db->get('user_acc_del_request'); //select all from table profilepictures where username == $username
			return $query;
		}
		
			public function delete_request($userid)
		{
		
				$this->db->where('userid' ,$userid); // where userid equals to userid
			$this->db->delete('user_acc_del_request');//Delete from table users 
			
		}
		
	}
?>
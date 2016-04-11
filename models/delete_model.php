<?php
Class delete_model extends CI_Model
{ 
	//QUery to delete an account
		public function delete($fname){
				
				
			$this->db->where('fname' ,$fname); // where username(uname) equals to fname
			$this->db->delete('users');//Delete from table users 
		}
		
			public function delete_request($data)
		{
			return $this->db->insert('user_acc_del_request', $data);
			
		}
	}
?>
<?php
Class  model_login extends CI_Model

{	
		public function email_exits($email)
		{
			$sql = "Select fname , email from users where email ='{$email}'";
			$result = $this->db->query($sql);
			$row = $result->row();
			return ($result->num_rows() === 1 && $row->email) ? $row->fname : FALSE;
		}
		public function username_exits($password)
		{
			$sql = "Select password, email from users where password ='{$password}'";
			$result = $this->db->query($sql);
			$row = $result->row();
			return ($result->num_rows() === 1 && $row->email) ? $row->password : FALSE;
		}
			
		public function update_password()
		{
			$email= $this->input->post('email');
			$password = $this->input->post('password');
			$sql ="UPDATE  users  SET  password = '{$password}' where email = '{$email}' " ;
			$this->db->query($sql);
			
			if($this->db->affected_rows() === 1)
			{
				return true; }
			else {				 
				return false; 
			}
		}
}
?>		
	
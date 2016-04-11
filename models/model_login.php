<?php
Class  model_login extends CI_Model
{
		//checking whether email is unique
		public function email_exits($email)
		{
			$sql = "Select fname , email from users where email ='{$email}'";
			$result = $this->db->query($sql);
			$row = $result->row();
			return ($result->num_rows() === 1 && $row->email) ? $row->fname : FALSE;
		}
		//checking whether username or firstname is unique
		public function username_exits($password)
		{
			$sql = "Select password, email from users where password ='{$password}'";
			$result = $this->db->query($sql);
			$row = $result->row();
			return ($result->num_rows() === 1 && $row->email) ? $row->password : FALSE;
		}
		//updating changed password into database	
		public function update_password($password,$email)
		{
			//$email= $this->input->post('email');
			//$email= 'yashanthy93@gmail.com';
			//$password = $this->input->post('password');
			$sql ="UPDATE  users  SET  password = '{$password}' where email = '{$email}' " ; 
			$this->db->query($sql);//execute the query
			
			if($this->db->affected_rows() === 1)
			{
				return true; }
			else {				 
				return false; 
			}
		}
}
?>		
	
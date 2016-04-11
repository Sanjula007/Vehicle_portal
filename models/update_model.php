<?php
Class update_model extends CI_Model
{
	//$username predicts user's password	 
	//QUery to retrieve profile details from db
		public function update_retrive($password)
		{		
			 $query = $this -> db -> get_where('users',array('password'=> $password));//select all from table users where password equals to username
			 return $query;
		}
		public function update_rive($username)
		{		
			 $query = $this -> db -> get_where('users',array('fname'=> $username));//select all from table users where password equals to username
			 return $query;
		}
	//QUery to update details into db
		public function update_details($firstname,$dd)
		{
			$this->db->where('fname' ,$firstname);//where firstname equals to fname attribute of users table
			$this->db->update('users', $dd);//update table users
		}
	}
?>
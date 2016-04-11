<?php
Class editcomp extends CI_Model
{
	
	//QUery to update details into db
		public function update_details($compname ,$dd)
		{
			$this->db->where('name' ,$compname);//where firstname equals to fname attribute of users table
			$this->db->update('companydetails', $dd);//update table users
			}
		
		function insertcomments($data)
   		 {
        return $this->db->insert('comments', $data);	    //insert into user table
		
   		 }
		 
		 public function viewcomments($compname)
		{	//$query = $this->db->get('profilepictures');
			$query = $this->db->get_where('comments',array('compname'=> $compname)); //select all from table profilepictures where username == $username
			return $query;
		}
		
		
	}
?>
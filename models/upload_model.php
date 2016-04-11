<?php
Class upload_model extends CI_Model
{		 
	//QUery to insert profile picture in db
	public function insert_file($filename,$username){
 		
		$data = array ( 'picture' => $filename,
							'username' =>$username);
	
			//$this->db->where('fname',$filename);
			$result =$this->db->insert('profilepictures',$data);//insert record into profilepicture table
			return $result;
 		}
 
   //QUery to retrieve profile picture from db
		public function getalldata($username)
		{	//$query = $this->db->get('profilepictures');
			$query = $this->db->get_where('profilepictures',array('username'=> $username)); //select all from table profilepictures where username == $username
			return $query;
		}
	}
?>
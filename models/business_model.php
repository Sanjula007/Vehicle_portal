<?php
Class business_model extends CI_Model
{		 
	//QUery to insert profile picture in db
	public function insert_file($filename,$compname,$description,$Tel,$email,$address,$requirments){
 		
		$data = array ( 'picture' => $filename,
							'name' =>$compname,
							'description'=>$description,
							'tel'=>$Tel,
							'email' => $email,
							'address'=>$address,
							'Requirements' => $requirments,
							);
	
			//$this->db->where('fname',$filename);
			$result =$this->db->insert('companydetails',$data);//insert record into profilepicture table
			return $result;
 		}
 
   //QUery to retrieve profile picture from db
		public function getalldata()
		{	//$query = $this->db->get('profilepictures');
			$query = $this->db->get_where('companydetails'); //select all from table profilepictures where username == $username
			return $query;
		}
		
		public function getuserdata($name)
		{	//$query = $this->db->get('profilepictures');
			$query = $this->db->get_where('companydetails',array('name'=> $name)); //select all from table profilepictures where username == $username
			return $query;
		}
		
		
	}
?>
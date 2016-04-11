<?php
Class buser_model extends CI_Model
{
	 public  function __construct()  
     {  
          parent::__construct(); // Call the Model constructor   
     }   
	 //QUery for login
 	 public function userlogin($password)
 	{     	//$this->load->library('encrypt');	//$pass=$this->encrypt->encode($password);
			$this -> db -> select('id, fname, lname, Phone, email, password');//select id,email,password from  table users
   			$this -> db -> from('users');
  			// $this -> db -> where('fname', $username); //where username == fname attribute of table users AND
  			 $this -> db -> where('password', $password);//where password == password attribute of table users 
  			   			 $this -> db -> limit(1);
  				 $query = $this -> db -> get();//run the query
  				 $row = $query->row();
  			 if($query -> num_rows() == 1)//if username and password exits then return result
  				 {
  				 	
					return true;			
				 			 //return $query->result();
   					}
   			else
   				{ return false; }	//if it doesnot exits then return false
   	}
	
	//$username predicts user's password	 
	//QUery to retrieve profile details from db
		public function update_retrive($companyname)
		{		
			 $query = $this -> db -> get_where('companydetails',array('name'=> $companyname));//select all from table users where password equals to username
			 return $query;
		}
	//QUery to update details into db
		

 }
?>
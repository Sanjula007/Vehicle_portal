<?php
    
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Search_model extends CI_Model 
{
 
 	//method to retrieve search results according to user input
 	//user entered brand name is passed as parameter
    public function get_search($strBrand) 
    {
    	try
    	{
    		$this->load->database();
			//removing the whitespaces and other characters at start and end of the string
			trim($strBrand); 
			$this->db->select("*");
			$this->db->from("advertisements");
			$this->db->where("adstatus",'confi');
			//cheching after setting the user entered srting in lower case as well as brand name in db
			$this->db->like("lower(brand)",strtolower($strBrand)); 
			$query = $this->db->get();
			return $query->result();
		}
		catch(Exception $ex)
		{
			return FALSE;
		}
	}// end of method
	
}//end of model
    
    
?>
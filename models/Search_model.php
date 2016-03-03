<?php
    
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Search_model extends CI_Model {
 
 	//method to retrieve search results according to user input
 	//user entered brand name is passed as parameter
    public function get_search($strBrand) {
    	$this->load->database();
		trim($strBrand); //removing the whitespaces and other characters at start and end of the string
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->like("lower(brand)",strtolower($strBrand)); //cheching after setting the user entered srting in lower case as well as brand name in db
		$query = $this->db->get();
		return $query->result();
	}// end of method
	
}//end of model
    
    
?>
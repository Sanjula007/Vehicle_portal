<?php
    class Contactus_model extends CI_Model{
		
	function __construct() {
	parent::__construct();
	}
	//function to insert details of the feedbacks
	function form_insert($data){
		
		$this->db->insert('feedback', $data);
	
	}//end of method
	
	}// end of model
?>
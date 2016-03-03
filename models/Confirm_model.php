<?php
    class Confirm_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	//this is the function to change ad status to confirm in the database
	//ad id was passed as parameter
	public function confirm($id){
		$this->load->database();
		$data = array('adstatus' => 'confi' ); //changing the ad status to confirm
		$this->db->where('adID', $id); 
		$this->db->update("advertisements", $data); //update query 
	}// end of method
	
}//end of model
?>
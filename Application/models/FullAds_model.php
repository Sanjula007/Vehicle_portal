<?php			

class Fullads_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	
	
	public function adsinfo1($id){
		$this->load->database();
		$query = $this->db->query("select * from advertisements where adID ='".$id."'");
		
			return $query->result();
	}
	
	public function getViews($id){
		$this->load->database();
		$query = $this->db->query("select views from advertisements where adID ='".$id."'");
		
			return $query->result();
	}
	
	public function setviews($id){
		$data=$this->getViews($id);
		$views=$data[0]->views;
		$views++;
		$senddata=array('views'=>$views);
		$this->load->database();
		$this->db->where('adID', intval($id));
		$this->db->update('advertisements', $senddata);
		
	}
}
?>
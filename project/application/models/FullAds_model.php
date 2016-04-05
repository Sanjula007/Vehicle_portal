<?php			
/**
 * @author it14119804
 */
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Fullads_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	
	/*
		*get the advertisment infomation by the advertisement id
		*@parameters
		*@param int $adsid int -advertisment id
		*@returns-advertisement data array
	*/
	public function ads_info1( $id ){
		$this->load->database();
		$query = $this->db->query("select * from advertisements where adID ='".$id."'");
		
		return $query->result();
	}
	
	
	/*
		*get the advertisment views by the advertisement id
		*@parameters
		*@param int $adsid -advertisment id
	*/
	public function get_Views( $id ){
		$this->load->database();
		$query = $this->db->query("select views from advertisements where adID ='".$id."'");
		
			return $query->result();
	}
	
	
	/*
		*set the advertisment view by the advertisement id
		*views are incease by one
		*@parameters
		*@param int $adsid -advertisment id
	*/
	public function set_views( $id ){
		$data=$this->get_Views($id);
		$views=$data[0]->views;
		$views++;
		$senddata=array('views'=>$views);
		$this->load->database();
		$this->db->where('adID', intval($id));
		$this->db->update('advertisements', $senddata);
		
	}
	public function report_ad( $data ){
		
		$this->load->database();
		if($this->db->insert('repotedads',$data))
			return true;
		else
			return false;
	}
	
	
}

?>
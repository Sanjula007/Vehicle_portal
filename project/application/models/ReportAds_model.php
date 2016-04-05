<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author it14119804
 */
class ReportAds_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	
	public function report_ad( $data ){
		
		$this->load->database();
		if($this->db->insert('repotedads',$data))
			return true;
		else
			return false;
	}
	
	public function get_report_ads( $page, $mapp ){
		$this->load->database();
		$query = $this->db->query("SELECT r.reason, r.email as remail, r.message ,COUNT(r.adid) as no_reports ,a .* ".
								"FROM `repotedads` r left join advertisements a  on a.adID=r.adid  ".
								"Where adminview=0".
								" GROUP by r.adid ORDER by r.adminview ASC , r.date ASC limit ".(($page-1)*$mapp).",".$mapp." ");
		
		return $query->result();
		
	}
	
	public function Viewed_report_ads($data){
		$this->load->database();
		$this->db->where_in('adID',$data);
		$set=array(
			'adminview'=>'1'
			);
		$this->db->update('repotedads', $set); 

		}

	/*
		*get the Current active advertisements cont
		
		*@returns no of advertisment that in results
	*/
	public function ads_count(){
		$this->load->database();
		$query = $this->db->query("SELECT Count(*) as counts ".
								"FROM `repotedads` r left join advertisements a  on a.adID=r.adid  ".
								"Where adminview=0".
								" GROUP by r.adid");
		
		foreach ($query->result() as $row)
		{		
			return $row->counts;
		}		
					
	}
	

	

	
	/*
		*get the page count fron view advertisements
		*@param string $all-all no of ads
		*@param int $ads -advertisements per page
		*
		*@returns the no of page that result will dispalyed
	*/
	public function set_pagecount( $all, $ads ){
		
		
		return $all/$ads;
	}
	
	
	public function ads_reports( $adid ){
		$this->load->database();
		$query = $this->db->query("SELECT * ".
								"FROM  repotedads ".
								"Where adid=".$adid.
								" ");
		
		return $query->result();
		
	}
	
	public function report_ads_info( $adid ){
		$this->load->database();
		$query = $this->db->query("SELECT * ".
								"FROM  advertisements ".
								"Where adID=".$adid.
								" ");
		
		return $query->result();
		
	}




}
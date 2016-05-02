<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author it14119804
 */
class AllAds_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	
	/*
		*load all advertisements data
		*@returns the array of advertisments
	*/
	public function all_Ads(){
		$this->load->database();
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$query=$this->db->get();
			return $query->result();
	}
	
	
	/*
		*load all advertisements data that belongs to the current login user
		*@parameters
		*@param integer $page-page no
		*@param interger $ads -no of ads
		*@param string $sort- sorting type
		*@param  integer $id-user id
		
		*@returns array of advertismnet data that belogns to the user
	*/
	public function my_Ads( $page, $ads,  $sort,$id ) {
		$this->load->database();
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("userid",$id);
		if($sort=='popularity'){
			$this->db->order_by('views','desc');

		}
		else if ($sort=='date'){
			
			$this->db->order_by('dateadded','desc');
		}
		$query=$this->db->get();
			return $query->result();
	}
	/*
		*load limited advertisements data
		
		*@parameters
		*@param int $page-page no
		*@param $ads- no of ads
		*@param string $sort- sorting type
		
		*@returns array of advertismnet data that limited to page
	*/
	public function limit_Ads( $page, $ads , $sort){
		$this->load->database();
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$start=($page-1)*$ads;
		$this->db->limit($ads,$start);
		if($sort=='popularity'){
			$this->db->order_by('views','desc');

		}
		else if ($sort=='date'){
			
			$this->db->order_by('dateadded','desc');
		}
		$query=$this->db->get();
			return $query->result();
	}
	/*
		*get the Current active advertisements cont
		
		*@returns no of advertisment that in results
	*/
	public function ads_count(){
		$this->load->database();
		$query = $this->db->query("select count(adid) as counts from advertisements where adstatus='confi'");
		
		foreach ($query->result() as $row)
		{		
			return $row->counts;
		}		
					
	}
	
	/*
		*load limited advertisements data according to category
		*@param int $page-page no
		*@param int  $ads -$no of ads
		*@param string $sort- sorting type
		*@param String $category-category name
		*
		**@returns array of advertismnet data that belongs to catgory
	*/
	public function limit_Ads_category( $page, $ads, $category, $sort){
		$this->load->database();
		
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",$category);
		$start=($page-1)*$ads;
		$this->db->limit($ads,$start);
		if($sort=='popularity'){
			$this->db->order_by('views','desc');

		}
		else if ($sort=='date'){
			
			$this->db->order_by('dateadded','desc');
		}
		$query=$this->db->get();
			return $query->result();
	}
	
	
	/*
		*get the Current active advertisements count according to category
		*@parameters
		*@param string $category-category name
		*
		*@returns array of advertismnet count that resulted in category
	*/
	public function ads_count_category( $category ){
		$this->load->database();
		$query = $this->db->query("select count(adid) as counts from advertisements where adstatus='confi' and category ='".$category."'");
		
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
	
	/*
		*get the query that search by user
		*$data-data array that user search
		**@returns array of advertismnet data that belongs to search
	*/
	public function get_Search_Query( $data ){
		
		$this->load->database();
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		
		
		if(strcmp($data['category'],'All')){
			$this->db->where("category",$data['category']);
		}
		if(strcmp($data['condition'],'All')){
			$this->db->where("vCondition",$data['condition']);
		}
		if(strcmp($data['brand'],'All')){
			$this->db->like("lower(brand)",strtolower($data['brand']));
		}
		
		if(trim($data['model'])){
			$this->db->like("lower(modelName)",strtolower($data['model']));
		}
		if($data['max_price']!=0&&$data['min_price']!=0){
			$this->db->where('price >=', $data['min_price']);
			$this->db->where('price <=', $data['max_price']);
		}
		if($data['max_year']>=$data['min_year']){
			$this->db->where('year >=', $data['min_year']);
			$this->db->where('year <=', $data['max_year']);
		}
		else{
			$this->db->where('year <=', $data['min_year']);
			$this->db->where('year >=', $data['max_year']);
			
		}
		
		$query=$this->db->get();
		
		
			return $this->db->last_query();
		
	}
	
	/*
		*get searched advertisements count
		*@param int array $data-data array that user search
		**@returns no of results that search query had
	*/
	public function get_Search_Count( $data ){
		
		$this->load->database();
		
		$this->db->select("count(adid) as counts");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		
		
		if(strcmp($data['category'],'All')){
			$this->db->where("category",$data['category']);
		}
		if(strcmp($data['condition'],'All')){
			$this->db->where("vCondition",$data['condition']);
		}
		if(strcmp($data['brand'],'All')){
			$this->db->like("lower(brand)",strtolower($data['brand']));
		}
		
		if(trim($data['model'])){
			$this->db->like("lower(modelName)",strtolower($data['model']));
		}
		if($data['max_price']!=0&&$data['min_price']!=0){
			$this->db->where('price >=', $data['min_price']);
			$this->db->where('price <=', $data['max_price']);
		}
		if($data['max_year']>=$data['min_year']){
			$this->db->where('year >=', $data['min_year']);
			$this->db->where('year <=', $data['max_year']);
		}
		else{
			$this->db->where('year <=', $data['min_year']);
			$this->db->where('year >=', $data['max_year']);
			
		}
		
		$query=$this->db->get();
		
		
			foreach ($query->result() as $row)
		{		
			return $row->counts;
		}
		
	}
	/*
		*get the advertisements data that se by user and limit to page
		*@param string array $data-data array that user search
		*@param int $page-page no
		*@param int $ads-no ads per page
		
		*@returns array of advertismnet data that belongs search
	*/
	function advanced_Search( $data, $page, $ads  ){
		$querystr=$this->get_Search_Query($data)." limit ".(($page-1)*$ads).",".$ads." ";
		$query=$this->db->query($querystr);
		return $query->result();
	}
	
	/*
		*get the advertisements data that se by user and limit to page
		*@param string $query-query that user searching
		*@param int $page-page no
		*@param int $ads-no ads per page
		
		*@returns array of advertismnet data that belongs to query
	*/
	function advanced_Search_Page($squery, $page, $ads ){
		$querystr=$squery." limit ".(($page-1)*$ads).",".$ads." ";
		$query=$this->db->query($querystr);
		return $query->result();
	}

}
<?php
/**
 * @author it14119804
 */
class poll_model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	
	public function set_topic($choices,$des,$topic){
		$data=array(
			'name'=>$topic,
			'description'=>$des,
			'choices'=>$choices
			);
			
			
		
		$this->load->database();
		$this->db->insert('poll',$data);
		
		$insert_id = $this->db->insert_id();

		return  $insert_id;
				
	}
	
	public function get_all_topics(){
		
		$this->load->database();
		$query = $this->db->query("select id,name,description from poll");
		
			return $query->result();
	}
	
	
	public function get_topic($tid){
		
		$this->load->database();
		$query = $this->db->query("select id,name,description from poll where id=".$tid);
		
			return $query->result();
	}
	
	public function get_poll($tid){
		$this->load->database();
		$query = $this->db->query("select id,name from poll_choice where tid=".$tid);
		
			return $query->result();
		
		
	}
	
	public function set_choices($tid,$choices,$data){
		for($a=1;$a<=$choices;$a++){
			$insertdata['tid']=$tid;
			$insertdata['name']=$data["choice-".$a];
			$this->load->database();
			$this->db->insert('poll_choice',$insertdata);
			
			$insert_id = $this->db->insert_id();

		}
		
		
	}
	
	public function check_vote($ip,$tid){
		$this->load->database();
		$query = $this->db->query("select ip from poll_result where ip='".$ip."' and tid=".$tid);
		
			$data= $query->result();
			if(count($data)==0){
					return false;
			}
			else{
					return true;
				
			}
		
	}
	
	public function add_vote($tid,$cid,$ip){
		$data = array(
				'tid'=>$tid,
				'cid'=>$cid,
				'ip'=>$ip
			);
		
		$this->load->database();
		$this->db->insert('poll_result',$data);
		
		
	}
	
	public function get_poll_resutls($tid){
		$this->load->database();
		$query = $this->db->query("select name ,count(ip) as count from poll_choice c LEFT join poll_result r on c.id=r.cid where c.tid=".$tid." group by name");
		
		return $query->result();
	}
	
	public function get_poll_resutls_count($tid){
		$this->load->database();
		$query = $this->db->query("SELECT count(res.ip) as count FROM `poll_result` res where res.tid=".$tid." ");
		
		return $query->result();
	}
	
	
	public function delete_poll($tid){
		try{
			$this->load->database();
			$this->db->where('id', $tid);
			$this->db->delete('poll'); 
			
			return true;
		}catch(Exception $e){
			
			return false;
		};
	}
}
?>
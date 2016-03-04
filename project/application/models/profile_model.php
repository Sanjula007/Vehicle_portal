<?php
    class Profile_Model extends CI_Model{
// Function To Fetch All Students Record
function identify($data){
$this->db->select('*');
$this->db->from('admin_reg');
$this->db->where('Username',$data);//$data);
$query = $this->db->get();
$result = $query->result();
return $result;
}

function show_user_details($data){
$this->db->select('*');
$this->db->from('admin_reg');
$this->db->where('Username', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}

	}
?>
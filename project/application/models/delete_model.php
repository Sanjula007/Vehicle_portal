<?php
class delete_model extends CI_Model{
// Function to select all from table name students.
public function show_students(){
$query = $this->db->get('admin_reg');
$query_result = $query->result();
return $query_result;
}
// Function to select particular record from table name students.
public function show_student_id($data){
$this->db->select('*');
$this->db->from('admin_reg');
$this->db->where('AdminID', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
// Function to Delete selected record from table name students.
public function delete_student_id($id){
$this->db->where('Admin_ID', $id);
$this->db->delete('admin_reg');
}
}
?> 
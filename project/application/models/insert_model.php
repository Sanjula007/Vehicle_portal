<?php
class insert_model extends CI_Model{
function __construct() {
parent::__construct();
}
function form_insert($data){
// Inserting in Table(students) of Database(college)
$this->db->insert('students', $data);
}


public function show_data_by_id($id) {
$condition = "emp_id =" . "'" . $id . "'";
$this->db->select('*');
$this->db->from('employee_info');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>
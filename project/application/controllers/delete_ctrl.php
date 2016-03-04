

<?php
class delete_ctrl extends CI_Controller{
function __construct(){
parent::__construct();
$this->load->model('delete_model');
}

function index(){
$id = $this->uri->segment(3);
$data['students'] = $this->delete_model->show_students();
$data['single_student'] = $this->delete_model->show_student_id(1);
$this->load->view('test_nav1');
$this->load->view('test_menu');
$this->load->view('delete_view', $data);
}


// Function to Fetch selected record from database.
public function show_student_id() {
$id = $this->uri->segment(3);
$data['students'] = $this->delete_model->show_students();
$data['single_student'] = $this->delete_model->show_student_id($id);
$this->load->view('test_nav1');
$this->load->view('test_menu');
$this->load->view('delete_view', $data);
}
// Function to Delete selected record from database.
public function delete_student_id() {
$id = $this->uri->segment(3);
$this->delete_model->delete_student_id($id);
$this->show_student_id();
}
}
?>


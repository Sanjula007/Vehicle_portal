<?php
Class Test_Control extends CI_Controller {

public function __construct() {
parent::__construct();
$this->load->model('login_database');
}
public function index() {
	echo "hiiiiiiii";
$this->load->view('test_view');
}

public function type() {
	 echo '<script>alert("You Have Successfully updated this Record!");</script>';
echo "gggg";
}
public function db() {
$result = $this->login_database->test();
echo "read";
}
}

?>
<?
class Send_Email extends Controller
{
function Send_Email()
 
{
	parent::Controller();
}
function index()
{
	$this->load->library('email');
  $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'yashanthy93@gmail.com', // change it to yours
  'smtp_pass' => 'coolbuddy123', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);
 
  $this->email->initialize($config);
  $this->email->set_newline("\r\n");
  $this->email->from('yashanthy93@gmail.com'); // change it to yours
  $this->email->to('yashanthy93@gmail.com'); // change it to yours
  $this->email->subject('Email using Gmail.');
  $this->email->message('Working fine ! !');
 
  if($this->email->send())
 {
  echo 'Email sent.';
 }
 else
{
 show_error($this->email->print_debugger());
}
}
}?>
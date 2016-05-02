
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Article_comment extends CI_Controller {
     
    public function index($artid) 
    {
    	$this->load->model('Insert_model');
    	$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		$data['article_id']=$artid;
		$this->load->view('Article_comment_form',$data);
		$this->load->view('footer');
    }
	
	
	function comment($artid)
	{
		$this->load->model('Insert_model');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('cus_name', 'Name', 'required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('cus_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('cus_phone_num', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('cus_fb', 'Feedbak', 'required|min_length[10]|max_length[1000]');
		
		if ($this->form_validation->run() == FALSE) 
		{
			//$this->index($artid);
			$data1['commnt']='none';
			$this->load->database();
			$this->load->helper('text');
			$this->load->helper('string');
			$this->load->database();
			$this->load->helper('url');
		
			$this->load->helper('url');
			$this->load->view('header');
			$this->load->view('right_coloumn');
			$this->load->view('Bookmark_btn');
			$this->load->model("Article_model");
			$article_single=$this->Article_model->single_full_article($artid);
			$article_comments=$this->Article_model->article_comments($artid);
			$data1['full_article']=$article_single;
			$data1['comments']=$article_comments;
			
			
			$this->load->view('Full_article_view',$data1);
			$this->load->view('footer');
			
			
			
			
		} 
		else
		{
			echo "<script>alert('Your Comment has been Successfully posted....!!!! ');</script>";
			
			//storing current date to cus_date variable
			$cus_date=date('Y-m-d'); 
			$data = array(
			'usrName' => $this->input->post('cus_name'),
			'usrEmail' => $this->input->post('cus_email'),
			'usrPhone' => $this->input->post('cus_phone_num'),
			'usrComment' => $this->input->post('cus_fb'),
			'usrDate' => $cus_date,
			'articleID' => $artid
			);
		
			$this->Insert_model->insert_comment($data);
			//$data1['message'] = '';
			//Loading View
			echo "<script>alert('Your Comment has been Successfully posted....!!!! ');</script>";
			$this->goto_full_article($artid);
			//$this->load->controller('Full_article');
			//$this->Full_article->article_detail($artid);
			//$this->load->view('header');
			//$this->load->view('right_coloumn');
			//$this->load->view('contactus_view',$data1);
			//$new = current_url();
			//$this->load->view('footer');
		
		} //end of else statement
	}// end if function feedback
	
	public function goto_full_article($artid)
	{
		echo "<script>alert('Your Comment has been Successfully posted....!!!! ');</script>";
		redirect('Full_article/article_detail/'.$artid);
	}
}
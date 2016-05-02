<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Add_new_article extends CI_Controller {
     
    public function index() 
    {
    	$this->load->model('Insert_model');
    	$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		$this->load->view('Add_new_article_view');
		$this->load->view('footer');
    }
	
	public function save_article()
	{
		$this->load->model('Insert_model');
		$time_s = time();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//configuration details to upload images
		//upload image saving folder
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = '2048';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		$config['remove_spaces'] = TRUE;
		//name will contain image along with unix time stamp retured by time function
		$new_name = 'article'.$time_s; 
		$config['file_name'] = $new_name;
		$filename = $_FILES['file_upload']['name'];
		
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		//method to upload the image and show errors of uploading images
		if (!$this->upload->do_upload('file_upload')) 
		{
    		$error = array('error' => $this->upload->display_errors());
    		echo $error['error'];
		}
		
		$data_upload_files = $this->upload->data();
		//image variable contains the uploaded image name as in uploads folder
		$image = $data_upload_files['file_name'];
		
		$this->form_validation->set_rules('head_line', 'Heading', 'required|min_length[3]');
		$this->form_validation->set_rules('detail', 'Description', 'required|min_length[5]'); 
		
		if ($this->form_validation->run() == FALSE) 
		{
			//if the validation rules violates index method of Add_new_ad class will be loaded with error messages
			$this->index(); 
		} 
		else
		{
			echo "<script>alert('Form Submitted Successfully....!!!! ');</script>";

			//storing all the user entered values in to data array
			$article_posted_date = date("Y-m-d H:i:s");		
			$data = array(
			'heading' => $this->input->post('head_line'),
			'detail' => $this->input->post('detail'),
			'art_image' => $image,
			'postDate' => $article_posted_date
			);
			
			
			$this->Insert_model->insert_article($data);
			$data['message'] = 'Data Inserted Successfully.';
			//Loading View
			$this->load->view('header');
			$this->load->view('right_coloumn');
			$this->load->view('Add_new_article_view',$data);
			$this->load->view('footer');
		}
	}
}
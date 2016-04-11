<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edit extends CI_Controller
{
    public function __construct()
    	{
        parent::__construct();//Call the Controller constructor
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->database();//loading database
        //$this->load->model('user_model');
    	}
    
   		public function index()
    	{
        $this->check_button();
    	}		
		//checking for a valid password
		public function check_username()
		{
					if (!isset($_POST['password']))
					{
   				 				return FALSE;
					}
					else
					{
						$password =trim($this->input->post('password'));//getting user password
						$this->load->model('model_login');// loading model_login
			    		$result = $this->model_login->username_exits($password);//checking whether password is valid
			
					if($result){
				   			$this->update_retrive($password); //if its a valid password retrieve user records from databaase
					}
					else 
					{
						$this->load->view('uview', array('error'=> 'Recheck your password!!'));//if its an invalid passwword prompt a message 
					}//$this->update_details($username);
			
					}
		}
		//
		public function check_button()
		{
			if($this->input->post('UPDATE')){
			
					if (!isset($_POST['firstname'] ) && !isset($_POST['lastname'] ) && !isset($_POST['email']) && !isset($_POST['mobile'] ))
					{
								 $this->load->view('select_view');
					}
					else
					{
							$firstname =trim($this->input->post('firstname'));
			    			$lastname =trim($this->input->post('lastname'));
			   			      			//$userid =trim($this->input->post('userId'));
						    $email=trim($this->input->post('email'));
						   	$phone=trim($this->input->post('mobile'));
										//$picture=trim($this->input->post('picture'));
		//$this->update_details($firstname,$lastname,$email,$phone);
		// $this->load->view('update_details'); //$this->update_retrive($username);
					if (strlen($phone) == 10) 
					{
							$this->update_details($firstname,$lastname,$email,$phone);
							$this->load->view('update_details');
			      	} 
    				else 
    				{    echo '<script type="text/javascript">alert("Invalid Mobile number")</script>';
    						$firstname =trim($this->input->post('firstname'));
								
    						//echo "<alert>Invalid Mobile number</alert>";
							$this->update_rive($firstname);
							//$this->load->view('select_view'); //return false;
					}	
				} }
		        else if($this->input->post('DELETE')){
					
					 if(!isset($_POST['firstname'])){
			 				return false;
					 }
			 		else 
			 		{
							$uname =trim($this->input->post('firstname'));
							$email =trim($this->input->post('email'));
			   				$this->delete_Account($uname,$email);
				 			 //$this->load->view('deleteview');
				 			   echo '<script type="text/javascript">alert("your Account has been requested to delete!!")</script>';
							   $this->load->view('login_view');
			 		}
				}
			 else if($this->input->post('UPLOAD'))
			{	//$this->input->post('picture');
				 $this->load->view('upload');
			}
	
			else if($this->input->post('Send_email')){
			 		 $this->load->view('send_email');
				}
			else{
				
				 $this->load->view('business');
				
			}
		}

			public function delete_Account($uname,$email)
		{
			//$this->load->model('user');
			 $data = array(
                'fname' => $this->input->post('firstname'),
                'comment' =>$this->input->post('purpose'),
				
           );
			$this->load->model('delete_model');//loading delete_model from models
			$this->delete_model->delete_request($data);
			//sending an email 
			
			//$this->delete_model->delete($uname)
				
				//echo "error in sending email";
			
			/*else {
				$this->load->library('email');
  				$config = Array(
  				'protocol' => 'smtp',
  				'smtp_host' => 'ssl://smtp.gmail.com',
  				'smtp_port' => 465,
  				'smtp_user' => 'yashanthy93@gmail.com', // sending from A2Z wheels gmail id
  				'smtp_pass' => 'coolbuddy123', // password for gmail id
  				'mailtype' => 'html',
  				'charset' => 'iso-8859-1',
  				'wordwrap' => TRUE
				);
 
  				$this->email->initialize($config);
  				$this->email->set_newline("\r\n");
  				$this->email->from('yashanthy93@gmail.com'); // A2Z wheels gmail id
  				$this->email->to($email); // variable which contains registered user's email i
  				$this->email->subject('deleted account');
  				$this->email->message('Your Account has been deleted successfully !!');
 				//exception if email is sent print a message 'sent email'
				if($this->email->send())
 				{
  				echo 'Email has been sent!!';
 				}
 				else
				{
 				show_error($this->email->print_debugger());
				}		
				*/
			
		}

		public function update_retrive($password)
		{	//$username = $this->input->post('username');//print_r($username);
			$this->load->model('update_model');
			//$d=$this->user->update_retrive($username);
			$data['posts'] = $this->update_model->update_retrive($password);
			$this->load->view('select_view',$data);
		}
	
		public function update_rive($firstname)
		{	//$username = $this->input->post('username');//print_r($username);
			$this->load->model('update_model');
			//$d=$this->user->update_retrive($username);
			$data['posts'] = $this->update_model->update_rive($firstname);
			$this->load->view('select_view',$data);
		}
	
	
	
		public function update_details($firstname,$lastname,$email,$phone)
		{
			//declare $dd array
	        $dd = array(
					//'id' => $userid,
				'fname' => $firstname,
						'lname' => $lastname,
							'email' => $email,
							'Phone' => $phone,
												);
				$this->load->model('update_model');//load update_model
				$this->update_model->update_details($firstname,$dd);
		}

		


		public function upload_file()
		{
				$username =trim($this->input->post('username'));
				if($this->input->post('UploadImage')){
							$status="";
							$msg="";
							$filename='picture';
				if(empty($_POST['username'])){
							$status="error";
							$msg="Please Enter Username";
				}
				if($status != "error")
				{
							$config['upload_path'] ='file/';
							$config['allowed_types'] ='gif|jpg|png';
							$config['max_size'] =1024 * 8;
							$config['encrypt_name'] = true;
			
							$this->load->library('upload', $config);
			
						if(!$this->upload->do_upload($filename)){
							$status="error";
							$msg = $this->upload->display_errors('','');
				}
				else
				{
					$this->load->model('upload_model');
					$data= $this->upload->data();
					$file_id=$this->upload_model->insert_file($data['file_name'],$_POST['username']);
					if(!$file_id)
					{
							echo '<script type="text/javascript">alert("Unsucessfully uploaded")</script>';
							 $this->load->view('upload');
																}
					else
					{
							echo '<script type="text/javascript">alert("Sucessfully uploaded")</script>';
							$this->load->view('upload');
					}
				}
			 }
			
			else {
					echo '<script type="text/javascript">alert("Dont keep empty fields! Browse your file properly!")</script>';
					$this->load->view('upload');
				} 
			}
			else{
					$this->file1($username);
				}
		}
		//To retrieve image from db
		/*public function files($username)
		{
			$this->load->model('upload_model');//load upload_model
				//$this->load->view('homeview2');	
			$data['posts'] = $this->upload_model->getalldata($username);//get all records from table
			$this->load->view('homeview2',$data);//view homepage
		}*/
		//To view saved image
		public function file1($username)
		{
			$this->load->model('upload_model');//load upload_model
				//$this->load->view('homeview2');	
			$data['posts'] = $this->upload_model->getalldata($username);//get all records from table
			$this->load->view('Imageview',$data);
		}

	}
?>
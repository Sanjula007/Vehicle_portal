    <?php  
       class update extends CI_Controller  
       {  
          
		  	public function index(){
		  		
				
							$this->load->model("user");
				
							$data['posts'] = $this->update_retrive($username);

						$this->load->view('select_view',$data);
						
				
		  	}
		  
		  
		  
		  
		  public function update_retrive()
			{
			$username = $this->input->post('username');
			$this->load->model("user");
			$d=$this->user->update_retrive($username);
			$data['posts'] = $d;
			$this->load->view('select_view',$data);
			}
	
		  
		  
		  
       }  
    ?>  
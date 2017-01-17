<?php
class Verify extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
                $this->load->helper('url_helper','form');
	    	
        }
		
			
        public function index()
        {
        	if(isset($this->session->userdata['email'])){
        		
        		$userId = $this->session->userdata('userId');
				$rol = $this->session->userdata('rol');				
							
				redirect("BolsaDeTrabajo");					
        	}
			
			if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){			   				    
				
					if($this->Login_model->activeUser($this->input->get('email'))){
						$data['message'] = 'UPDATE';		
					}else{				
						$data['message'] = 'ERROR';		
					}						    
			    
			}else{
				
				$data['message'] = 'ERROR';		
			}
			       		
        

	        $this->load->view('verify/index_view' , $data);		
	         
		}
    
}
?>
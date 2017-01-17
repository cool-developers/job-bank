<?php
class Login extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
                $this->load->helper('url_helper','form');
	    		$this->load->library('form_validation');
        }
		
		
        public function index()
        {
        	if(isset($this->session->userdata['email'])){
        		
        		$userId = $this->session->userdata('userId');
				$rol = $this->session->userdata('rol');				
							
				redirect("BolsaDeTrabajo");					
        	}       		
        
			$this->load->view('templates/header');
			$this->load->view('templates/menuLogin');
	        $this->load->view('login/OfferList_view' , $data);		
	        $this->load->view('templates/footer');    
		}

		public function index()
		{
			
			
	    	if ($this->form_validation->run() === FALSE){
	    		$data["error"]= "validacion incorrecta";		
        		
			}
			else {
			
		     $data["error"]="Datos cargados correctamente";
			}	
			
			
        		$this->load->view('login/login_view', $data);
        		    	
		}

		public function prueba(){
			$this->load->view('viewtemplates/OfferList_view');		
		}
		
		
		
		
		
}
?>
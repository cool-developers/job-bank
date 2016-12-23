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
			
			$this->form_validation->set_rules('user', 'Usuario','required|valid_email');
	    	$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]|max_length[45]');
			$this->form_validation->set_message	('valid_email', 'Email no valido.');			
        	$this->form_validation->set_message	('required', 'campo obligatorio.');
			$this->form_validation->set_message	('min_length[8]', '8 caracteres minimo.');
			$this->form_validation->set_message	('max_length[45]', 'El campo %s debe tener menos de 45 caracteres');
	    	if ($this->form_validation->run() === FALSE){
	    		$data["error"]= "validacion incorrecta";		
        		
			}
			else {
			
		     $data["error"]="Datos cargados correctamente";
			}	
			
			
        		$this->load->view('login/login_view', $data);
        		    	
		}

		public function prueba(){
			$this->load->view('login/index_view');		
		}
			
}
?>
<?php
class Login extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
                $this->load->helper('url_helper');
        }

		public function index()
		{
			$this->load->helper('form');
	    	$this->load->library('form_validation');
						
        	$data['title'] = 'Login de USUARIOS';		
			
			
			$this->form_validation->set_rules('user', 'Usuario', 'required');
	    	$this->form_validation->set_rules('password', 'Contraseña', 'required');
			
	    	if ($this->form_validation->run() === FALSE)
	    	{				
        		$this->load->view('templates/header', $data);
        		$this->load->view('login_view');
        		$this->load->view('templates/footer');
			}
			else {
				$resultado = $this->user_model->get_user();
				if(password_verify($this->input->post('password'),$resultado['password'])){
					echo('coinciden');
					
			$usuario_data = array(
		               'user' => $this->input->post('user'),
		               'logueado' => TRUE
		            );
		            $this->session->set_userdata($usuario_data);
					$this->session->set_userdata('user',$this->input->post('user'));
					
					
					
					redirect("dietas");
				}else{
					$data['error']='Usuario o password incorrecta';
					$this->load->view('templates/header', $data);
        			$this->load->view('login/login', $data);
        			$this->load->view('templates/footer');
				}					
	    	 
	    	 }
		     
		}		
}
?>
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
        	$data['title'] = 'Login de empresas';		
			$this->load->view('templates/header');
			$this->load->view('templates/menuLogin');
	        $this->load->view('login/index_view' , $data);		
	        $this->load->view('templates/footer');    
		}
		
		 public function signupUser(){		 
         if($this->input->post("email") && $this->input->post("password"))
         {         	
          
		 	$this->form_validation->set_rules('email', 'Usuario','required|valid_email');
	    	$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]|max_length[45]');
			$this->form_validation->set_message	('valid_email', 'El Email no es valido.');			
        	$this->form_validation->set_message	('required', 'El campo  %s es obligatorio.');
			$this->form_validation->set_message('min_length', 'El Campo %s debe tener un minimo de %d Caracteres');
			$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
			
            if($this->form_validation->run() == false){           
               echo json_encode(array("respuesta" => "error_form"));
            }else{
                $this->load->model("Login_model");
                $email = $this->input->post("email");
                $password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);    				         
                $loginUser = $this->Login_model->signupUser($email,$password);
                if($loginUser === true){
                    echo json_encode(array("respuesta" => "success"));
                }else{
                    echo json_encode(array("respuesta" => "exists"));
                }
            }
        }else{
            echo json_encode(array("respuesta" => "error_form"));
        }
  	   }

	   
    //logueamos usuarios con codeigniter y angularjs
    public function loginUser(){
        if($this->input->post("email") && $this->input->post("password"))
        {
           
		 	$this->form_validation->set_rules('email', 'Usuario','required|valid_email');
	    	$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]|max_length[45]');
			$this->form_validation->set_message	('valid_email', 'El Email no es valido.');			
        	$this->form_validation->set_message	('required', 'El campo  %s es obligatorio.');
			$this->form_validation->set_message('min_length', 'El Campo %s debe tener un minimo de %d Caracteres');
			$this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');

            if($this->form_validation->run() == false){
                echo json_encode(array("respuesta" => "incomplete_form"));
            }else{
                $this->load->model("login_model");
                $email = $this->input->post("email");
                $password = $this->input->post("password");          
				$resultado = $this->Login_model->get_email($this->input->post('email'));
				
				if(password_verify($this->input->post('password'), $resultado['password'])){				
					
					$user = array( 
						'email' => $resultado['email'],
						'rol' => $resultado['rol_idRol'],
						'logged_in' => TRUE,
						'idUser' =>  $resultado['idUser']
					); 
					$this->session->set_userdata($user);
					//redirect("http://127.0.0.1/job-bank/BolsaDeTrabajo");
					echo json_encode(array("respuesta" => "success"));						
				
                }else{
                    echo json_encode(array("respuesta" => "failed"));
                }
            }
        }else{
            echo json_encode(array("respuesta" => "incomplete_form"));
        }
    }


}
?>
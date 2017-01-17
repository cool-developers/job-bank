<?php
class Login extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
                $this->load->helper('url_helper','form');
	    		$this->load->library(array('form_validation','email'));
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
		
                $email = $this->input->post("email");
                $password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);	
				$rol = 4;				
				$hash = password_hash(rand(0,1000) + " " + rand(0,1000) , PASSWORD_DEFAULT);   
				$active = FALSE;
				$loginUser = $this->Login_model->signupUser($email,$password,$rol,$hash,$active);
			
				if($loginUser === TRUE){
								
					
					echo json_encode(array("respuesta" => "success"));
					
					$this->email->from('cooldevelopers.contact@gmail.com', 'Bolsa de trabajo Txurdinaga');
		            $this->email->to($email);
		            $this->email->subject('Validar usuario');               
		            $this->email->message("Gracias por registrarte!
		            Tu cuenta ha sido creada, puedes acceder a la Bolsa de Trabajo de Txurdinaga despues de activar tu cuenta presionando el enlace de abajo.
		            Presiona el siguiente enlace para activar tu cuenta:
		            http://127.0.0.1/job-bank/verify?email=$email&hash=$hash"); 
				 
				   
		            if($this->email->send()){
		           
		            $data['title']='Mensaje Enviado';
		            $data['msg'] = 'Mensaje enviado a su email';
		                     // echo $this->email->print_debugger(); exit;                             
		            $this->load->view('login/signUp_view', $data);  
		           
		             }else{
		                $data['title']='El mensaje no se pudo enviar' .  show_error($this->email->print_debugger());
		                $this->load->view('login/signUp_view', $data); 
		             
		             }	               
                   
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
					
					if($resultado['active'] == TRUE){						
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
						echo json_encode(array("respuesta" => "notActive"));	
					}
					
								
				
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
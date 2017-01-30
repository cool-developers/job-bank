<?php
class BolsaDeTrabajo extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
                $this->load->helper('url_helper','form');
	    		$this->load->library('form_validation');
        }		
		
			
		public function logout(){
			$array_items = array('email', 'rol' , 'logged_in', 'idUser' );
			$this->session->unset_userdata($array_items);
			redirect("Login");			
		}
		
	    public function index()
        {
        	if(!isset($this->session->userdata['email'])){        		
				redirect("Login");					
        	}         		
        	$data['rol'] = $this->session->userdata['rol'];
			$this->load->view('templates/header');	
			$this->load->view('templates/menuHome', $data);	
	        $this->load->view('home/index_view' , $data);		
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
				echo $resultado['rol_idRol'];
				if(password_verify($this->input->post('password'), $resultado['password'])){				
					
					/*$user = array( 
						'email' => $resultado['email'],
						'rol' => $resultado['rol_idRol'],
						'logueado' => TRUE
					); 
					 */
					 
					//$this->session->set_userdata($user);
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
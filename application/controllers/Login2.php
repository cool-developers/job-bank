<?php
class Login2 extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
                $this->load->helper('url_helper');
				$this->load->library('form_validation');
        }

        public function index()
        {        
        	
	
	    	$this->load->helper('form');
	  		$this->load->library('form_validation');
			
        	$data['title'] = 'Login de empresas';	
			
		
		 	$this->form_validation->set_rules('email', 'email', 'required');
		    $this->form_validation->set_rules('password', 'password', 'required');
			 
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
		        $this->load->view('login/index_view' , $data);		
		        $this->load->view('templates/footer');
			}else{
			//echo($this->input->post('email'));
			//echo($this->input->post('password'));
			$resultado = $this->Login_model->get_email($this->input->post('email'));	
			//echo password_hash("1234", PASSWORD_DEFAULT);   
			echo($resultado['email']);
			echo($resultado['password']);
			if(password_verify($this->input->post('password'), $resultado['password'])){
				echo('coinciden');
				//Guardamos user en variable sesion
				//pasamos al controlador Dietas
				//opcion 1
				/*
				session_start();
				$_SESSION['user']=$this->input->post('user');
				redirect("dietas");
				*/
				//echo('coinciden');
				$usuario_data = array( 
					'email' => $this->input->post('user'),
					'logueado' => TRUE
				); 
				$this->session->set_userdata($usuario_data);
				
				
				
				 
			}else{
				echo $resultado;
				$data['error'] ='email o $resultado password incorrecta';
				$this->load->view('templates/header', $data);
	       		$this->load->view('login/index_view' , $data);		
	       		$this->load->view('templates/footer');
			}
			//echo('Loading...');
			//echo('ir al modelo cargar los datos ver si estan correctos');		
		}
				
			       
		}
		
		 public function signupUser(){		 
         if($this->input->post("email") && $this->input->post("password"))
         {         	
            $this->form_validation->set_rules('email', 'email', 'required');
		    $this->form_validation->set_rules('password', 'password', 'required');
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
            $this->form_validation->set_rules('email', 'email', 'required');
		    $this->form_validation->set_rules('password', 'password', 'required');
            if($this->form_validation->run() == false){
                echo json_encode(array("respuesta" => "incomplete_form"));
            }else{
                $this->load->model("login_model");
                $email = $this->input->post("email");
                $password = $this->input->post("password");          
				$resultado = $this->Login_model->get_email($this->input->post('email'));
				
				if(password_verify($this->input->post('password'), $resultado['password'])){				
					
					$usuario_data = array( 
						'email' => $this->input->post('user'),
						'logueado' => TRUE
					); 
					$this->session->set_userdata($usuario_data);
					redirect(""); 
				
                }else{
                    echo json_encode(array("respuesta" => "failed"));
                }
            }
        }else{
            echo json_encode(array("respuesta" => "incomplete_form"));
        }
    }
 
    public function logoutUser(){
        $this->session->sess_destroy();
    }

}
?>
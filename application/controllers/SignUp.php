<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SignUp extends CI_Controller {

    function __construct() { 
        parent::__Construct();
        $this->load->library(array('form_validation','email'));
        $this->load->helper(array('url','html'));
       }

	function index(){
        
       $data['title'] = 'Formulario de Contacto'; 
       $data['msg'] = NULL;
       
	  
	   $this->load->view('templates/header', $data);
       
       $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
       $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]|max_length[45]');   
      
       $this->form_validation->set_message('required', 'el campo %s es obligatorio');
       $this->form_validation->set_message('valid_email', 'El email no es válido');
	   $this->form_validation->set_message('min_length', 'El Campo %s debe tener un minimo de %d Caracteres');
	   $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
          
       $this -> form_validation -> set_error_delimiters('<ul><li>', '</li></ul>');
      
       $this->form_validation->set_message('required', 'el campo %s es obligatorio');
       $this->form_validation->set_message('valid_email', 'El email no es válido');
	   $this->form_validation->set_message('min_length', 'El Campo %s debe tener un minimo de %d Caracteres');
	   $this->form_validation->set_message('max_length', 'El Campo %s debe tener un Maximo de %d Caracteres');
          
       $this -> form_validation -> set_error_delimiters('<ul><li>', '</li></ul>');
       
       
    if ($this->form_validation->run() == FALSE)
        {
        	
            $this->load->view('login/signUp_view', $data);  

           
    }else{                       
        
            $email = $this->input->post('email');
            $password = $this->input->post('password');
			
			echo $email . " " . $password;
                       
        // Datos para enviar el correo
            $this->email->from('cooldevelopers.contact@gmail.com', 'Bolsa de trabajo Txurdinaga');
            $this->email->to($email);
            $this->email->subject('Validar usuario');               
            $this->email->message("Prueba para validar este usuario"); 
           
		   
            if($this->email->send()){
           
            $data['title']='Mensaje Enviado';
            $data['msg'] = 'Mensaje enviado a su email';
                     // echo $this->email->print_debugger(); exit;                             
            $this->load->view('login/signUp_view', $data);  
           
             }else{
                $data['title']='El mensaje no se pudo enviar' .  show_error($this->email->print_debugger());
                $this->load->view('login/signUp_view', $data); 
             
             } 
                   
           }
	$this->load->view('templates/footer');	
   
        } 
    }
<?php
class Applicant extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Applicant_model');
                $this->load->helper('url_helper');			
				$this->load->library(array('form_validation'));
        }
		
		
		public function updateApplicant(){
	
		
			
		if(
		$this->input->post("applicantName") &&		
		$this->input->post("applicantLastName") && 
		$this->input->post("applicantBirthDate") && 
		$this->input->post("applicantPostcode") && 
		$this->input->post("town_idTown")  && 		
		$this->input->post("applicantWorkPermit") && 
		$this->input->post("applicantDriverLicense") && 
		$this->input->post("applicantVehicle") && 
		$this->input->post("applicantWorkStatus") && 
		$this->input->post("applicantStatus")
		 
		){   	
		      	
          
		 	$this->form_validation->set_rules('email', 'Usuario','required|valid_email');	  
			$this->form_validation->set_message	('valid_email', 'El Email no es valido.');			
        	$this->form_validation->set_message	('required', 'El campo  %s es obligatorio.');	
			
            if($this->form_validation->run() == false){           
               echo json_encode(array("respuesta" => "error_form2"));		  
			}else{
				$email = $this->input->post("email");
                $password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);	
				$rol = 2;				
				$hash = password_hash(rand(0,1000) + " " + rand(0,1000) , PASSWORD_DEFAULT);   
				$active = FALSE;
				$loginUser = $this->Login_model->signupUser($email,$password,$rol,$hash,$active);      
				$teacherName = $this->input->post("teacherName");
				$idDepartment =  $this->input->post("selectedDepartment"); 
				if($loginUser === TRUE){								
					
					echo json_encode(array("respuesta" => "success"));					
					                   
                }else{
                    echo json_encode(array("respuesta" => "exists"));
                }
			
            echo json_encode(array("respuesta" => "error_form"));
        	}
  	  	}else{
            echo json_encode(array("respuesta" => "error_form3"));
        }
	}
	
       
}
?>
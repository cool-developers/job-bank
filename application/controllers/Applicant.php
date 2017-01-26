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
		
			
			$this->form_validation->set_rules('applicantName', 'Nombre', 'required');
	    	$this->form_validation->set_rules('applicantLastName', 'Apellido', 'required');
			$this->form_validation->set_rules('applicantBirthDate', 'Nombre', 'required');
	    	$this->form_validation->set_rules('applicantPostcode', 'Apellido', 'required');
			$this->form_validation->set_rules('town_idTown', 'Nombre', 'required');
			
			if($this->input->post("applicantAddress")){
				$this->form_validation->set_rules('applicantAddress', 'Nombre', 'required');			
			}
			
			if($this->input->post("applicantPhone1")){
				$this->form_validation->set_rules('applicantPhone1', 'Nombre', 'required');				
			}
			
			if($this->input->post("applicantPhone2")){
				$this->form_validation->set_rules('applicantPhone2', 'Nombre', 'required');				
			}
			
	    	$this->form_validation->set_rules('applicantWorkPermit', 'Apellido', 'required');
			$this->form_validation->set_rules('applicantDriverLicense', 'Apellido', 'required');
			$this->form_validation->set_rules('applicantVehicle', 'Nombre', 'required');
	    	$this->form_validation->set_rules('applicantWorkStatus', 'Apellido', 'required');
			$this->form_validation->set_rules('applicantStatus', 'Apellido', 'required');
	    	$this->form_validation->set_message	('required', 'El campo  %s es obligatorio.');
	
	 		
	        if($this->form_validation->run() == false){           
	                echo json_encode(array("respuesta" => "error_form"));		  
			}else{				    
					$applicantData  = array(		        
			      	"user_idUser" => $this->session->userdata['idUser'],
					"applicantName" => $this->input->post("applicantName"),
					"applicantLastName"  => $this->input->post("applicantLastName"),
					"applicantBirthDate"  => $this->input->post("applicantBirthDate"),
					"applicantPostcode"  => $this->input->post("applicantPostcode"),
					"town_idTown"  => $this->input->post("town_idTown"),
					"applicantAddress" => $this->input->post("applicantAddress"),			 	
					"applicantWorkPermit"  => $this->input->post("applicantWorkPermit"),
					"applicantPhone1" => $this->input->post("applicantPhone1"),
				 	"applicantPhone2" => $this->input->post("applicantPhone2"),
					"applicantDriverLicense"  => $this->input->post("applicantDriverLicense"),
					"applicantVehicle"  => $this->input->post("applicantVehicle"),
					"applicantWorkStatus" => $this->input->post("applicantWorkStatus"),
					"applicantStatus"  => $this->input->post("applicantStatus"),
					"applicantLastConnection" => date("Y-m-d")				
			        );					
				
					$updateApplicant = $this->Applicant_model->updateApplicant($applicantData);
				
					   
			
					if($updateApplicant === TRUE){								
						
						echo json_encode(array("respuesta" => "success"));					
						                   
	                }else{
	                    echo json_encode(array("respuesta" => "exists"));
	                }
				
	            
	        	}
  	  	}else{
            echo json_encode(array("respuesta" => "error_form"));
        }
	}
	
       
}
?>
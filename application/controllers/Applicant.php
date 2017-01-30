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
	
	
	public function inputApplicantGrade(){
		if(
	
		$this->input->post("applicant_has_gradeTitleStartDate") && 	
		$this->input->post("applicant_has_gradeTitleTitulation") &&	
		$this->input->post("applicant_has_gradeTitleName")
			 
		){   	
		
			
			$this->form_validation->set_rules('applicant_has_gradeTitleStartDate', 'Fecha inico', 'required');
	    	$this->form_validation->set_rules('applicant_has_gradeTitleTitulation', 'Titulación', 'required');
			$this->form_validation->set_rules('applicant_has_gradeTitleName', 'Nombre del grado', 'required');
	    
			
			if($this->input->post("applicant_has_gradeTitleEndDate")){
				$this->form_validation->set_rules('applicant_has_gradeTitleEndDate', 'Fecha fin', 'required');			
			}
			
			if($this->input->post("gradeTitle_idGradeTitle")){
				$this->form_validation->set_rules('gradeTitle_idGradeTitle', 'Nombre', 'required');				
			}
	
	 		
	        if($this->form_validation->run() == false){           
	                echo json_encode(array("respuesta" => "error_form"));		  
			}else{				    
					$applicantGradeTitle  = array(		        
			      	"applicant_user_idUser" => $this->session->userdata['idUser'],
					"gradeTitle_idGradeTitle" => $this->input->post("gradeTitle_idGradeTitle"),
					"applicant_has_gradeTitleStartDate"  => $this->input->post("applicant_has_gradeTitleStartDate"),
					"applicant_has_gradeTitleEndDate"  => $this->input->post("applicant_has_gradeTitleEndDate"),
					"applicant_has_gradeTitleName"  => $this->input->post("applicant_has_gradeTitleName"),
					"applicant_has_gradeTitleTitulation"  => $this->input->post("applicant_has_gradeTitleTitulation")					
			        );					
				
					$updateApplicantGradeTitle  = $this->Applicant_model->updateApplicantGradeTitle ($applicantGradeTitle);
				
					echo $updateApplicantGradeTitle;
					echo "<br>";
			
					if($updateApplicantGradeTitle == TRUE){								
						
						echo json_encode(array("respuesta" => "success"));					
						                   
	                }else{
	                    echo json_encode(array("respuesta" => "exists"));
	                }
				
	            
	        	}
  	  	}else{
            echo json_encode(array("respuesta" => "error_form"));
        }
	}
	
	public function inputApplicantExperience(){
		if(
	
		$this->input->post("experienceEnterpriseName") && 	
		$this->input->post("experienceWorkstationName") &&	
		$this->input->post("experienceDateStart") && 	
		$this->input->post("professionalLevel_idProfessionalLevel") &&	
		$this->input->post("function_idFunction")			 
		){   	
		
			
			$this->form_validation->set_rules('experienceEnterpriseName', 'Nombre Experiencia', 'required');
	    	$this->form_validation->set_rules('experienceWorkstationName', 'Titulación', 'required');
			$this->form_validation->set_rules('experienceDateStart', 'Nombre del grado', 'required');
	   	 	$this->form_validation->set_rules('professionalLevel_idProfessionalLevel', 'Titulación', 'required');
			$this->form_validation->set_rules('function_idFunction', 'Nombre del grado', 'required');
			
			if($this->input->post("experienceDateEnd")){
				$this->form_validation->set_rules('experienceDateEnd', 'Fecha fin', 'required');			
			}
			
			if($this->input->post("experienceDescription")){
				$this->form_validation->set_rules('experienceDescription', 'Descripcion', 'required');			
			}
			
			
				
		
	 		
	        if($this->form_validation->run() == false){           
	                echo json_encode(array("respuesta" => "error_form"));		  
			}else{				    
					$applicanExperience  = array(		        
			       	"applicant_user_idUser" => $this->session->userdata['idUser'],
			    	"experienceEnterpriseName" => $this->input->post("experienceEnterpriseName"),
					"experienceWorkstationName" => $this->input->post("experienceWorkstationName"),
					"experienceDateStart"  => $this->input->post("experienceDateStart"),
					"experienceDateEnd"  => $this->input->post("experienceDateEnd"),
					"experienceDescription"  => $this->input->post("experienceDescription"),
					"function_idFunction"  => $this->input->post("function_idFunction"),
					"professionalLevel_idProfessionalLevel"  => $this->input->post("professionalLevel_idProfessionalLevel")		
			        );					
				
					$updateApplicanExperience  = $this->Applicant_model->updateApplicantExperience($applicanExperience);
				
					   
			
					if($updateApplicanExperience === TRUE){								
						
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
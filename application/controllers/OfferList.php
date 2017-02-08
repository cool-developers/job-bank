<?php
class OfferList extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Offer_model');
                $this->load->helper('url_helper','form');
	    		$this->load->library(array('form_validation'));
        }
		
		
        public function index()
        {
        	if(isset($this->session->userdata['email'])){
        		
        		$userId = $this->session->userdata('userId');
				$rol = $this->session->userdata('rol');				
							
				redirect("BolsaDeTrabajo");					
        	}       		
        
			$this->load->view('templates/header');
	        $this->load->view('login/OfferList_view' , $data);		
	        $this->load->view('templates/footer');
			
			  
			  
		}


		
		
		
		public function updateOffer(){
		if(
		$this->input->post("offerEnterpisePhone") &&
		$this->input->post("offerEnterpriseName") && 	
		$this->input->post("offerEnterpriseEmail") &&	
		$this->input->post("offerJobTitle") &&
		$this->input->post("offerEndDate") && 	
		$this->input->post("offerType") &&	
		$this->input->post("offerDescription") 	&&
		$this->input->post("offerVacant") &&	
		$this->input->post("day_idDay") 	&&
		$this->input->post("contract_idContract") &&			
		$this->input->post("gradeTitle_idGradeTitle") 
		//$this->input->post("languageCont")
		){
				
		 	$this->form_validation->set_rules('offerEnterpisePhone', 'Titulo', 'required');
	    	$this->form_validation->set_rules('offerEnterpriseName', 'Descripcion', 'required');
			$this->form_validation->set_rules('offerEnterpriseEmail', 'Titulo', 'required');
			$this->form_validation->set_rules('offerJobTitle', 'Titulo', 'required');
	    	$this->form_validation->set_rules('offerEndDate', 'Descripcion', 'required');
			$this->form_validation->set_rules('offerType', 'Titulo', 'required');
			$this->form_validation->set_rules('offerDescription', 'Titulo', 'required');
			$this->form_validation->set_rules('offerVacant', 'Titulo', 'required');
			$this->form_validation->set_rules('day_idDay', 'Titulo', 'required');
			$this->form_validation->set_rules('gradeTitle_idGradeTitle', 'Titulo', 'required');
			$this->form_validation->set_rules('contract_idContract', 'Titulo', 'required');
					
			
		if($this->form_validation->run() == false){           
	                echo json_encode(array("respuesta" => "error_form2"));		  
			}else{
			 	$offerListData  = array(		        
				
				"offerEnterpisePhone" => $this->input->post("offerEnterpisePhone"),
				"offerEnterpriseName" => $this->input->post("offerEnterpriseName"),
				"offerEnterpriseEmail" => $this->input->post("offerEnterpriseEmail"),										
		      	"offerJobTitle" => $this->input->post("offerJobTitle"),
				"offerEndDate" => $this->input->post("offerEndDate"),
				"offerType" => $this->input->post("offerType"),
				"offerDescription"  => $this->input->post("offerDescription"),							
		      	"offerVacant" => $this->input->post("offerVacant"),
				"day_idDay" => $this->input->post("day_idDay"),
				"gradeTitle_idGradeTitle" => $this->input->post("gradeTitle_idGradeTitle"),
				"contract_idContract"  => $this->input->post("contract_idContract"),
				"offerStartDate" => date("Y-m-d")	
				 );
				 
				 $languageListData = json_decode($this->input->post("languages"));							
				 $knowledgeListData = json_decode($this->input->post("knowledges"));
			     $updateOfferList = $this->Offer_model->updateOfferList($offerListData, $languageListData , $knowledgeListData);				
			
				if($updateOfferList === TRUE){								
					
					echo json_encode(array("respuesta" => "success"));					
					                   
                }else{
                    echo json_encode(array("respuesta" => "exists"));
					
                }			    	
			
		}
		
		}else{
            echo json_encode(array("respuesta" => "error_form3"));
        }
		
		
		}   
		
		
		
		
		
		
		
		
		
		
		
		

		public function prueba(){
			$this->load->view('viewtemplates/OfferList_view');		
		}
		
		
		
		
		
}
?>
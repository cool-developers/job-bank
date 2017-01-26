<?php
class OfferList extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
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
			$this->load->view('templates/menuLogin');
	        $this->load->view('login/OfferList_view' , $data);		
	        $this->load->view('templates/footer');
			  
			  
		}


		
		
		
		public function updateOffer(){
		if(
		$this->input->post("title") &&
		$this->input->post("fechalimi") && 	
		$this->input->post("estado") &&	
		$this->input->post("description") 	
		
		){
			
			$this->form_validation->set_rules('tittle', 'Titulo', 'required');
	    	$this->form_validation->set_rules('description', 'Descripcion', 'required');
			$this->form_validation->set_rules('fechalimi', 'Titulo', 'required');
			$this->form_validation->set_rules('estado', 'Titulo', 'required');
			
		if($this->form_validation->run() == false){           
	                echo json_encode(array("respuesta" => "error_form"));		  
			}else{
				$offerListData  = array(		        
			
			      	"title" => $this->input->post("title"),
					"description" => $this->input->post("description"),
					"estado" => $this->input->post("estado"),
					"fechalimi"  => $this->input->post("fechalimi")
					
					 );					
				
					$updateOfferList = $this->Offer_model->updateOfferList($offerListData);
				
					if($updateOfferList === TRUE){								
						
						echo json_encode(array("respuesta" => "success"));					
						                   
	                }else{
	                    echo json_encode(array("respuesta" => "exists"));
	                }			    	
			
		}
		
		}else{
            echo json_encode(array("respuesta" => "error_form"));
        }
		
		
		}   
		
		
		
		
		
		
		
		
		
		
		
		

		public function prueba(){
			$this->load->view('viewtemplates/OfferList_view');		
		}
		
		
		
		
		
}
?>
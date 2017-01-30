<?php
class Titulation extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Titulation_model');
                $this->load->helper('url_helper');			
        }
		
		public function getTitulations(){
			$tituations = $this->Titulation_model->get_Titulations();
			echo json_encode($tituations);
		}
		
		public function getGradeTitles(){
			$idTitulation = $this->input->post("idTitulation");				
			$gradeTitles = $this->GradeTitle_model->get_gradetitles($idTitulation);
			echo json_encode($gradeTitles);
		}
		
       
}
?>
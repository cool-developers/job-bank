<?php
class ProfessionalLevel extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('ProfessionalLevel_model');
                $this->load->helper('url_helper');			
        }
		
		public function getProfessionalLevels(){
			$ProfessionalLevels = $this->ProfessionalLevel_model->get_professionalLevels();
			echo json_encode($ProfessionalLevels);
		}
		
		
       
}
?>
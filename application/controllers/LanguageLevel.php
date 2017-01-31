<?php
class LanguageLevel extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('LanguageLevel_model');
                $this->load->helper('url_helper');			
        }
		
		public function getLanguageLevel(){
			$LanguageLevel = $this->LanguageLevel_model->get_LanguageLevel();
			echo json_encode($LanguageLevel);
		}
		
		
		
       
}
?>
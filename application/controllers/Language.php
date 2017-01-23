<?php
class Language extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Language_model');
                $this->load->helper('url_helper');			
        }
		
		public function getLanguage(){
			$Language = $this->Language_model->get_Language();
			echo json_encode($Language);
		}
		
		
       
}
?>
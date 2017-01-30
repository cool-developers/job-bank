<?php
class Functions extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Functions_model');
                $this->load->helper('url_helper');			
        }
		
		public function getFunctions(){
			$Functions = $this->Functions_model->get_functions();
			echo json_encode($Functions);
		}
		
		
       
}
?>
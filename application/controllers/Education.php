<?php
class Education extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Education_model');
                $this->load->helper('url_helper');			
        }
		
		public function getDepartments(){
			$deparments = $this->Education_model->get_departments();
			echo json_encode($deparments);
		}
		
	
       
}
?>
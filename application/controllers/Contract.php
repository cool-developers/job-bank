<?php
class Contract extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Contract_model');
                $this->load->helper('url_helper');			
        }
		
		public function getContract(){
			$Contract = $this->Contract_model->get_Contract();
			echo json_encode($GradeTitle);
		}
		
		
       
}
?>
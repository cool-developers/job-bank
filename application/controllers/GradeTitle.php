<?php
class GradeTitle extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('GradeTitle_model');
                $this->load->helper('url_helper');			
        }
		
		public function getGradeTitle(){
			$GradeTitle = $this->GradeTitle_model->get_gradetitle();
			echo json_encode($GradeTitle);
		}
		
		
       
}
?>
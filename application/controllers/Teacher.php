<?php
class Teacher extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Teacher_model');
                $this->load->helper('url_helper');			
        }
		
		public function getTeachers(){
			$teachers = $this->Teacher_model->get_Teachers();
			echo json_encode($teachers);
		}
	
       
}
?>
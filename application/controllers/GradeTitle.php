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
		
			
		public function getGradeTitles(){
			$idTitulation = $this->input->post("idTitulation");				
			$gradeTitles = $this->GradeTitle_model->get_gradetitles($idTitulation);
			echo json_encode($gradeTitles);
		}
		
	/*
		public function getCurso(){
			$idGradeTitle = $this->input->post("idGradeTitle");			
			$curso = $this->GradeTitle_model->get_Curso($idGradeTitle);
			echo json_encode($curso);
		}
	 
	 */
   
}
?>
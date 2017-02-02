<?php
class Knowledge extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Knowledge_model');
                $this->load->helper('url_helper');			
        }
		
		public function getKnowledge(){
			$Knowledge = $this->Knowledge_model->get_knowledge();
			echo json_encode($Knowledge);
		}
		
		
       
}
?>
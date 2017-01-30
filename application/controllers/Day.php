<?php
class Day extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Day_model');
                $this->load->helper('url_helper');			
        }
		
		public function getDay(){
			$Day = $this->Day_model->get_Day();
			echo json_encode($Day);
		}
		
		
       
}
?>
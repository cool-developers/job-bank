<?php
class Location extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Location_model');
                $this->load->helper('url_helper');			
        }
		
		public function getProvinces(){
			$provinces = $this->Location_model->get_Provinces();
			echo json_encode($provinces);
		}

       
}
?>
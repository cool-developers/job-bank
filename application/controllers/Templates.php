<?php
class Templates extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Login_model');
                $this->load->helper('url_helper','form');
	    		$this->load->library('form_validation');
        }

		public function get($template)
		{
			$this->load->view("/viewtemplates/$template");
		}
		
		
}
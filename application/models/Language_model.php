<?php
class Language_model extends CI_Model {

		public function get_language(){
			
		 	$query = $this->db->get('language');
       		return $query->result_array();
		}	
			
		
		
}

?>

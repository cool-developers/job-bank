<?php
class Functions_model extends CI_Model {
		
		public function get_functions(){
			
		 	$query = $this->db->get('function');
       		return $query->result_array();
		}	
			
}

?>
<?php
class Location_model extends CI_Model {

		public function get_gradetitle(){
			
		 	$query = $this->db->get('gradetitle');
       		return $query->result_array();
		}	
			
		
}

?>

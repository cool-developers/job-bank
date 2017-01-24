<?php
class Titulation_model extends CI_Model {

		public function get_titulations(){
			
		 	$query = $this->db->get('titulation');
       		return $query->result_array();
		}	
			
}
?>

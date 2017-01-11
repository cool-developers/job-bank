<?php
class Education_model extends CI_Model {

		public function get_departments(){			
		 	$query = $this->db->get('department');
       		return $query->result_array();
		}	
			
	
		
}

?>

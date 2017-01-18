<?php
class Contract_model extends CI_Model {

		public function get_contract(){
			
		 	$query = $this->db->get('contract');
       		return $query->result_array();
		}	
			
		
}

?>

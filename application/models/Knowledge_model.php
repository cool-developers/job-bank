<?php
class Knowledge_model extends CI_Model {

		public function get_knowledge(){
			
		 	$query = $this->db->get('knowledge');
       		return $query->result_array();
		}	
			
		
		
}

?>

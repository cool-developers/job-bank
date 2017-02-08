<?php
class Knowledge_model extends CI_Model {

		public function get_knowledge(){
			

			$query = $this->db->get_where('knowledge', array('knowledgeEnable' => 1));
			
       		return $query->result_array();
		}	
			
		
		
}

?>

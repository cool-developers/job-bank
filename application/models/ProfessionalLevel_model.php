<?php
class ProfessionalLevel_model extends CI_Model {
		
		public function get_professionalLevels(){
			
		 	$query = $this->db->get('professionallevel');
       		return $query->result_array();
		}	
			
}

?>
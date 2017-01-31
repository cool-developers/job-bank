<?php
class LanguageLevel_model extends CI_Model {

		public function get_languageLevel(){
			
		 	$query = $this->db->get('languagelevel');
       		return $query->result_array();
		}	
			
		
		
}

?>

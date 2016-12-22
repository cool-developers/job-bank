<?php
class Location_model extends CI_Model {

		public function get_provinces(){
			
		 	$query = $this->db->get('province');
       		return $query->result_array();
		}	
			
		public function get_towns($idProvince){			  
	    	$query = $this->db->get_where('town', array('province_idProvince' => $idProvice));		
			return $query->result_array();			
		}	
		
}

?>

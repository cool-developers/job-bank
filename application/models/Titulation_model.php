<?php
class Titulation_model extends CI_Model {

		public function get_titulations(){
			
		 	$query = $this->db->get('titulation');
       		return $query->result_array();
		}	
		
		public function get_titulationName($idTitulation){
		 	$query =$this->db->get_where('titulation', array('idTitulation' => $idTitulation));	
       		return $query->result_array();
		}		
		
}
?>

<?php
class Teacher_model extends CI_Model {

		public function get_teachers(){
			
		 	$query = $this->db->get('teacher');
       		return $query->result_array();
		}	
		
}

?>

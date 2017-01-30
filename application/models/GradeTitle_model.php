<?php
class GradeTitle_model extends CI_Model {

		public function get_gradetitle(){
			$this->db->where('department_idDepartment !=', 6);
		 	$query = $this->db->get('gradetitle');
       		return $query->result_array();
		}	
			
		/* IKER Curso
		public function get_curso($idGradeTitle){			  
	    	$query = $this->db->get_where('gradetitle', array('idGradeTitle' => $idGradeTitle));		
			return $query->result_array();			
		}
		*/
		
		public function get_gradeTitles($idTitulation){			  
	    	$query = $this->db->get_where('gradetitle', array('titulation_idTitulation' => $idTitulation));		
			return $query->result_array();			
		}	
		
		
}

?>

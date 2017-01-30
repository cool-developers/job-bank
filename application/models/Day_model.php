<?php
class Day_model extends CI_Model {

		public function get_day(){			
		 	$query = $this->db->get('day');
       		return $query->result_array();
		}			
}

?>

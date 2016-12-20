<?php
class Login_model extends CI_Model {

     
		public function get_email($email = FALSE)
		{
			$email = ($this->input->post('email'));
		 	$query = $this->db->get_where('user', array('email' => $email));
       		return $query->row_array();
		}	
}

?>


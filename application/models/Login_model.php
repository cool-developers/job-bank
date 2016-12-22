<?php
class Login_model extends CI_Model {

		public function get_email($email = FALSE){
			
		 	$query = $this->db->get_where('user', array('email' => $email));
       		return $query->row_array();
		}	
		
		public function set_user($email, $password , $rol) 
		{
				
			if($this->get_email($email) != null){							
			    $data = array(
			        'email' => $email,
			        'password' => $password,
			        'rol' => $rol
			    );
			}
			return $this->db->insert('user', $data);
			
		}
		
		public function set_enterprise($enterpriseName, $email, $idTown){
				
				
			$user = $this->get_email($email);	
				
								
			if(isset($user)){							
			    $data = array(
			        'enterpriseName' => $enterpriseName,
			        'user_idUser' => $user['idUser'],
			        'town_idTown' => $idTown
			    );
			}
			return $this->db->insert('enterprise', $data);						
		}
		
		
		
}

?>


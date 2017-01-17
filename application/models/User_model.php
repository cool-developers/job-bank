<?php
class User_model extends CI_Model {
	
		protected $email;
		protected $idUser;
		protected $password;		
		protected $rol_idRol;
	

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
		
		public function signupUser($email,$password){
						
		    $data = array(		        
		        "email"         =>      $email,
		        "password"      =>      $password,
		        "rol_idRol"        =>      4
		    );
		
		    $this->db->where("email",$email);
		    $check_exists = $this->db->get("user");
		    if($check_exists->num_rows() == 0){
		        $this->db->insert("user", $data);
		        return true;
		    }else{
		        return false;
		    }
		}
		
		
	    public function loginUser($email,$password){
	    	
			$query = $this->db->get_where('user', array('email' => $email));
       		return $query->row_array();
			
	       /* $this->db->where("email", $email);
	        $this->db->where("password", $password);
	        $query = $this->db->get("user");
	        if($query->num_rows() == 1){
	            return true;
	        }else{
	            return false;
	        }*/
	    }
		
		
}

?>
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
		
		public function signupEnterprise($userData, $enterpriseData){
			
			$this->db->trans_begin();
	
			$this->db->where("email",$userData["email"]);
		    $check_exists = $this->db->get("user");
			
		
			
		    if($check_exists->num_rows() == 0){
		    	
				$this->db->insert("user", $userData);
		        $user = $this->get_email($userData["email"]);
				$idUser = $user["idUser"];
				
				$enterpriseData["user_idUser"] = $idUser;
				
				$this->db->insert("enterprise",$enterpriseData);
				
				if ($this->db->trans_status() === FALSE)
				{
				        $this->db->trans_rollback();
						return false;
				}
				else
				{				
				        $this->db->trans_commit();
						return true;			
				}			      
				
		    }else{
		    	return false;
		    }
			
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
		
		public function set_teacher($email,$teacherName,$idDepartment){
			$user = $this->get_email($email);	
				
								
			if(isset($user)){							
			    $data = array(
			        'teacherName' => $teacherName,
			        'user_idUser' => $user['idUser'],
			        'department_idDepartment' => $idDepartment
			    );
			}
			return $this->db->insert('teacher', $data);	
		}
		
		
		
		
		
		public function signupUser($email,$password,$rol,$hash,$active){
						
		    $data = array(		        
		        "email"         =>      $email,
		        "password"      =>      $password,
		        "rol_idRol"     =>      $rol,
		        "hash"			=> 		$hash ,
		        "active" 		=> 		$active
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
		
		public function activeUser($email){
			$user = $this->get_email($email);													
			if(isset($user)){
				$this->db->set('active', TRUE);
				$this->db->where('email', $email);
				$this->db->update('user');
				return true;
			}else{
				return false;
			}						
		}
		
		
}

?>


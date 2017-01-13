<?php
class User extends CI_Controller {
		
		protected $email;
		protected $idUser;
		protected $password;		
		protected $rol_idRol;
		
        public function __construct($data)
        {    
			$this->$email = $data['email'];
			$this->$idUser = $data['email'];
			$this->rol
        }
	

}
?>
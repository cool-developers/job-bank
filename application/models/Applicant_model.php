<?php
class Applicant_model extends CI_Model {
		
		
	function updateApplicant($applicantData){
		  $this->db->where("user_idUser",$applicantData["user_idUser"]);
		    $check_exists = $this->db->get("applicant");
		    if($check_exists->num_rows() == 0){
		        $this->db->insert("applicant", $applicantData);
		        return true;
		    }else{
		        return false;
		    }
	}
		
}

?>

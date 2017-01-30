<?php
class Applicant_model extends CI_Model {
		
	function get_applicant($user_idUser){
		$this->db->where("user_idUser",$user_idUser);		
		$check_exists = $this->db->get("applicant");
	    if($check_exists->num_rows() == 0){		     
	        return false;
	    }else{
	        return true;
	    }
	}	
		
		
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
	
	function updateApplicantGradeTitle($applicantGradeTitle){
		  $this->db->where("applicant_user_idUser",$applicantGradeTitle["applicant_user_idUser"]);
		  $this->db->where("applicant_has_gradeTitleName",$applicantGradeTitle["applicant_has_gradeTitleName"]);
		    $check_exists = $this->db->get("applicant_has_gradetitle");
		    if($check_exists->num_rows() == 0){
		        $this->db->insert("applicant_has_gradetitle", $applicantGradeTitle);
		        return true;
		    }else{
		        return false;
		    }
	}
	
	function updateApplicantExperience($applicantExperience){
			
		  
		    $this->db->insert("experience", $applicantExperience);
			$afftectedRows=$this->db->affected_rows();			
			if($afftectedRows == 1){
				return true;
			}else{
				return false;
			}
			
	}
	
		
}

?>

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
	
		
}

?>

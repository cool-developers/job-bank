<?php
class Offer_model extends CI_Model {
		
		
	function updateOfferList($offerListData){
		  $this->db->where("idOffer",$offerListData["idOffer"]);
		    $check_exists = $this->db->get("offer");
		    if($check_exists->num_rows() == 0){
		        $this->db->insert("offer", $offerListData);
		        return true;
		    }else{
		        return false;
		    }
	}
		
}

?>

<?php
class Offer_model extends CI_Model {
		
		
	function updateOfferList($offerListData){
		$this->db->trans_begin();

		$this->db->insert("offer", $offerListData);
		
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
						
	}
	
}

?>

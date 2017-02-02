<?php
class Offer_model extends CI_Model {
		
		
	function updateOfferList($offerListData, $languageListData){
		$this->db->trans_begin();

		$this->db->insert("offer", $offerListData);
		
		$this->db->order_by('idOffer', 'ASC');
		$query = $this->db->get_where('offer', array('offerEnterpriseEmail' => $offerListData['offerEnterpriseEmail']), 1);
		foreach ($query->result() as $row)
		{
		        $idOffer = $row->idOffer;
		}
		
		
		foreach ($languageListData  as $key => $language) {
			
			$data = array("offer_idOffer"=> $idOffer );		
			$cont = 0;	
			foreach ($language  as $name => $value) {
				
					
				if($name != "id" && $name != '$$hashKey'  && $name != "object"){
				  $data[$name] = $value;	
				  $cont++;
				}
				
					
			}			
			if ($cont > 1){
				$this->db->insert("offer_has_language", $data);					
			}
				
		}	
		
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

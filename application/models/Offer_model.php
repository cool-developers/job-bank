<?php
class Offer_model extends CI_Model {
		
		
	function updateOfferList($offerListData, $languageListData , $knowledgeListData){
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
		
		
		foreach ($knowledgeListData as $key => $knowledge) {
						
				if($knowledge->knowledgeEnable == null){
					$knowledgedata = array(
						"idKnowledge" => $knowledge->idKnowledge,
						"knowledgeEnable" => 0
					);
					
					$this->db->insert("knowledge", ($knowledgedata));	
				}			
				
				$data = array(
				"offer_idOffer"=> $idOffer,
				"knowledge_idKnowledge" => $knowledge->idKnowledge				
				 );		
				
				$this->db->insert("offer_has_knowledge", ($data));	
				
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


	public function get_OfferList(){
		
			//$query = $this->db->get('offer');
			
			$query = $this->db->query("SELECT  
									offer.idOffer,
									offer.offerJobTitle ,
									gradetitle.gradeTitleName,
									offer.offerEnterpriseName, 
									town.townName , 
									offer.offerStartDate ,
									offer.offerEndDate , 
									offer.offerDescription,
									day.dayName,
									contract.contractName,
									offer.offerType
								FROM `town` , `offer`, `gradetitle`, `day` , `contract`
								WHERE
								town.idTown = offer.town_idTown AND
								gradetitle.idGradeTitle = offer.gradeTitle_idGradeTitle AND
								day.idDay = offer.day_idDay AND
								contract.idContract = offer.contract_idContract");
			
			
       		return $query->result_array();
	}
	
	
}

?>

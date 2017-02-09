<div>
<div ng-repeat="offer in offerList">
 	
 	<button type="button" class="addfields botonb" ng-click="seeOffer(offer.idOffer)">Ver oferta</button>		
 	<button type="button" class="addfields botonb" ng-click="editOffer(offer.idOffer)">Editar</button>		
 	<button type="button" class="addfields botonb" ng-click="deleteOffer(offer.idOffer)">X</button>
	<div class = "offers">
	{{offer.offerJobTitle}}| {{offer.offerStartDate}} <br> 
	{{offer.gradeTitleName}}<br>
	{{offer.offerEnterpriseName}} | {{offer.townName}} <br>
	{{offer.offerDescription}} <br>	
	{{offer.dayName}} |{{offer.contractName}}
	</div>
   
</div>	 	
 			 	

   			 
	
</div>
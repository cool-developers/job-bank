<div>
<div ng-repeat="offer in offerList">
 	<div class="izboton">
 	<button type="button" class="addfields botonb" ng-click="seeOffer(offer.idOffer)">Ver oferta</button>		
 	<button type="button" class="addfields botonb" ng-click="editOffer(offer.idOffer)">Editar</button>		
 	<button type="button" class="addfields botonb" ng-click="deleteOffer(offer.idOffer)">X</button>
 	 </div>
	<div class = "offers">
	<strong>{{offer.offerJobTitle}}</strong> | {{offer.offerStartDate}} <br> 
	{{offer.gradeTitleName}}<br>
	{{offer.offerEnterpriseName}} | {{offer.townName}} <br>
	{{offer.offerDescription}} <br>	
	{{offer.dayName}} |{{offer.contractName}}
	</div>
   
</div>	 	
 			 	

   			 
	
</div>
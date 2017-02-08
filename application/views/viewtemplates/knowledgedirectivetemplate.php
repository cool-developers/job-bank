 <div> 
	 <div ng-repeat = "offer_has_knowledge in offer_has_knowledges"> 
	 	<div> {{offer_has_knowledge.idKnowledge}} <span ng-click="deleteKnowledge(offer_has_knowlege)"> x </span>	 </div>  		 	
	 </div>
	 
	 {{offer_has_knowledges.idKnowledge}}
	
	 <br>
	 <input type="text" name="Knowledge" my-enter="newKnowledge()" ng-model="search.knowledge" />
	 
	 <div ng-show="search.knowledge" ng-repeat = "knowledge in knowledges | filter:search.knowledge"> 
	 	<div ng-click="knowledgeSelected(knowledge.idKnowledge)"> {{knowledge.idKnowledge}} </div>  			 	
	 </div>
 </div>
<?php session_start(); ?>




<div ng-controller="nuovaDistintaBaseCtrl">
	<div class="form-horizontal " id="editFormDbase" hidden>
		<div class="panel panel-default">
			<div class="container" style="margin-top:10px;">
				<form >

					<div class="form-group">
					  	<label for="data" class="col-sm-2 control-label">TITLE</label>
					<div class="col-sm-8">				  
					   	<input type="text" class="form-control" id="data" placeholder="Title" ng-model="dbase.title">
					</div>

					  </div>
					  <div class="form-group">
					   	<label for="unit" class="col-sm-2 control-label">DRAWING NUMBER</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" ng-model="dbase.disegno_no" id="unit" placeholder="DRAWING NUMBER"  >
							<!--<input type="text" class="form-control" value="<?php //echo $_SESSION['disegno_cliente']; ?>"> -->
						 	
					    </div>
					  </div>
					  <div class="form-group">
					   	<label for="data" class="col-sm-2 control-label">DATE</label>
						<div class="col-sm-8">	
							<span class="input-group-btn">
	            				 <md-datepicker ng-model="dbase.data"  md-placeholder="Enter date"></md-datepicker>
	          				</span>			  
					    	<!--<input type="text" class="form-control" id="data" placeholder="Date" ng-model="dbase.data"> -->
					    </div>
					  </div>
					 
					  <div class="col-md-4 form-group"></div>
	 					<div class="col-md-4 form-group">
	 								<ul class="list-group">
				 						<li class="list-group-item"><input type="radio" ng-model="dbase.layout" value="meccanica" />Mechanic</li>
				 						<li class="list-group-item"><input type="radio" ng-model="dbase.layout" value="fluidica" />Fluidic</li>
				 						<li class="list-group-item"><input type="radio" ng-model="dbase.layout" value="elettrica" />Electric</li>
				 						<li class="list-group-item"><input type="radio" ng-model="dbase.layout" value="layout" />Layout</li>
				 						<li class="list-group-item"><input type="radio" ng-model="dbase.layout" value="generica" />Generic</li>
				 						<li class="list-group-item"><input type="radio" ng-model="dbase.layout" value="standard" />Standard</li>
				 						<li class="list-group-item"><input type="radio" ng-model="dbase.layout" value="another" />Another</li>
				 					</ul>
								   		
					  	</div>
					  
					  <div class="form-group">
					  	<label for="data" class="col-sm-2 control-label"></label>
					  	<div class="col-md-6"></div>
					  	<div class="col-sm-5">
					  		<button type="submit" class="btn btn-info btn-lg" ng-click="nuovaDBase(dbase)">CREATE</button>
					  	</div>
					  </div>
				</form>
			</div>
		</div>
	</div>
</div>
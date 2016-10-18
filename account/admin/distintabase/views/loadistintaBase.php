<h1>LOAD</h1>
<div class="col-md-12">
	<div class="form-horizontal " id="editFormDbase">
		<div class="panel panel-default">
			<div class="container" style="margin-top:10px;">
				<form >

					<div class="form-group">
					  	<label for="data" class="col-sm-2 control-label">REVISION</label>
						<div class="col-sm-8">	
	 							<select kendo-drop-down-list k-options="listRevision" k-on-change="loadRevision(kendoEvent)" ng-model="dbase.layout"></select>
						</div>	 	
					  </div>
					  <div class="form-group">
					   	<label for="unit" class="col-sm-2 control-label">DRAWING NUMBER</label>
						<div class="col-sm-8">
							
							<label for="unit" class="col-sm-2 control-label">{{ disegno_no }}</label>
							<input type="hidden" ng-model="dbase.disegno_no" ng-init="dbase.disegno_no = disegno_no">
							<input type="hidden" ng-model="dbase.id" ng-init="dbase.id = id">
							<input type="hidden" ng-model="dbase.id_distbase" ng-init="dbase.id_distbase = id_distbase">
							<!--<input type="text" class="form-control" value="<?php //echo $_SESSION['disegno_cliente']; ?>"> -->
						 	
					    </div>
					  </div>
					  	<div class="form-group">
	 						<label for="data" class="col-sm-2 control-label">LIST BASE</label>
	 						<div class="col-sm-8">	
	 							<select kendo-drop-down-list k-options="listOptions" k-on-change="listChange(kendoEvent)" ng-model="dbase.layout"></select>
							</div>	 								
						</div> 		
					  	
					  <div class="form-group">
					  	<label for="data" class="col-sm-2 control-label"></label>
					  	<div class="col-md-6"></div>
					  	<div class="col-sm-5">
					  		<button type="submit" class="btn btn-info btn-lg" ng-click="loadDistintaBase(dbase)">LOAD</button>
					  	</div>
					  </div>
				</form>
			</div>
		</div>
	</div>

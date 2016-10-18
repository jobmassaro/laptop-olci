<?php session_start(); ?>
<script type="text/javascript">
	$("#datepicker").kendoDatePicker();
</script>
<div class="col-md-12">
	<div class="form-horizontal " id="editFormDbase">
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
							<input id="datepicker" value="10/10/2011" ng-model="dbase.data" style="width: 100%" />
							<!--<input type="text" class="form-control" id="data" placeholder="Date" ng-model="dbase.data"> -->
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
					  		<button type="submit" class="btn btn-info btn-lg" ng-click="creaNuovaDBase(dbase)">CREATE</button>
					  	</div>
					  </div>
				</form>
			</div>
		</div>
	</div>

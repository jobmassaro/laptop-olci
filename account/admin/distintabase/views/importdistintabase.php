<div class="form-group">
	<label for="data" class="col-sm-2 control-label">LIST BASE</label>
		<div class="col-sm-8">	
			<select kendo-drop-down-list k-options="listOptions" k-on-change="listChange(kendoEvent)" ng-model="c.layout"></select>
		</div>	 								
</div> 		
<p>&nbsp;</p>
<p>&nbsp;</p>

<div ng-if="showFileDistintaBase">
	<div class="container">
		<div class="form-group">
			<form action="uploadDBase.php" method="post" enctype="multipart/form-data" name="FileUploadForm" id="FileUploadForm">
				<input type="hidden" id="numid" name="numid" value="{{ id }}" >
				<input type="hidden" id="numdise" name="numdise" value="{{ disegno_no }}" >
				<input type="hidden" id="relazbase" name="relazbase" value="{{id_distbase }}">
				<input type="hidden" id="layout" name="layout" value="{{ layout }}" >
				<div class="input-group col-xs-12">
				      <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
				      <input type="file" name="UploadFileField" id="UploadFileField" class="form-control input-lg"  >
				      	<span class="input-group-btn">
		        			<button type="submit" class="browse btn btn-primary input-lg file-upload-button"><i class="glyphicon glyphicon-search"></i> Browse</button>
		      			</span>
		    	</div>    	
			</form>
		</div>
	</div>
</div>
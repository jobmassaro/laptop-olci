<div class="form-horizontal alert alert-warning" id="editForm">


	 <div class="container">
    <div class="header clearfix">

        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="">
                <img src="../../images/loghi.png" class="btn btn-info" style="width:35%;">
            </li>
          </ul>
        </nav>
        <nav>
          <ul class="nav nav-pills pull-left">
            <li><img src="../../images/logo.png" style="width:45%;"><a href="lista.php" class="btn btn-info"><i class="icon-th-list icon-white"></i>Back</a></li>
            <li><br /></li>
          </ul>
        </nav>
        


        
      </div>

 <div class="row" ng-controller="OlciHeadCtrl" >     
  <div class="panel panel-default" ng-repeat="h in head" style="border:1px solid grey;">
    <p></p>
<div class="col-md-4">
    <form class="form-horizontal" id="progetto">
    <div class="form-group" >
        <label for="progetto" class="control-label col-xs-4" >PROJECT:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="progetto" placeholder="project" ng-model="h.progetto">
        </div>
    </div>
    <div class="form-group">
        <label for="linea" class="control-label col-xs-4" >LINE:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="linea" placeholder="line" ng-model="h.linea">
        </div>
    </div>
    <div class="form-group">
        <label for="numdisegno" class="control-label col-xs-4" >LINE DRAWING:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="numdisegno" placeholder="line drawing number " ng-model="h.numero_disegno_linea">
        </div>
    </div>
    <div class="form-group">
        <label for="acronimo" class="control-label col-xs-4">ACRONYM LrINE :</label>
        <div class="col-xs-6">
           <!-- <input type="text" class="form-control hfield" id="acronimo" placeholder="acronym line" ng-model="h.acronimo_linea">-->
                                       
        </div>
    </div>
     <div class="form-group">
        <label for="plat" class="control-label col-xs-4">PLANT:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="plat" placeholder="plant" ng-model="h.plant">
        </div>
    </div>
     <div class="form-group">
        <label for="modello" class="control-label col-xs-4">MODEL:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="modello" placeholder="model" ng-model="h.modello">
        </div>
    </div>
    
</form>
</div>
 
 <div class="col-md-3">
  <form class="form-horizontal" id="progetto">
    <div class="form-group" >
        <label for="revtabella" class="control-label col-xs-4" >REV TABLE:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="revtabella" placeholder="rev.table" ng-model="h.rev_tabella">
        </div>
    </div>
    <div class="form-group">
        <label for="checked" class="control-label col-xs-4" >CHECKED:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="checked" placeholder="checked" ng-model="h.controllato">
        </div>
    </div>
    <div class="form-group">
        <label for="created" class="control-label col-xs-4" >CREATED:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="created" placeholder="created" ng-model="h.creato">
        </div>
    </div>
    <div class="form-group">
        <label for="lastmod" class="control-label col-xs-4">LAST MODIFICATION:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="lastmod" placeholder="last. modification" ng-model="h.ultima_modifica">
        </div>
    </div>
     <div class="form-group">
        <label for="writer" class="control-label col-xs-4">WRITER:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="writer" placeholder="writer" ng-model="h.compilatore">
        </div>
    </div>
     <div class="form-group">
      <p></p>
       <label for="writer" class="control-label col-xs-4"></label>
        <button class="btn btn-success" type="button" ng-click="saveInfo(h)">SAVE
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
         </button>
        </button>
     </div>
</form>
</div>
    
  </div>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
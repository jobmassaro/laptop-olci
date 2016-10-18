var app = angular.module('olciAdmin',["ngMaterial","ngTouch", "angucomplete-alt",'ngAnimate', 'ui.grid', 'ui.grid.selection', 'ui.grid.exporter', 'ui.grid.moveColumns','ui.bootstrap','dialogs']);

var acronimo;


app.controller('distintaBaseCtrl', function($scope){


  $scope.selectDistintBase = function(item)
  {
    console.log('item');
  }

  $scope.distintaBase = function(item)
  {
    alert('test ' + item);
  }

});


app.controller('ListCtrl',function($scope, $http,$dialogs,$window, $rootScope){


  $scope.mailLink = "mailto:" + $scope.emailId + "?subject=" + $scope.Subject + '&body=' + $scope.bodyText;

	var baseUrl = 'services/';	

	// Function to get employee details from the database
	//$('#editForm').css('display', 'none');

	getHead();


	function getHead()
	{
		$http.post(baseUrl+'listfile.php').success(function(data){
			$scope.head = data;
		});
	}


	$scope.cloneFileOlci = function(detail)
	{
		console.log(detail)
		$http.post(baseUrl+'clonefile.php',{"id":detail.id, "nome_disegno_tabella": detail.nome_disegno_tabella , "progetto": detail.progetto})
		.success(function(data){
			$scope.head.push( data);	
			getHead();
		});
	}


	$scope.deleteFileOlci = function(info){
		
		var dlg = null;

		//dlg = $dialogs.error('Are you sure?');
		dlg = $dialogs.confirm('Please Confirm','Is this awesome or what?');
        dlg.result.then(function(btn){
          $http.post(baseUrl+ 'deletefile.php',{"id":info.id}).success(function(data){
			if (data)
		 	{

        


				$scope.head.splice(data,1);
				getHead();
			//$('#empForm').css('display', 'none');
			//location.reload(); 
			//toastr.error('Delete File!')
			}
			});
        },function(btn){
          $scope.confirmed = 'Shame on you for not thinking this is awesome!';
        });

	  
    
	
	}



	$scope.editEditFileOlci = function(info)
	{
		$http.post(baseUrl+'editfile.php',{"id": info.id, "nome_disegno_tabella" : info.nome_disegno_tabella, 
				"progetto": info.progetto,"rev_tabella": info.rev_tabella, "creato": info.creato, "linea": info.linea,"controllato" : info.controllato,
				"ultima_modifica":info.ultima_modifica, "numero_disegno_linea": info.numero_disegno_linea, "compilatore":info.compilatore,"acronimo_linea":info.acronimo_linea,
				"plant": info.plant, "modello": info.modello,"livello": info.livello })
			.success(function(data)
			{
				$window.location.href = 'listexcel.php?m='+info.id;
				
			});

	}






	$scope.editInfo = function()
	{
		$('#editForm').slideToggle();
	}

 

	$scope.creaFile = function(info)
	{
   
   /*console.log(info);
   console.log($rootScope.acronimo);
   console.log($rootScope.acronimo2);*/

    $http.post(baseUrl +'createnewfile.php',{"nome_disegno_tabella":info.nome_disegno_tabella, "progetto":info.progetto, "linea": info.linea, "numero_disegno_linea":info.numero_disegno_linea,
				"acronimo_linea": $rootScope.acronimo,"acronimo_linea2": $rootScope.acronimo2, "plant": info.plant, "modello": info.modello, "rev_tabella": info.rev_tabella, "controllato": info.controllato, "creato": info.creato,"ultima_modifica": info.ultima_modifica, "compilatore": info.compilatore})
		.success(function(data)
    {
		    if (data)
        {
			   location.reload(); 
          //$('#editLine').slideToggle();
          $('#editForm').css('display', 'none');
			   toastr.success('Table Created!');
        }
	   });

	//console.log(info);

  
  }


});

app.controller('DemoCtrl', DemoCtrl);
function DemoCtrl ($timeout, $q, $log, $rootScope) {
    var self = this;
    self.simulateQuery = false;
    self.isDisabled    = false;
    self.repos         = loadAll();
    self.querySearch   = querySearch;
    self.selectedItemChange = selectedItemChange;
    self.selectedItemChange2 = selectedItemChange2;
    self.searchTextChange   = searchTextChange;
    // ******************************
    // Internal methods
    // ******************************
    /**
     * Search for repos... use $timeout to simulate
     * remote dataservice call.
     */
    function querySearch (query) {
      var results = query ? self.repos.filter( createFilterFor(query) ) : self.repos,
          deferred;
      if (self.simulateQuery) {
        deferred = $q.defer();
        $timeout(function () { deferred.resolve( results ); }, Math.random() * 1000, false);
        return deferred.promise;
      } else {
        return results;
      }
    }
    function searchTextChange(text) {
      $log.info('Text changed to ' + text);
    }
    function selectedItemChange(item) {
      console.log(item.name);
      $rootScope.acronimo = item.name;//JSON.stringify(item.name);
      $log.info('Item changed to ' + JSON.stringify(item));
    }

     function selectedItemChange2(item) {
      console.log(item.name);
      $rootScope.acronimo2 = item.name;//JSON.stringify(item.name);
      $log.info('Item changed to ' + JSON.stringify(item));
    }





    /**
     * Build `components` list of key/value pairs
     */
    function loadAll() {
      var repos = [
        {
          'name'      : 'LAS',
          'url'       : '',
          'watchers'  : 'Linea Longherone laterale Anteriore Sx. / LH Front Side Member Line',
          'forks'     : '',
        },
        {
          'name'      : 'LAD',
          'url'       : '',
          'watchers'  : 'Linea Longherone laterale Anteriore Dx. / RH Front Side Member Line',
          'forks'     : '',
        },
        {
          'name'      : 'LAZ',
          'url'       : '',
          'watchers'  : 'Linea Longherone laterale Anteriore sx/dx (Linea unica). / LH/RH Front Side Member Line (Only one line)',
          'forks'     : '',
        },
        {
          'name'      : 'LBS',
          'url'       : '',
          'watchers'  : 'Linea preparazione longherone posteriore Sx. / LH preparation Rear Side MemberLine',
          'forks'     : '',
        },
        {
          'name'      : 'LBD',
          'url'       : '',
          'watchers'  : 'Linea preparazione longherone posteriore Dx. / RH preparation Rear Side Member Line',
          'forks'     : '',
        },
        {
          'name'      : 'LBZ',
          'url'       : '',
          'watchers'  : 'Linea preparazione longherone posteriore sx/dx (Linea unica). / LH/RH preparation Rear Side Member Line (Only one line)',
          'forks'     : '',
        },
        {
          'name'      : 'LPS',
          'url'       : '',
          'watchers'  : 'Linea Longherone laterale Posteriore Sx. / LH Rear Side Member Line',
          'forks'     : '',
        },
        {
          'name'      : 'LPD',
          'url'       : '',
          'watchers'  : 'Linea Longherone laterale Posteriore Dx. / RH Rear Side Member Line',
          'forks'     : '',
        },
        {
          'name'      : 'LPZ',
          'url'       : '',
          'watchers'  : 'Linea Longherone laterale Posteriore sx/dx (Linea unica). / LH/RH Rear Side Member Line',
          'forks'     : '',
        },
        {
          'name'      : 'LLZ',
          'url'       : '',
          'watchers'  : 'Linea Longherone Laterale Sx. / LH Side Member Line',
          'forks'     : '',
        },
         {
          'name'      : 'LCZ',
          'url'       : '',
          'watchers'  : 'Linea Longherone centrale sx/dx (Linea unica). / LH/RH Centre Side Member Line (Only one line)',
          'forks'     : '',
        },
        {
          'name'      : 'LIZ',
          'url'       : '',
          'watchers'  : 'Linea Longherone Interno sx/dx (Linea unica manuale). / LH/RH Internal Side Member Line (Only one manual line)',
          'forks'     : '',
        },
        {
          'name'      : 'LMS',
          'url'       : '',
          'watchers'  : 'Linea Longherina Montante parabrezza Sx. / LH Internal Side Member Line.',
          'forks'     : '',
        },
         {
          'name'      : 'LMD',
          'url'       : '',
          'watchers'  : 'Linea Longherina Montante parabrezza Dx. / RH Internal Side Member Line',
          'forks'     : '',
        },
        {
          'name'      : 'LMZ',
          'url'       : '',
          'watchers'  : 'Linea Longherina Montante parabrezza sx/dx (Linea unica). / LH/RH Member',
          'forks'     : '',
        },
        {
          'name'      : 'TIP',
          'url'       : '',
          'watchers'  : 'Linea Traversa Inferiore Parabrezza. / Low Windscreen Crossmember Line',
          'forks'     : '',
        },
        {
          'name'      : 'TCL',
          'url'       : '',
          'watchers'  : 'Linea Traversa Collegamento Longheroni. / Rail Connection Beam Line',
          'forks'     : '',
        },
        {
          'name'      : 'TSS',
          'url'       : '',
          'watchers'  : 'Linea Traversa Sottosedile Anteriore Sx. / Front Underseat Crossmember Line LH',
          'forks'     : '',
        },

        {
          'name'      : 'TSD',
          'url'       : '',
          'watchers'  : 'Linea Traversa Sottosedile Anteriore Dx. / Front Underseat Crossmember Line RH',
          'forks'     : '',
        },
          {
          'name'      : 'TSZ',
          'url'       : '',
          'watchers'  : 'Linea Traversa Sottosedile Anteriore sx/dx (Linea unica). / LH/RH Front Underseat Crossmember Line',
          'forks'     : '',
        },
        {
          'name'      : 'TSA',
          'url'       : '',
          'watchers'  : 'Linea preparazione Traversa Sottosedile anteriore. / Front Underseat Crossmember preparation Line.',
          'forks'     : '',
        },
        {
          'name'      : 'TSP',
          'url'       : '',
          'watchers'  : 'Linea Traversa sottosedile posteriore. / Rear Underseat Crossmember Line.',
          'forks'     : '',
        },
        {
          'name'      : 'TCS',
          'url'       : '',
          'watchers'  : 'Linea Traversa Centrale sottosedile Sx. / Central Underseat Crossmember Line LH',
          'forks'     : '',
        },
        {
          'name'      : 'TCD',
          'url'       : '',
          'watchers'  : 'Linea Traversa Centrale sottosedile Dx. / Central Underseat Crossmember Line RH',
          'forks'     : '',
        },
        {
          'name'      : 'TCZ',
          'url'       : '',
          'watchers'  : 'Linea Traversa Centrale sottosedile sx/dx (Linea unica). / LH/RH Central Underseat Crossmember Line',
          'forks'     : '',
        },
        {
          'name'      : 'TSB',
          'url'       : '',
          'watchers'  : 'Linea Traversa Ammortizzatore. / Shock Absorber Crossmember Line.',
          'forks'     : '',
        },
        {
          'name'      : 'SFS',
          'url'       : '',
          'watchers'  : 'Linea Staffa Fissaggio Sedile. / Fixing Stirrup Seat Line',
          'forks'     : '',
        },
        {
          'name'      : 'TWA',
          'url'       : '',
          'watchers'  : 'Linea Torsion Wall (Linea manuale). / Torsion Wall Line (Manual line).',
          'forks'     : '',
        },
         {
          'name'      : 'EFA',
          'url'       : '',
          'watchers'  : 'Linea Torsion Wall (Linea manuale). / Torsion Wall Line (Manual line).',
          'forks'     : '',
        },
        {
          'name'      : 'CRA',
          'url'       : '',
          'watchers'  : 'Linea Cruscotto completo automatica (Linea unica o prima linea). / Complete Automatic Dashboard Line',
          'forks'     : '',
        },
        {
	      'name'      : 'CRB',
          'url'       : '',
          'watchers'  : 'Linea Cruscotto completo automatica (Seconda linea). / Complete Automatic Dashboard Line',
          'forks'     : '',
        },
         {
	      'name'      : 'CRM',
          'url'       : '',
          'watchers'  : 'Linea Cruscotto completo (Linea manuale). / Complete Dashboard Line',
          'forks'     : '',
        },
          {
	      'name'      : 'CRS',
          'url'       : '',
          'watchers'  : 'Linea Cruscotto Superiore automatica. / Upper Dashboard Automatic Line',
          'forks'     : '',
        },
         {
	      'name'      : 'CRI',
          'url'       : '',
          'watchers'  : 'Linea Cruscotto Inferiore automatica. / Lower Dashboard Automatic Line',
          'forks'     : '',
        },
         {
	      'name'      : 'OSA',
          'url'       : '',
          'watchers'  : 'Linea Ossatura Anteriore completa automatica (Linea unica o prima linea) .Complete Automatic Front Frame Line',
          'forks'     : '',
        },
         {
	      'name'      : 'OSB',
          'url'       : '',
          'watchers'  : 'Linea Ossatura Anteriore completa automatica (Seconda linea). / Complete Automatic Front Frame Line',
          'forks'     : '',
        },
         {
	      'name'      : 'OPS',
          'url'       : '',
          'watchers'  : 'Linea preparazione Ossatura fiancata Posteriore sx. / LH Preparation Rear Side Panel Frame Line',
          'forks'     : '',
        },
        {
	      'name'      : 'OPD',
          'url'       : '',
          'watchers'  : 'Linea preparazione Ossatura fiancata Posteriore dx. / RH Preparation Rear Side Panel Frame Line',
          'forks'     : '',
        },
        {
	      'name'      : 'OPZ',
          'url'       : '',
          'watchers'  : 'Linea preparazione Ossatura fiancata Posteriore sx/dx (Linea unica). / LH/RH Preparation Rear Side Panel Frame Line',
          'forks'     : '',
        },
        {
	      'name'      : 'OFS',
          'url'       : '',
          'watchers'  : 'Linea Ossatura Fiancata Sx / LH Side Panel Frame Line.',
          'forks'     : '',
        },
         {
	      'name'      : 'OFD',
          'url'       : '',
          'watchers'  : 'Linea Ossatura Fiancata Dx / RH Side Panel Frame Line',
          'forks'     : '',
        },
         {
	      'name'      : 'OFZ',
          'url'       : '',
          'watchers'  : 'Linea Ossatura Fiancata sx/dx (Linea unica). / LH/RH Side Panel Frame Line',
          'forks'     : '',
        },
         {
	      'name'      : 'OFM',
          'url'       : '',
          'watchers'  : 'Linea Ossatura Fiancata Sx / LH Side Panel Frame Line.',
          'forks'     : '',
        },
        {
	      'name'      : 'PAS',
          'url'       : '',
          'watchers'  : 'Linea Puntone Anteriore Sx. / LH Front Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PAD',
          'url'       : '',
          'watchers'  : 'Linea Puntone Anteriore Dx. / RH Front Strut Line',
          'forks'     : '',
        },
         {
	      'name'      : 'PAZ',
          'url'       : '',
          'watchers'  : 'Linea Puntone Anteriore sx/dx (Linea unica). / LH/RH Front Strut Line',
          'forks'     : '',
        },

        {
	      'name'      : 'PAD',
          'url'       : '',
          'watchers'  : 'Linea Puntone anteriore Interno Sx. / LH Internal Front Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PID',
          'url'       : '',
          'watchers'  : 'Linea Puntone anteriore Interno Dx. / RH Internal Front Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PIZ',
          'url'       : '',
          'watchers'  : 'Linea Puntone anteriore Interno sx/dx (Linea unica). / LH/RH Internal Front Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'SPA',
          'url'       : '',
          'watchers'  : 'Linea Scatolamento Puntone anteriore sx. / LH Housing Front Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'SPB',
          'url'       : '',
          'watchers'  : 'Linea Scatolamento Puntone anteriore dx. / RH Housing Front Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'SPC',
          'url'       : '',
          'watchers'  : 'Linea Scatolamento Puntone anteriore sx/dx (Linea unica). / LH/RH Housing Front Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PUS',
          'url'       : '',
          'watchers'  : 'Linea Puntone Superiore sx. / LH Upper Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PUD',
          'url'       : '',
          'watchers'  : 'Linea Puntone Superiore dx. / RH Upper Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PUZ',
          'url'       : '',
          'watchers'  : 'Linea Puntone Superiore sx/dx (Linea unica). / LH/RH Upper Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'SPS',
          'url'       : '',
          'watchers'  : 'Linea Scatolamento Puntone superiore sx. / LH Housing Upper Strut Line',
          'forks'     : '',
        },
        {
	      'name'      : 'SPD',
          'url'       : '',
          'watchers'  : 'Linea Scatolamento Puntone superiore dx. / RH Housing Upper Strut Line',
          'forks'     : '',
        },
         {
	      'name'      : 'PAN',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Anteriore automatica. / Automatic Front Floor Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PAM',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Anteriore (Linea manuale). / Front Floor Line (Manual line).',
          'forks'     : '',
        },
		{
	      'name'      : 'PAT',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Anteriore + Tunnel automatica. / Automatic Front Floor + Tunnel Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PPA',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Posteriore automatica (Linea unica o prima linea). / Automatic Rear Floor Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PPB',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Posteriore automatica (Seconda linea). / Automatic Rear Floor Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PPE',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Posteriore (Linea manuale). / Rear Floor Line (Manual line).',
          'forks'     : '',
        },
         {
	      'name'      : 'PPF',
          'url'       : '',
          'watchers'  : 'Linea sottogruppi Pavimento Posteriore. / Subassy Line Rear Floor.',
          'forks'     : '',
        },
        {
	      'name'      : 'PPH',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Posteriore – parte anteriore. / Rear Floor – Front part Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PPI',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Posteriore (parte anteriore) e scatolamento traversa sottosedile posteriore. / Rear Floor (front part) and Rear Underseat Crossmember Housing Line',
          'forks'     : '',
        },
         {
	      'name'      : 'PPJ',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Posteriore – parte posteriore (Linea unica o prima linea). / Rear Floor – Rear part Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PPK',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Posteriore – parte posteriore (Seconda linea). / Rear Floor – Rear part Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PCA',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Centrale automatica (Linea unica o prima linea)./ Automatic Centre Floor Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PCB',
          'url'       : '',
          'watchers'  : 'Linea Pavimento Centrale automatica (Linea unica o prima linea)./ Automatic Centre Floor Line',
          'forks'     : '',
        },
        {
	      'name'      : 'SPJ',
          'url'       : '',
          'watchers'  : 'Linea preparazione SemiPavimento sx/dx (Linea unica). / LH/RH Semifloor preparation Line',
          'forks'     : '',
        },
         {
	      'name'      : 'TUN',
          'url'       : '',
          'watchers'  : 'Linea TUNnel su pavimento centrale. / Tunnel Line on front floor.',
          'forks'     : '',
        },
        {
	      'name'      : 'TUM',
          'url'       : '',
          'watchers'  : 'Linea TUNnel su pavimento centrale (Linea manuale). / Tunnel Line on front floor (Manual line)',
          'forks'     : '',
        },
        {
	      'name'      : 'TUP',
          'url'       : '',
          'watchers'  : ' Linea preparazione Tunnel su pavimento centrale. / Tunnel preparation Line on front floor',
          'forks'     : '',
        },
         {
	      'name'      : 'TEA',
          'url'       : '',
          'watchers'  : 'Linea Telaio Anteriore. / Automatic Front Chassis',
          'forks'     : '',
        },
         {
	      'name'      : 'TEP',
          'url'       : '',
          'watchers'  : 'Linea Telaio Posteriore. / Automatic Rear Chassis',
          'forks'     : '',
        },
        {
	      'name'      : 'FEA',
          'url'       : '',
          'watchers'  : 'Linea piastre Front End (Linea unica o prima linea). / Front End Plate Line',
          'forks'     : '',
        },
        {
	      'name'      : 'FEB',
          'url'       : '',
          'watchers'  : 'Linea piastre Front End (Seconda linea). Front End Plate Line',
          'forks'     : '',
        },
        {
	      'name'      : 'TPF',
          'url'       : '',
          'watchers'  : 'Linea Taglio Puntoni anteriori sx/dx e saldatura piastre Front End. LH/RH Front Strut cutting and Front End Plate welding Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PLS',
          'url'       : '',
          'watchers'  : 'Linea Porte anteriori Lunghe Sx o linea Porte Laterali anteriori Sx. LH Long FrontDoor Line or LH Front Side Door Line',
          'forks'     : '',
        },
         {
	      'name'      : 'PLD',
          'url'       : '',
          'watchers'  : 'Linea Porte anteriori Lunghe Sx o linea Porte Laterali anteriori Sx. LH Long FrontDoor Line or LH Front Side Door Line',
          'forks'     : '',
        },
          {
	      'name'      : 'PLZ',
          'url'       : '',
          'watchers'  : 'Linea Porte anteriori Lunghe sx/dx (Linea unica) o linea Porte Laterali anteriori sx/dx (Linea unica). LH/RH Long Front Door Line (Only one line) or LH/RH Front Side Door Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PLC',
          'url'       : '',
          'watchers'  : 'Linea Porte anteriori Lunghe sx/dx (Linea unica) o linea Porte Laterali anteriori sx/dx (Linea unica). LH/RH Long Front Door Line (Only one line) or LH/RH Front Side Door Line',
          'forks'     : '',
        },
        {
	      'name'      : 'SPL',
          'url'       : '',
          'watchers'  : 'Linea preparazione Sottogruppi Porte Laterali anteriori sx/dx (Linea unica). Subassy preparation Line Laterals Front Doors LH/RH',
          'forks'     : '',
        },
        {
	      'name'      : 'SPP',
          'url'       : '',
          'watchers'  : 'Linea preparazione Sottogruppi Porte laterali Posteriori sx/dx (Linea unica).Subassy preparation Line Laterals Rear Doors LH/RH',
          'forks'     : '',
        },
        {
	      'name'      : 'SPO',
          'url'       : '',
          'watchers'  : 'Linea preparazione Sottogruppi Porte laterali anteriori/posteriori sx/dx (Linea unica). Subassy preparation Line Laterals Front/Rear Doors LH/RH',
          'forks'     : '',
        },
         {
	      'name'      : 'PSZ',
          'url'       : '',
          'watchers'  : 'Linea Porte Laterali anteriori/posteriori Sx. / LH Front/Rear Side Door Line',
          'forks'     : '',
        },
         {
	      'name'      : 'PDZ',
          'url'       : '',
          'watchers'  : 'Linea Porte Laterali anteriori/posteriori Dx. / RH Front/Rear Side Door Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PLX',
          'url'       : '',
          'watchers'  : 'Linea Porte Laterali anteriori/posteriori Sx/Dx (Linea unica). LH/RH Front/Rear Side Door Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PCS',
          'url'       : '',
          'watchers'  : 'Linea Porte anteriori Corte Sx. / LH Short Front Door Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PCD',
          'url'       : '',
          'watchers'  : 'Linea Porte anteriori Corte Dx. / RH Short Front Door Line.',
          'forks'     : '',
        },
        {
	      'name'      : 'PCZ',
          'url'       : '',
          'watchers'  : 'Linea Porte anteriori Corte sx/dx (Linea unica). / LH/RH Short Front Door Line',
          'forks'     : '',
        },
        {
	      'name'      : 'PPS',
          'url'       : '',
          'watchers'  : 'Linea Completazione Porte Laterali posteriori sx/dx (Linea unica). LH/RH Rear Door Completion Line',
          'forks'     : '',
        },
         {
	      'name'      : 'PPD',
          'url'       : '',
          'watchers'  : 'Linea Porte Posteriori Dx. / RH Rear Door Line',
          'forks'     : '',
        },
         {
	      'name'      : 'PPZ',
          'url'       : '',
          'watchers'  : 'Linea Porte Posteriori sx/dx (Linea unica). / LH/RH Rear Door Line (Only one line)',
          'forks'     : '',
        },
         {
	         'name'      : 'PPC',
           'url'       : '',
           'watchers'  : 'Linea Completazione Porte Laterali posteriori sx/dx (Linea unica). LH/RH Rear Door Completion Line (Only one line)',
           'forks'     : '',
        },
        {
           'name'      : 'PBP',
           'url'       : '',
           'watchers'  : 'Linea Porte Posteriori Battenti Automatica (Linea unica - per Pick up). Automatic Back Doors Knocker Line ',
           'forks'     : '',
        },
        {
           'name'      : 'APS',
           'url'       : '',
           'watchers'  : 'Linea Porte Posteriori Battenti Automatica (Linea unica - per Pick up). Automatic Back Doors Knocker Line ',
           'forks'     : '',
        },
        {
           'name'      : 'APD',
           'url'       : '',
           'watchers'  : 'Linea Anello vano Porta Dx. / RH Door Housing Seal Line',
           'forks'     : '',
        },
        {
           'name'      : 'APZ',
           'url'       : '',
           'watchers'  : 'Linea Anello vano Porta sx/dx (Linea unica). / LH/RH Door Housing Seal Line',
           'forks'     : '',
        },
        {
           'name'      : 'PAA',
           'url'       : '',
           'watchers'  : 'Linea Padiglione (Linea unica o prima linea). / Roof Panel Line (Only one line or 1st line).',
           'forks'     : '',
        },

        {
           'name'      : 'PAB',
           'url'       : '',
           'watchers'  : 'Linea Padiglione (Seconda linea). / Roof Panel Line (2nd line)',
           'forks'     : '',
        },


        {
           'name'      : 'SPG',
           'url'       : '',
           'watchers'  : 'Linea Saldatura staffe su Padiglione. / Welding Stirrups on roof panel Line.',
           'forks'     : '',
        },


        {
           'name'      : 'TPP',
           'url'       : '',
           'watchers'  : 'Linea Traversa Posteriore Padiglione. / Rear Roof Crossmember Line',
           'forks'     : '',
        },
        


        {
           'name'      : 'AUA',
           'url'       : '',
           'watchers'  : 'Linea Autotelaio (imbastitura + completazione) (Linea unica o prima linea). Chassis Line (tack welding + completion)',
           'forks'     : '',
        },
        {
           'name'      : 'AUB',
           'url'       : '',
           'watchers'  : 'Linea Autotelaio (imbastitura + completazione) (Seconda linea). / Chassis Line (tack welding + completion) ',
           'forks'     : '',
        },
        {
           'name'      : 'AUC',
           'url'       : '',
           'watchers'  : 'Linea Autotelaio (solo imbastitura) (Linea unica o prima linea). / Chassis Line (only tack welding)',
           'forks'     : '',
        },
        {
           'name'      : 'AUE',
           'url'       : '',
           'watchers'  : 'Linea Autotelaio (solo imbastitura) (Seconda linea). / Chassis Line (only tack welding) (2nd line).',
           'forks'     : '',
        },
        {
           'name'      : 'AUF',
           'url'       : '',
           'watchers'  : 'Linea Autotelaio (solo completazione) (Seconda linea). / Chassis Line (only completion) (2nd line)',
           'forks'     : '',
        },
        {
           'name'      : 'FIS',
           'url'       : '',
           'watchers'  : 'Linea Fianchetto Interno anteriore Sx. / Front Inner Side Panel LH',
           'forks'     : '',
        },

        {
           'name'      : 'FID',
           'url'       : '',
           'watchers'  : 'Linea Fianchetto Interno anteriore Dx. / Front Inner Side Panel RH',
           'forks'     : '',
        },

         {
           'name'      : 'FIZ',
           'url'       : '',
           'watchers'  : 'Linea Fianchetto Interno anteriore sx / dx (Linea unica). / Front Inner Side Panel LH / RH',
           'forks'     : '',
        },
        {
           'name'      : 'VPA',
           'url'       : '',
           'watchers'  : 'Linea Vasca Presa aria. / Air Intake Tank Line',
           'forks'     : '',
        },
        {
           'name'      : 'SFZ',
           'url'       : '',
           'watchers'  : 'Linea preparazione sottogruppi fiancata esterna sx / dx (Linea unica). / External Body Side Subassy Preparation Line LH / RH ',
           'forks'     : '',
        },
         {
           'name'      : 'FSA',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Sx tipo unico o misto 3P/5P (Linea unica o prima linea). / 3P/5P Single or Mixed LH Side Panel Line ',
           'forks'     : '',
        },
         {
           'name'      : 'FSB',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Sx tipo unico o misto 3P/5P (Seconda linea). / 3P/5P Single or Mixed LH Side Panel Line ',
           'forks'     : '',
        },
         {
           'name'      : 'FSC',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Sx 3P (Linea unica o prima linea). / 3P LH Side Panel Line (Only one line or 1st line',
           'forks'     : '',
        },
         {
           'name'      : 'FSD',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Sx 3P (Seconda linea). / 3P LH Side Panel Line ',
           'forks'     : '',
        },
         {
           'name'      : 'FSE',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Sx 5P (Linea unica o prima linea). / 3P LH Side Panel Line ',
           'forks'     : '',
        },
        {
           'name'      : 'FSF',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Sx 5P (Seconda linea). / 5P LH Side Panel Line ',
           'forks'     : '',
        },
         {
           'name'      : 'FSG',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Sx furgonate. / Van LH Side Panel Line',
           'forks'     : '',
        },
         {
           'name'      : 'FSH',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Sx cabinate. / Cab LH Side Panel Line.',
           'forks'     : '',
        },
         {
           'name'      : 'FDA',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Dx tipo unico o misto 3P/5P (Linea unica o prima linea). / 3P/5P Single or Mixed RH Side Panel Line ',
           'forks'     : '',
        },
        {
           'name'      : 'FDB',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Dx tipo unico o misto 3P/5P (Seconda linea). / 3P/5P Single or Mixed RH Side Panel Line  ',
           'forks'     : '',
        },
         {
           'name'      : 'FDC',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Dx 3P (Linea unica o prima linea). / 3P RH Side Panel Line ',
           'forks'     : '',
        },
        {
           'name'      : 'FDD',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Dx 3P (Seconda linea). / 3P RH Side Panel Line',
           'forks'     : '',
        },
        {
           'name'      : 'FDE',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Dx 5P (Linea unica o prima linea). / 5P RH Side Panel Line ',
           'forks'     : '',
        },
         {
           'name'      : 'FDF',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Dx 5P (Linea unica o prima linea). / 5P RH Side Panel Line ',
           'forks'     : '',
        },
         {
           'name'      : 'FDG',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Dx 5P (Seconda linea). / 5P RH Side Panel Line ',
           'forks'     : '',
        },
        {
           'name'      : 'FDH',
           'url'       : '',
           'watchers'  : 'Linea Fiancata Dx cabinate. / Cab RH Side Panel Line',
           'forks'     : '',
        },
        {
           'name'      : 'FZE',
           'url'       : '',
           'watchers'  : 'Linea Fiancata sx/dx (Linea unica). / LH/RH Side Panel ',
           'forks'     : '',
        },
        {
           'name'      : 'FZZ',
           'url'       : '',
           'watchers'  : 'Linea Fiancata sx/dx + Ossatura fianco sx/dx (Linea unica). / LH/RH Side Panel + LH/RH Side Frame Line',
           'forks'     : '',
        },
         {
           'name'      : 'FPZ',
           'url'       : '',
           'watchers'  : 'Linea Preparazione Fiancata sx/dx (Linea unica). / LH/RH Preparation Side Panel Line ',
           'forks'     : '',
        },
        {
           'name'      : 'FPS',
           'url'       : '',
           'watchers'  : 'Linea Preparazione Fiancata Sx. / LH Preparation Side Panel Line ',
           'forks'     : '',
        },
        {
           'name'      : 'FPD',
           'url'       : '',
           'watchers'  : 'Linea Preparazione Fiancata Dx. / RH Preparation Side Panel Line.',
           'forks'     : '',
        },
           {
           'name'      : 'FVC',
           'url'       : '',
           'watchers'  : 'Linea Fianco Vasca Capote sx/dx (Linea unica manuale). / LH/RH Top Basin SideLine .',
           'forks'     : '',
        },
            {
           'name'      : 'COC',
           'url'       : '',
           'watchers'  : 'Linea Tonneau Cover (copri-capote). / Soft Top (hood cover) Line.',
           'forks'     : '',
        },
            {
           'name'      : 'COF',
           'url'       : '',
           'watchers'  : 'Linea Cofano. / Bonnet Line.',
           'forks'     : '',
        },
          {
           'name'      : 'COM',
           'url'       : '',
           'watchers'  : 'Linea Cofano (Linea manuale). / Bonnet Line',
           'forks'     : '',
        },
          {
           'name'      : 'PSC',
           'url'       : '',
           'watchers'  : 'Linea Preparazione Sottogruppi Cofano. / Hood Subassy Preparation Line',
           'forks'     : '',
        },
         {
           'name'      : 'COP',
           'url'       : '',
           'watchers'  : 'Linea Cofano + Porta parete posteriore. / Bonnet + Rear Door Support Line',
           'forks'     : '',
        },
        {
           'name'      : 'COB',
           'url'       : '',
           'watchers'  : 'Linea Cofano + Baule posteriore. / Bonnet + Rear Boot Line',
           'forks'     : '',
        },
         {
           'name'      : 'BAU',
           'url'       : '',
           'watchers'  : 'Linea Baule posteriore. / Decklid Line',
           'forks'     : '',
        },
         {
           'name'      : 'DPA',
           'url'       : '',
           'watchers'  : 'Linea Dorsale Posteriore (traversa posteriore). / Rear Dorsal Line (rear crossmember)',
           'forks'     : '',
        },
         {
           'name'      : 'STP',
           'url'       : '',
           'watchers'  : 'Linea Scatolamento Traversa Posteriore. / Rear Crossmember Housing Line',
           'forks'     : '',
        },
         {
           'name'      : 'RIV',
           'url'       : '',
           'watchers'  : 'Linea Rivestimento posteriore. / Rear Trim Line',
           'forks'     : '',
        },
          {
           'name'      : 'RMA',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo Montante sx/dx (Linea unica manuale). / LH/RH Strut Pillar Reinforcement Line',
           'forks'     : '',
        },
          {
           'name'      : 'RAS',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo montante Anteriore sx. / LH Front Strut Pillar Reinforcement Line.',
           'forks'     : '',
        },
         {
           'name'      : 'RAD',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo montante Anteriore dx. / RH Front Strut Pillar Reinforcement Line.',
           'forks'     : '',
        },
          {
           'name'      : 'RAZ',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo montante Anteriore sx/dx (Linea unica). / LH/RH Front Strut Pillar Reinforcement Line.',
           'forks'     : '',
        },
         {
           'name'      : 'RMS',
           'url'       : '',
           'watchers'  : 'Linea preparazione Rinforzo Montante centrale sx. / Central Reinforce Pillar Preparation Line LH.',
           'forks'     : '',
        },
        {
           'name'      : 'RMD',
           'url'       : '',
           'watchers'  : 'Linea preparazione Rinforzo Montante centrale dx. / Central Reinforce Pillar Preparation Line RH',
           'forks'     : '',
        },
        {
           'name'      : 'RMZ',
           'url'       : '',
           'watchers'  : 'Linea preparazione Rinforzo Montante centrale sx/dx (Linea unica). / Central Reinforce Pillar Preparation Line LH / RH',
           'forks'     : '',
        },
        {
           'name'      : 'RCS',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo montante Centrale sx. / LH Central Strut Pillar Reinforcement Line',
           'forks'     : '',
        },
        {
           'name'      : 'RCD',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo montante Centrale dx. / RH Central Strut Pillar Reinforcement Line',
           'forks'     : '',
        },
         {
           'name'      : 'RCZ',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo montante Centrale dx. / RH Central Strut Pillar Reinforcement Line',
           'forks'     : '',
        },
        {
           'name'      : 'RTA',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo Angolare traversa isofix sx/dx (Linea unica manuale). LH/RH Isofix Crossmember Angle Bar Reinforcement Line',
           'forks'     : '',
        },
        {
           'name'      : 'RPA',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo Passaruota Anteriore sx/dx (Linea unica manuale). LH/RH Front Wheel Arch Reinforcement Line ',
           'forks'     : '',
        },
        {
           'name'      : 'RPP',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo Passaruota Posteriore sx/dx (Linea unica manuale). / LH/RH Rear Wheel Arch Reinforcement Line',
           'forks'     : '',
        },
        {
           'name'      : 'REL',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo Esterno Longherone sx/dx (Linea unica manuale) ./ LH/RH External Side Member Reinforcement Line ',
           'forks'     : '',
        },
        {
           'name'      : 'RLS',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo centrale Longherone sx. / Central Sidemember Reinforce Line LH',
           'forks'     : '',
        },
        {
           'name'      : 'RLD',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo centrale Longherone dx. / Central Sidemember Reinforce Line RH.',
           'forks'     : '',
        },
        {
           'name'      : 'RLZ',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo centrale Longherone sx/dx (Linea unica). LH/RH Central Sidemember Reinforce Line',
           'forks'     : '',
        },
        {
           'name'      : 'RPS',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo Puntone posteriore sx. / LH Reinforce Rear Strut Line',
           'forks'     : '',
        },
        {
           'name'      : 'RPD',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo Puntone posteriore dx. / RH Reinforce Rear Strut Line.',
           'forks'     : '',
        },
        {
           'name'      : 'RPZ',
           'url'       : '',
           'watchers'  : 'Linea Rinforzo Puntone posteriore sx/dx (Linea unica). / LH/RH Reinforce Rear Strut Line .',
           'forks'     : '',
        },
        {
           'name'      : 'OPM',
           'url'       : '',
           'watchers'  : 'Linea Ossatura Passaruota posteriore sx/dx (Linea manuale).LH/RH Rear Frame Wheel arch Line (',
           'forks'     : '',
        },
        {
           'name'      : 'PPS',
           'url'       : '',
           'watchers'  : 'Linea Passaruota posteriore sx. / LH Rear Wheel arch',
           'forks'     : '',
        },
        {
           'name'      : 'PSD',
           'url'       : '',
           'watchers'  : 'Linea Passaruota posteriore dx. / RH Rear Wheel arch',
           'forks'     : '',
        },
        {
           'name'      : 'PSB',
           'url'       : '',
           'watchers'  : 'Linea Passaruota posteriore sx/dx (Linea unica). / LH/RH Rear Wheel arch (Only one line)',
           'forks'     : '',
        },
        {
           'name'      : 'SPZ',
           'url'       : '',
           'watchers'  : 'Linea preparazione sottogruppi passaruota posteriore sx/dx (Linea unica). / LH/RH Subassy preparation Rear Wheel arch Line',
           'forks'     : '',
        },
        {
           'name'      : 'SPM',
           'url'       : '',
           'watchers'  : ' Linea preparazione sottogruppi passaruota posteriore sx/dx (Linea manuale). LH/RH Subassy preparation Rear Wheel arch Line ',
           'forks'     : '',
        },
         {
           'name'      : 'PPP',
           'url'       : '',
           'watchers'  : ' Linea Porta Parete Posteriore (Portellone). / Tailgate Line (Hatchback).',
           'forks'     : '',
        },
         {
           'name'      : 'PPM',
           'url'       : '',
           'watchers'  : 'Linea Porta Parete Posteriore (Portellone) (Linea manuale). / Tailgate Line (Hatchback) ',
           'forks'     : '',
        },
         {
           'name'      : 'PPG',
           'url'       : '',
           'watchers'  : ' Linea saldobrasatura Porta Parete Posteriore (Portellone). / Brazing Tailgate Line (Hatchback)',
           'forks'     : '',
        },
        {
           'name'      : 'PSP',
           'url'       : '',
           'watchers'  : 'Linea Preparazione Sottogruppi Porta Parete Posteriore (Portellone). Rear Side Door Subassy Preparation Line (Hatchback).',
           'forks'     : '',
        },
        {
           'name'      : 'PLF',
           'url'       : '',
           'watchers'  : 'Linea Porte Laterali scorrevoli sx/dx (per furgonati) (Linea unica). LH/RH Sliding Side Doors Line (for vans).',
           'forks'     : '',
        },
        {
           'name'      : 'PLG',
           'url'       : '',
           'watchers'  : 'Linea Porta Laterale sx scorrevole (per furgonati). / LH Sliding Side Door Line (for vans).',
           'forks'     : '',
        },
        {
           'name'      : 'PLH',
           'url'       : '',
           'watchers'  : 'Linea Porta Laterale sx scorrevole (per furgonati). / LH Sliding Side Door Line (for vans).',
           'forks'     : '',
        },
        {
           'name'      : 'PRS',
           'url'       : '',
           'watchers'  : 'Linea Parafango anteriore Sx. / LH front Wing Line.',
           'forks'     : '',
        },
        {
           'name'      : 'PRD',
           'url'       : '',
           'watchers'  : 'Linea Parafango anteriore Dx. / RH front Wing Line',
           'forks'     : '',
        },
         {
           'name'      : 'PRZ',
           'url'       : '',
           'watchers'  : 'Linea Parafango anteriore sx/dx (Linea unica). / LH/RH front Wing Line (Only one line)',
           'forks'     : '',
        },
        {
           'name'      : 'PDX',
           'url'       : '',
           'watchers'  : 'Linea parete Posteriore Divisoria Fissa (Linea unica - per Pick up). Automatic Back side fixed Division Line',
           'forks'     : '',
        },
        {
           'name'      : 'PDM',
           'url'       : '',
           'watchers'  : 'Linea parete Posteriore Divisoria Mobile (Linea unica - per Pick up). / Automatic Back side Mobile Division Line',
           'forks'     : '',
        },
        {
           'name'      : 'PCR',
           'url'       : '',
           'watchers'  : 'Linea Parete Cruscotto. / Dash panel wall Line',
           'forks'     : '',
        },
        {
           'name'      : 'PVC',
           'url'       : '',
           'watchers'  : 'Linea Parete Posteriore Vasca Capote (Linea manuale). / Top Basin Rear Wall Line',
           'forks'     : '',
        },
        {
           'name'      : 'PVR',
           'url'       : '',
           'watchers'  : 'Linea Parabrezza e Vasca Ruota di Scorta (Linea manuale). / Windscreen and Spare Wheel Housing Line',
           'forks'     : '',
        },
         {
           'name'      : 'MAS',
           'url'       : '',
           'watchers'  : 'Linea Montante Anteriore sx. / LH Front Pillar Line.',
           'forks'     : '',
        },
          {
           'name'      : 'MAD',
           'url'       : '',
           'watchers'  : 'Linea Montante Anteriore sx. / LH Front Pillar Line.',
           'forks'     : '',
        },
        {
           'name'      : 'MAZ',
           'url'       : '',
           'watchers'  : 'Linea Montante Anteriore sx/dx (Linea unica). / LH/RH Front Pillar Line (Only one manual line',
           'forks'     : '',
        },
        {
           'name'      : 'MPC',
           'url'       : '',
           'watchers'  : 'Linea Montante Posteriore completo sx/dx (Linea unica manuale).LH/RH Complete Rear Pillar Line',
           'forks'     : '',
        },
        {
           'name'      : 'MFA',
           'url'       : '',
           'watchers'  : 'Linea Scatolato Montante Fianco Anteriore sx/dx (Linea unica manuale). LH/RH Front Side Pillar Box Line',
           'forks'     : '',
        },
        {
           'name'      : 'MCZ',
           'url'       : '',
           'watchers'  : 'Linea (Scatolamento) Montante centrale sx/dx (Linea unica). / LH/RH (Housing) Central Pillar Line ',
           'forks'     : '',
        },
        {
           'name'      : 'SSP',
           'url'       : '',
           'watchers'  : 'Linea Scatolamento traversa Sottosedile posteriore. / Rear Underseat Crossmember Housing Line',
           'forks'     : '',
        },
         {
          'name'      : 'EPZ',
           'url'       : '',
           'watchers'  : 'Linea Esterno laterale superiore Posteriore sx/dx (Linea unica). / LH/RH Rear Upper External Side Line',
           'forks'     : '',
        },
         {
          'name'      : 'LSP',
           'url'       : '',
           'watchers'  : 'Linea Seduta Posteriore. / Rear Seat Line.',
           'forks'     : '',
        },
        {
          'name'      : 'VRS',
           'url'       : '',
           'watchers'  : 'Linea Vasca Ruota di Scorta (Linea manuale). / Spare Wheel Housing Line ',
           'forks'     : '',
        },
        {
           'name'      : 'SGA',
           'url'       : '',
           'watchers'  : 'Linea Semiguscio Anteriore sx/dx (Linea unica manuale). / LH/RH Front Half Casing Line (',
           'forks'     : '',
        },
        {
           'name'      : 'GSA',
           'url'       : '',
           'watchers'  : 'Linea Graffatura Scocca (Linea unica o prima linea). / Body Seaming Line (Only one line or 1st line)',
           'forks'     : '',
        },
        {
           'name'      : 'GSB',
           'url'       : '',
           'watchers'  : 'Linea Graffatura Scocca (Seconda linea). / Body Seaming Line ',
           'forks'     : '',
        },
        {
           'name'      : 'SCA',
           'url'       : '',
           'watchers'  : 'Linea Scocca (imbastitura + completazione) (Linea unica o prima linea). / Body Line (tack welding + completion) ',
           'forks'     : '',
        },
        {
           'name'      : 'SCB',
           'url'       : '',
           'watchers'  : 'Linea Scocca (imbastitura + completazione) (Linea unica o prima linea). / Body Line (tack welding + completion) ',
           'forks'     : '',
        },
        {
           'name'      : 'SCC',
           'url'       : '',
           'watchers'  : 'Linea Scocca (solo imbastitura) (Linea unica o prima linea). / Body Line (only tack welding)',
           'forks'     : '',
        },
        {
           'name'      : 'SCD',
           'url'       : '',
           'watchers'  : 'Linea Scocca (solo imbastitura) (Seconda linea). / Body Line (only tack welding) ',
           'forks'     : '',
        },
        {
           'name'      : 'SCE',
           'url'       : '',
           'watchers'  : 'Linea Scocca (solo imbastitura) (Seconda linea). / Body Line (only tack welding)',
           'forks'     : '',
        },
        {
           'name'      : 'SCE',
           'url'       : '',
           'watchers'  : 'Linea Scocca (solo completazione) (Seconda linea). / Body Line (only completion) ',
           'forks'     : '',
        },
        {
           'name'      : 'SCP',
           'url'       : '',
           'watchers'  : 'Linea Scocca (completazione + padiglione) (Linea unica o prima linea). / Body Line (completion + roof) ',
           'forks'     : '',
        },
        {
           'name'      : 'SCQ',
           'url'       : '',
           'watchers'  : 'Linea Scocca (completazione + padiglione) (Seconda linea). / Body Line (completion + roof)',
           'forks'     : '',
        },
        {
           'name'      : 'SCQ',
           'url'       : '',
           'watchers'  : 'Linea Scocca (imbastitura + completazione + padiglione + altre lavorazioni). Body Line (tack welding + completion + roof + other work)',
           'forks'     : '',
        },
         {
           'name'      : 'SCO',
           'url'       : '',
           'watchers'  : 'Linea Scocca (imbastitura + completazione + padiglione + altre lavorazioni).  Body Line (tack welding + completion + roof + other work).',
           'forks'     : '',
        },
        {
           'name'      : 'CMP',
           'url'       : '',
           'watchers'  : 'Linea Controllo e Misura Pallet. / Control and Measurement Pallet Line',
           'forks'     : '',
        },
        {
           'name'      : 'AHA',
           'url'       : '',
           'watchers'  : 'Linea ferratura scocca (ferratura automatica) (Linea unica o prima linea). / Hanging line on body (Automatic Hanging)',
           'forks'     : '',
        },
        {
           'name'      : 'AHB',
           'url'       : '',
           'watchers'  : 'Linea ferratura scocca (ferratura automatica) (Seconda linea). / Hanging line on body (Automatic Hanging)',
           'forks'     : '',
        },
        {
           'name'      : 'AHD',
           'url'       : '',
           'watchers'  : 'Linea montaggio porte laterali anteriori / posteriori (ferratura automatica). Front/rear Doors assembly line (Automatic Hanging).',
           'forks'     : '',
        },
        {
           'name'      : 'AHF',
           'url'       : '',
           'watchers'  : 'Linea finizione parti mobili (ferratura automatica). / Mobile Finishing parts line (Automatic Hanging)',
           'forks'     : '',
        },
        {
           'name'      : 'MHA',
           'url'       : '',
           'watchers'  : 'Linea ferratura scocca (ferratura manuale) (Linea unica o prima linea). Hanging line on body (Manual hanging) ',
           'forks'     : '',
        },
        {
           'name'      : 'MHB',
           'url'       : '',
           'watchers'  : 'Linea ferratura scocca (ferratura manuale) (Seconda linea). / Hanging line on body (Manual hanging) ',
           'forks'     : '',
        },
        {
           'name'      : 'TRC',
           'url'       : '',
           'watchers'  : 'Centro di addestramento (TRaining Center). / TRaining Center.',
           'forks'     : '',
        },


    ];
      return repos.map( function (repo) {
        repo.value = repo.name.toLowerCase();
        return repo;
      });
    }
    /**
     * Create filter function for a query string
     */
    function createFilterFor(query) {
      var lowercaseQuery = angular.lowercase(query);
      return function filterFn(item) {
        return (item.value.indexOf(lowercaseQuery) === 0);
      };
    }
  };


app.controller("OlciHeadCtrl", function($scope,$http,$rootScope){
	
	var baseUrl = 'services/';	
	getHead();


	function getHead()
	{
		$http.post(baseUrl+'get_data_head_master.php').success(function(data){
			console.log(data);
      $scope.data = data;
		});
	}



	$scope.saveInfo = function(info)
	{
			/* console.log($rootScope.acronimo);
       console.log($rootScope.acronimo2);
  */


		$http.post('php/saveolcihead.php',{"id": info.id, "nome_disegno_tabella" : info.nome_disegno_tabella, 
				"progetto": info.progetto,"rev_tabella": info.rev_tabella, "creato": info.creato, "linea": info.linea,"controllato" : info.controllato,
				"ultima_modifica":info.ultima_modifica, "numero_disegno_linea": info.numero_disegno_linea, "compilatore":info.compilatore,"acronimo_linea":$rootScope.acronimo,"acronimo_linea2":$rootScope.acronimo2,
				"plant": info.plant, "modello": info.modello,"livello": info.livello })
			.success(function(data)
			{
				 console.log(data);
          location.reload(); 
			})
    
	}





});







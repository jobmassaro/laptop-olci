<?php
class Datasheet {
    
#List
    
public static function showlist() {
    
    	global $dbh;
$query = "SELECT id, name from sheet ORDER BY id DESC";
$stmt = $dbh->prepare("$query");
$stmt->execute();
$result = $stmt->fetchAll();
return $result;
    
    }
    
# Open  
  
    public static function open($id) {
    
  $d = ORM::for_table('sheet')->find_one($id);
  return $d;
    
    }
	
	  public static function open_public($id, $token) {
    
  $d = ORM::for_table('sheet')->find_one($id);
  if ($token == $d['token']) {
  return $d;
    
    }
	else {
		r2(APP_URL.'/error','e','You do not have permission to view this page');
	}
	  }
    
# Assets  
  
    public static function assets($id='') {
 $assets = array ();

 $assets['xheader'] = '<link rel="stylesheet" media="screen" href="'.APP_URL.'/apps/bundles/datasheet/jquery.handsontable.css">
 <link rel="stylesheet" media="screen" href="'.APP_URL.'/apps/bundles/datasheet/jquery.handsontable.bootstrap.css">
 <link rel="stylesheet" media="screen" href="'.APP_URL.'/apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.contextMenu.css">
 ';   
 $assets['xfooter'] = '
 <script src="'.APP_URL.'/apps/bundles/datasheet/dist/jquery.handsontable.full.js" type="text/javascript"></script>
  <script src="'.APP_URL.'/apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.contextMenu.js" type="text/javascript"></script>
   <script src="'.APP_URL.'/apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.ui.position.js" type="text/javascript"></script>
   <script>
            var $container = $("#data");
            var $console = $("#dataconsole");
            var $parent = $container.parent();
            var autosaveNotification;
            $container.handsontable({
             
              rowHeaders: true,
              colHeaders: true,
			  manualColumnResize: true,
			  columnSorting: true,
              minSpareRows: 1,
              contextMenu: true,
              onChange: function (change, source) {
                if (source === \'loadData\') {
                  return; //don\'t save this change
                }
                if ($parent.find(\'input[name=autosave]\').is(\':checked\')) {
					$("#dataconsole").html("<img  src=\''.APP_URL.'/ui/theme/bmsapp/images/spinner-linear.gif\'/>").hide().fadeIn("slow");	
                  clearTimeout(autosaveNotification);
                  $.ajax({
					  
                    url: "'.APP_URL.'/datasheet/save/'.$id.'",
                    
                    type: "POST",
                    data: {"data": handsontable.getData()}, //contains changed cells\' data
                    complete: function (data) {
                      $console.text(\'Autosaved (\' + change.length + \' cell\' + (change.length > 1 ? \'s\' : \'\') + \')\');
                      autosaveNotification = setTimeout(function () {
                        $console.text(\'Changes will be autosaved\');
                      }, 1000);
                    }
                  });
                }
              }
            });
            var handsontable = $container.data(\'handsontable\');
$(document).ready(function() {
$("#dataconsole").html("<img  src=\''.APP_URL.'/ui/theme/bmsapp/images/spinner-linear.gif\'/>").hide().fadeIn("slow");	
 $.ajax({
                url: "'.APP_URL.'/datasheet/load/'.$id.'",
                dataType: \'json\',
                type: \'GET\',
                success: function (res) {
                  handsontable.loadData(res.data);
                  $console.text(\'Data loaded\');
                }
              });
            });
           

            $parent.find(\'button[name=save]\').click(function () {
				$("#dataconsole").html("<img  src=\''.APP_URL.'/ui/theme/bmsapp/images/spinner-linear.gif\'/>").hide().fadeIn("slow");	
              $.ajax({
               url: "'.APP_URL.'/datasheet/save/'.$id.'",
                data: {"data": handsontable.getData()}, //returns all cells\' data
                
                type: \'POST\',
                success: function (res) {
                  if (res.result === \'ok\') {
                    $console.text(\'Data Saved\');
                  }
                  else {
                    $console.text(\'Data Saved\');
					
                  }
                },
                error: function () {
                  $console.text(\'Save error.\');
                }
              });
            });

            $parent.find(\'input[name=autosave]\').click(function () {
              if ($(this).is(\':checked\')) {
                $console.text(\'Changes will be autosaved\');
              }
              else {
                $console.text(\'Changes will not be autosaved\');
              }
            });
			$(\'#data table\').addClass(\'table table-bordered table-striped table-hover\');
          </script>
 ';     
  return $assets;
    
    }
    
    # load data
    
    public static function load($id) {
header('Content-type: application/json; charset=utf-8');
$d = ORM::for_table('sheet')->find_one($id);
$data = $d['data'];
echo $data;
    
    }
# save data
    
    public static function save($id) {
$data = $_POST['data'];
$data = json_encode($data);
$data = str_replace('null','',$data);
$data = '{
  "data": '.$data.'}';
header('Content-type: application/json; charset=utf-8');
$d = ORM::for_table('sheet')->find_one($id);
$d->data = $data;
$d->save();
echo '
{
  "result": "ok"
}
';
    
    }
# create new
 public static function create() {
    
  $self = APP_URL.'/datasheet';
$title = _post('title');
if ($title!=''){
	$act = _post('act');
	if ($act=='add'){
$d = ORM::for_table('sheet')->create();	
$d->name = $title;
$d->token = _raid(16);
$d->access = 'Private';
$d->data = '{
  "data": [["","","","","",""]]}';
$d->save();
$id = $d->id();
$self = $self."/open/$id";
r2($self,'s','New Data Sheet Added Successfully');	
	}
	elseif ($act=='edit'){
		$sid = _post('sid');
		$access = _post('access');
		$d = ORM::for_table('sheet')->find_one($sid);
        $d->access = $access;
		$d->name = $title;
		$d->save();
		$self = $self."/edit/$sid";
		r2($self,'s','Edited Successfully');	
	}
	else {
		r2($self,'e','No Action defined');
	}
}

else {
 r2($self,'e','Title is Required');   
}
    
    }

public static function set_public($id) {
      $self = APP_URL."/datasheet/open/$id";
	$d = ORM::for_table('sheet')->find_one($id); 
		$d->access = 'Public';
		$d->save();
		r2($self,'s','Set Access Permission to Public'); 

}

public static function set_private($id) {
      $self = APP_URL."/datasheet/open/$id";
	$d = ORM::for_table('sheet')->find_one($id); 
		$d->access = 'Private';
		$d->save();
		r2($self,'s','Set Access Permission to Private'); 

}
    
# Delete
public static function delete($id) {
      $self = APP_URL.'/datasheet';
	$d = ORM::for_table('sheet')->find_one($id); 
		$d->delete();
		r2($self,'s','Data Sheet Deleted Successfully'); 

}
        
    ##########################
    
}
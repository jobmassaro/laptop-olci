// JavaScript Document
//http://codecanyon.net/user/bdinfosys
var $container = $("#data");
var $dataurl = $('#dataurl').val(); 
var $appurl = $('#appurl').val();   
            var $console = $("#dataconsole");
            var $parent = $container.parent();
            var autosaveNotification;
            $container.handsontable({
              startRows: 8,
              startCols: 6,
              rowHeaders: true,
              colHeaders: true,
              minSpareRows: 1,
              contextMenu: false
            });
            var handsontable = $container.data('handsontable');
$(document).ready(function() {
$("#dataconsole").html("<img  src='"+$appurl+"/ui/theme/bmsapp/images/spinner-linear.gif'/>").hide().fadeIn("slow");	
 $.ajax({
                url: $dataurl,
                dataType: 'json',
                type: 'GET',
                success: function (res) {
                  handsontable.loadData(res.data);
                  $console.text('Data loaded');
                }
              });
            });

			$('#data table').addClass('table table-bordered table-striped table-hover');
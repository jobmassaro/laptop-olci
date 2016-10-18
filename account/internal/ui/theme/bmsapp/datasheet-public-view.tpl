<!DOCTYPE html>
<html>
<head>
    <title>Datasheet</title>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <!--[if lt IE 9]>
    <script src='http://html5shim.googlecode.com/svn/trunk/html5.js' type='text/javascript'></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/ie8.css" media="screen" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/bootstrap.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/bootstrap-responsive.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/font-awesome.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/bootstrap-datatable.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/style.css" media="all" rel="stylesheet" type="text/css"/>
{if isset($xheader)}
{$xheader}
{/if}
</head>
<body>
<section id='content'>
<div class='container-fluid'>
<div class='row-fluid'>
<div class='span12'>
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-file'></i>
                <span>{$data.name}</span>
            </h1>
            <div class='clearfix'></div>
        </div>
    </div>
</div>
<div class="row-fluid">
<div class="span12">

          <pre id="dataconsole" class="console" style="background:#FFF">Click "Load" to load data from server</pre>
          <div id="data"></div>

          
        

</div>
</div>
</div>
</div>
</div>
</section>
<input name="dataurl" id="dataurl" type="hidden" value="{$app_url}/datasheet/public/{$data.id}/{$data.token}">
<input name="appurl" id="appurl" type="hidden" value="{$app_url}">
<script src="{$app_url}/ui/theme/bmsapp/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="{$app_url}/ui/theme/bmsapp/assets/js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="{$app_url}/ui/theme/bmsapp/assets/js/bootstrap.js" type="text/javascript"></script>
<script src="{$app_url}/ui/theme/bmsapp/assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{$app_url}/ui/theme/bmsapp/assets/js/modernizr.min.js" type="text/javascript"></script>
<script src="{$app_url}/ui/theme/bmsapp/assets/js/retina.js" type="text/javascript"></script>
<script src="{$app_url}/ui/theme/bmsapp/assets/js/application.js" type="text/javascript"></script>
 <script src="{$app_url}/apps/bundles/datasheet/dist/jquery.handsontable.full.js" type="text/javascript"></script>
 <script src="{$app_url}/apps/bundles/datasheet/public.js" type="text/javascript"></script> 
</body>
<!-- body end -->
</html>

</body>
</html>
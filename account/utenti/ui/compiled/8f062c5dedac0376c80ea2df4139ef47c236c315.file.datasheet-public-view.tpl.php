<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 20:48:37
         compiled from "ui\theme\bmsapp\datasheet-public-view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1150517586056a66b0-67022311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f062c5dedac0376c80ea2df4139ef47c236c315' => 
    array (
      0 => 'ui\\theme\\bmsapp\\datasheet-public-view.tpl',
      1 => 1366651132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1150517586056a66b0-67022311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_url' => 0,
    'xheader' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51758605718479_29542529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51758605718479_29542529')) {function content_51758605718479_29542529($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title>Datasheet</title>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <!--[if lt IE 9]>
    <script src='http://html5shim.googlecode.com/svn/trunk/html5.js' type='text/javascript'></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/css/ie8.css" media="screen" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/css/bootstrap.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/css/bootstrap-responsive.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/css/font-awesome.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/css/bootstrap-datatable.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/css/style.css" media="all" rel="stylesheet" type="text/css"/>
<?php if (isset($_smarty_tpl->tpl_vars['xheader']->value)){?>
<?php echo $_smarty_tpl->tpl_vars['xheader']->value;?>

<?php }?>
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
                <span><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</span>
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
<input name="dataurl" id="dataurl" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/public/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['token'];?>
">
<input name="appurl" id="appurl" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
">
<script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/js/modernizr.min.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/js/retina.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/assets/js/application.js" type="text/javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/apps/bundles/datasheet/dist/jquery.handsontable.full.js" type="text/javascript"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/apps/bundles/datasheet/public.js" type="text/javascript"></script> 
</body>
<!-- body end -->
</html>

</body>
</html><?php }} ?>
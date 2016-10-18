<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 22:15:26
         compiled from "ui\theme\bmsapp\sections\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4524517571278e5e39-85134412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b88ba6c35dd3e3a3ab89932de5ef1a17a7ebcff3' => 
    array (
      0 => 'ui\\theme\\bmsapp\\sections\\header.tpl',
      1 => 1366661720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4524517571278e5e39-85134412',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51757127917031_48840944',
  'variables' => 
  array (
    'app_url' => 0,
    'xheader' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51757127917031_48840944')) {function content_51757127917031_48840944($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title>Data Grid</title>
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
<header>
    <div class='navbar navbar-fixed-top'>
        <div class='navbar-inner'>
            <div class='container-fluid'>
                <a class='brand' href='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet'>
                    
                    <span class='hidden-phone'>DataSheets</span>
                </a>
                <ul class='nav pull-right'>
                    <li class='dropdown user'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            
                            <span>My Account</span>
                            <b class='caret'></b>
                        </a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/password'>Change Password</a>
                            </li>
                             <li>
                                <a href='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/docs'>Documentation</a>
                            </li>
                         
                            <li class='divider'></li>
                            <li>
                                <a href='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/logout'>Logout</a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
               
            </div>
        </div>
    </div>
</header>
<section id='content'>
<div class='container-fluid'>
<div class='row-fluid'>
<div class='span12'><?php }} ?>
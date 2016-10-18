<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 21:56:26
         compiled from "ui\theme\bmsapp\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:829517576247f7379-29744408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5d4e999a7030f284032f8e4a7347c734741ad78' => 
    array (
      0 => 'ui\\theme\\bmsapp\\index.tpl',
      1 => 1366660381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '829517576247f7379-29744408',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_517576248639d3_96895269',
  'variables' => 
  array (
    'app_url' => 0,
    '_L' => 0,
    'notify' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517576248639d3_96895269')) {function content_517576248639d3_96895269($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data Grid Login</title>
     <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/bmsapp/css/logincss.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div class="container">

    <div class="wrapper">

        <div>
<div class="logo"><img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/apps/uploads/logo/logo.png" alt="logo" /></div>





          <div>

                <form class="login" method="post" action="login">
                    <fieldset>
                    
                        <div class="row">
                            <input type="text" class="login" id="username" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['placeholder_username'];?>
" />
                       
                        </div>
                        <div class="row">
                            <input type="password" class="password" id="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['placeholder_password'];?>
"/>
                            
                        </div>
                        <div class="row">
                         <button class="btn btn-primary" name="login" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['button_login'];?>
</button>
  
                        </div>

                    </fieldset>
                </form>
            <div style="clear: both; color:#F00"><?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

<?php }?></div>

            </div>

        </div>

    </div>
</div>
</body>
</html>
<?php }} ?>
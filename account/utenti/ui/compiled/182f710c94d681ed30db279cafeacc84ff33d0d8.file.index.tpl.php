<?php /* Smarty version Smarty-3.1.13, created on 2016-07-22 04:36:41
         compiled from "ui/theme/bmsapp/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2605761015791db19d7f154-47629695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '182f710c94d681ed30db279cafeacc84ff33d0d8' => 
    array (
      0 => 'ui/theme/bmsapp/index.tpl',
      1 => 1366676096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2605761015791db19d7f154-47629695',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_url' => 0,
    '_L' => 0,
    'notify' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5791db19d8e097_22063833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5791db19d8e097_22063833')) {function content_5791db19d8e097_22063833($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data Sheets Login</title>
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
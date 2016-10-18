<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 20:37:16
         compiled from "ui\theme\bmsapp\datasheet-delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83895175835cd18680-19994558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a025fddb12cb049101760c6f1fa1be0f6d24061' => 
    array (
      0 => 'ui\\theme\\bmsapp\\datasheet-delete.tpl',
      1 => 1366532221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83895175835cd18680-19994558',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_url' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5175835cd5f908_28090319',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5175835cd5f908_28090319')) {function content_5175835cd5f908_28090319($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('sections/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row-fluid">
      <div class="span6">
      <h4>Are you sure, You want to Delete this Data Sheet ?</h4>
      <form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/delete/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" method="post">
 
   
 <input name="title" type="text" class="input-medium" disabled placeholder="Title..." value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
<input name="act" type="hidden" value="edit">
<input name="sid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
  <button type="submit" class="btn btn-danger"><i class="icon-ok icon-white"></i> Confirm</button>
   <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet" class="btn btn-warning"><i class="icon-th-list icon-white"></i> Cancel</a>
  </form>
     
    </div>
   
  </div>
<?php echo $_smarty_tpl->getSubTemplate ('sections/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
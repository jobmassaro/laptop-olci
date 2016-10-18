<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 20:49:51
         compiled from "ui\theme\bmsapp\datasheet-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25374517582c3388084-40157798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfafdd2443a10e2389983778c11eb7596c795b78' => 
    array (
      0 => 'ui\\theme\\bmsapp\\datasheet-edit.tpl',
      1 => 1366656586,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25374517582c3388084-40157798',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_517582c346a893_63783855',
  'variables' => 
  array (
    'notify' => 0,
    'app_url' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517582c346a893_63783855')) {function content_517582c346a893_63783855($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('sections/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

<?php }?>
<div class="row-fluid">
      <div class="span12">
      
  <form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/create" method="post">
  <fieldset>
    <legend><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</legend>
    <label>Sheet Name</label>
    <input name="title" type="text" class="input-medium" placeholder="Title..." value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
    <label>Access Permission</label>
    <label class="radio">
  <input type="radio" name="access" id="optionsRadios1" value="Private" <?php if ($_smarty_tpl->tpl_vars['data']->value['access']=='Private'){?> checked <?php }?> >
  Private
</label>
<label class="radio">
  <input type="radio" name="access" id="optionsRadios2" value="Public" <?php if ($_smarty_tpl->tpl_vars['data']->value['access']=='Public'){?> checked <?php }?> >
  Public
</label>
<?php if ($_smarty_tpl->tpl_vars['data']->value['access']=='Public'){?> 
<span class="help-block">Public Share URL: <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/view/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['token'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/view/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['token'];?>
</a></span>
<?php }?>
  </fieldset>
  <div class="form-actions">
  <input name="act" type="hidden" value="edit">
<input name="sid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
   <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
   <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet" class="btn btn-warning"><i class="icon-th-list icon-white"></i> Cancel</a>
   <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/open/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="btn btn-info"><i class="icon-th-list icon-white"></i> Open</a>
</div>
</form>   
    </div>
   
  </div>
<?php echo $_smarty_tpl->getSubTemplate ('sections/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
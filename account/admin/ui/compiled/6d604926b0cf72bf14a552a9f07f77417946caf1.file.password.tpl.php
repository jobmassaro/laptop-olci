<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 20:20:23
         compiled from "ui\theme\bmsapp\password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156255175787f6fadd8-20370548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d604926b0cf72bf14a552a9f07f77417946caf1' => 
    array (
      0 => 'ui\\theme\\bmsapp\\password.tpl',
      1 => 1366654818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156255175787f6fadd8-20370548',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5175787f73fd62_81384279',
  'variables' => 
  array (
    'notify' => 0,
    'app_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5175787f73fd62_81384279')) {function content_5175787f73fd62_81384279($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('sections/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

<?php }?>
<div class='row-fluid'>
    <div class='span12'>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/password">
  <fieldset>
    <legend>Change Password</legend>
    <label>Current Password</label>
    <input name="oldpass" type="password" id="oldpass">
   <label>New Password</label>
    <input name="newpass" type="password" id="newpass">
    <label>Confirm New Password</label>
    <input name="newpassc" type="password" id="newpassc">
    <div class="form-actions">
  <button type="submit" class="btn btn-primary">Save</button>
  <button type="reset" class="btn">Cancel</button>
</div>
  </fieldset>
</form>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('sections/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
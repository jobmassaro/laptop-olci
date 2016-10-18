<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 19:40:16
         compiled from "ui\theme\bmsapp\datasheet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7365517574f5cc1b50-88784925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40f1e3723a03f51fb96b88b5402b04f5a3725555' => 
    array (
      0 => 'ui\\theme\\bmsapp\\datasheet.tpl',
      1 => 1366652413,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7365517574f5cc1b50-88784925',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_517574f5d35a70_39260967',
  'variables' => 
  array (
    'notify' => 0,
    'app_url' => 0,
    'rows' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517574f5d35a70_39260967')) {function content_517574f5d35a70_39260967($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('sections/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

<?php }?>
<div class="row-fluid">
      <div class="span12">
     <p>&nbsp;</p>
      <form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/create" method="post">
 
   
 <input type="text" name="title" class="input-medium" placeholder="Title...">
<input name="act" type="hidden" value="add">
  <button type="submit" class="btn btn-primary"><i class="icon-plus icon-white"></i> Add New</button>
  </form>
     
    </div>
   
  </div>

<div class='row-fluid'>
<div class='span12 box bordered-box'>
<div class='box-header'>
    <div class='lead'>
        List Data Grid
    </div>
</div>
<div class='thumbnail'>
<div class='inner-spacer'>
<div class='responsive-table'>
<div class='scrollable-area'>
<table class='data-table table table-bordered table-striped'>
<thead>
<tr>
    <th>S/L</th>
    <th>ID</th>
    <th width="70%">Title</th>
    <th></th>
</tr>
</thead>
<tbody>
                            <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']++;
?>
<tr>
<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['i']['index']+1;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
</td>
                               
                                <td>
                                    <div class='text-right'>
                                        <a class='btn btn-success btn-mini' href='datasheet/open/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
'>
                                            <i class='icon-ok'></i>
                                        </a>
                                        <a class='btn btn-warning btn-mini' href='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/edit/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
'>
                                            <i class='icon-edit'></i>
                                        </a>
                                        <a class='btn btn-danger btn-mini' href='<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/delete/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
'>
                                            <i class='icon-remove'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
 
<?php } ?>
                            
                            
                            
                            
                            
                            </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('sections/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
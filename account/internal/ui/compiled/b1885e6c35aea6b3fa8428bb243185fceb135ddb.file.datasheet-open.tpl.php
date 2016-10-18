<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 21:04:10
         compiled from "ui\theme\bmsapp\datasheet-open.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8635175712781faf0-69179142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1885e6c35aea6b3fa8428bb243185fceb135ddb' => 
    array (
      0 => 'ui\\theme\\bmsapp\\datasheet-open.tpl',
      1 => 1366657444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8635175712781faf0-69179142',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_517571278799b0_28846296',
  'variables' => 
  array (
    'notify' => 0,
    'data' => 0,
    'app_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_517571278799b0_28846296')) {function content_517571278799b0_28846296($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('sections/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
<?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

<?php }?>
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
          <p>
            
            <button name="save" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save Data</button> 
            <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/edit/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="btn btn-warning"><i class="icon-edit icon-white"></i> Edit Properties</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/delete/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="btn btn-danger"><i class="icon-trash icon-white"></i> Delete</a>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['access']=='Private'){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/public/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="btn btn-warning"><i class="icon-share icon-white"></i> Set Public</a>
            <?php }else{ ?>
             <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/private/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class="btn btn-warning"><i class="icon-lock icon-white"></i> Set Private</a>
             <?php }?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet" class="btn btn-info"><i class="icon-th-list icon-white"></i> Back To The List</a>
            
          </p>

          <pre id="dataconsole" class="console" style="background:#FFF">Click "Load" to load data from server</pre>
          <?php if ($_smarty_tpl->tpl_vars['data']->value['access']=='Public'){?> <p>Public Share URL: <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/view/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['token'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/datasheet/view/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['token'];?>
</a></p> <?php }?>
<label><input type="checkbox" name="autosave" checked="checked" autocomplete="off"> Autosave</label>
          <div id="data"></div>

          
        

</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('sections/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
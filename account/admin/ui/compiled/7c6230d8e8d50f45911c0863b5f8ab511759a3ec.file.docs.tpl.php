<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 21:30:30
         compiled from "ui\theme\bmsapp\docs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2450551758a0813bf94-79393600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c6230d8e8d50f45911c0863b5f8ab511759a3ec' => 
    array (
      0 => 'ui\\theme\\bmsapp\\docs.tpl',
      1 => 1366659023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2450551758a0813bf94-79393600',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51758a081daf37_20764922',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51758a081daf37_20764922')) {function content_51758a081daf37_20764922($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('sections/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class='row-fluid'>
                    <div class='span12 box'>
                        <div class='thumbnail'>
                          <div class='inner-spacer'>
                                <div class='page-header'>
                                    <h2>
                                        Documentation
                                        
                                    </h2>
                                </div>
                              <div class='row-fluid'>
                                <div class='span12'>
                                  <p>
                                        <strong>System Requirements:</strong><br>

                                  <ul>
                                            <li><em>PHP 5.3+</em></li>
                                            <li><em>PHP Data Objects (PDO) Extension</em></li>
                                            <li><em>PDO_MySQL Driver</em></li>
                                          <li><em>MySQL 5.x or later versions</em></li></ul>
</p>
<hr>
                                  <p>
                                        <strong>Installing Datasheet:</strong><br>

                                           You will find a file named AppConfig.php on root directory.<br>
Here is the sample contents in this file-
</p>
<pre>
# Database Host
$db_host 		= "localhost"; 
# Database Username
$db_user 		= "root"; 
# Database Password
$db_password 	= ""; 
# Database Name
$db_name 		= "datagrid"; 
# Application URL without Trailing Slash
define('APP_URL', 'http://localhost/datagrid'); 
# Encryption SALT, Do not Edit
define('SALT', 'flmcs'); 
</pre>
<p>                                           
              <br>
                                            Create a database on your web hosting. Import the sql file located on DOCUMENTATION folder. Edit the AppConfig.php using any text editor. Put the newly created database info and application url without last trailing slash (e.g.- http://www.example.com Or http://www.example.com/datasheet). <br>
If everything is okay, You should be able to login using-<br>
 Username: admin <br>
Password: 123456<br>
Change your Password after login.<br>
<br>
<strong>Creating a New Data Sheet: </strong><br>
On Datasheet Page, Enter the Title for your Datasheet and Click Add New Data Sheet.
<br>
<br>
<strong>Datasheet Properties: </strong><br>
You can set Datasheet Properties Public or Private.<br />
<em><strong>Public:</strong></em> Public Data grid can access anybody by a system generated URL. When a datasheet is created, a random 16 digit token generated. The token used for Public URL. With this URL Data will show as Read Only and can't be edited.<br />
<em><strong>Private:</strong></em> Private Datagrid can't be accessed without Passsword. Can't be accessed even with Datagrid Token.
<br>
<br>
<strong>Options: </strong><br>
<em><strong>Editing Data:</strong></em> Double click on cell or Tap Double from your Mobile browser to edit the Cell Data. You can drag down to repeat the values from the cell. You can also use right click context menu to add/remove columns and rows.<br />
<em><strong>Deleting Datagrid:</strong></em> Click Delete button to delete Data Grid.<br />
<em><strong>Changing Password:</strong></em> You can change admin Password from My Account -> Change Password
<br>
<br>
<strong>Using as Bmsapp Module: </strong><br>
This is the standalone version. You can also use it as a module for bmsapp. (<a href="http://codecanyon.net/item/all-in-one-business-management-application/4354090" target="_blank">http://codecanyon.net/item/all-in-one-business-management-application/4354090</a>) . If you already have bmsapp, Contact with me, to get help for using as BmsAPP Module.</p>
                                </div>
                              </div>
                               
                                <hr>
                                <p>
                                If you need further help. Add me on skype - <em>razibmiah</em> and talk with me.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
<?php echo $_smarty_tpl->getSubTemplate ('sections/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
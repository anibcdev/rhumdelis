<?php /* Smarty version Smarty-3.1.19, created on 2022-09-14 12:11:46
         compiled from "/home/bcwebdev1/public_html/rhumdelis/adminrhumdelis/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7031875956321a8e23a3621-12984724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d2513fb4082af9e8d243bc98d76b91b8d50d1ec' => 
    array (
      0 => '/home/bcwebdev1/public_html/rhumdelis/adminrhumdelis/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1507036424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7031875956321a8e23a3621-12984724',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_6321a8e23a4c10_93609337',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6321a8e23a4c10_93609337')) {function content_6321a8e23a4c10_93609337($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['href']->value,'html','UTF-8');?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>

</a>
<?php }} ?>

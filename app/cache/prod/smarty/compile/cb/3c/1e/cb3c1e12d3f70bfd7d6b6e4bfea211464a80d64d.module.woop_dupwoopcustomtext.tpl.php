<?php /* Smarty version Smarty-3.1.19, created on 2022-09-14 12:12:49
         compiled from "module:woop_dupwoopcustomtext/views/templates/hook/woop_dupwoopcustomtext.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7926915386321a921573a00-73043384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb3c1e12d3f70bfd7d6b6e4bfea211464a80d64d' => 
    array (
      0 => 'module:woop_dupwoopcustomtext/views/templates/hook/woop_dupwoopcustomtext.tpl',
      1 => 1512148039,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '7926915386321a921573a00-73043384',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_infos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_6321a921574209_92409440',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6321a921574209_92409440')) {function content_6321a921574209_92409440($_smarty_tpl) {?>

<div id="dupwoop-custom-text">
  <?php echo $_smarty_tpl->tpl_vars['cms_infos']->value['text'];?>

</div>
<?php }} ?>

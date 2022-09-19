<?php /* Smarty version Smarty-3.1.19, created on 2022-09-14 12:09:38
         compiled from "module:ptm_duplicatedcustomtext/views/templates/hook/ptm_duplicatedcustomtext.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1182988006321a8626cda63-63768087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbd72b07dbabd7311a1dd6c7ae5ccbc2947d3438' => 
    array (
      0 => 'module:ptm_duplicatedcustomtext/views/templates/hook/ptm_duplicatedcustomtext.tpl',
      1 => 1512139548,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '1182988006321a8626cda63-63768087',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_infos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_6321a8626ce269_79380104',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6321a8626ce269_79380104')) {function content_6321a8626ce269_79380104($_smarty_tpl) {?>

<div id="duplicated-custom-text">
  <?php echo $_smarty_tpl->tpl_vars['cms_infos']->value['text'];?>

</div>
<?php }} ?>

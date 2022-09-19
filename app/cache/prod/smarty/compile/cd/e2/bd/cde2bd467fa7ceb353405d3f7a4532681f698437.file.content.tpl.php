<?php /* Smarty version Smarty-3.1.19, created on 2022-09-14 12:08:34
         compiled from "/home/bcwebdev1/public_html/rhumdelis/adminrhumdelis/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4523581346321a8221ee1d2-53966124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cde2bd467fa7ceb353405d3f7a4532681f698437' => 
    array (
      0 => '/home/bcwebdev1/public_html/rhumdelis/adminrhumdelis/themes/default/template/content.tpl',
      1 => 1507036436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4523581346321a8221ee1d2-53966124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_6321a8221eefd0_16575779',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6321a8221eefd0_16575779')) {function content_6321a8221eefd0_16575779($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }} ?>

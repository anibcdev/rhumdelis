<?php /* Smarty version Smarty-3.1.19, created on 2022-09-14 12:11:49
         compiled from "module:ps_contactinfo/nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19413455006321a8e5c07862-00179471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0eb2119957cbc13b240126b3ccd8fac8f109f1e2' => 
    array (
      0 => 'module:ps_contactinfo/nav.tpl',
      1 => 1627546946,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '19413455006321a8e5c07862-00179471',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_infos' => 0,
    'urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_6321a8e5c09d14_58905269',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6321a8e5c09d14_58905269')) {function content_6321a8e5c09d14_58905269($_smarty_tpl) {?><!-- begin /home/bcwebdev1/public_html/rhumdelis/themes/classic/modules/ps_contactinfo/nav.tpl -->
<div id="_desktop_contact_link">
  <div id="contact-link">
    <?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['phone']) {?>
      
      <?php echo smartyTranslate(array('s'=>'Call us: [1]%phone%[/1]','sprintf'=>array('[1]'=>'<span>','[/1]'=>'</span>','%phone%'=>$_smarty_tpl->tpl_vars['contact_infos']->value['phone']),'d'=>'Shop.Theme.Global'),$_smarty_tpl);?>

    <?php } else { ?>
      <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['contact'], ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Contact us','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
</a>
    <?php }?>
	  <p class="red-text">Livraison en France (hors DOM-TOM) et en Belgique</p>
  </div>
</div>
<!-- end /home/bcwebdev1/public_html/rhumdelis/themes/classic/modules/ps_contactinfo/nav.tpl --><?php }} ?>

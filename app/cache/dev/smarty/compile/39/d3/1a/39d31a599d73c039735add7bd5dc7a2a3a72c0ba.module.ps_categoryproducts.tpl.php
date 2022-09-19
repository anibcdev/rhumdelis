<?php /* Smarty version Smarty-3.1.19, created on 2022-09-14 12:11:56
         compiled from "module:ps_categoryproducts/views/templates/hook/ps_categoryproducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14254637526321a8ece6e347-51030493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39d31a599d73c039735add7bd5dc7a2a3a72c0ba' => 
    array (
      0 => 'module:ps_categoryproducts/views/templates/hook/ps_categoryproducts.tpl',
      1 => 1509964208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '14254637526321a8ece6e347-51030493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_6321a8ece71e70_63777696',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6321a8ece71e70_63777696')) {function content_6321a8ece71e70_63777696($_smarty_tpl) {?><!-- begin /home/bcwebdev1/public_html/rhumdelis/themes/classic/modules/ps_categoryproducts/views/templates/hook/ps_categoryproducts.tpl -->
<section class="featured-products clearfix mt-3">
  <h2>
    <?php if (count($_smarty_tpl->tpl_vars['products']->value)==1) {?>
      <?php echo smartyTranslate(array('s'=>'%s other product in the same category:','sprintf'=>array(count($_smarty_tpl->tpl_vars['products']->value)),'d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

    <?php } else { ?>
      <?php echo smartyTranslate(array('s'=>'%s other products in the same category:','sprintf'=>array(count($_smarty_tpl->tpl_vars['products']->value)),'d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

    <?php }?>
  </h2>
  <div class="products">
      <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
          <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

      <?php } ?>
  </div>
</section>
<!-- end /home/bcwebdev1/public_html/rhumdelis/themes/classic/modules/ps_categoryproducts/views/templates/hook/ps_categoryproducts.tpl --><?php }} ?>

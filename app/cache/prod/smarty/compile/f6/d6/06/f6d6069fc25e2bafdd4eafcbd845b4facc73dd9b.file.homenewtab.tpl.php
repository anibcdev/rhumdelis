<?php /* Smarty version Smarty-3.1.19, created on 2022-09-14 12:09:38
         compiled from "/home/bcwebdev1/public_html/rhumdelis/themes/classic/modules/homenewtab/views/templates/hook/homenewtab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2487974416321a862818a20-22046673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6d6069fc25e2bafdd4eafcbd845b4facc73dd9b' => 
    array (
      0 => '/home/bcwebdev1/public_html/rhumdelis/themes/classic/modules/homenewtab/views/templates/hook/homenewtab.tpl',
      1 => 1569242908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2487974416321a862818a20-22046673',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'allbestProductsLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_6321a86281acf1_89781598',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6321a86281acf1_89781598')) {function content_6321a86281acf1_89781598($_smarty_tpl) {?>

<section class="featured-products tab-pane  fade" aria-expanded="true"  id="homebestsellerstab">
    <div class="products">
        <?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
            <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

            <?php } ?>
        <?php } else { ?>
            <div class="col-md-12">
                <div class="alert alert-warning">
                    <?php echo smartyTranslate(array('s'=>'No new products found','mod'=>'homebestsellers'),$_smarty_tpl);?>

                </div>
            </div>
        <?php }?>
    </div>
    <a class="all-product-link pull-xs-left" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['allbestProductsLink']->value, ENT_QUOTES, 'UTF-8');?>
">Voir la s&eacute;lection<i class="material-icons">&#xE315;</i></a>
</section>
<?php }} ?>

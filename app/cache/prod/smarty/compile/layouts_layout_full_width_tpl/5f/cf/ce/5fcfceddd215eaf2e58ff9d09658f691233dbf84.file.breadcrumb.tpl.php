<?php /* Smarty version Smarty-3.1.19, created on 2022-09-14 12:09:38
         compiled from "/home/bcwebdev1/public_html/rhumdelis/themes/classic/templates/_partials/breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7135500866321a86268cce3-07231723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fcfceddd215eaf2e58ff9d09658f691233dbf84' => 
    array (
      0 => '/home/bcwebdev1/public_html/rhumdelis/themes/classic/templates/_partials/breadcrumb.tpl',
      1 => 1513591627,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7135500866321a86268cce3-07231723',
  'function' => 
  array (
  ),
  'unifunc' => 'content_6321a8626ad934_89184037',
  'variables' => 
  array (
    'page' => 0,
    'breadcrumb' => 0,
    'path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6321a8626ad934_89184037')) {function content_6321a8626ad934_89184037($_smarty_tpl) {?>
	<!-- HACK WOOPLEE-->
	 <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name']!='cms') {?>
<nav data-depth="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['breadcrumb']->value['count'], ENT_QUOTES, 'UTF-8');?>
" class="breadcrumb container hidden-sm-down">
  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
    <?php  $_smarty_tpl->tpl_vars['path'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['path']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['path']->key => $_smarty_tpl->tpl_vars['path']->value) {
$_smarty_tpl->tpl_vars['path']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']++;
?>
      
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
            <span itemprop="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['title'], ENT_QUOTES, 'UTF-8');?>
</span>
          </a>
          <meta itemprop="position" content="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumb']['iteration'], ENT_QUOTES, 'UTF-8');?>
">
        </li>
      
    <?php } ?>
  </ol>
</nav>
<?php }?><?php }} ?>

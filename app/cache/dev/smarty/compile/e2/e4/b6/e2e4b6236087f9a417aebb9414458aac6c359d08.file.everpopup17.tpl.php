<?php /* Smarty version Smarty-3.1.19, created on 2022-09-14 12:11:49
         compiled from "modules/everpopup/views/templates/front/everpopup17.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7981607556321a8e5cc71b9-57488514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e4b6236087f9a417aebb9414458aac6c359d08' => 
    array (
      0 => 'modules/everpopup/views/templates/front/everpopup17.tpl',
      1 => 1516807781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7981607556321a8e5cc71b9-57488514',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ever_baseUrl' => 0,
    'cookie_time' => 0,
    'everpopup' => 0,
    'homepage_logo' => 0,
    'image_path' => 0,
    'link' => 0,
    'image_width' => 0,
    'image_height' => 0,
    'id_shop' => 0,
    'ever_ip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_6321a8e5cd3a29_92091505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6321a8e5cd3a29_92091505')) {function content_6321a8e5cd3a29_92091505($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ever_baseUrl']->value, ENT_QUOTES, 'UTF-8');?>
modules/everpopup/views/css/everpopup.css" type="text/css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" />
<script type="text/javascript" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ever_baseUrl']->value, ENT_QUOTES, 'UTF-8');?>
modules/everpopup/views/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ever_baseUrl']->value, ENT_QUOTES, 'UTF-8');?>
modules/everpopup/views/js/everpopup.js" ></script>
<script type='text/javascript'>
$(document).ready(function(){
/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// CommonJS
		factory(require('jquery'));
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (value !== undefined && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setTime(+t + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {};

		// To prevent the for loop in the first place assign an empty array
		// in case there are no cookies at all. Also prevents odd result when
		// calling $.cookie().
		var cookies = document.cookie ? document.cookie.split('; ') : [];

		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');

			if (key && key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) === undefined) {
			return false;
		}

		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));
// Here starts the real popup using Fancybox
//$('#Everpopup_block_center').hide();
   if ($.cookie('test_status') != '1') {
	    $("#ever_fancy_mark").fancybox({
			'type'	:	'inline',
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	600,
			'speedOut'		:	200,
			'hideOnContentClick'	:	true,
			'overlayShow'	:	false
		}).trigger('click');

	    $.cookie('test_status', '1', { expires: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cookie_time']->value, ENT_QUOTES, 'UTF-8');?>
});
	}
});
</script>
<!-- Module everpopup -->
<a href="#Everpopup_block_center" id="ever_fancy_mark"></a>
<div id="Everpopup_block_center" class="Everpopup_block" style="display:none;"><div id="fenzy">
	<?php if ($_smarty_tpl->tpl_vars['everpopup']->value->ever_home_logo_link) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['everpopup']->value->ever_home_logo_link,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(stripslashes($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['everpopup']->value->ever_title,'html','UTF-8')), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['homepage_logo']->value) {?><img class="img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getMediaLink($_smarty_tpl->tpl_vars['image_path']->value),'html'), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars(stripslashes($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['everpopup']->value->ever_title,'html','UTF-8')), ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['image_width']->value) {?>width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_width']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['image_height']->value) {?>height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_height']->value, ENT_QUOTES, 'UTF-8');?>
" <?php }?>/><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['everpopup']->value->ever_home_logo_link) {?></a><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['everpopup']->value->ever_logo_subheading) {?><p id="everpopup_image_legend"><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['everpopup']->value->ever_logo_subheading), ENT_QUOTES, 'UTF-8');?>
</p><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['everpopup']->value->ever_title) {?><h1><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['everpopup']->value->ever_title), ENT_QUOTES, 'UTF-8');?>
</h1><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['everpopup']->value->ever_subheading) {?><h2><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['everpopup']->value->ever_subheading), ENT_QUOTES, 'UTF-8');?>
</h2><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['everpopup']->value->ever_paragraph) {?><div class="rte"><?php echo $_smarty_tpl->tpl_vars['everpopup']->value->ever_paragraph;?>
</div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['everpopup']->value->show_subscription_form) {?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
			            <hgroup>
			                <h2>
			                    <?php echo smartyTranslate(array('s'=>'Subscribe for newsletter','mod'=>'everpopup'),$_smarty_tpl);?>

			                </h2>
			            </hgroup>
				    	<div class="well">
				            <form id="ever_subscription_form" method="post">
				            	<div class="input-group col-md-12">
				              		<input type="hidden" name="ever_shop" id="ever_shop" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_shop']->value, ENT_QUOTES, 'UTF-8');?>
" />
				              		<input type="hidden" name="ever_ip" id="ever_ip" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ever_ip']->value, ENT_QUOTES, 'UTF-8');?>
" />
				                	<input class="input-lg" name="ever_email" id="ever_email" type="email" placeholder="<?php echo smartyTranslate(array('s'=>'Your email','mod'=>'everpopup'),$_smarty_tpl);?>
" required />
				              		<input type="hidden" name="ever_baseUrl" id="ever_baseUrl" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ever_baseUrl']->value, ENT_QUOTES, 'UTF-8');?>
" />
				               		<button class="btn btn-info btn-lg pull-right" type="submit"><?php echo smartyTranslate(array('s'=>'Submit','mod'=>'everpopup'),$_smarty_tpl);?>
</button>
				              	</div>
				            </form>
				    	</div>
				    </div>
				</div>
			</div>
		</section>
		<div class="col-md-6 col-md-offset-3 alert alert-success" id="everpopup_confirm" style="display:none;">
			<p><?php echo smartyTranslate(array('s'=>'Thank you ! Your e-mail address has been successfuly saved.','mod'=>'everpopup'),$_smarty_tpl);?>
</p>
		</div>
		<div class="col-md-6 col-md-offset-3 alert alert-warning" id="everpopup_exists" style="display:none;">
			<p><?php echo smartyTranslate(array('s'=>'Sorry, this e-mail address already exists in our newsletter mail list.','mod'=>'everpopup'),$_smarty_tpl);?>
</p>
		</div>
	<?php }?>
	</div></div>
<!-- /Module everpopup -->
<?php }} ?>

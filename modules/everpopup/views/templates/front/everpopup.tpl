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

	    $.cookie('test_status', '1', { expires: {$cookie_time}});
	}
});
</script>
<!-- Module everpopup -->
<a href="#Everpopup_block_center" id="ever_fancy_mark"></a>
<div id="Everpopup_block_center" class="Everpopup_block" style="display:none;">
	{if $everpopup->ever_home_logo_link}<a href="{$everpopup->ever_home_logo_link|escape:'html':'UTF-8'}" title="{$everpopup->ever_title|escape:'html':'UTF-8'|stripslashes}">{/if}
	{if $homepage_logo}<img class="img-responsive" src="{$link->getMediaLink($image_path)|escape:'html'}" alt="{$everpopup->ever_title|escape:'html':'UTF-8'|stripslashes}" {if $image_width}width="{$image_width}"{/if} {if $image_height}height="{$image_height}" {/if}/>{/if}
	{if $everpopup->ever_home_logo_link}</a>{/if}
	{if $everpopup->ever_logo_subheading}<p id="everpopup_image_legend">{$everpopup->ever_logo_subheading|stripslashes}</p>{/if}
	{if $everpopup->ever_title}<h1>{$everpopup->ever_title|stripslashes}</h1>{/if}
	{if $everpopup->ever_subheading}<h2>{$everpopup->ever_subheading|stripslashes}</h2>{/if}
	{if $everpopup->ever_paragraph}<div class="rte">{$everpopup->ever_paragraph|stripslashes}</div>{/if}
	{if $everpopup->show_subscription_form}
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
			            <hgroup>
			                <h2>
			                    {l s='Subscribe for newsletter' mod='everpopup'}
			                </h2>
			            </hgroup>
				    	<div class="well">
				            <form id="ever_subscription_form" method="post">
				            	<div class="input-group col-md-12">
				              		<input type="hidden" name="ever_shop" id="ever_shop" value="{$id_shop}" />
				              		<input type="hidden" name="ever_ip" id="ever_ip" value="{$ever_ip}" />
				                	<input class="input-lg" name="ever_email" id="ever_email" type="email" placeholder="{l s='Your email' mod='everpopup'}" required />
				              		<input type="hidden" name="ever_baseUrl" id="ever_baseUrl" value="{$ever_baseUrl}" />
				               		<button class="btn btn-info btn-lg pull-right" type="submit">{l s='Submit' mod='everpopup'}</button>
				              	</div>
				            </form>
				    	</div>
				    </div>
				</div>
			</div>
		</section>
		<div class="col-md-6 col-md-offset-3 alert alert-success" id="everpopup_confirm" style="display:none;">
			<p>{l s='Thank you ! Your e-mail address has been successfuly saved.' mod='everpopup'}</p>
		</div>
		<div class="col-md-6 col-md-offset-3 alert alert-warning" id="everpopup_exists" style="display:none;">
			<p>{l s='Sorry, this e-mail address already exists in our newsletter mail list.' mod='everpopup'}</p>
		</div>
	{/if}
</div>
<!-- /Module everpopup -->

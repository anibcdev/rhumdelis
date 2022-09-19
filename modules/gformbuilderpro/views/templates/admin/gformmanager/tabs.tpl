{*
* Do not edit the file if you want to upgrade the module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
*}
<script type="text/javascript">
// <![CDATA[
    var psversion15 = {$psversion15|intval};
    var gdefault_language = {$gdefault_language|intval};
    var gtitleform = '{l s='Form Title' mod='gformbuilderpro'}';
    var copyToClipboard_success = '{l s='Copy to clipboard successfully' mod='gformbuilderpro'}';
//]]>
</script>
{if isset($shortcode)}
    <div class="bootstrap">
        <div {if isset($psversion15) && $psversion15 == -1} style="display:block;" class="hint" {else} class="alert alert-success" {/if}>
            <p>{l s='SHORTCODES - You can use the short code to add the form to content of cms page or product description : ' mod='gformbuilderpro'}<pre><code {if isset($psversion15) && $psversion15 == 1} class="click_to_copy label-tooltip" data-toggle="tooltip" data-html="true" title="" data-original-title="{l s='Click to copy' mod='gformbuilderpro'}"{/if}>{$shortcode|escape:'html':'UTF-8'}</code></pre></p>
            <p>{l s='SMARTY HOOK. It is prestashop custom hook. You can add the code to any .tpl file if you want to display the form: ' mod='gformbuilderpro'}<pre><code {if isset($psversion15) && $psversion15 == 1}  class="click_to_copy label-tooltip" data-toggle="tooltip" data-html="true" title="" data-original-title="{l s='Click to copy' mod='gformbuilderpro'}"{/if}>{$smartycode|escape:'html':'UTF-8'}</code></pre></p>
            <p>{l s='FORM URL: ' mod='gformbuilderpro'}<a style="color:orangered" href="{$formlink|escape:'html':'UTF-8'}" target="_blank">{$formlink|escape:'html':'UTF-8'}</a></p>
        </div>

    </div>
{/if}

<div class="productTabs gformbuilderpro_admintab">
	<ul class="tab nav nav-tabs">
		<li class="tab-row">
			<a class="tab-page" href="#tabmain"><i class="icon-info"></i>{l s='General Information' mod='gformbuilderpro'}</a>
		</li>
		<li class="tab-row">
			<a class="tab-page" href="#tabtemplate"><i class="icon-wrench"></i>{l s='Form Builder' mod='gformbuilderpro'}</a>
		</li>
		<li class="tab-row">
			<a class="tab-page" href="#tabemail"><i class="icon-random"></i>{l s='Mail' mod='gformbuilderpro'}</a>
		</li>
        <li class="tab-row">
			<a class="tab-page" href="#tabmessage"><i class="icon-wrench"></i>{l s='Messages' mod='gformbuilderpro'}</a>
		</li>
	</ul>
</div>

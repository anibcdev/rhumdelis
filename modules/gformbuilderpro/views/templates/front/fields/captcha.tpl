{*
* Do not edit the file if you want to upgrade the module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
*}

{if $labelpos == 0 || $labelpos == 3}
    <div class="form-group capcha_box">
        {if $labelpos == 0}
    	<label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
        {/if}
    	<div id="{$idatt}" class="g-recaptcha" data-sitekey="{literal}{$sitekey}{/literal}" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
        {if $description!=''}<p class="help-block">{$description}</p>{/if}
     </div>
{else}
    <div class="form-group capcha_box">
        <div class="row">
            {if $labelpos == 1}
            <div class="col-xs-12 col-md-4">
        	   <label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
            </div> 
            {/if}
            <div class="col-xs-12 col-md-8">
                <div id="{$idatt}" class="g-recaptcha" data-sitekey="{literal}{$sitekey}{/literal}" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
    	       {if $description!=''}<p class="help-block">{$description}</p>{/if}
            </div>
            {if $labelpos == 2}
            <div class="col-xs-12 col-md-4">
        	   <label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
            </div> 
            {/if}
        </div>
    </div>
{/if}
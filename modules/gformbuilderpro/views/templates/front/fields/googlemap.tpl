{*
* Do not edit the file if you want to upgrade the module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
*}
{if isset($value) && $value!=''}
{if $labelpos == 0 || $labelpos == 3}
<div class="form-group googlemap_box">
    {if $labelpos == 0}
	<label>{$label}</label>
    {/if}
	<div id='google-maps-{$name}' class="google-maps" data-gmap_key="{literal}{if isset($gmap_key) && $gmap_key !=''}{$gmap_key}{/if}{/literal}" data-name="{$name}" data-label="{$label}" data-description="{$description}" data-value="{$value}"></div>
</div>
{else}
    <div class="form-group fileupload_box">
        <div class="row">
            {if $labelpos == 1}
            <div class="col-xs-12 col-md-4">
        	   <label>{$label}</label>
            </div>  
            {/if}
            <div class="col-xs-12 col-md-8">
                <div id='google-maps-{$name}' class="google-maps" data-gmap_key="{literal}{literal}{if isset($gmap_key) && $gmap_key !=''}{$gmap_key}{/if}{/literal}{/literal}" data-name="{$name}" data-label="{$label}" data-description="{$description}" data-value="{$value}"></div>
    	    </div>
            {if $labelpos == 2}
            <div class="col-xs-12 col-md-4">
        	   <label>{$label}</label>
            </div>  
            {/if}
        </div>
    </div>
{/if}
{/if}

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
    <div class="form-group imagethumb__box">
    	{if $labelpos == 0}
    	<label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
        {/if}
        <div class="checkbox_item_wp">
            {if $extra}
                {foreach $extra as $key=>$_value}
                    <div class="imagethumb__item_wp">
                        <div class="imagethumb__item_content">
                            <label for="imagethumb__{$name}_{$key}">
                                <img src="{literal}{$base_uri}{/literal}modules/gformbuilderpro/views/img/thumbs/{$_value}" alt="{$label}" />
                            </label>
                            <div class="imagethumb_input_wp">
                                {if isset($multi) && $multi}
                                <input id="imagethumb__{$name}_{$key}" type="checkbox" name="{$name}[]" class="{$classatt}" value="{$_value}" />
                                {else}
                                <input id="imagethumb__{$name}_{$key}" type="radio" name="{$name}" value="{$_value}" />
                                {/if}
                            </div>
                        </div>
                    </div>
                {/foreach}
            {/if}
        </div>
        {if $description!=''}<p class="help-block">{$description}</p>{/if}
    </div>
{else}
    <div class="form-group imagethumb__box">
        <div class="row">
            {if $labelpos == 1}
            <div class="col-xs-12 col-md-4">
        	   <label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
            </div> 
            {/if}
            <div class="col-xs-12 col-md-8">
                <div class="checkbox_item_wp">
                    {if $extra}
                        {foreach $extra as $key=>$_value}
                            <div class="imagethumb__item_wp">
                                <div class="imagethumb__item_content">
                                    <label for="imagethumb__{$name}_{$key}">
                                        <img src="{literal}{$base_uri}{/literal}modules/gformbuilderpro/views/img/thumbs/{$_value}" alt="{$label}" />
                                    </label>
                                    <div class="imagethumb_input_wp">
                                        {if isset($multi) && $multi}
                                        <input id="imagethumb__{$name}_{$key}" type="checkbox" name="{$name}[]" class="{$classatt}" value="{$_value}" />
                                        {else}
                                        <input id="imagethumb__{$name}_{$key}" type="radio" name="{$name}" value="{$_value}" />
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    {/if}
                </div>
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
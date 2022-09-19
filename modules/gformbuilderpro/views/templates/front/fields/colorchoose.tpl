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
    <div class="form-group colorchoose_box">
    	{if $labelpos == 0}
    	<label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
        {/if}
        <div class="checkbox_item_wp">
            {if $extra}
                {foreach $extra as $key=>$_value}
                    <div class="colorchoose_item_wp" style="background-color:{$_value};">
                        <div class="colorchoose_item_content">
                            {if isset($multi) && $multi}
                            <input id="colorchoose_{$name}_{$key}" type="checkbox" name="{$name}[]" class="{$classatt}" value="{$_value}" /><label for="colorchoose_{$name}_{$key}">{$_value}</label>
                            {else}
                            <input id="colorchoose_{$name}_{$key}" type="radio" name="{$name}" value="{$_value}" /><label for="colorchoose_{$name}_{$key}">{$_value}</label>
                            {/if}
                        </div>
                    </div>
                {/foreach}
            {/if}
        </div>
        {if $description!=''}<p class="help-block">{$description}</p>{/if}
    </div>
{else}
    <div class="form-group colorchoose_box">
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
                            <div class="colorchoose_item_wp" style="background-color:{$_value};">
                                <div class="colorchoose_item_content">
                                    {if isset($multi) && $multi}
                                    <input id="colorchoose_{$name}_{$key}" type="checkbox" name="{$name}[]" class="{$classatt}" value="{$_value}" /><label for="colorchoose_{$name}_{$key}">{$_value}</label>
                                    {else}
                                    <input id="colorchoose_{$name}_{$key}" type="radio" name="{$name}" value="{$_value}" /><label for="colorchoose_{$name}_{$key}">{$_value}</label>
                                    {/if}
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
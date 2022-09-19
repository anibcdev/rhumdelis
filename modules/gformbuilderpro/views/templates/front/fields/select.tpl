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
    <div class="form-group select_box">
    	{if $labelpos == 0}
    	<label for="{$idatt}" class="{if $required} required_label{/if} toplabel">{$label}</label>
        {/if}
    	<select name="{$name}{if $multi}[]{/if}" id="{$idatt}" class="{$classatt} form-control select_chosen {$type}{if $multi}multiple{/if}" {if $required} required="required" {/if} {if $multi} multiple {/if}>
            {if !$required}<option value=""></option>{/if}
            {if $value}
                {foreach $value as $_value}
                    <option value="{$_value}">{$_value}</option>
                {/foreach}
            {/if}
        </select>
        {if $description!=''}<p class="help-block">{$description}</p>{/if}
     </div>
{else}
    <div class="form-group select_box">
        <div class="row">
            {if $labelpos == 1}
            <div class="col-xs-12 col-md-4">
        	   <label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
            </div>  
            {/if}
            <div class="col-xs-12 col-md-8">
                <select name="{$name}{if $multi}[]{/if}" id="{$idatt}" class="{$classatt} form-control select_chosen {$type}{if $multi}multiple{/if}" {if $required} required="required" {/if} {if $multi} multiple {/if}>
                    {if !$required}<option value=""></option>{/if}
                    {if $value}
                        {foreach $value as $_value}
                            <option value="{$_value}">{$_value}</option>
                        {/foreach}
                    {/if}
                </select>
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
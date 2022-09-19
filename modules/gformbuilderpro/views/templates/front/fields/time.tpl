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
    <div class="form-group time_box">
    	{if $labelpos == 0}
    	<label for="{$idatt}"  class="{if $required} required_label{/if} toplabel">{$label}</label>
        {/if}
        <input type="hidden" name="{$name}" id="{$idatt}" class="time_input {$classatt}" />
    	<select rel="{$name}" class="form-control time_select {$name}_hour" name="{$name}-hour">
            {if $extra}
                {for $i=0 to 12}
                    <option value="{$i}">{$i}</option>
                {/for}
            {else}
                {for $i=0 to 23}
                    <option value="{$i}">{$i}</option>
                {/for}
            {/if}
        </select>
        <select rel="{$name}" class="form-control time_select {$name}_minute" name="{$name}-minute">
            {for $i=0 to 11}
                <option value="{if $i < 2}0{/if}{$i*5}">{if $i < 2}0{/if}{$i*5}</option>
            {/for}
        </select>
        {if $extra}
            <select rel="{$name}" class="form-control time_select {$name}_apm" name="{$name}-apm">
                <option value="{l s='AM' mod='gformbuilderpro'}">{l s='AM' mod='gformbuilderpro'}</option>
                <option value="{l s='PM' mod='gformbuilderpro'}">{l s='PM' mod='gformbuilderpro'}</option>
            </select>
        {/if}
        {if $description!=''}<p class="help-block">{$description}</p>{/if}
     </div>
{else}
    <div class="form-group time_box">
        <div class="row">
            {if $labelpos == 1}
            <div class="col-xs-12 col-md-4">
        	   <label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
            </div>  
            {/if}
            <div class="col-xs-12 col-md-8">
                <input type="hidden" name="{$name}" id="{$idatt}" class="time_input {$classatt}" />
            	<select rel="{$name}" class="form-control time_select {$name}_hour" name="{$name}-hour">
                    {if $extra}
                        {for $i=0 to 12}
                            <option value="{$i}">{$i}</option>
                        {/for}
                    {else}
                        {for $i=0 to 23}
                            <option value="{$i}">{$i}</option>
                        {/for}
                    {/if}
                </select>
                <select rel="{$name}" class="form-control time_select {$name}_minute" name="{$name}-minute">
                    {for $i=0 to 11}
                        <option value="{if $i < 2}0{/if}{$i*5}">{if $i < 2}0{/if}{$i*5}</option>
                    {/for}
                </select>
                {if $extra}
                    <select rel="{$name}" class="form-control time_select {$name}_apm" name="{$name}-apm">
                        <option value="{l s='AM' mod='gformbuilderpro'}">{l s='AM' mod='gformbuilderpro'}</option>
                        <option value="{l s='PM' mod='gformbuilderpro'}">{l s='PM' mod='gformbuilderpro'}</option>
                    </select>
                {/if}
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
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
    <div class="form-group spinner_box">
    	{if $labelpos == 0}
    	<label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
        {/if}
    	<div class="spinner_wp">
            <span data-id="{$idatt}" class="spinner_sub">-</span>
            <input type="text" data-range="{$extra.2}"  data-min="{$extra.0}" data-max="{$extra.1}" value="{$extra.3}" class="form-control spinner_value {$classatt} " id="{$idatt}" placeholder="{$placeholder}"  name="{$name}"  {if $required} required="required" {/if} />
            <span data-id="{$idatt}" class="spinner_plus">+</span>
        </div>
        {if $description!=''}<p class="help-block">{$description}</p>{/if}
     </div>
{else}
    <div class="form-group spinner_box">
        <div class="row">
            {if $labelpos == 1}
            <div class="col-xs-12 col-md-4">
        	   <label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
            </div>  
            {/if} 
            <div class="col-xs-12 col-md-8">
        	   <div class="spinner_wp">
                    <span data-id="{$idatt}" class="spinner_sub">-</span>
                    <input type="text" data-range="{$extra.2}"  data-min="{$extra.0}" data-max="{$extra.1}" value="{$extra.3}" class="form-control spinner_value {$classatt} " id="{$idatt}" placeholder="{$placeholder}"  name="{$name}"  {if $required} required="required" {/if} />
                    <span data-id="{$idatt}" class="spinner_plus">+</span>
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
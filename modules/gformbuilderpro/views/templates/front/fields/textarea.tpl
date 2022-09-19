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
    <div class="form-group input_box">
    	{if $labelpos == 0}
    	<label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
        {/if}
    	<textarea class="form-control {$classatt} " name="{$name}" id="{$idatt}" placeholder="{$placeholder}"  {if $required} required="required" {/if} rows="7"></textarea>
        {if $description!=''}<p class="help-block">{$description}</p>{/if}
    </div>
{else}
    <div class="form-group input_box">
        <div class="row">
            {if $labelpos == 1}
            <div class="col-xs-12 col-md-4">
        	   <label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
            </div>  
            {/if}
            <div class="col-xs-12 col-md-8">
        	   <textarea class="form-control {$classatt} " name="{$name}" id="{$idatt}" placeholder="{$placeholder}"  {if $required} required="required" {/if} rows="7"></textarea>
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
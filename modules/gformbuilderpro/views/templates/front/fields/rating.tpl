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
    <div class="form-group rating_box">
    	{if $labelpos == 0}
    	<label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
        {/if}
    	<div class="rating_box_content">
            <input type="radio" class="grating" id="{$name}star1" name="{$name}" value="1" /><label class="{$name}star1 starlabel" for="{$name}star1" title="{l s='1 Star' mod='gformbuilderpro'}"></label>
            <input type="radio" class="grating" id="{$name}star2" name="{$name}" value="2" /><label class="{$name}star2 starlabel"  for="{$name}star2" title="{l s='2 Star' mod='gformbuilderpro'}"></label>
            <input type="radio" class="grating" id="{$name}star3" name="{$name}" value="3" /><label class="{$name}star3 starlabel"  for="{$name}star3" title="{l s='3 Star' mod='gformbuilderpro'}"></label>
            <input type="radio" class="grating" id="{$name}star4" name="{$name}" value="4" /><label class="{$name}star4 starlabel"  for="{$name}star4" title="{l s='4 Star' mod='gformbuilderpro'}"></label>
            <input type="radio" class="grating" id="{$name}star5" name="{$name}" value="5" /><label class="{$name}star5 starlabel"  for="{$name}star5" title="{l s='5 Star' mod='gformbuilderpro'}"></label>
        </div>
        {if $description!=''}<p class="help-block">{$description}</p>{/if}
     </div>
{else}
    <div class="form-group rating_box">
        <div class="row">
            {if $labelpos == 1}
            <div class="col-xs-12 col-md-4">
        	   <label for="{$idatt}" {if $required} class="required_label"{/if}>{$label}</label>
            </div>  
            {/if} 
            <div class="col-xs-12 col-md-8">
                <div class="rating_box_content">
                    <input type="radio" class="grating" id="{$name}star1" name="{$name}" value="1" /><label class="{$name}star1 starlabel" for="{$name}star1" title="{l s='1 Star' mod='gformbuilderpro'}"></label>
                    <input type="radio" class="grating" id="{$name}star2" name="{$name}" value="2" /><label class="{$name}star2 starlabel"  for="{$name}star2" title="{l s='2 Star' mod='gformbuilderpro'}"></label>
                    <input type="radio" class="grating" id="{$name}star3" name="{$name}" value="3" /><label class="{$name}star3 starlabel"  for="{$name}star3" title="{l s='3 Star' mod='gformbuilderpro'}"></label>
                    <input type="radio" class="grating" id="{$name}star4" name="{$name}" value="4" /><label class="{$name}star4 starlabel"  for="{$name}star4" title="{l s='4 Star' mod='gformbuilderpro'}"></label>
                    <input type="radio" class="grating" id="{$name}star5" name="{$name}" value="5" /><label class="{$name}star5 starlabel"  for="{$name}star5" title="{l s='5 Star' mod='gformbuilderpro'}"></label>
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
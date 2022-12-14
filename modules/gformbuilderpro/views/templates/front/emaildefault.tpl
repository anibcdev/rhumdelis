{*
* Do not edit the file if you want to upgrade the module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
*}

<table style="width:100%;">
    {literal}
    <tr>
		<td colspan="2" align="center" class="logo" style="border-bottom:4px solid #333333;padding:7px 0;">
			<a title="{shop_name}" href="{shop_url}" style="color:#337ff1">
				<img src="{/literal}{$shop_logo}{literal}" alt="{shop_name}" />
			</a>
		</td>
	</tr>
    <tr>
    	<td colspan="2" class="space_footer" style="padding:0!important"></td>
    </tr>
    {/literal}
    {if isset($fieldsData) && $fieldsData}
        {foreach $fieldsData as $field}
            {if $field.type !='html' && $field.type !='captcha' && $field.type !='googlemap'}
                <tr style="background:{cycle values="#fcfcfc,#f0f0f0"};">
                	<td style="width:40%;padding:0!important"><strong>{$field.label}</strong></td>
                    <td style="width:60%;padding:0!important">{literal}{{/literal}{$field.name}{literal}}{/literal}</td>
                </tr>
            {/if}
        {/foreach}
    {elseif isset($datassender)}
    <tr>
        <td colspan="2">
            <h3>{l s='Thank you for your request!' mod='gformbuilderpro'}</h3>
            <p>{l s='We appreciate that you\'ve taken the time to write us. We\'ll get back to you very soon. Please come back and see us often.' mod='gformbuilderpro'}</p>
        </td>
    </tr>
    {/if}
    <tr>
    	<td colspan="2" class="space_footer" style="padding:0!important"></td>
    </tr>
    <tr>
        <td colspan="2" style="border-top:4px solid #333333;text-align:center;">
            <a href="{$shopurl}" title="{$shopname}">{$shopname}</a>
        </td>
    </tr>
</table>
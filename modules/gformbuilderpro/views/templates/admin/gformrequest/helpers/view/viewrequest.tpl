{*
* Do not edit the file if you want to upgrade the module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
*}

<div class="panel">
	<h3><i class="icon-envelope"></i> {l s='Received data' mod='gformbuilderpro'} - <i class="icon-calendar-o"></i> {$date_add|escape:'html':'UTF-8'}{if isset($user_ip) && $user_ip !=''} - <i class="icon-map-marker"></i> {l s='Ip Address: ' mod='gformbuilderpro'}{$user_ip|escape:'html':'UTF-8'}{/if}</h3>
    <div class="panel">
        <h3><i class="icon-envelope"></i>{$subject|escape:'html':'UTF-8'}</h3>
        {$request nofilter}{* $request is html content, no need to escape*}
    </div>
    <hr />
    <div class="form-group">
		<label class="control-label col-lg-2" for="gformbuilderpro_change_status">{l s='Change status'  mod='gformbuilderpro'}</label>
		<div class="col-lg-3">
			<select name="change_status" id="gformbuilderpro_change_status" rel="{$idrequest|intval}">
                {if $statuses_array}
                    {foreach $statuses_array as $key=> $_status}
                        <option {if isset($status) && $status == $key} selected="selected"{/if} value="{$key|intval}">{$_status|escape:'html':'UTF-8'}</option>
                    {/foreach}
                {/if}
			</select>
		</div>
	</div>
    <div style="clear:both;"></div>
    {if isset($attachfiles) && $attachfiles}
        <div class="panel">
            <h3><i class="icon-cloud-download"></i> {l s='Attachments' mod='gformbuilderpro'}</h3>
            {foreach $attachfiles as $file}
                <a href="{$requestdownload|escape:'html':'UTF-8'}{$file.name|escape:'html':'UTF-8'}" class="btn btn-default" title="{l s='Click to download' mod='gformbuilderpro'}">
                    {if $file.isImage}
                        <img class="request_img" src="../upload/{$file.name|escape:'html':'UTF-8'}" alt="" />
                    {/if}
						<i class="icon-cloud-download"></i>{$file.name|escape:'html':'UTF-8'}</a>
            {/foreach}
        </div>
    {/if}
    <div class="panel-footer">
		<a href="{$backurl|escape:'html':'UTF-8'}" class="btn btn-default" title="{l s='Back to list' mod='gformbuilderpro'}"><i class="process-icon-back"></i>{l s='Back to list' mod='gformbuilderpro'}</a>
	</div>
</div>
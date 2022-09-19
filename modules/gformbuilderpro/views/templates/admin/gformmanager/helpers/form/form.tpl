{*
* Do not edit the file if you want to upgrade the module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
*}

{extends file="helpers/form/form.tpl"}
{block name="field"}
	{if $input.type == 'formbuilder'}
        <div class="clear"></div>
        <script type="text/javascript">
            var empty_danger = "{l s=' field is required' mod='gformbuilderpro'}";
        </script>
        <div  class="col-lg-12">
            <div class="row">
                <div  class="col-lg-3">
                    <div id="itemfieldparent">
                        {if isset($fields_value['allfieldstype'])}
                            {foreach $fields_value['allfieldstype'] as $key=>$field}
                                <div data-image="{$field.desc|escape:'html':'UTF-8'}" data-type="{$key|escape:'html':'UTF-8'}" data-newitem="1" class="itemfield col-xs-{$fields_value['group_width_mobile_default']|escape:'html':'UTF-8'} col-sm-{$fields_value['field_width_tablet_default']|escape:'html':'UTF-8'} col-md-{$fields_value['field_width_default']|escape:'html':'UTF-8'}">
                                    <div class="field_content">
                                        <span class="feildlabel">{$field.label|escape:'html':'UTF-8'}</span> <span class="feildname"></span>
                                    </div>
                                    <span class="shortcode"></span>
                                </div>
                            {/foreach}
                        {/if}
                    </div>
                    <input type="hidden" value="{$fields_value['group_width_default']|escape:'html':'UTF-8'}" id="group_width_default" />
                    <input type="hidden" value="{$fields_value['idlang_default']|escape:'html':'UTF-8'}" id="idlang_default" />
                    <input type="hidden" value="{$fields_value['loadjqueryselect2']|escape:'html':'UTF-8'}" id="loadjqueryselect2" />
                </div>
                <div class="col-lg-9">
                    <div id="formbuilder" class="row">
                        {if isset($fields_value['formtemplate'])  && $fields_value['formtemplate'] !=''}
                            {$fields_value['formtemplate'] nofilter}{* $fields_value['formtemplate'] is html content, no need to escape*}
                        {else}
                            <div class="formbuilder_group col-md-{$fields_value['group_width_default']|escape:'html':'UTF-8'} col-sm-12 col-xs-12"><div class="itemfield_wp row"></div>
                                <div class="control_group_wp control_box_wp">
                                </div>
                            </div>
                        {/if}
                    </div>
                    <div class="button_controll_wp">
                        <button type="button" class="btn btn-default btn btn-default pull-center" id="addnewgroup"><i class="process-icon-new"></i>{l s='Add new group' mod='gformbuilderpro'}</button>
                        <button type="button" class="btn btn-default btn btn-default pull-center" id="addnewgroupbreak"><i class="process-icon-new"></i>{l s='Add break' mod='gformbuilderpro'}</button> 
                    </div>
                    <div style="display:none;">
                        <a id="popup_field_config_link" href="#popup_field_config"></a>
                        <input id="ajaxurl" value="{$link->getAdminLink('AdminModules')|escape:'html':'UTF-8'}&configure=gformbuilderpro&getFormTypeConfig=1" />
                        <div id="popup_field_config">
                            <div id="content"  class="bootstrap"></div>
                        </div>
                        <div id="control_box">
                            <div class="control_box_wp">
                                <ul>
                                    <li><a class="formbuilder_move"  title="{l s='Move' mod='gformbuilderpro'}"><i class="icon-move"></i></a></li>
                                    <li class="formbuilder_edit_wp"><a class="formbuilder_edit"  title="{l s='Edit' mod='gformbuilderpro'}"><i class="icon-pencil"></i></a></li>
                                    <li>
                                        <i class="icon-mobile"></i>
                                        <select rel="xs" class="formbuilder_group_width formbuilder_group_width_xs formbuilder_group_width_wp control_box_select">
                                           {for $i=1 to 12} 
                                            <option value="{$i|escape:'html':'UTF-8'}">{$i|escape:'html':'UTF-8'}/12</option>
                                           {/for}
                                        </select>
                                    </li>
                                    <li>
                                        <i class="icon-tablet"></i>
                                        <select rel="sm" class="formbuilder_group_width formbuilder_group_width_sm formbuilder_group_width_wp control_box_select">
                                           {for $i=1 to 12} 
                                            <option value="{$i|escape:'html':'UTF-8'}">{$i|escape:'html':'UTF-8'}/12</option>
                                           {/for}
                                        </select>
                                    </li>
                                    <li>
                                        <i class="icon-laptop"></i>
                                        <select rel="md" class="formbuilder_group_width formbuilder_group_width_md formbuilder_group_width_wp control_box_select">
                                           {for $i=1 to 12} 
                                            <option value="{$i|escape:'html':'UTF-8'}">{$i|escape:'html':'UTF-8'}/12</option>
                                           {/for}
                                        </select>
                                    </li>
                                    <li><a class="formbuilder_delete"  title="{l s='Delete' mod='gformbuilderpro'}"><i class="icon-trash"></i></a></li>
                                </ul>
                                
                            </div>
                        </div>
                        <div id="control_group">
                            <div class="control_group_wp control_box_wp">
                                <ul>
                                    <li><a class="formbuilder_minify" title="{l s='Minify' mod='gformbuilderpro'}"><i class="icon-minify"></i></a></li>
                                    <li><a class="formbuilder_move" title="{l s='Move' mod='gformbuilderpro'}"><i class="icon-move"></i></a></li>
                                    <li>
                                        <i class="icon-mobile"></i>
                                        <select rel="xs" class="formbuilder_group_width formbuilder_group_width_xs formbuilder_group_width_wp">
                                           {for $i=1 to 12} 
                                            <option value="{$i|escape:'html':'UTF-8'}">{$i|escape:'html':'UTF-8'}/12</option>
                                           {/for}
                                        </select>
                                    </li>
                                    <li>
                                        <i class="icon-tablet"></i>
                                        <select rel="sm" class="formbuilder_group_width formbuilder_group_width_sm formbuilder_group_width_wp">
                                           {for $i=1 to 12} 
                                            <option value="{$i|escape:'html':'UTF-8'}">{$i|escape:'html':'UTF-8'}/12</option>
                                           {/for}
                                        </select>
                                    </li>
                                    <li>
                                        <i class="icon-laptop"></i>
                                        <select rel="md" class="formbuilder_group_width formbuilder_group_width_md formbuilder_group_width_wp">
                                           {for $i=1 to 12} 
                                            <option value="{$i|escape:'html':'UTF-8'}">{$i|escape:'html':'UTF-8'}/12</option>
                                           {/for}
                                        </select>
                                    </li>
                                    <li><a class="formbuilder_delete formbuilder_delete_group"   title="{l s='Delete group' mod='gformbuilderpro'}"><i class="icon-trash"></i></a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <textarea class="hidden" name="formtemplate" id="formbuilder_content">{if isset($fields_value['formtemplate'])}{$fields_value['formtemplate'] nofilter}{/if}</textarea>{* $fields_value['formtemplate'] is html content, no need to escape*}
                <input type="hidden" name="deletefields" id="deletefields" value="" />
            </div>
        </div>
    {else if $input.type =='autoredirect'}    
        <div  class="col-lg-9">
            <span class="switch prestashop-switch fixed-width-lg">
				<input type="radio" name="autoredirect" id="autoredirect_on" value="1"{if $fields_value['autoredirect'] == '1'} checked="checked"{/if}/>
				{strip}
				<label for="autoredirect_on">
						{l s='Yes' mod='gformbuilderpro'}
				</label>
				{/strip}
                <input type="radio" name="autoredirect"  id="autoredirect_off" value="0"{if $fields_value['autoredirect'] == '0'} checked="checked"{/if}/>
				{strip}
				<label for="autoredirect_off">
						{l s='No' mod='gformbuilderpro'}
				</label>
				{/strip}
				<a class="slide-button btn"></a>
			</span>
            <div style="clear:both;"></div>
            <div class="autoredirect_config panel" {if $fields_value['autoredirect'] == '0'} style="display:none;"{/if}>
                <div class="panel-heading"><i class="icon-cogs"></i>{l s='Redirect config' mod='gformbuilderpro'}</div>
                <div class="form-control-static row">
                    <div class="col-xs-3">
                        <p>{l s='Time delay' mod='gformbuilderpro'}</p>
                        <div class="input-group col-lg-12">
                			<input maxlength="14" id="timedelay" name="timedelay" type="text" value="{if isset($fields_value['timedelay']) && $fields_value['timedelay'] > 0}{$fields_value['timedelay']|intval}{/if}" />
                		    <span class="input-group-addon">{l s='ms' mod='gformbuilderpro'}</span>
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <p>{l s='Redirect link' mod='gformbuilderpro'}</p>
                        <div class="input-group col-lg-12">
                			<input id="redirect_link" name="redirect_link" type="text" value="{if isset($fields_value['redirect_link']) && $fields_value['redirect_link'] !=''}{$fields_value['redirect_link']|escape:'html':'UTF-8'}{/if}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {else if $input.type =='emailshortcode'}
        <div  class="col-lg-9">
            <div class="emailshortcode_action">
                <button type="button" class="btn btn-default" id="gfromloadshortcode"><i class="icon-random"></i>{l s='Click here to show variables' mod='gformbuilderpro'}</button>
                <button type="button" class="btn btn-default" id="gfromloaddefault"><i class="icon-random"></i>{l s='Click here if you want use default email template' mod='gformbuilderpro'}</button>
            </div>
            <br />
            <div class="col-lg-12 emailshortcode_wp">
                {foreach from=$languages item=language}
    				{if $languages|count > 1}
    					<div class="translatable-field lang-{$language.id_lang|escape:'html':'UTF-8'}" {if $language.id_lang != $defaultFormLanguage}style="display:none"{/if}>
    				{/if}
                    <div class="panel emailshortcode_panel">
                        <div class="panel-heading"><i class="icon-code"></i>{l s='Variables' mod='gformbuilderpro'}</div>
                        <div class="emailshortcode">
                            {if isset($fields_value['shortcodes'][$language.id_lang]) && $fields_value['shortcodes'][$language.id_lang]}
                                <table>
                                    <tbody>
                                        {foreach $fields_value['shortcodes'][$language.id_lang] as $shortcode}
                                            <tr class="{cycle values="odd,even"}"><td class="label">{$shortcode.label|escape:'html':'UTF-8'}</td><td> {$shortcode.shortcode|escape:'html':'UTF-8'}</td></tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            {/if}
                        </div>
                    </div>
                    {if $languages|count > 1}
    					</div>
    				{/if}
                {/foreach}
            </div>
        </div>
        
    {else if $input.type == 'formbuildertabopen'}
        {if !isset($fields_value['psoldversion15']) || $fields_value['psoldversion15'] != -1}
        </div>
        {/if}
        <div id="{$input.name|escape:'html':'UTF-8'}" class="formbuilder_tab {if isset($input.class)}{$input.class|escape:'html':'UTF-8'}{/if}">
        {if !isset($fields_value['psoldversion15']) || $fields_value['psoldversion15'] != -1}
        <div>
        {/if}
    {else if $input.type == 'formbuildertabclose'}
        </div>
    {else if $input.type == 'tags' && $fields_value['psoldversion15'] == -1}
        <div class="margin-form">
			{block name="input"}
            {if isset($input.lang) AND $input.lang}
				<div class="translatable">
					{foreach $languages as $language}
						<div class="lang_{$language.id_lang|escape:'html':'UTF-8'}" style="display:{if $language.id_lang == $defaultFormLanguage}block{else}none{/if}; float: left;">
							{if $input.type == 'tags'}
								{literal}
								<script type="text/javascript">
									$().ready(function () {
										var input_id = '{/literal}{if isset($input.id)}{$input.id|escape:'html':'UTF-8'}_{$language.id_lang|escape:'html':'UTF-8'}{else}{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|escape:'html':'UTF-8'}{/if}{literal}';
										$('#'+input_id).tagify({addTagPrompt: '{/literal}{l s='Add tag' js=1 mod='gformbuilderpro'}{literal}'});
										$({/literal}'#{$table|escape:'html':'UTF-8'}{literal}_form').submit( function() {
											$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
										});
									});
								</script>
								{/literal}
							{/if}
							{assign var='value_text' value=$fields_value[$input.name][$language.id_lang]}
							<input type="text"
									name="{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|escape:'html':'UTF-8'}"
									id="{if isset($input.id)}{$input.id|escape:'html':'UTF-8'}_{$language.id_lang|escape:'html':'UTF-8'}{else}{$input.name|escape:'html':'UTF-8'}_{$language.id_lang|escape:'html':'UTF-8'}{/if}"
									value="{if isset($input.string_format) && $input.string_format}{$value_text|string_format:$input.string_format|escape:'htmlall':'UTF-8'}{else}{$value_text|escape:'htmlall':'UTF-8'}{/if}"
									class="{if $input.type == 'tags'}tagify {/if}{if isset($input.class)}{$input.class|escape:'html':'UTF-8'}{/if}"
									{if isset($input.size)}size="{$input.size|escape:'html':'UTF-8'}"{/if}
									{if isset($input.maxlength)}maxlength="{$input.maxlength|escape:'html':'UTF-8'}"{/if}
									{if isset($input.readonly) && $input.readonly}readonly="readonly"{/if}
									{if isset($input.disabled) && $input.disabled}disabled="disabled"{/if}
									{if isset($input.autocomplete) && !$input.autocomplete}autocomplete="off"{/if} />
							{if !empty($input.hint)}<span class="hint" name="help_box">
                                {if is_array($input.hint)}
                                    {foreach $input.hint as $hint}
                                        {$hint|escape:'htmlall':'UTF-8'}
                                    {/foreach}
                                {else}
                                    {$input.hint|escape:'htmlall':'UTF-8'}
                                {/if}
                            </span>{/if}
						</div>
					{/foreach}
				</div>
			{else}
				{if $input.type == 'tags'}
					{literal}
					<script type="text/javascript">
						$().ready(function () {
							var input_id = '{/literal}{if isset($input.id)}{$input.id|escape:'html':'UTF-8'}{else}{$input.name|escape:'html':'UTF-8'}{/if}{literal}';
							$('#'+input_id).tagify({addTagPrompt: '{/literal}{l s='Add tag' mod='gformbuilderpro'}{literal}'});
							$({/literal}'#{$table|escape:'html':'UTF-8'}{literal}_form').submit( function() {
								$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
							});
						});
					</script>
					{/literal}
				{/if}
				{assign var='value_text' value=$fields_value[$input.name]}
				<input type="text"
						name="{$input.name|escape:'html':'UTF-8'}"
						id="{if isset($input.id)}{$input.id|escape:'html':'UTF-8'}{else}{$input.name|escape:'html':'UTF-8'}{/if}"
						value="{if isset($input.string_format) && $input.string_format}{$value_text|string_format:$input.string_format|escape:'htmlall':'UTF-8'}{else}{$value_text|escape:'htmlall':'UTF-8'}{/if}"
						class="{if $input.type == 'tags'}tagify {/if}{if isset($input.class)}{$input.class|escape:'html':'UTF-8'}{/if}"
						{if isset($input.size)}size="{$input.size|escape:'html':'UTF-8'}"{/if}
						{if isset($input.maxlength)}maxlength="{$input.maxlength|escape:'html':'UTF-8'}"{/if}
						{if isset($input.class)}class="{$input.class|escape:'html':'UTF-8'}"{/if}
						{if isset($input.readonly) && $input.readonly}readonly="readonly"{/if}
						{if isset($input.disabled) && $input.disabled}disabled="disabled"{/if}
						{if isset($input.autocomplete) && !$input.autocomplete}autocomplete="off"{/if} />
				{if isset($input.suffix)}{$input.suffix|escape:'html':'UTF-8'}{/if}
				{if !empty($input.hint)}<span class="hint" name="help_box">
                    {if is_array($input.hint)}
                        {foreach $input.hint as $hint}
                            {$hint|escape:'htmlall':'UTF-8'}
                        {/foreach}
                    {else}
                        {$input.hint|escape:'htmlall':'UTF-8'}
                    {/if}
                    </span>
                
                {/if}
			{/if}
            {/block}
        </div>
    {/if}
    {if $input.type == 'tags' && $fields_value['psoldversion15'] == -1}
    {else}
    {$smarty.block.parent}
    {/if}
{/block}
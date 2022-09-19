{*
* Do not edit the file if you want to upgrade the module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
*}

{if !isset($codehook) || !$codehook}
{literal}
{extends file='page.tpl'}
{block name='page_content'}
{/literal}
{literal}
<script type="text/javascript">var baseUri = '{$baseUri}';</script>
{/literal}
<div class="gformbuilderpro_form">
    {literal}
    {if isset($_errors)}
    <div class="alert alert-danger" id="create_account_error">
        <ol>
        {foreach $_errors as $_error}
            <li>{$_error}</li>
        {/foreach}
        </ol>
    </div>
    {/if}
    {/literal}
    <form action="{literal}{$actionUrl}{/literal}" method="POST" class="{if $ajax}form_using_ajax{/if}" {if $hasupload} enctype="multipart/form-data" {/if}>
        {if $ajax}
            <input type="hidden" name="usingajax" value="1" />
        {else}
            <input type="hidden" name="usingajax" value="0" />
        {/if}
        <input type="hidden" name="idform" value="{$idform}" />
        <input type="hidden" name="id_lang" value="{$id_lang}" />
        <input type="hidden" name="id_shop" value="{$id_shop}" />
        <input type="hidden" name="gSubmitForm" value="1" />
        <div class="gformbuilderpro_content row">
            {$htmlcontent nofilter}{* $htmlcontent is html content, no need to escape*}
        </div>
        <div class="gformbuilderpro_action">
            <button type="submit" name="submitForm" id="submitForm" class="button btn btn-default button-medium"><span>{if $submittitle !=''}{$submittitle}{else}{l s='Sent' mod='gformbuilderpro'}{/if}<i class="icon-chevron-right right"></i></span></button>
        </div>
    </form>
</div>
{literal}
{/block}
{/literal}
{else}
<div class="gformbuilderpro_form">
    {literal}
    {if isset($_errors)}
    <div class="alert alert-danger" id="create_account_error">
        <ol>
        {foreach $_errors as $_error}
            <li>{$_error}</li>
        {/foreach}
        </ol>
    </div>
    {/if}
    {/literal}
    <form action="{literal}{$actionUrl}{/literal}" method="POST" class="{if $ajax}form_using_ajax{/if}" {if $hasupload} enctype="multipart/form-data" {/if}>
        {if $ajax}
            <input type="hidden" name="usingajax" value="1" />
        {else}
            <input type="hidden" name="usingajax" value="0" />
        {/if}
        <input type="hidden" name="idform" value="{$idform}" />
        <input type="hidden" name="id_lang" value="{$id_lang}" />
        <input type="hidden" name="id_shop" value="{$id_shop}" />
        <input type="hidden" name="gSubmitForm" value="1" />
        <div class="gformbuilderpro_content row">
            {$htmlcontent nofilter}{* $htmlcontent is html content, no need to escape*}
        </div>
        <div class="gformbuilderpro_action">
            <button type="submit" name="submitForm" id="submitForm" class="button btn btn-default button-medium"><span>{if $submittitle !=''}{$submittitle}{else}{l s='Sent' mod='gformbuilderpro'}{/if}<i class="icon-chevron-right right"></i></span></button>
        </div>
    </form>
</div>
{/if}
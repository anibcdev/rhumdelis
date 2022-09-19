{*
 * Systempay V2-Payment Module version 1.10.1 for PrestaShop 1.5-1.7. Support contact : supportvad@lyra-network.com.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/afl-3.0.php
 *
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2018 Lyra Network and contributors
 * @license   https://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * @category  payment
 * @package   systempay
 *}

{if version_compare($smarty.const._PS_VERSION_, '1.6', '>=')}
<div class="row"><div class="col-xs-12{if version_compare($smarty.const._PS_VERSION_, '1.6.0.11', '<')} col-md-6{/if}">
{/if}

  <div class="payment_module systempay systempay_choozeo {$systempay_tag|escape:'html':'UTF-8'}">
    {if {$systempay_choozeo_options|@count} == 1}
      <a href="javascript: $('#systempay_choozeo').submit();" title="{l s='Click here to pay with Choozeo' mod='systempay'}">
    {else}
      <a class="unclickable" title="{l s='Click on a payment option to pay with Choozeo' mod='systempay'}" href="javascript: void(0);">
    {/if}
        <img class="logo" src="{$systempay_logo|escape:'html':'UTF-8'}" alt="Systempay" />{$systempay_title|escape:'html':'UTF-8'}

        <form action="{$link->getModuleLink('systempay', 'redirect', array(), true)|escape:'html':'UTF-8'}" method="post" id="systempay_choozeo">
          <input type="hidden" name="systempay_payment_type" value="choozeo" />
          <br />

          {assign var=first value=true}
          {foreach from=$systempay_choozeo_options key="key" item="option"}
            <label class="systempay_choozeo_card">
              <input type="radio"
                     name="systempay_card_type"
                     value="{$key|escape:'html':'UTF-8'}"
                     {if $first == true} checked="checked"{/if}
                     onclick="javascript: $('#systempay_choozeo').submit();" />
              <img src="{$smarty.const._MODULE_DIR_|escape:'html':'UTF-8'}systempay/views/img/{$key|lower|escape:'html':'UTF-8'}.png"
                   alt="{$option|escape:'html':'UTF-8'}"
                   title="{$option|escape:'html':'UTF-8'}" />
            </label>

            {assign var=first value=false}
          {/foreach}
        </form>
      </a>
  </div>

  {if {$systempay_choozeo_options|@count} == 1}
    <script type="text/javascript">
    // <![CDATA[
      $('div.payment_module.systempay_choozeo a').on('hover', function(e) {
        $('div.payment_module.systempay_choozeo a form .systempay_choozeo_card img').toggleClass('hover');
      });
    // ]]>
    </script>
  {/if}

{if version_compare($smarty.const._PS_VERSION_, '1.6', '>=')}
</div></div>
{/if}

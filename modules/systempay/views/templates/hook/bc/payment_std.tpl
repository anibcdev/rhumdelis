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

<div class="payment_module systempay {$systempay_tag|escape:'html':'UTF-8'}">
  {if $systempay_std_card_data_mode == 1}
    <a href="javascript: $('#systempay_standard').submit();" title="{l s='Click here to pay by credit card' mod='systempay'}">
  {else}
    <a class="unclickable" title="{l s='Enter payment information and click « Pay » button' mod='systempay'}">
  {/if}
    <img class="logo" src="{$systempay_logo|escape:'html':'UTF-8'}" alt="Systempay" />{$systempay_title|escape:'html':'UTF-8'}

    <form action="{$link->getModuleLink('systempay', 'redirect', array(), true)|escape:'html':'UTF-8'}"
          method="post"
          {if $systempay_std_card_data_mode == 3}onsubmit="javascript: return systempayCheckFields();"{/if}
          id="systempay_standard">

      <input type="hidden" name="systempay_payment_type" value="standard" />

      {if ($systempay_std_card_data_mode == 2) OR ($systempay_std_card_data_mode == 3)}
        <br />

        {assign var=first value=true}
        {foreach from=$systempay_avail_cards key="key" item="label"}
          <div style="display: inline-block;">
            {if $systempay_avail_cards|@count == 1}
              <input type="hidden" id="systempay_card_type_{$key|escape:'html':'UTF-8'}" name="systempay_card_type" value="{$key|escape:'html':'UTF-8'}" >
            {else}
              <input type="radio" id="systempay_card_type_{$key|escape:'html':'UTF-8'}" name="systempay_card_type" value="{$key|escape:'html':'UTF-8'}" style="vertical-align: middle;"{if $first == true} checked="checked"{/if} >
            {/if}

            <label for="systempay_card_type_{$key|escape:'html':'UTF-8'}">
              {assign var=img_file value=$smarty.const._PS_MODULE_DIR_|cat:'systempay/views/img/':{$key|lower|escape:'html':'UTF-8'}:'.png'}

              {if file_exists($img_file)}
                <img src="{$base_dir_ssl|escape:'html':'UTF-8'}modules/systempay/views/img/{$key|lower}.png" alt="{$label|escape:'html':'UTF-8'}" title="{$label|escape:'html':'UTF-8'}" class="card" >
              {else}
                <span class="card">{$label|escape:'html':'UTF-8'}</span>
              {/if}
            </label>

            {assign var=first value=false}
          </div>
        {/foreach}
        <br />
        <div style="margin-bottom: 12px;"></div>

        {if $systempay_std_card_data_mode == 3}
          <label for="systempay_card_number">{l s='Card number' mod='systempay'}</label><br />
          <input type="text" name="systempay_card_number" value="" autocomplete="off" maxlength="19" id="systempay_card_number" style="max-width: 220px;" class="data" >
          <br />

          <label for="systempay_cvv">{l s='CVV' mod='systempay'}</label><br />
          <input type="text" name="systempay_cvv" value="" autocomplete="off" maxlength="4" id="systempay_cvv" style="max-width: 55px;" class="data" >
          <br />

          <label for="systempay_expiry_month">{l s='Expiration date' mod='systempay'}</label><br />
          <select name="systempay_expiry_month" id="systempay_expiry_month" style="width: 90px;" class="data">
            <option value="">{l s='Month' mod='systempay'}</option>
            {section name=expiry start=1 loop=13 step=1}
            <option value="{$smarty.section.expiry.index|intval}">{$smarty.section.expiry.index|str_pad:2:"0":$smarty.const.STR_PAD_LEFT}</option>
            {/section}
          </select>

          <select name="systempay_expiry_year" id="systempay_expiry_year" style="width: 90px;" class="data">
            <option value="">{l s='Year' mod='systempay'}</option>
            {assign var=year value=$smarty.now|date_format:"%Y"}
            {section name=expiry start=$year loop=$year+9 step=1}
            <option value="{$smarty.section.expiry.index|intval}">{$smarty.section.expiry.index|intval}</option>
            {/section}
          </select>
          <br />
        {/if}

        {if version_compare($smarty.const._PS_VERSION_, '1.6', '<')}
          <input type="submit" name="submit" value="{l s='Pay' mod='systempay'}" class="button" />
        {else}
          <button type="submit" name="submit" class="button btn btn-default standard-checkout button-medium" >
            <span>{l s='Pay' mod='systempay'}</span>
          </button>
        {/if}
      {/if}
    </form>
  </a>
</div>

{if version_compare($smarty.const._PS_VERSION_, '1.6', '>=')}
</div></div>
{/if}

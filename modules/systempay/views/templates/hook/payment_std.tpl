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

<!-- this meta tag is mandatory to avoid encoding problems caused by \PrestaShop\PrestaShop\Core\Payment\PaymentOptionFormDecorator -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<form action="{$link->getModuleLink('systempay', 'redirect', array(), true)|escape:'html':'UTF-8'}"
      method="post"
      id="systempay_standard"
      style="margin-left: 2.875rem; margin-top: 1.25rem; margin-bottom: 1rem;"
      {if $systempay_std_card_data_mode == 3}onsubmit="javascript: return systempayCheckFields();"{/if}>

  <input type="hidden" name="systempay_payment_type" value="standard" />

  {if ($systempay_std_card_data_mode == 2) OR ($systempay_std_card_data_mode == 3)}
    {assign var=first value=true}
    {foreach from=$systempay_avail_cards key="key" item="label"}
      <div style="display: inline-block;">
        {if $systempay_avail_cards|@count == 1}
          <input type="hidden" id="systempay_card_type_{$key|escape:'html':'UTF-8'}" name="systempay_card_type" value="{$key|escape:'html':'UTF-8'}" >
        {else}
          <input type="radio" id="systempay_card_type_{$key|escape:'html':'UTF-8'}" name="systempay_card_type" value="{$key|escape:'html':'UTF-8'}" style="vertical-align: middle;"{if $first == true} checked="checked"{/if} >
        {/if}

        <label for="systempay_card_type_{$key|escape:'html':'UTF-8'}" style="display: inline;">
          {assign var=img_file value=$smarty.const._PS_MODULE_DIR_|cat:'systempay/views/img/':{$key|lower|escape:'html':'UTF-8'}:'.png'}

          {if file_exists($img_file)}
            <img src="{$smarty.const._MODULE_DIR_|escape:'html':'UTF-8'}systempay/views/img/{$key|lower|escape:'html':'UTF-8'}.png"
               alt="{$label|escape:'html':'UTF-8'}"
               title="{$label|escape:'html':'UTF-8'}"
               style="vertical-align: middle; margin-right: 10px; height: 25px;">
          {else}
            <span style="vertical-align: middle; margin-right: 10px; height: 25px;">{$label|escape:'html':'UTF-8'}</span>
          {/if}
        </label>

        {assign var=first value=false}
      </div>
    {/foreach}
    <div style="margin-bottom: 12px;"></div>

    {if $systempay_std_card_data_mode == 3}
      <label for="systempay_card_number">{l s='Card number' mod='systempay'}</label>
      <input type="text" name="systempay_card_number" value="" autocomplete="off" maxlength="19" id="systempay_card_number" style="width: 220px;" class="data" >
      <div style="margin-bottom: 12px;"></div>

      <label for="systempay_cvv">{l s='CVV' mod='systempay'}</label>
      <input type="text" name="systempay_cvv" value="" autocomplete="off" maxlength="4" id="systempay_cvv" style="width: 65px;" class="data" >
      <div style="margin-bottom: 12px;"></div>

      <label for="systempay_expiry_month">{l s='Expiration date' mod='systempay'}</label>
      <select name="systempay_expiry_month" id="systempay_expiry_month" style="width: 90px; margin-right: 10px;" class="data">
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
  {/if}
</form>

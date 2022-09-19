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

<tr id="systempay_oney_option_{$key|escape:'html':'UTF-8'}">
  <td>
    {include file="./input_text_lang.tpl"
      languages=$prestashop_languages
      current_lang=$prestashop_lang
      input_name="SYSTEMPAY_ONEY_OPTIONS[{$key|escape:'html':'UTF-8'}][label]"
      field_id="SYSTEMPAY_ONEY_OPTIONS_{$key|escape:'html':'UTF-8'}_label"
      input_value=$option.label
      style="width: 140px;"
    }
  </td>
  <td>
    <input id="SYSTEMPAY_ONEY_OPTIONS_{$key|escape:'html':'UTF-8'}_code"
        name="SYSTEMPAY_ONEY_OPTIONS[{$key|escape:'html':'UTF-8'}][code]"
        value="{$option.code|escape:'html':'UTF-8'}"
        style="width: 65px;"
        type="text">
  </td>
  <td>
    <input id="SYSTEMPAY_ONEY_OPTIONS_{$key|escape:'html':'UTF-8'}_min_amount"
        name="SYSTEMPAY_ONEY_OPTIONS[{$key|escape:'html':'UTF-8'}][min_amount]"
        value="{$option.min_amount|escape:'html':'UTF-8'}"
        style="width: 75px;"
        type="text">
  </td>
  <td>
    <input id="SYSTEMPAY_ONEY_OPTIONS_{$key|escape:'html':'UTF-8'}_max_amount"
        name="SYSTEMPAY_ONEY_OPTIONS[{$key|escape:'html':'UTF-8'}][max_amount]"
        value="{$option.max_amount|escape:'html':'UTF-8'}"
        style="width: 75px;"
        type="text">
  </td>
  <td>
    <input id="SYSTEMPAY_ONEY_OPTIONS_{$key|escape:'html':'UTF-8'}_count"
        name="SYSTEMPAY_ONEY_OPTIONS[{$key|escape:'html':'UTF-8'}][count]"
        value="{$option.count|escape:'html':'UTF-8'}"
        style="width: 55px;"
        type="text">
  </td>
  <td>
    <input id="SYSTEMPAY_ONEY_OPTIONS_{$key|escape:'html':'UTF-8'}_rate"
        name="SYSTEMPAY_ONEY_OPTIONS[{$key|escape:'html':'UTF-8'}][rate]"
        value="{$option.rate|escape:'html':'UTF-8'}"
        style="width: 55px;"
        type="text">
  </td>
  <td>
    <button type="button" style="width: 75px;" onclick="javascript: systempayDeleteOneyOption({$key|escape:'html':'UTF-8'});">{l s='Delete' mod='systempay'}</button>
  </td>
</tr>

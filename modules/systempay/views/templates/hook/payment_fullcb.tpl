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

<form action="{$link->getModuleLink('systempay', 'redirect', array(), true)|escape:'html':'UTF-8'}" method="post" style="margin-left: 2.875rem; margin-top: 1.25rem; margin-bottom: 1rem;">
  <input type="hidden" name="systempay_payment_type" value="fullcb">

  {assign var=first value=true}
  {foreach from=$systempay_fullcb_options key="key" item="option"}
    <div style="padding-bottom: 5px;">
      {if $systempay_fullcb_options|@count == 1}
        <input type="hidden" id="systempay_fullcb_option_{$key|escape:'html':'UTF-8'}" name="systempay_card_type" value="{$key|escape:'html':'UTF-8'}" >
      {else}
        <input type="radio"
               id="systempay_fullcb_option_{$key|escape:'html':'UTF-8'}"
               name="systempay_card_type"
               value="{$key|escape:'html':'UTF-8'}"
               style="vertical-align: middle;"
               {if $first == true} checked="checked"{/if}
               onclick="javascript: $('.systempay_fullcb_review').hide(); $('#systempay_fullcb_review_{$key|escape:'html':'UTF-8'}').show();">
      {/if}

      <label for="systempay_fullcb_option_{$key|escape:'html':'UTF-8'}" style="display: inline;">
        <span style="vertical-align: middle;">{$option.localized_label|escape:'html':'UTF-8'}</span>
      </label>

      <table class="systempay_fullcb_review systempay_review" id="systempay_fullcb_review_{$key|escape:'html':'UTF-8'}" {if $first != true} style="display: none;"{/if}>
        <tr>
          <td>
            <table>
              <tbody>
                <tr>
                  <td>{l s='Order amount :' mod='systempay'}</td>
                  <td class="amount">{$option.order_amount|escape:'html':'UTF-8'}</td>
                </tr>
                <tr>
                  <td>{l s='Fees :' mod='systempay'}</td>
                  <td class="amount">{$option.fees|escape:'html':'UTF-8'}</td>
                </tr>
                <tr>
                  <td colspan="2"><hr style="margin: 0px;" /></td>
                </tr>
                <tr>
                  <td>{l s='Total amount :' mod='systempay'}</td>
                  <td class="amount">{$option.total_amount|escape:'html':'UTF-8'}</td>
                </tr>
              </tbody>
            </table>
          </td>
          <td>
            <table>
              <tbody>
                <tr>
                  <th colspan="2">{l s='Installments' mod='systempay'}</th>
                </tr>

                <tr>
                  <td>{$smarty.now|date_format:'%d/%m/%Y'|escape:'html':'UTF-8'}</td>
                  <td class="amount">{$option.first_payment|escape:'html':'UTF-8'}</td>
                </tr>
                {section name=row start=1 loop=$option.count step=1}
                  {assign var=i value={$smarty.section.row.index|intval}}
                  <tr>
                    <td>{"+{$i|escape:'html':'UTF-8'} months"|date_format:'%d/%m/%Y'}</td>
                    <td class="amount">{$option.monthly_payment|escape:'html':'UTF-8'}</td>
                  </tr>
                {/section}
              </tbody>
            </table>
          </td>
        </tr>
      </table>

    {assign var=first value=false}
    </div>
  {/foreach}
</form>

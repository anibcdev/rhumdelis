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
  <input type="hidden" name="systempay_payment_type" value="oney">

  {assign var=first value=true}
  {foreach from=$systempay_oney_options key="key" item="option"}
    <div style="padding-bottom: 5px;">
      {if $systempay_oney_options|@count == 1}
        <input type="hidden" id="systempay_oney_option_{$key|escape:'html':'UTF-8'}" name="systempay_oney_option" value="{$key|escape:'html':'UTF-8'}" >
      {else}
        <input type="radio"
               id="systempay_oney_option_{$key|escape:'html':'UTF-8'}"
               name="systempay_oney_option"
               value="{$key|escape:'html':'UTF-8'}"
               style="vertical-align: middle;"
               {if $first == true} checked="checked"{/if}
               onclick="javascript: $('.systempay_oney_review').hide(); $('#systempay_oney_review_{$key|escape:'html':'UTF-8'}').show();">
      {/if}

      <label for="systempay_oney_option_{$key|escape:'html':'UTF-8'}" style="display: inline;">
        <span style="vertical-align: middle;">{$option.localized_label|escape:'html':'UTF-8'}</span>
      </label>

      <table class="systempay_oney_review systempay_review" id="systempay_oney_review_{$key|escape:'html':'UTF-8'}" {if $first != true} style="display: none;"{/if}>
        <thead>
          <tr>
            <th>{l s='Your order total :' mod='systempay'} {$option.order_total|escape:'html':'UTF-8'}</th>
            <th>{l s='Debit dates' mod='systempay'}</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>{l s='Contribution :' mod='systempay'} {$option.first_payment|escape:'html':'UTF-8'}</td>
            <td><strong>{$smarty.now|date_format:'%d/%m/%Y'|escape:'html':'UTF-8'}</strong></td>
          </tr>
          <tr>
            <td>{{l s='Followed by %s payments' mod='systempay'}|sprintf:{$option.funding_count|escape:'html':'UTF-8'}}</td>
            <td></td>
          </tr>
          {section name=row start=1 loop=$option.count step=1}
            {assign var=i value={$smarty.section.row.index|intval}}
            <tr>
              <td>&nbsp;- {{l s='Payment %s :' mod='systempay'}|sprintf:$i} {$option.monthly_payment|escape:'html':'UTF-8'}</td>
              <td><strong>{"+{$i|intval} months"|date_format:'%d/%m/%Y'}</strong></td>
            </tr>
          {/section}
          <tr>
            <td colspan="2">{l s='Total cost of credit :' mod='systempay'} {$option.funding_fees|escape:'html':'UTF-8'}</td>
          </tr>
          <!-- <tr>
            <td colspan="2" class="small">{{l s='Funding of %s with a fixed APR of %s %%.' mod='systempay'}|sprintf:{$option.funding_total|escape:'html':'UTF-8'}:{$option.taeg|escape:'html':'UTF-8'}}</td>
          </tr> -->
        </tbody>
    </table>

    {assign var=first value=false}
    </div>
  {/foreach}
</form>

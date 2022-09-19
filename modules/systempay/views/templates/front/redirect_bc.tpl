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

{capture name=path}Systempay{/capture}
{if version_compare($smarty.const._PS_VERSION_, '1.6', '<')}
  {include file="$tpl_dir./breadcrumb.tpl"}
{/if}

{if isset($systempay_params) && $systempay_params.vads_action_mode == 'SILENT'}
  <h1>{l s='Payment processing' mod='systempay'}</h1>
{else}
  <h1>{l s='Redirection to payment gateway' mod='systempay'}</h1>
{/if}

{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}

<div id="systempay_content">
  <h3>{$systempay_title|escape:'html':'UTF-8'}</h3>

  <form action="{$systempay_url|escape:'html':'UTF-8'}" method="post" id="systempay_form" name="systempay_form" onsubmit="systempayDisablePayment();">
    {foreach from=$systempay_params key='key' item='value'}
      <input type="hidden" name="{$key|escape:'html':'UTF-8'}" value="{$value|escape:'html':'UTF-8'}" />
    {/foreach}

    <p>
      <img src="{$systempay_logo|escape:'html':'UTF-8'}" alt="Systempay" style="margin-bottom: 5px" />
      <br />

      {if $systempay_params.vads_action_mode == 'SILENT'}
        {l s='Please wait a moment. Your order payment is now processing.' mod='systempay'}
      {else}
        {l s='Please wait, you will be redirected to the payment gateway.' mod='systempay'}
      {/if}

      <br /> <br />
      {l s='If nothing happens in 10 seconds, please click the button below.' mod='systempay'}
      <br /><br />
    </p>

  {if version_compare($smarty.const._PS_VERSION_, '1.6', '<')}
    <p class="cart_navigation">
      <input type="submit" id="systempay_submit_payment" value="{l s='Pay' mod='systempay'}" class="exclusive" />
    </p>
  {else}
    <p class="cart_navigation clearfix">
      <button type="submit" id="systempay_submit_payment" class="button btn btn-default standard-checkout button-medium" >
        <span>{l s='Pay' mod='systempay'}</span>
      </button>
    </p>
  {/if}
  </form>
</div>

<script type="text/javascript">
  function systempayDisablePayment() {
    document.getElementById('systempay_submit_payment').disabled = true;
  }

  function systempaySubmitForm() {
    document.getElementById('systempay_submit_payment').click();
  }

  if (window.addEventListener) { // for most browsers
    window.addEventListener('load', systempaySubmitForm, false);
  } else if (window.attachEvent) { // for IE 8 and earlier versions
    window.attachEvent('onload', systempaySubmitForm);
  }
</script>

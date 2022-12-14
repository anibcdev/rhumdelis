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
  <input type="hidden" name="systempay_payment_type" value="choozeo">

  {assign var=first value=true}
  {foreach from=$systempay_choozeo_options key="key" item="option"}
    <label class="systempay_choozeo_card" >
      <input type="radio" name="systempay_card_type" value="{$key|escape:'html':'UTF-8'}" {if $first == true} checked="checked"{/if} />
      <img src="{$smarty.const._MODULE_DIR_|escape:'html':'UTF-8'}systempay/views/img/{$key|lower|escape:'html':'UTF-8'}.png"
           alt="{$option|escape:'html':'UTF-8'}"
           title="{$option|escape:'html':'UTF-8'}" />

      &nbsp;&nbsp;&nbsp;&nbsp;
    </label>

    {assign var=first value=false}
  {/foreach}
</form>

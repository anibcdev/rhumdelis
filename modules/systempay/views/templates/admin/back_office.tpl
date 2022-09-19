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

<script type="text/javascript">
  $(function() {
    $('#accordion').accordion({
      active: false,
      collapsible: true,
      autoHeight: false,
      heightStyle: 'content',
      header: 'h4',
      animated: false
    });
  });
</script>

<form method="POST" action="{$systempay_request_uri|escape:'html':'UTF-8'}" class="defaultForm form-horizontal">
  <div style="width: 100%;">
    <fieldset>
      <legend>
        <img style="width: 20px; vertical-align: middle;" src="../modules/systempay/logo.png" alt="Systempay">Systempay
      </legend>

      {l s='Developed by' mod='systempay'} : <b><a href="http://www.lyra-network.com/" target="_blank">Lyra Network</a></b><br />
      {l s='Contact us' mod='systempay'} : <b><a href="mailto:supportvad@lyra-network.com">supportvad@lyra-network.com</a></b><br />
      {l s='Module version' mod='systempay'} : <b>{if $smarty.const._PS_HOST_MODE_|defined}Cloud{/if}1.10.1</b><br />
      {l s='Gateway version' mod='systempay'} : <b>V2</b><br />

      {if !empty($systempay_doc_files)}
        <span style="color: red; font-weight: bold; text-transform: uppercase;">{l s='Click to view the module configuration documentation :' mod='systempay'}</span>
        {foreach from=$systempay_doc_files key="file" item="lang"}
          <a style="margin-left: 10px; font-weight: bold; text-transform: uppercase;" href="../modules/systempay/installation_doc/{$file|escape:'html':'UTF-8'}" target="_blank">{$lang|escape:'html':'UTF-8'}</a>
        {/foreach}
      {/if}
    </fieldset>
  </div>

  <br /><br />

  <div id="accordion" style="width: 100%; float: none;">
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='GENERAL CONFIGURATION' mod='systempay'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='BASE SETTINGS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_ENABLE_LOGS">{l s='Logs' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_ENABLE_LOGS" name="SYSTEMPAY_ENABLE_LOGS">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_ENABLE_LOGS === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enable / disbale module logs' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT GATEWAY ACCESS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_SITE_ID">{l s='Site ID' mod='systempay'}</label>
        <div class="margin-form">
          <input type="text" id="SYSTEMPAY_SITE_ID" name="SYSTEMPAY_SITE_ID" value="{$SYSTEMPAY_SITE_ID|escape:'html':'UTF-8'}" autocomplete="off">
          <p>{l s='The identifier provided by your bank.' mod='systempay'}</p>
        </div>

        {if !$systempay_plugin_features['qualif']}
        <label for="SYSTEMPAY_KEY_TEST">{l s='Certificate in test mode' mod='systempay'}</label>
        <div class="margin-form">
          <input type="text" id="SYSTEMPAY_KEY_TEST" name="SYSTEMPAY_KEY_TEST" value="{$SYSTEMPAY_KEY_TEST|escape:'html':'UTF-8'}" autocomplete="off">
          <p>{l s='Certificate provided by your bank for test mode (available in your store Back Office).' mod='systempay'}</p>
        </div>
        {/if}

        <label for="SYSTEMPAY_KEY_PROD">{l s='Certificate in production mode' mod='systempay'}</label>
        <div class="margin-form">
          <input type="text" id="SYSTEMPAY_KEY_PROD" name="SYSTEMPAY_KEY_PROD" value="{$SYSTEMPAY_KEY_PROD|escape:'html':'UTF-8'}" autocomplete="off">
          <p>{l s='Certificate provided by your bank (available in your store Back Office after enabling production mode).' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_MODE">{l s='Mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_MODE" name="SYSTEMPAY_MODE" {if $systempay_plugin_features['qualif']} disabled="disabled"{/if}>
            {foreach from=$systempay_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_MODE === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='The context mode of this module.' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_SIGN_ALGO">{l s='Signature algorithm' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_SIGN_ALGO" name="SYSTEMPAY_SIGN_ALGO">
            <option value="SHA-1"{if $SYSTEMPAY_SIGN_ALGO === 'SHA-1'} selected="selected"{/if}>SHA-1</option>
            <option value="SHA-256"{if $SYSTEMPAY_SIGN_ALGO === 'SHA-256'} selected="selected"{/if}>SHA-256</option>
          </select>
          <p>
            {l s='Algorithm used to compute the payment form signature. Selected algorithm must be the same as one configured in your store Back Office.' mod='systempay'}<br />
            {if !$systempay_plugin_features['shatwo']}
              <b>{l s='The SHA-256 algorithm should not be activated if it is not yet available in your store Back Office, the feature will be available soon.' mod='systempay'}</b>
            {/if}
          </p>
        </div>

        <label>{l s='Instant Payment Notification URL' mod='systempay'}</label>
        <div class="margin-form">
          <span style="font-weight: bold;">{$SYSTEMPAY_NOTIFY_URL|escape:'html':'UTF-8'}</span><br />
          <p>
            <img src="{$smarty.const._MODULE_DIR_|escape:'html':'UTF-8'}systempay/views/img/warn.png">
            <span style="color: red; display: inline-block;">
              {l s='URL to copy into your bank Back Office > Settings > Notification rules.' mod='systempay'}<br />
              {l s='In multistore mode, notification URL is the same for all the stores.' mod='systempay'}
            </span>
          </p>
        </div>

        <label for="SYSTEMPAY_PLATFORM_URL">{l s='Payment page URL' mod='systempay'}</label>
        <div class="margin-form">
          <input type="text" id="SYSTEMPAY_PLATFORM_URL" name="SYSTEMPAY_PLATFORM_URL" value="{$SYSTEMPAY_PLATFORM_URL|escape:'html':'UTF-8'}" style="width: 470px;">
          <p>{l s='Link to the payment page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='systempay'}</legend>

        <label for="SYSTEMPAY_DEFAULT_LANGUAGE">{l s='Default language' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_DEFAULT_LANGUAGE" name="SYSTEMPAY_DEFAULT_LANGUAGE">
            {foreach from=$systempay_language_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_DEFAULT_LANGUAGE === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Default language on the payment page.' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_AVAILABLE_LANGUAGES">{l s='Available languages' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_AVAILABLE_LANGUAGES" name="SYSTEMPAY_AVAILABLE_LANGUAGES[]" multiple="multiple" size="8">
            {foreach from=$systempay_language_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $SYSTEMPAY_AVAILABLE_LANGUAGES)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Languages available on the payment page. If you do not select any, all the supported languages will be available.' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_DELAY">{l s='Capture delay' mod='systempay'}</label>
        <div class="margin-form">
          <input type="text" id="SYSTEMPAY_DELAY" name="SYSTEMPAY_DELAY" value="{$SYSTEMPAY_DELAY|escape:'html':'UTF-8'}">
          <p>{l s='The number of days before the bank capture (adjustable in your store Back Office).' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_VALIDATION_MODE">{l s='Validation mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_VALIDATION_MODE" name="SYSTEMPAY_VALIDATION_MODE">
            {foreach from=$systempay_validation_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_VALIDATION_MODE === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE CUSTOMIZE' mod='systempay'}</legend>

        <label for="SYSTEMPAY_THEME_CONFIG">{l s='Theme configuration' mod='systempay'}</label>
        <div class="margin-form">
          <input type="text" id="SYSTEMPAY_THEME_CONFIG" name="SYSTEMPAY_THEME_CONFIG" value="{$SYSTEMPAY_THEME_CONFIG|escape:'html':'UTF-8'}" style="width: 470px;">
          <p>{l s='The theme configuration to customize the payment page.' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_SHOP_NAME">{l s='Shop name' mod='systempay'}</label>
        <div class="margin-form">
          <input type="text" id="SYSTEMPAY_SHOP_NAME" name="SYSTEMPAY_SHOP_NAME" value="{$SYSTEMPAY_SHOP_NAME|escape:'html':'UTF-8'}">
          <p>{l s='Shop name to display on the payment page. Leave blank to use gateway configuration.' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_SHOP_URL">{l s='Shop URL' mod='systempay'}</label>
        <div class="margin-form">
          <input type="text" id="SYSTEMPAY_SHOP_URL" name="SYSTEMPAY_SHOP_URL" value="{$SYSTEMPAY_SHOP_URL|escape:'html':'UTF-8'}" style="width: 470px;">
          <p>{l s='Shop URL to display on the payment page. Leave blank to use gateway configuration.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='SELECTIVE 3DS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_3DS_MIN_AMOUNT">{l s='Disable 3DS by customer group' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_3DS_MIN_AMOUNT"
            input_value=$SYSTEMPAY_3DS_MIN_AMOUNT
            min_only=true
          }
          <p>{l s='Amount below which 3DS will be disabled for each customer group. Needs subscription to selective 3DS option. For more information, refer to the module documentation.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='RETURN TO SHOP' mod='systempay'}</legend>

        <label for="SYSTEMPAY_REDIRECT_ENABLED">{l s='Automatic redirection' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_REDIRECT_ENABLED" name="SYSTEMPAY_REDIRECT_ENABLED" onchange="javascript: systempayRedirectChanged();">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_REDIRECT_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If enabled, the buyer is automatically redirected to your site at the end of the payment.' mod='systempay'}</p>
        </div>

        <section id="systempay_redirect_settings">
          <label for="SYSTEMPAY_REDIRECT_SUCCESS_T">{l s='Redirection timeout on success' mod='systempay'}</label>
          <div class="margin-form">
            <input type="text" id="SYSTEMPAY_REDIRECT_SUCCESS_T" name="SYSTEMPAY_REDIRECT_SUCCESS_T" value="{$SYSTEMPAY_REDIRECT_SUCCESS_T|escape:'html':'UTF-8'}">
            <p>{l s='Time in seconds (0-300) before the buyer is automatically redirected to your website after a successful payment.' mod='systempay'}</p>
          </div>

          <label>{l s='Redirection message on success' mod='systempay'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="SYSTEMPAY_REDIRECT_SUCCESS_M"
              input_value=$SYSTEMPAY_REDIRECT_SUCCESS_M
              style="width: 470px;"
            }
            <p>{l s='Message displayed on the payment page prior to redirection after a successful payment.' mod='systempay'}</p>
          </div>

          <label for="SYSTEMPAY_REDIRECT_ERROR_T">{l s='Redirection timeout on failure' mod='systempay'}</label>
          <div class="margin-form">
            <input type="text" id="SYSTEMPAY_REDIRECT_ERROR_T" name="SYSTEMPAY_REDIRECT_ERROR_T" value="{$SYSTEMPAY_REDIRECT_ERROR_T|escape:'html':'UTF-8'}">
            <p>{l s='Time in seconds (0-300) before the buyer is automatically redirected to your website after a declined payment.' mod='systempay'}</p>
          </div>

          <label>{l s='Redirection message on failure' mod='systempay'}</label>
          <div class="margin-form">
            {include file="./input_text_lang.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              input_name="SYSTEMPAY_REDIRECT_ERROR_M"
              input_value=$SYSTEMPAY_REDIRECT_ERROR_M
              style="width: 470px;"
            }
            <p>{l s='Message displayed on the payment page prior to redirection after a declined payment.' mod='systempay'}</p>
          </div>
        </section>

        <script type="text/javascript">
          systempayRedirectChanged();
        </script>

        <label for="SYSTEMPAY_RETURN_MODE">{l s='Return mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_RETURN_MODE" name="SYSTEMPAY_RETURN_MODE">
            <option value="GET"{if $SYSTEMPAY_RETURN_MODE === 'GET'} selected="selected"{/if}>GET</option>
            <option value="POST"{if $SYSTEMPAY_RETURN_MODE === 'POST'} selected="selected"{/if}>POST</option>
          </select>
          <p>{l s='Method that will be used for transmitting the payment result from the payment page to your shop.' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_FAILURE_MANAGEMENT">{l s='Payment failed management' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_FAILURE_MANAGEMENT" name="SYSTEMPAY_FAILURE_MANAGEMENT">
            {foreach from=$systempay_failure_management_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_FAILURE_MANAGEMENT === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='How to manage the buyer return to shop when the payment is failed.' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_CART_MANAGEMENT">{l s='Cart management' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_CART_MANAGEMENT" name="SYSTEMPAY_CART_MANAGEMENT">
            {foreach from=$systempay_cart_management_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_CART_MANAGEMENT === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='We recommend to choose the option « Empty cart » in order to avoid amount inconsistencies. In case of return back from the browser button the cart will be emptied. However in case of cancelled or refused payment, the cart will be recovered. If you do not want to have this behavior but the default PrestaShop one which is to keep the cart, choose the second option.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend onclick="javascript: systempayAdditionalOptionsToggle(this);" style="cursor: pointer;">
          <span class="ui-icon ui-icon-triangle-1-e" style="display: inline-block; vertical-align: middle;"></span>
          {l s='ADDITIONAL OPTIONS' mod='systempay'}
        </legend>
        <p style="font-size: .85em; color: #7F7F7F;">{l s='Configure this section if you use advanced risk assessment module or if you have a FacilyPay Oney contract.' mod='systempay'}</p>

        <section style="display: none; padding-top: 15px;">
          <label for="SYSTEMPAY_COMMON_CATEGORY">{l s='Category mapping' mod='systempay'}</label>
          <div class="margin-form">
            <select id="SYSTEMPAY_COMMON_CATEGORY" name="SYSTEMPAY_COMMON_CATEGORY" style="width: 220px;" onchange="javascript: systempayCategoryTableVisibility();">
              <option value="CUSTOM_MAPPING"{if $SYSTEMPAY_COMMON_CATEGORY === 'CUSTOM_MAPPING'} selected="selected"{/if}>{l s='(Use category mapping below)' mod='systempay'}</option>
              {foreach from=$systempay_category_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_COMMON_CATEGORY === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Use the same category for all products.' mod='systempay'}</p>

            <table cellpadding="10" cellspacing="0" class="table systempay_category_mapping" style="margin-top: 15px;{if $SYSTEMPAY_COMMON_CATEGORY != 'CUSTOM_MAPPING'} display: none;{/if}">
            <thead>
              <tr>
                <th>{l s='Product category' mod='systempay'}</th>
                <th>{l s='Bank product category' mod='systempay'}</th>
              </tr>
            </thead>
            <tbody>
              {foreach from=$prestashop_categories item="category"}
                {if $category.id_parent === 0}
                  {continue}
                {/if}

                {assign var="category_id" value=$category.id_category}

                {if isset($SYSTEMPAY_CATEGORY_MAPPING[$category_id])}
                  {assign var="exists" value=true}
                {else}
                  {assign var="exists" value=false}
                {/if}

                {if $exists}
                  {assign var="systempay_category" value=$SYSTEMPAY_CATEGORY_MAPPING[$category_id]}
                {else}
                  {assign var="systempay_category" value="FOOD_AND_GROCERY"}
                {/if}

                <tr id="systempay_category_mapping_{$category_id|escape:'html':'UTF-8'}">
                  <td>{$category.name|escape:'html':'UTF-8'}{if $exists === false}<span style="color: red;">*</span>{/if}</td>
                  <td>
                    <select id="SYSTEMPAY_CATEGORY_MAPPING_{$category_id|escape:'html':'UTF-8'}" name="SYSTEMPAY_CATEGORY_MAPPING[{$category_id|escape:'html':'UTF-8'}]"
                        style="width: 220px;"{if $SYSTEMPAY_COMMON_CATEGORY != 'CUSTOM_MAPPING'} disabled="disabled"{/if}>
                      {foreach from=$systempay_category_options key="key" item="option"}
                        <option value="{$key|escape:'html':'UTF-8'}"{if $systempay_category === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                    </select>
                  </td>
                </tr>
              {/foreach}
            </tbody>
            </table>
            <p class="systempay_category_mapping"{if $SYSTEMPAY_COMMON_CATEGORY != 'CUSTOM_MAPPING'} style="display: none;"{/if}>{l s='Match each product category with a bank product category.' mod='systempay'} <b>{l s='Entries marked with * are newly added and must be configured.' mod='systempay'}</b></p>
          </div>

          <label for="SYSTEMPAY_SEND_SHIP_DATA">{l s='Always send advanced shipping data' mod='systempay'}</label>
          <div class="margin-form">
            <select id="SYSTEMPAY_SEND_SHIP_DATA" name="SYSTEMPAY_SEND_SHIP_DATA">
              {foreach from=$systempay_yes_no_options key="key" item="option"}
                <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_SEND_SHIP_DATA === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
            <p>{l s='Select «No» to not send advanced shipping data for all payments (carrier, delivery type and delay).' mod='systempay'}</p>
          </div>

          <label>{l s='Shipping options' mod='systempay'}</label>
          <div class="margin-form">
            <table class="table" cellpadding="10" cellspacing="0">
            <thead>
              <tr>
                <th>{l s='Method title' mod='systempay'}</th>
                <th>{l s='Name' mod='systempay'}</th>
                <th>{l s='Type' mod='systempay'}</th>
                <th>{l s='Rapidity' mod='systempay'}</th>
                <th>{l s='Delay' mod='systempay'}</th>
                <th style="width: 270px;" colspan="3">{l s='Address' mod='systempay'}</th>
              </tr>
            </thead>
            <tbody>
              {foreach from=$prestashop_carriers item="carrier"}
                {assign var="carrier_id" value=$carrier.id_carrier}

                {if isset($SYSTEMPAY_ONEY_SHIP_OPTIONS[$carrier_id])}
                  {assign var="exists" value=true}
                {else}
                  {assign var="exists" value=false}
                {/if}

                {if $exists}
                  {assign var="ship_option" value=$SYSTEMPAY_ONEY_SHIP_OPTIONS[$carrier_id]}
                {/if}

                <tr>
                  <td>{$carrier.name|escape:'html':'UTF-8'}{if $exists === false}<span style="color: red;">*</span>{/if}</td>
                  <td>
                    <input id="SYSTEMPAY_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_label"
                        name="SYSTEMPAY_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][label]"
                        value="{if isset($ship_option)}{$ship_option.label|escape:'html':'UTF-8'}{else}{$carrier.name|regex_replace:"#[^A-Z0-9ÁÀÂÄÉÈÊËÍÌÎÏÓÒÔÖÚÙÛÜÇ /'-]#ui":" "|substr:0:55}{/if}"
                        type="text">
                  </td>
                  <td>
                    <select id="SYSTEMPAY_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_type" name="SYSTEMPAY_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][type]" onchange="javascript: systempayDeliveryTypeChanged({$carrier_id|escape:'html':'UTF-8'});" style="width: 150px;">
                      {foreach from=$systempay_delivery_type_options key="key" item="option"}
                        <option value="{$key|escape:'html':'UTF-8'}"{if (isset($ship_option) && $ship_option.type === $key) || ('PACKAGE_DELIVERY_COMPANY' === $key)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                    </select>
                  </td>
                  <td>
                    <select id="SYSTEMPAY_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_speed" name="SYSTEMPAY_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][speed]" onchange="javascript: systempayDeliverySpeedChanged({$carrier_id|escape:'html':'UTF-8'});">
                      {foreach from=$systempay_delivery_speed_options key="key" item="option"}
                        <option value="{$key|escape:'html':'UTF-8'}"{if (isset($ship_option) && $ship_option.speed === $key) || ('STANDARD' === $key)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
                      {/foreach}
                    </select>
                  </td>
                  <td>
                    <select
                        id="SYSTEMPAY_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_delay"
                        name="SYSTEMPAY_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][delay]"
                        style="{if !isset($ship_option) || ($ship_option.type != 'RECLAIM_IN_SHOP') || ($ship_option.speed != 'PRIORITY')} display: none;{/if}">
                      {foreach from=$systempay_delivery_delay_options key="key" item="option"}
                        <option value="{$key|escape:'html':'UTF-8'}"{if (isset($ship_option) && isset($ship_option.delay) && ($ship_option.delay === $key)) || 'INFERIOR_EQUALS' === $key} selected="selected"{/if}>{$option|escape:'quotes':'UTF-8'}</option>
                      {/foreach}
                    </select>
                  </td>
                  <td>
                    <input
                        id="SYSTEMPAY_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_address"
                        name="SYSTEMPAY_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][address]"
                        placeholder="{l s='Address' mod='systempay'}"
                        value="{if isset($ship_option)}{$ship_option.address|escape:'html':'UTF-8'}{/if}"
                        style="width: 160px;{if !isset($ship_option) || $ship_option.type != 'RECLAIM_IN_SHOP'} display: none;{/if}"
                        type="text">
                  </td>
                  <td>
                    <input
                        id="SYSTEMPAY_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_zip"
                        name="SYSTEMPAY_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][zip]"
                        placeholder="{l s='Zip code' mod='systempay'}"
                        value="{if isset($ship_option)}{$ship_option.zip|escape:'html':'UTF-8'}{/if}"
                        style="width: 50px;{if !isset($ship_option) || $ship_option.type != 'RECLAIM_IN_SHOP'} display: none;{/if}"
                        type="text">
                  </td>
                  <td>
                    <input
                        id="SYSTEMPAY_ONEY_SHIP_OPTIONS_{$carrier_id|escape:'html':'UTF-8'}_city"
                        name="SYSTEMPAY_ONEY_SHIP_OPTIONS[{$carrier_id|escape:'html':'UTF-8'}][city]"
                        placeholder="{l s='City' mod='systempay'}"
                        value="{if isset($ship_option)}{$ship_option.city|escape:'html':'UTF-8'}{/if}"
                        style="width: 160px;{if !isset($ship_option) || $ship_option.type != 'RECLAIM_IN_SHOP'} display: none;{/if}"
                        type="text">
                  </td>
                </tr>
              {/foreach}
            </tbody>
            </table>
            <p>
              {l s='Define the information about all shipping methods.' mod='systempay'}<br />
              <b>{l s='Name' mod='systempay'} : </b>{l s='The label of the shipping method (use 55 alphanumeric characters, accentuated characters and these special characters: space, slash, hyphen, apostrophe).' mod='systempay'}<br />
              <b>{l s='Type' mod='systempay'} : </b>{l s='The delivery type of shipping method.' mod='systempay'}<br />
              <b>{l s='Rapidity' mod='systempay'} : </b>{l s='Select the delivery rapidity.' mod='systempay'}<br />
              <b>{l s='Delay' mod='systempay'} : </b>{l s='Select the delivery delay if speed is « Priority ».' mod='systempay'}<br />
              <b>{l s='Address' mod='systempay'} : </b>{l s='Enter address if it is a reclaim in shop.' mod='systempay'}<br />
              <b>{l s='Entries marked with * are newly added and must be configured.' mod='systempay'}</b>
            </p>
          </div>
        </section>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>

    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='ONE-TIME PAYMENT' mod='systempay'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='systempay'}</legend>

       <label for="SYSTEMPAY_STD_ENABLED">{l s='Activation' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_STD_ENABLED" name="SYSTEMPAY_STD_ENABLED">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_STD_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables %s payment.' sprintf='standard' mod='systempay'}</p>
        </div>

        <label>{l s='Payment method title' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="SYSTEMPAY_STD_TITLE"
            input_value=$SYSTEMPAY_STD_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='AMOUNT RESTRICTIONS' mod='systempay'}</legend>

        <label>{l s='Customer group amount restriction' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_STD_AMOUNTS"
            input_value=$SYSTEMPAY_STD_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='systempay'}</legend>

        <label for="SYSTEMPAY_STD_DELAY">{l s='Capture delay' mod='systempay'}</label>
        <div class="margin-form">
          <input id="SYSTEMPAY_STD_DELAY" name="SYSTEMPAY_STD_DELAY" value="{$SYSTEMPAY_STD_DELAY|escape:'html':'UTF-8'}" type="text">
          <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_STD_VALIDATION">{l s='Validation mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_STD_VALIDATION" name="SYSTEMPAY_STD_VALIDATION">
            <option value="-1"{if $SYSTEMPAY_STD_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='systempay'}</option>
            {foreach from=$systempay_validation_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_STD_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_STD_PAYMENT_CARDS">{l s='Card Types' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_STD_PAYMENT_CARDS" name="SYSTEMPAY_STD_PAYMENT_CARDS[]" multiple="multiple" size="7">
            {foreach from=$systempay_payment_cards_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $SYSTEMPAY_STD_PAYMENT_CARDS)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='The card type(s) that can be used for the payment. Select none to use gateway configuration.' mod='systempay'}</p>
        </div>

        {if $systempay_plugin_features['oney']}
        <label for="SYSTEMPAY_STD_PROPOSE_ONEY">{l s='Propose FacilyPay Oney' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_STD_PROPOSE_ONEY" name="SYSTEMPAY_STD_PROPOSE_ONEY">
            {foreach from=$systempay_yes_no_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_STD_PROPOSE_ONEY === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Select «Yes» if you want to propose FacilyPay Oney in one-time payment. Attention, you must ensure that you have a FacilyPay Oney contract.' mod='systempay'}</p>
        </div>
        {/if}
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='ADVANCED OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_STD_CARD_DATA_MODE">{l s='Card data entry mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_STD_CARD_DATA_MODE" name="SYSTEMPAY_STD_CARD_DATA_MODE">
            {foreach from=$systempay_card_data_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_STD_CARD_DATA_MODE === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Select how the card data will be entered. Attention, to use bank data acquisition on the merchant site, you must ensure that you have subscribed to this option with your bank.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>

    {if $systempay_plugin_features['multi']}
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='PAYMENT IN INSTALLMENTS' mod='systempay'}</a>
    </h4>
    <div>

      {if $systempay_plugin_features['restrictmulti']}
      <p style="background: none repeat scroll 0 0 #FFFFE0; border: 1px solid #E6DB55; font-size: 13px; margin: 0 0 20px; padding: 10px;">
        {l s='ATTENTION: The payment in installments feature activation is subject to the prior agreement of Société Générale.' mod='systempay'}<br />
        {l s='If you enable this feature while you have not the associated option, an error 07 - PAYMENT_CONFIG will occur and the buyer will not be able to pay.' mod='systempay'}
      </p>
      {/if}

      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_MULTI_ENABLED">{l s='Activation' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_MULTI_ENABLED" name="SYSTEMPAY_MULTI_ENABLED">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_MULTI_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables %s payment.' sprintf='multiple' mod='systempay'}</p>
        </div>

        <label>{l s='Payment method title' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="SYSTEMPAY_MULTI_TITLE"
            input_value=$SYSTEMPAY_MULTI_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='AMOUNT RESTRICTIONS' mod='systempay'}</legend>

        <label>{l s='Customer group amount restriction' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_MULTI_AMOUNTS"
            input_value=$SYSTEMPAY_MULTI_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='systempay'}</legend>

        <label for="SYSTEMPAY_MULTI_DELAY">{l s='Capture delay' mod='systempay'}</label>
        <div class="margin-form">
          <input id="SYSTEMPAY_MULTI_DELAY" name="SYSTEMPAY_MULTI_DELAY" value="{$SYSTEMPAY_MULTI_DELAY|escape:'html':'UTF-8'}" type="text">
          <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_MULTI_VALIDATION">{l s='Validation mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_MULTI_VALIDATION" name="SYSTEMPAY_MULTI_VALIDATION">
            <option value="-1"{if $SYSTEMPAY_MULTI_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='systempay'}</option>
            {foreach from=$systempay_validation_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_MULTI_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_MULTI_PAYMENT_CARDS">{l s='Card Types' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_MULTI_PAYMENT_CARDS" name="SYSTEMPAY_MULTI_PAYMENT_CARDS[]" multiple="multiple" size="7">
            {foreach from=$systempay_multi_payment_cards_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if in_array($key, $SYSTEMPAY_MULTI_PAYMENT_CARDS)} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='The card type(s) that can be used for the payment. Select none to use gateway configuration.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='ADVANCED OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_MULTI_CARD_MODE">{l s='Card type selection' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_MULTI_CARD_MODE" name="SYSTEMPAY_MULTI_CARD_MODE">
            {foreach from=$systempay_card_selection_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_MULTI_CARD_MODE === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Select where the card type will be selected by the buyer.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT OPTIONS' mod='systempay'}</legend>

        <label>{l s='Payment options' mod='systempay'}</label>
        <div class="margin-form">
          <script type="text/html" id="systempay_multi_row_option">
            {include file="./row_multi_option.tpl"
              languages=$prestashop_languages
              current_lang=$prestashop_lang
              key="SYSTEMPAY_MULTI_KEY"
              option=$systempay_default_multi_option
            }
          </script>

          <button type="button" id="systempay_multi_options_btn"{if !empty($SYSTEMPAY_MULTI_OPTIONS)} style="display: none;"{/if} onclick="javascript: systempayAddMultiOption(true, '{l s='Delete' mod='systempay'}');">{l s='Add' mod='systempay'}</button>

          <table id="systempay_multi_options_table"{if empty($SYSTEMPAY_MULTI_OPTIONS)} style="display: none;"{/if} class="table" cellpadding="10" cellspacing="0">
          <thead>
            <tr>
              <th style="font-size: 10px;">{l s='Label' mod='systempay'}</th>
              <th style="font-size: 10px;">{l s='Min amount' mod='systempay'}</th>
              <th style="font-size: 10px;">{l s='Max amount' mod='systempay'}</th>
              {if in_array('CB', $systempay_multi_payment_cards_options)}
              <th style="font-size: 10px;">{l s='Contract' mod='systempay'}</th>
              {/if}
              <th style="font-size: 10px;">{l s='Count' mod='systempay'}</th>
              <th style="font-size: 10px;">{l s='Period' mod='systempay'}</th>
              <th style="font-size: 10px;">{l s='1st payment' mod='systempay'}</th>
              <th style="font-size: 10px;"></th>
            </tr>
          </thead>

          <tbody>
            {foreach from=$SYSTEMPAY_MULTI_OPTIONS key="key" item="option"}
              {include file="./row_multi_option.tpl"
                languages=$prestashop_languages
                current_lang=$prestashop_lang
                key=$key
                option=$option
              }
            {/foreach}

            <tr id="systempay_multi_option_add">
              <td colspan="{if in_array('CB', $systempay_multi_payment_cards_options)}7{else}6{/if}"></td>
              <td>
                <button type="button" onclick="javascript: systempayAddMultiOption(false, '{l s='Delete' mod='systempay'}');">{l s='Add' mod='systempay'}</button>
              </td>
            </tr>
          </tbody>
          </table>
          <p>
            {l s='Click on «Add» button to configure one or more payment options.' mod='systempay'}<br />
            <b>{l s='Label' mod='systempay'} : </b>{l s='The option label to display on the frontend.' mod='systempay'}<br />
            <b>{l s='Min amount' mod='systempay'} : </b>{l s='Minimum amount to enable the payment option.' mod='systempay'}<br />
            <b>{l s='Max amount' mod='systempay'} : </b>{l s='Maximum amount to enable the payment option.' mod='systempay'}<br />
            {if in_array('CB', $systempay_multi_payment_cards_options)}
            <b>{l s='Contract' mod='systempay'} : </b>{l s='ID of the contract to use with the option (Leave blank preferably).' mod='systempay'}<br />
            {/if}
            <b>{l s='Count' mod='systempay'} : </b>{l s='Total number of payments.' mod='systempay'}<br />
            <b>{l s='Period' mod='systempay'} : </b>{l s='Delay (in days) between payments.' mod='systempay'}<br />
            <b>{l s='1st payment' mod='systempay'} : </b>{l s='Amount of first payment, in percentage of total amount. If empty, all payments will have the same amount.' mod='systempay'}<br />
            <b>{l s='Do no forget to clik on «Save» button to save your modifications.' mod='systempay'}</b>
          </p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>
    {/if}

    {if $systempay_plugin_features['choozeo']}
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='CHOOZEO PAYMENT' mod='systempay'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_CHOOZEO_ENABLED">{l s='Activation' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_CHOOZEO_ENABLED" name="SYSTEMPAY_CHOOZEO_ENABLED">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_CHOOZEO_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables %s payment.' sprintf='Choozeo' mod='systempay'}</p>
        </div>

        <label>{l s='Payment method title' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="SYSTEMPAY_CHOOZEO_TITLE"
            input_value=$SYSTEMPAY_CHOOZEO_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='AMOUNT RESTRICTIONS' mod='systempay'}</legend>

        <label>{l s='Customer group amount restriction' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_CHOOZEO_AMOUNTS"
            input_value=$SYSTEMPAY_CHOOZEO_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='systempay'}</legend>

        <label for="SYSTEMPAY_CHOOZEO_DELAY">{l s='Capture delay' mod='systempay'}</label>
        <div class="margin-form">
          <input id="SYSTEMPAY_CHOOZEO_DELAY" name="SYSTEMPAY_CHOOZEO_DELAY" value="{$SYSTEMPAY_CHOOZEO_DELAY|escape:'html':'UTF-8'}" type="text">
          <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT OPTIONS' mod='systempay'}</legend>

        <label>{l s='Payment options' mod='systempay'}</label>
        <div class="margin-form">
         <table class="table" cellpadding="10" cellspacing="0">
            <thead>
              <tr>
                <th>{l s='Label' mod='systempay'}</th>
                <th>{l s='Min amount' mod='systempay'}</th>
                <th>{l s='Max amount' mod='systempay'}</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Choozeo 3X CB</td>
                <td>
                  <input name="SYSTEMPAY_CHOOZEO_OPTIONS[EPNF_3X][min_amount]"
                      value="{if isset($SYSTEMPAY_CHOOZEO_OPTIONS['EPNF_3X'])}{$SYSTEMPAY_CHOOZEO_OPTIONS['EPNF_3X']['min_amount']|escape:'html':'UTF-8'}{/if}"
                      style="width: 200px;"
                      type="text">
                </td>
                <td>
                  <input name="SYSTEMPAY_CHOOZEO_OPTIONS[EPNF_3X][max_amount]"
                      value="{if isset($SYSTEMPAY_CHOOZEO_OPTIONS['EPNF_3X'])}{$SYSTEMPAY_CHOOZEO_OPTIONS['EPNF_3X']['max_amount']|escape:'html':'UTF-8'}{/if}"
                      style="width: 200px;"
                      type="text">
                </td>
              </tr>

              <tr>
                <td>Choozeo 4X CB</td>
                <td>
                  <input name="SYSTEMPAY_CHOOZEO_OPTIONS[EPNF_4X][min_amount]"
                      value="{if isset($SYSTEMPAY_CHOOZEO_OPTIONS['EPNF_4X'])}{$SYSTEMPAY_CHOOZEO_OPTIONS['EPNF_4X']['min_amount']|escape:'html':'UTF-8'}{/if}"
                      style="width: 200px;"
                      type="text">
                </td>
                <td>
                  <input name="SYSTEMPAY_CHOOZEO_OPTIONS[EPNF_4X][max_amount]"
                      value="{if isset($SYSTEMPAY_CHOOZEO_OPTIONS['EPNF_4X'])}{$SYSTEMPAY_CHOOZEO_OPTIONS['EPNF_4X']['max_amount']|escape:'html':'UTF-8'}{/if}"
                      style="width: 200px;"
                      type="text">
                </td>
              </tr>
            </tbody>
          </table>
          <p>{l s='Define amount restriction for each card.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>
    {/if}

    {if $systempay_plugin_features['oney']}
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='FACILYPAY ONEY PAYMENT' mod='systempay'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_ONEY_ENABLED">{l s='Activation' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_ONEY_ENABLED" name="SYSTEMPAY_ONEY_ENABLED">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_ONEY_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables %s payment.' sprintf='FacilyPay Oney' mod='systempay'}</p>
        </div>

        <label>{l s='Payment method title' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="SYSTEMPAY_ONEY_TITLE"
            input_value=$SYSTEMPAY_ONEY_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='AMOUNT RESTRICTIONS' mod='systempay'}</legend>

        <label>{l s='Customer group amount restriction' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_ONEY_AMOUNTS"
            input_value=$SYSTEMPAY_ONEY_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='systempay'}</legend>

        <label for="SYSTEMPAY_ONEY_DELAY">{l s='Capture delay' mod='systempay'}</label>
        <div class="margin-form">
          <input id="SYSTEMPAY_ONEY_DELAY" name="SYSTEMPAY_ONEY_DELAY" value="{$SYSTEMPAY_ONEY_DELAY|escape:'html':'UTF-8'}" type="text">
          <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_ONEY_VALIDATION">{l s='Validation mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_ONEY_VALIDATION" name="SYSTEMPAY_ONEY_VALIDATION">
            <option value="-1"{if $SYSTEMPAY_ONEY_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='systempay'}</option>
            {foreach from=$systempay_validation_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_ONEY_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_ONEY_ENABLE_OPTIONS">{l s='Enable options selection' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_ONEY_ENABLE_OPTIONS" name="SYSTEMPAY_ONEY_ENABLE_OPTIONS" onchange="javascript: systempayOneyEnableOptionsChanged();">
            {foreach from=$systempay_yes_no_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_ONEY_ENABLE_OPTIONS === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enable payment options selection on merchant site.' mod='systempay'}</p>
        </div>

        <section id="systempay_oney_options_settings">
          <label>{l s='Payment options' mod='systempay'}</label>
          <div class="margin-form">
            <script type="text/html" id="systempay_oney_row_option">
              {include file="./row_oney_option.tpl"
                languages=$prestashop_languages
                current_lang=$prestashop_lang
                key="SYSTEMPAY_ONEY_KEY"
                option=$systempay_default_oney_option
              }
            </script>

            <button type="button" id="systempay_oney_options_btn"{if !empty($SYSTEMPAY_ONEY_OPTIONS)} style="display: none;"{/if} onclick="javascript: systempayAddOneyOption(true, '{l s='Delete' mod='systempay'}');">{l s='Add' mod='systempay'}</button>

            <table id="systempay_oney_options_table"{if empty($SYSTEMPAY_ONEY_OPTIONS)} style="display: none;"{/if} class="table" cellpadding="10" cellspacing="0">
            <thead>
              <tr>
                <th style="font-size: 10px;">{l s='Label' mod='systempay'}</th>
                <th style="font-size: 10px;">{l s='Code' mod='systempay'}</th>
                <th style="font-size: 10px;">{l s='Min amount' mod='systempay'}</th>
                <th style="font-size: 10px;">{l s='Max amount' mod='systempay'}</th>
                <th style="font-size: 10px;">{l s='Count' mod='systempay'}</th>
                <th style="font-size: 10px;">{l s='Rate' mod='systempay'}</th>
                <th style="font-size: 10px;"></th>
              </tr>
            </thead>

            <tbody>
              {foreach from=$SYSTEMPAY_ONEY_OPTIONS key="key" item="option"}
                {include file="./row_oney_option.tpl"
                  languages=$prestashop_languages
                  current_lang=$prestashop_lang
                  key=$key
                  option=$option
                }
              {/foreach}

              <tr id="systempay_oney_option_add">
                <td colspan="6"></td>
                <td>
                  <button type="button" onclick="javascript: systempayAddOneyOption(false, '{l s='Delete' mod='systempay'}');">{l s='Add' mod='systempay'}</button>
                </td>
              </tr>
            </tbody>
            </table>
            <p>
              {l s='Click on «Add» button to configure one or more payment options.' mod='systempay'}<br />
              <b>{l s='Label' mod='systempay'} : </b>{l s='The option label to display on the frontend.' mod='systempay'}<br />
              <b>{l s='Code' mod='systempay'} : </b>{l s='The option code as defined in your FacilyPay Oney contract.' mod='systempay'}<br />
              <b>{l s='Min amount' mod='systempay'} : </b>{l s='Minimum amount to enable the payment option.' mod='systempay'}<br />
              <b>{l s='Max amount' mod='systempay'} : </b>{l s='Maximum amount to enable the payment option.' mod='systempay'}<br />
              <b>{l s='Count' mod='systempay'} : </b>{l s='Total number of payments.' mod='systempay'}<br />
              <b>{l s='Rate' mod='systempay'} : </b>{l s='The interest rate in percentage.' mod='systempay'}<br />
              <b>{l s='Do no forget to clik on «Save» button to save your modifications.' mod='systempay'}</b>
            </p>
          </div>
        </section>

        <script type="text/javascript">
          systempayOneyEnableOptionsChanged();
        </script>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>
    {/if}

    {if $systempay_plugin_features['fullcb']}
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='FULLCB PAYMENT' mod='systempay'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_FULLCB_ENABLED">{l s='Activation' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_FULLCB_ENABLED" name="SYSTEMPAY_FULLCB_ENABLED">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_FULLCB_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables %s payment.' sprintf='FullCB' mod='systempay'}</p>
        </div>

        <label>{l s='Payment method title' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="SYSTEMPAY_FULLCB_TITLE"
            input_value=$SYSTEMPAY_FULLCB_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='AMOUNT RESTRICTIONS' mod='systempay'}</legend>

        <label>{l s='Customer group amount restriction' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_FULLCB_AMOUNTS"
            input_value=$SYSTEMPAY_FULLCB_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_FULLCB_ENABLE_OPTS">{l s='Enable options selection' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_FULLCB_ENABLE_OPTS" name="SYSTEMPAY_FULLCB_ENABLE_OPTS" onchange="javascript: systempayFullcbEnableOptionsChanged();">
            {foreach from=$systempay_yes_no_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_FULLCB_ENABLE_OPTS === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enable payment options selection on merchant site.' mod='systempay'}</p>
        </div>

        <section id="systempay_fullcb_options_settings">
          <label>{l s='Payment options' mod='systempay'}</label>
          <div class="margin-form">
            <table class="table" cellpadding="10" cellspacing="0">
              <thead>
                <tr>
                  <th style="font-size: 10px;">{l s='Label' mod='systempay'}</th>
                  <th style="font-size: 10px;">{l s='Min amount' mod='systempay'}</th>
                  <th style="font-size: 10px;">{l s='Max amount' mod='systempay'}</th>
                  <th style="font-size: 10px;">{l s='Rate' mod='systempay'}</th>
                  <th style="font-size: 10px;">{l s='Cap' mod='systempay'}</th>
                </tr>
              </thead>

              <tbody>
                {foreach from=$SYSTEMPAY_FULLCB_OPTIONS key="key" item="option"}
                <tr>
                  <td>
                    {include file="./input_text_lang.tpl"
                      languages=$prestashop_languages
                      current_lang=$prestashop_lang
                      input_name="SYSTEMPAY_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][label]"
                      field_id="SYSTEMPAY_FULLCB_OPTIONS_{$key|escape:'html':'UTF-8'}_label"
                      input_value=$option['label']
                      style="width: 140px;"
                    }
                    <input name="SYSTEMPAY_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][count]" value="{$option['count']|escape:'html':'UTF-8'}" type="text" style="display: none; width: 0px;">
                  </td>
                  <td>
                    <input name="SYSTEMPAY_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][min_amount]"
                        value="{if isset($option)}{$option['min_amount']|escape:'html':'UTF-8'}{/if}"
                        style="width: 75px;"
                        type="text">
                  </td>
                  <td>
                    <input name="SYSTEMPAY_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][max_amount]"
                        value="{if isset($option)}{$option['max_amount']|escape:'html':'UTF-8'}{/if}"
                        style="width: 75px;"
                        type="text">
                  </td>
                  <td>
                    <input name="SYSTEMPAY_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][rate]"
                        value="{if isset($option)}{$option['rate']|escape:'html':'UTF-8'}{/if}"
                        style="width: 70px;"
                        type="text">
                  </td>
                  <td>
                    <input name="SYSTEMPAY_FULLCB_OPTIONS[{$key|escape:'html':'UTF-8'}][cap]"
                        value="{if isset($option)}{$option['cap']|escape:'html':'UTF-8'}{/if}"
                        style="width: 70px;"
                        type="text">
                  </td>
                </tr>
                {/foreach}
              </tbody>
            </table>
            <p>
              {l s='Configure FullCB payment options.' mod='systempay'}<br />
              <b>{l s='Min amount' mod='systempay'} : </b>{l s='Minimum amount to enable the payment option.' mod='systempay'}<br />
              <b>{l s='Max amount' mod='systempay'} : </b>{l s='Maximum amount to enable the payment option.' mod='systempay'}<br />
              <b>{l s='Rate' mod='systempay'} : </b>{l s='The interest rate in percentage.' mod='systempay'}<br />
              <b>{l s='Cap' mod='systempay'} : </b>{l s='Maximum fees amount of payment option.' mod='systempay'}<br />
              <b>{l s='Do no forget to clik on «Save» button to save your modifications.' mod='systempay'}</b>
            </p>
          </div>
        </section>

        <script type="text/javascript">
          systempayFullcbEnableOptionsChanged();
        </script>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>
    {/if}

    {if $systempay_plugin_features['ancv']}
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='ANCV PAYMENT' mod='systempay'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_ANCV_ENABLED">{l s='Activation' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_ANCV_ENABLED" name="SYSTEMPAY_ANCV_ENABLED">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_ANCV_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables %s payment.' sprintf='ANCV' mod='systempay'}</p>
        </div>

        <label>{l s='Payment method title' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="SYSTEMPAY_ANCV_TITLE"
            input_value=$SYSTEMPAY_ANCV_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='AMOUNT RESTRICTIONS' mod='systempay'}</legend>

        <label>{l s='Customer group amount restriction' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_ANCV_AMOUNTS"
            input_value=$SYSTEMPAY_ANCV_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='systempay'}</legend>

        <label for="SYSTEMPAY_ANCV_DELAY">{l s='Capture delay' mod='systempay'}</label>
        <div class="margin-form">
          <input id="SYSTEMPAY_ANCV_DELAY" name="SYSTEMPAY_ANCV_DELAY" value="{$SYSTEMPAY_ANCV_DELAY|escape:'html':'UTF-8'}" type="text">
          <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_ANCV_VALIDATION">{l s='Validation mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_ANCV_VALIDATION" name="SYSTEMPAY_ANCV_VALIDATION">
            <option value="-1"{if $SYSTEMPAY_ANCV_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='systempay'}</option>
            {foreach from=$systempay_validation_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_ANCV_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>
    {/if}

    {if $systempay_plugin_features['sepa']}
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='SEPA PAYMENT' mod='systempay'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_SEPA_ENABLED">{l s='Activation' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_SEPA_ENABLED" name="SYSTEMPAY_SEPA_ENABLED">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_SEPA_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables %s payment.' sprintf='SEPA' mod='systempay'}</p>
        </div>

        <label>{l s='Payment method title' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="SYSTEMPAY_SEPA_TITLE"
            input_value=$SYSTEMPAY_SEPA_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='AMOUNT RESTRICTIONS' mod='systempay'}</legend>

        <label>{l s='Customer group amount restriction' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_SEPA_AMOUNTS"
            input_value=$SYSTEMPAY_SEPA_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='systempay'}</legend>

        <label for="SYSTEMPAY_SEPA_DELAY">{l s='Capture delay' mod='systempay'}</label>
        <div class="margin-form">
          <input id="SYSTEMPAY_SEPA_DELAY" name="SYSTEMPAY_SEPA_DELAY" value="{$SYSTEMPAY_SEPA_DELAY|escape:'html':'UTF-8'}" type="text">
          <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_SEPA_VALIDATION">{l s='Validation mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_SEPA_VALIDATION" name="SYSTEMPAY_SEPA_VALIDATION">
            <option value="-1"{if $SYSTEMPAY_SEPA_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='systempay'}</option>
            {foreach from=$systempay_validation_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_SEPA_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>
    {/if}

    {if $systempay_plugin_features['paypal']}
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='PAYPAL PAYMENT' mod='systempay'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_PAYPAL_ENABLED">{l s='Activation' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_PAYPAL_ENABLED" name="SYSTEMPAY_PAYPAL_ENABLED">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_PAYPAL_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables %s payment.' sprintf='PayPal' mod='systempay'}</p>
        </div>

        <label>{l s='Payment method title' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="SYSTEMPAY_PAYPAL_TITLE"
            input_value=$SYSTEMPAY_PAYPAL_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='AMOUNT RESTRICTIONS' mod='systempay'}</legend>

        <label>{l s='Customer group amount restriction' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_PAYPAL_AMOUNTS"
            input_value=$SYSTEMPAY_PAYPAL_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='PAYMENT PAGE' mod='systempay'}</legend>

        <label for="SYSTEMPAY_PAYPAL_DELAY">{l s='Capture delay' mod='systempay'}</label>
        <div class="margin-form">
          <input id="SYSTEMPAY_PAYPAL_DELAY" name="SYSTEMPAY_PAYPAL_DELAY" value="{$SYSTEMPAY_PAYPAL_DELAY|escape:'html':'UTF-8'}" type="text">
          <p>{l s='The number of days before the bank capture. Enter value only if different from « Base settings ».' mod='systempay'}</p>
        </div>

        <label for="SYSTEMPAY_PAYPAL_VALIDATION">{l s='Validation mode' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_PAYPAL_VALIDATION" name="SYSTEMPAY_PAYPAL_VALIDATION">
            <option value="-1"{if $SYSTEMPAY_PAYPAL_VALIDATION === '-1'} selected="selected"{/if}>{l s='Base settings configuration' mod='systempay'}</option>
            {foreach from=$systempay_validation_mode_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_PAYPAL_VALIDATION === (string)$key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='If manual is selected, you will have to confirm payments manually in your bank Back Office.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>
    {/if}

    {if $systempay_plugin_features['sofort']}
    <h4 style="font-weight: bold; margin-bottom: 0; overflow: hidden; line-height: unset !important;">
      <a href="#">{l s='SOFORT BANKING PAYMENT' mod='systempay'}</a>
    </h4>
    <div>
      <fieldset>
        <legend>{l s='MODULE OPTIONS' mod='systempay'}</legend>

        <label for="SYSTEMPAY_SOFORT_ENABLED">{l s='Activation' mod='systempay'}</label>
        <div class="margin-form">
          <select id="SYSTEMPAY_SOFORT_ENABLED" name="SYSTEMPAY_SOFORT_ENABLED">
            {foreach from=$systempay_enable_disable_options key="key" item="option"}
              <option value="{$key|escape:'html':'UTF-8'}"{if $SYSTEMPAY_SOFORT_ENABLED === $key} selected="selected"{/if}>{$option|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
          <p>{l s='Enables / disables %s payment.' sprintf='SOFORT Banking' mod='systempay'}</p>
        </div>

        <label>{l s='Payment method title' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./input_text_lang.tpl"
            languages=$prestashop_languages
            current_lang=$prestashop_lang
            input_name="SYSTEMPAY_SOFORT_TITLE"
            input_value=$SYSTEMPAY_SOFORT_TITLE
            style="width: 330px;"
          }
          <p>{l s='Method title to display on payment means page.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>

      <fieldset>
        <legend>{l s='AMOUNT RESTRICTIONS' mod='systempay'}</legend>

        <label>{l s='Customer group amount restriction' mod='systempay'}</label>
        <div class="margin-form">
          {include file="./table_amount_group.tpl"
            groups=$prestashop_groups
            input_name="SYSTEMPAY_SOFORT_AMOUNTS"
            input_value=$SYSTEMPAY_SOFORT_AMOUNTS
          }
          <p>{l s='Define amount restriction for each customer group.' mod='systempay'}</p>
        </div>
      </fieldset>
      <div class="clear">&nbsp;</div>
    </div>
    {/if}
   </div>

  {if version_compare($smarty.const._PS_VERSION_, '1.6', '<')}
    <div class="clear" style="width: 100%;">
      <input type="submit" class="button" name="systempay_submit_admin_form" value="{l s='Save' mod='systempay'}" style="float: right;">
    </div>
  {else}
    <div class="panel-footer" style="width: 100%;">
      <button type="submit" value="1" name="systempay_submit_admin_form" class="btn btn-default pull-right" style="float: right !important;">
        <i class="process-icon-save"></i>
        {l s='Save' mod='systempay'}
      </button>
    </div>
  {/if}
</form>

<br />
<br />

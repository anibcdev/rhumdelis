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

{if version_compare($smarty.const._PS_VERSION_, '1.7', '>=')}
  {include file="module:systempay/views/templates/front/iframe/loader.tpl"}
{else}
  {include file="./loader.tpl"}
{/if}

<script type="text/javascript">
  var url = decodeURIComponent("{$systempay_url|escape:'url':'UTF-8'}");

  if (window.top) {
    window.top.location = url;
  } else {
    window.location = url;
  }
</script>

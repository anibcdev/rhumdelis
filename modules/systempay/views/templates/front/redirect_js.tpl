{*
 * Systempay V2-Payment Module version 1.8.2 for PrestaShop 1.5-1.7. Support contact : supportvad@lyra-network.com.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2017 Lyra Network and contributors
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * @category  payment
 * @package   systempay
 *}

<script type="text/javascript">
  {if $systempay_empty_cart == true}
    {literal}
      $(document).ready(function() {
        var redirectUrl = window.location.href;
        var sep = (redirectUrl.indexOf('?') >= 0) ? '&' : '?';
        $.ajax({
          type: 'POST',
          headers: {'Cache-Control': 'no-cache'},
          url: redirectUrl + sep + 'rand=' + new Date().getTime(),
          async: true,
          cache: false,
          dataType: 'json',
          data: {
            checkCart: true,
            ajax: true
          },
          success: function(jsonData) {
            if (!jsonData.success) {
              window.location.href = jsonData.redirect;
            } else {
              $('#systempay_form').submit();
            }
          }
        });
      });
    {/literal}
  {else}
    {literal}
      $(document).ready(function() {
        $('#systempay_form').submit();
      });
    {/literal}
  {/if}
</script>

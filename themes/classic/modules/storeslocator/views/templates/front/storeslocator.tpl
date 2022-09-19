{*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<script>     
var translation_1 = "{l s='No stores were found. Please try selecting a wider radius.' mod='storeslocator' js=1}";
var img_ps_dir = "{$img_ps_dir}";
var logo_store = "{$logo_store}";
var hasStoreIcon = "{$hasStoreIcon}";
var translation_1 = "{l s='No stores were found. Please try selecting a wider radius.' mod='storeslocator' js=1}";
var translation_2 = "{l s='store found -- see details:' mod='storeslocator' js=1}";
var translation_3 = "{l s='stores found -- view all results:' mod='storeslocator' js=1}";
var translation_4 = "{l s='Phone:' mod='storeslocator' js=1}";
var translation_5 = "{l s='Get directions' mod='storeslocator'}";
var translation_6 = "{l s='Not found' mod='storeslocator' js=1}";
var defaultLat = "{$defaultLat|escape:'htmlall':'UTF-8'}";
var defaultLong = "{$defaultLong|escape:'htmlall':'UTF-8'}";
var distance_unit = "{$distance_unit|escape:'htmlall':'UTF-8'}";
var searchUrl = "{$searchUrl|escape:'htmlall':'UTF-8'}";
</script>
<!-- Block Stores Locator -->
<section class="stores_locator block">
    <div id="stores_locator" class="block">
        <div id="map-canvas"></div>
		<div class="bot"><h1>Nos points de vente en région</h1>
			<h2>Trouvez le magasin le plus près de chez vous</h2>
            <div class="formInner">
                <input type="hidden" name="controller" value="stores">
                <input type="hidden" id="storeslocatorlng" name="longitude">
                <input type="hidden" id="storeslocatorlat" name="latitude">
                <input type="hidden" id="radiusSelect" name="radiusSelect" value="{if ! isset($radius)}100{else}{$radius|escape:'htmlall':'UTF-8'}{/if}">
                <input class="form-control" type="text" id="autocomplete" name="location" placeholder="{l s='Enter your address' mod='storeslocator'}">
            </div>
        </div>
        <div class="store-content-select selector3">
            <select id="locationSelect" class="form-control">
                <option>-</option>
            </select>
        </div>
    </div>
</section>
<!-- /Block Stores Locator -->
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
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2017 PrestaShop SA
* @version   Release: $Revision: 6844 $
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}

<ul class="address item mondial-relay-addr">
	<li class="address_title">Mondial Relay</li>
	<li>
{if isset($mr_addr1) && $mr_addr1}
	<p id="dateofdelivery"><b style="text-transform:none;">{l s='Delivery to your Point Relais®' mod='mondialrelay'}</b>
		<br />{$mr_addr1|escape:'htmlall':'UTF-8'} {$mr_addr2|escape:'htmlall':'UTF-8'}
		<br />{$mr_addr3|escape:'htmlall':'UTF-8'} {$mr_addr4|escape:'htmlall':'UTF-8'}
		<br />{$mr_city|escape:'htmlall':'UTF-8'} {$mr_cp|escape:'htmlall':'UTF-8'}
		<br />{$mr_country|escape:'htmlall':'UTF-8'}</p>
{/if}	
{if $mr_url}
	<a href="{$mr_url|escape:'htmlall':'UTF-8'}" target="_blank">{l s='Follow my package on Mondial Relay website' mod='mondialrelay'}.</a>
{/if}
	</li>
</ul>
<br clear="all"/>

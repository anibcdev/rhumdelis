<?php
/**
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
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class SystempayPaypalPayment extends AbstractSystempayPayment
{
    protected $prefix = 'SYSTEMPAY_PAYPAL_';
    protected $tpl_name = 'payment_paypal.tpl';
    protected $logo = 'paypal.png';
    protected $name = 'paypal';

    /**
     * Generate form fields to post to the payment gateway.
     *
     * @param Cart $cart
     * @param array[string][string] $data
     * @return SystempayRequest
     */
    public function prepareRequest($cart, $data = array())
    {
        $request = parent::prepareRequest($cart, $data);

        // override with PayPal cards
        $test_mode = $request->get('ctx_mode') == 'TEST';
        $request->set('payment_cards', $test_mode ? 'PAYPAL_SB' : 'PAYPAL');

        return $request;
    }

    protected function getDefaultTitle()
    {
        return $this->l('Payment with Paypal');
    }
}

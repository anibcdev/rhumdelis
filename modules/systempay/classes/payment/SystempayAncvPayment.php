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

class SystempayAncvPayment extends AbstractSystempayPayment
{
    protected $prefix = 'SYSTEMPAY_ANCV_';
    protected $tpl_name = 'payment_ancv.tpl';
    protected $logo = 'e_cv.png';
    protected $name = 'ancv';

    public function validate($cart, $data = array())
    {
        $errors = parent::validate($cart, $data);
        if (!empty($errors)) {
            return $errors;
        }

        $billing_address = new Address((int)$cart->id_address_invoice);
        $billing_country = new Country((int)$billing_address->id_country);

        if ($billing_country->iso_code != 'FR') {
            $errors[] = $this->l('Country not supported by ANCV payment.');
        }

        return $errors;
    }

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

        // override with ANCV card
        $request->set('payment_cards', 'E_CV');

        return $request;
    }

    protected function getDefaultTitle()
    {
        return $this->l('Payment with ANCV');
    }
}

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

/**
 * This controller prepares form and redirects to Systempay payment gateway.
 */
class SystempayRedirectModuleFrontController extends ModuleFrontController
{
    public $ssl = true;
    private $iframe = false;
    private $logger;

    private $accepted_payment_types = array(
        'standard',
        'multi',
        'oney',
        'fullcb',
        'ancv',
        'sepa',
        'sofort',
        'paypal',
        'choozeo'
    );

    public function __construct()
    {
        $this->display_column_left = false;
        $this->display_column_right = version_compare(_PS_VERSION_, '1.6', '<');

        parent::__construct();

        $this->logger = SystempayTools::getLogger();
    }

    public function init()
    {
        $this->iframe = (int) Tools::getValue('content_only', 0) == 1;

        parent::init();
    }

    /**
     * Initializes page header variables
     */
    public function initHeader()
    {
        parent::initHeader();

        // to avoid document expired warning
        session_cache_limiter('private_no_expire');

        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    /**
     * PrestaShop 1.7 : override page name in template to use same styles as checkout page.
     * @return array
     */
    public function getTemplateVarPage()
    {
        if (method_exists(get_parent_class($this), 'getTemplateVarPage')) {
            $page = parent::getTemplateVarPage();
            $page['page_name'] = 'checkout';
            return $page;
        }

        return null;
    }

    /**
     * @see FrontController::postProcess()
     */
    public function postProcess()
    {
        $cart = $this->context->cart;

        // page to redirect to if errors
        $page = Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order';

        // check cart errors
        if (!Validate::isLoadedObject($cart) || $cart->nbProducts() <= 0) {
            $this->systempayRedirect('index.php?controller='.$page);
        } elseif (!$cart->id_customer || !$cart->id_address_delivery || !$cart->id_address_invoice || !$this->module->active) {
            if (version_compare(_PS_VERSION_, '1.7', '<') && !Configuration::get('PS_ORDER_PROCESS_TYPE')) {
                $page .= '&step=1'; // not one page checkout, goto first checkout step
            }

            $this->systempayRedirect('index.php?controller='.$page);
        }

        $type = Tools::getValue('systempay_payment_type', null); // the selected Systempay payment sub-module
        if (!$type && $this->iframe) {
            // only standard payment can be done inside iframe
            $type = 'standard';
        }

        if (!in_array($type, $this->accepted_payment_types)) {
            $this->logger->logWarning('Error: payment type "' . $type . '" is not supported. Load standard payment by default.');

            // do not log sensitive data
            $sensitive_data = array('systempay_card_number', 'systempay_cvv', 'systempay_expiry_month', 'systempay_expiry_year');
            $dataToLog = array();
            foreach ($_REQUEST as $key => $value) {
                if (in_array($key, $sensitive_data)) {
                    $dataToLog[$key] = str_repeat('*', Tools::strlen($value));
                } else {
                    $dataToLog[$key] = $value;
                }
            }

            $this->logger->logWarning('Request data : ' . print_r($dataToLog, true));

            $type = 'standard'; // force standard payment
        }

        $payment = null;
        $data = array();

        switch ($type) {
            case 'standard':
                $payment = new SystempayStandardPayment();

                if ($payment->getEntryMode() == 2 || $payment->getEntryMode() == 3) {
                    $data['card_type'] = Tools::getValue('systempay_card_type');

                    if ($payment->getEntryMode() == 3) {
                        $data['card_number'] = Tools::getValue('systempay_card_number');
                        $data['cvv'] = Tools::getValue('systempay_cvv');
                        $data['expiry_month'] = Tools::getValue('systempay_expiry_month');
                        $data['expiry_year'] = Tools::getValue('systempay_expiry_year');
                    }
                } elseif ($payment->getEntryMode() == 4) {
                    $data['iframe_mode'] = true;
                }

                break;

            case 'multi':
                $data['opt'] = Tools::getValue('systempay_opt');
                $data['card_type'] = Tools::getValue('systempay_card_type');

                $payment = new SystempayMultiPayment();
                break;

            case 'oney':
                $payment = new SystempayOneyPayment();

                $data['opt'] = Tools::getValue('systempay_oney_option');
                break;

            case 'fullcb':
                $payment = new SystempayFullcbPayment();

                $data['card_type'] = Tools::getValue('systempay_card_type');
                break;

            case 'ancv':
                $payment = new SystempayAncvPayment();
                break;

            case 'sepa':
                $payment = new SystempaySepaPayment();
                break;

            case 'sofort':
                $payment = new SystempaySofortPayment();
                break;

            case 'paypal':
                $payment = new SystempayPaypalPayment();
                break;

            case 'choozeo':
                $payment = new SystempayChoozeoPayment();

                $data['card_type'] = Tools::getValue('systempay_card_type');
                break;
        }

        // validate payment data
        $errors = $payment->validate($cart, $data);
        if (!empty($errors)) {
            $this->context->cookie->systempayPayErrors = implode("\n", $errors);

            if (version_compare(_PS_VERSION_, '1.7', '<') && !Configuration::get('PS_ORDER_PROCESS_TYPE')) {
                $page .= '&step=3';

                if (version_compare(_PS_VERSION_, '1.5.1', '<')) {
                    $page .= '&cgv=1&id_carrier='.$cart->id_carrier;
                }
            }

            $this->systempayRedirect('index.php?controller='.$page);
        }

        if (Configuration::get('SYSTEMPAY_CART_MANAGEMENT') != SystempayTools::KEEP_CART) {
            unset($this->context->cookie->id_cart); // to avoid double call to this page
        }

        // prepare data for Systempay payment form
        $request = $payment->prepareRequest($cart, $data);
        $fields = $request->getRequestFieldsArray(false, false /* data escape will be done in redirect template */);

        $dataToLog = $request->getRequestFieldsArray(true, false);
        $this->logger->logInfo('Data to be sent to payment gateway : ' . print_r($dataToLog, true));

        $this->context->smarty->assign('systempay_params', $fields);
        $this->context->smarty->assign('systempay_url', $request->get('platform_url'));
        $this->context->smarty->assign('systempay_logo', _MODULE_DIR_.'systempay/views/img/'.$payment->getLogo());
        $this->context->smarty->assign('systempay_title', $request->get('order_info'));

        if ($this->iframe) {
            $this->setTemplate(SystempayTools::getTemplatePath('iframe/redirect.tpl'));
        } else {
            if (version_compare(_PS_VERSION_, '1.7', '>=')) {
                $this->setTemplate('module:systempay/views/templates/front/redirect.tpl');
            } else {
                $this->setTemplate('redirect_bc.tpl');
            }
        }
    }

    private function systempayRedirect($url)
    {
        if ($this->iframe) {
            // iframe mode, use template to redirect to top window
            $this->context->smarty->assign('systempay_url', SystempayTools::getPageLink($url));
            $this->setTemplate(SystempayTools::getTemplatePath('iframe/response.tpl'));
        } else {
            Tools::redirect($url);
        }
    }
}

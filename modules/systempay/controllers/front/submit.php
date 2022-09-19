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
 * This controller manages return from Systempay payment gateway.
 */
class SystempaySubmitModuleFrontController extends ModuleFrontController
{

    public $ssl = true;

    private $currentCart;
    private $iframe = false;
    private $logger;

    public function __construct()
    {
        parent::__construct();

        $this->logger = SystempayTools::getLogger();
    }

    public function postProcess()
    {
        $this->iframe = (int)Tools::getValue('content_only', 0) == 1;

        if ($this->iframe) {
            unset($this->context->cookie->systempayCartId); // used in iframe mode
        }

        $cart_id = Tools::getValue('vads_order_id');
        $this->currentCart = new Cart((int)$cart_id);

        $this->logger->logInfo("User return to shop process starts for cart #$cart_id.");

        // page to redirect to if errors
        $page = Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order';

        // check cart errors
        if (!Validate::isLoadedObject($this->currentCart) || $this->currentCart->nbProducts() <= 0) {
            $this->logger->logWarning("Cart is empty, redirect to cart page. Cart ID: $cart_id.");

            $this->systempayRedirect('index.php?controller='.$page);
        }

        if (!$this->currentCart->id_customer || !$this->currentCart->id_address_delivery ||
            !$this->currentCart->id_address_invoice || !$this->module->active) {
            $this->logger->logWarning("No address selected for customer or module disabled, redirect to first checkout step. Cart ID: $cart_id.");

            if (version_compare(_PS_VERSION_, '1.7', '<') && !Configuration::get('PS_ORDER_PROCESS_TYPE')) {
                $page .= '&step=1'; // not one page checkout, goto first checkout step
            }

            $this->systempayRedirect('index.php?controller='.$page);
        }

        $this->processPaymentReturn();
    }

    private function processPaymentReturn()
    {
        require_once _PS_MODULE_DIR_.'systempay/classes/SystempayResponse.php';

        /** @var SystempayResponse $response */
        $response = new SystempayResponse(
            $_REQUEST,
            Configuration::get('SYSTEMPAY_MODE'),
            Configuration::get('SYSTEMPAY_KEY_TEST'),
            Configuration::get('SYSTEMPAY_KEY_PROD'),
            Configuration::get('SYSTEMPAY_SIGN_ALGO')
        );

        $cart_id = $this->currentCart->id;

        // check the authenticity of the request
        if (!$response->isAuthentified()) {
            $ip = Tools::getRemoteAddr();
            $this->logger->logError("{$ip} tries to access module/systempay/submit page without valid signature with parameters: ".print_r($_REQUEST, true));
            $this->logger->logError('Signature algorithm selected in module settings must be the same as one selected in Systempay Back Office.');

            Tools::redirectLink('index.php');
        }

        // search order in db
        $order_id = Order::getOrderByCartId($cart_id);

        if ($order_id == false) {
            // order has not been processed yet

            $new_state = (int)Systempay::nextOrderState($response);

            if ($response->isAcceptedPayment()) {
                $this->logger->logWarning("Payment for cart #$cart_id has been processed by client return ! This means the IPN URL did not work.");
                $this->logger->logInfo("Payment accepted for cart #$cart_id. New order state is $new_state.");

                $order = $this->module->saveOrder($this->currentCart, $new_state, $response);

                // redirect to success page
                $this->redirectSuccess($order, $this->module->id, true);
            } else {
                // payment KO

                $save_on_failure = (Configuration::get('SYSTEMPAY_FAILURE_MANAGEMENT') == SystempayTools::ON_FAILURE_SAVE);
                if ($save_on_failure || Systempay::isOney($response)) {
                    // save on failure option is selected or oney payment : save order and go to history page
                    $this->logger->logWarning("Payment for order #$cart_id has been processed by client return ! This means the IPN URL did not work.");

                    $msg = Systempay::isOney($response) ? 'FacilyPay Oney payment' : 'Save on failure option is selected';
                    $this->logger->logInfo("$msg : save failed order for cart #$cart_id. New order state is $new_state.");

                    $order = $this->module->saveOrder($this->currentCart, $new_state, $response);

                    $this->logger->logInfo("Redirect to history page, cart ID : #$cart_id.");
                    $this->systempayRedirect('index.php?controller=history');
                } else {
                    $this->context->cookie->id_cart = $cart_id;

                    // option 2 choosen : get back to checkout process
                    $this->logger->logInfo("Payment failed, redirect to order checkout page, cart ID : #$cart_id.");

                    if (!$response->isCancelledPayment()) {
                        // ... and show message if not cancelled
                        $this->context->cookie->systempayPayErrors = $this->module->l('Your payment was not accepted. Please, try to re-order.', 'submit');
                    }

                    $page = Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order';
                    if (version_compare(_PS_VERSION_, '1.7', '<') && !Configuration::get('PS_ORDER_PROCESS_TYPE')) {
                        $page .= '&step=3';

                        if (version_compare(_PS_VERSION_, '1.5.1', '<')) {
                            $page .= '&cgv=1&id_carrier='.$this->currentCart->id_carrier;
                        }
                    }

                    $this->systempayRedirect('index.php?controller='.$page);
                }
            }
        } else {
            // order already registered
            $this->logger->logInfo("Order already registered for cart #$cart_id.");

            $order = new Order((int)$order_id);
            $old_state = (int)$order->getCurrentState();

            $this->logger->logInfo("The current state for order corresponding to cart #$cart_id is ($old_state).");

            $outofstock = Systempay::isOutOfStock($order);
            $new_state = (int)Systempay::nextOrderState($response, false, $outofstock);

            // for PrestaShop < 1.6.1, expect either original "Out of stock" state or ours to check order consistency
            $bc_os_state_valid = $outofstock;
            if (!Configuration::get('PS_OS_OUTOFSTOCK_PAID')) {
                $bc_os_state_valid &= Systempay::isStateInArray($new_state, array('PS_OS_OUTOFSTOCK', 'SYSTEMPAY_OS_PAYMENT_OUTOFSTOCK'));
            }

            if (($old_state === $new_state) || $bc_os_state_valid) {
                // no changes, just display a confirmation message
                $this->logger->logInfo("No changes for order associated with cart #$cart_id, order remains in state ($old_state).");

                if ($response->isAcceptedPayment()) {
                    // just display a confirmation message
                    $this->logger->logInfo("Payment success confirmed for cart #$cart_id.");
                    $this->redirectSuccess($order);
                } else {
                    // just redirect to order history page
                    $this->logger->logInfo("Payment failure confirmed for cart #$cart_id.");
                    $this->systempayRedirect('index.php?controller=history');
                }
            } elseif (Systempay::isStateInArray($old_state, Systempay::getManagedStates())) {
                if (($old_state == Configuration::get('PS_OS_ERROR')) && $response->isAcceptedPayment() && Systempay::hasAmountError($order)) {
                    // amount paid not equals initial amount.
                    $this->logger->logWarning(
                        "Error: amount paid {$order->total_paid_real} not equals initial amount {$order->total_paid}. Order is in a failed state, cart #$cart_id."
                    );
                    $this->redirectSuccess($order);
                } else {
                    // order is in a pending state, payment is not pending : error case
                    $this->logger->logWarning("Error: inconsistent order state ($old_state) and payment result ({$response->getTransStatus()}), cart ID : #$cart_id.");
                    $this->systempayRedirect(
                        'index.php?controller=order-confirmation&id_cart='.$cart_id.'&id_module='.$this->module->id.
                        '&id_order='.$order->id.'&key='.$order->secure_key.'&error=yes'
                    );
                }
            } else {
                $this->logger->logWarning("Unknown order state ID ($old_state) for cart #$cart_id. Managed by merchant.");

                if ($response->isAcceptedPayment()) {
                    // redirect to success page
                    $this->logger->logInfo("Payment success for cart #$cart_id. Redirect to success page.");
                    $this->redirectSuccess($order);
                } else {
                    $this->logger->logInfo("Payment failure for cart #$cart_id. Redirect to history page.");
                    $this->systempayRedirect('index.php?controller=history');
                }
            }
        }
    }

    private function redirectSuccess($order, $check = false)
    {
        // display a confirmation message
        $link = 'index.php?controller=order-confirmation&id_cart='.$order->id_cart.'&id_module='.$this->module->id.
             '&id_order='.$order->id.'&key='.$order->secure_key;

        // amount paid not equals initial amount. Error !
        if (Systempay::hasAmountError($order)) {
            $link .= '&error=yes';
        }

        if (Configuration::get('SYSTEMPAY_MODE') == 'TEST') {
            if ($check) {
                // TEST mode (user is the webmaster) : IPN did not work, so we display a warning
                $link .= '&check_url_warn=yes';
            }

            if (SystempayTools::$plugin_features['prodfaq']) {
                $link .= '&prod_info=yes';
            }
        }

        $this->systempayRedirect($link);
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

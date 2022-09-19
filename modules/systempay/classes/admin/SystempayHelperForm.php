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

/**
 * Class that renders Systempay payment module administration interface.
 */
class SystempayHelperForm
{
    private function __construct()
    {
        // do not instantiate this class
    }

    public static function getAdminFormContext()
    {
        $context = Context::getContext();

        /* @var Systempay */
        $systempay = Module::getInstanceByName('systempay');

        $languages = array();
        foreach (SystempayApi::getSupportedLanguages() as $code => $label) {
            $languages[$code] = $systempay->l($label, 'systempayhelperform');
        }
        asort($languages);

        $category_options = array(
            'FOOD_AND_GROCERY' => $systempay->l('Food and grocery', 'systempayhelperform'),
            'AUTOMOTIVE' => $systempay->l('Automotive', 'systempayhelperform'),
            'ENTERTAINMENT' => $systempay->l('Entertainment', 'systempayhelperform'),
            'HOME_AND_GARDEN' => $systempay->l('Home and garden', 'systempayhelperform'),
            'HOME_APPLIANCE' => $systempay->l('Home appliance', 'systempayhelperform'),
            'AUCTION_AND_GROUP_BUYING' => $systempay->l('Auction and group buying', 'systempayhelperform'),
            'FLOWERS_AND_GIFTS' => $systempay->l('Flowers and gifts', 'systempayhelperform'),
            'COMPUTER_AND_SOFTWARE' => $systempay->l('Computer and software', 'systempayhelperform'),
            'HEALTH_AND_BEAUTY' => $systempay->l('Health and beauty', 'systempayhelperform'),
            'SERVICE_FOR_INDIVIDUAL' => $systempay->l('Service for individual', 'systempayhelperform'),
            'SERVICE_FOR_BUSINESS' => $systempay->l('Service for business', 'systempayhelperform'),
            'SPORTS' => $systempay->l('Sports', 'systempayhelperform'),
            'CLOTHING_AND_ACCESSORIES' => $systempay->l('Clothing and accessories', 'systempayhelperform'),
            'TRAVEL' => $systempay->l('Travel', 'systempayhelperform'),
            'HOME_AUDIO_PHOTO_VIDEO' => $systempay->l('Home audio, photo, video', 'systempayhelperform'),
            'TELEPHONY' => $systempay->l('Telephony', 'systempayhelperform')
        );

        // get documentation links
        $doc_files = array();
        $filenames = glob(_PS_MODULE_DIR_.'systempay/installation_doc/Systempay_PrestaShop_1.5-1.7_v1.10.1*.pdf');

        $doc_languages = array(
            'fr' => 'Français',
            'en' => 'English',
            'es' => 'Español'
            // complete when other languages are managed
        );

        foreach ($filenames as $filename) {
            $base_filename = basename($filename, '.pdf');
            $lang = Tools::substr($base_filename, -2); // extract language code

            $doc_files[$base_filename.'.pdf'] = $doc_languages[$lang];
        }

        $tpl_vars = array(
            'systempay_plugin_features' => SystempayTools::$plugin_features,
            'systempay_request_uri' => $_SERVER['REQUEST_URI'],

            'systempay_doc_files' => $doc_files,
            'systempay_enable_disable_options' => array(
                'False' => $systempay->l('Disabled', 'systempayhelperform'),
                'True' => $systempay->l('Enabled', 'systempayhelperform')
            ),
            'systempay_mode_options' => array(
                'TEST' => $systempay->l('TEST', 'systempayhelperform'),
                'PRODUCTION' => $systempay->l('PRODUCTION', 'systempayhelperform')
            ),
            'systempay_language_options' => $languages,
            'systempay_validation_mode_options' => array(
                '' => $systempay->l('Back office configuration', 'systempayhelperform'),
                '0' => $systempay->l('Automatic', 'systempayhelperform'),
                '1' => $systempay->l('Manual', 'systempayhelperform')
            ),
            'systempay_payment_cards_options' => array('' => $systempay->l('ALL', 'systempayhelperform')) + SystempayTools::getSupportedCardTypes(),
            'systempay_multi_payment_cards_options' => array('' => $systempay->l('ALL', 'systempayhelperform')) + SystempayTools::getSupportedMultiCardTypes(),
            'systempay_category_options' => $category_options,
            'systempay_yes_no_options' => array(
                'False' => $systempay->l('No', 'systempayhelperform'),
                'True' => $systempay->l('Yes', 'systempayhelperform')
            ),
            'systempay_delivery_type_options' => array(
                'PACKAGE_DELIVERY_COMPANY' => $systempay->l('Delivery company', 'systempayhelperform'),
                'RECLAIM_IN_SHOP' => $systempay->l('Reclaim in shop', 'systempayhelperform'),
                'RELAY_POINT' => $systempay->l('Relay point', 'systempayhelperform'),
                'RECLAIM_IN_STATION' => $systempay->l('Reclaim in station', 'systempayhelperform')
            ),
            'systempay_delivery_speed_options' => array(
                'STANDARD' => $systempay->l('Standard', 'systempayhelperform'),
                'EXPRESS' => $systempay->l('Express', 'systempayhelperform'),
                'PRIORITY' => $systempay->l('Priority', 'systempayhelperform')
            ),
            'systempay_delivery_delay_options' => array(
                'INFERIOR_EQUALS' => $systempay->l('<= 1 hour', 'systempayhelperform'),
                'SUPERIOR' => $systempay->l('> 1 hour', 'systempayhelperform'),
                'IMMEDIATE' => $systempay->l('Immediate', 'systempayhelperform'),
                'ALWAYS' => $systempay->l('24/7', 'systempayhelperform')
            ),
            'systempay_failure_management_options' => array(
                SystempayTools::ON_FAILURE_RETRY => $systempay->l('Go back to checkout', 'systempayhelperform'),
                SystempayTools::ON_FAILURE_SAVE => $systempay->l('Save order and go back to order history', 'systempayhelperform')
            ),
            'systempay_cart_management_options' => array(
                SystempayTools::EMPTY_CART => $systempay->l('Empty cart to avoid amount errors', 'systempayhelperform'),
                SystempayTools::KEEP_CART => $systempay->l('Keep cart (PrestaShop default behavior)', 'systempayhelperform')
            ),
            'systempay_card_data_mode_options' => array(
                '1' => $systempay->l('Bank data acquisition on payment gateway', 'systempayhelperform'),
                '2' => $systempay->l('Card type selection on merchant site', 'systempayhelperform'),
                '3' => $systempay->l('Bank data acquisition on merchant site', 'systempayhelperform'),
                '4' => $systempay->l('Payment page integrated to checkout process (iframe mode)', 'systempayhelperform')
            ),
            'systempay_card_selection_mode_options' => array(
                '1' => $systempay->l('On payment gateway', 'systempayhelperform'),
                '2' => $systempay->l('On merchant site', 'systempayhelperform')
            ),
            'systempay_default_multi_option' => array(
                'label' => '',
                'min_amount' => '',
                'max_amount' => '',
                'contract' => '',
                'count' => '',
                'period' => '',
                'first' => ''
            ),
            'systempay_default_oney_option' => array(
                'label' => '',
                'code' => '',
                'min_amount' => '',
                'max_amount' => '',
                'count' => '',
                'rate' => ''
            ),

            'prestashop_categories' => Category::getCategories((int)$context->language->id, true, false),
            'prestashop_languages' => Language::getLanguages(false),
            'prestashop_lang' => Language::getLanguage((int)$context->language->id),
            'prestashop_carriers' => Carrier::getCarriers(
                (int)$context->language->id,
                true,
                false,
                false,
                null,
                Carrier::ALL_CARRIERS
            ),
            'prestashop_groups' => self::getAuthorizedGroups(),

            'SYSTEMPAY_ENABLE_LOGS' => Configuration::get('SYSTEMPAY_ENABLE_LOGS'),

            'SYSTEMPAY_SITE_ID' => Configuration::get('SYSTEMPAY_SITE_ID'),
            'SYSTEMPAY_KEY_TEST' => Configuration::get('SYSTEMPAY_KEY_TEST'),
            'SYSTEMPAY_KEY_PROD' => Configuration::get('SYSTEMPAY_KEY_PROD'),
            'SYSTEMPAY_MODE' => Configuration::get('SYSTEMPAY_MODE'),
            'SYSTEMPAY_SIGN_ALGO' => Configuration::get('SYSTEMPAY_SIGN_ALGO'),
            'SYSTEMPAY_PLATFORM_URL' => Configuration::get('SYSTEMPAY_PLATFORM_URL'),
            'SYSTEMPAY_NOTIFY_URL' => self::getIpnUrl(),

            'SYSTEMPAY_DEFAULT_LANGUAGE' => Configuration::get('SYSTEMPAY_DEFAULT_LANGUAGE'),
            'SYSTEMPAY_AVAILABLE_LANGUAGES' => !Configuration::get('SYSTEMPAY_AVAILABLE_LANGUAGES') ?
                                            array('') :
                                            explode(';', Configuration::get('SYSTEMPAY_AVAILABLE_LANGUAGES')),
            'SYSTEMPAY_DELAY' => Configuration::get('SYSTEMPAY_DELAY'),
            'SYSTEMPAY_VALIDATION_MODE' => Configuration::get('SYSTEMPAY_VALIDATION_MODE'),

            'SYSTEMPAY_THEME_CONFIG' => Configuration::get('SYSTEMPAY_THEME_CONFIG'),
            'SYSTEMPAY_SHOP_NAME' => Configuration::get('SYSTEMPAY_SHOP_NAME'),
            'SYSTEMPAY_SHOP_URL' => Configuration::get('SYSTEMPAY_SHOP_URL'),

            'SYSTEMPAY_3DS_MIN_AMOUNT' => self::getArrayConfig('SYSTEMPAY_3DS_MIN_AMOUNT'),

            'SYSTEMPAY_REDIRECT_ENABLED' => Configuration::get('SYSTEMPAY_REDIRECT_ENABLED'),
            'SYSTEMPAY_REDIRECT_SUCCESS_T' => Configuration::get('SYSTEMPAY_REDIRECT_SUCCESS_T'),
            'SYSTEMPAY_REDIRECT_SUCCESS_M' => self::getLangConfig('SYSTEMPAY_REDIRECT_SUCCESS_M'),
            'SYSTEMPAY_REDIRECT_ERROR_T' => Configuration::get('SYSTEMPAY_REDIRECT_ERROR_T'),
            'SYSTEMPAY_REDIRECT_ERROR_M' => self::getLangConfig('SYSTEMPAY_REDIRECT_ERROR_M'),
            'SYSTEMPAY_RETURN_MODE' => Configuration::get('SYSTEMPAY_RETURN_MODE'),
            'SYSTEMPAY_FAILURE_MANAGEMENT' => Configuration::get('SYSTEMPAY_FAILURE_MANAGEMENT'),
            'SYSTEMPAY_CART_MANAGEMENT' => Configuration::get('SYSTEMPAY_CART_MANAGEMENT'),

            'SYSTEMPAY_COMMON_CATEGORY' => Configuration::get('SYSTEMPAY_COMMON_CATEGORY'),
            'SYSTEMPAY_CATEGORY_MAPPING' => self::getArrayConfig('SYSTEMPAY_CATEGORY_MAPPING'),
            'SYSTEMPAY_SEND_SHIP_DATA' => Configuration::get('SYSTEMPAY_SEND_SHIP_DATA'),
            'SYSTEMPAY_ONEY_SHIP_OPTIONS' => self::getArrayConfig('SYSTEMPAY_ONEY_SHIP_OPTIONS'),

            'SYSTEMPAY_STD_TITLE' => self::getLangConfig('SYSTEMPAY_STD_TITLE'),
            'SYSTEMPAY_STD_ENABLED' => Configuration::get('SYSTEMPAY_STD_ENABLED'),
            'SYSTEMPAY_STD_AMOUNTS' => self::getArrayConfig('SYSTEMPAY_STD_AMOUNTS'),
            'SYSTEMPAY_STD_DELAY' => Configuration::get('SYSTEMPAY_STD_DELAY'),
            'SYSTEMPAY_STD_VALIDATION' => Configuration::get('SYSTEMPAY_STD_VALIDATION'),
            'SYSTEMPAY_STD_PAYMENT_CARDS' => !Configuration::get('SYSTEMPAY_STD_PAYMENT_CARDS') ?
                                            array('') :
                                            explode(';', Configuration::get('SYSTEMPAY_STD_PAYMENT_CARDS')),
            'SYSTEMPAY_STD_PROPOSE_ONEY' => Configuration::get('SYSTEMPAY_STD_PROPOSE_ONEY'),
            'SYSTEMPAY_STD_CARD_DATA_MODE' => Configuration::get('SYSTEMPAY_STD_CARD_DATA_MODE'),

            'SYSTEMPAY_MULTI_TITLE' => self::getLangConfig('SYSTEMPAY_MULTI_TITLE'),
            'SYSTEMPAY_MULTI_ENABLED' => Configuration::get('SYSTEMPAY_MULTI_ENABLED'),
            'SYSTEMPAY_MULTI_AMOUNTS' => self::getArrayConfig('SYSTEMPAY_MULTI_AMOUNTS'),
            'SYSTEMPAY_MULTI_DELAY' => Configuration::get('SYSTEMPAY_MULTI_DELAY'),
            'SYSTEMPAY_MULTI_VALIDATION' => Configuration::get('SYSTEMPAY_MULTI_VALIDATION'),
            'SYSTEMPAY_MULTI_CARD_MODE' => Configuration::get('SYSTEMPAY_MULTI_CARD_MODE'),
            'SYSTEMPAY_MULTI_PAYMENT_CARDS' => !Configuration::get('SYSTEMPAY_MULTI_PAYMENT_CARDS') ?
                                            array('') :
                                            explode(';', Configuration::get('SYSTEMPAY_MULTI_PAYMENT_CARDS')),
            'SYSTEMPAY_MULTI_OPTIONS' => self::getArrayConfig('SYSTEMPAY_MULTI_OPTIONS'),

            'SYSTEMPAY_ANCV_TITLE' => self::getLangConfig('SYSTEMPAY_ANCV_TITLE'),
            'SYSTEMPAY_ANCV_ENABLED' => Configuration::get('SYSTEMPAY_ANCV_ENABLED'),
            'SYSTEMPAY_ANCV_AMOUNTS' => self::getArrayConfig('SYSTEMPAY_ANCV_AMOUNTS'),
            'SYSTEMPAY_ANCV_DELAY' => Configuration::get('SYSTEMPAY_ANCV_DELAY'),
            'SYSTEMPAY_ANCV_VALIDATION' => Configuration::get('SYSTEMPAY_ANCV_VALIDATION'),

            'SYSTEMPAY_ONEY_TITLE' => self::getLangConfig('SYSTEMPAY_ONEY_TITLE'),
            'SYSTEMPAY_ONEY_ENABLED' => Configuration::get('SYSTEMPAY_ONEY_ENABLED'),
            'SYSTEMPAY_ONEY_AMOUNTS' => self::getArrayConfig('SYSTEMPAY_ONEY_AMOUNTS'),
            'SYSTEMPAY_ONEY_DELAY' => Configuration::get('SYSTEMPAY_ONEY_DELAY'),
            'SYSTEMPAY_ONEY_VALIDATION' => Configuration::get('SYSTEMPAY_ONEY_VALIDATION'),
            'SYSTEMPAY_ONEY_ENABLE_OPTIONS' => Configuration::get('SYSTEMPAY_ONEY_ENABLE_OPTIONS'),
            'SYSTEMPAY_ONEY_OPTIONS' => self::getArrayConfig('SYSTEMPAY_ONEY_OPTIONS'),

            'SYSTEMPAY_FULLCB_TITLE' => self::getLangConfig('SYSTEMPAY_FULLCB_TITLE'),
            'SYSTEMPAY_FULLCB_ENABLED' => Configuration::get('SYSTEMPAY_FULLCB_ENABLED'),
            'SYSTEMPAY_FULLCB_AMOUNTS' => self::getArrayConfig('SYSTEMPAY_FULLCB_AMOUNTS'),
            'SYSTEMPAY_FULLCB_ENABLE_OPTS' => Configuration::get('SYSTEMPAY_FULLCB_ENABLE_OPTS'),
            'SYSTEMPAY_FULLCB_OPTIONS' => self::getArrayConfig('SYSTEMPAY_FULLCB_OPTIONS'),

            'SYSTEMPAY_SEPA_TITLE' => self::getLangConfig('SYSTEMPAY_SEPA_TITLE'),
            'SYSTEMPAY_SEPA_ENABLED' => Configuration::get('SYSTEMPAY_SEPA_ENABLED'),
            'SYSTEMPAY_SEPA_AMOUNTS' => self::getArrayConfig('SYSTEMPAY_SEPA_AMOUNTS'),
            'SYSTEMPAY_SEPA_DELAY' => Configuration::get('SYSTEMPAY_SEPA_DELAY'),
            'SYSTEMPAY_SEPA_VALIDATION' => Configuration::get('SYSTEMPAY_SEPA_VALIDATION'),

            'SYSTEMPAY_SOFORT_TITLE' => self::getLangConfig('SYSTEMPAY_SOFORT_TITLE'),
            'SYSTEMPAY_SOFORT_ENABLED' => Configuration::get('SYSTEMPAY_SOFORT_ENABLED'),
            'SYSTEMPAY_SOFORT_AMOUNTS' => self::getArrayConfig('SYSTEMPAY_SOFORT_AMOUNTS'),

            'SYSTEMPAY_PAYPAL_TITLE' => self::getLangConfig('SYSTEMPAY_PAYPAL_TITLE'),
            'SYSTEMPAY_PAYPAL_ENABLED' => Configuration::get('SYSTEMPAY_PAYPAL_ENABLED'),
            'SYSTEMPAY_PAYPAL_AMOUNTS' => self::getArrayConfig('SYSTEMPAY_PAYPAL_AMOUNTS'),
            'SYSTEMPAY_PAYPAL_DELAY' => Configuration::get('SYSTEMPAY_PAYPAL_DELAY'),
            'SYSTEMPAY_PAYPAL_VALIDATION' => Configuration::get('SYSTEMPAY_PAYPAL_VALIDATION'),

            'SYSTEMPAY_CHOOZEO_TITLE' => self::getLangConfig('SYSTEMPAY_CHOOZEO_TITLE'),
            'SYSTEMPAY_CHOOZEO_ENABLED' => Configuration::get('SYSTEMPAY_CHOOZEO_ENABLED'),
            'SYSTEMPAY_CHOOZEO_AMOUNTS' => self::getArrayConfig('SYSTEMPAY_CHOOZEO_AMOUNTS'),
            'SYSTEMPAY_CHOOZEO_DELAY' => Configuration::get('SYSTEMPAY_CHOOZEO_DELAY'),
            'SYSTEMPAY_CHOOZEO_OPTIONS' => self::getArrayConfig('SYSTEMPAY_CHOOZEO_OPTIONS')
        );

        if (!SystempayTools::$plugin_features['acquis']) {
            unset($tpl_vars['systempay_card_data_mode_options']['3']);
        }

        return $tpl_vars;
    }

    private static function getIpnUrl()
    {
        $shop = new Shop(Configuration::get('PS_SHOP_DEFAULT'));

        // ssl enabled on default shop ?
        $id_shop_group = isset($shop->id_shop_group) ? $shop->id_shop_group : $shop->id_group_shop;
        $ssl = Configuration::get('PS_SSL_ENABLED', null, $id_shop_group, $shop->id);

        $ipn = ($ssl ? 'https://'.$shop->domain_ssl : 'http://'.$shop->domain)
               .$shop->getBaseURI().'modules/systempay/validation.php';

        return $ipn;
    }

    private static function getArrayConfig($name)
    {
        $value = @unserialize(Configuration::get($name));

        if (!is_array($value)) {
            $value = array();
        }

        return $value;
    }

    private static function getLangConfig($name)
    {
        $languages = Language::getLanguages(false);

        $result = array();
        foreach ($languages as $language) {
            $result[$language['id_lang']] = Configuration::get($name, $language['id_lang']);
        }

        return $result;
    }

    private static function getAuthorizedGroups()
    {
        $context = Context::getContext();

        /* @var Systempay */
        $systempay = Module::getInstanceByName('systempay');

        $sql = 'SELECT DISTINCT gl.`id_group`, gl.`name` FROM `'._DB_PREFIX_.'group_lang` AS gl
            INNER JOIN `'._DB_PREFIX_.'module_group` AS mg
            ON (
                gl.`id_group` = mg.`id_group`
                AND mg.`id_module` = '.(int)$systempay->id.'
                AND mg.`id_shop` = '.(int)$context->shop->id.'
            )
            WHERE gl.`id_lang` = '.(int)$context->language->id;

        return Db::getInstance()->executeS($sql);
    }
}

<?php
/**
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
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class StoresLocator extends Module
{
    public function __construct()
    {
        $this->name                   = 'storeslocator';
        $this->tab                    = 'front_office_features';
        $this->version                = '1.0.2';
        $this->author                 = 'Codik';
        $this->need_instance          = 0;
        $this->ps_versions_compliancy = array(
            'min' => '1.4.0.1'
        );
        $this->bootstrap              = true;
        $this->module_key = '6c16e5978fe53f8bd10432e4c12c2d56';
        
        parent::__construct();
        
        $this->displayName = $this->l('Stores Locator');
        $this->description = $this->l('Display a block to let the user to find the store next to him');
        
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
        
        if (!Configuration::get('storeslocator')) {
            $this->warning = $this->l('No name provided');
        }
    }
    
    public function __call($method, $args)
    {
        //if method exists
        if (function_exists($method)) {
            return call_user_func_array($method, $args);
        }
        
        //if head hook: add the css and js files
        if ($method == 'hookDisplayHeader') {
            return $this->hookDisplayHeader($args[0]);
        }
        
        //check for a call to an hook
        if (strpos($method, 'hook') !== false) {
            return $this->genericHookMethod($args[0]);
        }
    }
    
    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        
        return parent::install() && Configuration::updateValue('storeslocator', 'storeslocator');
    }
    
    public function getContent()
    {
        return $this->postProcess() . $this->renderForm();
    }
    
    public function renderForm()
    {
        
        $distance_unit = Configuration::get('PS_DISTANCE_UNIT');
        if (!in_array($distance_unit, array(
            'km',
            'mi'
        ))) {
            $distance_unit = 'km';
        }
        
        $fields_form            = array();
        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Configuration'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Enter the searched radius in') . ' ' . $distance_unit,
                    'required' => false,
                    'name' => 'radius'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Enter the Google Maps Api Key'),
                    'required' => true,
                    'name' => 'googlemapsapikey'
                )
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'button',
                'name' => 'submitConf'
            )
        );
        
        $helper                           = new HelperForm();
        $helper->show_toolbar             = false;
        $helper->table                    = $this->table;
        $lang                             = new Language((int) Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language    = $lang->id;
        $helper->module                   = $this;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->identifier               = $this->identifier;
        $helper->submit_action            = 'submitConf';
        $helper->currentIndex             = $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token                    = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars                 = array(
            'id_language' => $this->context->language->id
        );
        $helper->fields_value['radius']   = Configuration::get('stores_locator_radius');
        $helper->fields_value['googlemapsapikey']   = Configuration::get('google_maps_api_key');
        
        return $helper->generateForm($fields_form);
    }
    
    public function postProcess()
    {
        if (Tools::isSubmit('submitConf')) {
            Configuration::updateValue('stores_locator_radius', Tools::getValue('radius'));
            Configuration::updateValue('google_maps_api_key', Tools::getValue('googlemapsapikey'));
        }
    }
    
    public function hookDisplayHeader()
    {
       //$this->context->controller->registerJavascript('module-storeslocator-js','https://maps.googleapis.com/maps/api/js?key='.Configuration::get('google_maps_api_key').'&v=3.exp&libraries=places',['priority' => 200, 'attribute' => 'async']);
       $this->context->controller->registerJavascript('remote-bootstrap', 'https://maps.googleapis.com/maps/api/js?key='.Configuration::get('google_maps_api_key').'&v=3.exp&libraries=places', ['server' => 'remote', 'position' => 'bottom', 'priority' => 200]);
       $this->context->controller->registerJavascript('module-storeslocator-js', $this->_path . 'views/js/storeslocator.js', ['server' => 'remote', 'position' => 'bottom', 'priority' => 150]);
       //$this->context->controller->addJS($this->_path . 'views/js/storeslocator.js');
       $this->context->controller->registerStylesheet(
            'module-storeslocator-style',
            'modules/'.$this->name.'/views/css/storeslocator.css',
            [
              'media' => 'all',
              'priority' => 200,
            ]
        );
    }
    
    public function genericHookMethod()
    {            
        $distance_unit = Configuration::get('PS_DISTANCE_UNIT');
        if (!in_array($distance_unit, array(
            'km',
            'mi'
        ))) {
            $distance_unit = 'km';
        }
        
        $this->context->smarty->assign('hasStoreIcon', file_exists(_PS_IMG_DIR_ . Configuration::get('PS_STORES_ICON')));
        
        $this->context->smarty->assign(array(
            'mediumSize' => Image::getSize(ImageType::getFormatedName('medium')),
            'defaultLat' => (float) Configuration::get('PS_STORES_CENTER_LAT'),
            'defaultLong' => (float) Configuration::get('PS_STORES_CENTER_LONG'),
            'searchUrl' => $this->context->link->getPageLink('stores'),
            'logo_store' => Configuration::get('PS_STORES_ICON'),
            'distance_unit' => $distance_unit,
            'logo_store' => Configuration::get('PS_STORES_ICON'),
            'searchUrl' => $this->context->link->getPageLink('stores'),
            'radius' => Configuration::get('stores_locator_radius'),
            'googlemapsapikey' => Configuration::get('google_maps_api_key'),
            'img_ps_dir' => 'http://'.Tools::getMediaServer(_PS_IMG_)._PS_IMG_
        ));
        
        return $this->display(__FILE__, 'storeslocator.tpl');
    }
}

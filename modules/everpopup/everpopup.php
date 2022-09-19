<?php
/**
 * Project : everpopup
 * @author Team Ever
 * @link http://team-ever.com
 * @copyright Team Ever
 * @license   Tous droits réservés / Le droit d'auteur s'applique (All rights reserved / French copyright law applies)
 */

if (!defined('_PS_VERSION_'))
	exit;

class Everpopup extends Module
{
	public function __construct()
	{
		$this->name = 'everpopup';
		$this->tab = 'front_office_features';
		$this->version = '1.2.2';
		$this->author = 'Team Ever';
		$this->need_instance = 0;
		$this->bootstrap = true;

		parent::__construct();

		$this->displayName = $this->l('Ever Popup');
		$this->description = $this->l('This module allows you to show a customized Popup.');
		require_once('models/EverpopupClass.php');
	}

	public function install()
	{
		// Install SQL
		$sql = array();
		include(dirname(__FILE__).'/sql/install.php');
		foreach ($sql as $s) {
			if (!Db::getInstance()->execute($s)) {
				return false;
			}
		}

		// Create example popup foreach shop
		foreach (Shop::getShops(false) as $shop) {
			$res = $this->createExampleEverPopup($shop['id_shop']);
			if (!$res) {
				return false;
			}
		}

		if (_PS_VERSION_ < '1.7') {
			return parent::install()
			&& Configuration::updateValue('cookie_time', 0)
			&& Configuration::updateValue('showCondition', 1)
			&& $this->registerHook('header');
		} else {
			return parent::install()
			&& Configuration::updateValue('cookie_time', 0)
			&& Configuration::updateValue('showCondition', 1)
			&& $this->registerHook('displayBeforeBodyClosingTag');
		}
	}

	public function uninstall()
	{
		// Uninstall SQL
		$sql = array();
		include(dirname(__FILE__).'/sql/uninstall.php');
		foreach ($sql as $s) {
			if (!Db::getInstance()->execute($s)) {
				return false;
			}
		}

		return parent::uninstall()
		&& Configuration::deleteByName('cookie_time')
		&& Configuration::deleteByName('showCondition');
	}

	private function initForm()
	{
		// Check if logo exists
		$file = dirname(__FILE__).'/img/homepage_logo_'.(int)$this->context->shop->id.'.jpg';
		$logo = (file_exists($file) ? '<img src="'.$this->_path.'img/homepage_logo_'.(int)$this->context->shop->id.'.jpg">' : '');

		// build conditions array
		$showCondition = array(
			array(
				'id_option' => 1,
				'name' => $this->l('CMS only')
			),
			array(
				'id_option' => 2,
				'name' => $this->l('Products only')
			),
			array(
				'id_option' => 3,
				'name' => $this->l('Home only')
			),
			array(
				'id_option' => 4,
				'name' => $this->l('All')
			),
		);

		// build cookie_time array
		$cookie_time = array(
			array(
			  'id_option' => 1,
			  'name' => $this->l('1 day')
			),
			array(
			  'id_option' => 5,
			  'name' => $this->l('5 days')
			),
			array(
			  'id_option' => 15,
			  'name' => $this->l('15 days')
			),
			array(
			  'id_option' => 30,
			  'name' => $this->l('30 days')
			),
			array(
			  'id_option' => 60,
			  'name' => $this->l('60 days')
			),
			array(
			  'id_option' => 0,
			  'name' => $this->l('Disabled')
			)
		);

		// build form
		$this->fields_form[0]['form'] = array(
			'tinymce' => true,
			'legend' => array(
				'title' => $this->displayName,
				'image' => '../img/admin/cog.gif'
			),
			'submit' => array(
				'name' => 'submitUpdateHome_popup',
				'title' => $this->l('Save '),
				'class' => 'button pull-right'
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('Main Title'),
					'name' => 'ever_title',
					'lang' => true,
					'size' => 64,
					'desc' => $this->l('Highest title level'),
				),
				array(
					'type' => 'text',
					'label' => $this->l('Subtitle'),
					'name' => 'ever_subheading',
					'lang' => true,
					'size' => 64,
				),
				array(
					'type' => 'textarea',
					'label' => $this->l('Content'),
					'name' => 'ever_paragraph',
					'lang' => true,
					'autoload_rte' => true,
					'desc' => $this->l('For example, a featured product or a sale'),
					'cols' => 60,
					'rows' => 30
				),
				array(
					'type' => 'file',
					'label' => $this->l('Logo'),
					'name' => 'ever_homepage_logo',
					'display_image' => true,
					'image' => $logo,
					'delete_url' => 'index.php?tab=AdminModules&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&deleteLogoImage=1'
				),
				array(
					'type' => 'text',
					'label' => $this->l('Logo link'),
					'name' => 'ever_home_logo_link',
					'size' => 33,
				),
				array(
					'type' => 'text',
					'label' => $this->l('Logo subtitle'),
					'name' => 'ever_logo_subheading',
					'lang' => true,
					'size' => 33,
				),
				array(
					'type' => 'select',
					'label' => $this->l('Where to show the popup ?'),
					'name' => 'showCondition',
					'required' => true,
					'options' => array(
						'query' => $showCondition,
						'id' => 'id_option',
						'name' => 'name'
					)
				),
				array(
					'type' => 'select',
					'label' => $this->l('Lifetime of the cookie (in days)'),
					'name' => 'cookie_time',
					'required' => true,
					'desc' => $this->l('If disabled, the popup will show systematically'),
					'options' => array(
						'query' => $cookie_time,
						'id' => 'id_option',
						'name' => 'name'
					)
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Newsletter form'),
					'name' => 'show_subscription_form',
					'lang' => false,
					'size' => 2,
					'is_bool' => true,
					'desc' => $this->l('Show the newsletter form in the popup.'),
					'values'    => array(
					    array(
					      'id'    => 'active_on',
					      'value' => 1,
					      'label' => $this->l('Enable')
				    	),
					    array(
					      'id'    => 'active_off',
					      'value' => 0,
					      'label' => $this->l('Disable')
				    	)
 					 ),
				),
			)
		);

		$languages = Language::getLanguages(false);
		foreach ($languages as $k => $language)
			$languages[$k]['is_default'] = (int)$language['id_lang'] == Configuration::get('PS_LANG_DEFAULT');

		$helper = new HelperForm();
		$helper->module = $this;
		$helper->name_controller = 'everpopup';
		$helper->identifier = $this->identifier;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->languages = $languages;
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		$helper->default_form_language = (int)Configuration::get('PS_LANG_DEFAULT');
		$helper->allow_employee_form_lang = true;
		$helper->title = $this->displayName;
		$helper->submit_action = 'submitUpdateHome_popup';

		return $helper;
	}

	public function getContent()
	{
		$this->_html = '';
		$this->postProcess();

		$helper = $this->initForm();

		$id_shop = (int)$this->context->shop->id;
		$everpopup = EverpopupClass::getByIdShop($id_shop);

		//if everpopup do not exist for this shop => create a new example one
		if (!$everpopup)
			$this->createExampleEverPopup($id_shop);

		//fill all form fields
		foreach ($this->fields_form[0]['form']['input'] as $input)
		{
			if ($input['name'] != 'ever_homepage_logo')
				$helper->fields_value[$input['name']] = $everpopup->{$input['name']};
				$helper->fields_value['cookie_time'] = Configuration::get('cookie_time');
				$helper->fields_value['showCondition'] = Configuration::get('showCondition');
		}

		$file = dirname(__FILE__).'/img/homepage_logo_'.(int)$id_shop.'.jpg';
		$helper->fields_value['ever_homepage_logo']['image'] = (file_exists($file) ? '<img src="'.$this->_path.'img/homepage_logo_'.(int)$id_shop.'.jpg">' : '');
		if ($helper->fields_value['ever_homepage_logo'] && file_exists($file))
			$helper->fields_value['ever_homepage_logo']['size'] = filesize($file) / 1000;

		$this->_html .= $helper->generateForm($this->fields_form);

		return $this->_html;
	}

	public function postProcess()
	{
		$errors = '';
		$id_shop = (int)$this->context->shop->id;

		// Delete logo image retrocompat 1.5
		if (Tools::isSubmit('deleteLogoImage') || Tools::isSubmit('deleteImage'))
		{
			if (!file_exists(dirname(__FILE__).'/img/homepage_logo_'.(int)$id_shop.'.jpg'))
				$errors .= $this->displayError($this->l('This action cannot be made.'));
			else
			{
				unlink(dirname(__FILE__).'/img/homepage_logo_'.(int)$id_shop.'.jpg');
				Configuration::updateValue('EDITORIAL_IMAGE_DISABLE', 1);
				$this->_clearCache('everpopup.tpl');
				Tools::redirectAdmin('index.php?tab=AdminModules&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.(int)Tab::getIdFromClassName('AdminModules').(int)$this->context->employee->id));
			}
			$this->_html .= $errors;
		}

		if (Tools::isSubmit('submitUpdateHome_popup'))
		{
			Configuration::updateValue('cookie_time', Tools::getValue('cookie_time'));
			Configuration::updateValue('showCondition', Tools::getValue('showCondition'));
			$id_shop = (int)$this->context->shop->id;
			$everpopup = EverpopupClass::getByIdShop($id_shop);
			$everpopup->copyFromPost();
			if (empty($everpopup->id_shop))
				$everpopup->id_shop = (int)$id_shop;
			$everpopup->save();

			/* upload the image */
			if (isset($_FILES['ever_homepage_logo']) && isset($_FILES['ever_homepage_logo']['tmp_name']) && !empty($_FILES['ever_homepage_logo']['tmp_name']))
			{
				Configuration::set('PS_IMAGE_GENERATION_METHOD', 1);
				if (file_exists(dirname(__FILE__).'/img/homepage_logo_'.(int)$id_shop.'.jpg'))
					unlink(dirname(__FILE__).'/img/homepage_logo_'.(int)$id_shop.'.jpg');
				if ($error = ImageManager::validateUpload($_FILES['ever_homepage_logo']))
					$errors .= $error;
				elseif (!($tmp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS')) || !move_uploaded_file($_FILES['ever_homepage_logo']['tmp_name'], $tmp_name))
					return false;
				elseif (!ImageManager::resize($tmp_name, dirname(__FILE__).'/img/homepage_logo_'.(int)$id_shop.'.jpg'))
					$errors .= $this->displayError($this->l('An error occurred while attempting to upload the image.'));
				if (isset($tmp_name))
					unlink($tmp_name);
			}
			$this->_html .= $errors == '' ? $this->displayConfirmation($this->l('Settings updated successfully.')) : $errors;
			if (file_exists(dirname(__FILE__).'/img/homepage_logo_'.(int)$id_shop.'.jpg'))
			{
				list($width, $height, $type, $attr) = getimagesize(dirname(__FILE__).'/img/homepage_logo_'.(int)$id_shop.'.jpg');
				Configuration::updateValue('EDITORIAL_IMAGE_WIDTH', (int)round($width));
				Configuration::updateValue('EDITORIAL_IMAGE_HEIGHT', (int)round($height));
				Configuration::updateValue('EDITORIAL_IMAGE_DISABLE', 0);
			}
			$this->_clearCache('everpopup.tpl');
			Tools::redirectAdmin('index.php?tab=AdminModules&configure='.$this->name.'&token='.Tools::getAdminToken('AdminModules'.(int)Tab::getIdFromClassName('AdminModules').(int)$this->context->employee->id));
		}

		return true;
	}

	public function hookHeader()
	{
		$condition = Configuration::get('showCondition');
		if ($condition == 1) {
			if (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'cms')
			return;
		} elseif ($condition == 2) {
			if (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'product')
			return;
		} elseif ($condition == 3) {
			if (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'index')
			return;
		}

		$this->context->controller->addCSS(($this->_path).'views/css/everpopup.css', 'all');
		$this->context->controller->addJS(($this->_path).'views/js/everpopup.js', 'all');

		if (!$this->isCached('everpopup.tpl', $this->getCacheId()))
		{
			$id_shop = (int)$this->context->shop->id;
			$everpopup = EverpopupClass::getByIdShop($id_shop);

			if (!$everpopup) {
				return;
			}

			$everpopup = new EverpopupClass((int)$everpopup->id, $this->context->language->id);

			if (!$everpopup) {
				return;
			}

			$this->smarty->assign(
				array(
					'everpopup' => $everpopup,
					'ever_baseUrl' => $_SERVER['SERVER_NAME'],
					'ever_ip' => $_SERVER["REMOTE_ADDR"],
					'cookie_time' => Configuration::get('cookie_time'),
					'image_width' => Configuration::get('EDITORIAL_IMAGE_WIDTH'),
					'image_height' => Configuration::get('EDITORIAL_IMAGE_HEIGHT'),
					'id_lang' => $this->context->language->id,
					'id_shop' => $this->context->shop->id,
					'homepage_logo' => !Configuration::get('EDITORIAL_IMAGE_DISABLE') && file_exists('modules/everpopup/img/homepage_logo_'.(int)$id_shop.'.jpg'),
					'image_path' => $this->_path.'img/homepage_logo_'.(int)$id_shop.'.jpg'
				)
			);
		}

		return $this->display(__FILE__, 'everpopup.tpl', $this->getCacheId());
	}

	/**
	* Hook Prestashop 1.7 only
	*/
	public function hookDisplayBeforeBodyClosingTag()
	{
		$condition = Configuration::get('showCondition');
		if ($condition == 1) {
			if (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'cms')
			return;
		} elseif ($condition == 2) {
			if (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'product')
			return;
		} elseif ($condition == 3) {
			if (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'index')
			return;
		}

		if (!$this->isCached('everpopup.tpl', $this->getCacheId())) {
			$id_shop = (int)$this->context->shop->id;
			$everpopup = EverpopupClass::getByIdShop($id_shop);

			if (!$everpopup) {
				return;
			}

			$everpopup = new EverpopupClass((int)$everpopup->id, $this->context->language->id);

			if (!$everpopup) {
				return;
			}

			$this->smarty->assign(
				array(
					'everpopup' => $everpopup,
					'ever_baseUrl' => $this->context->shop->getBaseURL(true, true),
					'ever_ip' => $_SERVER["REMOTE_ADDR"],
					'cookie_time' => Configuration::get('cookie_time'),
					'image_width' => Configuration::get('EDITORIAL_IMAGE_WIDTH'),
					'image_height' => Configuration::get('EDITORIAL_IMAGE_HEIGHT'),
					'id_lang' => $this->context->language->id,
					'id_shop' => $this->context->shop->id,
					'homepage_logo' => !Configuration::get('EDITORIAL_IMAGE_DISABLE') && file_exists('modules/everpopup/img/homepage_logo_'.(int)$id_shop.'.jpg'),
					'image_path' => $this->_path.'img/homepage_logo_'.(int)$id_shop.'.jpg'
				)
			);
		}

		return $this->display(__FILE__, 'everpopup17.tpl', $this->getCacheId());
	}

	private function createExampleEverPopup($id_shop)
	{
		$everpopup = new EverpopupClass();
		$everpopup->id_shop = (int)$id_shop;
		$everpopup->cookie_time = Configuration::get('cookie_time');
		$everpopup->showCondition = Configuration::get('showCondition');
		$everpopup->ever_home_logo_link = 'https://team-ever.com';
		$everpopup->show_subscription_form = true;
		foreach (Language::getLanguages(false) as $lang)
		{
			$everpopup->ever_title[$lang['id_lang']] = 'Lorem ipsum dolor sit amet';
			$everpopup->ever_subheading[$lang['id_lang']] = 'Excepteur sint occaecat cupidatat non proident';
			$everpopup->ever_paragraph[$lang['id_lang']] = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>';
			$everpopup->ever_logo_subheading[$lang['id_lang']] = 'Lorem ipsum presta shop amet';
		}

		return $everpopup->add();
	}
}

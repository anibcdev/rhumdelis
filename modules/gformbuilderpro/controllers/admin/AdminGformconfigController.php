<?php
/**
* The file is controller. Do not modify the file if you want to upgrade the module in future
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright  2017 Globo., Jsc
* @license   please read license in file license.txt
* @link	     http://www.globosoftware.net
*/

class AdminGformconfigController extends ModuleAdminController
{
	public function __construct()
	{
		$this->bootstrap = true;
		$this->display = 'edit';
        parent::__construct();
		$this->meta_title = $this->module->l('Form Builder Pro');
		if (!$this->module->active)
			Tools::redirectAdmin($this->context->link->getAdminLink('AdminHome'));
	}
    public function initContent()
	{
		$this->display = 'edit';
		$this->initTabModuleList();
		$this->initToolbar();
		$this->initPageHeaderToolbar();
		$this->content = $this->renderForm();
        $this->context->smarty->assign(array(
    			'content' => $this->content,
    			'url_post' => self::$currentIndex.'&token='.$this->token,			
    		));
        if(version_compare(_PS_VERSION_,'1.6') == 1){
    		$this->context->smarty->assign(array(		
    			'show_page_header_toolbar' => $this->show_page_header_toolbar,
    			'page_header_toolbar_title' => $this->page_header_toolbar_title,
    			'page_header_toolbar_btn' => $this->page_header_toolbar_btn
    		));
        }
	}
    public function setMedia()
    {
        parent::setMedia();
        if(version_compare(_PS_VERSION_,'1.6') == -1)
            $this->addJqueryUI('ui.mouse');
        $this->addJqueryPlugin('tagify');
        return true;
    }
    public function initTabModuleList(){
        if(version_compare(_PS_VERSION_,'1.5.4.0') == -1) 
            return true;
        else
            return parent::initTabModuleList();
    }
    public function initToolBarTitle()
	{
		$this->toolbar_title[] = $this->module->l('Form Builder Pro');
		$this->toolbar_title[] = $this->module->l('General Settings');
	}
    public function initPageHeaderToolbar()
	{
        $this->page_header_toolbar_btn = array(
            'new' => array(
                'href' => $this->context->link->getAdminLink('AdminGformmanager'),
                'desc' => $this->module->l('Form'),
                'icon' => 'process-icon-cogs'
            ),
            'about' => array(
                'href' => $this->context->link->getAdminLink('AdminGformrequest'),
                'desc' => $this->module->l('Data Recieved'),
                'icon' => 'process-icon-duplicate'
            ),
        );
        if(version_compare(_PS_VERSION_,'1.6') == 1){
		  parent::initPageHeaderToolbar();
        }
	}
    public function postProcess()
	{
	   
        if (Tools::isSubmit('saveConfig'))
        {
            $shop_groups_list = array();
			$shops = Shop::getContextListShopID();
            $shop_context = Shop::getContext();
			foreach ($shops as $shop_id)
			{
				$shop_group_id = (int)Shop::getGroupFromShop((int)$shop_id, true);
				if (!in_array($shop_group_id, $shop_groups_list))
					$shop_groups_list[] = (int)$shop_group_id;
				$res = Configuration::updateValue('GF_RECAPTCHA', Tools::getValue('GF_RECAPTCHA'), false, (int)$shop_group_id, (int)$shop_id);
				$res &= Configuration::updateValue('GF_SECRET_KEY', Tools::getValue('GF_SECRET_KEY'), false, (int)$shop_group_id, (int)$shop_id);
                $res &= Configuration::updateValue('GF_FIELD_WIDTH_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_DEFAULT'), false, (int)$shop_group_id, (int)$shop_id);
                $res &= Configuration::updateValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_MOBILE_DEFAULT'), false, (int)$shop_group_id, (int)$shop_id);
                $res &= Configuration::updateValue('GF_FIELD_WIDTH_TABLET_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_TABLET_DEFAULT'), false, (int)$shop_group_id, (int)$shop_id);
				$res &= Configuration::updateValue('GF_GROUP_WIDTH_DEFAULT', (int)Tools::getValue('GF_GROUP_WIDTH_DEFAULT'), false, (int)$shop_group_id, (int)$shop_id);
                $res &= Configuration::updateValue('GF_BLACKLISTED_IP', Tools::getValue('GF_BLACKLISTED_IP'), false, (int)$shop_group_id, (int)$shop_id);
                $res &= Configuration::updateValue('GF_GMAP_API_KEY', Tools::getValue('GF_GMAP_API_KEY'), false, (int)$shop_group_id, (int)$shop_id);
			}
			/* Update global shop context if needed*/
			switch ($shop_context)
			{
				case Shop::CONTEXT_ALL:
					$res = Configuration::updateValue('GF_RECAPTCHA', Tools::getValue('GF_RECAPTCHA'));
					$res &= Configuration::updateValue('GF_SECRET_KEY', Tools::getValue('GF_SECRET_KEY'));
					$res &= Configuration::updateValue('GF_FIELD_WIDTH_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_DEFAULT'));
                    $res &= Configuration::updateValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_MOBILE_DEFAULT'));
                    $res &= Configuration::updateValue('GF_FIELD_WIDTH_TABLET_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_TABLET_DEFAULT'));
					$res &= Configuration::updateValue('GF_GROUP_WIDTH_DEFAULT', (int)Tools::getValue('GF_GROUP_WIDTH_DEFAULT'));
                    $res &= Configuration::updateValue('GF_BLACKLISTED_IP', Tools::getValue('GF_BLACKLISTED_IP'));
                    $res &= Configuration::updateValue('GF_GMAP_API_KEY', Tools::getValue('GF_GMAP_API_KEY'));
                    if (count($shop_groups_list))
					{
						foreach ($shop_groups_list as $shop_group_id)
						{
							$res = Configuration::updateValue('GF_RECAPTCHA', Tools::getValue('GF_RECAPTCHA'), false, (int)$shop_group_id);
							$res &= Configuration::updateValue('GF_SECRET_KEY', Tools::getValue('GF_SECRET_KEY'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_FIELD_WIDTH_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_DEFAULT'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_MOBILE_DEFAULT'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_FIELD_WIDTH_TABLET_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_TABLET_DEFAULT'), false, (int)$shop_group_id);
							$res &= Configuration::updateValue('GF_GROUP_WIDTH_DEFAULT', (int)Tools::getValue('GF_GROUP_WIDTH_DEFAULT'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_BLACKLISTED_IP', Tools::getValue('GF_BLACKLISTED_IP'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_GMAP_API_KEY', Tools::getValue('GF_GMAP_API_KEY'), false, (int)$shop_group_id);
						}
					}
					break;
				case Shop::CONTEXT_GROUP:
					if (count($shop_groups_list))
					{
						foreach ($shop_groups_list as $shop_group_id)
						{
							$res = Configuration::updateValue('GF_RECAPTCHA', Tools::getValue('GF_RECAPTCHA'), false, (int)$shop_group_id);
							$res &= Configuration::updateValue('GF_SECRET_KEY', Tools::getValue('GF_SECRET_KEY'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_FIELD_WIDTH_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_DEFAULT'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_MOBILE_DEFAULT'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_FIELD_WIDTH_TABLET_DEFAULT', (int)Tools::getValue('GF_FIELD_WIDTH_TABLET_DEFAULT'), false, (int)$shop_group_id);
							$res &= Configuration::updateValue('GF_GROUP_WIDTH_DEFAULT', (int)Tools::getValue('GF_GROUP_WIDTH_DEFAULT'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_BLACKLISTED_IP', Tools::getValue('GF_BLACKLISTED_IP'), false, (int)$shop_group_id);
                            $res &= Configuration::updateValue('GF_GMAP_API_KEY', Tools::getValue('GF_GMAP_API_KEY'), false, (int)$shop_group_id);
						}
					}
					break;
			}
            if (!$res)
				$this->errors[] = $this->module->l('The configuration could not be updated.');
			else
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminGformconfig', true));
        }
    }
    public function renderForm() {
        $widths = array(
            array('value' => '1','name' => $this->module->l('1/12')),
            array('value' => '2','name' => $this->module->l('2/12')),
            array('value' => '3','name' => $this->module->l('3/12')),
            array('value' => '4','name' => $this->module->l('4/12')),
            array('value' => '5','name' => $this->module->l('5/12')),
            array('value' => '6','name' => $this->module->l('6/12')),
            array('value' => '7','name' => $this->module->l('7/12')),
            array('value' => '8','name' => $this->module->l('8/12')),
            array('value' => '9','name' => $this->module->l('9/12')),
            array('value' => '10','name' => $this->module->l('10/12')),
            array('value' => '11','name' => $this->module->l('11/12')),
            array('value' => '12','name' => $this->module->l('12/12')),
        );
        $this->fields_form = array(
            'legend' => array(
                'title' => $this->module->l('General'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
					'type' => 'select',
					'label' => $this->module->l('Default width value of a input field').((version_compare(_PS_VERSION_,'1.6') != -1) ? '(<i class="icon-laptop"></i>)' : $this->module->l('(PC)')),
                    'desc' => $this->module->l('This is based BootStrap grid. For more information see here: ').'<a target="_blank" href="http://getbootstrap.com/css/#grid">http://getbootstrap.com/css/#grid</a>. '.$this->module->l('It is just default value when you draw and drop a field. Then you can change for each individual by yourself. '),
					'name' => 'GF_FIELD_WIDTH_DEFAULT',
					'required' => true,
                    'lang' => false,
					'class' => 'GF_FIELD_WIDTH_DEFAULT',
					'options' => array(
						'query' => $widths,
						'id' => 'value',
						'name' => 'name'
					)
                ),
                array(
					'type' => 'select',
					'label' => $this->module->l('Default width value of a input field').((version_compare(_PS_VERSION_,'1.6') != -1) ? '(<i class="icon-tablet"></i>)' : $this->module->l('(Tablet)')),
                    'desc' => $this->module->l('This is based BootStrap grid. For more information see here: ').'<a target="_blank" href="http://getbootstrap.com/css/#grid">http://getbootstrap.com/css/#grid</a>. '.$this->module->l('It is just default value when you draw and drop a field. Then you can change for each individual by yourself. '),
					'name' => 'GF_FIELD_WIDTH_TABLET_DEFAULT',
					'required' => true,
                    'lang' => false,
					'class' => 'GF_FIELD_WIDTH_TABLET_DEFAULT',
					'options' => array(
						'query' => $widths,
						'id' => 'value',
						'name' => 'name'
					)
                ),
                array(
					'type' => 'select',
					'label' => $this->module->l('Default width value of a input field').((version_compare(_PS_VERSION_,'1.6') != -1) ? '(<i class="icon-mobile"></i>)' : $this->module->l('(Mobile)')),
                    'desc' => $this->module->l('This is based BootStrap grid. For more information see here: ').'<a target="_blank" href="http://getbootstrap.com/css/#grid">http://getbootstrap.com/css/#grid</a>. '.$this->module->l('It is just default value when you draw and drop a field. Then you can change for each individual by yourself. '),
					'name' => 'GF_FIELD_WIDTH_MOBILE_DEFAULT',
					'required' => true,
                    'lang' => false,
					'class' => 'GF_FIELD_WIDTH_MOBILE_DEFAULT',
					'options' => array(
						'query' => $widths,
						'id' => 'value',
						'name' => 'name'
					)
                ),
                array(
					'type' => 'select',
					'label' => $this->module->l('Default width value of a group'),
                    'desc' => $this->module->l('This is based BootStrap grid. For more information see here: ').'<a target="_blank" href="http://getbootstrap.com/css/#grid">http://getbootstrap.com/css/#grid</a>. '.$this->module->l('It is just default value when you draw and drop a group. Then you can change for each individual by yourself. '),
					'name' => 'GF_GROUP_WIDTH_DEFAULT',
					'required' => true,
                    'lang' => false,
					'class' => 'GF_GROUP_WIDTH_DEFAULT',
					'options' => array(
						'query' => $widths,
						'id' => 'value',
						'name' => 'name'
					)
                ),
                array(
					'type' => 'text',
					'label' => $this->module->l('reCAPTCHA Site Key'),
                    'desc' => $this->module->l('Required if you want use Captcha for your form.You can get Site Key and Secret Key here: ').'<a target="_blank" href="https://www.google.com/recaptcha/admin">'.$this->module->l('click here').'</a>',
					'name' => 'GF_RECAPTCHA'
				),
                array(
					'type' => 'text',
					'label' => $this->module->l('reCAPTCHA Secret Key'),
					'name' => 'GF_SECRET_KEY'
				),
                array(
					'type' => 'text',
					'label' => $this->module->l('Google map API Key'),
					'name' => 'GF_GMAP_API_KEY'
				),
                array(
    				'type' => 'tags',
    				'name' => 'GF_BLACKLISTED_IP',
    				'label' => $this->module->l('Blacklisted IP addresses'),
    			),
            ),
            'submit' => array(
                'title' => $this->module->l('Save'),
                'name' => 'saveConfig'
            )
        );
        $this->fields_value = $this->getConfigFieldsValues();
        return parent::renderForm();
    }
    public function getConfigFieldsValues()
	{
		$id_shop_group = Shop::getContextShopGroupID();
		$id_shop = Shop::getContextShopID();
		return array(
			'GF_RECAPTCHA' => Tools::getValue('GF_RECAPTCHA', Configuration::get('GF_RECAPTCHA', null, $id_shop_group, $id_shop)),
			'GF_SECRET_KEY' => Tools::getValue('GF_SECRET_KEY', Configuration::get('GF_SECRET_KEY', null, $id_shop_group, $id_shop)),
            'GF_FIELD_WIDTH_DEFAULT' => Tools::getValue('GF_FIELD_WIDTH_DEFAULT', Configuration::get('GF_FIELD_WIDTH_DEFAULT', null, $id_shop_group, $id_shop)),
            'GF_FIELD_WIDTH_TABLET_DEFAULT' => Tools::getValue('GF_FIELD_WIDTH_TABLET_DEFAULT', Configuration::get('GF_FIELD_WIDTH_TABLET_DEFAULT', null, $id_shop_group, $id_shop)),
            'GF_FIELD_WIDTH_MOBILE_DEFAULT' => Tools::getValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', Configuration::get('GF_FIELD_WIDTH_MOBILE_DEFAULT', null, $id_shop_group, $id_shop)),
            'GF_GROUP_WIDTH_DEFAULT' => Tools::getValue('GF_GROUP_WIDTH_DEFAULT', Configuration::get('GF_GROUP_WIDTH_DEFAULT', null, $id_shop_group, $id_shop)),
		    'GF_BLACKLISTED_IP' => Tools::getValue('GF_BLACKLISTED_IP', Configuration::get('GF_BLACKLISTED_IP', null, $id_shop_group, $id_shop)),
            'GF_GMAP_API_KEY' => Tools::getValue('GF_GMAP_API_KEY', Configuration::get('GF_GMAP_API_KEY', null, $id_shop_group, $id_shop)),
        );
	}
 }
?>
<?php
/**
* This is main class of module. 
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright  2017 Globo., Jsc
* @license   please read license in file license.txt
* @link	     http://www.globosoftware.net
*/

if (!defined("_PS_VERSION_"))
    exit;
include_once(_PS_MODULE_DIR_ . 'gformbuilderpro/classes/gformbuilderproModel.php');
include_once(_PS_MODULE_DIR_ . 'gformbuilderpro/classes/gformbuilderprofieldsModel.php');
class Gformbuilderpro extends Module
{
    public function __construct()
    {
        $this->name = "gformbuilderpro";
        $this->tab = "content_management";
        $this->version = "1.0.7";
        $this->author = "Globo Jsc";
        $this->need_instance = 1;
        $this->bootstrap = 1;
        $this->module_key = '0852f50ec236e316fc6931ebac6a4145';
        parent::__construct();
        $this->displayName = $this->l('Form Builder Pro - Customizable any kind of Form');
        $this->description = $this->l('Allow you to create any kind of forms for your website with Bootstrap & Responsive.');
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);
    }
    public function install()
    {
        if (Shop::isFeatureActive()){
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        return parent::install()
            && $this->_createTables()
            && $this->_createTab()
            && $this->installConfigData()
            && $this->registerHook('displayBackOfficeHeader') 
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayGform')
            && $this->registerHook('moduleRoutes')
            && Configuration::updateValue('GF_PRODUCT_TYPE',ImageType::getFormatedName('home'));
    }
    public function uninstall()
    {
        return parent::uninstall()
            && $this->_deleteTables()
            && $this->_deleteTab()
            && $this->unregisterHook("displayBackOfficeHeader")
            && $this->unregisterHook("displayHeader")
            && $this->unregisterHook("displayGform")
            && $this->unregisterHook("moduleRoutes")
            ;
    }
    private function _createTables()
    {
        $res = (bool) Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gformbuilderpro` (
                `id_gformbuilderpro` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `active` tinyint(1) unsigned NOT NULL,
                `sendtosender` tinyint(1) unsigned NOT NULL,
                `usingajax` tinyint(1) unsigned NOT NULL,
                `saveemail` tinyint(1) unsigned NOT NULL,
                `requiredlogin` tinyint(1) unsigned NOT NULL,
                `hooks` text NULL,
                `formtemplate` MEDIUMTEXT NULL,
                `fields` text NULL,
                `sendto` text NOT NULL,
                `sender`  text NULL,
                `autoredirect` TINYINT(1) NULL DEFAULT  "0",
                `timedelay` INT(10) NULL DEFAULT  "0",
                `redirect_link` TEXT NULL,
                PRIMARY KEY (`id_gformbuilderpro`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;
        ');
        $res &= (bool) Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gformbuilderpro_lang` (
                    `id_gformbuilderpro` int(10) unsigned NOT NULL,
                    `id_lang` int(10) unsigned NOT NULL,
                    `title` varchar(255) NOT NULL,
                    `rewrite` varchar(255)  NULL,
                    `metakeywords` varchar(255)  NULL,
                    `metadescription` text  NULL,
                    `subject` text  NULL,
                    `subjectsender` text  NULL,
                    `emailtemplate` MEDIUMTEXT  NULL,
                    `emailtemplatesender` MEDIUMTEXT  NULL,
                    `success_message` text  NULL,
                    `error_message` text  NULL,
                    `submittitle` varchar(255) NOT NULL,
                    PRIMARY KEY (`id_gformbuilderpro`,`id_lang`)
                ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;
            ');
        $res &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gformbuilderpro_shop` (
                `id_gformbuilderpro` int(10) unsigned NOT NULL,
                `id_shop` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id_gformbuilderpro`,`id_shop`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;
        ');
        $res &= (bool) Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gformbuilderprofields` (
                `id_gformbuilderprofields` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `labelpos` tinyint(2) unsigned NOT NULL,
                `type` varchar(255) NOT NULL,
                `name` varchar(255) NOT NULL,
                `idatt` varchar(255) NULL,
                `classatt` varchar(255) NULL,
                `required` tinyint(1) unsigned NOT NULL,
                `validate` varchar(255) NULL,
                `extra` varchar(255) NULL,
                `multi` tinyint(1) unsigned NOT NULL,
                PRIMARY KEY (`id_gformbuilderprofields`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;
        ');
        $res &= (bool) Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gformbuilderprofields_lang` (
                    `id_gformbuilderprofields` int(10) unsigned NOT NULL,
                    `id_lang` int(10) unsigned NOT NULL,
                    `label` varchar(255) NOT NULL,
                    `value` text  NULL,
                    `placeholder` text  NULL,
                    `description` text  NULL,
                    PRIMARY KEY (`id_gformbuilderprofields`,`id_lang`)
                ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;
            ');
        $res &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gformbuilderprofields_shop` (
                `id_gformbuilderprofields` int(10) unsigned NOT NULL,
                `id_shop` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id_gformbuilderprofields`,`id_shop`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;
        ');
        $res &= (bool) Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gformrequest` (
                `id_gformrequest` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `id_gformbuilderpro` int(10) unsigned NOT NULL,
                `user_ip` varchar(255) NULL,
                `sendto` text NULL,
                `subject` text NULL,
                `request` MEDIUMTEXT  NULL,
                `attachfiles` text  NULL,
                `jsonrequest` MEDIUMTEXT  NULL,
                `date_add` datetime DEFAULT NULL,
                `status` int(10) NULL DEFAULT  "0",
                PRIMARY KEY (`id_gformrequest`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;
        ');
        $res &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gformrequest_shop` (
                `id_gformrequest` int(10) unsigned NOT NULL,
                `id_shop` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id_gformrequest`,`id_shop`)
            ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;
        ');
        return $res;
    }
    private function _deleteTables()
    {
        return Db::getInstance()->execute('
                DROP TABLE IF EXISTS    `' . _DB_PREFIX_ . 'gformbuilderpro`, 
                                        `' . _DB_PREFIX_ . 'gformbuilderpro_lang`, 
                                        `' . _DB_PREFIX_ . 'gformbuilderpro_shop`,
                                        `' . _DB_PREFIX_ . 'gformbuilderprofields`, 
                                        `' . _DB_PREFIX_ . 'gformbuilderprofields_lang`, 
                                        `' . _DB_PREFIX_ . 'gformbuilderprofields_shop`,
                                        `' . _DB_PREFIX_ . 'gformrequest`, 
                                        `' . _DB_PREFIX_ . 'gformrequest_shop`;
        ');
    }
    private function _createTab()
    {
        $res = true;
        $tabparent = "AdminGformbuilderpro";
        $id_parent = Tab::getIdFromClassName($tabparent);
        if(!$id_parent){
            $tab = new Tab();
            $tab->active = 1;
            $tab->class_name = "AdminGformbuilderpro";
            $tab->name = array();
            foreach (Language::getLanguages() as $lang){
                $tab->name[$lang["id_lang"]] = "Form Builder Pro";
            }
            $tab->id_parent = 0;
            $tab->module = $this->name;
            $res &= $tab->add();
            $id_parent = $tab->id;
        }
        $subtabs = array(
            array(
                'class'=>'AdminGformconfig',
                'name'=>'General Settings'
            ),
            array(
                'class'=>'AdminGformmanager',
                'name'=>'Form'
            ),
            array(
                'class'=>'AdminGformrequest',
                'name'=>'Received Data'
            ),
            array(
                'class'=>'AdminGformrequestexport',
                'name'=>'CSV Export'
            ),
        );
        foreach($subtabs as $subtab){
            $idtab = Tab::getIdFromClassName($subtab['class']);
            if(!$idtab){
                $tab = new Tab();
                $tab->active = 1;
                $tab->class_name = $subtab['class'];
                $tab->name = array();
                foreach (Language::getLanguages() as $lang){
                    $tab->name[$lang["id_lang"]] = $subtab['name'];
                }
                $tab->id_parent = $id_parent;
                $tab->module = $this->name;
                $res &= $tab->add();
            }
        }
        return $res;
    }
    private function _deleteTab()
    {
        $id_tabs = array('AdminGformconfig','AdminGformmanager','AdminGformrequest','AdminGformrequestexport','AdminGformbuilderpro');
        foreach($id_tabs as $id_tab){
            $idtab = Tab::getIdFromClassName($id_tab);
            $tab = new Tab((int)$idtab);
            $parentTabID = $tab->id_parent;
            $tab->delete();
            $tabCount = Tab::getNbTabs((int)$parentTabID);
            if ($tabCount == 0){
                $parentTab = new Tab((int)$parentTabID);
                $parentTab->delete();
            }
        }
        return true;
    }
    public function installConfigData(){
        $res = true;
        $shop_groups_list = array();
		$shops = Shop::getContextListShopID();
        $shop_context = Shop::getContext();
        $res &= Configuration::updateValue('GF_FIELD_WIDTH_DEFAULT', 12);
        $res &= Configuration::updateValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', 12);
        $res &= Configuration::updateValue('GF_FIELD_WIDTH_TABLET_DEFAULT', 12);
		$res &= Configuration::updateValue('GF_GROUP_WIDTH_DEFAULT', 12);
		foreach ($shops as $shop_id)
		{
			$shop_group_id = (int)Shop::getGroupFromShop((int)$shop_id, true);
			if (!in_array($shop_group_id, $shop_groups_list))
				$shop_groups_list[] = (int)$shop_group_id;
			$res &= Configuration::updateValue('GF_FIELD_WIDTH_DEFAULT', 12, false, (int)$shop_group_id, (int)$shop_id);
            $res &= Configuration::updateValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', 12, false, (int)$shop_group_id, (int)$shop_id);
            $res &= Configuration::updateValue('GF_FIELD_WIDTH_TABLET_DEFAULT', 12, false, (int)$shop_group_id, (int)$shop_id);
			$res &= Configuration::updateValue('GF_GROUP_WIDTH_DEFAULT', 12, false, (int)$shop_group_id, (int)$shop_id);
        }
		/* Update global shop context if needed*/
		switch ($shop_context)
		{
			case Shop::CONTEXT_ALL:
				$res &= Configuration::updateValue('GF_FIELD_WIDTH_DEFAULT', 12);
                $res &= Configuration::updateValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', 12);
                $res &= Configuration::updateValue('GF_FIELD_WIDTH_TABLET_DEFAULT', 12);
				$res &= Configuration::updateValue('GF_GROUP_WIDTH_DEFAULT', 12);
                if (count($shop_groups_list))
				{
					foreach ($shop_groups_list as $shop_group_id)
					{
						$res &= Configuration::updateValue('GF_FIELD_WIDTH_DEFAULT', 12, false, (int)$shop_group_id);
                        $res &= Configuration::updateValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', 12, false, (int)$shop_group_id);
                        $res &= Configuration::updateValue('GF_FIELD_WIDTH_TABLET_DEFAULT', 12, false, (int)$shop_group_id);
						$res &= Configuration::updateValue('GF_GROUP_WIDTH_DEFAULT', 12, false, (int)$shop_group_id);
                    }
				}
				break;
			case Shop::CONTEXT_GROUP:
				if (count($shop_groups_list))
				{
					foreach ($shop_groups_list as $shop_group_id)
					{
						$res &= Configuration::updateValue('GF_FIELD_WIDTH_DEFAULT', 12, false, (int)$shop_group_id);
                        $res &= Configuration::updateValue('GF_FIELD_WIDTH_MOBILE_DEFAULT', 12, false, (int)$shop_group_id);
                        $res &= Configuration::updateValue('GF_FIELD_WIDTH_TABLET_DEFAULT', 12, false, (int)$shop_group_id);
						$res &= Configuration::updateValue('GF_GROUP_WIDTH_DEFAULT', 12, false, (int)$shop_group_id);
                    }
				}
				break;
		}
        return $res;
    }
    public function getContent()
	{
	   if (Tools::isSubmit('getThumb')){
	        $extension = array('png','gif','jpg','jpeg','bmp','svg');
	        $listthumbs = array();
            $thumbsdir = opendir(_PS_MODULE_DIR_.'gformbuilderpro/views/img/thumbs/');
    		while (($file = readdir($thumbsdir)) !== false) {
    			if(in_array(Tools::strtolower(Tools::substr($file, -3)), $extension) || in_array(Tools::strtolower(Tools::substr($file, -4)), $extension)){
    			     $listthumbs[] = $file;
    			}
    		}
    		closedir($thumbsdir);
            die(implode(',',$listthumbs));
	   }
	   elseif (Tools::isSubmit('addThumb')){
            $thumbs = array();
           $extension = array('png','gif','jpg','jpeg','bmp','svg');
            if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name']) && !empty($_FILES['file']['tmp_name']))
            {
                foreach(array_keys($_FILES['file']['name']) as $key){
                    if($_FILES['file']['name'][$key]){
                        if(in_array(Tools::strtolower(Tools::substr($_FILES['file']['name'][$key], -3)), $extension) || in_array(Tools::strtolower(Tools::substr($_FILES['file']['name'][$key], -4)), $extension)){
                	        $file_attachment = null;
                			$file_attachment['rename'] = uniqid(). Tools::strtolower(Tools::substr($_FILES['file']['name'][$key], -5));	
                			$file_attachment['tmp_name'] = $_FILES['file']['tmp_name'][$key];
                			$file_attachment['name'] = $_FILES['file']['name'][$key];
                            if (isset($file_attachment['rename']) && !empty($file_attachment['rename']) && rename($file_attachment['tmp_name'], _PS_MODULE_DIR_.'gformbuilderpro/views/img/thumbs/'.basename($file_attachment['rename']))) {
                                @chmod(_PS_MODULE_DIR_.'gformbuilderpro/views/img/thumbs/'.basename($file_attachment['rename']), 0664);
                                $thumbs[] = $file_attachment['rename'];
                            }
                        }
                    }
                }
            }
           die(implode(',',$thumbs));
	   }elseif (Tools::isSubmit('getFormTypeConfig')){
	       $typefield = Tools::getValue('typefield');
           $id_gformbuilderprofields = (int)Tools::getValue('id_gformbuilderprofields',0);
           echo $this->hookConfigFieldAjax(array('typefield' => $typefield,'id'=>$id_gformbuilderprofields));
	       die();
       }elseif (Tools::isSubmit('addShortcode')){
           $id_field = (int)Tools::getValue('id_gformbuilderprofields',0);
           if($id_field){
                $fieldObj = new gformbuilderprofieldsModel($id_field);
           }else{
                $fieldObj = new gformbuilderprofieldsModel();
           }
           $fieldObj->name = Tools::getValue('name','');
           $fieldObj->required = (int)Tools::getValue('required',0);
           $fieldObj->labelpos = (int)Tools::getValue('labelpos',1);
           $fieldObj->idatt = Tools::getValue('idatt','');
           $fieldObj->classatt = Tools::getValue('classatt','');
           $fieldObj->validate = Tools::getValue('validate','');
           $fieldObj->type = Tools::getValue('type','');
           $fieldObj->extra = Tools::getValue('extra','');
           $fieldObj->multi = (bool)Tools::getValue('multi','0');
           
           $languages = Language::getLanguages(false);
           foreach ($languages as $lang)
           {
                $fieldObj->label[(int)$lang['id_lang']] = Tools::getValue('label_'.(int)$lang['id_lang'],'');
                $fieldObj->value[(int)$lang['id_lang']] = Tools::getValue('value_'.(int)$lang['id_lang'],'');
                $fieldObj->description[(int)$lang['id_lang']] = Tools::getValue('description_'.(int)$lang['id_lang'],'');
                $fieldObj->placeholder[(int)$lang['id_lang']] = Tools::getValue('placeholder_'.(int)$lang['id_lang'],'');
           }
           if($id_field){
                if($fieldObj->update()){
                    echo (int)$fieldObj->id;die();
                }
           }else{
                if($fieldObj->save()){
                    echo (int)$fieldObj->id;die();
                }
           }
           echo '0';die();
       }else
		  Tools::redirectAdmin($this->context->link->getAdminLink('AdminGformmanager'));
	} 
    public function hookConfigFieldAjax($params){
        $useSSL = (Configuration::get('PS_SSL_ENABLED') || Tools::usingSecureMode()) ? true : false;
        $protocol_content = ($useSSL) ? 'https://' : 'http://';
        $base_uri = $protocol_content.Tools::getHttpHost().__PS_BASE_URI__;
        $result = '';
        $id_lang = $this->context->language->id;
        $id_shop = $this->context->shop->id;
        if($params['typefield']){
            $typefield = basename($params['typefield'], '.php');
            if(isset($params['id']) && $params['id']){
                $fieldObj = new gformbuilderprofieldsModel($params['id']);
                $typefield = $fieldObj->type;
            }
            $shortcode_dir = _PS_MODULE_DIR_.'gformbuilderpro/classes/fields/';
            if(file_exists($shortcode_dir.$typefield.'.php')){
                $fields_value = array();
                if(version_compare(_PS_VERSION_,'1.6') == -1){
                    $fields_value['psoldversion15'] = -1;
                }else $fields_value['psoldversion15'] = 0;
                $fields_value['base_uri'] = $base_uri;
                require_once($shortcode_dir.$typefield.'.php');
                $Objname = Tools::ucfirst($typefield.'field');
	            $obj = new $Objname;
                $inputs = $obj->getConfig();
                $inputs[]= array(
        				'type' => 'hidden',
        				'name' => 'id_gformbuilderprofields'
        			);
                $inputs[]= array(
        				'type' => 'hidden',
        				'name' => 'type'
        			);
                
                
                $fields_form = array(
        			'form' => array(
        				'legend' => array(
        					'title' => $this->l('Settings'),
        					'icon' => 'icon-cogs'
        				),
        				'input' => $inputs,
        				'submit' => array(
        					'title' => $this->l('Add'),
        				),
                        'buttons' => array(
                            'cancel' => array(
            					'name' => 'cancelShortcode',
            					'type' => 'submit',
            					'title' => $this->l('Cancel'),
            					'class' => 'btn btn-default pull-left',
            					'icon' => 'process-icon-cancel'
            				),
            			)
        			),
        		);
                $fields_value['type'] = $typefield;
                $languages = Language::getLanguages(false);
                foreach ($languages as $lang)
        		{
        		      $fields_value['placeholder'][(int)$lang['id_lang']] = '';
                      $fields_value['description'][(int)$lang['id_lang']] = '';
                      $fields_value['value'][(int)$lang['id_lang']]  = '';
                }
                $fields_value['labelpos'] = 0;
                $fields_value['validate'] = '';
                $fields_value['id_gformbuilderprofields'] = '';
                $fields_value['multi'] = false;
                $fields_value['required'] = false;
                 
                
                if(isset($params['id']) && $params['id']){
                    $fields_value['id_gformbuilderprofields'] = $fieldObj->id;
                    $fields_value['labelpos'] = $fieldObj->labelpos;
                    $fields_value['name'] = $fieldObj->name;
                    $fields_value['idatt'] = $fieldObj->idatt;
                    $fields_value['classatt'] = $fieldObj->classatt;
                    $fields_value['required'] = $fieldObj->required;
                    $fields_value['validate'] = $fieldObj->validate;
                    $fields_value['multi'] = (bool)$fieldObj->multi;
                    $fields_value['extra'] = '';
                    if($typefield == 'product'){
                        $extra = $fieldObj->extra;
                        $producthtml = array();
                        if($extra !=''){
                            $products = explode(',',$extra);
                            foreach($products as $productid){
                                if($productid !=''){
                                    $cover = Product::getCover((int)$productid);
                                    $id_image = 0;
                                    if(isset($cover['id_image'])) $id_image = (int)$cover['id_image'];
                                    $productObj = new Product((int)$productid,false,(int)$id_lang,(int)$id_shop);
                                    $producthtml[(int)$productid] =array(
                                        'id'=>(int)$productid,
                                        'name'=>Product::getProductName((int)$productid,null,(int)$id_lang),
                                        'image_link' =>$this->context->link->getImageLink($productObj->link_rewrite,$id_image,Configuration::get('GF_PRODUCT_TYPE'))
                                    );
                                }
                            }
                        }
                        
                        $fields_value['extra']['products'] = $extra;
                        $fields_value['extra']['html'] = $producthtml;
                    }elseif($typefield == 'colorchoose'){
                        $extra = $fieldObj->extra;
                        $colors = explode(',',$extra);
                        $fields_value['extra'] = array('value'=>$extra,'colors'=>$colors);
                    }elseif($typefield == 'slider' || $typefield == 'spinner'){
                        $extra = $fieldObj->extra;
                        $colors = explode(';',$extra);
                        $fields_value['extra'] = array('value'=>$extra,'extraval'=>$colors);
                    }
                    elseif($typefield == 'imagethumb'){
                        $extra = $fieldObj->extra;
                        $thumbs = explode(',',$extra);
                        $_thumbs = array();
                        if($thumbs)
                            foreach($thumbs as $thumb)
                                if(file_exists(_PS_MODULE_DIR_.'gformbuilderpro/views/img/thumbs/'.$thumb))
                                    $_thumbs[] = $thumb;
                        $fields_value['extra'] = array('value'=>$extra,'thumbs'=>$_thumbs);
                    }else
                        $fields_value['extra'] = $fieldObj->extra;
            		foreach ($languages as $lang)
            		{
            		      $fields_value['label'][(int)$lang['id_lang']] = isset($fieldObj->label[(int)$lang['id_lang']]) ? $fieldObj->label[(int)$lang['id_lang']] : Tools::ucfirst($typefield);
            		      if($typefield == 'checkbox' || $typefield == 'select' || $typefield == 'radio' || $typefield == 'survey'){
            		          $fields_value['value'][(int)$lang['id_lang']] = (isset($fieldObj->value[(int)$lang['id_lang']]) && $fieldObj->value[(int)$lang['id_lang']] !='') ? explode(',',$fieldObj->value[(int)$lang['id_lang']]) : array();
            		      }else
                            $fields_value['value'][(int)$lang['id_lang']] = isset($fieldObj->value[(int)$lang['id_lang']]) ? $fieldObj->value[(int)$lang['id_lang']] : '';
                          
                          $fields_value['placeholder'][(int)$lang['id_lang']] = isset($fieldObj->placeholder[(int)$lang['id_lang']]) ? $fieldObj->placeholder[(int)$lang['id_lang']] : '';
                          
                          if($typefield == 'survey'){
                            $fields_value['description'][(int)$lang['id_lang']] = (isset($fieldObj->description[(int)$lang['id_lang']]) && $fieldObj->description[(int)$lang['id_lang']] !='') ? explode(',',$fieldObj->description[(int)$lang['id_lang']]) : array();
                          }else                          
                            $fields_value['description'][(int)$lang['id_lang']] = isset($fieldObj->description[(int)$lang['id_lang']]) ? $fieldObj->description[(int)$lang['id_lang']] : '';
                    }
                }else{
                    $fields_value['extra'] = '';
                    if($typefield == 'product'){
                        $fields_value['extra']['products'] = '';
                        $fields_value['extra']['html'] = array();
                    }elseif($typefield == 'colorchoose'){
                        $fields_value['extra'] = array('value'=>'','colors'=>array());
                    }elseif($typefield == 'slider' || $typefield == 'spinner'){
                        $fields_value['extra'] = array('value'=>'','extraval'=>array());
                    }
                    elseif($typefield == 'imagethumb'){
                        $fields_value['extra'] = array('value'=>'','thumbs'=>array());
                    }
                    $fields_value['name'] = $typefield.'_'.time();
                    $fields_value['idatt'] = $typefield.'_'.time();
                    $fields_value['classatt'] = $typefield.'_'.time();
                    foreach ($languages as $lang)
            		{
            		      $fields_value['label'][(int)$lang['id_lang']] = Tools::ucfirst($typefield);
            		}
                }
                $fields_value['ajaxaction'] = $this->context->link->getAdminLink('AdminGformmanager');
                $fields_value['loadjqueryselect2'] = 1;
                if(version_compare(_PS_VERSION_,'1.6.0.7') == -1){
                    $fields_value['loadjqueryselect2'] = 0;
                }
        		$helper = new HelperForm();
                $helper->module = new $this->name();
        		$helper->submit_action = 'addShortcode';
                $helper->show_toolbar = false;
        		$helper->table = $this->table;
        		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        		$helper->default_form_language = $lang->id;
        		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        		$this->fields_form = array();
        
        		$helper->identifier = $this->identifier;
        		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        		$helper->token = Tools::getAdminTokenLite('AdminModules');
        		$helper->tpl_vars = array(
                    'fields_value' => $fields_value,
        			'languages' => $this->context->controller->getLanguages(),
        			'id_language' => $this->context->language->id
        		);
                $html_extra='';
                if(version_compare(_PS_VERSION_,'1.6') == -1){
                    $html_extra_tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/admin/button15.tpl';
                    $html_extra = Context::getContext()->smarty->fetch($html_extra_tpl);
                }
                return $helper->generateForm(array($fields_form)).$html_extra;
            }
                
        }
        return $result;
    }
    public function hookModuleRoutes($route = '', $detail = array())
	{
		$routes = array();
		$routes['module-gformbuilderpro-form'] = array(
			'controller' => 'form',
			'rule' => 'form/{rewrite}-g{id}.html',
			'keywords' => array(
				'id' => array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' => array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
			'params' => array(
				'fc' => 'module',
				'module' => 'gformbuilderpro',
			)
		);
		return $routes;
	}
    public function hookDisplayHeader($params){ 
        $this->context->controller->addCSS(_MODULE_DIR_.$this->name.'/views/css/front/jquery.minicolors.css');
        $this->context->controller->addCSS(_MODULE_DIR_.$this->name.'/views/css/front/gformbuilderpro.css');
        $this->context->controller->addJqueryUI('ui.datepicker');
        $this->context->controller->addJqueryUI('ui.slider');
        if (version_compare(_PS_VERSION_, '1.6.0.0', '<')){
            $this->context->controller->addJS(_MODULE_DIR_.$this->name.'/views/js/front/gformbuilderpro_oldversion.js');
        }
        $this->context->controller->addJS(_MODULE_DIR_.$this->name.'/views/js/front/tinymce/tinymce.min.js');  
        $this->context->controller->addJS(_MODULE_DIR_.$this->name.'/views/js/front/jquery.minicolors.js');
        $this->context->controller->addJS(_MODULE_DIR_.$this->name.'/views/js/front/gformbuilderpro.js');
    }
    public function hookDisplayGform($params){
        $id_lang = $this->context->language->id;
        $id_shop = $this->context->shop->id;
        $id_form = (int)$params['id'];
        $module = Tools::getValue('module','');
        $id = (int)Tools::getValue('id');
        if($id_form > 0)
            if(($module == 'gformbuilderpro' && $id != $id_form) || ($module != 'gformbuilderpro'))
                return $this->getForm($id_form,$id_lang,$id_shop);
            else
                return '';
        else
            return '';
    }
    public function dynamicHook($name,$id_form=0){
        $id_lang = $this->context->language->id;
        $id_shop = $this->context->shop->id;
        $module = Tools::getValue('module','');
        $id = (int)Tools::getValue('id');
        if($id_form > 0){
            if(($module == 'gformbuilderpro' && $id != $id_form) || ($module != 'gformbuilderpro'))
                return $this->getForm((int)$id_form,(int)$id_lang,(int)$id_shop,$name);
            else
                return '';
        }else{
            //get all form in hook
            $html = '';
            $forms = gformbuilderproModel::getAllFormInHook($name);
            if($forms){
                foreach($forms as $form){
                    if(($module == 'gformbuilderpro' && $id != (int)$form['id_gformbuilderpro']) || ($module != 'gformbuilderpro'))
                        $html.=$this->getForm((int)$form['id_gformbuilderpro'],(int)$id_lang,(int)$id_shop,$name);
                }
                    
            }
            return $html;
        };
    }
    public function __call($name, $arguments)
    {
        if (!Validate::isHookName($name))
            return false;
        $hook_name = str_replace('hook', '', $name);
        if (method_exists($this, 'hook'.Tools::ucfirst($hook_name))){
            return call_user_func(array($this, 'hook'.Tools::ucfirst($name)), $arguments);
        } 
        else{
            if(isset($arguments[0]['id']) && $arguments[0]['id'] > 0){
                return $this->dynamicHook($hook_name,(int)$arguments[0]['id']);
            } else return $this->dynamicHook($hook_name);
        }
            
    }
    public function hookDisplayBackOfficeHeader($params){
        $controller_admin = Tools::getValue('controller');
        if(Tools::strtolower($controller_admin)  == 'admingformmanager')
            $this->context->controller->addCss($this->_path.'/views/css/admin/'.$this->name.'.css');
    }
    public function setFormUrl($id,$rewrite,$id_lang=null,$id_shop=null){
        if($id > 0 && $rewrite !=''){
            $params = array(
    			'id' => (int)$id,
    			'rewrite' => $rewrite,
    		);
    	   return Dispatcher::getInstance()->createUrl('module-gformbuilderpro-form', $id_lang, $params,false,'',$id_shop);
        }
    }
    public function getForm($id_form,$id_lang,$id_shop,$hookname=''){
        $useSSL = (Configuration::get('PS_SSL_ENABLED') || Tools::usingSecureMode()) ? true : false;
        $protocol_content = ($useSSL) ? 'https://' : 'http://';
        $base_uri = $protocol_content.Tools::getHttpHost().__PS_BASE_URI__;
         $formObj = new gformbuilderproModel((int)$id_form,(int)$id_lang,(int)$id_shop);
         if(Validate::isLoadedObject($formObj) && (bool)$formObj->active && $formObj->id_gformbuilderpro == (int)$id_form){       
            if((bool)$formObj->requiredlogin && !$this->context->customer->isLogged()){
                return '';
            }else{
                $module_dir = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/formtemplates/';
                $hooks = explode(',',$formObj->hooks);
                if(in_array($hookname,$hooks) || $hookname==''){
                    $id_shop_group = (int)Shop::getContextShopGroupID();
                    $url_rewrite = Context::getContext()->link->getModuleLink('gformbuilderpro','form',array('id'=>$id_form,'rewrite'=>$formObj->rewrite));
                    if (!strpos($url_rewrite, 'index.php')){
                        // fix in version 1.5
                        $url_rewrite = str_replace('?module=gformbuilderpro&controller=form','',$url_rewrite);
                    }
                    $this->context->smarty->assign(array(
                        'sitekey'=>Configuration::get('GF_RECAPTCHA', null, $id_shop_group, $id_shop),
                        'gmap_key'=>Configuration::get('GF_GMAP_API_KEY', null, $id_shop_group, $id_shop),
                        'customerid'=>($this->context->customer->isLogged()) ? $this->context->customer->id : '0',
                        'customername'=>($this->context->customer->isLogged()) ? $this->context->customer->firstname.' '.$this->context->customer->lastname : '',
                        'customeremail'=>($this->context->customer->isLogged()) ? $this->context->customer->email : '',
                        'productid'=>(Tools::getValue('id_product')) ? (int)Tools::getValue('id_product') : '0',
                        'productname'=>(Tools::getValue('id_product')) ? Product::getProductName((int)Tools::getValue('id_product'),null,$this->context->language->id) : '',
                        'shopname'=>$this->context->shop->name,
                        'currencyname'=>$this->context->currency->name,
                        'languagename'=>$this->context->language->name,
                        'base_uri'=>$base_uri,
                        'actionUrl'=>$url_rewrite,
                    ));
                    //get product data
                    $fields = $formObj->fields;
                    $fieldsData = gformbuilderprofieldsModel::getAllFields($fields,$id_lang,$id_shop);
                    if($fieldsData){
                        foreach($fieldsData as $field){
                            if($field['type'] == 'product'){
                                $productids = explode(',',$field['extra']);
                                if($productids){
                                    $productData = array();
                                    foreach($productids as $productid){
                                        if((int)$productid){
                                            $cover = Product::getCover((int)$productid);
                                            $id_image = 0;
                                            if(isset($cover['id_image'])) $id_image = (int)$cover['id_image'];
                                            $productObj = new Product((int)$productid,false,(int)$id_lang,(int)$id_shop);
                                            $productData[(int)$productid] =array(
                                                'id'=>(int)$productid,
                                                'name'=>Product::getProductName((int)$productid,null,(int)$id_lang),
                                                'link'=>$this->context->link->getProductLink($productid,null,null,null,(int)$id_lang,(int)$id_shop),
                                                'image_link' =>$this->context->link->getImageLink($productObj->link_rewrite,$id_image,Configuration::get('GF_PRODUCT_TYPE'))
                                            );
                                        }
                                    }
                                    $this->context->smarty->assign(array(
                                            $field['name'].'product'=>$productData
                                        )
                                    );
                                }
                                    
                            }
                        }
                    }
                                
                    if(file_exists($module_dir.(int)$formObj->id_gformbuilderpro.'/'.(int)$id_lang.'/'.(int)$id_shop.'_form_codehook.tpl')){
                        return $this->fetch($module_dir.(int)$formObj->id_gformbuilderpro.'/'.(int)$id_lang.'/'.(int)$id_shop.'_form_codehook.tpl');
                    }else{
                        $formObj->parseTpl((int)$id_lang,(int)$id_shop);
                        return $this->fetch($module_dir.(int)$formObj->id_gformbuilderpro.'/'.(int)$id_lang.'/'.(int)$id_shop.'_form_codehook.tpl');
                    }
                }else return false;
            }
         }else
            return '';
         
    }
    public function getFormByShortCode($html=''){
        
        preg_match_all('/\{(gformbuilderpro:)(.*?)\}/', $html, $matches);
        
        
        $customShortCodes = array();
        
        if(isset($matches[0]) && $matches[0]){
            foreach($matches[0] as $key=>$content)
            {
                $matchNoBrackets = str_replace(array('{','}'),'',$content);
                $shortCodeExploded = explode(':', $matchNoBrackets);
                $customShortCodes['gformbuilderpro'][$key] = $shortCodeExploded[1];
                
            }
            
            foreach($customShortCodes as $shortCodeKey=>$shortCode)
            {
                if($shortCodeKey == 'gformbuilderpro')
                {
                    foreach($shortCode as $show)
                    {
                        $testingReplacementText = $this->getForm($show,$this->context->language->id,$this->context->shop->id);
                        $originalShortCode = "{gformbuilderpro:$show}";
                        
                        $html = str_replace($originalShortCode,$testingReplacementText,$html);
                        
                    }
                }
            }
        }
        return $html;
    }
}
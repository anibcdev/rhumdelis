<?php
/**
* The file is controller. Do not modify the file if you want to upgrade the module in future
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright  2017 Globo., Jsc
* @license   please read license in file license.txt
* @link	     http://www.globosoftware.net
*/

include_once(_PS_MODULE_DIR_ . 'gformbuilderpro/classes/gformbuilderproModel.php');
include_once(_PS_MODULE_DIR_ . 'gformbuilderpro/classes/gformbuilderprofieldsModel.php');
class AdminGformmanagerController extends ModuleAdminController
{
    public function __construct()
    {
        $this->className = 'gformbuilderproModel';
        $this->table = 'gformbuilderpro';
        parent::__construct();
        $this->meta_title = $this->module->l('Form builder pro');
        $this->deleted = false;
        $this->explicitSelect = true;
        $this->context = Context::getContext();
        $this->lang = true;
        $this->bootstrap = true;
        $this->_defaultOrderBy = 'id_gformbuilderpro';
        $this->_select = ' a.id_gformbuilderpro as shortcode, a.id_gformbuilderpro as frontlink,b.rewrite ';
        $this->filter = true;
        if (Shop::isFeatureActive()) {
            Shop::addTableAssociation($this->table, array('type' => 'shop'));
        }
        $this->bulk_actions = array(
			'delete' => array(
				'text' => $this->module->l('Delete selected'),
				'confirm' => $this->module->l('Delete selected items?'),
				'icon' => 'icon-trash'
			)
		);
        $this->position_identifier = 'id_gformbuilderpro';
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        
        
        $this->fields_list = array(
            'id_gformbuilderpro' => array(
                'title' => $this->module->l('ID'),
                'type' => 'int',
                'width' => 'auto',
                'orderby' => false),
            'title' => array(
                'title' => $this->module->l('Title'),
                'width' => 'auto',
                'orderby' => false),
            'shortcode' => array(
                'title' => $this->module->l('Shortcode'),
                'width' => 'auto',
                'orderby' => false,
                'callback' => 'printShortcode',
                ),
            'frontlink' => array(
                'title' => $this->module->l('Url'),
                'width' => 'auto',
                'orderby' => false,
                'callback' => 'printFrontlink',
                'remove_onclick'=>true
                ),
            'requiredlogin' => array(
                'title' => $this->module->l('Required Login'),
                'width' => 'auto',
                'active' => 'requiredlogin',
                'type' => 'bool',
                'orderby' => false),
            'saveemail' => array(
                'title' => $this->module->l('Save to Database'),
                'width' => 'auto',
                'active' => 'saveemail',
                'type' => 'bool',
                'orderby' => false),
            
            'active' => array(
                'title' => $this->module->l('Status'),
                'width' => 'auto',
                'active' => 'status',
                'type' => 'bool',
                'orderby' => false),
            );
        
    }
    public function setMedia()
    {
        parent::setMedia();
        $this->addJqueryUI('ui.sortable');
        $this->addJqueryUI('ui.draggable');
        $this->addJqueryUI('ui.droppable');
        $this->addJqueryPlugin('tagify');
        //fix version ps < 1.6.0.7 mising jquery plugin select2
        if(version_compare(_PS_VERSION_,'1.6.0.7') == -1){
            $this->addJqueryPlugin('autocomplete');
        }else
            $this->addJqueryPlugin('select2');
        $this->addJqueryPlugin('colorpicker');
        $this->addJqueryPlugin('fancybox');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/admin/gformbuilderpro.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/admin/validate.js');
        return true;
    }
    public function initToolBarTitle()
    {
        $this->toolbar_title[] = $this->module->l('Form builder pro');
        $this->toolbar_title[] = $this->module->l('Forms');
    }
    public function printShortcode($value, $form){
        if($value !='')
            return '{gformbuilderpro:'.$form['id_gformbuilderpro'].'}';
    }
    public function printFrontlink($value, $form){
        $url_rewrite = Context::getContext()->link->getModuleLink('gformbuilderpro','form',array('id'=>(int)$form['id_gformbuilderpro'],'rewrite'=>$form['rewrite']));
        if (!strpos($url_rewrite, 'index.php')){
            $url_rewrite = str_replace('?module=gformbuilderpro&controller=form','',$url_rewrite);
        }
        // fix friendly url ps 1.5
        if(Configuration::get('PS_REWRITING_SETTINGS') && version_compare(_PS_VERSION_,'1.6','<'))
        {
            $force_ssl = (Configuration::get('PS_SSL_ENABLED') && Configuration::get('PS_SSL_ENABLED_EVERYWHERE'));
            $shop = Context::getContext()->shop;
            $base = (($force_ssl) ? 'https://'.$shop->domain_ssl : 'http://'.$shop->domain);
            $url_rewrite =  $base.$shop->getBaseURI().'form/'.$form['rewrite'].'-g'.(int)$form['id_gformbuilderpro'].'.html';
        }
        //# fix friendly url ps 1.5
        if($value !='')
            return '<a href="'.$url_rewrite.'" target="_blank">'.$url_rewrite.'</a>';
        
    }
    public function initProcess()
    {
        parent::initProcess();
        if (Tools::isSubmit('requiredlogin'.$this->table) && Tools::getValue($this->identifier)) {
            $this->action = 'requiredlogin';
        }elseif (Tools::isSubmit('saveemail'.$this->table) && Tools::getValue($this->identifier)) {
            $this->action = 'saveemail';
        }
    }
    public function processRequiredlogin(){
        if (Validate::isLoadedObject($object = $this->loadObject())) {
            $object->requiredlogin = !$object->requiredlogin;
            $object->update(false);
        }
    }
    public function processSaveemail(){
        if (Validate::isLoadedObject($object = $this->loadObject())) {
            $object->saveemail = !$object->saveemail;
            $object->update(false);
        }
    }
    public function postProcess()
	{
	   if (Tools::isSubmit('gfromloaddefault')){
	       $fields = Tools::getValue('fields');
           $results = array(
                'errors'=>'1',
                'datas'=>array(),
                'datastext'=>array()
            );
           if($fields){
                $languages = Language::getLanguages(false);
                $id_shop = $this->context->shop->id;
                $logo = $this->context->link->getMediaLink(_PS_IMG_.Configuration::get('PS_LOGO'));
                $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/emaildefault.tpl';
                $shopname=Tools::safeOutput(Configuration::get('PS_SHOP_NAME', null, null, $id_shop));
                foreach($languages as $language){
                    $fieldsData = gformbuilderprofieldsModel::getAllFields($fields,(int)$language['id_lang'],$id_shop);
                    Context::getContext()->smarty->assign(array(
                                        'shop_logo'=>$logo,
                                        'shopname'=>$shopname,
                                        'shopurl'=>Context::getContext()->link->getPageLink('index', true, $language['id_lang'], null, false, $id_shop),
                            	        'fieldsData' => $fieldsData,
                                    ));
                    $results['datas'][$language['id_lang']] = Context::getContext()->smarty->fetch($tpl);
                    Context::getContext()->smarty->assign(array(
                                        'shop_logo'=>$logo,
                                        'fieldsData' => null,
                                        'shopname'=>$shopname,
                                        'shopurl'=>Context::getContext()->link->getPageLink('index', true, $language['id_lang'], null, false, $id_shop),
                                        'datassender'=>true
                                    ));
                    $results['subject'][$language['id_lang']] = '['.Tools::getValue('title_'.$language['id_lang']).']'.$this->module->l('New message');
                    $results['datassender'][$language['id_lang']] = Context::getContext()->smarty->fetch($tpl);
                    $results['datassendersubject'][$language['id_lang']] = '['.$shopname.'] '.$this->module->l('Your message has been successfully sent');
                }
                $results['errors'] = 0;
           }
	       die(Tools::jsonEncode($results));
	   }elseif (Tools::isSubmit('gfromloadshortcode')){
	       $fields = Tools::getValue('fields');
           $results = array(
                'errors'=>'1',
                'datas'=>array()
            );
           if($fields !='' && $fields !=','){
                $languages = Language::getLanguages(false);
                $id_shop = $this->context->shop->id;
                $logo = $this->context->link->getMediaLink(_PS_IMG_.Configuration::get('PS_LOGO'));
                $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/emaildefault.tpl';
                $shopname=Tools::safeOutput(Configuration::get('PS_SHOP_NAME', null, null, $id_shop));
                foreach($languages as $language){
                    $fieldsData = gformbuilderprofieldsModel::getAllFields($fields,(int)$language['id_lang'],$id_shop);
                    Context::getContext()->smarty->assign(array(
                                        'shop_logo'=>$logo,
                            	        'fieldsData' => $fieldsData,
                                        'shopname'=>$shopname,
                                        'shopurl'=>Context::getContext()->link->getPageLink('index', true, $language['id_lang'], null, false, $id_shop),
                                    ));
                    foreach($fieldsData as $field)
                        if($field['type'] !='html' && $field['type'] !='captcha' && $field['type'] !='googlemap')
                            $results['datas'][$language['id_lang']][] = array(
                                'label'=>$field['label'],
                                'shortcode'=>' {'.$field['name'].'}'
                            );
                    $results['datas'][$language['id_lang']][] = array(
                                'label'=>$this->module->l('Ip Address'),
                                'shortcode'=>' {user_ip}'
                            );
                    $results['datas'][$language['id_lang']][] = array(
                                'label'=>$this->module->l('Date add'),
                                'shortcode'=>'{date_add}'
                            );
                }
                $results['errors'] = 0;
           }
	       die(Tools::jsonEncode($results));
	   }elseif (Tools::isSubmit('gformgetproduct')){
	       $query = Tools::getValue('q', false);
            if (!$query or $query == '' or Tools::strlen($query) < 1) {
                die();
            }
            if ($pos = strpos($query, ' (ref:')) {
                $query = Tools::substr($query, 0, $pos);
            }
            $excludeIds = Tools::getValue('excludeIds', false);
            if ($excludeIds && $excludeIds != 'NaN') {
                $excludeIds = implode(',', array_map('intval', explode(',', $excludeIds)));
            } else {
                $excludeIds = '';
            }
            $context = Context::getContext();
            $sql = 'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`, image_shop.`id_image` id_image, il.`legend`, p.`cache_default_attribute`
            		FROM `'._DB_PREFIX_.'product` p
            		'.Shop::addSqlAssociation('product', 'p').'
            		LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product = p.id_product AND pl.id_lang = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('pl').')
            		LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
            			ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop='.(int)$context->shop->id.')
            		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$context->language->id.')
            		WHERE (pl.name LIKE \'%'.pSQL($query).'%\' OR p.reference LIKE \'%'.pSQL($query).'%\') 
                    '.(!empty($excludeIds) ? ' AND p.id_product NOT IN ('.$excludeIds.') ' : ' ').
                    ' GROUP BY p.id_product';
            if(version_compare(_PS_VERSION_,'1.6.0.12') == -1){
                $sql = 'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`, MAX(image_shop.`id_image`) id_image, il.`legend`
        		FROM `'._DB_PREFIX_.'product` p
        		LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product = p.id_product AND pl.id_lang = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('pl').')
        		LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product`)'.
        		Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
        		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$context->language->id.')
        		WHERE (pl.name LIKE \'%'.pSQL($query).'%\' OR p.reference LIKE \'%'.pSQL($query).'%\')'.
        		(!empty($excludeIds) ? ' AND p.id_product NOT IN ('.$excludeIds.') ' : ' ').
        		' GROUP BY p.id_product';
            }elseif(version_compare(_PS_VERSION_,'1.6.1.0') == -1){
                $sql = 'SELECT p.`id_product`, pl.`link_rewrite`, p.`reference`, pl.`name`, MAX(image_shop.`id_image`) id_image, il.`legend`, p.`cache_default_attribute`
        		FROM `'._DB_PREFIX_.'product` p
        		'.Shop::addSqlAssociation('product', 'p').'
        		LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product = p.id_product AND pl.id_lang = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('pl').')
        		LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product`)'.
        		Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
        		LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$context->language->id.')
        		WHERE (pl.name LIKE \'%'.pSQL($query).'%\' OR p.reference LIKE \'%'.pSQL($query).'%\')'.
        		(!empty($excludeIds) ? ' AND p.id_product NOT IN ('.$excludeIds.') ' : ' ').
        		' GROUP BY p.id_product';
            }
            $items = Db::getInstance()->executeS($sql);
            $results = array();
            if ($items) {
                foreach ($items as $item) {
                    $product = array(
                        'id' => (int)($item['id_product']),
                        'name' => $item['name'],
                        'ref' => (!empty($item['reference']) ? $item['reference'] : ''),
                        'image' => str_replace('http://', Tools::getShopProtocol(), $context->link->getImageLink($item['link_rewrite'], $item['id_image'], Configuration::get('GF_PRODUCT_TYPE'))),
                    );
                array_push($results, $product);
                }
            }
            $results = array_values($results);
            echo Tools::jsonEncode($results);
            die();
       }else{
    	   if (Tools::isSubmit('deletefields')){
    	       $deletefields = Tools::getValue('deletefields');
               if($deletefields !=''){
                    $deletefields_array = explode('_',$deletefields);
                    foreach($deletefields_array as $deletefield){
                        $fieldObj = new gformbuilderprofieldsModel((int)$deletefield);
                        if($fieldObj->id_gformbuilderprofields == (int)$deletefield && $fieldObj->id_gformbuilderprofields){
                            $fieldObj->delete();
                        }
                    }
               }
    	   }
           $savenew = false;
           $id_gformbuilderpro = (int)Tools::getValue('id_gformbuilderpro');
           if($id_gformbuilderpro<=0){ $savenew = true;}
           //minify html code before save to database (remove space in HTML file)
           //I can't use Tools:getValue here.
           if(Tools::getIsset('formtemplate')){
                $_POST['formtemplate'] = gformbuilderproModel::minifyHtml(Tools::getValue('formtemplate'));
           }
           //#end minify
           $return = parent::postProcess(true);
           if (Tools::isSubmit('submitAddgformbuilderpro')){
               if(is_object($return) && get_class($return) == 'gformbuilderproModel'){
                    $id_gformbuilderpro = (int)Tools::getValue('id_gformbuilderpro');
                    if($id_gformbuilderpro<=0){ $id_gformbuilderpro = $return->id;}
                    $formObj = Module::getInstanceByName('gformbuilderpro');
                    $hooks = Tools::getValue('hooks');
                    if($hooks){
                        $hooks_array = explode(',',$hooks);
                        foreach ($hooks_array as $hook)
                        {
                            if (Validate::isHookName($hook) && !$formObj->isRegisteredInHook($hook))
                            {
                                $formObj->registerHook($hook);
                            }
                        }
                    }
                    $shopsactive = Tools::getValue('checkBoxShopAsso_gformbuilderpro');
                    if($savenew){
                        $formModelObj = new gformbuilderproModel($id_gformbuilderpro);
                        $languages = Language::getLanguages(false);
                        $id_shop = $this->context->shop->id;
                        $logo = $this->context->link->getMediaLink(_PS_IMG_.Configuration::get('PS_LOGO'));
                        $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/emaildefault.tpl';
                        $shopname=Tools::safeOutput(Configuration::get('PS_SHOP_NAME', null, null, $id_shop));
                        foreach($languages as $language){
                            if(isset($formModelObj->emailtemplate) && 
                                isset($formModelObj->emailtemplatesender) && 
                                ($formModelObj->emailtemplate[(int)$language['id_lang']] == '' || $formModelObj->emailtemplatesender[(int)$language['id_lang']] == '')
                            ){
                                $fieldsData = gformbuilderprofieldsModel::getAllFields($formModelObj->fields,(int)$language['id_lang'],$id_shop);
                                Context::getContext()->smarty->assign(array(
                                                    'shop_logo'=>$logo,
                                        	        'fieldsData' => $fieldsData,
                                                    'shopname'=>$shopname,
                                                    'shopurl'=>Context::getContext()->link->getPageLink('index', true, $language['id_lang'], null, false, $id_shop),
                                                ));
                                if($formModelObj->emailtemplate[(int)$language['id_lang']] == ''){
                                    $formModelObj->emailtemplate[(int)$language['id_lang']] = Context::getContext()->smarty->fetch($tpl);
                                }
                            }
                        }
                        $formModelObj->update();
                    }
                    foreach (Language::getLanguages() as $lang){
                        if($shopsactive){
                            $this->parseEmailAndTpl((int)$id_gformbuilderpro,$lang,$shopsactive);
                            foreach($shopsactive as $id_shop){
                                $formObj->setFormUrl($id_gformbuilderpro,$return->rewrite[$lang["id_lang"]],$lang["id_lang"]);
                            }
                        }else{
                            $id_shop = $this->context->shop->id;
                            $this->parseEmailAndTpl((int)$id_gformbuilderpro,$lang);
                            $formObj->setFormUrl($id_gformbuilderpro,$return->rewrite[$lang["id_lang"]],$lang["id_lang"]);
                        }
                    }
               }
           }
       }
	}
    public function renderForm()
    {
        $id_gformbuilderpro = (int)Tools::getValue('id_gformbuilderpro');
        $allfieldstype = gformbuilderprofieldsModel::getAllFieldType();
        if($id_gformbuilderpro>0){
            $formObj = new gformbuilderproModel((int)$id_gformbuilderpro);
            $datas = array();
            $fields = $formObj->fields;
            if($fields){
                $languages = Language::getLanguages(false);
                $id_shop = $this->context->shop->id;
                $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/front/emaildefault.tpl';
                foreach($languages as $language){
                    $fieldsData = gformbuilderprofieldsModel::getAllFields($fields,(int)$language['id_lang'],$id_shop);
                    foreach($fieldsData as $field)
                        if($field['type'] !='html' && $field['type'] !='captcha' && $field['type'] !='googlemap')
                            $datas[$language['id_lang']][] = array(
                                'label'=>$field['label'],
                                'shortcode'=>' {'.$field['name'].'}'
                            );
                    $datas[$language['id_lang']][] = array(
                            'label'=>$this->module->l('Ip Address'),
                            'shortcode'=>' {user_ip}'
                        );
                    $datas[$language['id_lang']][] = array(
                                'label'=>$this->module->l('Date add'),
                                'shortcode'=>'{date_add}'
                            );
                }
           }
           $this->fields_value = array(
                'formtemplate'=>Tools::getValue('formtemplate',$formObj->formtemplate),
                'allfieldstype'=>$allfieldstype,
                'shortcodes'=>$datas,
                'autoredirect'=>(bool)$formObj->autoredirect,
                'timedelay'=>(int)$formObj->timedelay,
                'redirect_link'=>$formObj->redirect_link
            );
        }else{
            $this->fields_value = array(
                'formtemplate'=>Tools::getValue('formtemplate',''),
                'allfieldstype'=>$allfieldstype,
                'sendto'=>Configuration::get('PS_SHOP_EMAIL'),
                'autoredirect'=>0,
                'timedelay'=>0,
                'redirect_link'=>''
            );
            $languages = Language::getLanguages(false);
            foreach($languages as $language){
                $this->fields_value['submittitle'][$language['id_lang']] = $this->module->l('Sent');
                $this->fields_value['subject'][$language['id_lang']] = '['.Configuration::get('PS_SHOP_NAME').']';
            } 
        }
        $id_shop_group = Shop::getContextShopGroupID();
		$id_shop = Shop::getContextShopID();
        $this->fields_value['idlang_default'] = (int)$this->context->language->id;
        $this->fields_value['field_width_default'] = (int)Configuration::get('GF_FIELD_WIDTH_DEFAULT', null, $id_shop_group, $id_shop);
        $this->fields_value['field_width_tablet_default'] = (int)Configuration::get('GF_FIELD_WIDTH_TABLET_DEFAULT', null, $id_shop_group, $id_shop);
        $this->fields_value['group_width_mobile_default'] = (int)Configuration::get('GF_FIELD_WIDTH_MOBILE_DEFAULT', null, $id_shop_group, $id_shop);
        $this->fields_value['group_width_default'] = (int)Configuration::get('GF_GROUP_WIDTH_DEFAULT', null, $id_shop_group, $id_shop);
        if($this->fields_value['field_width_default'] == 0){$this->fields_value['field_width_default'] = 12;}
        if($this->fields_value['field_width_tablet_default'] == 0){$this->fields_value['field_width_tablet_default'] = 12;}
        if($this->fields_value['group_width_mobile_default'] == 0){$this->fields_value['group_width_mobile_default'] = 12;}
        if($this->fields_value['group_width_default'] == 0){
            $this->fields_value['group_width_default'] = 12;
        }
        $this->fields_value['loadjqueryselect2'] = 1;
        if(version_compare(_PS_VERSION_,'1.6.0.7') == -1){
            $this->fields_value['loadjqueryselect2'] = 0;
        }
        if(version_compare(_PS_VERSION_,'1.6') == -1){
            $this->fields_value['psoldversion15'] = -1;
        }else $this->fields_value['psoldversion15'] = 0;
        
        
        $input = array();
        $input[] = array(
            'type' => 'formbuildertabopen',
            'name' => 'tabmain',
            'class' =>'activetab'
            );
        $input[] = array(
            'type' => 'text',
            'label' => $this->module->l('Form Title'),
            'hint' => $this->module->l('Invalid characters') . ' &lt;&gt;;=#{}',
            'name' => 'title',
            'size' => 255,
            'required' => true,
            'lang' => true);
        $input[] = array(
            'type' => 'tags',
            'label' => $this->module->l('Meta Keywords'),
            'hint' => $this->module->l('SEO'),
            'name' => 'metakeywords',
            'lang' => true,
            'hint' => array($this->module->l('Invalid characters:') . ' &lt;&gt;;=#{}', $this->module->l('To add "Meta keywords" click in the field, write something, and then press "Enter."')));
        $input[] = array(
            'type' => 'textarea',
            'label' => $this->module->l('Meta Description'),
            'hint' => $this->module->l('Invalid characters') . ' &lt;&gt;;=#{}',
            'name' => 'metadescription',
            'lang' => true,
            'cols'=>50,
            'rows'=>5
            
            );
        $input[] = array(
            'type' => 'text',
            'label' => $this->module->l('Friendly Url'),
            'name' => 'rewrite',
            'hint' => $this->module->l('Only letters and the hyphen (-) character are allowed.'),
            'size' => 255,
            'class'=>'rewrite_url',
            'lang' => true);
        $input[] = array(
            'type' => 'tags',
            'label' => $this->module->l('Hooks to'),
            'hint' => $this->module->l('It mean, the module can display anywhere by hook. So if you want to display the module in left bar. Then enter "displayLeftColumn".'),
            'desc' => $this->module->l('To add "Hook" click in the field, write hook name(ex: displayHome), and then press "Enter".Learn more about Prestashop Front-office hook: ').'<a target="_blank" href="http://doc.prestashop.com/display/PS15/Hooks+in+PrestaShop+1.5">http://doc.prestashop.com/display/PS15/Hooks+in+PrestaShop+1.5</a>',
            'name' => 'hooks');
        $input[] = array(
            'type' => (version_compare(_PS_VERSION_,'1.6') == -1) ? 'radio' : 'switch',
            'label' => $this->module->l('Status'),
            'name' => 'active',
            'required' => false,
            'is_bool' => true,
            'class'=>'switch_radio',
            'values' => array(array(
                    'id' => 'active_on',
                    'value' => 1,
                    'label' => $this->module->l('Active')), 
                    array(
                    'id' => 'active_off',
                    'value' => 0,
                    'label' => $this->module->l('Inactive'))));
        $input[] = array(
            'type' => (version_compare(_PS_VERSION_,'1.6') == -1) ? 'radio' : 'switch',
            'label' => $this->module->l('Save Submited Form Data to Database'),
            'hint' => $this->module->l('Yes if you want to collect and manage the submissions form data.'),
            'name' => 'saveemail',
            'required' => false,
            'is_bool' => true,
            'class'=>'switch_radio',
            'values' => array(array(
                    'id' => 'saveemail_on',
                    'value' => 1,
                    'label' => $this->module->l('Active')),
                    array(
                    'id' => 'saveemail_off',
                    'value' => 0,
                    'label' => $this->module->l('Inactive'))));
        $input[] = array(
            'type' => (version_compare(_PS_VERSION_,'1.6') == -1) ? 'radio' : 'switch',
            'label' => $this->module->l('Submit Form by Ajax?'),
            'hint' => $this->module->l('Yes, if you do not want reload form when customer click to submit button'),
            'name' => 'usingajax',
            'required' => false,
            'is_bool' => true,
            'class'=>'switch_radio',
            'values' => array(array(
                    'id' => 'usingajax_on',
                    'value' => 1,
                    'label' => $this->module->l('YES')),
                     array(
                    'id' => 'usingajax_off',
                    'value' => 0,
                    'label' => $this->module->l('NO'))));
        $input[] = array(
            'type' => (version_compare(_PS_VERSION_,'1.6') == -1) ? 'radio' : 'switch',
            'label' => $this->module->l('Required Login'),
            'hint' => $this->module->l('If Yes, then customer have to login before view form.'),
            'name' => 'requiredlogin',
            'required' => false,
            'is_bool' => true,
            'class'=>'switch_radio',
            'values' => array(array(
                    'id' => 'requiredlogin_on',
                    'value' => 1,
                    'label' => $this->module->l('Yes')),
                     array(
                    'id' => 'requiredlogin_off',
                    'value' => 0,
                    'label' => $this->module->l('No'))));
        // new field in v1.0.5            
        $input[] = array(
            'type' => 'autoredirect',
            'label' => $this->module->l('Redirect after submit'),
            'name' => 'autoredirect');              
        //# new field in v1.0.5   
        if (Shop::isFeatureActive()) {
            $input[] = array(
                'type' => 'shop',
                'label' => $this->module->l('Shop association'),
                'name' => 'checkBoxShopAsso',
                );
        }
        $input[] = array(
            'type' => 'formbuildertabclose',
            'name' => 'closetab1',
            );
        $input[] = array(
            'type' => 'formbuildertabopen',
            'name' => 'tabtemplate',
            );
        $input[] = array('type' => 'formbuilder', 'name' => 'formbuilder');
        $input[] = array(
            'type' => 'text',
            'label' => $this->module->l('Submit button title'),
            'name' => 'submittitle',
            'size' => 255,
            'required' => true,
            'lang' => true);
        $input[] = array(
            'type' => 'textarea',
            'name' => 'fields',
            'class' => 'hidden',
            'cols'=>50,
            'rows'=>5
            );
        $input[] = array(
            'type' => 'formbuildertabclose',
            'name' => 'closetab2',
            );
        $input[] = array(
            'type' => 'formbuildertabopen',
            'name' => 'tabemail',
            );
        $input[] = array(
            'type' => 'tags',
            'label' => $this->module->l('Admin Email Address'),
            'desc' => $this->module->l('To add "Email" click in the field, write email(ex: demo@demo.com), and then press "Enter."'),
            'name' => 'sendto',
            'required' => true,
            );
        $input[] = array(
            'type' => 'emailshortcode',
            'name' => 'warrning_text',
            'label' => '');
        $input[] = array(
            'type' => 'textarea',
            'label' => $this->module->l('Admin Subject'),
            'name' => 'subject',
            'lang' => true,
            'desc' => $this->module->l('You can use variables. You can see list of variables above. Example:').'<code>{input_1459352107}</code>',
            'required' => true,
            'cols'=>50,
            'rows'=>5);
        $input[] = array(
            'type' => 'textarea',
            'label' => $this->module->l('Admin Message'),
            'name' => 'emailtemplate',
            'autoload_rte' => true,
            'lang' => true,
            'desc' => $this->module->l('You can use variables. You can see list of variables above. Example:').'<code>{input_1459352107}</code>',
            'required' => true,
            'cols'=>50,
            'rows'=>5);
        $input[] = array(
            'type' => (version_compare(_PS_VERSION_,'1.6') == -1) ? 'radio' : 'switch',
            'label' => $this->module->l('Send email to Sender'),
            'name' => 'sendtosender',
            'required' => false,
            'desc' => $this->module->l('Yes if you want send message email to sender who submit email'),
            'is_bool' => true,
            'class'=>'switch_radio',
            'values' => array(array(
                    'id' => 'sendtosender_on',
                    'value' => 1,
                    'label' => $this->module->l('Yes')),
                     array(
                    'id' => 'sendtosender_off',
                    'value' => 0,
                    'label' => $this->module->l('No'))));
        $input[] = array(
            'type' => 'text',
            'label' => $this->module->l('Sender email'),
            'desc' => $this->module->l('Sender email will be get from form data. So you have to enter variable to this field. Example there is a field EMAIL in this form. Then you have to enter variable of the field. Example:').'<code>{input_1459352107}</code>',
            'name' => 'sender',
            'required' => false);
        $input[] = array(
            'type' => 'textarea',
            'label' => $this->module->l('Sender Subject'),
            'desc' => $this->module->l('You can use variables. You can see list of variables above. Example:').'<code>{input_1459352107}</code>',
            'name' => 'subjectsender',
            'lang' => true,
            'required' => false,
            'cols'=>50,
            'rows'=>5);
        $input[] = array(
            'type' => 'textarea',
            'label' => $this->module->l('Sender Message'),
            'desc' => $this->module->l('You can use variables. You can see list of variables above. Example:').'<code>{input_1459352107}</code>',
            'name' => 'emailtemplatesender',
            'autoload_rte' => true,
            'lang' => true,
            'cols'=>50,
            'rows'=>5);
        $input[] = array(
            'type' => 'formbuildertabclose',
            'name' => 'closetab3',
            );
        $input[] = array(
            'type' => 'formbuildertabopen',
            'name' => 'tabmessage',
            );
        $input[] = array(
            'type' => 'textarea',
            'label' => $this->module->l('Sender\'s message was sent successfully'),
            'name' => 'success_message',
            'autoload_rte' => true,
            'desc' => $this->module->l('You can use variables. You can see list of variables in MAIL tab. Example:').'<code>{input_1459352107}</code>',
            'lang' => true,
            'cols'=>50,
            'rows'=>5);
        $input[] = array(
            'type' => 'textarea',
            'label' => $this->module->l('Sender\'s message failed to send'),
            'name' => 'error_message',
            'autoload_rte' => true,
            'lang' => true,
            'cols'=>50,
            'rows'=>5);
        $input[] = array(
            'type' => 'formbuildertabclose',
            'name' => 'closetab4',
            );
        $this->fields_form = array(
                'legend' => array('title' => $this->module->l('Form Config'), 'icon' => 'icon-cogs'),
                'input' => $input,
                'submit' => array(
                                'title' => $this->module->l('Save'), 
                                'name' =>'submitAddgformbuilderpro'
                                ),
                'buttons' => array(
                    'save_and_stay' => array(
    					'name' => 'submitAddgformbuilderproAndStay',
    					'type' => 'submit',
    					'title' => $this->module->l('Save and Stay'),
    					'class' => 'btn btn-default pull-right',
    					'icon' => 'process-icon-save'
    				),
    			)
            );
            if($id_gformbuilderpro){
                $formObj = new gformbuilderproModel((int)$id_gformbuilderpro,(int)Context::getContext()->language->id,(int)Context::getContext()->shop->id);
                $url_rewrite = Context::getContext()->link->getModuleLink('gformbuilderpro','form',array('id'=>(int)$id_gformbuilderpro,'rewrite'=>$formObj->rewrite));
                if (!strpos($url_rewrite, 'index.php')){
                    $url_rewrite = str_replace('?module=gformbuilderpro&controller=form','',$url_rewrite);
                }
                // fix friendly url ps 1.5
                if(Configuration::get('PS_REWRITING_SETTINGS') && version_compare(_PS_VERSION_,'1.6','<'))
                {
                    $force_ssl = (Configuration::get('PS_SSL_ENABLED') && Configuration::get('PS_SSL_ENABLED_EVERYWHERE'));
                    $shop = Context::getContext()->shop;
                    $base = (($force_ssl) ? 'https://'.$shop->domain_ssl : 'http://'.$shop->domain);
                    $url_rewrite =  $base.$shop->getBaseURI().'form/'.$formObj->rewrite.'-g'.(int)$id_gformbuilderpro.'.html';
                }
                //# fix friendly url ps 1.5
                Context::getContext()->smarty->assign(array(
                    'shortcode'=>'{gformbuilderpro:'.$id_gformbuilderpro.'}',
                    'smartycode'=>'{hook h=\'displayGform\' id=\''.$id_gformbuilderpro.'\'}',
        	        'formlink' => $url_rewrite,
                ));
            }
            Context::getContext()->smarty->assign(array(
                    'psversion15'=>version_compare(_PS_VERSION_,'1.6'),
                    'gdefault_language'=>(int)Context::getContext()->language->id
                ));
            $tpl = _PS_MODULE_DIR_.'gformbuilderpro/views/templates/admin/gformmanager/tabs.tpl';
            return Context::getContext()->smarty->fetch($tpl).parent::renderForm();
    }
    public function parseEmailAndTpl($id_form,$lang,$id_shops=null){
        $formObj = new gformbuilderproModel((int)$id_form);
        if($formObj->id_gformbuilderpro == (int)$id_form){
            if($id_shops && is_array($id_shops)){
                foreach($id_shops as $id_shop){
                    $formObj->parseTpl($lang["id_lang"],$id_shop);
                    $formObj->parseEmail($lang,'form_'.$id_form.'_'.$id_shop);
                    if($formObj->sendtosender) $formObj->parseEmail($lang,'sender_'.$id_form.'_'.$id_shop,true);
                }
            }else{
                $id_shop = $id_shops;
                if($id_shop == null)
                    $id_shop = $this->context->shop->id;
                $formObj->parseTpl($lang["id_lang"],$id_shop);
                $formObj->parseEmail($lang,'form_'.$id_form.'_'.$id_shop);
                if($formObj->sendtosender) $formObj->parseEmail($lang,'sender_'.$id_form.'_'.$id_shop,true);
            }
        }
    }
}
?>
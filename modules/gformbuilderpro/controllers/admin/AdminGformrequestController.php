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
include_once(_PS_MODULE_DIR_ . 'gformbuilderpro/classes/gformrequestModel.php');
class AdminGformrequestController extends ModuleAdminController
{
    public $statuses_array = array();
    public function __construct()
    {
        $download = Tools::getValue('download');
        if($download!=''){
            if(file_exists(_PS_UPLOAD_DIR_.$download)){
                header('Content-Transfer-Encoding: binary');
                header('Content-Type: '.$download);
                header('Content-Length: '.filesize(_PS_UPLOAD_DIR_.$download));
                header('Content-Disposition: attachment; filename="'.utf8_decode($download).'"');
                @set_time_limit(0);
                readfile(_PS_UPLOAD_DIR_.$download);
            }
            exit;
        }
        $this->className = 'gformrequestModel';
        $this->table = 'gformrequest';
        parent::__construct();
        $changeStatus = Tools::getValue('changeStatus');
        if($changeStatus == '1'){
            $result = array(
                'success'=>0,
                'warrning'=>$this->module->l('Change status fail, please try again')
            );
            $idrequest = (int)Tools::getValue('id');
            $requestObj = new gformrequestModel($idrequest);
            if(Validate::isLoadedObject($requestObj)){
                $requestObj->status = (int)Tools::getValue('val');
                $requestObj->update();
                $result = array(
                    'success'=>1,
                    'warrning'=>$this->module->l('Change status successfull')
                );
            }
            echo Tools::jsonEncode($result);
            die();
        }
        
        
        $this->meta_title = $this->module->l('Forms Request');
        $this->deleted = false;
        $this->explicitSelect = true;
        $this->context = Context::getContext();
        $this->lang = false;
        $this->bootstrap = true;
        $this->_defaultOrderBy = 'id_gformrequest';
        $this->_defaultOrderWay = 'desc';
        $this->filter = false;
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
        $this->position_identifier = 'id_gformrequest';
        $this->addRowAction('view');
        $this->addRowAction('delete');
        $this->_select = ' fb.title as fbtitle ';
        $this->_join = ' LEFT JOIN `'._DB_PREFIX_.'gformbuilderpro` f ON (a.`id_gformbuilderpro` = f.`id_gformbuilderpro`) 
                        LEFT JOIN `'._DB_PREFIX_.'gformbuilderpro_lang` fb ON (a.`id_gformbuilderpro` = fb.`id_gformbuilderpro` AND fb.id_lang = '.(int)$this->context->language->id.') 
                        LEFT JOIN `'._DB_PREFIX_.'gformbuilderpro_shop` fc ON (a.`id_gformbuilderpro` = fc.`id_gformbuilderpro` AND fc.id_shop = '.(int)$this->context->shop->id.')';
        $titles_array = array();
        $forms = gformbuilderproModel::getAllBlock();        
        foreach ($forms as $form) {
            $titles_array[$form['id_gformbuilderpro']] = $form['title'];
        }
        $this->statuses_array = array(
            '0'=>$this->l('Submitted'),
            '1'=>$this->l('Pending'),
            '2'=>$this->l('Closed')
        );        
        $this->fields_list = array(
            'id_gformrequest' => array(
                'title' => $this->module->l('ID'),
                'type' => 'int',
                'width' => 'auto',
                'orderby' => false),
            'fbtitle' => array(
                'title' => $this->module->l('Form Title'),
                'filter_key' => 'a!id_gformbuilderpro',
                'type' => 'select',
                'list' => $titles_array,
                'filter_type' => 'int',
                'order_key' => 'fb!fbtitle'
            ),               
            'subject' => array(
                'title' => $this->module->l('Mail Subject'),
                'type' => 'text',
                'width' => 'auto',
                'orderby' => false,
                'filter_key' => 'a!subject'
                ),
            'sendto' => array(
                'title' => $this->module->l('Sent To'),
                'type' => 'text',
                'width' => 'auto',
                'orderby' => false,
                'filter_key' => 'a!sendto'),
            'status' => array(
                'title' => $this->module->l('Status'),
                'type' => 'select',
                'color' => 'color',
                'list' => $this->statuses_array,
                'filter_key' => 'a!status',
                'filter_type' => 'int',
                'orderby' => false,
                'callback' => 'printStatus'
            ),
            'date_add' => array(
                'title' => $this->module->l('Date'),
                'type' => 'datetime',
                'width' => 'auto',
                'orderby' => false,
                'filter_key' => 'a!date_add'),
            );
    }
    public function setMedia()
    {
        parent::setMedia();
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/admin/gformbuilderpro.js');
        return true;
    }
    public function printStatus($status,$row){
        return $this->statuses_array[(int)$status];
    }
    public function initToolbar()
    {
        parent::initToolbar();
        unset($this->toolbar_btn['new']);
    }
    public function initToolBarTitle()
    {
        $this->toolbar_title[] = $this->module->l('Form');
        $this->toolbar_title[] = $this->module->l('Received Data');
    }
    public function renderView(){
        $idrequest = (int)Tools::getValue('id_gformrequest');
        $extension = array('jpg','jpeg','gif','png');
        if($idrequest > 0){
            $requestObj = new gformrequestModel($idrequest);
            if(version_compare(_PS_VERSION_,'1.6') != -1)
                $this->initPageHeaderToolbar();
            $this->tpl_view_vars = array(
                'id_gformbuilderpro'=>$requestObj->id_gformbuilderpro,
                'idrequest'=>$idrequest,
                'user_ip'=>$requestObj->user_ip,
                'subject'=>$requestObj->subject,
                'request'=>$requestObj->request,
                'date_add'=>$requestObj->date_add,
                'requestdownload'=>$this->context->link->getAdminLink('AdminGformrequest').'&download=',
                'backurl'=>$this->context->link->getAdminLink('AdminGformrequest'),
                'statuses_array'=>$this->statuses_array,
                'status'=>$requestObj->status
            );
            if($requestObj->attachfiles !=''){
                $attachfiles = explode(',',$requestObj->attachfiles);
                foreach($attachfiles as $file){
                    if($file !='' && file_exists(_PS_UPLOAD_DIR_.$file)){
                        if(in_array(Tools::strtolower(Tools::substr($file, -3)), $extension) || 
                            in_array(Tools::strtolower(Tools::substr($file, -4)), $extension)){
                             $this->tpl_view_vars['attachfiles'][] = array('isImage'=>true,'name'=>$file);   
                        }else{
                            $this->tpl_view_vars['attachfiles'][] = array('isImage'=>false,'name'=>$file);
                        }
                    }
                        
                }
            }
            $this->base_tpl_view = 'viewrequest.tpl';
        }
        return parent::renderView();
    }
}
?>
<?php
/**
* The file is Field Config of module. Do not modify the file if you want to upgrade the module in future
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright  2017 Globo., Jsc
* @license   please read license in file license.txt
* @link	     http://www.globosoftware.net
*/

class Spinnerfield
{
    public  function getInfo()
	{
		return array(
                'label' => $this->l('Spinner'),
                'desc' => $this->l('../modules/gformbuilderpro/views/img/spinner.png'),
                'possition' =>10
                );
	}
    public function getConfig()
	{
	   $label_pos = array(
            array('value' => '0','name' => 'Top'),
            array('value' => '1','name' => 'Left'),
            array('value' => '2','name' => 'Right'),
            array('value' => '3','name' => 'Hidden'),
        );
 	    $validatearray = array(
            array('value' => 'isInt','name' => 'isInt'),
            array('value' => 'isUnsignedInt','name' => 'isUnsignedInt'),
        );
		$inputs = array(
            array(
				'type' => 'hidden',
				'name' => 'type',
			),
            array(
				'type' => 'text',
				'name' => 'label',
                'lang'=>true,
				'label' => $this->l('Label'),
                'required'=>true,
                'class'=>'gvalidate  gvalidate_isRequired',
			),
			array(
				'type' => 'text',
				'name' => 'name',
				'label' => $this->l('Name'),
                'class'=>'gvalidate gvalidate_isName gvalidate_isRequired',
                'required'=>true
			),
            array(
				'type' => 'slidervalue',
				'name' => 'extra',
				'label' => $this->l('Value'),
                'required' => true,
                'class'=>'gvalidate gvalidate_sliderValue',
                //'desc' =>$this->l('Min-Max-Default (Ex: 1-100-30)'),
			),
            array(
                'type' => (version_compare(_PS_VERSION_,'1.6') == -1) ? 'radio' : 'switch',
                'label' => $this->l('Required field'),
                'name' => 'required',
                'required' => false,
                'is_bool' => true,
                'values' => array(array(
                        'id' => 'required_on',
                        'value' => 1,
                        'label' => $this->l('Yes')), array(
                        'id' => 'required_off',
                        'value' => 0,
                        'label' => $this->l('No')))),
            array(
                'type' => 'select',
                'label' => $this->l('Label position'),
                'name' => 'labelpos',
                'required' => false,
                'lang' => false,
                'options' => array(
                    'query' => $label_pos,
                    'id' => 'value',
                    'name' => 'name'
                )),
            array(
                'type' => 'select',
                'label' => $this->l('Validate'),
                'name' => 'validate',
                'required' => false,
                'lang' => false,
                'options' => array(
                    'query' => $validatearray,
                    'id' => 'value',
                    'name' => 'name'
                )),
            array(
				'type' => 'textarea',
				'name' => 'description',
                'id' => 'description',
                'lang' => true,
				'label' => $this->l('Description'),
            'cols'=>50,
            'rows'=>5
			),
			array(
				'type' => 'text',
				'name' => 'idatt',
				'label' => $this->l('Id'),
                'class'=>'gvalidate gvalidate_isId',
			),
            array(
				'type' => 'text',
				'name' => 'classatt',
				'label' => $this->l('Class'),
                'class'=>'gvalidate gvalidate_isClass',
			),
		);
		return $inputs;
	}
    public function l($string, $specific = false)
	{
		return Translate::getModuleTranslation('gformbuilderpro', $string, ($specific) ? $specific : 'gformbuilderpro');
	}
}
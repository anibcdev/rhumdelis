<?php
/**
 * Project : everpopup
 * @author Team Ever
 * @link http://team-ever.com
 * @copyright Team Ever
 * @license   Tous droits réservés / Le droit d'auteur s'applique (All rights reserved / French copyright law applies)
 */

class EverpopupClass extends ObjectModel
{
	public $id;
	public $id_shop;
	public $ever_home_logo_link;
	public $ever_title;
	public $ever_subheading;
	public $ever_paragraph;
	public $ever_logo_subheading;
	public $cookie_time;
	public $showCondition;
	public $show_subscription_form;

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'everpopup',
		'primary' => 'id_everpopup',
		'multilang' => true,
		'fields' => array(
			'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
			'ever_home_logo_link' => array('type' => self::TYPE_STRING, 'validate' => 'isUrl'),
			'ever_title' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName'),
			'ever_subheading' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName'),
			'ever_paragraph' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
			'ever_logo_subheading' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName'),
			'show_subscription_form' => array('type' => self::TYPE_INT, 'lang' => false, 'validate' => 'isBool', 'required' => true),
		)
	);

	public static function getByIdShop($id_shop)
	{
		$sql = new DbQuery();
		$sql->select("id_everpopup");
		$sql->from("everpopup");
		$sql->where("id_shop = $id_shop");

		$id = Db::getInstance()->getValue($sql);

		return new EverpopupClass($id);
	}

	public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST as $key => $value)
		{
			if (key_exists($key, $this) && $key != 'id_'.$this->table)
				$this->{$key} = $value;
		}

		/* Multilingual fields */
		if (count($this->fieldsValidateLang))
		{
			$languages = Language::getLanguages(false);
			foreach ($languages as $language)
			{
				foreach ($this->fieldsValidateLang as $field => $validation)
				{
					if (Tools::getIsset($field.'_'.(int)$language['id_lang']))
						$this->{$field}[(int)$language['id_lang']] = $_POST[$field.'_'.(int)$language['id_lang']];
				}
			}
		}
	}
}

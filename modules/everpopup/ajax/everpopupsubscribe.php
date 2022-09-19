<?php
/**
 * Project : everpopup
 * @author Team Ever
 * @link https://www.team-ever.com
 * @copyright Team Ever
 * @license   Tous droits réservés / Le droit d'auteur s'applique (All rights reserved / French copyright law applies)
 */

include(dirname(__FILE__).'/../../../config/config.inc.php');
include(dirname(__FILE__).'/../../../../init.php');

/*
    $_POST contains :
		"ever_shop"
		"ever_ip"
		"ever_referer"
		"ever_email"
		"ever_baseUrl"
*/

if (Tools::getIsset('ever_shop') && !empty(Tools::getValue('ever_shop'))) {
	$ever_shop =  Tools::getValue('ever_shop');
} else {
	$ever_shop = 1;
}

if (Tools::getIsset('ever_ip') && !empty(Tools::getValue('ever_ip'))) {
	$ever_ip =  Tools::getValue('ever_ip');
} else {
	die(Tools::jsonEncode(array('return' => false, 'error' => 'User ip not found.')));
}

if (Tools::getIsset('ever_email') && !empty(Tools::getValue('ever_email'))) {
	$ever_email =  Tools::getValue('ever_email');
	if (!Validate::isEmail($ever_email)) {
		die(Tools::jsonEncode(array('return' => false, 'error' => 'Mail address not valid')));
	}
} else {
	die(Tools::jsonEncode(array('return' => false, 'error' => 'No mail address')));
}

// Get current date time
$date = new DateTime();

// Check if email address already exists
$sql = new DbQuery();
$sql->select('id');
$sql->from('newsletter');
$sql->where("email = '$ever_email'");

$ifExist = Db::getInstance()->getValue($sql);

if ($ifExist) {
    die(Tools::jsonEncode(array('return' => false, 'error' => 'This email address already exist')));
} else {
	// Add new email address to newsletter table
	$newSubscription = Db::getInstance()->insert(
		'newsletter', array(
			'id_shop' => (int)$ever_shop,
			'id_shop_group' => (int)$ever_shop,
			'email' => $ever_email,
			'newsletter_date_add' => $date->format('Y-m-d H:i:s'),
			'ip_registration_newsletter' => $ever_ip,
			'active' => 1,
	));

	if ($newSubscription) {
	    die(Tools::jsonEncode(array('return' => true)));
	} else {
	    die(Tools::jsonEncode(array('return' => false, 'error' => 'Sorry, something went wrong. The mail address could not be saved. Please try again later.')));
	}
}
?>

<?php
/**
 * Project : everpopup
 * @author Team Ever
 * @link http://team-ever.com
 * @copyright Team Ever
 * @license   Tous droits réservés / Le droit d'auteur s'applique (All rights reserved / French copyright law applies)
 */

/* Init */
$sql = array();

/* Create Tables in Database */
$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'everpopup` (
         `id_everpopup` int(10) unsigned NOT NULL auto_increment,
         `id_shop` int(10) unsigned NOT NULL,
         `ever_home_logo_link` varchar(255) NOT NULL,
         `show_subscription_form` tinyint(1) NOT NULL,
         PRIMARY KEY (`id_everpopup`))
         ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'everpopup_lang` (
         `id_everpopup` int(10) unsigned NOT NULL,
         `id_lang` int(10) unsigned NOT NULL,
         `ever_title` varchar(255) NOT NULL,
         `ever_subheading` varchar(255) NOT NULL,
         `ever_paragraph` text NOT NULL,
         `ever_logo_subheading` varchar(255) NOT NULL,
         PRIMARY KEY (`id_everpopup`, `id_lang`))
         ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';

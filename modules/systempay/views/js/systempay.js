/**
 * Systempay V2-Payment Module version 1.10.1 for PrestaShop 1.5-1.7. Support contact : supportvad@lyra-network.com.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/afl-3.0.php
 *
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2018 Lyra Network and contributors
 * @license   https://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * @category  payment
 * @package   systempay
 */

/**
 * Misc JavaScript functions.
 */

function systempayAddMultiOption(first) {
    if (first) {
        $('#systempay_multi_options_btn').hide();
        $('#systempay_multi_options_table').show();
    }

    var timestamp = new Date().getTime();

    var rowTpl = $('#systempay_multi_row_option').html();
    rowTpl = rowTpl.replace(/SYSTEMPAY_MULTI_KEY/g, '' + timestamp);

    $(rowTpl).insertBefore('#systempay_multi_option_add');
}


function systempayDeleteMultiOption(key) {
    $('#systempay_multi_option_' + key).remove();

    if ($('#systempay_multi_options_table tbody tr').length == 1) {
        $('#systempay_multi_options_btn').show();
        $('#systempay_multi_options_table').hide();
    }
}

function systempayAddOneyOption(first) {
    if (first) {
        $('#systempay_oney_options_btn').hide();
        $('#systempay_oney_options_table').show();
    }

    var timestamp = new Date().getTime();

    var rowTpl = $('#systempay_oney_row_option').html();
    rowTpl = rowTpl.replace(/SYSTEMPAY_ONEY_KEY/g, '' + timestamp);

    $(rowTpl).insertBefore('#systempay_oney_option_add');
}


function systempayDeleteOneyOption(key) {
    $('#systempay_oney_option_' + key).remove();

    if ($('#systempay_oney_options_table tbody tr').length == 1) {
        $('#systempay_oney_options_btn').show();
        $('#systempay_oney_options_table').hide();
    }
}

function systempayAdditionalOptionsToggle(legend) {
    var fieldset = $(legend).parent();

    $(legend).children('span').toggleClass('ui-icon-triangle-1-e ui-icon-triangle-1-s');
    fieldset.find('section').slideToggle();
}

function systempayCategoryTableVisibility() {
    var category = $('select#SYSTEMPAY_COMMON_CATEGORY option:selected').val();

    if (category == 'CUSTOM_MAPPING') {
        $('.systempay_category_mapping').show();
        $('.systempay_category_mapping select').removeAttr('disabled');
    } else {
        $('.systempay_category_mapping').hide();
        $('.systempay_category_mapping select').attr('disabled', 'disabled');
    }
}

function systempayDeliveryTypeChanged(key) {
    var type = $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_type').val();

    if (type == 'RECLAIM_IN_SHOP') {
        $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_address').show();
        $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_zip').show();
        $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_city').show();
    } else {
        $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_address').val('');
        $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_zip').val('');
        $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_city').val('');

        $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_address').hide();
        $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_zip').hide();
        $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_city').hide();
    }

    var speed = $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_speed').val();
    if ((type == 'RECLAIM_IN_SHOP') && (speed == 'PRIORITY')) {
    	$('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_delay').show();
    } else {
    	$('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_delay').hide();
    }
}

function systempayDeliverySpeedChanged(key) {
	var speed = $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_speed').val();
    var type = $('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_type').val();

    if ((type == 'RECLAIM_IN_SHOP') && (speed == 'PRIORITY')) {
    	$('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_delay').show();
    } else {
    	$('#SYSTEMPAY_ONEY_SHIP_OPTIONS_' + key + '_delay').hide();
    }
}

function systempayRedirectChanged() {
    var redirect = $('select#SYSTEMPAY_REDIRECT_ENABLED option:selected').val();

    if (redirect == 'True') {
        $('#systempay_redirect_settings').show();
        $('#systempay_redirect_settings select, #systempay_redirect_settings input').removeAttr('disabled');
    } else {
        $('#systempay_redirect_settings').hide();
        $('#systempay_redirect_settings select, #systempay_redirect_settings input').attr('disabled', 'disabled');
    }
}

function systempayOneyEnableOptionsChanged() {
    var enable = $('select#SYSTEMPAY_ONEY_ENABLE_OPTIONS option:selected').val();

    if (enable == 'True') {
        $('#systempay_oney_options_settings').show();
        $('#systempay_oney_options_settings select, #systempay_oney_options_settings input').removeAttr('disabled');
    } else {
        $('#systempay_oney_options_settings').hide();
        $('#systempay_oney_options_settings select, #systempay_oney_options_settings input').attr('disabled', 'disabled');
    }
}

function systempayFullcbEnableOptionsChanged() {
    var enable = $('select#SYSTEMPAY_FULLCB_ENABLE_OPTS option:selected').val();

    if (enable == 'True') {
        $('#systempay_fullcb_options_settings').show();
        $('#systempay_fullcb_options_settings select, #systempay_fullcb_options_settings input').removeAttr('disabled');
    } else {
        $('#systempay_fullcb_options_settings').hide();
        $('#systempay_fullcb_options_settings select, #systempay_fullcb_options_settings input').attr('disabled', 'disabled');
    }
}

function systempayHideOtherLanguage(id, name) {
    $('.translatable-field').hide();
    $('.lang-' + id).css('display', 'inline');

    $('.translation-btn button span').text(name);

    var id_old_language = id_language;
    id_language = id;

    if (id_old_language != id) {
        changeEmployeeLanguage();
    }
}

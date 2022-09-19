<?php

class ContactController extends ContactControllerCore
{
    
    /*
    * module: ets_advancedcaptcha
    * date: 2018-03-02 10:02:31
    * version: 1.0.5
    */
    public function postProcess()
    {
        if (version_compare(_PS_VERSION_, '1.7.0', '<') && Module::isEnabled('ets_advancedcaptcha')) {
            if (Tools::isSubmit('submitMessage')) {
                if (!(int)Configuration::get('PA_CAPTCHA_CONTACT')) {
                    return parent::postProcess();
                }
                if (Configuration::get('PA_CAPTCHA_TYPE') == 'google') {
                    if (Tools::getIsset('g-recaptcha-response')) {
                        $recaptcha = Tools::getValue('g-recaptcha-response') ? Tools::getValue('g-recaptcha-response') : '';
                        if ($recaptcha) {
                            $secret = Configuration::get('PA_GOOGLE_CAPTCHA_SECRET_KEY');
                            $response = json_decode(Tools::file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptcha . "&remoteip=" . Tools::getRemoteAddr()), true);
                            if ($response['success'] == false) {
                                $this->errors[] = Tools::displayError('reCaptcha is invalid.');
                            }
                        } else {
                            $this->errors[] = Tools::displayError('reCaptcha is invalid.');
                        }
                    } else {
                        $this->errors[] = Tools::displayError('reCaptcha error');
                    }
                } else {
                    $security = Tools::strtolower(trim(Tools::getValue('controller'))) == 'contact' && isset($this->context->cookie->security_capcha_code_contact) && $this->context->cookie->security_capcha_code_contact ? Tools::strtolower($this->context->cookie->security_capcha_code_contact) : false;
                    $pa_captcha = Tools::getIsset('pa_captcha') && Tools::getValue('pa_captcha') ? Tools::strtolower(trim(Tools::getValue('pa_captcha'))) : false;
                    if (!$security || ($security != $pa_captcha)) {
                        $this->errors[] = Tools::displayError('Security code does not match');
                    }
                }
                if (!count($this->errors))
                    parent::postProcess();
            }
        }
    }
    /*
    * module: ets_advancedcaptcha
    * date: 2018-03-02 10:02:31
    * version: 1.0.5
    */
    public function initContent()
    {
        parent::initContent();
        if (version_compare(_PS_VERSION_, '1.7.0', '<') && Module::isInstalled('ets_advancedcaptcha')) {
            if (version_compare(_PS_VERSION_, '1.6.0', '>=') === true) {
                if (file_exists(_PS_THEME_DIR_ . 'modules/ets_advancedcaptcha/views/templates/front/front-contact-form.tpl'))
                    $view = _PS_THEME_DIR_ . 'modules/ets_advancedcaptcha/views/templates/front/front-contact-form.tpl';
                else
                    $view = _PS_MODULE_DIR_ . 'ets_advancedcaptcha/views/templates/front/front-contact-form.tpl';
            } else {
                if (file_exists(_PS_THEME_DIR_ . 'modules/ets_advancedcaptcha/views/templates/front/front-contact-form-v_1_5.tpl'))
                    $view = _PS_THEME_DIR_ . 'modules/ets_advancedcaptcha/views/templates/front/front-contact-form-v_1_5.tpl';
                else
                    $view = _PS_MODULE_DIR_ . 'ets_advancedcaptcha/views/templates/front/front-contact-form-v_1_5.tpl';
            }
            $this->setTemplate($view);
        }
    }
}

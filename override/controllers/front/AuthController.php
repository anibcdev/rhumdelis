<?php

class AuthController extends AuthControllerCore
{
    /*
    * module: ets_advancedcaptcha
    * date: 2018-03-02 10:02:31
    * version: 1.0.5
    */
    public function processSubmitAccount()
    {
        if (version_compare(_PS_VERSION_, '1.7.0', '<') && Module::isEnabled('ets_advancedcaptcha')) {
            if (!(int)Configuration::get('PA_CAPTCHA_REGISTRATION')) {
                return parent::processSubmitAccount();
            }
            if (Configuration::get('PA_CAPTCHA_TYPE') == 'google') {
                if (Tools::getIsset('g-recaptcha-response')) {
                    $recaptcha = Tools::getValue('g-recaptcha-response') ? Tools::getValue('g-recaptcha-response') : false;
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
                    $this->errors[] = Tools::displayError('reCaptcha is error.');
                }
            } else {
                $security = isset($this->context->cookie->security_capcha_code_registration) && $this->context->cookie->security_capcha_code_registration ? Tools::strtolower($this->context->cookie->security_capcha_code_registration) : false;
                $pa_captcha = Tools::getIsset('pa_captcha') && Tools::getValue('pa_captcha') ? Tools::strtolower(trim(Tools::getValue('pa_captcha'))) : false;
                if (!$security || ($security != $pa_captcha)) {
                    $this->errors[] = Tools::displayError('Security code does not match');
                }
            }
            parent::processSubmitAccount();
        }
    }
}
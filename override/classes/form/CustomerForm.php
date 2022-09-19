<?php

if(class_exists('CustomerFormCore') && version_compare(_PS_VERSION_, '1.7.0', '>=')){
    class CustomerForm extends CustomerFormCore
    {
        
        /*
    * module: ets_advancedcaptcha
    * date: 2018-03-02 10:02:31
    * version: 1.0.5
    */
    public function validate()
        {
            if (Tools::isSubmit('submitCreate') && (int)Configuration::get('PA_CAPTCHA_REGISTRATION') && Module::isEnabled('ets_advancedcaptcha'))
            {
                $captchaField = $this->getField('captcha');
                if(Configuration::get('PA_CAPTCHA_TYPE') == 'google'){
                    if(Tools::getIsset('g-recaptcha-response')){
                        $recaptcha = Tools::getValue('g-recaptcha-response')?Tools::getValue('g-recaptcha-response'):'';
                        if($recaptcha){
                            $secret = Configuration::get('PA_GOOGLE_CAPTCHA_SECRET_KEY');
                            $response = json_decode(Tools::file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptcha."&remoteip=".Tools::getRemoteAddr()), true);
                            if($response['success'] == false)
                              $captchaField->addError($this->translator->trans('reCaptcha is invalid.', array(), 'Module.Pa_captcha.Error'));
                        }else
                            $captchaField->addError($this->translator->trans('reCaptcha is invalid.', array(), 'Module.Pa_captcha.Error'));
                    }else
                        $captchaField->addError($this->translator->trans('reCaptcha is invalid.', array(), 'Module.Pa_captcha.Error'));
                }else{
                    $security = Context::getContext()->cookie->security_capcha_code_registration;
                    if (!$security || Tools::strtolower(trim(Tools::getValue('pa_captcha'))) != Tools::strtolower($security))
                        $captchaField->addError($this->translator->trans('Security code doesn\'t match.', array(), 'Module.Pa_captcha.Error'));
                }
            }
            return parent::validate();
        }
    }
}
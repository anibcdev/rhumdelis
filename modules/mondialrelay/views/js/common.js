/**
 * 2007-2017 Mondial relay
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to Mondial relay so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Mondial relay to newer
 * versions in the future. If you wish to customize Mondial relay for your
 * needs please refer to Mondial relay for more information.
 *
 * @author    Mondial relay
 * @copyright 2007-2017 Mondial relay
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of Mondial relay
 */

function checkMrSelection() { 
    

    var selected_carrier_id = parseInt($('input[name^=delivery_option]:checked').val());


    if (PS_MRSelectedRelayPoint['relayPointNum'] == -1)
        return true;
    
    var MR_carrier_selected = (selected_carrier_id==PS_MRSelectedRelayPoint['carrier_id']); // is a mondial relay carrier ?
    var MR_relay_selected = (PS_MRSelectedRelayPoint['relayPointNum']>0);                   // a relay has been selected ?

    if (!MR_carrier_selected) 
        return true; 
    
    if (MR_relay_selected) {
        return true; 
    } else {
        if (!!$.prototype.fancybox && !(PS_MRData.PS_VERSION < '1.5'))
           $.fancybox.open([
            {
                type: 'inline',
                autoScale: true,
                minHeight: 30,
                content: '<p class="fancybox-error">' + PS_MRTranslationList['errorSelection'] + '</p>'
            }],
            {
                padding: 0
            });
        else
            alert(PS_MRTranslationList['errorSelection']);
        
        return false;
    }
}



function setProtectRelaySelected(){
       
       $(document).on('click','button[name=confirmDeliveryOption]',function(event){
            if(!checkMrSelection()){
                event.stopPropagation();
                return false;
            }
        }); 
        
}

$(document).ready(function() {
    
  
        setProtectRelaySelected(); 
 
});


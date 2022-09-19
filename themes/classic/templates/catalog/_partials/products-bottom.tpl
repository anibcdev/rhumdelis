{*
 * Classic theme doesn't use this subtemplate, feel free to do whatever you need here.
 * This template is generated at each ajax calls.
 * See ProductListingFrontController::getAjaxProductSearchVariables()
 *}
<div id="js-product-list-bottom"></div>
<SCRIPT type="text/javascript">
{literal}
	$(document).ready(function() {
   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'customyes25') {
            $('#custompdt').show();           
       }

       else {
            $('#custompdt').hide();   
       }
   });
});
 
{/literal}
</SCRIPT>

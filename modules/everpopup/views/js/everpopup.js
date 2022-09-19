$(document).ready(function(){
	var baseDir = $('#ever_subscription_form #ever_baseUrl').val();
	console.log(baseDir);
	$('#ever_subscription_form').submit(function(e) {
		$.ajax({
			type: 'POST',
			url: baseDir + 'modules/everpopup/ajax/everpopupsubscribe.php',
			data: $(this).serialize(),
			dataType: 'json',
			success: function(jsonData) {
				if (jsonData.return) {
					$('#everpopup_confirm').slideDown();
					setTimeout(function() { $.fancybox.close() }, 2000);
				} else {
					console.log('Error : ', jsonData.error);
					$('#everpopup_exists').slideDown();
					setTimeout(function() { $('#everpopup_exists').fadeOut(); }, 3000);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
			  	console.log(textStatus);
			}
		});
		e.preventDefault();
	});
});

jQuery(function($){
	$('input[name="wpht[latest]"]').change(function(){
		if($(this).is(':checked')){
			$('input[name="wpht[version]"]').parents('tr').hide();
		}else{
			$('input[name="wpht[version]"]').parents('tr').show();
		}
	});
	$('input[name="wpht[latest]"]').change();
});



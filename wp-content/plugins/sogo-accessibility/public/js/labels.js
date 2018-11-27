(function( $ ) { 'use strict';
	var wpa_names = [ 's', 'author', 'email', 'url', 'comment' ];
	$.each( wpa_names, function( index, value ) {
		if ( value == 'comment' ) {
			var field = $( 'textarea[name=' + value + ']' );
		} else {
			var field = $( 'input[name=' + value + ']' );
		}
		var form_id = field.attr( 'id' );			
		if ( form_id ) {
			var label = $( 'label[for=' + form_id + ']' );
			var implicit = $( field ).parent( 'label' );
			if ( !label.length && !implicit.length ) {
				field.before( "<label for='" + form_id + "' class='sogo-screen-reader-text'>" + sogoLabels[value] + "</label>" );
			}
		} else {
			field.attr( 'id', 'sogo_label_' + value ).before( "<label for='sogo_label_" + value + "' class='sogo-screen-reader-text'>" + sogoLabels[value] + "</label>" );
		}		
	});
}(jQuery));
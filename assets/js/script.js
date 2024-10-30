(function($) {

	var s = $('.closebtn');

	if( s.length > 0 ) {

		s.on( 'click', function() {

			$(this).parent().fadeOut('300');

		} )

	}

	


})(jQuery)
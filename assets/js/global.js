(function( $ ) {
    
    var $html = $( document.documentElement );
    
    
    // ------------------------- DOM Ready
    $( document ).ready( function() {
		$html.addClass( 'dom--ready' ).removeClass( 'dom--unready' );
	});
    

})( jQuery );
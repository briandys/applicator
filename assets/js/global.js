(function( $ ) {
    
    var $html = $( document.documentElement ),
        $body = $( document.body );
    
    
    // ------------------------- DOM Ready
    $( document ).ready( function() {
		
        
        // Remove DOM Unready class
        $html.addClass( 'dom--ready' ).removeClass( 'dom--unready' );
        
        
        // Alias for WP Admin Bar
        if ( $body.hasClass( 'admin-bar' ) ) {
            $( '#wpadminbar' ).addClass( 'wpadminbar' );
        }
	});
    

})( jQuery );
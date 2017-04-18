(function( $ ) {
    
    var $html = $( document.documentElement );
    
    
    // ------------------------- DOM Ready
    $( document ).ready( function() {
		$html.addClass( 'dom--ready' ).removeClass( 'dom--unready' );
	});
    
    
    // ------------------------- Smooth Scroll to #start
    $( '#go-start--a' ).bind( 'click', function( e ) {
        
        e.preventDefault();

        var target = $( this ).attr( "href" );

        $( 'html, body' ).stop().animate( {
            scrollTop: $( target ).offset().top
        }, 1000, function() {
            location.hash = target;
        } );

        return false;
    } );
    

})( jQuery );
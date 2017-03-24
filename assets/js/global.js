(function( $ ) {
    
    var $html = $( document.documentElement );

	$( document ).ready( function() {
		$html.removeClass( 'dom--unready' ).addClass( 'dom--ready' );
	});
    
    
    function initGoContent( component ) {
        
        var goContentActive = 'go-content--active',
            goContentInactive = 'go-content--inactive';
        
        component.addClass( goContentInactive );
        
        $( '#go-content--a' ).on( 'focusin.applicator', function () {
            component.toggleClass( 'go-content--active' );
            component.toggleClass( 'go-content--inactive' );
        } );

        $( '#go-content--a' ).on( 'focusout.applicator', function () {
            component.toggleClass( goContentActive );
            component.toggleClass( goContentInactive );
        } );
        
    }
    
    initGoContent( $( '#go-content' ) );
    

})( jQuery );

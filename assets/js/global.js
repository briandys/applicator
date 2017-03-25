(function( $ ) {
    
    var $html = $( document.documentElement );

	$( document ).ready( function() {
		$html.removeClass( 'dom--unready' ).addClass( 'dom--ready' );
	});
    
    
    function initGoContent( component ) {
        
        var goContentAction = $( '#go-content--a' ),
            goContentActiveClass = 'go-content--active',
            goContentInactiveClass = 'go-content--inactive',
            aplGoContentActiveClass = 'applicator--go-content--active',
            aplGoContentInactiveClass = 'applicator--go-content--inactive';
        
        component.addClass( goContentInactiveClass );
        $html.addClass( aplGoContentInactiveClass );
        
        goContentAction.on( 'focusin.applicator', function () {
            component.addClass( goContentActiveClass );
            component.removeClass( goContentInactiveClass );
            $html.addClass( aplGoContentActiveClass );
            $html.removeClass( aplGoContentInactiveClass );
        } );

        goContentAction.on( 'focusout.applicator', function () {
            component.addClass( goContentInactiveClass );
            component.removeClass( goContentActiveClass );
            $html.addClass( aplGoContentInactiveClass );
            $html.removeClass( aplGoContentActiveClass );
        } );
        
    }
    
    initGoContent( $( '#go-content' ) );
    

})( jQuery );
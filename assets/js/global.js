// Helps with accessibility for keyboard only users.
// https://git.io/vWdr2
(function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();





( function( $ ) {
    
    
    
    
    
    // Widget Content
    $( '.widget-content---ct_cr > *:not( img )' ).each( function() {
        var $this = $( this );

        if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
            $this.closest( '.widget' ).addClass( 'widget--zero-length' );
        }
    } );

    $( '.widget_categories .widget-content---ct_cr > *:has( .cat-item-none )' ).each( function() {
        var $this = $( this );

        $this.closest( '.widget' ).addClass( 'widget--empty' );
    } );
    
    
    
    
    
    // Private and Protected Post Titles
    ( function() {
        
        var $main = $( '#main' ),
            $privatePostTitle = $main.find( $( '.post-title---l:contains("Private:")' ) ),
            $protectedPostTitle = $main.find( $( '.post-title---l:contains("Protected:")' ) );
        
        $privatePostTitle.html( function( _, html ) {
           return html.split("Private:").join("<span class='txt private-post-title---txt private---txt'>Private</span><span class='sep colon---sep'>:</span>");
        } );
        
        $protectedPostTitle.html( function( _, html ) {
           return html.split("Protected:").join("<span class='txt private-post-title---txt protected---txt'>Protected</span><span class='sep colon---sep'>:</span>");
        } );
        
    } )();

} )( jQuery );
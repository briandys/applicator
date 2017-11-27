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
    
    var $html = $( document.documentElement );
    
    
    // Remove Empty Element
    function removeEmptyElement( $elem, $target ) {
        
        // Gatekeeper
        if ( ! $elem.length ) {
            return;
        }
        
        if ( $elem.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
            
            $elem.closest( $target ).remove();
        
        }
    
    }
    
    
    // Tag Empty Element
    function tagEmptyElement( $elem, $target, $class ) {
        
        // Gatekeeper
        if ( ! $elem.length ) {
            return;
        }
        
        $elem.each( function() {
            
            var $this = $( this );
            
            if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                $this.closest( $target ).addClass( $class );
            }
            
        } );
    
    }
    
    
    // If there is no logo, remove the object
    removeEmptyElement( $( '.custom-logo-link' ), $( '#main-logo' ) );
    
    // removeEmptyElement( $( '#calendar_wrap' ), $( '.widget_calendar' ) );
    
    
    
    // Tag Empty Widgets like Calendar Widgets
    ( function() {
        
        var $element = $( '.widget-content---ct_cr > *:not( img ):not( .widget-heading )' ),
            $target = $( '.widget' ),
            $class = 'widget--zero-length';
        
        tagEmptyElement( $element, $target, $class );
    
    } )();
    
    
    // Tag Empty Categories Widgets
    ( function() {

        $( '.widget_categories .widget-content---ct_cr > *:has( .cat-item-none )' ).each( function() {
            $( this ).closest( '.widget' ).addClass( 'widget--empty' );
        } );
    
    } )();
    
    
    /* ------------------------ Remove remnants of <!--more--> tag ------------------------ */
    ( function() {

        if ( ! $html.closest( '.view--detail' ) ) {
            return;
        }

        $( '.post-content---ct_cr span[id^="more-"]' ).each( function() {

            $( this ).closest( '.post-content---ct_cr > *' ).remove();

        } );

    }() );
    
    
    
    
    
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
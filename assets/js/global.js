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
    
    var $html = $( document.documentElement ),
        $body = $( document.body ),
        $post = $( '.post' );
        
    
    
    
    
    // Remove Empty Element
    function removeEmptyElement( $elem, $target ) {
        
        // Gatekeeper
        if ( ! $elem.length ) {
            return;
        }
        
        $elem.each( function() {
            
            var $this = $( this );
            
            if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                $this.closest( $target ).remove();
            }
            
        } );
    
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
    
    
    // Removing components with empty content
    removeEmptyElement( $( '.custom-logo-link' ), $( '#main-logo' ) );
    
    
    // Tag Empty Widgets as zero-length
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
    
    
    
    
    
    // ------------------------------------ Remove remnants of <!--more--> tag
    ( function() {

        if ( ! $body.hasClass( 'view-granularity--detail' ) )
        {
            return;
        }

        $( '.post-content--main span[id^="more-"]' ).each( function() {

            $( this ).closest( 'p' ).remove();

        } );

    }() );
    
    
    
    
    
    // ------------------------------------ Remove remnants of empty Author Avatar tag
    ( function() {

        if ( ! $post.hasClass( 'author-avatar--disabled' ) )
        {
            return;
        }

        $( '.author-avatar' ).each( function() {
            $( this ).remove();
        } );

    }() );
    
    
    
    
    
    // ------------------------------------ Private and Protected Post Titles
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
( function( $ ) {
    
    
    
    
    
    // Remove Empty Containers
    function initRemoveEmpty( $elem ) {
        $( $elem ).each( function() {
            var $this = $( this );

            if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                $this.remove();
            }
        } );
    }
    initRemoveEmpty( $( '.post-content---ct_cr > *' ) );
    initRemoveEmpty( $( '.main-navi---a' ) );
    initRemoveEmpty( $( '.menu-item' ) );
    
    
    
    
    
    // Widget Content
    $( '.widget-content---ct_cr > *' ).each( function() {
        var $this = $( this );
        
        if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
            $this.closest( '.widget' ).addClass( 'widget--zero-length' );
        }
    } );
    
    
    
    
    
    // Private and Protected Post Titles
    ( function() {
        
        var $main = $( '#main' ),
            $privatePostTitle = $main.find( $( '.main-post-title---l:contains("Private:")' ) ),
            $protectedPostTitle = $main.find( $( '.main-post-title---l:contains("Protected:")' ) );
        
        $privatePostTitle.html( function( _, html ) {
           return html.split("Private:").join("<span class='txt private-post-title---txt private---txt'>Private</span><span class='sep colon---sep'>:</span>");
        } );
        
        $protectedPostTitle.html( function( _, html ) {
           return html.split("Protected:").join("<span class='txt private-post-title---txt protected---txt'>Protected</span><span class='sep colon---sep'>:</span>");
        } );
        
    } )();

} )( jQuery );
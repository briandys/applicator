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
    
    
    
    
    
    $( '.widget-content---ct_cr > *' ).each( function() {
        var $this = $( this );
        
        if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
            $this.closest( '.widget' ).addClass( 'widget--zero-length' );
        }
    } );
    
    
    
    
    /*
    // ------------------------- Remove empty tags
    $( '.post-content---ct_cr > *' ).each( function() {
        var $this = $( this );
        
        if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
            $this.remove();
        }
    } );
    
    $( '.main-navi---a' ).each( function() {
        var $this = $( this );
        
        if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
            $this.remove();
        }
    } );
    
    $( '.menu-item' ).each( function() {
        var $this = $( this );
        
        if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
            $this.remove();
        }
    } );
    */

} )( jQuery );
(function( $ ) {
    
    
    
    
    
    // ------------------------- Remove empty tags
    $( '.post-content---ct_cr > *' ).each( function() {
        var $this = $( this );
        
        if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
            $this.remove();
        }
    } );
    
    
    
    
    
    
    
    // ------------------------- Remove empty nav items
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

})( jQuery );
(function( $ ) {
    
    // ------------------------- Paragraphs with Images Inside
    ( function() {
        
        var contentImageCss = 'content--image',
            postContent = '.post-content---ct_cr > p',
            alignedTerm = 'aligned';
        
        $( postContent + ':has( img.alignnone )' ).addClass( contentImageCss + ' ' + contentImageCss + '--not-' + alignedTerm );
        $( postContent + ':has( img.alignleft )' ).addClass( contentImageCss + ' ' + contentImageCss + '--left-' + alignedTerm );
        $( postContent + ':has( img.alignright )' ).addClass( contentImageCss + ' ' + contentImageCss + '--right-' + alignedTerm );
        $( postContent + ':has( img.aligncenter )' ).addClass( contentImageCss + ' ' + contentImageCss + '--center-' + alignedTerm );
        
     } )();
    
    
    
    
    
    // ------------------------- Format Content
    ( function() {
        
        $( '.post-content---ct_cr > *:has( pre )' ).addClass( 'content--pre' );
        $( '.post-content---ct_cr > pre' ).wrap( '<div class="content--pre"></div>' );
        
        $( '.post-content---ct_cr > table' ).wrap( '<div class="content--table"></div>' );
        
     } )();

})( jQuery );
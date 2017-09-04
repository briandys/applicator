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
        
        // Variables
        var contentContainerCSS = '.content-container',
            contentContainerPrefixCss = 'content-container--',
            postContent = '.post-content---ct_cr > *',
            commentContent = '.comment-content---ct_cr > *';
        
        // Container
        contentContainerCrMu = $( '<div />', {
            'class': 'cr content-container---cr',
        } );

        // Component
        contentContainerCpMu = $( '<div />', {
            'class': 'cp content-container',
            'data-name': 'Content Container CP'
        } ).append( contentContainerCrMu );
        
        /* <pre>
        $( '.post-content---ct_cr > pre,' + postContent + ':has( pre ), .comment-content---ct_cr > pre,' + commentContent + ':has( pre )' ).wrap( contentContainerCpMu ).closest( contentContainerCSS ).addClass( contentContainerPrefixCss + 'pre' );
        
        $( '.post-content---ct_cr > code, .post-content---ct_cr > p:has( code ), .comment-content---ct_cr > code, .comment-content---ct_cr > p:has( code )' ).wrap( contentContainerCpMu ).closest( contentContainerCSS ).addClass( contentContainerPrefixCss + 'code' );
        
        $( '.post-content---ct_cr > iframe, .post-content---ct_cr > p:has( iframe ), .comment-content---ct_cr > iframe, .comment-content---ct_cr > p:has( iframe )' ).wrap( contentContainerCpMu ).closest( contentContainerCSS ).addClass( contentContainerPrefixCss + 'iframe' );
        
        $( '.post-content---ct_cr > embed, .post-content---ct_cr > p:has( embed ), .comment-content---ct_cr > embed, .comment-content---ct_cr > p:has( embed )' ).wrap( contentContainerCpMu ).closest( contentContainerCSS ).addClass( contentContainerPrefixCss + 'embed' );
        
        $( '.post-content---ct_cr > table, .post-content---ct_cr > p:has( table ), .comment-content---ct_cr > table, .comment-content---ct_cr > p:has( table )' ).wrap( contentContainerCpMu ).closest( contentContainerCSS ).addClass( contentContainerPrefixCss + 'table' );
        */
        
        $( '.post-content pre' ).each(function() {
            var $this = $( this );
            $this.wrap( contentContainerCpMu )
                .closest( contentContainerCSS )
                    .addClass( contentContainerPrefixCss + 'pre' );
        });
        
        $( '.post-content code' ).each(function() {
            var $this = $( this );
            $this.wrap( contentContainerCpMu )
                .closest( contentContainerCSS )
                    .addClass( contentContainerPrefixCss + 'code' );
        });
        
        $( '.post-content table' ).each(function() {
            var $this = $( this );
            $this.wrap( contentContainerCpMu )
                .closest( contentContainerCSS )
                    .addClass( contentContainerPrefixCss + 'table' );
        });
        
        $( '.post-content iframe' ).each(function() {
            var $this = $( this );
            $this.wrap( contentContainerCpMu )
                .closest( contentContainerCSS )
                    .addClass( contentContainerPrefixCss + 'iframe' );
        });
        
        $( '.post-content embed' ).each(function() {
            var $this = $( this );
            $this.wrap( contentContainerCpMu )
                .closest( contentContainerCSS )
                    .addClass( contentContainerPrefixCss + 'embed' );
        });
        
     } )();
    
    
    
    
    
    
    
    // ------------------------- Remove empty tags
    $( '.post-content---ct_cr > *' ).each(function() {
        var $this = $( this );
        
        if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
            $this.remove();
        }
    });

})( jQuery );
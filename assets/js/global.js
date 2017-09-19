(function( $ ) {
    
    
    
    
    
    /*------------------------- Data Format -------------------------*/
    ( function() {
        
        // Variables
        var dataFormatCss = '.data-format',
            dataFormatTerm = 'data-format',
            dataFormatPrefixCss = 'data-format--',
            
            dataFormatImage = dataFormatPrefixCss + 'img',
            dataFormatIframe = dataFormatPrefixCss + 'iframe',
            
            postContent = '.post-content---ct_cr > *',
            postContentCtCrCss = '.post-content---ct_cr',
            
            postContentP = '.post-content---ct_cr > p',
            alignedTerm = 'aligned',
            
            commentContent = '.comment-content---ct_cr > *',
            
            dataFormatBlockCpMu,
            dataFormatInlineCpMu;
        
        // Block Markup
        dataFormatBlockCpMu = $( '<div />', {
            'class': dataFormatTerm
        } );

        // Inline Markup
        dataFormatInlineCpMu = $( '<span />', {
            'class': dataFormatTerm
        } );
        
        
        // ------------ <pre>
        $( postContentCtCrCss + ' ' + '> *:has( pre )' ).each(function() {
            var $this = $( this ),
                $pre = $this.find( 'pre' );
            
            $pre.wrap( dataFormatBlockCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'pre' );
        });
        
        $( postContentCtCrCss + ' ' + '> pre' ).each(function() {
            var $this = $( this );
            $this.wrap( dataFormatBlockCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'pre' );
        });
        
        
        // ------------ <img>
        $( postContent + ':has( img )' )
            .addClass( dataFormatTerm + ' ' + dataFormatImage );
        
        $( postContent + ':has( img.alignnone )' )
            .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--not-' + alignedTerm );
        
        $( postContent + ':has( img.alignleft )' )
            .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--left-' + alignedTerm );
        
        $( postContent + ':has( img.alignright )' )
            .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--right-' + alignedTerm );
        
        $( postContent + ':has( img.aligncenter )' )
            .addClass( dataFormatTerm + ' ' + dataFormatImage + ' ' + dataFormatImage + '--center-' + alignedTerm );
        
        $( postContentCtCrCss + ' ' + '> img' ).each(function() {
            var $this = $( this );
            $this.wrap( dataFormatInlineCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'img' );
        });
        
        
        // ------------ <code>
        $( postContentCtCrCss + ' ' + '> *:has( code )' ).each(function() {
            var $this = $( this ),
                $code = $this.find( 'code' );
            
            $code.wrap( dataFormatInlineCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'code' );
        });
        
        $( postContentCtCrCss + ' ' + '> code' ).each(function() {
            var $this = $( this );
            $this.wrap( dataFormatInlineCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'code' );
        });
        
        
        // ------------ <table>
        $( postContentCtCrCss + ' ' + '> *:has( table )' ).each(function() {
            var $this = $( this ),
                $table = $this.find( 'table' );
            
            $table.wrap( dataFormatBlockCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'table' );
        });
        
        $( postContentCtCrCss + ' ' + '> table' ).each(function() {
            var $this = $( this );
            $this.wrap( dataFormatBlockCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'table' );
        });
        
        
        // ------------ <iframe>
        $( postContentCtCrCss + ' ' + '> *:has( iframe )' ).each(function() {
            var $this = $( this );
            
            $this.addClass( dataFormatTerm + ' ' + dataFormatPrefixCss + 'iframe' );
        });
        
        $( postContentCtCrCss + ' ' + '> iframe' ).each(function() {
            var $this = $( this );
            $this.wrap( dataFormatInlineCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'iframe' );
        });
        
        
        // ------------ Wrap text nodes in <span>
        // https://stackoverflow.com/a/18727318
        $( '.post-content---ct_cr, .data-format' )
        .contents()
        .filter( function() {
            
            // Get only the text nodes
            return this.nodeType === 3;
        } )
        .wrap( '<span class="span"></span>' );
        
        /*
        
        $( '.post-content iframe' ).each(function() {
            var $this = $( this );
            $this.wrap( dataFormatBlockCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'iframe' );
        });
        
        $( '.post-content embed' ).each(function() {
            var $this = $( this );
            $this.wrap( dataFormatBlockCpMu )
                .closest( dataFormatCss )
                    .addClass( dataFormatPrefixCss + 'embed' );
        });
        */
        
     } )();
    
    
    
    
    
    
    
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
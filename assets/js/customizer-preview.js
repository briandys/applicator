// Instantly live-update customizer settings in the preview for improved user experience.
// From twentyseventeen

( function( $ ) {
    
    var $html = $( document.documentElement );

	
    // Main Name
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.main-name---l' ).text( to );
		} );
	} );
	
    
    // Main Description
    wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.main-desc---l' ).text( to );
		} );
	} );

	
    // Header Text Color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			
            if ( 'blank' === to ) {
				$html
                    .addClass( 'web-product-main-name-description--disabled' )
                    .removeClass( 'web-product-main-name-description--enabled' );
			}
            
            else {

				// Check if the text color has been removed and use default colors in theme stylesheet.
				if ( ! to.length ) {
					$( '#applicator-style--custom-header-colors' ).remove();
				}
				
                $( '.main-name---a, .main-desc---a' ).css( {
					color: to
				} );
				
                $html
                    .addClass( 'web-product-main-name-description--enabled' )
                    .removeClass( 'web-product-main-name-description--disabled' );
			}
		} );
	} );

	
    // Default Color Scheme
	wp.customize( 'colorscheme', function( value ) {
		value.bind( function( to ) {
            
			$html
				.addClass( 'applicator--theme--customizer-colors--default' )
				.removeClass( 'applicator--theme--customizer-colors--custom' );
		} );
	} );

	
    // Custom Color Scheme
	wp.customize( 'colorscheme_hue', function( value ) {
		value.bind( function( to ) {
            
            $html
				.addClass( 'applicator--theme--customizer-colors--custom' )
				.removeClass( 'applicator--theme--customizer-colors--default' );

			// Update custom color CSS.
			var style = $( '#applicator-style--custom-theme-colors' ),
				hue = style.data( 'hue' ),
				css = style.html();

			// Equivalent to css.replaceAll, with hue followed by comma to prevent values with units from being changed.
			css = css.split( hue + ',' ).join( to + ',' );
			style.html( css ).data( 'hue', to );
		} );
	} );

} )( jQuery );
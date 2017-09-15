// Instantly live-update customizer settings in the preview for improved user experience.
// From twentyseventeen

(function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.wbp-name---txt' ).text( to );
		});
	});
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.wbp-main-desc---a_l' ).text( to );
		});
	});

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.web-product-main-name, .web-product-main-description' ).css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				});
				// Add class for different logo styles if title and description are hidden.
				$( 'body' ).addClass( 'title-tagline-hidden' );
			} else {

				// Check if the text color has been removed and use default colors in theme stylesheet.
				if ( ! to.length ) {
					$( '#applicator-style--custom-header-colors' ).remove();
				}
				$( '.web-product-main-name, .web-product-main-description' ).css({
					clip: 'auto',
					position: 'relative'
				});
				$( '.wbp-main-name---a, .wbp-main-desc---a' ).css({
					color: to
				});
				// Add class for different logo styles if title and description are visible.
				$( 'body' ).addClass( 'title-tagline-hidden' );
			}
		});
	});

	// Color scheme.
	wp.customize( 'colorscheme', function( value ) {
		value.bind( function( to ) {

			$( 'body' )
				.removeClass( 'applicator-snapon--applicator--theme--customizer-colors--default applicator-snapon--applicator--theme--customizer-colors--custom' )
				.addClass( 'applicator-snapon--applicator--theme--customizer-colors--' + to );
		});
	});

	// Custom color hue.
	wp.customize( 'colorscheme_hue', function( value ) {
		value.bind( function( to ) {

			// Update custom color CSS.
			var style = $( '#applicator-style-custom-theme-colors' ),
				hue = style.data( 'hue' ),
				css = style.html();

			// Equivalent to css.replaceAll, with hue followed by comma to prevent values with units from being changed.
			css = css.split( hue + ',' ).join( to + ',' );
			style.html( css ).data( 'hue', to );
		});
	});

} )( jQuery );
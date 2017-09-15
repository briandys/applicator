<?php // Custom Fonts





// Preconnect for Google Fonts
function applicator_snapon_applicator_google_fonts_preconnect( $urls, $relation_type ) {
	if ( wp_style_is( 'applicator-snapons--applicator-style--custom-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'applicator_snapon_applicator_google_fonts_preconnect', 10, 2 );





// Font URL
if ( ! function_exists( 'applicator_snapons_applicator_custom_fonts_url' ) ) {
    function applicator_snapons_applicator_custom_fonts_url() {
        
        $fonts_url = '';
        $noto = _x( 'on', 'Noto Sans, Noto Serif font: on or off', 'applicator' );

        if ( 'off' !== $noto ) {
            $font_families = array();
            $font_families[] = 'Noto Sans:400,700|Noto Serif:400,700';
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );
            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }
        return esc_url_raw( $fonts_url );
    }
}





// Font Style
if ( ! function_exists( 'applicator_snapons_applicator_style_custom_fonts_url' ) ) {
    function applicator_snapons_applicator_style_custom_fonts_url() {

        wp_enqueue_style( 'applicator-snapons--applicator-style--custom-fonts-url', applicator_snapons_applicator_custom_fonts_url(), array(), null );

    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapons_applicator_style_custom_fonts_url', 0);
}





// Font Settings
if ( ! function_exists( 'applicator_snapons_applicator_font_settings' ) ) {
    function applicator_snapons_applicator_font_settings() {
    ?>

    <style id="applicator-snapons--applicator-style--custom-fonts">
        .html
        {
            font-family: 'Noto Sans', sans-serif;
        }
    </style>
    
    <?php }
    add_action( 'wp_head', 'applicator_snapons_applicator_font_settings' );
}
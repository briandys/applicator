<?php

// Font URL
if ( ! function_exists( 'apl_snapons_applicator_font_url' ) ) {
    function apl_snapons_applicator_font_url() {
        
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
if ( ! function_exists( 'apl_snapons_applicator_font_style' ) ) {
    function apl_snapons_applicator_font_style() {

        wp_enqueue_style( 'apl-snapons-applicator-style-font', apl_snapons_applicator_font_url(), array(), null );

    }
    add_action( 'wp_enqueue_scripts', 'apl_snapons_applicator_font_style', 0);
}

// Font Settings
if ( ! function_exists( 'apl_snapons_applicator_font_settings' ) ) {
    function apl_snapons_applicator_font_settings() {
    ?>
    
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <style id="apl-snapons-applicator-style-font">
        .html
        {
            font-family: 'Noto Sans', sans-serif;
        }
    </style>
    
    <?php }
    add_action( 'wp_head', 'apl_snapons_applicator_font_settings' );
}
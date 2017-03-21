<?php

//------------------------- Custom Fonts

if ( ! function_exists( 'applicator_fonts_url' ) ) :
    function applicator_fonts_url() {
        
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
endif;


//------------------------- Add preconnect for Google Fonts

if ( ! function_exists( 'applicator_resource_hints' ) ) :
    function applicator_resource_hints( $urls, $relation_type ) {
        
        if ( wp_style_is( 'applicator-style-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
            $urls[] = array(
                'href' => 'https://fonts.gstatic.com',
                'crossorigin',
            );
        }

        return $urls;
    
    }
    add_filter( 'wp_resource_hints', 'applicator_resource_hints', 10, 2 );
endif;
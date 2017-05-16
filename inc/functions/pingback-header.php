<?php

if ( ! function_exists( 'applicator_func_pingback_header' ) ) {
    function applicator_func_pingback_header() {
        
        if ( is_singular() && pings_open() ) {
            printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
        }
    
    }
    add_action( 'wp_head', 'applicator_func_pingback_header' );
}
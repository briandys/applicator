<?php // Pingback Header



if ( ! function_exists( 'applicator_pingback_header' ) ) {
    function applicator_pingback_header() {
        
        if ( is_singular() && pings_open() ) {
            printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
        }
    
    }
    add_action( 'wp_head', 'applicator_pingback_header' );
}
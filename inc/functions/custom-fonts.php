<?php // Add preconnect for Google Fonts

if ( ! function_exists( 'applicator_resource_hints' ) ) {
    function applicator_resource_hints( $urls, $relation_type ) {
        
        if ( wp_style_is( 'apl-style-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
            $urls[] = array(
                'href' => 'https://fonts.gstatic.com',
                'crossorigin',
            );
        }
        return $urls;
    
    }
    add_filter( 'wp_resource_hints', 'applicator_resource_hints', 10, 2 );
}
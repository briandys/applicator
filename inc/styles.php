<?php // Enqueue Styles | content.php

if ( ! function_exists( 'applicator_func_styles' ) ) {
    function applicator_func_styles() {

        wp_enqueue_style( 'applicator-style', get_stylesheet_uri() );
        
        wp_enqueue_style( 'applicator-style-h5bp', get_theme_file_uri() . '/assets/css/h5bp.css', array(), '1.0', 'all' );
        
        wp_enqueue_style( 'applicator-style-default', get_theme_file_uri() . '/assets/css/default.css', array( 'applicator-style-h5bp' ), '5.7', 'all' );

    }
    add_action('wp_enqueue_scripts', 'applicator_func_styles', 0);
}
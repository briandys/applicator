<?php // Styles

if ( ! function_exists( 'applicator_styles' ) ) {
    
    function applicator_styles() {
        
        // Terms
        $parent_style_term = 'applicator-style';

        // Variables
        $parent_style = $parent_style_term;
        $parent_style_h5bp = $parent_style_term. '-h5bp';
        $parent_style_default = $parent_style_term. '-default';

        wp_enqueue_style( 'applicator-style', get_stylesheet_uri() );
        
        wp_enqueue_style( 'applicator-style--h5bp', get_theme_file_uri() . '/assets/css/h5bp.css' );
        
        wp_enqueue_style( 'applicator-style--default', get_theme_file_uri() . '/assets/css/default.css' );
    }
    add_action('wp_enqueue_scripts', 'applicator_styles', 0);

}
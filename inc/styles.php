<?php // Styles


if ( ! function_exists( 'applicator_styles' ) ) {
    function applicator_styles() {
        
        wp_enqueue_style( 'applicator-style', get_stylesheet_uri() );
        
        wp_enqueue_style( 'applicator-style--h5bp', trailingslashit( get_theme_file_uri() ). 'assets/css/h5bp.css' );
        
        wp_enqueue_style( 'applicator-style--default', trailingslashit( get_theme_file_uri() ). 'assets/css/default.css' );
        
        if ( is_multisite() && is_page_template( 'page-templates/multisite-directory.php' ) ) {
            wp_enqueue_style( 'applicator-style--multisite-directory', trailingslashit( get_theme_file_uri() ). 'assets/css/multisite-directory.css', array( 'applicator-snapon--applicator-style' ) );
        }
    }
    add_action('wp_enqueue_scripts', 'applicator_styles', 0);
}
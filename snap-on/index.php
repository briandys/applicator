<?php





/* ------------------------ Styles and Scripts ------------------------ */
if ( ! function_exists( 'applicator_snapon_styles_scripts' ) ) {
    
    function applicator_snapon_styles_scripts() {
        
        // Applicator
        wp_enqueue_style( 'applicator-snapon--style', get_theme_file_uri( '/snap-on/assets/css/applicator.css' ), array( 'applicator-enhancements--style' ) );
        
    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapon_styles_scripts', 0);

}





/* ------------------------ CSS Class Names ------------------------ */
if ( ! function_exists( 'applicator_css_class_names' ) ) {
    
    function applicator_css_class_names() {


        // Variables
        $applicator_theme_term = 'applicator--theme';


        // Array
        $r = array(

            // Themes
            'avatar',
            'calendar',
            'caption',
            'categories',
            'comment-meta',
            'comments-count-action',
            'edit-action',
            'entry-nav',
            'excerpt',
            'name-avatar',
            'note',
            'post',
            'post-format--status',
            'post-meta',
            'private-post-title',
            'quote',
            'rounded-rectangles',
            'search-result',
            'table',
            'tags',

            // Functionalities with Themes
            'comments',
            'main-nav',
            'page-nav',

            // Layout
            'container-width',
            'layout',
            'main-header',
        );

        foreach ( $r as $css_class_name ) {
            echo ' '. esc_attr( $applicator_theme_term ). '--'. esc_attr( $css_class_name );
        }
    }
    add_action( 'applicator_hook_html_css', 'applicator_css_class_names');
    
}
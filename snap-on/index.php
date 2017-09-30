<?php





/*------------------------ Styles and Scripts ------------------------*/
if ( ! function_exists( 'applicator_snapon_styles_scripts' ) ) {
    
    function applicator_snapon_styles_scripts() {

        
        // Applicator
        wp_enqueue_style( 'applicator-snapon--style', get_theme_file_uri( '/snap-on/assets/css/applicator.css' ), array( 'applicator-style--enhancements' ) );

        
        // Multisite Directory
        if ( is_multisite() && is_page_template( 'page-templates/multisite-directory.php' ) ) {
            wp_enqueue_style( 'applicator-snapon--style--multisite-directory', get_theme_file_uri( '/snap-on/assets/css/multisite-directory.css' ), array( 'applicator-snapon--style' ) );
        }

        
        // Themes
        wp_enqueue_style( 'applicator-snapon--style--themes', get_theme_file_uri( '/snap-on/assets/css/themes.css' ), array( 'applicator-snapon--style' ) );
        
    }
    add_action( 'wp_enqueue_scripts', 'applicator_snapon_styles_scripts', 0);

}





/*------------------------ Themes CSS Class Names ------------------------*/
if ( ! function_exists( 'applicator_themes_css_class_names' ) ) {
    function applicator_themes_css_class_names() {
        
        $applicator_theme_term = 'applicator--theme';
        
        $r = array(
            
            // Themes
            'table',
            'avatar',
            'note',
            'quote',
            'categories',
            'tags',
            'post-meta',
            'comment-meta',
            'name-avatar',
            'entry-nav',
            'edit-action',
            'comments-count-action',
            'main-header',
            'private-post-title',
            'search-result',
            'excerpt',
            'caption',
            
            // Functionalities with Themes
            'comments',
            'main-nav',
            
            // Layout
            'container-width',
            'layout',
        ); 
        
        foreach ( ( array ) $r as $css_class_name ) {
            echo ' '. $applicator_theme_term. '--'. $css_class_name;
        }
    }
    add_action( 'applicator_hook_html_class', 'applicator_themes_css_class_names');
}
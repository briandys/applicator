<?php // HTML Classes

if ( ! function_exists( 'applicator_html_class' ) ) {
    function applicator_html_class() {
		
        // Variables
        global $is_lynx, $is_gecko, $is_IE, $is_macIE, $is_winIE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        
        global $post;
        
        $useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) : "";
        
        $is_ipad = preg_match('/ipad/i',$useragent);
        
        
        
        
        
        // Generic Properties
        
        
        // Authorship
        if ( is_multi_author() ) {
            echo ' '. 'authorship--multi';
        }
        else {
            echo ' '. 'authorship--single';
        }
        
        
        // Browser
        if ( $is_chrome ) {
            echo ' '. 'browser--chrome';
        }
        elseif ( $is_gecko ) {
            echo ' '. 'browser--gecko';
        }
        elseif ( $is_safari ) {
            echo ' '. 'browser--safari';
        }
        elseif ( $is_opera ) {
            echo ' '. 'browser--opera';
        }
        elseif ( $is_lynx ) {
            echo ' '. 'browser--lynx';
        }
        elseif ( $is_NS4 ) {
            echo ' '. 'browser--ns4';
        }
        elseif ( $is_IE ) {
            echo ' '. 'browser--ie';
        }
        elseif ( $is_macIE ) {
            echo ' '. 'browser--mac-ie';
        }
        elseif ( $is_winIE ) {
            echo ' '. 'browser--win-ie';
        }
        elseif ( $is_edge ) {
            echo ' '. 'browser--edge';
        }
        else {
            echo ' '. 'browser--unlisted';
        }
        
        
        // Device
        if ( $is_iphone ) {
            echo ' '. 'device--iphone';
        }
        elseif ( $is_ipad ) {
            echo ' '. 'device--ipad';
        }
        
        
        // Form Factor
        if ( wp_is_mobile() ) {
            echo ' '. 'form-factor--mobile';
        }
        else {
            echo ' '. 'form-factor--non-mobile';
        }
        
        
        // Security
        if ( is_singular() ) {
            
            if ( ! post_password_required() ) {
                echo ' '. 'security--password-unprotected';
            }
            else {
                echo ' '. 'security--password-protected';
            }
        
        }
        
        
        // Theme Hierarchy
        if ( ! is_child_theme() ){
            echo ' '. 'theme-hierarchy--parent';
        }
        else {
            echo ' '. 'theme-hierarchy--child';
        }
        
        
        // View Granularity
        if ( is_singular() ) {
            echo ' '. 'view-granularity--detail';
        }
        else {
            echo ' '. 'view-granularity--category hfeed';
        }
        
        
        // View Level
        if ( is_front_page() ) {
            echo ' '. 'view-level--front';
        }
        else {
            echo ' '. 'view-level--inner';
        }
        
        
        
        
        
        // Specific Properties
        
        
        // Admin Bar
        if ( is_admin_bar_showing() ) {
            echo ' '. 'wp-admin-bar--enabled';
        }
        else {
            echo ' '. 'wp-admin-bar--disabled';
        }
        
        
        // Aside
        // Enable or display Asides via Admin > Appearance > Widgets
        
        // Variables
        $main_header_aside = 'main-header-aside';
        $main_actions_aside = 'main-actions-aside';
        $main_banner_aside = 'main-banner-aside';
        $main_header_content_aside = 'main-header-content-aside';
        $main_content_aside = 'main-content-aside';
        $main_footer_aside = 'main-footer-aside';
        
        $on = '--enabled';
        $off = '--disabled';
        
        // Main Header Aside
        if ( is_active_sidebar( $main_header_aside ) ) {
            echo ' '. esc_attr( $main_header_aside ). esc_attr( $on );
        }
        else {
            echo ' '. esc_attr( $main_header_aside ). esc_attr( $off );
        }
        
        // Main Actions Aside
        if ( is_active_sidebar( $main_actions_aside ) ) {
            echo ' '. esc_attr( $main_actions_aside ). esc_attr( $on );
        }
        else {
            echo ' '. esc_attr( $main_actions_aside ). esc_attr( $off );
        }
        
        // Main Banner Aside
        if ( is_active_sidebar( $main_banner_aside ) ) {
            echo ' '. esc_attr( $main_banner_aside ). esc_attr( $on );
        }
        else {
            echo ' '. esc_attr( $main_banner_aside ). esc_attr( $off );
        }
        
        // Main Content Header Aside
        if ( is_active_sidebar( $main_header_content_aside ) ) {
            echo ' '. esc_attr( $main_header_content_aside ). esc_attr( $on );
        }
        else {
            echo ' '. esc_attr( $main_header_content_aside ). esc_attr( $off );
        }
        
        // Secondary Content Aside
        if ( is_active_sidebar( $main_content_aside ) ) {
            echo ' '. esc_attr( $main_content_aside ). esc_attr( $on );
        }
        else {
            echo ' '. esc_attr( $main_content_aside ). esc_attr( $off );
        }

        // Main Footer Aside
        if ( is_active_sidebar( $main_footer_aside ) ) {
            echo ' '. esc_attr( $main_footer_aside ). esc_attr( $on );
        }
        else {
            echo ' '. esc_attr( $main_footer_aside ). esc_attr( $off );
        }
        
        
        // Category
        if ( is_singular() ) {
        
            foreach ( ( get_the_category( $post->ID ) ) as $category ) {
                echo ' '. 'category--'. esc_attr( $category->category_nicename );
            }
            
            if ( has_category( '', $post->ID ) ) {
                echo ' '. 'category--populated';
            }
            else {
                echo ' '. 'category--empty';
            }
        
        }
        
        
        // Customizer Color Scheme
        $colors = applicator_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'default' ) );
        echo ' '. 'customizer-color-scheme--'. esc_attr( $colors );
        
        
        // Customizer
        if ( is_customize_preview() ) {
            echo ' '. 'customizer-view--in';
        }
        else {
            echo ' '. 'customizer-view--out';
        }
        
        
        // Comments
        if ( is_singular() ) {
            
            $comments_count_int = (int) get_comments_number( get_the_ID() );
            
            // Comments
            if ( $comments_count_int > 1 ) {
                echo ' '.'comments--populated';
            }
            else {
                echo ' '.'comments--empty';
            }
            
            // Comments Population
            if ( $comments_count_int == 1 ) {
                echo ' '.'comments-population--single';
            }
            elseif ( $comments_count_int > 1 ) {
                echo ' '.'comments-population--multiple';
            }
            elseif ( $comments_count_int == 0 ) {
                echo ' '.'comments-population--zero';
            }
            
            // Comment Creation
            if ( comments_open() ) {
                echo ' '.'comment-creation--enabled';
            }
            else {
                echo ' '.'comment-creation--disabled';
            }
        
        }
        
        
        // Entry
        if ( is_singular() ) {
            
            if ( isset( $post ) ) {
                echo ' '. 'entry--'. esc_attr( $post->post_type );
                echo ' '. 'entry--'. esc_attr( $post->post_type ). '--'. esc_attr( $post->post_name );
            }
        
        }
        
        
        // Main Logo
        if ( ! has_custom_logo() ) {
            echo ' '. 'main-logo--disabled';
        }
        else {
            echo ' '. 'main-logo--enabled';
        }
        
        
        // Main Media Banner
        if ( has_header_image() ) {
            echo ' '. 'main-media-banner--enabled';
        }
        else {
            echo ' '. 'main-media-banner--disabled';
        }
        
        
        // Main Name
        if ( get_bloginfo( 'name', 'display' ) ) {
            echo ' '. 'main-name--populated';
        }
        else {
            echo ' '. 'main-name--empty';
        }

        
        // Main Name, Main Description
        if ( 'blank' === get_header_textcolor() ) {
            echo ' '. 'main-name-description--disabled';
        }
        else {
            echo ' '. 'main-name-description--enabled';
        }
        
        
        // Main Nav
        if ( ! has_nav_menu( 'main-nav' ) ) {
            echo ' '. 'main-nav--default';
        }
        else {
            echo ' '. 'main-nav--custom';
        }
        
        
        // Main Description
        if ( get_bloginfo( 'description', 'display' ) ) {
            echo ' '. 'main-description--populated';
        }
        else {
            echo ' '. 'main-description--empty';
        }
        
        
        // Multisite
        if ( is_multisite() && is_page_template( 'page-templates/multisite-directory.php' ) ) {
            echo ' ' . 'multisite-directory--in';
        }
        else {
            echo ' '. 'multisite-directory--out';
        }
        
        
        // Page Template
        if ( is_page() ) {
        
            $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
        
            if ( $template_file ) {
                echo ' '. 'page-template--specific';
                echo ' '. 'page-template'. '--'. esc_attr( sanitize_title( $template_file ) );
            }
            else {
                echo ' '. 'page-template--generic';
            }
            
        }
        
        
        
    }
    add_action( 'applicator_hook_html_class', 'applicator_html_class');
}


// Body Class
if ( ! function_exists( 'applicator_body_class' ) ) {
    
    function applicator_body_class( $classes ) {

        $classes[] = 'body';
        return $classes;
    
    }
    add_filter( 'body_class', 'applicator_body_class' );

}
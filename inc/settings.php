<?php // Settings


// Applicator only works in WordPress 4.7 or later.
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
    require get_template_directory() . '/inc/functions/back-compatibility.php';
	return;
}


// Sets up theme defaults and registers support for various WordPress features.
function applicator_settings() {
    
    
    // Make theme available for translation.
	load_theme_textdomain( 'applicator' );
	
    
    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	
    // Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	
    
    // Set the maximum content width
	if ( ! isset( $content_width ) ) {
        $content_width = 1920;
    }
    
	
    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    
    
    // Add Image Sizes
    add_image_size( 'applicator-image-size--post-banner-visual--large', 1920, 1920, true );
    add_image_size( 'applicator-image-size--post-banner-visual--thumbnail', 1280 );
    add_image_size( 'applicator-image-size--image--thumbnail-hd', 640, 360, true );
    
    
    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    
    // Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat',
	) );

	
    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'applicator_settings' );


// Add the size as one of the options in Admin
if ( ! function_exists( 'applicator_custom_image_size_option' ) ) {
    function applicator_custom_image_size_option( $sizes ) {
        
        $custom_sizes = array(
            'applicator-image-size--image--thumbnail-hd' => 'Thumbnail (16:9)'
        );
        return array_merge( $sizes, $custom_sizes );
    
    }
    add_filter( 'image_size_names_choose', 'applicator_custom_image_size_option' );
}
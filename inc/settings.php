<?php

// Applicator only works in WordPress 4.7 or later.
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
    require get_template_directory() . '/inc/functions/back-compatibility.php';
	return;
}


// Sets up theme defaults and registers support for various WordPress features.
function apl_func_setup() {
    
    // Make theme available for translation.
	load_theme_textdomain( 'applicator' );

	
    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	
    // Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	
    
    // Set the default content width.
	$GLOBALS['content_width'] = 1920;
    
	
    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    
    add_image_size( 'applicator-entry-banner-image-large', 1920, 1920, true );
    add_image_size( 'applicator-entry-banner-image-thumbnail', 640, 640, true );
    
    add_image_size( 'applicator-image-thumbnail-hd', 640, 360, true );
    
    
    // Sets the default sizes of images in Admin > Settings
    update_option('thumbnail_size_w', 640);
    update_option('thumbnail_size_h', 640);
    update_option('thumbnail_crop', 1);
    
    update_option('medium_size_w', 1280);
    update_option('medium_size_h', 1280);
    
    update_option('large_size_w', 1920);
    update_option('large_size_h', 1920);
    
    
    // Sets the default link of images to None
    update_option('image_default_link_type','none');

	
    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    
    // Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	
    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}

add_action( 'after_setup_theme', 'apl_func_setup' );


// Add the size as one of the options in Admin
if ( ! function_exists( 'apl_func_custom_image_sizes_choose' ) ) {
    function apl_func_custom_image_sizes_choose( $sizes ) {
        
        $custom_sizes = array(
            'applicator-image-thumbnail-hd' => 'Thumbnail (16:9)'
        );
        return array_merge( $sizes, $custom_sizes );
    
    }
    add_filter( 'image_size_names_choose', 'apl_func_custom_image_sizes_choose' );
}
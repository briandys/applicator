<?php

/**
 * Settings
 *
 * @package WordPress\Applicator\PHP
 */





/**
 * Applicator only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) )
{
    require get_template_directory() . '/inc/functions/back-compatibility.php';
	return;
}


/**
 * Settings
 */
function applicator_settings()
{   
    load_theme_textdomain( 'applicator' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
	
    
    if ( ! isset( $content_width ) )
    {
        $content_width = 1920;
    }
    
	
    add_theme_support( 'post-thumbnails' );
    
    add_image_size( 'applicator-image-size--post-banner-visual--large', 1920, 1920, true );
    add_image_size( 'applicator-image-size--post-banner-visual--thumbnail', 1280 );
    add_image_size( 'applicator-image-size--image--thumbnail-hd', 640, 360, true );
    
    
    add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    
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

	
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'applicator_settings' );


/**
 * Custom Image Size
 *
 * Adds an option in Dashboard
 */
function applicator_custom_image_size_option( $sizes )
{       
    $custom_sizes = array(
        'applicator-image-size--image--thumbnail-hd' => 'Thumbnail (16:9)',
    );
    return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'applicator_custom_image_size_option' );
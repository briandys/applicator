<?php

// Applicator only works in WordPress 4.7 or later.
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
    require get_template_directory() . '/inc/functions/back-compatibility.php';
	return;
}


// Sets up theme defaults and registers support for various WordPress features.
function applicator_func_setup() {
    
    // Make theme available for translation.
	load_theme_textdomain( 'applicator' );
	
    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	
    // Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	
    
    // Set the default content width.
	if ( ! isset( $content_width ) ) {
        $content_width = 1920;
    }
    
	
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
    
    
    // Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'applicator' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'applicator' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'applicator' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'applicator' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'applicator' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'apl_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );

}

add_action( 'after_setup_theme', 'applicator_func_setup' );


// Add the size as one of the options in Admin
if ( ! function_exists( 'applicator_func_custom_image_sizes_choose' ) ) {
    function applicator_func_custom_image_sizes_choose( $sizes ) {
        
        $custom_sizes = array(
            'applicator-image-thumbnail-hd' => 'Thumbnail (16:9)'
        );
        return array_merge( $sizes, $custom_sizes );
    
    }
    add_filter( 'image_size_names_choose', 'applicator_func_custom_image_sizes_choose' );
}
<?php

//------------------------- Custom Header

if ( ! function_exists( 'applicator_custom_header_setup' ) ) :
    function applicator_custom_header_setup() {

        add_theme_support( 'custom-header', apply_filters( 'applicator_custom_header_args', array(
            'default-image'      => get_parent_theme_file_uri( '/assets/img/default-media-banner-image.jpg' ),
            'default_text_color' => 'black',
            'width'              => 2000,
            'height'             => 1200,
            'flex-height'        => true,
            'wp-head-callback'   => 'applicator_header_style',
        ) ) );

        register_default_headers( array(
            'default-image' => array(
                'url'           => '%s/assets/img/default-media-banner-image.jpg',
                'thumbnail_url' => '%s/assets/img/default-media-banner-image.jpg',
                'description'   => __( 'Default Media Banner', 'applicator' ),
            ),
        ) );
    
    }
    add_action( 'after_setup_theme', 'applicator_custom_header_setup' );
endif;


//------------------------- Custom Background

if ( ! function_exists( 'applicator_custom_background_setup' ) ) :
    function applicator_custom_background_setup() {
    
        add_theme_support( 'custom-background', apply_filters( 'applicator_custom_header_args', array( 
            'default-color'     => 'ffffff',
        ) ) );
    
    }
    add_action( 'after_setup_theme', 'applicator_custom_background_setup' );
endif;



//------------------------- Custom Header Callback

if ( ! function_exists( 'applicator_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see applicator_custom_header_setup().
 */
function applicator_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style id="applicator-custom-header-styles" type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.colors-dark .site-title a,
		.colors-custom .site-title a,
		body.has-header-image .site-title a,
		body.has-header-video .site-title a,
		body.has-header-image.colors-dark .site-title a,
		body.has-header-video.colors-dark .site-title a,
		body.has-header-image.colors-custom .site-title a,
		body.has-header-video.colors-custom .site-title a,
		.site-description,
		.colors-dark .site-description,
		.colors-custom .site-description,
		body.has-header-image .site-description,
		body.has-header-video .site-description,
		body.has-header-image.colors-dark .site-description,
		body.has-header-video.colors-dark .site-description,
		body.has-header-image.colors-custom .site-description,
		body.has-header-video.colors-custom .site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
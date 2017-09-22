<?php // Custom Visuals

if ( ! function_exists( 'applicator_custom_visuals_setup' ) ) {
    function applicator_custom_visuals_setup() {
        
        // Custom Header
        add_theme_support( 'custom-header', apply_filters( 'applicator_custom_header_args', array(
            'default-image'      => get_parent_theme_file_uri( '/assets/img/main-media-banner.jpg' ),
            'default_text_color' => 'black',
            'width'              => 1280,
            'height'             => 800,
            'flex-height'        => true,
            'wp-head-callback'   => 'applicator_style_custom_header_colors',
        ) ) );

        register_default_headers( array(
            'default-image' => array(
                'url'           => '%s/assets/img/main-media-banner.jpg',
                'thumbnail_url' => '%s/assets/img/main-media-banner--tn.jpg',
                'description'   => __( 'Main Media Banner', 'applicator' ),
            ),
        ) );
        
        // Custom Logo
        add_theme_support( 'custom-logo', apply_filters( 'applicator_custom_logo_args', array(
            'width'       => 480,
            'height'      => 480,
        ) ) );
        
        // Custom Background
        add_theme_support( 'custom-background' );
    
    }
    add_action( 'after_setup_theme', 'applicator_custom_visuals_setup' );
}

// Custom Header Callback
if ( ! function_exists( 'applicator_style_custom_header_colors' ) ) {
    function applicator_style_custom_header_colors() {

        $header_text_color = get_header_textcolor();

        if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
            return;
        } ?>

        <style id="applicator-style--custom-header-colors">

        <?php // If the user has set a custom color for the text use that.
        if ( 'blank' !== $header_text_color ) { ?>

        .wbp-main-name---a,
        .wbp-main-desc---a
        {
            color: #<?php echo esc_attr( $header_text_color ); ?>;
        }

        <?php } ?>

        </style>

    <?php }
}
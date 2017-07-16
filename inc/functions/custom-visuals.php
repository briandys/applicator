<?php // Custom Visuals

if ( ! function_exists( 'applicator_func_custom_visuals_setup' ) ) {
    function applicator_func_custom_visuals_setup() {
        
        // Custom Header
        add_theme_support( 'custom-header', apply_filters( 'applicator_custom_header_args', array(
            'default-image'      => get_parent_theme_file_uri( '/assets/img/default-media-banner-image.jpg' ),
            'default_text_color' => 'black',
            'width'              => 1280,
            'height'             => 800,
            'flex-height'        => true,
            'wbp-head-callback'   => 'applicator_func_header_style',
        ) ) );

        register_default_headers( array(
            'default-image' => array(
                'url'           => '%s/assets/img/default-media-banner-image.jpg',
                'thumbnail_url' => '%s/assets/img/default-media-banner-image--tn.jpg',
                'description'   => __( 'Default Media Banner', 'applicator' ),
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
    add_action( 'after_setup_theme', 'applicator_func_custom_visuals_setup' );
}

// Custom Header Callback
if ( ! function_exists( 'applicator_func_header_style' ) ) {
    function applicator_func_header_style() {

        $header_text_color = get_header_textcolor();

        if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
            return;
        } ?>

        <style id="applicator-custom-visuals-styles" type="text/css">

        <?php // Customizer > Site Identity > Uncheck: Display Site Title and Description
        if ( 'blank' === $header_text_color ) { ?>

            .wbp-main-name-obj,
            .wbp-main-desc-obj
            {
                /* WordPress Visually Hidden */
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }

        <?php // If the user has set a custom color for the text use that.
        } else { ?>

            .wbp-main-name-obj---a,
            .wbp-main-desc-obj---a_l
            {
                color: #<?php echo esc_attr( $header_text_color ); ?>;
            }

        <?php } ?>

        </style>

    <?php }
}
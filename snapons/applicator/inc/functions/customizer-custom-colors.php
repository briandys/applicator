<?php // Applicator Color Patterns
// From twentyseventeen

if ( ! function_exists( 'applicator_snapon_applicator_colors_css_wrap' ) ) {
    function applicator_snapon_applicator_colors_css_wrap() {

        if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
            return;
        }

        require_once( get_parent_theme_file_path( '/snapons/applicator/inc/functions/customizer-color-patterns.php' ) );

        $hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
        ?>

        <style id="applicator-snapon--applicator-style--custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
            <?php echo applicator_snapon_applicator_customizer_color_patterns(); ?>
        </style>

    <?php }
    add_action( 'wp_head', 'applicator_snapon_applicator_colors_css_wrap' );
}
<?php // Applicator Color Patterns
// From twentyseventeen

function applicator_colors_css_wrap()
{
    if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() )
    {
        return;
    }

    require( get_parent_theme_file_path( '/inc/functions/customizer-color-patterns.php' ) );

    $hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
    ?>

    <style id="applicator-style--custom-theme-colors"<?php if ( is_customize_preview() ) { echo ' '. 'data-hue="' . $hue . '"'; } ?>>
        <?php echo applicator_customizer_color_patterns(); ?>
    </style>

<?php }
add_action( 'wp_head', 'applicator_colors_css_wrap' );
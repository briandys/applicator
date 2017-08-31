<?php // Applicator Color Patterns
// From Twenty Seventeen

/**
 * Display custom color CSS.
 */
function applicator_func_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/functions/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style id="applicator-style-custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo applicator_func_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'applicator_func_colors_css_wrap' );
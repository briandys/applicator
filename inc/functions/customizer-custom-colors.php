<?php // Applicator Color Patterns
// From Twenty Seventeen

function applicator_func_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/functions/customizer-color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style id="applicator-style-custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo applicator_func_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'applicator_func_colors_css_wrap' );

function applicator_customizer_remove_edit_icon() {
    $js = 'wp.customize.selectiveRefresh.Partial.prototype.createEditShortcutForPlacement = function() {};';
    wp_add_inline_script( 'customize-selective-refresh', $js );
}
add_action( 'wp_enqueue_scripts', 'applicator_customizer_remove_edit_icon' );
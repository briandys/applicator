<?php
/**
 * Twenty Seventeen: Color Patterns
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Generate the CSS for the current custom color scheme.
 */
function applicator_func_custom_colors_css() {
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

	/**
	 * Filter Twenty Seventeen default saturation level.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $saturation Color saturation level.
	 */
	$saturation = absint( apply_filters( 'applicator_func_custom_colors_saturation', 50 ) );
	$reduced_saturation = ( .8 * $saturation ) . '%';
	$saturation = $saturation . '%';
	$css = '
/**
 * Twenty Seventeen: Color Patterns
 *
 * Colors are ordered from dark to light.
 */
 
 .wp-customizer-colors--custom .post---hr a
 {
    color: hsl( ' . $hue . ', ' . $saturation . ', 46% ); /* base: #767676; */
 }

}';

	/**
	 * Filters Twenty Seventeen custom colors CSS.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param string $css        Base theme colors CSS.
	 * @param int    $hue        The user's selected color hue.
	 * @param string $saturation Filtered theme color saturation level.
	 */
	return apply_filters( 'applicator_func_custom_colors_css', $css, $hue, $saturation );
}
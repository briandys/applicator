<?php // Applicator Color Patterns
// From Twenty Seventeen

function applicator_func_custom_colors_css() {
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

	$saturation = absint( apply_filters( 'applicator_func_custom_colors_saturation', 50 ) );
	$reduced_saturation = ( .8 * $saturation ) . '%';
	$saturation = $saturation . '%';
	$css = '
    
    :root
    {
        --main-header--bg-color: hsl( ' . $hue . ', ' . $saturation . ', 45% );
    }
    
    .main-header---cr
    {
        background-color: hsl( ' . $hue . ', ' . $saturation . ', 45% );
    }
    
    ';

	return apply_filters( 'applicator_func_custom_colors_css', $css, $hue, $saturation );
}
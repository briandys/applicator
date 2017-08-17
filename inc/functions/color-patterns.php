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
        --wbp-pri-color: pink;
    }
    
    .html
    {
        background-color: red;
        background-color: var(--wbp-pri-color);
    }
 
    .wp-customizer-colors--custom .post---hr a
    {
        color: hsl( ' . $hue . ', ' . $saturation . ', 46% ); /* base: #767676; */
    }

}';

	return apply_filters( 'applicator_func_custom_colors_css', $css, $hue, $saturation );
}
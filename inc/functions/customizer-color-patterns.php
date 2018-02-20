<?php

// Applicator Customizer Color Patterns
// From twentyseventeen





function applicator_customizer_color_patterns()
{
    $hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

    $saturation = absint( apply_filters( 'applicator_custom_colors_saturation', 50 ) );
    $reduced_saturation = ( .8 * $saturation ) . '%';
    $saturation = $saturation . '%';

    $css = '

    .customizer-color-scheme--custom .main-info
    {
        background-color: hsl( '. $hue. ', '. $saturation. ', 50% );
    }

    ';

    return apply_filters( 'applicator_customizer_color_patterns', $css, $hue, $saturation );
}
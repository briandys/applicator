<?php // Applicator Customizer Color Patterns
// From twentyseventeen

if ( ! function_exists( 'applicator_customizer_color_patterns' ) ) {
    
    function applicator_customizer_color_patterns() {

        $hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

        $saturation = absint( apply_filters( 'applicator_custom_colors_saturation', 50 ) );
        $reduced_saturation = ( .8 * $saturation ) . '%';
        $saturation = $saturation . '%';

        $css = '

        /* Variable */
        .applicator--theme--customizer-colors--custom
        {
            --main-header--bg-color: hsl( '. $hue. ', '. $saturation. ', 50% );
        }
        
        .main-header---cr,
        .main-search--active .search-term-crt-search-text-input
        {
            background-color: hsl( '. $hue. ', '. $saturation. ', 50% );
        }

        ';

        return apply_filters( 'applicator_customizer_color_patterns', $css, $hue, $saturation );
    }

}
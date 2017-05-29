<?php // Web Product Copyright

if ( ! function_exists( 'applicator_func_web_product_copyright_obj' ) ) {
    function applicator_func_web_product_copyright_obj() {
        
        // Web Product Copyright
        // Markup
        $web_product_name_mu = sprintf( '<a href="%2$s" rel="home" title="%1$s">%1$s</a>',
            get_bloginfo( 'name' ),
            esc_url( home_url( '/' ) )
        );

        // Text
        $web_product_copyright_txt = htmlok_txt( array(
            'content'   => array(
                array(
                    'line'      => array(
                        // Line 1
                        array(
                            array(
                                'txt' => $web_product_name_mu,
                                'css' => 'wbp-name',
                                'esc' => false,
                            ),
                            array(
                                'sep' => $GLOBALS['space_sep'],
                                'txt' => '&copy;',
                                'css' => 'copyright-symbol',
                            ),
                            array(
                                'sep' => $GLOBALS['space_sep'],
                                'txt' => date( 'Y' ),
                                'css' => 'year',
                            ),
                            array(
                                'txt' => '.',
                                'css' => 'period-symbol',
                            ),
                        ),
                        // Line 2
                        array(
                            array(
                                'sep' => $GLOBALS['space_sep'],
                                'txt' => 'Olrayt reserved.',
                            ),
                            array(
                                'sep' => $GLOBALS['space_sep'],
                                'txt' => '&trade;',
                                'css' => 'trademark-symbol',
                            ),
                        ),
                    ),
                ),
            ),
        ) );

        // Object
        $web_product_copyright_obj = htmlok_obj( array(
            'name'      => 'Web Product Copyright',
            'elem'      => 'g',
            'obj_css'   => 'site-info',
            'css'       => 'wbp-copyright',
            'content'   => $web_product_copyright_txt,
        ) );
        
        return $web_product_copyright_obj;
    
    }
}
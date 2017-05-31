<?php // Web Product End - Constructor

if ( ! function_exists( 'applicator_func_web_product_end_cn' ) ) {
    function applicator_func_web_product_end_cn() {

        // Go to Start Nav
        // Text
        $go_start_nav_item_txt = htmlok_txt( array(
            'content'       => array(
                array(
                    'txt'   => 'Go to Start',
                ),
            ),
        ) );

        // Object
        $go_start_nav_item_obj = htmlok_obj( array(
            'elem'      => 'navi',
            'name'      => 'Go to Start',
            'css'       => 'go-start',
            'attr'      => array(
                'id'    => 'go-start-navi---a',
                'href'  => '#start',
                'title' => 'Go to Start',
            ),
            'content'   => $go_start_nav_item_txt,
        ) );

        // Component
        $go_start_nav = htmlok_cp( array(
            'type'      => 'nav',
            'name'      => 'Go to Start',
            'cp_css'    => 'go-start-nav',
            'css'       => 'go-start',
            'attr'      => array(
                'id'    => 'go-start-nav',
            ),
            'content'   => $go_start_nav_item_obj,
        ) );

        // Web Product End
        // Constructor
        $web_product_end = htmlok_cn( array(
            'name'      => 'Web Product End',
            'css'       => 'wbp-end',
            'content'   => $go_start_nav,
        ) );
        
        return $web_product_end;
        
    }
}
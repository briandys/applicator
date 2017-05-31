<?php

// Main Header Aside
if ( ! function_exists( 'applicator_func_main_header_aside' ) ) {
    function applicator_func_main_header_aside() {
        
        if ( is_active_sidebar( 'main-header-aside' )  ) {
            
            ob_start();
            dynamic_sidebar('main-header-aside');
            $aside = ob_get_contents();
            ob_end_clean();
            
            $main_header_aside = htmlok_cn( array(
                'name'      => 'Main Header',
                'type'      => 'aside',
                'elem'      => 'aside',
                'css'       => 'main-hr',
                'attr'      => array(
                    'id'    => '',
                ),
                'content'   => $aside,
            ) );
            
            return $main_header_aside;
        }
    
    }
}


// Main Content Header Aside
if ( ! function_exists( 'applicator_func_main_content_header_aside' ) ) {
    function applicator_func_main_content_header_aside() {
        
        if ( is_active_sidebar( 'main-content-header-aside' )  ) {
            
            ob_start();
            dynamic_sidebar('main-content-header-aside');
            $aside = ob_get_contents();
            ob_end_clean();
            
            $main_content_header_aside = htmlok_cn( array(
                'name'      => 'Main Content Header',
                'type'      => 'aside',
                'elem'      => 'aside',
                'css'       => 'main-ct-hr',
                'attr'      => array(
                    'id'    => '',
                ),
                'content'   => $aside,
            ) );
            
            return $main_content_header_aside;
        }
    
    }
}


// Main Content Aside
if ( ! function_exists( 'applicator_func_main_content_aside' ) ) {
    function applicator_func_main_content_aside() {
        
        ob_start();
        dynamic_sidebar('main-content-aside');
        $aside = ob_get_contents();
        ob_end_clean();
        
        $main_content_aside = htmlok_cn( array(
            'name'      => 'Main Content',
            'type'      => 'aside',
            'elem'      => 'aside',
            'css'       => 'main-ct',
            'attr'      => array(
                'id'    => '',
            ),
            'content'   => $aside,
        ) );

        return $main_content_aside;
    
    }
}


// Main Footer Aside
if ( ! function_exists( 'applicator_func_main_footer_aside' ) ) {
    function applicator_func_main_footer_aside() {
        
        if ( is_active_sidebar( 'main-footer-aside' )  ) {
            
            ob_start();
            dynamic_sidebar('main-footer-aside');
            $aside = ob_get_contents();
            ob_end_clean();
            
            $main_footer_aside = htmlok_cn( array(
                'name'      => 'Main Footer',
                'type'      => 'aside',
                'elem'      => 'aside',
                'css'       => 'main-fr',
                'attr'      => array(
                    'id'    => '',
                ),
                'content'   => $aside,
            ) );
            
            return $main_footer_aside;
        }
    
    }
}
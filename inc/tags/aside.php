<?php

// Aside Constructor Markup
$GLOBALS['aside_cn_mu'] = '<aside id="%2$s" class="aside cn %2$s" data-name="%1$s" role="complementary">';
    $GLOBALS['aside_cn_mu'] .= '<div class="cr %3$s---cr">';
        $GLOBALS['aside_cn_mu'] .= '<div class="hr %3$s---hr">';
            $GLOBALS['aside_cn_mu'] .= '<div class="hr_cr %3$s---hr_cr">';
                $GLOBALS['aside_cn_mu'] .= '<h2 class="h %3$s---h"><span class="h_l %3$s---h_l">%1$s</span></h2>';
            $GLOBALS['aside_cn_mu'] .= '</div>';
        $GLOBALS['aside_cn_mu'] .= '</div>';
        $GLOBALS['aside_cn_mu'] .= '<div class="ct %3$s---ct">';
            $GLOBALS['aside_cn_mu'] .= '<div class="ct_cr %3$s---ct_cr">';
                $GLOBALS['aside_cn_mu'] .= '%4$s';
            $GLOBALS['aside_cn_mu'] .= '</div>';
        $GLOBALS['aside_cn_mu'] .= '</div>';
    $GLOBALS['aside_cn_mu'] .= '</div>';
$GLOBALS['aside_cn_mu'] .= '</aside>';

// Main Header Aside
if ( ! function_exists( 'applicator_func_main_header_aside' ) ) {
    function applicator_func_main_header_aside() {
        
        ob_start();
        dynamic_sidebar('main-header-aside');
        $aside = ob_get_contents();
        ob_end_clean();
        
        if ( is_active_sidebar( 'main-header-aside' )  ) {
            printf( $GLOBALS['aside_cn_mu'],
                esc_html__( 'Main Header Aside', $GLOBALS['apl_textdomain'] ),
                'main-header-aside',
                'main-hr-as',
                $aside
            );
        }
    
    }
}


// Main Content Header Aside
if ( ! function_exists( 'applicator_func_main_content_header_aside' ) ) {
    function applicator_func_main_content_header_aside() {
        
        ob_start();
        dynamic_sidebar('main-content-header-aside');
        $aside = ob_get_contents();
        ob_end_clean();
        
        if ( is_active_sidebar( 'main-content-header-aside' )  ) {
            printf( $GLOBALS['aside_cn_mu'],
                esc_html__( 'Main Content Header Aside', $GLOBALS['apl_textdomain'] ),
                'main-content-header-aside',
                'main-ct-hr-as',
                $aside
            );
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
        
        printf( $GLOBALS['aside_cn_mu'],
            esc_html__( 'Main Content Aside', $GLOBALS['apl_textdomain'] ),
            'main-content-aside',
            'main-ct-as',
            $aside
        );
    
    }
}


// Main Footer Aside
if ( ! function_exists( 'applicator_func_main_footer_aside' ) ) {
    function applicator_func_main_footer_aside() {
        
        ob_start();
        dynamic_sidebar('main-footer-aside');
        $aside = ob_get_contents();
        ob_end_clean();
        
        if ( is_active_sidebar( 'main-footer-aside' )  ) {
            printf( $GLOBALS['aside_cn_mu'],
                esc_html__( 'Main Footer Aside', $GLOBALS['apl_textdomain'] ),
                'main-footer-aside',
                'main-fr-as',
                $aside
            );
        }
    
    }
}
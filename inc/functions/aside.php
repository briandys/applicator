<?php // Aside Registrations

function applicator_aside_init() {
    
    // Widget HTML Markup
    $widget_start_mu = '<div id="%1$s" class="cp widget %2$s" data-name="Widget">';
        $widget_start_mu .= '<div class="cr widget---cr" >';
        $widget_end_mu = '</div>';
    $widget_end_mu .= '</div>';
    
    $widget_h_start_mu = '<h3 class="h widget---h"><span class="h_l widget---h_l">';
    $widget_h_end_mu = '</span></h3>';
    
    register_sidebar( array(
		'name'          => __( 'Main Header', 'applicator' ),
		'id'            => 'main-header-aside',
		'description'   => __( 'Located at the Main Header', 'applicator' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $widget_h_start_mu,
		'after_title'   => $widget_h_end_mu,
	) );
    
    register_sidebar( array(
		'name'          => __( 'Main Content Header', 'applicator' ),
		'id'            => 'main-content-header-aside',
		'description'   => __( 'Located at the Main Content Header', 'applicator' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $widget_h_start_mu,
		'after_title'   => $widget_h_end_mu,
	) );
    
    register_sidebar( array(
		'name'          => __( 'Secondary Content', 'applicator' ),
		'id'            => 'main-content-aside',
		'description'   => __( 'Located after Primary Content', 'applicator' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $widget_h_start_mu,
		'after_title'   => $widget_h_end_mu,
	) );
    
    register_sidebar( array(
		'name'          => __( 'Main Footer', 'applicator' ),
		'id'            => 'main-footer-aside',
		'description'   => __( 'Located at the Main Footer', 'applicator' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $widget_h_start_mu,
		'after_title'   => $widget_h_end_mu,
	) );
}
add_action( 'widgets_init', 'applicator_aside_init' );

// Aside Constructor Markup
$GLOBALS['aside_constructor_mu'] = '<aside id="%2$s" class="cn aside %2$s" data-name="%1$s" role="complementary">';
    $GLOBALS['aside_constructor_mu'] .= '<div class="cr %3$s---cr">%4$s</div>';
$GLOBALS['aside_constructor_mu'] .= '</aside>';

// Main Header Aside
if ( ! function_exists( 'apl_func_main_header_aside' ) ) {
    function apl_func_main_header_aside() {
        
        ob_start();
        dynamic_sidebar('main-header-aside');
        $aside = ob_get_contents();
        ob_end_clean();
        
        if ( is_active_sidebar( 'main-header-aside' )  ) {
            printf( $GLOBALS['aside_constructor_mu'],
                esc_html__( 'Main Header Aside', 'applicator' ),
                esc_attr__( 'main-header-aside', 'applicator' ),
                esc_attr__( 'main-hr-as', 'applicator' ),
                $aside
            );
        }
    
    }
}


// Main Content Header Aside
if ( ! function_exists( 'apl_func_main_content_header_aside' ) ) {
    function apl_func_main_content_header_aside() {
        
        ob_start();
        dynamic_sidebar('main-content-header-aside');
        $aside = ob_get_contents();
        ob_end_clean();
        
        if ( is_active_sidebar( 'main-content-header-aside' )  ) {
            printf( $GLOBALS['aside_constructor_mu'],
                esc_html__( 'Main Content Header Aside', 'applicator' ),
                esc_attr__( 'main-content-header-aside', 'applicator' ),
                esc_attr__( 'main-ct-hr-as', 'applicator' ),
                $aside
            );
        }
    
    }
}


// Main Content Aside
if ( ! function_exists( 'apl_func_main_content_aside' ) ) {
    function apl_func_main_content_aside() {
        
        ob_start();
        dynamic_sidebar('main-content-aside');
        $aside = ob_get_contents();
        ob_end_clean();
        
        printf( $GLOBALS['aside_constructor_mu'],
            esc_html__( 'Main Content Aside', 'applicator' ),
            esc_attr__( 'main-content-aside', 'applicator' ),
            esc_attr__( 'main-ct-as', 'applicator' ),
            $aside
        );
    
    }
}


// Main Footer Aside
if ( ! function_exists( 'apl_func_main_footer_aside' ) ) {
    function apl_func_main_footer_aside() {
        
        ob_start();
        dynamic_sidebar('main-footer-aside');
        $aside = ob_get_contents();
        ob_end_clean();
        
        if ( is_active_sidebar( 'main-footer-aside' )  ) {
            printf( $GLOBALS['aside_constructor_mu'],
                esc_html__( 'Main Footer Aside', 'applicator' ),
                esc_attr__( 'main-footer-aside', 'applicator' ),
                esc_attr__( 'main-fr-as', 'applicator' ),
                $aside
            );
        }
    
    }
}
<?php // Aside Registrations

function applicator_func_aside_init() {
    
    // Widget HTML Markup
    $widget_start_mu = '<div id="%1$s" class="cp widget %2$s" data-name="Widget">';
        $widget_start_mu .= '<div class="cr widget---cr" >';
        $widget_end_mu = '</div>';
    $widget_end_mu .= '</div>';
    
    $widget_h_start_mu = '<h3 class="h widget---h"><span class="h_l widget---h_l">';
    $widget_h_end_mu = '</span></h3>';
    
    register_sidebar( array(
		'name'          => __( 'Main Header', $GLOBALS['apl_textdomain'] ),
		'id'            => 'main-header-aside',
		'description'   => __( 'Located at the Main Header', $GLOBALS['apl_textdomain'] ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $widget_h_start_mu,
		'after_title'   => $widget_h_end_mu,
	) );
    
    register_sidebar( array(
		'name'          => __( 'Main Content Header', $GLOBALS['apl_textdomain'] ),
		'id'            => 'main-content-header-aside',
		'description'   => __( 'Located at the Main Content Header', $GLOBALS['apl_textdomain'] ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $widget_h_start_mu,
		'after_title'   => $widget_h_end_mu,
	) );
    
    register_sidebar( array(
		'name'          => __( 'Secondary Content', $GLOBALS['apl_textdomain'] ),
		'id'            => 'main-content-aside',
		'description'   => __( 'Located after Primary Content', $GLOBALS['apl_textdomain'] ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $widget_h_start_mu,
		'after_title'   => $widget_h_end_mu,
	) );
    
    register_sidebar( array(
		'name'          => __( 'Main Footer', $GLOBALS['apl_textdomain'] ),
		'id'            => 'main-footer-aside',
		'description'   => __( 'Located at the Main Footer', $GLOBALS['apl_textdomain'] ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $widget_h_start_mu,
		'after_title'   => $widget_h_end_mu,
	) );
}
add_action( 'widgets_init', 'applicator_func_aside_init' );
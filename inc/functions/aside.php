<?php

//------------------------- Aside Registrations

function applicator_aside_init() {
    
    // Widget HTML Markup
    $widget_cp_start = '<div id="%1$s" class="cp widget %2$s" data-name="Widget"><div class="widget--cr" >';
    $widget_cp_end = '</div></div>';
    
    $widget_h_start = '<h4 class="h widget--h"><span class="widget--h-l">';
    $widget_h_end = '</span></h4>';
    
    register_sidebar( array(
		'name'          => __( 'Main Header', 'applicator' ),
		'id'            => 'main-header-aside',
		'description'   => __( 'Located at the Main Header', 'applicator' ),
		'before_widget' => $widget_cp_start,
		'after_widget'  => $widget_cp_end,
		'before_title'  => $widget_h_start,
		'after_title'   => $widget_h_end,
	) );
    register_sidebar( array(
		'name'          => __( 'Main Content Header', 'applicator' ),
		'id'            => 'main-content-header-aside',
		'description'   => __( 'Located at the Main Content Header', 'applicator' ),
		'before_widget' => $widget_cp_start,
		'after_widget'  => $widget_cp_end,
		'before_title'  => $widget_h_start,
		'after_title'   => $widget_h_end,
	) );
    register_sidebar( array(
		'name'          => __( 'Secondary Content', 'applicator' ),
		'id'            => 'main-content-aside',
		'description'   => __( 'Located after Primary Content', 'applicator' ),
		'before_widget' => $widget_cp_start,
		'after_widget'  => $widget_cp_end,
		'before_title'  => $widget_h_start,
		'after_title'   => $widget_h_end,
	) );
    register_sidebar( array(
		'name'          => __( 'Main Footer', 'applicator' ),
		'id'            => 'main-footer-aside',
		'description'   => __( 'Located at the Main Footer', 'applicator' ),
		'before_widget' => $widget_cp_start,
		'after_widget'  => $widget_cp_end,
		'before_title'  => $widget_h_start,
		'after_title'   => $widget_h_end,
	) );
}
add_action( 'widgets_init', 'applicator_aside_init' );
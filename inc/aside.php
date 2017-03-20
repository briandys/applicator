<?php

//------------------------- Aside Registrations

function applicator_aside_init() {
    register_sidebar( array(
		'name'          => __( 'Main Header', 'applicator' ),
		'id'            => 'main-header-aside',
		'description'   => __( 'Located at the Main Header', 'applicator' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget--cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="h widget--h">',
		'after_title'   => '</h4>',
	) );
    register_sidebar( array(
		'name'          => __( 'Main Content Header', 'applicator' ),
		'id'            => 'main-content-header-aside',
		'description'   => __( 'Located at the Main Content Header', 'applicator' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget--cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="h widget--h">',
		'after_title'   => '</h4>',
	) );
    register_sidebar( array(
		'name'          => __( 'Secondary Content', 'applicator' ),
		'id'            => 'main-content-aside',
		'description'   => __( 'Located after Primary Content', 'applicator' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget--cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="h widget--h">',
		'after_title'   => '</h4>',
	) );
    register_sidebar( array(
		'name'          => __( 'Main Footer', 'applicator' ),
		'id'            => 'main-footer-aside',
		'description'   => __( 'Located at the Main Footer', 'applicator' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget--cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="h widget--h">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'applicator_aside_init' );
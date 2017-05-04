<?php // Backwards Compatibility

// Prevent switching to Applicator on old versions of WordPress.
function apl_func_prevent_theme_switch() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notes', 'apl_func_upgrade_note' );
}
add_action( 'after_switch_theme', 'apl_func_prevent_theme_switch' );

// Add message for unsuccessful theme switch.
function apl_func_upgrade_note() {
	$message = sprintf( __( 'Applicator requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'applicator' ), $GLOBALS['wp_version'] );
	printf( '<div class="note wordpress-upgrade"><div class="wordpress-upgrade--cr"><p>%s</p></div></div>', $message );
}

// Prevent the Customizer from being loaded on WordPress versions prior to 4.7.
function apl_func_prevent_customizer() {
	wp_die( sprintf( __( 'Applicator requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'applicator' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'apl_func_prevent_customizer' );

// Prevent the Theme Preview from being loaded on WordPress versions prior to 4.7.
function apl_func_prevent_theme_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Applicator requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'applicator' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'apl_func_prevent_theme_preview' );
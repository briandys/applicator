<?php // Applicator: Customizer
// From twentyseventeen

function applicator_customize_register( $wp_customize ) {
	
    $wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.main-name---l',
		'render_callback' => 'applicator_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.main-desc---l',
		'render_callback' => 'applicator_customize_partial_blogdescription',
	) );

	// Custom colors
	$wp_customize->add_setting( 'colorscheme', array(
		'default'           => 'default',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'applicator_sanitize_colorscheme',
	) );

	$wp_customize->add_setting( 'colorscheme_hue', array(
		'default'           => 250,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint', // The hue is stored as a positive integer.
	) );

	$wp_customize->add_control( 'colorscheme', array(
		'type'    => 'radio',
		'label'    => __( 'Color Scheme', 'applicator' ),
		'choices'  => array(
			'default'  => __( 'Default', 'applicator' ),
			'custom' => __( 'Custom', 'applicator' ),
		),
		'section'  => 'colors',
		'priority' => 5,
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'colorscheme_hue', array(
		'mode' => 'hue',
		'section'  => 'colors',
		'priority' => 6,
	) ) );
}
add_action( 'customize_register', 'applicator_customize_register' );


// Sanitize the colorscheme
function applicator_sanitize_colorscheme( $input ) {
	$valid = array( 'default', 'custom' );

	if ( in_array( $input, $valid ) ) {
		return $input;
	}

	return 'default';
}


// Render the site title for the selective refresh partial.
function applicator_customize_partial_blogname() {
	bloginfo( 'name' );
}


// Render the site tagline for the selective refresh partial.
function applicator_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


// Bind JS handlers to instantly live-preview changes.
function applicator_customizer_preview() {
	wp_enqueue_script( 'applicator-script--customizer-preview', get_theme_file_uri( '/assets/js/customizer-preview.js' ), array( 'customize-preview' ), '1.4', true );
}
add_action( 'customize_preview_init', 'applicator_customizer_preview' );


// Load dynamic logic for the customizer controls area.
function applicator_customizer_controls() {
	wp_enqueue_script( 'applicator-script--customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.4', true );
}
add_action( 'customize_controls_enqueue_scripts', 'applicator_customizer_controls' );


// Remove the Edit Icon in Customizer Preview
function applicator_customizer_remove_edit_icon() {
    $js = 'wp.customize.selectiveRefresh.Partial.prototype.createEditShortcutForPlacement = function() {};';
    wp_add_inline_script( 'customize-selective-refresh', $js );
}
add_action( 'wp_enqueue_scripts', 'applicator_customizer_remove_edit_icon' );
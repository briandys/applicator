<?php

function applicator_html_ok_cp( $args = array() ) {
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}
    
    // Require Content
	if ( empty( $args['content'] ) ) {
		return esc_html_e( 'Please define Content.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'type'          => 'c',
        'name'          => '',
        'cp_css'        => '',
        'css'       => '',
        'content'       => '',
        'hr_content'    => '',
        'fr_content'    => '',
        'version'       => '',
        'echo'          => false,
    );
    
    // Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    $r_version = $r['version'];
    $r_echo = $r['echo'];
    $r_type = $r['type'];
    
    $r_name = $r['name'];
    $r_cp_css = $r['cp_css'];
    $r_css = $r['css'];
    $r_fr_content = $r['fr_content'];
    
    $type_module_term_variations = ['module', 'md', 'm'];
    $type_component_term_variations = ['component', 'cp', 'c'];
    
    $name = '';
    $cp_css = '';
    $dynamic_css = '';
    
    if ( ! empty( $r_css ) ) {
        $cp_css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_css ) );
    } else {
        $cp_css = '';
    }
    
    // Type: Component
    if ( in_array( $r_type, $type_component_term_variations, true ) ) {
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) );
        $cp_css = 'cp' . preg_replace( '/\s\s+/', ' ', trim( $r_cp_css ) );
        $css = preg_replace( '/\s\s+/', ' ', trim( $r_css ) );
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) );
    
    // Type: Module
    } elseif ( in_array( $r_type, $type_module_term_variations, true ) ) {
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) . ' ' . 'Module';
        $cp_css = 'md' . preg_replace( '/\s\s+/', ' ', trim( $r_cp_css ) );
        $css = preg_replace( '/\s\s+/', ' ', trim( $r_css ) ) . '-md';
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) ) . '-md';
    }
    
    // New Version
    if ( '0.1' == $r_version ) {
        
        $output = '';
    
    // Original Version    
    } else {
        
        $output = '';
        
        $output .= '<div class="' . $cp_css . $dynamic_css . '" data-name="' . $name . '">';
        
            $output .= '<div class="cr ' . $css . '---cr">';

                // Header
                $output .= '<div class="hr ' . $css . '---hr">';
                    $output .= '<div class="hr_cr ' . $css . '---hr_cr">';
                        $output .= '<div class="h ' . $css . '---h"><span class="h_l ' . $css . '---h_l">' . $name . '</span></div>';
                        $output .= $r['hr_content'];
                    $output .= '</div>';
                $output .= '</div>';

                // Content
                $output .= '<div class="ct ' . $css . '---ct">';
                    $output .= '<div class="ct_cr ' . $css . '---ct_cr">';
                        $output .= $r['content'];
                    $output .= '</div>';
                $output .= '</div>';

            if ( ! empty( $r_fr_content ) ) {
                // Footer
                $output .= '<div class="fr ' . $css . '---fr">';
                    $output .= '<div class="fr_cr ' . $css . '---fr_cr">';
                        $output .= $r['fr_content'];
                    $output .= '</div>';
                $output .= '</div>';
            }

            $output .= '</div>';
        
        $output .= '</div><!-- ' . $name . ' -->';
    
    }
    
    $html = apply_filters( 'applicator_html_ok_cp', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
    
}
<?php // Applicator HTML Markup

/*
References:
https://developer.wordpress.org/reference/functions/wp_list_categories/
https://codex.wordpress.org/Function_Reference/wp_parse_args
https://developer.wordpress.org/reference/functions/apply_filters/
https://nacin.com/2010/05/11/in-wordpress-prefix-everything/
https://codex.wordpress.org/Function_Reference/sanitize_title

/**
 * Return Applicator HTML markup.
 *
 * @param array $args {
 *     Parameters needed to display HTML markup.
 *
 *     @type string $type       Component | Object
 *     @type string $name       Element Name
 *     @type string $pri_css    Primary CSS Class Name
 *     @type string $sec_css    Secondary CSS Class Name
 *     @type string $content    Markup Content
 * }
 * @return string HTML markup.
 */

function applicator_html( $args = array() ) {
    
    // Make sure $args are an array.
	if ( empty( $args ) ) {
		return esc_html__( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}

	if ( false === array_key_exists( 'name', $args ) ) {
		return esc_html__( 'Please define name of Element.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'type'      => 'c',
        'name'      => '',
        'pri_css'   => '',
        'sec_css'   => '',
        'content'   => '',
        'version'   => '0',
        'echo'      => false,
    );
    
    // Parse args
    $r = wp_parse_args( $args, $defaults );
    
    $type_name = '';
    $type_css = '';
    $type_trailing_css = '';
    
    $name = '';
    $sanitized_name = '';
    $pri_css = '';
    $sec_css = '';
    
    $component_term_variations = array( 'component', 'cp', 'c' );
    $object_term_variations = array( 'object', 'obj', 'o' );
    
    
    // Type: Component
    if ( in_array( $r['type'], $component_term_variations, true ) ) {
        $type_css = 'cp ';
    }
    
    // Type: Object
    if ( in_array( $r['type'], $object_term_variations, true ) ) {
        $type_name = ' ' . 'Object';
        $type_css = 'obj' . ' ';
        $type_trailing_css = '-obj';
    }
    
    if ( ! empty( $r['name'] ) ) {
        $name = preg_replace('/\s\s+/', ' ', trim( $r['name'] ) );
        $sanitized_name = sanitize_title( $r['name'] );
    }
    
    if ( ! empty( $r['pri_css'] ) ) {
        $pri_css = ' ' . trim( $r['pri_css'] );
    }
    
    if ( ! empty( $r['sec_css'] ) ) {
        $sec_css = ' ' . trim( $r['sec_css'] );
    }
    
    
    if ( '0.1' === array_key_exists( 'version', $args ) ) {
        
        $output = '';
        
    } else {
        
        $output = '';
    
        // Markup
        $output .= '<div class="' . $type_css . esc_attr( $sanitized_name ) . $type_trailing_css . esc_attr( $pri_css ) . '" data-name="' . esc_attr( $name ) . $type_name . '">';

        if ( in_array( $r['type'], $component_term_variations, true ) ) {
            $output .= '<div class="cr' . esc_attr( $sec_css ) . '---cr">';
                $output .= '<div class="hr' . esc_attr( $sec_css ) . '---hr">';
                    $output .= '<div class="hr_cr' . esc_attr( $sec_css ) . '---hr_cr">';
                        $output .= '<div class="h' . esc_attr( $sec_css ) . '---h"><span class="h_l' . esc_attr( $sec_css ) . '---h_l">' . esc_html( $name ) . '</span></div>';
                    $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="ct' . esc_attr( $sec_css ) . '---ct">';
                    $output .= '<div class="ct_cr' . esc_attr( $sec_css ) . '---ct_cr">';
                        $output .= $r['content'];
                    $output .= '</div>';
                $output .= '</div><!-- ct -->';
            $output .= '</div>';
        }

        if ( in_array( $r['type'], $object_term_variations, true ) ) {
            $output .= $r['content'];
        }

        $output .= '</div><!-- ' . esc_html( $name ) . $type_name . ' -->';
        
    }
    
    
    $html = apply_filters( 'applicator_html', $output, $args );
    
    if ( $r['echo'] ) {
        echo $html;
    } else {
        return $html;
    }
}

function applicator_html_obj( $args = array() ) {
    
    // Make sure $args are an array.
	if ( empty( $args ) ) {
		return esc_html__( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}

	if ( false === array_key_exists( 'name', $args ) ) {
		return esc_html__( 'Please define name of Element.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'type'      => 'o',
        'name'      => '',
        'pri_css'   => '',
        'sec_css'   => '',
        'content'   => '',
        'echo'      => false,
    );
    
    // Parse args
    $r = wp_parse_args( $args, $defaults );
    
    $type_name = '';
    $type_css = '';
    $type_trailing_css = '';
    
    $name = '';
    $sanitized_name = '';
    $pri_css = '';
    $sec_css = '';
    
    $component_term_variations = array( 'component', 'cp', 'c' );
    $object_term_variations = array( 'object', 'obj', 'o' );
    
    
    // Type: Component
    if ( in_array( $r['type'], $component_term_variations, true ) ) {
        $type_css = 'cp ';
    }
    
    // Type: Object
    if ( in_array( $r['type'], $object_term_variations, true ) ) {
        $type_name = ' ' . 'Object';
        $type_css = 'obj' . ' ';
        $type_trailing_css = '-obj';
    }
    
    if ( ! empty( $r['name'] ) ) {
        $name = preg_replace('/\s\s+/', ' ', trim( $r['name'] ) );
        $sanitized_name = sanitize_title( $r['name'] );
    }
    
    if ( ! empty( $r['pri_css'] ) ) {
        $pri_css = ' ' . trim( $r['pri_css'] );
    }
    
    if ( ! empty( $r['sec_css'] ) ) {
        $sec_css = ' ' . trim( $r['sec_css'] );
    }
    
    $output = '';
    
    // Markup
    $output .= '<div class="' . $type_css . esc_attr( $sanitized_name ) . $type_trailing_css . esc_attr( $pri_css ) . '" data-name="' . esc_attr( $name ) . $type_name . '">';
    
    $output .= '<div class="g' . esc_attr( $sec_css ) . '---g">';
        $output .= '<div class="g_l' . esc_attr( $sec_css ) . '---g_l">';
            $output .= $r['content'];
        $output .= '</div>';
    $output .= '</div>';
    
    $output .= '</div><!-- ' . esc_html( $name ) . $type_name . ' -->';
    
    $html = apply_filters( 'applicator_html_obj', $output, $args );
    
    if ( $r['echo'] ) {
        echo $html;
    } else {
        return $html;
    }
}
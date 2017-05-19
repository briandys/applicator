<?php // Applicator HTML Markup for Module - Component - Object (MCO)

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
 *     @type string $type       Module | Component | Object
 *     @type string $layout     Block | Inline
 *     @type string $name       Element Name
 *     @type string $pri_css    Primary CSS Class Name
 *     @type string $sec_css    Secondary CSS Class Name
 *     @type string $content    Markup Content
 *     @type string $title      Title Attribute (title="")
 *     @type string $content    Actual Content
 *     @type string $version    For Updates
 *     @type string $echo       Echo or Return
 * }
 * @return string HTML markup.
 */

function applicator_html_mco( $args = array() ) {
    
    // Make sure $args are an array.
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'type'      => '',
        'layout'    => '',
        'name'      => '',
        'pri_css'   => '',
        'sec_css'   => '',
        'title'     => '',
        'content'   => '',
        'version'   => '',
        'echo'      => false
    );
    
    // Parse args
    $r = wp_parse_args( $args, $defaults );
    
    $md_css = 'md';
    $obj_css = 'obj';
    $div = 'div';
    $span = 'span';
    
    $type_name = '';
    $type_css = '';
    $type_trailing_css = '';
    
    $layout_tag = '';
    
    $name = '';
    $sanitized_name = '';
    $pri_css = '';
    $sec_css = '';
    $title = '';
    
    $module_term_variations = array( 'module', 'md', 'm' );
    $component_term_variations = array( 'component', 'cp', 'c' );
    $object_term_variations = array( 'object', 'obj', 'o' );
    
    $block_term_variations = array( 'block', 'b' );
    $inline_term_variations = array( 'inline', 'i' );
    
    
    // Type: Module
    if ( in_array( $r['type'], $module_term_variations, true ) == $r['type'] ) {
        $type_name = ' ' . 'Module';
        $type_css = $md_css . ' ';
        $type_trailing_css = '-' . $md_css;
        $layout_tag = $div;
    }
    
    
    // Type: Component
    if ( in_array( $r['type'], $component_term_variations, true ) == $r['type'] ) {
        $type_css = 'cp ';
        $layout_tag = $div;
        
        if ( in_array( $r['layout'], $inline_term_variations, true ) == $r['layout'] ) {
            $layout_tag = $span;
        }
    }
    
    // Type: Object
    if ( in_array( $r['type'], $object_term_variations, true ) == $r['type'] ) {
        $type_name = ' ' . 'Object';
        $type_css = $obj_css . ' ';
        $type_trailing_css = '-' . $obj_css;
        $layout_tag = $span;
        
        if ( in_array( $r['layout'], $block_term_variations, true ) == $r['layout'] ) {
            $layout_tag = $div;
        }
        
    }
    
    if ( $r['name'] ) {
        $name = preg_replace('/\s\s+/', ' ', trim( $r['name'] ) );
        $sanitized_name = sanitize_title( $r['name'] );
    }
    
    if ( $r['pri_css'] ) {
        $pri_css = ' ' . trim( $r['pri_css'] );
    }
    
    if ( $r['sec_css'] ) {
        $sec_css = ' ' . trim( $r['sec_css'] );
    }
    
    if ( $r['title'] ) {
        $title = 'title="' . esc_attr( trim( $r['title'] ) ) . '"';
    }
    
    
    if ( '0.1' == $r['version'] ) {
        
        $output = '';
        
    } else {
        
        $output = '';
    
        // Markup
        $output .= '<' . $layout_tag . ' class="' . $type_css . esc_attr( $sanitized_name ) . $type_trailing_css . esc_attr( $pri_css ) . '"' . $title . ' data-name="' . esc_attr( $name ) . $type_name . '">';

        if ( ! in_array( $r['type'], $object_term_variations, true ) == $r['type'] ) {
            $output .= '<' . $layout_tag . ' class="cr' . esc_attr( $sec_css ) . '---cr">';
                $output .= '<' . $layout_tag . ' class="hr' . esc_attr( $sec_css ) . '---hr">';
                    $output .= '<' . $layout_tag . ' class="hr_cr' . esc_attr( $sec_css ) . '---hr_cr">';
                        $output .= '<' . $layout_tag . ' class="h' . esc_attr( $sec_css ) . '---h"><span class="h_l' . esc_attr( $sec_css ) . '---h_l">' . esc_html( $name ) . '</span></' . $layout_tag . '>';
                    $output .= '</' . $layout_tag . '>';
                $output .= '</' . $layout_tag . '>';
                $output .= '<' . $layout_tag . ' class="ct' . esc_attr( $sec_css ) . '---ct">';
                    $output .= '<' . $layout_tag . ' class="ct_cr' . esc_attr( $sec_css ) . '---ct_cr">';
                        $output .= $r['content'];
                    $output .= '</' . $layout_tag . '>';
                $output .= '</' . $layout_tag . '><!-- ct -->';
            $output .= '</' . $layout_tag . '>';
        }

        if ( in_array( $r['type'], $object_term_variations, true ) == $r['type'] ) {
            $output .= $r['content'];
        }

        $output .= '</' . $layout_tag . '><!-- ' . esc_html( $name ) . $type_name . ' -->';
        
    }
    
    
    $html = apply_filters( 'applicator_html_mco', $output, $args );
    
    if ( $r['echo'] ) {
        echo $html;
    } else {
        return $html;
    }
}


function applicator_html_e( $args = array() ) {
    
    // Make sure $args are an array.
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}
    
    // Require Type
	if ( false === array_key_exists( 'type', $args ) ) {
		return esc_html_e( 'Please define Type.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'type'      => '',
        'linked'    => false,
        'datetime'  => '',
        'href'      => '',
        'sec_css'   => '',
        'content'   => '',
        'version'   => '',
        'echo'      => false
    );
    
    // Parse args
    $r = wp_parse_args( $args, $defaults );
    
    $datetime_attr = '';
    $href_attr = '';
    $sec_css = '';
    
    $generic_term_variations = array( 'generic', 'g' );
    $time_term_variations = array( 'time', 't' );
    $anchor_term_variations = array( 'anchor', 'a' );
    
    if ( $r['sec_css'] ) {
        $sec_css = ' ' . trim( $r['sec_css'] );
    } else {
        $sec_css = ' ' . trim( $r['type'] );
    }
    
    if ( $r['datetime'] ) {
        $datetime_attr = 'datetime="' . trim( $r['datetime'] ) . '"';
    }
    
    if ( $r['href'] ) {
        $href_attr = 'href="' . trim( $r['href'] ) . '"';
    }
    
    
    if ( '0.1' == $r['version'] ) {
        
        $output = '';
        
    } else {
        
        // Markup
        $anchor_mu = '<a class="a' . esc_attr( $sec_css ) . '---a" ' . $href_attr . '>';
            $anchor_mu .= '<span class="a_l' . esc_attr( $sec_css ) . '---a_l">';
                $anchor_mu .= $r['content'];
            $anchor_mu .= '</span>';
        $anchor_mu .= '</a>';
        
        $output = '';
        
        if ( in_array( $r['type'], $generic_term_variations, true ) == $r['type'] ) {
            
            // Markup
            $output .= '<span class="g' . esc_attr( $sec_css ) . '---g">';
            
            if ( true === array_key_exists( 'linked', $args ) ) {
                $output .= $anchor_mu;
            } else {
                $output .= '<span class="g_l' . esc_attr( $sec_css ) . '---g_l">';
                    $output .= $r['content'];
                $output .= '</span>';
            }
            
            $output .= '</span>';
            
        }
    
        if ( in_array( $r['type'], $time_term_variations, true ) == $r['type'] ) {
            
            // Markup
            $output .= '<time class="time' . esc_attr( $sec_css ) . '---time" ' . $datetime_attr . '>';
            
            if ( true === array_key_exists( 'linked', $args ) ) {
                $output .= $anchor_mu;
            } else {
                $output .= '<span class="time_l' . esc_attr( $sec_css ) . '---time_l">';
                    $output .= $r['content'];
                $output .= '</span>';
            }
                
            $output .= '</time>';
            
        }
    
        if ( in_array( $r['type'], $anchor_term_variations, true ) == $r['type'] ) {
            
            // Markup
            $output .= $anchor_mu;
            
        }
        
    }
    
    $html = apply_filters( 'applicator_html_e', $output, $args );
    
    if ( $r['echo'] ) {
        echo $html;
    } else {
        return $html;
    }
}
<?php // Applicator HTML_OK (Overkill) Object Structure
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
 *     @type string $css    Primary CSS Class Name
 *     @type string $sec_css    Secondary CSS Class Name
 *     @type string $content    Markup Content
 *     @type string $title      Title Attribute (title="")
 *     @type string $content    Actual Content
 *     @type string $version    For Updates
 *     @type string $echo       Echo or Return
 * }
 * @return string HTML markup.
 */

function htmlok_obj( $args = array() ) {
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', 'applicator' );
	}
    
    // Require Element
	if ( false === array_key_exists( 'elem', $args ) ) {
		return esc_html_e( 'Please define Element.', 'applicator' );
	}
    
    // Require Content
	if ( false === array_key_exists( 'content', $args ) ) {
		return esc_html_e( 'Please define Content.', 'applicator' );
	}
    
    $defaults = array(
        'elem'      => '', // generic | heading | time | anchor | wordpress | note | label | anchor_label | navi | list
        'name'      => '',
        'layout'    => '', // block | inline
        'obj_css'   => '',
        'elem_css'  => '',
        'css'       => '',
        'linked'    => false,
        'attr'      => array(
            'id'        => '',
            'title'     => '',
            'datetime'  => '',
            'href'      => '',
            'htag'      => '', // h1 | h2 | h3 | h4 | h5 | h6
        ),
        'content'   => '',
        'ct_before' => '',
        'ct_after'  => '',
        'version'   => '',
        'echo'      => false,
    );
    
    // Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    $r_name = $r['name'];
    $r_layout = $r['layout'];
    $r_elem = $r['elem'];
    
    $r_obj_css = $r['obj_css'];
    $r_elem_css = $r['elem_css'];
    $r_css = $r['css'];
    
    $r_linked = $r['linked'];
    
    if ( ! empty( $r['attr']['id'] ) ) {
        $r_attr_id = $r['attr']['id'];
    }
    
    if ( ! empty( $r['attr']['title'] ) ) {
        $r_attr_title = $r['attr']['title'];
    }
    
    if ( ! empty( $r['attr']['datetime'] ) ) {
        $r_attr_datetime = $r['attr']['datetime'];
    }
    
    if ( ! empty( $r['attr']['href'] ) ) {
        $r_attr_href = $r['attr']['href'];
    }
    
    if ( ! empty( $r['attr']['htag'] ) ) {
        $r_attr_htag = $r['attr']['htag'];
    }
    
    if ( ! empty( $r['content'] ) ) {
        $r_content = $r['content'];
    }
    
    
    $r_ct_before = $r['ct_before'];
    $r_ct_after = $r['ct_after'];
    $r_version = $r['version'];
    $r_echo = $r['echo'];
    
    $name = '';
    $tag = '';
    $spacer = '';
    
    $dynamic_css = '';
    $obj_css = '';
    $elem_css = '';
    $css = '';
    $obj_type_css = '';
    
    $ct_before = '';
    $ct_after = '';
    
    $attr_title = '';
    $attr_datetime = '';
    $attr_href = '';
    $attr_htag = '';
    $attr_id = '';
    
    $layout_inline_term_variations = array( 'inline', 'i', );
    $layout_block_term_variations = array( 'block', 'b', );
    
    $heading_term_variations = array( 'heading', 'h', );
    $heading_tag_term_variations = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', );
    
    $generic_term_variations = array( 'generic', 'g', );
    $time_term_variations = array( 'time', 't', );
    $label_term_variations = array( 'label', 'l', );
    
    $list_term_variations = array( 'list', 'li', );
    
    $anchor_term_variations = array( 'anchor', 'a', );
    $navi_term_variations = array( 'nav_item', 'navi', );
    
    $anchor_label_term_variations = array( 'anchor label', 'al', );
    
    $wordpress_term_variations = array( 'wordpress', 'wp', );
    $note_term_variations = array( 'note', 'n', );
    
    $ct_before = preg_replace( '/\s\s+/', ' ', trim( $r_ct_before ) );
    $ct_after = preg_replace( '/\s\s+/', ' ', trim( $r_ct_after ) );
    
    
    // Name
    if ( ! empty( $r_name ) ) {
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) . ' ' . 'Object';
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) ) . '-obj';
    } else {
        $name = 'Object';
        $dynamic_css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_elem ) ) . '-obj';
    }
    
    // Layout
    if ( ! empty( $r_layout ) ) {
        if ( in_array( $r_layout, $layout_inline_term_variations, true ) ) {
            $tag = 'span';
            $spacer = ' ';

            // Heading Element is block-level
            if ( in_array( $r_elem, $heading_term_variations, true ) ) {
                $tag = 'div';
            }
        } else {
            $tag = 'div';
        }
    } else {
        $tag = 'div';
    }
    
    if ( in_array( $r_elem, $anchor_label_term_variations, true ) ) {
        $tag = 'span';
    }
    
    // Object CSS
    if ( ! empty( $r_obj_css ) ) {
        $obj_css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_obj_css ) );
    } else {
        $obj_css = '';
    }
    
    // Element CSS
    if ( ! empty( $r_elem_css ) ) {
        $elem_css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_elem_css ) );
    } else {
        $elem_css = '';
    }
    
    // CSS
    if ( ! empty( $r_css ) ) {
        $css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_css ) ) . '-obj';
    } else {
        $css = $dynamic_css;
    }
    
    // id Attribute
    if ( ! empty( $r_attr_id ) ) {
        $attr_id = 'id="' . preg_replace('/\s\s+/', ' ', trim( $r_attr_id ) ) . '"';
    } else {
        $attr_id = '';
    }
    
    // title Attribute
    if ( ! empty( $r_attr_title ) ) {
        $trimmed_title_attr = preg_replace('/\s\s+/', ' ', trim( $r_attr_title ) );
        $attr_title = 'title="' . $trimmed_title_attr . '"';
    } else {
        $attr_title = '';
    }
    
    // datetime Attribute
    if ( ! empty( $r_attr_datetime ) ) {
        $attr_datetime = 'datetime="' . preg_replace('/\s\s+/', ' ', trim( $r_attr_datetime ) ) . '"';
    } else {
        $attr_datetime = '';
    }
    
    // href Attribute
    if ( ! empty( $r_attr_href ) ) {
        $attr_href = 'href="' . preg_replace('/\s\s+/', ' ', trim( $r_attr_href ) ) . '"';
    }
    
    // htag Attribute
    if ( ! empty( $r_attr_htag ) ) {
        if ( in_array( $r_attr_htag, $heading_tag_term_variations, true ) ) {
            $attr_htag = $r_attr_htag;
        } else {
            $attr_htag = 'div';
        }
    } else {
        $attr_htag = 'div';
    }
    
    // Element: Nav Item
    if ( in_array( $r_elem, $navi_term_variations, true ) ) {
        $obj_type_css = ' ' . 'navi';
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) . ' ' . 'Nav Item';
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) ) . '-navi';
        $css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_css ) ) . '-navi';
        
        if ( ! empty( $r_attr_href ) ) {
            $attr_href = 'href="' . preg_replace('/\s\s+/', ' ', trim( $r_attr_href ) ) . '"';
        } else {
            $attr_href = 'href="#"';
        }
    }
    
    // Element: Note
    if ( in_array( $r_elem, $note_term_variations, true ) ) {
        $obj_type_css = ' ' . 'note';
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) . ' ' . 'Note';
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) ) . '-note';
        $css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_css ) ) . '-note';
    }
    
    // Element: Note
    if ( in_array( $r_elem, $list_term_variations, true ) ) {
        $tag = 'li';
        $obj_type_css = ' ' . 'item';
        // $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) . ' ' . 'Note';
        // $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) ) . '-note';
        // $css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_css ) ) . '-note';
    }
    
    
    // New Version
    if ( '0.1' == $r_version ) {
        
        $output = '';
    
    // Original Version
    } else {
        
        // Anchor Markup
        $anchor_mu = '<a class="a' . $css . '---a" ' . $attr_href . '>';
            $anchor_mu .= '<span class="a_l' . $css . '---a_l">';
                $anchor_mu .= $r_content;
            $anchor_mu .= '</span>';
        $anchor_mu .= '</a>';
        
        $output = '';
        
        $output .= $ct_before;
        
        if ( ! in_array( $r_elem, $anchor_label_term_variations, true ) ) {
            $output .= $spacer . '<' . $tag . ' class="obj' . $obj_type_css . $dynamic_css . $obj_css . '"' . $attr_title . ' data-name="' . $name . '">';
        }
        
        // Generic
        if ( in_array( $r_elem, $generic_term_variations, true ) ) {
            
            $output .= '<' . $tag . ' class="g' . $css . '---g' . $elem_css . '">';
            
            if ( true == $r_linked ) {
                $output .= $anchor_mu;
            } else {
                $output .= '<span class="g_l' . $css . '---g_l">';
                    $output .= $r_content;
                $output .= '</span>';
            }
            
            $output .= '</' . $tag . '>';
            
        }
        
        // Time
        if ( in_array( $r_elem, $time_term_variations, true ) ) {
            
            $output .= '<time class="time' . $css . '---time' . $elem_css . '" ' . $attr_datetime . '>';
            
            if ( true == $r_linked ) {
                $output .= $anchor_mu;
            } else {
                $output .= '<span class="time_l' . $css . '---time_l">';
                    $output .= $r_content;
                $output .= '</span>';
            }
                
            $output .= '</time>';
            
        }
        
        // Label
        if ( in_array( $r_elem, $label_term_variations, true ) ) {
            
            $output .= '<label class="label' . $css . '---label' . $elem_css . '">';
                $output .= '<span class="label_l' . $css . '---label_l">';
                    $output .= $r_content;
                $output .= '</span>';
            $output .= '</label>';
            
        }
        
        // Heading
        if ( in_array( $r_elem, $heading_term_variations, true ) ) {
            
            $output .= '<' . $attr_htag . ' class="h' . $css . '---h' . $elem_css . '">';
            
            if ( true == $r_linked ) {
                $output .= $anchor_mu;
            } else {
                $output .= '<span class="h_l' . $css . '---h_l">';
                    $output .= $r_content;
                $output .= '</span>';
            }
                
            $output .= '</' . $attr_htag . '>';
            
        }
        
        // Anchor
        if ( in_array( $r_elem, $anchor_term_variations, true ) ) {
            
            $output .= '<a ' . $attr_id . ' class="a' . $css . '---a' . $elem_css . '"' . $attr_href . '>';
                $output .= '<span class="a_l' . $css . '---a_l">';
                    $output .= $r_content;
                $output .= '</span>';
            $output .= '</a>';
            
        }
        
        // Element: Nav Item
        if ( in_array( $r_elem, $navi_term_variations, true ) ) {
            
            $output .= '<a ' . $attr_id . ' class="a' . $css . '---a' . $elem_css . '"' . $attr_href . '>';
                $output .= '<span class="a_l' . $css . '---a_l">';
                    $output .= $r_content;
                $output .= '</span>';
            $output .= '</a>';
            
        }
        
        // Anchor Label
        if ( in_array( $r_elem, $anchor_label_term_variations, true ) ) {
            
            $output .= '<span class="a_l' . $css . '---a_l">';
                $output .= $r_content;
            $output .= '</span>';
            
        }
        
        // WordPress
        if ( in_array( $r_elem, $wordpress_term_variations, true ) ) {
            $output .= $r_content;
        }
        
        // Note
        if ( in_array( $r_elem, $note_term_variations, true ) ) {
            
            $output .= '<div class="g' . $css . '---g' . $elem_css . '">';
                $output .= $r_content;
            $output .= '</div>';
            
        }
        
        // List
        if ( in_array( $r_elem, $list_term_variations, true ) ) {
            
            $output .= $r_content;
            
        }
        
        if ( ! in_array( $r_elem, $anchor_label_term_variations, true ) ) {
            $output .= '</' . $tag . '><!-- ' . $name . ' -->';
        }
        
        $output .= $ct_after;
        
    }
    
    $html = apply_filters( 'htmlok_obj', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
}


function htmlok_obj_test( $args = array() ) {
    
    //------------ Requirements
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', 'applicator' );
	}
    
    // Require Name
	if ( empty( $args['name'] ) ) {
		return esc_html_e( 'Please define Name.', 'applicator' );
	}
    
    // Require Content
	if ( empty( $args['content'] ) ) {
		return esc_html_e( 'Please define Content.', 'applicator' );
	}
    
    //------------ Defaults
    
    $defaults = array(
        'name'          => '',
        'type'          => '', // Type: form label | form element
        // 'elem'          => '', // Element: div | nav as <nav>
        // 'sub_type'      => '', // Sub-Type: header | content | footer
        // 'h_elem'        => '', // Heading Elem: h1 | h2 | h3 | h4 | h5 | h6
        
        'obj_css'        => '', // Component CSS: custom css at the root level
        'css'           => '',
        
        'attr'          => array(
            'id'        => '', // Component ID Attribute: id=""
            'for'       => '', // For Attribute: for=""
        ),
        
        'content'       => '', // Content
        // 'hr_content'    => '', // Header Content
        // 'fr_content'    => '', // Footer Content
        
        'version'       => '', // Version
        'echo'          => false, // Echo
    );
    
    // Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    //------------ Initialize Variables
    $r_name = '';
    $r_type = '';
    $r_obj_css = '';
    $r_css = '';
    $r_attr_id = '';
    $r_attr_for = '';
    $r_content = '';
    $r_version = '';
    $r_echo = '';
    
    $name = '';
    $css = '';
    $obj_css = '';
    $dynamic_css = '';
    $obj_dynamic_css = '';
    $obj_type_trailing_css = '';
    
    //------------ Default Variable Assignments
    $r_name = $r['name'];
    $r_type = $r['type'];
    
    $r_obj_css = $r['obj_css'];
    $r_css = $r['css'];
    
    if ( ! empty( $r['attr']['id'] ) ) {
        $r_attr_id = $r['attr']['id'];
    }
    
    if ( ! empty( $r['attr']['for'] ) ) {
        $r_attr_for = $r['attr']['for'];
    }
    
    $r_content = $r['content'];
    
    $r_version = $r['version'];
    $r_echo = $r['echo'];
    
    //------------ Output Variables
    $name = '';
    $css = '';
    $content = '';
    $attr_id = '';
    $attr_for = '';
    $version = '';
    $echo = '';
    
    $obj_tag = '';
    $obj_type = '';
    $obj_type_css = '';
    $obj_css = '';
    $obj_dynamic_css = '';
    
    $obj_type_trailing_css = '';
    $dynamic_css = '';
    $heading_tag = '';
    $sanitized_name = '';
    
    //------------ Term Variations
    $type_form_label_term_variations = array( 'form label', 'fl', );
    $type_form_element_term_variations = array( 'form element', 'fe', );
    
    //------------ Regex Pattern and Replacement
    $pat_space = '/\s\s+/';
    $rep_space = ' ';
    
    //------------ Trimmed Array Settings
    if ( ! empty( $r_name ) ) {
        $name = preg_replace( $pat_space, $rep_space, trim( $r_name ) );
    }
    
    if ( ! empty( $r_css ) ) {
        $css = preg_replace( $pat_space, $rep_space, trim( $r_css ) );
    }
    
    if ( ! empty( $r_obj_css ) ) {
        $obj_css = ' ' . preg_replace( $pat_space, $rep_space, trim( $r_obj_css ) );
    }
    
    if ( ! empty( $r_content ) ) {
        $content = preg_replace( $pat_space, $rep_space, trim( $r_content ) );
    }
    
    if ( ! empty( $r_attr_id ) ) {
        $attr_id = 'id="' . preg_replace( $pat_space, $rep_space, trim( $r_attr_id ) ) . '"';
    }
    
    if ( ! empty( $r_attr_for ) ) {
        $attr_for = 'for="' . preg_replace( $pat_space, $rep_space, trim( $r_attr_for ) ) . '"';
    }
    
    if ( ! empty( $r_version ) ) {
        $version = preg_replace( $pat_space, $rep_space, trim( $r_version ) );
    }
    
    $echo = $r_echo;
    
    //------------ Variables with Default Values
    $sanitized_name = sanitize_title( $name );
    $dynamic_css = $sanitized_name;
    
    $obj_tag = 'div';
    $heading_tag = 'div';
    
    
    //------------ Empty Array Keys
    
    // CSS
    if ( empty( $r_css ) ) {
        $css = ' ' . $dynamic_css;
    }
    
    
    //------------ Types
    
    // Module
    if ( in_array( $r_type, $type_form_label_term_variations, true ) ) {
        $name = $name . ' ' . 'Form Label';
        $obj_type = 'form-label-obj';
        $obj_type_css = ' ' . $obj_type;
        $obj_type_trailing_css = '-' . $obj_type;
        $css = ' ' . $css . $obj_type_trailing_css;
        $obj_dynamic_css = ' ' . $dynamic_css . $obj_type_trailing_css;
    
    // Nav
    } elseif ( in_array( $r_type, $type_form_element_term_variations, true ) ) {
        $name = $name . ' ' . 'Form Element';
        $obj_type = 'obj';
        $obj_type_css = ' ' . $obj_type;
        $obj_type_trailing_css = '-' . $obj_type;
        $css = ' ' . $css . $obj_type_trailing_css;
        $obj_dynamic_css = ' ' . $dynamic_css . $obj_type_trailing_css;
    }
    
    
    //------------ New Version
    if ( '0.1' == $version ) {
        
        // Initialize
        $output = '';
    
    //------------ Original Version    
    } else {
        
        // Initialize
        $output = '';
        
        //------------ Default Output
        $output .= '<' . $obj_tag . ' ' . $attr_id . 'class="obj' . $obj_dynamic_css . $obj_css . '"' . 'data-name="' . $name . ' Object">';
        
        // Form Label
        if ( in_array( $r_type, $type_form_label_term_variations, true ) ) {
            $output .= '<label class="label' . $css . '---label"' . $attr_for .'>';
            $output .= '<span class="label_l' . $css . '---label_l">';
            $output .= $content;
            $output .= '</span>';
            $output .= '</label>';
        
        // Form Element
        } elseif ( in_array( $r_type, $type_form_element_term_variations, true ) ) {
            $output .= '<span class="felem' . $css . '---felem">';
            $output .= $content;
            $output .= '</span>';
        
        // Generic
        } else {
            $output .= $content;
        }
        
        if ( in_array( $r_type, $type_form_element_term_variations, true ) ) {
            
        }
        
        $output .= '</' . $obj_tag . '><!-- ' . $name . ' -->';
    
    }
    
    $html = apply_filters( 'htmlok_obj_test', $output, $args );
    
    if ( $echo ) {
        echo $html;
    } else {
        return $html;
    }
    
}
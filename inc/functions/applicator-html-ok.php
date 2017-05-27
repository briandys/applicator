<?php // Applicator HTML OK (Overkill)

/*
Applicator HTML OK utilizes a particular HTML markup structure that builds Elements needed in the Interface.

CN: Constructor
MCO: Module - Component - Object
E: Element
T: Text

*/

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

// Component
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
        'css'           => '',
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
        $cp_css = 'cp' . ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_cp_css ) );
        $css = preg_replace( '/\s\s+/', ' ', trim( $r_css ) );
        $dynamic_css = sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) );
    
    // Type: Module
    } elseif ( in_array( $r_type, $type_module_term_variations, true ) ) {
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) . ' ' . 'Module';
        $cp_css = 'md' . preg_replace( '/\s\s+/', ' ', trim( $r_cp_css ) );
        $css = preg_replace( '/\s\s+/', ' ', trim( $r_css ) ) . '-md';
        $dynamic_css = sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) ) . '-md';
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


function applicator_html_ok_obj( $args = array() ) {
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}
    
    // Require Element
	if ( false === array_key_exists( 'elem', $args ) ) {
		return esc_html_e( 'Please define Element.', $GLOBALS['apl_textdomain'] );
	}
    
    // Require Content
	if ( false === array_key_exists( 'content', $args ) ) {
		return esc_html_e( 'Please define Content.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'name'      => '',
        'layout'    => '', // block | inline
        'elem'      => '', // generic | heading | time | anchor | wordpress | note
        'obj_css'   => '',
        'elem_css'  => '',
        'css'       => '',
        'linked'    => false,
        'attr'      => array(
            'title'  => '',
            'datetime'  => '',
            'href'      => '',
            'htag'      => '', // h1 | h2 | h3 | h4 | h5 | h6
        ),
        'content'   => '',
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
    
    $r_content = $r['content'];
    $r_version = $r['version'];
    $r_echo = $r['echo'];
    
    $name = '';
    $tag = '';
    $spacer = '';
    
    $dynamic_css = '';
    $obj_css = '';
    $elem_css = '';
    $css = '';
    
    $attr_title = '';
    $attr_datetime = '';
    $attr_href = '';
    $attr_htag = '';
    
    $layout_inline_term_variations = ['inline', 'i'];
    $layout_block_term_variations = ['block', 'b'];
    
    $heading_term_variations = ['heading', 'h'];
    $heading_tag_term_variations = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
    
    $generic_term_variations = [ 'generic', 'g', ];
    $time_term_variations = [ 'time', 't', ];
    $anchor_term_variations = [ 'anchor', 'a', ];
    $anchor_label_term_variations = [ 'anchor_label', 'al', ];
    $wordpress_term_variations = [ 'wordpress', 'wp', ];
    $note_term_variations = [ 'note', 'n', ];
    
    
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
        $css = $dynamic_css . '-obj';
    }
    
    // title Attribute
    if ( ! empty( $r_attr_title ) ) {
        $attr_title = 'title="' . preg_replace('/\s\s+/', ' ', trim( $r_attr_title ) ) . '"';
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
    } else {
        $attr_href = '#';
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
        
        if ( ! in_array( $r_elem, $anchor_label_term_variations, true ) ) {
            $output .= $spacer . '<' . $tag . ' class="obj' . $dynamic_css . $obj_css . '"' . $attr_title . ' data-name="' . $name . '">';
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
            
            $output .= '<a class="a' . $css . '---a" ' . $elem_css . $attr_href . '>';
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
        
        if ( ! in_array( $r_elem, $anchor_label_term_variations, true ) ) {
            $output .= '</' . $tag . '><!-- ' . $name . ' -->';
        }
        
    }
    
    $html = apply_filters( 'applicator_html_ok_obj', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
}


function applicator_html_ok_txt( $args = array() ) {
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}
    
    // Require Content
	if ( false === array_key_exists( 'content', $args ) ) {
		return esc_html_e( 'Please define Content.', $GLOBALS['apl_textdomain'] );
	}
    
    // Defaults
    $defaults = array(
        'content'   => array(
            array(
                'txt'   => '',
                'css'   => '',
                'sep'   => '',
            ),
        ),
        'version'   => '',
        'echo'      => false,
    );
    
    // Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    $r_content = $r['content'];
    $r_version = $r['version'];
    $r_echo = $r['echo'];
    
    // Unset Variables
    $txt = '';
    $css = '';
    $sep = '';
    $num_txt_css = '';
    $dynamic_txt_css = '';
    
    // New Version
    if ( '0.1' == $r_version ) {
        
        $output = '';
    
    // Original Version
    } else {
        
        $output = '';
        
        foreach ( (array) $r_content as $val ) {
            
            // Text
            if ( ! empty( $val['txt'] ) || '0' === $val['txt'] ) {
                
                $txt = preg_replace('/\s\s+/', ' ', trim( $val['txt'] ) );
                
                if ( is_numeric( $txt ) ) {
                    
                    $num_txt_css = ' ' . 'num';
                    $dynamic_txt_css = ' ' . 'n' . '-' . sanitize_title( $txt );
                
                } else {
                    
                    $num_txt_css = '';
                    $dynamic_txt_css = ' ' . sanitize_title( $txt );
                
                }
                
            } else {
                
                $txt = '';
                $dynamic_txt_css = '';
            
            }
            
            // CSS
            if ( ! empty( $val['css'] ) ) {
                $css = ' ' . sanitize_title( preg_replace('/\s\s+/', ' ', trim( $val['css'] ) ) ) . '---txt';
            } else {
                $css = '';
            }
            
            // Separator
            if ( ! empty( $val['sep'] ) ) {
                $sep = preg_replace('/\s\s+/', ' ', $val['sep'] );
            } else {
                $sep = '';
            }
            
            $output .= $sep . '<span class="txt' . $num_txt_css . $css . $dynamic_txt_css . '---txt">' . $txt . '</span>';
        }
        
    }
    
    $html = apply_filters( 'applicator_html_ok_txt', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
}
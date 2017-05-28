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
	if ( empty( $args['content'] ) && empty( $args['cn_type'] ) ) {
		return esc_html_e( 'Please define Content.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'type'          => 'c',
        'elem'          => '', // nav
        'cn_type'       => '',
        'name'          => '',
        'cp_css'        => '',
        'css'           => '',
        'attr'          => array(
            'id'        => '',
        ),
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
    $r_elem = $r['elem'];
    $r_cn_type = $r['cn_type'];
        
    $r_attr_id = $r['attr']['id'];
    
    $r_name = $r['name'];
    $r_cp_css = $r['cp_css'];
    $r_css = $r['css'];
    $r_content = $r['content'];
    $r_fr_content = $r['fr_content'];
    
    $type_module_term_variations = ['module', 'md', 'm'];
    $type_component_term_variations = ['component', 'cp', 'c'];
    $type_nav_term_variations = ['navigation', 'nav', 'n'];
    
    $cn_type_header_term_variations = ['header', 'hr'];
    
    $name = '';
    $cp_css = '';
    $dynamic_css = '';
    $tag = 'div';
    
    if ( ! empty( $r_css ) ) {
        $cp_css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_css ) );
    } else {
        $cp_css = '';
    }
    
    // Element: Nav
    if ( in_array( $r_type, $type_nav_term_variations, true ) && 'nav' == $r_elem ) {
        $tag = 'nav';
    }
    
    // Type: Component
    if ( in_array( $r_type, $type_component_term_variations, true ) ) {
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) );
        $cp_css = 'cp' . ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_cp_css ) );
        $css = preg_replace( '/\s\s+/', ' ', trim( $r_css ) );
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) );
    
    // Type: Module
    } elseif ( in_array( $r_type, $type_nav_term_variations, true ) ) {
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) . ' ' . 'Nav';
        $cp_css = 'nav' . ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_cp_css ) );
        $css = preg_replace( '/\s\s+/', ' ', trim( $r_css ) ) . '-nav';
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) ) . '-nav';
        
    // Type: Module
    } elseif ( in_array( $r_type, $type_module_term_variations, true ) ) {
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) . ' ' . 'Module';
        $cp_css = 'md' . ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_cp_css ) );
        $css = preg_replace( '/\s\s+/', ' ', trim( $r_css ) ) . '-md';
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) ) . '-md';
    }
        
        
    
    // id Attribute
    if ( ! empty( $r_attr_id ) ) {
        $attr_id = 'id="' . preg_replace('/\s\s+/', ' ', trim( $r_attr_id ) ) . '"';
    } else {
        $attr_id = '';
    }
    
    // New Version
    if ( '0.1' == $r_version ) {
        
        $output = '';
    
    // Original Version    
    } else {
        
        $output = '';
        
        // Header Markup
        $hr_mu = '';
        $hr_mu .= '<div class="hr ' . $css . '---hr">';
            $hr_mu .= '<div class="hr_cr ' . $css . '---hr_cr">';
                $hr_mu .= '<div class="h ' . $css . '---h"><span class="h_l ' . $css . '---h_l">' . $name . '</span></div>';
                $hr_mu .= $r['hr_content'];
            $hr_mu .= '</div>';
        $hr_mu .= '</div>';
        
        // Footer Markup
        $fr_mu = '';
        $fr_mu .= '<div class="fr ' . $css . '---fr">';
            $fr_mu .= '<div class="fr_cr ' . $css . '---fr_cr">';
                $fr_mu .= $r['fr_content'];
            $fr_mu .= '</div>';
        $fr_mu .= '</div>';
        
        if ( ! in_array( $r_cn_type, $cn_type_header_term_variations, true ) ) {
        
            $output .= '<' . $tag . ' ' . $attr_id . 'class="' . $cp_css . $dynamic_css . '" data-name="' . $name . '">';

                $output .= '<div class="cr ' . $css . '---cr">';

                    // Header
                    $output .= $hr_mu;

                    // Content
                    $output .= '<div class="ct ' . $css . '---ct">';
                        $output .= '<div class="ct_cr ' . $css . '---ct_cr">';
                            $output .= $r_content;
                        $output .= '</div>';
                    $output .= '</div>';

                if ( ! empty( $r_fr_content ) ) {
                    // Footer
                    $output .= $fr_mu;
                }

                $output .= '</div>';

            $output .= '</' . $tag . '><!-- ' . $name . ' -->';
            
        } elseif ( in_array( $r_cn_type, $cn_type_header_term_variations, true ) ) {
            $output .= $hr_mu;
        }
    
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
        'elem'      => '', // generic | heading | time | anchor | wordpress | note | label | anchor_label | navi
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
    $obj_type_css = '';
    
    $attr_title = '';
    $attr_datetime = '';
    $attr_href = '';
    $attr_htag = '';
    $attr_id = '';
    
    $layout_inline_term_variations = ['inline', 'i'];
    $layout_block_term_variations = ['block', 'b'];
    
    $heading_term_variations = ['heading', 'h'];
    $heading_tag_term_variations = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
    
    $generic_term_variations = [ 'generic', 'g', ];
    $time_term_variations = [ 'time', 't', ];
    $label_term_variations = [ 'label', 'l', ];
    
    $anchor_term_variations = [ 'anchor', 'a', ];
    $navi_term_variations = [ 'nav_item', 'navi', ];
    
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
    
    // id Attribute
    if ( ! empty( $r_attr_id ) ) {
        $attr_id = 'id="' . preg_replace('/\s\s+/', ' ', trim( $r_attr_id ) ) . '"';
    } else {
        $attr_id = '';
    }
    
    // title Attribute
    if ( ! empty( $r_attr_title ) ) {
        $trimmed_title_attr = preg_replace('/\s\s+/', ' ', trim( $r_attr_title ) );
        $attr_title = 'title="' . esc_attr__( $trimmed_title_attr, $GLOBALS['apl_textdomain'] ) . '"';
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
    
    // Element: Nav Item
    if ( in_array( $r_elem, $navi_term_variations, true ) ) {
        $obj_type_css = ' ' . 'navi';
        $name = preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) . ' ' . 'Nav Item';
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) ) . '-navi';
        $css = ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_css ) ) . '-navi';
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
                $trimmed_txt = preg_replace('/\s\s+/', ' ', trim( $val['txt'] ) );
                $txt = esc_html__( $trimmed_txt, $GLOBALS['apl_textdomain'] );
                
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
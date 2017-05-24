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


function applicator_html_ok_mco_test( $args = array() ) {
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}
    
    // Require Content
	if ( empty( $args['content'] ) ) {
		return esc_html_e( 'Please define Content.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'type'      => '',
        'layout'    => '',
        'name'      => '',
        'css'       => '',
        'sec_css'   => '',
        'content'   => '',
        'version'   => '',
        'echo'      => false,
    );
    
    // Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    $r_version = $r['version'];
    $r_echo = $r['echo'];
    $r_layout = $r['layout'];
    $r_type = $r['type'];
    
    $r_name = $r['name'];
    $r_css = $r['css'];
    
    $layout_inline_term_variations = ['inline', 'i'];
    $layout_block_term_variations = ['block', 'b'];
    
    $type_module_term_variations = ['module', 'md', 'm'];
    $type_component_term_variations = ['component', 'cp', 'c'];
    $type_object_term_variations = ['object', 'obj', 'o'];
    
    $tag = '';
    
    // Layout
    if ( in_array( $r_layout, $layout_inline_term_variations, true ) ) {
        $tag = 'span';
    } else {
        $tag = 'div';
    }
    
    // Type
    if ( in_array( $r_type, $type_component_term_variations, true ) ) {
        $tag = 'div';
        $css = 'cp' . ' ' . preg_replace( '/\s\s+/', ' ', trim( $r_css ) );
        $dynamic_css = ' ' . sanitize_title( preg_replace( '/\s\s+/', ' ', trim( $r_name ) ) );
    }
    
    // New Version
    if ( '0.1' == $r_version ) {
        
        $output = '';
    
    // Original Version    
    } else {
        
        $output = '';
        
        $output .= '<' . $tag . ' class="' . $css . $dynamic_css . '" data-name="' . $r_name . '">';
        
            if ( ! in_array( $r_type, $type_object_term_variations, true ) ) {
                $output .= '<' . $tag . ' class="cr ' . $r['sec_css'] . '---cr">';
                
                    $output .= '<' . $tag . ' class="hr ' . $r['sec_css'] . '---hr">';
                        $output .= '<' . $tag . ' class="hr_cr ' . $r['sec_css'] . '---hr_cr">';
                            $output .= '<' . $tag . ' class="h ' . $r['sec_css'] . '---h"><span class="h_l ' . $r['sec_css'] . '---h_l">' . $r['name'] . '</span></' . $tag . '>';
                        $output .= '</' . $tag . '>';
                    $output .= '</' . $tag . '>';
                
                    $output .= '<' . $tag . ' class="ct ' . $r['sec_css'] . '---ct">';
                        $output .= '<' . $tag . ' class="ct_cr ' . $r['sec_css'] . '---ct_cr">';
                            $output .= $r['content'];
                        $output .= '</' . $tag . '>';
                    $output .= '</' . $tag . '>';
            
            } else {
                $output .= $r['content'];
            }
        
        $output .= '</' . $tag . '>';
    
    }
    
    $html = apply_filters( 'applicator_html_ok_mco_test', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
    
}


function applicator_html_ok_mco( $args = array() ) {
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}
    
    // Require Content
	if ( false === array_key_exists( 'content', $args ) ) {
		return esc_html_e( 'Please define Content.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'type'      => '',
        'layout'    => '',
        'name'      => '',
        'css'   => '',
        'sec_css'   => '',
        'title'     => '',
        'content'   => '',
        'version'   => '',
        'echo'      => false,
    );
    
    // Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    $type_name = '';
    $type_css = '';
    $type_trailing_css = '';
    
    $layout_tag = '';
    
    $name = '';
    $sanitized_name = '';
    $css = '';
    $sec_css = '';
    $title = '';
    
    $r_echo = $r['echo'];
    $r_type = $r['type'];
    
    $md_css = 'md';
    $obj_css = 'obj';
    $div = 'div';
    $span = 'span';
    
    $module_term_variations = [ 'module', 'md', 'm', ];
    $component_term_variations = [ 'component', 'cp', 'c', ];
    $object_term_variations = [ 'object', 'obj', 'o', ];
    
    $block_term_variations = [ 'block', 'b', ];
    $inline_term_variations = [ 'inline', 'i', ];
    
    
    // Type: Module
    if ( $r_type == in_array( $r_type, $module_term_variations, true ) ) {
        $type_name = ' ' . 'Module';
        $type_css = $md_css . ' ';
        $type_trailing_css = '-' . $md_css;
        $layout_tag = $div;
    }
    
    
    // Type: Component
    if ( in_array( $r['type'], $component_term_variations, true ) ) {
        $type_name = '';
        $type_css = 'cp ';
        $type_trailing_css = '';
        $layout_tag = $div;
        
        if ( in_array( $r['layout'], $inline_term_variations, true ) ) {
            $layout_tag = $span;
        }
    }
    
    // Type: Object
    if ( in_array( $r['type'], $object_term_variations, true ) ) {
        $type_name = ' ' . 'Object';
        $type_css = $obj_css . ' ';
        $type_trailing_css = '-' . $obj_css;
        $layout_tag = $span;
        
        if ( in_array( $r['layout'], $block_term_variations, true ) ) {
            $layout_tag = $div;
        }
        
    }
    
    if ( ! empty( $r['name'] ) ) {
        $name = preg_replace('/\s\s+/', ' ', trim( $r['name'] ) );
        $sanitized_name = sanitize_title( $r['name'] );
    } else {
        $name = '';
        $sanitized_name = '';
    }
    
    if ( ! empty( $r['css'] ) ) {
        $css = ' ' . trim( $r['css'] );
    } else {
        $css = '';
    }
    
    if ( ! empty( $r['sec_css'] ) ) {
        $sec_css = ' ' . trim( $r['sec_css'] );
    } else {
        $sec_css = '';
    }
    
    if ( ! empty( $r['title'] ) ) {
        $title = 'title="' . esc_attr( trim( $r['title'] ) ) . '"';
    } else {
        $title = '';
    }
    
    // New Version
    if ( '0.1' == $r['version'] ) {
        
        $output = '';
    
    // Original Version    
    } else {
        
        $output = '';
    
        // Markup
        $output .= '<' . $layout_tag . ' class="' . $type_css . $sanitized_name . $type_trailing_css . $css . '"' . $title . ' data-name="' . $name . $type_name . '">';

        if ( ! in_array( $r['type'], $object_term_variations, true ) ) {
            $output .= '<' . $layout_tag . ' class="cr' . $sec_css . '---cr">';
                $output .= '<' . $layout_tag . ' class="hr' . $sec_css . '---hr">';
                    $output .= '<' . $layout_tag . ' class="hr_cr' . $sec_css . '---hr_cr">';
                        $output .= '<' . $layout_tag . ' class="h' . $sec_css . '---h"><span class="h_l' . $sec_css . '---h_l">' . esc_html( $name ) . '</span></' . $layout_tag . '>';
                    $output .= '</' . $layout_tag . '>';
                $output .= '</' . $layout_tag . '>';
                $output .= '<' . $layout_tag . ' class="ct' . $sec_css . '---ct">';
                    $output .= '<' . $layout_tag . ' class="ct_cr' . $sec_css . '---ct_cr">';
                        $output .= $r['content'];
                    $output .= '</' . $layout_tag . '>';
                $output .= '</' . $layout_tag . '><!-- ct -->';
            $output .= '</' . $layout_tag . '>';
        }

        if ( in_array( $r['type'], $object_term_variations, true ) ) {
            $output .= $r['content'];
        }

        $output .= '</' . $layout_tag . '><!-- ' . esc_html( $name ) . $type_name . ' -->';
        
    }
    
    
    $html = apply_filters( 'applicator_html_ok_mco', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
}


function applicator_html_ok_el( $args = array() ) {
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['apl_textdomain'] );
	}
    
    // Require Type
	if ( false === array_key_exists( 'type', $args ) ) {
		return esc_html_e( 'Please define Type.', $GLOBALS['apl_textdomain'] );
	}
    
    // Require Content
	if ( false === array_key_exists( 'content', $args ) ) {
		return esc_html_e( 'Please define Content.', $GLOBALS['apl_textdomain'] );
	}
    
    $defaults = array(
        'type'      => '', // generic | time | anchor
        'linked'    => false,
        'attr'      => array(
            'datetime'  => '',
            'href'      => '',
            'htag'      => '', // div | h1 | h2 | h3 | h4 | h5 | h6
        ),
        'css'       => '',
        'content'   => '',
        'version'   => '',
        'echo'      => false,
    );
    
    // Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    $attr_datetime = '';
    $attr_href = '';
    $attr_htag = '';
    $css = '';
    
    $r_linked = $r['linked'];
    $r_content = $r['content'];
    $r_type = $r['type'];
    $r_version = $r['version'];
    $r_echo = $r['echo'];
    
    $generic_term_variations = [ 'generic', 'g', ];
    $time_term_variations = [ 'time', 't', ];
    $anchor_term_variations = [ 'anchor', 'a', ];
    $heading_term_variations = [ 'heading', 'h', ];
    $heading_tag_term_variations = [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', ];
    
    // CSS
    if ( ! empty( $r['css'] ) ) {
        $css = ' ' . sanitize_title( preg_replace('/\s\s+/', ' ', trim( $r['css'] ) ) );
    } else {
        $css = ' ' . sanitize_title( preg_replace('/\s\s+/', ' ', trim( $r['type'] ) ) );
    }
    
    // datetime Attribute
    if ( ! empty( $r['attr']['datetime'] ) ) {
        $attr_datetime = 'datetime="' . preg_replace('/\s\s+/', ' ', trim( $r['attr']['datetime'] ) ) . '"';
    } else {
        $attr_datetime = '';
    }
    
    // href Attribute
    if ( ! empty( $r['attr']['href'] ) ) {
        $attr_href = 'href="' . preg_replace('/\s\s+/', ' ', trim( $r['attr']['href'] ) ) . '"';
    } else {
        $attr_href = '#';
    }
    
    // htag Attribute
    if ( true === array_key_exists( 'htag', $r['attr'] ) ) {
        
        if ( in_array( $r['attr']['htag'], $heading_tag_term_variations, true ) ) {
            
            $attr_htag = $r['attr']['htag'];
            
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
        
        $output = '';
        
        // Anchor Markup
        $anchor_mu = '<a class="a' . $css . '---a" ' . $attr_href . '>';
            $anchor_mu .= '<span class="a_l' . $css . '---a_l">';
                $anchor_mu .= $r_content;
            $anchor_mu .= '</span>';
        $anchor_mu .= '</a>';
        
        // Generic
        if ( in_array( $r_type, $generic_term_variations, true ) ) {
            
            $output .= '<span class="g' . $css . '---g">';
            
            if ( true == $r_linked ) {
                $output .= $anchor_mu;
            } else {
                $output .= '<span class="g_l' . $css . '---g_l">';
                    $output .= $r_content;
                $output .= '</span>';
            }
            
            $output .= '</span>';
            
        }
        
        // Time
        if ( in_array( $r_type, $time_term_variations, true ) ) {
            
            $output .= '<time class="time' . $css . '---time" ' . $attr_datetime . '>';
            
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
        if ( in_array( $r_type, $heading_term_variations, true ) ) {
            
            $output .= '<' . $attr_htag . $attr_hlevel . ' class="h' . $css . '---h">';
            
            if ( true == $r_linked ) {
                $output .= $anchor_mu;
            } else {
                $output .= '<span class="h_l' . $css . '---h_l">';
                    $output .= $r_content;
                $output .= '</span>';
            }
                
            $output .= '</' . $attr_htag . $attr_hlevel . '>';
            
        }
        
        // Anchor
        if ( in_array( $r_type, $anchor_term_variations, true ) ) {
            
            $output .= $anchor_mu;
            
        }
        
    }
    
    $html = apply_filters( 'applicator_html_ok_el', $output, $args );
    
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
            if ( ! empty( $val['txt'] ) ) {
                
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
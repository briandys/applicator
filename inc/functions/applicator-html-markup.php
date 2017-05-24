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
    if ( in_array( $r['type'], $component_term_variations, true ) ) {
        $type_css = 'cp ';
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

        if ( ! in_array( $r['type'], $object_term_variations, true ) ) {
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

        if ( in_array( $r['type'], $object_term_variations, true ) ) {
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


function applicator_html_ok_e( $args = array() ) {
    
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
            'htag'      => '',
            'hlevel'    => '', // 1 | 2 | 3 | 4 | 5 | 6
        ),
        'css'       => '',
        'content'   => '',
        'version'   => '',
        'echo'      => false,
    );
    
    // Parse args
    $r = wp_parse_args( $args, $defaults );
    
    $attr_datetime = '';
    $attr_href = '';
    $attr_hlevel = '';
    $css = '';
    
    $r_linked = $r['linked'];
    $r_content = $r['content'];
    $r_type = $r['type'];
    $r_version = $r['version'];
    $r_echo = $r['echo'];
    
    $generic_term_variations = array( 'generic', 'g' );
    $time_term_variations = array( 'time', 't' );
    $anchor_term_variations = array( 'anchor', 'a' );
    $heading_term_variations = array( 'heading', 'h' );
    $heading_tag_term_variations = array( 'h', 'div' );
    $heading_level_term_variations = array( '1', '2', '3', '4', '5', '6' );
    
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
        
        if ( 'h' == $r['attr']['htag'] ) {
            $attr_htag = 'h';
            
            if ( true === array_key_exists( 'hlevel', $r['attr'] ) ) {
        
                if ( in_array( $r['attr']['hlevel'], $heading_level_term_variations, true ) ) {
                    $attr_hlevel = preg_replace('/\s\s+/', ' ', trim( $r['attr']['hlevel'] ) );
                } else {
                    $attr_hlevel = '1';
                }

            } else {
                $attr_hlevel = '1';
            }
            
        } else {
            $attr_htag = 'div';
        }
        
    } else {
        $attr_htag = 'div';
    }
    
    // New Version
    if ( '0.1' == $r_version ) {
        
        $output = '';
    
    // Current Version
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
    
    $html = apply_filters( 'applicator_html_ok_e', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
}


function applicator_html_ok_txt( $args = array() ) {
    
    // Make sure $args are an array.
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
        'echo'      => false
    );
    
    // Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    $content = $r['content'];
    $version = $r['version'];
    $echo = $r['echo'];
    
    // Unset Variables
    $num_txt_css = '';
    $manual_txt_css = '';
    $trimmed_txt = '';
    $dynamic_txt_css = '';
    
    // New Version
    if ( '0.1' == $r['version'] ) {
        $output = '';
    
    // Original Version
    } else {
        
        $output = '';
        
        foreach ( (array) $content as $val ) {
            
            if ( ! empty( $val['txt'] ) ) {
                $txt = $val['txt'];
            } else {
                $txt = '';
            }
            
            if ( ! empty( $val['css'] ) ) {
                $css = $val['css'];
            } else {
                $css = '';
            }
            
            if ( ! empty( $val['sep'] ) ) {
                $sep = $val['sep'];
            } else {
                $sep = '';
            }
            
            if ( is_numeric( $txt ) ) {
                $num_txt_css = ' ' . 'num';
            } else {
                $num_txt_css = '';
            }
            
            if ( $css ) {
                $manual_txt_css = ' ' . $css . '---txt';
            } else {
                $manual_txt_css = '';
            }
            
            $trimmed_txt = preg_replace('/\s\s+/', ' ', trim( $txt ) );
            
            if ( is_numeric( $trimmed_txt ) ) {
                $dynamic_txt_css = ' ' . 'n' . '-' . sanitize_title( $trimmed_txt );
            } else {
                $dynamic_txt_css = ' ' . sanitize_title( $trimmed_txt );
            }
            
            $output .= $sep . '<span class="txt' . $num_txt_css . $manual_txt_css . $dynamic_txt_css . '---txt">' . $txt . '</span>';
        }
        
    }
    
    $html = apply_filters( 'applicator_html_ok_txt', $output, $args );
    
    if ( $echo ) {
        echo $html;
    } else {
        return $html;
    }
}
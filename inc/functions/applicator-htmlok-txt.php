<?php // Applicator HTML_OK (Overkill) Text Structure

function htmlok_txt( $args = array() ) {
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', 'applicator' );
	}
    
    // Require Content
	if ( false === array_key_exists( 'content', $args ) ) {
		return esc_html_e( 'Please define Content.', 'applicator' );
	}
    
    // Defaults
    $defaults = array(
        'content'   => array(
            array(
                'txt'   => '',
                'css'   => '',
                'sep'   => '',
                'line'      => array(
                    array(
                        array(
                            'sep' => '',
                            'txt' => '',
                            'css' => '',
                            'esc' => true,
                        ),
                    ),
                ),
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
            
            $txt = '';
            $sep = '';
            $css = '';
            $num_txt_css = '';
            $dynamic_txt_css = '';
            
            $val_txt = '';
            $val_esc = '';
            
            if ( ! empty( $val['txt'] ) ) {
                $val_txt = $val['txt'];
            }
            
            if ( ! empty( $val['esc'] ) ) {
                $val_esc = $val['esc'];
            }
            
            // Text
            if ( ! empty( $val_txt ) ) {
                $trimmed_txt = preg_replace('/\s\s+/', ' ', trim( $val['txt'] ) );
                $txt = $trimmed_txt;
                
                if ( is_numeric( $txt ) ) {
                    
                    $num_txt_css = ' ' . 'num';
                    $dynamic_txt_css = ' ' . 'n' . '-' . sanitize_title( $txt ) . '---txt';
                
                } else {
                    
                    if ( '' == sanitize_title( $txt ) ) {
                        $dynamic_txt_css = '';
                    } else {
                        $dynamic_txt_css = ' ' . sanitize_title( $txt ) . '---txt';
                    }
                }
                
            }
            
            // CSS
            if ( ! empty( $val['css'] ) ) {
                $css = ' ' . sanitize_title( preg_replace('/\s\s+/', ' ', trim( $val['css'] ) ) ) . '---txt';
            }
            
            // Separator
            if ( ! empty( $val['sep'] ) ) {
                $sep = preg_replace('/\s\s+/', ' ', $val['sep'] );
            }
            
            // Text
            if ( empty( $val['line'] ) ) {
                
                $output .= $sep . '<span class="txt' . $num_txt_css . $css . $dynamic_txt_css . '">' . $txt . '</span>';
            
            // Lines
            } else {
                
                foreach ( (array) $val['line'] as $line_item ) {
                    
                    $line_css = '';
                    
                    if ( ! empty( $line_item[0]['txt'] ) ) {
                        $txt = preg_replace('/\s\s+/', ' ', trim( $line_item[0]['txt'] ) );
                        $line_css = ' ' . sanitize_title( $txt );
                    }
                    
                    $output .= '<span class="line' . $line_css . '---line">';
                    
                    foreach ( (array) $line_item as $line_txt_item ) {
                        
                        $sep = '';
                        $txt = '';
                        $css = '';
                        $num_txt_css = '';
                        $dynamic_txt_css = '';
                        
                        $line_txt_item_esc = '';
                        
                        if ( ! empty( $line_txt_item['esc'] ) ) {
                            $line_txt_item_esc = $line_txt_item['esc'];
                        }
                        
                        
                        if ( ! empty( $line_txt_item['sep'] ) ) {
                            $sep = preg_replace('/\s\s+/', ' ', $line_txt_item['sep'] );
                        }
                        
                        // Text
                        if ( ! empty( $line_txt_item['txt'] ) ) {
                            $trimmed_txt = preg_replace('/\s\s+/', ' ', trim( $line_txt_item['txt'] ) );
                            
                            // Escaping
                            if ( $line_txt_item_esc ) {
                                $txt = $trimmed_txt;
                            } else {
                                $txt = $trimmed_txt;
                            }
                            

                            if ( is_numeric( $txt ) ) {

                                $num_txt_css = ' ' . 'num';
                                $dynamic_txt_css = ' ' . 'n' . '-' . sanitize_title( $txt ) . '---txt';

                            } else {
                                
                                if ( '' == sanitize_title( $txt ) ) {
                                    $dynamic_txt_css = '';
                                } else {
                                    $dynamic_txt_css = ' ' . sanitize_title( $txt ) . '---txt';
                                }
                            }
                        }
                        
                        if ( ! empty( $line_txt_item['css'] ) ) {
                            $css = ' ' . preg_replace('/\s\s+/', ' ', trim( $line_txt_item['css'] ) ) . '---txt';
                        }
                    
                        $output .= $sep . '<span class="txt' . $num_txt_css . $css . $dynamic_txt_css . '">' . $txt . '</span>';

                    }
                    
                    $output .= '</span>';
                }
                
            }
            
        }
    }
    
    $html = apply_filters( 'htmlok_txt', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
}
<?php // Applicator HTML_OK (Overkill) Constructor Structure

function htmlok_cn( $args = array() ) {
    
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
        'type'          => '', // Type: header | main | aside | footer
        'elem'          => '', // Element: div | aside as <aside>
        // 'sub_type'      => '', // Sub-Type: header | content | footer
        'h_elem'        => '', // Heading Elem: h1 | h2 | h3 | h4 | h5 | h6
        
        'cn_css'        => '', // Component CSS: custom css at the root level
        'css'           => '',
        
        'attr'          => array(
            'id'        => '', // Component ID Attribute: id=""
        ),
        
        'content'       => '', // Content
        'hr_content'    => '', // Header Content
        'fr_content'    => '', // Footer Content
        
        'version'       => '', // Version
        'echo'          => false, // Echo
    );
    
    // Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    //------------ Initialize Variables
    $r_name = '';
    $r_type = '';
    $r_elem = '';
    // $r_sub_type = '';
    $r_h_elem = '';
    $r_cn_css = '';
    $r_css = '';
    $r_attr_id = '';
    $r_content = '';
    $r_hr_content = '';
    $r_fr_content = '';
    $r_version = '';
    $r_echo = '';
    
    $name = '';
    $css = '';
    $cn_css = '';
    $dynamic_css = '';
    $cn_dynamic_css = '';
    $cp_type_trailing_css = '';
    
    //------------ Default Variable Assignments
    $r_name = $r['name'];
    $r_type = $r['type'];
    $r_elem = $r['elem'];
    // $r_sub_type = $r['sub_type'];
    $r_h_elem = $r['h_elem'];
    
    $r_cn_css = $r['cn_css'];
    $r_css = $r['css'];
        
    $r_attr_id = $r['attr']['id'];
    
    $r_content = $r['content'];
    $r_hr_content = $r['hr_content'];
    $r_fr_content = $r['fr_content'];
    
    $r_version = $r['version'];
    $r_echo = $r['echo'];
    
    //------------ Output Variables
    $name = '';
    $css = '';
    $content = '';
    $hr_content = '';
    $fr_content = '';
    $attr_id = '';
    $version = '';
    $echo = '';
    
    $cn_tag = '';
    $attr_id = '';
    $attr_role = '';
    $cn_type_css = '';
    $cn_css = '';
    $cn_dynamic_css = '';
    $cn_dynamic_id = '';
    
    $cp_type_trailing_css = '';
    $cp_type_abbr_trailing_css = '';
    $dynamic_css = '';
    $heading_tag = '';
    $sanitized_name = '';
    
    //------------ Term Variations
    $type_aside_term_variations = array( 'aside', 'as', );
    $h_elem_term_variations = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', );
    
    $sub_type_header_term_variations = array( 'header', 'hr', );
    
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
    
    if ( ! empty( $r_cn_css ) ) {
        $cn_css = preg_replace( $pat_space, $rep_space, trim( $r_cn_css ) );
        $cn_css = ' ' . $cn_css;
    }
    
    if ( in_array( $r_h_elem, $h_elem_term_variations, true ) ) {
        $h_elem = preg_replace( $pat_space, $rep_space, trim( $r_h_elem ) );
    }
    
    if ( ! empty( $r_content ) ) {
        $content = preg_replace( $pat_space, $rep_space, trim( $r_content ) );
    }
    
    if ( ! empty( $r_hr_content ) ) {
        $hr_content = preg_replace( $pat_space, $rep_space, trim( $r_hr_content ) );
    }
    
    if ( ! empty( $r_fr_content ) ) {
        $fr_content = preg_replace( $pat_space, $rep_space, trim( $r_fr_content ) );
    }
    
    if ( ! empty( $r_attr_id ) ) {
        $attr_id = 'id="' . preg_replace( $pat_space, $rep_space, trim( $r_attr_id ) ) . '"';
    }
    
    if ( ! empty( $r_version ) ) {
        $version = preg_replace( $pat_space, $rep_space, trim( $r_version ) );
    }
    
    $echo = $r_echo;
    
    //------------ Variables with Default Values
    $sanitized_name = sanitize_title( $name );
    $dynamic_css = $sanitized_name;
    
    $cn_tag = 'div';
    $heading_tag = 'div';
    $cn_type_css = 'cp';
    $css = ' ' . $css;
    
    $cn_dynamic_css = ' ' . $dynamic_css;
    $cn_dynamic_id = $dynamic_css;
    
    
    //------------ Empty CSS
    if ( empty( $r_css ) ) {
        $css = ' ' . $dynamic_css;
    }
    
    
    //------------ Types
    
    // Module
    if ( in_array( $r_type, $type_aside_term_variations, true ) ) {
        $name = $name . ' ' . 'Aside';
        $cn_type_css = 'aside';
        $cn_type_abbr_css = 'as';
        $cp_type_trailing_css = '-' . $cn_type_css;
        $cp_type_abbr_trailing_css = '-' . $cn_type_abbr_css;
        $css = $css . $cp_type_abbr_trailing_css;
        $cn_dynamic_css = $cn_dynamic_css . $cp_type_trailing_css;
        $cn_dynamic_id = $cn_dynamic_id . $cp_type_trailing_css;
        $attr_role = 'role="complementary"';
    }
    
    
    //------------ Elements
    
    // Aside
    if ( in_array( $r_elem, $type_aside_term_variations, true ) ) {
        $cn_tag = 'aside';
        
        $heading_tag = 'h2';
        
        if ( in_array( $r_h_elem, $h_elem_term_variations, true ) ) {
            $heading_tag = $h_elem;
        }
    }
    
    // Empty ID
    if ( empty( $r_attr_id ) ) {
        $attr_id = 'id="' . $cn_dynamic_id . '"';
    }
    
    
    //------------ New Version
    if ( '0.1' == $version ) {
        
        // Initialize
        $output = '';
    
    //------------ Original Version    
    } else {
        
        // Initialize
        $output = '';
        
        //------------ Header Markup
        $hr_mu = '';
        $hr_mu .= '<div class="hr' . $css . '---hr">';
            $hr_mu .= '<div class="hr_cr' . $css . '---hr_cr">';
                $hr_mu .= '<' . $heading_tag . ' class="h' . $css . '---h"><span class="h_l' . $css . '---h_l">' . $name . '</span></'. $heading_tag .'>';
                $hr_mu .= $hr_content;
            $hr_mu .= '</div>';
        $hr_mu .= '</div>';
        
        //------------ Footer Markup
        $fr_mu = '';
        $fr_mu .= '<div class="fr ' . $css . '---fr">';
            $fr_mu .= '<div class="fr_cr' . $css . '---fr_cr">';
                $fr_mu .= $fr_content;
            $fr_mu .= '</div>';
        $fr_mu .= '</div>';
        
        //------------ Default Output
        
        $output .= '<' . $cn_tag . ' ' . $attr_id . 'class="' . $cn_type_css . $cn_dynamic_css . $cn_css . '"' . ' ' . $attr_role . 'data-name="' . $name . '">';
        $output .= '<div class="cr' . $css . '---cr">';

        // Header
        if ( in_array( $r_type, $type_aside_term_variations, true ) ) {
            $output .= $hr_mu;
        }

        // Content
        $output .= '<div class="ct' . $css . '---ct">';
        $output .= '<div class="ct_cr' . $css . '---ct_cr">';
        $output .= $content;
        $output .= '</div>';
        $output .= '</div><!-- ct -->';

        // Footer
        if ( ! empty( $r_fr_content ) ) {
            $output .= $fr_mu;
        }

        $output .= '</div>';
        $output .= '</' . $cn_tag . '><!-- ' . $name . ' -->';
    
    }
    
    $html = apply_filters( 'htmlok_cp', $output, $args );
    
    if ( $echo ) {
        echo $html;
    } else {
        return $html;
    }
    
}

/*
function htmlok_cn( $args = array() ) {
    
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
    
    $defaults = array(
        'elem'      => '', // header | main | footer | aside
        'name'      => '',
        'cn_css'    => '',
        'css'       => '',
        'content'   => '',
        'echo'      => false,
    );
    
    $r = wp_parse_args( $args, $defaults );
    
    // Variables
    $r_elem = $r['elem'];
    $r_name = $r['name'];
    $r_cn_css = $r['cn_css'];
    $r_css = $r['css'];
    $r_content = $r['content'];
    $r_echo = $r['echo'];
    
    // Initialize Trimmed Keys
    $trimmed_name = '';
    $sanitized_name = '';
    $trimmed_cn_css = '';
    $trimmed_css = '';
    $trimmed_content = '';
    
    // Initialize Keys
    $name = '';
    $dynamic_css = '';
    $cn_css = '';
    $css = '';
    
    // preg_replace
    $pat_trim = '/\s\s+/';
    $rep_trim = ' ';
    
    // Trimmed Keys
    $trimmed_name = preg_replace( $pat_trim, $rep_trim, trim( $r_name ) );
    $sanitized_name = sanitize_title( $trimmed_name );
    $trimmed_cn_css = preg_replace( $pat_trim, $rep_trim, trim( $r_cn_css ) );
    $trimmed_css = preg_replace( $pat_trim, $rep_trim, trim( $r_css ) );
    $trimmed_content = preg_replace( $pat_trim, $rep_trim, trim( $r_content ) );
    
    // Keys
    $name = $trimmed_name;
    $dynamic_css = ' ' . $sanitized_name;
    $cn_css = ' ' . $trimmed_cn_css;
    $css = ' ' . $trimmed_css;
    $content = $trimmed_content;
    
    if ( empty( $r_cn_css ) ) {
        $cn_css = '';
    }
    
    if ( empty( $r_css ) ) {
        $css = $dynamic_css;
    }
    
    // Output
    $output = '';
    
    $output .= '<div id="" class="cn' . $dynamic_css . $cn_css . '" data-name="' . $name . '">';
    $output .= '<div class="cr' . $css . '---cr">';
    $output .= $content;
    $output .= '</div>';
    $output .= '</div><!-- ' . $name . ' -->';
    
    // Apply Filters
    $html = apply_filters( 'htmlok_cn', $output, $args );
    
    // Echo or Return
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
    
}
*/
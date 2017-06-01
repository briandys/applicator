<?php // Applicator HTML_OK (Overkill) Constructor-Component Structure

function htmlok( $args = array() ) {
    
    //------------ Requirements
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['applicator_td'] );
	}
    
    // Require Miscellaneous
	if ( empty( $args['name'] ) || empty( $args['content'] ) ) {
		return esc_html_e( 'These are required: Name, Content.', $GLOBALS['applicator_td'] );
	}
    
    //------------ Defaults
    
    $defaults = array(
        'name'          => '', // Name: Used in data-name="" and generating the parent-level CSS class name
        'structure'     => '', // Type: header | content | footer | aside | module | component | nav | actions | controls | generic
        'layout'        => '', // Layout: block | inline
        'elem'          => '', // Element: Default is <div> | aside for <aside> | nav for <nav>
        
        'h_elem'        => '', // Heading Elem: Partners with 'elem' specifically for <header>, <nav>, <aside> h1 | h2 | h3 | h4 | h5 | h6
        
        'parent_css'    => '', // There's a generated parent css based on the 'name' and one can also add a custom
        'css'           => '', // This is a custom CSS that will apply to all structure elements
        
        'id'            => '', // Parent ID Attribute
        'role'          => '', // Parent Role Attribute - required for main header, main content, main footer, <nav>, <aside>
        
        'content'       => '', // Content
        'hr_structure'  => false, // Header Content
        'hr_content'    => '', // Header Content
        'fr_content'    => '', // Footer Content
        
        'version'       => '', // Version: to be able to supply new code in the same function
        'echo'          => false, // Echo: defaults to return
    );
    
    //------------ WordPress Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    
    //------------ Regex Pattern and Replacement
    // Convert multiple spaces to single space
    $pat_space = '/\s\s+/';
    $rep_space = ' ';
    $pat_no_space = '/\s+/';
    $rep_no_space = '';
    
    
    //------------ Term Variations
    $structure_constructor_term_variations = array( 'Constructor', 'constructor', 'cn', );
    $structure_module_term_variations = array( 'Module', 'module', 'md', );
    
    $structure_component_term_variations = array( 'Component', 'component', 'cp', );
    $structure_nav_term_variations = array( 'Navigation', 'Nav', 'n', );
    $structure_aside_term_variations = array( 'Aside', 'as', );
    $structure_object_term_variations = array( 'Object', 'obj', );
    
    $elem_header_term_variations = array( 'header', );
    $elem_aside_term_variations = array( 'aside', );
    
    $layout_block_term_variations = array( 'Block', 'block', 'b', );
    $layout_inline_term_variations = array( 'Inline', 'inline', 'i', );
    
    //------------ Trimmed Array Entries
    
    if ( ! empty( $r['name'] ) ) {
        $r_name = $r['name'];
        $name = preg_replace( $pat_space, $rep_space, trim( $r_name ) );
        $sanitized_name = sanitize_title( $name );
    } else {
        $name = '';
        $sanitized_name = '';
    }
    
    if ( ! empty( $r['structure'] ) ) {
        $r_structure = $r['structure'];
        $structure = preg_replace( $pat_no_space, $rep_no_space, trim( $r_structure ) );
        
        if ( in_array( $structure, $structure_constructor_term_variations, true ) ) {
            $structure_name = $name.' '.'Constructor';
            $structure_css = 'cn';
        } elseif ( in_array( $structure, $structure_module_term_variations, true ) ) {
            $structure_name = $name.' '.'Module';
            $structure_css = 'md';
            
        } elseif ( in_array( $structure, $structure_component_term_variations, true ) ) {
            $structure_name = $name.' '.'Component';
            $structure_css = 'cp';
            
        } elseif ( in_array( $structure, $structure_nav_term_variations, true ) ) {
            $structure_name = $name.' '.'Nav';
            $structure_css = 'nav';
            
        } elseif ( in_array( $structure, $structure_aside_term_variations, true ) ) {
            $structure_name = $name.' '.'Aside';
            $structure_css = 'aside';
            
        } elseif ( in_array( $structure, $structure_object_term_variations, true ) ) {
            $structure_name = $name.' '.'Object';
            $structure_css = 'obj';
            
        } else {
            $structure_name = '';
            $structure_css = '';
        }
    } else {
        $structure = '';
    }
    
    if ( ! empty( $r['elem'] ) ) {
        $r_elem = $r['elem'];
        $elem = preg_replace( $pat_no_space, $rep_no_space, trim( $r_elem ) );
        
        if ( in_array( $elem, $elem_header_term_variations, true ) ) {
            $elem_tag = 'header';
            $h_elem_tag = 'h2';
        } elseif ( in_array( $elem, $elem_aside_term_variations, true ) ) {
            $elem_tag = 'aside';
            $h_elem_tag = 'h2';
        } else {
            $elem_tag = 'div';
        }
    } else {
        $elem_tag = 'div';
    }
    
    if ( ! empty( $r['h_elem'] ) ) {
        $r_h_elem = $r['h_elem'];
        $h_elem = preg_replace( $pat_no_space, $rep_no_space, trim( $r_h_elem ) );
        $h_elem_tag = $h_elem;
    } else {
        $h_elem_tag = 'div';
    }
    
    if ( ! empty( $r['id'] ) ) {
        $r_id = $r['id'];
        $id = sanitize_title( preg_replace( $pat_space, $rep_space, trim( $r_id ) ) );
        $id_attr = ' '.'id="'.$id.'"';
    } else {
        $id_attr = '';
    }
    
    if ( ! empty( $r['role'] ) ) {
        $r_role = $r['role'];
        $role = sanitize_title( preg_replace( $pat_space, $rep_space, trim( $r_role ) ) );
        $role_attr = ' '.'role="'.$role.'"';
    } else {
        $role_attr = '';
    }
    
    if ( ! empty( $r['css'] ) ) {
        $r_css = $r['css'];
        $css = ' '.preg_replace( $pat_space, $rep_space, trim( $r_css ) );
    } else {
        $css = ' '.$sanitized_name;
    }
    
    if ( ! empty( $r['parent_css'] ) ) {
        $r_parent_css = $r['parent_css'];
        $parent_css = ' '.preg_replace( $pat_space, $rep_space, trim( $r_parent_css ) );
    } else {
        $parent_css = '';
    }
    
    if ( ! empty( $r['content'] ) ) {
        $r_content = $r['content'];
        $content = preg_replace( $pat_space, $rep_space, trim( $r_content ) );
    } else {
        $content = '';
    }
    
    $r_hr_structure = $r['hr_structure'];
    $hr_structure = preg_replace( $pat_space, $rep_space, trim( $r_hr_structure ) );
    
    if ( ! empty( $r['hr_content'] ) ) {
        $r_hr_content = $r['hr_content'];
        $hr_content = preg_replace( $pat_space, $rep_space, trim( $r_hr_content ) );
    } else {
        $hr_content = '';
    }
    
    if ( ! empty( $r['fr_content'] ) ) {
        $r_fr_content = $r['fr_content'];
        $fr_content = preg_replace( $pat_space, $rep_space, trim( $r_fr_content ) );
    } else {
        $fr_content = '';
    }
    
    if ( ! empty( $r['version'] ) ) {
        $r_version = $r['version'];
        $version = preg_replace( $pat_space, $rep_space, trim( $r_version ) );
    } else {
        $version = '';
    }
    
    $r_echo = $r['echo'];
    $echo = preg_replace( $pat_space, $rep_space, trim( $r_echo ) );
    
    $cr_mu = '';
    $cr_mu .= '<div class="%2$s'.$css.'---%2$s">';
    $cr_mu .= '<div class="%2$s_cr'.$css.'---%2$s_cr">';
    $cr_mu .= '%1$s';
    $cr_mu .= '</div>';
    $cr_mu .= '</div>';
    
    $obj_mu = '';
    $obj_mu .= '<'.$elem_tag.'>';
    $obj_mu .= $content;
    $obj_mu .= '</'.$elem_tag.'>';
    
    $hr_mu = '';
    $hr_mu .= sprintf( $cr_mu,
        '<'.$h_elem_tag.' class="h'.$css.'---h"><span class="h_l'.$css.'---h_l">'.$name.'</span></'.$h_elem_tag.'>'.$hr_content,
        'hr'
    );
    
    $ct_mu = '';
    $ct_mu .= sprintf( $cr_mu,
        $content,
        'ct'
    );
    
    $fr_mu = '';
    $fr_mu .= sprintf( $cr_mu,
        $fr_content,
        'fr'
    );
    
    if ( in_array( $structure, $structure_constructor_term_variations, true ) ) {
        $structure_content = '';

        if ( $hr_structure || ! empty( $r['hr_content'] ) ) {
            $structure_content .= $hr_mu.$ct_mu;
        } else {
            $structure_content .= $content;
        }

    } elseif ( in_array( $structure, $structure_module_term_variations, true ) ) {
        $structure_content = $hr_mu.$ct_mu;
    
    } elseif ( in_array( $structure, $structure_component_term_variations, true ) ) {
        $structure_content = $hr_mu.$ct_mu;
    
    } elseif ( in_array( $structure, $structure_nav_term_variations, true ) ) {
        $role_attr = ' '.'role="navigation"';
        $structure_content = $hr_mu.$ct_mu;
    
    } elseif ( in_array( $structure, $structure_aside_term_variations, true ) ) {
        $role_attr = ' '.'role="complementary"';
        $structure_content = $hr_mu.$ct_mu;
    
    } elseif ( in_array( $structure, $structure_object_term_variations, true ) ) {
        $structure_content = $obj_mu;
        
        if ( ! empty( $r['layout'] ) ) {
            $r_layout = $r['layout'];
            $layout = preg_replace( $pat_space, $rep_space, trim( $r_layout ) );
            
            if ( in_array( $layout, $layout_block_term_variations, true ) ) {
                $elem_tag = 'div';
            } else {
                $elem_tag = 'span';
            }
        } else {
            $layout = '';
        }
    
    } else {
        $structure_content = $content;
    }
    
    
    //------------ New Version
    if ( '0.1' == $version ) {
        
        // Initialize
        $output = '';
    
    //------------ Original Version    
    } else {
        
        // Initialize
        $output = '';
        
        $output .= '<'.$elem_tag.$id_attr.' class="'.$structure_css.$css.$parent_css.'" '.$role_attr.' data-name="'.$structure_name.'">';
        
        if ( ! in_array( $structure, $structure_object_term_variations, true ) ) {
            $output .= '<div class="cr'.$css.'---cr">';
        }
        
        $output .= $structure_content;
            
        if ( ! empty( $r['fr_content'] ) ) {
            $output .= $fr_mu;
        }
        
        if ( ! in_array( $structure, $structure_object_term_variations, true ) ) {
            $output .= '</div>';
        }
        
        $output .= '</'.$elem_tag.'><!-- '.$structure_name.' -->';
    
    }
    
    $html = apply_filters( 'htmlok', $output, $args );
    
    if ( $echo ) {
        echo $html;
    } else {
        return $html;
    }
    
}
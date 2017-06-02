<?php // Applicator HTML_OK (Overkill) Constructor-Component Structure

function htmlok( $args = array() ) {
    
    //------------ Requirements
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['applicator_td'] );
	}
    
    /*
    // Require Miscellaneous
	if ( empty( $args['name'] ) || empty( $args['content'] ) ) {
		return esc_html_e( 'These are required: Name, Content.', $GLOBALS['applicator_td'] );
	}
    */
    
    //------------ Defaults
    
    $defaults = array(
        'name'          => '', // Name: Used in data-name="" and generating the parent-level CSS class name
        'namex'          => '', // Name: Used in data-name="" and generating the parent-level CSS class name
        'structure'     => '', // Type: header | content | footer | aside | module | component | nav | actions | controls | generic
        'layout'        => '', // Layout: block | inline
        'elem'          => '', // Element: Default is <div> | aside for <aside> | nav for <nav>
        'obj_elem'      => '', // Object Element: a | div | span
        
        'h_elem'        => '', // Heading Elem: Partners with 'elem' specifically for <header>, <nav>, <aside> h1 | h2 | h3 | h4 | h5 | h6
        
        'root_css'    => '', // There's a generated parent css based on the 'name' and one can also add a custom
        'css'           => '', // This is a custom CSS that will apply to all structure elements
        
        'id'            => '', // Parent ID Attribute
        'role'          => '', // Parent Role Attribute - required for main header, main content, main footer, <nav>, <aside>
        
        'content'       => '', // Content
        'hr_structure'  => false, // Header Content
        'hr_content'    => '', // Header Content
        'fr_content'    => '', // Footer Content
        
        'version'       => '', // Version: to be able to supply new code in the same function
        'echo'          => false, // Echo: defaults to return
        'structurex'    => array(
            'type'      => '', // Constructor[Web Product, Web Product Start, Main Header, Main Content, Main Footer, Web Product End, Aside] | Module | Component[Generic, Navigation, Actions, Controls] | Object[Information, Label, Note, Form Label, Navigation Item, Action Item, Control Item]
            'elem'      => '', //
            'layout'    => '', //
        ),
        'attr'          => array(
            'id'        => '',
            'title'     => '',
            'datetime'  => '',
            'href'      => '',
            'hlevel'    => '', // h1 | h2 | h3 | h4 | h5 | h6
            'linked'    => false,
        ),
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
    
    $elem_header_term_variations = array( 'header', 'hr', );
    $elem_aside_term_variations = array( 'aside', 'as', );
    
    $obj_elem_anchor_term_variations = array( 'anchor', 'a', );
    
    $layout_block_term_variations = array( 'Block', 'block', 'b', );
    $layout_inline_term_variations = array( 'Inline', 'inline', 'i', );
    
    $structurex_type_constructor_term_variations = array( 'Constructor', 'constructor', 'cn', );
    $structurex_type_object_term_variations = array( 'Object', 'object', 'obj', );
    
    $structurex_layout_block_term_variations = array( 'Block', 'block', 'div', );
    $structurex_layout_inline_term_variations = array( 'Inline', 'inline', 'span', );
    
    $structurex_elem_header_term_variations = array( 'Header', 'header', 'hr', );
    $structurex_elem_footer_term_variations = array( 'Footer', 'footer', 'fr', );
    $structurex_elem_aside_term_variations = array( 'Aside', 'aside', 'as', );
    
    $structurex_subtype_glabel_term_variations = array( 'Generic Label', 'generic label', 'glabel', 'gl', );
    $structurex_subtype_link_term_variations = array( 'Link', 'link', );
    $structurex_subtype_heading_term_variations = array( 'Heading', 'heading', 'h', );
    
    $structurex_obj_elem_generic_term_variations = array( 'Generic', 'generic', 'g', );
    $structurex_obj_elem_anchor_term_variations = array( 'Anchor', 'anchor', 'a', );
    $structurex_obj_elem_heading_term_variations = array( 'Heading', 'heading', 'h', );
    
    $structurex_obj_elem_heading_level_attr_term_variations = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', );
    
    
    
    //------------ Initialized Variables
    $name = '';
    
    
    $r_namex = '';
    $r_structurex_type = '';
    $r_structurex_elem = '';
    $r_structurex_layout = '';
    $r_structurex_attr_href = '';
    $r_structurex_subtype = '';
    $sanitized_name = '';
    $structure_type = '';
    $structure_subtype = '';
    $structure_type_css = '';
    $structure_subtype_css = '';
    $structure_subtype_abbr = '';
    $cssx = '';
    $id_attrx = '';
    $sanitized_idx = '';
    $role_attrx = '';
    $title_attr = '';
    $sanitized_structure_type = '';
    $sanitized_structure_subtype = '';
    $structure_type_css = '';
    $structure_subtype_css = '';
    $r_structurex_attr_linked = '';
    $hlevel_tag = '';
    
    $layout_tag = 'div';
    $root_tagx = $layout_tag;
    $branch_tag = $layout_tag;
    
    $structure_name = '';
    $href_attr = '';
    $escaped_url = '';
    $href_attr = ' '.'href="#"';
    $target_attr = '';
    
    $structure_type = '';
    $structure_type_abbr = '';
    $branch_css = 'x';
    $hlevel_tag = 'h2';
    
    $label_tag = 'span';
    
    
    //------------ Trimmed Array Entries
    
    if ( ! empty( $r['name'] ) ) {
        $r_name = $r['name'];
        $name = preg_replace( $pat_space, $rep_space, trim( $r_name ) );
        $sanitized_name = sanitize_title( $name );
    }
    
    
    
    //------------------------------------------------
    
    
    // Name
    if ( ! empty( $r['namex'] ) ) {
        $r_namex = preg_replace( $pat_space, $rep_space, trim( $r['namex'] ) );
        $sanitized_name = sanitize_title( $r_namex );
    }
    
    
    // ID Attribute
    if ( ! empty( $r['idx'] ) ) {
        $r_idx = preg_replace( $pat_space, $rep_space, trim( $r['idx'] ) );
        $sanitized_idx = sanitize_title( $r_idx );
        
        // Default
        $id_attrx = ' '.'id="'.$sanitized_idx.'"';
        
        // Auto
        if ( 'AUTO' == $r_idx ) {
            $id_attrx = ' '.'id="'.$sanitized_name.'"';
        }
    }
    
    
    // Structure Elem
    if ( ! empty( $r['structurex']['elem'] ) ) {
        $r_structurex_elem = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['elem'] ) );
    }
    
    // Structure Role
    if ( ! empty( $r['structurex']['attr']['role'] ) ) {
        $r_structurex_attr_role = preg_replace( $pat_space, $rep_space, trim( $r['structurex']['attr']['role'] ) );
        $sanitized_role = sanitize_title( $r_structurex_attr_role );
        
        // Default
        $role_attrx = ' '.'role="'.$sanitized_role.'"';
    }
    
    // Structure Subtype
    if ( ! empty( $r['structurex']['subtype'] ) ) {
        $r_structurex_subtype = preg_replace( $pat_space, $rep_space, trim( $r['structurex']['subtype'] ) );
    }
    
    // Structure Type
    if ( ! empty( $r['structurex']['type'] ) ) {
        $r_structurex_type = preg_replace( $pat_space, $rep_space, trim( $r['structurex']['type'] ) );
        
        // Constructor
        if ( in_array( $r_structurex_type, $structurex_type_constructor_term_variations, true ) ) {
            $structure_type = 'Constructor';
            $structure_type_abbr = 'CN';
            
            // Header Element
            if ( in_array( $r_structurex_elem, $structurex_elem_header_term_variations, true ) ) {
                $root_tagx = 'header';
            }
            
            // Header Element
            if ( in_array( $r_structurex_elem, $structurex_elem_footer_term_variations, true ) ) {
                $root_tagx = 'footer';
            }
            
            // Aside Element
            if ( in_array( $r_structurex_elem, $structurex_elem_aside_term_variations, true ) ) {
                $root_tagx = 'aside';
                $role_attrx = ' '.'role="complementary"';
            }
        
            $structure_name = $r_namex.' '.$structure_type_abbr;
            $sanitized_structure_type = sanitize_title( $structure_type_abbr );
            
            $structure_type_css = $sanitized_structure_type;
            $cssx = ' '.$sanitized_name.'-'.$sanitized_structure_type;
            
        } elseif ( in_array( $r_structurex_type, $structurex_type_object_term_variations, true ) ) {
            $structure_type = 'Object';
            $structure_type_abbr = 'OBJ';
            
            // Layout
            if ( ! empty( $r['structurex']['layout'] ) ) {
                $r_structurex_layout = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['layout'] ) );
                
                // Inline Layout
                if ( in_array( $r_structurex_layout, $structurex_layout_inline_term_variations, true ) ) {
                    $layout_tag = 'span';
                }
                
                $root_tagx = $layout_tag;
                $branch_tag = $layout_tag;
                $label_tag = $layout_tag;
            }

            // Href Attribute
            if ( ! empty( $r['structurex']['attr']['href'] ) ) {
                $r_structurex_attr_href = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['attr']['href'] ) );
                $escaped_url = esc_url( $r_structurex_attr_href );

                // Default
                $href_attr = ' '.'href="'.$r_structurex_attr_href.'"';

                // Auto
                if ( 'AUTO' == $r_structurex_attr_href ) {
                    $href_attr = ' '.'href="#"';
                }
            }

            // Target Attribute
            if ( ! empty( $r['structurex']['attr']['target'] ) ) {
                $r_structurex_attr_target = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['attr']['target'] ) );

                // Default
                $target_attr = ' '.'target="'.$r_structurex_attr_target.'"';
            }
            
            // Linked Attribute
            if ( ! empty( $r['structurex']['attr']['linked'] ) ) {
                $r_structurex_attr_linked = $r['structurex']['attr']['linked'];
            }
            
            // Subtype: Generic Label
            if ( in_array( $r_structurex_subtype, $structurex_subtype_glabel_term_variations, true ) ) {
                $structure_subtype = 'Generic Label';
                $structure_subtype_abbr = 'glabel';
                $branch_css = 'g';
            
            // Subtype: Link
            } elseif ( in_array( $r_structurex_subtype, $structurex_subtype_link_term_variations, true ) ) {
                $structure_subtype = 'Link';
                $structure_subtype_abbr = 'link';
            
            // Subtype: Heading
            } elseif ( in_array( $r_structurex_subtype, $structurex_subtype_heading_term_variations, true ) ) {
                $structure_subtype = 'Heading';
                $structure_subtype_abbr = 'heading';
                $branch_css = 'h';
            }
            
            // Element: Generic
            if ( in_array( $r_structurex_elem, $structurex_obj_elem_generic_term_variations, true ) ) {
                $branch_css = 'g';
            
            // Element: Anchor Element
            } elseif ( in_array( $r_structurex_elem, $structurex_obj_elem_anchor_term_variations, true ) ) {
                $branch_tag = 'a';
                $branch_css = $branch_tag;
            
            // Element: Heading Element
            } elseif ( in_array( $r_structurex_elem, $structurex_obj_elem_heading_term_variations, true ) ) {
                $branch_tag = $hlevel_tag;
                $branch_css = 'h';

                // Heading Level Attribute
                if ( ! empty( $r['structurex']['attr']['hlevel'] ) ) {
                    $r_structurex_attr_hlevel = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['attr']['hlevel'] ) );
                    $sanitized_hlevel = sanitize_title( $r_structurex_attr_hlevel );
                    $hlevel_tag = $sanitized_hlevel;

                    if ( in_array( $r_structurex_attr_hlevel, $structurex_obj_elem_heading_level_attr_term_variations, true ) ) {
                        $layout_tag = 'div';

                        $root_tagx = $layout_tag;
                        $branch_tag = $hlevel_tag;
                    }
                }
            }
        
            $structure_name = $r_namex.' '.$structure_subtype.' '.$structure_type_abbr;
            $sanitized_structure_type = sanitize_title( $structure_type_abbr );
            $sanitized_structure_subtype = sanitize_title( $structure_subtype_abbr );
            
            $structure_type_css = $sanitized_structure_type;
            $structure_subtype_css = ' '.$sanitized_structure_subtype;
            $cssx = ' '.$sanitized_name.'-'.$sanitized_structure_subtype.'-'.$sanitized_structure_type;
        }
    }
    
    // Structure Title
    if ( ! empty( $r['structurex']['attr']['title'] ) ) {
        $r_structurex_attr_title = preg_replace( $pat_space, $rep_space, trim( $r['structurex']['attr']['title'] ) );
        
        // Default
        $title_attr = ' '.'title="'.$r_structurex_attr_title.'"';
        
        // Auto
        if ( 'AUTO' == $r_structurex_attr_title ) {
            $title_attr = ' '.'title="'.$structure_name.'"';
        }
    }
    
    
    
    //------------------------------------------------
    
    
    
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
        
            if ( ! empty( $r['layout'] ) ) {
                $r_layout = $r['layout'];
                $layout = preg_replace( $pat_space, $rep_space, trim( $r_layout ) );

                if ( in_array( $layout, $layout_inline_term_variations, true ) ) {
                    $root_tag = 'span';
                    $obj_elem_tag = 'span';
                } else {
                    $root_tag = 'div';
                    $obj_elem_tag = 'div';
                }
            } else {
                $layout = '';
                $root_tag = 'div';
                $obj_elem_tag = 'div';
            }
            
        } else {
            $structure_name = '';
            $structure_css = '';
            $root_tag = '';
            $obj_elem_tag = '';
        }
    } else {
        $structure = '';
    }
    
    if ( ! in_array( $structure, $structure_object_term_variations, true ) ) {
        
        if ( ! empty( $r['elem'] ) ) {
            $r_elem = $r['elem'];
            $elem = preg_replace( $pat_no_space, $rep_no_space, trim( $r_elem ) );

            if ( in_array( $elem, $elem_header_term_variations, true ) ) {
                $root_tag = 'header';
                $h_elem_tag = 'h2';
            } elseif ( in_array( $elem, $elem_aside_term_variations, true ) ) {
                $root_tag = 'aside';
                $h_elem_tag = 'h2';
            } else {
                $root_tag = 'div';
            }
        } else {
            $root_tag = 'div';
        }
    
    } else {
        
        if ( ! empty( $r['obj_elem'] ) ) {
            $r_obj_elem = $r['obj_elem'];
            $obj_elem = preg_replace( $pat_no_space, $rep_no_space, trim( $r_obj_elem ) );
            
            if ( in_array( $obj_elem, $obj_elem_anchor_term_variations, true ) ) {
                $obj_elem_tag = 'a';
            } else {
                $obj_elem_tag = 'div';
            }
        } else {
            $obj_elem = '';
        }
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
    
    if ( ! empty( $r['root_css'] ) ) {
        $r_root_css = $r['root_css'];
        $root_css = ' '.preg_replace( $pat_space, $rep_space, trim( $r_root_css ) );
    } else {
        $root_css = '';
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
    
        $obj_mu = '';
        $obj_mu .= '<'.$obj_elem_tag.'>';
        $obj_mu .= $content;
        $obj_mu .= '</'.$obj_elem_tag.'>';
        
        $structure_content = $obj_mu;
    
    } else {
        $structure_content = $content;
    }
    
    
    //------------ New Version
    if ( '0.1' == $version ) {
        
        // Initialize
        $output = '';
        
        $output .= '<'.$root_tagx.$id_attrx.' class="'.$structure_type_css.$structure_subtype_css.$cssx.$root_css.'" '.$role_attrx.$title_attr.' data-name="'.$structure_name.'">';
        
        if ( ! in_array( $r_structurex_type, $structurex_type_object_term_variations, true ) ) {
            
            $output .= '<'.$branch_tag.' class="cr'.$cssx.'---cr" '.$href_attr.'>';
            $output .= $content;
            $output .= '</'.$branch_tag.'>';
        
        } else {
            
            // Anchor Markup
            $a_mu = '';
            $a_mu .= '<a class="a'.$cssx.'---a" '.$href_attr.$target_attr.'>';
            $a_mu .= '<span class="a_l'.$cssx.'---a_l">';
            $a_mu .= $content;
            $a_mu .= '</span>';
            $a_mu .= '</a>';
            
            if ( !in_array( $r_structurex_subtype, $structurex_subtype_link_term_variations, true ) ) {
                $output .= '<'.$branch_tag.' class="'.$branch_css.$cssx.'---'.$branch_css.'">';
            }
            
            if ( true == $r_structurex_attr_linked || in_array( $r_structurex_subtype, $structurex_subtype_link_term_variations, true ) ) {
                $output .= $a_mu;
            } else {
                $output .= '<'.$label_tag.' class="'.$branch_css.'_l'.$cssx.'---'.$branch_css.'_l">';
                $output .= $content;
                $output .= '</'.$label_tag.'>';
            }
            
            if ( !in_array( $r_structurex_subtype, $structurex_subtype_link_term_variations, true ) ) {
                $output .= '</'.$branch_tag.'>';
            }
        }
        
        $output .= '</'.$root_tagx.'><!-- '.$structure_name.' -->';
    
    //------------ Original Version    
    } else {
        
        // Initialize
        $output = '';
        
        $output .= '<'.$root_tag.$id_attr.' class="'.$structure_css.$css.$root_css.'" '.$role_attr.' data-name="'.$structure_name.'">';
        
        if ( ! in_array( $structure, $structure_object_term_variations, true ) ) {
            $output .= '<div class="cr'.$css.'---cr">';
        }
        
        $output .= $structure_content;
        
        if ( ! in_array( $structure, $structure_object_term_variations, true ) ) {
            
            if ( ! empty( $r['fr_content'] ) ) {
                $output .= $fr_mu;
            }
            
            $output .= '</div>';
        }
        
        $output .= '</'.$root_tag.'><!-- '.$structure_name.' -->';
    
    }
    
    $html = apply_filters( 'htmlok', $output, $args );
    
    if ( $echo ) {
        echo $html;
    } else {
        return $html;
    }
    
}
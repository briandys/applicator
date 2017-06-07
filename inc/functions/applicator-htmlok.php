<?php // Applicator HTML_OK (Overkill) Constructor-Component Structure

function htmlok( $args = array() ) {
    
    //------------ Requirements
    
    // Require Array
	if ( empty( $args ) ) {
		return esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['applicator_td'] );
	}
    
    // Require Name
	if ( empty( $args['namex'] ) ) {
        esc_html_e( 'Name is required.', $GLOBALS['applicator_td'] );
	}
    
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
        'hr_content'    => '', // Header Content
        'fr_content'    => '', // Footer Content
        
        'version'       => '', // Version: to be able to supply new code in the same function
        'echo'          => false, // Echo: defaults to return
        'structurex'    => array(
            'type'      => '', // Constructor[Web Product, Web Product Start, Main Header, Main Content, Main Footer, Web Product End, Aside] | Module | Component[Generic, Navigation, Actions, Controls] | Object[Information, Label, Note, Form Label, Navigation Item, Action Item, Control Item]
            'subtype'       => '', // For Objects with specific subtypes like Heading | Navigation Item | Action Item | Generic | Anchor
            'elem'          => '', //
            'h_elem'        => '',
            'layout'        => '', // For Objects
            'hr_structure'  => false, //
        ),
        'attr'          => array(
            'id'        => '',
            'title'     => '',
            'datetime'  => '',
            'href'      => '',
            'h_level'    => '', // h1 | h2 | h3 | h4 | h5 | h6
            'linked'    => false,
        ),
        'obj_content'   => '',
        
        /*
        'obj_content'   => array(
            array(
                'txt'   => '',
                'css'   => '',
                'sep'   => '',
                'line'  => array(
                    array(
                        array(
                            'txt'   => '',
                            'css'   => '',
                            'sep'   => '',
                        ),
                        'css'   => '',
                    ),
                ),
            ),
        ),
        
        */
    );
    
    //------------ WordPress Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    
    //------------ Regex Pattern and Replacement
    // Convert multiple spaces to single space
    $pat_space = '/\s\s+/';
    $rep_space = ' ';
    $pat_no_space = '/\s+/';
    $rep_no_space = '';
    
    $substr_start = 0;
    $substr_end = 64;
    
    
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
    $structurex_type_component_term_variations = array( 'Component', 'component', 'cp', );
    $structurex_type_object_term_variations = array( 'Object', 'object', 'obj', );
    
    $structurex_layout_block_term_variations = array( 'Block', 'block', 'div', );
    $structurex_layout_inline_term_variations = array( 'Inline', 'inline', 'span', );
    
    $structurex_elem_header_term_variations = array( 'Header', 'header', 'hr', );
    $structurex_elem_footer_term_variations = array( 'Footer', 'footer', 'fr', );
    $structurex_elem_aside_term_variations = array( 'Aside', 'aside', 'as', );
    
    $structurex_subtype_glabel_term_variations = array( 'Generic Label', 'generic label', 'glabel', 'gl', );
    $structurex_subtype_link_term_variations = array( 'Link', 'link', );
    $structurex_subtype_heading_term_variations = array( 'Heading', 'heading', 'h', );
    $structurex_subtype_wpg_term_variations = array( 'WordPress Generated Content', 'wordpress generated content', 'wpg', );
    
    $structurex_obj_elem_generic_term_variations = array( 'Generic', 'generic', 'g', );
    $structurex_obj_elem_anchor_term_variations = array( 'Anchor', 'anchor', 'a', );
    $structurex_obj_elem_heading_term_variations = array( 'Heading', 'heading', 'h', );
    
    $heading_level_term_variations = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', );
    
    
    
    // Require Content
	if ( empty( $args['content'] ) && ! in_array( $args['structurex']['type'], $structurex_type_object_term_variations, true ) ) {
        esc_html_e( 'Content is required.', $GLOBALS['applicator_td'] );
	}
    
    
    
    //------------ Initialized Variables
    $name = '';
    
    
    $r_namex = '';
    $r_structurex_type = '';
    $r_structurex_elem = '';
    $r_structurex_layout = '';
    $r_structurex_attr_href = '';
    $r_structurex_subtype = '';
    $r_hr_structure = '';
    $hr_structure = '';
    $sanitized_name = '';
    $structure_type = '';
    $structure_subtype = '';
    $structure_type_css = '';
    $structure_subtype_css = '';
    $structure_subtype_abbr = '';
    $cssx = '';
    $id_attrx = '';
    $sanitized_idx = '';
    $idx = '';
    $role_attrx = '';
    $title_attr = '';
    $sanitized_structure_type = '';
    $sanitized_structure_subtype = '';
    $structure_type_css = '';
    $structure_subtype_css = '';
    $r_structurex_attr_linked = '';
    $h_level_tag = '';
    $hr_content_val = '';
    $content_val = '';
    $contentx_val = '';
    $fr_content_val = '';
    $obj_content_val = '';
    $structurex_attr_linked = '';
    
    $layout_tag = 'div';
    $root_tagx = $layout_tag;
    $branch_tag = $layout_tag;
    
    $structure_name = '';
    $structure_css = '';
    $href_attr = '';
    $escaped_url = '';
    $href_attr = '';
    $target_attr = '';
    
    $structure_type = '';
    $structure_type_abbr = '';
    $branch_css = 'x';
    $h_level_tag = 'h2';
    
    $elem_label_tag = 'span';
    $h_elem_tag = 'div';
    $namex = '';
    $root_css = '';
    $css_val = '';
    $name_css = '';
    
    $obj_content_txt = '';
    $sanitized_obj_content_txt = '';
    
    $txt = '';
    $txt_css = '';
    $obj_content_css = '';
    
    //------------ Trimmed Array Entries
    
    if ( ! empty( $r['name'] ) ) {
        $r_name = $r['name'];
        $name = preg_replace( $pat_space, $rep_space, trim( $r_name ) );
        $sanitized_name = sanitize_title( $name );
    }
    
    
    
    //------------------------------------------------------------------------------------------------
    
    
    // Name
    if ( ! empty( $r['namex'] ) ) {
        $r_namex = preg_replace( $pat_space, $rep_space, trim( $r['namex'] ) );
        $namex = $r_namex;
        $sanitized_name = substr( sanitize_title( $r_namex ), $substr_start, $substr_end );
    }
    
    
    // ID Attribute
    if ( ! empty( $r['idx'] ) ) {
        $r_idx = preg_replace( $pat_space, $rep_space, trim( $r['idx'] ) );
        $idx = $r_idx;
        $sanitized_idx = substr( sanitize_title( $idx ), $substr_start, $substr_end );
        
        // Default
        $id_attrx = ' '.'id="'.$sanitized_idx.'"';
        
        // Auto
        if ( 'AUTO' == $idx ) {
            $id_attrx = ' '.'id="'.$sanitized_name.'"';
        }
    }
    
    // Root CSS or Custom CSS placed at the root
    if ( ! empty( $r['root_css'] ) ) {
        $r_root_css = $r['root_css'];
    
        $root_css = '';
        foreach ( (array) $r_root_css as $val ) {
            $root_css .= ' '.preg_replace( $pat_space, $rep_space, trim( $val ) );
        }
    }
    
    // CSS or Custom CSS that will apply to all elements | If blank, use Sanitized Name
    if ( ! empty( $r['css'] ) ) {
        $r_css = $r['css'];
        $css = $r_css;
    
        $css_val = '';
        foreach ( (array) $css as $val ) {
            $css_val .= preg_replace( $pat_space, $rep_space, trim( $val ) );
        }
    }
    
    
    // Structure Elem
    if ( ! empty( $r['structurex']['elem'] ) ) {
        $r_structurex_elem = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['elem'] ) );
    }
    
    // Structure Role
    if ( ! empty( $r['structurex']['attr']['role'] ) ) {
        $r_structurex_attr_role = preg_replace( $pat_space, $rep_space, trim( $r['structurex']['attr']['role'] ) );
        $sanitized_structurex_attr_role = substr( sanitize_title( $r_structurex_attr_role ), $substr_start, $substr_end );
        
        // Default
        $role_attrx = ' '.'role="'.$sanitized_structurex_attr_role.'"';
    }
    
    // Structure Subtype
    if ( ! empty( $r['structurex']['subtype'] ) ) {
        $r_structurex_subtype = preg_replace( $pat_space, $rep_space, trim( $r['structurex']['subtype'] ) );
    }
    
    
    // Heading Element
    if ( ! empty( $r['structurex']['h_elem'] ) ) {
        $r_structurex_h_elem = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['h_elem'] ) );
        $sanitized_structurex_h_elem = substr( sanitize_title( $r_structurex_h_elem ), $substr_start, $substr_end );
        
        if ( in_array( $r_structurex_h_elem, $heading_level_term_variations, true ) ) {
            $h_elem_tag = $sanitized_structurex_h_elem;
        }
    }
    
    
    // Header Structure
    if ( ! empty( $r['structurex']['hr_structure'] ) ) {
        $r_structurex_hr_structure = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['hr_structure'] ) );
        $hr_structure = $r_structurex_hr_structure;
    }
    
    // Structure Type
    if ( ! empty( $r['structurex']['type'] ) ) {
        $r_structurex_type = preg_replace( $pat_space, $rep_space, trim( $r['structurex']['type'] ) );
        
        //------------ Constructor
        if ( in_array( $r_structurex_type, $structurex_type_constructor_term_variations, true ) ) {
            $structure_type = 'Constructor';
            $structure_type_abbr = 'CN';
            
            // Header Element
            if ( in_array( $r_structurex_elem, $structurex_elem_header_term_variations, true ) ) {
                $root_tagx = 'header';
            }
            
            // Footer Element
            if ( in_array( $r_structurex_elem, $structurex_elem_footer_term_variations, true ) ) {
                $root_tagx = 'footer';
            }
            
            // Aside Element
            if ( in_array( $r_structurex_elem, $structurex_elem_aside_term_variations, true ) ) {
                $root_tagx = 'aside';
                $role_attrx = ' '.'role="complementary"';
            }
        
            $structure_name = $namex.' '.$structure_type_abbr;
            $sanitized_structure_type = substr( sanitize_title( $structure_type_abbr ), $substr_start, $substr_end );
            
            $structure_type_css = $sanitized_structure_type;
            
            $name_css = ' '.$sanitized_name;
            
            if ( ! empty( $css ) ) {
                $cssx = ' '.$css_val.'-'.$structure_type_css;
            } else {
                $cssx = ' '.$sanitized_name.'-'.$structure_type_css;
            }
        
        //------------ Component
        } elseif ( in_array( $r_structurex_type, $structurex_type_component_term_variations, true ) ) {
            $structure_type = 'Component';
            $structure_type_abbr = 'CP';
            
            // Header Element
            if ( in_array( $r_structurex_elem, $structurex_elem_header_term_variations, true ) ) {
                $root_tagx = 'header';
            }
            
            // Footer Element
            if ( in_array( $r_structurex_elem, $structurex_elem_footer_term_variations, true ) ) {
                $root_tagx = 'footer';
            }
            
            // Aside Element
            if ( in_array( $r_structurex_elem, $structurex_elem_aside_term_variations, true ) ) {
                $root_tagx = 'aside';
                $role_attrx = ' '.'role="complementary"';
            }
        
            $structure_name = $namex.' '.$structure_type_abbr;
            $sanitized_structure_type = substr( sanitize_title( $structure_type_abbr ), $substr_start, $substr_end );
            
            $structure_type_css = $sanitized_structure_type;
            
            $name_css = ' '.$sanitized_name;
            
            if ( ! empty( $css ) ) {
                $cssx = ' '.$css_val.'-'.$structure_type_css;
            } else {
                $cssx = ' '.$sanitized_name.'-'.$structure_type_css;
            }
            
        //------------ Object
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
                $elem_label_tag = $layout_tag;
            }

            // Href Attribute
            if ( ! empty( $r['structurex']['attr']['href'] ) ) {
                $r_structurex_attr_href = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['attr']['href'] ) );
                $escaped_url = esc_url( $r_structurex_attr_href );

                $href_attr = ' '.'href="'.$r_structurex_attr_href.'"';
            }

            // Target Attribute
            if ( ! empty( $r['structurex']['attr']['target'] ) ) {
                $r_structurex_attr_target = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['attr']['target'] ) );

                // Default
                $target_attr = ' '.'target="'.$r_structurex_attr_target.'"';
            }
            
            // Linked Attribute
            if ( ! empty( $r['structurex']['attr']['linked'] ) ) {
                $r_structurex_attr_linked = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['attr']['linked'] ) );
                $structurex_attr_linked = $r_structurex_attr_linked;
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
            
            // Subtype: WordPress Generated Content
            } elseif ( in_array( $r_structurex_subtype, $structurex_subtype_wpg_term_variations, true ) ) {
                $structure_subtype = 'WPG';
                $structure_subtype_abbr = 'wpg';
                $branch_css = 'wpg';
            
            } else {
                $structure_subtype = 'Generic';
                $structure_subtype_abbr = 'generic';
                $branch_css = 'g';
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
                $branch_tag = $h_level_tag;
                $branch_css = 'h';

                // Heading Level Attribute
                if ( ! empty( $r['structurex']['attr']['h_level'] ) ) {
                    $r_structurex_attr_h_level = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structurex']['attr']['h_level'] ) );
                    $sanitized_h_level = substr( sanitize_title( $r_structurex_attr_h_level ), $substr_start, $substr_end );
                    $h_level_tag = $sanitized_h_level;

                    if ( in_array( $r_structurex_attr_h_level, $heading_level_term_variations, true ) ) {
                        $layout_tag = 'div';

                        $root_tagx = $layout_tag;
                        $branch_tag = $h_level_tag;
                    }
                }
            }
        
            $structure_name = $namex.' '.$structure_subtype.' '.$structure_type_abbr;
            $sanitized_structure_type = substr( sanitize_title( $structure_type_abbr ), $substr_start, $substr_end );
            $sanitized_structure_subtype = substr( sanitize_title( $structure_subtype_abbr ), $substr_start, $substr_end );
            
            $structure_type_css = $sanitized_structure_type;
            $structure_subtype_css = ' '.$sanitized_structure_subtype;
            
            $name_css = ' '.$sanitized_name;
            
            if ( ! empty( $css ) ) {
                $cssx = ' '.$css_val.'-'.$structure_type_css;
            } else {
                $cssx = ' '.$sanitized_name.'-'.$sanitized_structure_subtype.'-'.$sanitized_structure_type;
            }
            
            
        }
            
        // Variable Definitions
        if ( empty( $namex ) ) {
            $namex = $structure_type;
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
    
    
    // Header
    if ( $r['hr_content'] ) {
        $r_hr_content = $r['hr_content'];
        $hr_content = $r_hr_content;
        
        $hr_content_val = '';
        foreach ( ( array ) $hr_content as $val ) {
            $hr_content_val .= preg_replace( $pat_space, $rep_space, trim( $val ) );
        }
    }
    
    // Content
    if ( ! empty( $r['content'] ) ) {
        $r_content = $r['content'];
        $content = $r_content;
        
        $content_val = '';
        foreach ( ( array ) $content as $val ) {
            $content_val .= preg_replace( $pat_space, $rep_space, trim( $val ) );
        }
    }
    
    // Footer Content
    if ( ! empty( $r['fr_content'] ) ) {
        $r_fr_content = $r['fr_content'];
        $fr_content = $r_fr_content;
        
        $fr_content_val = '';
        foreach ( ( array ) $fr_content as $val ) {
            $fr_content_val .= preg_replace( $pat_space, $rep_space, trim( $val ) );
        }
    }
    
    // Object Content
    if ( ! empty( $r['obj_content'] ) ) {
        $r_obj_content = $r['obj_content'];
        $obj_content = $r_obj_content;
        
        $obj_content_val = '';
        foreach ( ( array ) $obj_content as $val ) {
                
            $txt = '';
            $txt_auto_css = '';
            $txt_css = '';
            $txt_sep = '';
            
            // Array Input: Text Content
            if ( ! empty( $val['txt'] ) ) {
                $r_obj_content_txt = preg_replace( $pat_space, $rep_space, trim( $val['txt'] ) );
                $obj_content_txt = $r_obj_content_txt;
                $sanitized_txt = substr( sanitize_title( $obj_content_txt ), $substr_start, $substr_end );
                
                $txt = $obj_content_txt;
                $txt_auto_css = ' '.$sanitized_txt.'---txt';
                
                // If Text Content is numeric
                if ( is_numeric( $obj_content_txt[0] ) ) {
                    $txt_auto_css = ' '.'num'.' '.'n-'.$sanitized_txt.'---txt';
                }
                
                // Array Input: CSS
                if ( ! empty( $val['css'] ) ) {
                    $r_obj_content_css = preg_replace( $pat_space, $rep_space, trim( $val['css'] ) );
                    $obj_content_css = $r_obj_content_css;
                    $txt_css = ' '.$obj_content_css.'---txt';
                }
                
                // Array Input: Separator
                if ( ! empty( $val['sep'] ) ) {
                    $r_obj_content_sep = preg_replace( $pat_space, $rep_space, $val['sep'] );
                    $obj_content_sep = $r_obj_content_sep;
                    $txt_sep = $obj_content_sep;
                }
                
                $obj_content_val .= $txt_sep.'<span class="txt'.$txt_css.$txt_auto_css.'">'.$txt.'</span>';
                
                if ( ! empty( $val['line'] ) ) {
                    
                    $r_obj_content_line = $val['line'];
                    $obj_content_line = $r_obj_content_line;
                    
                    foreach ( (array) $val['line'] as $line_val ) {
                        
                        $line_val_css = '';
                        $line_val_auto_css = '';
                        
                        if ( ! empty( $line_val[0]['txt'] ) ) {
                            $r_line_val_txt = preg_replace( $pat_space, $rep_space, trim( $line_val[0]['txt'] ) );
                            $line_val_txt = $r_line_val_txt;
                            $sanitized_line_val_txt = substr( sanitize_title( $line_val_txt ), $substr_start, $substr_end );
                            
                            $line_val_auto_css = ' ' . $sanitized_line_val_txt.'---line';
                            
                            if ( is_numeric( $line_val_txt[0] ) ) {
                                $line_val_auto_css = ' '.'n-'.$sanitized_line_val_txt.'---line';
                            }
                            
                            if ( ! empty( $line_val['css'] ) ) {
                                $r_line_val_css = preg_replace( $pat_space, $rep_space, trim( $line_val['css'] ) );
                                $line_val_css = ' '.$r_line_val_css;
                            }
                        }

                        $obj_content_val .= '<span class="line'.$line_val_css.$line_val_auto_css.'">';
                        
                        foreach ( (array) $line_val as $line_txt_val ) {
                        
                            $txt = '';
                            $txt_auto_css = '';
                            $txt_css = '';
                            $txt_sep = '';

                            // Array Input: Text Content
                            if ( ! empty( $line_txt_val['txt'] ) ) {
                                $r_obj_content_line_txt = preg_replace( $pat_space, $rep_space, trim( $line_txt_val['txt'] ) );
                                $obj_content_line_txt = $r_obj_content_line_txt;
                                $sanitized_line_txt = substr( sanitize_title( $obj_content_line_txt ), $substr_start, $substr_end );

                                $txt = $obj_content_line_txt;
                                $txt_auto_css = ' '.$sanitized_line_txt.'---txt';

                                // If Text Content is numeric
                                if ( is_numeric( $obj_content_line_txt[0] ) ) {
                                    $txt_auto_css = ' '.'num'.' '.'n-'.$sanitized_line_txt.'---txt';
                                }

                                // Array Input: CSS
                                if ( ! empty( $line_txt_val['css'] ) ) {
                                    $r_obj_content_line_css = preg_replace( $pat_space, $rep_space, trim( $line_txt_val['css'] ) );
                                    $obj_content_line_css = $r_obj_content_line_css;
                                    $txt_css = ' '.$obj_content_line_css;
                                }

                                // Array Input: Separator
                                if ( ! empty( $line_txt_val['sep'] ) ) {
                                    $r_obj_content_line_sep = preg_replace( $pat_space, $rep_space, $line_txt_val['sep'] );
                                    $obj_content_line_sep = $r_obj_content_line_sep;
                                    $txt_sep = $obj_content_line_sep;
                                }

                                $obj_content_val .= $txt_sep.'<span class="txt'.$txt_auto_css.$txt_css.'">'.$txt.'</span>';

                            }
                            
                        }
                        
                        $obj_content_val .= '</span>';
                        
                    }
                }
            
            // Usually used with Subtype: WordPress Generated Content
            } else {
                
                $obj_content_val .= $val;
            
            }
        }
    }
    
    //------------------------------------------------------------------------------------------------
    
    
    
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
    
    
    
    
    
    if ( ! empty( $r['version'] ) ) {
        $r_version = $r['version'];
        $version = preg_replace( $pat_space, $rep_space, trim( $r_version ) );
    } else {
        $version = '';
    }
    
    $r_echo = $r['echo'];
    $echo = preg_replace( $pat_space, $rep_space, trim( $r_echo ) );
    
    
    // Container Markup Structure
    $cr_mu    = '';
    $cr_mu_start    = '';
    $cr_mu_end      = '';
    
    $cr_mu_start   .= '<div class="%1$s'.$cssx.'---%1$s">';
    $cr_mu_start   .= '<div class="%1$s_cr'.$cssx.'---%1$s_cr">';
    
    $cr_mu_end      = '</div>';
    $cr_mu_end     .= '</div>';
        
    
    // Header Markup
    $hr_mu = '';
    $hr_mu .= sprintf( $cr_mu_start,
        'hr'
    );
    $hr_mu .= '<'.$h_elem_tag.' class="h'.$cssx.'---h"><span class="h_l'.$cssx.'---h_l">'.$namex.'</span></'.$h_elem_tag.'>';
    $hr_mu .= $hr_content_val;
    $hr_mu .= $cr_mu_end;

    // Content Markup
    $ct_mu = '';
    $ct_mu .= sprintf( $cr_mu_start,
        'ct'
    );
    $ct_mu .= $content_val;
    $ct_mu .= $cr_mu_end;

    // Footer Markup
    $fr_mu = '';
    $fr_mu .= sprintf( $cr_mu_start,
        'fr'
    );
    $fr_mu .= $fr_content_val;
    $fr_mu .= $cr_mu_end;
    
    
    
    
    //------------ New Version
    if ( '0.1' == $version ) {
        
        // Initialize
        $output = '';
        
        $output .= '<'.$root_tagx.$id_attrx.' class="'.$structure_type_css.$structure_subtype_css.$name_css.$cssx.$root_css.'" '.$role_attrx.$title_attr.' data-name="'.$structure_name.'">';
        
        
        //------------ All Structure Types (except Object)
        if ( ! in_array( $r_structurex_type, $structurex_type_object_term_variations, true ) ) {
            
            $output .= '<'.$branch_tag.' class="cr'.$cssx.'---cr" '.$href_attr.'>';
            
            // Header Content
            if ( $hr_structure || ! empty( $hr_content ) || ! empty( $r_structurex_h_elem ) ) {
                $output .= $hr_mu;
            }
            
            // Main Content
            if ( ! empty( $content ) ) {
                $output .= $ct_mu;
            }
            
            // Footer Content
            if ( ! empty( $fr_content ) ) {
                $output .= $fr_mu;
            }
            
            $output .= '</'.$branch_tag.'>';
        
        
        //------------ Object Structure Type
        } else {
            
            if ( ! in_array( $r_structurex_subtype, $structurex_subtype_wpg_term_variations, true ) ) {
            
                // Anchor Markup
                $a_mu = '';
                $a_mu .= '<a class="a'.$cssx.'---a" '.$href_attr.$target_attr.'>';
                $a_mu .= '<span class="a_l'.$cssx.'---a_l">';
                $a_mu .= $obj_content_val;
                $a_mu .= '</span>';
                $a_mu .= '</a>';

                if ( ! in_array( $r_structurex_subtype, $structurex_subtype_link_term_variations, true ) ) {
                    $output .= '<'.$branch_tag.' class="'.$branch_css.$cssx.'---'.$branch_css.'">';
                }

                if ( $structurex_attr_linked || in_array( $r_structurex_subtype, $structurex_subtype_link_term_variations, true ) ) {
                    $output .= $a_mu;
                } else {
                    $output .= '<'.$elem_label_tag.' class="'.$branch_css.'_l'.$cssx.'---'.$branch_css.'_l">';

                    // Text Content
                    if ( ! empty( $obj_content ) ) {
                        $output .= $obj_content_val;
                    }

                    $output .= '</'.$elem_label_tag.'>';
                }

                if ( !in_array( $r_structurex_subtype, $structurex_subtype_link_term_variations, true ) ) {
                    $output .= '</'.$branch_tag.'>';
                }
            } else {
                $output .= $obj_content_val;
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
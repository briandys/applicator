<?php // Applicator HTML_OK (Overkill) Constructor-Component-Object Structure

function htmlok( $args = array() ) {
    
    //------------ Requirements
    
    // Require Array
	if ( empty( $args ) ) {
		esc_html_e( 'Please define default parameters in the form of an array.', $GLOBALS['applicator_td'] );
	}
    
    // Require Name
	if ( empty( $args['name'] ) ) {
        esc_html_e( 'Name is required.', $GLOBALS['applicator_td'] );
	}
    
    //------------ Defaults
    
    $defaults = array(
        'name'          => '', // Name: Used in data-name="" and generating the parent-level CSS class name
        'root_css'      => '', // There's a generated parent css based on the 'name' and one can also add a custom
        'css'           => '', // This is a custom CSS that will apply to all structure elements
        'id'            => '', // Parent ID Attribute
        'mod'           => '', // Modifications: Special adjustments based on WordPress Generated Content
        'content'       => '', // Content
        /*
        'content'       => array(
            'Content 1',
            'Content 2',
            array(
                'form label'    => '',
                'form element'  => '',
            ),
        ),
        */
        'hr_content'    => '', // Header Content
        'fr_content'    => '', // Footer Content
        'obj_content'   => '',
        /*
        'obj_content'   => array(
            array(
                'txt'           => '',
                'form_label'    => '',
                'css'           => '',
                'sep'           => '',
                'line'          => array(
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
        'structure'    => array(
            'type'      => '', // Constructor[Web Product, Web Product Start, Main Header, Main Content, Main Footer, Web Product End, Aside] | Module | Component[Generic, Navigation, Actions, Controls] | Object[Information, Label, Note, Form Label, Navigation Item, Action Item, Control Item]
            'subtype'       => '', // For Objects with specific subtypes like Heading | Navigation Item | Action Item | Generic | Anchor
            'elem'          => '', //
            'h_elem'        => '',
            'layout'        => '', // For Objects
            'hr_structure'  => false, //
            'linked'        => false,
            'attr'          => array(
                'title'     => '',
                'role'      => '', // Parent Role Attribute - required for main header, main content, main footer, <nav>, <aside>
                'datetime'  => '',
                'href'      => '',
                'h_level'   => '', // h1 | h2 | h3 | h4 | h5 | h6
                
            ),
        ),
        'mod'           => '', // Modification: Markup for special cases
        'version'       => '', // Version: to be able to supply new code in the same function
        'echo'          => false, // Echo: defaults to return
    );
    
    
    //------------ WordPress Parse Arguments
    $r = wp_parse_args( $args, $defaults );
    
    
    //------------ Regex Pattern and Replacement
    // Convert multiple spaces to single space
    $pat_space = '/\s\s+/';
    $rep_space = ' ';
    
    // Remove all spaces; applicable to HTML elements
    $pat_no_space = '/\s+/';
    $rep_no_space = '';
    
    
    //------------ Substring Count
    // Allow up to 64 characters only
    $substr_start = 0;
    $substr_end = 64;
    
    
    //------------ Term Variations
    $structure_constructor_terms = array( 'constructor', 'cn', );
    $structure_component_terms = array( 'component', 'cp', );
    $structure_object_terms = array( 'object', 'obj', );
    
    
    // Constructor Subtypes
    $subtype_main_header_terms = array( 'main header', 'mh', );
    $subtype_main_content_terms = array( 'main content', 'mc', );
    $subtype_main_footer_terms = array( 'main footer', 'mf', );
    $subtype_aside_terms = array( 'aside', 'as', );
    
    
    // Component Subtypes
    $subtype_fieldset_item_terms = array( 'fieldset item', 'fs-item', );
    $subtype_form_terms = array( 'form', 'f', );
    $subtype_nav_terms = array( 'navigation', 'nav', 'n', );
    
    
    // Object Subtypes
    $subtype_form_label_terms = array( 'form label', 'flabel', 'fl', );
    $subtype_form_element_terms = array( 'form element', 'felem', 'fe', );
    $subtype_form_elements_terms = array( 'form elements', 'felems', 'fes', );
    $subtype_heading_terms = array( 'heading', 'h', );
    $subtype_wpg_terms = array( 'wordpress generated content', 'wpg', 'wp', );
    
    // Object Layout
    $layout_block_terms = array( 'block', 'div', 'b', 'd', );
    $layout_inline_terms = array( 'inline', 'span', 'i', 's', );
    
    
    // Heading Levels
    $heading_level_terms = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', );
    
    
    
    
    
    
    
    $structure_subtype_felem_term_variations = array( 'Form Element', 'form element', 'felem', 'fe', );
    
    $mod_main_nav_term_variations = array( 'main navigation', 'main nav', );
    
    
    
    $obj_content_form_elem_input_term_variations = array( 'Input', 'input', 'i', );
    
    
    
    //------------ Initialized Variables
    $r_name = '';
    
    
    $r_name = '';
    $r_structure = '';
    $r_elem = '';
    $r_obj_layout = '';
    $r_href = '';
    
    // X
    $r_subtype = '';
    
    $r_hr_structure = '';
    $clean_name = '';
    $structure_type = '';
    $structure_subtype = '';
    $structure_type_css = '';
    $structure_subtype_css = '';
    $structure_subtype_abbr = '';
    $id_attr = '';
    $clean_id = '';
    $r_id = '';
    $role_attr = '';
    $title_attr = '';
    $clean_structure_type = '';
    $clean_structure_subtype = '';
    $structure_type_css = '';
    $structure_subtype_css = '';
    $r_linked = '';
    $h_level_tag = '';
    $hr_content_val = '';
    $content_val = '';
    $fr_content_val = '';
    $obj_content_val = '';
    $structure_attr_linked = '';
    $structure_elem = '';
    
    $content_valx = '';
    
    $layout_tag = 'div';
    $root_tag = $layout_tag;
    $branch_tag = $layout_tag;
    
    $structure_name = '';
    $heading_name = '';
    $structure_css = '';
    $href_attr = '';
    $for_attr = '';
    
    $href_attr = '';
    $target_attr = '';
    
    $structure_type = '';
    $structure_type_abbr = '';
    $branch_css = 'g';
    $h_level_tag = 'h2';
    
    $elem_label_tag = 'span';
    
    
    $r_root_css = '';
    $css_val = '';
    
    $r_content_obj_txt = '';
    $clean_obj_content_txt = '';
    
    $txt = '';
    $txt_css = '';
    $r_content_obj_css = '';
    
    $mod = '';
    $root_tag_css = '';
    
    $r_version = '';
    $r_echo = '';
    
    $structure_subtype_name = '';
    $structure_subtype_postfix = '';
    $structure_subtype_name_postfix = '';
    $name_css = '';
    
    $p_h_elem = 'div';
    
    $o_obj_elem = '';
    
    
    $structure_object_termsx = array();
    
    
    // X
    // Output
    $o_cssx = '';
    $o_structure_namex = '';
    $o_heading_name = '';
    $o_id_attr = '';
    $o_content = '';
    
    // Root Element by default is div
    // It can be changed depending on the Subtype of Element involved
    // In Object, it can be div or span depending on the Layout
    $p_root_elem = 'div';
    $layout_elemx = 'div';
    $obj_label_elem = $layout_elemx;
    
    $subtype_name = '';
    
    // X
    // Processed
    $p_subtype_namex = '';
    $p_structure_name_abbrx = '';
    $p_structure_cssx = '';
    $p_id_attr = '';
    $p_role_attrx = '';
    $p_method_attrx = '';
    $p_action_attrx = '';
    $p_subtype_cssx = '';
    
    // X
    $p_root_elem_cssx = '';
    $role_attrx = '';
    $p_attrx = '';
    
    $structure_namex = '';
    $structure_name_abbrx = '';
    $p_subtype_postfix_cssx = '';
    
    $string_sepx = '';
    $subtype_name_abbr = '';
    $p_cssx = '';
    $r_css = '';
    
    $o_branch_elemx = '';
    $o_branch_css = '';
    $o_branch_attrx = '';
    
    $p_root_css = '';
    $o_obj_label_elem = '';
    $o_obj_elem_css = '';
    $o_obj_label_elem_css = '';
    
    
    // X
    // Defaults
    $subtype_elemx = 'div';
    
    $obj_elem = 'div';
    
    $obj_attr = '';
    $obj_layout_elem = 'div';
    
    $o_obj_content = '';
    
    $r_contentx_flabel_label_txt = '';
    $contentx_flabel_label_txt_css = '';
    
    $content_component_object_flabel_txt_val = '';

    
    $r_content_component_object = '';
    
    $o_hr_content_val = '';
    $o_fr_content_val = '';
    $o_content_val = '';
    
    
    
    $obj_elem = 'div';
    $obj_elem_css = 'g';
    
    $obj_attr = '';
    $obj_label_elem_css = '';
    
    $p_obj_a_elem_attr = '';
    
    $p_title_attr = '';


        
    
    // Name
    if ( ! empty( $r['name'] ) ) {
        $r_name = preg_replace( $pat_space, $rep_space, trim( $r['name'] ) );
        $clean_name = substr( sanitize_title( $r_name ), $substr_start, $substr_end );
    }
    
    // CSS or Custom CSS that will apply to all elements | If blank, use Sanitized Name
    if ( ! empty( $r['css'] ) ) {
        $r_css = sanitize_title( preg_replace( $pat_space, $rep_space, trim( $r['css'] ) ) );
    }
    
    // Root CSS or Custom CSS placed at the root
    if ( ! empty( $r['root_css'] ) ) {
        $r_root_css = $r['root_css'];
    
        $root_css_val = '';
        foreach ( ( array ) $r_root_css as $val ) {
            $root_css_val .= preg_replace( $pat_space, $rep_space, trim( $val ) );
            $p_root_css_val = ' '.$root_css_val;
        }
        $p_root_css = $p_root_css_val;
    }
    
    // ID Attribute
    if ( ! empty( $r['id'] ) ) {
        $r_id = preg_replace( $pat_space, $rep_space, trim( $r['id'] ) );
        $clean_id = substr( sanitize_title( $r_id ), $substr_start, $substr_end );
        
        // Default
        $p_id_attr =  ' '.'id="'.$clean_id.'"';
        
        // Auto
        if ( 'AUTO' == $r_id ) {
            $p_id_attr = ' '.'id="'.$clean_name.'"';
        }
    }
    
    
    // Title Attribute
    if ( ! empty( $r['title'] ) ) {
        $r_title_attr = preg_replace( $pat_space, $rep_space, trim( $r['title'] ) );
        
        // Default
        $p_title_attr = ' '.'title="'.$r_title_attr.'"';
        
        // Auto
        if ( 'AUTO' == $r_title_attr ) {
            $p_title_attr = ' '.'title="'.$structure_name.'"';
        }
    }
    
    
    // Subtype
    if ( ! empty( $r['structure']['subtype'] ) ) {
        $r_subtype = substr( strtolower( preg_replace( $pat_space, $rep_space, trim( $r['structure']['subtype'] ) ) ), $substr_start, $substr_end );
    }
    
    
    // Header Structure
    if ( ! empty( $r['structure']['hr_structure'] ) ) {
        $r_hr_structure = substr( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['hr_structure'] ) ), $substr_start, $substr_end );
    }
    
    
    // Version
    if ( ! empty( $r['version'] ) ) {
        $r_version = preg_replace( $pat_space, $rep_space, trim( $r['version'] ) );
    }
    
    
    // Echo
    if ( ! empty( $r['echo'] ) ) {
        $r_echo = preg_replace( $pat_space, $rep_space, trim( $r['echo'] ) );
    }
    
    // Structure
    if ( ! empty( $r['structure']['type'] ) ) {
        $r_structure = substr( strtolower( preg_replace( $pat_space, $rep_space, trim( $r['structure']['type'] ) ) ), $substr_start, $substr_end );
        
        //------------------------ Constructor
        if ( in_array( $r_structure, $structure_constructor_terms, true ) ) {
            
            $structure_namex = 'Constructor';
            $structure_name_abbrx = 'CN';
            
            
            //------------------------ Subtypes
            
            // Main Header Subtype
            if ( in_array( $r_subtype, $subtype_main_header_terms, true ) ) {
                
                $subtype_elemx = 'header';
                $p_role_attrx = ' '.'role="banner"';
                
            }
            
            // Main Content Subtype
            elseif ( in_array( $r_subtype, $subtype_main_content_terms, true ) ) {
                
                $subtype_elemx = 'section';
                $r_hr_structure = true;
                $p_h_elem = 'h2';
                
            }
            
            // Main Header Subtype
            elseif ( in_array( $r_subtype, $subtype_main_footer_terms, true ) ) {
                
                $subtype_name = 'Main Footer';
                $subtype_name_abbr = 'main-footer';
                
                $subtype_elemx = 'footer';
                $p_subtype_cssx = ' '.$subtype_name_abbr;
                $p_role_attrx = ' '.'role="contentinfo"';

                
                
            }
            
            // Aside Subtype
            elseif ( in_array( $r_subtype, $subtype_aside_terms, true ) ) {
                
                $subtype_name = 'Aside';
                $subtype_name_abbr = 'aside';
                
                $p_subtype_cssx = ' '.$subtype_name_abbr;
                $p_role_attrx = ' '.'role="complementary"';
                
                $p_subtype_namex = ' '.$subtype_name;
                $p_subtype_postfix_cssx = '-'.$subtype_name_abbr;
                
            }
        }
        
        
        //------------------------ Component
        elseif ( in_array( $r_structure, $structure_component_terms, true ) ) {
            
            $structure_namex = 'Component';
            $structure_name_abbrx = 'CP';
            
            
            //------------------------ Subtypes
            
            // Fieldset Item Subtype
            if ( in_array( $r_subtype, $subtype_fieldset_item_terms, true ) ) {
                
                $subtype_name = 'Fieldset Item';
                $subtype_name_abbr = 'fs-item';
                
                $p_subtype_namex = ' '.$subtype_name;
                $p_subtype_cssx = ' '.$subtype_name_abbr;
                $p_subtype_postfix_cssx = '-'.$subtype_name_abbr;
            
            }
            
            // Form Subtype
            elseif ( in_array( $r_subtype, $subtype_form_terms, true ) ) {
                
                $subtype_name = 'Form';
                $subtype_name_abbr = 'form';
                $subtype_elemx = 'form';
                
                $p_subtype_namex = ' '.$subtype_name;
                $p_subtype_cssx = ' '.$subtype_name_abbr;
                $p_subtype_postfix_cssx = '-'.$subtype_name_abbr;
                
            }
            
            // Form Elements Subtype
            elseif ( in_array( $r_subtype, $subtype_form_elements_terms, true ) ) {
                
                $subtype_name = 'Form Elements';
                $subtype_name_abbr = 'felems';
                
                $obj_elem = 'label';
                
                $p_subtype_namex = ' '.$subtype_name;
                $p_subtype_cssx = ' '.$subtype_name_abbr;
                $p_subtype_postfix_cssx = '-'.$subtype_name_abbr;
                
            }
            
            
            // X
            // Navigation Subtype
            elseif ( in_array( $r_subtype, $subtype_nav_terms, true ) ) {
                
                //------------------------ X
                // Metadata
                $subtype_name = 'Navigation';
                $subtype_name_abbr = 'nav';
                $subtype_elemx = 'nav';
                //------------------------ X
                
                //------------------------ X
                // Processed
                $p_subtype_namex = ' '.$subtype_name;
                $p_subtype_cssx = ' '.$subtype_name_abbr;
                $p_subtype_postfix_cssx = '-'.$subtype_name_abbr;
                
                if ( empty( $r['structure']['attr']['role'] ) ) {
                    $p_role_attrx = ' '.'role="navigation"';
                }
                
            
            
            
                
                //------------------------ X
                
            }
            
        }
            
        //------------------------ Object
        elseif ( in_array( $r_structure, $structure_object_terms, true ) ) {
            
            $structure_namex = 'Object';
            $structure_name_abbrx = 'OBJ';
            
            
            // Layout
            if ( ! empty( $r['structure']['layout'] ) ) {
                $r_obj_layout = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['layout'] ) ) ), $substr_start, $substr_end );

                
                if ( in_array( $r_obj_layout, $layout_inline_terms, true ) ) {
                    $layout_elemx = 'span';
                }
                
                $subtype_elemx = $layout_elemx;
                $obj_elem = $layout_elemx;

                $obj_label_elem = $layout_elemx;


            }
            
            
            //------------------------ Subtypes
            
            // WordPress Generated Content Subtype
            if ( in_array( $r_subtype, $subtype_wpg_terms, true ) ) {
                
                $subtype_name = 'WordPress Generated Content';
                $subtype_name_abbr = 'wpg';
                
                $p_subtype_namex = ' '.$subtype_name;
                $p_subtype_cssx = ' '.$subtype_name_abbr;

                
            }
            
            // Heading Subtype
            elseif ( in_array( $r_subtype, $subtype_heading_terms, true ) ) {
               
                $subtype_name = 'Heading';
                $subtype_name_abbr = 'h';

                
                $p_subtype_namex = ' '.$subtype_name;
                $p_subtype_cssx = ' '.$subtype_name_abbr;
                $p_subtype_postfix_cssx = '-'.$subtype_name_abbr;
                
            }
            

            // Form Label Subtype
            elseif ( in_array( $r_subtype, $subtype_form_label_terms, true ) ) {
                
                $subtype_name = 'Form Label';
                $subtype_name_abbr = 'flabel';
                
                $obj_elem = 'label';
                
                $p_subtype_namex = ' '.$subtype_name;
                $p_subtype_cssx = ' '.$subtype_name_abbr;
                $p_subtype_postfix_cssx = '-'.$subtype_name_abbr;
                
            }
            
            // Form Element Subtype
            elseif ( in_array( $r_subtype, $subtype_form_element_terms, true ) ) {

                $subtype_name = 'Form Element';
                $subtype_name_abbr = 'felem';
                
                $obj_elem = 'input';
                
                $p_subtype_namex = ' '.$subtype_name;
                $p_subtype_cssx = ' '.$subtype_name_abbr;
                $p_subtype_postfix_cssx = '-'.$subtype_name_abbr;
                
            }
            
            // Generic Subtype
            else {
                
                $subtype_name = 'Generic';
                $subtype_name_abbr = 'gen';
                
                $p_subtype_namex = ' '.$subtype_name;

            }
            
            
            
            // Linked
            if ( ! empty( $r['structure']['linked'] ) ) {
                $r_linked = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['linked'] ) ) ), $substr_start, $substr_end );
            }

            // Href Attribute
            if ( ! empty( $r['structure']['attr']['href'] ) ) {
                $r_href = esc_url( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['attr']['href'] ) ) );

                $href_attr = ' '.'href="'.$r_href.'"';
            }

            // Target Attribute
            if ( ! empty( $r['structure']['attr']['target'] ) ) {
                $r_structure_attr_target = preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['attr']['target'] ) );

                // Default
                $target_attr = ' '.'target="'.$r_structure_attr_target.'"';
            }
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    // Structure Elem
    if ( ! empty( $r['structure']['elem'] ) ) {
        $r_elem = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['elem'] ) ) ), $substr_start, $substr_end );
        

        if ( in_array( $r_structure, $structure_constructor_terms, true ) || in_array( $r_structure, $structure_component_terms, true ) ) {
            $subtype_elemx = $r_elem;
        }
        
        elseif ( in_array( $r_structure, $structure_object_terms, true ) ) {
            $obj_elem = $r_elem;
            
            if ( in_array( $r_elem, $heading_level_terms, true ) ) {
                $obj_elem_css = 'h';
                $layout_elemx = 'div';
                
                // Force block layout for heading element
                $subtype_elemx = $layout_elemx;
                $obj_label_elem = $layout_elemx;
            }
        }


    }
    
    
    // Heading Element
    if ( ! empty( $r['structure']['h_elem'] ) ) {
        $r_h_elem = substr( sanitize_title( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['h_elem'] ) ) ), $substr_start, $substr_end );
        
        if ( in_array( $r_h_elem, $heading_level_terms, true ) ) {
            $p_h_elem = $r_h_elem;
        }
    
    }
    
    // X
    // Structure Role
    if ( ! empty( $r['structure']['attr']['role'] ) ) {
        $r_role_attr = esc_attr( substr( preg_replace( $pat_space, $rep_space, trim( $r['structure']['attr']['role'] ) ), $substr_start, $substr_end ) );
        
        // X
        $role_attrx = 'role="'.$r_role_attr.'"';
        $p_role_attrx = ' '.$role_attrx;
        
    }
    
    // X
    // Action Attribute
    if ( ! empty( $r['structure']['attr']['action'] ) ) {
        $r_action_attr = esc_url( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['attr']['action'] ) ) );
        
        // X
        $action_attrx = 'action="'.$r_action_attr.'"';
        $p_action_attrx = ' '.$action_attrx;
        
    }
    
    // X
    // Method Attribute
    if ( ! empty( $r['structure']['attr']['method'] ) ) {
        $r_method_attr = esc_attr( substr( sanitize_title( preg_replace( $pat_space, $rep_space, trim( $r['structure']['attr']['method'] ) ) ), $substr_start, $substr_end ) );
        
        // X
        $method_attrx = 'method="'.$r_method_attr.'"';
        $p_method_attrx = ' '.$method_attrx;
        
    }
    
    // Custom Attribute
    if ( ! empty( $r['structure']['attr']['custom'] ) ) {
        $r_custom_attr = $r['structure']['attr']['custom'];
            
        $p_attrx = ''; 
        $p_obj_attr = '';
        
        foreach ( ( array ) $r_custom_attr as $key => $val ) {
            
            $clean_key = '';
            $clean_val = '';
            
            $clean_key = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $key ) ) ), $substr_start, $substr_end );
            
            $clean_val = preg_replace( $pat_space, $rep_space, trim( $val ) );
            
            $p_attrx .= ' '.$clean_key.'="'.$clean_val.'"';
            
            $p_obj_attr .= ' '.$clean_key.'="'.$clean_val.'"';
        }
    }
    
    // Custom Attribute
    if ( ! empty( $r['structure']['attr']['a'] ) ) {
        $r_attr_a = $r['structure']['attr']['a'];
            
        $p_obj_a_elem_attr = '';
        
        foreach ( ( array ) $r_attr_a as $key => $val ) {
            
            $clean_key = '';
            $clean_val = '';
            
            $clean_key = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $key ) ) ), $substr_start, $substr_end );
            
            $clean_val = preg_replace( $pat_space, $rep_space, trim( $val ) );
            
            $p_obj_a_elem_attr .= ' '.$clean_key.'="'.$clean_val.'"';
        }
    }
    
    
    
    
    // Variable Definitions
    if ( empty( $r['name'] ) ) {
        $r_name = $structure_type;
    }

    $heading_name = $r_name.' '.$structure_subtype_name;





    // X - Generic Variables
    // Processed

    // Root Element


    // Root Element CSS
    $p_root_elem_cssx = $subtype_elemx;
    
    if ( $subtype_elemx == $subtype_name_abbr || 'div' == $subtype_elemx || 'span' == $subtype_elemx ) {
        $p_root_elem_cssx = '';
        $string_sep = '';
    } else {
        $string_sep = ' ';
    }

    // Structure CSS
    $p_structure_cssx = $string_sep. strtolower( $structure_name_abbrx );


    // Name
    $p_name = $r_name;

    // Structure Name
    $p_structure_name_abbrx = ' '.$structure_name_abbrx;

    // Name CSS
    $p_name_cssx = ' '.$clean_name. $p_subtype_postfix_cssx;

    // Root CSS
    if ( ! empty( $r['css'] ) ) {
        $p_cssx = ' ' .$r_css .$p_subtype_postfix_cssx;
    }

    // Branch CSS
    if ( ! empty( $r['css'] ) ) {
        $p_branch_name_cssx = ' '.$r_css. $p_subtype_postfix_cssx;
    } else {
        $p_branch_name_cssx = ' '.$clean_name. $p_subtype_postfix_cssx;
    }


    


    // All class names in root
    // class="nav cp main-nav custom-css-nav custom-root-css"
    $o_cssx = $p_root_elem_cssx. $p_structure_cssx. $p_subtype_cssx. $p_name_cssx. $p_cssx. $p_root_css;

    // Displayed in data-name
    $o_structure_namex = $p_name. $p_subtype_namex. $p_structure_name_abbrx;

    // Displayed in headings
    $o_heading_name = esc_html__( $p_name. $p_subtype_namex, $GLOBALS['applicator_td'] );

    $o_h_elem = $p_h_elem;

    $o_id_attr = $p_id_attr;

    $o_attr = $p_attrx;

    $o_branch_css = $p_branch_name_cssx;
    
    // Processed
    $p_root_elem = $subtype_elemx;
    
    
    // Output
    $o_root_elem = $p_root_elem;
    $o_title_attr = $p_title_attr;
    
    
    $p_obj_elem = $obj_elem;
    $p_obj_attr = $obj_attr;

    $p_obj_label_elem = $obj_label_elem;
    
    // Object Element CSS
    $obj_elem_postfix_css = '---'.$obj_elem_css;
    
    // Process
    
    // CSS
    if ( ! empty( $r['css'] ) ) {
        $p_obj_elem_cssx = ' '.$r_css. $p_subtype_postfix_cssx. $obj_elem_postfix_css;
        $p_obj_label_elem_cssx = ' '.$r_css. $p_subtype_postfix_cssx. $obj_elem_postfix_css.'_l';
    } else {
        $p_obj_elem_cssx = ' '.$clean_name. $p_subtype_postfix_cssx. $obj_elem_postfix_css;
        $p_obj_label_elem_cssx = ' '.$clean_name. $p_subtype_postfix_cssx. $obj_elem_postfix_css.'_l';
    }
    $p_obj_elem_css = $obj_elem_css;
    $p_obj_label_elem_css = $obj_elem_css.'_l';
    
    
    
    // Output
    $o_obj_elem = $p_obj_elem;
    $o_obj_attr = $p_obj_attr;
    $o_obj_label_elem = $p_obj_label_elem;
    
    $o_obj_elem_css = $p_obj_elem_css. $p_obj_elem_cssx;
    $o_obj_label_elem_css = $p_obj_label_elem_css. $p_obj_label_elem_cssx;
    
    // Anchor Element
    $o_obj_a_elem_css = $p_branch_name_cssx;
    $o_obj_a_elem_attr = $p_obj_a_elem_attr;


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //------------------------ CONTENT ------------------------
    
    //------------------------ Header Content
    if ( $r['hr_content'] ) {
        $r_hr_content = $r['hr_content'];
        
        $hr_content_val = '';
        foreach ( ( array ) $r_hr_content as $val ) {
            $hr_content_val .= preg_replace( $pat_space, $rep_space, trim( $val ) );
        }
        
        // Output
        $o_hr_content_val = $hr_content_val;
    }
    
    //------------------------ Footer Content
    if ( ! empty( $r['fr_content'] ) ) {
        $r_fr_content = $r['fr_content'];
        
        $fr_content_val = '';
        foreach ( ( array ) $r_fr_content as $val ) {
            $fr_content_val .= preg_replace( $pat_space, $rep_space, trim( $val ) );
        }
        
        // Output
        $o_fr_content_val = $fr_content_val;
    }
    
    //------------------------ Constructor Content
    if ( in_array( $r_structure, $structure_constructor_terms, true ) ) {
        if ( ! empty( $r['content']['constructor'] ) ) {
            $r_content = $r['content']['constructor'];

            $content_val = '';
            foreach ( ( array ) $r_content as $val ) {
                $content_val .= preg_replace( $pat_space, $rep_space, trim( $val ) );
            }
        
            // Output
            $o_content_val = $content_val;
        }
    }
    
    //------------------------ Component Content
    if ( in_array( $r_structure, $structure_component_terms, true ) ) {
        if ( ! empty( $r['content']['component'] ) ) {
            $r_content = $r['content']['component'];

            $content_val = '';
            foreach ( ( array ) $r_content as $val ) {
                $content_val .= preg_replace( $pat_space, $rep_space, trim( $val ) );
            }
        
            // Output
            $o_content_val = $content_val;
        }
    }
    
    //------------------------ Form Elements Content
    if ( ! empty( $r['content']['compound'] ) ) {
        $r_content_compound_object = $r['content']['compound'];
        
        if ( in_array( $r_subtype, $subtype_form_elements_terms, true ) ) {
        
            // Name
            if ( ! empty( $r_content_compound_object['name'] ) ) {
                $r_content_compound_object_name = $r_content_compound_object['name'];
            }

            // CSS
            if ( ! empty( $r_content_compound_object['css'] ) ) {
                $r_content_compound_object_css = $r_content_compound_object['css'];
            }

            if ( ! empty( $r_content_compound_object['form_label'] ) ) {
                $r_content_compound_object_form_label = $r_content_compound_object['form_label'];

                // Text Content
                if ( ! empty( $r_content_compound_object_form_label['txt'] ) ) {
                    $r_content_compound_object_form_label_txt = $r_content_compound_object_form_label['txt'];

                    $clean_content_compound_object_form_label_txt = substr( sanitize_title( $r_content_compound_object_form_label_txt ), $substr_start, $substr_end );

                    $content_compound_object_form_label_txt = $r_content_compound_object_form_label_txt;
                    $content_compound_object_form_label_txt_auto_css = ' '.$clean_content_compound_object_form_label_txt.'---txt';

                    // If Text Content is numeric
                    if ( is_numeric( $content_compound_object_form_label_txt[0] ) ) {
                        $content_compound_object_form_label_txt_auto_css = ' '.'num'.' '.'n-'.$clean_content_compound_object_form_label_txt.'---txt';
                    }

                    $content_val = '';
                    $content_val .= '<span class="txt'.$content_compound_object_form_label_txt_auto_css.'">'.$content_compound_object_form_label_txt.'</span>';
                }
            }
        }
    }
    

    /*
    if ( ! empty( $r['content']['object'] ) ) {
        $r_obj_content = $r['content']['object'];

        
        $obj_content_val = '';
        foreach ( ( array ) $r_obj_content as $val ) {
            $obj_content_val .= 'Tae'.$val['txt'];
        }
    }
    */
    
    

    //------------------------ Form Element Content
    if ( ! empty( $r['content']['component']['object'] ) ) {
        $r_content_component_object = $r['content']['component']['object'];
        
        // Name
        if ( ! empty( $r_content_component_object['name'] ) ) {
            $r_content_component_object_name = $r_content_component_object['name'];
        }

        // CSS
        if ( ! empty( $r_content_component_object['css'] ) ) {
            $r_content_component_object_css = $r_content_component_object['css'];
        }
        
        if ( ! empty( $r_content_component_object['form_label'] ) ) {
            $r_content_component_object_flabel = $r_content_component_object['form_label'];
            
            // Text Content
            if ( ! empty( $r_content_component_object_flabel['txt'] ) ) {
                $r_content_component_object_flabel_txt = $r_content_component_object_flabel['txt'];
                
                $sanitized_content_component_object_flabel_txt = substr( sanitize_title( $r_content_component_object_flabel_txt ), $substr_start, $substr_end );

                $content_component_object_flabel_txt = $r_content_component_object_flabel_txt;
                $content_component_object_flabel_txt_auto_css = ' '.$sanitized_content_component_object_flabel_txt.'---txt';

                // If Text Content is numeric
                if ( is_numeric( $content_component_object_flabel_txt[0] ) ) {
                    $content_component_object_flabel_txt_auto_css = ' '.'num'.' '.'n-'.$sanitized_content_component_object_flabel_txt.'---txt';
                }

                $content_val = '';
                $content_val .= '<span class="txt'.$content_component_object_flabel_txt_auto_css.'">'.$content_component_object_flabel_txt.'</span>';
            }
        }
    }
    
    
    
    //------------------------ Object Content
    if ( ! empty( $r['content']['object'] ) ) {
        $r_obj_content = $r['content']['object'];
        
        $obj_content_val = '';
        foreach ( ( array ) $r_obj_content as $val ) {
                
            $txt_auto_css = '';
            $txt_css = '';
            $r_content_obj_sep = '';
            $obj_content_val = '';
            
            // Text Content
            if ( ! empty( $val['txt'] ) ) {
                $r_content_obj_txt = preg_replace( $pat_space, $rep_space, trim( $val['txt'] ) );
                
                $clean_txt = substr( sanitize_title( $r_content_obj_txt ), $substr_start, $substr_end );
                
                $txt_auto_css = ' '.$clean_txt.'---txt';
                
                // CSS
                if ( ! empty( $val['css'] ) ) {
                    $r_content_obj_css = preg_replace( $pat_space, $rep_space, trim( $val['css'] ) );

                    $txt_css = ' '.$r_content_obj_css.'---txt';
                }
                
                // Numeric Text
                if ( is_numeric( $r_content_obj_txt[0] ) ) {
                    $txt_auto_css = ' '.'num'.' '.'n-'.$clean_txt.'---txt';
                }
                
                // Separator
                if ( ! empty( $val['sep'] ) ) {
                    $r_content_obj_sep = preg_replace( $pat_space, $rep_space, $val['sep'] );
                }
                
                // Value
                $obj_content_val .= $r_content_obj_sep.'<span class="txt'.$txt_css. $txt_auto_css.'">'.$r_content_obj_txt.'</span>';
                
                if ( ! empty( $val['line'] ) ) {
                    
                    $r_content_obj_line = $val['line'];
                    
                    foreach ( (array) $r_content_obj_line as $line_val ) {
                        
                        $line_css = '';
                        $line_auto_css = '';
                        
                        if ( ! empty( $line_val[0]['txt'] ) ) {
                            $r_line_txt = preg_replace( $pat_space, $rep_space, trim( $line_val[0]['txt'] ) );
                            
                            $clean_line_txt = substr( sanitize_title( $r_line_txt ), $substr_start, $substr_end );
                            
                            $line_auto_css = ' ' . $clean_line_txt.'---line';
                            
                            if ( is_numeric( $r_line_txt[0] ) ) {
                                $line_auto_css = ' '.'n-'.$clean_line_txt.'---line';
                            }
                            
                            if ( ! empty( $line_val['css'] ) ) {
                                $r_line_css = preg_replace( $pat_space, $rep_space, trim( $line_val['css'] ) );
                                
                                $line_css = ' '.$r_line_css;
                            }
                        }

                        $obj_content_val .= '<span class="line'.$line_css. $line_auto_css.'">';
                        
                        foreach ( (array) $line_val as $line_txt_val ) {
                        
                            $txt = '';
                            $txt_auto_css = '';
                            $txt_css = '';
                            $r_obj_line_sep = '';

                            // Text Content
                            if ( ! empty( $line_txt_val['txt'] ) ) {
                                $r_obj_line_txt = preg_replace( $pat_space, $rep_space, trim( $line_txt_val['txt'] ) );
                                
                                $clean_line_txt = substr( sanitize_title( $r_obj_line_txt ), $substr_start, $substr_end );

                                $txt_auto_css = ' '.$clean_line_txt.'---txt';

                                // Numeric Text
                                if ( is_numeric( $r_obj_line_txt[0] ) ) {
                                    $txt_auto_css = ' '.'num'.' '.'n-'.$clean_line_txt.'---txt';
                                }

                                // CSS
                                if ( ! empty( $line_txt_val['css'] ) ) {
                                    $r_content_obj_line_css = preg_replace( $pat_space, $rep_space, trim( $line_txt_val['css'] ) );
                                    
                                    $txt_css = ' '.$r_content_obj_line_css;
                                }

                                // Separator
                                if ( ! empty( $line_txt_val['sep'] ) ) {
                                    $r_obj_line_sep = preg_replace( $pat_space, $rep_space, $line_txt_val['sep'] );
                                }

                                $obj_content_val .= $r_obj_line_sep.'<span class="txt'.$txt_auto_css.$txt_css.'">'.$r_obj_line_txt.'</span>';

                            }
                            
                        }
                        
                        $obj_content_val .= '</span>';
                    }
                }
            }
            
            elseif ( ! empty( $val['form_elem'] ) ) {
                $r_obj_content_felem = preg_replace( $pat_space, $rep_space, trim( $val['form_elem'] ) );
                $obj_content_felem = $r_obj_content_felem;
                
                if ( in_array( $obj_content_felem, $obj_content_form_elem_input_term_variations, true ) ) {
                    
                    $form_elem_id = '';
                    $form_elem_css = '';
                    $form_elem_name = '';
                    $form_elem_placeholder = '';
                    $form_elem_value = '';
                    $form_elem_type = '';
                    $form_elem_required = '';
                    
                    // Array Input: ID
                    if ( ! empty( $val['id'] ) ) {
                        $r_obj_content_id = preg_replace( $pat_space, $rep_space, trim( $val['id'] ) );
                        $obj_content_id = $r_obj_content_id;
                        $form_elem_id = ' '.'id="'.$obj_content_id.'"';
                    }
                    
                    // Array Input: CSS
                    if ( ! empty( $val['css'] ) ) {
                        $r_content_obj_css = preg_replace( $pat_space, $rep_space, trim( $val['css'] ) );
                        $r_content_obj_css = $r_content_obj_css;
                    }
                    
                    // Name Attribute
                    if ( ! empty( $val['attr']['name'] ) ) {
                        $r_form_elem_attr_name = preg_replace( $pat_space, $rep_space, trim( $val['attr']['name'] ) );
                        $form_elem_attr_name = $r_form_elem_attr_name;

                        $form_elem_name = ' '.'name="'.$form_elem_attr_name.'"';
                    }
                    
                    // Type Attribute
                    if ( ! empty( $val['attr']['type'] ) ) {
                        $r_form_elem_attr_type = preg_replace( $pat_space, $rep_space, trim( $val['attr']['type'] ) );
                        $form_elem_attr_type = $r_form_elem_attr_type;
                        
                        $clean_form_elem_attr_type = sanitize_title( $form_elem_attr_type );

                        $form_elem_type = ' '.'type="'.$clean_form_elem_attr_type.'"';
                    }
                    
                    // Placeholder Attribute
                    if ( ! empty( $val['attr']['placeholder'] ) ) {
                        $r_form_elem_attr_placeholder = preg_replace( $pat_space, $rep_space, trim( $val['attr']['placeholder'] ) );
                        $form_elem_attr_placeholder = $r_form_elem_attr_placeholder;

                        $form_elem_placeholder = ' '.'placeholder="'.$form_elem_attr_placeholder.'"';
                    }
                    
                    // Value Attribute
                    if ( ! empty( $val['attr']['value'] ) ) {
                        $r_form_elem_attr_value = preg_replace( $pat_space, $rep_space, trim( $val['attr']['value'] ) );
                        $form_elem_attr_value = $r_form_elem_attr_value;

                        $form_elem_value = ' '.'value="'.$form_elem_attr_value.'"';
                    }
                    
                    // Required Attribute
                    if ( ! empty( $val['attr']['required'] ) ) {
                        $r_form_elem_attr_required = preg_replace( $pat_space, $rep_space, trim( $val['attr']['required'] ) );
                        $form_elem_attr_required = $r_form_elem_attr_required;

                        if ( $form_elem_attr_required ) {
                            $form_elem_required = ' '.'required';
                        }
                    }
                    
                    if ( ! empty( $val['css'] ) ) {
                        $form_elem_css = ' '.'input-'.$clean_form_elem_attr_type.' '.$r_content_obj_css.'---input-'.$clean_form_elem_attr_type;
                    } else {
                        $form_elem_css = ' '.'input-'.$clean_form_elem_attr_type.' '.$clean_name.'---input-'.$clean_form_elem_attr_type;
                    }
                    
                    $obj_content_val = '';
                    $obj_content_val .= '<input'.$form_elem_id.' class="input'.$form_elem_css.'"'.$form_elem_name .$form_elem_placeholder .$form_elem_value .$form_elem_type .$form_elem_required.'>';
                }
            }
            
            else {
                $obj_content_val = '';
                $obj_content_val .= $val;
            }
        }
        
        
        
        // Output
        $o_content_val = $obj_content_val;
    }
    
    
    
    
    //------------------------ Container Structure Markup
    
    
    // Generic Container Structure Markup
    $cr_smu = '';
    $cr_smu .= '<div class="%1$s'.$o_branch_css.'---%1$s">';
    $cr_smu .= '<div class="%1$s_cr'.$o_branch_css.'---%1$s_cr">';

    
    $cr_emu = '';
    $cr_emu .= '</div>';
    $cr_emu .= '</div>';

    
    
    $subtype_form_element_cr_smu = '';
    $subtype_form_element_cr_smu .= '<div class="ee">';
    
    $subtype_form_element_cr_emu = '';
    $subtype_form_element_cr_emu .= '</div>';
    
    


    
    // Form Subtype
    $subtype_form_cr_smu = '';
    $subtype_form_cr_smu .= '<div class="grp %1$s'.$o_branch_css.'-%1$s">';
    $subtype_form_cr_smu .= '<div class="cr'.$o_branch_css.'-%1$s---cr">';
    
    $subtype_form_cr_emu = '';
    $subtype_form_cr_emu .= '</div>';
    $subtype_form_cr_emu .= '</div>';
    
    

    // Main Nav Mod
    $main_nav_cr_smu = '';
    $main_nav_cr_smu   .= '<div class="%1$s'.$o_branch_css.'---%1$s">';
    
    $main_nav_cr_emu = '';
    $main_nav_cr_emu     .= '</div>';
    
    
    
    // Anchor Markup
    $a_smu = '';
    $a_smu .= '<a class="a '.$o_obj_a_elem_css.'---a" '.$o_obj_a_elem_attr.'>';
    $a_smu .= '<span class="a_l '.$o_obj_a_elem_css.'---a_l">';
    
    $a_emu = '';
    $a_emu .= '</span>';
    $a_emu .= '</a>';
    
    
    // Object Container Markup
    $obj_cr_smu = '';
    $obj_cr_smu .= '<'.$o_obj_elem.' class="'.$o_obj_elem_css.'" '.$o_obj_attr.'>';
    
    if ( $r_linked ) {
        $obj_cr_smu .= $a_smu;
        
        $obj_cr_emu = '';
        $obj_cr_emu = $a_emu;
    } else {
        $obj_cr_smu .= '<'.$o_obj_label_elem.' class="'.$o_obj_label_elem_css.'">';
        
        $obj_cr_emu = '';
        $obj_cr_emu .= '</'.$o_obj_label_elem.'>';
    }
    
    $obj_cr_emu .= '</'.$o_obj_elem.'>';
    
    

    /*
    // Object Container Markup
    $obj_cr_smu = '';
    $obj_cr_smu .= '<'.$o_obj_elem.' class="'$o_obj_css.$obj_elem_css.' '.$o_branch_css.'---'.$obj_elem_css.'" '.$o_obj_attr.'>';
    $obj_cr_smu .= '<'.$obj_layout_elem.' class="'.$obj_elem_css.'_l'.' '.$o_branch_css.'---'.$obj_elem_css.'_l">';
    
    $obj_cr_emu = '';
    $obj_cr_emu .= '</'.$obj_layout_elem.'>';
    $obj_cr_emu .= '</'.$o_obj_elem.'>';
    */
    
    
    $subtype_form_element_cr_smu = '';
    $subtype_form_element_cr_smu .= '<div class="ee">';
    
    $subtype_form_element_cr_emu = '';
    $subtype_form_element_cr_emu .= '</div>';
    
    


    
    
    
    $subtype_form_elements_cr_smu = '';
    $subtype_form_elements_cr_smu .= $cr_smu;

    


    $subtype_form_elements_cr_smu .= '<div id="" class="obj flabel" title="" data-name="">';
    $subtype_form_elements_cr_smu .= '<label class="label" for="" attr="">';
    $subtype_form_elements_cr_smu .= '<div class="label_l">';
    
    $subtype_form_elements_cr_emu = '';
    $subtype_form_elements_cr_emu .= '</div>';
    $subtype_form_elements_cr_emu .= '</label>';
    $subtype_form_elements_cr_emu .= '</div><!-- Object Name -->';
   
    $subtype_form_elements_cr_emu .= $cr_emu;
    
    
    
    
    
    
    
    
    
    //------------------------ Header Markup
    $hr_mu = '';
    $hr_mu .= sprintf( $cr_smu,
        'hr'
    );
    $hr_mu .= '<'.$o_h_elem.' class="h'.$o_branch_css.'---h"><span class="h_l'.$o_branch_css.'---h_l">'.$o_heading_name.'</span></'.$o_h_elem.'>';

    $hr_mu .= $o_hr_content_val;
    $hr_mu .= $cr_emu;

    
    //------------------------ Footer Markup
    $fr_mu = '';
    $fr_mu .= sprintf( $cr_smu,
        'fr'
    );
    $fr_mu .= $o_fr_content_val;
    $fr_mu .= $cr_emu;
    


    
    //------------------------ Constructor, Object Content Markup
    if ( in_array( $r_structure, $structure_constructor_terms, true ) ) {
        $ct_mu = '';
        $ct_mu .= $o_content_val;
    }
    
    //------------------------ Component Content Markup
    if ( in_array( $r_structure, $structure_component_terms, true ) || in_array( $r_subtype, $subtype_aside_terms, true ) ) {
        $ct_mu = '';
        $ct_mu .= sprintf( $cr_smu,
            'ct'
        );

        $ct_mu .= $o_content_val;


        $ct_mu .= $cr_emu;
    }
    
    //------------------------ Main Nav Mod Content Markup
    if ( in_array( $mod, $mod_main_nav_term_variations, true ) ) {
        $ct_mu = '';
        $ct_mu .= sprintf( $main_nav_cr_smu,
            'ct'
        );

        $ct_mu .= $o_content_val;


        $ct_mu .= $main_nav_cr_emu;
    }
    
    //------------------------ Form Content Markup
    if ( in_array( $r_subtype, $subtype_form_terms, true ) ) {
        $ct_mu = '';
        $ct_mu .= sprintf( $subtype_form_cr_smu,
            'fieldsets'
        );

        $ct_mu .= $o_content_val;

        $ct_mu .= $subtype_form_cr_emu;
    }
    
    //------------------------ Form Elements Content Markup
    if ( in_array( $r_subtype, $subtype_form_elements_terms, true ) ) {
        $ct_mu = '';
        $ct_mu .= sprintf( $subtype_form_elements_cr_smu,
            'ct'
        );

        $ct_mu .= $o_content_val;
        $ct_mu .= $subtype_form_elements_cr_emu;
    }
    
    //------------------------ Form Element
    if ( in_array( $r_subtype, $structure_subtype_felem_term_variations, true ) ) {
        $obj_ct_mu = '';
        $obj_ct_mu .= $subtype_form_element_cr_smu;
        $obj_ct_mu .= $obj_content_val;
        $obj_ct_mu .= $subtype_form_element_cr_emu;
    }
    
    //------------------------ Object Content Markup
    if ( in_array( $r_structure, $structure_object_terms, true ) ) {
        $obj_ct_mu = '';
        $obj_ct_mu .= $obj_cr_smu;
        $obj_ct_mu .= $o_content_val;
        $obj_ct_mu .= $obj_cr_emu;
        
        // WordPress Generated Content
        if ( in_array( $r_subtype, $subtype_wpg_terms, true ) ) {
            $obj_ct_mu = '';
            $obj_ct_mu .= $o_content_val;
        }
    }


    
    
    
    if ( ! empty( $r['content']['constructor'] ) || ! empty( $r['content']['component'] ) ) {
        $ct_mu = $ct_mu;
    } else {
        $ct_mu = '';
    }
    
    if ( ! empty( $r['fr_content'] ) ) {
        $fr_mu = $fr_mu;
    } else {
        $fr_mu = '';
    }
    

    if ( ! empty( $r['obj_content'] ) || ! empty( $r['content']['object'] ) ) {
        $obj_ct_mu = $obj_ct_mu;
    } else {
        $obj_ct_mu = '';
    }
    
    
    
    //------------------------ Content Output
    if ( in_array( $r_structure, $structure_constructor_terms, true ) || in_array( $r_subtype, $subtype_form_terms, true ) ) {
        
        if ( $r_hr_structure ) {
            $hr_mu = $hr_mu;
        } else {
            $hr_mu = '';
        }
        
        $o_content = $hr_mu. $ct_mu. $fr_mu;
    }
    
    if ( in_array( $r_structure, $structure_component_terms, true ) ) {
        $o_content = $hr_mu. $ct_mu. $fr_mu;
    }
    
    if ( in_array( $r_structure, $structure_object_terms, true ) ) {
        $o_content = $obj_ct_mu;
    }
    
    
    
    
    
    
    
    
    
    //------------ New Version
    if ( '0.1' == $r_version ) {
        
        // Initialize
        $output = '';
    
    //------------ Original Version    
    } else {
        
        // Initialize
        $output = '';
        
        $output .= '<'.$o_root_elem. $o_id_attr.' class="'.$o_cssx.'"'.$o_attr. $o_title_attr.' data-name="'.$o_structure_namex.'">';
        
        //------------------------ Constructor, Component Structure
        if ( in_array( $r_structure, $structure_constructor_terms, true ) || in_array( $r_structure, $structure_component_terms, true ) ) {
            
            $output .= '<div class="cr'.$o_branch_css.'---cr">';
            $output .= $o_content;
            $output .= '</div>';
            
        }
        
        //------------------------ Object Structure
        elseif ( in_array( $r_structure, $structure_object_terms, true ) ) {
            
            $output .= $o_content;
        
        }
        
        $output .= '</'.$o_root_elem.'><!-- '.$o_structure_namex.' -->';
    
    }
    
    $html = apply_filters( 'htmlok', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
    
}
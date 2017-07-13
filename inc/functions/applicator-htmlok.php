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
    
    $defaults = array();
    
    
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
    
    $structure_form_actions_submit = array( 'submit', 's', );
    $structure_form_actions_reset = array( 'reset', 'r', );
    
    // Form Types
    $form_textbox_terms = array( 'single line text', 'textbox', 'input text', 'tb', 'it', );
    $form_textarea_terms = array( 'multi line text', 'textarea', 'ta', 't', );
    $form_radio_terms = array( 'radio button', 'radio', 'rb', 'r', );
    $form_checkbox_terms = array( 'checkbox', 'check', 'cb', 'c', );
    
    
    // Object Subtypes
    $subtype_heading_terms = array( 'heading', 'h', );
    $subtype_wpg_terms = array( 'wordpress generated content', 'wpg', 'wp', );
    $subtype_navi_terms = array( 'navigation item', 'nav item', 'navi', );
    $subtype_note_terms = array( 'note', );
    $subtype_form_label_terms = array( 'form label', 'flabel', 'fl', );
    $subtype_form_element_terms = array( 'form element', 'felem', 'fe', );
    
    
    $subtype_form_elements_terms = array( 'form elements', 'felems', 'fes', );
    
    
    
    
    
    
    // Object Layout
    $layout_block_terms = array( 'block', 'div', 'b', 'd', );
    $layout_inline_terms = array( 'inline', 'span', 'i', 's', );
    
    
    // Heading Levels
    $heading_level_terms = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', );
    
    
    
    
    
    
    
    
    
    $mod_main_nav_term_variations = array( 'main navigation', 'main nav', );
    
    
    
    $obj_content_form_elem_input_term_variations = array( 'Input', 'input', 'i', );
    
    
    
    //------------ Initialized Variables
    $r_name = '';
    
    
    $r_name = '';
    $r_structure = '';
    $r_elem = '';
    $r_obj_layout = '';
    
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
    $r_id = '';
    $role_attr = '';
    $title_attr = '';
    $clean_structure_type = '';
    $clean_structure_subtype = '';
    $structure_type_css = '';
    $structure_subtype_css = '';
    $r_linked = '';
    $h_level_tag = '';
    
    // Content
    $hr_content_val = '';
    $content_val = '';
    $actions_content_val = '';
    $fr_content_val = '';
    
    
    $structure_elem = '';
    
    $layout_tag = 'div';
    $root_tag = $layout_tag;
    $branch_tag = $layout_tag;
    
    $structure_name = '';
    $structure_css = '';
    $href_attr = '';
    $for_attr = '';
    
    $href_attr = '';
    
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
    
    
    // X
    // Output
    $o_cssx = '';
    $o_structure_name = '';
    $o_heading_name = '';
    $o_id_attr = '';
    $o_content = '';
    
    // Root Element by default is div
    // It can be changed depending on the Subtype of Element involved
    // In Object, it can be div or span depending on the Layout
    $p_root_elem = 'div';
    $layout_elem = 'div';
    $obj_label_elem = $layout_elem;
    
    $subtype_name = '';
    
    // X
    // Processed
    $p_subtype_name = '';
    $p_structure_name_abbr = '';
    $p_structure_cssx = '';
    $p_id_attr = '';
    $p_method_attrx = '';
    $p_subtype_css = '';
    
    // X
    $p_root_elem_css = '';
    $p_attr = '';
    $p_custom_attr = '';
    
    $structure_namex = '';
    $structure_name_abbr = '';
    $p_subtype_postfix_css = '';
    
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
    $subtype_elem = 'div';
    
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
    
    $r_txt_linked = '';
    $p_obj_elem_root_css_val = '';
    $p_obj_a_id_attr = '';
    $p_obj_elem_root_title = '';
    
    $txt_layout_elem = 'span';
    
    $o_content_before = '';
    $o_content_after = '';
    


        
    
    // Name
    if ( ! empty( $r['name'] ) ) {
        $r_name = preg_replace( $pat_space, $rep_space, trim( $r['name'] ) );
        $clean_name = substr( sanitize_title( $r_name ), $substr_start, $substr_end );
    }
    
    // CSS or Custom CSS that will apply to all elements | If blank, use Clean Name
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
        $r_id = substr( preg_replace( $pat_space, $rep_space, trim( $r['id'] ) ), $substr_start, $substr_end );
        
        // Default
        $p_id_attr =  ' '.'id="'.$r_id.'"';
        
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
        
        //------------------------------------------------ Constructor Structure
        if ( in_array( $r_structure, $structure_constructor_terms, true ) ) {
            
            $structure_namex = 'Constructor';
            $structure_name_abbr = 'CN';
            
            
            //------------------------ Subtypes
            
            // Main Header Subtype
            if ( in_array( $r_subtype, $subtype_main_header_terms, true ) ) {
                
                $subtype_elem = 'header';
                $p_custom_attr = ' '.'role="banner"';
                
            }
            
            // Main Content Subtype
            elseif ( in_array( $r_subtype, $subtype_main_content_terms, true ) ) {
                
                $subtype_elem = 'section';
                $r_hr_structure = true;
                
            }
            
            // Main Header Subtype
            elseif ( in_array( $r_subtype, $subtype_main_footer_terms, true ) ) {
                
                $subtype_elem = 'footer';
                $p_custom_attr = ' '.'role="contentinfo"';
                
            }
            
            // Aside Subtype
            elseif ( in_array( $r_subtype, $subtype_aside_terms, true ) ) {
                
                $subtype_name = 'Aside';
                $subtype_name_abbr = 'aside';
                
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_custom_attr = ' '.'role="complementary"';
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
                
            }
        }
        
        
        //------------------------------------------------ Component Structure
        elseif ( in_array( $r_structure, $structure_component_terms, true ) ) {
            
            $structure_namex = 'Component';
            $structure_name_abbr = 'CP';
            
            
            //------------------------ Subtypes
            
            // Navigation Subtype
            if ( in_array( $r_subtype, $subtype_nav_terms, true ) ) {
                
                $subtype_name = 'Navigation';
                $subtype_name_abbr = 'nav';
                
                $p_custom_attr = ' '.'role="navigation"';
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
            }
            
            // Fieldset Item Subtype
            elseif ( in_array( $r_subtype, $subtype_fieldset_item_terms, true ) ) {
                
                $subtype_name = 'Fieldset Item';
                $subtype_name_abbr = 'fs-item';
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
            
            }
            
            // Form Subtype
            elseif ( in_array( $r_subtype, $subtype_form_terms, true ) ) {
                
                $subtype_name = 'Form';
                $subtype_name_abbr = 'form';
                $subtype_elem = 'form';
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
                
            }
            
            // Form Elements Subtype
            elseif ( in_array( $r_subtype, $subtype_form_elements_terms, true ) ) {
                
                $subtype_name = 'Form Elements';
                $subtype_name_abbr = 'felems';
                
                $obj_elem = 'label';
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
                
            }
            
        }
            
        //------------------------------------------------ Object Structure
        elseif ( in_array( $r_structure, $structure_object_terms, true ) ) {
            
            $structure_namex = 'Object';
            $structure_name_abbr = 'OBJ';
            
            
            // Layout
            if ( ! empty( $r['structure']['layout'] ) ) {
                $r_obj_layout = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['layout'] ) ) ), $substr_start, $substr_end );
                
                if ( in_array( $r_obj_layout, $layout_inline_terms, true ) ) {
                    $layout_elem = 'span';
                }
                
                $subtype_elem = $layout_elem;
                $obj_elem = $layout_elem;

                $obj_label_elem = $layout_elem;
                $txt_layout_elem = $layout_elem;

            }
            
            
            // Linked
            if ( ! empty( $r['structure']['linked'] ) ) {
                $r_linked = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['linked'] ) ) ), $substr_start, $substr_end );
            }
    
            // Object ID Attribute
            if ( ! empty( $r['structure']['id'] ) ) {
                $r_obj_a_id = substr( preg_replace( $pat_space, $rep_space, trim( $r['structure']['id'] ) ), $substr_start, $substr_end );

                $p_obj_a_id_attr =  ' '.'id="'.$r_obj_a_id.'"';
            }
            
            
            // Object Element CSS
            if ( ! empty( $r['structure']['root_css'] ) ) {
                $r_obj_elem_root_css = $r['structure']['root_css'];

                $p_obj_elem_root_css_val = '';
                foreach ( ( array ) $r_obj_elem_root_css as $val ) {
                    $p_obj_elem_root_css_val .= ' '.preg_replace( $pat_space, $rep_space, trim( $val ) );
                }
            }
    
    
            // Object Element Title Attribute
            if ( ! empty( $r['structure']['title'] ) ) {
                $r_obj_elem_root_title = preg_replace( $pat_space, $rep_space, trim( $r['structure']['title'] ) );

                // Default
                $p_obj_elem_root_title = ' '.'title="'.$r_obj_elem_root_title.'"';
            }
            
            
            //------------------------ Subtypes
            
            // WordPress Generated Content Subtype
            if ( in_array( $r_subtype, $subtype_wpg_terms, true ) ) {
                
                $subtype_name = 'WordPress Generated Content';
                $subtype_name_abbr = 'wpg';
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                
            }
            
            // Heading Subtype
            elseif ( in_array( $r_subtype, $subtype_heading_terms, true ) ) {
               
                $subtype_name = 'Heading';
                $subtype_name_abbr = 'h';
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
                
            }
            
            // Heading Subtype
            elseif ( in_array( $r_subtype, $subtype_navi_terms, true ) ) {
               
                $subtype_name = 'Navigation Item';
                $subtype_name_abbr = 'navi';
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
                
            }
            
            // Note Subtype
            elseif ( in_array( $r_subtype, $subtype_note_terms, true ) ) {
               
                $subtype_name = 'Note';
                $subtype_name_abbr = 'note';
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
                
                $layout_elem = 'div';
                
                $subtype_elem = $layout_elem;
                $obj_elem = $layout_elem;
                $obj_label_elem = $layout_elem;
                $txt_layout_elem = $layout_elem;
                
            }
            

            // Form Label Subtype
            elseif ( in_array( $r_subtype, $subtype_form_label_terms, true ) ) {
                
                $subtype_name = 'Form Label';
                $subtype_name_abbr = 'flabel';
                
                $obj_elem = 'label';
                $obj_elem_css = $obj_elem;
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
                
            }
            
            
            // Form Element Subtype
            elseif ( in_array( $r_subtype, $subtype_form_element_terms, true ) ) {

                $subtype_name = 'Form Element';
                $subtype_name_abbr = 'felem';
                
                $p_subtype_name = ' '.$subtype_name;
                $p_subtype_css = ' '.$subtype_name_abbr;
                $p_subtype_postfix_css = '-'.$subtype_name_abbr;
                
            }
            
            // Generic Subtype
            else {
                
                $subtype_name = 'Generic';
                $subtype_name_abbr = 'gen';
                
                $p_subtype_name = ' '.$subtype_name;

            }
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    // Structure Elem
    if ( ! empty( $r['structure']['elem'] ) ) {
        $r_elem = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $r['structure']['elem'] ) ) ), $substr_start, $substr_end );
        

        if ( in_array( $r_structure, $structure_constructor_terms, true ) || in_array( $r_structure, $structure_component_terms, true ) ) {
            $subtype_elem = $r_elem;
        }
        
        elseif ( in_array( $r_structure, $structure_object_terms, true ) ) {
            $obj_elem = $r_elem;
            
            if ( in_array( $r_elem, $heading_level_terms, true ) ) {
                $obj_elem_css = 'h';
                $layout_elem = 'div';
                
                // Force block layout for heading element
                $subtype_elem = $layout_elem;
                $obj_label_elem = $layout_elem;
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
    
    
    // Attributes of Element
    if ( ! empty( $r['structure']['attr']['elem'] ) ) {
        $r_attr_elem = $r['structure']['attr']['elem'];
            
        $p_attr = '';
        
        foreach ( ( array ) $r_attr_elem as $key => $val ) {
            
            $clean_key = '';
            $clean_val = '';
            
            $clean_key = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $key ) ) ), $substr_start, $substr_end );
            
            $clean_val = preg_replace( $pat_space, $rep_space, trim( $val ) );
            
            $p_attr .= ' '.$clean_key.'="'.$clean_val.'"';
        }
    }
    
    // Attributes of Anchor
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


    


    // Root Element CSS
    $p_root_elem_css = $subtype_elem;
    
    if ( $subtype_elem == $subtype_name_abbr || 'div' == $subtype_elem || 'span' == $subtype_elem ) {
        $p_root_elem_css = '';
        $string_sep = '';
    } else {
        $string_sep = ' ';
    }

    // Structure CSS
    $p_structure_cssx = $string_sep. strtolower( $structure_name_abbr );


    // Name
    $p_name = $r_name;

    // Structure Name
    $p_structure_name_abbr = ' '.$structure_name_abbr;

    // Name CSS
    $p_name_cssx = ' '.$clean_name. $p_subtype_postfix_css;

    // Root CSS
    if ( ! empty( $r['css'] ) ) {
        $p_cssx = ' ' .$r_css .$p_subtype_postfix_css;
    }

    // Branch CSS
    if ( ! empty( $r['css'] ) ) {
        $p_branch_name_css = ' '.$r_css. $p_subtype_postfix_css;
    } else {
        $p_branch_name_css = ' '.$clean_name. $p_subtype_postfix_css;
    }


    


    // All class names in root
    // class="nav cp main-nav custom-css-nav custom-root-css"
    $o_cssx = $p_root_elem_css. $p_structure_cssx. $p_subtype_css. $p_name_cssx. $p_cssx. $p_root_css;

    // Displayed in data-name
    $o_structure_name = $p_name. $p_subtype_name. $p_structure_name_abbr;

    // Displayed in headings
    $o_heading_name = esc_html__( $p_name. $p_subtype_name, $GLOBALS['applicator_td'] );

    $o_h_elem = $p_h_elem;

    $o_id_attr = $p_id_attr;

    $o_attr = $p_attr. $p_custom_attr;

    $o_branch_css = $p_branch_name_css;
    
    // Processed
    $p_root_elem = $subtype_elem;
    
    
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
        $p_obj_elem_cssx = ' '.$r_css. $p_subtype_postfix_css. $obj_elem_postfix_css;
        $p_obj_label_elem_cssx = ' '.$r_css. $p_subtype_postfix_css. $obj_elem_postfix_css.'_l';
    } else {
        $p_obj_elem_cssx = ' '.$clean_name. $p_subtype_postfix_css. $obj_elem_postfix_css;
        $p_obj_label_elem_cssx = ' '.$clean_name. $p_subtype_postfix_css. $obj_elem_postfix_css.'_l';
    }
    $p_obj_elem_css = $obj_elem_css;
    $p_obj_label_elem_css = $obj_elem_css.'_l';
    
    
    
    // Output
    $o_obj_elem = $p_obj_elem;
    $o_obj_attr = $p_attr;
    $o_obj_label_elem = $p_obj_label_elem;
    
    $o_obj_elem_css = $p_obj_elem_css. $p_obj_elem_cssx;
    $o_obj_label_elem_css = $p_obj_label_elem_css. $p_obj_label_elem_cssx;
    
    // Anchor Element
    $o_obj_a_elem_css = $p_branch_name_css;
    $o_obj_a_elem_attr = $p_obj_a_elem_attr;
    $o_obj_a_root_css = $p_obj_elem_root_css_val;
    $o_obj_a_id_attr = $p_obj_a_id_attr;
    $p_obj_elem_root_title = $p_obj_elem_root_title;


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //------------------------ CONTENT ------------------------
    
    //------------------------ Header Content
    if ( ! empty( $r['hr_content'] ) ) {
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
        }
    }
    
    
    //------------------------ Content Before
    if ( ! empty( $r['content']['before'] ) ) {
        $r_content_before = preg_replace( $pat_space, $rep_space, trim( $r['content']['before'] ) );
        $o_content_before = $r_content_before;
    }
    
    
    //------------------------ Content After
    if ( ! empty( $r['content']['after'] ) ) {
        $r_content_after = preg_replace( $pat_space, $rep_space, trim( $r['content']['after'] ) );
        $o_content_after = $r_content_after;
    }
    
    
    // X
    
    $o_form_type = '';
    
    if ( ! empty( $r['content']['compound'] ) ) {
        $r_content_compound = $r['content']['compound'];
        
        $content_val = '';
        $actions_content_val = '';
        foreach ( ( array ) $r_content_compound as $val ) {
            
            // Initialize
            $p_content_compound_name = '';
            $p_clean_content_compound_name = '';
            $p_content_compound_branch_name_css = '';
            $p_content_compound_css = '';
            $p_content_compound_branch_css = '';
            
            // Name
            if ( ! empty( $val['name'] ) ) {
                $r_content_compound_name = $val['name'];
                
                $clean_content_compound_name = sanitize_title( $r_content_compound_name );
                
                // Processed
                $p_content_compound_name = $r_content_compound_name;
                $p_clean_content_compound_name = ' '.$clean_content_compound_name;
                $p_content_compound_branch_name_css = $p_clean_content_compound_name;
            }
                    
            // CSS
            if ( ! empty( $val['css'] ) ) {
                $r_content_compound_css = $val['css'];
                
                // Processed
                $p_content_compound_css = ' '.$r_content_compound_css;
                $p_content_compound_branch_css = $p_content_compound_css;
            }
            
            else {
                // Processed
                $p_content_compound_branch_css = $p_content_compound_branch_name_css;
            }
            
            // Definitions
            $o_content_compound_css = $p_clean_content_compound_name. $p_content_compound_css;
            $o_content_compound_branch_css = $p_content_compound_branch_css;
            $o_content_compound_name = $p_content_compound_name;
            
            
            // Output: Fieldset Item
            $content_val .= '<div class="item fs-item cp'.$o_content_compound_css.'" data-name="'.$o_content_compound_name.' Fieldset Item CP">';
            $content_val .= '<fieldset class="cr'.$o_content_compound_branch_css.'---cr">';
            $content_val .= '<legend class="h'.$o_content_compound_branch_css.'---h"><span class="h_l'.$o_content_compound_branch_css.'---h_l">'.$o_content_compound_name.'</span></legend>';
            $content_val .= '<div class="ct'.$o_content_compound_branch_css.'---ct">';
            $content_val .= '<div class="ct_cr'.$o_content_compound_branch_css.'---ct_cr">';
            
            
            $actions_content_val = '';
            
            // Group / Actions
            if ( ! empty( $val['actions'] ) ) {
                $r_content_compound_actions = $val['actions'];
                
                foreach ( ( array ) $r_content_compound_actions as $actions_val ) {
                    
                    $p_content_compound_actions_name = '';
                    $p_form_button_type = '';
                    $p_content_compound_actions_css = '';
                    $p_content_compound_actions_branch_css = '';
                    
                    // Name
                    if ( ! empty( $actions_val['name'] ) ) {
                        $r_content_compound_actions_name = $actions_val['name'];
                        $clean_content_compound_actions_name = sanitize_title( $r_content_compound_actions_name );
                        
                        $p_content_compound_actions_name = $r_content_compound_actions_name;
                        
                        $p_clean_content_compound_actions_name = $p_content_compound_branch_css.'-'.$clean_content_compound_actions_name;
                        
                        $p_actions_branch_name_css = $p_clean_content_compound_actions_name;
                    }
                    
                    // CSS
                    if ( ! empty( $actions_val['css'] ) ) {
                        $r_content_compound_actions_css = $actions_val['css'];

                        // Processed
                        $p_content_compound_actions_css = $p_content_compound_css.'-'.$r_content_compound_actions_css.'-'.$p_actions_branch_name_css;
                        $p_content_compound_actions_branch_css = $p_content_compound_actions_css;
                    }

                    else {
                        // Processed
                        $p_content_compound_actions_branch_css = $p_actions_branch_name_css;
                    }
                    
                    // Structure Type
                    if ( ! empty( $actions_val['structure']['type'] ) ) {
                        $r_content_compound_actions_structure = $actions_val['structure']['type'];
                        
                        if ( in_array( $r_content_compound_actions_structure, $structure_form_actions_submit, true ) ) {
                            $p_form_button_type = 'submit';
                        }
                        
                        if ( in_array( $r_content_compound_actions_structure, $structure_form_actions_reset, true ) ) {
                            $p_form_button_type = 'reset';
                        }
                    }
                    
                    $o_form_button_type = $p_form_button_type;
                    $o_content_compound_actions_name = $p_content_compound_actions_name;
                    
                    $o_content_compound_actions_branch_css = $p_content_compound_actions_branch_css;
                    
                    $actions_content_val .= '<div class="obj" data-name="'.$p_actions_branch_name_css.' OBJ">';
                    $actions_content_val .= '<button class="b'.$o_content_compound_actions_branch_css.'---b" type="'.$o_form_button_type.'">';
                    $actions_content_val .= '<span class="b_l'.$o_content_compound_actions_branch_css.'---b_l">';
                    $actions_content_val .= $o_content_compound_actions_name;
                    $actions_content_val .= '</span>';
                    $actions_content_val .= '</button>';
                    $actions_content_val .= '</div><!-- '.$p_actions_branch_name_css.' OBJ -->';
                    
                }
                
                
            }
            
            
            // Group / Form Elements
            if ( ! empty( $val['group'] ) ) {
                $r_content_compound_group = $val['group'];
                
                foreach ( ( array ) $r_content_compound_group as $group_val ) {
                    
                    // Group Count
                    $group_count = '';
                    if ( count( $r_content_compound_group ) > 1 ) {
                        $group_count = 'multiple';
                    } else {
                        $group_count = 'single';
                    }
                    
                    // Initialize
                    $p_content_compound_group_name = '';
                    $p_content_compound_complete_group_name = '';
                    $p_felems_obj_name = '';
                    $p_clean_content_compound_group_name = '';
                    $p_group_branch_name_css = '';
                    $p_content_compound_group_css = '';
                    $p_content_compound_group_branch_css = '';
                    $p_content_compound_group_id = '';
                    $p_content_compound_group_label_for = '';
                    $p_content_compound_layout_elem = '';
                    $p_content_compound_group_name_txt = '';
                    $p_felem_type_css = '';
                    $p_felem_type_name = '';
                    
                    // Defaults
                    $content_compound_layout_elem = 'div';
                    
                    
                    // Name
                    if ( ! empty( $group_val['name'] ) ) {
                        $r_content_compound_group_name = $group_val['name'];
                        $clean_content_compound_group_name = sanitize_title( $r_content_compound_group_name );

                        // Processed
                        $p_content_compound_group_name = $r_content_compound_group_name;
                        
                        $p_content_compound_complete_group_name = $p_content_compound_name.' - '.$r_content_compound_group_name;
                        
                        $p_felems_obj_name = $p_content_compound_name.' - '.$r_content_compound_group_name;
                        $p_clean_content_compound_group_name = $p_content_compound_branch_css.'-'.$clean_content_compound_group_name;
                        $p_group_branch_name_css = $p_clean_content_compound_group_name;
                    }
                    
                    
                    // CSS
                    if ( ! empty( $group_val['css'] ) ) {
                        $r_content_compound_group_css = $group_val['css'];

                        // Processed
                        $p_content_compound_group_css = $p_content_compound_css.'-'.$r_content_compound_group_css;
                        $p_content_compound_group_branch_css = $p_content_compound_group_css;
                    }

                    else {
                        // Processed
                        $p_content_compound_group_branch_css = $p_group_branch_name_css;
                    }
                    
                    
                    // Attribute
                    if ( ! empty( $group_val['structure']['attr'] ) ) {
                        $r_content_compound_group_attr = $group_val['structure']['attr'];
                        
                        $p_content_compound_group_attr = '';
                        foreach ( ( array ) $r_content_compound_group_attr as $key => $val ) {
                            
                            $clean_key = '';
                            $clean_val = '';

                            $clean_key = $key;
                            $clean_val = $val;

                            $p_content_compound_group_attr .= ' '.$clean_key.'="'.$clean_val.'"';
                        }
                    }
                    
                    
                    // ID
                    if ( ! empty( $group_val['structure']['id'] ) ) {
                        $r_content_compound_group_id = $group_val['structure']['id'];
                        
                        // Processed
                        $p_content_compound_group_id = ' '.'id="'.$r_content_compound_group_id.'"';
                        $p_content_compound_group_label_for = $r_content_compound_group_id;
                    }
                    
                    
                    // Layout
                    if ( ! empty( $group_val['structure']['layout'] ) ) {
                        $r_content_compound_group_layout = $group_val['structure']['layout'];
                        
                        if ( in_array( $r_content_compound_group_layout, $layout_inline_terms, true ) ) {
                            $content_compound_layout_elem = 'span';
                        }
                    }
                        
                    // Processed
                    $p_content_compound_layout_elem = $content_compound_layout_elem;
                    $p_content_compound_group_name_txt = ' '.$clean_content_compound_group_name.'---txt';
                    
                    
                    if ( 'single' == $group_count ) {
                        $p_content_compound_felems_css = $p_content_compound_css;
                        $p_content_compound_felems_name = $r_content_compound_name;
                    }
                    
                    else {
                        $p_content_compound_felems_css = $p_content_compound_css.'--'.$clean_content_compound_group_name;
                        $p_content_compound_felems_name = $r_content_compound_name.' - '.$r_content_compound_group_name;
                    }
                    
                    
                    // Output Definitions
                    $o_content_compound_group_css = $p_clean_content_compound_group_name. $p_content_compound_group_css;
                    $o_content_compound_group_branch_css = $p_content_compound_group_branch_css;
                    $o_content_compound_group_id = $p_content_compound_group_id;
                    
                    $o_content_compound_complete_group_name = $p_content_compound_complete_group_name;
                    $o_felems_obj_name = $p_felems_obj_name;
                    
                    $o_content_compound_group_name = $p_content_compound_group_name;
                    
                    $o_group_label_for = $p_content_compound_group_label_for;
                    
                    $o_content_compound_layout_elem = $p_content_compound_layout_elem;
                    $o_content_compound_group_name_txt = $p_content_compound_group_name_txt;
                    
                    
                    
                    
                    // Structure Type
                    if ( ! empty( $group_val['structure']['type'] ) ) {
                        $r_group_structure = $group_val['structure']['type'];
                        
                        // Form Structure Templates
                    
                        // Input
                        $input_smu = '';
                        $input_smu .= '<input'.$o_content_compound_group_id.' class="input-text'.$o_content_compound_group_branch_css.'---input-text"'.$p_content_compound_group_attr.'>';

                        // Textarea
                        $textarea_smu = '';
                        $textarea_smu .= '<textarea'.$o_content_compound_group_id.' class="textarea input-text"'.$p_content_compound_group_attr.'></textarea>';

                        // Textarea
                        $checkbox_smu = '';
                        $checkbox_smu .= '<input'.$o_content_compound_group_id.' class="input-checkbox" type="checkbox"'.$p_content_compound_group_attr.'>';

                        if ( in_array( $r_group_structure, $form_textbox_terms, true ) ) {
                            $o_form_type = $input_smu;
                            
                            $p_felem_type_css = 'text-input';
                            $p_felem_type_name = ' '.'Text Input';
                        }

                        elseif ( in_array( $r_group_structure, $form_textarea_terms, true ) ) {
                            $o_form_type = $textarea_smu;
                            
                            $p_felem_type_css = 'text-input';
                            $p_felem_type_name = ' '.'Text Input';
                        }

                        elseif ( in_array( $r_group_structure, $form_checkbox_terms, true ) ) {
                            $o_form_type = $checkbox_smu;
                            
                            $p_felem_type_css = 'multi-select';
                            $p_felem_type_name = ' '.'Multiple Selection';
                        }
                    }
                    
                    
                    // Output Definitions
                    $o_felem_type_css = $p_felem_type_css;
                    $o_felem_type_name = $p_felem_type_name;

                    
                    // Form Elements
                    $content_val .= '<div class="cp felems'.$o_content_compound_group_css.'" data-name="'.$o_content_compound_complete_group_name.' Form Elements CP">';
                    $content_val .= '<div class="cr'.$o_content_compound_group_branch_css.'---cr">';
                    
                    // Form Label
                    $content_val .= '<'.$o_content_compound_layout_elem.' class="obj flabel'.$o_content_compound_group_branch_css.'-flabel" data-name="'.$o_felems_obj_name.' Form Label OBJ">';
                    $content_val .= '<label class="label'.$o_content_compound_group_branch_css.'-flabel---label" for="'.$o_group_label_for.'"><span class="label_l'.$o_content_compound_group_branch_css.'-flabel---label_l"><span class="txt'.$o_content_compound_group_name_txt.'">'.$o_content_compound_group_name.'</span></span></label>';
                    $content_val .= '</'.$o_content_compound_layout_elem.'><!-- '.$o_content_compound_complete_group_name.' Form Label OBJ -->';
                    
                    // Form Element (Created Element)
                    $content_val .= '<'.$o_content_compound_layout_elem.' class="obj felem'.$o_content_compound_group_branch_css.'-'.$o_felem_type_css.'" data-name="'.$o_felems_obj_name. $o_felem_type_name.' OBJ">';
                    $content_val .= '<'.$o_content_compound_layout_elem.' class="ce'.$o_content_compound_group_branch_css.'-'.$o_felem_type_css.'---ce">';
                    $content_val .= $o_form_type;
                    $content_val .= '</'.$o_content_compound_layout_elem.'>';
                    $content_val .= '</'.$o_content_compound_layout_elem.'><!-- '.$o_felems_obj_name. $o_felem_type_name.' OBJ -->';
                    
                    
                    $content_val .= '</div>';
                    $content_val .= '</div><!-- '.$o_content_compound_complete_group_name.' Form Elements CP -->';
                }
            }
            
            
            
            
            
            
            
            
            $content_val .= '</div>';
            $content_val .= '</div>';
            $content_val .= '</fieldset>';
            $content_val .= '</div><!-- '.$o_content_compound_name.' Fieldset Item CP -->';
            
        }
    }
    
    
    
    // End: X
    
    
    //------------------------ Object Content
    if ( ! empty( $r['content']['object'] ) ) {
        $r_obj_content = $r['content']['object'];
        
        $content_val = '';
        foreach ( ( array ) $r_obj_content as $val ) {
                
            $txt_auto_css = '';
            $txt_css = '';
            $r_content_obj_sep = '';
            $content_val = '';
            
            // Text Content
            if ( ! empty( $val['txt'] ) ) {
                $r_content_obj_txt = preg_replace( $pat_space, $rep_space, trim( $val['txt'] ) );
                
                $clean_txt = substr( sanitize_title( $r_content_obj_txt ), $substr_start, $substr_end );
                
                // If characters can't be converted
                if ( '' == $clean_txt ) {
                    $txt_auto_css = '';
                } else {
                    $txt_auto_css = ' '.$clean_txt.'---txt';
                }
                
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
                $content_val .= $r_content_obj_sep.'<'.$txt_layout_elem.' class="txt'.$txt_css. $txt_auto_css.'">'.$r_content_obj_txt.'</'.$txt_layout_elem.'>';
                
            }
            
            // Lines
            elseif ( ! empty( $val['line'] ) ) {
                $r_content_obj_line = $val['line'];

                foreach ( (array) $r_content_obj_line as $line_val ) {

                    $line_css = '';
                    $line_auto_css = '';

                    if ( ! empty( $line_val[0]['txt'] ) ) {
                        $r_line_txt = preg_replace( $pat_space, $rep_space, trim( $line_val[0]['txt'] ) );

                        $clean_line_txt = substr( sanitize_title( $r_line_txt ), $substr_start, $substr_end );
                
                        // If characters can't be converted
                        if ( '' == $clean_line_txt ) {
                            $line_auto_css = '';
                        } else {
                            $line_auto_css = ' ' . $clean_line_txt.'---line';
                        }
                        

                        if ( is_numeric( $r_line_txt[0] ) ) {
                            $line_auto_css = ' '.'n-'.$clean_line_txt.'---line';
                        }

                        if ( ! empty( $line_val['css'] ) ) {
                            $r_line_css = preg_replace( $pat_space, $rep_space, trim( $line_val['css'] ) );

                            $line_css = ' '.$r_line_css;
                        }
                    }

                    $content_val .= '<'.$txt_layout_elem.' class="line'.$line_css. $line_auto_css.'">';

                    foreach ( (array) $line_val as $line_txt_val ) {

                        $txt = '';
                        $txt_auto_css = '';
                        $txt_css = '';
                        $r_obj_line_sep = '';

                        // Text Content
                        if ( ! empty( $line_txt_val['txt'] ) ) {
                            $r_obj_line_txt = preg_replace( $pat_space, $rep_space, trim( $line_txt_val['txt'] ) );

                            $clean_line_txt = substr( sanitize_title( $r_obj_line_txt ), $substr_start, $substr_end );
                            
                            // If characters can't be converted
                            if ( '' == $clean_line_txt ) {
                                $txt_auto_css = '';
                            } else {
                                $txt_auto_css = ' '.$clean_line_txt.'---txt';
                            }

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
                            
                            $a_smu = '';
                            $a_emu = '';
                            $p_line_txt_attr_a = '';
                
                            // Linked
                            if ( ! empty( $line_txt_val['linked'] ) ) {
                                $r_txt_linked = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $line_txt_val['linked'] ) ) ), $substr_start, $substr_end );
                                
                                if ( $r_txt_linked ) {
                                    
                                    // Attributes of Anchor
                                    if ( ! empty( $line_txt_val['attr']['a'] ) ) {
                                        $r_line_txt_attr_a = $line_txt_val['attr']['a'];

                                        $p_line_txt_attr_a = '';

                                        foreach ( ( array ) $r_line_txt_attr_a as $key => $val ) {

                                            $clean_key = '';
                                            $clean_val = '';

                                            $clean_key = substr( strtolower( preg_replace( $pat_no_space, $rep_no_space, trim( $key ) ) ), $substr_start, $substr_end );

                                            $clean_val = preg_replace( $pat_space, $rep_space, trim( $val ) );

                                            $p_line_txt_attr_a .= ' '.$clean_key.'="'.$clean_val.'"';
                                        }
                                    }
                                    
                                    $a_smu = '';
                                    $a_smu .= '<a'.$p_line_txt_attr_a.'>';
                                    $a_emu = '';
                                    $a_emu .= '</a>';
                                }
                            }
                            
                            $content_val .= $r_obj_line_sep.'<'.$txt_layout_elem.' class="txt'.$txt_auto_css.$txt_css.'">'.$a_smu. $r_obj_line_txt. $a_emu.'</'.$txt_layout_elem.'>';

                        }

                    }

                    $content_val .= '</'.$txt_layout_elem.'>';
                }
            }
            
            else {
                $content_val .= $r_obj_content;
            }
            
            /*
            if ( ! empty( $val['form_elem'] ) ) {
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
            */
        }
    }
        
    // Content Output
    $o_content_val = $content_val;
    $o_actions_content_val = $actions_content_val;
    
    
    /*
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
    */
    
    
    
    
    //------------------------ Section: Markup Structure Templates
    
    
    // Generic Container Structure Markup
    $cr_smu = '';
    $cr_smu .= '<div class="%1$s'.$o_branch_css.'---%1$s">';
    $cr_smu .= '<div class="%1$s_cr'.$o_branch_css.'---%1$s_cr">';
    
    $cr_emu = '';
    $cr_emu .= '</div>';
    $cr_emu .= '</div>';
    
    
    // Form Structure Markup
    $subtype_form_fieldsets_cr_smu = '';
    $subtype_form_fieldsets_cr_smu .= '<div class="grp %1$s'.$o_branch_css.'-%1$s">';
    $subtype_form_fieldsets_cr_smu .= '<div class="cr'.$o_branch_css.'-%1$s---cr">';
    
    $subtype_form_fieldsets_cr_emu = '';
    $subtype_form_fieldsets_cr_emu .= '</div>';
    $subtype_form_fieldsets_cr_emu .= '</div>';
    
    // Form Actions Structure Markup
    $subtype_form_actions_cr_smu = '';
    $subtype_form_actions_cr_smu .= '<div class="%1$s'.$o_branch_css.'-%1$s">';
    $subtype_form_actions_cr_smu .= '<div class="cr'.$o_branch_css.'-%1$s---cr">';
    $subtype_form_actions_cr_smu .= '<div class="hr'.$o_branch_css.'-%1$s---hr">';
    $subtype_form_actions_cr_smu .= '<div class="hr_cr'.$o_branch_css.'-%1$s---hr_cr">';
    $subtype_form_actions_cr_smu .= '<span class="h'.$o_branch_css.'-%1$s---h">Actions</span>';
    $subtype_form_actions_cr_smu .= '</div>';
    $subtype_form_actions_cr_smu .= '</div>';
    $subtype_form_actions_cr_smu .= '<div class="ct'.$o_branch_css.'-%1$s---ct">';
    $subtype_form_actions_cr_smu .= '<div class="ct_cr'.$o_branch_css.'-%1$s---ct_cr">';
    
    $subtype_form_actions_cr_emu = '';
    $subtype_form_actions_cr_emu .= '</div>';
    $subtype_form_actions_cr_emu .= '</div>';
    $subtype_form_actions_cr_emu .= '</div>';
    $subtype_form_actions_cr_emu .= '</div>';
    
    
    // Form Elements Structure Markup
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
    

    // Main Nav Mod
    $main_nav_cr_smu = '';
    $main_nav_cr_smu   .= '<div class="%1$s'.$o_branch_css.'---%1$s">';
    
    $main_nav_cr_emu = '';
    $main_nav_cr_emu     .= '</div>';
    
    
    // Anchor Markup
    $a_smu = '';
    $a_smu .= '<a'.$o_obj_a_id_attr.' class="a '.$o_obj_a_elem_css.'---a'.$o_obj_a_root_css.'" '.$o_obj_a_elem_attr. $p_obj_elem_root_title.'>';
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
    
    
    // Form Element
    $subtype_form_element_cr_smu = '';
    $subtype_form_element_cr_smu .= '<div class="ee">';
    
    $subtype_form_element_cr_emu = '';
    $subtype_form_element_cr_emu .= '</div>';
    
    
    
    
    
    //------------------------ Section: Markup Structure - Header, Content, Footer
    
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
        $ct_mu .= sprintf( $subtype_form_fieldsets_cr_smu,
            'fieldsets'
        );
        $ct_mu .= $o_content_val;
        $ct_mu .= $subtype_form_fieldsets_cr_emu;
        
        
        $ct_mu .= sprintf( $subtype_form_actions_cr_smu,
            'axns'
        );
        $ct_mu .= $o_actions_content_val;
        $ct_mu .= $subtype_form_actions_cr_emu;
    }
    
    /*
    //------------------------ Form Elements Content Markup
    if ( in_array( $r_subtype, $subtype_form_elements_terms, true ) ) {
        $ct_mu = '';
        $ct_mu .= sprintf( $subtype_form_elements_cr_smu,
            'ct'
        );

        $ct_mu .= $o_content_val;
        $ct_mu .= $subtype_form_elements_cr_emu;
    }
    */
    
    
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
        
        // Navigation Item
        elseif ( in_array( $r_subtype, $subtype_navi_terms, true ) ) {
            $obj_ct_mu = '';
            $obj_ct_mu .= $a_smu;
            $obj_ct_mu .= $o_content_val;
            $obj_ct_mu .= $a_emu;
        }
        
        elseif ( in_array( $r_subtype, $subtype_form_element_terms, true ) ) {
            $obj_ct_mu = '';
            $obj_ct_mu .= $a_smu;
            $obj_ct_mu .= $o_content_val;
            $obj_ct_mu .= $a_emu;
        }
    }


    
    //------------------------ Variable Wiper
    
    // Constructor and Component
    if ( ! empty( $r['content']['constructor'] ) || ! empty( $r['content']['component'] ) || ! empty( $r['content']['compound'] ) ) {
        $ct_mu = $ct_mu;
    } else {
        $ct_mu = '';
    }

    // Object
    if ( ! empty( $r['content']['object'] ) ) {
        $obj_ct_mu = $obj_ct_mu;
    } else {
        $obj_ct_mu = '';
    }
    
    // Footer Content
    if ( ! empty( $r['fr_content'] ) ) {
        $fr_mu = $fr_mu;
    } else {
        $fr_mu = '';
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
        
        $output .= $o_content_before;
        
        $output .= '<'.$o_root_elem. $o_id_attr.' class="'.$o_cssx.'"'.$o_attr. $o_title_attr.' data-name="'.$o_structure_name.'">';
        
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
        
        $output .= '</'.$o_root_elem.'><!-- '.$o_structure_name.' -->';
        
        $output .= $o_content_after;
    
    }
    
    $html = apply_filters( 'htmlok', $output, $args );
    
    if ( $r_echo ) {
        echo $html;
    } else {
        return $html;
    }
    
}
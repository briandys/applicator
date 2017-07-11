<?php

if ( ! empty( $r['content']['compound'] ) ) {
        $r_content_compound = $r['content']['compound'];
        
        $content_val = '';
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
                    
                    
                    // Name
                    if ( ! empty( $group_val['name'] ) ) {
                        $r_content_compound_group_name = $group_val['name'];
                        $clean_content_compound_group_name = sanitize_title( $r_content_compound_group_name );

                        // Processed
                        $p_content_compound_group_name = $r_content_compound_group_name;
                        
                        $p_content_compound_complete_group_name = $p_content_compound_name.' - '.$r_content_compound_group_name;
                        
                        $p_felems_obj_name = $p_content_compound_name.' - '.$r_content_compound_group_name;
                        $p_clean_content_compound_group_name = $p_clean_content_compound_name.'-'.$clean_content_compound_group_name;
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
                    
                    
                    if ( 'single' == $group_count ) {
                        $p_content_compound_felems_css = $p_content_compound_css;
                        $p_content_compound_felems_name = $r_content_compound_name;
                    } else {
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
                    
                    
                    // Structure Type
                    if ( ! empty( $group_val['structure']['type'] ) ) {
                        $r_group_structure = $group_val['structure']['type'];
                        
                        // Form Structure Templates
                    
                        // Input
                        $input_smu = '';
                        $input_smu .= '<input'.$o_content_compound_group_id.' class="input input-text'.$p_content_compound_felems_css.'---input-text"'.$p_content_compound_group_attr.'>';

                        // Textarea
                        $textarea_smu = '';
                        $textarea_smu .= '<textarea'.$o_content_compound_group_id.' class="textarea"'.$p_content_compound_group_attr.'></textarea>';

                        // Textarea
                        $checkbox_smu = '';
                        $checkbox_smu .= '<input'.$o_content_compound_group_id.' class="input-checkbox" type="checkbox"'.$p_content_compound_group_attr.'>';

                        if ( in_array( $r_group_structure, $form_textbox_terms, true ) ) {
                            $o_form_type = $input_smu;
                        }

                        elseif ( in_array( $r_group_structure, $form_textarea_terms, true ) ) {
                            $o_form_type = $textarea_smu;
                        }

                        elseif ( in_array( $r_group_structure, $form_checkbox_terms, true ) ) {
                            $o_form_type = $checkbox_smu;
                        }
                    }
                    

                    // Form Elements
                    $content_val .= '<div class="cp felems'.$o_content_compound_group_css.'" data-name="'.$o_content_compound_complete_group_name.' Form Elements CP">';
                    $content_val .= '<div class="cr'.$o_content_compound_group_branch_css.'---cr">';
                    
                    // Form Label
                    $content_val .= '<div class="obj flabel'.$o_content_compound_group_branch_css.'-flabel" data-name="'.$o_felems_obj_name.' Form Label OBJ">';
                    $content_val .= '<label class="label'.$o_content_compound_group_branch_css.'-flabel---label" for="'.$o_group_label_for.'"><span class="label_l'.$o_content_compound_group_branch_css.'-flabel---label_l">'.$o_content_compound_group_name.'</span></label>';
                    $content_val .= '</div><!-- '.$o_content_compound_complete_group_name.' Form Label OBJ -->';
                    
                    // Form Element (Created Element)
                    $content_val .= '<div class="obj felem'.$o_content_compound_group_branch_css.'-felem" data-name="'.$o_felems_obj_name.' Form Element OBJ">';
                    $content_val .= '<div class="ce'.$o_content_compound_group_branch_css.'-felem---ce">';
                    $content_val .= $o_form_type;
                    $content_val .= '</div>';
                    $content_val .= '</div><!-- '.$o_felems_obj_name.' Form Element OBJ -->';
                    
                    
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
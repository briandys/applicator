<?php // Comments Actions Snippet | content.php

/*
Structure

* Comments Actions Snippet (cp) | $comments_actions_snippet

    ** Comments Population (cp) | $comments_population
    
        *** Comments Count (obj) | $comments_count_obj

            • Populated (status) | comments-population--populated
                
                • Single: 1 Comment | $comments_count_single_txt | comments-population--populated--single
                • Multiple: 2 Comments | $comments_count_multi_txt | comments-population--populated--multiple
        
            • Empty (status) | comments-population--empty
                
                • Zero: 0 Comment | $comments_count_zero_txt | comments-population--empty--zero

    
    ** Comment Creation Ability (cp) | $comment_creation_ability
    
        *** Enabled (status) | comment-creation-ability--enabled
        
            **** Add Comment Action (obj) | $add_comment_axn
                
                • Add Comment
        
        *** Disabled (status) | comment-creation-ability--disabled
        
            **** Comment Creation Disabled Note (obj) | $commenting_disabled_note_obj
                
                • Commenting is disabled.
*/

if ( ! function_exists( 'applicator_func_comments_actions_snippet_cp' ) ) {
    function applicator_func_comments_actions_snippet_cp() {
        
        $comments_population_pri_css = 'comments-population';
        $comment_creation_ability_pri_css = 'comment-creation-ability';
        
        $comments_count_sec_css = 'coms-cnt-obj'; // 5
        
        $comments_count_single_text = '1'; // 1
        $comments_count_multi_text = '%';
        $comments_count_zero_text = '0';
        
        $comments_count_num_css = 'comments-count'; // 2
        
        $comment_singular_text = 'Comment'; // 3
        $comment_plural_text = 'Comments';
        
        $comment_singular_text_css = 'comment'; // 4
        $comment_plural_text_css = 'comments';
        
        
        // Comments Count: Single - Text
        $comments_count_single_txt = htmlok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( $comments_count_single_text, $GLOBALS['applicator_td'] ),
                    'css' => $comments_count_num_css,
                ),
                array(
                    'txt' => esc_html__( $comment_singular_text, $GLOBALS['applicator_td'] ),
                    'sep' => $GLOBALS['space_sep'],
                ),
            ),
        ) );
        
        // Comments Count: Multiple - Text
        $comments_count_multi_txt = htmlok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( $comments_count_multi_text, $GLOBALS['applicator_td'] ),
                    'css' => $comments_count_num_css,
                ),
                array(
                    'txt' => esc_html__( $comment_plural_text, $GLOBALS['applicator_td'] ),
                    'sep' => $GLOBALS['space_sep'],
                ),
            ),
        ) );
        
        // Comments Count: Zero - Text
        $comments_count_zero_txt = htmlok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( $comments_count_zero_text, $GLOBALS['applicator_td'] ),
                    'css' => $comments_count_num_css,
                ),
                array(
                    'txt' => esc_html__( $comment_singular_text, $GLOBALS['applicator_td'] ),
                    'sep' => $GLOBALS['space_sep'],
                ),
            ),
        ) );
        
        
        $comments_count_int = (int) get_comments_number( get_the_ID() );
        
        // Comments Populated
        if ( $comments_count_int >= 1 ) {

            $comments_count_obj_a = sprintf( get_comments_popup_link(
                // Comments Count: Zero
                '',

                // Comments Count: Single
                $comments_count_single_txt,

                // Comments Count: Multiple
                $comments_count_multi_txt,

                // Class Name for <a> (WP-Generated or WPG)
                'a' . ' ' . $comments_count_sec_css . '---a',

                // Comment Creation Disabled
                ''
            ) );
            
            $comments_count_obj_a_link = '';

        // Comments Empty
        } else {
            
            /* If there are no Comments, make the text a link like get_comments_popup_link(). */
            
            /* If Comments Actions Snippet is in index, use permalink. */
            if ( ! is_singular() ) {
                $comments_count_obj_a_link = esc_url( get_permalink() );
            } else {
                $comments_count_obj_a_link = '';
            }
            
            $comments_count_obj_a = $comments_count_zero_txt;
        
        }
        
        // Object
        $comments_count_obj = htmlok_obj( array(
            'name'      => 'Comments Count',
            'elem'      => 'a',
            'css'       => $comments_count_sec_css,
            'attr'      => array(
                'href'      => $comments_count_obj_a_link . '#comments',
            ),
            'content'   => $comments_count_obj_a,
        ) );
        
        // Component
        $comments_population = htmlok_cp( array(
            'name'      => 'Comments Population',
            'css'       => 'coms-population',
            'content'   => $comments_count_obj
        ) );
        
        
        // Comment Creation Enabled
        if ( comments_open() ) {
            
            $respond_hash = '#respond';
            $comment_hash = '#comment';

            // Add Comment Action Anchor Href
            if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                if ( is_singular() ) {
                    $add_comment_axn_a_href = $respond_hash;
                } else {
                    $add_comment_axn_a_href = esc_url( get_permalink() ) . $respond_hash;
                }
            } else {
                if ( is_singular() ) {
                    $add_comment_axn_a_href = $comment_hash;
                } else {
                    $add_comment_axn_a_href = esc_url( get_permalink() ) . $comment_hash;
                }
            }
            
            // Text
            $add_comment_axn_txt = htmlok_txt( array(
                'content' => array(
                    array(
                        'txt' => esc_html__( 'Add', $GLOBALS['applicator_td'] ),
                    ),
                    array(
                        'txt' => esc_html__( 'Comment', $GLOBALS['applicator_td'] ),
                        'sep' => $GLOBALS['space_sep'],
                    ),
                ),
            ) );
            
            // Object
            $add_comment_axn = htmlok_obj( array(
                'name'      => 'Add Comment Action',
                'layout'    => 'i',
                'elem'      => 'a',
                'obj_css'   => 'add-comment-axn',
                'css'       => 'add-com-axn',
                'attr'      => array(
                    'href'      => $add_comment_axn_a_href,
                ),
                'content'   => $add_comment_axn_txt,
            ) );

            
            if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                /*
                // Markup
                $sign_in_required_label_obj_g_mu = '<span class="g %2$s---g">';
                    $sign_in_required_label_obj_g_mu .= '<span class="g_l %2$s---g_l">';
                        $sign_in_required_label_obj_g_mu .= '%1$s';
                    $sign_in_required_label_obj_g_mu .= '</span>';
                $sign_in_required_label_obj_g_mu .= '</span>';

                $sign_in_required_label_obj_g = sprintf( $sign_in_required_label_obj_g_mu,
                    esc_html__( '(requires Sign In)', $GLOBALS['applicator_td'] ),
                    'req-sign-in-lbl-obj'
                );
                
                // Markup
                $sign_in_required_label_obj = applicator_html_ok_mco( array(
                    'type'      => 'o',
                    'name'      => 'Sign In Required Label',
                    'sec_css'   => 'sign-in-req-lbl'
                ) );
                */
                
                // Text
                $sign_in_required_label_txt = htmlok_txt( array(
                    'content' => array(
                        array(
                            'txt' => esc_html__( '(requires Sign In)', $GLOBALS['applicator_td'] ),
                        ),
                    ),
                ) );

                // Object
                $sign_in_required_label_obj = htmlok_obj( array(
                    'name'      => 'Sign In Required Label',
                    'layout'    => 'i',
                    'elem'      => 'g',
                    'css'       => 'sign-in-req-lbl',
                    'content'   => $sign_in_required_label_txt,
                ) );
            
            } else {
                $sign_in_required_label_obj = '';
            }

            $comment_creation_ability_content = $add_comment_axn . $sign_in_required_label_obj;

        // Comment Creation Disabled
        } else {
            
            // Object
            $commenting_disabled_note_obj = htmlok_obj( array(
                'name'      => 'Commenting Disabled Note',
                'elem'      => 'n',
                'obj_css'   => 'note',
                'css'       => 'commenting-disabled-note',
                'content'   => '<p>' . esc_html__( 'Commenting is disabled.', $GLOBALS['applicator_td'] ) . '</p>',
            ) );
            
            $comment_creation_ability_content = $commenting_disabled_note_obj;
            
        }
        
        // Component
        $comment_creation_ability = htmlok_cp( array (
            'name'      => 'Comment Creation Ability',
            'css'   => 'com-crt-ability',
            'content'   => $comment_creation_ability_content
        ) );
        
        /*
        We have two statuses of Comments Population: Populated and Empty.
        Under Populated: Single and Multi.
        Under Empty: Zero
        */
        // Comments Population Status Class Names
        $comments_population_populated_css = 'populated';
        $comments_population_populated_single_css = 'single';
        $comments_population_populated_multiple_css = 'multiple';
        
        $comments_population_empty_css = 'empty';
        $comments_population_empty_zero_css = 'zero';
        
        // Comment Creation Ability Status Class Names
        $comment_creation_ability_enabled_css = 'enabled';
        $comment_creation_ability_disabled_css = 'disabled';
        
        /* Conditionals for Comments Population Class Names */
        if ( $comments_count_int == 1 ) {
            
            $comments_population_status_css = $comments_population_pri_css . '--' . $comments_population_populated_css . ' ' . $comments_population_pri_css . '--' . $comments_population_populated_css . '--' . $comments_population_populated_single_css;
        
        } elseif ( $comments_count_int > 1 ) {
            
            $comments_population_status_css = $comments_population_pri_css . '--' . $comments_population_populated_css . ' ' . $comments_population_pri_css . '--' . $comments_population_populated_css . '--' . $comments_population_populated_multiple_css;
        
        } elseif ( $comments_count_int == 0 ) {
            
            $comments_population_status_css = $comments_population_pri_css . '--' . $comments_population_empty_css . ' ' . $comments_population_pri_css . '--' . $comments_population_empty_css . '--' . $comments_population_empty_zero_css;
        }
        
        /* Conditionals for Comment Creation Ability Class Names */
        if ( comments_open() ) {
            $comment_creation_ability_status_css = $comment_creation_ability_pri_css . '--' . $comment_creation_ability_enabled_css;
        } else {
            $comment_creation_ability_status_css = $comment_creation_ability_pri_css . '--' . $comment_creation_ability_disabled_css;
        }
        
        // Component
        $comments_actions_snippet = htmlok_cp( array(
            'name'      => 'Comments Actions Snippet',
            'cp_css'    => $comments_population_status_css . ' ' . $comment_creation_ability_status_css,
            'css'       => 'coms-acts-snip',
            'content'   => $comments_population . $comment_creation_ability,
            //'echo'      => true,
        ) );
        
        return $comments_actions_snippet;
        
    }
}
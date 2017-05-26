<?php // Comments Actions Snippet | content.php

/*
Structure

* Comments Actions Snippet (cp) | $comments_actions_snippet

    ** Comments Population (cp) | $comments_population
    
        *** Comments Count (obj) | $comments_count_obj

            • Populated (status) | comments-population--populated
                
                • Single: 1 Comment | $comments_count_a_l_single | comments-population--populated--single
                • Multiple: 2 Comments | $comments_count_a_l_multi | comments-population--populated--multiple
        
            • Empty (status) | comments-population--empty
                
                • Zero: 0 Comment | $comments_count_a_l_zero | comments-population--empty--zero

    
    ** Comment Creation Ability (cp) | $comment_creation_ability
    
        *** Enabled (status) | comment-creation-ability--enabled
        
            **** Add Comment Action (obj) | $add_comment_axn
                
                • Add Comment
        
        *** Disabled (status) | comment-creation-ability--disabled
        
            **** Comment Creation Disabled Note (obj) | $commenting_disabled_note_obj
                
                • Commenting is disabled.
*/

if ( ! function_exists( 'applicator_func_comments_actions_snippet' ) ) {
    function applicator_func_comments_actions_snippet() {
        
        $comments_population_pri_css = 'comments-population';
        $comment_creation_ability_pri_css = 'comment-creation-ability';
        
        $comments_count_sec_css = 'coms-cnt-obj'; // 5
        
        $comments_count_single_txt = '1'; // 1
        $comments_count_multi_txt = '%';
        $comments_count_zero_txt = '0';
        
        $comments_count_num_css = 'comments-count'; // 2
        
        $comment_singular_txt = 'Comment'; // 3
        $comment_plural_txt = 'Comments';
        
        $comment_singular_txt_css = 'comment'; // 4
        $comment_plural_txt_css = 'comments';
        
        
        // Comments Count: Single - Text
        $comments_count_a_l_single = applicator_html_ok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( $comments_count_single_txt, $GLOBALS['apl_textdomain'] ),
                    'css' => $comments_count_num_css,
                ),
                array(
                    'txt' => esc_html__( $comment_singular_txt, $GLOBALS['apl_textdomain'] ),
                    'sep' => $GLOBALS['space_sep'],
                ),
            ),
        ) );
        
        // Comments Count: Multiple - Text
        $comments_count_a_l_multi = applicator_html_ok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( $comments_count_multi_txt, $GLOBALS['apl_textdomain'] ),
                    'css' => $comments_count_num_css,
                ),
                array(
                    'txt' => esc_html__( $comment_plural_txt, $GLOBALS['apl_textdomain'] ),
                    'sep' => $GLOBALS['space_sep'],
                ),
            ),
        ) );
        
        // Comments Count: Zero - Text
        $comments_count_a_l_zero = applicator_html_ok_txt( array(
            'content' => array(
                array(
                    'txt' => esc_html__( '0', $GLOBALS['apl_textdomain'] ),
                    'css' => $comments_count_num_css,
                ),
                array(
                    'txt' => esc_html__( $comment_singular_txt, $GLOBALS['apl_textdomain'] ),
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
                $comments_count_a_l_single,

                // Comments Count: Multiple
                $comments_count_a_l_multi,

                // Class Name for <a> (WP-Generated or WPG)
                'a' . ' ' . $comments_count_sec_css . '---a',

                // Comment Creation Disabled
                ''
            ) );

        // Comments Empty
        } else {
            
            /* If there are no Comments, make the text a link like get_comments_popup_link(). */
            
            /* If Comments Actions Snippet is in index, use permalink. */
            if ( ! is_singular() ) {
                $comments_count_obj_a_link = esc_url( get_permalink() );
            } else {
                $comments_count_obj_a_link = '';
            }
            
            $comments_count_obj_a = $comments_count_a_l_zero;
        
        }
        
        // Object
        $comments_count_obj = applicator_html_ok_obj( array(
            'name'      => 'Comments Count',
            'elem'      => 'a',
            'css'       => $comments_count_sec_css,
            'attr'      => array(
                'href'      => $comments_count_obj_a_link . '#comments',
            ),
            'content'   => $comments_count_obj_a,
        ) );
        
        // Component
        $comments_population = applicator_html_ok_mco_test( array(
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
            
            // Markup
            $add_comment_axn_a_mu = '<a class="a %5$s---a" href="%6$s">';
                $add_comment_axn_a_mu .= '<span class="a_l %5$s---a_l">';
                    $add_comment_axn_a_mu .= '<span class="txt %2$s---txt">%1$s</span>';
                    $add_comment_axn_a_mu .= ' <span class="txt %4$s---txt">%3$s</span>';
                $add_comment_axn_a_mu .= '</span>';
            $add_comment_axn_a_mu .= '</a>';
            
            // Content
            $add_comment_axn_a = sprintf( $add_comment_axn_a_mu,
                esc_html__( 'Add', $GLOBALS['apl_textdomain'] ),
                    'add',
                esc_html__( 'Comment', $GLOBALS['apl_textdomain'] ),
                    'comment',        
                'add-comment-axn',
                $add_comment_axn_a_href
            );
            
            // Markup
            $add_comment_axn = applicator_html_ok_mco( array(
                'type'      => 'o',
                'name'      => 'Add Comment Action',
                'sec_css'   => 'add-com-axn',
                'content'   => $add_comment_axn_a
            ) );

            
            if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                
                // Markup
                $sign_in_required_label_obj_g_mu = '<span class="g %2$s---g">';
                    $sign_in_required_label_obj_g_mu .= '<span class="g_l %2$s---g_l">';
                        $sign_in_required_label_obj_g_mu .= '%1$s';
                    $sign_in_required_label_obj_g_mu .= '</span>';
                $sign_in_required_label_obj_g_mu .= '</span>';

                $sign_in_required_label_obj_g = sprintf( $sign_in_required_label_obj_g_mu,
                    esc_html__( '(requires Sign In)', $GLOBALS['apl_textdomain'] ),
                    'req-sign-in-lbl-obj'
                );
                
                // Markup
                $sign_in_required_label_obj = applicator_html_ok_mco( array(
                    'type'      => 'o',
                    'name'      => 'Sign In Required Label',
                    'sec_css'   => 'sign-in-req-lbl'
                ) );
            
            } else {
                $sign_in_required_label_obj = '';
            }

            $comment_creation_ability_content = sprintf( $add_comment_axn . $sign_in_required_label_obj );

        // Comment Creation Disabled
        } else {
            
            // Object
            $commenting_disabled_note_obj = applicator_html_ok_obj( array(
                'name'      => 'Commenting Disabled Note',
                'elem'      => 'n',
                'obj_css'   => 'note',
                'css'       => 'commenting-disabled-note',
                'content'   => '<p>' . esc_html__( 'Commenting is disabled.', $GLOBALS['apl_textdomain'] ) . '</p>',
            ) );
            
            $comment_creation_ability_content = $commenting_disabled_note_obj;
            
        }
        
        // Component
        $comment_creation_ability = applicator_html_ok_mco_test( array (
            'name'      => 'Comment Creation Ability',
            'sec_css'   => 'com-crt-ability',
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
        
        // Content - Component
        $comments_actions_snippet = applicator_html_ok_mco_test( array(
            'name'      => 'Comments Actions Snippet',
            'css'       => $comments_population_status_css . ' ' . $comment_creation_ability_status_css,
            'sec_css'   => 'coms-acts-snip',
            'content'   => $comments_population . $comment_creation_ability,
            'echo'      => true,
        ) );
        
    }
}
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
        
        /* Start with setting up objects */
        
        /* First is Comments Count Object */
        
        /* Let's put here the markup first because this will be used by the objects. */
        
        // Markup
        $comments_count_obj_a_l_mu = '<span class="a_l %5$s---a_l" title="%6$s">';
            $comments_count_obj_a_l_mu .= '<span class="num %2$s---num">%1$s</span>';
            $comments_count_obj_a_l_mu .= ' <span class="txt %4$s---txt">%3$s</span>';
        $comments_count_obj_a_l_mu .= '</span>';
        
        
        // Content
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
        
        
        // Comments Count: Single
        $comments_count_a_l_single = sprintf( $comments_count_obj_a_l_mu,
            esc_html__( $comments_count_single_txt, $GLOBALS['apl_textdomain'] ),
                $comments_count_num_css,
            esc_html__( $comment_singular_txt, $GLOBALS['apl_textdomain'] ),
                $comment_singular_txt_css,
            $comments_count_sec_css,
            esc_attr__( $comments_count_single_txt . ' ' . $comment_singular_txt, $GLOBALS['apl_textdomain'] )
        );
        
        // Comments Count: Multiple
        $comments_count_a_l_multi = sprintf( $comments_count_obj_a_l_mu,
            esc_html__( $comments_count_multi_txt, $GLOBALS['apl_textdomain'] ),
                $comments_count_num_css,
            esc_html__( $comment_plural_txt, $GLOBALS['apl_textdomain'] ),
                $comment_plural_txt_css,
            $comments_count_sec_css,
            esc_attr__( $comments_count_multi_txt . ' ' . $comment_plural_txt, $GLOBALS['apl_textdomain'] )
        );
        
        // Comments Count: Zero
        $comments_count_a_l_zero = sprintf( $comments_count_obj_a_l_mu,
            esc_html__( $comments_count_zero_txt, $GLOBALS['apl_textdomain'] ),
                $comments_count_num_css,
            esc_html__( $comment_singular_txt, $GLOBALS['apl_textdomain'] ),
                $comment_singular_txt_css,
            $comments_count_sec_css,
            esc_attr__( $comments_count_zero_txt . ' ' . $comment_singular_txt, $GLOBALS['apl_textdomain'] )
        );
        
        
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
            
            // Markup
            $comments_count_obj_a_mu = '<a class="a %2$s---a" href="%3$s#comments">';
                $comments_count_obj_a_mu .= '%1$s';
            $comments_count_obj_a_mu .= '</a>';
            
            /* If Comments Actions Snippet is in index, use permalink. */
            if ( ! is_singular() ) {
                $comments_count_obj_a_link = esc_url( get_permalink() );
            } else {
                $comments_count_obj_a_link = '';
            }

            // Comments Count: Zero
            $comments_count_obj_a = sprintf( $comments_count_obj_a_mu,
                $comments_count_a_l_zero,
                $comments_count_sec_css,
                $comments_count_obj_a_link
            );
        
        }
        
        // Markup
        $comments_count_obj = applicator_html_ok_mco( array(
            'type'      => 'o',
            'name'      => 'Comments Count',
            'sec_css'   => $comments_count_sec_css,
            'content'   => $comments_count_obj_a
        ) );
        
        // Markup
        $comments_population = applicator_html_ok_mco( array(
            'name'      => 'Comments Population',
            'sec_css'   => 'coms-population',
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
            
            // Markup
            $commenting_disabled_note_obj_g_mu = '<div class="g %2$s---g">';
                $commenting_disabled_note_obj_g_mu .= '<div class="g_l %2$s---g_l">';
                    $commenting_disabled_note_obj_g_mu .= '%1$s';
                $commenting_disabled_note_obj_g_mu .= '</div>';
            $commenting_disabled_note_obj_g_mu .= '</div>';
            
            // Content
            $commenting_disabled_note_obj_g = sprintf( $commenting_disabled_note_obj_g_mu,
                '<p>' . esc_html__( 'Commenting is disabled.', $GLOBALS['apl_textdomain'] ) . '</p>',
                'commenting-disabled-note-obj'
            );
            
            // Content
            $commenting_disabled_note_obj = applicator_html_ok_mco( array(
                'type'      => 'o',
                'name'      => 'Commenting Disabled Note',
                'sec_css'   => 'commenting-disabled-note',
                'content'   => $commenting_disabled_note_obj_g
            ) );
            
            // Markup
            $comment_creation_ability_content = sprintf( $commenting_disabled_note_obj );
            
        }
        
        // Content
        $comment_creation_ability = applicator_html_ok_mco( array (
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
        
        // Display
        $comments_actions_snippet = applicator_html_ok_mco( array (
            'name'      => 'Comments Actions Snippet',
            'pri_css'   => $comments_population_status_css . ' ' . $comment_creation_ability_status_css,
            'sec_css'   => 'coms-acts-snip',
            'content'   => $comments_population . $comment_creation_ability,
            'echo'      => true
        ) );
        
    }
}
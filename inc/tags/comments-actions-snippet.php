<?php // Comments Actions Snippet | content.php

if ( ! function_exists( 'applicator_func_comments_actions_snippet' ) ) {
    function applicator_func_comments_actions_snippet() {
        
        // Markup
        $comments_actions_snippet_mu = '<div class="cp %2$s" data-name="%1$s">';
            $comments_actions_snippet_mu .= '<div class="cr %3$s---cr">';
                $comments_actions_snippet_mu .= '<div class="hr %3$s---hr">';
                    $comments_actions_snippet_mu .= '<div class="hr_cr %3$s---hr_cr">';
                        $comments_actions_snippet_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%1$s</span></div>';
                    $comments_actions_snippet_mu .= '</div>';
                $comments_actions_snippet_mu .= '</div>';
                $comments_actions_snippet_mu .= '<div class="ct %3$s---ct">';
                        $comments_actions_snippet_mu .= '<div class="ct_cr %3$s---ct_cr">%4$s</div>';
                $comments_actions_snippet_mu .= '</div><!-- ct -->';
            $comments_actions_snippet_mu .= '</div>';
        $comments_actions_snippet_mu .= '</div><!-- %1$s -->';
        
        // Markup
        $comments_population_mu = '<div class="cp %2$s" data-name="%1$s">';
            $comments_population_mu .= '<div class="cr %3$s---cr">';
                $comments_population_mu .= '<div class="hr %3$s---hr">';
                    $comments_population_mu .= '<div class="hr_cr %3$s---hr_cr">';
                        $comments_population_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%1$s</span></div>';
                    $comments_population_mu .= '</div>';
                $comments_population_mu .= '</div>';
                $comments_population_mu .= '<div class="ct %3$s---ct">';
                        $comments_population_mu .= '<div class="ct_cr %3$s---ct_cr">%4$s</div>';
                $comments_population_mu .= '</div><!-- ct -->';
            $comments_population_mu .= '</div>';
        $comments_population_mu .= '</div><!-- %1$s -->';
        
        // Markup
        $comments_count_number_obj_mu = '<div class="obj %2$s" data-name="%1$s">';
            $comments_count_number_obj_mu .= '<div class="g %3$s---g">%4$s</div>';
        $comments_count_number_obj_mu .= '</div>';

        // Markup
        $coms_cnt_num_obj_a_l_mu = '<span class="a_l %6$s---a_l" title="%5$s"><span class="num %2$s---num">%1$s</span> <span class="txt %4$s---txt">%3$s</span></span>';

        // Markup
        $coms_cnt_num_obj_a_zero_mu = '<a class="a %3$s---a" href="%2$s#comments">%1$s</a>';
        
        // Markup
        $comments_ability_mu = '<div class="cp %2$s" data-name="%1$s">';
            $comments_ability_mu .= '<div class="cr %3$s---cr">';
                $comments_ability_mu .= '<div class="hr %3$s---hr">';
                    $comments_ability_mu .= '<div class="hr_cr %3$s---hr_cr">';
                        $comments_ability_mu .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%1$s</span></div>';
                    $comments_ability_mu .= '</div>';
                $comments_ability_mu .= '</div>';
                $comments_ability_mu .= '<div class="ct %3$s---ct">';
                        $comments_ability_mu .= '<div class="ct_cr %3$s---ct_cr">%4$s</div>';
                $comments_ability_mu .= '</div><!-- ct -->';
            $comments_ability_mu .= '</div>';
        $comments_ability_mu .= '</div><!-- %1$s -->';

        // Markup
        $add_com_axn_mu = '<span class="obj axn %2$s" title="%9$s" data-name="%1$s">';
            $add_com_axn_mu .= '<a class="a %3$s---a" href="%8$s"><span class="a_l %3$s---a_l">';
                $add_com_axn_mu .= '<span class="txt %5$s---txt">%4$s</span>';
                $add_com_axn_mu .= ' <span class="txt %7$s---txt">%6$s</span>';
            $add_com_axn_mu .= '</span></a>';
        $add_com_axn_mu .= '</span><!-- %1$s -->';

        // Markup
        $req_sign_in_lbl_obj_mu = ' <span class="obj note %2$s" data-name="%1$s">';
            $req_sign_in_lbl_obj_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l">';
                $req_sign_in_lbl_obj_mu .= '%4$s';
            $req_sign_in_lbl_obj_mu .= '</span></span>';
        $req_sign_in_lbl_obj_mu .= '</span><!-- %1$s -->';
        
        // Markup
        $commenting_disabled_note_mu = '<div class="obj note %2$s" data-name="%1$s">';
            $commenting_disabled_note_mu .= '<div class="g %3$s---g">';
                $commenting_disabled_note_mu .= '<div class="g_l %3$s---g_l">';
                    $commenting_disabled_note_mu .= '%4$s';
                $commenting_disabled_note_mu .= '</div>';
            $commenting_disabled_note_mu .= '</div>';
        $commenting_disabled_note_mu .= '</div><!-- %1$s -->';
        
        
        $comments_count_int = (int) get_comments_number( get_the_ID() );

        $comment_creation_css = 'comment-creation';
        $comments_count_css = 'comments-count';

        $status_enabled_css = '--enabled';
        $status_disabled_css = '--disabled';
        $status_populated_css = '--populated';
        $status_empty_css = '--empty';

        // Comment Creation Ability Status Class
        if ( comments_open() ) {
            $comment_creation_ability_stat_css = $comment_creation_css . $status_enabled_css;
        } else {
            $comment_creation_ability_stat_css = $comment_creation_css . $status_disabled_css;
        }

        // Comments Count Population Status Class
        if ( 0 === $comments_count_int ) {
            $comments_count_pop_stat_css = $comments_count_css . $status_empty_css . ' ' . $comments_count_css . '--zero';
        } elseif ( 1 === $comments_count_int ) {
            $comments_count_pop_stat_css = $comments_count_css . $status_populated_css . ' ' . $comments_count_css . '--single';
        } elseif ( 1 < $comments_count_int ) {
            $comments_count_pop_stat_css = $comments_count_css . $status_populated_css . ' ' . $comments_count_css . '--multiple';
        }
        
        
        // Comments Population
        if ( ! is_singular() ) {
            $coms_cnt_num_obj_a_zero_link = esc_url( get_permalink() );
        } else {
            $coms_cnt_num_obj_a_zero_link = '';
        }
        
        $coms_cnt_num_obj = 'coms-cnt-num-obj';

        $comments_count_zero = sprintf( $coms_cnt_num_obj_a_l_mu,
            esc_html__( '0', $GLOBALS['apl_textdomain'] ),
            'comments-count',
            esc_html__( 'Comment', $GLOBALS['apl_textdomain'] ),
            'comment',
            esc_attr__( '0 Comment', $GLOBALS['apl_textdomain'] ),
            $coms_cnt_num_obj
        );

        $comments_count_single = sprintf( $coms_cnt_num_obj_a_l_mu,
            esc_html__( '1', $GLOBALS['apl_textdomain'] ),
            'comments-count',
            esc_html__( 'Comment', $GLOBALS['apl_textdomain'] ),
            'comment',
            esc_attr__( '1 Comment', $GLOBALS['apl_textdomain'] ),
            $coms_cnt_num_obj
        );

        $comments_population_multi = sprintf( $coms_cnt_num_obj_a_l_mu,
            esc_html__( '%', $GLOBALS['apl_textdomain'] ),
            'comments-count',
            esc_html__( 'Comments', $GLOBALS['apl_textdomain'] ),
            'comments',
            esc_attr__( '% Comments', $GLOBALS['apl_textdomain'] ),
            $coms_cnt_num_obj
        );
        
        // Content
        $coms_cnt_num_obj_a_zero = sprintf( $coms_cnt_num_obj_a_zero_mu,
            $comments_count_zero,
            $coms_cnt_num_obj_a_zero_link,
            $coms_cnt_num_obj
        );

        // Status: Populated
        if( $comments_count_int >= 1 ) {

            // Content
            $comments_count = sprintf( get_comments_popup_link(
                // Zero Comment
                '',

                // Single Comment
                $comments_count_single,

                // Multiple Comments
                $comments_population_multi,

                // CSS Class
                'a' . ' ' . $coms_cnt_num_obj . '---a',

                // Comments Disabled
                ''
            ) );

        // Status: Empty
        } else {

            // Content
            $comments_count = sprintf( $coms_cnt_num_obj_a_zero );
        }
        
        // Content
        $comments_count_number_obj = sprintf( $comments_count_number_obj_mu,
            'Comments Count Number Object',
            'comments-count-number-obj',
            'coms-cnt-num-obj',
            $comments_count
        );
        
        // Content
        $comments_population = sprintf( $comments_population_mu,
            'Comments Count',
            'comments-count',
            'coms-cnt',
            $comments_count_number_obj
        );
        
        
        // Comments Ability
        // Status: Enabled
        if ( comments_open() ) {

            // Add Comment Action Anchor
            if ( is_singular() ) {
                if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                    $add_com_axn_anchor = '#respond';
                } else {
                    $add_com_axn_anchor = '#comment';
                }
            } else {
                if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                    $add_com_axn_anchor = esc_url( get_permalink() ) . '#respond';
                } else {
                    $add_com_axn_anchor = esc_url( get_permalink() ) . '#comment';
                }
            }

            // Content
            $add_com_axn = sprintf( $add_com_axn_mu,
                'Add Comment Action',
                'add-comment-axn',
                'add-com-axn',
                esc_html__( 'Add', $GLOBALS['apl_textdomain'] ),
                'add',
                esc_html__( 'Comment', $GLOBALS['apl_textdomain'] ),
                'comment',
                $add_com_axn_anchor,
                esc_attr__( 'Add Comment', $GLOBALS['apl_textdomain'] )
            );

            if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {

                // Content
                $req_sign_in_lbl_obj = sprintf( $req_sign_in_lbl_obj_mu,
                    'Requires Sign In Label Object',
                    'requires-sign-in-label-obj',
                    'req-sign-in-lbl-obj',
                    esc_html__( '(requires Sign In)', $GLOBALS['apl_textdomain'] )
                );
            } else {
                $req_sign_in_lbl_obj = '';
            }

            $comments_ability_status = sprintf( $add_com_axn . $req_sign_in_lbl_obj );

        // Status: Disabled
        } else {
            
            // Display
            $comments_ability_status = sprintf( $commenting_disabled_note_mu,
                'Commenting Disabled Note',
                'commenting-disabled-note',
                'commenting-disabled-note',
                '<p>' . esc_html__( 'Commenting is disabled.', $GLOBALS['apl_textdomain'] ) . '</p>'
            );
        }
        
        // Content
        $comments_ability = sprintf( $comments_ability_mu,
            'Comments Ability',
            'comments-ability',
            'coms-ability',
            $comments_ability_status
        );
        
        // Display
        printf( $comments_actions_snippet_mu,
            'Comments Actions Snippet',
            'comments-actions-snippet' . ' ' . $comments_count_pop_stat_css . ' ' . $comment_creation_ability_stat_css,
            'coms-acts-snip',
            $comments_population . $comments_ability
        );
    }
}
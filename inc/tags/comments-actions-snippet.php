<?php // Comments Actions Snippet | content.php

if ( ! function_exists( 'apl_func_comments_actions_snippet' ) ) {
    function apl_func_comments_actions_snippet() {
        
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
        } ?>
        
        <div class="cp comments-actions-snippet <?php echo $comments_count_pop_stat_css . ' ' . $comment_creation_ability_stat_css ?>" data-name="Comments Actions Snippet">
            <div class="cr coms-acts-snip---cr">
                <div class="h coms-acts-snip---h"><span class="h_l coms-acts-snip---h_l"><?php esc_html_e( 'Comments Actions Snippet', $GLOBALS['apl_textdomain'] ); ?></span></div>
                <div class="ct coms-acts-snip---ct">
                    <div class="ct_cr coms-acts-snip---ct_cr">
                        
                        <div class="cp comments-count" data-name="Comments Count">
                            <div class="cr coms-cnt---cr">
                                <div class="h coms-cnt---h"><span class="h_l coms-cnt---h_l">Comments Count</span></div>
                                <div class="ct coms-cnt---ct">
                                    <div class="ct_cr coms-cnt---ct_cr">
                                        <div class="obj comments-count-number-obj" data-name="Comments Count Object">
                                            <span class="g coms-cnt-num-obj---g">
                                                <span class="g_l coms-cnt-num-obj---g_l">

                                                <?php
                                                // Markup
                                                $coms_cnt_num_obj_a_l_mu = '<span class="a_l coms-cnt-num-obj---a_l" title="%5$s"><span class="num %2$s---num">%1$s</span> <span class="word %4$s---word">%3$s</span></span>';
        
                                                if ( ! is_singular() ) {
                                                    $coms_cnt_num_obj_a_zero_link = esc_url( get_permalink() );
                                                } else {
                                                    $coms_cnt_num_obj_a_zero_link = '';
                                                }
        
                                                // Markup
                                                $coms_cnt_num_obj_a_zero_mu = '<a class="a coms-cnt-num-obj---a" href="%2$s#comments">%1$s</a>';
        
                                                $comments_count_zero = sprintf( $coms_cnt_num_obj_a_l_mu,
                                                    esc_html__( '0', 'applicator' ),
                                                    'comments-count',
                                                    esc_html__( 'Comment', 'applicator' ),
                                                    'comment',
                                                    esc_attr__( '0 Comment', 'applicator' )
                                                );
        
                                                $comments_count_single = sprintf( $coms_cnt_num_obj_a_l_mu,
                                                    esc_html__( '1', 'applicator' ),
                                                    'comments-count',
                                                    esc_html__( 'Comment', 'applicator' ),
                                                    'comment',
                                                    esc_attr__( '1 Comment', 'applicator' )
                                                );
        
                                                $comments_count_multi = sprintf( $coms_cnt_num_obj_a_l_mu,
                                                    esc_html__( '%', 'applicator' ),
                                                    'comments-count',
                                                    esc_html__( 'Comments', 'applicator' ),
                                                    'comments',
                                                    esc_attr__( '% Comments', 'applicator' )
                                                );
        
                                                $coms_cnt_num_obj_a_zero = sprintf( $coms_cnt_num_obj_a_zero_mu,
                                                    $comments_count_zero,
                                                    $coms_cnt_num_obj_a_zero_link
                                                );

                                                // Status: Populated
                                                if( $comments_count_int >= 1 ) {

                                                    comments_popup_link(
                                                        // Zero Comment
                                                        '',

                                                        // Single Comment
                                                        $comments_count_single,

                                                        // Multiple Comments
                                                        $comments_count_multi,

                                                        // CSS Class
                                                        'a coms-cnt-num-obj---a',

                                                        // Comments Disabled
                                                        ''
                                                    );

                                                // Status: Empty
                                                } else {
                                                    printf( $coms_cnt_num_obj_a_zero );
                                                } ?>

                                                </span>
                                            </span>
                                        </div><!-- Comments Count Object -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- Comments Count -->

                        <?php // Status: Enabled
                        if ( comments_open() ) {
                            
                            // Markup
                            $add_com_axn_mu = '<span class="obj axn %2$s" title="%9$s" data-name="%1$s">';
                                $add_com_axn_mu .= '<a class="a %3$s---a" href="%8$s"><span class="a_l %3$s---a_l">';
                                    $add_com_axn_mu .= '<span class="word %5$s---word">%4$s</span>';
                                    $add_com_axn_mu .= ' <span class="word %7$s---word">%6$s</span>';
                                $add_com_axn_mu .= '</span></a>';
                            $add_com_axn_mu .= '</span><!-- %1$s -->';
                            
                            // Markup
                            $req_sign_in_lbl_obj_mu = ' <span class="obj note %2$s" data-name="%1$s">';
                                $req_sign_in_lbl_obj_mu .= '<span class="g %3$s---g"><span class="g_l %3$s---g_l">%4$s</span></span>';
                            $req_sign_in_lbl_obj_mu .= '</span><!-- %1$s -->';
                            
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
                            $req_sign_in_lbl_obj = sprintf( $req_sign_in_lbl_obj_mu,
                                'Requires Sign In Label Object',
                                'requires-sign-in-label-obj',
                                'req-sign-in-lbl-obj',
                                esc_html__( '(requires Sign In)', 'applicator' )
                            );
                            
                            // Content
                            $add_com_axn = sprintf( $add_com_axn_mu,
                                'Add Comment Action',
                                'add-comment-axn',
                                'add-com-axn',
                                esc_html__( 'Add', 'applicator' ),
                                'add',
                                esc_html__( 'Comment', 'applicator' ),
                                'comment',
                                $add_com_axn_anchor,
                                esc_attr__( 'Add Comment', 'applicator' )
                            );
                        
                            printf( $add_com_axn );
                            
                            if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                                printf( $req_sign_in_lbl_obj );
                            }
                        
                        // Status: Disabled
                        } else { ?>

                        <div class="obj note commenting-disabled-note" data-name="Commenting Disabled Note">
                            <div class="g commenting-disabled-note---g">
                                <div class="g_l commenting-disabled-note---g_l">
                                    <p><?php esc_html_e( 'Commenting is disabled.', $GLOBALS['apl_textdomain'] ); ?></p>
                                </div>
                            </div>
                        </div><!-- Commenting Disabled Note -->

                        <?php } ?>

                    </div>
                </div><!-- ct -->
            </div>
        </div><!-- Comments Actions Snippet -->

    <?php }
}
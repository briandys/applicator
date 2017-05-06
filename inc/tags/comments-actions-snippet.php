<?php // Comments Actions Snippet | content.php

if ( ! function_exists( 'applicator_comments_actions_snippet' ) ) {
    function applicator_comments_actions_snippet() {
        
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
        
        <?php // Component ?>
        <div class="cp comments-actions-snippet <?php echo $comments_count_pop_stat_css . ' ' . $comment_creation_ability_stat_css ?>" data-name="Comments Actions Snippet">
            <div class="cr coms-acts-snip---cr">
                <div class="h coms-acts-snip---h"><span class="h_l coms-acts-snip---h_l"><?php esc_html_e( 'Comments Actions Snippet', 'applicator' ); ?></span></div>
                <div class="ct coms-acts-snip---ct">
                    <div class="ct_cr coms-acts-snip---ct_cr">

                        <div class="obj comments-count-obj" data-name="Comments Count Object">
                            <span class="g coms-cnt-obj---g">
                                <span class="g_l coms-cnt-obj---g_l">

                                <?php 

                                // Comments Count Markup
                                $comments_count_obj_a_l_mu = '<span class="a_l coms-cnt-obj---a_l"><span class="num comments-count---num">%1$s</span> <span class="word %3$s---word">%2$s</span></span>';

                                // Status: Populated
                                if( $comments_count_int >= 1 ) {

                                    comments_popup_link(
                                    // Zero Comment
                                    '',

                                    // Single Comment
                                    sprintf( $comments_count_obj_a_l_mu,
                                        esc_html__( '1', 'applicator' ),
                                        esc_html__( 'Comment', 'applicator' ),
                                        'comment'
                                    ),

                                    // Multiple Comments
                                    sprintf( $comments_count_obj_a_l_mu,
                                        esc_html__( '%', 'applicator' ),
                                        esc_html__( 'Comments', 'applicator' ),
                                        'comments'
                                    ),

                                    // CSS Class
                                    'a coms-cnt---a',

                                    // Comments Disabled
                                    '' );

                                // Status: Empty
                                } else { ?>

                                    <a class="a coms-cnt-obj---a" href="<?php if ( ! is_singular() ) { echo esc_url( get_permalink() ); } ?>#comments">
                                        <?php printf( $comments_count_obj_a_l_mu,
                                            esc_html__( '0', 'applicator' ),
                                            esc_html__( 'Comment', 'applicator' ),
                                            'comment'
                                        ); ?>
                                    </a>

                                <?php } ?>

                                </span>
                            </span>
                        </div><!-- Comments Count -->

                        <?php // Status: Enabled
                        if ( comments_open() ) { ?>
                        
                        <div class="obj axn add-comment-axn" data-name="Add Comment Action">
                            <a class="a add-com-axn---a" href="<?php if ( ! is_singular() ) { echo esc_url( get_permalink() ); } ?>#comment" title="<?php esc_attr_e( 'Add Comment', 'applicator' ); ?>"><span class="a_l add-com-axn---a_l"><span class="word add---word"><?php esc_html_e( 'Add', 'applicator' ); ?></span> <span class="word comment---word"><?php esc_html_e( 'Comment', 'applicator' ); ?></span></span></a>
                        </div><!-- Add Comment Action -->

                        <?php // Status: Disabled
                        } else { ?>

                        <div class="obj note commenting-disabled-note" data-name="Commenting Disabled Note">
                            <div class="g commenting-disabled-note---g">
                                <div class="g_l commenting-disabled-note---g_l">
                                    <p><?php esc_html_e( 'Commenting is disabled.', 'applicator' ); ?></p>
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
<?php // Comments Actions Snippet | content.php

if ( ! function_exists( 'applicator_comments_actions_snippet' ) ) {
    function applicator_comments_actions_snippet() {
        
        $comments_count_int = (int) get_comments_number( get_the_ID() );

        $comment_creation_class = 'comment-creation';
        $comments_count_class = 'comments-count';

        $status_enabled_class = '--enabled';
        $status_disabled_class = '--disabled';
        $status_populated_class = '--populated';
        $status_empty_class = '--empty';

        // Comment Creation Ability Status Class
        if ( comments_open() ) {
            $comment_creation_ability_stat_class = $comment_creation_class . $status_enabled_class;
        } else {
            $comment_creation_ability_stat_class = $comment_creation_class . $status_disabled_class;
        }

        // Comments Count Population Status Class
        if ( 0 === $comments_count_int ) {
            $comments_count_pop_stat_class = $comments_count_class . $status_empty_class . ' ' . $comments_count_class . '--zero';
        } elseif ( 1 === $comments_count_int ) {
            $comments_count_pop_stat_class = $comments_count_class . $status_populated_class . ' ' . $comments_count_class . '--single';
        } elseif ( 1 < $comments_count_int ) {
            $comments_count_pop_stat_class = $comments_count_class . $status_populated_class . ' ' . $comments_count_class . '--multiple';
        } ?>
        
        <?php // Component ?>
        <div class="cp comments-actions-snippet <?php echo $comments_count_pop_stat_class . ' ' . $comment_creation_ability_stat_class ?>" data-name="Comments Actions Snippet">
            <div class="cr coms-acts-snip---cr">
                <div class="h coms-acts-snip---h"><span class="h_l coms-acts-snip---h_l">Comments Actions Snippet</span></div>
                <div class="ct coms-acts-snip---ct">
                    <div class="ct_cr coms-acts-snip---ct_cr">

                        <?php // Object ?>
                        <div class="obj comments-count---obj" data-name="Comments Count">
                            <span class="g coms-cnt---g">
                                <span class="g_l coms-cnt---g_l">

                                <?php 

                                // Comments Count Markup
                                $comments_count_obj_mu = '<span class="a_l coms-cnt---a_l"><span class="word coms-cnt--number---word">%1$s</span> <span class="word coms-cnt--%3$s---word">%2$s</span></span>';

                                // Status: Populated
                                if( $comments_count_int >= 1 ) {

                                    comments_popup_link(
                                    // Zero Comment
                                    '',

                                    // Single Comment
                                    sprintf( $comments_count_obj_mu,
                                        __( '1', 'applicator' ),
                                        __( 'Comment', 'applicator' ),
                                        __( 'comment', 'applicator' )
                                    ),

                                    // Multiple Comments
                                    sprintf( $comments_count_obj_mu,
                                        __( '%', 'applicator' ),
                                        __( 'Comments', 'applicator' ),
                                        __( 'comments', 'applicator' )
                                    ),

                                    // CSS Class
                                    'a coms-cnt---a',

                                    // Comments Disabled
                                    '' );

                                // Status: Empty
                                } else { ?>

                                    <a class="a coms-cnt---a" href="<?php if ( ! is_singular() ) { echo esc_url( get_permalink() ); } ?>#comments">
                                        <?php printf( $comments_count_obj_mu,
                                            __( '0', 'applicator' ),
                                            __( 'Comment', 'applicator' ),
                                            __( 'comment', 'applicator' )
                                        ); ?>
                                    </a>

                                <?php } ?>

                                </span>
                            </span>
                        </div><!-- comments-count---obj -->

                        <?php // Status: Enabled
                        if ( comments_open() ) { ?>
                        
                        <div class="obj axn add-comment-axn" data-name="Add Comment Action">
                            <a class="a add-com-axn---a" href="<?php if ( ! is_singular() ) { echo esc_url( get_permalink() ); } ?>#comment" title="<?php esc_attr_e( 'Add Comment', 'applicator' ); ?>"><span class="a_l add-com-axn---a_l"><span class="word add-com-axn--add---word"><?php esc_html_e( 'Add', 'applicator' ); ?></span> <span class="word add-com-axn--comment---word"><?php esc_html_e( 'Comment', 'applicator' ); ?></span></span></a>
                        </div><!-- add-comment-axn -->

                        <?php // Status: Disabled
                        } else { ?>

                        <div class="obj note commenting-disabled-note---obj" data-name="Commenting Disabled Note">
                            <div class="g commenting-disabled-note---g">
                                <p><?php esc_html_e( 'Commenting is disabled.', 'applicator' ); ?></p>
                            </div>
                        </div><!-- commenting-disabled-note---obj -->

                        <?php } ?>

                    </div>
                </div><!-- coms-acts-snip---ct -->
            </div>
        </div><!-- comments-actions-snippet -->

    <?php }
}
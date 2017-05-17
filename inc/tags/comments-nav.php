<?php // Comments Navigation | comments.php

if ( ! function_exists( 'applicator_func_comments_nav' ) ) {
    function applicator_func_comments_nav() {
        
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {

            // Next Comments Nav Item Markup
            $next_coms_navi_a_l_mu = '<span class="a_l next-coms-navi---a_l" title="%3$s"><span class="word next-coms-navi--next---word">%1$s</span> <span class="word next-coms-navi--comments---word">%2$s</span> %4$s</span>';

            $next_coms_navi_a = sprintf( $next_coms_navi_a_l_mu,
                esc_html__( 'Next', $GLOBALS['apl_textdomain'] ),
                esc_html__( 'Comments', $GLOBALS['apl_textdomain'] ),
                esc_attr__( 'Next Comments', $GLOBALS['apl_textdomain'] ),
                applicator_func_get_svg( array( 'icon' => 'arrow-icon' ) )
            );

            // Previous Comments Nav Item Markup
            $prev_coms_navi_a_l_mu = '<span class="a_l prev-coms-navi---a_l" title="%3$s"><span class="word prev-coms-navi--next---word">%1$s</span> <span class="word prev-coms-navi--comments---word">%2$s</span> %4$s</span>';

            $prev_coms_navi_a = sprintf( $prev_coms_navi_a_l_mu,
                esc_html__( 'Previous', $GLOBALS['apl_textdomain'] ),
                esc_html__( 'Comments', $GLOBALS['apl_textdomain'] ),
                esc_attr__( 'Previous Comments', $GLOBALS['apl_textdomain'] ),
                applicator_func_get_svg( array( 'icon' => 'arrow-icon' ) )
            ); ?>

            <div class="nav comments-nav" role="navigation" data-name="Comments Navigation">
                <div class="cr comments-nav---cr">
                    <div class="h comments-nav---h"><span class="h_l comments-nav---h_l"><?php esc_html_e( 'Comments Navigation', $GLOBALS['apl_textdomain'] ); ?></span></div>
                    <div class="ct comments-nav---ct">
                        <div class="ct_cr comments-nav---ct_cr">
                            <ul class="grp comments-nav---grp">
                            <?php if ( get_next_comments_link() ) { ?>
                                <li class="item obj navi next-comments-navi" data-name="Next Comments Nav Item">
                                    <?php next_comments_link( $next_coms_navi_a ); ?>
                                </li>
                            <?php }
                            if ( get_previous_comments_link() ) { ?>
                                <li class="item obj navi previous-comments-navi" data-name="Previous Comments Nav Item">
                                    <?php previous_comments_link( $prev_coms_navi_a ); ?>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div><!-- comments-nav---ct -->
                </div>
            </div><!-- comments-nav -->
        
        <?php }
    
    }
}

        
        
        
        
        
        
        $adjacent_navi_mu = '<span class="a_l %4$s-navi---a_l" rel="%5$s" title="%1$s"><span class="prop adjacent-navi---prop"><span class="word %5$s---word">%2$s</span> <span class="word entry---word">%3$s</span></span><span class="sep colon-sep">:</span> <span class="val post-title---val">%6$s</span></span>';
        
        $next_entry_navi = sprintf( $adjacent_navi_mu,
            esc_attr__( 'Next Entry', 'applicator' ),
            esc_html__( 'Next', 'applicator' ),
            esc_html__( 'Entry', 'applicator' ),
            'next-entry',
            'next',
            '%title'
        );
        
        $prev_entry_navi = sprintf( $adjacent_navi_mu,
            esc_attr__( 'Previous Entry', 'applicator' ),
            esc_html__( 'Previous', 'applicator' ),
            esc_html__( 'Entry', 'applicator' ),
            'prev-entry',
            'prev',
            '%title'
        );
        
        if ( ! is_attachment() ) { ?>

            <div class="nav entry-nav" role="navigation" aria-label="<?php esc_html_e( 'Entry Navigation', 'applicator' ); ?>" data-name="Entry Navigation">
                <div class="cr entry-nav---cr">
                    <div class="h entry-nav---h"><span class="h_l entry-nav---h_l"><?php esc_html_e( 'Entry Navigation', 'applicator' ); ?></span></div>
                    <div class="ct entry-nav---ct">
                        <div class="ct_cr entry-nav---ct_cr">
                            <ul class="grp entry-nav--grp">
                                <?php if ( get_next_post_link() ) { ?>
                                <li class="item obj navi next-entry-navi" data-name="Next Entry Nav Item">
                                    <?php next_post_link( '%link', $next_entry_navi ); ?>
                                </li>
                                <?php }
                                if ( get_previous_post_link() ) { ?>
                                <li class="item obj navi prev-entry-navi" data-name="Previous Entry Nav Item">
                                    <?php previous_post_link( '%link', $prev_entry_navi ); ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!-- ct -->
                </div>
            </div><!-- Entry Navigation -->
        
        <?php }
<?php
//------------------------- Comments Navigation
// comments.php

if ( ! function_exists( 'application_comments_nav' ) ) :
    function application_comments_nav() {
        
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :

        // Next Comments Label
        $next_label = '<span class="a-l next--comments-nav--a-l">';
            $next_label .= '<span class=" next--comments-nav--a--pred-l" title="%3$s">';
                $next_label .= '%1$s';
            $next_label .= '</span> ';
            $next_label .= '<span class="next--comments-nav--a--subj-l">';
                $next_label .= '%2$s';
            $next_label .= '</span>';
        $next_label .= '</span>';
        
        $next_label = sprintf( $next_label,
            esc_html__( 'Next', 'applicator' ),
            esc_html__( 'Comments', 'applicator' ),
            esc_attr__( 'Next Comments', 'applicator' )
        );

        // Previous Comments Label
        $prev_label = '<span class="a-l prev--comments-nav--a-l">';
            $prev_label .= '<span class="prev--comments-nav--a--pred-l" title="%3$s">';
                $prev_label .= '%1$s';
            $prev_label .= '</span> ';
            $prev_label .= '<span class="prev--comments-nav--a--subj-l">';
                $prev_label .= '%2$s';
            $prev_label .= '</span>';
        $prev_label .= '</span>';
        
        $prev_label = sprintf( $prev_label,
            esc_html__( 'Previous', 'applicator' ),
            esc_html__( 'Comments', 'applicator' ),
            esc_attr__( 'Previous Comments', 'applicator' )
        ); ?>

        <div class="comments-nav" role="navigation" aria-label="<?php esc_html_e( 'Comments Navigation', 'applicator' ); ?>">
            <div class="comments-nav--cr">
                <div class="h comments-nav--h">
                    <span class="h-l"><?php esc_html_e( 'Comments Navigation', 'applicator' ); ?></span>
                </div>
                <ul class="grp comments-nav--grp">
                    <?php if ( get_next_comments_link() ) : ?>
                    <li class="item comments-nav--item next--comments-nav--item">
                        <?php next_comments_link( $next_label ); ?>
                    </li>
                    <?php endif; ?>
                    <?php if ( get_previous_comments_link() ) : ?>
                    <li class="item entries-nav--item prev--entries-nav--item">
                        <?php previous_comments_link( $prev_label ); ?>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div><!-- comments-nav -->
        
        <?php endif;
    
    }
endif;